

<?php $__env->startSection('title', 'Account & Team - 000form'); ?>

<?php $__env->startSection('content'); ?>

<style>
    .ap {
        padding: 6rem 2rem 3rem;
        max-width: 1100px;
        margin: 0 auto;
        color: #eee;
        font-family: 'Inter', sans-serif;
    }

    .ap-header { margin-bottom: 2.5rem; }

    .ap-header h1 {
        font-size: 2rem;
        font-weight: 700;
        letter-spacing: -0.02em;
        margin-bottom: 0.4rem;
        color: #fff;
    }

    .ap-header p { color: #aaa; font-size: 0.95rem; }

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

    .ap-btn-primary  { background: #0fda87; color: #121212; }
    .ap-btn-primary:hover { background: #0bc671; }

    .ap-btn-outline  { border: 1px solid #444; color: #eee; background: transparent; }
    .ap-btn-outline:hover { background: #222; border-color: #0fda87; color: #0fda87; }

    .ap-btn-danger   { border: 1px solid rgba(255,68,68,0.4); color: #ff6b6b; background: transparent; }
    .ap-btn-danger:hover { background: rgba(255,68,68,0.1); border-color: #ff6b6b; }

    .ap-table { width: 100%; border-collapse: collapse; }

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

    .ap-empty { text-align: center; padding: 2rem; color: #666; font-style: italic; }

    /* ── FLASH MESSAGES ── */
    .ap-flash {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem 1.25rem;
        border-radius: 12px;
        font-size: 0.9rem;
        font-weight: 500;
        margin-bottom: 1.5rem;
    }
    .ap-flash.success { background: rgba(0,255,136,0.08); border: 1px solid rgba(0,255,136,0.3); color: #00ff88; }
    .ap-flash.error   { background: rgba(255,68,68,0.08);  border: 1px solid rgba(255,68,68,0.3);  color: #ff6b6b; }

    /* ── MODAL ── */
    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.75);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .modal-content {
        background: #121212;
        border: 1px solid #333;
        border-radius: 16px;
        padding: 2.5rem 2rem;
        width: 100%;
        max-width: 420px;
        color: #eee;
    }

    .modal-content h2 {
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        letter-spacing: -0.02em;
    }

    .modal-label {
        display: block;
        font-family: 'Courier New', monospace;
        font-size: 0.72rem;
        color: #bbb;
        text-transform: uppercase;
        margin-bottom: 0.4rem;
        letter-spacing: 0.05em;
    }

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
        box-sizing: border-box;
    }

    .modal-input:focus { outline: none; border-color: #0fda87; background: #1a1a1a; }

    .password-toggle-container { position: relative; margin-bottom: 1rem; }

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
    }

    .modal-error {
        color: #ff6b6b;
        font-size: 0.8rem;
        margin-bottom: 0.75rem;
    }

    .modal-actions {
        display: flex;
        justify-content: flex-end;
        gap: 0.75rem;
        margin-top: 1rem;
    }

    .btn-cancel {
        background: #333;
        color: #ccc;
        border: none;
        padding: 0.7rem 1.3rem;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
    }

    .btn-cancel:hover { background: #444; }

    .btn-primary {
        background: #0fda87;
        color: #121212;
        border: none;
        padding: 0.7rem 1.5rem;
        border-radius: 10px;
        font-weight: 700;
        cursor: pointer;
        transition: background 0.2s;
    }

    .btn-primary:hover { background: #0bc671; }

    .btn-danger-confirm {
        background: #ff4444;
        color: #fff;
        border: none;
        padding: 0.7rem 1.5rem;
        border-radius: 10px;
        font-weight: 700;
        cursor: pointer;
        transition: background 0.2s;
    }

    .btn-danger-confirm:hover { background: #cc0000; }

    /* ── DELETE CONFIRM BOX ── */
    .delete-warning {
        background: rgba(255,68,68,0.08);
        border: 1px solid rgba(255,68,68,0.25);
        border-radius: 10px;
        padding: 1rem 1.25rem;
        font-size: 0.875rem;
        color: #ff8080;
        margin-bottom: 1.25rem;
        line-height: 1.6;
    }
</style>

<div class="ap">

    
    <div class="ap-header">
        <h1>Account & Team</h1>
        <p>Manage your account details and team members.</p>
    </div>

    
    <?php if(session('success')): ?>
        <div class="ap-flash success">✓ <?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="ap-flash error">⚠ <?php echo e(session('error')); ?></div>
    <?php endif; ?>

    
    <div class="ap-card">
        <div class="ap-card-title">Account Info</div>
        <div class="ap-grid">
            <div>
                <div class="ap-label">Email</div>
                <div class="ap-value"><?php echo e(auth()->user()?->email ?? '—'); ?></div>
            </div>
            <div>
                <div class="ap-label">Provider</div>
                <div class="ap-value"><?php echo e(ucfirst(auth()->user()?->provider ?? 'email')); ?></div>
            </div>
            <div>
                <div class="ap-label">Account Created</div>
                <div class="ap-value"><?php echo e(auth()->user()?->created_at?->format('M d, Y') ?? '—'); ?></div>
            </div>
        </div>
    </div>

    
    <div class="ap-card">
        <div class="ap-card-title">Account Settings</div>

        <div style="display:flex;gap:0.75rem;flex-wrap:wrap;">
            
            <?php if(auth()->user()?->provider === 'email'): ?>
                <button onclick="openPasswordModal()" class="ap-btn ap-btn-outline">
                    🔒 Change Password
                </button>
            <?php else: ?>
                <span style="font-size:0.85rem;color:#666;padding:0.7rem 0;">
                    Password management not available for <?php echo e(ucfirst(auth()->user()?->provider)); ?> accounts.
                </span>
            <?php endif; ?>

            <button onclick="openDeleteModal()" class="ap-btn ap-btn-danger">
                🗑 Delete Account
            </button>
        </div>
    </div>

    
    <div class="ap-card">
        <div class="ap-card-title">Team Members</div>

        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem;">
            <div style="font-size:0.9rem;color:#888;">
                Manage your team access and roles
            </div>
            <a href="#" class="ap-btn ap-btn-primary">+ Invite Member</a>
        </div>

        <?php if(isset($teamMembers) && count($teamMembers)): ?>
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
                    <?php $__currentLoopData = $teamMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($member->email); ?></td>
                            <td><?php echo e(ucfirst($member->role ?? 'member')); ?></td>
                            <td><?php echo e($member->created_at?->format('M d, Y')); ?></td>
                            <td>
                                <a href="#" class="ap-btn ap-btn-outline" style="padding:0.4rem 0.7rem;">
                                    Remove
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="ap-empty">No team members yet. Invite your first teammate.</div>
        <?php endif; ?>
    </div>

</div>


<div id="passwordModal" class="modal-overlay" style="display:none;">
    <div class="modal-content">
        <h2>Change Password</h2>

        <?php if($errors->any()): ?>
            <div class="modal-error">
                <?php echo e($errors->first()); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('account.password.update')); ?>">
            <?php echo csrf_field(); ?>

            <div class="password-toggle-container">
                <label for="current_password" class="modal-label">Current Password</label>
                <input id="current_password" name="current_password" type="password"
                       required class="modal-input" autocomplete="current-password"/>
                <button type="button" class="toggle-password-btn"
                        onclick="togglePassword('current_password', this)">Show</button>
            </div>

            <div class="password-toggle-container">
                <label for="password" class="modal-label">New Password</label>
                <input id="password" name="password" type="password"
                       required class="modal-input" autocomplete="new-password"/>
                <button type="button" class="toggle-password-btn"
                        onclick="togglePassword('password', this)">Show</button>
            </div>

            <div class="password-toggle-container">
                <label for="password_confirmation" class="modal-label">Confirm New Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password"
                       required class="modal-input" autocomplete="new-password"/>
                <button type="button" class="toggle-password-btn"
                        onclick="togglePassword('password_confirmation', this)">Show</button>
            </div>

            <div class="modal-actions">
                <button type="button" class="btn-cancel" onclick="closePasswordModal()">Cancel</button>
                <button type="submit" class="btn-primary">Update Password</button>
            </div>
        </form>
    </div>
</div>


<div id="deleteModal" class="modal-overlay" style="display:none;">
    <div class="modal-content">
        <h2>Delete Account</h2>

        <div class="delete-warning">
            ⚠ This action is <strong>permanent and cannot be undone</strong>.<br><br>
            Deleting your account will:
            <ul style="margin-top:0.5rem;padding-left:1.25rem;line-height:1.8;">
                <li>Cancel your active subscription immediately</li>
                <li>Delete all your forms and submissions</li>
                <li>Remove your account permanently</li>
            </ul>
        </div>

        <form method="POST" action="<?php echo e(route('account.delete')); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>

            <div class="modal-actions">
                <button type="button" class="btn-cancel" onclick="closeDeleteModal()">Cancel</button>
                <button type="submit" class="btn-danger-confirm"
                        onclick="return confirm('Last chance — are you absolutely sure? This cannot be undone.')">
                    Yes, Delete My Account
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // ── PASSWORD MODAL ──
    function openPasswordModal() {
        document.getElementById('passwordModal').style.display = 'flex';
    }
    function closePasswordModal() {
        document.getElementById('passwordModal').style.display = 'none';
    }

    // ── DELETE MODAL ──
    function openDeleteModal() {
        document.getElementById('deleteModal').style.display = 'flex';
    }
    function closeDeleteModal() {
        document.getElementById('deleteModal').style.display = 'none';
    }

    // ── SHOW/HIDE PASSWORD ──
    function togglePassword(inputId, btn) {
        const input = document.getElementById(inputId);
        if (input.type === 'password') {
            input.type = 'text';
            btn.textContent = 'Hide';
        } else {
            input.type = 'password';
            btn.textContent = 'Show';
        }
    }

    // Auto-open password modal if there are validation errors
    <?php if($errors->any()): ?>
        document.addEventListener('DOMContentLoaded', function() {
            openPasswordModal();
        });
    <?php endif; ?>
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Git-folders\000form.com\resources\views/pages/account-settings.blade.php ENDPATH**/ ?>