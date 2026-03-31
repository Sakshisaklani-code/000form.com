<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use App\Enums\SubscriptionStatus;

class ReconcileSubscriptions extends Command
{
    protected $signature = 'subscriptions:reconcile';
    protected $description = 'Reconcile subscription statuses based on billing date and payment status.';

    public function handle(): void
    {
        $now = now();

        $this->info('Checking subscriptions...');

        $subscriptions = Subscription::whereIn('status', [
            SubscriptionStatus::Active->value,
            SubscriptionStatus::PastDue->value,
            SubscriptionStatus::Expired->value, // ✅ include expired for recovery
        ])->get();

        foreach ($subscriptions as $sub) {

            // Skip cancelled, paused, trialing
            if (in_array($sub->status, [
                SubscriptionStatus::Cancelled->value,
                SubscriptionStatus::Paused->value,
                SubscriptionStatus::Trialing->value,
            ])) {
                continue;
            }

            // ❌ CASE 1: Payment failed → Expired
            if ($sub->next_billing_date && $sub->next_billing_date->lt($now)) {

                if ($sub->status !== SubscriptionStatus::Expired->value) {
                    $sub->status = SubscriptionStatus::Expired;
                    $sub->save();

                    $this->error("Expired (payment failed): {$sub->id}");
                }

                continue;
            }

            // ✅ CASE 2: Payment recovered → Active
            if ($sub->next_billing_date && $sub->next_billing_date->gt($now)) {

                if ($sub->status !== SubscriptionStatus::Active->value) {
                    $sub->status = SubscriptionStatus::Active;
                    $sub->save();

                    $this->info("Activated (payment received): {$sub->id}");
                }

                continue;
            }
        }

        $this->info('Done.');
    }
}