<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\SupabaseAuthService;

class AccountController extends Controller
{
    protected SupabaseAuthService $supabase;

    public function __construct(SupabaseAuthService $supabase)
    {
        $this->supabase = $supabase;
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();

        $result = $this->supabase->updateLoggedInUserPassword(
            $user->email,
            $request->current_password,
            $request->password
        );

        if (!$result['success']) {
            return back()->withErrors(['current_password' => $result['error']]);
        }

        return back()->with('success', 'Password updated successfully.');
    }
    
}