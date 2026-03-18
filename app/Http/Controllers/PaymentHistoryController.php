<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function paddleApiUrl(string $path): string
    {
        $base = config('cashier.environment') === 'sandbox'
            ? 'https://sandbox-api.paddle.com'
            : 'https://api.paddle.com';

        return $base . $path;
    }

    private function paddleHeaders(): array
    {
        return [
            'Authorization' => 'Bearer ' . config('cashier.api_key'),
            'Content-Type'  => 'application/json',
            'Accept'        => 'application/json',
        ];
    }

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

    private function formatAmount(int $amount, string $currency): string
    {
        $value      = $amount / 100;
        $symbol     = $this->currencySymbol($currency);
        $noDecimals = in_array(strtoupper($currency), ['INR', 'JPY', 'KRW', 'VND', 'IDR']);

        return $symbol . number_format($value, $noDecimals ? 0 : 2);
    }

    public function index(Request $request): View
    {
        $user        = $request->user();
        $customerId  = $user->paddle_customer_id;
        $transactions = [];

        if ($customerId) {
            try {
                $response = Http::withHeaders($this->paddleHeaders())
                    ->get($this->paddleApiUrl('/transactions'), [
                        'customer_id' => $customerId,
                        'per_page'    => 50,
                        'order_by'    => 'created_at[DESC]',
                    ]);

                if ($response->successful()) {
                    foreach ($response->json('data') as $txn) {
                        $txnStatus  = $txn['status'] ?? 'unknown';
                        $payStatus  = $txn['payments'][0]['status'] ?? 'none';
                        $errorCode  = $txn['payments'][0]['error_code'] ?? null;
                        $currency   = $txn['currency_code'] ?? 'USD';
                        $amountRaw  = (int) ($txn['details']['totals']['total'] ?? 0);

                        // Skip draft and zero-amount transactions
                        if ($txnStatus === 'draft' || $amountRaw === 0) {
                            continue;
                        }

                        // Determine display status
                        $displayStatus = $this->resolveStatus($txnStatus, $payStatus, $errorCode);

                        // Get plan name from price
                        $priceId  = $txn['items'][0]['price']['id'] ?? null;
                        $planName = $this->getPlanFromPriceId($priceId);
                        $interval = $txn['items'][0]['price']['billing_cycle']['interval'] ?? 'month';
                        $billing  = $interval === 'year' ? 'Annual' : 'Monthly';

                        $transactions[] = [
                            'id'          => $txn['id'],
                            'date'        => isset($txn['billed_at'])
                                ? \Carbon\Carbon::parse($txn['billed_at'])->format('M d, Y')
                                : \Carbon\Carbon::parse($txn['created_at'])->format('M d, Y'),
                            'plan'        => ucfirst($planName) . ' — ' . $billing,
                            'amount'      => $this->formatAmount($amountRaw, $currency),
                            'currency'    => strtoupper($currency),
                            'status'      => $displayStatus['label'],
                            'status_type' => $displayStatus['type'],
                            'error'       => $errorCode
                                ? ucwords(str_replace('_', ' ', $errorCode))
                                : null,
                            'invoice_url' => null, // fetched on demand
                            'txn_id'      => $txn['id'],
                        ];
                    }
                }
            } catch (\Exception $e) {
                Log::error('PaymentHistory fetch error: ' . $e->getMessage());
            }
        }

        return view('billing.payment-history', compact('transactions'));
    }

    // ── FETCH INVOICE PDF ON DEMAND ───────────────────────────────
    public function invoicePdf(Request $request, string $txnId)
    {
        try {
            $response = Http::withHeaders($this->paddleHeaders())
                ->get($this->paddleApiUrl("/invoices/{$txnId}/pdf"));

            if ($response->successful()) {
                $url = $response->json('data.url');
                if ($url) {
                    return redirect()->away($url);
                }
            }
        } catch (\Exception $e) {
            Log::error('Invoice PDF fetch error: ' . $e->getMessage());
        }

        return back()->with('error', 'Invoice not available for this transaction.');
    }

    // ── RESOLVE DISPLAY STATUS ────────────────────────────────────
    private function resolveStatus(string $txnStatus, string $payStatus, ?string $errorCode): array
    {
        if ($txnStatus === 'completed' && $payStatus === 'captured') {
            return ['label' => 'Successful', 'type' => 'success'];
        }

        if ($payStatus === 'error') {
            return ['label' => 'Failed', 'type' => 'failed'];
        }

        if ($payStatus === 'action_required') {
            return ['label' => 'Incomplete', 'type' => 'incomplete'];
        }

        if ($payStatus === 'none' && $txnStatus === 'ready') {
            return ['label' => 'Abandoned', 'type' => 'abandoned'];
        }

        return ['label' => ucfirst($txnStatus), 'type' => 'unknown'];
    }

    // ── GET PLAN FROM PRICE ID ────────────────────────────────────
    private function getPlanFromPriceId(?string $priceId): string
    {
        if (! $priceId) return 'Unknown';

        $map = [
            config('plans.personal.paddle_monthly_id')     => 'personal',
            config('plans.personal.paddle_annual_id')      => 'personal',
            config('plans.professional.paddle_monthly_id') => 'professional',
            config('plans.professional.paddle_annual_id')  => 'professional',
            config('plans.business.paddle_monthly_id')     => 'business',
            config('plans.business.paddle_annual_id')      => 'business',
        ];

        return $map[$priceId] ?? 'Unknown';
    }
}