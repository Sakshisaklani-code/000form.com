<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Subscription;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class PaddleWebhookController extends Controller
{
    public function handle(Request $request): Response
    {
        // Paddle sends webhook signature in header — verify it
        $this->verifySignature($request);

        $payload   = $request->all();
        $eventType = $payload['event_type'] ?? $payload['alert_name'] ?? null;

        Log::info('Paddle webhook received', ['event' => $eventType]);

        match ($eventType) {
            // ─── Subscription Lifecycle ─────────────────────────────────────
            'subscription.created'            => $this->onSubscriptionCreated($payload),
            'subscription.updated'            => $this->onSubscriptionUpdated($payload),
            'subscription.canceled'           => $this->onSubscriptionCancelled($payload),
            'subscription.paused'             => $this->onSubscriptionPaused($payload),
            'subscription.resumed'            => $this->onSubscriptionResumed($payload),

            // ─── Payment Events ─────────────────────────────────────────────
            'transaction.completed'           => $this->onTransactionCompleted($payload),
            'transaction.payment_failed'      => $this->onTransactionPaymentFailed($payload),

            // ─── Billing (legacy Paddle Classic) ────────────────────────────
            'subscription_payment_succeeded'  => $this->onPaymentSucceeded($payload),
            'subscription_payment_failed'     => $this->onPaymentFailed($payload),

            default => Log::info('Unhandled Paddle event', ['event' => $eventType]),
        };

        return response('OK', 200);
    }

    // ─── Subscription.Updated is the KEY event for past_due ─────────────────
    private function onSubscriptionUpdated(array $payload): void
    {
        $data           = $payload['data'] ?? $payload;
        $paddleSubId    = $data['id'] ?? $data['subscription_id'];
        $newStatus      = $data['status'];

        $subscription = Subscription::where('paddle_subscription_id', $paddleSubId)->first();
        if (!$subscription) {
            Log::warning('Subscription not found for paddle ID', ['paddle_id' => $paddleSubId]);
            return;
        }

        $oldStatus = $subscription->status;
        $updates   = [
            'paddle_status' => $newStatus,
            'status'        => $this->mapPaddleStatus($newStatus),
        ];

        // When it first becomes past_due, record the timestamp for grace period logic
        if ($newStatus === 'past_due' && $oldStatus !== 'past_due') {
            $updates['past_due_since'] = now();
            Log::info('Subscription became past_due', ['subscription_id' => $subscription->id]);
        }

        // When it recovers from past_due, clear the restriction flags
        if ($oldStatus === 'past_due' && $newStatus === 'active') {
            $updates['past_due_since']          = null;
            $updates['access_restricted']       = false;
            $updates['last_payment_reminder_at']= null;
            Log::info('Subscription recovered from past_due', ['subscription_id' => $subscription->id]);
        }

        // Update next billing date if present
        if (!empty($data['next_billed_at'])) {
            $updates['next_billed_at'] = Carbon::parse($data['next_billed_at']);
        }

        $subscription->update($updates);
    }

    // ─── Transaction: Payment Failed ────────────────────────────────────────
    private function onTransactionPaymentFailed(array $payload): void
    {
        $data        = $payload['data'] ?? $payload;
        $paddleSubId = $data['subscription_id'] ?? null;

        if (!$paddleSubId) return;

        $subscription = Subscription::where('paddle_subscription_id', $paddleSubId)->first();
        if (!$subscription) return;

        // Log failed payment attempt
        Payment::create([
            'subscription_id'      => $subscription->id,
            'user_id'              => $subscription->user_id,
            'paddle_transaction_id'=> $data['id'] ?? null,
            'amount'               => $data['details']['totals']['grand_total'] ?? 0,
            'currency'             => $data['currency_code'] ?? 'USD',
            'status'               => 'failed',
            'failure_reason'       => $data['payments'][0]['error_code'] ?? 'unknown',
            'attempted_at'         => now(),
        ]);

        // Mark past_due_since if not already set
        if (!$subscription->past_due_since) {
            $subscription->update([
                'status'         => 'past_due',
                'past_due_since' => now(),
            ]);
        }

        Log::warning('Payment failed via webhook', [
            'subscription_id' => $subscription->id,
            'reason'          => $data['payments'][0]['error_code'] ?? 'unknown',
        ]);
    }

    // ─── Transaction: Payment Succeeded ─────────────────────────────────────
    private function onTransactionCompleted(array $payload): void
    {
        $data        = $payload['data'] ?? $payload;
        $paddleSubId = $data['subscription_id'] ?? null;

        if (!$paddleSubId) return;

        $subscription = Subscription::where('paddle_subscription_id', $paddleSubId)->first();
        if (!$subscription) return;

        Payment::create([
            'subscription_id'      => $subscription->id,
            'user_id'              => $subscription->user_id,
            'paddle_transaction_id'=> $data['id'],
            'amount'               => $data['details']['totals']['grand_total'] ?? 0,
            'currency'             => $data['currency_code'] ?? 'USD',
            'status'               => 'completed',
            'attempted_at'         => now(),
        ]);

        // Clear any past_due state
        $subscription->update([
            'status'                    => 'active',
            'past_due_since'            => null,
            'access_restricted'         => false,
            'last_payment_reminder_at'  => null,
        ]);
    }

    // ─── Paddle Classic: Legacy Handlers ────────────────────────────────────
    private function onPaymentSucceeded(array $payload): void
    {
        $this->onTransactionCompleted($payload);
    }

    private function onPaymentFailed(array $payload): void
    {
        $this->onTransactionPaymentFailed($payload);
    }

    private function onSubscriptionCreated(array $payload): void
    {
        $data = $payload['data'] ?? $payload;
        Subscription::where('paddle_subscription_id', $data['id'] ?? $data['subscription_id'])
            ->update(['status' => 'active', 'paddle_status' => $data['status']]);
    }

    private function onSubscriptionCancelled(array $payload): void
    {
        $data        = $payload['data'] ?? $payload;
        $paddleSubId = $data['id'] ?? $data['subscription_id'];
        Subscription::where('paddle_subscription_id', $paddleSubId)
            ->update(['status' => 'cancelled', 'paddle_status' => 'canceled', 'cancelled_at' => now()]);
    }

    private function onSubscriptionPaused(array $payload): void
    {
        $data        = $payload['data'] ?? $payload;
        $paddleSubId = $data['id'] ?? $data['subscription_id'];
        Subscription::where('paddle_subscription_id', $paddleSubId)
            ->update(['status' => 'paused', 'paddle_status' => 'paused']);
    }

    private function onSubscriptionResumed(array $payload): void
    {
        $data        = $payload['data'] ?? $payload;
        $paddleSubId = $data['id'] ?? $data['subscription_id'];
        Subscription::where('paddle_subscription_id', $paddleSubId)
            ->update(['status' => 'active', 'paddle_status' => 'active', 'past_due_since' => null]);
    }

    private function mapPaddleStatus(string $status): string
    {
        return match ($status) {
            'active'   => 'active',
            'trialing' => 'trialing',
            'past_due' => 'past_due',
            'paused'   => 'paused',
            'canceled' => 'cancelled',
            default    => 'unknown',
        };
    }

    private function verifySignature(Request $request): void
    {
        // Paddle Billing (v2) uses 'Paddle-Signature' header
        $signature = $request->header('Paddle-Signature');
        $secret    = config('services.paddle.webhook_secret');

        if (!$signature || !$secret) return; // skip in local dev if not configured

        // Parse ts and h1 from header: "ts=xxx;h1=yyy"
        parse_str(str_replace(';', '&', $signature), $parts);
        $ts   = $parts['ts'] ?? '';
        $h1   = $parts['h1'] ?? '';
        $body = $request->getContent();

        $computed = hash_hmac('sha256', "{$ts}:{$body}", $secret);

        if (!hash_equals($computed, $h1)) {
            abort(403, 'Invalid Paddle signature');
        }
    }
}