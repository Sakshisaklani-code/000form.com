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
            ->mixedCase()
            ->numbers()
            ->symbols()
            ->uncompromised();
    }

    // =========================================================================
    // SHOW PAGES
    // =========================================================================

    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

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
     * Now also collects the user's name.
     */
    public function signup(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|max:255',
            'password' => ['required', 'confirmed', $this->passwordRule()],
        ], [
            'name.required'          => 'Please enter your name.',
            'name.max'               => 'Name may not exceed 100 characters.',
            'password.min'           => 'Password must be at least 8 characters.',
            'password.mixed_case'    => 'Password must contain at least one uppercase and one lowercase letter.',
            'password.numbers'       => 'Password must contain at least one number.',
            'password.symbols'       => 'Password must contain at least one special character (e.g. @, #, !).',
            'password.uncompromised' => 'This password has appeared in a data breach. Please choose a different one.',
            'password.confirmed'     => 'Passwords do not match.',
        ]);

        $existingUser = User::where('email', $request->input('email'))->first();
        if ($existingUser) {
            return back()
                ->withInput($request->only('email', 'name'))
                ->withErrors(['email' => 'An account with this email already exists. Please login instead.']);
        }

        $result = $this->supabase->signUp(
            $request->input('email'),
            $request->input('password')
        );

        if (!$result['success']) {
            return back()
                ->withInput($request->only('email', 'name'))
                ->withErrors(['email' => $result['error']]);
        }

        // Persist name on the local User record if it already exists (syncUser may
        // have created it); otherwise it will be set when syncUser runs later.
        User::where('email', $request->input('email'))
            ->update(['name' => $request->input('name')]);

        Log::info('Supabase signup success', ['result' => $result]);

        $adminEmails = explode(',', getenv('MAIL_ADMIN_EMAILS'));

        try {
            Mail::to($adminEmails)->send(new NewUserRegistered(
                userEmail:  $request->input('email'),
                userName:   $request->input('name'),
                authMethod: 'email',
            ));
            Log::info('Admin notification sent', ['emails' => $adminEmails]);
        } catch (\Exception $e) {
            Log::error('Failed to send admin email', [
                'emails' => $adminEmails,
                'error'  => $e->getMessage(),
            ]);
        }

        return redirect()->route('login')
            ->with('message', 'Please check your email to confirm your account.');
    }

    // =========================================================================
    // LOGIN / LOGOUT
    // =========================================================================

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

    public function showForgotPassword()
    {
        Auth::logout();
        Session::regenerateToken();
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

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

    public function showResetForm()
    {
        return view('auth.reset-password');
    }

    public function resetPassword(Request $request, SupabaseAuthService $supabase)
    {
        $request->validate([
            'password' => ['required', 'confirmed', $this->passwordRule()],
        ], [
            'password.min'           => 'Password must be at least 8 characters.',
            'password.mixed_case'    => 'Password must contain at least one uppercase and one lowercase letter.',
            'password.numbers'       => 'Password must contain at least one number.',
            'password.symbols'       => 'Password must contain at least one special character (e.g. @, #, !).',
            'password.uncompromised' => 'This password has appeared in a data breach. Please choose a different one.',
            'password.confirmed'     => 'Passwords do not match.',
        ]);

        $accessToken = $request->input('access_token') ?? session('reset_access_token');

        if (!$accessToken) {
            return redirect('/forgot-password')
                ->with('error', 'Reset session expired. Please request a new reset link.');
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

        if (isset($result['data']['user'])) {
            $this->supabase->syncUser($result['data']['user']);
        }

        return view('pages.signup-confirmed', [
            'success' => true,
            'message' => 'Your email has been verified successfully.',
            'email'   => $result['data']['user']['email'] ?? null,
        ]);
    }

    public function verificationExpired()
    {
        return view('auth.verification-expired');
    }

    public function resendVerificationEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

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

    public function confirmPasswordReset(Request $request, SupabaseAuthService $supabase)
    {
        $tokenHash = $request->query('token_hash');

        if (!$tokenHash) {
            return redirect('/forgot-password')->with('error', 'Invalid reset link.');
        }

        $result = $supabase->verifyEmailToken($tokenHash, 'recovery');

        if (!$result['success']) {
            return redirect('/forgot-password')
                ->with('error', 'Reset link expired. Please request a new one.');
        }

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

    public function confirmPasswordResetFromToken(Request $request)
    {
        $accessToken = $request->query('access_token');

        Log::info('Reset token received: ' . ($accessToken ? 'YES – ' . substr($accessToken, 0, 20) . '...' : 'NO'));

        if (!$accessToken) {
            return redirect('/forgot-password')->with('error', 'Invalid reset link.');
        }

        session(['reset_access_token' => $accessToken]);
        session()->save();

        return redirect()->route('password.reset');
    }

    // =========================================================================
    // PRIVATE: Store Supabase session + sync local user
    // =========================================================================

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