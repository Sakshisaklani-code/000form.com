<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank You - 000form</title>
    <!-- Load Outfit and JetBrains Mono from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --font-display: 'Outfit', sans-serif;
            --font-mono: 'JetBrains Mono', monospace;
        }

        body {
            margin: 0;
            font-family: var(--font-display);
            background: #121212;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .auth-container {
            text-align: center;
            max-width: 400px;
            padding: 2rem;
        }

        .icon-wrapper {
            width: 80px;
            height: 80px;
            background: rgba(0, 255, 136, 0.15);
            border-radius: 50%;
            margin: 0 auto 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        h1 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            font-weight: 600;
            color: #00ff88;
        }

        p {
            margin-bottom: 1rem;
            color: #bbb;
            font-weight: 400;
        }

        .footer {
            margin-top: 3rem;
            font-size: 0.8rem;
            color: #888;
        }

        .footer a {
            color: #00ff88;
            text-decoration: none;
            font-weight: 500;
        }

        /* Example usage of JetBrains Mono for code snippets */
        code {
            font-family: var(--font-mono);
            background: #1e1e1e;
            padding: 0.2rem 0.4rem;
            border-radius: 4px;
            color: #00ff88;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="icon-wrapper">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#00ff88" stroke-width="2">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                <polyline points="22 4 12 14.01 9 11.01"/>
            </svg>
        </div>

        <h1><?php echo e($message); ?></h1>

        <p>Your submission has been received.</p>

        <p class="footer">
            Powered by <a href="/">000form</a>
        </p>
    </div>
</body>
</html>
<?php /**PATH C:\Git-folders\000form.com\resources\views/pages/thank-you.blade.php ENDPATH**/ ?>