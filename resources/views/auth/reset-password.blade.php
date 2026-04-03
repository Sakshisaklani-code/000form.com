@extends('layouts.app')

@section('content')
<div class="auth-page">
    <div class="auth-container">

        {{-- Header --}}
        <div class="auth-header">
            <div class="auth-logo">000<span>form</span></div>
        </div>

        {{-- Error state (expired/invalid token) --}}
        <div class="auth-card" id="token-error" style="display:none; text-align:center;">
            <!-- <div style="width:48px;height:48px;background:rgba(255,68,68,0.1);border-radius:12px;display:flex;align-items:center;justify-content:center;margin:0 auto 1.25rem;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--error)" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <line x1="12" y1="8" x2="12" y2="12"/>
                    <line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
            </div> -->
            <h2 style="font-size:1.25rem;margin-bottom:0.5rem;">Link expired</h2>
            <p id="error-message" style="margin-bottom:1.5rem;font-size:0.9rem;">
                This reset link is invalid or has expired. Please request a new one.
            </p>
            <a href="{{ route('password.request') }}" class="btn btn-primary" style="width:100%;">
                Request new link
            </a>
        </div>

        {{-- Reset form --}}
        <div class="auth-card" id="reset-form-wrapper">
            <div style="margin-bottom:1.5rem;">
                <h2 style="font-size:1.25rem;margin-bottom:0.35rem;">Set new password</h2>
                <p style="font-size:0.875rem;color:var(--text-muted);">Must be at least 8 characters.</p>
            </div>

            @if($errors->any())
                <div class="alert alert-error" style="margin-bottom:1.25rem;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="8" x2="12" y2="12"/>
                        <line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}" id="reset-form">
                @csrf
                <input type="hidden" name="access_token" id="access_token">

                <div class="form-group">
                    <label class="form-label" for="password">New password</label>
                    <div style="position: relative;">
                        <input type="password" id="password" name="password"
                               class="form-input" placeholder="••••••••"
                               required minlength="8" autocomplete="new-password"
                               style="padding-right: 42px;">
                        <span onclick="togglePassword('password', this)" style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #888888; user-select: none;">
                            <svg class="eye-open" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                            <svg class="eye-closed" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:none;">
                                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/>
                                <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/>
                                <line x1="1" y1="1" x2="23" y2="23"/>
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password_confirmation">Confirm password</label>
                    <div style="position: relative;">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                               class="form-input" placeholder="••••••••"
                               required autocomplete="new-password"
                               style="padding-right: 42px;">
                        <span onclick="togglePassword('password_confirmation', this)" style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #888888; user-select: none;">
                            <svg class="eye-open" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                            <svg class="eye-closed" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:none;">
                                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/>
                                <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/>
                                <line x1="1" y1="1" x2="23" y2="23"/>
                            </svg>
                        </span>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" style="width:100%;" id="submit-btn">
                    Reset password
                </button>
            </form>
        </div>

        <div class="auth-footer">
            <a href="{{ route('login') }}">← Back to login</a>
        </div>

    </div>
</div>

<script>
    // Read token from query string (set by confirmPasswordResetFromToken)
    const urlParams  = new URLSearchParams(window.location.search);
    const token      = urlParams.get('access_token') || '{{ session("reset_access_token") }}';

    if (!token) {
        document.getElementById('reset-form-wrapper').style.display = 'none';
        document.getElementById('token-error').style.display = 'block';
    } else {
        document.getElementById('access_token').value = token;
    }

    function togglePassword(fieldId, icon) {
        const input = document.getElementById(fieldId);
        const eyeOpen = icon.querySelector('.eye-open');
        const eyeClosed = icon.querySelector('.eye-closed');
        if (input.type === 'password') {
            input.type = 'text';
            eyeOpen.style.display = 'none';
            eyeClosed.style.display = 'inline';
        } else {
            input.type = 'password';
            eyeOpen.style.display = 'inline';
            eyeClosed.style.display = 'none';
        }
    }
</script>
@endsection