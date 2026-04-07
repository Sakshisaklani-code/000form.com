

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

    .bp-scheduled-card {
        background: rgba(0,136,255,0.05); border: 1px solid rgba(0,136,255,0.35);
        border-radius: 20px; padding: 1.5rem; margin-bottom: 1.5rem;
    }
    .bp-scheduled-header { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem; }
    .bp-scheduled-title {
        font-size: 0.7rem; font-family: var(--font-mono); font-weight: 600;
        letter-spacing: 0.1em; text-transform: uppercase; color: #4db8ff; margin-bottom: 0.75rem;
    }
    .bp-scheduled-plan { font-size: 1.1rem; font-weight: 700; }
    .bp-scheduled-plan .from { color: var(--text-muted); }
    .bp-scheduled-plan .arrow { color: var(--text-muted); margin: 0 0.5rem; }
    .bp-scheduled-plan .to { color: #4db8ff; }
    .bp-scheduled-date { font-size: 0.85rem; color: var(--text-muted); margin-top: 0.3rem; }
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

    /* ══════════════════════════════════════════
       CHANGE PLAN MODAL — Redesigned
    ══════════════════════════════════════════ */
    .cp-overlay {
        position: fixed; inset: 0; background: rgba(0,0,0,0.75);
        display: flex; align-items: center; justify-content: center;
        z-index: 1000; padding: 1rem;
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
    }
    .cp-modal {
        background: var(--bg-card); border: 1px solid var(--border-color);
        border-radius: 24px; width: 100%; max-width: 900px;
        max-height: 92vh; overflow-y: auto;
        box-shadow: 0 32px 80px rgba(0,0,0,0.5);
        animation: cpSlideIn 0.25s cubic-bezier(0.34,1.56,0.64,1) forwards;
    }
    @keyframes cpSlideIn {
        from { opacity: 0; transform: translateY(24px) scale(0.97); }
        to   { opacity: 1; transform: translateY(0) scale(1); }
    }

    /* Modal header */
    .cp-modal-head {
        display: flex; align-items: center; justify-content: space-between;
        padding: 1.75rem 2rem 0;
    }
    .cp-modal-title  { font-size: 1.35rem; font-weight: 700; letter-spacing: -0.02em; }
    .cp-close {
        width: 36px; height: 36px; border-radius: 50%;
        background: var(--bg-secondary); border: 1px solid var(--border-color);
        color: var(--text-muted); font-size: 1.1rem;
        cursor: pointer; display: flex; align-items: center; justify-content: center;
        transition: all 0.15s; line-height: 1; flex-shrink: 0;
    }
    .cp-close:hover { color: var(--text-primary); background: var(--bg-tertiary); border-color: var(--border-hover); }

    .cp-modal-meta {
        font-size: 0.82rem; color: var(--text-muted);
        padding: 0.5rem 2rem 1.25rem;
        border-bottom: 1px solid var(--border-color);
    }
    .cp-modal-meta strong { color: var(--text-secondary); }

    /* Billing toggle inside modal */
    .cp-billing-row {
        display: flex; align-items: center; justify-content: space-between;
        padding: 1.25rem 2rem 0; flex-wrap: wrap; gap: 1rem;
    }
    .cp-billing-row-label {
        font-size: 0.72rem; font-family: var(--font-mono); font-weight: 600;
        letter-spacing: 0.08em; text-transform: uppercase; color: var(--text-muted);
    }
    .cp-billing-switch {
        display: flex; background: var(--bg-secondary);
        border: 1px solid var(--border-color); border-radius: 100px; padding: 3px; gap: 2px;
    }
    .cp-billing-switch-opt {
        padding: 0.4rem 1rem; border-radius: 100px;
        font-size: 0.78rem; font-weight: 600; cursor: pointer;
        transition: all 0.18s; color: var(--text-muted); user-select: none; white-space: nowrap;
    }
    .cp-billing-switch-opt.active {
        background: var(--accent); color: var(--bg-primary);
        box-shadow: 0 2px 8px rgba(0,255,136,0.3);
    }
    .cp-billing-switch-opt .save-tag {
        font-size: 0.6rem; font-family: var(--font-mono);
        background: rgba(0,0,0,0.2); border-radius: 4px;
        padding: 0.1rem 0.35rem; margin-left: 0.3rem; letter-spacing: 0.04em;
    }

    /* Plans grid */
    .cp-plans-grid {
        display: grid; grid-template-columns: repeat(3, 1fr);
        gap: 1rem; padding: 1.25rem 2rem 1.5rem;
    }
    @media (max-width: 600px) {
        .cp-plans-grid { grid-template-columns: 1fr; }
        .cp-modal-head, .cp-modal-meta, .cp-billing-row, .cp-legend { padding-left: 1.25rem; padding-right: 1.25rem; }
        .cp-plans-grid { padding: 1rem 1.25rem 1.25rem; }
    }

    /* Plan card */
    .cp-plan-card {
        position: relative; border-radius: 16px;
        border: 1px solid var(--border-color);
        background: var(--bg-secondary);
        padding: 1.25rem; display: flex; flex-direction: column; gap: 0;
        transition: border-color 0.2s, box-shadow 0.2s, transform 0.15s;
        overflow: hidden;
    }
    .cp-plan-card:not(.current):not(.cp-plan-disabled):hover {
        border-color: rgba(0,255,136,0.4);
        box-shadow: 0 8px 24px rgba(0,255,136,0.08);
        transform: translateY(-2px);
    }
    .cp-plan-card.current {
        border-color: var(--accent);
        background: rgba(0,255,136,0.04);
        box-shadow: 0 0 0 1px rgba(0,255,136,0.15);
    }
    .cp-plan-card.cp-plan-scheduled {
        border-color: rgba(0,136,255,0.5);
        background: rgba(0,136,255,0.04);
    }
    .cp-plan-card.cp-plan-disabled {
        opacity: 0.45; filter: grayscale(0.3);
        cursor: not-allowed; pointer-events: none;
    }

    /* Recommended glow strip */
    .cp-plan-card.cp-plan-recommended::before {
        content: ''; position: absolute; top: 0; left: 0; right: 0;
        height: 2px; background: linear-gradient(90deg, transparent, var(--accent), transparent);
    }

    /* Top ribbon */
    .cp-plan-ribbon {
        position: absolute; top: 0; right: 0;
        font-family: var(--font-mono); font-size: 0.58rem; font-weight: 700;
        letter-spacing: 0.08em; text-transform: uppercase;
        padding: 0.3rem 0.75rem;
        border-radius: 0 16px 0 10px;
    }
    .cp-plan-ribbon.ribbon-current  { background: var(--accent); color: var(--bg-primary); }
    .cp-plan-ribbon.ribbon-upgrade  { background: rgba(0,255,136,0.15); color: var(--accent); border: 1px solid rgba(0,255,136,0.3); border-top: none; border-right: none; }
    .cp-plan-ribbon.ribbon-scheduled { background: rgba(0,136,255,0.15); color: #4db8ff; border: 1px solid rgba(0,136,255,0.3); border-top: none; border-right: none; }
    .cp-plan-ribbon.ribbon-disabled { background: rgba(150,150,150,0.1); color: var(--text-muted); border: 1px solid var(--border-color); border-top: none; border-right: none; }

    /* Plan name & price */
    .cp-plan-name {
        font-size: 0.95rem; font-weight: 700; color: var(--text-primary);
        margin-bottom: 0.75rem; padding-right: 3.5rem; /* avoid ribbon overlap */
    }
    .cp-plan-price-area { margin-bottom: 1rem; }
    .cp-plan-price-val {
        font-size: 1.6rem; font-weight: 700; color: var(--text-primary);
        letter-spacing: -0.03em; line-height: 1;
        transition: opacity 0.15s;
    }
    .cp-plan-price-val .cp-price-loading {
        font-size: 0.8rem; font-weight: 400; color: var(--text-muted); font-style: italic;
    }
    .cp-plan-price-per { font-size: 0.78rem; color: var(--text-muted); margin-top: 0.2rem; }

    /* Features list */
    .cp-plan-features {
        list-style: none; display: flex; flex-direction: column;
        gap: 0.45rem; margin-bottom: 1.25rem; flex: 1;
    }
    .cp-plan-feat {
        font-size: 0.78rem; color: var(--text-secondary);
        display: flex; align-items: center; gap: 0.45rem;
    }
    .cp-plan-feat .feat-icon { color: var(--accent); font-size: 0.7rem; flex-shrink: 0; }
    .cp-plan-card.cp-plan-disabled .cp-plan-feat .feat-icon { color: var(--text-muted); }

    /* CTA button inside card */
    .cp-card-btn {
        display: flex; align-items: center; justify-content: center; gap: 0.4rem;
        width: 100%; padding: 0.65rem 1rem; border-radius: 10px;
        font-size: 0.82rem; font-weight: 600; cursor: pointer;
        transition: all 0.15s; border: none; text-align: center; white-space: nowrap;
        font-family: var(--font-display);
    }
    .cp-card-btn-upgrade {
        background: var(--accent); color: var(--bg-primary);
    }
    .cp-card-btn-upgrade:hover { opacity: 0.88; transform: translateY(-1px); }
    .cp-card-btn-current {
        background: rgba(0,255,136,0.1); color: var(--accent);
        border: 1px solid rgba(0,255,136,0.3); cursor: default;
    }
    .cp-card-btn-scheduled {
        background: rgba(0,136,255,0.1); color: #4db8ff;
        border: 1px solid rgba(0,136,255,0.25); cursor: default; font-size: 0.75rem;
    }
    .cp-card-btn-disabled {
        background: var(--bg-tertiary); color: var(--text-muted);
        border: 1px solid var(--border-color); cursor: not-allowed; opacity: 0.6;
    }

    /* "Upgrade now" vs "At renewal" sub-buttons */
    .cp-card-actions { display: flex; flex-direction: column; gap: 0.5rem; }
    .cp-card-btn-now {
        background: var(--accent); color: var(--bg-primary);
    }
    .cp-card-btn-now:hover { opacity: 0.88; }
    .cp-card-btn-renewal {
        background: transparent; color: var(--text-secondary);
        border: 1px solid var(--border-color); font-size: 0.75rem;
    }
    .cp-card-btn-renewal:hover { border-color: var(--accent); color: var(--accent); background: rgba(0,255,136,0.04); }

    /* Legend */
    .cp-legend {
        font-size: 0.75rem; color: var(--text-muted);
        padding: 1rem 2rem 1.5rem;
        border-top: 1px solid var(--border-color);
        line-height: 1.7; display: flex; flex-wrap: wrap; gap: 0.25rem 2rem;
    }
    .cp-legend span { display: flex; align-items: center; gap: 0.35rem; }

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
        .bp-table th:nth-child(3), .bp-table td:nth-child(3) { display: none; }
        .cp-legend span { display: block;}
    }
</style>


<script src="https://cdn.paddle.com/paddle/v2/paddle.js"></script>

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
            $scheduledPlanRank   = ['personal' => 1, 'professional' => 2, 'business' => 3];
            $currentPlanRank     = $scheduledPlanRank[$subscription->plan_name->value] ?? 0;
            $scheduledTargetRank = $scheduledPlanRank[$scheduledChange['plan']] ?? 0;
            $isScheduledUpgrade  = $scheduledTargetRank > $currentPlanRank;
            $nextLimits          = config("plans.{$scheduledChange['plan']}");
        ?>
        <div class="bp-scheduled-card">
            <div class="bp-scheduled-title">
                <?php echo e($isScheduledUpgrade ? '↑ Upgrade Scheduled' : ' Plan Change Scheduled'); ?>

            </div>
            <div class="bp-scheduled-header">
                <div>
                    <div class="bp-scheduled-plan">
                        <span class="from"><?php echo e($subscription->plan_name->label()); ?> (<?php echo e(ucfirst($subscription->billing_cycle)); ?>)</span>
                        <span class="arrow">→</span>
                        <span class="to"><?php echo e(ucfirst($scheduledChange['plan'])); ?> (<?php echo e(ucfirst($scheduledChange['billing'])); ?>)</span>
                    </div>
                    <div style="display:flex;flex-wrap:wrap;gap:1.5rem;margin-top:0.75rem;">
                        <div>
                            <div style="font-size:0.7rem;color:#4db8ff;font-family:var(--font-mono);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:0.2rem;">New Price</div>
                            <div style="font-weight:700;font-size:1rem;" id="scheduled-price">
                                <span style="color:var(--text-muted);font-style:italic;font-size:0.8rem;">Loading...</span>
                            </div>
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
                        Your current plan and limits remain active until <strong><?php echo e($scheduledChange['effective_at']); ?></strong>.
                    </div>
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
                        <strong id="current-plan-price">
                            <?php if($subscription->billing_cycle === 'annual'): ?>
                                $<?php echo e(config("plans.{$subscription->plan_name->value}.price_annual")); ?>

                            <?php else: ?>
                                $<?php echo e(config("plans.{$subscription->plan_name->value}.price_monthly")); ?>

                            <?php endif; ?>
                        </strong>
                        / <?php echo e($subscription->billing_cycle === 'annual' ? 'year' : 'month'); ?>

                        <?php if($subscription->billing_cycle === 'annual'): ?>
                            <span style="color:var(--accent);font-size:0.8rem;margin-left:0.5rem;">20% off</span>
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
        'personal'     => [
            'label'     => 'Personal',
            'sub'       => 'For personal or portfolio sites',
            'rank'      => 1,
            'price_mo'  => config('plans.personal.price_monthly'),
            'price_yr'  => config('plans.personal.price_annual'),
            'paddle_mo' => config('plans.personal.paddle_monthly_id'),
            'paddle_yr' => config('plans.personal.paddle_annual_id'),
            'feats'     => ['200 submissions/mo', 'Unlimited forms', '1 team member', 'File uploads 10MB'],
        ],
        'professional' => [
            'label'     => 'Professional',
            'sub'       => 'For freelancers and startups',
            'rank'      => 2,
            'price_mo'  => config('plans.professional.price_monthly'),
            'price_yr'  => config('plans.professional.price_annual'),
            'paddle_mo' => config('plans.professional.paddle_monthly_id'),
            'paddle_yr' => config('plans.professional.paddle_annual_id'),
            'feats'     => ['2,000 submissions/mo', 'Unlimited forms', '2 team members', 'File uploads 10MB'],
        ],
        'business'     => [
            'label'     => 'Business',
            'sub'       => 'For organizations and agencies',
            'rank'      => 3,
            'price_mo'  => config('plans.business.price_monthly'),
            'price_yr'  => config('plans.business.price_annual'),
            'paddle_mo' => config('plans.business.paddle_monthly_id'),
            'paddle_yr' => config('plans.business.paddle_annual_id'),
            'feats'     => ['20,000 submissions/mo', 'Unlimited forms', '3 team members', 'File uploads 100MB'],
        ],
    ];

    $currentPaddleId = $currentBilling === 'annual'
        ? config("plans.{$currentPlan}.paddle_annual_id")
        : config("plans.{$currentPlan}.paddle_monthly_id");

    $scheduledPaddleId = null;
    if ($scheduledPlan) {
        $scheduledBilling  = $subscription->scheduled_billing ?? 'monthly';
        $scheduledPaddleId = $scheduledBilling === 'annual'
            ? config("plans.{$scheduledPlan}.paddle_annual_id")
            : config("plans.{$scheduledPlan}.paddle_monthly_id");
    }
?>

<div class="cp-overlay" id="changePlanModal" style="display:none;">
    <div class="cp-modal">

        
        <div class="cp-modal-head">
            <div class="cp-modal-title">Choose a Plan</div>
            <button class="cp-close" onclick="closeChangePlan()" aria-label="Close">×</button>
        </div>
        <div class="cp-modal-meta">
            Current: <strong><?php echo e(ucfirst($currentPlan)); ?> / <?php echo e(ucfirst($currentBilling)); ?></strong>
            &nbsp;·&nbsp; Next renewal: <strong><?php echo e($nextRenewal); ?></strong>
            <?php if($scheduledPlan): ?>
                &nbsp;·&nbsp; <span style="color:#4db8ff;">Scheduled → <?php echo e(ucfirst($scheduledPlan)); ?></span>
            <?php endif; ?>
        </div>

        
        <div class="cp-billing-row">
            <span class="cp-billing-row-label">Billing cycle</span>
            <div class="cp-billing-switch">
                <div class="cp-billing-switch-opt active" id="cp-toggle-mo" onclick="cpSetBilling('monthly')">
                    Monthly
                </div>
                <div class="cp-billing-switch-opt" id="cp-toggle-yr" onclick="cpSetBilling('annual')">
                    Annual
                    <!-- <span class="save-tag">Save 20%</span> -->
                </div>
            </div>
        </div>

        
        <div class="cp-plans-grid">
            <?php $__currentLoopData = $allPlans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planKey => $planData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                // Exact match: same plan AND same billing cycle → truly "current"
                $isCurrent      = ($planKey === $currentPlan && $planData['rank'] === $currentRank);
                // Same plan tier but different billing cycle (e.g. on monthly, want annual of same plan)
                $isBillingSwitch = ($planKey === $currentPlan);  // true for same plan regardless of cycle
                // We only treat it as "current" (fully locked) when plan AND billing match
                // isBillingSwitch but !isCurrent means same tier, different cycle → allow "At Renewal" switch
                $isScheduled    = ($planKey === $scheduledPlan);
                $isUpgrade      = $planData['rank'] > $currentRank;
                $isDowngrade    = $planData['rank'] < $currentRank;
                // Recommended = one tier above current
                $isRecommended  = ($planData['rank'] === $currentRank + 1);

                $cardClass = '';
                if ($isCurrent)          $cardClass = 'current';
                elseif ($isScheduled)    $cardClass = 'cp-plan-scheduled';
                elseif ($isDowngrade)    $cardClass = 'cp-plan-disabled';
                if ($isRecommended && !$isCurrent) $cardClass .= ' cp-plan-recommended';
            ?>
            <div class="cp-plan-card <?php echo e($cardClass); ?>" id="cpcard-<?php echo e($planKey); ?>">

                
                <?php if($isCurrent): ?>
                    <div class="cp-plan-ribbon ribbon-current">Your Plan</div>
                <?php elseif($isScheduled): ?>
                    <div class="cp-plan-ribbon ribbon-scheduled">Scheduled</div>
                <?php elseif($isBillingSwitch && !$isCurrent): ?>
                    <div class="cp-plan-ribbon ribbon-upgrade">Switch Billing</div>
                <?php elseif($isUpgrade): ?>
                    <div class="cp-plan-ribbon ribbon-upgrade">Upgrade</div>
                <?php elseif($isDowngrade): ?>
                    <div class="cp-plan-ribbon ribbon-disabled">Lower Tier</div>
                <?php endif; ?>

                
                <div class="cp-plan-name"><?php echo e($planData['label']); ?></div>

                
                <div class="cp-plan-price-area">
                    <div class="cp-plan-price-val" id="cp-price-<?php echo e($planKey); ?>">
                        <span class="cp-price-loading">Loading…</span>
                    </div>
                    <div class="cp-plan-price-per" id="cp-price-per-<?php echo e($planKey); ?>">/ month</div>
                </div>

                
                <ul class="cp-plan-features">
                    <?php $__currentLoopData = $planData['feats']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="cp-plan-feat">
                            <span class="feat-icon">✓</span>
                            <?php echo e($feat); ?>

                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

                
                <?php if($isCurrent): ?>
                    
                    <button class="cp-card-btn cp-card-btn-current"
                            id="btn-current-match-<?php echo e($planKey); ?>"
                            disabled>✓ Current Plan</button>

                    <div id="btn-billing-switch-<?php echo e($planKey); ?>" style="display:none;">
                        <input type="hidden" id="cp-billing-<?php echo e($planKey); ?>" value="<?php echo e($currentBilling); ?>">
                        <form method="POST" action="<?php echo e(route('billing.change-plan')); ?>" id="cpform-renewal-<?php echo e($planKey); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="plan"    value="<?php echo e($planKey); ?>">
                            <input type="hidden" name="billing" id="cpbilling-renewal-<?php echo e($planKey); ?>" value="<?php echo e($currentBilling); ?>">
                            <input type="hidden" name="when"    value="next_billing_period">
                            <button type="button"
                                    class="cp-card-btn cp-card-btn-upgrade cp-card-btn-now"
                                    onclick="cpSubmit('<?php echo e($planKey); ?>', 'next_billing_period', '<?php echo e($planData['label']); ?>')">
                                ↻ Switch to Annual at Renewal
                            </button>
                        </form>
                        <div style="font-size:0.72rem;color:var(--text-muted);text-align:center;padding-top:0.25rem;">
                            No charge today · takes effect <?php echo e($nextRenewal); ?>

                        </div>
                    </div>

                <?php elseif($isScheduled): ?>
                    <button class="cp-card-btn cp-card-btn-scheduled" disabled>◷ Switching on <?php echo e($nextRenewal); ?></button>

                <?php elseif($isDowngrade): ?>
                    
                    <button class="cp-card-btn cp-card-btn-disabled" disabled>Downgrade Unavailable</button>

                <?php elseif($isUpgrade): ?>
                    <input type="hidden" id="cp-billing-<?php echo e($planKey); ?>" value="monthly">
                    <div class="cp-card-actions">
                        
                        <form method="POST" action="<?php echo e(route('billing.change-plan')); ?>" id="cpform-now-<?php echo e($planKey); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="plan"    value="<?php echo e($planKey); ?>">
                            <input type="hidden" name="billing" id="cpbilling-now-<?php echo e($planKey); ?>" value="monthly">
                            <input type="hidden" name="when"    value="immediately">
                            <button type="button"
                                    class="cp-card-btn cp-card-btn-upgrade cp-card-btn-now"
                                    onclick="cpSubmit('<?php echo e($planKey); ?>', 'immediately', '<?php echo e($planData['label']); ?>')">
                                ↑ Upgrade Now
                            </button>
                        </form>
                        
                        <form method="POST" action="<?php echo e(route('billing.change-plan')); ?>" id="cpform-renewal-<?php echo e($planKey); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="plan"    value="<?php echo e($planKey); ?>">
                            <input type="hidden" name="billing" id="cpbilling-renewal-<?php echo e($planKey); ?>" value="monthly">
                            <input type="hidden" name="when"    value="next_billing_period">
                            <button type="button"
                                    class="cp-card-btn cp-card-btn-renewal"
                                    onclick="cpSubmit('<?php echo e($planKey); ?>', 'next_billing_period', '<?php echo e($planData['label']); ?>')">
                                Schedule at Renewal (<?php echo e($nextRenewal); ?>)
                            </button>
                        </form>
                    </div>
                <?php endif; ?>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        
        <div class="cp-legend">
            <span>⚡ <strong>Upgrade Now</strong> — charged immediately, limits active right away.</span>
            <span>📅 <strong>At Renewal</strong> — no charge today, takes effect on <?php echo e($nextRenewal); ?>.</span>
            <span>↻ <strong>Switch Billing</strong> — change monthly ↔ annual on same plan at renewal.</span>
            <span>🔒 <strong>Downgrade</strong> — not available via the portal; contact support.</span>
        </div>
    </div>
</div>

<script>
    // ── Paddle price map ──────────────────────────────────────────────────────────
    const cpPriceMap = {};

    const cpPlanDefaults = {
        <?php $__currentLoopData = $allPlans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planKey => $planData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        '<?php echo e($planKey); ?>': {
            mo: '$<?php echo e($planData['price_mo']); ?>',
            yr: '$<?php echo e($planData['price_yr']); ?>',
            paddle_mo: '<?php echo e($planData['paddle_mo']); ?>',
            paddle_yr: '<?php echo e($planData['paddle_yr']); ?>',
            moFormatted: null,
            yrFormatted: null,
        },
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    };

    const currentPaddleId    = '<?php echo e($currentPaddleId); ?>';
    const scheduledPaddleId  = '<?php echo e($scheduledPaddleId); ?>';
    const currentBillingCycle = '<?php echo e($currentBilling); ?>';

    // ── Init Paddle ───────────────────────────────────────────────────────────────
    <?php if(config('cashier.environment') === 'sandbox'): ?>
        Paddle.Environment.set('sandbox');
    <?php endif; ?>
    Paddle.Initialize({ token: '<?php echo e(config('cashier.client_side_token')); ?>' });

    // ── Fetch localized prices ────────────────────────────────────────────────────
    (async function fetchPortalPrices() {
        try {
            const allPriceIds = [];
            Object.values(cpPlanDefaults).forEach(p => {
                if (p.paddle_mo) allPriceIds.push(p.paddle_mo);
                if (p.paddle_yr) allPriceIds.push(p.paddle_yr);
            });
            const uniqueIds = [...new Set(allPriceIds.filter(Boolean))];
            if (!uniqueIds.length) { renderDefaultPrices(); return; }

            const result = await Paddle.PricePreview({
                items: uniqueIds.map(id => ({ priceId: id, quantity: 1 }))
            });
            if (!result?.data?.details?.lineItems) { renderDefaultPrices(); return; }

            result.data.details.lineItems.forEach(item => {
                cpPriceMap[item.price.id] = item.formattedTotals.total;
            });

            // Store formatted prices
            Object.entries(cpPlanDefaults).forEach(([key, data]) => {
                data.moFormatted = cpPriceMap[data.paddle_mo] || data.mo;
                data.yrFormatted = cpPriceMap[data.paddle_yr] || data.yr;
            });

            // Update current plan price in portal header
            if (currentPaddleId && cpPriceMap[currentPaddleId]) {
                const el = document.getElementById('current-plan-price');
                if (el) el.textContent = cpPriceMap[currentPaddleId];
            }

            // Update scheduled price in banner
            if (scheduledPaddleId && cpPriceMap[scheduledPaddleId]) {
                const schedEl = document.getElementById('scheduled-price');
                if (schedEl) {
                    const per = '<?php echo e($subscription->scheduled_billing ?? "monthly"); ?>' === 'annual' ? '/year' : '/month';
                    schedEl.innerHTML = cpPriceMap[scheduledPaddleId]
                        + '<span style="font-size:0.8rem;font-weight:400;color:var(--text-muted);">' + per + '</span>';
                }
            }

            // Render modal plan prices (default billing = monthly on open)
            renderModalPrices('monthly');

        } catch (e) {
            console.log('Portal price preview failed, using USD defaults:', e.message);
            renderDefaultPrices();
        }
    })();

    function renderDefaultPrices() {
        // Fallback USD prices into modal
        renderModalPrices('monthly');

        // Fallback for scheduled price
        const schedEl = document.getElementById('scheduled-price');
        if (schedEl) {
            <?php if($scheduledChange ?? null): ?>
            <?php
                $fallbackPrice = ($scheduledChange['billing'] === 'annual')
                    ? '$' . config("plans.{$scheduledChange['plan']}.price_annual")
                    : '$' . config("plans.{$scheduledChange['plan']}.price_monthly");
                $fallbackPer = ($scheduledChange['billing'] === 'annual') ? '/year' : '/month';
            ?>
            schedEl.innerHTML = '<?php echo e($fallbackPrice); ?><span style="font-size:0.8rem;font-weight:400;color:var(--text-muted);"><?php echo e($fallbackPer); ?></span>';
            <?php endif; ?>
        }
    }

    function renderModalPrices(cycle) {
        Object.entries(cpPlanDefaults).forEach(([planKey, data]) => {
            const priceEl  = document.getElementById('cp-price-' + planKey);
            const perEl    = document.getElementById('cp-price-per-' + planKey);
            if (!priceEl) return;
            if (cycle === 'monthly') {
                priceEl.textContent = data.moFormatted || data.mo;
                if (perEl) perEl.textContent = '/ month';
            } else {
                priceEl.textContent = data.yrFormatted || data.yr;
                if (perEl) perEl.textContent = '/ year';
            }
        });
    }

    // ── Billing cycle toggle ──────────────────────────────────────────────────────
    let cpCurrentBilling = 'monthly';
    const cpUserCurrentPlan    = '<?php echo e($currentPlan); ?>';
    const cpUserCurrentBilling = '<?php echo e($currentBilling); ?>';

    function cpSetBilling(cycle) {
        cpCurrentBilling = cycle;

        document.getElementById('cp-toggle-mo').classList.toggle('active', cycle === 'monthly');
        document.getElementById('cp-toggle-yr').classList.toggle('active', cycle === 'annual');

        renderModalPrices(cycle);

        // Sync hidden billing inputs in all upgrade/renewal forms
        document.querySelectorAll('[id^="cp-billing-"]').forEach(el => { el.value = cycle; });
        document.querySelectorAll('[id^="cpbilling-"]').forEach(el => { el.value = cycle; });

        // ── Handle the current-plan card's dynamic CTA ───────────────────────────
        // When toggle matches user's actual billing → show "Current Plan" (locked)
        // When toggle differs → show "Switch Billing at Renewal"
        const matchBtn  = document.getElementById('btn-current-match-' + cpUserCurrentPlan);
        const switchDiv = document.getElementById('btn-billing-switch-' + cpUserCurrentPlan);
        const ribbon    = document.querySelector('#cpcard-' + cpUserCurrentPlan + ' .cp-plan-ribbon');

        if (matchBtn && switchDiv) {
            const isSameCycle = (cycle === cpUserCurrentBilling);
            matchBtn.style.display  = isSameCycle ? '' : 'none';
            switchDiv.style.display = isSameCycle ? 'none' : '';

            // Update ribbon text and card border to reflect state
            const card = document.getElementById('cpcard-' + cpUserCurrentPlan);
            if (ribbon) {
                if (isSameCycle) {
                    ribbon.textContent = 'Your Plan';
                    ribbon.className   = 'cp-plan-ribbon ribbon-current';
                } else {
                    ribbon.textContent = 'Switch Billing';
                    ribbon.className   = 'cp-plan-ribbon ribbon-upgrade';
                }
            }
            // Update the "Switch to Annual/Monthly at Renewal" button label dynamically
            const switchBtn = switchDiv.querySelector('button[type="button"]');
            if (switchBtn) {
                const targetLabel = cycle === 'annual' ? 'Annual' : 'Monthly';
                switchBtn.textContent = '↻ Switch to ' + targetLabel + ' at Renewal';
            }
        }
    }

    // ── Submit plan change ────────────────────────────────────────────────────────
    function cpSubmit(planKey, when, planLabel) {
        const billing      = cpCurrentBilling;
        const billingLabel = billing === 'monthly' ? 'Monthly' : 'Annual';
        const data         = cpPlanDefaults[planKey];
        const price        = billing === 'monthly'
            ? (data?.moFormatted || data?.mo)
            : (data?.yrFormatted || data?.yr);

        // Detect if this is a billing-cycle switch on the same plan vs a true upgrade
        const isBillingSwitch = (planKey === '<?php echo e($currentPlan); ?>');

        let msg = '';
        if (isBillingSwitch && when === 'next_billing_period') {
            msg = '↻ Switch ' + planLabel + ' to ' + billingLabel + ' billing at renewal (<?php echo e($nextRenewal); ?>)?\n\n'
                + '• No charge today.\n'
                + '• You will be billed ' + price + ' on <?php echo e($nextRenewal); ?>.\n'
                + '• Your current monthly billing continues until then.';
        } else if (when === 'immediately') {
            msg = '⚠ Upgrade to ' + planLabel + ' (' + billingLabel + ')\n\n'
                + '• ' + price + ' will be automatically charged to your saved payment method.\n'
                + '• New plan limits activate immediately after payment.\n\n'
                + 'Confirm upgrade?';
        } else {
            msg = 'Schedule upgrade to ' + planLabel + ' (' + billingLabel + ') at renewal (<?php echo e($nextRenewal); ?>)?\n\n'
                + '• No charge today.\n'
                + '• You will be billed ' + price + ' on <?php echo e($nextRenewal); ?>.\n'
                + '• Change takes effect on <?php echo e($nextRenewal); ?>.';
        }

        if (!confirm(msg)) return;

        const formId = when === 'immediately' ? 'cpform-now-' + planKey : 'cpform-renewal-' + planKey;
        const form   = document.getElementById(formId);
        if (form) form.submit();
    }

    // ── Modal open / close ────────────────────────────────────────────────────────
    function openChangePlan() {
        document.getElementById('changePlanModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
        // Sync billing to current plan billing on open
        cpSetBilling('<?php echo e($currentBilling); ?>');
    }
    function closeChangePlan() {
        document.getElementById('changePlanModal').style.display = 'none';
        document.body.style.overflow = '';
    }
    document.getElementById('changePlanModal')?.addEventListener('click', function(e) {
        if (e.target === this) closeChangePlan();
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeChangePlan();
    });
</script>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Git-folders\000form.com\resources\views/billing/portal.blade.php ENDPATH**/ ?>