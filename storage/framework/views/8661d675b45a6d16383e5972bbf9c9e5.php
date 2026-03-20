<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verified</title>
    <link rel="icon" href="<?php echo e(asset('images/favicon/000formFavicon.png')); ?>" type="image/svg+xml">
</head>
<body style="margin:0; padding:0; font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif; background:#0a0a0a;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 20px;">
        <tr>
            <td align="center">

                <table width="600" style="max-width:600px;">

                    <!-- Logo -->
                    <tr>
                        <td align="center" style="padding-bottom:30px;">
                            <span style="font-family:Courier New, monospace; font-size:28px; font-weight:bold; color:#fafafa;">
                                <span style="color:#00ff88;">000</span>form
                            </span>
                        </td>
                    </tr>

                    <!-- Card -->
                    <tr>
                        <td style="background:#111; border-radius:12px; padding:40px; border:1px solid #1a1a1a; text-align:center;">

                            <h1 style="color:#fafafa; margin-bottom:10px;">
                                ✅ Email Verified
                            </h1>

                            <p style="color:#888; font-size:15px; margin-bottom:20px;">
                                Your email has been successfully verified.
                            </p>

                            <!-- Email Display -->
                            <p style="color:#00ff88; font-size:16px; font-weight:600; margin-bottom:30px;">
                                <?php if(session('success')): ?>
                                    <p style="color:#888;"><?php echo e(session('success')); ?></p>
                                <?php endif; ?>

                                <?php if(session('email')): ?>
                                    <p style="color:#00ff88; font-weight:600;">
                                        <?php echo e(session('email')); ?>

                                    </p>
                                <?php endif; ?>

                                <?php if(session('error')): ?>
                                    <p style="color:red;">
                                        <?php echo e(session('error')); ?>

                                    </p>
                                <?php endif; ?>
                            </p>

                            <p style="color:#555; font-size:14px; margin-bottom:30px;">
                                You can now continue using your account.
                            </p>

                            <!-- CTA -->
                            <a href="https://000form.com/login"
                               style="display:inline-block; padding:12px 28px; background:#00ff88; color:#050505; text-decoration:none; font-weight:600; border-radius:8px;">
                                Go to Dashboard
                            </a>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td align="center" style="padding-top:20px;">
                            <p style="color:#444; font-size:12px;">
                                © 2026 000form
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html><?php /**PATH C:\Git-folders\000form.com\resources\views/user-second-email-verified.blade.php ENDPATH**/ ?>