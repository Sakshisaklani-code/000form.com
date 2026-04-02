<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\SubscriptionInvoice;
use App\Enums\PlanName;
use App\Jobs\SendUpgradeInvoiceEmail;
use App\Mail\PlanUpgraded;
use App\Mail\SubscriptionCancelled;
use App\Mail\SubscriptionResumed;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

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

    // ── ADMIN EMAILS HELPER ───────────────────────────────────
    private function getAdminEmails(): array
    {
        return array_filter(
            array_map('trim', explode(',', env('MAIL_ADMIN_EMAILS', '')))
        );
    }

    // ── SEND PLAN UPGRADE EMAILS ──────────────────────────────
    // Sends to user + all admins.
    // For immediate upgrades, also passes payment details
    // (amount, currency, transactionId, invoiceUrl, periodEnd).
    // Errors are caught individually so a mail failure never
    // breaks the plan change flow.
    private function sendPlanUpgradeEmails(
        $user,
        string  $oldPlan,
        string  $oldBilling,
        string  $newPlan,
        string  $newBilling,
        string  $effectiveAt,
        bool    $isImmediate,
        ?string $subscriptionId = null,
        // ── Payment details (immediate upgrades only) ─────────
        ?string $amount        = null,
        ?string $currency      = null,
        ?string $transactionId = null,
        ?string $invoiceUrl    = null,
        ?string $periodEnd     = null,
    ): void {
        // ── 1. Email to the user ──────────────────────────────
        try {
            Mail::to($user->email)->send(new PlanUpgraded(
                userEmail:        $user->email,
                userId:           $user->id,
                oldPlan:          $oldPlan,
                oldBilling:       $oldBilling,
                newPlan:          $newPlan,
                newBilling:       $newBilling,
                effectiveAt:      $effectiveAt,
                isImmediate:      $isImmediate,
                isAdminCopy:      false,
                subscriptionId:   $subscriptionId,
                paddleCustomerId: null,
                amount:           $amount,
                currency:         $currency,
                transactionId:    $transactionId,
                invoiceUrl:       $invoiceUrl,
                periodEnd:        $periodEnd,
            ));

            Log::info("Plan upgrade email sent to user: {$user->email}");
        } catch (\Throwable $e) {
            Log::error("Failed to send plan upgrade email to user {$user->email}: " . $e->getMessage());
        }

        // ── 2. Emails to all admins ───────────────────────────
        try {
            $adminEmails = $this->getAdminEmails();

            if (!empty($adminEmails)) {
                Mail::to($adminEmails)->send(new PlanUpgraded(
                    userEmail:        $user->email,
                    userId:           $user->id,
                    oldPlan:          $oldPlan,
                    oldBilling:       $oldBilling,
                    newPlan:          $newPlan,
                    newBilling:       $newBilling,
                    effectiveAt:      $effectiveAt,
                    isImmediate:      $isImmediate,
                    isAdminCopy:      true,
                    subscriptionId:   $subscriptionId,
                    paddleCustomerId: $user->paddle_customer_id ?? null,
                    amount:           $amount,
                    currency:         $currency,
                    transactionId:    $transactionId,
                    invoiceUrl:       $invoiceUrl,
                    periodEnd:        $periodEnd,
                ));

                Log::info("Plan upgrade admin notification sent to: " . implode(', ', $adminEmails));
            } else {
                Log::warning("No MAIL_ADMIN_EMAILS configured — admin plan upgrade notification skipped.");
            }
        } catch (\Throwable $e) {
            Log::error("Failed to send admin plan upgrade email: " . $e->getMessage());
        }
    }

    // ── SEND CANCELLATION EMAILS ──────────────────────────────
    // Used for both subscription cancellation and
    // scheduled-upgrade cancellation.
    private function sendCancellationEmails(
        $user,
        Subscription $subscription,
        string  $cancelType,           // 'subscription' | 'scheduled_change'
        ?string $accessUntil          = null,
        ?string $cancelledNewPlan     = null,
        ?string $cancelledNewBilling  = null,
    ): void {
        $planName     = is_string($subscription->plan_name)
            ? $subscription->plan_name
            : $subscription->plan_name->value;
        $billingCycle = $subscription->billing_cycle ?? 'monthly';
        $subId        = $subscription->paddle_subscription_id;

        // ── 1. Email to the user ──────────────────────────────
        try {
            Mail::to($user->email)->send(new SubscriptionCancelled(
                userEmail:           $user->email,
                userId:              $user->id,
                planName:            $planName,
                billingCycle:        $billingCycle,
                isAdminCopy:         false,
                cancelType:          $cancelType,
                accessUntil:         $accessUntil,
                cancelledNewPlan:    $cancelledNewPlan,
                cancelledNewBilling: $cancelledNewBilling,
                subscriptionId:      $subId,
                paddleCustomerId:    null,
            ));

            Log::info("Cancellation email sent to user: {$user->email} (type={$cancelType})");
        } catch (\Throwable $e) {
            Log::error("Failed to send cancellation email to user {$user->email}: " . $e->getMessage());
        }

        // ── 2. Emails to all admins ───────────────────────────
        try {
            $adminEmails = $this->getAdminEmails();

            if (!empty($adminEmails)) {
                Mail::to($adminEmails)->send(new SubscriptionCancelled(
                    userEmail:           $user->email,
                    userId:              $user->id,
                    planName:            $planName,
                    billingCycle:        $billingCycle,
                    isAdminCopy:         true,
                    cancelType:          $cancelType,
                    accessUntil:         $accessUntil,
                    cancelledNewPlan:    $cancelledNewPlan,
                    cancelledNewBilling: $cancelledNewBilling,
                    subscriptionId:      $subId,
                    paddleCustomerId:    $user->paddle_customer_id ?? null,
                ));

                Log::info("Cancellation admin notification sent to: " . implode(', ', $adminEmails) . " (type={$cancelType})");
            } else {
                Log::warning("No MAIL_ADMIN_EMAILS configured — admin cancellation notification skipped.");
            }
        } catch (\Throwable $e) {
            Log::error("Failed to send admin cancellation email: " . $e->getMessage());
        }
    }

    // ── SEND RESUME EMAILS ────────────────────────────────────
    // Sends reactivation confirmation to user + all admins.
    // Called after a cancelled subscription is successfully resumed.
    private function sendResumeEmails(
        $user,
        Subscription $subscription,
    ): void {
        $planName     = is_string($subscription->plan_name)
            ? $subscription->plan_name
            : $subscription->plan_name->value;
        $billingCycle = $subscription->billing_cycle ?? 'monthly';
        $subId        = $subscription->paddle_subscription_id;
        $accessUntil  = $subscription->current_period_end?->format('M d, Y');

        // ── 1. Email to the user ──────────────────────────────
        try {
            Mail::to($user->email)->send(new SubscriptionResumed(
                userEmail:        $user->email,
                userId:           (int) $user->id,
                planName:         $planName,
                billingCycle:     $billingCycle,
                isAdminCopy:      false,
                accessUntil:      $accessUntil,
                subscriptionId:   $subId,
                paddleCustomerId: null,
            ));

            Log::info("Resume confirmation email sent to user: {$user->email}");
        } catch (\Throwable $e) {
            Log::error("Failed to send resume email to user {$user->email}: " . $e->getMessage());
        }

        // ── 2. Emails to all admins ───────────────────────────
        try {
            $adminEmails = $this->getAdminEmails();

            if (!empty($adminEmails)) {
                Mail::to($adminEmails)->send(new SubscriptionResumed(
                    userEmail:        $user->email,
                    userId:           (int) $user->id,
                    planName:         $planName,
                    billingCycle:     $billingCycle,
                    isAdminCopy:      true,
                    accessUntil:      $accessUntil,
                    subscriptionId:   $subId,
                    paddleCustomerId: $user->paddle_customer_id ?? null,
                ));

                Log::info("Resume admin notification sent to: " . implode(', ', $adminEmails));
            } else {
                Log::warning("No MAIL_ADMIN_EMAILS configured — admin resume notification skipped.");
            }
        } catch (\Throwable $e) {
            Log::error("Failed to send admin resume email: " . $e->getMessage());
        }
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

        // ── Auto-sync with Paddle ─────────────────────────────────
        if ($subscription
            && $subscription->paddle_subscription_id
            && $subscription->status->value === 'active'
        ) {
            try {
                $paddleResponse = Http::withHeaders($this->paddleHeaders())
                    ->get($this->paddleApiUrl("/subscriptions/{$subscription->paddle_subscription_id}"));

                if ($paddleResponse->successful()) {
                    $paddleData      = $paddleResponse->json('data');
                    $scheduledChange = $paddleData['scheduled_change'] ?? null;
                    $paddleStatus    = $paddleData['status'] ?? null;
                    $paddleAction    = $scheduledChange['action'] ?? null;

                    // ── Case 1: Paddle has scheduled cancel, DB doesn't know ──
                    if ($paddleAction === 'cancel' && ! $subscription->cancel_at_period_end) {
                        $subscription->update([
                            'cancel_at_period_end' => true,
                            'cancelled_at'         => now(),
                            'paddle_last_event'    => 'subscription.canceled_scheduled',
                        ]);
                        Cache::forget("sub_limit_{$user->id}");
                        $subscription->refresh();
                        Log::info("Auto-synced: scheduled cancellation detected from Paddle for user {$user->id}");
                    }

                    // ── Case 2: DB says cancelled but Paddle has NO scheduled cancel ──
                    if ($paddleAction !== 'cancel'
                        && $paddleStatus === 'active'
                        && $subscription->cancel_at_period_end
                    ) {
                        $subscription->update([
                            'cancel_at_period_end' => false,
                            'cancelled_at'         => null,
                            'status'               => 'active',
                            'paddle_last_event'    => 'subscription.resumed_synced',
                        ]);
                        Cache::forget("sub_limit_{$user->id}");
                        $subscription->refresh();
                        Log::info("Auto-synced: resumption detected from Paddle for user {$user->id}");
                    }

                    // ── Case 3: Paddle subscription is fully cancelled ───────
                    if ($paddleStatus === 'canceled') {
                        $freeLimits = config('plans.free');
                        $subscription->update([
                            'status'                   => 'cancelled',
                            'cancel_at_period_end'     => false,
                            'paddle_last_event'        => 'subscription.canceled_synced',
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
                        Log::info("Auto-synced: full cancellation detected from Paddle for user {$user->id}");
                    }
                }
            } catch (\Exception $e) {
                Log::warning('Paddle auto-sync check failed: ' . $e->getMessage());
            }
        }

        // ── Auto-apply scheduled plan change if date passed ──────
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
            'cancel_at_period_end'   => true,
            'cancelled_at'           => now(),
            'scheduled_plan'         => null,
            'scheduled_billing'      => null,
            'scheduled_effective_at' => null,
        ]);

        Cache::forget("sub_limit_{$user->id}");

        $accessUntil = $subscription->current_period_end?->format('M d, Y');

        // ── Send cancellation emails to user + admins ─────────
        $this->sendCancellationEmails(
            user:         $user,
            subscription: $subscription,
            cancelType:   'subscription',
            accessUntil:  $accessUntil,
        );

        return back()->with('success',
            'Your subscription has been cancelled. You keep full access until ' .
            $accessUntil .
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

        // ── Send reactivation emails to user + admins ─────────
        $this->sendResumeEmails(
            user:         $user,
            subscription: $subscription,
        );

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
        $oldBilling = $subscription->billing_cycle; // capture before DB update

        // ── Call Paddle API ───────────────────────────────────
        $paddleTransactionId = null;

        if ($subscription->paddle_subscription_id) {
            try {
                if ($isUpgrade && $when === 'immediately') {
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

                    // Capture the proration transaction ID if Paddle returns it
                    $paddleTransactionId = $response->json('data.immediate_transaction.id')
                        ?? $response->json('data.transaction_id')
                        ?? null;

                    Log::info("Paddle immediate upgrade response transaction ID: " . ($paddleTransactionId ?? 'null'));

                } else {
                    $r1 = Http::withHeaders($this->paddleHeaders())
                        ->patch($this->paddleApiUrl("/subscriptions/{$subscription->paddle_subscription_id}"), [
                            'items'                  => [['price_id' => $priceId, 'quantity' => 1]],
                            'proration_billing_mode' => 'do_not_bill',
                        ]);

                    if (! $r1->successful()) {
                        Log::error('Paddle plan swap failed (step 1): ' . $r1->body());
                        return back()->with('error', 'Failed to update plan via Paddle. Please try again.');
                    }

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

        // ── Update DB & resolve effective date string ─────────
        $effectiveAt = 'Immediately';
        $periodEnd   = null;

        if ($isUpgrade && $when === 'immediately') {
            $newPeriodEnd = $billing === 'annual'
                ? now()->addYear()
                : now()->addMonth();

            $periodEnd = $newPeriodEnd->format('M d, Y');

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
                'current_period_start'     => now(),
                'current_period_end'       => $newPeriodEnd,
                'next_billing_date'        => $newPeriodEnd,
                'last_payment_at'          => now(),
                'submissions_used'         => 0,
                'scheduled_plan'           => null,
                'scheduled_billing'        => null,
                'scheduled_effective_at'   => null,
            ]);

        } else {
            $effectiveDate = $subscription->next_billing_date
                ?? $subscription->current_period_end;

            $effectiveAt = $effectiveDate?->format('M d, Y') ?? 'Next renewal';

            $subscription->update([
                'paddle_price_id'        => $priceId,
                'paddle_last_event'      => 'plan_change_scheduled',
                'scheduled_plan'         => $plan,
                'scheduled_billing'      => $billing,
                'scheduled_effective_at' => $effectiveDate,
            ]);
        }

        Cache::forget("sub_limit_{$user->id}");

        // ── Email dispatch ────────────────────────────────────
        //
        // IMMEDIATE UPGRADES → SendUpgradeInvoiceEmail queued job
        // ─────────────────────────────────────────────────────────
        // Paddle generates the proration transaction asynchronously.
        // Sending the email right now would show a null amount and no
        // invoice. The job waits 15 s then retries every 30 s up to
        // 5×, polling Paddle until the transaction is billed/completed.
        // Only then does it send both the user and admin emails with
        // the correct amount, transaction ID, and invoice PDF link.
        //
        // SCHEDULED CHANGES → sent immediately via sendPlanUpgradeEmails()
        // ──────────────────────────────────────────────────────────────────
        // No payment occurs at this point so there is nothing to wait for.

        if ($isUpgrade && $when === 'immediately') {
            $adminEmails = $this->getAdminEmails();

            Log::info("Dispatching SendUpgradeInvoiceEmail job for user {$user->id}", [
                'old_plan'    => $currentPlan,
                'new_plan'    => $plan,
                'txn_id'      => $paddleTransactionId ?? 'null — job will search',
                'sub_id'      => $subscription->paddle_subscription_id,
                'admin_count' => count($adminEmails),
            ]);

            SendUpgradeInvoiceEmail::dispatch(
                user:                $user,
                oldPlan:             $currentPlan,
                oldBilling:          $oldBilling,
                newPlan:             $plan,
                newBilling:          $billing,
                effectiveAt:         $effectiveAt,
                subscriptionId:      $subscription->paddle_subscription_id,
                paddleTransactionId: $paddleTransactionId,
                periodEnd:           $periodEnd ?? '',
                adminEmails:         $adminEmails,
            )->delay(now()->addSeconds(15));

        } else {
            // Scheduled changes — no invoice to wait for, send immediately
            $this->sendPlanUpgradeEmails(
                user:           $user,
                oldPlan:        $currentPlan,
                oldBilling:     $oldBilling,
                newPlan:        $plan,
                newBilling:     $billing,
                effectiveAt:    $effectiveAt,
                isImmediate:    false,
                subscriptionId: $subscription->paddle_subscription_id,
            );
        }

        // ── Success message ───────────────────────────────────
        if ($isUpgrade && $when === 'immediately') {
            $msg = "Plan upgraded to " . ucfirst($plan) . " (" . ucfirst($billing) . ") successfully. New limits are active immediately.";
        } elseif ($isUpgrade) {
            $msg = "Upgrade to " . ucfirst($plan) . " (" . ucfirst($billing) . ") scheduled for " . ($subscription->next_billing_date?->format('M d, Y') ?? 'next renewal') . ". No charge today.";
        } else {
            $msg = "Plan changed to " . ucfirst($plan) . " (" . ucfirst($billing) . ") scheduled for " . ($subscription->next_billing_date?->format('M d, Y') ?? 'next renewal') . ". Current limits remain until then.";
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

        // Capture scheduled plan info before wiping it
        $cancelledNewPlan    = $subscription->scheduled_plan;
        $cancelledNewBilling = $subscription->scheduled_billing;

        if ($subscription->paddle_subscription_id) {
            try {
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

        // ── Send scheduled-change cancellation emails ─────────
        $this->sendCancellationEmails(
            user:                $user,
            subscription:        $subscription,
            cancelType:          'scheduled_change',
            cancelledNewPlan:    $cancelledNewPlan,
            cancelledNewBilling: $cancelledNewBilling,
        );

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

    // ── FORMAT AMOUNT ─────────────────────────────────────────
    private function formatAmount(int $amount, string $currency): string
    {
        $value  = $amount / 100;
        $symbol = match(strtoupper($currency)) {
            'INR'  => '₹',
            'GBP'  => '£',
            'EUR'  => '€',
            'JPY'  => '¥',
            'AUD'  => 'A$',
            'CAD'  => 'C$',
            default => '$',
        };

        $noDecimals = ['INR', 'JPY', 'KRW', 'VND', 'IDR'];
        $decimals   = in_array(strtoupper($currency), $noDecimals) ? 0 : 2;

        return $symbol . number_format($value, $decimals);
    }
}