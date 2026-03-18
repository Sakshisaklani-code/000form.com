<?php

namespace App\Jobs;

use App\Enums\PlanName;
use App\Enums\SubscriptionStatus;
use App\Models\Subscription;
use App\Models\SubscriptionInvoice;
use App\Models\User;
use App\Models\WebhookLog;
use App\Models\PlanChangeLog;
use App\Services\SubmissionGateService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProcessPaddleWebhook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries   = 3;
    public int $timeout = 60;

    public function __construct(private int $webhookLogId) {}

    public function handle(): void
    {
        $log = WebhookLog::findOrFail($this->webhookLogId);

        // Already processed — skip
        if ($log->status === 'success') {
            return;
        }

        // Cache lock to prevent duplicate processing
        $lock = Cache::lock('paddle_event_' . $log->event_id, 30);

        if (! $lock->get()) {
            $this->release(10);
            return;
        }

        try {
            DB::transaction(function () use ($log) {
                $payload = is_string($log->payload)
                    ? json_decode($log->payload, true)
                    : $log->payload;
                $this->route($log->event_type, $payload);

                $log->update([
                    'status'       => 'success',
                    'processed_at' => now(),
                ]);
            });
        } catch (\Throwable $e) {
            $log->update([
                'status'        => 'failed',
                'error_message' => $e->getMessage(),
            ]);
            Log::error("Webhook failed [{$log->event_id}]: " . $e->getMessage());
            throw $e;
        } finally {
            $lock->release();
        }
    }

    // ── ROUTE TO CORRECT HANDLER ──────────────────────────────
    private function route(string $type, array $payload): void
    {
        // payload may be stored as JSON string — decode if needed
        $data = is_string($payload) ? json_decode($payload, true) : $payload;

        match($type) {
            'subscription.created'       => $this->onSubscriptionCreated($data),
            'subscription.activated'     => $this->onSubscriptionActivated($data),
            'subscription.updated'       => $this->onSubscriptionUpdated($data),
            'subscription.canceled',
            'subscription.cancelled'     => $this->onSubscriptionCancelled($data),
            'subscription.paused'        => $this->onSubscriptionPaused($data),
            'subscription.resumed'       => $this->onSubscriptionResumed($data),
            'subscription.past_due'      => $this->onSubscriptionPastDue($data),
            'transaction.completed'      => $this->onTransactionCompleted($data),
            'transaction.payment_failed' => $this->onPaymentFailed($data),
            default => Log::info("Paddle unhandled event: {$type}"),
        };
    }

    // ── SUBSCRIPTION CREATED ──────────────────────────────────
    private function onSubscriptionCreated(array $payload): void
    {
        $data = $payload['data'];

        // Get user_id from custom_data
        $userId = $data['custom_data']['user_id'] ?? null;

        if (! $userId) {
            Log::error('subscription.created: no user_id in custom_data', ['data' => $data]);
            return;
        }

        $user = User::find($userId);
        if (! $user) {
            Log::error("subscription.created: user {$userId} not found");
            return;
        }

        $priceId      = $data['items'][0]['price']['id'] ?? null;
        $plan         = $this->getPlan($priceId);
        $limits       = config("plans.{$plan}");
        $billingCycle = $this->getBillingCycle($data);

        Subscription::updateOrCreate(
            ['paddle_subscription_id' => $data['id']],
            [
                'user_id'                   => $user->id,
                'paddle_subscription_id'    => $data['id'],
                'paddle_customer_id'        => $data['customer_id'] ?? null,
                'paddle_price_id'           => $priceId,
                'plan_name'                 => $plan,
                'billing_cycle'             => $billingCycle,
                'status'                    => 'active',
                'submissions_limit'         => $limits['submissions'],
                'submissions_used'          => 0,
                'file_upload_limit_mb'      => $limits['file_upload_mb'],
                'team_members_limit'        => $limits['team_members'],
                'webhooks_enabled'          => $limits['webhooks'],
                'role_permissions_enabled'  => $limits['role_permissions'],
                'current_period_start'      => isset($data['current_billing_period']['starts_at'])
                    ? \Carbon\Carbon::parse($data['current_billing_period']['starts_at'])
                    : now(),
                'current_period_end'        => isset($data['current_billing_period']['ends_at'])
                    ? \Carbon\Carbon::parse($data['current_billing_period']['ends_at'])
                    : now()->addMonth(),
                'next_billing_date'         => isset($data['next_billed_at'])
                    ? \Carbon\Carbon::parse($data['next_billed_at'])
                    : now()->addMonth(),
                'cancel_at_period_end'      => false,
                'paddle_last_event'         => 'subscription.created',
            ]
        );

        // Clear submission cache
        Cache::forget("sub_limit_{$user->id}");

        Log::info("Subscription created for user {$user->id} — plan: {$plan}");
    }

    // ── SUBSCRIPTION ACTIVATED (trial → paid) ─────────────────
    private function onSubscriptionActivated(array $payload): void
    {
        $data = $payload['data'];
        $sub  = Subscription::where('paddle_subscription_id', $data['id'])->first();

        if (! $sub) {
            // May not exist yet — treat like created
            $this->onSubscriptionCreated($payload);
            return;
        }

        $sub->update([
            'status'            => 'active',
            'trial_ends_at'     => null,
            'paddle_last_event' => 'subscription.activated',
        ]);

        Cache::forget("sub_limit_{$sub->user_id}");
    }

    // ── SUBSCRIPTION UPDATED (plan change) ───────────────────
    private function onSubscriptionUpdated(array $payload): void
    {
        $data = $payload['data'];
        $sub  = Subscription::where('paddle_subscription_id', $data['id'])->first();

        if (! $sub) return;

        $newPriceId   = $data['items'][0]['price']['id'] ?? null;
        $newPlan      = $this->getPlan($newPriceId);
        $oldPlan      = is_string($sub->plan_name) ? $sub->plan_name : $sub->plan_name->value;
        $planRank     = ['free' => 0, 'personal' => 1, 'professional' => 2, 'business' => 3];
        $isUpgrade    = ($planRank[$newPlan] ?? 0) > ($planRank[$oldPlan] ?? 0);
        $newLimits    = config("plans.{$newPlan}");

        // Log plan change
        if ($newPlan !== $oldPlan) {
            PlanChangeLog::create([
                'user_id'         => $sub->user_id,
                'from_plan'       => $oldPlan,
                'to_plan'         => $newPlan,
                'from_price'      => config("plans.{$oldPlan}.price_monthly", 0),
                'to_price'        => config("plans.{$newPlan}.price_monthly", 0),
                'paddle_event_id' => $payload['event_id'] ?? null,
                'changed_at'      => now(),
            ]);
        }

        $updates = [
            'paddle_price_id'    => $newPriceId,
            'plan_name'          => $newPlan,
            'billing_cycle'      => $this->getBillingCycle($data),
            'current_period_end' => isset($data['current_billing_period']['ends_at'])
                ? \Carbon\Carbon::parse($data['current_billing_period']['ends_at'])
                : $sub->current_period_end,
            'next_billing_date'  => isset($data['next_billed_at'])
                ? \Carbon\Carbon::parse($data['next_billed_at'])
                : null,
            'paddle_last_event'  => 'subscription.updated',
        ];

        // Apply new limits immediately on upgrade only
        if ($isUpgrade) {
            $updates += [
                'submissions_limit'        => $newLimits['submissions'],
                'file_upload_limit_mb'     => $newLimits['file_upload_mb'],
                'team_members_limit'       => $newLimits['team_members'],
                'webhooks_enabled'         => $newLimits['webhooks'],
                'role_permissions_enabled' => $newLimits['role_permissions'],
            ];
        }

        $sub->update($updates);
        Cache::forget("sub_limit_{$sub->user_id}");
    }

    // ── SUBSCRIPTION CANCELLED ────────────────────────────────
    private function onSubscriptionCancelled(array $payload): void
    {
        $data = $payload['data'];
        $sub  = Subscription::where('paddle_subscription_id', $data['id'])->first();

        if (! $sub) return;

        $sub->update([
            'cancel_at_period_end' => true,
            'cancelled_at'         => now(),
            'paddle_last_event'    => 'subscription.cancelled',
        ]);

        Cache::forget("sub_limit_{$sub->user_id}");
    }

    // ── SUBSCRIPTION PAUSED ───────────────────────────────────
    private function onSubscriptionPaused(array $payload): void
    {
        $data = $payload['data'];
        $sub  = Subscription::where('paddle_subscription_id', $data['id'])->first();

        if (! $sub) return;

        $sub->update([
            'status'            => 'paused',
            'paused_at'         => now(),
            'paddle_last_event' => 'subscription.paused',
        ]);

        Cache::forget("sub_limit_{$sub->user_id}");
    }

    // ── SUBSCRIPTION RESUMED ──────────────────────────────────
    private function onSubscriptionResumed(array $payload): void
    {
        $data = $payload['data'];
        $sub  = Subscription::where('paddle_subscription_id', $data['id'])->first();

        if (! $sub) return;

        $sub->update([
            'status'            => 'active',
            'paused_at'         => null,
            'paddle_last_event' => 'subscription.resumed',
        ]);

        Cache::forget("sub_limit_{$sub->user_id}");
    }

    // ── SUBSCRIPTION PAST DUE ─────────────────────────────────
    private function onSubscriptionPastDue(array $payload): void
    {
        $data = $payload['data'];
        $sub  = Subscription::where('paddle_subscription_id', $data['id'])->first();

        if (! $sub) return;

        $sub->update([
            'status'               => 'past_due',
            'grace_period_ends_at' => now()->addDays(3),
            'paddle_last_event'    => 'subscription.past_due',
        ]);

        Cache::forget("sub_limit_{$sub->user_id}");
    }

    // ── TRANSACTION COMPLETED (payment success) ───────────────
    private function onTransactionCompleted(array $payload): void
    {
        $data    = $payload['data'];
        $paddleSubId = $data['subscription_id'] ?? null;

        if (! $paddleSubId) return;

        $sub = Subscription::where('paddle_subscription_id', $paddleSubId)->first();

        if (! $sub) return;

        $sub->update([
            'status'               => 'active',
            'submissions_used'     => 0,
            'grace_period_ends_at' => null,
            'last_payment_at'      => now(),
            'current_period_start' => isset($data['billing_period']['starts_at'])
                ? \Carbon\Carbon::parse($data['billing_period']['starts_at'])
                : now(),
            'current_period_end'   => isset($data['billing_period']['ends_at'])
                ? \Carbon\Carbon::parse($data['billing_period']['ends_at'])
                : now()->addMonth(),
            'paddle_last_event'    => 'transaction.completed',
        ]);

        // Log invoice
        $total = $data['details']['totals']['total'] ?? 0;
        $currency = $data['currency_code'] ?? 'USD';

        SubscriptionInvoice::updateOrCreate(
            ['paddle_transaction_id' => $data['id']],
            [
                'user_id'               => $sub->user_id,
                'subscription_id'       => $sub->id,
                'paddle_transaction_id' => $data['id'],
                'amount_cents'          => (int) $total,
                'currency'              => $currency,
                'status'                => 'completed',
                'paid_at'               => now(),
                'invoice_url'           => $data['invoice_pdf'] ?? null,
            ]
        );

        Cache::forget("sub_limit_{$sub->user_id}");
        Log::info("Transaction completed for subscription {$paddleSubId}");
    }

    // ── PAYMENT FAILED ────────────────────────────────────────
    private function onPaymentFailed(array $payload): void
    {
        $data        = $payload['data'];
        $paddleSubId = $data['subscription_id'] ?? null;

        if (! $paddleSubId) return;

        $sub = Subscription::where('paddle_subscription_id', $paddleSubId)->first();

        if (! $sub) return;

        $sub->update([
            'status'               => 'past_due',
            'grace_period_ends_at' => now()->addDays(3),
            'paddle_last_event'    => 'transaction.payment_failed',
        ]);

        Cache::forget("sub_limit_{$sub->user_id}");
    }

    // ── HELPERS ───────────────────────────────────────────────

    private function getPlan(?string $priceId): string
    {
        if (! $priceId) return 'personal';

        $map = [
            config('plans.personal.paddle_monthly_id')     => 'personal',
            config('plans.personal.paddle_annual_id')      => 'personal',
            config('plans.professional.paddle_monthly_id') => 'professional',
            config('plans.professional.paddle_annual_id')  => 'professional',
            config('plans.business.paddle_monthly_id')     => 'business',
            config('plans.business.paddle_annual_id')      => 'business',
        ];

        return $map[$priceId] ?? 'personal';
    }

    private function getBillingCycle(array $data): string
    {
        $interval = $data['items'][0]['price']['billing_cycle']['interval']
            ?? $data['billing_cycle']['interval']
            ?? 'month';

        return $interval === 'year' ? 'annual' : 'monthly';
    }
}