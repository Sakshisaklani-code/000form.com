<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Subscription Reactivated</title>
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
            padding: 40px 40px 32px;
            text-align: center;
        }

        .logo { font-size: 1.4rem; font-weight: 800; letter-spacing: -0.03em; color: #fff; margin-bottom: 24px; display: inline-block; }
        .logo span { color: #00ff88; }

        .resume-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(0,255,136,0.1);
            border: 1px solid rgba(0,255,136,0.3);
            border-radius: 50px;
            padding: 8px 20px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: #00ff88;
            margin-bottom: 20px;
        }

        .header h1 { font-size: 1.75rem; font-weight: 800; letter-spacing: -0.03em; color: #fff; line-height: 1.2; margin-bottom: 10px; }
        .header p  { color: #777; font-size: 0.875rem; line-height: 1.6; }

        .body {
            background: #141414;
            border: 1px solid #222;
            border-top: none;
            border-bottom: none;
            padding: 0 40px 32px;
        }

        /* Plan display */
        .plan-display {
            background: #0f0f0f;
            border: 1px solid #1e1e1e;
            border-radius: 14px;
            padding: 20px 24px;
            margin-bottom: 28px;
            text-align: center;
        }

        .plan-display .pd-label { font-size: 0.65rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: #444; margin-bottom: 8px; }
        .plan-display .pd-name  { font-size: 1.15rem; font-weight: 800; color: #00ff88; letter-spacing: -0.02em; }
        .plan-display .pd-cycle { font-size: 0.75rem; color: #555; margin-top: 4px; }

        /* Callout */
        .callout {
            border-radius: 12px;
            padding: 16px 18px;
            margin-bottom: 28px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 0.85rem;
            background: rgba(0,255,136,0.06);
            border: 1px solid rgba(0,255,136,0.2);
        }

        .callout-icon { font-size: 1.2rem; flex-shrink: 0; margin-top: 2px; }
        .callout-text { color: #6ee7b7; }
        .callout-text strong { display: block; margin-bottom: 4px; font-size: 0.83rem; }

        .section-label { font-size: 0.65rem; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: #444; margin-bottom: 12px; }

        .details-table { width: 100%; border-collapse: collapse; margin-bottom: 28px; }
        .details-table tr { border-bottom: 1px solid #1a1a1a; }
        .details-table tr:last-child { border-bottom: none; }
        .details-table td { padding: 11px 0; font-size: 0.85rem; vertical-align: middle; }
        .details-table .label { color: #555; width: 45%; }
        .details-table .value { color: #e5e5e5; font-weight: 600; text-align: right; font-size: 0.83rem; }
        .details-table .value.accent { color: #00ff88; }
        .details-table .value.mono   { font-family: monospace; font-size: 0.75rem; word-break: break-all; }

        .divider { border: none; border-top: 1px solid #1a1a1a; margin: 20px 0; }

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
        }
    </style>
</head>
<body>
<div class="wrapper">

    {{-- HEADER --}}
    <div class="header">
        <div class="logo">000<span>form</span></div>

        <div class="resume-badge">✓ &nbsp;Subscription Reactivated</div>
        <h1>Welcome back! Your subscription is active again</h1>
        <p>
            Your <strong>{{ ucfirst($planName) }}</strong> plan has been successfully reactivated.
            @if($accessUntil)
                Your next billing date is <strong>{{ $accessUntil }}</strong>.
            @endif
        </p>
    </div>

    {{-- BODY --}}
    <div class="body">

        {{-- Active plan display --}}
        <div class="plan-display">
            <div class="pd-label">Active Plan</div>
            <div class="pd-name">{{ ucfirst($planName) }}</div>
            <div class="pd-cycle">{{ ucfirst($billingCycle) }} billing</div>
        </div>

        <div class="callout">
            <div class="callout-icon">🎉</div>
            <div class="callout-text">
                <strong>You're all set — full access restored</strong>
                Your {{ ucfirst($planName) }} plan is fully active. All your limits and features have been restored. No data was lost.
            </div>
        </div>

        <div class="section-label">Reactivation Details</div>
        <table class="details-table">
            <tr>
                <td class="label">Active Plan</td>
                <td class="value accent">{{ ucfirst($planName) }} – {{ ucfirst($billingCycle) }}</td>
            </tr>
            @if($accessUntil)
            <tr>
                <td class="label">Next Billing Date</td>
                <td class="value accent">{{ $accessUntil }}</td>
            </tr>
            @endif
            <tr>
                <td class="label">Reactivated At</td>
                <td class="value">{{ now()->format('M d, Y – H:i') }} UTC</td>
            </tr>
            @if($subscriptionId)
            <tr>
                <td class="label">Subscription ID</td>
                <td class="value mono">{{ $subscriptionId }}</td>
            </tr>
            @endif
            <tr>
                <td class="label">Account</td>
                <td class="value">{{ $userEmail }}</td>
            </tr>
        </table>

        <hr class="divider">

        <div class="cta-wrap">
            <a href="{{ config('app.url') }}/billing" class="cta-btn">View Billing Dashboard →</a>
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