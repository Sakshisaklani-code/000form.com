<?php

namespace App\Jobs;

use App\Mail\PlanUpgraded;
use App\Models\SubscriptionInvoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendUpgradeInvoiceEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Number of times the job may be attempted.
     * First attempt fires after 15s delay (set at dispatch).
     * Retries 2–5 fire every 30s via $backoff.
     */
    public int $tries = 5;

    /**
     * Seconds to wait between retries (attempts 2 → 5).
     */
    public array $backoff = [30, 30, 30, 30];

    /**
     * Seconds before the job is considered timed out.
     */
    public int $timeout = 60;

    // ── Constructor payload ───────────────────────────────────

    public function __construct(
        public readonly mixed  $user,
        public readonly string $oldPlan,
        public readonly string $oldBilling,
        public readonly string $newPlan,
        public readonly string $newBilling,
        public readonly string $effectiveAt,
        public readonly ?string $subscriptionId,
        public readonly ?string $paddleTransactionId,
        public readonly string  $periodEnd,
        public readonly array   $adminEmails,
    ) {}

    // ── Handle ────────────────────────────────────────────────

    public function handle(): void
    {
        Log::info("SendUpgradeInvoiceEmail: attempt {$this->attempts()} for user {$this->user->id}", [
            'sub_id' => $this->subscriptionId,
            'txn_id' => $this->paddleTransactionId ?? 'null — will search',
        ]);

        // ── 1. Resolve the transaction ────────────────────────
        $transaction = $this->resolveTransaction();

        if ($transaction === null) {
            // Transaction not ready yet — release back to queue
            // if we still have retries left.
            if ($this->attempts() < $this->tries) {
                Log::warning("SendUpgradeInvoiceEmail: transaction not ready on attempt {$this->attempts()}, releasing for retry.");
                $this->release(30);
                return;
            }

            // Last attempt — send emails without payment details
            // rather than silently dropping them.
            Log::warning("SendUpgradeInvoiceEmail: giving up after {$this->attempts()} attempts — sending email without invoice.");
            $this->sendEmails(null, null, null, null, null);
            return;
        }

        // ── 2. Extract billing details ────────────────────────
        $status      = $transaction['status'] ?? null;
        $txnId       = $transaction['id']     ?? null;

        // Amount — Paddle puts totals in `details.totals`
        $totals      = $transaction['details']['totals'] ?? [];
        $rawAmount   = $totals['grand_total']   ?? $totals['total'] ?? null;
        $currency    = $totals['currency_code'] ?? $transaction['currency_code'] ?? null;

        $formattedAmount = ($rawAmount !== null && $currency !== null)
            ? $this->formatAmount((int) $rawAmount, $currency)
            : null;

        // ── 3. Fetch invoice PDF URL ──────────────────────────
        // Paddle does NOT embed the PDF URL in the transaction object.
        // It must be fetched separately from GET /invoices/{txnId}/pdf.
        $invoiceUrl = null;
        if ($txnId) {
            try {
                $pdfResp = Http::withHeaders($this->paddleHeaders())
                    ->get($this->paddleApiUrl("/invoices/{$txnId}/pdf"));

                if ($pdfResp->successful()) {
                    $invoiceUrl = $pdfResp->json('data.url');
                    Log::info("SendUpgradeInvoiceEmail: invoice PDF fetched for txn {$txnId}: " . ($invoiceUrl ?? 'null'));
                } else {
                    Log::warning("SendUpgradeInvoiceEmail: invoice PDF fetch failed for txn {$txnId}: " . $pdfResp->body());
                }
            } catch (\Throwable $e) {
                Log::warning("SendUpgradeInvoiceEmail: invoice PDF exception for txn {$txnId}: " . $e->getMessage());
            }
        }

        // ── 4. Persist invoice record ─────────────────────────
        if ($txnId && $rawAmount !== null) {
            try {
                SubscriptionInvoice::updateOrCreate(
                    ['paddle_transaction_id' => $txnId],
                    [
                        'user_id'              => $this->user->id,
                        'amount'               => $rawAmount,
                        'currency'             => strtoupper($currency ?? ''),
                        'status'               => $status ?? 'completed',
                        'invoice_url'          => $invoiceUrl,
                        'description'          => "Upgrade to {$this->newPlan} ({$this->newBilling})",
                        'paid_at'              => now(),
                    ]
                );
            } catch (\Throwable $e) {
                Log::warning("SendUpgradeInvoiceEmail: could not persist invoice record: " . $e->getMessage());
            }
        }

        // ── 5. Send emails ────────────────────────────────────
        $this->sendEmails($formattedAmount, $currency, $txnId, $invoiceUrl, $status);
    }

    // ── RESOLVE TRANSACTION ───────────────────────────────────
    /**
     * Try to find the proration transaction Paddle created for this
     * immediate upgrade.
     *
     * Priority:
     *   1. Use $paddleTransactionId if we already have it.
     *   2. Otherwise search the subscription's transaction list for
     *      a recent "billed" or "completed" proration transaction.
     *
     * Returns the transaction array, or null if not yet available.
     */
    private function resolveTransaction(): ?array
    {
        // ── Option A: we already have the transaction ID ──────
        if ($this->paddleTransactionId) {
            return $this->fetchTransaction($this->paddleTransactionId);
        }

        // ── Option B: search subscription transactions ────────
        if (! $this->subscriptionId) {
            Log::warning("SendUpgradeInvoiceEmail: no subscriptionId — cannot search for transaction.");
            return null;
        }

        try {
            $response = Http::withHeaders($this->paddleHeaders())
                ->get($this->paddleApiUrl("/transactions"), [
                    'subscription_id' => $this->subscriptionId,
                    'per_page'        => 10,
                    'order_by'        => 'created_at[DESC]',
                ]);

            if (! $response->successful()) {
                Log::warning("SendUpgradeInvoiceEmail: subscription transactions API failed: " . $response->body());
                return null;
            }

            $transactions = $response->json('data') ?? [];

            foreach ($transactions as $txn) {
                $txnStatus = $txn['status'] ?? '';
                $origin    = $txn['origin'] ?? '';

                // We want a recently-billed proration, not a subscription
                // renewal or a pending draft.
                $isBilled    = in_array($txnStatus, ['billed', 'completed', 'paid'], true);
                $isProration = str_contains(strtolower($origin), 'subscription_update')
                    || str_contains(strtolower($origin), 'immediate_change')
                    || str_contains(strtolower($origin), 'proration');

                // Also catch any transaction created in the last 10 minutes
                // (covers cases where Paddle doesn't mark origin as proration)
                $createdAt = isset($txn['created_at'])
                    ? \Carbon\Carbon::parse($txn['created_at'])
                    : null;
                $isRecent  = $createdAt && $createdAt->gt(now()->subMinutes(10));

                if ($isBilled && ($isProration || $isRecent)) {
                    Log::info("SendUpgradeInvoiceEmail: matched transaction {$txn['id']} via subscription search.");
                    return $txn;
                }
            }

            Log::info("SendUpgradeInvoiceEmail: no matching billed proration transaction found yet.");
            return null;

        } catch (\Throwable $e) {
            Log::warning("SendUpgradeInvoiceEmail: exception searching transactions: " . $e->getMessage());
            return null;
        }
    }

    // ── FETCH SINGLE TRANSACTION ──────────────────────────────
    private function fetchTransaction(string $txnId): ?array
    {
        try {
            $response = Http::withHeaders($this->paddleHeaders())
                ->get($this->paddleApiUrl("/transactions/{$txnId}"));

            if (! $response->successful()) {
                Log::warning("SendUpgradeInvoiceEmail: transaction fetch failed ({$txnId}): " . $response->body());
                return null;
            }

            $txn    = $response->json('data');
            $status = $txn['status'] ?? '';

            // Not billed yet — caller will retry
            if (! in_array($status, ['billed', 'completed', 'paid'], true)) {
                Log::info("SendUpgradeInvoiceEmail: transaction {$txnId} status is '{$status}', not ready.");
                return null;
            }

            return $txn;

        } catch (\Throwable $e) {
            Log::warning("SendUpgradeInvoiceEmail: exception fetching transaction {$txnId}: " . $e->getMessage());
            return null;
        }
    }

    // ── SEND EMAILS ───────────────────────────────────────────
    private function sendEmails(
        ?string $amount,
        ?string $currency,
        ?string $transactionId,
        ?string $invoiceUrl,
        ?string $txnStatus,
    ): void {
        $user = $this->user;

        // ── 1. User email ─────────────────────────────────────
        try {
            Mail::to($user->email)->send(new PlanUpgraded(
                userEmail:        $user->email,
                userId:           $user->id,
                oldPlan:          $this->oldPlan,
                oldBilling:       $this->oldBilling,
                newPlan:          $this->newPlan,
                newBilling:       $this->newBilling,
                effectiveAt:      $this->effectiveAt,
                isImmediate:      true,
                isAdminCopy:      false,
                subscriptionId:   $this->subscriptionId,
                paddleCustomerId: null,
                amount:           $amount,
                currency:         $currency,
                transactionId:    $transactionId,
                invoiceUrl:       $invoiceUrl,
                periodEnd:        $this->periodEnd ?: null,
            ));

            Log::info("SendUpgradeInvoiceEmail: user email sent to {$user->email} (txn={$transactionId})");
        } catch (\Throwable $e) {
            Log::error("SendUpgradeInvoiceEmail: failed to send user email to {$user->email}: " . $e->getMessage());
        }

        // ── 2. Admin emails ───────────────────────────────────
        try {
            if (! empty($this->adminEmails)) {
                Mail::to($this->adminEmails)->send(new PlanUpgraded(
                    userEmail:        $user->email,
                    userId:           $user->id,
                    oldPlan:          $this->oldPlan,
                    oldBilling:       $this->oldBilling,
                    newPlan:          $this->newPlan,
                    newBilling:       $this->newBilling,
                    effectiveAt:      $this->effectiveAt,
                    isImmediate:      true,
                    isAdminCopy:      true,
                    subscriptionId:   $this->subscriptionId,
                    paddleCustomerId: $user->paddle_customer_id ?? null,
                    amount:           $amount,
                    currency:         $currency,
                    transactionId:    $transactionId,
                    invoiceUrl:       $invoiceUrl,
                    periodEnd:        $this->periodEnd ?: null,
                ));

                Log::info("SendUpgradeInvoiceEmail: admin email sent to " . implode(', ', $this->adminEmails));
            } else {
                Log::warning("SendUpgradeInvoiceEmail: no admin emails configured — skipping admin copy.");
            }
        } catch (\Throwable $e) {
            Log::error("SendUpgradeInvoiceEmail: failed to send admin email: " . $e->getMessage());
        }
    }

    // ── PADDLE HELPERS ────────────────────────────────────────

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

    // ── FORMAT AMOUNT ─────────────────────────────────────────

    private function formatAmount(int $amount, string $currency): string
    {
        $value  = $amount / 100;
        $symbol = match (strtoupper($currency)) {
            'INR'  => '₹',
            'GBP'  => '£',
            'EUR'  => '€',
            'JPY'  => '¥',
            'AUD'  => 'A$',
            'CAD'  => 'C$',
            default => '$',
        };

        $noDecimals = ['INR', 'JPY', 'KRW', 'VND', 'IDR'];
        $decimals   = in_array(strtoupper($currency), $noDecimals) ? 0 : 2;

        return $symbol . number_format($value, $decimals);
    }

    // ── FAILURE HOOK ──────────────────────────────────────────

    /**
     * Called by Laravel after all retries are exhausted.
     * Logs the final failure so it's visible in logs / Horizon.
     */
    public function failed(\Throwable $exception): void
    {
        Log::error("SendUpgradeInvoiceEmail: permanently failed for user {$this->user->id}: " . $exception->getMessage(), [
            'sub_id' => $this->subscriptionId,
            'txn_id' => $this->paddleTransactionId ?? 'null',
        ]);
    }
}