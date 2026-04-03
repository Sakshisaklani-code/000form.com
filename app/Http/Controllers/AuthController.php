<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\SupabaseAuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Mail\NewUserRegistered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;


class AuthController extends Controller
{
    protected SupabaseAuthService $supabase;

    public function __construct(SupabaseAuthService $supabase)
    {
        $this->supabase = $supabase;
    }

    // =========================================================================
    // SHARED: Strong password rule used in signup + reset
    // =========================================================================

    /**
     * Returns the standard password validation rule used across all auth flows.
     * - Minimum 8 characters
     * - At least one uppercase letter
     * - At least one lowercase letter
     * - At least one number
     * - At least one symbol / special character
     * - Not a commonly known compromised password
     */
    protected function passwordRule(): Password
    {
        return Password::min(8)
            ->mixedCase()      // requires at least one upper + one lower
            ->numbers()        // requires at least one digit
            ->symbols()        // requires at least one special character
            ->uncompromised(); // rejects passwords found in known data breaches
    }

    // =========================================================================
    // SHOW PAGES
    // =========================================================================

    /**
     * Show login page.
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    /**
     * Show signup page.
     */
    public function showSignup()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.signup');
    }

    // =========================================================================
    // SIGNUP
    // =========================================================================

    /**
     * Handle email/password signup.
     *
     * Password requirements:
     *   - Minimum 8 characters
     *   - Mixed case (upper + lower)
     *   - At least one number
     *   - At least one symbol
     *   - Not a known compromised password
     */
    public function signup(Request $request)
    {
        $request->validate([
            'email'    => 'required|email|max:255',
            'password' => ['required', 'confirmed', $this->passwordRule()],
        ], [
            'password.min'          => 'Password must be at least 8 characters.',
            'password.mixed_case'   => 'Password must contain at least one uppercase and one lowercase letter.',
            'password.numbers'      => 'Password must contain at least one number.',
            'password.symbols'      => 'Password must contain at least one special character (e.g. @, #, !).',
            'password.uncompromised'=> 'This password has appeared in a data breach. Please choose a different one.',
            'password.confirmed'    => 'Passwords do not match.',
        ]);

        $existingUser = User::where('email', $request->input('email'))->first();
        if ($existingUser) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'An account with this email already exists. Please login instead.']);
        }

        $result = $this->supabase->signUp(
            $request->input('email'),
            $request->input('password')
        );

        if (!$result['success']) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => $result['error']]);
        }

        if ($result['success']) {
            Log::info('Supabase signup success', ['result' => $result]);

            $adminEmails = explode(',', getenv('MAIL_ADMIN_EMAILS'));

            try {
                Mail::to($adminEmails)->send(new NewUserRegistered($request->input('email')));
                Log::info('Admin email sent', ['emails' => $adminEmails]);
            } catch (\Exception $e) {
                Log::error('Failed to send admin email', [
                    'emails' => $adminEmails,
                    'error'  => $e->getMessage(),
                ]);
            }

            return redirect()->route('login')
                ->with('message', 'Please check your email to confirm your account.');
        }

        return redirect()->route('login')
            ->with('message', 'Your account has been created. Kindly verify your email to activate it.');
    }

    // =========================================================================
    // LOGIN / LOGOUT
    // =========================================================================

    /**
     * Handle email/password login.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $result = $this->supabase->signIn(
            $request->input('email'),
            $request->input('password')
        );

        if (!$result['success']) {
            return back()
                ->withInput()
                ->withErrors(['email' => $result['error']]);
        }

        $this->storeSession($result['data']);

        return redirect()->intended(route('dashboard'));
    }

    /**
     * Handle logout.
     */
    public function logout(Request $request)
    {
        $accessToken = Session::get('supabase_access_token');

        if ($accessToken) {
            $this->supabase->signOut($accessToken);
        }

        Auth::logout();
        Session::regenerateToken();

        return redirect()->route('home');
    }

    // =========================================================================
    // FORGOT / RESET PASSWORD
    // =========================================================================

    /**
     * Show forgot password page.
     */
    public function showForgotPassword()
    {
        Auth::logout();
        Session::regenerateToken();
        return view('auth.forgot-password');
    }

    /**
     * Send password reset email.
     */
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        try {
            $this->supabase->sendPasswordReset($request->email);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
        }

        return back()->with(
            'message',
            'If an account exists with that email, you will receive a password reset link.'
        );
    }

    /**
     * Show reset password form (linked from email).
     */
    public function showResetForm()
    {
        return view('auth.reset-password');
    }

    /**
     * Handle password reset submission.
     *
     * Uses the same password rule as signup for consistency.
     */
    public function resetPassword(Request $request, SupabaseAuthService $supabase)
    {
        $request->validate([
            'password' => ['required', 'confirmed', $this->passwordRule()],
        ], [
            'password.min'          => 'Password must be at least 8 characters.',
            'password.mixed_case'   => 'Password must contain at least one uppercase and one lowercase letter.',
            'password.numbers'      => 'Password must contain at least one number.',
            'password.symbols'      => 'Password must contain at least one special character (e.g. @, #, !).',
            'password.uncompromised'=> 'This password has appeared in a data breach. Please choose a different one.',
            'password.confirmed'    => 'Passwords do not match.',
        ]);

        $accessToken = $request->input('access_token') ?? session('reset_access_token');

        if (!$accessToken) {
            return redirect('/forgot-password')->with('error', 'Reset session expired. Please request a new reset link.');
        }

        $result = $supabase->updateUserPassword($accessToken, $request->password);

        if (!$result['success']) {
            return back()->withErrors(['password' => $result['error']]);
        }

        session()->forget('reset_access_token');

        return redirect()->route('login')->with('message', 'Password reset successfully. Please log in.');
    }

    // =========================================================================
    // EMAIL VERIFICATION
    // =========================================================================

    /**
     * Signup Email Verification.
     *
     * ✅ Do NOT call storeSession() here — email confirmation should NOT
     *    auto-login the user. User must manually login after verifying.
     */
    public function confirmEmail(Request $request)
    {
        $tokenHash = $request->query('token_hash');
        $type      = $request->query('type');

        $result = $this->supabase->verifyEmailToken($tokenHash, $type);

        if (!$result['success']) {
            return view('pages.signup-confirmed', [
                'success' => false,
                'message' => 'Verification failed or link expired.',
                'email'   => null,
            ]);
        }

        // Only sync user to local DB — do NOT Auth::login()
        if (isset($result['data']['user'])) {
            $this->supabase->syncUser($result['data']['user']);
        }

        return view('pages.signup-confirmed', [
            'success' => true,
            'message' => 'Your email has been verified successfully.',
            'email'   => $result['data']['user']['email'] ?? null,
        ]);
    }

    /**
     * Signup Email Verification Expired Notice.
     */
    public function verificationExpired()
    {
        return view('auth.verification-expired');
    }

    /**
     * Resend Signup Email Verification Email.
     */
    public function resendVerificationEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $response = Http::withHeaders([
            'apikey'       => config('services.supabase.key'),
            'Content-Type' => 'application/json',
        ])->post(config('services.supabase.url') . '/auth/v1/resend', [
            'type'  => 'signup',
            'email' => $request->email,
        ]);

        if ($response->successful()) {
            return back()->with('success', 'Verification email sent successfully.');
        }

        return back()->withErrors(['error' => 'Unable to resend verification email.']);
    }

    // =========================================================================
    // PASSWORD RESET TOKEN CONFIRMATION
    // =========================================================================

    /**
     * Confirm Password Reset via token_hash (Supabase email link).
     *
     * ✅ Only stores the reset token in session — does NOT call
     *    storeSession() or Auth::login().
     */
    public function confirmPasswordReset(Request $request, SupabaseAuthService $supabase)
    {
        $tokenHash = $request->query('token_hash');

        if (!$tokenHash) {
            return redirect('/forgot-password')->with('error', 'Invalid reset link.');
        }

        $result = $supabase->verifyEmailToken($tokenHash, 'recovery');

        if (!$result['success']) {
            return redirect('/forgot-password')->with('error', 'Reset link expired. Please request a new one.');
        }

        // Support both session structures Supabase may return
        $accessToken = $result['data']['session']['access_token']
            ?? $result['data']['access_token']
            ?? null;

        if (!$accessToken) {
            return redirect('/forgot-password')->with('error', 'Invalid reset session.');
        }

        session(['reset_access_token' => $accessToken]);
        session()->save();

        return redirect()->route('password.reset');
    }

    /**
     * Confirm Password Reset via raw access_token query param.
     */
    public function confirmPasswordResetFromToken(Request $request)
    {
        $accessToken = $request->query('access_token');

        Log::info('Reset token received: ' . ($accessToken ? 'YES – ' . substr($accessToken, 0, 20) . '...' : 'NO'));

        if (!$accessToken) {
            return redirect('/forgot-password')->with('error', 'Invalid reset link.');
        }

        session(['reset_access_token' => $accessToken]);
        session()->save();

        Log::info('Session after save: ' . (session('reset_access_token') ? 'SET' : 'NOT SET'));

        return redirect()->route('password.reset');
    }

    // =========================================================================
    // PRIVATE: Store Supabase session + sync local user
    // =========================================================================

    /**
     * Store Supabase session data in Laravel session and log the user in.
     */
    protected function storeSession(array $data): void
    {
        if (isset($data['session'])) {
            Session::put('supabase_access_token', $data['session']['access_token']);
            Session::put('supabase_refresh_token', $data['session']['refresh_token']);
        } elseif (isset($data['access_token'])) {
            Session::put('supabase_access_token', $data['access_token']);
            Session::put('supabase_refresh_token', $data['refresh_token'] ?? null);
        }

        if (isset($data['user'])) {
            $user = $this->supabase->syncUser($data['user']);
            Auth::login($user);
        }
    }
}