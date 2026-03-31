<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Email Verified</title>
    <!-- Canonical Tag --> 
    <link rel="canonical" href="https://000form.com/" />
    <!-- Keywords --> 
    <meta name="keywords" content="forms, laravel forms, php form builder, contact forms, form submissions, 000Form">
    <!-- Favicon -->
    <link rel="icon" href="<?php echo e(asset('images/favicon/000formFavicon.png')); ?>" type="image/svg+xml">
    <!-- Open Graph Tags --> 
    <meta property="og:title" content="000Forms - Smart Form Submissions" /> 
    <meta property="og:description" content="Easily create and manage forms with 000Forms, a Laravel-powered solution." /> 
    <meta property="og:type" content="website" /> 
    <meta property="og:url" content="https://000form.com/" /> 
    <meta property="og:image" content="<?php echo e(asset('images/og-image/og-image.jpg')); ?>" /> 
    <meta property="og:site_name" content="000Forms" />
    <!-- Index and follow for SEO -->
    <meta name="robots" content="index, follow">
    <!-- Google Analytics tag (gtag.js) --> 
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TV3T8837GC"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-TV3T8837GC'); </script>
    <!-- Schema.org JSON-LD --> 
    <script type="application/ld+json"> 
        {
            "@context": "https://schema.org", 
            "@type": "Organization", 
            "name": "000Form", 
            "alternateName": "000Form", 
            "url": "https://000form.com/",
            "logo": "https://000form.com/images/logo/000formlogo.png" 
        }
    </script>
</head>
<body style="margin:0;padding:0;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;background-color:#0a0a0a;">
    <div style="min-height:100vh;display:flex;align-items:center;justify-content:center;padding:20px;">
        <div style="background:#111111;border:1px solid #1a1a1a;border-radius:12px;padding:48px;max-width:480px;width:100%;text-align:center;">

            <?php if($success): ?>
            <div style="width:64px;height:64px;background:rgba(0,255,136,0.15);border-radius:50%;margin:0 auto 24px;display:flex;align-items:center;justify-content:center;">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#00ff88" stroke-width="2">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
            </div>
            <h1 style="margin:0 0 12px;font-size:24px;font-weight:600;color:#fafafa;">Email Verified!</h1>
            <?php else: ?>
            <div style="width:64px;height:64px;background:rgba(255,50,50,0.15);border-radius:50%;margin:0 auto 24px;">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#ff5050" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/>
                </svg>
            </div>
            <h1 style="margin:0 0 12px;font-size:24px;font-weight:600;color:#fafafa;">Verification Failed</h1>
            <?php endif; ?>

            <p style="margin:0 0 10px;color:#888888;font-size:15px;line-height:1.6;">
                <?php echo e($message); ?>

            </p>

            <?php if($success && !empty($email)): ?>
            <p style="margin:0 0 32px;color:#00ff88;font-size:14px;font-weight:500;">
                Verified Email: <strong><?php echo e($email); ?></strong>
            </p>
            <?php endif; ?>

            <?php if($success): ?>
            <a href="<?php echo e(route('login')); ?>" style="display:inline-block;padding:14px 32px;background-color:#00ff88;color:#050505;text-decoration:none;font-weight:600;border-radius:8px;font-size:15px;">
                Login to your account
            </a>
            <?php else: ?>
            <a href="<?php echo e(route('signup')); ?>" style="display:inline-block;padding:14px 32px;background-color:#00ff88;color:#050505;text-decoration:none;font-weight:600;border-radius:8px;font-size:15px;">
                Try signing up again
            </a>
            <?php endif; ?>

        </div>
    </div>
</body>
</html><?php /**PATH C:\Git-folders\000form.com\resources\views/pages/signup-confirmed.blade.php ENDPATH**/ ?>