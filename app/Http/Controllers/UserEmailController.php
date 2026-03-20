<?php

// app/Http/Controllers/UserEmailController.php

namespace App\Http\Controllers;

use App\Models\UserEmail;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class UserEmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ── ADD NEW EMAIL ─────────────────────────────────────────
    public function store(Request $request): RedirectResponse
    {
        // ── LIMIT CHECK — max 1 additional email ──────────────
        $existingCount = \App\Models\UserEmail::where('user_id', $request->user()->id)->count();

        if ($existingCount >= 1) {
            return back()->with('error', 'You can only add one additional email address.');
        }

        $request->validate([
            'additional_email' => [
                'required',
                'email',
                'max:255',
                // Must not already be the user's primary email
                function ($attr, $value, $fail) use ($request) {
                    if ($value === $request->user()->email) {
                        $fail('This is already your primary email address.');
                    }
                },
                // Must not already be added by this user
                function ($attr, $value, $fail) use ($request) {
                    $exists = UserEmail::where('user_id', $request->user()->id)
                        ->where('email', $value)
                        ->exists();
                    if ($exists) {
                        $fail('You have already added this email address.');
                    }
                },
                // Must not be used by another account
                function ($attr, $value, $fail) {
                    $exists = UserEmail::where('email', $value)->exists();
                    if ($exists) {
                        $fail('This email address is already in use.');
                    }
                },
            ],
        ]);

        $token = UserEmail::generateToken();

        $userEmail = UserEmail::create([
            'user_id'              => $request->user()->id,
            'email'                => $request->input('additional_email'),
            'is_verified'          => false,
            'verification_token'   => $token,
            'verification_sent_at' => now(),
        ]);

        // Send verification email
        $this->sendVerificationEmail($userEmail);

        return back()->with('success',
            'Email added. A verification link has been sent to ' . $userEmail->email . '.'
        );
    }

    // ── RESEND VERIFICATION EMAIL ─────────────────────────────
    public function resend(Request $request, UserEmail $userEmail): RedirectResponse
    {
        // Ensure this email belongs to the current user
        if ($userEmail->user_id !== $request->user()->id) {
            abort(403);
        }

        if ($userEmail->is_verified) {
            return back()->with('error', 'This email is already verified.');
        }

        // Generate fresh token
        $userEmail->update([
            'verification_token'   => UserEmail::generateToken(),
            'verification_sent_at' => now(),
        ]);

        $this->sendVerificationEmail($userEmail->fresh());

        return back()->with('success', 'Verification email resent to ' . $userEmail->email . '.');
    }

    // ── VERIFY EMAIL (clicked from email link) ────────────────
    public function verify(Request $request, string $token): RedirectResponse
    {
        $userEmail = UserEmail::where('verification_token', $token)->first();

        if (! $userEmail) {
            return redirect()->route('user.another.email-verified')
                ->with('error', 'Invalid verification link.');
        }

        if (! $userEmail->isTokenValid()) {
            return redirect()->route('user.another.email-verified')
                ->with('error', 'Verification link has expired. Please request a new one.');
        }

        if ($userEmail->is_verified) {
            return redirect()->route('user.another.email-verified')
                ->with('success', $userEmail->email . ' is already verified.');
        }

        $userEmail->update([
            'is_verified'        => true,
            'verified_at'        => now(),
            'verification_token' => null, // invalidate token after use
        ]);

        return redirect()->route('user.another.email-verified')
        ->with([
            'success' => 'Email verified successfully.',
            'email' => $userEmail->email
        ]);
    }

    // ── DELETE ADDITIONAL EMAIL ───────────────────────────────
    public function destroy(Request $request, UserEmail $userEmail): RedirectResponse
    {
        if ($userEmail->user_id !== $request->user()->id) {
            abort(403);
        }

        $email = $userEmail->email;
        $userEmail->delete();

        return back()->with('success', $email . ' has been removed from your account.');
    }

    // ── PRIVATE: Send verification email ─────────────────────
    private function sendVerificationEmail(UserEmail $userEmail): void
    {
        $verifyUrl = route('account.email.verify', ['token' => $userEmail->verification_token]);

        // Send using Laravel's built-in mail
        // Uses your default mail driver from .env (MAIL_MAILER etc.)
        Mail::send([], [], function ($message) use ($userEmail, $verifyUrl) {
            $message
                ->to($userEmail->email)
                ->subject('Verify your email address — 000form')
                ->html("
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Verify your email</title>
            </head>
            <body style='margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica, Arial, sans-serif; background-color: #0a0a0a;'>
                <table role='presentation' width='100%' cellspacing='0' cellpadding='0' style='background-color: #0a0a0a; padding: 40px 20px;'>
                    <tr>
                        <td align='center'>
                            <table role='presentation' width='600' cellspacing='0' cellpadding='0' style='max-width: 600px;'>

                                <!-- Header -->
                                <tr>
                                    <td style='padding-bottom: 30px; text-align: center;'>
                                        <span style='font-family: Courier New, monospace; font-size: 28px; font-weight: bold; color: #fafafa;'>
                                            <span style='color: #00ff88;'>000</span>form
                                        </span>
                                    </td>
                                </tr>

                                <!-- Main Content -->
                                <tr>
                                    <td style='background-color: #111111; border-radius: 12px; padding: 40px; border: 1px solid #1a1a1a; text-align: center;'>

                                        <h1 style='margin: 0 0 12px; font-size: 24px; font-weight: 600; color: #fafafa;'>
                                            Verify your email address
                                        </h1>

                                        <p style='margin: 0 0 16px; color: #888888; font-size: 15px; line-height: 1.6;'>
                                            You added this email to your <strong style='color: #fafafa;'>000form</strong> account.
                                        </p>

                                        <p style='margin: 0 0 32px; color: #888888; font-size: 15px; line-height: 1.6;'>
                                            Click the button below to verify it.
                                        </p>

                                        <!-- CTA Button -->
                                        <a href='{$verifyUrl}'
                                        style='display: inline-block; padding: 14px 32px; background-color: #00ff88; color: #050505; text-decoration: none; font-weight: 600; border-radius: 8px; font-size: 15px;'>
                                            Verify Email Address
                                        </a>

                                        <!-- Divider -->
                                        <div style='border-top: 1px solid #1a1a1a; margin: 32px 0;'></div>

                                        <p style='margin: 0; color: #555555; font-size: 13px; line-height: 1.6;'>
                                            This link expires in 24 hours. If you didn't add this email, you can safely ignore this message.
                                        </p>

                                        <p style='margin-top: 16px; color: #444; font-size: 12px; word-break: break-all;'>
                                            {$verifyUrl}
                                        </p>

                                    </td>
                                </tr>

                                <!-- Footer -->
                                <tr>
                                    <td style='padding-top: 24px; text-align: center;'>
                                        <p style='margin: 0 0 8px; color: #555555; font-size: 12px;'>
                                            Sent by <a href='https://000form.com' style='color: #00ff88; text-decoration: none;'>000form.com</a>
                                        </p>
                                        <p style='margin: 0; color: #333333; font-size: 11px;'>
                                            © 2026 000form. All rights reserved.
                                        </p>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>
            </body>
            </html>
                    ");
        });
    }

    public function userSecondEmailverified()
    {
        return view('user-second-email-verified');
    }
}