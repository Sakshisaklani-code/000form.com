<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaddleService
{
    private string $baseUrl;
    private ?string $apiKey;

    public function __construct()
    {
        $sandbox       = config('services.paddle.sandbox', true);
        $this->baseUrl = $sandbox
            ? 'https://sandbox-api.paddle.com'
            : 'https://api.paddle.com';
        $this->apiKey  = config('cashier.api_key');
    }

    public function getSubscription(string $paddleSubscriptionId): ?array
    {
        try {
            $response = Http::withToken($this->apiKey)
                ->get("{$this->baseUrl}/subscriptions/{$paddleSubscriptionId}");

            if ($response->successful()) {
                return $response->json('data');
            }

            Log::warning('Paddle API: getSubscription failed', [
                'paddle_id' => $paddleSubscriptionId,
                'status'    => $response->status(),
            ]);

            return null;
        } catch (\Exception $e) {
            Log::error('Paddle API exception', ['error' => $e->getMessage()]);
            return null;
        }
    }

    public function listSubscriptions(string $status = null, int $perPage = 50): array
    {
        $params = ['per_page' => $perPage];
        if ($status) $params['status'] = $status;

        try {
            $response = Http::withToken($this->apiKey)
                ->get("{$this->baseUrl}/subscriptions", $params);

            if ($response->successful()) {
                return $response->json('data') ?? [];
            }
        } catch (\Exception $e) {
            Log::error('Paddle API listSubscriptions error', ['error' => $e->getMessage()]);
        }

        return [];
    }

    public function cancelSubscription(string $paddleSubscriptionId, bool $immediately = false): bool
    {
        try {
            $response = Http::withToken($this->apiKey)
                ->post("{$this->baseUrl}/subscriptions/{$paddleSubscriptionId}/cancel", [
                    'effective_from' => $immediately ? 'immediately' : 'next_billing_period',
                ]);

            return $response->successful();
        } catch (\Exception $e) {
            Log::error('Paddle cancelSubscription error', ['error' => $e->getMessage()]);
            return false;
        }
    }
}