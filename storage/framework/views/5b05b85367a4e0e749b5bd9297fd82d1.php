<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta name="format-detection" content="telephone=no,address=no,email=no,date=no,url=no" />
    <title>New User Registered – 000form</title>
    <!--[if mso]>
    <noscript><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml></noscript>
    <![endif]-->
    <style type="text/css">
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { border: 0; outline: none; text-decoration: none; }
        body { margin: 0 !important; padding: 0 !important; width: 100% !important; }
        a[x-apple-data-detectors] { color: inherit !important; text-decoration: none !important; }
        @media screen and (max-width: 600px) {
            .email-card  { width: 100% !important; border-radius: 0 !important; }
            .header-cell { padding: 28px 20px 24px !important; }
            .body-cell   { padding: 24px 20px 28px !important; }
            .footer-cell { padding: 20px !important; }
        }
    </style>
</head>
<body style="margin:0;padding:0;background-color:#0f0f0f;width:100%;">

<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color:#0f0f0f;">
    <tr>
        <td align="center" style="padding:40px 16px;">

            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="540" class="email-card"
                   style="background-color:#141414;border-radius:20px;border:1px solid #2a2a2a;overflow:hidden;">

                <!-- ══════════════════════════════
                     HEADER
                ══════════════════════════════ -->
                <tr>
                    <td class="header-cell" align="center"
                        style="background-color:#0f0f0f;border-bottom:1px solid #2a2a2a;padding:36px 40px 30px;">

                        <!-- Admin badge -->
                        <div style="display:inline-block;background-color:#1a1a3a;border:1px solid #4444bb;border-radius:60px;padding:7px 18px;margin-bottom:18px;">
                            <span style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:11px;font-weight:700;color:#c7d2fe;letter-spacing:0.08em;text-transform:uppercase;">
                                &#9889; Admin Notification
                            </span>
                        </div>

                        <!-- Logo -->
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:24px;font-weight:800;letter-spacing:-0.03em;color:#ffffff;margin-bottom:20px;">
                            000<span style="color:#00ff88;">form</span>
                        </div>

                        <!-- Event badge — colour changes by auth method -->
                        <?php if($authMethod === 'google'): ?>
                        <div style="display:inline-block;background-color:#1e1a0d;border:1px solid #cc8800;border-radius:60px;padding:8px 22px;margin-bottom:22px;">
                            <span style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:12px;font-weight:700;color:#fbbf24;letter-spacing:0.05em;">
                                &#127881;&nbsp; New Google Registration
                            </span>
                        </div>
                        <?php else: ?>
                        <div style="display:inline-block;background-color:#0d2b1e;border:1px solid #00cc6a;border-radius:60px;padding:8px 22px;margin-bottom:22px;">
                            <span style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:12px;font-weight:700;color:#00ff88;letter-spacing:0.05em;">
                                &#127881;&nbsp; New Registration
                            </span>
                        </div>
                        <?php endif; ?>

                        <!-- Title -->
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:26px;font-weight:800;color:#ffffff;letter-spacing:-0.03em;line-height:1.2;margin-bottom:12px;">
                            New user registered
                        </div>

                        <!-- Subtitle -->
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:15px;color:#bbbbbb;line-height:1.6;">
                            <?php if($authMethod === 'google'): ?>
                                A new account was created via <strong style="color:#fbbf24;">Google Social Login</strong> on&nbsp;<strong style="color:#00ff88;">000form</strong>.
                            <?php else: ?>
                                A new account was created via <strong style="color:#a5b4fc;">Email &amp; Password</strong> on&nbsp;<strong style="color:#00ff88;">000form</strong>.
                            <?php endif; ?>
                        </div>

                    </td>
                </tr>

                <!-- ══════════════════════════════
                     BODY
                ══════════════════════════════ -->
                <tr>
                    <td class="body-cell" style="background-color:#141414;padding:32px 25px 32px;">

                        <!-- Section label -->
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:11px;font-weight:700;color:#aaaaaa;letter-spacing:0.1em;text-transform:uppercase;margin-bottom:14px;">
                            Account Details
                        </div>

                        <!-- Meta table -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
                               style="background-color:#1c1c1c;border:1px solid #333333;border-radius:12px;overflow:hidden;margin-bottom:24px;">

                            <!-- Name row -->
                            <tr>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:15px 18px;font-size:13px;color:#aaaaaa;width:40%;border-bottom:1px solid #2e2e2e;">
                                    Full name
                                </td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:15px 18px;font-size:13px;color:#ffffff;font-weight:700;text-align:right;border-bottom:1px solid #2e2e2e;">
                                    <?php echo e($userName ?: '—'); ?>

                                </td>
                            </tr>

                            <!-- Email row -->
                            <tr>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:15px 18px;font-size:13px;color:#aaaaaa;width:40%;border-bottom:1px solid #2e2e2e;">
                                    Email address
                                </td>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:15px 18px;font-size:13px;color:#a5b4fc;font-weight:700;text-align:right;word-break:break-all;border-bottom:1px solid #2e2e2e;">
                                    <?php echo e($userEmail); ?>

                                </td>
                            </tr>

                            <!-- Signed up via row -->
                            <tr>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:15px 18px;font-size:13px;color:#aaaaaa;border-bottom:1px solid #2e2e2e;">
                                    Signed up via
                                </td>
                                <td style="padding:15px 18px;text-align:right;border-bottom:1px solid #2e2e2e;">
                                    <?php if($authMethod === 'google'): ?>
                                        <span style="display:inline-block;background-color:#1e1a0d;border:1px solid #cc8800;border-radius:20px;padding:5px 14px;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:12px;font-weight:700;color:#fbbf24;letter-spacing:0.03em;">
                                            &#127381; Google OAuth
                                        </span>
                                    <?php else: ?>
                                        <span style="display:inline-block;background-color:#1a1a3a;border:1px solid #4444bb;border-radius:20px;padding:5px 14px;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:12px;font-weight:700;color:#a5b4fc;letter-spacing:0.03em;">
                                            &#9993; Email &amp; Password
                                        </span>
                                    <?php endif; ?>
                                </td>
                            </tr>

                            <!-- Registered at row — human-readable format -->
                            <tr>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:15px 18px;font-size:13px;color:#aaaaaa;border-bottom:1px solid #2e2e2e;">
                                    Registered at
                                </td>
                                <td style="padding:15px 18px;text-align:right;border-bottom:1px solid #2e2e2e;">
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:13px;color:#dddddd;font-weight:600;">
                                        <?php echo e(now()->format('l, d M Y')); ?>

                                    </div>
                                    <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:11px;color:#888888;margin-top:3px;">
                                        <?php echo e(now()->format('h:i A')); ?> UTC
                                    </div>
                                </td>
                            </tr>

                            <!-- Starting plan row -->
                            <tr>
                                <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;padding:15px 18px;font-size:13px;color:#aaaaaa;">
                                    Starting plan
                                </td>
                                <td style="padding:15px 18px;text-align:right;">
                                    <span style="display:inline-block;background-color:#0d2b1e;border:1px solid #00cc6a;border-radius:20px;padding:4px 14px;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:12px;font-weight:700;color:#00ff88;letter-spacing:0.03em;">
                                        Free
                                    </span>
                                </td>
                            </tr>

                        </table>

                        <!-- Divider -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr><td style="border-top:1px solid #2a2a2a;padding:0 0 22px;font-size:0;line-height:0;">&nbsp;</td></tr>
                        </table>

                        <!-- Info note -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
                               style="background-color:#1a1a30;border:1px solid #3a3a80;border-radius:12px;">
                            <tr>
                                <td style="padding:16px 18px;">
                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td style="font-size:18px;vertical-align:top;width:26px;padding-right:12px;padding-top:2px;">
                                                &#128274;
                                            </td>
                                            <td style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:13px;color:#c7d2fe;line-height:1.6;vertical-align:top;">
                                                No further action is required unless you manage user access or permissions.
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>

                <!-- ══════════════════════════════
                     FOOTER
                ══════════════════════════════ -->
                <tr>
                    <td class="footer-cell" align="center"
                        style="background-color:#0f0f0f;border-top:1px solid #2a2a2a;padding:22px 32px;">
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:12px;color:#888888;line-height:1.7;">
                            Automated admin alert from
                            <a href="<?php echo e(config('app.url')); ?>" style="color:#aaaaaa;text-decoration:none;font-weight:600;">000form</a>.
                        </div>
                        <div style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;font-size:11px;color:#666666;margin-top:6px;">
                            &copy; <?php echo e(date('Y')); ?> 000form
                        </div>
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html><?php /**PATH /var/www/html/000form/resources/views/emails/new-user-registered.blade.php ENDPATH**/ ?>