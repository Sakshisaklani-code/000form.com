<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta name="format-detection" content="telephone=no,address=no,email=no,date=no,url=no" />
    <title>Plan <?php echo e($isImmediate ? 'Upgraded' : 'Upgrade Scheduled'); ?> | 000form</title>
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
            .arrow-col    { display:none !important; }
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

                        <!-- Badge: green = immediate, amber = scheduled -->
                        <?php if($isImmediate): ?>
                        <div style="display:inline-block;background-color:rgba(0,255,136,0.1);border:1px solid rgba(0,255,136,0.3);border-radius:60px;padding:7px 20px;margin-bottom:20px;">
                            <span style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:12px;font-weight:700;color:#00ff88;letter-spacing:0.04em;">&#8679;&nbsp; Plan Upgraded</span>
                        </div>
                        <?php else: ?>
                        <div style="display:inline-block;background-color:rgba(251,191,36,0.1);border:1px solid rgba(251,191,36,0.3);border-radius:60px;padding:7px 20px;margin-bottom:20px;">
                            <span style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:12px;font-weight:700;color:#fbbf24;letter-spacing:0.04em;">&#8679;&nbsp; Upgrade Scheduled</span>
                        </div>
                        <?php endif; ?>

                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:24px;font-weight:800;color:#ffffff;letter-spacing:-0.03em;margin-bottom:10px;line-height:1.25;">
                            <?php if($isImmediate): ?>Your plan is now upgraded!
                            <?php else: ?> Your upgrade is scheduled
                            <?php endif; ?>
                        </div>
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:14px;color:#888888;line-height:1.5;">
                            <?php if($isImmediate): ?>Your new plan is active immediately. Here&rsquo;s a full summary.
                            <?php else: ?> Your plan will upgrade on <strong style="color:#fbbf24;"><?php echo e($effectiveAt); ?></strong>. No action needed.
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>

                <!-- BODY -->
                <tr>
                    <td class="content-cell" style="background-color:#111111;padding:30px 20px;">

                        <!-- Plan change visual: 3-column table (old | arrow | new) -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color:#0f0f0f;border:1px solid #1e1e1e;border-radius:14px;margin-bottom:28px;">
                            <tr>
                                <!-- Old plan -->
                                <td class="plan-col" align="center" style="padding:22px 16px;width:42%;">
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:10px;font-weight:700;color:#444444;letter-spacing:0.1em;text-transform:uppercase;margin-bottom:8px;">Previous</div>
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:18px;font-weight:800;color:#555555;letter-spacing:-0.02em;"><?php echo e(ucfirst($oldPlan)); ?></div>
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:12px;color:#444444;margin-top:4px;text-transform:capitalize;"><?php echo e(ucfirst($oldBilling)); ?></div>
                                </td>
                                <!-- Arrow -->
                                <td class="arrow-col" align="center" style="font-size:22px;color:#333333;width:16%;vertical-align:middle;">&rarr;</td>
                                <!-- New plan -->
                                <td class="plan-col" align="center" style="padding:22px 16px;width:42%;">
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:10px;font-weight:700;color:#444444;letter-spacing:0.1em;text-transform:uppercase;margin-bottom:8px;"><?php echo e($isImmediate ? 'New Plan' : 'Upgrading To'); ?></div>
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:18px;font-weight:800;color:#00ff88;letter-spacing:-0.02em;"><?php echo e(ucfirst($newPlan)); ?></div>
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:12px;color:#444444;margin-top:4px;text-transform:capitalize;"><?php echo e(ucfirst($newBilling)); ?></div>
                                    <!-- Immediate / Scheduled tag -->
                                    <div style="margin-top:8px;">
                                        <?php if($isImmediate): ?>
                                        <span style="display:inline-block;background-color:rgba(0,255,136,0.1);border-radius:6px;padding:3px 10px;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:10px;font-weight:700;color:#00ff88;letter-spacing:0.05em;text-transform:uppercase;">Immediate</span>
                                        <?php else: ?>
                                        <span style="display:inline-block;background-color:rgba(251,191,36,0.1);border-radius:6px;padding:3px 10px;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:10px;font-weight:700;color:#fbbf24;letter-spacing:0.05em;text-transform:uppercase;">Scheduled</span>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <!-- Payment highlight card (immediate + amount only) -->
                        <?php if($isImmediate && $amount): ?>
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color:#0d2b1e;border:1px solid rgba(0,255,136,0.25);border-radius:16px;margin-bottom:28px;">
                            <tr>
                                <td align="center" style="padding:26px 24px;">
                                    <div style="display:inline-block;background-color:rgba(0,255,136,0.12);border-radius:40px;padding:4px 14px;margin-bottom:12px;">
                                        <span style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:11px;font-weight:700;color:#7effb3;letter-spacing:0.1em;text-transform:uppercase;"><?php echo e(ucfirst($newBilling)); ?> Plan</span>
                                    </div>
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:42px;font-weight:800;color:#ffffff;letter-spacing:-0.03em;margin-bottom:6px;"><?php echo e($amount); ?></div>
                                    <?php if($currency): ?>
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:12px;color:#555555;margin-bottom:12px;"><?php echo e(strtoupper($currency)); ?></div>
                                    <?php endif; ?>
                                    <?php if($periodEnd): ?>
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:13px;color:#666666;border-top:1px dashed #1e4030;padding-top:14px;">Next renewal on <?php echo e($periodEnd); ?></div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </table>
                        <?php endif; ?>

                        <!-- Effective callout -->
                        <?php if($isImmediate): ?>
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color:rgba(0,255,136,0.06);border:1px solid rgba(0,255,136,0.2);border-radius:12px;margin-bottom:28px;">
                            <tr>
                                <td style="padding:16px 18px;">
                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td style="font-size:20px;vertical-align:top;width:28px;padding-right:10px;">&#9989;</td>
                                            <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:14px;color:#a3f0cc;line-height:1.5;vertical-align:top;">
                                                <strong style="display:block;margin-bottom:4px;font-size:13px;">Active now</strong>
                                                Your new plan limits are live immediately. Enjoy your upgraded access!
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <?php else: ?>
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color:rgba(251,191,36,0.06);border:1px solid rgba(251,191,36,0.2);border-radius:12px;margin-bottom:28px;">
                            <tr>
                                <td style="padding:16px 18px;">
                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td style="font-size:20px;vertical-align:top;width:28px;padding-right:10px;">&#128197;</td>
                                            <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:14px;color:#fde68a;line-height:1.5;vertical-align:top;">
                                                <strong style="display:block;margin-bottom:4px;font-size:13px;">Effective <?php echo e($effectiveAt); ?></strong>
                                                Your current plan stays active until then. The upgrade applies automatically at renewal.
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <?php endif; ?>

                        <!-- Summary label -->
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:10px;font-weight:700;color:#444444;letter-spacing:0.12em;text-transform:uppercase;margin-bottom:12px;"><?php echo e($isImmediate ? 'Upgrade Summary' : 'Change Summary'); ?></div>

                        <!-- Summary table -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin-bottom:28px;">
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;width:45%;">Previous Plan</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#cccccc;font-weight:600;text-align:right;"><?php echo e(ucfirst($oldPlan)); ?> &ndash; <?php echo e(ucfirst($oldBilling)); ?></td>
                            </tr>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">New Plan</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#00ff88;font-weight:700;text-align:right;"><?php echo e(ucfirst($newPlan)); ?> &ndash; <?php echo e(ucfirst($newBilling)); ?></td>
                            </tr>
                            <?php if($isImmediate && $amount): ?>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">Amount Charged</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#00ff88;font-weight:700;text-align:right;"><?php echo e($amount); ?><?php echo e($currency ? ' ' . strtoupper($currency) : ''); ?></td>
                            </tr>
                            <?php endif; ?>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;"><?php echo e($isImmediate ? 'Effective From' : 'Effective Date'); ?></td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#cccccc;font-weight:600;text-align:right;"><?php echo e($effectiveAt); ?></td>
                            </tr>
                            <?php if($isImmediate && $periodEnd): ?>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">Access Until</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#cccccc;font-weight:600;text-align:right;"><?php echo e($periodEnd); ?></td>
                            </tr>
                            <?php endif; ?>
                            <?php if($subscriptionId): ?>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">Subscription ID</td>
                                <td style="font-family:'Courier New',monospace;padding:11px 0;font-size:12px;color:#aaaaaa;font-weight:600;text-align:right;word-break:break-all;"><?php echo e($subscriptionId); ?></td>
                            </tr>
                            <?php endif; ?>
                            <?php if($isImmediate && $transactionId): ?>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">Transaction ID</td>
                                <td style="font-family:'Courier New',monospace;padding:11px 0;font-size:12px;color:#aaaaaa;font-weight:600;text-align:right;word-break:break-all;"><?php echo e($transactionId); ?></td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">Account</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#aaaaaa;font-weight:600;text-align:right;"><?php echo e($userEmail); ?></td>
                            </tr>
                        </table>

                        <!-- Invoice -->
                        <?php if($isImmediate && $invoiceUrl): ?>
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td style="border-top:1px solid #1a1a1a;padding:0 0 20px 0;font-size:0;line-height:0;">&nbsp;</td></tr></table>
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color:#0f0f0f;border:1px solid #1e1e1e;border-radius:10px;margin-bottom:24px;">
                            <tr>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:14px 18px;font-size:13px;color:#555555;">&#128196; Invoice PDF</td>
                                <td style="padding:14px 18px;text-align:right;">
                                    <a href="<?php echo e($invoiceUrl); ?>" target="_blank" style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:12px;font-weight:600;color:#00ff88;text-decoration:none;">&#8595; Download Invoice</a>
                                </td>
                            </tr>
                        </table>
                        <?php endif; ?>

                        <!-- Divider + CTA -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td style="border-top:1px solid #1a1a1a;padding:0 0 24px 0;font-size:0;line-height:0;">&nbsp;</td></tr></table>
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td align="center">
                                    <a href="<?php echo e(config('app.url')); ?>/billing" style="display:inline-block;background-color:#00ff88;color:#0a0a0a;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:15px;font-weight:700;padding:14px 36px;border-radius:10px;text-decoration:none;">View Plan Details &rarr;</a>
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
</html><?php /**PATH C:\Git-folders\000form.com\resources\views/emails/plan-upgraded-user.blade.php ENDPATH**/ ?>