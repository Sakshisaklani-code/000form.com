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
        <?php endif; ?> | 000form
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
            .plan-col     { display:block !important; width:100% !important; text-align:center !important; padding-bottom:12px !important; }
            .cross-col    { display:none !important; }
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
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:22px;font-weight:800;letter-spacing:-0.03em;color:#ffffff;margin-bottom:18px;">000<span style="color:#00ff88;">form</span></div>

                        <?php if($cancelType === 'scheduled_change'): ?>
                        <!-- Amber badge for scheduled cancel -->
                        <div style="display:inline-block;background-color:rgba(251,191,36,0.1);border:1px solid rgba(251,191,36,0.3);border-radius:60px;padding:7px 20px;margin-bottom:20px;">
                            <span style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:12px;font-weight:700;color:#fbbf24;letter-spacing:0.04em;">&#10005;&nbsp; Scheduled Upgrade Cancelled</span>
                        </div>
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:24px;font-weight:800;color:#ffffff;letter-spacing:-0.03em;margin-bottom:10px;line-height:1.25;">Your scheduled upgrade has been cancelled</div>
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:14px;color:#888888;line-height:1.5;">
                            The pending upgrade to <strong style="color:#ffffff;"><?php echo e(ucfirst($cancelledNewPlan)); ?></strong> has been removed.
                            You&rsquo;ll stay on your current <strong style="color:#ffffff;"><?php echo e(ucfirst($planName)); ?></strong> plan.
                        </div>
                        <?php else: ?>
                        <!-- Red badge for subscription cancel -->
                        <div style="display:inline-block;background-color:rgba(239,68,68,0.1);border:1px solid rgba(239,68,68,0.3);border-radius:60px;padding:7px 20px;margin-bottom:20px;">
                            <span style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:12px;font-weight:700;color:#f87171;letter-spacing:0.04em;">&#10005;&nbsp; Subscription Cancelled</span>
                        </div>
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:24px;font-weight:800;color:#ffffff;letter-spacing:-0.03em;margin-bottom:10px;line-height:1.25;">Your subscription has been cancelled</div>
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:14px;color:#888888;line-height:1.5;">
                            Your access continues until
                            <?php if($accessUntil): ?>
                                <strong style="color:#ffffff;"><?php echo e($accessUntil); ?></strong>.
                            <?php else: ?>
                                the end of your billing period.
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </td>
                </tr>

                <!-- BODY -->
                <tr>
                    <td class="content-cell" style="background-color:#111111;padding:30px 20px;">

                        <?php if($cancelType === 'scheduled_change'): ?>

                        <!-- Plan visual: keeping | cancelled -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color:#0f0f0f;border:1px solid #1e1e1e;border-radius:14px;margin-bottom:28px;">
                            <tr>
                                <td class="plan-col" align="center" style="padding:22px 16px;width:42%;">
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:10px;font-weight:700;color:#444444;letter-spacing:0.1em;text-transform:uppercase;margin-bottom:8px;">Staying On</div>
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:18px;font-weight:800;color:#00ff88;letter-spacing:-0.02em;"><?php echo e(ucfirst($planName)); ?></div>
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:12px;color:#555555;margin-top:4px;text-transform:capitalize;"><?php echo e(ucfirst($billingCycle)); ?></div>
                                </td>
                                <td class="cross-col" align="center" style="font-size:20px;color:#ef4444;width:16%;vertical-align:middle;">&#10005;</td>
                                <td class="plan-col" align="center" style="padding:22px 16px;width:42%;">
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:10px;font-weight:700;color:#444444;letter-spacing:0.1em;text-transform:uppercase;margin-bottom:8px;">Upgrade Cancelled</div>
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:18px;font-weight:800;color:#555555;letter-spacing:-0.02em;text-decoration:line-through;"><?php echo e(ucfirst($cancelledNewPlan)); ?></div>
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:12px;color:#444444;margin-top:4px;text-transform:capitalize;"><?php echo e(ucfirst($cancelledNewBilling)); ?></div>
                                </td>
                            </tr>
                        </table>

                        <!-- Callout: amber -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color:rgba(251,191,36,0.06);border:1px solid rgba(251,191,36,0.2);border-radius:12px;margin-bottom:28px;">
                            <tr>
                                <td style="padding:16px 18px;">
                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td style="font-size:20px;vertical-align:top;width:28px;padding-right:10px;">&#128197;</td>
                                            <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:14px;color:#fde68a;line-height:1.5;vertical-align:top;">
                                                <strong style="display:block;margin-bottom:4px;font-size:13px;">No change to your current plan</strong>
                                                Your <?php echo e(ucfirst($planName)); ?> plan stays active. The scheduled upgrade to <?php echo e(ucfirst($cancelledNewPlan)); ?> has been fully removed — no action needed.
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                        <!-- Summary label -->
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:10px;font-weight:700;color:#444444;letter-spacing:0.12em;text-transform:uppercase;margin-bottom:12px;">Summary</div>

                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin-bottom:28px;">
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;width:45%;">Current Plan</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#00ff88;font-weight:700;text-align:right;"><?php echo e(ucfirst($planName)); ?> &ndash; <?php echo e(ucfirst($billingCycle)); ?></td>
                            </tr>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">Cancelled Upgrade</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#f87171;font-weight:700;text-align:right;"><?php echo e(ucfirst($cancelledNewPlan)); ?> &ndash; <?php echo e(ucfirst($cancelledNewBilling)); ?></td>
                            </tr>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">Cancelled At</td>
                                <td style="font-family:'Courier New',monospace;padding:11px 0;font-size:12px;color:#aaaaaa;font-weight:600;text-align:right;"><?php echo e(now()->format('M d, Y – H:i')); ?> UTC</td>
                            </tr>
                            <?php if($subscriptionId): ?>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">Subscription ID</td>
                                <td style="font-family:'Courier New',monospace;padding:11px 0;font-size:12px;color:#aaaaaa;font-weight:600;text-align:right;word-break:break-all;"><?php echo e($subscriptionId); ?></td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">Account</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#aaaaaa;font-weight:600;text-align:right;"><?php echo e($userEmail); ?></td>
                            </tr>
                        </table>

                        <?php else: ?>

                        <!-- Plan display box (subscription cancel) -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color:#0f0f0f;border:1px solid #1e1e1e;border-radius:14px;margin-bottom:28px;">
                            <tr>
                                <td align="center" style="padding:22px 24px;">
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:10px;font-weight:700;color:#444444;letter-spacing:0.1em;text-transform:uppercase;margin-bottom:10px;">Cancelled Plan</div>
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:20px;font-weight:800;color:#666666;letter-spacing:-0.02em;"><?php echo e(ucfirst($planName)); ?></div>
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:13px;color:#444444;margin-top:4px;text-transform:capitalize;"><?php echo e(ucfirst($billingCycle)); ?></div>
                                </td>
                            </tr>
                        </table>

                        <!-- Callout: red -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color:rgba(239,68,68,0.06);border:1px solid rgba(239,68,68,0.2);border-radius:12px;margin-bottom:28px;">
                            <tr>
                                <td style="padding:16px 18px;">
                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td style="font-size:20px;vertical-align:top;width:28px;padding-right:10px;">&#9888;&#65039;</td>
                                            <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:14px;color:#fca5a5;line-height:1.5;vertical-align:top;">
                                                <?php if($accessUntil): ?>
                                                <strong style="display:block;margin-bottom:4px;font-size:13px;">Full access until <?php echo e($accessUntil); ?></strong>
                                                <?php else: ?>
                                                <strong style="display:block;margin-bottom:4px;font-size:13px;">Access continues until end of billing period</strong>
                                                <?php endif; ?>
                                                After that, your account automatically switches to the free plan (50 submissions/month). No further charges will be made.
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                        <!-- Cancellation Details label -->
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:10px;font-weight:700;color:#444444;letter-spacing:0.12em;text-transform:uppercase;margin-bottom:12px;">Cancellation Details</div>

                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin-bottom:28px;">
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;width:45%;">Cancelled Plan</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#cccccc;font-weight:600;text-align:right;"><?php echo e(ucfirst($planName)); ?> &ndash; <?php echo e(ucfirst($billingCycle)); ?></td>
                            </tr>
                            <?php if($accessUntil): ?>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">Access Until</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#00ff88;font-weight:700;text-align:right;"><?php echo e($accessUntil); ?></td>
                            </tr>
                            <?php endif; ?>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">After Expiry</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#cccccc;font-weight:600;text-align:right;">Free plan (50 submissions/month)</td>
                            </tr>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">Cancelled At</td>
                                <td style="font-family:'Courier New',monospace;padding:11px 0;font-size:12px;color:#aaaaaa;font-weight:600;text-align:right;"><?php echo e(now()->format('M d, Y – H:i')); ?> UTC</td>
                            </tr>
                            <?php if($subscriptionId): ?>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">Subscription ID</td>
                                <td style="font-family:'Courier New',monospace;padding:11px 0;font-size:12px;color:#aaaaaa;font-weight:600;text-align:right;word-break:break-all;"><?php echo e($subscriptionId); ?></td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">Account</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#aaaaaa;font-weight:600;text-align:right;"><?php echo e($userEmail); ?></td>
                            </tr>
                        </table>

                        <?php endif; ?>

                        <!-- Divider + CTA -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td style="border-top:1px solid #1a1a1a;padding:0 0 24px 0;font-size:0;line-height:0;">&nbsp;</td></tr></table>
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td align="center">
                                    <?php if($cancelType === 'scheduled_change'): ?>
                                    <a href="<?php echo e(config('app.url')); ?>/billing" style="display:inline-block;background-color:#00ff88;color:#0a0a0a;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:15px;font-weight:700;padding:14px 36px;border-radius:10px;text-decoration:none;">View Plan Details &rarr;</a>
                                    <?php else: ?>
                                    <a href="<?php echo e(config('app.url')); ?>/billing" style="display:inline-block;background-color:#00ff88;color:#0a0a0a;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:15px;font-weight:700;padding:14px 36px;border-radius:10px;text-decoration:none;">Reactivate Subscription &rarr;</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>

                <!-- FOOTER -->
                <tr>
                    <td align="center" style="background-color:#0a0a0a;border-top:1px solid #1a1a1a;padding:24px 32px;">
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:12px;color:#444444;line-height:1.7;">
                            Questions? Contact us at <a href="mailto:<?php echo e(config('mail.from.address')); ?>" style="color:#666666;text-decoration:none;"><?php echo e(config('mail.from.address')); ?></a>
                        </div>
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:11px;color:#333333;margin-top:10px;">
                            &copy; <?php echo e(date('Y')); ?> 000form &nbsp;&middot;&nbsp;
                            <a href="<?php echo e(config('app.url')); ?>/billing" style="color:#444444;text-decoration:none;">Manage Subscription</a>
                        </div>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>
</body>
</html><?php /**PATH C:\Git-folders\000form.com\resources\views/emails/subscription-cancelled-user.blade.php ENDPATH**/ ?>