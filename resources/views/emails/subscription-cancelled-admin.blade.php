<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>
        @if($cancelType === 'scheduled_change')Scheduled Upgrade Cancelled
        @else Subscription Cancelled
        @endif
        – Admin
    </title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background-color: #0f0f0f;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: #e5e5e5;
            -webkit-font-smoothing: antialiased;
        }

        .wrapper { max-width: 580px; margin: 0 auto; padding: 40px 20px; }

        .header {
            background: #141414;
            border: 1px solid #222;
            border-radius: 20px 20px 0 0;
            border-bottom: none;
            padding: 36px 40px 28px;
            text-align: center;
        }

        .logo { font-size: 1.2rem; font-weight: 800; letter-spacing: -0.03em; color: #fff; margin-bottom: 20px; display: inline-block; }
        .logo span { color: #00ff88; }

        .admin-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(99,102,241,0.12);
            border: 1px solid rgba(99,102,241,0.3);
            border-radius: 50px;
            padding: 6px 16px;
            font-size: 0.7rem;
            font-weight: 700;
            color: #818cf8;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 16px;
        }

        .header h1 { font-size: 1.4rem; font-weight: 800; letter-spacing: -0.03em; color: #fff; margin-bottom: 8px; }
        .header p  { color: #555; font-size: 0.85rem; }

        /* ── ALERT CARD ── */
        .alert-card {
            border-radius: 14px;
            padding: 20px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
            gap: 16px;
        }

        .alert-sub   { background: linear-gradient(135deg, rgba(239,68,68,0.1), rgba(220,38,38,0.05)); border: 1px solid rgba(239,68,68,0.25); }
        .alert-sched { background: linear-gradient(135deg, rgba(251,191,36,0.1), rgba(245,158,11,0.05)); border: 1px solid rgba(251,191,36,0.25); }

        .alert-card .left .al-label { font-size: 0.7rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: #666; margin-bottom: 4px; }
        .alert-card .left .al-plan  { font-size: 1.4rem; font-weight: 800; letter-spacing: -0.02em; }
        .alert-sub   .left .al-plan { color: #f87171; }
        .alert-sched .left .al-plan { color: #fbbf24; }

        .alert-card .right .al-type {
            font-size: 0.75rem;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 8px;
            display: inline-block;
        }

        .type-sub   { background: rgba(239,68,68,0.12); color: #f87171; }
        .type-sched { background: rgba(251,191,36,0.12); color: #fbbf24; }

        .alert-card .right .al-cycle { font-size: 0.75rem; color: #555; display: block; margin-top: 6px; }

        /* ── BODY ── */
        .body {
            background: #141414;
            border: 1px solid #222;
            border-top: none;
            border-bottom: none;
            padding: 0 40px 32px;
        }

        .section-label { font-size: 0.62rem; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: #3a3a3a; margin-bottom: 10px; }

        .details-table { width: 100%; border-collapse: collapse; margin-bottom: 24px; }
        .details-table tr { border-bottom: 1px solid #1a1a1a; }
        .details-table tr:last-child { border-bottom: none; }
        .details-table td { padding: 11px 0; font-size: 0.83rem; vertical-align: middle; }
        .details-table .label { color: #444; width: 42%; }
        .details-table .value { color: #ccc; font-weight: 600; text-align: right; font-size: 0.8rem; }
        .details-table .value.accent  { color: #00ff88; font-size: 0.83rem; }
        .details-table .value.danger  { color: #f87171; font-size: 0.83rem; }
        .details-table .value.warning { color: #fbbf24; font-size: 0.83rem; }
        .details-table .value.user-col { color: #818cf8; font-size: 0.83rem; }
        .details-table .value.mono { font-family: monospace; font-size: 0.75rem; word-break: break-all; }

        .divider { border: none; border-top: 1px solid #1a1a1a; margin: 20px 0; }

        .footer {
            background: #0a0a0a;
            border: 1px solid #1a1a1a;
            border-top: none;
            border-radius: 0 0 20px 20px;
            padding: 24px 40px;
            text-align: center;
        }

        .footer p { color: #2e2e2e; font-size: 0.75rem; line-height: 1.7; }
        .footer a { color: #3a3a3a; text-decoration: none; }

        @media (max-width: 480px) {
            .header, .body { padding-left: 20px; padding-right: 20px; }
            .footer { padding: 20px; }
            .alert-card { flex-direction: column; align-items: flex-start; }
        }
    </style>
</head>
<body>
<div class="wrapper">

    {{-- HEADER --}}
    <div class="header">
        <div class="admin-badge">⚡ Admin Notification</div><br>
        <div class="logo">000<span>form</span></div>

        @if($cancelType === 'scheduled_change')
            <h1>Scheduled Upgrade Cancelled</h1>
            <p>A user has cancelled their pending plan upgrade.</p>
        @else
            <h1>Subscription Cancelled</h1>
            <p>A user has cancelled their subscription.</p>
        @endif
    </div>

    {{-- BODY --}}
    <div class="body">

        {{-- Alert card --}}
        <div class="alert-card {{ $cancelType === 'scheduled_change' ? 'alert-sched' : 'alert-sub' }}">
            <div class="left">
                <div class="al-label">
                    @if($cancelType === 'scheduled_change') Upgrade Cancelled @else Cancelled Plan @endif
                </div>
                <div class="al-plan">
                    @if($cancelType === 'scheduled_change')
                        {{ ucfirst($cancelledNewPlan) }}
                    @else
                        {{ ucfirst($planName) }}
                    @endif
                </div>
            </div>
            <div class="right">
                <!-- <div class="al-type {{ $cancelType === 'scheduled_change' ? 'type-sched' : 'type-sub' }}">
                    {{ $cancelType === 'scheduled_change' ? 'Scheduled Cancel' : 'Immediate Cancel' }}
                </div> -->
                <span class="al-cycle">{{ ucfirst($billingCycle) }} billing</span>
            </div>
        </div>

        {{-- User details --}}
        <div class="section-label">User Details</div>
        <table class="details-table">
            <tr>
                <td class="label">User ID</td>
                <td class="value mono">#{{ $userId }}</td>
            </tr>
            <tr>
                <td class="label">Email</td>
                <td class="value user-col">{{ $userEmail }}</td>
            </tr>
            @if($paddleCustomerId)
            <tr>
                <td class="label">Paddle Customer ID</td>
                <td class="value mono">{{ $paddleCustomerId }}</td>
            </tr>
            @endif
        </table>

        <hr class="divider">

        {{-- Cancellation details --}}
        <div class="section-label">Cancellation Details</div>
        <table class="details-table">

            @if($cancelType === 'scheduled_change')
                <tr>
                    <td class="label">Kept Plan</td>
                    <td class="value accent">{{ ucfirst($planName) }} – {{ ucfirst($billingCycle) }}</td>
                </tr>
                <tr>
                    <td class="label">Cancelled Upgrade</td>
                    <td class="value danger">{{ ucfirst($cancelledNewPlan) }} – {{ ucfirst($cancelledNewBilling) }}</td>
                </tr>
                <tr>
                    <td class="label">Type</td>
                    <td class="value warning">Scheduled upgrade cancelled</td>
                </tr>
            @else
                <tr>
                    <td class="label">Cancelled Plan</td>
                    <td class="value">{{ ucfirst($planName) }} – {{ ucfirst($billingCycle) }}</td>
                </tr>
                @if($accessUntil)
                <tr>
                    <td class="label">Access Until</td>
                    <td class="value warning">{{ $accessUntil }}</td>
                </tr>
                @endif
                <tr>
                    <td class="label">After Expiry</td>
                    <td class="value">Free plan</td>
                </tr>
                <tr>
                    <td class="label">Type</td>
                    <td class="value danger">Subscription cancelled</td>
                </tr>
            @endif

            @if($subscriptionId)
            <tr>
                <td class="label">Subscription ID</td>
                <td class="value mono">{{ $subscriptionId }}</td>
            </tr>
            @endif
            <tr>
                <td class="label">Cancelled At</td>
                <td class="value">{{ now()->format('M d, Y – H:i:s') }} UTC</td>
            </tr>
        </table>

    </div>

    {{-- FOOTER --}}
    <div class="footer">
        <p>Automated admin alert from 000form.</p>
        <p style="margin-top: 6px;">
            © {{ date('Y') }} 000form &nbsp;·&nbsp;
        </p>
    </div>

</div>
</body>
</html>