<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta name="format-detection" content="telephone=no,address=no,email=no,date=no,url=no" />
    <title>Subscription Reactivated | 000form</title>
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

                        <!-- Green badge -->
                        <div style="display:inline-block;background-color:rgba(0,255,136,0.1);border:1px solid rgba(0,255,136,0.3);border-radius:60px;padding:7px 20px;margin-bottom:20px;">
                            <span style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:12px;font-weight:700;color:#00ff88;letter-spacing:0.04em;">&#10003;&nbsp; Subscription Reactivated</span>
                        </div>

                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:24px;font-weight:800;color:#ffffff;letter-spacing:-0.03em;margin-bottom:10px;line-height:1.25;">Welcome back! Your subscription is active again</div>
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:14px;color:#888888;line-height:1.5;">
                            Your <strong style="color:#ffffff;"><?php echo e(ucfirst($planName)); ?></strong> plan has been successfully reactivated.
                            <?php if($accessUntil): ?>
                                Your next billing date is <strong style="color:#ffffff;"><?php echo e($accessUntil); ?></strong>.
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>

                <!-- BODY -->
                <tr>
                    <td class="content-cell" style="background-color:#111111;padding:30px 20px;">

                        <!-- Active plan display -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color:#0d2b1e;border:1px solid rgba(0,255,136,0.25);border-radius:16px;margin-bottom:28px;">
                            <tr>
                                <td align="center" style="padding:26px 24px;">
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:10px;font-weight:700;color:#555555;letter-spacing:0.1em;text-transform:uppercase;margin-bottom:10px;">Active Plan</div>
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:24px;font-weight:800;color:#00ff88;letter-spacing:-0.02em;margin-bottom:6px;"><?php echo e(ucfirst($planName)); ?></div>
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:13px;color:#555555;text-transform:capitalize;"><?php echo e(ucfirst($billingCycle)); ?> billing</div>
                                </td>
                            </tr>
                        </table>

                        <!-- Callout: green -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color:rgba(0,255,136,0.06);border:1px solid rgba(0,255,136,0.2);border-radius:12px;margin-bottom:28px;">
                            <tr>
                                <td style="padding:16px 18px;">
                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td style="font-size:20px;vertical-align:top;width:28px;padding-right:10px;">&#127881;</td>
                                            <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:14px;color:#6ee7b7;line-height:1.5;vertical-align:top;">
                                                <strong style="display:block;margin-bottom:4px;font-size:13px;">You&rsquo;re all set &mdash; full access restored</strong>
                                                Your <?php echo e(ucfirst($planName)); ?> plan is fully active. All your limits and features have been restored. No data was lost.
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                        <!-- Reactivation Details label -->
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:10px;font-weight:700;color:#444444;letter-spacing:0.12em;text-transform:uppercase;margin-bottom:12px;">Reactivation Details</div>

                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin-bottom:28px;">
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;width:45%;">Active Plan</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#00ff88;font-weight:700;text-align:right;"><?php echo e(ucfirst($planName)); ?> &ndash; <?php echo e(ucfirst($billingCycle)); ?></td>
                            </tr>
                            <?php if($accessUntil): ?>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">Next Billing Date</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#00ff88;font-weight:700;text-align:right;"><?php echo e($accessUntil); ?></td>
                            </tr>
                            <?php endif; ?>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:11px 0;font-size:13px;color:#555555;">Reactivated At</td>
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

                        <!-- Divider + CTA -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td style="border-top:1px solid #1a1a1a;padding:0 0 24px 0;font-size:0;line-height:0;">&nbsp;</td></tr></table>
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td align="center">
                                    <a href="<?php echo e(config('app.url')); ?>/billing" style="display:inline-block;background-color:#00ff88;color:#0a0a0a;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:15px;font-weight:700;padding:14px 36px;border-radius:10px;text-decoration:none;">View Billing Dashboard &rarr;</a>
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
</html><?php /**PATH /var/www/html/000form/resources/views/emails/subscription-resumed.blade.php ENDPATH**/ ?>