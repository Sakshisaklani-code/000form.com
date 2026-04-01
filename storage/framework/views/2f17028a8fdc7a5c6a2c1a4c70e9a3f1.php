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

        /* ── REVENUE CARD (immediate only) ── */
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

        .revenue-card .left .rev-label {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #666;
            margin-bottom: 4px;
        }

        .revenue-card .left .rev-amount {
            font-size: 1.8rem;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: -0.03em;
        }

        .revenue-card .right { text-align: right; }

        .revenue-card .right .plan-badge {
            background: rgba(0,255,136,0.1);
            border: 1px solid rgba(0,255,136,0.25);
            color: #00ff88;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 8px;
            display: inline-block;
            margin-bottom: 6px;
        }

        .revenue-card .right .billing-cycle { font-size: 0.75rem; color: #555; display: block; }

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

        .plan-pill .pill-name { font-size: 1.05rem; font-weight: 800; letter-spacing: -0.02em; }
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
        .details-table .value { color: #ccc; font-weight: 600; text-align: right; font-size: 0.8rem; }
        .details-table .value.accent { color: #00ff88; font-size: 0.83rem; }
        .details-table .value.user-col { color: #818cf8; font-size: 0.83rem; }
        .details-table .value.mono { font-family: monospace; font-size: 0.75rem; word-break: break-all; }

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

        .invoice-wrap .inv-label { font-size: 0.8rem; color: #555; }
        .invoice-wrap .inv-link { font-size: 0.78rem; font-weight: 600; color: #00ff88; text-decoration: none; white-space: nowrap; }

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
            .revenue-card { flex-direction: column; align-items: flex-start; }
            .revenue-card .right { text-align: left; }
        }
    </style>
</head>
<body>
<div class="wrapper">

    
    <div class="header">
        <div class="admin-badge">⚡ Admin Notification</div><br>
        <div class="logo">000<span>form</span></div>

        <h1>Plan <?php echo e($isImmediate ? 'Upgraded' : 'Upgrade Scheduled'); ?></h1>
        <p>A user has <?php echo e($isImmediate ? 'upgraded their plan immediately' : 'scheduled a plan upgrade'); ?>.</p>
    </div>

    
    <div class="body">

        
        <?php if($isImmediate && $amount): ?>
        <div class="revenue-card">
            <div class="left">
                <div class="rev-label">Amount Charged</div>
                <div class="rev-amount"><?php echo e($amount); ?></div>
            </div>
            <div class="right">
                <div class="plan-badge"><?php echo e(ucfirst($newPlan)); ?></div>
                <span class="billing-cycle"><?php echo e(ucfirst($newBilling)); ?> billing</span>
            </div>
        </div>
        <?php endif; ?>

        
        <div class="plan-change">
            <div class="plan-pill">
                <div class="pill-label">From</div>
                <div class="pill-name old"><?php echo e(ucfirst($oldPlan)); ?></div>
                <div class="pill-cycle"><?php echo e(ucfirst($oldBilling)); ?></div>
            </div>
            <div class="arrow">→</div>
            <div class="plan-pill">
                <div class="pill-label">To</div>
                <div class="pill-name new"><?php echo e(ucfirst($newPlan)); ?></div>
                <div class="pill-cycle"><?php echo e(ucfirst($newBilling)); ?></div>
                <div>
                    <span class="type-tag <?php echo e($isImmediate ? 'type-immediate' : 'type-scheduled'); ?>">
                        <?php echo e($isImmediate ? 'Immediate' : 'Scheduled'); ?>

                    </span>
                </div>
            </div>
        </div>

        
        <div class="section-label">User Details</div>
        <table class="details-table">
            <tr>
                <td class="label">User ID</td>
                <td class="value mono">#<?php echo e($userId); ?></td>
            </tr>
            <tr>
                <td class="label">Email</td>
                <td class="value user-col"><?php echo e($userEmail); ?></td>
            </tr>
            <?php if($paddleCustomerId): ?>
            <tr>
                <td class="label">Paddle Customer ID</td>
                <td class="value mono"><?php echo e($paddleCustomerId); ?></td>
            </tr>
            <?php endif; ?>
        </table>

        <hr class="divider">

        
        <div class="section-label">Change Details</div>
        <table class="details-table">
            <tr>
                <td class="label">Previous Plan</td>
                <td class="value"><?php echo e(ucfirst($oldPlan)); ?> – <?php echo e(ucfirst($oldBilling)); ?></td>
            </tr>
            <tr>
                <td class="label">New Plan</td>
                <td class="value accent"><?php echo e(ucfirst($newPlan)); ?> – <?php echo e(ucfirst($newBilling)); ?></td>
            </tr>
            <tr>
                <td class="label">Type</td>
                <td class="value"><?php echo e($isImmediate ? 'Immediate upgrade' : 'Scheduled at renewal'); ?></td>
            </tr>
            <tr>
                <td class="label"><?php echo e($isImmediate ? 'Effective From' : 'Effective Date'); ?></td>
                <td class="value"><?php echo e($effectiveAt); ?></td>
            </tr>
            <?php if($isImmediate && $amount): ?>
            <tr>
                <td class="label">Amount Charged</td>
                <td class="value accent"><?php echo e($amount); ?><?php echo e($currency ? ' ' . strtoupper($currency) : ''); ?></td>
            </tr>
            <?php endif; ?>
            <?php if($isImmediate && $periodEnd): ?>
            <tr>
                <td class="label">Access Until</td>
                <td class="value"><?php echo e($periodEnd); ?></td>
            </tr>
            <?php endif; ?>
            <?php if($subscriptionId): ?>
            <tr>
                <td class="label">Subscription ID</td>
                <td class="value mono"><?php echo e($subscriptionId); ?></td>
            </tr>
            <?php endif; ?>
            <?php if($isImmediate && $transactionId): ?>
            <tr>
                <td class="label">Transaction ID</td>
                <td class="value mono"><?php echo e($transactionId); ?></td>
            </tr>
            <?php endif; ?>
            <tr>
                <td class="label">Changed At</td>
                <td class="value"><?php echo e(now()->format('M d, Y – H:i:s')); ?> UTC</td>
            </tr>
        </table>

        
        <?php if($isImmediate && $invoiceUrl): ?>
        <hr class="divider">
        <div class="invoice-wrap">
            <span class="inv-label">📄 Paddle Invoice PDF</span>
            <a href="<?php echo e($invoiceUrl); ?>" class="inv-link" target="_blank">↓ Download Invoice</a>
        </div>
        <?php endif; ?>

    </div>

    
    <div class="footer">
        <p>Automated admin alert from 000form.</p>
        <p style="margin-top: 6px;">
            © <?php echo e(date('Y')); ?> 000form &nbsp;·&nbsp;
        </p>
    </div>

</div>
</body>
</html><?php /**PATH C:\Git-folders\000form.com\resources\views/emails/plan-upgraded-admin.blade.php ENDPATH**/ ?>