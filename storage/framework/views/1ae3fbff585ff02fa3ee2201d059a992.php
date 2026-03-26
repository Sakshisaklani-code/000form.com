<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email</title>
</head>
<body style="margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #0a0a0a;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #0a0a0a; padding: 40px 20px;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellspacing="0" cellpadding="0" style="max-width: 600px;">

                    <!-- Header Logo -->
                    <tr>
                        <td style="padding-bottom: 24px; text-align: center;">
                            <span style="font-family: 'Courier New', monospace; font-size: 26px; font-weight: bold; color: #fafafa;">
                                <span style="color: #00ff88;">000</span>form
                            </span>
                        </td>
                    </tr>

                    <!-- Main Card -->
                    <tr>
                        <td style="background-color: #111111; border-radius: 12px; padding: 48px 40px; border: 1px solid #1e1e1e; text-align: center;">

                            <!-- Envelope Icon Circle -->
                            <table role="presentation" cellspacing="0" cellpadding="0" width="100%">
                                <tr>
                                    <td align="center" style="padding-bottom: 28px;">
                                        <table role="presentation" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td style="width: 80px; height: 80px; background: rgba(0, 255, 136, 0.15); border-radius: 50%; margin: 0 auto 2rem; line-height: 80px; text-align: center;">
                                                    <span style="font-size: 36px; color: #00ff88;">✉</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <!-- Title -->
                            <h1 style="margin: 0 0 14px; font-size: 22px; font-weight: 700; color: #fafafa; letter-spacing: -0.01em;">
                                Verify your email address
                            </h1>

                            <!-- Description -->
                            <p style="margin: 0 0 28px; color: #888888; font-size: 14px; line-height: 1.7;">
                                Someone (hopefully you!) entered
                                <strong style="color: #fafafa;"><?php echo e($recipientEmail); ?></strong>
                                as a form submission recipient on the
                                <strong style="color: #fafafa;"><?php echo e($appName); ?> Express</strong>.
                                Click the button below to confirm you own this address.
                            </p>

                            <!-- CTA Button -->
                            <table role="presentation" cellspacing="0" cellpadding="0" width="100%">
                                <tr>
                                    <td align="center" style="padding-bottom: 28px;">
                                        <a href="<?php echo e($verifyUrl); ?>"
                                           style="display: inline-block; padding: 15px 52px; background-color: #00ff88; color: #050505; text-decoration: none; font-weight: 700; border-radius: 8px; font-size: 15px;">
                                            Verify My Email
                                        </a>
                                    </td>
                                </tr>
                            </table>


                            <!-- Divider + Ignore note -->
                            <table role="presentation" cellspacing="0" cellpadding="0" width="100%">
                                <tr>
                                    <td style="border-top: 1px solid #1e1e1e; padding-top: 20px;">
                                        <p style="margin: 0; color: #555555; font-size: 12px; line-height: 1.6; text-align: left;">
                                            If you didn't request this, you can safely ignore this email.
                                            No account has been created and no further emails will be sent.
                                        </p>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding-top: 20px; text-align: center;">
                            <p style="margin: 0; color: #444444; font-size: 12px;">
                                Sent by <a href="<?php echo e(config('app.url')); ?>" style="color: #00ff88; text-decoration: none;">000form.com</a>
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html><?php /**PATH C:\Git-folders\000form.com\resources\views/emails/playground-verification.blade.php ENDPATH**/ ?>