

<?php $__env->startSection('title', 'Billing & Subscription - 000form'); ?>

<?php $__env->startSection('content'); ?>

<style>
    .bp-header { margin-bottom: 2.5rem; }
    .bp-header h1 { font-size: 2rem; font-weight: 700; letter-spacing: -0.02em; margin-bottom: 0.4rem; }
    .bp-header p  { color: var(--text-secondary); font-size: 0.95rem; }

    .bp-flash {
        display: flex; align-items: center; gap: 0.75rem;
        padding: 1rem 1.25rem; border-radius: 12px;
        font-size: 0.9rem; font-weight: 500; margin-bottom: 1.5rem;
    }
    .bp-flash.success { background: rgba(0,255,136,0.08); border: 1px solid rgba(0,255,136,0.3); color: var(--accent); }
    .bp-flash.error   { background: rgba(255,68,68,0.08);  border: 1px solid rgba(255,68,68,0.3);  color: #ff6b6b; }
    .bp-flash.info    { background: rgba(0,136,255,0.08);  border: 1px solid rgba(0,136,255,0.3);  color: #4db8ff; }

    .bp-card {
        background: var(--bg-card); border: 1px solid var(--border-color);
        border-radius: 20px; padding: 2rem; margin-bottom: 1.5rem;
    }
    .bp-card-title {
        font-size: 0.7rem; font-family: var(--font-mono); font-weight: 600;
        letter-spacing: 0.1em; text-transform: uppercase; color: var(--text-muted); margin-bottom: 1.5rem;
    }

    /* ── SCHEDULED CHANGE CARD ── */
    .bp-scheduled-card {
        background: rgba(0,136,255,0.05);
        border: 1px solid rgba(0,136,255,0.35);
        border-radius: 20px; padding: 1.5rem; margin-bottom: 1.5rem;
    }
    .bp-scheduled-header {
        display: flex; align-items: center; justify-content: space-between;
        flex-wrap: wrap; gap: 1rem;
    }
    .bp-scheduled-title {
        font-size: 0.7rem; font-family: var(--font-mono); font-weight: 600;
        letter-spacing: 0.1em; text-transform: uppercase; color: #4db8ff; margin-bottom: 0.75rem;
    }
    .bp-scheduled-info {
        display: flex; align-items: center; gap: 1rem; flex-wrap: wrap;
    }
    .bp-scheduled-plan {
        font-size: 1.1rem; font-weight: 700;
    }
    .bp-scheduled-plan .from { color: var(--text-muted); }
    .bp-scheduled-plan .arrow { color: var(--text-muted); margin: 0 0.5rem; }
    .bp-scheduled-plan .to { color: #4db8ff; }
    .bp-scheduled-date {
        font-size: 0.85rem; color: var(--text-muted); margin-top: 0.3rem;
    }
    .bp-scheduled-date strong { color: var(--text-primary); }

    .bp-plan-row { display: flex; align-items: flex-start; justify-content: space-between; gap: 1.5rem; flex-wrap: wrap; }
    .bp-plan-name  { font-size: 2rem; font-weight: 700; letter-spacing: -0.02em; margin-bottom: 0.4rem; }
    .bp-plan-price { font-size: 1rem; color: var(--text-secondary); margin-bottom: 1rem; }
    .bp-plan-price strong { color: var(--text-primary); font-size: 1.2rem; }

    .bp-status {
        display: inline-flex; align-items: center; gap: 0.5rem;
        font-family: var(--font-mono); font-size: 0.7rem; font-weight: 600;
        letter-spacing: 0.06em; text-transform: uppercase; padding: 0.35rem 0.9rem; border-radius: 100px;
    }
    .bp-status-dot { width: 7px; height: 7px; border-radius: 50%; }
    .bp-status.active    { background: rgba(0,255,136,0.12); color: var(--accent);      border: 1px solid rgba(0,255,136,0.3); }
    .bp-status.active    .bp-status-dot { background: var(--accent); }
    .bp-status.cancelled { background: rgba(255,165,0,0.12); color: #ffa500;            border: 1px solid rgba(255,165,0,0.3); }
    .bp-status.cancelled .bp-status-dot { background: #ffa500; }
    .bp-status.past_due  { background: rgba(255,68,68,0.12);  color: #ff6b6b;           border: 1px solid rgba(255,68,68,0.3); }
    .bp-status.past_due  .bp-status-dot { background: #ff6b6b; }
    .bp-status.trialing  { background: rgba(0,136,255,0.12);  color: #4db8ff;           border: 1px solid rgba(0,136,255,0.3); }
    .bp-status.trialing  .bp-status-dot { background: #4db8ff; }
    .bp-status.paused    { background: rgba(150,100,255,0.12);color: #b794f4;           border: 1px solid rgba(150,100,255,0.3); }
    .bp-status.paused    .bp-status-dot { background: #b794f4; }
    .bp-status.expired   { background: rgba(150,150,150,0.12);color: var(--text-muted); border: 1px solid var(--border-color); }
    .bp-status.expired   .bp-status-dot { background: var(--text-muted); }

    .bp-banner {
        display: flex; align-items: flex-start; gap: 0.75rem;
        padding: 1rem 1.25rem; border-radius: 12px;
        font-size: 0.875rem; line-height: 1.5; margin-top: 1.25rem;
    }
    .bp-banner.warning { background: rgba(255,165,0,0.08); border: 1px solid rgba(255,165,0,0.25); color: #ffc04d; }
    .bp-banner.danger  { background: rgba(255,68,68,0.08);  border: 1px solid rgba(255,68,68,0.25);  color: #ff8080; }
    .bp-banner.info    { background: rgba(0,136,255,0.08);  border: 1px solid rgba(0,136,255,0.25);  color: #66c2ff; }
    .bp-banner-icon    { font-size: 1rem; flex-shrink: 0; margin-top: 1px; }

    .bp-details-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 1.25rem; }
    .bp-detail-label {
        font-size: 0.7rem; font-family: var(--font-mono); font-weight: 600;
        letter-spacing: 0.08em; text-transform: uppercase; color: var(--text-muted); margin-bottom: 0.4rem;
    }
    .bp-detail-value        { font-size: 0.95rem; font-weight: 600; color: var(--text-primary); }
    .bp-detail-value.accent { color: var(--accent); }

    .bp-usage        { margin-top: 1.5rem; }
    .bp-usage-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.6rem; }
    .bp-usage-label  { font-size: 0.8rem; color: var(--text-secondary); font-weight: 500; }
    .bp-usage-count  { font-size: 0.8rem; font-family: var(--font-mono); color: var(--text-muted); }
    .bp-usage-track  { width: 100%; height: 6px; background: var(--bg-tertiary); border-radius: 100px; overflow: hidden; }
    .bp-usage-fill   { height: 100%; border-radius: 100px; background: var(--accent); transition: width 0.5s ease; }
    .bp-usage-fill.warning { background: #ffa500; }
    .bp-usage-fill.danger  { background: #ff4444; }

    .bp-actions { display: flex; flex-wrap: wrap; gap: 0.75rem; }
    .bp-btn {
        display: inline-flex; align-items: center; gap: 0.5rem;
        padding: 0.7rem 1.25rem; border-radius: 10px;
        font-family: var(--font-display); font-size: 0.875rem; font-weight: 600;
        text-decoration: none; cursor: pointer; transition: all 0.2s ease; border: none;
    }
    .bp-btn-primary { background: var(--accent); color: var(--bg-primary); }
    .bp-btn-primary:hover { opacity: 0.88; transform: translateY(-1px); }
    .bp-btn-outline { background: transparent; color: var(--text-primary); border: 1px solid var(--border-hover); }
    .bp-btn-outline:hover { border-color: var(--accent); color: var(--accent); background: rgba(0,255,136,0.05); }
    .bp-btn-danger  { background: transparent; color: #ff6b6b; border: 1px solid rgba(255,68,68,0.35); }
    .bp-btn-danger:hover  { background: rgba(255,68,68,0.08); border-color: #ff4444; }
    .bp-btn-resume  { background: transparent; color: var(--accent); border: 1px solid rgba(0,255,136,0.35); }
    .bp-btn-resume:hover  { background: rgba(0,255,136,0.08); }
    .bp-btn-blue    { background: transparent; color: #4db8ff; border: 1px solid rgba(0,136,255,0.35); }
    .bp-btn-blue:hover { background: rgba(0,136,255,0.08); border-color: #4db8ff; }

    /* ── CHANGE PLAN MODAL ── */
    .cp-overlay {
        position: fixed; inset: 0; background: rgba(0,0,0,0.8);
        display: flex; align-items: center; justify-content: center;
        z-index: 1000; padding: 1rem;
    }
    .cp-modal {
        background: var(--bg-card); border: 1px solid var(--border-color);
        border-radius: 20px; padding: 2rem; width: 100%; max-width: 680px;
        max-height: 90vh; overflow-y: auto;
    }
    .cp-modal-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem; }
    .cp-modal-title  { font-size: 1.25rem; font-weight: 700; letter-spacing: -0.02em; }
    .cp-modal-sub    { font-size: 0.85rem; color: var(--text-muted); margin-bottom: 1.5rem; }
    .cp-close {
        background: none; border: none; color: var(--text-muted);
        font-size: 1.5rem; cursor: pointer; padding: 0; line-height: 1; transition: color 0.15s;
    }
    .cp-close:hover { color: var(--text-primary); }

    .cp-plans { display: flex; flex-direction: column; gap: 1rem; }
    .cp-plan-card {
        background: var(--bg-secondary); border: 1px solid var(--border-color);
        border-radius: 14px; padding: 1.25rem; transition: border-color 0.2s;
    }
    .cp-plan-card.current  { border-color: var(--accent); background: rgba(0,255,136,0.03); }
    .cp-plan-card.scheduled { border-color: rgba(0,136,255,0.5); background: rgba(0,136,255,0.03); }

    .cp-plan-top { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem; flex-wrap: wrap; gap: 0.5rem; }
    .cp-plan-name { font-size: 1rem; font-weight: 700; display: flex; align-items: center; gap: 0.5rem; }
    .cp-current-badge {
        font-family: var(--font-mono); font-size: 0.6rem; font-weight: 600;
        letter-spacing: 0.08em; text-transform: uppercase;
        background: rgba(0,255,136,0.15); color: var(--accent);
        border: 1px solid rgba(0,255,136,0.3); padding: 0.15rem 0.5rem; border-radius: 100px;
    }
    .cp-scheduled-badge {
        font-family: var(--font-mono); font-size: 0.6rem; font-weight: 600;
        letter-spacing: 0.08em; text-transform: uppercase;
        background: rgba(0,136,255,0.15); color: #4db8ff;
        border: 1px solid rgba(0,136,255,0.3); padding: 0.15rem 0.5rem; border-radius: 100px;
    }
    .cp-plan-desc { font-size: 0.8rem; color: var(--text-muted); margin-top: 0.2rem; }

    .cp-billing-toggle { display: flex; gap: 0.5rem; margin-bottom: 1rem; }
    .cp-billing-opt {
        flex: 1; padding: 0.6rem; border-radius: 8px; text-align: center;
        border: 1px solid var(--border-color); cursor: pointer;
        font-size: 0.8rem; font-weight: 600; transition: all 0.15s;
        background: transparent; color: var(--text-muted); user-select: none;
    }
    .cp-billing-opt.active { border-color: var(--accent); color: var(--accent); background: rgba(0,255,136,0.08); }
    .cp-billing-opt .cp-save { font-size: 0.65rem; display: block; margin-top: 0.1rem; }

    .cp-price-display {
        font-size: 1.5rem; font-weight: 700; color: var(--text-primary);
        margin-bottom: 1rem; letter-spacing: -0.02em;
    }
    .cp-price-display span { font-size: 0.875rem; font-weight: 400; color: var(--text-muted); }

    .cp-actions { display: flex; gap: 0.5rem; flex-wrap: wrap; }
    .cp-btn {
        display: inline-flex; align-items: center; gap: 0.35rem;
        padding: 0.55rem 1rem; border-radius: 8px;
        font-size: 0.8rem; font-weight: 600; cursor: pointer;
        transition: all 0.15s; border: none; white-space: nowrap;
    }
    .cp-btn-now      { background: var(--accent); color: var(--bg-primary); }
    .cp-btn-now:hover { opacity: 0.88; }
    .cp-btn-renewal  { background: transparent; color: var(--text-secondary); border: 1px solid var(--border-hover); }
    .cp-btn-renewal:hover { border-color: var(--accent); color: var(--accent); }
    .cp-btn-downgrade { background: transparent; color: var(--text-muted); border: 1px solid var(--border-color); }
    .cp-btn-downgrade:hover { border-color: #ffa500; color: #ffa500; }

    .cp-downgrade-note {
        font-size: 0.75rem; color: #ffa500;
        background: rgba(255,165,0,0.08); border: 1px solid rgba(255,165,0,0.2);
        border-radius: 8px; padding: 0.5rem 0.75rem; margin-top: 0.5rem;
    }
    .cp-legend {
        font-size: 0.75rem; color: var(--text-muted); margin-top: 1.25rem;
        padding-top: 1rem; border-top: 1px solid var(--border-color); line-height: 1.7;
    }

    /* ── INVOICES TABLE ── */
    .bp-table { width: 100%; border-collapse: collapse; }
    .bp-table th {
        font-family: var(--font-mono); font-size: 0.65rem; font-weight: 600;
        letter-spacing: 0.08em; text-transform: uppercase; color: var(--text-muted);
        text-align: left; padding: 0 0 0.75rem; border-bottom: 1px solid var(--border-color);
    }
    .bp-table td {
        font-size: 0.875rem; color: var(--text-secondary);
        padding: 1rem 0; border-bottom: 1px solid var(--border-color); vertical-align: middle;
    }
    .bp-table tr:last-child td { border-bottom: none; }
    .bp-invoice-amount { color: var(--text-primary); font-weight: 600; font-family: var(--font-mono); }
    .bp-invoice-status {
        display: inline-block; font-family: var(--font-mono); font-size: 0.65rem;
        font-weight: 600; letter-spacing: 0.05em; text-transform: uppercase;
        padding: 0.2rem 0.6rem; border-radius: 100px;
    }
    .bp-invoice-status.completed { background: rgba(0,255,136,0.12); color: var(--accent); border: 1px solid rgba(0,255,136,0.25); }
    .bp-invoice-status.paid      { background: rgba(0,255,136,0.12); color: var(--accent); border: 1px solid rgba(0,255,136,0.25); }
    .bp-invoice-status.refunded  { background: rgba(0,136,255,0.12); color: #4db8ff;       border: 1px solid rgba(0,136,255,0.25); }
    .bp-invoice-status.failed    { background: rgba(255,68,68,0.12); color: #ff6b6b;       border: 1px solid rgba(255,68,68,0.25); }
    .bp-invoice-dl {
        display: inline-flex; align-items: center; gap: 0.4rem;
        font-size: 0.8rem; color: #dfdddd; text-decoration: none;
        padding: 0.3rem 0.6rem; border-radius: 6px; border: 1px solid #dfdddd; transition: all 0.15s ease;
    }
    .bp-invoice-dl:hover { border-color: var(--accent); color: var(--accent); }
    .bp-empty { text-align: center; padding: 2.5rem; color: var(--text-muted); font-size: 0.9rem; }

    .bp-no-sub { text-align: center; padding: 3rem 2rem; }
    .bp-no-sub h2 { font-size: 1.4rem; font-weight: 700; margin-bottom: 0.75rem; }
    .bp-no-sub p  { color: var(--text-secondary); font-size: 0.95rem; margin-bottom: 1.5rem; }

    @media (max-width: 640px) {
        .bp-card { padding: 1.5rem; }
        .bp-plan-row { flex-direction: column; }
        .cp-modal { padding: 1.5rem; }
        .bp-table th:nth-child(3), .bp-table td:nth-child(3) { display: none; }
    }
</style>

<div class="bp">
<div class="bp-wrap">

    <div class="bp-header">
        <h1>Billing & Subscription</h1>
        <p>Manage your plan, view invoices, and update payment details.</p>
    </div>

    <?php if(session('success')): ?>
        <div class="bp-flash success">✓ <?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="bp-flash error">⚠ <?php echo e(session('error')); ?></div>
    <?php endif; ?>
    <?php if(session('upgrade_prompt')): ?>
        <div class="bp-flash info">↑ <?php echo e(session('upgrade_prompt')); ?></div>
    <?php endif; ?>

    <?php if($subscription): ?>

        
        <?php if($scheduledChange ?? null): ?>
        <?php
            $scheduledPlanRank    = ['personal' => 1, 'professional' => 2, 'business' => 3];
            $currentPlanRank      = $scheduledPlanRank[$subscription->plan_name->value] ?? 0;
            $scheduledTargetRank  = $scheduledPlanRank[$scheduledChange['plan']] ?? 0;
            $isScheduledUpgrade   = $scheduledTargetRank > $currentPlanRank;
        ?>
        <div class="bp-scheduled-card">
            <div class="bp-scheduled-title">
                <?php echo e($isScheduledUpgrade ? '↑ Upgrade Scheduled' : '↓ Downgrade Scheduled'); ?>

            </div>
            <div class="bp-scheduled-header">
                <div>
                    <div class="bp-scheduled-plan">
                        <span class="from"><?php echo e($subscription->plan_name->label()); ?> (<?php echo e(ucfirst($subscription->billing_cycle)); ?>)</span>
                        <span class="arrow">→</span>
                        <span class="to"><?php echo e(ucfirst($scheduledChange['plan'])); ?> (<?php echo e(ucfirst($scheduledChange['billing'])); ?>)</span>
                    </div>
                    <?php
                        $nextPrice    = $scheduledChange['billing'] === 'annual'
                            ? config("plans.{$scheduledChange['plan']}.price_annual")
                            : config("plans.{$scheduledChange['plan']}.price_monthly");
                        $nextPricePer = $scheduledChange['billing'] === 'annual' ? 'year' : 'month';
                        $nextLimits   = config("plans.{$scheduledChange['plan']}");
                    ?>
                    <div style="display:flex;flex-wrap:wrap;gap:1.5rem;margin-top:0.75rem;">
                        <div>
                            <div style="font-size:0.7rem;color:#4db8ff;font-family:var(--font-mono);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:0.2rem;">New Price</div>
                            <div style="font-weight:700;font-size:1rem;">$<?php echo e($nextPrice); ?><span style="font-size:0.8rem;font-weight:400;color:var(--text-muted);">/<?php echo e($nextPricePer); ?></span></div>
                        </div>
                        <div>
                            <div style="font-size:0.7rem;color:#4db8ff;font-family:var(--font-mono);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:0.2rem;">Submissions</div>
                            <div style="font-weight:700;font-size:1rem;"><?php echo e($nextLimits['submissions'] === -1 ? 'Unlimited' : number_format($nextLimits['submissions'])); ?></div>
                        </div>
                        <div>
                            <div style="font-size:0.7rem;color:#4db8ff;font-family:var(--font-mono);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:0.2rem;">Team Members</div>
                            <div style="font-weight:700;font-size:1rem;"><?php echo e($nextLimits['team_members'] === -1 ? 'Unlimited' : $nextLimits['team_members']); ?></div>
                        </div>
                        <div>
                            <div style="font-size:0.7rem;color:#4db8ff;font-family:var(--font-mono);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:0.2rem;">Effective On</div>
                            <div style="font-weight:700;font-size:1rem;"><?php echo e($scheduledChange['effective_at']); ?></div>
                        </div>
                    </div>
                    <div class="bp-scheduled-date" style="margin-top:0.75rem;">
                        Your current plan and limits remain active until <strong><?php echo e($scheduledChange['effective_at']); ?></strong>.</div>
                </div>
                <form method="POST" action="<?php echo e(route('billing.cancel-scheduled-change')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="bp-btn bp-btn-blue"
                            onclick="return confirm('Cancel the scheduled plan change? You will stay on your current plan.')">
                        ✕ Cancel Scheduled Change
                    </button>
                </form>
            </div>
        </div>
        <?php endif; ?>

        
        <div class="bp-card">
            <div class="bp-card-title">Current Plan</div>
            <div class="bp-plan-row">
                <div>
                    <div style="display:flex;align-items:center;gap:1rem;flex-wrap:wrap;margin-bottom:0.5rem;">
                        <div class="bp-plan-name"><?php echo e($subscription->plan_name->label()); ?></div>
                        <span class="bp-status <?php echo e($subscription->status->value); ?>">
                            <span class="bp-status-dot"></span>
                            <?php echo e($subscription->statusLabel()); ?>

                        </span>
                    </div>
                    <div class="bp-plan-price">
                        <?php if($subscription->billing_cycle === 'annual'): ?>
                            <strong>$<?php echo e(config("plans.{$subscription->plan_name->value}.price_annual")); ?></strong> / year
                            <span style="color:var(--accent);font-size:0.8rem;margin-left:0.5rem;">20% off</span>
                        <?php else: ?>
                            <strong>$<?php echo e(config("plans.{$subscription->plan_name->value}.price_monthly")); ?></strong> / month
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php if($subscription->onGracePeriod()): ?>
                <div class="bp-banner warning">
                    <span class="bp-banner-icon">⚠</span>
                    <div>
                        Your plan is cancelled. Full access until
                        <strong><?php echo e($subscription->current_period_end?->format('M d, Y')); ?></strong>.
                        After that your account switches to the Free plan (50 submissions/month).
                    </div>
                </div>
            <?php endif; ?>

            <?php if($subscription->onPaymentGracePeriod()): ?>
                <div class="bp-banner danger">
                    <span class="bp-banner-icon">✕</span>
                    <div>
                        Your last payment failed. Update your payment method to keep access.
                        Grace period ends <strong><?php echo e($subscription->grace_period_ends_at?->format('M d, Y')); ?></strong>.
                        <a href="<?php echo e(route('billing.portal-link')); ?>" style="color:inherit;text-decoration:underline;margin-left:0.25rem;">Update now →</a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($subscription->isTrialing()): ?>
                <div class="bp-banner info">
                    <span class="bp-banner-icon">◷</span>
                    <div>
                        Your trial ends on <strong><?php echo e($subscription->trial_ends_at?->format('M d, Y')); ?></strong>.
                        <a href="<?php echo e(route('billing.portal-link')); ?>" style="color:inherit;text-decoration:underline;margin-left:0.25rem;">Add card →</a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($subscription->status->value === 'paused'): ?>
                <div class="bp-banner warning">
                    <span class="bp-banner-icon">⏸</span>
                    <div>Your subscription is paused. Resume below to restore access.</div>
                </div>
            <?php endif; ?>
        </div>

        
        <div class="bp-card">
            <div class="bp-card-title">Billing Details</div>
            <div class="bp-details-grid">
                <div>
                    <div class="bp-detail-label">Plan started</div>
                    <div class="bp-detail-value"><?php echo e($subscription->created_at?->format('M d, Y') ?? '—'); ?></div>
                </div>
                <div>
                    <div class="bp-detail-label">Current period</div>
                    <div class="bp-detail-value">
                        <?php echo e($subscription->current_period_start?->format('M d') ?? '—'); ?>

                        → <?php echo e($subscription->current_period_end?->format('M d, Y') ?? '—'); ?>

                    </div>
                </div>
                <div>
                    <div class="bp-detail-label">
                        <?php if($subscription->cancel_at_period_end): ?> Cancels on <?php else: ?> Next renewal <?php endif; ?>
                    </div>
                    <div class="bp-detail-value <?php echo e($subscription->cancel_at_period_end ? '' : 'accent'); ?>">
                        <?php echo e($subscription->nextBillingLabel()); ?>

                    </div>
                </div>
                <div>
                    <div class="bp-detail-label">Billing cycle</div>
                    <div class="bp-detail-value"><?php echo e(ucfirst($subscription->billing_cycle)); ?></div>
                </div>
                <div>
                    <div class="bp-detail-label">Last payment</div>
                    <div class="bp-detail-value"><?php echo e($subscription->last_payment_at?->format('M d, Y') ?? '—'); ?></div>
                </div>
                <div>
                    <div class="bp-detail-label">Payment method</div>
                    <div class="bp-detail-value">
                        <a href="<?php echo e(route('billing.portal-link')); ?>" class="bp-invoice-dl">Update card →</a>
                    </div>
                </div>
            </div>

            <?php
                $limit    = $subscription->submissions_limit;
                $used     = $subscription->submissions_used;
                $pct      = $subscription->submissionsUsedPercent();
                $barClass = $pct >= 100 ? 'danger' : ($pct >= 80 ? 'warning' : '');
            ?>
            <div class="bp-usage">
                <div class="bp-usage-header">
                    <span class="bp-usage-label">Submissions this period</span>
                    <span class="bp-usage-count">
                        <?php echo e(number_format($used)); ?> / <?php echo e($limit === -1 ? '∞' : number_format($limit)); ?>

                    </span>
                </div>
                <div class="bp-usage-track">
                    <div class="bp-usage-fill <?php echo e($barClass); ?>"
                         style="width: <?php echo e($limit === -1 ? '10' : $pct); ?>%"></div>
                </div>
                <?php if($pct >= 80 && $limit !== -1): ?>
                    <p style="font-size:0.8rem;color:#ffa500;margin-top:0.5rem;">
                        You've used <?php echo e($pct); ?>% of your limit.
                    </p>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="bp-card">
            <div class="bp-card-title">Plan Features</div>
            <?php $limits = $subscription->plan_name->limits(); ?>
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1rem;">
                <div>
                    <div class="bp-detail-label">Submissions / month</div>
                    <div class="bp-detail-value accent">
                        <?php echo e($limits['submissions'] === -1 ? 'Unlimited' : number_format($limits['submissions'])); ?>

                    </div>
                </div>
                <div>
                    <div class="bp-detail-label">Forms</div>
                    <div class="bp-detail-value accent">
                        <?php echo e($limits['forms'] === -1 ? 'Unlimited' : $limits['forms']); ?>

                    </div>
                </div>
                <div>
                    <div class="bp-detail-label">Team members</div>
                    <div class="bp-detail-value accent">
                        <?php echo e($limits['team_members'] === -1 ? 'Unlimited' : $limits['team_members']); ?>

                    </div>
                </div>
                <div>
                    <div class="bp-detail-label">File uploads</div>
                    <div class="bp-detail-value accent">
                        <?php echo e($limits['file_upload_mb'] === 0 ? 'Not included' : $limits['file_upload_mb'] . ' MB'); ?>

                    </div>
                </div>
            </div>
        </div>

        
        <div class="bp-card">
            <div class="bp-card-title">Manage Subscription</div>
            <div class="bp-actions">

                <a href="<?php echo e(route('billing.portal-link')); ?>" class="bp-btn bp-btn-outline">
                    💳 Update Payment Method
                </a>

                <?php if($subscription->isActive() && !$subscription->cancel_at_period_end): ?>
                    <button type="button" class="bp-btn bp-btn-outline" onclick="openChangePlan()">
                        ↕ Change Plan
                    </button>
                <?php endif; ?>

                <?php if($subscription->onGracePeriod()): ?>
                    <form method="POST" action="<?php echo e(route('billing.resume')); ?>" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="bp-btn bp-btn-resume">▶ Reactivate Subscription</button>
                    </form>
                <?php endif; ?>

                <?php if($subscription->isActive() && !$subscription->cancel_at_period_end): ?>
                    <form method="POST" action="<?php echo e(route('billing.cancel')); ?>" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="bp-btn bp-btn-danger"
                                onclick="return confirm('Cancel your subscription? You keep full access until <?php echo e($subscription->current_period_end?->format('M d, Y')); ?>. After that you switch to the free plan (50 submissions/month).')">
                            ✕ Cancel Subscription
                        </button>
                    </form>
                <?php endif; ?>

            </div>

            <?php if($subscription->isActive() && !$subscription->cancel_at_period_end): ?>
                <p style="font-size:0.8rem;color:var(--text-muted);margin-top:1rem;">
                    Cancelling keeps your access active until <?php echo e($subscription->current_period_end?->format('M d, Y')); ?>.
                    After that your account automatically switches to the free plan with 50 submissions/month.
                </p>
            <?php endif; ?>
        </div>

        
        <div class="bp-card">
            <div class="bp-card-title">Invoice History</div>
            <?php if($invoices->count()): ?>
                <table class="bp-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Transaction ID</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Invoice</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($invoice->paid_at?->format('M d, Y') ?? '—'); ?></td>
                                <td>
                                    <?php echo e($subscription->plan_name->label()); ?> —
                                    <?php echo e(ucfirst($subscription->billing_cycle)); ?>

                                </td>
                                <td>
                                    <span style="font-family:var(--font-mono);font-size:0.72rem;color:var(--text-muted);">
                                        <?php echo e($invoice->paddle_transaction_id ?? '—'); ?>

                                    </span>
                                </td>
                                <td>
                                    <?php
                                        $sym   = match(strtoupper($invoice->currency ?? 'USD')) {
                                            'INR' => '₹', 'GBP' => '£', 'EUR' => '€',
                                            'JPY' => '¥', 'AUD' => 'A$', 'CAD' => 'C$', default => '$',
                                        };
                                        $noDec = in_array(strtoupper($invoice->currency ?? 'USD'), ['INR','JPY','KRW','VND']);
                                        $amt   = number_format($invoice->amount_cents / 100, $noDec ? 0 : 2);
                                    ?>
                                    <span class="bp-invoice-amount"><?php echo e($sym); ?><?php echo e($amt); ?></span>
                                </td>
                                <td>
                                    <span class="bp-invoice-status <?php echo e($invoice->status); ?>">
                                        <?php echo e(ucfirst($invoice->status)); ?>

                                    </span>
                                </td>
                                <td>
                                    <?php if($invoice->invoice_url): ?>
                                        <a href="<?php echo e($invoice->invoice_url); ?>" target="_blank" class="bp-invoice-dl">↓ PDF</a>
                                    <?php else: ?>
                                        <span style="color:var(--text-muted);font-size:0.8rem;">—</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="bp-empty">
                    No invoices yet. Your first invoice will appear here after your next payment.
                </div>
            <?php endif; ?>
        </div>

    <?php else: ?>

        <div class="bp-card">
            <div class="bp-no-sub">
                <div style="font-size:2.5rem;margin-bottom:1rem;">📋</div>
                <h2>You're on the Free Plan</h2>
                <p>
                    You currently have 50 submissions/month.<br>
                    Upgrade to unlock more submissions, team members and features.
                </p>
                <a href="<?php echo e(route('pricing')); ?>" class="bp-btn bp-btn-primary" style="display:inline-flex;">
                    View Plans & Upgrade →
                </a>
            </div>
        </div>

    <?php endif; ?>

</div>
</div>


<?php if($subscription ?? false): ?>
<?php
    $currentPlan    = $subscription->plan_name->value;
    $currentBilling = $subscription->billing_cycle;
    $planRank       = ['personal' => 1, 'professional' => 2, 'business' => 3];
    $currentRank    = $planRank[$currentPlan] ?? 0;
    $nextRenewal    = $subscription->next_billing_date?->format('M d, Y') ?? 'next renewal';
    $scheduledPlan  = $subscription->scheduled_plan ?? null;

    $allPlans = [
        'personal' => [
            'label'    => 'Personal',
            'sub'      => '200 submissions/mo · 1 team member',
            'rank'     => 1,
            'price_mo' => config('plans.personal.price_monthly'),
            'price_yr' => config('plans.personal.price_annual'),
        ],
        'professional' => [
            'label'    => 'Professional',
            'sub'      => '2,000 submissions/mo · 2 team members',
            'rank'     => 2,
            'price_mo' => config('plans.professional.price_monthly'),
            'price_yr' => config('plans.professional.price_annual'),
        ],
        'business' => [
            'label'    => 'Business',
            'sub'      => 'Unlimited submissions · Unlimited team members',
            'rank'     => 3,
            'price_mo' => config('plans.business.price_monthly'),
            'price_yr' => config('plans.business.price_annual'),
        ],
    ];
?>

<div class="cp-overlay" id="changePlanModal" style="display:none;">
    <div class="cp-modal">
        <div class="cp-modal-header">
            <div class="cp-modal-title">Change Plan</div>
            <button class="cp-close" onclick="closeChangePlan()">×</button>
        </div>
        <div class="cp-modal-sub">
            Current: <strong><?php echo e(ucfirst($currentPlan)); ?> / <?php echo e(ucfirst($currentBilling)); ?></strong>
            &nbsp;·&nbsp; Next renewal: <strong><?php echo e($nextRenewal); ?></strong>
            <?php if($scheduledPlan): ?>
                &nbsp;·&nbsp; <span style="color:#4db8ff;">Scheduled: <?php echo e(ucfirst($scheduledPlan)); ?></span>
            <?php endif; ?>
        </div>

        <div class="cp-plans">
            <?php $__currentLoopData = $allPlans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planKey => $planData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $isCurrent   = ($planKey === $currentPlan);
                    $isScheduled = ($planKey === $scheduledPlan);
                    $isUpgrade   = $planData['rank'] > $currentRank;
                    $isDowngrade = $planData['rank'] < $currentRank;
                ?>

                <div class="cp-plan-card <?php echo e($isCurrent ? 'current' : ($isScheduled ? 'scheduled' : '')); ?>"
                     id="card-<?php echo e($planKey); ?>">
                    <div class="cp-plan-top">
                        <div>
                            <div class="cp-plan-name">
                                <?php echo e($planData['label']); ?>

                                <?php if($isCurrent): ?>
                                    <span class="cp-current-badge">Current Plan</span>
                                <?php elseif($isScheduled): ?>
                                    <span class="cp-scheduled-badge">Scheduled</span>
                                <?php elseif($isUpgrade): ?>
                                    <span style="font-size:0.7rem;color:var(--accent);font-weight:600;">↑ Upgrade</span>
                                <?php else: ?>
                                    <span style="font-size:0.7rem;color:#ffa500;font-weight:600;">↓ Downgrade</span>
                                <?php endif; ?>
                            </div>
                            <div class="cp-plan-desc"><?php echo e($planData['sub']); ?></div>
                        </div>
                    </div>

                    <?php if($isCurrent): ?>
                        <div style="font-size:0.85rem;color:var(--accent);font-weight:600;">
                            ✓ You are on this plan (<?php echo e(ucfirst($currentBilling)); ?>)
                        </div>

                    <?php elseif($isScheduled): ?>
                        <div style="font-size:0.85rem;color:#4db8ff;font-weight:600;margin-bottom:0.75rem;">
                            ◷ Switching to this plan on <?php echo e($nextRenewal); ?>

                        </div>
                        <div style="font-size:0.8rem;color:var(--text-muted);">
                            To cancel this scheduled change, close this modal and click
                            <strong>"✕ Cancel Scheduled Change"</strong> at the top of the page.
                        </div>

                    <?php else: ?>
                        
                        <div class="cp-billing-toggle">
                            <div class="cp-billing-opt active"
                                 id="toggle-mo-<?php echo e($planKey); ?>"
                                 onclick="setBilling('<?php echo e($planKey); ?>', 'monthly')">
                                Monthly
                                <span class="cp-save" style="color:var(--text-muted);">$<?php echo e($planData['price_mo']); ?>/mo</span>
                            </div>
                            <div class="cp-billing-opt"
                                 id="toggle-yr-<?php echo e($planKey); ?>"
                                 onclick="setBilling('<?php echo e($planKey); ?>', 'annual')">
                                Annual
                                <span class="cp-save" style="color:var(--text-muted);">$<?php echo e($planData['price_yr']); ?>/yr</span>
                            </div>
                        </div>

                        
                        <div class="cp-price-display" id="price-<?php echo e($planKey); ?>">
                            $<?php echo e($planData['price_mo']); ?> <span>/ month</span>
                        </div>

                        <input type="hidden" id="billing-<?php echo e($planKey); ?>" value="monthly">

                        <div class="cp-actions">
                            <?php if($isUpgrade): ?>
                                <form method="POST" action="<?php echo e(route('billing.change-plan')); ?>" id="form-now-<?php echo e($planKey); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="plan"    value="<?php echo e($planKey); ?>">
                                    <input type="hidden" name="billing" id="billing-now-<?php echo e($planKey); ?>" value="monthly">
                                    <input type="hidden" name="when"    value="immediately">
                                    <button type="button" class="cp-btn cp-btn-now"
                                            onclick="submitPlanChange('<?php echo e($planKey); ?>', 'immediately', '<?php echo e($planData['label']); ?>')">
                                        ↑ Upgrade Now
                                    </button>
                                </form>
                                <form method="POST" action="<?php echo e(route('billing.change-plan')); ?>" id="form-renewal-<?php echo e($planKey); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="plan"    value="<?php echo e($planKey); ?>">
                                    <input type="hidden" name="billing" id="billing-renewal-<?php echo e($planKey); ?>" value="monthly">
                                    <input type="hidden" name="when"    value="next_billing_period">
                                    <button type="button" class="cp-btn cp-btn-renewal"
                                            onclick="submitPlanChange('<?php echo e($planKey); ?>', 'next_billing_period', '<?php echo e($planData['label']); ?>')">
                                        ↑ At Renewal
                                    </button>
                                </form>

                            <?php elseif($isDowngrade): ?>
                                <form method="POST" action="<?php echo e(route('billing.change-plan')); ?>" id="form-renewal-<?php echo e($planKey); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="plan"    value="<?php echo e($planKey); ?>">
                                    <input type="hidden" name="billing" id="billing-renewal-<?php echo e($planKey); ?>" value="monthly">
                                    <input type="hidden" name="when"    value="next_billing_period">
                                    <button type="button" class="cp-btn cp-btn-downgrade"
                                            onclick="submitPlanChange('<?php echo e($planKey); ?>', 'next_billing_period', '<?php echo e($planData['label']); ?>')">
                                        ↓ Downgrade at Renewal
                                    </button>
                                </form>
                                <div class="cp-downgrade-note">
                                    ⚠ Downgrade takes effect on <?php echo e($nextRenewal); ?>. Current limits remain until then.
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="cp-legend">
            <strong>Upgrade Now:</strong> Full plan price charged immediately. New limits active right away.<br>
            <strong>At Renewal:</strong> No charge today. Change takes effect on <?php echo e($nextRenewal); ?>.<br>
            <strong>Downgrade:</strong> Only available at renewal — current limits stay until <?php echo e($nextRenewal); ?>.
        </div>
    </div>
</div>

<script>
    const planPrices = {
        <?php $__currentLoopData = $allPlans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planKey => $planData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        '<?php echo e($planKey); ?>': { mo: <?php echo e($planData['price_mo']); ?>, yr: <?php echo e($planData['price_yr']); ?> },
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    };

    function setBilling(planKey, cycle) {
        document.getElementById('toggle-mo-' + planKey).classList.toggle('active', cycle === 'monthly');
        document.getElementById('toggle-yr-' + planKey).classList.toggle('active', cycle === 'annual');

        const prices  = planPrices[planKey];
        const priceEl = document.getElementById('price-' + planKey);
        priceEl.innerHTML = cycle === 'monthly'
            ? '$' + prices.mo + ' <span>/ month</span>'
            : '$' + prices.yr + ' <span>/ year</span>';

        document.getElementById('billing-' + planKey).value = cycle;
        ['billing-now-' + planKey, 'billing-renewal-' + planKey].forEach(id => {
            const el = document.getElementById(id);
            if (el) el.value = cycle;
        });
    }

    function submitPlanChange(planKey, when, planLabel) {
        const billing      = document.getElementById('billing-' + planKey)?.value || 'monthly';
        const billingLabel = billing === 'monthly' ? 'Monthly' : 'Annual';
        let msg = '';

        if (when === 'immediately') {
            msg = '⚠ Upgrade to ' + planLabel + ' (' + billingLabel + ')\n\n'
                + 'You are about to upgrade your plan.\n\n'
                + '• The full ' + billingLabel.toLowerCase() + ' price will be automatically deducted from your saved payment method.\n'
                + '• Your new plan limits will be active immediately after payment.\n'
                + '• No additional action is required — payment happens automatically.\n\n'
                + 'Confirm upgrade?';
        } else {
            msg = 'Switch to ' + planLabel + ' (' + billingLabel + ') at next renewal (<?php echo e($nextRenewal); ?>)?\n\n'
                + '• No charge today.\n'
                + '• Change takes effect on <?php echo e($nextRenewal); ?>.\n'
                + '• You will be billed the new plan price on that date.';
        }

        if (!confirm(msg)) return;

        const formId = when === 'immediately' ? 'form-now-' + planKey : 'form-renewal-' + planKey;
        const form   = document.getElementById(formId);
        if (form) form.submit();
    }

    function openChangePlan()  {
        document.getElementById('changePlanModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    function closeChangePlan() {
        document.getElementById('changePlanModal').style.display = 'none';
        document.body.style.overflow = '';
    }
    document.getElementById('changePlanModal')?.addEventListener('click', function(e) {
        if (e.target === this) closeChangePlan();
    });
</script>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Git-folders\000form.com\resources\views/billing/portal.blade.php ENDPATH**/ ?>