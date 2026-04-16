<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta name="format-detection" content="telephone=no,address=no,email=no,date=no,url=no" />
    <title>
        <?php if($cancelType === 'scheduled_change'): ?>Scheduled Upgrade Cancelled
        <?php else: ?> Subscription Cancelled
        <?php endif; ?> – Admin
    </title>
    <!--[if mso]>
    <noscript><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml></noscript>
    <![endif]-->
    <style type="text/css">
        body, table, td, a { -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; }
        table, td { mso-table-lspace:0pt; mso-table-rspace:0pt; }
        img { border:0; outline:none; text-decoration:none; }
        body { margin:0 !important; padding:0 !important; width:100% !important; }
        a[x-apple-data-detectors] { color:inherit !important; text-decoration:none !important; }
        @media screen and (max-width:600px) {
            .email-card   { width:100% !important; border-radius:0 !important; }
            .content-cell { padding:24px 20px !important; }
            .header-cell  { padding:28px 20px 20px !important; }
            .two-col td   { display:block !important; width:100% !important; text-align:left !important; }
        }
    </style>
</head>
<body style="margin:0;padding:0;background-color:#0f0f0f;width:100%;">

<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color:#0f0f0f;">
    <tr>
        <td align="center" style="padding:40px 16px;">

            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="580" class="email-card" style="background-color:#111111;border-radius:20px;border:1px solid #222222;overflow:hidden;">

                <!-- HEADER -->
                <tr>
                    <td class="header-cell" align="center" style="background-color:#0c0c0c;border-bottom:1px solid #1e1e1e;padding:36px 40px 28px;">
                        <div style="display:inline-block;background-color:rgba(99,102,241,0.12);border:1px solid rgba(99,102,241,0.3);border-radius:60px;padding:6px 18px;margin-bottom:14px;">
                            <span style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:11px;font-weight:700;color:#818cf8;letter-spacing:0.08em;text-transform:uppercase;">&#9889; Admin Notification</span>
                        </div>
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:22px;font-weight:800;letter-spacing:-0.03em;color:#ffffff;margin-bottom:16px;">000<span style="color:#00ff88;">form</span></div>
                        <?php if($cancelType === 'scheduled_change'): ?>
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:22px;font-weight:800;color:#ffffff;letter-spacing:-0.03em;margin-bottom:8px;">Scheduled Upgrade Cancelled</div>
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:14px;color:#666666;">A user has cancelled their pending plan upgrade.</div>
                        <?php else: ?>
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:22px;font-weight:800;color:#ffffff;letter-spacing:-0.03em;margin-bottom:8px;">Subscription Cancelled</div>
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:14px;color:#666666;">A user has cancelled their subscription.</div>
                        <?php endif; ?>
                    </td>
                </tr>

                <!-- BODY -->
                <tr>
                    <td class="content-cell" style="background-color:#111111;padding:30px 20px;">

                        <!-- Alert card -->
                        <?php if($cancelType === 'scheduled_change'): ?>
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color:rgba(251,191,36,0.07);border:1px solid rgba(251,191,36,0.25);border-radius:16px;margin-bottom:28px;">
                        <?php else: ?>
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color:rgba(239,68,68,0.07);border:1px solid rgba(239,68,68,0.25);border-radius:16px;margin-bottom:28px;">
                        <?php endif; ?>
                            <tr>
                                <td style="padding:20px 24px;">
                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" class="two-col">
                                        <tr>
                                            <td style="vertical-align:middle;">
                                                <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:10px;font-weight:700;color:#666666;letter-spacing:0.1em;text-transform:uppercase;margin-bottom:6px;">
                                                    <?php if($cancelType === 'scheduled_change'): ?>Upgrade Cancelled <?php else: ?> Cancelled Plan <?php endif; ?>
                                                </div>
                                                <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:28px;font-weight:800;letter-spacing:-0.02em;
                                                    <?php echo e($cancelType === 'scheduled_change' ? 'color:#fbbf24;' : 'color:#f87171;'); ?>">
                                                    <?php if($cancelType === 'scheduled_change'): ?><?php echo e(ucfirst($cancelledNewPlan)); ?>

                                                    <?php else: ?><?php echo e(ucfirst($planName)); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <td style="vertical-align:middle;text-align:right;padding-left:16px;">
                                                <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:12px;color:#555555;"><?php echo e(ucfirst($billingCycle)); ?> billing</div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                        <!-- User Details -->
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:10px;font-weight:700;color:#444444;letter-spacing:0.12em;text-transform:uppercase;margin-bottom:12px;">User Details</div>
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin-bottom:24px;">
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;width:44%;">User ID</td>
                                <td style="font-family:'Courier New',monospace;padding:11px 0;font-size:12px;color:#cccccc;font-weight:600;text-align:right;">#<?php echo e($userId); ?></td>
                            </tr>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">Email</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#818cf8;font-weight:600;text-align:right;"><?php echo e($userEmail); ?></td>
                            </tr>
                            <?php if($paddleCustomerId): ?>
                            <tr>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">Paddle Customer ID</td>
                                <td style="font-family:'Courier New',monospace;padding:11px 0;font-size:12px;color:#cccccc;font-weight:600;text-align:right;word-break:break-all;"><?php echo e($paddleCustomerId); ?></td>
                            </tr>
                            <?php endif; ?>
                        </table>

                        <!-- Divider -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td style="border-top:1px solid #1a1a1a;padding:0 0 20px 0;font-size:0;line-height:0;">&nbsp;</td></tr></table>

                        <!-- Cancellation Details -->
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:10px;font-weight:700;color:#444444;letter-spacing:0.12em;text-transform:uppercase;margin-bottom:12px;">Cancellation Details</div>

                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin-bottom:24px;">
                            <?php if($cancelType === 'scheduled_change'): ?>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;width:44%;">Kept Plan</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#00ff88;font-weight:700;text-align:right;"><?php echo e(ucfirst($planName)); ?> &ndash; <?php echo e(ucfirst($billingCycle)); ?></td>
                            </tr>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">Cancelled Upgrade</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#f87171;font-weight:700;text-align:right;"><?php echo e(ucfirst($cancelledNewPlan)); ?> &ndash; <?php echo e(ucfirst($cancelledNewBilling)); ?></td>
                            </tr>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">Type</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#fbbf24;font-weight:600;text-align:right;">Scheduled upgrade cancelled</td>
                            </tr>
                            <?php else: ?>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;width:44%;">Cancelled Plan</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#cccccc;font-weight:600;text-align:right;"><?php echo e(ucfirst($planName)); ?> &ndash; <?php echo e(ucfirst($billingCycle)); ?></td>
                            </tr>
                            <?php if($accessUntil): ?>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">Access Until</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#fbbf24;font-weight:700;text-align:right;"><?php echo e($accessUntil); ?></td>
                            </tr>
                            <?php endif; ?>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">After Expiry</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#cccccc;font-weight:600;text-align:right;">Free plan</td>
                            </tr>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">Type</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#f87171;font-weight:600;text-align:right;">Subscription cancelled</td>
                            </tr>
                            <?php endif; ?>
                            <?php if($subscriptionId): ?>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">Subscription ID</td>
                                <td style="font-family:'Courier New',monospace;padding:11px 0;font-size:12px;color:#cccccc;font-weight:600;text-align:right;word-break:break-all;"><?php echo e($subscriptionId); ?></td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">Cancelled At</td>
                                <td style="font-family:'Courier New',monospace;padding:11px 0;font-size:12px;color:#cccccc;font-weight:600;text-align:right;"><?php echo e(now()->format('M d, Y – H:i:s')); ?> UTC</td>
                            </tr>
                        </table>

                    </td>
                </tr>

                <!-- FOOTER -->
                <tr>
                    <td align="center" style="background-color:#0a0a0a;border-top:1px solid #1a1a1a;padding:24px 32px;">
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:12px;color:#333333;line-height:1.7;">Automated admin alert from 000form.</div>
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:11px;color:#2e2e2e;margin-top:6px;">&copy; <?php echo e(date('Y')); ?> 000form</div>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>
</body>
</html><?php /**PATH /var/www/html/000form/resources/views/emails/subscription-cancelled-admin.blade.php ENDPATH**/ ?>