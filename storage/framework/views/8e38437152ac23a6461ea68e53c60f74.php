

<?php $__env->startSection('title', 'Accept Team Invitation - 000form'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .accept-wrap {
        min-height: 80vh; display: flex; align-items: center; justify-content: center;
        padding: 2rem 1rem; margin-top: 5rem;
    }
    .accept-card {
        background: var(--bg-card); border: 1px solid var(--border-color);
        border-radius: 20px; padding: 2.5rem; max-width: 480px; width: 100%; text-align: center;
    }
    .accept-icon { font-size: 3rem; margin-bottom: 1.25rem; }
    .accept-card h1 { font-size: 1.5rem; font-weight: 700; margin-bottom: 0.75rem; letter-spacing: -0.02em; }
    .accept-card p  { color: var(--text-secondary); font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.5rem; }
    .accept-meta {
        background: var(--bg-secondary); border: 1px solid var(--border-color);
        border-radius: 12px; padding: 1rem 1.25rem; margin-bottom: 1.5rem; text-align: left;
    }
    .accept-meta-row {
        display: flex; justify-content: space-between; align-items: center;
        font-size: 0.875rem; padding: 0.35rem 0;
    }
    .accept-meta-label { color: var(--text-muted); }
    .accept-meta-value { font-weight: 600; color: var(--text-primary); }
    .accept-actions { display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap; }
    .btn-accept {
        padding: 0.875rem 2rem; border-radius: 10px; font-weight: 600; font-size: 0.9rem;
        background: var(--accent); color: var(--bg-primary); border: none; cursor: pointer;
        transition: opacity 0.2s; text-decoration: none; display: inline-flex; align-items: center;
    }
    .btn-accept:hover { opacity: 0.88; }
    .btn-decline {
        padding: 0.875rem 2rem; border-radius: 10px; font-weight: 600; font-size: 0.9rem;
        background: transparent; color: #ff6b6b; border: 1px solid rgba(255,68,68,0.3);
        cursor: pointer; transition: background 0.2s;
    }
    .btn-decline:hover { background: rgba(255,68,68,0.08); }
    .role-badge {
        display: inline-block; font-family: var(--font-mono); font-size: 0.65rem;
        font-weight: 600; letter-spacing: 0.05em; text-transform: uppercase;
        padding: 0.2rem 0.6rem; border-radius: 100px;
        background: rgba(0,136,255,0.12); color: #4db8ff; border: 1px solid rgba(0,136,255,0.25);
    }
    .wrong-account-banner {
        background: rgba(255,165,0,0.08); border: 1px solid rgba(255,165,0,0.3);
        border-radius: 12px; padding: 1rem 1.25rem; margin-bottom: 1.5rem; text-align: left;
        font-size: 0.875rem; color: #ffc04d; line-height: 1.6;
    }
    .wrong-account-banner strong { color: #ffb347; }
</style>

<div class="accept-wrap">
    <div class="accept-card">

        <?php if($wrongAccount ?? false): ?>
            
            <div class="accept-icon">⚠️</div>
            <h1>Wrong account</h1>
            <p>
                This invitation was sent to <strong style="color:var(--text-primary);"><?php echo e($invitation->invitee_email); ?></strong>,
                but you're currently signed in as <strong style="color:var(--text-primary);"><?php echo e($currentEmail); ?></strong>.
            </p>
            <div class="wrong-account-banner">
                To accept this invitation, please sign out and sign in with
                <strong><?php echo e($invitation->invitee_email); ?></strong>.
                <?php if(! \App\Models\User::where('email', $invitation->invitee_email)->exists()): ?>
                    <br><br>
                    <strong><?php echo e($invitation->invitee_email); ?></strong> doesn't have a 000form account yet.
                    Sign out and create a new account with that email address.
                <?php endif; ?>
            </div>
            <div class="accept-actions">
                <a href="<?php echo e(route('logout')); ?>" class="btn-accept"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Sign Out & Switch Account
                </a>
            </div>
            <form id="logout-form" method="POST" action="<?php echo e(route('logout')); ?>" style="display:none;">
                <?php echo csrf_field(); ?>
                
                <input type="hidden" name="redirect_after_logout" value="<?php echo e(route('team.accept', $invitation->token)); ?>">
            </form>

        <?php else: ?>
            
            <div class="accept-icon">👥</div>
            <h1>You're invited!</h1>
            <p>
                <strong style="color:var(--text-primary);"><?php echo e($invitation->owner->name ?? $invitation->owner->email); ?></strong>
                has invited you to join their 000form workspace.
            </p>

            <div class="accept-meta">
                <div class="accept-meta-row">
                    <span class="accept-meta-label">Workspace</span>
                    <span class="accept-meta-value"><?php echo e($invitation->owner->name ?? $invitation->owner->email); ?></span>
                </div>
                <div class="accept-meta-row">
                    <span class="accept-meta-label">Your role</span>
                    <span class="accept-meta-value"><span class="role-badge"><?php echo e(ucfirst($invitation->role)); ?></span></span>
                </div>
                <div class="accept-meta-row">
                    <span class="accept-meta-label">Invited email</span>
                    <span class="accept-meta-value"><?php echo e($invitation->invitee_email); ?></span>
                </div>
                <div class="accept-meta-row">
                    <span class="accept-meta-label">Expires</span>
                    <span class="accept-meta-value"><?php echo e($invitation->expires_at->format('M d, Y')); ?></span>
                </div>
            </div>

            <div class="accept-actions">
                <form method="POST" action="<?php echo e(route('team.accept.confirm', $invitation->token)); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn-accept">✓ Accept Invitation</button>
                </form>
                <form method="POST" action="<?php echo e(route('team.decline', $invitation->token)); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn-decline">✕ Decline</button>
                </form>
            </div>
        <?php endif; ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/000form/resources/views/team/accept.blade.php ENDPATH**/ ?>