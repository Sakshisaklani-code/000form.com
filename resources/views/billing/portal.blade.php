@extends('layouts.dashboard')

@section('title', 'Billing & Subscription - 000form')

@section('content')

<style>
    /* ============================================
       Billing Portal — matches 000form dark theme
    ============================================ */

    /* ── PAGE HEADER ── */
    .bp-header {
        margin-bottom: 2.5rem;
    }

    .bp-header h1 {
        font-size: 2rem;
        font-weight: 700;
        letter-spacing: -0.02em;
        margin-bottom: 0.4rem;
    }

    .bp-header p {
        color: var(--text-secondary);
        font-size: 0.95rem;
    }

    /* ── FLASH MESSAGES ── */
    .bp-flash {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem 1.25rem;
        border-radius: 12px;
        font-size: 0.9rem;
        font-weight: 500;
        margin-bottom: 1.5rem;
    }

    .bp-flash.success { background: rgba(0,255,136,0.08); border: 1px solid rgba(0,255,136,0.3); color: var(--accent); }
    .bp-flash.error   { background: rgba(255,68,68,0.08);  border: 1px solid rgba(255,68,68,0.3);  color: #ff6b6b; }
    .bp-flash.info    { background: rgba(0,136,255,0.08);  border: 1px solid rgba(0,136,255,0.3);  color: #4db8ff; }

    /* ── CARDS ── */
    .bp-card {
        background: var(--bg-card);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 1.5rem;
    }

    .bp-card-title {
        font-size: 0.7rem;
        font-family: var(--font-mono);
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--text-muted);
        margin-bottom: 1.5rem;
    }

    /* ── CURRENT PLAN CARD ── */
    .bp-plan-row {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 1.5rem;
        flex-wrap: wrap;
    }

    .bp-plan-name {
        font-size: 2rem;
        font-weight: 700;
        letter-spacing: -0.02em;
        margin-bottom: 0.4rem;
    }

    .bp-plan-price {
        font-size: 1rem;
        color: var(--text-secondary);
        margin-bottom: 1rem;
    }

    .bp-plan-price strong {
        color: var(--text-primary);
        font-size: 1.2rem;
    }

    /* Status badge */
    .bp-status {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-family: var(--font-mono);
        font-size: 0.7rem;
        font-weight: 600;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        padding: 0.35rem 0.9rem;
        border-radius: 100px;
    }

    .bp-status-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
    }

    .bp-status.active    { background: rgba(0,255,136,0.12); color: var(--accent);   border: 1px solid rgba(0,255,136,0.3); }
    .bp-status.active    .bp-status-dot { background: var(--accent); }
    .bp-status.cancelled { background: rgba(255,165,0,0.12); color: #ffa500;         border: 1px solid rgba(255,165,0,0.3); }
    .bp-status.cancelled .bp-status-dot { background: #ffa500; }
    .bp-status.past_due  { background: rgba(255,68,68,0.12);  color: #ff6b6b;        border: 1px solid rgba(255,68,68,0.3); }
    .bp-status.past_due  .bp-status-dot { background: #ff6b6b; }
    .bp-status.trialing  { background: rgba(0,136,255,0.12);  color: #4db8ff;        border: 1px solid rgba(0,136,255,0.3); }
    .bp-status.trialing  .bp-status-dot { background: #4db8ff; }
    .bp-status.paused    { background: rgba(150,100,255,0.12);color: #b794f4;        border: 1px solid rgba(150,100,255,0.3); }
    .bp-status.paused    .bp-status-dot { background: #b794f4; }
    .bp-status.expired   { background: rgba(150,150,150,0.12);color: var(--text-muted); border: 1px solid var(--border-color); }
    .bp-status.expired   .bp-status-dot { background: var(--text-muted); }

    /* Warning banners */
    .bp-banner {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        padding: 1rem 1.25rem;
        border-radius: 12px;
        font-size: 0.875rem;
        line-height: 1.5;
        margin-top: 1.25rem;
    }

    .bp-banner.warning { background: rgba(255,165,0,0.08); border: 1px solid rgba(255,165,0,0.25); color: #ffc04d; }
    .bp-banner.danger  { background: rgba(255,68,68,0.08);  border: 1px solid rgba(255,68,68,0.25);  color: #ff8080; }
    .bp-banner.info    { background: rgba(0,136,255,0.08);  border: 1px solid rgba(0,136,255,0.25);  color: #66c2ff; }

    .bp-banner-icon { font-size: 1rem; flex-shrink: 0; margin-top: 1px; }

    /* ── BILLING DETAILS GRID ── */
    .bp-details-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 1.25rem;
    }

    .bp-detail-item {}

    .bp-detail-label {
        font-size: 0.7rem;
        font-family: var(--font-mono);
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--text-muted);
        margin-bottom: 0.4rem;
    }

    .bp-detail-value {
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--text-primary);
    }

    .bp-detail-value.accent { color: var(--accent); }

    /* ── SUBMISSION USAGE BAR ── */
    .bp-usage {
        margin-top: 1.5rem;
    }

    .bp-usage-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.6rem;
    }

    .bp-usage-label {
        font-size: 0.8rem;
        color: var(--text-secondary);
        font-weight: 500;
    }

    .bp-usage-count {
        font-size: 0.8rem;
        font-family: var(--font-mono);
        color: var(--text-muted);
    }

    .bp-usage-track {
        width: 100%;
        height: 6px;
        background: var(--bg-tertiary);
        border-radius: 100px;
        overflow: hidden;
    }

    .bp-usage-fill {
        height: 100%;
        border-radius: 100px;
        background: var(--accent);
        transition: width 0.5s ease;
    }

    .bp-usage-fill.warning { background: #ffa500; }
    .bp-usage-fill.danger  { background: #ff4444; }

    /* ── ACTION BUTTONS ── */
    .bp-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
        margin-top: 1.5rem;
    }

    .bp-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.7rem 1.25rem;
        border-radius: 10px;
        font-family: var(--font-display);
        font-size: 0.875rem;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.2s ease;
        border: none;
    }

    .bp-btn-primary  { background: var(--accent); color: var(--bg-primary); }
    .bp-btn-primary:hover { opacity: 0.88; transform: translateY(-1px); }

    .bp-btn-outline  { background: transparent; color: var(--text-primary); border: 1px solid var(--border-hover); }
    .bp-btn-outline:hover { border-color: var(--accent); color: var(--accent); background: rgba(0,255,136,0.05); }

    .bp-btn-danger   { background: transparent; color: #ff6b6b; border: 1px solid rgba(255,68,68,0.35); }
    .bp-btn-danger:hover { background: rgba(255,68,68,0.08); border-color: #ff4444; }

    .bp-btn-resume   { background: transparent; color: var(--accent); border: 1px solid rgba(0,255,136,0.35); }
    .bp-btn-resume:hover { background: rgba(0,255,136,0.08); }

    /* ── INVOICES TABLE ── */
    .bp-table {
        width: 100%;
        border-collapse: collapse;
    }

    .bp-table th {
        font-family: var(--font-mono);
        font-size: 0.65rem;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--text-muted);
        text-align: left;
        padding: 0 0 0.75rem;
        border-bottom: 1px solid var(--border-color);
    }

    .bp-table td {
        font-size: 0.875rem;
        color: var(--text-secondary);
        padding: 1rem 0;
        border-bottom: 1px solid var(--border-color);
        vertical-align: middle;
    }

    .bp-table tr:last-child td { border-bottom: none; }

    .bp-invoice-amount { color: var(--text-primary); font-weight: 600; font-family: var(--font-mono); }

    .bp-invoice-status {
        display: inline-block;
        font-family: var(--font-mono);
        font-size: 0.65rem;
        font-weight: 600;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        padding: 0.2rem 0.6rem;
        border-radius: 100px;
    }

    .bp-invoice-status.paid     { background: rgba(0,255,136,0.12); color: var(--accent);   border: 1px solid rgba(0,255,136,0.25); }
    .bp-invoice-status.refunded { background: rgba(0,136,255,0.12); color: #4db8ff;         border: 1px solid rgba(0,136,255,0.25); }
    .bp-invoice-status.failed   { background: rgba(255,68,68,0.12); color: #ff6b6b;         border: 1px solid rgba(255,68,68,0.25); }

    .bp-invoice-dl {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        font-size: 0.8rem;
        color: #dfdddd;
        text-decoration: none;
        padding: 0.3rem 0.6rem;
        border-radius: 6px;
        border: 1px solid #dfdddd;
        transition: all 0.15s ease;
    }

    .bp-invoice-dl:hover { border-color: var(--accent); color: var(--accent); }

    .bp-empty {
        text-align: center;
        padding: 2.5rem;
        color: var(--text-muted);
        font-size: 0.9rem;
    }

    /* ── NO SUBSCRIPTION STATE ── */
    .bp-no-sub {
        text-align: center;
        padding: 3rem 2rem;
    }

    .bp-no-sub h2 { font-size: 1.4rem; font-weight: 700; margin-bottom: 0.75rem; }
    .bp-no-sub p  { color: var(--text-secondary); font-size: 0.95rem; margin-bottom: 1.5rem; }

    @media (max-width: 640px) {
        .bp { padding: 5rem 1rem 3rem; }
        .bp-card { padding: 1.5rem; }
        .bp-plan-row { flex-direction: column; }
        .bp-table th:last-child,
        .bp-table td:last-child { display: none; }
    }
</style>

<div class="bp">
    <div class="bp-wrap">

        {{-- PAGE HEADER --}}
        <div class="bp-header">
            <h1>Billing & Subscription</h1>
            <p>Manage your plan, view invoices, and update payment details.</p>
        </div>

        {{-- FLASH MESSAGES --}}
        @if(session('success'))
            <div class="bp-flash success">✓ {{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="bp-flash error">⚠ {{ session('error') }}</div>
        @endif
        @if(session('upgrade_prompt'))
            <div class="bp-flash info">↑ {{ session('upgrade_prompt') }}</div>
        @endif

        @if($subscription)

            {{-- ══════════════════════════════════════════
                CURRENT PLAN CARD
            ══════════════════════════════════════════ --}}
            <div class="bp-card">
                <div class="bp-card-title">Current Plan</div>

                <div class="bp-plan-row">
                    <div>
                        {{-- Plan name + status --}}
                        <div style="display:flex;align-items:center;gap:1rem;flex-wrap:wrap;margin-bottom:0.5rem;">
                            <div class="bp-plan-name">{{ $subscription->plan_name->label() }}</div>
                            <span class="bp-status {{ $subscription->status->value }}">
                                <span class="bp-status-dot"></span>
                                {{ $subscription->statusLabel() }}
                            </span>
                        </div>

                        {{-- Price --}}
                        <div class="bp-plan-price">
                            @if($subscription->billing_cycle === 'annual')
                                <strong>${{ config("plans.{$subscription->plan_name->value}.price_annual") }}</strong> / year
                                <span style="color:var(--accent);font-size:0.8rem;margin-left:0.5rem;">20% off</span>
                            @else
                                <strong>${{ config("plans.{$subscription->plan_name->value}.price_monthly") }}</strong> / month
                            @endif
                        </div>
                    </div>

                    {{-- Upgrade button (right side) --}}
                    @unless($subscription->plan_name->value === 'business')
                        <a href="{{ route('pricing') }}" class="bp-btn bp-btn-primary">
                            ↑ Upgrade Plan
                        </a>
                    @endunless
                </div>

                {{-- ── ALERT BANNERS ── --}}

                {{-- Cancellation warning --}}
                @if($subscription->onGracePeriod())
                    <div class="bp-banner warning">
                        <span class="bp-banner-icon">⚠</span>
                        <div>
                            Your plan is cancelled. You have full access until
                            <strong>{{ $subscription->current_period_end?->format('M d, Y') }}</strong>.
                            After that, your account switches to the Free plan.
                        </div>
                    </div>
                @endif

                {{-- Payment failed warning --}}
                @if($subscription->onPaymentGracePeriod())
                    <div class="bp-banner danger">
                        <span class="bp-banner-icon">✕</span>
                        <div>
                            Your last payment failed. Update your payment method to keep access.
                            Grace period ends <strong>{{ $subscription->grace_period_ends_at?->format('M d, Y') }}</strong>.
                            <a href="{{ route('billing.portal-link') }}" style="color:inherit;text-decoration:underline;margin-left:0.25rem;">Update now →</a>
                        </div>
                    </div>
                @endif

                {{-- Trial ending --}}
                @if($subscription->isTrialing())
                    <div class="bp-banner info">
                        <span class="bp-banner-icon">◷</span>
                        <div>
                            Your trial ends on <strong>{{ $subscription->trial_ends_at?->format('M d, Y') }}</strong>.
                            Add a payment method to continue after your trial.
                            <a href="{{ route('billing.portal-link') }}" style="color:inherit;text-decoration:underline;margin-left:0.25rem;">Add card →</a>
                        </div>
                    </div>
                @endif

                {{-- Paused --}}
                @if($subscription->status->value === 'paused')
                    <div class="bp-banner warning">
                        <span class="bp-banner-icon">⏸</span>
                        <div>Your subscription is paused. Resume below to restore access.</div>
                    </div>
                @endif

            </div>

            {{-- ══════════════════════════════════════════
                BILLING DETAILS
            ══════════════════════════════════════════ --}}
            <div class="bp-card">
                <div class="bp-card-title">Billing Details</div>

                <div class="bp-details-grid">

                    <div class="bp-detail-item">
                        <div class="bp-detail-label">Plan started</div>
                        <div class="bp-detail-value">
                            {{ $subscription->created_at?->format('M d, Y') ?? '—' }}
                        </div>
                    </div>

                    <div class="bp-detail-item">
                        <div class="bp-detail-label">Current period</div>
                        <div class="bp-detail-value">
                            {{ $subscription->current_period_start?->format('M d') ?? '—' }}
                            →
                            {{ $subscription->current_period_end?->format('M d, Y') ?? '—' }}
                        </div>
                    </div>

                    <div class="bp-detail-item">
                        <div class="bp-detail-label">
                            @if($subscription->cancel_at_period_end) Cancels on @else Next renewal @endif
                        </div>
                        <div class="bp-detail-value {{ $subscription->cancel_at_period_end ? '' : 'accent' }}">
                            {{ $subscription->nextBillingLabel() }}
                        </div>
                    </div>

                    <div class="bp-detail-item">
                        <div class="bp-detail-label">Billing cycle</div>
                        <div class="bp-detail-value">
                            {{ ucfirst($subscription->billing_cycle) }}
                        </div>
                    </div>

                    <div class="bp-detail-item">
                        <div class="bp-detail-label">Last payment</div>
                        <div class="bp-detail-value">
                            {{ $subscription->last_payment_at?->format('M d, Y') ?? '—' }}
                        </div>
                    </div>

                    <div class="bp-detail-item">
                        <div class="bp-detail-label">Payment method</div>
                        <div class="bp-detail-value">
                            <a href="{{ route('billing.portal-link') }}" class="bp-invoice-dl">
                                Update card →
                            </a>
                        </div>
                    </div>

                </div>

                {{-- ── SUBMISSION USAGE BAR ── --}}
                @php
                    $limit   = $subscription->submissions_limit;
                    $used    = $subscription->submissions_used;
                    $pct     = $subscription->submissionsUsedPercent();
                    $barClass = $pct >= 100 ? 'danger' : ($pct >= 80 ? 'warning' : '');
                @endphp

                <div class="bp-usage">
                    <div class="bp-usage-header">
                        <span class="bp-usage-label">Submissions this period</span>
                        <span class="bp-usage-count">
                            {{ number_format($used) }}
                            /
                            {{ $limit === -1 ? '∞' : number_format($limit) }}
                        </span>
                    </div>
                    <div class="bp-usage-track">
                        <div class="bp-usage-fill {{ $barClass }}"
                            style="width: {{ $limit === -1 ? '10' : $pct }}%">
                        </div>
                    </div>
                    @if($pct >= 80 && $limit !== -1)
                        <p style="font-size:0.8rem;color:#ffa500;margin-top:0.5rem;">
                            You've used {{ $pct }}% of your limit.
                            <a href="{{ route('pricing') }}" style="color:inherit;text-decoration:underline;">Upgrade →</a>
                        </p>
                    @endif
                </div>

            </div>

            {{-- ══════════════════════════════════════════
                PLAN FEATURES
            ══════════════════════════════════════════ --}}
            <div class="bp-card">
                <div class="bp-card-title">Plan Features</div>
                <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1rem;">

                    @php $limits = $subscription->plan_name->limits(); @endphp

                    <div>
                        <div class="bp-detail-label">Submissions / month</div>
                        <div class="bp-detail-value accent">
                            {{ $limits['submissions'] === -1 ? 'Unlimited' : number_format($limits['submissions']) }}
                        </div>
                    </div>
                    <div>
                        <div class="bp-detail-label">Forms</div>
                        <div class="bp-detail-value accent">
                            {{ $limits['forms'] === -1 ? 'Unlimited' : $limits['forms'] }}
                        </div>
                    </div>
                    <div>
                        <div class="bp-detail-label">Team members</div>
                        <div class="bp-detail-value accent">
                            {{ $limits['team_members'] === -1 ? 'Unlimited' : $limits['team_members'] }}
                        </div>
                    </div>
                    <div>
                        <div class="bp-detail-label">File uploads</div>
                        <div class="bp-detail-value accent">
                            {{ $limits['file_upload_mb'] === 0 ? 'Not included' : $limits['file_upload_mb'] . ' MB' }}
                        </div>
                    </div>
                    
                </div>
            </div>

            {{-- ══════════════════════════════════════════
                ACTIONS
            ══════════════════════════════════════════ --}}
            <div class="bp-card">
                <div class="bp-card-title">Manage Subscription</div>
                <div class="bp-actions">

                    {{-- Update payment method via Paddle portal --}}
                    <a href="{{ route('billing.portal-link') }}" class="bp-btn bp-btn-outline">
                        💳 Update Payment Method
                    </a>

                    {{-- Switch billing cycle --}}
                    @if($subscription->isActive() && !$subscription->cancel_at_period_end)
                        @if($subscription->billing_cycle === 'monthly')
                            <form method="POST" action="{{ route('billing.change-plan') }}" style="display:inline;">
                                @csrf
                                <input type="hidden" name="plan"    value="{{ $subscription->plan_name->value }}">
                                <input type="hidden" name="billing" value="annual">
                                <button type="submit" class="bp-btn bp-btn-outline"
                                        onclick="return confirm('Switch to annual billing? You will be charged the annual price today and save 20%.')">
                                    ↻ Switch to Annual (Save 20%)
                                </button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('billing.change-plan') }}" style="display:inline;">
                                @csrf
                                <input type="hidden" name="plan"    value="{{ $subscription->plan_name->value }}">
                                <input type="hidden" name="billing" value="monthly">
                                <button type="submit" class="bp-btn bp-btn-outline"
                                        onclick="return confirm('Switch to monthly billing? Changes take effect at next renewal.')">
                                    ↻ Switch to Monthly
                                </button>
                            </form>
                        @endif
                    @endif

                    {{-- Resume cancelled subscription --}}
                    @if($subscription->onGracePeriod())
                        <form method="POST" action="{{ route('billing.resume') }}" style="display:inline;">
                            @csrf
                            <button type="submit" class="bp-btn bp-btn-resume">
                                ▶ Reactivate Subscription
                            </button>
                        </form>
                    @endif

                    {{-- Cancel subscription --}}
                    @if($subscription->isActive() && !$subscription->cancel_at_period_end)
                        <form method="POST" action="{{ route('billing.cancel') }}" style="display:inline;">
                            @csrf
                            <button type="submit" class="bp-btn bp-btn-danger"
                                    onclick="return confirm('Cancel your subscription? You keep full access until {{ $subscription->current_period_end?->format('M d, Y') }}. No further charges.')">
                                ✕ Cancel Subscription
                            </button>
                        </form>
                    @endif

                </div>

                @if($subscription->isActive() && !$subscription->cancel_at_period_end)
                    <p style="font-size:0.8rem;color:var(--text-muted);margin-top:1rem;">
                        Cancelling keeps your access active until
                        {{ $subscription->current_period_end?->format('M d, Y') }}.
                        You can reactivate any time before then.
                    </p>
                @endif
            </div>

            {{-- ══════════════════════════════════════════
                INVOICE HISTORY
            ══════════════════════════════════════════ --}}
            <div class="bp-card">
                <div class="bp-card-title">Invoice History</div>

                @if($invoices->count())
                    <table class="bp-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Transaction ID</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Invoice</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->paid_at?->format('M d, Y') ?? '—' }}</td>
                                    <td>
                                        {{ $subscription->plan_name->label() }} —
                                        {{ ucfirst($subscription->billing_cycle) }}
                                    </td>
                                    <td>
                                        {{ $invoice->paddle_transaction_id ?? '—' }}
                                    </td>
                                    <td>
                                        @php
                                            $symbol = match(strtoupper($invoice->currency ?? 'USD')) {
                                                'INR' => '₹',
                                                'GBP' => '£',
                                                'EUR' => '€',
                                                'JPY' => '¥',
                                                'AUD' => 'A$',
                                                'CAD' => 'C$',
                                                default => '$',
                                            };
                                            $noDecimals = in_array(strtoupper($invoice->currency ?? 'USD'), ['INR','JPY','KRW','VND']);
                                            $amount = number_format($invoice->amount_cents / 100, $noDecimals ? 0 : 2);
                                        @endphp
                                        <span class="bp-invoice-amount">
                                            {{ $symbol }}{{ $amount }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="bp-invoice-status {{ $invoice->status }}">
                                            {{ ucfirst($invoice->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($invoice->invoice_url)
                                            <a href="{{ $invoice->invoice_url }}"
                                            target="_blank"
                                            class="bp-invoice-dl">
                                                ↓ PDF
                                            </a>
                                        @else
                                            <span style="color:var(--text-muted);font-size:0.8rem;">—</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="bp-empty">
                        No invoices yet. Your first invoice will appear here after your next payment.
                    </div>
                @endif
            </div>

        @else

            {{-- ══════════════════════════════════════════
                NO SUBSCRIPTION STATE
            ══════════════════════════════════════════ --}}
            <div class="bp-card">
                <div class="bp-no-sub">
                    <div style="font-size:2.5rem;margin-bottom:1rem;">📋</div>
                    <h2>You're on the Free Plan</h2>
                    <p>
                        You currently have 50 submissions/month.<br>
                        Upgrade to unlock more submissions & team members.
                    </p>
                    <a href="{{ route('pricing') }}" class="bp-btn bp-btn-primary" style="display:inline-flex;">
                        View Plans & Upgrade →
                    </a>
                </div>
            </div>

        @endif

    </div>
</div>

@endsection