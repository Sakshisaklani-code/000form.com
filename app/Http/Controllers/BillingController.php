<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\SubscriptionInvoice;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class BillingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ── BILLING PORTAL PAGE ───────────────────────────────────
    public function index(Request $request): View
    {
        $user = $request->user();

        $subscription = Subscription::where('user_id', $user->id)
            ->latest()
            ->first();

        $invoices = collect();
        if ($subscription) {
            $invoices = SubscriptionInvoice::where('user_id', $user->id)
                ->latest('paid_at')
                ->take(12)
                ->get();
        }

        return view('billing.portal', compact('user', 'subscription', 'invoices'));
    }

    // ── CANCEL SUBSCRIPTION ───────────────────────────────────
    // Cancels at period end — user keeps access until then
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

        // If subscription has a Paddle ID — cancel via Paddle API
        if ($subscription->paddle_subscription_id) {
            try {
                // Cancel via Cashier
                $user->subscription('default')->cancel();
            } catch (\Exception $e) {
                Log::warning('Paddle cancel failed, updating DB directly: ' . $e->getMessage());
            }
        }

        // Update DB immediately so UI reflects it now
        $subscription->update([
            'cancel_at_period_end' => true,
            'cancelled_at'         => now(),
        ]);

        return back()->with('success',
            'Your subscription has been cancelled. You keep full access until ' .
            $subscription->current_period_end?->format('M d, Y') . '.'
        );
    }

    // ── RESUME SUBSCRIPTION ───────────────────────────────────
    public function resume(Request $request): RedirectResponse
    {
        $user = $request->user();

        $subscription = Subscription::where('user_id', $user->id)
            ->where('cancel_at_period_end', true)
            ->where('current_period_end', '>', now())
            ->first();

        if (! $subscription) {
            return back()->with('error', 'No cancelled subscription to reactivate.');
        }

        if ($subscription->paddle_subscription_id) {
            try {
                $user->subscription('default')->stopCancelation();
            } catch (\Exception $e) {
                Log::warning('Paddle resume failed, updating DB directly: ' . $e->getMessage());
            }
        }

        $subscription->update([
            'cancel_at_period_end' => false,
            'cancelled_at'         => null,
        ]);

        return back()->with('success', 'Your subscription has been reactivated successfully.');
    }

    // ── CHANGE PLAN (upgrade / downgrade) ────────────────────
    public function changePlan(Request $request): RedirectResponse
    {
        $request->validate([
            'plan'    => 'required|in:personal,professional,business',
            'billing' => 'required|in:monthly,annual',
        ]);

        $user    = $request->user();
        $plan    = $request->input('plan');
        $billing = $request->input('billing');
        $priceId = config("plans.{$plan}.paddle_{$billing}_id");

        $subscription = Subscription::where('user_id', $user->id)
            ->whereIn('status', ['active', 'trialing', 'past_due'])
            ->first();

        if (! $subscription) {
            return back()->with('error', 'No active subscription found.');
        }

        if (! $priceId) {
            return back()->with('error', 'Selected plan is not available.');
        }

        // Same plan check
        $currentPlan = is_string($subscription->plan_name)
            ? $subscription->plan_name
            : $subscription->plan_name->value;

        if ($currentPlan === $plan && $subscription->billing_cycle === $billing) {
            return back()->with('error', 'You are already on this plan.');
        }

        // If has Paddle subscription ID — swap via API
        if ($subscription->paddle_subscription_id) {
            try {
                $user->subscription('default')->swap($priceId);
                return back()->with('success', 'Your plan has been updated successfully.');
            } catch (\Exception $e) {
                Log::error('Plan swap failed: ' . $e->getMessage());
                return back()->with('error', 'Failed to update plan: ' . $e->getMessage());
            }
        }

        // No Paddle ID yet (manually created subscription) — update DB directly
        $planRank    = ['free' => 0, 'personal' => 1, 'professional' => 2, 'business' => 3];
        $currentRank = $planRank[$currentPlan] ?? 0;
        $newRank     = $planRank[$plan] ?? 0;
        $isUpgrade   = $newRank > $currentRank;

        $limits = config("plans.{$plan}");

        $subscription->update([
            'plan_name'                => $plan,
            'billing_cycle'            => $billing,
            'paddle_price_id'          => $priceId,
            'submissions_limit'        => $isUpgrade ? $limits['submissions']      : $subscription->submissions_limit,
            'file_upload_limit_mb'     => $isUpgrade ? $limits['file_upload_mb']   : $subscription->file_upload_limit_mb,
            'team_members_limit'       => $isUpgrade ? $limits['team_members']     : $subscription->team_members_limit,
            'webhooks_enabled'         => $isUpgrade ? $limits['webhooks']         : $subscription->webhooks_enabled,
            'role_permissions_enabled' => $isUpgrade ? $limits['role_permissions'] : $subscription->role_permissions_enabled,
        ]);

        return back()->with('success', 'Your plan has been updated to ' . ucfirst($plan) . '.');
    }

    // ── PADDLE CUSTOMER PORTAL (update payment method) ────────
    public function portalLink(Request $request): RedirectResponse
    {
        try {
            $portalUrl = $request->user()->billingPortalUrl(route('billing.portal'));
            return redirect($portalUrl);
        } catch (\Exception $e) {
            return back()->with('error', 'Unable to open payment portal. Please try again.');
        }
    }
}