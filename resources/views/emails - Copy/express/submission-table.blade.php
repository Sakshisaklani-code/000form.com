<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Submission - 000form Express</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #060609;
            min-height: 100vh;
            padding: 32px 16px;
            display: flex;
            align-items: flex-start;
            justify-content: center;
        }

        .email-container {
            max-width: 580px;
            width: 100%;
        }

        /* ── TOP BADGE ── */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 14px;
            background: rgba(96, 165, 250, 0.08);
            border: 1px solid rgba(96, 165, 250, 0.2);
            border-radius: 100px;
            font-size: 11px;
            font-weight: 500;
            color: #7cb9ff;
            letter-spacing: 0.3px;
            margin-bottom: 20px;
        }

        /* ── CARD ── */
        .card {
            background: #0c0c10;
            border: 1px solid rgba(255,255,255,0.07);
            border-radius: 18px;
            overflow: hidden;
            box-shadow:
                0 0 0 1px rgba(59,130,246,0.07),
                0 24px 64px rgba(0,0,0,0.6),
                inset 0 1px 0 rgba(255,255,255,0.04);
        }

        /* ── HEADER ── */
        .card-header {
            padding: 28px 32px 24px;
            background: linear-gradient(160deg, #0e0e15 0%, #0c0c10 100%);
            border-bottom: 1px solid rgba(255,255,255,0.06);
            position: relative;
            overflow: hidden;
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: -40px; right: -40px;
            width: 180px; height: 180px;
            background: radial-gradient(circle, rgba(59,130,246,0.12) 0%, transparent 70%);
            pointer-events: none;
        }

        .brand {
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -0.5px;
            margin-bottom: 12px;
        }
        .brand .accent { color: #3b82f6; }
        .brand .base   { color: #f1f5f9; }

        .card-header h1 {
            font-size: 19px;
            font-weight: 600;
            color: #f1f5f9;
            letter-spacing: -0.3px;
            line-height: 1.3;
        }

        .received-line {
            margin-top: 8px;
            font-size: 12px;
            color: #4b5563;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .received-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: #22c55e;
            box-shadow: 0 0 6px #22c55e;
            flex-shrink: 0;
        }

        /* ── BODY ── */
        .card-body {
            padding: 28px 32px;
        }

        /* ── TABLE ── */
        .table-shell {
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.07);
        }

        table.fields {
            width: 100%;
            border-collapse: collapse;
        }

        table.fields tr {
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
        table.fields tr:last-child { border-bottom: none; }

        table.fields tr:hover td { background: rgba(59,130,246,0.04) !important; }

        table.fields td {
            padding: 13px 16px;
            vertical-align: top;
            line-height: 1.5;
        }

        table.fields td.label {
            width: 30%;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            color: #4b7baf;
            border-right: 1px solid rgba(255,255,255,0.05);
            white-space: nowrap;
            background: rgba(15,23,42,0.4);
        }

        table.fields td.value {
            font-size: 14px;
            font-weight: 400;
            color: #cbd5e1;
            word-break: break-word;
            background: transparent;
        }

        table.fields td.value a {
            color: #60a5fa;
            text-decoration: none;
        }

        /* Attachments */
        .attach-chips {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            list-style: none;
        }
        .attach-chips li {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: rgba(59,130,246,0.08);
            border: 1px solid rgba(59,130,246,0.2);
            border-radius: 20px;
            padding: 3px 11px;
            font-size: 12px;
            color: #7cb9ff;
        }

        /* ── CTA BUTTON ── */
        .cta-wrap { text-align: center; margin-top: 24px; }
        .cta-btn {
            display: inline-block;
            padding: 12px 32px;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: #fff !important;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            border-radius: 10px;
            letter-spacing: 0.1px;
            box-shadow: 0 4px 20px rgba(59,130,246,0.3);
        }

        /* ── META ROW ── */
        .meta {
            margin-top: 20px;
            padding: 12px 16px;
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            color: #4b5563;
        }
        .meta strong { color: #3b82f6; font-weight: 500; }

        /* ── FOOTER ── */
        .card-footer {
            padding: 18px 32px;
            border-top: 1px solid rgba(255,255,255,0.05);
            background: #09090d;
            text-align: center;
        }
        .card-footer p { font-size: 11px; color: #374151; }
        .card-footer a { color: #4b7baf; text-decoration: none; }

        .footer-zap {
            margin-top: 10px;
            font-size: 10px;
            color: #1f2937;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            letter-spacing: 0.4px;
        }

        @media (max-width: 480px) {
            .card-header, .card-body { padding: 20px; }
            table.fields td { padding: 10px 12px; }
            table.fields td.label { width: 36%; }
        }
    </style>
</head>
<body>

<div class="email-container">

    
    <div class="card">

        <!-- HEADER -->
        <div class="card-header">
            <div class="badge">⚡ You are using 000form Express</div>

            <div class="brand">
                <span class="accent">000</span><span class="base">form</span>
            </div>
            <h1>New submission: {{ $form->name }}</h1>
            <div class="received-line">
                <span class="received-dot"></span>
                Received {{ $submission ? $submission->created_at->format('M j, Y \a\t g:i A') : now()->format('M j, Y \a\t g:i A') }}
            </div>
        </div>

        <!-- BODY -->
        <div class="card-body">

            <div class="table-shell">
                <table class="fields">
                    @php
                        $skipKeys = ['captcha', 'g-recaptcha-response', 'h-captcha-response', 'cf-turnstile-response', 'recaptcha'];
                        $skipValues = ['false', 'true', '0', '1', ''];
                    @endphp

                    @foreach($data as $key => $value)
                        @php
                            $strVal = is_string($value) ? trim($value) : (string) $value;
                            $lowerKey = strtolower($key);
                            $lowerVal = strtolower($strVal);
                        @endphp

                        {{-- Skip: empty, captcha keys, boolean-like values on captcha-adjacent keys, pure boolean strings --}}
                        @if(
                            $strVal !== '' &&
                            !in_array($lowerKey, $skipKeys) &&
                            !($lowerVal === 'false' || $lowerVal === 'true')
                        )
                            <tr>
                                <td class="label">{{ ucfirst(str_replace(['_', '-'], ' ', $key)) }}</td>
                                <td class="value">{!! nl2br(e($value)) !!}</td>
                            </tr>
                        @endif
                    @endforeach

                    @if($hasAttachment && !empty($attachments))
                        <tr>
                            <td class="label">📎 Files</td>
                            <td class="value">
                                <ul class="attach-chips">
                                    @foreach($attachments as $attachment)
                                        <li>📄 {{ $attachment['name'] ?? 'file' }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endif
                </table>
            </div>

            @if($submission)
                <div class="cta-wrap">
                    <a href="{{ route('dashboard.submissions.show', [$form->id, $submission->id]) }}" class="cta-btn">
                        View in Dashboard →
                    </a>
                </div>
            @endif

            <div class="meta">
                    <span><strong>IP</strong> {{ $ipAddress ?? 'N/A' }}</span><br>
            </div>
            <div class="meta">
                    <span><strong>🌐 Referrer:</strong> {{ $formData['referer_url'] ?? 'N/A' }}</span>
            </div>

            @if($submission)
                <div class="meta">
                    <span><strong>IP</strong> &nbsp;{{ $submission->ip_address ?? 'N/A' }}</span>
                    @if($submission->referrer)
                        <span><strong>REF</strong> &nbsp;{{ parse_url($submission->referrer, PHP_URL_HOST) ?? $submission->referrer }}</span>
                    @endif
                </div>
            @endif

        </div>

        <!-- FOOTER -->
        <div class="card-footer">
            <p>Sent via <a href="{{ config('app.url') }}">000form.com</a></p>
            <p>⚡ You Are Working with 000form.com ⚡</div>
        </div>

    </div>

</div>

</body>
</html>