<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Submission - 000form Express</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700&display=swap" rel="stylesheet">
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
            background: #0d0d0d;
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 16px;
            overflow: hidden;
        }

        /* Header */
        .email-header {
            padding: 24px 28px;
            border-bottom: 1px solid rgba(59, 130, 246, 0.15);
            background: #0a0a0a;
        }

        .brand {
            display: flex;
            align-items: baseline;
            gap: 2px;
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 12px;
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
            gap: 6px;
            padding: 4px 12px;
            background: rgba(59, 130, 246, 0.08);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 100px;
            font-size: 11px;
            color: #60a5fa;
            margin-bottom: 16px;
        }

        .email-header h1 {
            font-size: 22px;
            font-weight: 600;
            color: #fafafa;
            letter-spacing: -0.3px;
        }

        /* Body */
        .email-body {
            padding: 28px;
        }

        .submission-intro {
            font-size: 13px;
            color: #9ca3af;
            margin-bottom: 8px;
        }

        .submission-intro:first-of-type {
            padding-bottom: 16px;
            border-bottom: 1px solid rgba(59, 130, 246, 0.1);
            margin-bottom: 20px;
        }

        .field-item {
            margin-bottom: 16px;
            padding: 8px 0;
        }

        .field-label {
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #60a5fa;
            margin-bottom: 4px;
        }

        .field-value {
            font-size: 14px;
            color: #e5e7eb;
            line-height: 1.5;
        }

        /* Attachments */
        .attachment-info {
            background: rgba(59, 130, 246, 0.05);
            border-left: 3px solid #3b82f6;
            padding: 14px 16px;
            margin: 20px 0;
            border-radius: 8px;
        }

        .attachment-info p {
            font-size: 12px;
            color: #e0e7ff;
            margin-bottom: 8px;
        }

        .attachment-list {
            list-style: none;
            padding-left: 0;
        }

        .attachment-list li {
            font-size: 12px;
            color: #9ca3af;
            padding: 4px 0;
        }

        .attachment-list .file-name {
            color: #60a5fa;
        }

        /* Button */
        .cta-button {
            display: inline-block;
            padding: 10px 24px;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white !important;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            border-radius: 8px;
            margin: 16px 0;
        }

        /* Footer */
        .email-footer {
            padding: 20px 28px;
            text-align: center;
            border-top: 1px solid rgba(59, 130, 246, 0.1);
            background: #0a0a0a;
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
            margin-top: 12px;
            font-size: 10px;
            color: #4b5563;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .metadata {
            font-size: 11px;
            color: #6b7280;
            margin-top: 20px;
            padding-top: 16px;
            border-top: 1px solid rgba(59, 130, 246, 0.1);
        }

        .metadata strong {
            color: #60a5fa;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <div class="using-line">⚡ You are using 000form Express</div>
            <div class="brand">
                <span class="highlight">000</span><span class="normal">form</span>
            </div>
            <h1>New submission: {{ $form->name }}</h1>
        </div>
        
        <div class="email-body">
            <p class="submission-intro">
                Received {{ $submission ? $submission->created_at->format('M j, Y \a\t g:i A') : now()->format('M j, Y \a\t g:i A') }}
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
                    <div class="field-item">
                        <div class="field-label">{{ ucfirst(str_replace('_', ' ', $key)) }}</div>
                        <div class="field-value">{!! nl2br(e($value)) !!}</div>
                    </div>
                @endif
            @endforeach
            
            @if($hasAttachment && !empty($attachments))
                <div class="attachment-info">
                    <p>📎 {{ $attachmentCount }} Attachment(s)</p>
                    <ul class="attachment-list">
                        @foreach($attachments as $attachment)
                            <li>📄 <span class="file-name">{{ $attachment['name'] ?? 'file' }}</span></li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            @if($submission)
                <a href="{{ route('dashboard.submissions.show', [$form->id, $submission->id]) }}" class="cta-button">View in Dashboard →</a>
            @endif
            
                <div class="metadata">
                    <span>IP: {{ $ipAddress ?? 'N/A' }}</span><br>
                    <span>Referrer: {{ $formData['referer_url'] ?? 'N/A' }}</span>
                </div>
        </div>
        
        <div class="email-footer">
            <p>Sent via <a href="{{ config('app.url') }}">000form.com</a></p>
            <p>⚡ You Are Working with 000form.com ⚡</p>
        </div>
    </div>
</body>
</html>