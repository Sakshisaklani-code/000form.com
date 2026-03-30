<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/favicon/000formFavicon-express.png') }}" type="image/svg+xml">
    <title>{{ $success ? 'Email Verified' : 'Verification Failed' }} - 000form Express</title>
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

        .verification-status {
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

        /* Status Icon */
        .status-icon {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .icon-wrapper {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 88px;
            height: 88px;
            background: {{ $success ? 'rgba(34, 197, 94, 0.1)' : 'rgba(239, 68, 68, 0.1)' }};
            border-radius: 50%;
            border: 1px solid {{ $success ? 'rgba(34, 197, 94, 0.3)' : 'rgba(239, 68, 68, 0.3)' }};
            animation: pulseGlow 2s ease-in-out infinite;
        }

        @keyframes pulseGlow {
            0%, 100% {
                box-shadow: 0 0 0 0 {{ $success ? 'rgba(34, 197, 94, 0.2)' : 'rgba(239, 68, 68, 0.2)' }};
                transform: scale(1);
            }
            50% {
                box-shadow: 0 0 0 15px {{ $success ? 'rgba(34, 197, 94, 0)' : 'rgba(239, 68, 68, 0)' }};
                transform: scale(1.02);
            }
        }

        .icon-wrapper i {
            font-size: 2.75rem;
            color: {{ $success ? '#22c55e' : '#ef4444' }};
            filter: drop-shadow(0 0 8px {{ $success ? 'rgba(34, 197, 94, 0.3)' : 'rgba(239, 68, 68, 0.3)' }});
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

        .email-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.25rem;
            background: rgba(59, 130, 246, 0.1);
            border-radius: 40px;
            font-size: 0.875rem;
            color: #60a5fa;
            font-weight: 500;
            word-break: break-all;
            text-align: center;
        }

        .email-badge i {
            font-size: 1rem;
            flex-shrink: 0;
        }

        /* Title */
        .title {
            font-size: 1.8rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            text-align: center;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #ffffff 0%, #e0e7ff 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .message {
            text-align: center;
            color: #9ca3af;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        /* Button */
        .action-btn {
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
            text-decoration: none;
            margin-top: 1rem;
        }

        .action-btn::before {
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

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.4);
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        }

        .action-btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .action-btn:active {
            transform: translateY(0);
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

        /* Responsive */
        @media (max-width: 640px) {
            body {
                padding: 1rem;
            }
            
            .main {
                margin: 1rem auto;
            }
            
            .title {
                font-size: 1.5rem;
            }
            
            .verify-card {
                padding: 1.5rem;
            }
            
            .icon-wrapper {
                width: 72px;
                height: 72px;
            }
            
            .icon-wrapper i {
                font-size: 2.25rem;
            }
            
            .security-badge {
                flex-direction: column;
                gap: 0.75rem;
            }
            
            .email-badge {
                font-size: 0.75rem;
                padding: 0.5rem 1rem;
            }
        }
    </style>
</head>
<body>

    <!-- Main Content -->
    <main class="main">
        <!-- Header Section -->
        <div class="text-center">
            <div class="using-line">
                <i class="bi bi-bolt-fill"></i>
                <span>You are using</span> 000form Express
            </div>
        </div>
        
        <!-- Main Card -->
        <div class="verify-card">
            <!-- Status Icon -->
            <div class="status-icon">
                <div class="icon-wrapper">
                    <i class="bi {{ $success ? 'bi-check-lg' : 'bi-x-lg' }}"></i>
                </div>
            </div>
            
            <!-- Title -->
            <h1 class="title">
                {{ $success ? 'Email Verified!' : 'Verification Failed' }}
            </h1>
            
            <!-- Message -->
            <p class="message">
                {{ $message }}
            </p>
            
            @if($success && isset($email))
            <!-- Email Badge -->
            <div class="form-info">
                <p class="label">Verified Email Address</p>
                <div class="email-badge">
                    <i class="bi bi-envelope-check-fill"></i>
                    <span>{{ $email }}</span>
                </div>
            </div>
            @endif
            
            @if(!$success)
            <!-- Help Message for Failed Verification -->
            <div class="form-info" style="margin-bottom: 0;">
                <p class="label">Need Help?</p>
                <div class="email-badge" style="background: rgba(239, 68, 68, 0.1); color: #ef4444;">
                    <i class="bi bi-info-circle-fill"></i>
                    <span>The verification link may have expired or is invalid</span>
                </div>
            </div>
            @endif
            
            <!-- Action Button -->
            <a href="{{ route('playground.index') }}" class="action-btn">
                <i class="bi {{ $success ? 'bi-box-arrow-in-right' : 'bi-arrow-repeat' }}"></i>
                {{ $success ? 'Continue to Express' : 'Try Again' }}
            </a>
            
            <!-- Privacy Note -->
            <p class="privacy-note">
                <i class="bi bi-shield-check"></i> Secure verification &nbsp;|&nbsp; Your privacy is protected
            </p>

            <!-- Working Line -->
            <p class="working-line">
                <i class="bi bi-bolt"></i>
                You Are Working with 000form.com
                <i class="bi bi-bolt"></i>
            </p>
        </div>

        <!-- Security Badge -->
        <div class="security-badge">
            <div class="security-badge-item">
                <i class="bi bi-shield-fill-check"></i>
                <span>Email Verified</span>
            </div>
            <div class="security-badge-item">
                <i class="bi bi-clock-history"></i>
                <span>Instant Confirmation</span>
            </div>
            <div class="security-badge-item">
                <i class="bi bi-lock-fill"></i>
                <span>Secure Connection</span>
            </div>
        </div>
    </main>

    <script>
        // Optional: Add any additional interactivity if needed
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth animation for card
            const card = document.querySelector('.verify-card');
            if (card) {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100);
            }
        });
    </script>
</body>
</html>