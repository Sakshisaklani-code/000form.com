<?php

namespace App\Console\Commands;

use App\Jobs\ProcessPaddleWebhook;
use App\Models\WebhookLog;
use Illuminate\Console\Command;

class SyncPaddleWebhooks extends Command
{
    protected $signature   = 'paddle:sync';
    protected $description = 'Process all pending Paddle webhooks';

    public function handle(): void
    {
        $pending = WebhookLog::where('status', 'pending')->get();

        if ($pending->isEmpty()) {
            $this->info('No pending webhooks.');
            return;
        }

        $this->info("Processing {$pending->count()} webhooks...");

        foreach ($pending as $log) {
            try {
                ProcessPaddleWebhook::dispatchSync($log->id);
                $this->info("✓ {$log->event_type}");
            } catch (\Exception $e) {
                $this->error("✗ {$log->event_type} — {$e->getMessage()}");
            }
        }

        $this->info('Done.');
    }
}