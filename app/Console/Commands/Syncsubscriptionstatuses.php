<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use App\Services\PaddleService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class SyncSubscriptionStatuses extends Command
{
    protected $signature   = 'subscriptions:sync {--dry-run : Preview changes without saving}';
    protected $description = 'Sync subscription statuses from Paddle API (runs every 6 hours)';

    public function __construct(private PaddleService $paddle)
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $this->info('🔄 Starting subscription sync...');
        $dryRun = $this->option('dry-run');

        // Only sync active/past_due subscriptions — no need to check cancelled ones
        $subscriptions = Subscription::whereIn('status', [
            \App\Enums\SubscriptionStatus::Active->value,
            \App\Enums\SubscriptionStatus::PastDue->value,
            \App\Enums\SubscriptionStatus::Trialing->value,
        ])
            ->whereNotNull('paddle_subscription_id')
            ->get();

        $this->info("Found {$subscriptions->count()} subscriptions to sync.");

        $stats = ['synced' => 0, 'changed' => 0, 'errors' => 0];

        foreach ($subscriptions as $subscription) {
            try {
                $paddleData = $this->paddle->getSubscription($subscription->paddle_subscription_id);

                if (!$paddleData) {
                    $this->warn("  ⚠ Could not fetch #{$subscription->id} from Paddle");
                    $stats['errors']++;
                    continue;
                }

                $newStatus   = $this->mapPaddleStatus($paddleData['status']);
                $nextBillAt  = isset($paddleData['next_billing_date'])
                    ? Carbon::parse($paddleData['next_billing_date'])
                    : null;

                $hasChanges = $subscription->status->value !== $newStatus
                    || ($nextBillAt && $subscription->next_billing_date?->ne($nextBillAt));

                if ($hasChanges) {
                    $this->line("  ✏ #{$subscription->id}: {$subscription->status->value} → {$newStatus}");
                    $stats['changed']++;

                    if (!$dryRun) {
                        $subscription->update([
                            'status'        => $newStatus,
                            'next_billing_date'=> $nextBillAt,
                            'paddle_status' => $paddleData['status'], // raw paddle status
                        ]);
                    }
                }

                $stats['synced']++;
            } catch (\Exception $e) {
                Log::error('Subscription sync failed', [
                    'subscription_id' => $subscription->id,
                    'error'           => $e->getMessage(),
                ]);
                $stats['errors']++;
            }
        }

        $this->info("✅ Done — Synced: {$stats['synced']}, Changed: {$stats['changed']}, Errors: {$stats['errors']}");
        return Command::SUCCESS;
    }

    /**
     * Map Paddle subscription statuses to your local statuses.
     * Paddle statuses: active, canceled, past_due, paused, trialing
     */
    private function mapPaddleStatus(string $paddleStatus): string
    {
        return match ($paddleStatus) {
            'active'    => 'active',
            'trialing'  => 'trialing',
            'past_due'  => 'past_due',
            'paused'    => 'paused',
            'canceled'  => 'cancelled',
            default     => 'unknown',
        };
    }
}