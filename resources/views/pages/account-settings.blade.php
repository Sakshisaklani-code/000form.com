@extends('layouts.dashboard')

@section('title', 'Account & Team - 000form')

@section('content')

<style>
    /* Reuse SAME design system from billing page */

    .ap {
        padding: 6rem 2rem 3rem;
        max-width: 1100px;
        margin: 0 auto;
        color: #eee;
        font-family: 'Inter', sans-serif;
    }

    .ap-header {
        margin-bottom: 2.5rem;
    }

    .ap-header h1 {
        font-size: 2rem;
        font-weight: 700;
        letter-spacing: -0.02em;
        margin-bottom: 0.4rem;
        color: #fff;
    }

    .ap-header p {
        color: #aaa;
        font-size: 0.95rem;
    }

    .ap-card {
        background: #121212;
        border: 1px solid #333;
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 1.5rem;
    }

    .ap-card-title {
        font-size: 0.7rem;
        font-family: 'Courier New', Courier, monospace;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: #666;
        margin-bottom: 1.5rem;
    }

    .ap-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px,1fr));
        gap: 1.25rem;
    }

    .ap-label {
        font-size: 0.7rem;
        font-family: 'Courier New', Courier, monospace;
        text-transform: uppercase;
        color: #666;
        margin-bottom: 0.4rem;
        letter-spacing: 0.05em;
    }

    .ap-value {
        font-size: 0.95rem;
        font-weight: 600;
        color: #0fda87;
        word-break: break-word;
    }

    .ap-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.7rem 1.2rem;
        border-radius: 10px;
        font-size: 0.85rem;
        font-weight: 600;
        cursor: pointer;
        border: none;
        text-decoration: none;
        user-select: none;
        transition: background-color 0.2s ease, color 0.2s ease;
    }

    .ap-btn-primary {
        background: #0fda87;
        color: #121212;
    }

    .ap-btn-primary:hover {
        background: #0bc671;
    }

    .ap-btn-outline {
        border: 1px solid #444;
        color: #eee;
        background: transparent;
    }

    .ap-btn-outline:hover {
        background: #222;
        border-color: #0fda87;
        color: #0fda87;
    }

    .ap-btn-danger {
        border: 1px solid rgba(255, 68, 68, 0.4);
        color: #ff6b6b;
        background: transparent;
    }

    .ap-btn-danger:hover {
        background: rgba(255, 68, 68, 0.1);
        border-color: #ff6b6b;
        color: #ff6b6b;
    }

    .ap-table {
        width: 100%;
        border-collapse: collapse;
    }

    .ap-table th {
        font-size: 0.7rem;
        text-transform: uppercase;
        color: #666;
        text-align: left;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid #333;
    }

    .ap-table td {
        padding: 1rem 0;
        border-bottom: 1px solid #333;
        font-size: 0.9rem;
        color: #aaa;
        word-break: break-word;
    }

    .ap-empty {
        text-align: center;
        padding: 2rem;
        color: #666;
        font-style: italic;
    }


    /* Modal overlay: full screen semi-transparent background */
    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.75);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
        font-family: 'Inter', sans-serif;
    }

    /* Modal content container */
    .modal-content {
        background: #121212;
        border-radius: 16px;
        padding: 2.5rem 2rem;
        width: 100%;
        max-width: 420px;
        box-shadow: 0 8px 24px rgb(0 0 0 / 0.9);
        color: #eee;
    }

    /* Modal header */
    .modal-content h2 {
        font-weight: 800;
        font-size: 2rem;
        margin-bottom: 2rem;
        letter-spacing: -0.02em;
    }

    /* Label style */
    .modal-label {
        display: block;
        font-family: 'Courier New', Courier, monospace;
        font-size: 0.75rem;
        color: #bbb;
        text-transform: uppercase;
        margin-bottom: 0.4rem;
        letter-spacing: 0.05em;
    }

    /* Input style */
    .modal-input {
        width: 100%;
        padding: 0.6rem 1rem;
        border-radius: 8px;
        border: 1px solid #333;
        background: #222;
        color: #eee;
        font-size: 1rem;
        margin-bottom: 0.4rem;
        transition: border-color 0.2s ease;
    }

    .modal-input:focus {
        outline: none;
        border-color: #0fda87;
        background: #1a1a1a;
    }

    /* Show/hide toggle container */
    .password-toggle-container {
        position: relative;
        margin-bottom: 1rem;
    }

    /* Show/hide toggle button */
    .toggle-password-btn {
        position: absolute;
        right: 1rem;
        top: 65%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #0fda87;
        font-weight: 600;
        cursor: pointer;
        font-size: 0.75rem;
        padding: 0;
        user-select: none;
    }

    /* Buttons container */
    .modal-actions {
        display: flex;
        justify-content: flex-end;
        gap: 0.75rem;
        margin-top: 0.5rem;
    }

    /* Cancel button */
    .btn-cancel {
        background: #444;
        color: #ccc;
        border: none;
        padding: 0.7rem 1.3rem;
        border-radius: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s ease;
    }

    .btn-cancel:hover {
        background: #555;
    }

    /* Primary button */
    .btn-primary {
        background: #0fda87;
        color: #121212;
        border: none;
        padding: 0.7rem 1.5rem;
        border-radius: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: background 0.2s ease;
    }

    .btn-primary:hover {
        background: #0bc671;
    }
</style>

<div class="ap">

    {{-- HEADER --}}
    <div class="ap-header">
        <h1>Account & Team</h1>
        <p>Manage your account details and team members.</p>
    </div>

    @if($errors->has('current_password'))
        <div style="color:#ff6b6b; font-size:0.85rem; margin-bottom:0.75rem;">
            {{ $errors->first('current_password') }}
        </div>
    @endif

    @if($errors->has('password'))
        <div style="color:#ff6b6b; font-size:0.85rem; margin-bottom:0.75rem;">
            {{ $errors->first('password') }}
        </div>
    @endif

    {{-- ACCOUNT INFO --}}
    <div class="ap-card">
        <div class="ap-card-title">Account Info</div>

        <div class="ap-grid">
            <div>
                <div class="ap-label">Email</div>
                <div class="ap-value">{{ auth()->user()?->email ?? '—' }}</div>
            </div>

            <div>
                <div class="ap-label">Account Created</div>
                <div class="ap-value">{{ auth()->user()?->created_at?->format('M d, Y') ?? '—' }}</div>
            </div>
        </div>
    </div>

    {{-- ACCOUNT ACTIONS --}}
    <!-- <div class="ap-card">
        <div class="ap-card-title">Account Settings</div>

        <div style="display:flex;gap:0.75rem;flex-wrap:wrap;">
            <button onclick="openPasswordModal()" class="ap-btn ap-btn-outline">
                🔒 Change Password
            </button>

            <form method="POST" action="{{ route('account.delete') }}" style="display:inline;">
                @csrf
                @method('DELETE')

                <button type="submit"
                        class="ap-btn ap-btn-danger"
                        onclick="return confirm('Are you sure you want to permanently delete your account? This action cannot be undone.')">
                    🗑 Delete Account
                </button>
            </form>
        </div>
    </div> -->

    {{-- TEAM MEMBERS --}}
    <div class="ap-card">
        <div class="ap-card-title">Team Members</div>

        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem;">
            <div style="font-size:0.9rem;color:#888;">
                Manage your team access and roles
            </div>

            <a href="#" class="ap-btn ap-btn-primary">
                + Invite Member
            </a>
        </div>

        @if(isset($teamMembers) && count($teamMembers))
            <table class="ap-table">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Joined</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($teamMembers as $member)
                        <tr>
                            <td>{{ $member->email }}</td>
                            <td>{{ ucfirst($member->role ?? 'member') }}</td>
                            <td>{{ $member->created_at?->format('M d, Y') }}</td>
                            <td>
                                <a href="#" class="ap-btn ap-btn-outline" style="padding:0.4rem 0.7rem;">
                                    Remove
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="ap-empty">
                No team members yet. Invite your first teammate.
            </div>
        @endif
    </div>

</div>

<!-- Update Password Modal -->
<div id="passwordModal" class="modal-overlay" style="display:none;">
  <div class="modal-content">
    <h2>Update Password</h2>

    <form method="POST" action="{{ route('account.password.update') }}">
      @csrf

      <div class="password-toggle-container">
        <label for="current_password" class="modal-label">Current Password</label>
        <input id="current_password" name="current_password" type="password" required class="modal-input" autocomplete="current-password" />
        <button type="button" class="toggle-password-btn" onclick="togglePassword('current_password', this)">Show</button>
      </div>

      <div class="password-toggle-container">
        <label for="password" class="modal-label">New Password</label>
        <input id="password" name="password" type="password" required class="modal-input" autocomplete="new-password" />
        <button type="button" class="toggle-password-btn" onclick="togglePassword('password', this)">Show</button>
      </div>

      <div class="password-toggle-container">
        <label for="password_confirmation" class="modal-label">Confirm Password</label>
        <input id="password_confirmation" name="password_confirmation" type="password" required class="modal-input" autocomplete="new-password" />
        <button type="button" class="toggle-password-btn" onclick="togglePassword('password_confirmation', this)">Show</button>
      </div>

      <div class="modal-actions">
        <button type="button" class="btn-cancel" onclick="closePasswordModal()">Cancel</button>
        <button type="submit" class="btn-primary">Update Password</button>
      </div>
    </form>
  </div>
</div>

<script>
    function openPasswordModal() {
        document.getElementById('passwordModal').style.display = 'flex';
    }

    function closePasswordModal() {
        document.getElementById('passwordModal').style.display = 'none';
    }

    function togglePassword(inputId, btn) {
        const input = document.getElementById(inputId);
        if (input.type === "password") {
            input.type = "text";
            btn.textContent = "Hide";
        } else {
            input.type = "password";
            btn.textContent = "Show";
        }
    }
</script>

@endsection