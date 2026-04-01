<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Payment Successful | 000form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #0a0a0a;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, sans-serif;
            color: #ededed;
            -webkit-font-smoothing: antialiased;
            line-height: 1.5;
        }

        /* subtle background texture */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(#1a1a1a 1px, transparent 1px);
            background-size: 32px 32px;
            opacity: 0.3;
            pointer-events: none;
            z-index: 0;
        }

        .wrapper {
            max-width: 640px;
            margin: 0 auto;
            padding: 48px 24px;
            position: relative;
            z-index: 2;
        }

        /* main card container */
        .payment-card {
            background: #111111;
            border: 1px solid #262626;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(0, 255, 136, 0.05);
            backdrop-filter: blur(0px);
            transition: transform 0.2s ease;
        }

        /* ── HEADER (refined) ── */
        .header {
            text-align: center;
            padding: 40px 32px 24px;
            background: #0c0c0c;
            border-bottom: 1px solid #202020;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            background: linear-gradient(135deg, #ffffff 0%, #cccccc 100%);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
        }

        .logo span {
            background: linear-gradient(135deg, #00ffaa, #00cc77);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            font-weight: 800;
        }

        /* success badge now placed below logo */
        .success-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: rgba(0, 255, 136, 0.08);
            border: 1px solid rgba(0, 255, 136, 0.35);
            border-radius: 60px;
            padding: 6px 20px;
            font-size: 0.8rem;
            font-weight: 600;
            color: #2eff9e;
            letter-spacing: 0.02em;
            backdrop-filter: blur(2px);
            margin-bottom: 24px;
        }

        .success-badge svg {
            width: 16px;
            height: 16px;
            stroke: #2eff9e;
            stroke-width: 2.5;
            fill: none;
        }

        .header h1 {
            font-size: 1.85rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            background: linear-gradient(to right, #ffffff, #e0e0e0);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            margin-bottom: 10px;
        }

        .header .subhead {
            color: #8a8a8a;
            font-size: 0.9rem;
            font-weight: 450;
        }

        /* ── BODY ── */
        .body {
            padding: 32px 32px 28px;
            background: #111111;
        }

        /* plan card - premium glassmorphism */
        .plan-card {
            background: linear-gradient(125deg, rgba(0, 30, 20, 0.6) 0%, rgba(0, 20, 12, 0.4) 100%);
            border: 1px solid rgba(0, 255, 136, 0.25);
            border-radius: 24px;
            padding: 28px 20px;
            text-align: center;
            margin-bottom: 32px;
            backdrop-filter: blur(2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .plan-card .plan-cycle {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: #7effb3;
            background: rgba(0, 255, 136, 0.12);
            display: inline-block;
            padding: 4px 12px;
            border-radius: 40px;
            margin-bottom: 16px;
        }

        .plan-card .plan-name {
            font-size: 1.8rem;
            font-weight: 800;
            color: #f0f0f0;
            letter-spacing: -0.02em;
            margin-bottom: 8px;
        }

        .plan-card .plan-amount {
            font-size: 2.6rem;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: -0.02em;
            margin: 12px 0 6px;
            font-family: 'Inter', monospace;
        }

        .plan-card .plan-renewal {
            font-size: 0.8rem;
            color: #7c7c7c;
            border-top: 1px dashed #2a2a2a;
            display: inline-block;
            padding-top: 12px;
            margin-top: 8px;
        }

        /* details styling */
        .section-label {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #6b6b6b;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .section-label::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, #2a2a2a, transparent);
        }

        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 32px;
            background: #0e0e0e;
            border-radius: 20px;
            overflow: hidden;
        }

        .details-table tr {
            border-bottom: 1px solid #1e1e1e;
        }

        .details-table tr:last-child {
            border-bottom: none;
        }

        .details-table td {
            padding: 14px 12px;
            font-size: 0.85rem;
            vertical-align: middle;
        }

        .details-table .label {
            color: #8b8b8b;
            width: 44%;
            font-weight: 500;
        }

        .details-table .value {
            color: #eaeaea;
            font-weight: 500;
            text-align: right;
            font-family: 'SF Mono', 'Courier New', monospace;
            font-size: 0.8rem;
            word-break: break-all;
        }

        .details-table .value.accent {
            color: #2eff9e;
            font-family: -apple-system, 'Inter', sans-serif;
            font-weight: 700;
        }

        /* DIVIDER minimal */
        .divider {
            border: none;
            border-top: 1px solid #212121;
            margin: 16px 0 28px;
        }

        /* BUTTON GROUP — side by side (left + right) */
        .button-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin: 12px 0 8px;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: #00ff88;
            color: #0a0a0a;
            font-weight: 700;
            font-size: 0.9rem;
            padding: 12px 28px;
            border-radius: 40px;
            text-decoration: none;
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
            letter-spacing: -0.2px;
            box-shadow: 0 2px 8px rgba(0, 255, 136, 0.2);
        }

        .btn-primary:hover {
            background: #22ff99;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 255, 136, 0.25);
        }

        .btn-outline {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: transparent;
            color: #00ff88;
            border: 1px solid rgba(0, 255, 136, 0.5);
            font-weight: 600;
            font-size: 0.85rem;
            padding: 10px 24px;
            border-radius: 40px;
            text-decoration: none;
            transition: all 0.2s ease;
            backdrop-filter: blur(4px);
        }

        .btn-outline:hover {
            background: rgba(0, 255, 136, 0.08);
            border-color: #00ff88;
            color: #b0ffd0;
            transform: translateY(-1px);
        }

        /* ensure left & right alignment on small screens */
        @media (max-width: 540px) {
            .button-group {
                flex-direction: column;
                align-items: stretch;
            }
            .btn-primary, .btn-outline {
                justify-content: center;
                width: 100%;
            }
            .plan-card .plan-amount {
                font-size: 2rem;
            }
            .header, .body {
                padding-left: 20px;
                padding-right: 20px;
            }
        }

        /* FOOTER refined */
        .footer {
            background: #0c0c0c;
            border-top: 1px solid #1f1f1f;
            padding: 28px 32px 32px;
            text-align: center;
        }

        .footer p {
            color: #5a5a5a;
            font-size: 0.75rem;
            line-height: 1.6;
        }

        .footer a {
            color: #8a8a8a;
            text-decoration: none;
            transition: color 0.2s;
            font-weight: 500;
        }

        .footer a:hover {
            color: #00ff88;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 24px;
            margin-top: 16px;
            flex-wrap: wrap;
        }

        /* subtle icons via svg */
        .icon-svg {
            width: 18px;
            height: 18px;
            vertical-align: middle;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="payment-card">
        
        <div class="header">
            <div class="logo">000<span>form</span></div>
            <!-- ✅ success badge placed directly under logo (no extra gap) -->
            <div class="success-badge">
                <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" fill="none">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                Payment Confirmed
            </div>
            <h1>Your plan is now active!</h1>
            <div class="subhead">Thanks for subscribing. Here's a summary of your payment.</div>
        </div>

        
        <div class="body">
            
            <div class="plan-card">
                <div class="plan-cycle"><?php echo e(ucfirst($billingCycle)); ?> Plan</div>
                <div class="plan-name"><?php echo e(ucfirst($planName)); ?></div>
                <div class="plan-amount"><?php echo e($amount); ?></div>
                <div class="plan-renewal">Renews on <?php echo e($periodEnd); ?></div>
            </div>

            
            <div class="section-label">Payment Details</div>
            <table class="details-table">
                <tr>
                    <td class="label">Plan</td>
                    <td class="value accent"><?php echo e(ucfirst($planName)); ?> – <?php echo e(ucfirst($billingCycle)); ?></td>
                </tr>
                <tr>
                    <td class="label">Amount Paid</td>
                    <td class="value accent"><?php echo e($amount); ?> <?php echo e(strtoupper($currency)); ?></td>
                </tr>
                <tr>
                    <td class="label">Access Until</td>
                    <td class="value"><?php echo e($periodEnd); ?></td>
                </tr>
                <tr>
                    <td class="label">Subscription ID</td>
                    <td class="value"><?php echo e($subscriptionId); ?></td>
                </tr>
                <tr>
                    <td class="label">Transaction ID</td>
                    <td class="value"><?php echo e($transactionId); ?></td>
                </tr>
                <tr>
                    <td class="label">Billing Email</td>
                    <td class="value"><?php echo e($userEmail); ?></td>
                </tr>
            </table>

            <hr class="divider">

            
            <div class="button-group">
                <a href="<?php echo e(config('app.url')); ?>/billing" class="btn-primary">
                    <svg class="icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 6v12m-6-6h12" stroke="currentColor"/>
                        <circle cx="12" cy="12" r="9" stroke="currentColor"/>
                    </svg>
                    View Plan Details
                </a>

                <?php if($invoiceUrl): ?>
                    <a href="<?php echo e($invoiceUrl); ?>" class="btn-outline" target="_blank">
                        <svg class="icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 3v12m0 0-3-3m3 3 3-3M5 21h14" stroke="currentColor"/>
                            <path d="M7 17v2M12 17v2M17 17v2" stroke="currentColor"/>
                        </svg>
                        Download Invoice PDF
                    </a>
                <?php else: ?>
                    <!-- fallback in case invoice is missing, keep layout balanced -->
                    <a href="#" class="btn-outline" style="opacity:0.7; pointer-events:none;">
                        Invoice not ready
                    </a>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="footer">
            <p>
                Questions? Reply to this email or contact us at
                <a href="mailto:<?php echo e(config('mail.from.address')); ?>"><?php echo e(config('mail.from.address')); ?></a>
            </p>
            <div class="footer-links">
                <a href="<?php echo e(config('app.url')); ?>/billing">Manage Subscription</a>
                <span style="color:#2a2a2a">•</span>
                <a href="<?php echo e(config('app.url')); ?>/dashboard">Dashboard</a>
                <span style="color:#2a2a2a">•</span>
                <a href="<?php echo e(config('app.url')); ?>/support">Support</a>
            </div>
            <p style="margin-top: 20px;">
                © <?php echo e(date('Y')); ?> 000form · All rights reserved
            </p>
        </div>
    </div>
</div>
</body>
</html><?php /**PATH C:\Git-folders\000form.com\resources\views/emails/payment-success-user.blade.php ENDPATH**/ ?>