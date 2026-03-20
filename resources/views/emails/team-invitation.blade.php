<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Team Invitation - 000form</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; background: #0a0a0a; color: #e5e5e5; margin: 0; padding: 2rem 1rem; }
        .wrap { max-width: 520px; margin: 0 auto; }
        .card { background: #141414; border: 1px solid #222; border-radius: 16px; padding: 2.5rem; }
        .logo { font-size: 1.25rem; font-weight: 700; color: #00ff88; margin-bottom: 2rem; }
        h1 { font-size: 1.5rem; font-weight: 700; margin-bottom: 0.75rem; color: #fff; }
        p  { color: #aaa; line-height: 1.6; margin-bottom: 1rem; font-size: 0.95rem; }
        .meta { background: #1a1a1a; border: 1px solid #222; border-radius: 10px; padding: 1rem 1.25rem; margin: 1.5rem 0; }
        .meta-row { display: flex; justify-content: space-between; padding: 0.3rem 0; font-size: 0.875rem; }
        .meta-label { color: #666; }
        .meta-value { font-weight: 600; color: #e5e5e5; }
        .btn {
            display: block; text-align: center; background: #00ff88; color: #0a0a0a;
            padding: 1rem 2rem; border-radius: 10px; font-weight: 700; font-size: 1rem;
            text-decoration: none; margin: 1.5rem 0;
        }
        .footer { font-size: 0.8rem; color: #555; margin-top: 1.5rem; text-align: center; line-height: 1.6; }
        .footer a { color: #00ff88; text-decoration: none; }
        .url-fallback { word-break: break-all; font-size: 0.75rem; color: #555; }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="card">
            <div class="logo">000form</div>

            <h1>You've been invited 👥</h1>

            <p>
                <strong style="color:#fff;">{{ $ownerName }}</strong> has invited you to join their
                000form workspace as a <strong style="color:#fff;">{{ $role }}</strong>.
            </p>

            <div class="meta">
                <div class="meta-row">
                    <span class="meta-label">Workspace</span>
                    <span class="meta-value">{{ $ownerName }}</span>
                </div>
                <div class="meta-row">
                    <span class="meta-label">Your role</span>
                    <span class="meta-value">{{ $role }}</span>
                </div>
                <div class="meta-row">
                    <span class="meta-label">Invited email</span>
                    <span class="meta-value">{{ $invitation->invitee_email }}</span>
                </div>
                <div class="meta-row">
                    <span class="meta-label">Expires</span>
                    <span class="meta-value">{{ $expiresAt }}</span>
                </div>
            </div>

            <a href="{{ $acceptUrl }}" class="btn">Accept Invitation →</a>

            <p style="font-size:0.85rem;">
                If you don't have a 000form account yet, you'll be asked to create one first.
                The invitation will be waiting for you after signup.
            </p>

            <p class="url-fallback">
                If the button doesn't work, copy and paste this link into your browser:<br>
                {{ $acceptUrl }}
            </p>
        </div>

        <div class="footer">
            This invitation was sent by {{ $ownerName }} via
            <a href="{{ config('app.url') }}">000form</a>.<br>
            If you didn't expect this, you can safely ignore this email.
        </div>
    </div>
</body>
</html>