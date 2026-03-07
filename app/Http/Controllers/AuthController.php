<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\SupabaseAuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected SupabaseAuthService $supabase;

    public function __construct(SupabaseAuthService $supabase)
    {
        $this->supabase = $supabase;
    }

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

    /**
     * Handle email/password signup.
     */
    public function signup(Request $request)
    {
        $request->validate([
            'email'    => 'required|email|max:255',
            'password' => 'required|min:8|confirmed',
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

        if (isset($result['data']['user'])) {
            return redirect()->route('login')
                ->with('message', 'Please check your email to confirm your account.');
        }

        return redirect()->route('login')
            ->with('message', 'Your account has been created. Kindly verify your email to activate it.');
    }

    /**
     * Handle email/password login.
    */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
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
        Session::invalidate();
        Session::regenerateToken();

        return redirect()->route('home');
    }

    /**
     * Show forgot password page.
    */
    public function showForgotPassword()
    {
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

        $result = $this->supabase->sendPasswordReset($request->input('email'));

        // Always show success to prevent email enumeration
        return back()->with('message', 'If an account exists with that email, you will receive a password reset link.');
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
    */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'access_token' => 'required',
            'password'     => 'required|min:8|confirmed',
        ]);

        $result = $this->supabase->updateUserPassword(
            $request->input('access_token'),
            $request->input('password')
        );

        if (!$result['success']) {
            return back()->withErrors(['password' => $result['error'] ?? 'Failed to reset password.']);
        }

        return redirect()->route('login')
            ->with('message', 'Password reset successfully. Please log in.');
    }

    /**
     * Store Supabase session data.
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

    /**
     * Signup Email Verification.
    */
    public function confirmEmail(Request $request)
    {
        $tokenHash = $request->query('token_hash');
        $type = $request->query('type');

        $result = $this->supabase->verifyEmailToken($tokenHash, $type);

        if (!$result['success']) {
            return view('pages.signup-confirmed', [
                'success' => false,
                'message' => 'Verification failed or link expired.',
                'email' => null
            ]);
        }

        $this->storeSession($result['data']);

        return view('pages.signup-confirmed', [
            'success' => true,
            'message' => 'Your email has been verified successfully.',
            'email' => $result['data']['user']['email'] ?? null
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
            'email' => 'required|email'
        ]);

        $response = Http::withHeaders([
            'apikey' => config('services.supabase.key'),
            'Content-Type' => 'application/json'
        ])->post(config('services.supabase.url') . '/auth/v1/resend', [
            'type' => 'signup',
            'email' => $request->email
        ]);

        if ($response->successful()) {
            return back()->with('success', 'Verification email sent successfully.');
        }

        return back()->withErrors(['error' => 'Unable to resend verification email.']);
    }

}
