
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Submission - 000form Express</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #0a0a0a 0%, #0f0f0f 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            position: relative;
        }

        /* Animated background effect */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 50% 50%, rgba(59, 130, 246, 0.03) 0%, transparent 70%);
            pointer-events: none;
        }

        .main {
            width: 100%;
            max-width: 520px;
            margin: 0 auto;
            animation: slideUp 0.5s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Header Section */
        .text-center {
            text-align: center;
            margin-bottom: 2rem;
        }

        .text-center h2 {
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            background: linear-gradient(135deg, #ffffff 0%, #e0e7ff 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 0.75rem;
        }

        .verification-subtitle {
            font-size: 1rem;
            color: #9ca3af;
            margin-bottom: 1.5rem;
        }

        .using-line {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1.25rem;
            background: rgba(59, 130, 246, 0.08);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 100px;
            font-size: 0.875rem;
            color: #60a5fa;
            backdrop-filter: blur(10px);
        }

        .using-line span {
            color: #9ca3af;
            font-weight: 400;
        }

        /* Main Card */
        .verify-card {
            background: linear-gradient(135deg, rgba(18, 18, 18, 0.95) 0%, rgba(13, 13, 13, 0.98) 100%);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 32px;
            padding: 2.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
            position: relative;
        }

        .verify-card::before {
            content: '';
            position: absolute;
            inset: -1px;
            background: linear-gradient(135deg, #3b82f6, #60a5fa, #3b82f6);
            border-radius: 32px;
            opacity: 0.1;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }

        .verify-card:hover::before {
            opacity: 0.2;
        }

        .verify-card:hover {
            transform: translateY(-2px);
        }

        /* Form Info */
        .form-info {
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: rgba(59, 130, 246, 0.05);
            border-radius: 20px;
            border: 1px solid rgba(59, 130, 246, 0.15);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .form-info::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, #3b82f6, #60a5fa, #3b82f6, transparent);
        }

        .form-info .label {
            color: #60a5fa;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .verify-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: rgba(59, 130, 246, 0.1);
            border-radius: 40px;
            font-size: 0.875rem;
            color: #60a5fa;
            font-weight: 500;
        }

        .verify-badge i {
            font-size: 1rem;
        }

        /* reCAPTCHA */
        .recaptcha-wrapper {
            display: flex;
            justify-content: center;
            margin: 2rem 0;
            transition: transform 0.2s ease;
        }

        .recaptcha-wrapper:hover {
            transform: scale(1.02);
        }

        .g-recaptcha {
            display: inline-block;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        /* Button */
        .verify-btn {
            width: 100%;
            padding: 1rem;
            font-size: 1rem;
            font-weight: 600;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            border: none;
            border-radius: 48px;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .verify-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .verify-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.4);
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        }

        .verify-btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .verify-btn:active {
            transform: translateY(0);
        }

        .verify-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
            background: linear-gradient(135deg, #4b5563 0%, #374151 100%);
        }

        .verify-btn:disabled:hover {
            box-shadow: none;
        }

        /* Privacy Note */
        .privacy-note {
            margin-top: 1.5rem;
            font-size: 0.75rem;
            color: #6b7280;
            text-align: center;
            padding: 1rem 0;
            border-bottom: 1px solid rgba(59, 130, 246, 0.1);
        }

        /* Working Line */
        .working-line {
            margin-top: 1.5rem;
            font-size: 0.875rem;
            text-align: center;
            color: #9ca3af;
            font-weight: 400;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        .working-line::before,
        .working-line::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.2), transparent);
        }

        .working-line i {
            color: #3b82f6;
            font-size: 0.875rem;
        }

        /* Back Link */
        .back-link {
            text-align: center;
            margin-top: 2rem;
        }

        .back-link a {
            color: #9ca3af;
            text-decoration: none;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 100px;
            background: rgba(59, 130, 246, 0.03);
            border: 1px solid rgba(59, 130, 246, 0.15);
            transition: all 0.2s ease;
        }

        .back-link a:hover {
            color: #60a5fa;
            border-color: #3b82f6;
            gap: 0.75rem;
            background: rgba(59, 130, 246, 0.08);
        }

        .back-link i {
            font-size: 1rem;
            transition: transform 0.2s ease;
        }

        .back-link a:hover i {
            transform: translateX(-3px);
        }

        /* Security Badge */
        .security-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .security-badge-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.75rem;
            color: #6b7280;
        }

        .security-badge-item i {
            font-size: 0.875rem;
            color: #3b82f6;
        }

        /* Loading Spinner */
        .btn-loader {
            display: none;
            width: 16px;
            height: 16px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top-color: #ffffff;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive */
        @media (max-width: 640px) {
            body {
                padding: 1rem;
            }
            
            .main {
                margin: 1rem auto;
            }
            
            .text-center h2 {
                font-size: 1.5rem;
            }
            
            .verify-card {
                padding: 1.5rem;
            }
            
            .recaptcha-wrapper {
                transform: scale(0.95);
            }
            
            .recaptcha-wrapper:hover {
                transform: scale(0.97);
            }
            
            .security-badge {
                flex-direction: column;
                gap: 0.75rem;
            }
        }
    </style>
</head>
<body>

    <!-- Main Content -->
    <main class="main">
        <!-- Header Section -->
        <div class="text-center">
            <h2>Verify you're human</h2>
            <p class="verification-subtitle">This quick verification helps us keep spam away</p>
            <div class="using-line">
                <i class="bi bi-bolt-fill"></i>
                <span>You are using</span> 000form Express
            </div>
        </div>
        
        <!-- Main Card -->
        <div class="verify-card">
            <!-- Form Info -->
            <div class="form-info">
                <p class="label">Security Verification Required</p>
                <div class="verify-badge">
                    <i class="bi bi-shield-check"></i>
                    <span>Complete CAPTCHA to continue</span>
                </div>
            </div>
            
            <!-- reCAPTCHA Form -->
            <form action="<?php echo e(route('playground.verify-captcha', ['email' => $email])); ?>" method="POST" id="captchaForm">
                <?php echo csrf_field(); ?>
                <div class="recaptcha-wrapper">
                    <div class="g-recaptcha" data-sitekey="<?php echo e($siteKey); ?>" data-callback="onCaptchaSuccess"></div>
                </div>
                <button type="submit" class="verify-btn" id="submitBtn" disabled>
                    <i class="bi bi-shield-lock"></i>
                    <span id="btnText">Complete Captcha First</span>
                    <span class="btn-loader" id="btnLoader"></span>
                </button>
            </form>
            
            <!-- Privacy Note -->
            <p class="privacy-note">
                <i class="bi bi-shield-check"></i> Protected by reCAPTCHA &nbsp;|&nbsp; Your privacy is important to us
            </p>

            <!-- Working Line -->
            <p class="working-line">
                <i class="bi bi-bolt"></i>
                You Are Working with 000form.com
                <i class="bi bi-bolt"></i>
            </p>
        </div>
        
        <!-- Back Link -->
        <div class="back-link">
            <a href="javascript:history.back()">
                <i class="bi bi-arrow-left"></i>
                Go back to form
            </a>
        </div>

        <!-- Security Badge -->
        <div class="security-badge">
            <div class="security-badge-item">
                <i class="bi bi-shield-fill-check"></i>
                <span>reCAPTCHA Protected</span>
            </div>
            <div class="security-badge-item">
                <i class="bi bi-clock-history"></i>
                <span>Quick Verification</span>
            </div>
            <div class="security-badge-item">
                <i class="bi bi-lock-fill"></i>
                <span>Secure Connection</span>
            </div>
        </div>
    </main>

    <script>
        function onCaptchaSuccess() {
            const btn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            
            btn.disabled = false;
            btnText.textContent = 'Verify & Continue';
            btn.style.background = 'linear-gradient(135deg, #3b82f6 0%, #2563eb 100%)';
        }

        document.getElementById('captchaForm').addEventListener('submit', function(e) {
            const btn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const btnLoader = document.getElementById('btnLoader');
            
            btn.disabled = true;
            btnText.textContent = 'Verifying...';
            btnLoader.style.display = 'inline-block';
        });
    </script>
</body>
</html><?php /**PATH C:\Git-folders\000form.com\resources\views/pages/playground-captcha.blade.php ENDPATH**/ ?>