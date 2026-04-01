<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Plan Upgrade Notification</title>
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
            font-size: 1.4rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            color: #ffffff;
            margin-bottom: 8px;
        }

        .header p { color: #555; font-size: 0.85rem; }

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
            padding: 20px 24px;
            margin-bottom: 28px;
        }

        .plan-pill { text-align: center; flex: 1; }

        .plan-pill .pill-label {
            font-size: 0.6rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #444;
            margin-bottom: 6px;
        }

        .plan-pill .pill-name {
            font-size: 1.05rem;
            font-weight: 800;
            letter-spacing: -0.02em;
        }

        .plan-pill .pill-name.old { color: #444; }
        .plan-pill .pill-name.new { color: #00ff88; }

        .plan-pill .pill-cycle { font-size: 0.7rem; color: #444; margin-top: 3px; }

        .type-tag {
            display: inline-block;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            border-radius: 6px;
            padding: 3px 8px;
            margin-top: 6px;
        }

        .type-immediate { background: rgba(0,255,136,0.1); color: #00ff88; }
        .type-scheduled { background: rgba(251,191,36,0.1); color: #fbbf24; }

        .arrow { font-size: 1.3rem; color: #2a2a2a; flex-shrink: 0; }

        /* ── SECTION LABEL ── */
        .section-label {
            font-size: 0.62rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #3a3a3a;
            margin-bottom: 10px;
        }

        /* ── DETAILS TABLE ── */
        .details-table { width: 100%; border-collapse: collapse; margin-bottom: 24px; }

        .details-table tr { border-bottom: 1px solid #1a1a1a; }
        .details-table tr:last-child { border-bottom: none; }

        .details-table td { padding: 11px 0; font-size: 0.83rem; vertical-align: middle; }

        .details-table .label { color: #444; width: 42%; }

        .details-table .value {
            color: #ccc;
            font-weight: 600;
            text-align: right;
            font-size: 0.8rem;
        }

        .details-table .value.accent { color: #00ff88; font-size: 0.83rem; }
        .details-table .value.user-col { color: #818cf8; font-size: 0.83rem; }
        .details-table .value.mono { font-family: monospace; font-size: 0.75rem; word-break: break-all; }

        /* ── DIVIDER ── */
        .divider { border: none; border-top: 1px solid #1a1a1a; margin: 20px 0; }

        /* ── FOOTER ── */
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
            .plan-change { flex-direction: column; gap: 8px; }
        }
    </style>
</head>
<body>
<div class="wrapper">

    {{-- HEADER --}}
    <div class="header">
        <div class="admin-badge">⚡ Admin Notification</div><br>
        <div class="logo">000<span>form</span></div>
        
        <h1>Plan {{ $isImmediate ? 'Upgraded' : 'Upgrade Scheduled' }}</h1>
        <p>A user has {{ $isImmediate ? 'upgraded their plan immediately' : 'scheduled a plan upgrade' }}.</p>
    </div>

    {{-- BODY --}}
    <div class="body">

        {{-- Plan change visual --}}
        <div class="plan-change">
            <div class="plan-pill">
                <div class="pill-label">From</div>
                <div class="pill-name old">{{ ucfirst($oldPlan) }}</div>
                <div class="pill-cycle">{{ ucfirst($oldBilling) }}</div>
            </div>
            <div class="arrow">→</div>
            <div class="plan-pill">
                <div class="pill-label">To</div>
                <div class="pill-name new">{{ ucfirst($newPlan) }}</div>
                <div class="pill-cycle">{{ ucfirst($newBilling) }}</div>
                <div>
                    <span class="type-tag {{ $isImmediate ? 'type-immediate' : 'type-scheduled' }}">
                        {{ $isImmediate ? 'Immediate' : 'Scheduled' }}
                    </span>
                </div>
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

        {{-- Plan change details --}}
        <div class="section-label">Change Details</div>
        <table class="details-table">
            <tr>
                <td class="label">Previous Plan</td>
                <td class="value">{{ ucfirst($oldPlan) }} – {{ ucfirst($oldBilling) }}</td>
            </tr>
            <tr>
                <td class="label">New Plan</td>
                <td class="value accent">{{ ucfirst($newPlan) }} – {{ ucfirst($newBilling) }}</td>
            </tr>
            <tr>
                <td class="label">Type</td>
                <td class="value">{{ $isImmediate ? 'Immediate upgrade' : 'Scheduled at renewal' }}</td>
            </tr>
            <tr>
                <td class="label">{{ $isImmediate ? 'Effective From' : 'Effective Date' }}</td>
                <td class="value">{{ $effectiveAt }}</td>
            </tr>
            @if($subscriptionId)
            <tr>
                <td class="label">Subscription ID</td>
                <td class="value mono">{{ $subscriptionId }}</td>
            </tr>
            @endif
            <tr>
                <td class="label">Changed At</td>
                <td class="value">{{ now()->format('M d, Y – H:i:s') }} UTC</td>
            </tr>
        </table>

    </div>

    {{-- FOOTER --}}
    <div class="footer">
        <p>Automated admin alert from 000form.</p>
        <p style="margin-top: 6px;">
            © {{ date('Y') }} 000form &nbsp;·&nbsp;
            <a href="{{ config('app.url') }}/admin">Admin Panel</a>
        </p>
    </div>

</div>
</body>
</html>