{{-- ============================================================ --}}
{{-- WORKSPACE SWITCHER COMPONENT --}}
{{-- Include this in your sidebar/navbar blade layout --}}
{{-- resources/views/components/workspace-switcher.blade.php --}}
{{-- ============================================================ --}}

@auth
@if($totalWorkspaces > 1)
<div class="workspace-switcher" x-data="{ open: false }">

    {{-- Current workspace indicator --}}
    <button @click="open = !open" class="workspace-btn">
        @if($isOwnWorkspace)
            <span class="workspace-label">My Account</span>
        @else
            <span class="workspace-label">
                {{ $workspaceOwner?->name ?? $workspaceOwner?->email ?? 'Workspace' }}
                <span class="role-badge">{{ ucfirst($currentTeamRole) }}</span>
            </span>
        @endif
        <svg class="chevron" ...></svg>
    </button>

    {{-- Dropdown --}}
    <div x-show="open" class="workspace-dropdown">

        {{-- Own workspace --}}
        <form method="POST" action="{{ route('team.switch') }}">
            @csrf
            <input type="hidden" name="workspace_owner_id" value="{{ auth()->id() }}">
            <button type="submit" class="workspace-option {{ $isOwnWorkspace ? 'active' : '' }}">
                My Account
                @if($isOwnWorkspace) <span class="current-badge">Current</span> @endif
            </button>
        </form>

        {{-- Other workspaces --}}
        @foreach($availableWorkspaces as $workspace)
        <form method="POST" action="{{ route('team.switch') }}">
            @csrf
            <input type="hidden" name="workspace_owner_id" value="{{ $workspace['id'] }}">
            <button type="submit" class="workspace-option {{ $activeWorkspaceOwnerId === $workspace['id'] ? 'active' : '' }}">
                {{ $workspace['name'] }}
                <span class="role-badge">{{ ucfirst($workspace['role']) }}</span>
                @if($activeWorkspaceOwnerId === $workspace['id'])
                    <span class="current-badge">Current</span>
                @endif
            </button>
        </form>
        @endforeach

    </div>
</div>
@endif
@endauth


{{-- ============================================================ --}}
{{-- PERMISSION GUARDS — use these in your blade views --}}
{{-- ============================================================ --}}

{{-- Show "New Form" button only if user can create --}}
@if($canCreateForm)
    <a href="{{ route('dashboard.forms.create') }}" class="btn-primary">New Form</a>
@endif

{{-- Show edit button only if user can edit --}}
@if($canEditForm)
    <a href="{{ route('dashboard.forms.edit', $form->id) }}">Edit</a>
@endif

{{-- Show delete button only if user can delete --}}
@if($canDeleteForm)
    <form method="POST" action="{{ route('dashboard.forms.delete', $form->id) }}">
        @csrf @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endif

{{-- Show Team Management link only if can manage team --}}
@if($canManageTeam)
    <a href="{{ route('team.index') }}">Team Management</a>
@endif

{{-- Show Billing link only for workspace owner --}}
@if($canBilling)
    <a href="{{ route('billing') }}">Plan & Subscriptions</a>
@endif

{{-- Show workspace banner when viewing someone else's workspace --}}
@if(!$isOwnWorkspace)
<div class="workspace-banner">
    Viewing <strong>{{ $workspaceOwner?->name ?? $workspaceOwner?->email }}'s</strong> workspace
    as <strong>{{ ucfirst($currentTeamRole) }}</strong>
</div>
@endif