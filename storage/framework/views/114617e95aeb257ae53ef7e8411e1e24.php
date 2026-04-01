<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>
        <?php if($cancelType === 'scheduled_change'): ?>Scheduled Upgrade Cancelled
        <?php else: ?> Subscription Cancelled
        <?php endif; ?>
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
            padding: 40px 40px 32px;
            text-align: center;
        }

        .logo { font-size: 1.4rem; font-weight: 800; letter-spacing: -0.03em; color: #fff; margin-bottom: 24px; display: inline-block; }
        .logo span { color: #00ff88; }

        .cancel-badge {
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

        .badge-sub    { background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.3); color: #f87171; }
        .badge-sched  { background: rgba(251,191,36,0.1); border: 1px solid rgba(251,191,36,0.3); color: #fbbf24; }

        .header h1 { font-size: 1.75rem; font-weight: 800; letter-spacing: -0.03em; color: #fff; line-height: 1.2; margin-bottom: 10px; }
        .header p  { color: #777; font-size: 0.875rem; line-height: 1.6; }

        .body {
            background: #141414;
            border: 1px solid #222;
            border-top: none;
            border-bottom: none;
            padding: 0 40px 32px;
        }

        /* Plan display (subscription cancel) */
        .plan-display {
            background: #0f0f0f;
            border: 1px solid #1e1e1e;
            border-radius: 14px;
            padding: 20px 24px;
            margin-bottom: 28px;
            text-align: center;
        }

        .plan-display .pd-label { font-size: 0.65rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: #444; margin-bottom: 8px; }
        .plan-display .pd-name  { font-size: 1.15rem; font-weight: 800; color: #666; letter-spacing: -0.02em; }
        .plan-display .pd-cycle { font-size: 0.75rem; color: #444; margin-top: 4px; }

        /* Plan change (scheduled cancel) */
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
        .plan-pill .pill-label { font-size: 0.65rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: #555; margin-bottom: 8px; }
        .plan-pill .pill-name  { font-size: 1.05rem; font-weight: 800; letter-spacing: -0.02em; }
        .plan-pill .pill-name.keep      { color: #00ff88; }
        .plan-pill .pill-name.gone      { color: #555; text-decoration: line-through; }
        .plan-pill .pill-cycle { font-size: 0.72rem; color: #555; margin-top: 4px; text-transform: capitalize; }
        .cross { font-size: 1.4rem; color: #ef4444; flex-shrink: 0; }

        /* Callout */
        .callout {
            border-radius: 12px;
            padding: 16px 18px;
            margin-bottom: 28px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 0.85rem;
        }

        .callout-sub    { background: rgba(239,68,68,0.06); border: 1px solid rgba(239,68,68,0.2); }
        .callout-sched  { background: rgba(251,191,36,0.06); border: 1px solid rgba(251,191,36,0.2); }
        .callout-icon   { font-size: 1.2rem; flex-shrink: 0; margin-top: 2px; }
        .callout-sub   .callout-text { color: #fca5a5; }
        .callout-sched .callout-text { color: #fde68a; }
        .callout-text strong { display: block; margin-bottom: 4px; font-size: 0.83rem; }

        .section-label { font-size: 0.65rem; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: #444; margin-bottom: 12px; }

        .details-table { width: 100%; border-collapse: collapse; margin-bottom: 28px; }
        .details-table tr { border-bottom: 1px solid #1a1a1a; }
        .details-table tr:last-child { border-bottom: none; }
        .details-table td { padding: 11px 0; font-size: 0.85rem; vertical-align: middle; }
        .details-table .label { color: #555; width: 45%; }
        .details-table .value { color: #e5e5e5; font-weight: 600; text-align: right; font-size: 0.83rem; }
        .details-table .value.accent { color: #00ff88; }
        .details-table .value.danger  { color: #f87171; }
        .details-table .value.mono    { font-family: monospace; font-size: 0.75rem; word-break: break-all; }

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
            .plan-change { flex-direction: column; gap: 8px; }
        }
    </style>
</head>
<body>
<div class="wrapper">

    
    <div class="header">
        <div class="logo">000<span>form</span></div>

        <?php if($cancelType === 'scheduled_change'): ?>
            <div class="cancel-badge badge-sched">✕ &nbsp;Scheduled Upgrade Cancelled</div>
            <h1>Your scheduled upgrade has been cancelled</h1>
            <p>
                The pending upgrade to <strong><?php echo e(ucfirst($cancelledNewPlan)); ?></strong> has been removed.
                You'll stay on your current <strong><?php echo e(ucfirst($planName)); ?></strong> plan.
            </p>
        <?php else: ?>
            <div class="cancel-badge badge-sub">✕ &nbsp;Subscription Cancelled</div>
            <h1>Your subscription has been cancelled</h1>
            <p>
                Your access continues until
                <?php if($accessUntil): ?>
                    <strong><?php echo e($accessUntil); ?></strong>.
                <?php else: ?>
                    the end of your billing period.
                <?php endif; ?>
            </p>
        <?php endif; ?>
    </div>

    
    <div class="body">

        <?php if($cancelType === 'scheduled_change'): ?>

            
            <div class="plan-change">
                <div class="plan-pill">
                    <div class="pill-label">Staying On</div>
                    <div class="pill-name keep"><?php echo e(ucfirst($planName)); ?></div>
                    <div class="pill-cycle"><?php echo e(ucfirst($billingCycle)); ?></div>
                </div>
                <div class="cross">✕</div>
                <div class="plan-pill">
                    <div class="pill-label">Upgrade Cancelled</div>
                    <div class="pill-name gone"><?php echo e(ucfirst($cancelledNewPlan)); ?></div>
                    <div class="pill-cycle"><?php echo e(ucfirst($cancelledNewBilling)); ?></div>
                </div>
            </div>

            <div class="callout callout-sched">
                <div class="callout-icon">🗓</div>
                <div class="callout-text">
                    <strong>No change to your current plan</strong>
                    Your <?php echo e(ucfirst($planName)); ?> plan stays active. The scheduled upgrade to <?php echo e(ucfirst($cancelledNewPlan)); ?> has been fully removed — no action needed.
                </div>
            </div>

            <div class="section-label">Summary</div>
            <table class="details-table">
                <tr>
                    <td class="label">Current Plan</td>
                    <td class="value accent"><?php echo e(ucfirst($planName)); ?> – <?php echo e(ucfirst($billingCycle)); ?></td>
                </tr>
                <tr>
                    <td class="label">Cancelled Upgrade</td>
                    <td class="value danger"><?php echo e(ucfirst($cancelledNewPlan)); ?> – <?php echo e(ucfirst($cancelledNewBilling)); ?></td>
                </tr>
                <tr>
                    <td class="label">Cancelled At</td>
                    <td class="value"><?php echo e(now()->format('M d, Y – H:i')); ?> UTC</td>
                </tr>
                <?php if($subscriptionId): ?>
                <tr>
                    <td class="label">Subscription ID</td>
                    <td class="value mono"><?php echo e($subscriptionId); ?></td>
                </tr>
                <?php endif; ?>
                <tr>
                    <td class="label">Account</td>
                    <td class="value"><?php echo e($userEmail); ?></td>
                </tr>
            </table>

        <?php else: ?>

            
            <div class="plan-display">
                <div class="pd-label">Cancelled Plan</div>
                <div class="pd-name"><?php echo e(ucfirst($planName)); ?></div>
                <div class="pd-cycle"><?php echo e(ucfirst($billingCycle)); ?></div>
            </div>

            <div class="callout callout-sub">
                <div class="callout-icon">⚠️</div>
                <div class="callout-text">
                    <?php if($accessUntil): ?>
                        <strong>Full access until <?php echo e($accessUntil); ?></strong>
                    <?php else: ?>
                        <strong>Access continues until end of billing period</strong>
                    <?php endif; ?>
                    After that, your account automatically switches to the free plan (50 submissions/month). No further charges will be made.
                </div>
            </div>

            <div class="section-label">Cancellation Details</div>
            <table class="details-table">
                <tr>
                    <td class="label">Cancelled Plan</td>
                    <td class="value"><?php echo e(ucfirst($planName)); ?> – <?php echo e(ucfirst($billingCycle)); ?></td>
                </tr>
                <?php if($accessUntil): ?>
                <tr>
                    <td class="label">Access Until</td>
                    <td class="value accent"><?php echo e($accessUntil); ?></td>
                </tr>
                <?php endif; ?>
                <tr>
                    <td class="label">After Expiry</td>
                    <td class="value">Free plan (50 submissions/month)</td>
                </tr>
                <tr>
                    <td class="label">Cancelled At</td>
                    <td class="value"><?php echo e(now()->format('M d, Y – H:i')); ?> UTC</td>
                </tr>
                <?php if($subscriptionId): ?>
                <tr>
                    <td class="label">Subscription ID</td>
                    <td class="value mono"><?php echo e($subscriptionId); ?></td>
                </tr>
                <?php endif; ?>
                <tr>
                    <td class="label">Account</td>
                    <td class="value"><?php echo e($userEmail); ?></td>
                </tr>
            </table>

        <?php endif; ?>

        <hr class="divider">

        <div class="cta-wrap">
            <?php if($cancelType === 'scheduled_change'): ?>
                <a href="<?php echo e(config('app.url')); ?>/billing" class="cta-btn">View Plan Details →</a>
            <?php else: ?>
                <a href="<?php echo e(config('app.url')); ?>/billing" class="cta-btn">Reactivate Subscription →</a>
            <?php endif; ?>
        </div>

    </div>

    
    <div class="footer">
        <p>
            Questions? Contact us at
            <a href="mailto:<?php echo e(config('mail.from.address')); ?>"><?php echo e(config('mail.from.address')); ?></a>
        </p>
        <p style="margin-top: 6px;">
            © <?php echo e(date('Y')); ?> 000form &nbsp;·&nbsp;
            <a href="<?php echo e(config('app.url')); ?>/billing">Manage Subscription</a>
        </p>
    </div>

</div>
</body>
</html><?php /**PATH C:\Git-folders\000form.com\resources\views/emails/subscription-cancelled-user.blade.php ENDPATH**/ ?>