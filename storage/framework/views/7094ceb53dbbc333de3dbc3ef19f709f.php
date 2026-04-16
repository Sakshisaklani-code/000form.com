<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email - 000form Express</title>
</head>
<body style="margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background: linear-gradient(135deg, #0a0a0a 0%, #0f0f0f 100%);">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background: linear-gradient(135deg, #0a0a0a 0%, #0f0f0f 100%); padding: 40px 20px;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellspacing="0" cellpadding="0" style="max-width: 600px;">

                    <!-- Header Logo with Express Badge -->
                    <tr>
                        <td style="padding-bottom: 24px; text-align: center;">
                            <table role="presentation" cellspacing="0" cellpadding="0" width="100%">
                                <tr>
                                    <td align="center">
                                        <span style="font-family: 'Courier New', monospace; font-size: 28px; font-weight: bold; color: #fafafa; display: inline-flex; align-items: center; gap: 8px;">
                                            <span style="color: #3b82f6;">000</span>form
                                        </span>
                                        <div style="margin-top: 8px;">
                                            <span style="display: inline-flex; align-items: center; gap: 4px; background: rgba(59, 130, 246, 0.12); border: 1px solid rgba(59, 130, 246, 0.25); padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: 600; color: #60a5fa;">
                                                <span style="font-size: 12px;">⚡</span> EXPRESS
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Main Card -->
                    <tr>
                        <td style="background: linear-gradient(135deg, rgba(18, 18, 18, 0.95) 0%, rgba(13, 13, 13, 0.98) 100%); border-radius: 24px; padding: 48px 40px; border: 1px solid rgba(59, 130, 246, 0.2); text-align: center; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);">

                            <!-- Envelope Icon Circle with Blue Theme -->
                            <table role="presentation" cellspacing="0" cellpadding="0" width="100%">
                                <tr>
                                    <td align="center" style="padding-bottom: 28px;">
                                        <table role="presentation" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td style="width: 80px; height: 80px; background: rgba(59, 130, 246, 0.12); border: 1px solid rgba(59, 130, 246, 0.25); border-radius: 50%; margin: 0 auto 2rem; line-height: 80px; text-align: center;">
                                                    <span style="font-size: 36px; color: #3b82f6;">✉</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <!-- Title with Blue Gradient -->
                            <h1 style="color: #60a5fa; font-weight: 600;">
                                Verify your email address
                            </h1>

                            <!-- Description with Blue Accents -->
                            <p style="margin: 0 0 28px; color: #9ca3af; font-size: 15px; line-height: 1.7;">
                                Someone (hopefully you!) entered
                                <strong style="color: #60a5fa; font-weight: 600;"><?php echo e($recipientEmail); ?></strong>
                                as a form submission recipient on the
                                <strong style="color: #60a5fa; font-weight: 600;"><?php echo e($appName); ?> Express</strong>.
                                Click the button below to confirm you own this address.
                            </p>

                            <!-- CTA Button with Blue Gradient -->
                            <table role="presentation" cellspacing="0" cellpadding="0" width="100%">
                                <tr>
                                    <td align="center" style="padding-bottom: 28px;">
                                        <a href="<?php echo e($verifyUrl); ?>"
                                           style="display: inline-block; padding: 15px 52px; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: #ffffff; text-decoration: none; font-weight: 700; border-radius: 48px; font-size: 15px; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(59, 130, 246, 0.25);">
                                            Verify My Email
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <!-- Security Note -->
                            <table role="presentation" cellspacing="0" cellpadding="0" width="100%">
                                <tr>
                                    <td style="padding-bottom: 20px;">
                                        <div style="display: inline-flex; align-items: center; gap: 8px; justify-content: center; margin-bottom: 12px;">
                                            <span style="display: inline-flex; align-items: center; gap: 6px; font-size: 11px; color: #6b7280;">
                                                <span style="color: #3b82f6;">✓</span> Secure verification
                                            </span>
                                            <span style="color: #374151;">•</span>
                                            <span style="display: inline-flex; align-items: center; gap: 6px; font-size: 11px; color: #6b7280;">
                                                <span style="color: #3b82f6;">⚡</span> Instant confirmation
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <!-- Divider + Ignore note -->
                            <table role="presentation" cellspacing="0" cellpadding="0" width="100%">
                                <tr>
                                    <td style="border-top: 1px solid rgba(59, 130, 246, 0.1); padding-top: 20px;">
                                        <p style="margin: 0; color: #6b7280; font-size: 12px; line-height: 1.6; text-align: left;">
                                            <span style="display: inline-block; margin-right: 8px;">ℹ️</span>
                                            If you didn't request this, you can safely ignore this email.
                                            No account has been created and no further emails will be sent.
                                        </p>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    <!-- Footer with Blue Links -->
                    <tr>
                        <td style="padding-top: 24px; text-align: center;">
                            <p style="margin: 0 0 8px; color: #6b7280; font-size: 12px;">
                                Sent by <a href="<?php echo e(config('app.url')); ?>" style="color: #60a5fa; text-decoration: none; font-weight: 500;">000form Express</a>
                            </p>
                            <p style="margin: 0; color: #4b5563; font-size: 11px;">
                                Form backend without the backend
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html><?php /**PATH /var/www/html/000form/resources/views/emails/playground-verification.blade.php ENDPATH**/ ?>