<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Sent - 000form Express</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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

        /* Main container */
        .success-container {
            max-width: 500px;
            width: 100%;
            background: linear-gradient(135deg, rgb(8 27 63 / 95%) 0%, rgba(13, 13, 13, 0.98) 100%)
            backdrop-filter: blur(0px);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 32px;
            padding: 3rem 2rem;
            text-align: center;
            position: relative;
            transition: all 0.3s ease;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        /* Animated border glow */
        .success-container::before {
            content: '';
            position: absolute;
            inset: -1px;
            background: linear-gradient(135deg, #3b82f6, #60a5fa, #3b82f6);
            border-radius: 32px;
            opacity: 0.15;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }

        .success-container:hover::before {
            opacity: 0.25;
        }

        /* Logo area */
        .logo-wrapper {
            margin-bottom: 2rem;
            display: flex;
            justify-content: center;
        }

        .logo {
            height: 58px;
            width: auto;
            object-fit: contain;
            filter: brightness(1.1);
            transition: transform 0.2s ease;
        }

        .logo:hover {
            transform: scale(1.02);
        }

        /* Icon with pulse animation */
        .success-icon-wrapper {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.12), rgba(96, 165, 250, 0.08));
            width: 88px;
            height: 88px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.75rem;
            border: 1px solid rgba(59, 130, 246, 0.3);
            position: relative;
            animation: pulseGlow 2s ease-in-out infinite;
        }

        @keyframes pulseGlow {
            0%, 100% {
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.2);
                transform: scale(1);
            }
            50% {
                box-shadow: 0 0 0 15px rgba(59, 130, 246, 0);
                transform: scale(1.02);
            }
        }

        .success-icon {
            font-size: 2.75rem;
            color: #3b82f6;
            filter: drop-shadow(0 0 8px rgba(59, 130, 246, 0.3));
        }

        /* Typography */
        .title {
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            background: linear-gradient(135deg, #ffffff 0%, #e0e7ff 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 0.75rem;
        }

        .message {
            color: #9ca3af;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 2rem;
            max-width: 380px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Back button - improved */
        .btn-back {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.625rem;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            font-weight: 600;
            font-size: 0.9375rem;
            padding: 0.875rem 2rem;
            border-radius: 48px;
            border: none;
            cursor: pointer;
            transition: all 0.25s ease;
            width: auto;
            min-width: 180px;
            margin: 0 auto;
            text-decoration: none;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.25);
            position: relative;
            overflow: hidden;
        }

        .btn-back::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.5s, height 0.5s;
        }

        .btn-back:hover::before {
            width: 200px;
            height: 200px;
        }

        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(59, 130, 246, 0.4);
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        }

        .btn-back:active {
            transform: translateY(0);
        }

        .btn-back i {
            font-size: 1.1rem;
            transition: transform 0.2s ease;
        }

        .btn-back:hover i {
            transform: translateX(-3px);
        }

        /* Express badge */
        .express-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(59, 130, 246, 0.12);
            border: 1px solid rgba(59, 130, 246, 0.25);
            border-radius: 48px;
            padding: 0.5rem 1.1rem;
            margin: 1.75rem auto 0;
            font-size: 0.8125rem;
            font-weight: 500;
            color: #60a5fa;
            width: fit-content;
            backdrop-filter: blur(4px);
        }

        .express-badge i {
            font-size: 0.9rem;
            color: #3b82f6;
        }

        /* Footer */
        .footer {
            margin-top: 2rem;
            padding-top: 1.25rem;
            border-top: 1px solid rgba(59, 130, 246, 0.1);
            font-size: 0.75rem;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .footer a {
            color: #60a5fa;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }

        .footer a:hover {
            color: #3b82f6;
            text-decoration: underline;
        }

        .footer-separator {
            color: #374151;
            font-size: 0.7rem;
        }

        /* Responsive */
        @media (max-width: 520px) {
            .success-container {
                padding: 2rem 1.5rem;
            }
            
            .title {
                font-size: 1.75rem;
            }
            
            .success-icon-wrapper {
                width: 72px;
                height: 72px;
            }
            
            .success-icon {
                font-size: 2.25rem;
            }
            
            .btn-back {
                min-width: 160px;
                padding: 0.75rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="success-container">
        <!-- Logo -->
        <div class="logo-wrapper">
            <img src="/images/logo/000formlogo-express.png" 
                 class="logo" 
                 alt="000form Express"
                 onerror="this.src='/images/logo/000formlogo.png'">
        </div>

        <!-- Success Icon with animation -->
        <div class="success-icon-wrapper">
            <i class="bi bi-check-lg success-icon"></i>
        </div>

        <!-- Title -->
        <h1 class="title">Message sent!</h1>

        <!-- Message -->
        <p class="message">
            Your submission has been received.<br>
            The form owner will respond shortly.
        </p>

        <!-- Back Button - improved with better styling -->
        <button class="btn-back" onclick="history.go(<?php echo e(session('had_captcha') ? -2 : -1); ?>)">
            <i class="bi bi-arrow-left-short"></i> Back to form
        </button><br>

        <!-- Express Badge -->
        <div class="express-badge">
            <i class="bi bi-bolt-fill"></i>
            <span>Powered by 000form Express</span>
        </div>

        <!-- Footer with cleaner design -->
        <div class="footer">
            <span>© 000form</span>
            <span class="footer-separator">•</span>
            <a href="<?php echo e(route('playground.index')); ?>">
                <i class="bi bi-play-circle"></i> Try Express
            </a>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Git-folders\000form.com\resources\views/pages/form-submitted-express.blade.php ENDPATH**/ ?>