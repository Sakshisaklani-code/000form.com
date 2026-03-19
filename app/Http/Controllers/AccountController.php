<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Services\SupabaseAuthService;
use App\Models\Subscription;

class AccountController extends Controller
{
    protected SupabaseAuthService $supabase;

    public function __construct(SupabaseAuthService $supabase)
    {
        $this->supabase = $supabase;
    }

    // ── UPDATE PASSWORD ───────────────────────────────────────────
    // 1. Verify current password via Supabase signIn
    // 2. Update via Supabase Auth API using the access token
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password'         => ['required', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();

        // OAuth users (Google etc) have no password — block this flow
        if ($user->provider !== 'email') {
            return back()->withErrors([
                'current_password' => 'Password update is not available for '
                    . ucfirst($user->provider) . ' accounts.',
            ]);
        }

        $result = $this->supabase->updateLoggedInUserPassword(
            $user->email,
            $request->current_password,
            $request->password
        );

        if (! $result['success']) {
            return back()->withErrors(['current_password' => $result['error']]);
        }

        return back()->with('success', 'Password updated successfully.');
    }

    // ── DELETE ACCOUNT ────────────────────────────────────────────
    // 1. Cancel active Paddle subscription
    // 2. Logout user
    // 3. Soft delete in local DB (sets deleted_at, scrambles email)
    // 4. Hard delete from Supabase Auth via Admin API
    // 5. Redirect to home
    public function deleteAccount(Request $request)
    {
        $user      = Auth::user();
        $userId    = $user->id;
        $userEmail = $user->email;

        try {

            // ── Step 1: Cancel Paddle subscription ────────────────
            $subscription = Subscription::where('user_id', $userId)
                ->whereIn('status', ['active', 'trialing'])
                ->where('cancel_at_period_end', false)
                ->first();

            if ($subscription) {
                if ($subscription->paddle_subscription_id) {
                    try {
                        $user->subscription('default')->cancel();
                    } catch (\Exception $e) {
                        Log::warning("Paddle cancel on delete failed: " . $e->getMessage());
                    }
                }

                $subscription->update([
                    'status'               => 'cancelled',
                    'cancel_at_period_end' => true,
                    'cancelled_at'         => now(),
                ]);
            }

            // ── Step 2: Logout immediately ────────────────────────
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // ── Step 3: Soft delete in local DB ──────────────────
            // Scramble email so it can't be used to re-register
            // deleted_at set by SoftDeletes — user is invisible to all queries
            \App\Models\User::withoutGlobalScopes()->where('id', $userId)->update([
                'deleted_at' => now(),
                'email'      => 'deleted_' . now()->timestamp . '_' . $userEmail,
            ]);

            // ── Step 4: Hard delete from Supabase Auth ────────────
            // Requires service_role key (not anon key)
            // This prevents the user from logging back in via Supabase
            $supabaseUrl        = config('supabase.url');
            $supabaseServiceKey = config('supabase.service_key');

            if ($supabaseUrl && $supabaseServiceKey) {
                try {
                    $response = Http::withHeaders([
                        'apikey'        => $supabaseServiceKey,
                        'Authorization' => 'Bearer ' . $supabaseServiceKey,
                        'Content-Type'  => 'application/json',
                    ])->delete("{$supabaseUrl}/auth/v1/admin/users/{$userId}");

                    if ($response->successful()) {
                        Log::info("User {$userId} deleted from Supabase Auth");
                    } else {
                        Log::warning("Supabase delete failed for {$userId}: " . $response->body());
                    }
                } catch (\Exception $e) {
                    Log::error("Supabase admin delete error: " . $e->getMessage());
                }
            }

            Log::info("Account permanently deleted: {$userId} ({$userEmail})");

            return redirect('/')->with('success', 'Your account has been permanently deleted.');

        } catch (\Exception $e) {
            Log::error("Account delete error for {$userId}: " . $e->getMessage());
            return redirect()->route('account.settings')
                ->with('error', 'Something went wrong. Please try again.');
        }
    }
}