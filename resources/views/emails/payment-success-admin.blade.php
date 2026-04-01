<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>New Payment Received</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background-color: #0f0f0f;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: #e5e5e5;
            -webkit-font-smoothing: antialiased;
        }

        .wrapper {
            max-width: 580px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        /* ── HEADER ── */
        .header {
            background: #141414;
            border: 1px solid #222;
            border-radius: 20px 20px 0 0;
            border-bottom: none;
            padding: 36px 40px 28px;
            text-align: center;
        }

        .logo {
            font-size: 1.2rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            color: #ffffff;
            margin-bottom: 20px;
            display: inline-block;
        }

        .logo span { color: #00ff88; }

        .admin-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(99, 102, 241, 0.12);
            border: 1px solid rgba(99, 102, 241, 0.3);
            border-radius: 50px;
            padding: 6px 16px;
            font-size: 0.7rem;
            font-weight: 700;
            color: #818cf8;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 16px;
        }

        .header h1 {
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            color: #ffffff;
            line-height: 1.25;
            margin-bottom: 8px;
        }

        .header p {
            color: #666;
            font-size: 0.85rem;
        }

        /* ── BODY ── */
        .body {
            background: #141414;
            border: 1px solid #222;
            border-top: none;
            border-bottom: none;
            padding: 0 40px 32px;
        }

        /* ── REVENUE HIGHLIGHT ── */
        .revenue-card {
            background: linear-gradient(135deg, rgba(99,102,241,0.1) 0%, rgba(139,92,246,0.05) 100%);
            border: 1px solid rgba(99, 102, 241, 0.25);
            border-radius: 14px;
            padding: 20px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
            gap: 16px;
        }

        .revenue-card .left .label {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #666;
            margin-bottom: 4px;
        }

        .revenue-card .left .amount {
            font-size: 1.8rem;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: -0.03em;
        }

        .revenue-card .right {
            text-align: right;
        }

        .revenue-card .right .plan-badge {
            background: rgba(0,255,136,0.1);
            border: 1px solid rgba(0,255,136,0.25);
            color: #00ff88;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 8px;
            letter-spacing: 0.02em;
            display: inline-block;
            margin-bottom: 6px;
        }

        .revenue-card .right .billing-cycle {
            font-size: 0.75rem;
            color: #555;
            display: block;
        }

        /* ── SECTION LABEL ── */
        .section-label {
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #444;
            margin-bottom: 12px;
            padding-top: 4px;
        }

        /* ── DETAILS TABLE ── */
        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 24px;
        }

        .details-table tr {
            border-bottom: 1px solid #1a1a1a;
        }

        .details-table tr:last-child {
            border-bottom: none;
        }

        .details-table td {
            padding: 11px 0;
            font-size: 0.83rem;
            vertical-align: middle;
        }

        .details-table .label {
            color: #555;
            width: 42%;
        }

        .details-table .value {
            color: #d4d4d4;
            font-weight: 600;
            text-align: right;
            font-family: 'Courier New', monospace;
            font-size: 0.78rem;
            word-break: break-all;
        }

        .details-table .value.highlight {
            color: #00ff88;
            font-family: -apple-system, sans-serif;
            font-size: 0.83rem;
        }

        .details-table .value.user-email {
            color: #818cf8;
            font-family: -apple-system, sans-serif;
            font-size: 0.83rem;
        }

        /* ── DIVIDER ── */
        .divider {
            border: none;
            border-top: 1px solid #1a1a1a;
            margin: 20px 0;
        }

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
            margin-bottom: 20px;
        }

        .invoice-wrap .inv-label {
            font-size: 0.8rem;
            color: #555;
        }

        .invoice-wrap .inv-link {
            font-size: 0.78rem;
            font-weight: 600;
            color: #00ff88;
            text-decoration: none;
            white-space: nowrap;
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

        .footer p {
            color: #333;
            font-size: 0.75rem;
            line-height: 1.7;
        }

        .footer a {
            color: #444;
            text-decoration: none;
        }

        @media (max-width: 480px) {
            .header, .body { padding-left: 20px; padding-right: 20px; }
            .footer { padding: 20px; }
            .revenue-card { flex-direction: column; align-items: flex-start; }
            .revenue-card .right { text-align: left; }
            .revenue-card .left .amount { font-size: 1.5rem; }
        }
    </style>
</head>
<body>
<div class="wrapper">

    {{-- ── HEADER ── --}}
    <div class="header">
        <div class="admin-badge">⚡ Admin Notification</div><br>
        <div class="logo">000<span>form</span></div>

        

        <h1>New Payment Received</h1>
        <p>A user just completed a successful subscription payment.</p>
    </div>

    {{-- ── BODY ── --}}
    <div class="body">

        {{-- Revenue highlight --}}
        <div class="revenue-card">
            <div class="left">
                <div class="label">Amount Received</div>
                <div class="amount">{{ $amount }}</div>
            </div>
            <div class="right">
                <div class="plan-badge">{{ ucfirst($planName) }}</div>
                <span class="billing-cycle">{{ ucfirst($billingCycle) }} billing</span>
            </div>
        </div>

        {{-- User details --}}
        <div class="section-label">User Details</div>
        <table class="details-table">
            <tr>
                <td class="label">User ID</td>
                <td class="value">#{{ $userId }}</td>
            </tr>
            <tr>
                <td class="label">Email</td>
                <td class="value user-email">{{ $userEmail }}</td>
            </tr>
            @if($paddleCustomerId)
            <tr>
                <td class="label">Paddle Customer ID</td>
                <td class="value">{{ $paddleCustomerId }}</td>
            </tr>
            @endif
        </table>

        <hr class="divider">

        {{-- Payment details --}}
        <div class="section-label">Payment Details</div>
        <table class="details-table">
            <tr>
                <td class="label">Plan</td>
                <td class="value highlight">{{ ucfirst($planName) }} – {{ ucfirst($billingCycle) }}</td>
            </tr>
            <tr>
                <td class="label">Amount</td>
                <td class="value highlight">{{ $amount }} {{ strtoupper($currency) }}</td>
            </tr>
            <tr>
                <td class="label">Access Until</td>
                <td class="value">{{ $periodEnd }}</td>
            </tr>
            <tr>
                <td class="label">Subscription ID</td>
                <td class="value">{{ $subscriptionId }}</td>
            </tr>
            <tr>
                <td class="label">Transaction ID</td>
                <td class="value">{{ $transactionId }}</td>
            </tr>
            <tr>
                <td class="label">Payment Time</td>
                <td class="value">{{ now()->format('M d, Y – H:i:s') }} UTC</td>
            </tr>
        </table>

        {{-- Invoice link --}}
        @if($invoiceUrl)
        <hr class="divider">
        <div class="invoice-wrap">
            <span class="inv-label">📄 Paddle Invoice PDF</span>
            <a href="{{ $invoiceUrl }}" class="inv-link" target="_blank">↓ Download Invoice</a>
        </div>
        @endif

    </div>

    {{-- ── FOOTER ── --}}
    <div class="footer">
        <p>This is an automated admin alert from 000form.</p>
        <p style="margin-top: 6px;">
            © {{ date('Y') }} 000form &nbsp;·&nbsp;
            <a href="{{ config('app.url') }}/admin">Admin Panel</a>
        </p>
    </div>

</div>
</body>
</html>