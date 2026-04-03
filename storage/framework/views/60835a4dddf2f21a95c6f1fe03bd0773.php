<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta name="format-detection" content="telephone=no,address=no,email=no,date=no,url=no" />
    <title>Payment Successful | 000form</title>
    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
    <style type="text/css">
        /* Reset */
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; border: 0; outline: none; text-decoration: none; }
        body { margin: 0 !important; padding: 0 !important; width: 100% !important; }

        /* Outlook link colour fix */
        a[x-apple-data-detectors] { color: inherit !important; text-decoration: none !important; }

        /* Mobile */
        @media screen and (max-width: 600px) {
            .email-wrapper  { width: 100% !important; }
            .email-card     { width: 100% !important; border-radius: 0 !important; }
            .content-cell   { padding: 24px 20px !important; }
            .header-cell    { padding: 28px 20px 20px !important; }
            .plan-amount    { font-size: 2rem !important; }
            .btn-cell       { display: block !important; width: 100% !important; text-align: center !important; padding: 6px 0 !important; }
            .hide-mobile    { display: none !important; }
        }
    </style>
</head>
<body style="margin:0;padding:0;background-color:#0f0f0f;width:100%;">

<!-- Outer wrapper -->
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color:#0f0f0f;">
    <tr>
        <td align="center" style="padding:40px 16px;">

            <!-- Email card -->
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="580" class="email-card" style="background-color:#111111;border-radius:20px;border:1px solid #222222;overflow:hidden;">

                <!-- ═══ HEADER ═══ -->
                <tr>
                    <td class="header-cell" align="center" style="background-color:#0c0c0c;border-bottom:1px solid #1e1e1e;padding:36px 40px 28px;">

                        <!-- Logo -->
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:22px;font-weight:800;letter-spacing:-0.03em;color:#ffffff;margin-bottom:18px;">
                            000<span style="color:#00ff88;">form</span>
                        </div>

                        <!-- Success badge -->
                        <div style="display:inline-block;background-color:#0d2b1e;border:1px solid rgba(0,255,136,0.4);border-radius:60px;padding:7px 20px;margin-bottom:20px;">
                            <span style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:12px;font-weight:700;color:#00ff88;letter-spacing:0.04em;">&#10003;&nbsp; Payment Confirmed</span>
                        </div>

                        <!-- H1 -->
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:26px;font-weight:800;color:#ffffff;letter-spacing:-0.03em;margin-bottom:10px;line-height:1.25;">Your plan is now active!</div>

                        <!-- Sub -->
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:14px;color:#888888;line-height:1.5;">Thanks for subscribing. Here&rsquo;s a summary of your payment.</div>
                    </td>
                </tr>

                <!-- ═══ BODY ═══ -->
                <tr>
                    <td class="content-cell" style="background-color:#111111;padding:30px 20px;">

                        <!-- Plan highlight card -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color:#0d2b1e;border:1px solid rgba(0,255,136,0.25);border-radius:16px;margin-bottom:32px;">
                            <tr>
                                <td align="center" style="padding:28px 24px;">
                                    <!-- Cycle pill -->
                                    <div style="display:inline-block;background-color:rgba(0,255,136,0.12);border-radius:40px;padding:4px 14px;margin-bottom:14px;">
                                        <span style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:11px;font-weight:700;color:#7effb3;letter-spacing:0.1em;text-transform:uppercase;"><?php echo e(ucfirst($billingCycle)); ?> Plan</span>
                                    </div>
                                    <!-- Plan name -->
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:22px;font-weight:800;color:#f0f0f0;letter-spacing:-0.02em;margin-bottom:8px;" class="plan-amount"><?php echo e(ucfirst($planName)); ?></div>
                                    <!-- Amount -->
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:42px;font-weight:800;color:#ffffff;letter-spacing:-0.03em;margin:10px 0 6px;"><?php echo e($amount); ?></div>
                                    <!-- Renewal -->
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:13px;color:#666666;border-top:1px dashed #1e4030;padding-top:14px;margin-top:10px;">Renews on <?php echo e($periodEnd); ?></div>
                                </td>
                            </tr>
                        </table>

                        <!-- Section label -->
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:10px;font-weight:700;color:#555555;letter-spacing:0.12em;text-transform:uppercase;margin-bottom:14px;">Payment Details</div>

                        <!-- Details table -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color:#0e0e0e;border-radius:12px;margin-bottom:32px;border:1px solid #1a1a1a;">
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:13px 16px;font-size:13px;color:#777777;width:44%;">Plan</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:13px 16px;font-size:13px;color:#00ff88;font-weight:700;text-align:right;"><?php echo e(ucfirst($planName)); ?> &ndash; <?php echo e(ucfirst($billingCycle)); ?></td>
                            </tr>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:13px 16px;font-size:13px;color:#777777;">Amount Paid</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:13px 16px;font-size:13px;color:#00ff88;font-weight:700;text-align:right;"><?php echo e($amount); ?> <?php echo e(strtoupper($currency)); ?></td>
                            </tr>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:13px 16px;font-size:13px;color:#777777;">Access Until</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:13px 16px;font-size:13px;color:#cccccc;font-weight:600;text-align:right;font-family:'Courier New',monospace;"><?php echo e($periodEnd); ?></td>
                            </tr>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:13px 16px;font-size:13px;color:#777777;">Subscription ID</td>
                                <td style="font-family:'Courier New',monospace;padding:13px 16px;font-size:12px;color:#aaaaaa;font-weight:600;text-align:right;word-break:break-all;"><?php echo e($subscriptionId); ?></td>
                            </tr>
                            <tr style="border-bottom:1px solid #1a1a1a;">
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:13px 16px;font-size:13px;color:#777777;">Transaction ID</td>
                                <td style="font-family:'Courier New',monospace;padding:13px 16px;font-size:12px;color:#aaaaaa;font-weight:600;text-align:right;word-break:break-all;"><?php echo e($transactionId); ?></td>
                            </tr>
                            <tr>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:13px 16px;font-size:13px;color:#777777;">Billing Email</td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:13px 16px;font-size:13px;color:#aaaaaa;font-weight:600;text-align:right;"><?php echo e($userEmail); ?></td>
                            </tr>
                        </table>

                        <!-- Divider -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td style="border-top:1px solid #1e1e1e;padding:0;margin-bottom:24px;font-size:0;line-height:0;">&nbsp;</td></tr></table>

                        <!-- Buttons -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td align="center" style="padding-bottom:12px;padding-top:12px">
                                    <a href="<?php echo e(config('app.url')); ?>/billing" style="display:inline-block;background-color:#00ff88;color:#0a0a0a;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:15px;font-weight:700;padding:14px 36px;border-radius:10px;text-decoration:none;letter-spacing:-0.01em;">View Plan Details &rarr;</a>
                                </td>
                            </tr>
                            <?php if($invoiceUrl): ?>
                            <tr>
                                <td align="center" style="padding-top:4px;">
                                    <a href="<?php echo e($invoiceUrl); ?>" target="_blank" style="display:inline-block;background-color:transparent;color:#00ff88;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:13px;font-weight:600;padding:10px 24px;border-radius:10px;text-decoration:none;border:1px solid rgba(0,255,136,0.4);">&darr;&nbsp; Download Invoice PDF</a>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </table>

                    </td>
                </tr>

                <!-- ═══ FOOTER ═══ -->
                <tr>
                    <td align="center" style="background-color:#0a0a0a;border-top:1px solid #1a1a1a;padding:24px 32px;">
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:12px;color:#444444;line-height:1.7;">
                            Questions? Contact us at <a href="mailto:<?php echo e(config('mail.from.address')); ?>" style="color:#666666;text-decoration:none;"><?php echo e(config('mail.from.address')); ?></a>
                        </div>
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:11px;color:#333333;margin-top:10px;line-height:1.7;">
                            &copy; <?php echo e(date('Y')); ?> 000form &nbsp;&middot;&nbsp;
                            <a href="<?php echo e(config('app.url')); ?>/billing" style="color:#444444;text-decoration:none;">Manage Subscription</a>
                            &nbsp;&middot;&nbsp;
                            <a href="<?php echo e(config('app.url')); ?>/dashboard" style="color:#444444;text-decoration:none;">Dashboard</a>
                        </div>
                    </td>
                </tr>

            </table>
            <!-- /Email card -->

        </td>
    </tr>
</table>

</body>
</html><?php /**PATH C:\Git-folders\000form.com\resources\views/emails/payment-success-user.blade.php ENDPATH**/ ?>