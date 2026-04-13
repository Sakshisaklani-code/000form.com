<?php

namespace App\Http\Controllers;

use App\Mail\NewUserRegistered;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    /**
     * Redirect to OAuth provider.
     */
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Handle callback from OAuth provider.
     *
     * Fires an admin notification email ONLY on first-time registration.
     * Returning users signing in again do NOT trigger a duplicate email.
     *
     * Root causes fixed vs previous version:
     *
     * 1. getenv('MAIL_ADMIN_EMAILS') is unreliable after Laravel bootstraps —
     *    Laravel caches .env values into its config; always use config() or env().
     *
     * 2. wasRecentlyCreated is FALSE when a user already exists in the DB with
     *    the same email but no google_id yet (e.g. they registered via email first,
     *    then tried Google). updateOrCreate runs an UPDATE in that case, so
     *    wasRecentlyCreated stays false even though it's their first Google login.
     *    We now track "is this their first Google login" by checking whether
     *    google_id was null BEFORE the upsert, not by wasRecentlyCreated alone.
     */
    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            Log::error('Social auth failed', [
                'provider' => $provider,
                'error'    => $e->getMessage(),
            ]);
            return redirect('/login')->with('error', 'Authentication failed. Please try again.');
        }

        // ── Derive display name ───────────────────────────────────────────────
        // 1. Use the full name returned by Google (e.g. "Alex Johnson")
        // 2. Fall back to the part of the email address before the @ sign
        $name = trim($socialUser->getName() ?? '')
            ?: explode('@', $socialUser->getEmail())[0];

        // ── Detect if this is a brand-new user BEFORE upserting ──────────────
        // We look for an existing record by email.
        // - Not found at all          → brand new user  (isNewUser = true)
        // - Found, google_id is null  → existing email/password user linking
        //                               Google for the first time (isNewUser = false,
        //                               but we still want the notification)
        // - Found, google_id is set   → returning Google user (no notification)
        $existingUser   = User::where('email', $socialUser->getEmail())->first();
        $hadGoogleBefore = $existingUser && !empty($existingUser->google_id);

        // ── Upsert user record ────────────────────────────────────────────────
        $user = User::updateOrCreate(
            [
                'email' => $socialUser->getEmail(),
            ],
            [
                'name'              => $name,
                'google_id'         => $socialUser->getId(),
                'avatar'            => $socialUser->getAvatar(),
                'email_verified_at' => now(), // Google emails are pre-verified
                'password'          => bcrypt(\Illuminate\Support\Str::random(16)),
            ]
        );

        // ── Admin notification ────────────────────────────────────────────────
        // Send when:
        //   a) Record was just created (wasRecentlyCreated), OR
        //   b) User existed with email/password but had no google_id before now
        //      (first time they used Google OAuth)
        //
        // Do NOT send when:
        //   c) User already had a google_id — they are simply logging in again
        $shouldNotify = $user->wasRecentlyCreated || (!$hadGoogleBefore && $existingUser === null)
            || ($existingUser && empty($existingUser->google_id));

        if ($shouldNotify && !$hadGoogleBefore) {
            // Use env() which reads from Laravel's loaded config, not bare getenv()
            $rawEmails   = env('MAIL_ADMIN_EMAILS', '');
            $adminEmails = array_filter(array_map('trim', explode(',', $rawEmails)));

            if (!empty($adminEmails)) {
                try {
                    Mail::to($adminEmails)->send(new NewUserRegistered(
                        userEmail:  $user->email,
                        userName:   $name,
                        authMethod: 'google',
                    ));

                    Log::info('Admin notification sent for Google signup', [
                        'email'      => $user->email,
                        'adminMails' => $adminEmails,
                    ]);
                } catch (\Exception $e) {
                    Log::error('Failed to send admin email for Google signup', [
                        'email' => $user->email,
                        'error' => $e->getMessage(),
                    ]);
                }
            } else {
                Log::warning('MAIL_ADMIN_EMAILS is empty — skipped admin notification for Google signup', [
                    'email' => $user->email,
                ]);
            }
        }
        // ─────────────────────────────────────────────────────────────────────

        Auth::login($user, true); // true = remember me

        return redirect()->intended('/dashboard');
    }
}