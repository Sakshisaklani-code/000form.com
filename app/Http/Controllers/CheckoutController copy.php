<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use App\Models\Subscription;
use App\Models\SubscriptionInvoice;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ── PADDLE API BASE URL ───────────────────────────────────────
    private function paddleApiUrl(string $path): string
    {
        $base = config('cashier.environment') === 'sandbox'
            ? 'https://sandbox-api.paddle.com'
            : 'https://api.paddle.com';

        return $base . $path;
    }

    // ── PADDLE API HEADERS ────────────────────────────────────────
    private function paddleHeaders(): array
    {
        return [
            'Authorization' => 'Bearer ' . config('cashier.api_key'),
            'Content-Type'  => 'application/json',
            'Accept'        => 'application/json',
        ];
    }

    // ── CURRENCY SYMBOL ───────────────────────────────────────────
    private function currencySymbol(string $currency): string
    {
        return match(strtoupper($currency)) {
            'INR'  => '₹',
            'GBP'  => '£',
            'EUR'  => '€',
            'JPY'  => '¥',
            'AUD'  => 'A$',
            'CAD'  => 'C$',
            default => '$',
        };
    }

    // ── FORMAT AMOUNT ─────────────────────────────────────────────
    // Paddle returns ALL currencies in smallest unit × 100
    // INR: 277700 paise ÷ 100 = ₹2,777
    // USD: 1500 cents ÷ 100   = $15.00
    private function formatAmount(int $amount, string $currency): string
    {
        $value  = $amount / 100;
        $symbol = $this->currencySymbol($currency);

        // Currencies shown without decimal places
        $noDecimals = ['INR', 'JPY', 'KRW', 'VND', 'IDR'];
        $decimals   = in_array(strtoupper($currency), $noDecimals) ? 0 : 2;

        return $symbol . number_format($value, $decimals);
    }

    // ── FETCH INVOICE PDF FROM PADDLE ─────────────────────────────
    // Endpoint: GET /invoices/{transaction_id}/pdf
    // Returns a signed S3 URL valid for 1 hour
    private function fetchInvoicePdf(string $txnId): ?string
    {
        try {
            $response = Http::withHeaders($this->paddleHeaders())
                ->get($this->paddleApiUrl("/invoices/{$txnId}/pdf"));

            if ($response->successful()) {
                $url = $response->json('data.url');
                Log::info("Invoice PDF fetched for {$txnId}: " . ($url ? 'yes' : 'no'));
                return $url ?? null;
            }

            Log::warning("Paddle invoice PDF fetch failed for {$txnId}", [
                'status' => $response->status(),
                'body'   => $response->body(),
            ]);
        } catch (\Exception $e) {
            Log::warning("fetchInvoicePdf error: " . $e->getMessage());
        }

        return null;
    }

    // ── CREATE CHECKOUT ───────────────────────────────────────────
    public function createCheckout(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'plan'    => 'required|in:personal,professional,business',
                'billing' => 'required|in:monthly,annual',
            ]);

            $plan    = $request->input('plan');
            $billing = $request->input('billing');
            $user    = $request->user();

            // Check for existing active subscription
            $existing = Subscription::where('user_id', $user->id)
                ->whereIn('status', ['active', 'trialing', 'past_due'])
                ->where(function ($q) {
                    $q->whereNull('current_period_end')
                      ->orWhere('current_period_end', '>', now());
                })
                ->first();

            if ($existing) {
                return response()->json([
                    'redirect' => route('billing.portal'),
                    'message'  => 'You already have an active subscription.',
                ], 409);
            }

            $priceId = config("plans.{$plan}.paddle_{$billing}_id");

            if (! $priceId) {
                return response()->json([
                    'error' => "Price ID not found for {$plan}/{$billing}. Check your .env.",
                ], 422);
            }

            // Cache plan intent as fallback if Paddle API is unreachable
            Cache::put(
                "checkout_intent_{$user->id}",
                ['plan' => $plan, 'billing' => $billing, 'price_id' => $priceId],
                now()->addMinutes(30)
            );

            $checkout = $user
                ->checkout($priceId, 1)
                ->customData([
                    'user_id' => (string) $user->id,
                    'plan'    => $plan,
                    'billing' => $billing,
                ])
                ->returnTo(route('subscription.processing'));

            $options = $checkout->options();
            $options['settings']['displayMode'] = 'overlay';
            unset($options['settings']['frameStyle']);

            return response()->json([
                'checkout_options' => $options,
            ]);

        } catch (\Exception $e) {
            Log::error('Checkout error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return response()->json([
                'error' => config('app.debug') ? $e->getMessage() : 'Something went wrong.',
            ], 500);
        }
    }

    // ── PROCESSING PAGE ───────────────────────────────────────────
    public function processing(): View
    {
        return view('subscription.processing');
    }

    // ── CHECK STATUS (polled by processing page) ──────────────────
    //
    // Priority order:
    //   1. Always enrich from Paddle API if _ptxn present (real IDs + invoice PDF)
    //   2. Check DB for existing subscription
    //   3. Fallback to cached intent if Paddle API unreachable
    //
    public function checkStatus(Request $request): JsonResponse
    {
        $user = $request->user();
        $ptxn = $request->query('_ptxn');

        try {
            // ── Step 1: Enrich from Paddle API when _ptxn present ─
            // Always runs when _ptxn is available — fills real sub ID,
            // transaction ID and invoice PDF URL
            $sub = null;
            if ($ptxn) {
                $sub = $this->buildFromPaddleTransaction($user, $ptxn);
            }

            // ── Step 2: Check DB for existing subscription ─────────
            if (! $sub) {
                $sub = Subscription::where('user_id', $user->id)
                    ->whereIn('status', ['active', 'trialing', 'past_due'])
                    ->where(function ($q) {
                        $q->whereNull('current_period_end')
                          ->orWhere('current_period_end', '>', now());
                    })
                    ->latest()
                    ->first();
            }

            // ── Step 3: Fallback to cached intent ─────────────────
            if (! $sub) {
                $intent = Cache::get("checkout_intent_{$user->id}");
                if ($intent) {
                    $sub = $this->buildFromCachedIntent($user, $intent);
                    Cache::forget("checkout_intent_{$user->id}");
                }
            }

            // ── Step 4: Build response ────────────────────────────
            if ($sub) {
                $planName = is_string($sub->plan_name)
                    ? $sub->plan_name
                    : $sub->plan_name->value;

                $invoice = SubscriptionInvoice::where('subscription_id', $sub->id)
                    ->latest()
                    ->first();

                // ── Fetch invoice PDF if not yet stored ───────────
                // PDF is generated async by Paddle — fetch on each poll
                // until we get it, then store it permanently
                $invoicePdfUrl = $invoice?->invoice_url;

                if (! $invoicePdfUrl && $invoice?->paddle_transaction_id) {
                    $invoicePdfUrl = $this->fetchInvoicePdf($invoice->paddle_transaction_id);
                    if ($invoicePdfUrl) {
                        $invoice->update(['invoice_url' => $invoicePdfUrl]);
                    }
                }

                // Also try using _ptxn directly if invoice has no transaction ID
                if (! $invoicePdfUrl && $ptxn) {
                    $invoicePdfUrl = $this->fetchInvoicePdf($ptxn);
                    if ($invoicePdfUrl && $invoice) {
                        $invoice->update(['invoice_url' => $invoicePdfUrl]);
                    }
                }

                return response()->json([
                    'activated'     => true,
                    'plan'          => ucfirst($planName),
                    'billing_cycle' => ucfirst($sub->billing_cycle),
                    'amount'        => $invoice
                        ? $this->formatAmount($invoice->amount_cents, $invoice->currency)
                        : $this->currencySymbol('USD') . config("plans.{$planName}.price_{$sub->billing_cycle}"),
                    'currency'      => $invoice?->currency ?? 'USD',
                    'period_end'    => $sub->current_period_end?->format('M d, Y'),
                    'sub_id'        => $sub->paddle_subscription_id ?? '—',
                    'txn_id'        => $invoice?->paddle_transaction_id ?? $ptxn ?? '—',
                    'invoice_url'   => $invoicePdfUrl,
                    'redirect'      => route('billing.portal'),
                ]);
            }

        } catch (\Exception $e) {
            Log::warning('checkStatus error: ' . $e->getMessage());
        }

        return response()->json(['activated' => false]);
    }

    // ── BUILD SUBSCRIPTION FROM PADDLE API ────────────────────────
    private function buildFromPaddleTransaction($user, string $txnId): ?Subscription
    {
        try {
            $txnResponse = Http::withHeaders($this->paddleHeaders())
                ->get($this->paddleApiUrl("/transactions/{$txnId}"));

            if (! $txnResponse->successful()) {
                Log::warning("Paddle API: failed to fetch transaction {$txnId}", [
                    'status' => $txnResponse->status(),
                    'body'   => $txnResponse->body(),
                ]);
                return null;
            }

            $txn       = $txnResponse->json('data');
            $txnStatus = $txn['status'] ?? '';

            Log::info("Paddle API: transaction {$txnId} status={$txnStatus}");

            if ($txnStatus !== 'completed') {
                return null;
            }

            // ── Extract transaction data ──────────────────────────
            $paddleSubId  = $txn['subscription_id'] ?? null;
            $customerId   = $txn['customer_id'] ?? null;
            $currency     = $txn['currency_code'] ?? 'USD';
            $amountRaw    = (int) ($txn['details']['totals']['total'] ?? 0);
            $invoiceId    = $txn['invoice_id'] ?? null;
            $priceId      = $txn['items'][0]['price']['id'] ?? null;
            $billingCycle = $this->getBillingCycleFromTxn($txn);

            // Resolve plan from price ID
            $plan   = $this->getPlanFromPriceId($priceId)
                   ?? Cache::get("checkout_intent_{$user->id}")['plan']
                   ?? 'personal';
            $limits = config("plans.{$plan}");

            // ── Fetch invoice PDF ─────────────────────────────────
            $invoicePdf = $this->fetchInvoicePdf($txnId);

            // ── Fetch subscription for exact billing dates ────────
            $periodStart = now();
            $periodEnd   = $billingCycle === 'annual' ? now()->addYear() : now()->addMonth();
            $nextBilling = $periodEnd;

            if ($paddleSubId) {
                $subResponse = Http::withHeaders($this->paddleHeaders())
                    ->get($this->paddleApiUrl("/subscriptions/{$paddleSubId}"));

                if ($subResponse->successful()) {
                    $paddleSub   = $subResponse->json('data');
                    $periodStart = isset($paddleSub['current_billing_period']['starts_at'])
                        ? \Carbon\Carbon::parse($paddleSub['current_billing_period']['starts_at'])
                        : $periodStart;
                    $periodEnd   = isset($paddleSub['current_billing_period']['ends_at'])
                        ? \Carbon\Carbon::parse($paddleSub['current_billing_period']['ends_at'])
                        : $periodEnd;
                    $nextBilling = isset($paddleSub['next_billed_at'])
                        ? \Carbon\Carbon::parse($paddleSub['next_billed_at'])
                        : $periodEnd;
                }
            }

            // ── Save paddle_customer_id on user ───────────────────
            if ($customerId && ! $user->paddle_customer_id) {
                $user->update(['paddle_customer_id' => $customerId]);
            }

            // ── Create or update subscription ─────────────────────
            $sub = Subscription::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'paddle_subscription_id'   => $paddleSubId,
                    'paddle_customer_id'       => $customerId,
                    'paddle_price_id'          => $priceId,
                    'plan_name'                => $plan,
                    'billing_cycle'            => $billingCycle,
                    'status'                   => 'active',
                    'submissions_limit'        => $limits['submissions'],
                    'submissions_used'         => 0,
                    'file_upload_limit_mb'     => $limits['file_upload_mb'],
                    'team_members_limit'       => $limits['team_members'],
                    'webhooks_enabled'         => $limits['webhooks'],
                    'role_permissions_enabled' => $limits['role_permissions'],
                    'current_period_start'     => $periodStart,
                    'current_period_end'       => $periodEnd,
                    'next_billing_date'        => $nextBilling,
                    'last_payment_at'          => now(),
                    'cancel_at_period_end'     => false,
                    'paddle_last_event'        => 'transaction.completed',
                ]
            );

            // ── Create or update invoice ──────────────────────────
            SubscriptionInvoice::updateOrCreate(
                ['paddle_transaction_id' => $txnId],
                [
                    'user_id'               => $user->id,
                    'subscription_id'       => $sub->id,
                    'paddle_transaction_id' => $txnId,
                    'amount_cents'          => $amountRaw,
                    'currency'              => $currency,
                    'status'                => 'completed',
                    'paid_at'               => now(),
                    'invoice_url'           => $invoicePdf,
                ]
            );

            Cache::forget("checkout_intent_{$user->id}");

            Log::info("Built subscription from Paddle API for user {$user->id}", [
                'plan'        => $plan,
                'sub_id'      => $paddleSubId,
                'txn_id'      => $txnId,
                'currency'    => $currency,
                'invoice_pdf' => $invoicePdf ? 'yes' : 'no',
            ]);

            return $sub;

        } catch (\Exception $e) {
            Log::error('buildFromPaddleTransaction error: ' . $e->getMessage(), [
                'txn_id' => $txnId,
            ]);
            return null;
        }
    }

    // ── BUILD FROM CACHED INTENT (fallback only) ──────────────────
    private function buildFromCachedIntent($user, array $intent): ?Subscription
    {
        try {
            $plan    = $intent['plan'];
            $billing = $intent['billing'];
            $limits  = config("plans.{$plan}");

            $sub = Subscription::create([
                'user_id'                  => $user->id,
                'paddle_subscription_id'   => null,
                'paddle_price_id'          => $intent['price_id'],
                'plan_name'                => $plan,
                'billing_cycle'            => $billing,
                'status'                   => 'active',
                'submissions_limit'        => $limits['submissions'],
                'submissions_used'         => 0,
                'file_upload_limit_mb'     => $limits['file_upload_mb'],
                'team_members_limit'       => $limits['team_members'],
                'webhooks_enabled'         => $limits['webhooks'],
                'role_permissions_enabled' => $limits['role_permissions'],
                'current_period_start'     => now(),
                'current_period_end'       => $billing === 'annual'
                    ? now()->addYear()
                    : now()->addMonth(),
                'next_billing_date'        => $billing === 'annual'
                    ? now()->addYear()
                    : now()->addMonth(),
                'last_payment_at'          => now(),
                'cancel_at_period_end'     => false,
            ]);

            Log::warning("Built subscription from cached intent (Paddle API unavailable) for user {$user->id}");

            return $sub;

        } catch (\Exception $e) {
            Log::error('buildFromCachedIntent error: ' . $e->getMessage());
            return null;
        }
    }

    // ── HELPERS ───────────────────────────────────────────────────

    private function getPlanFromPriceId(?string $priceId): ?string
    {
        if (! $priceId) return null;

        $map = [
            config('plans.personal.paddle_monthly_id')     => 'personal',
            config('plans.personal.paddle_annual_id')      => 'personal',
            config('plans.professional.paddle_monthly_id') => 'professional',
            config('plans.professional.paddle_annual_id')  => 'professional',
            config('plans.business.paddle_monthly_id')     => 'business',
            config('plans.business.paddle_annual_id')      => 'business',
        ];

        return $map[$priceId] ?? null;
    }

    private function getBillingCycleFromTxn(array $txn): string
    {
        $interval = $txn['items'][0]['price']['billing_cycle']['interval'] ?? 'month';
        return $interval === 'year' ? 'annual' : 'monthly';
    }
}