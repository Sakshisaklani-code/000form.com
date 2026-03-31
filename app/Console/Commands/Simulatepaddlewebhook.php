<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

/**
 * LOCAL TESTING ONLY — sends fake Paddle webhook payloads to your local app
 * to test the PaddleWebhookController without needing a real Paddle sandbox.
 *
 * Usage:
 *   php artisan paddle:simulate-webhook payment_failed --sub-id=sub_test_123
 *   php artisan paddle:simulate-webhook payment_succeeded --sub-id=sub_test_123
 *   php artisan paddle:simulate-webhook subscription_updated --sub-id=sub_test_123 --status=past_due
 */
class SimulatePaddleWebhook extends Command
{
    protected $signature = 'paddle:simulate-webhook
                            {event : Event type (payment_failed|payment_succeeded|subscription_updated)}
                            {--sub-id=sub_test_001 : Paddle subscription ID in your DB}
                            {--status=past_due : For subscription_updated, the new status}
                            {--url= : Webhook URL (default: http://localhost:8000/paddle/webhook)}';

    protected $description = '[LOCAL TESTING] Send a fake Paddle webhook to your local app';

    public function handle(): int
    {
        if (app()->isProduction()) {
            $this->error('❌ Cannot run in production!');
            return Command::FAILURE;
        }

        $event   = $this->argument('event');
        $subId   = $this->option('sub-id');
        $url     = $this->option('url') ?: 'http://localhost:8000/paddle/webhook';
        $status  = $this->option('status');

        $payload = $this->buildPayload($event, $subId, $status);

        if (!$payload) {
            $this->error("Unknown event: {$event}");
            $this->info("Available: payment_failed, payment_succeeded, subscription_updated");
            return Command::FAILURE;
        }

        $this->info("📡 Sending '{$event}' webhook to {$url}");
        $this->line("   Payload: " . json_encode($payload, JSON_PRETTY_PRINT));

        try {
            // Skip signature verification for local testing
            // Set PADDLE_SKIP_SIGNATURE=true in your .env.testing
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'X-Test-Mode'  => 'true',
            ])->post($url, $payload);

            if ($response->successful()) {
                $this->info("✅ Webhook accepted (HTTP {$response->status()})");
            } else {
                $this->error("❌ Webhook rejected (HTTP {$response->status()})");
                $this->line("   Response: " . $response->body());
            }
        } catch (\Exception $e) {
            $this->error("❌ Request failed: " . $e->getMessage());
            $this->info("   Is your local server running? php artisan serve");
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }

    private function buildPayload(string $event, string $subId, string $status): ?array
    {
        $now = now()->toIso8601String();

        return match ($event) {
            'payment_failed' => [
                'event_type'     => 'transaction.payment_failed',
                'occurred_at'    => $now,
                'notification_id'=> 'ntf_test_' . uniqid(),
                'data' => [
                    'id'              => 'txn_test_' . uniqid(),
                    'subscription_id' => $subId,
                    'status'          => 'error',
                    'currency_code'   => 'USD',
                    'details' => [
                        'totals' => ['grand_total' => 999],
                    ],
                    'payments' => [
                        ['error_code' => 'card_declined', 'method_details' => ['card' => ['last4' => '0002']]],
                    ],
                ],
            ],

            'payment_succeeded' => [
                'event_type'     => 'transaction.completed',
                'occurred_at'    => $now,
                'notification_id'=> 'ntf_test_' . uniqid(),
                'data' => [
                    'id'              => 'txn_test_' . uniqid(),
                    'subscription_id' => $subId,
                    'status'          => 'completed',
                    'currency_code'   => 'USD',
                    'details' => [
                        'totals' => ['grand_total' => 999],
                    ],
                ],
            ],

            'subscription_updated' => [
                'event_type'     => 'subscription.updated',
                'occurred_at'    => $now,
                'notification_id'=> 'ntf_test_' . uniqid(),
                'data' => [
                    'id'            => $subId,
                    'status'        => $status,
                    'next_billed_at'=> now()->addMonth()->toIso8601String(),
                ],
            ],

            default => null,
        };
    }
}