<?php

namespace App\Http\Middleware;

use App\Models\TeamMember;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class SetActiveWorkspace
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $user    = auth()->user();
            $ownerId = $user->id;

            // ── Auto-set workspace on first login ─────────────────────────────
            // If no workspace in session yet, check if user is a team member
            // somewhere and default to that workspace automatically.
            if (! session()->has('active_workspace')) {
                $membership = TeamMember::where('member_user_id', $user->id)->first();
                session([
                    'active_workspace' => $membership
                        ? $membership->workspace_owner_id  // default to first workspace they joined
                        : $user->id                        // or their own
                ]);
            }

            $activeWorkspace = session('active_workspace', $user->id);

            // ── Validate the stored workspace ─────────────────────────────────
            // User may have been removed from the workspace since last session
            if ($activeWorkspace !== $user->id) {
                $stillMember = TeamMember::where('workspace_owner_id', $activeWorkspace)
                    ->where('member_user_id', $user->id)
                    ->exists();

                if (! $stillMember) {
                    // Removed from workspace — fall back to own workspace
                    session(['active_workspace' => $user->id]);
                    $activeWorkspace = $user->id;
                }
            }

            // ── Share with all views ──────────────────────────────────────────
            view()->share('activeWorkspaceOwnerId', $activeWorkspace);
            view()->share('isOwnWorkspace', $activeWorkspace === $user->id);

            if ($activeWorkspace !== $user->id) {
                // In someone else's workspace — share role and member record
                $teamMemberRecord = TeamMember::where('workspace_owner_id', $activeWorkspace)
                    ->where('member_user_id', $user->id)
                    ->first();

                $role = $teamMemberRecord?->role ?? 'viewer';

                view()->share('currentTeamRole', $role);
                view()->share('currentTeamMember', $teamMemberRecord);

                // Share the workspace owner so views can show "Viewing: Owner's workspace"
                $workspaceOwner = User::find($activeWorkspace);
                view()->share('workspaceOwner', $workspaceOwner);

                // Share permission flags directly to views
                view()->share('canCreateForm', in_array($role, ['admin', 'editor']));
                view()->share('canEditForm',   in_array($role, ['admin', 'editor']));
                view()->share('canDeleteForm', in_array($role, ['admin']));
                view()->share('canManageTeam', in_array($role, ['admin']));
                view()->share('canBilling',    false); // team members never access billing
            } else {
                // In own workspace — full owner permissions
                view()->share('currentTeamRole', 'owner');
                view()->share('currentTeamMember', null);
                view()->share('workspaceOwner', $user);
                view()->share('canCreateForm', true);
                view()->share('canEditForm',   true);
                view()->share('canDeleteForm', true);
                view()->share('canManageTeam', true);
                view()->share('canBilling',    true);
            }

            // ── Share all workspaces available to this user (for switcher) ────
            $availableWorkspaces = TeamMember::where('member_user_id', $user->id)
                ->with('owner')
                ->get()
                ->map(fn($m) => [
                    'id'    => $m->workspace_owner_id,
                    'name'  => $m->owner?->name ?? $m->owner?->email ?? 'Unknown',
                    'role'  => $m->role,
                    'email' => $m->owner?->email,
                ]);

            view()->share('availableWorkspaces', $availableWorkspaces);
            view()->share('totalWorkspaces', $availableWorkspaces->count() + 1); // +1 for own
        }

        return $next($request);
    }
}