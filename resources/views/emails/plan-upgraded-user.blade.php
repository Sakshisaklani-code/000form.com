<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Plan {{ $isImmediate ? 'Upgraded' : 'Upgrade Scheduled' }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background-color: #0f0f0f;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: #e5e5e5;
            -webkit-font-smoothing: antialiased;
        }

        .wrapper { max-width: 580px; margin: 0 auto; padding: 40px 20px; }

        /* ── HEADER ── */
        .header {
            background: #141414;
            border: 1px solid #222;
            border-radius: 20px 20px 0 0;
            border-bottom: none;
            padding: 40px 40px 32px;
            text-align: center;
        }

        .logo {
            font-size: 1.4rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            color: #ffffff;
            margin-bottom: 24px;
            display: inline-block;
        }

        .logo span { color: #00ff88; }

        .upgrade-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border-radius: 50px;
            padding: 8px 20px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .badge-immediate {
            background: rgba(0, 255, 136, 0.1);
            border: 1px solid rgba(0, 255, 136, 0.3);
            color: #00ff88;
        }

        .badge-scheduled {
            background: rgba(251, 191, 36, 0.1);
            border: 1px solid rgba(251, 191, 36, 0.3);
            color: #fbbf24;
        }

        .header h1 {
            font-size: 1.75rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            color: #ffffff;
            line-height: 1.2;
            margin-bottom: 10px;
        }

        .header p { color: #777; font-size: 0.875rem; line-height: 1.6; }

        /* ── BODY ── */
        .body {
            background: #141414;
            border: 1px solid #222;
            border-top: none;
            border-bottom: none;
            padding: 0 40px 32px;
        }

        /* ── PLAN CHANGE VISUAL ── */
        .plan-change {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            background: #0f0f0f;
            border: 1px solid #1e1e1e;
            border-radius: 14px;
            padding: 24px;
            margin-bottom: 28px;
        }

        .plan-pill { text-align: center; flex: 1; }

        .plan-pill .pill-label {
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #555;
            margin-bottom: 8px;
        }

        .plan-pill .pill-name {
            font-size: 1.1rem;
            font-weight: 800;
            letter-spacing: -0.02em;
        }

        .plan-pill .pill-name.old { color: #555; }
        .plan-pill .pill-name.new { color: #00ff88; }

        .plan-pill .pill-cycle { font-size: 0.72rem; color: #555; margin-top: 4px; text-transform: capitalize; }

        .arrow { font-size: 1.4rem; color: #333; flex-shrink: 0; }

        /* ── PAYMENT HIGHLIGHT CARD (immediate only) ── */
        .payment-card {
            background: linear-gradient(135deg, rgba(0, 30, 20, 0.6) 0%, rgba(0, 20, 12, 0.4) 100%);
            border: 1px solid rgba(0, 255, 136, 0.25);
            border-radius: 16px;
            padding: 24px;
            text-align: center;
            margin-bottom: 28px;
        }

        .payment-card .pay-label {
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #7effb3;
            background: rgba(0, 255, 136, 0.12);
            display: inline-block;
            padding: 4px 12px;
            border-radius: 40px;
            margin-bottom: 12px;
        }

        .payment-card .pay-amount {
            font-size: 2.4rem;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: -0.03em;
            margin-bottom: 6px;
        }

        .payment-card .pay-currency {
            font-size: 0.78rem;
            color: #555;
        }

        .payment-card .pay-renewal {
            font-size: 0.78rem;
            color: #666;
            border-top: 1px dashed #2a2a2a;
            padding-top: 12px;
            margin-top: 12px;
        }

        /* ── EFFECTIVE DATE CALLOUT ── */
        .effective-callout {
            border-radius: 12px;
            padding: 14px 18px;
            margin-bottom: 28px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.85rem;
        }

        .callout-immediate {
            background: rgba(0, 255, 136, 0.06);
            border: 1px solid rgba(0, 255, 136, 0.2);
        }

        .callout-scheduled {
            background: rgba(251, 191, 36, 0.06);
            border: 1px solid rgba(251, 191, 36, 0.2);
        }

        .callout-icon { font-size: 1.2rem; flex-shrink: 0; }
        .callout-immediate .callout-text { color: #a3f0cc; }
        .callout-scheduled .callout-text { color: #fde68a; }
        .callout-text strong { display: block; margin-bottom: 2px; font-size: 0.8rem; }

        /* ── SECTION LABEL ── */
        .section-label {
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #444;
            margin-bottom: 12px;
        }

        /* ── DETAILS TABLE ── */
        .details-table { width: 100%; border-collapse: collapse; margin-bottom: 28px; }
        .details-table tr { border-bottom: 1px solid #1a1a1a; }
        .details-table tr:last-child { border-bottom: none; }

        .details-table td { padding: 11px 0; font-size: 0.85rem; vertical-align: middle; }

        .details-table .label { color: #555; width: 45%; }

        .details-table .value {
            color: #e5e5e5;
            font-weight: 600;
            text-align: right;
            font-size: 0.83rem;
        }

        .details-table .value.accent { color: #00ff88; }
        .details-table .value.mono { font-family: monospace; font-size: 0.75rem; word-break: break-all; }

        /* ── DIVIDER ── */
        .divider { border: none; border-top: 1px solid #1a1a1a; margin: 20px 0; }

        /* ── INVOICE LINK ── */
        .invoice-wrap {
            background: #0f0f0f;
            border: 1px solid #1e1e1e;
            border-radius: 10px;
            padding: 14px 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 24px;
        }

        .invoice-wrap .inv-label { font-size: 0.8rem; color: #555; }

        .invoice-wrap .inv-link {
            font-size: 0.78rem;
            font-weight: 600;
            color: #00ff88;
            text-decoration: none;
            white-space: nowrap;
        }

        /* ── CTA ── */
        .cta-wrap { text-align: center; margin: 24px 0 8px; }

        .cta-btn {
            display: inline-block;
            background: #00ff88;
            color: #0a0a0a;
            font-weight: 700;
            font-size: 0.9rem;
            padding: 14px 32px;
            border-radius: 10px;
            text-decoration: none;
        }

        /* ── FOOTER ── */
        .footer {
            background: #0a0a0a;
            border: 1px solid #1a1a1a;
            border-top: none;
            border-radius: 0 0 20px 20px;
            padding: 24px 40px;
            text-align: center;
        }

        .footer p { color: #333; font-size: 0.75rem; line-height: 1.7; }
        .footer a { color: #444; text-decoration: none; }

        @media (max-width: 480px) {
            .header, .body { padding-left: 20px; padding-right: 20px; }
            .footer { padding: 20px; }
            .plan-change { flex-direction: column; gap: 8px; }
            .arrow { transform: rotate(90deg); }
        }
    </style>
</head>
<body>
<div class="wrapper">

    {{-- HEADER --}}
    <div class="header">
        <div class="logo">000<span>form</span></div>

        <div class="upgrade-badge {{ $isImmediate ? 'badge-immediate' : 'badge-scheduled' }}">
            ⬆ &nbsp;{{ $isImmediate ? 'Plan Upgraded' : 'Upgrade Scheduled' }}
        </div>

        <h1>
            @if($isImmediate)
                Your plan is now upgraded!
            @else
                Your upgrade is scheduled
            @endif
        </h1>

        <p>
            @if($isImmediate)
                Your new plan is active immediately. Here's a full summary of your upgrade.
            @else
                Your plan will upgrade on <strong>{{ $effectiveAt }}</strong>. No action needed.
            @endif
        </p>
    </div>

    {{-- BODY --}}
    <div class="body">

        {{-- Plan change visual --}}
        <div class="plan-change">
            <div class="plan-pill">
                <div class="pill-label">Previous</div>
                <div class="pill-name old">{{ ucfirst($oldPlan) }}</div>
                <div class="pill-cycle">{{ ucfirst($oldBilling) }}</div>
            </div>
            <div class="arrow">→</div>
            <div class="plan-pill">
                <div class="pill-label">{{ $isImmediate ? 'New Plan' : 'Upgrading To' }}</div>
                <div class="pill-name new">{{ ucfirst($newPlan) }}</div>
                <div class="pill-cycle">{{ ucfirst($newBilling) }}</div>
            </div>
        </div>

        {{-- Payment highlight (immediate upgrades only) --}}
        @if($isImmediate && $amount)
        <div class="payment-card">
            <div class="pay-label">{{ ucfirst($newBilling) }} Plan</div>
            <div class="pay-amount">{{ $amount }}</div>
            @if($currency)
            <div class="pay-currency">{{ strtoupper($currency) }}</div>
            @endif
            @if($periodEnd)
            <div class="pay-renewal">Next renewal on {{ $periodEnd }}</div>
            @endif
        </div>
        @endif

        {{-- Effective date callout --}}
        <div class="effective-callout {{ $isImmediate ? 'callout-immediate' : 'callout-scheduled' }}">
            <div class="callout-icon">{{ $isImmediate ? '✅' : '🗓' }}</div>
            <div class="callout-text">
                @if($isImmediate)
                    <strong>Active now</strong>
                    Your new plan limits are live immediately. Enjoy your upgraded access!
                @else
                    <strong>Effective {{ $effectiveAt }}</strong>
                    Your current plan remains active until then. The upgrade applies automatically at renewal.
                @endif
            </div>
        </div>

        {{-- Change summary --}}
        <div class="section-label">{{ $isImmediate ? 'Upgrade Summary' : 'Change Summary' }}</div>
        <table class="details-table">
            <tr>
                <td class="label">Previous Plan</td>
                <td class="value">{{ ucfirst($oldPlan) }} – {{ ucfirst($oldBilling) }}</td>
            </tr>
            <tr>
                <td class="label">New Plan</td>
                <td class="value accent">{{ ucfirst($newPlan) }} – {{ ucfirst($newBilling) }}</td>
            </tr>
            @if($isImmediate && $amount)
            <tr>
                <td class="label">Amount Charged</td>
                <td class="value accent">{{ $amount }}{{ $currency ? ' ' . strtoupper($currency) : '' }}</td>
            </tr>
            @endif
            <tr>
                <td class="label">{{ $isImmediate ? 'Effective From' : 'Effective Date' }}</td>
                <td class="value">{{ $effectiveAt }}</td>
            </tr>
            @if($isImmediate && $periodEnd)
            <tr>
                <td class="label">Access Until</td>
                <td class="value">{{ $periodEnd }}</td>
            </tr>
            @endif
            @if($subscriptionId)
            <tr>
                <td class="label">Subscription ID</td>
                <td class="value mono">{{ $subscriptionId }}</td>
            </tr>
            @endif
            @if($isImmediate && $transactionId)
            <tr>
                <td class="label">Transaction ID</td>
                <td class="value mono">{{ $transactionId }}</td>
            </tr>
            @endif
            <tr>
                <td class="label">Account</td>
                <td class="value">{{ $userEmail }}</td>
            </tr>
        </table>

        {{-- Invoice PDF link (immediate upgrades only) --}}
        @if($isImmediate && $invoiceUrl)
        <hr class="divider">
        <div class="invoice-wrap">
            <span class="inv-label">📄 Invoice PDF</span>
            <a href="{{ $invoiceUrl }}" class="inv-link" target="_blank">↓ Download Invoice</a>
        </div>
        @endif

        <hr class="divider">

        <div class="cta-wrap">
            <a href="{{ config('app.url') }}/billing" class="cta-btn">View Plan Details →</a>
        </div>

    </div>

    {{-- FOOTER --}}
    <div class="footer">
        <p>
            Questions? Contact us at
            <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a>
        </p>
        <p style="margin-top: 6px;">
            © {{ date('Y') }} 000form &nbsp;·&nbsp;
            <a href="{{ config('app.url') }}/billing">Manage Subscription</a>
        </p>
    </div>

</div>
</body>
</html>