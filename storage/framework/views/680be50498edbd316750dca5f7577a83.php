

<?php $__env->startSection('title', 'Team Members - 000form'); ?>

<?php $__env->startSection('content'); ?>

<style>
    .tm-header { margin-bottom: 2.5rem; }
    .tm-header h1 { font-size: 2rem; font-weight: 700; letter-spacing: -0.02em; margin-bottom: 0.4rem; }
    .tm-header p  { color: var(--text-secondary); font-size: 0.95rem; }

    .tm-flash {
        display: flex; align-items: center; gap: 0.75rem;
        padding: 1rem 1.25rem; border-radius: 12px;
        font-size: 0.9rem; font-weight: 500; margin-bottom: 1.5rem;
    }
    .tm-flash.success { background: rgba(0,255,136,0.08); border: 1px solid rgba(0,255,136,0.3); color: var(--accent); }
    .tm-flash.error   { background: rgba(255,68,68,0.08);  border: 1px solid rgba(255,68,68,0.3);  color: #ff6b6b; }
    .tm-flash.info    { background: rgba(0,136,255,0.08);  border: 1px solid rgba(0,136,255,0.3);  color: #4db8ff; }

    .tm-card {
        background: var(--bg-card); border: 1px solid var(--border-color);
        border-radius: 20px; padding: 2rem; margin-bottom: 1.5rem;
    }
    .tm-card-title {
        font-size: 0.7rem; font-family: var(--font-mono); font-weight: 600;
        letter-spacing: 0.1em; text-transform: uppercase; color: var(--text-muted); margin-bottom: 1.5rem;
    }

    /* Usage bar */
    .tm-usage {
        display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;
        flex-wrap: wrap;
    }
    .tm-usage-bar-wrap { flex: 1; min-width: 200px; }
    .tm-usage-label { font-size: 0.85rem; color: var(--text-secondary); margin-bottom: 0.4rem; }
    .tm-usage-track { height: 6px; background: var(--bg-tertiary); border-radius: 100px; overflow: hidden; }
    .tm-usage-fill  { height: 100%; border-radius: 100px; background: var(--accent); transition: width 0.4s ease; }
    .tm-usage-fill.warning { background: #ffa500; }
    .tm-usage-fill.danger  { background: #ff4444; }
    .tm-usage-count { font-family: var(--font-mono); font-size: 0.85rem; color: var(--text-muted); white-space: nowrap; }

    .tm-limit-badge {
        display: inline-flex; align-items: center; gap: 0.4rem;
        font-family: var(--font-mono); font-size: 0.7rem; font-weight: 600;
        letter-spacing: 0.06em; text-transform: uppercase;
        padding: 0.3rem 0.75rem; border-radius: 100px;
        background: rgba(0,255,136,0.1); color: var(--accent); border: 1px solid rgba(0,255,136,0.25);
    }

    /* Invite form */
    .tm-invite-form { display: flex; gap: 0.75rem; flex-wrap: wrap; align-items: flex-end; }
    .tm-invite-form .form-group { flex: 1; min-width: 200px; }
    .tm-invite-form label { display: block; font-size: 0.8rem; color: var(--text-muted); margin-bottom: 0.4rem; font-weight: 500; }
    .tm-invite-form input,
    .tm-invite-form select {
        width: 100%; padding: 0.7rem 1rem; border-radius: 10px;
        background: var(--bg-secondary); border: 1px solid var(--border-color);
        color: var(--text-primary); font-size: 0.9rem;
        transition: border-color 0.15s;
    }
    .tm-invite-form input:focus,
    .tm-invite-form select:focus { outline: none; border-color: var(--accent); }
    .tm-invite-form select option { background: var(--bg-secondary); }

    .tm-btn {
        display: inline-flex; align-items: center; gap: 0.5rem;
        padding: 0.7rem 1.25rem; border-radius: 10px;
        font-family: var(--font-display); font-size: 0.875rem; font-weight: 600;
        cursor: pointer; transition: all 0.2s ease; border: none; white-space: nowrap;
    }
    .tm-btn-primary { background: var(--accent); color: var(--bg-primary); }
    .tm-btn-primary:hover { opacity: 0.88; }
    .tm-btn-primary:disabled { opacity: 0.4; cursor: not-allowed; }
    .tm-btn-outline { background: transparent; color: var(--text-primary); border: 1px solid var(--border-hover); }
    .tm-btn-outline:hover { border-color: var(--accent); color: var(--accent); }
    .tm-btn-danger  { background: transparent; color: #ff6b6b; border: 1px solid rgba(255,68,68,0.3); font-size: 0.8rem; padding: 0.4rem 0.75rem; }
    .tm-btn-danger:hover  { background: rgba(255,68,68,0.08); }
    .tm-btn-sm { font-size: 0.8rem; padding: 0.4rem 0.75rem; }

    /* Members table */
    .tm-table { width: 100%; border-collapse: collapse; }
    .tm-table th {
        font-family: var(--font-mono); font-size: 0.65rem; font-weight: 600;
        letter-spacing: 0.08em; text-transform: uppercase; color: var(--text-muted);
        text-align: left; padding: 0 0 0.75rem; border-bottom: 1px solid var(--border-color);
    }
    .tm-table td {
        font-size: 0.875rem; color: var(--text-secondary);
        padding: 1rem 0; border-bottom: 1px solid var(--border-color); vertical-align: middle;
    }
    .tm-table tr:last-child td { border-bottom: none; }

    .tm-avatar {
        width: 36px; height: 36px; border-radius: 50%;
        background: var(--accent); color: var(--bg-primary);
        display: inline-flex; align-items: center; justify-content: center;
        font-size: 0.8rem; font-weight: 700; flex-shrink: 0;
    }
    .tm-member-info { display: flex; align-items: center; gap: 0.75rem; }
    .tm-member-name { font-weight: 600; color: var(--text-primary); font-size: 0.9rem; }
    .tm-member-email { font-size: 0.8rem; color: var(--text-muted); }

    .tm-role-badge {
        display: inline-block; font-family: var(--font-mono); font-size: 0.65rem;
        font-weight: 600; letter-spacing: 0.05em; text-transform: uppercase;
        padding: 0.2rem 0.6rem; border-radius: 100px;
    }
    .tm-role-badge.owner  { background: rgba(0,255,136,0.12); color: var(--accent); border: 1px solid rgba(0,255,136,0.25); }
    .tm-role-badge.admin  { background: rgba(150,100,255,0.12); color: #b794f4; border: 1px solid rgba(150,100,255,0.3); }
    .tm-role-badge.editor { background: rgba(0,136,255,0.12); color: #4db8ff; border: 1px solid rgba(0,136,255,0.25); }
    .tm-role-badge.viewer { background: rgba(150,150,150,0.12); color: var(--text-muted); border: 1px solid var(--border-color); }

    .tm-status-badge {
        display: inline-block; font-family: var(--font-mono); font-size: 0.65rem;
        font-weight: 600; letter-spacing: 0.05em; text-transform: uppercase;
        padding: 0.2rem 0.6rem; border-radius: 100px;
    }
    .tm-status-badge.pending  { background: rgba(255,165,0,0.12); color: #ffa500; border: 1px solid rgba(255,165,0,0.3); }
    .tm-status-badge.accepted { background: rgba(0,255,136,0.12); color: var(--accent); border: 1px solid rgba(0,255,136,0.25); }

    .tm-role-select {
        padding: 0.3rem 0.5rem; border-radius: 8px;
        background: var(--bg-secondary); border: 1px solid var(--border-color);
        color: var(--text-primary); font-size: 0.8rem; cursor: pointer;
    }
    .tm-role-select:focus { outline: none; border-color: var(--accent); }

    .tm-actions { display: flex; align-items: center; gap: 0.5rem; flex-wrap: wrap; }

    .tm-empty { text-align: center; padding: 2.5rem; color: var(--text-muted); font-size: 0.9rem; }

    .tm-upgrade-banner {
        background: rgba(255,165,0,0.06); border: 1px solid rgba(255,165,0,0.25);
        border-radius: 12px; padding: 1rem 1.25rem;
        display: flex; align-items: center; gap: 1rem; flex-wrap: wrap;
        margin-bottom: 1.5rem;
    }
    .tm-upgrade-banner p { font-size: 0.875rem; color: #ffc04d; margin: 0; flex: 1; }

    .tm-permissions-grid {
        display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem; margin-top: 0.5rem;
    }
    .tm-perm-col h4 { font-size: 0.75rem; font-weight: 700; margin-bottom: 0.75rem; color: var(--text-primary); }
    .tm-perm-item {
        display: flex; align-items: center; gap: 0.5rem;
        font-size: 0.8rem; color: var(--text-secondary); margin-bottom: 0.5rem;
    }
    .tm-perm-item .dot { width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0; }
    .tm-perm-item .dot.yes { background: var(--accent); }
    .tm-perm-item .dot.no  { background: var(--border-hover); }

    @media (max-width: 640px) {
        .tm-card { padding: 1.5rem; }
        .tm-table th:nth-child(3), .tm-table td:nth-child(3) { display: none; }
        .tm-invite-form { flex-direction: column; }
    }
</style>

<div class="tm-wrap">

    <div class="tm-header">
        <h1>Team Members</h1>
        <p>Invite team members to collaborate on your forms and submissions.</p>
    </div>

    <?php if(session('success')): ?>
        <div class="tm-flash success">✓ <?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="tm-flash error">⚠ <?php echo e(session('error')); ?></div>
    <?php endif; ?>
    <?php if(session('info')): ?>
        <div class="tm-flash info">ℹ <?php echo e(session('info')); ?></div>
    <?php endif; ?>

    <?php
        $limitDisplay = $limit === -1 ? 'Unlimited' : $limit;
        $pct = $limit === -1 ? 10 : round(($currentCount / $limit) * 100);
        $barClass = $pct >= 100 ? 'danger' : ($pct >= 80 ? 'warning' : '');
    ?>

    
    <?php if(! $canAdd && $limit !== -1): ?>
        <div class="tm-upgrade-banner">
            <p>⚠ You've reached your team member limit (<?php echo e($limit); ?> members on your current plan). Upgrade to add more.</p>
            <a href="<?php echo e(route('billing.portal')); ?>" class="tm-btn tm-btn-outline tm-btn-sm">Upgrade Plan →</a>
        </div>
    <?php endif; ?>

    
    <div class="tm-card">
        <div class="tm-card-title">Invite Team Member</div>

        
        <div class="tm-usage">
            <div class="tm-usage-bar-wrap">
                <div class="tm-usage-label">Team members used</div>
                <div class="tm-usage-track">
                    <div class="tm-usage-fill <?php echo e($barClass); ?>" style="width: <?php echo e(min($pct, 100)); ?>%"></div>
                </div>
            </div>
            <span class="tm-usage-count"><?php echo e($currentCount); ?> / <?php echo e($limitDisplay); ?></span>
            <span class="tm-limit-badge">
                <?php if($limit === -1): ?> Unlimited <?php else: ?> <?php echo e(max(0, $limit - $currentCount)); ?> remaining <?php endif; ?>
            </span>
        </div>

        <?php if($canAdd): ?>
            <form method="POST" action="<?php echo e(route('team.invite')); ?>">
                <?php echo csrf_field(); ?>
                <div class="tm-invite-form">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" id="email"
                               placeholder="colleague@example.com"
                               value="<?php echo e(old('email')); ?>" required>
                    </div>
                    <div class="form-group" style="max-width:180px;">
                        <label for="role">Role</label>
                        <select name="role" id="role">
                            <option value="viewer"  <?php echo e(old('role') === 'viewer'  ? 'selected' : ''); ?>>Viewer</option>
                            <option value="editor"  <?php echo e(old('role') === 'editor'  ? 'selected' : ''); ?>>Editor</option>
                            <option value="admin"   <?php echo e(old('role') === 'admin'   ? 'selected' : ''); ?>>Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="tm-btn tm-btn-primary" style="align-self:flex-end;">
                        ✉ Send Invite
                    </button>
                </div>
            </form>
        <?php else: ?>
            <p style="font-size:0.875rem;color:var(--text-muted);">
                Upgrade your plan to invite more team members.
                <a href="<?php echo e(route('billing.portal')); ?>" style="color:var(--accent);">Upgrade →</a>
            </p>
        <?php endif; ?>
    </div>

    
    <div class="tm-card">
        <div class="tm-card-title">Current Members (<?php echo e($currentCount); ?>)</div>
        <table class="tm-table">
            <thead>
                <tr>
                    <th>Member</th>
                    <th>Role</th>
                    <th>Joined</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td>
                        <div class="tm-member-info">
                            <div class="tm-avatar"><?php echo e(strtoupper(substr($user->name ?? $user->email, 0, 1))); ?></div>
                            <div>
                                <div class="tm-member-name"><?php echo e($user->name ?? 'You'); ?> <span style="color:var(--text-muted);font-size:0.75rem;">(you)</span></div>
                                <div class="tm-member-email"><?php echo e($user->email); ?></div>
                            </div>
                        </div>
                    </td>
                    <td><span class="tm-role-badge owner">Owner</span></td>
                    <td><?php echo e($user->created_at?->format('M d, Y') ?? '—'); ?></td>
                    <td>—</td>
                </tr>

                
                <?php $__empty_1 = true; $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <div class="tm-member-info">
                                <div class="tm-avatar">
                                    <?php echo e(strtoupper(substr($member->member->name ?? $member->member->email ?? '?', 0, 1))); ?>

                                </div>
                                <div>
                                    <div class="tm-member-email"><?php echo e($member->member->email ?? '—'); ?></div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <form method="POST" action="<?php echo e(route('team.member.role', $member)); ?>" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <select name="role" class="tm-role-select" onchange="this.form.submit()">
                                    <option value="viewer" <?php echo e($member->role === 'viewer' ? 'selected' : ''); ?>>Viewer</option>
                                    <option value="editor" <?php echo e($member->role === 'editor' ? 'selected' : ''); ?>>Editor</option>
                                    <option value="admin"  <?php echo e($member->role === 'admin'  ? 'selected' : ''); ?>>Admin</option>
                                </select>
                            </form>
                        </td>
                        <td><?php echo e($member->joined_at?->format('M d, Y') ?? '—'); ?></td>
                        <td>
                            <form method="POST" action="<?php echo e(route('team.member.remove', $member)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="tm-btn tm-btn-danger"
                                        onclick="return confirm('Remove <?php echo e($member->member->email); ?> from your workspace?')">
                                    Remove
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="tm-empty">No team members yet. Invite someone above.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    
    <?php if($pendingInvitations->count()): ?>
    <div class="tm-card">
        <div class="tm-card-title">Pending Invitations (<?php echo e($pendingInvitations->count()); ?>)</div>
        <table class="tm-table">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Expires</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $pendingInvitations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invitation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <div style="font-weight:500;color:var(--text-primary);"><?php echo e($invitation->invitee_email); ?></div>
                            <span class="tm-status-badge pending">Pending</span>
                        </td>
                        <td><span class="tm-role-badge <?php echo e($invitation->role); ?>"><?php echo e(ucfirst($invitation->role)); ?></span></td>
                        <td style="font-size:0.8rem;color:var(--text-muted);"><?php echo e($invitation->expires_at->format('M d, Y')); ?></td>
                        <td>
                            <div class="tm-actions">
                                <form method="POST" action="<?php echo e(route('team.invitation.resend', $invitation)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="tm-btn tm-btn-outline tm-btn-sm">↻ Resend</button>
                                </form>
                                <form method="POST" action="<?php echo e(route('team.invitation.cancel', $invitation)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="tm-btn tm-btn-danger"
                                            onclick="return confirm('Cancel this invitation?')">Cancel</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>

    
    <div class="tm-card">
        <div class="tm-card-title">Role Permissions</div>
        <div class="tm-permissions-grid">
            <div class="tm-perm-col">
                <h4 style="color:var(--text-muted);">Viewer</h4>
                <div class="tm-perm-item"><span class="dot yes"></span> View forms</div>
                <div class="tm-perm-item"><span class="dot yes"></span> View submissions</div>
                <div class="tm-perm-item"><span class="dot no"></span>  Create/edit forms</div>
                <div class="tm-perm-item"><span class="dot no"></span>  Delete forms</div>
            </div>
            <div class="tm-perm-col">
                <h4 style="color:#4db8ff;">Editor</h4>
                <div class="tm-perm-item"><span class="dot yes"></span> View forms</div>
                <div class="tm-perm-item"><span class="dot yes"></span> View submissions</div>
                <div class="tm-perm-item"><span class="dot yes"></span> Create/edit forms</div>
                <div class="tm-perm-item"><span class="dot no"></span>  Delete forms</div>
            </div>
            <div class="tm-perm-col">
                <h4 style="color:#b794f4;">Admin</h4>
                <div class="tm-perm-item"><span class="dot yes"></span> View forms</div>
                <div class="tm-perm-item"><span class="dot yes"></span> View submissions</div>
                <div class="tm-perm-item"><span class="dot yes"></span> Create/edit forms</div>
                <div class="tm-perm-item"><span class="dot yes"></span> Delete forms</div>
            </div>
        </div>
        <p style="font-size:0.8rem;color:var(--text-muted);margin-top:1rem;">
            Billing is always restricted to the workspace owner only.
        </p>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Git-folders\000form.com\resources\views/team/index.blade.php ENDPATH**/ ?>