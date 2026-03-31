<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;

/**
 * LOCAL TESTING ONLY — simulates a failed renewal payment scenario
 * DO NOT deploy this command to production.
 *
 * Usage:
 *   php artisan subscriptions:test-failed-payment --user=1
 *   php artisan subscriptions:test-failed-payment --user=1 --hours-overdue=50
 *   php artisan subscriptions:test-failed-payment --user=1 --days-overdue=8
 *   php artisan subscriptions:test-failed-payment --reset --user=1
 */
class TestFailedPayment extends Command
{
    protected $signature = 'subscriptions:test-failed-payment
                            {--user=1 : User ID to test with}
                            {--hours-overdue=0 : Simulate payment being overdue by N hours}
                            {--days-overdue=0 : Simulate payment being overdue by N days}
                            {--reset : Reset the subscription back to active}
                            {--simulate-webhook : Also fire the webhook handling logic}';

    protected $description = '[LOCAL TESTING] Simulate a declined renewal payment for a subscription';

    public function handle(): int
    {
        if (app()->isProduction()) {
            $this->error('❌ This command cannot run in production!');
            return Command::FAILURE;
        }

        $userId = $this->option('user');
        $user   = User::find($userId);

        if (!$user) {
            $this->error("User #{$userId} not found.");
            return Command::FAILURE;
        }

        $subscription = Subscription::where('user_id', $userId)
            ->whereIn('status', ['active', 'past_due', 'expired'])
            ->latest()
            ->first();

        if (!$subscription) {
            $this->error("No active/past_due subscription found for user #{$userId}.");
            $this->info("Create a subscription first, or check the user ID.");
            return Command::FAILURE;
        }

        // ── RESET MODE ────────────────────────────────────────────────────
        if ($this->option('reset')) {
            $subscription->update([
                'status'                    => 'active',
                'paddle_status'             => 'active',
                'past_due_since'            => null,
                'access_restricted'         => false,
                'last_payment_reminder_at'  => null,
                'expired_at'                => null,
            ]);
            $this->info("✅ Subscription #{$subscription->id} reset to active.");
            return Command::SUCCESS;
        }

        // ── SIMULATE DECLINED CARD ────────────────────────────────────────
        $hoursOverdue = (int) $this->option('hours-overdue');
        $daysOverdue  = (int) $this->option('days-overdue');

        if ($daysOverdue > 0) {
            $hoursOverdue = $daysOverdue * 24;
        }

        $pastDueSince = $hoursOverdue > 0
            ? now()->subHours($hoursOverdue)
            : now();

        $this->info("🔴 Simulating failed renewal for subscription #{$subscription->id}");
        $this->info("   User: {$user->email}");
        $this->info("   Past due since: {$pastDueSince->toDateTimeString()} ({$hoursOverdue}h ago)");

        // Step 1: Update subscription to past_due (mimics what webhook would do)
        $subscription->update([
            'status'         => 'past_due',
            'paddle_status'  => 'past_due',
            'past_due_since' => $pastDueSince,
        ]);

        $this->info("\n   ✅ Subscription marked as past_due");

        // Step 2: Log a failed payment record
        \DB::table('subscription_payments')->insert([
            'subscription_id'       => $subscription->id,
            'user_id'               => $userId,
            'paddle_transaction_id' => 'test_txn_' . uniqid(),
            'amount'                => $subscription->price ?? 999,
            'currency'              => 'USD',
            'status'                => 'failed',
            'failure_reason'        => 'card_declined',
            'attempted_at'          => now(),
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);
        $this->info("   ✅ Failed payment record created (reason: card_declined)");

        // Step 3: Run the cron handler to see what it does
        $this->info("\n🔄 Running subscriptions:handle-past-due to process this...\n");
        Artisan::call('subscriptions:handle-past-due', [], $this->output);

        // Step 4: Show result
        $subscription->refresh();
        $this->newLine();
        $this->info("📊 Final State:");
        $this->table(
            ['Field', 'Value'],
            [
                ['status',                  $subscription->status],
                ['past_due_since',          $subscription->past_due_since ?? 'null'],
                ['access_restricted',       $subscription->access_restricted ? 'YES' : 'no'],
                ['last_payment_reminder_at',$subscription->last_payment_reminder_at ?? 'null'],
                ['expired_at',             $subscription->expired_at ?? 'null'],
            ]
        );

        $this->newLine();
        $this->info("💡 To test different stages:");
        $this->line("   Grace period (0-48h):  php artisan subscriptions:test-failed-payment --user={$userId} --hours-overdue=12");
        $this->line("   Access restricted:     php artisan subscriptions:test-failed-payment --user={$userId} --hours-overdue=50");
        $this->line("   Hard cutoff (7d+):     php artisan subscriptions:test-failed-payment --user={$userId} --days-overdue=8");
        $this->line("   Reset to active:       php artisan subscriptions:test-failed-payment --user={$userId} --reset");

        return Command::SUCCESS;
    }
}