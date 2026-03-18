<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessPaddleWebhook;
use App\Models\WebhookLog;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function handle(Request $request): Response
    {
        // ── VERIFY SIGNATURE ──────────────────────────────────
        $signatureHeader = $request->header('Paddle-Signature');

        if (! $this->verifySignature($request->getContent(), $signatureHeader)) {
            Log::warning('Paddle webhook: invalid signature', ['ip' => $request->ip()]);
            return response('Unauthorized', 401);
        }

        // ── PARSE PAYLOAD ─────────────────────────────────────
        $payload   = $request->json()->all();
        $eventId   = $payload['event_id']   ?? null;
        $eventType = $payload['event_type'] ?? null;

        if (! $eventId || ! $eventType) {
            return response('Bad Request', 400);
        }

        // ── SAVE TO WEBHOOK LOGS ──────────────────────────────
        try {
            $log = WebhookLog::updateOrCreate(
                ['event_id' => $eventId],
                [
                    'event_type'  => $eventType,
                    'payload'     => json_encode($payload), // store as JSON string
                    'received_at' => now(),
                    'status'      => 'pending',
                ]
            );
        } catch (\Exception $e) {
            Log::error('Failed to save webhook log: ' . $e->getMessage());
            return response('OK', 200); // still return 200 to Paddle
        }

        // ── DISPATCH JOB ──────────────────────────────────────
        // Use dispatchSync if queue is sync, otherwise queue it
        if (config('queue.default') === 'sync') {
            ProcessPaddleWebhook::dispatchSync($log->id);
        } else {
            ProcessPaddleWebhook::dispatch($log->id);
        }

        return response('OK', 200);
    }

    private function verifySignature(string $rawBody, ?string $signatureHeader): bool
    {
        if (! $signatureHeader) return false;

        parse_str(str_replace(';', '&', $signatureHeader), $parts);
        $timestamp    = $parts['ts'] ?? null;
        $receivedHash = $parts['h1'] ?? null;

        if (! $timestamp || ! $receivedHash) return false;

        $secret = config('cashier.webhook_secret');
        if (! $secret) {
            Log::error('PADDLE_WEBHOOK_SECRET not set in .env');
            return false;
        }

        $expectedHash = hash_hmac('sha256', $timestamp . ':' . $rawBody, $secret);
        return hash_equals($expectedHash, $receivedHash);
    }
}