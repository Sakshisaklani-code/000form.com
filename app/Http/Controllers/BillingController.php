<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\SubscriptionInvoice;
use App\Enums\PlanName;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class BillingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ── PADDLE API HELPERS ────────────────────────────────────
    private function paddleApiUrl(string $path): string
    {
        $base = config('cashier.environment') === 'sandbox'
            ? 'https://sandbox-api.paddle.com'
            : 'https://api.paddle.com';

        return $base . $path;
    }

    private function paddleHeaders(): array
    {
        return [
            'Authorization' => 'Bearer ' . config('cashier.api_key'),
            'Content-Type'  => 'application/json',
            'Accept'        => 'application/json',
        ];
    }

    // ── BILLING PORTAL PAGE ───────────────────────────────────
    public function index(Request $request): View
    {
        $user = $request->user();

        $subscription = Subscription::where('user_id', $user->id)
            ->latest()
            ->first();

        // ── Auto-expire: period ended → reset to free plan ────
        if ($subscription
            && $subscription->cancel_at_period_end
            && $subscription->current_period_end?->isPast()
            && $subscription->status->value !== 'cancelled'
        ) {
            $freeLimits = config('plans.free');
            $subscription->update([
                'status'                   => 'cancelled',
                'paddle_last_event'        => 'auto_expired',
                'submissions_limit'        => $freeLimits['submissions'],
                'file_upload_limit_mb'     => $freeLimits['file_upload_mb'],
                'team_members_limit'       => $freeLimits['team_members'],
                'webhooks_enabled'         => $freeLimits['webhooks'],
                'role_permissions_enabled' => $freeLimits['role_permissions'],
                'submissions_used'         => 0,
                'scheduled_plan'           => null,
                'scheduled_billing'        => null,
                'scheduled_effective_at'   => null,
            ]);
            Cache::forget("sub_limit_{$user->id}");
            $subscription->refresh();
        }

        // ── Auto-apply scheduled plan change if date passed ───
        if ($subscription
            && $subscription->scheduled_plan
            && $subscription->scheduled_effective_at?->isPast()
        ) {
            $newPlan    = $subscription->scheduled_plan;
            $newBilling = $subscription->scheduled_billing;
            $newLimits  = config("plans.{$newPlan}");

            $subscription->update([
                'plan_name'                => $newPlan,
                'billing_cycle'            => $newBilling,
                'submissions_limit'        => $newLimits['submissions'],
                'file_upload_limit_mb'     => $newLimits['file_upload_mb'],
                'team_members_limit'       => $newLimits['team_members'],
                'webhooks_enabled'         => $newLimits['webhooks'],
                'role_permissions_enabled' => $newLimits['role_permissions'],
                'scheduled_plan'           => null,
                'scheduled_billing'        => null,
                'scheduled_effective_at'   => null,
                'paddle_last_event'        => 'scheduled_change_applied',
            ]);

            Cache::forget("sub_limit_{$user->id}");
            $subscription->refresh();
        }

        // Only pass subscription to blade if still accessible
        $activeSubscription = ($subscription && $subscription->canAccess())
            ? $subscription
            : null;

        // ── Build scheduled change data for blade ─────────────
        $scheduledChange = null;
        if ($activeSubscription
            && $activeSubscription->scheduled_plan
            && $activeSubscription->scheduled_effective_at?->isFuture()
        ) {
            $scheduledChange = [
                'plan'         => $activeSubscription->scheduled_plan,
                'billing'      => $activeSubscription->scheduled_billing,
                'effective_at' => $activeSubscription->scheduled_effective_at->format('M d, Y'),
            ];
        }

        $invoices = collect();
        if ($subscription) {
            $invoices = SubscriptionInvoice::where('user_id', $user->id)
                ->latest('paid_at')
                ->take(12)
                ->get();
        }

        return view('billing.portal', [
            'user'            => $user,
            'subscription'    => $activeSubscription,
            'invoices'        => $invoices,
            'scheduledChange' => $scheduledChange,
        ]);
    }

    // ── CANCEL SUBSCRIPTION ───────────────────────────────────
    public function cancel(Request $request): RedirectResponse
    {
        $user = $request->user();

        $subscription = Subscription::where('user_id', $user->id)
            ->whereIn('status', ['active', 'trialing'])
            ->where('cancel_at_period_end', false)
            ->first();

        if (! $subscription) {
            return back()->with('error', 'No active subscription found to cancel.');
        }

        if ($subscription->paddle_subscription_id) {
            try {
                $response = Http::withHeaders($this->paddleHeaders())
                    ->post($this->paddleApiUrl("/subscriptions/{$subscription->paddle_subscription_id}/cancel"), [
                        'effective_from' => 'next_billing_period',
                    ]);

                if (! $response->successful()) {
                    Log::warning('Paddle cancel API failed: ' . $response->body());
                }
            } catch (\Exception $e) {
                Log::warning('Paddle cancel failed: ' . $e->getMessage());
            }
        }

        $subscription->update([
            'cancel_at_period_end' => true,
            'cancelled_at'         => now(),
            // Clear any scheduled plan changes when cancelling
            'scheduled_plan'           => null,
            'scheduled_billing'        => null,
            'scheduled_effective_at'   => null,
        ]);

        Cache::forget("sub_limit_{$user->id}");

        return back()->with('success',
            'Your subscription has been cancelled. You keep full access until ' .
            $subscription->current_period_end?->format('M d, Y') .
            '. After that your account switches to the free plan (50 submissions/month).'
        );
    }

    // ── RESUME SUBSCRIPTION ───────────────────────────────────
    public function resume(Request $request): RedirectResponse
    {
        $user = $request->user();

        $subscription = Subscription::where('user_id', $user->id)
            ->where(function ($q) {
                $q->where('cancel_at_period_end', true)
                  ->orWhere('status', 'paused');
            })
            ->where('current_period_end', '>', now())
            ->first();

        if (! $subscription) {
            return back()->with('error', 'No cancelled subscription to reactivate. Your plan has already expired — please subscribe again from the pricing page.');
        }

        if ($subscription->paddle_subscription_id) {
            try {
                if ($subscription->status->value === 'paused') {
                    $response = Http::withHeaders($this->paddleHeaders())
                        ->post($this->paddleApiUrl("/subscriptions/{$subscription->paddle_subscription_id}/resume"), [
                            'effective_from' => 'immediately',
                        ]);
                } else {
                    // Scheduled cancel — remove via PATCH
                    $response = Http::withHeaders($this->paddleHeaders())
                        ->patch($this->paddleApiUrl("/subscriptions/{$subscription->paddle_subscription_id}"), [
                            'scheduled_change' => null,
                        ]);
                }

                if (! $response->successful()) {
                    Log::warning('Paddle resume/reactivate failed: ' . $response->body());
                    return back()->with('error', 'Could not reactivate subscription via Paddle. Please try again.');
                }

            } catch (\Exception $e) {
                Log::warning('Paddle resume failed: ' . $e->getMessage());
                return back()->with('error', 'Could not reactivate subscription. Please try again.');
            }
        }

        $subscription->update([
            'cancel_at_period_end' => false,
            'cancelled_at'         => null,
            'status'               => 'active',
        ]);

        Cache::forget("sub_limit_{$user->id}");

        return back()->with('success', 'Your subscription has been reactivated successfully.');
    }

    // ── CHANGE PLAN (upgrade / downgrade) ────────────────────
    public function changePlan(Request $request): RedirectResponse
    {
        $request->validate([
            'plan'    => 'required|in:personal,professional,business',
            'billing' => 'required|in:monthly,annual',
            'when'    => 'nullable|in:immediately,next_billing_period',
        ]);

        $user    = $request->user();
        $plan    = $request->input('plan');
        $billing = $request->input('billing');
        $when    = $request->input('when', 'next_billing_period');
        $priceId = config("plans.{$plan}.paddle_{$billing}_id");

        $subscription = Subscription::where('user_id', $user->id)
            ->whereIn('status', ['active', 'trialing', 'past_due'])
            ->first();

        if (! $subscription) {
            return back()->with('error', 'No active subscription found.');
        }

        if (! $priceId) {
            return back()->with('error', "Price ID not found for {$plan}/{$billing}. Check your plans config.");
        }

        $currentPlan = is_string($subscription->plan_name)
            ? $subscription->plan_name
            : $subscription->plan_name->value;

        if ($currentPlan === $plan && $subscription->billing_cycle === $billing) {
            return back()->with('error', 'You are already on this plan.');
        }

        $planRank  = ['free' => 0, 'personal' => 1, 'professional' => 2, 'business' => 3];
        $isUpgrade = ($planRank[$plan] ?? 0) > ($planRank[$currentPlan] ?? 0);
        $newLimits = config("plans.{$plan}");

        // ── Call Paddle API ───────────────────────────────────
        if ($subscription->paddle_subscription_id) {
            try {
                if ($isUpgrade && $when === 'immediately') {
                    // ── Upgrade Now: single call, charge full price immediately ──
                    $response = Http::withHeaders($this->paddleHeaders())
                        ->patch($this->paddleApiUrl("/subscriptions/{$subscription->paddle_subscription_id}"), [
                            'items'                  => [['price_id' => $priceId, 'quantity' => 1]],
                            'proration_billing_mode' => 'full_immediately',
                            'on_payment_failure'     => 'prevent_change',
                        ]);

                    if (! $response->successful()) {
                        Log::error('Paddle plan swap failed: ' . $response->body());
                        return back()->with('error', 'Failed to update plan via Paddle. Please try again.');
                    }

                } else {
                    // ── Schedule at Renewal: two separate calls ──────────────
                    // Paddle does NOT allow changing items + next_billed_at together

                    // Call 1: swap price with no billing
                    $r1 = Http::withHeaders($this->paddleHeaders())
                        ->patch($this->paddleApiUrl("/subscriptions/{$subscription->paddle_subscription_id}"), [
                            'items'                  => [['price_id' => $priceId, 'quantity' => 1]],
                            'proration_billing_mode' => 'do_not_bill',
                        ]);

                    if (! $r1->successful()) {
                        Log::error('Paddle plan swap failed (step 1): ' . $r1->body());
                        return back()->with('error', 'Failed to update plan via Paddle. Please try again.');
                    }

                    // Call 2: set next billing date separately
                    $nextBilledAt = $subscription->next_billing_date
                        ? $subscription->next_billing_date->toIso8601String()
                        : $subscription->current_period_end->toIso8601String();

                    Http::withHeaders($this->paddleHeaders())
                        ->patch($this->paddleApiUrl("/subscriptions/{$subscription->paddle_subscription_id}"), [
                            'next_billed_at' => $nextBilledAt,
                        ]);
                }

                Log::info("Plan swapped via Paddle: {$currentPlan}/{$subscription->billing_cycle} → {$plan}/{$billing} (when={$when}) for user {$user->id}");

            } catch (\Exception $e) {
                Log::error('Paddle plan swap exception: ' . $e->getMessage());
                return back()->with('error', 'Failed to update plan. Please try again.');
            }
        }

        // ── Update DB ─────────────────────────────────────────
        if ($isUpgrade && $when === 'immediately') {
            // Reset billing period from today based on new billing cycle
            $newPeriodEnd = $billing === 'annual'
                ? now()->addYear()
                : now()->addMonth();

            $subscription->update([
                'plan_name'                => $plan,
                'billing_cycle'            => $billing,
                'paddle_price_id'          => $priceId,
                'paddle_last_event'        => 'plan_changed',
                'submissions_limit'        => $newLimits['submissions'],
                'file_upload_limit_mb'     => $newLimits['file_upload_mb'],
                'team_members_limit'       => $newLimits['team_members'],
                'webhooks_enabled'         => $newLimits['webhooks'],
                'role_permissions_enabled' => $newLimits['role_permissions'],
                // Reset billing period to today
                'current_period_start'     => now(),
                'current_period_end'       => $newPeriodEnd,
                'next_billing_date'        => $newPeriodEnd,
                'last_payment_at'          => now(),
                'submissions_used'         => 0,
                // Clear any previous scheduled change
                'scheduled_plan'           => null,
                'scheduled_billing'        => null,
                'scheduled_effective_at'   => null,
            ]);

        } else {
            // Schedule for next billing period — store in DB, keep current plan active
            $effectiveAt = $subscription->next_billing_date
                ?? $subscription->current_period_end;

            $subscription->update([
                // Keep current plan active until renewal
                'paddle_price_id'        => $priceId,
                'paddle_last_event'      => 'plan_change_scheduled',
                // Store scheduled change
                'scheduled_plan'         => $plan,
                'scheduled_billing'      => $billing,
                'scheduled_effective_at' => $effectiveAt,
            ]);
        }

        Cache::forget("sub_limit_{$user->id}");

        if ($isUpgrade && $when === 'immediately') {
            $msg = "Plan upgraded to " . ucfirst($plan) . " (" . ucfirst($billing) . ") successfully. New limits are active immediately.";
        } elseif ($isUpgrade) {
            $msg = "Upgrade to " . ucfirst($plan) . " (" . ucfirst($billing) . ") scheduled for " . ($subscription->next_billing_date?->format('M d, Y') ?? 'next renewal') . ". No charge today.";
        } else {
            $msg = "Downgrade to " . ucfirst($plan) . " (" . ucfirst($billing) . ") scheduled for " . ($subscription->next_billing_date?->format('M d, Y') ?? 'next renewal') . ". Current limits remain until then.";
        }

        return back()->with('success', $msg);
    }

    // ── CANCEL SCHEDULED PLAN CHANGE ─────────────────────────
    public function cancelScheduledChange(Request $request): RedirectResponse
    {
        $user = $request->user();

        $subscription = Subscription::where('user_id', $user->id)
            ->whereNotNull('scheduled_plan')
            ->first();

        if (! $subscription) {
            return back()->with('error', 'No scheduled plan change found.');
        }

        // Try to remove from Paddle too
        if ($subscription->paddle_subscription_id) {
            try {
                // Revert to current plan price in Paddle
                $currentPriceId = config("plans.{$subscription->plan_name->value}.paddle_{$subscription->billing_cycle}_id");
                if ($currentPriceId) {
                    Http::withHeaders($this->paddleHeaders())
                        ->patch($this->paddleApiUrl("/subscriptions/{$subscription->paddle_subscription_id}"), [
                            'items' => [[
                                'price_id' => $currentPriceId,
                                'quantity' => 1,
                            ]],
                            'proration_billing_mode' => 'do_not_bill',
                        ]);
                }
            } catch (\Exception $e) {
                Log::warning('Could not revert Paddle scheduled change: ' . $e->getMessage());
            }
        }

        $subscription->update([
            'scheduled_plan'         => null,
            'scheduled_billing'      => null,
            'scheduled_effective_at' => null,
            'paddle_last_event'      => 'scheduled_change_cancelled',
        ]);

        Cache::forget("sub_limit_{$user->id}");

        return back()->with('success', 'Scheduled plan change has been cancelled. You will stay on your current plan.');
    }

    // ── PADDLE CUSTOMER PORTAL (update payment method) ────────
    public function portalLink(Request $request): RedirectResponse
    {
        $user = $request->user();

        if (! $user->paddle_customer_id) {
            $sub = Subscription::where('user_id', $user->id)->latest()->first();
            if ($sub?->paddle_customer_id) {
                $user->update(['paddle_customer_id' => $sub->paddle_customer_id]);
                $user->refresh();
            }
        }

        if (! $user->paddle_customer_id) {
            return back()->with('error', 'No billing account found. Please contact support.');
        }

        try {
            $response = Http::withHeaders($this->paddleHeaders())
                ->post($this->paddleApiUrl('/customers/' . $user->paddle_customer_id . '/portal-sessions'), [
                    'subscription_ids' => array_filter([
                        Subscription::where('user_id', $user->id)
                            ->whereNotNull('paddle_subscription_id')
                            ->latest()
                            ->value('paddle_subscription_id')
                    ]),
                ]);

            if ($response->successful()) {
                $portalUrl = $response->json('data.urls.general.overview');
                if ($portalUrl) {
                    return redirect($portalUrl);
                }
            }

            $portalUrl = $user->billingPortalUrl(route('billing.portal'));
            return redirect($portalUrl);

        } catch (\Exception $e) {
            Log::error('Portal link error: ' . $e->getMessage());
            return back()->with('error', 'Unable to open payment portal. Please try again.');
        }
    }
}