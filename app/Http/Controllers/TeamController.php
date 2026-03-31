<?php

namespace App\Http\Controllers;

use App\Mail\TeamInvitationMail;
use App\Models\TeamInvitation;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['showAccept']);
    }

    // ── TEAM SETTINGS PAGE ────────────────────────────────────
    public function index(Request $request): View
    {
        $user = $request->user();

        $members = $user->teamMembers()
            ->with('member')
            ->latest()
            ->get();

        $pendingInvitations = TeamInvitation::where('workspace_owner_id', $user->id)
            ->where('status', 'pending')
            ->where('expires_at', '>', now())
            ->latest()
            ->get();

        $limit        = $user->teamMembersLimit();
        $currentCount = $user->currentTeamMembersCount();
        $canAdd       = $user->canAddTeamMember();
        $remaining    = $limit === -1 ? -1 : max(0, $limit - $currentCount);

        return view('team.index', compact(
            'user', 'members', 'pendingInvitations',
            'limit', 'currentCount', 'canAdd', 'remaining'
        ));
    }

    // ── SEND INVITATION ───────────────────────────────────────
    public function invite(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'role'  => 'required|in:viewer,editor,admin',
        ]);

        $user  = $request->user();
        $email = strtolower(trim($request->input('email')));
        $role  = $request->input('role');

        if (! $user->canAddTeamMember()) {
            $limit = $user->teamMembersLimit();
            return back()->with('error',
                "You've reached your team member limit ({$limit}). Upgrade your plan to add more members."
            );
        }

        if ($email === strtolower($user->email)) {
            return back()->with('error', 'You cannot invite yourself.');
        }

        $existingMember = User::where('email', $email)->first();
        if ($existingMember && $user->teamMembers()->where('member_user_id', $existingMember->id)->exists()) {
            return back()->with('error', "{$email} is already a member of your workspace.");
        }

        $existingInvite = TeamInvitation::where('workspace_owner_id', $user->id)
            ->where('invitee_email', $email)
            ->where('status', 'pending')
            ->where('expires_at', '>', now())
            ->first();

        if ($existingInvite) {
            return back()->with('error', "{$email} already has a pending invitation. You can resend it below.");
        }

        $invitation = TeamInvitation::create([
            'workspace_owner_id' => $user->id,
            'invitee_email'      => $email,
            'invitee_user_id'    => $existingMember?->id,
            'role'               => $role,
            'token'              => Str::random(64),
            'status'             => 'pending',
            'expires_at'         => now()->addDays(7),
        ]);

        try {
            Mail::to($email)->send(new TeamInvitationMail($invitation));
            Log::info("Team invitation sent to {$email} by user {$user->id}");
        } catch (\Exception $e) {
            Log::error("Failed to send team invitation email: " . $e->getMessage());
        }

        return back()->with('success', "Invitation sent to {$email}. They have 7 days to accept.");
    }

    // ── RESEND INVITATION ─────────────────────────────────────
    public function resendInvitation(Request $request, TeamInvitation $invitation): RedirectResponse
    {
        $user = $request->user();

        if ($invitation->workspace_owner_id !== $user->id) {
            return back()->with('error', 'Unauthorized.');
        }

        $invitation->update([
            'token'      => Str::random(64),
            'expires_at' => now()->addDays(7),
            'status'     => 'pending',
        ]);

        try {
            Mail::to($invitation->invitee_email)->send(new TeamInvitationMail($invitation));
        } catch (\Exception $e) {
            Log::error("Failed to resend invitation: " . $e->getMessage());
        }

        return back()->with('success', "Invitation resent to {$invitation->invitee_email}.");
    }

    // ── CANCEL INVITATION ─────────────────────────────────────
    public function cancelInvitation(Request $request, TeamInvitation $invitation): RedirectResponse
    {
        $user = $request->user();
 
        if (! $user) {
            return redirect()->route('login')->with('error', 'Please log in to continue.');
        }
 
        if ($invitation->workspace_owner_id !== $user->id) {
            return back()->with('error', 'Unauthorized.');
        }
 
        $invitation->update(['status' => 'declined']);
 
        return back()->with('success', 'Invitation cancelled.');
    }

    // ── SHOW ACCEPT PAGE (no auth required) ──────────────────
    // public function showAccept(string $token): View|RedirectResponse
    // {
    //     $invitation = TeamInvitation::where('token', $token)->first();

    //     if (! $invitation) {
    //         return redirect()->route('login')->with('error', 'Invalid invitation link.');
    //     }

    //     if ($invitation->isExpired()) {
    //         $invitation->update(['status' => 'expired']);
    //         return redirect()->route('login')->with('error', 'This invitation has expired. Ask the workspace owner to resend it.');
    //     }

    //     if ($invitation->isAccepted()) {
    //         return auth()->check()
    //             ? redirect()->route('dashboard')->with('info', 'You have already accepted this invitation.')
    //             : redirect()->route('login')->with('info', 'This invitation has already been accepted.');
    //     }

    //     // ── Not logged in ─────────────────────────────────────
    //     if (! auth()->check()) {
    //         session(['team_invite_token' => $token]);

    //         $hasAccount = User::where('email', $invitation->invitee_email)->exists();

    //         if ($hasAccount) {
    //             return redirect()->route('login')
    //                 ->with('info', "Please sign in with {$invitation->invitee_email} to accept the team invitation.");
    //         } else {
    //             return redirect()->route('signup')
    //                 ->with('info', "Create a free account using {$invitation->invitee_email} to accept the team invitation.");
    //         }
    //     }

    //     $user = auth()->user();

    //     // ── Wrong account logged in ───────────────────────────
    //     $wrongAccount = strtolower($user->email) !== strtolower($invitation->invitee_email);

    //     return view('team.accept', [
    //         'invitation'   => $invitation,
    //         'wrongAccount' => $wrongAccount,
    //         'currentEmail' => $user->email,
    //     ]);
    // }

    // ── SHOW ACCEPT PAGE (no auth required) ──────────────────
    public function showAccept(string $token): View|RedirectResponse
    {
        $invitation = TeamInvitation::where('token', $token)->first();

        if (! $invitation) {
            return redirect()->route('login')->with('error', 'Invalid invitation link.');
        }

        if ($invitation->isExpired()) {
            $invitation->update(['status' => 'expired']);
            return redirect()->route('login')->with('error', 'This invitation has expired. Ask the workspace owner to resend it.');
        }

        if ($invitation->isAccepted()) {
            return auth()->check()
                ? redirect()->route('dashboard')->with('info', 'You have already accepted this invitation.')
                : redirect()->route('login')->with('info', 'This invitation has already been accepted.');
        }

        // ── Not logged in ─────────────────────────────────────
        if (! auth()->check()) {
            // Store the accept page as Laravel's "intended" URL.
            // redirect()->intended() in your login controller reads exactly this
            // session key, so after a successful login the user lands straight
            // back on the accept page — no need to touch the login controller.
            session(['url.intended' => route('team.accept', ['token' => $token])]);

            // Keep the token as a fallback for signup flows or custom login controllers
            session(['team_invite_token' => $token]);

            $hasAccount = User::where('email', $invitation->invitee_email)->exists();

            if ($hasAccount) {
                return redirect()->route('login')
                    ->with('info', "Please sign in with {$invitation->invitee_email} to accept the team invitation.");
            } else {
                return redirect()->route('signup')
                    ->with('info', "Create a free account using {$invitation->invitee_email} to accept the team invitation.");
            }
        }

        $user = auth()->user();

        // ── Wrong account logged in ───────────────────────────
        $wrongAccount = strtolower($user->email) !== strtolower($invitation->invitee_email);

        return view('team.accept', [
            'invitation'   => $invitation,
            'wrongAccount' => $wrongAccount,
            'currentEmail' => $user->email,
        ]);
    }

    // ── ACCEPT INVITATION ─────────────────────────────────────
    public function acceptInvitation(Request $request, string $token): RedirectResponse
    {
        $user       = $request->user();
        $invitation = TeamInvitation::where('token', $token)->first();

        if (! $invitation) {
            return redirect()->route('dashboard')->with('error', 'Invalid invitation link.');
        }

        if ($invitation->isExpired()) {
            $invitation->update(['status' => 'expired']);
            return redirect()->route('dashboard')->with('error', 'This invitation has expired.');
        }

        if (strtolower($user->email) !== strtolower($invitation->invitee_email)) {
            return redirect()->route('dashboard')->with('error',
                'This invitation was sent to ' . $invitation->invitee_email . '. Please sign in with that account.'
            );
        }

        if (TeamMember::where('workspace_owner_id', $invitation->workspace_owner_id)
            ->where('member_user_id', $user->id)
            ->exists()
        ) {
            $invitation->update(['status' => 'accepted']);
            return redirect()->route('dashboard')->with('info', 'You are already a member of this workspace.');
        }

        $owner = $invitation->owner;
        if ($owner && ! $owner->canAddTeamMember()) {
            return redirect()->route('dashboard')->with('error',
                'The workspace owner has reached their team member limit. Please ask them to upgrade their plan.'
            );
        }

        TeamMember::create([
            'workspace_owner_id' => $invitation->workspace_owner_id,
            'member_user_id'     => $user->id,
            'role'               => $invitation->role,
            'joined_at'          => now(),
        ]);

        $invitation->update([
            'status'          => 'accepted',
            'invitee_user_id' => $user->id,
        ]);

        Log::info("Team invitation accepted: user {$user->id} joined workspace {$invitation->workspace_owner_id}");

        session(['active_workspace' => $invitation->workspace_owner_id]);

        return redirect()->route('dashboard')->with('success',
            "You've joined " . ($owner?->name ?? $owner?->email ?? 'the') . "'s workspace!"
        );
    }

    // ── DECLINE INVITATION ────────────────────────────────────
    public function declineInvitation(Request $request, string $token): RedirectResponse
    {
        $invitation = TeamInvitation::where('token', $token)->first();

        if ($invitation && $invitation->isPending()) {
            $invitation->update(['status' => 'declined']);
        }

        return redirect()->route('dashboard')->with('info', 'Invitation declined.');
    }

    // ── UPDATE MEMBER ROLE ────────────────────────────────────
    public function updateRole(Request $request, TeamMember $member): RedirectResponse
    {
        $request->validate(['role' => 'required|in:viewer,editor,admin']);

        $user = $request->user();

        if ($member->workspace_owner_id !== $user->id) {
            return back()->with('error', 'Unauthorized.');
        }

        $member->update(['role' => $request->input('role')]);

        return back()->with('success', 'Member role updated.');
    }

    // ── REMOVE MEMBER ─────────────────────────────────────────
    public function removeMember(Request $request, TeamMember $member): RedirectResponse
    {
        $user = $request->user();

        if ($member->workspace_owner_id === $user->id) {
            $memberEmail = $member->member->email ?? 'Member';
            $member->delete();
            return back()->with('success', "{$memberEmail} has been removed from your workspace.");
        }

        if ($member->member_user_id === $user->id) {
            $member->delete();
            session(['active_workspace' => $user->id]);
            return redirect()->route('dashboard')->with('success', "You've left the workspace.");
        }

        return back()->with('error', 'Unauthorized.');
    }

    // ── SWITCH WORKSPACE ──────────────────────────────────────
    public function switchWorkspace(Request $request): RedirectResponse
    {
        $request->validate(['workspace_owner_id' => 'required|string']);

        $user        = $request->user();
        $targetOwner = $request->input('workspace_owner_id');

        if ($targetOwner !== $user->id
            && ! $user->memberOf()->where('workspace_owner_id', $targetOwner)->exists()
        ) {
            return back()->with('error', 'You are not a member of that workspace.');
        }

        session(['active_workspace' => $targetOwner]);

        return redirect()->route('dashboard')->with('success', 'Workspace switched.');
    }
}