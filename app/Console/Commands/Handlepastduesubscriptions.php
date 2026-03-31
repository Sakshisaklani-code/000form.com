<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use App\Models\User;
use App\Notifications\SubscriptionPaymentFailed;
use App\Notifications\SubscriptionGracePeriodWarning;
use App\Notifications\SubscriptionExpired;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class HandlePastDueSubscriptions extends Command
{
    protected $signature   = 'subscriptions:handle-past-due {--dry-run}';
    protected $description = 'Downgrade/notify users with past_due subscriptions (runs every 2 hours)';

    // Grace period: how long we allow past_due before restricting access
    const GRACE_PERIOD_HOURS = 48;

    // Hard cutoff: cancel local subscription after this many days of past_due
    const HARD_CUTOFF_DAYS = 7;

    public function handle(): int
    {
        $this->info('🔍 Checking past_due subscriptions...');
        $dryRun = $this->option('dry-run');
        $now    = Carbon::now();

        $pastDue = Subscription::where('status', 'past_due')
            ->whereNotNull('grace_period_ends_at')
            ->get();

        $this->info("Found {$pastDue->count()} past_due subscriptions.");

        foreach ($pastDue as $subscription) {
            $graceEndsAt  = Carbon::parse($subscription->grace_period_ends_at);
            $pastDueSince = $graceEndsAt->copy()->subHours(48); // estimate start
            $hoursOverdue = $pastDueSince->diffInHours($now);
            $daysOverdue  = $pastDueSince->diffInDays($now);

            $this->line("\n  📋 Sub #{$subscription->id} | User: {$subscription->user_id}");
            $this->line("     Grace period ends: {$graceEndsAt->toDateTimeString()}");
            $this->line("     Hours overdue: {$hoursOverdue}h");

            // Stage 1: Still within grace period
            if ($now->lt($graceEndsAt)) {
                $this->line('     🟡 In grace period — sending reminder');
                if (!$dryRun) {
                    $this->sendGracePeriodNotification($subscription, $hoursOverdue);
                }
                continue;
            }

            // Stage 2: Grace period expired but under 7 days
            if ($daysOverdue < 7) {
                $this->line('     🔴 Grace period expired — access should be restricted');
                if (!$dryRun) {
                    $subscription->update([
                        'status' => 'past_due', // keep past_due, your middleware checks grace_period_ends_at
                    ]);
                    $this->sendPaymentFailedNotification($subscription, $daysOverdue);
                }
                continue;
            }

            // Stage 3: Hard cutoff — 7+ days
            $this->line('     ⛔ Hard cutoff — marking as expired');
            if (!$dryRun) {
                $subscription->update([
                    'status'       => 'expired',
                    'cancelled_at' => $now,  // reuse cancelled_at for expiry timestamp
                ]);
                $this->sendExpiredNotification($subscription);
            }
        }

        $this->info("\n✅ Done.");
        return Command::SUCCESS;
    }

    private function sendGracePeriodNotification(Subscription $subscription, int $hoursOverdue): void
    {
        // Only notify once per 12 hours to avoid spam
        $lastNotified = $subscription->last_payment_reminder_at;
        if ($lastNotified && Carbon::parse($lastNotified)->diffInHours(now()) < 12) {
            return;
        }
        $subscription->user->notify(new SubscriptionGracePeriodWarning($subscription, $hoursOverdue));
        $subscription->update(['last_payment_reminder_at' => now()]);
    }

    private function sendPaymentFailedNotification(Subscription $subscription, int $daysOverdue): void
    {
        $lastNotified = $subscription->last_payment_reminder_at;
        if ($lastNotified && Carbon::parse($lastNotified)->diffInHours(now()) < 24) {
            return;
        }
        $subscription->user->notify(new SubscriptionPaymentFailed($subscription, $daysOverdue));
        $subscription->update(['last_payment_reminder_at' => now()]);
    }

    private function sendExpiredNotification(Subscription $subscription): void
    {
        $subscription->user->notify(new SubscriptionExpired($subscription));
    }
}