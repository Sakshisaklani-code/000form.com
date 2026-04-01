<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New User Registered - 000form</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; background: #0a0a0a; color: #e5e5e5; margin: 0; padding: 2rem 1rem; }
        .wrap { max-width: 520px; margin: 0 auto; }
        .card { background: #141414; border: 1px solid #222; border-radius: 16px; padding: 2rem; }
        .logo { font-size: 1.25rem; font-weight: 700; color: #00ff88; margin-bottom: 1.5rem; }
        h1 { font-size: 1.5rem; font-weight: 700; margin-bottom: 0.5rem; color: #fff; }
        p  { color: #aaa; line-height: 1.5; margin-bottom: 1rem; font-size: 0.95rem; }
        .meta { background: #1a1a1a; border: 1px solid #222; border-radius: 12px; padding: 1rem 1.25rem; margin: 1.25rem 0; }
        .meta-row { display: flex; justify-content: space-between; padding: 0.5rem 0; font-size: 0.875rem; border-bottom: 1px solid #222; }
        .meta-row:last-child { border-bottom: none; }
        .meta-label { color: #666; }
        .meta-value { font-weight: 600; color: #e5e5e5; }
        .badge {
            display: inline-block;
            background: #00ff8822;
            color: #00ff88;
            font-size: 0.7rem;
            padding: 0.2rem 0.6rem;
            border-radius: 20px;
            margin-left: 0.5rem;
            font-weight: 500;
        }
        .footer { font-size: 0.75rem; color: #555; margin-top: 1.25rem; text-align: center; line-height: 1.5; }
        .footer a { color: #00ff88; text-decoration: none; }
        hr { border-color: #222; margin: 1rem 0; }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="card">
            <div class="logo">000form</div>

            <h1>New user registered 🎉</h1>

            <p>
                A new account has been created on <strong style="color:#00ff88;">000form</strong>.
                Here are the details:
            </p>

            <div class="meta">
                <!-- <div class="meta-row">
                    <span class="meta-label">Full name</span>
                    <span class="meta-value">{{ $userName ?? '—' }}</span>
                </div> -->
                <div class="meta-row">
                    <span class="meta-label">Email address - </span>
                    <span class="meta-value">{{ $userEmail }}</span>
                </div>
                <div class="meta-row">
                    <span class="meta-label">Registered at - </span>
                    <span class="meta-value">{{ now()->format('Y-m-d H:i:s') }}</span>
                </div>
            </div>
            <div class="footer">
                This is an automated notification from
                <a href="{{ config('app.url') }}">000form</a>.<br>
                No further action is required unless you manage user access.
            </div>

        </div>

        
    </div>
</body>
</html>