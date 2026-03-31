<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Submission - 000form Express</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700;800&display=swap" rel="stylesheet">
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
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: linear-gradient(135deg, rgba(18, 18, 18, 0.98) 0%, rgba(13, 13, 13, 0.99) 100%);
            border: 1px solid rgba(59, 130, 246, 0.25);
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 25px 40px -12px rgba(0, 0, 0, 0.4);
            position: relative;
        }

        .email-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #60a5fa, #3b82f6);
        }

        /* Header */
        .email-header {
            padding: 28px 32px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(59, 130, 246, 0.12);
        }

        .brand {
            font-size: 28px;
            font-weight: 800;
            letter-spacing: -1px;
            margin-bottom: 16px;
        }

        .brand .highlight {
            background: linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .brand .normal {
            color: #fafafa;
        }

        .using-line {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px;
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.25);
            border-radius: 100px;
            font-size: 12px;
            color: #60a5fa;
            margin-bottom: 20px;
        }

        .email-header h1 {
            font-size: 24px;
            font-weight: 700;
            background: linear-gradient(135deg, #ffffff 0%, #c7d2fe 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* Body */
        .email-body {
            padding: 32px;
        }

        .submission-intro {
            text-align: center;
            font-size: 13px;
            color: #9ca3af;
            margin-bottom: 28px;
            padding-bottom: 20px;
            border-bottom: 1px dashed rgba(59, 130, 246, 0.15);
        }

        /* Box Cards for each field */
        .field-card {
            background: rgba(59, 130, 246, 0.04);
            border: 1px solid rgba(59, 130, 246, 0.15);
            border-radius: 20px;
            padding: 18px 20px;
            margin-bottom: 16px;
            transition: all 0.2s ease;
        }

        .field-card:hover {
            border-color: rgba(59, 130, 246, 0.35);
            background: rgba(59, 130, 246, 0.06);
        }

        .field-label {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #60a5fa;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .field-label::before {
            content: '▸';
            font-size: 10px;
            color: #3b82f6;
        }

        .field-value {
            font-size: 15px;
            color: #fafafa;
            line-height: 1.5;
            padding-left: 14px;
        }

        /* Attachment Box */
        .attachment-box {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.08) 0%, rgba(96, 165, 250, 0.04) 100%);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 20px;
            padding: 20px;
            margin: 24px 0;
        }

        .attachment-header {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            font-weight: 600;
            color: #60a5fa;
            margin-bottom: 16px;
            padding-bottom: 12px;
            border-bottom: 1px solid rgba(59, 130, 246, 0.15);
        }

        .attachment-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .attachment-badge {
            background: rgba(59, 130, 246, 0.12);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 40px;
            padding: 6px 14px;
            font-size: 12px;
            color: #e0e7ff;
        }

        .attachment-badge .file-name {
            color: #60a5fa;
            font-weight: 500;
        }

        /* Button */
        .cta-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white !important;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            border-radius: 48px;
            margin: 20px 0;
            transition: all 0.2s ease;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -5px rgba(59, 130, 246, 0.4);
        }

        /* Metadata Box */
        .metadata-box {
            background: rgba(59, 130, 246, 0.03);
            border-radius: 16px;
            padding: 14px 18px;
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            font-size: 11px;
            color: #6b7280;
        }

        .metadata-box strong {
            color: #60a5fa;
        }

        /* Footer */
        .email-footer {
            background: #0a0a0a;
            padding: 24px 32px;
            text-align: center;
            border-top: 1px solid rgba(59, 130, 246, 0.12);
        }

        .email-footer p {
            font-size: 11px;
            color: #6b7280;
        }

        .email-footer a {
            color: #60a5fa;
            text-decoration: none;
        }

        .working-line {
            margin-top: 16px;
            font-size: 10px;
            color: #4b5563;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .working-line::before,
        .working-line::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.2), transparent);
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <div class="brand">
                <span class="highlight">000</span><span class="normal">form</span>
            </div>
            <div class="using-line">⚡ You are using 000form Express</div>
            <h1>New submission: {{ $form->name }}</h1>
        </div>
        
        <div class="email-body">
            <p class="submission-intro">
                📅 Received {{ $submission ? $submission->created_at->format('M j, Y \a\t g:i A') : now()->format('M j, Y \a\t g:i A') }}
            </p>
            
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
                    <div class="field-card">
                        <div class="field-label">{{ ucfirst(str_replace('_', ' ', $key)) }}</div>
                        <div class="field-value">{!! nl2br(e($value)) !!}</div>
                    </div>
                @endif
            @endforeach
            
            @if($hasAttachment && !empty($attachments))
                <div class="attachment-box">
                    <div class="attachment-header">
                        <span>📎</span> <strong>{{ $attachmentCount }} Attachment(s)</strong>
                    </div>
                    <div class="attachment-grid">
                        @foreach($attachments as $attachment)
                            <div class="attachment-badge">
                                📄 <span class="file-name">{{ $attachment['name'] ?? 'file' }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            
            @if($submission)
                <a href="{{ route('dashboard.submissions.show', [$form->id, $submission->id]) }}" class="cta-button">
                    View in Dashboard <span>→</span>
                </a>
            @endif
            
            @if($submission)
                <div class="metadata-box">
                    <span><strong>🌐 IP:</strong> {{ $submission->ip_address ?? 'N/A' }}</span>
                    @if($submission->referrer)
                        <span><strong>🔗 From:</strong> {{ parse_url($submission->referrer, PHP_URL_HOST) ?? $submission->referrer }}</span>
                    @endif
                </div>
            @endif
        </div>
        
        <div class="email-footer">
            <p>Sent via <a href="{{ config('app.url') }}">000form.com</a></p>
            <div class="working-line">⚡ You Are Working with 000form.com ⚡</div>
        </div>
    </div>
</body>
</html>