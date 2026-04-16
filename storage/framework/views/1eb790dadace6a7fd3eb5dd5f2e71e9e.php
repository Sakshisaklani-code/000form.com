<?php $__env->startSection('title', 'Plans & Pricing - 000form'); ?>

<?php $__env->startSection('content'); ?>

<style>
    .pp {
        font-family: var(--font-display);
        background: var(--bg-primary);
        color: var(--text-primary);
        padding: 6rem 1.25rem 5rem;
        position: relative;
        overflow: hidden;
    }

    .pp::before {
        content: '';
        position: absolute;
        width: 800px;
        height: 800px;
        border-radius: 50%;
        background: var(--accent);
        filter: blur(180px);
        opacity: 0.08;
        top: -400px;
        right: -200px;
        pointer-events: none;
    }

    .pp::after {
        content: '';
        position: absolute;
        width: 600px;
        height: 600px;
        border-radius: 50%;
        background: #0088ff;
        filter: blur(150px);
        opacity: 0.05;
        bottom: -300px;
        left: -100px;
        pointer-events: none;
    }

    .pp-wrap {
        max-width: 1280px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    .pp-head {
        text-align: center;
        margin-bottom: 3.5rem;
    }

    .pp-head h1 {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 700;
        line-height: 1.1;
        margin-bottom: 1.25rem;
        letter-spacing: -0.02em;
    }

    .pp-head h1 em {
        font-style: normal;
        color: var(--accent);
        position: relative;
        display: inline-block;
    }

    .pp-head p {
        font-size: 1.1rem;
        color: var(--text-secondary);
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .pp-toggle-container {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 1.5rem 0;
    }

    .pp-toggle {
        display: flex;
        align-items: center;
        gap: 1rem;
        background: var(--bg-tertiary);
        border: 1px solid var(--border-color);
        border-radius: 100px;
        padding: 0.375rem;
    }

    .pp-toggle-lbl {
        font-size: 0.9rem;
        font-weight: 500;
        color: var(--text-secondary);
        padding: 0.5rem 1.25rem;
        border-radius: 100px;
        cursor: pointer;
        transition: all 0.2s ease;
        user-select: none;
    }

    .pp-toggle-lbl.on {
        background: var(--accent);
        color: var(--bg-primary);
    }

    .pp-save {
        font-family: var(--font-mono);
        font-size: 0.65rem;
        font-weight: 600;
        color: var(--bg-primary);
        background: var(--accent);
        padding: 0.2rem 0.6rem;
        border-radius: 100px;
        margin-left: 0.4rem;
        letter-spacing: 0.02em;
    }

    /* ── 3-column grid ── */
    .pp-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.25rem;
        margin-bottom: 2rem;
    }

    @media (max-width: 900px)  { .pp-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 580px)  {
        .pp-grid { grid-template-columns: 1fr; max-width: 400px; margin-left: auto; margin-right: auto; }
    }

    .pp-plan {
        background: var(--bg-card);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        padding: 2rem 1.5rem;
        display: flex;
        flex-direction: column;
        position: relative;
        transition: all 0.3s ease;
        height: 100%;
        animation: fadeInUp 0.5s ease forwards;
        opacity: 0;
    }

    .pp-plan:hover { transform: translateY(-4px); border-color: var(--accent); box-shadow: 0 20px 40px rgba(0,255,136,0.1); }
    .pp-plan.featured { background: linear-gradient(145deg, var(--bg-card), rgba(0,255,136,0.05)); border-color: var(--accent); box-shadow: 0 20px 40px rgba(0,255,136,0.15); }
    .pp-plan:nth-child(1) { animation-delay: 0.1s; }
    .pp-plan:nth-child(2) { animation-delay: 0.2s; }
    .pp-plan:nth-child(3) { animation-delay: 0.3s; }

    .pp-plan-badge {
        display: inline-block;
        font-family: var(--font-mono);
        font-size: 0.65rem;
        font-weight: 600;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        padding: 0.25rem 0.75rem;
        border-radius: 100px;
        margin-bottom: 1rem;
        width: fit-content;
    }

    .pp-plan-badge.personal-badge { background: rgba(255,255,255,0.08); color: var(--text-secondary); border: 1px solid var(--border-color); }
    .pp-plan-badge.pro-badge      { background: rgba(0,255,136,0.15); color: var(--accent); border: 1px solid rgba(0,255,136,0.3); }
    .pp-plan-badge.biz-badge      { background: rgba(0,255,136,0.15); color: var(--accent); border: 1px solid rgba(0,255,136,0.3); }

    /* Current plan indicator */
    .pp-current-tag {
        position: absolute;
        top: -1px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--accent);
        color: var(--bg-primary);
        font-family: var(--font-mono);
        font-size: 0.65rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        padding: 0.3rem 1rem;
        border-radius: 0 0 10px 10px;
        white-space: nowrap;
    }

    /* "Your Plan" tag shown only when toggle matches exact billing cycle */
    .pp-current-tag-exact {
        position: absolute;
        top: -1px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--accent);
        color: var(--bg-primary);
        font-family: var(--font-mono);
        font-size: 0.65rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        padding: 0.3rem 1rem;
        border-radius: 0 0 10px 10px;
        white-space: nowrap;
        transition: opacity 0.2s ease;
    }

    .pp-price {
        margin-left: 10%;
        display: flex;
        align-items: baseline;
        gap: 0.2rem;
        line-height: 1;
    }

    .pp-price .sym  { font-size: 1.25rem; font-weight: 600; color: var(--text-secondary); align-self: flex-start; padding-top: 0.5rem; }
    .pp-price .num  { font-family: var(--font-display); font-size: 2.25rem; font-weight: 700; letter-spacing: -0.03em; line-height: 1; color: var(--text-primary); transition: opacity 0.2s ease; }
    .pp-price .per  { font-size: 0.9rem; color: var(--text-muted); align-self: flex-end; padding-bottom: 0.5rem; }

    .pp-plan-desc { font-size: 0.875rem; color: var(--text-secondary); line-height: 1.6; margin: 1rem 0; }

    /* ── CTA BUTTONS ── */
    .pp-cta {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        padding: 0.875rem 1rem;
        border-radius: 10px;
        font-family: var(--font-display);
        font-size: 0.9rem;
        font-weight: 600;
        text-align: center;
        text-decoration: none;
        transition: all 0.2s ease;
        margin-bottom: 1.75rem;
        border: none;
        cursor: pointer;
        gap: 0.5rem;
        min-height: 48px;
    }

    .pp-cta:disabled { opacity: 0.5; cursor: not-allowed; transform: none !important; }

    .pp-cta-solid   { background: var(--accent); color: var(--bg-primary); border: 1px solid var(--accent); }
    .pp-cta-solid:hover:not(:disabled) { background: transparent; color: var(--accent); transform: translateY(-2px); }

    .pp-cta-outline { background: transparent; color: var(--text-primary); border: 1px solid var(--border-hover); }
    .pp-cta-outline:hover:not(:disabled) { border-color: var(--accent); color: var(--accent); background: rgba(0,255,136,0.05); transform: translateY(-2px); }

    /* Current plan state */
    .pp-cta-current { background: rgba(0,255,136,0.08); color: var(--accent); border: 1px solid rgba(0,255,136,0.3); cursor: default; }
    .pp-cta-current:hover { transform: none !important; }

    /* Upgrade CTA — solid green, prominent */
    .pp-cta-upgrade { background: var(--accent); color: var(--bg-primary); border: 1px solid var(--accent); }
    .pp-cta-upgrade:hover:not(:disabled) { opacity: 0.88; transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,255,136,0.25); }

    /* Downgrade — muted, clearly lower priority */
    .pp-cta-downgrade {
        background: transparent; color: var(--text-muted);
        border: 1px solid var(--border-color); font-size: 0.82rem;
    }
    .pp-cta-downgrade:hover:not(:disabled) { border-color: var(--border-hover); color: var(--text-secondary); }

    /* Switch billing cycle — blue tint, distinct from upgrade */
    .pp-cta-switch {
        background: #00ff88;
        color:var(--bg-primary);
    }
    .pp-cta-switch:hover:not(:disabled) {
        background: #308a60;
        transform: translateY(-2px);
    }

    /* Switch billing hint text below button */
    .pp-switch-hint {
        font-size: 0.72rem;
        color: var(--text-muted);
        text-align: center;
        margin-top: -1.25rem;
        margin-bottom: 1.75rem;
        line-height: 1.4;
    }

    /* Loading spinner inside button */
    .pp-cta .spinner {
        display: none;
        width: 16px;
        height: 16px;
        border: 2px solid currentColor;
        border-top-color: transparent;
        border-radius: 50%;
        animation: spin 0.7s linear infinite;
        flex-shrink: 0;
    }

    .pp-cta.loading .spinner { display: block; }
    .pp-cta.loading .btn-text { opacity: 0.6; }

    @keyframes spin { to { transform: rotate(360deg); } }

    .pp-divider { border: none; border-top: 1px solid var(--border-color); margin: 1rem 0 1.25rem; }

    .pp-feat-label {
        font-family: var(--font-mono);
        font-size: 0.65rem;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--text-muted);
        margin-bottom: 1rem;
    }

    .pp-feats { list-style: none; display: flex; flex-direction: column; gap: 0.8rem; flex: 1; }

    .pp-feat { display: flex; align-items: flex-start; gap: 0.65rem; font-size: 0.85rem; color: var(--text-secondary); line-height: 1.4; }
    .pp-feat.hi { color: var(--text-primary); }
    .pp-feat svg { width: 16px; height: 16px; flex-shrink: 0; margin-top: 2px; }

    .ic-accent { color: var(--accent); }

    .pp-pill {
        display: inline-block;
        font-family: var(--font-mono);
        font-size: 0.6rem;
        font-weight: 600;
        padding: 0.2rem 0.5rem;
        border-radius: 4px;
        margin-left: 0.3rem;
        vertical-align: middle;
        background: rgba(0,255,136,0.15);
        color: var(--accent);
        border: 1px solid rgba(0,255,136,0.3);
    }

    /* ── FREE FOREVER BANNER ── */
    .pp-free-banner {
        border: 1px solid var(--border-color);
        border-radius: 20px;
        padding: 2rem 2.5rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 2rem;
        margin-bottom: 4rem;
        background: var(--bg-card);
        animation: fadeInUp 0.5s ease 0.4s forwards;
        opacity: 0;
        flex-wrap: wrap;
    }

    .pp-free-banner:hover { border-color: var(--border-hover); }

    .pp-free-banner-left { display: flex; flex-direction: column; gap: 0.4rem; }

    .pp-free-banner-left h3 {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .pp-free-forever-badge {
        font-family: var(--font-mono);
        font-size: 0.6rem;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        padding: 0.2rem 0.6rem;
        border-radius: 100px;
        background: rgba(255,255,255,0.08);
        color: var(--text-secondary);
        border: 1px solid var(--border-color);
    }

    .pp-free-banner-left p {
        font-size: 0.875rem;
        color: var(--text-secondary);
        line-height: 1.5;
        max-width: 540px;
    }

    .pp-free-banner-right { display: flex; align-items: center; gap: 2rem; flex-shrink: 0; flex-wrap: wrap; }

    .pp-free-stats { display: flex; gap: 2rem; }

    .pp-free-stat { text-align: center; }
    .pp-free-stat .val { font-size: 1.25rem; font-weight: 700; color: var(--text-primary); }
    .pp-free-stat .lbl { font-size: 0.7rem; color: var(--text-muted); margin-top: 0.15rem; }

    @media (max-width: 700px) {
        .pp-free-banner { flex-direction: column; align-items: flex-start; }
        .pp-free-banner-right { width: 100%; justify-content: space-between; }
        .pp-free-stats { gap: 1.5rem; }
    }

    /* ── TOAST ── */
    .pp-toast {
        position: fixed;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%) translateY(120%);
        background: var(--bg-card);
        border: 1px solid var(--border-color);
        color: var(--text-primary);
        padding: 0.875rem 1.5rem;
        border-radius: 12px;
        font-size: 0.9rem;
        font-weight: 500;
        z-index: 9999;
        transition: transform 0.3s ease;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        display: flex;
        align-items: center;
        gap: 0.75rem;
        max-width: 90vw;
    }

    .pp-toast.show { transform: translateX(-50%) translateY(0); }
    .pp-toast.error { border-color: #ff4444; }
    .pp-toast.success { border-color: var(--accent); }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 480px) {
        .pp { padding: 5rem 1rem 3rem; }
        .pp-head h1 { font-size: 2rem; }
        .pp-plan { padding: 1.75rem 1.25rem; }
        .pp-price .num { font-size: 3rem; }
    }
</style>

<div class="pp">
<div class="pp-wrap">

    
    <div class="pp-head">
        <div class="hero-gradient hero-gradient-1"></div>
        <div class="hero-gradient hero-gradient-2"></div>
        <div class="hero-badge" style="margin-top: 2.5rem;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                <path d="M2 17l10 5 10-5"/>
                <path d="M2 12l10 5 10-5"/>
            </svg>
            000Form Pricing • choose the right fit
        </div>
        <h1>000form <em>Plans</em></h1>
        <p>We offer plans for every project, from personal sites to large-scale enterprise campaigns.</p>

        <div class="pp-toggle-container">
            <div class="pp-toggle">
                <span class="pp-toggle-lbl on" id="lbl-mo" onclick="ppSetBilling('monthly')">Monthly</span>
                <span class="pp-toggle-lbl"    id="lbl-yr" onclick="ppSetBilling('annual')">
                    Annual
                    <!-- <span class="pp-save">Save 20%</span> -->
                </span>
            </div>
        </div>
    </div>

    
    <?php
        /**
         * Determine the logged-in user's current plan AND billing cycle.
         * We need both to correctly render the "Current Plan" vs "Switch to Annual" states.
         */
        $userPlan    = null;
        $userBilling = null; // 'monthly' | 'annual' | null

        if (auth()->check()) {
            $sub = auth()->user()->subscription;
            if ($sub && $sub->isActive()) {
                $userPlan    = $sub->plan_name->value ?? 'free';
                $userBilling = $sub->billing_cycle ?? 'monthly'; // e.g. 'monthly' or 'annual'
            } else {
                $userPlan = auth()->user()->currentPlan()->value ?? 'free';
            }
        }

        $planRankMap  = ['free' => 0, 'personal' => 1, 'professional' => 2, 'business' => 3];
        $userPlanRank = $planRankMap[$userPlan] ?? 0;
    ?>

    <div class="pp-grid">

        
        <?php
        $planDefs = [
            'personal' => [
                'badge'     => 'personal-badge',
                'label'     => 'Personal',
                'desc'      => 'For personal or portfolio sites.',
                'price_mo'  => 15,
                'price_yr'  => 13,
                'feats_hdr' => 'Includes',
                'feats'     => [
                    '200 submissions/mo',
                    'Unlimited Projects',
                    'Unlimited forms',
                    '1 team member',
                    'File uploads <span class="pp-pill">10MB</span>',
                ],
            ],
            'professional' => [
                'badge'     => 'pro-badge',
                'label'     => 'Professional',
                'desc'      => 'For freelancers and startups.',
                'price_mo'  => 30,
                'price_yr'  => 28,
                'feats_hdr' => 'Everything in Personal, plus',
                'feats'     => [
                    '2,000 submissions/mo',
                    'Unlimited Projects',
                    'Unlimited forms',
                    '2 team members',
                    'File uploads <span class="pp-pill">10MB</span>',
                ],
            ],
            'business' => [
                'badge'     => 'biz-badge',
                'label'     => 'Business',
                'desc'      => 'For organizations and agencies.',
                'price_mo'  => 90,
                'price_yr'  => 88,
                'feats_hdr' => 'Everything in Professional, plus',
                'feats'     => [
                    '20,000 submissions',
                    'Unlimited Projects',
                    'Unlimited forms',
                    '3 team members',
                    'File uploads <span class="pp-pill">100MB</span>',
                ],
            ],
        ];
        ?>

        <?php $__currentLoopData = $planDefs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planKey => $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $planRank = $planRankMap[$planKey];

            /**
             * Three plan-level states for an authenticated user:
             *
             *   $isSamePlan    — user is subscribed to this plan tier (any billing cycle)
             *   $isExactMatch  — user is on this plan AND the same billing cycle as the current toggle
             *                    (rendered by JS since the toggle state changes client-side)
             *   $isUpgrade     — this plan is a higher tier than the user's current plan
             *   $isDowngrade   — this plan is a lower tier than the user's current plan
             *
             * The PHP here sets up data- attributes so JS can drive the dynamic CTA swap.
             */
            $isSamePlan  = auth()->check() && ($planKey === $userPlan);
            $isUpgrade   = auth()->check() && ($planRank > $userPlanRank);
            $isDowngrade = auth()->check() && ($planRank < $userPlanRank);
            $isFeatured  = $isSamePlan; // highlight the user's current plan tier
        ?>

        <div class="pp-plan <?php echo e($isFeatured ? 'featured' : ''); ?>"
             data-plan="<?php echo e($planKey); ?>"
             data-plan-rank="<?php echo e($planRank); ?>">

            
            <?php if($isSamePlan && auth()->check()): ?>
                <div class="pp-current-tag-exact" id="tag-<?php echo e($planKey); ?>" style="display:none;">Your Plan</div>
            <?php endif; ?>

            <span class="pp-plan-badge <?php echo e($plan['badge']); ?>"><?php echo e($plan['label']); ?></span>

            <div class="pp-price">
                <span class="sym">$</span>
                <span class="num"
                      data-mo="<?php echo e($plan['price_mo']); ?>"
                      data-yr="<?php echo e($plan['price_yr']); ?>"><?php echo e($plan['price_mo']); ?></span>
                <span class="per">/month</span>
            </div>
            <p class="pp-plan-desc"><?php echo e($plan['desc']); ?></p>

            
            <?php if(auth()->guard()->guest()): ?>
                
                <a href="<?php echo e(route('login')); ?>?redirect=pricing" class="pp-cta pp-cta-upgrade">
                    <span class="btn-text">Upgrade Plan →</span>
                </a>

            <?php else: ?>
                <?php if($isSamePlan): ?>
                    

                    
                    <button class="pp-cta pp-cta-current"
                            id="btn-exact-<?php echo e($planKey); ?>"
                            disabled
                            style="display:none;">
                        <span class="btn-text">✓ Current Plan</span>
                    </button>

                    
                    <a href="<?php echo e(route('billing.portal')); ?>"
                       class="pp-cta pp-cta-switch"
                       id="btn-switch-<?php echo e($planKey); ?>"
                       style="display:none;">
                        <span class="btn-text" id="btn-switch-label-<?php echo e($planKey); ?>">↻ Switch to Annual →</span>
                    </a>
                    <p class="pp-switch-hint" id="hint-switch-<?php echo e($planKey); ?>" style="display:none;">
                        No charge today · takes effect at next renewal
                    </p>

                <?php elseif($isUpgrade): ?>
                    
                    <button class="pp-cta pp-cta-upgrade" onclick="startCheckout('<?php echo e($planKey); ?>')">
                        <span class="spinner"></span>
                        <span class="btn-text">Upgrade to <?php echo e($plan['label']); ?> →</span>
                    </button>

                <?php elseif($isDowngrade): ?>
                    
                    <a href="<?php echo e(route('billing.portal')); ?>" class="pp-cta pp-cta-downgrade">
                        <span class="btn-text">Manage Plan →</span>
                    </a>

                <?php else: ?>
                    
                    <button class="pp-cta pp-cta-upgrade" onclick="startCheckout('<?php echo e($planKey); ?>')">
                        <span class="spinner"></span>
                        <span class="btn-text">Upgrade to <?php echo e($plan['label']); ?> →</span>
                    </button>
                <?php endif; ?>

            <?php endif; ?>

            <hr class="pp-divider">
            <span class="pp-feat-label"><?php echo e($plan['feats_hdr']); ?></span>
            <ul class="pp-feats">
                <?php $__currentLoopData = $plan['feats']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="pp-feat hi">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                        <?php echo $feat; ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>

    
    <div class="pp-free-banner">
        <div class="pp-free-banner-left">
            <h3>
                Free Forever
                <span class="pp-free-forever-badge">Free</span>
            </h3>
            <p>Use 000form for testing and development. No credit card required — just sign up and start collecting submissions immediately.</p>
        </div>
        <div class="pp-free-banner-right">
            <div class="pp-free-stats">
                <div class="pp-free-stat">
                    <div class="val">50</div>
                    <div class="lbl">Submissions/mo</div>
                </div>
                <div class="pp-free-stat">
                    <div class="val">∞</div>
                    <div class="lbl">Projects</div>
                </div>
                <div class="pp-free-stat">
                    <div class="val">∞</div>
                    <div class="lbl">Forms</div>
                </div>
                <div class="pp-free-stat">
                    <div class="val">10MB</div>
                    <div class="lbl">File uploads</div>
                </div>
            </div>
            <?php if(auth()->guard()->check()): ?>
                <?php if($userPlan === 'free'): ?>
                    <button class="pp-cta pp-cta-current" style="margin-bottom:0; min-width:160px;" disabled>
                        <span class="btn-text">✓ Current Plan</span>
                    </button>
                <?php else: ?>
                    <a href="<?php echo e(route('billing.portal')); ?>" class="pp-cta pp-cta-downgrade" style="margin-bottom:0; min-width:160px;">
                        <span class="btn-text">Manage Plan →</span>
                    </a>
                <?php endif; ?>
            <?php else: ?>
                <a href="<?php echo e(route('signup')); ?>" class="pp-cta pp-cta-upgrade" style="margin-bottom:0; min-width:160px;">
                    <span class="btn-text">Get Started Free →</span>
                </a>
            <?php endif; ?>
        </div>
    </div>

</div>
</div>


<div class="pp-toast" id="pp-toast">
    <span id="pp-toast-icon">⚠</span>
    <span id="pp-toast-msg"></span>
</div>


<script src="https://cdn.paddle.com/paddle/v2/paddle.js"></script>

<script>
    // ── Server-side state injected into JS ────────────────────────────────────────
    // userBilling: the actual billing cycle the user is currently on ('monthly' | 'annual' | null)
    // userPlan:    the plan key they're on ('personal' | 'professional' | 'business' | 'free' | null)
    const PP_USER_PLAN    = <?php echo json_encode($userPlan, 15, 512) ?>;
    const PP_USER_BILLING = <?php echo json_encode($userBilling, 15, 512) ?>; // null if not subscribed

    // ── Paddle init ───────────────────────────────────────────────────────────────
    <?php if(config('cashier.environment') === 'sandbox'): ?>
        Paddle.Environment.set('sandbox');
    <?php endif; ?>

    Paddle.Initialize({
        token: '<?php echo e(config('cashier.client_side_token')); ?>',
        eventCallback: function(event) {
            if (event.name === 'checkout.completed') {
                var txnId = '';
                if (event.data) {
                    txnId = event.data.transaction_id || event.data.id || '';
                }
                if (txnId) {
                    sessionStorage.setItem('paddle_txn_id', txnId);
                }
                window.location.href = '<?php echo e(route('subscription.processing')); ?>';
            }
        }
    });

    // ── Billing toggle state ──────────────────────────────────────────────────────
    let ppCurrentBilling = 'monthly'; // tracks the active toggle selection

    /**
     * ppSetBilling — called when user clicks Monthly / Annual toggle.
     *
     * For each plan card:
     *   1. Update displayed price and period label.
     *   2. If this is the user's current plan, decide which CTA to show:
     *        - toggle matches user's real billing → "✓ Current Plan" (disabled)
     *        - toggle differs from user's real billing → "↻ Switch to Annual/Monthly →" (portal link)
     */
    window.ppSetBilling = function(cycle) {
        ppCurrentBilling = cycle;

        // Update toggle button styles
        document.getElementById('lbl-mo').classList.toggle('on', cycle === 'monthly');
        document.getElementById('lbl-yr').classList.toggle('on', cycle === 'annual');

        // Update prices and period labels
        document.querySelectorAll('.num[data-mo]').forEach(function(el) {
            el.style.opacity = '0';
            setTimeout(function() {
                el.textContent = cycle === 'annual' ? el.dataset.yr : el.dataset.mo;
                el.style.opacity = '1';
            }, 150);
        });

        document.querySelectorAll('.pp-price .per').forEach(function(el) {
            el.style.opacity = '0';
            setTimeout(function() {
                el.textContent = cycle === 'annual' ? '/annum' : '/month';
                el.style.opacity = '1';
            }, 150);
        });

        // ── Update CTA for the user's current plan card ───────────────────────────
        if (PP_USER_PLAN && PP_USER_BILLING) {
            const exactBtn  = document.getElementById('btn-exact-'  + PP_USER_PLAN);
            const switchBtn = document.getElementById('btn-switch-' + PP_USER_PLAN);
            const switchLbl = document.getElementById('btn-switch-label-' + PP_USER_PLAN);
            const switchHnt = document.getElementById('hint-switch-' + PP_USER_PLAN);
            const tag       = document.getElementById('tag-' + PP_USER_PLAN);

            if (exactBtn && switchBtn) {
                const isExactMatch = (cycle === PP_USER_BILLING);

                // "Your Plan" top tag — only visible on exact match
                if (tag) tag.style.display = isExactMatch ? '' : 'none';

                if (isExactMatch) {
                    // Toggle matches real billing → show "Current Plan" locked button
                    exactBtn.style.display  = '';
                    switchBtn.style.display = 'none';
                    if (switchHnt) switchHnt.style.display = 'none';
                } else {
                    // Toggle differs → show "Switch to Annual/Monthly" button
                    exactBtn.style.display  = 'none';
                    switchBtn.style.display = '';
                    if (switchHnt) switchHnt.style.display = '';

                    // Update the label to reflect the target cycle
                    if (switchLbl) {
                        const targetLabel = cycle === 'annual' ? 'Annual' : 'Monthly';
                        switchLbl.textContent = '↻ Switch to ' + targetLabel + ' →';
                    }
                }
            }
        }
    };

    // ── Keyboard shortcut ─────────────────────────────────────────────────────────
    document.addEventListener('keydown', function(e) {
        if (e.key === 't' || e.key === 'T') {
            ppSetBilling(ppCurrentBilling === 'monthly' ? 'annual' : 'monthly');
        }
    });

    // ── Run on page load to initialise the correct CTA state ─────────────────────
    // Default toggle to the user's actual billing cycle so the page opens
    // in the state that matches their subscription (avoids a confusing "Switch" button
    // appearing immediately before any interaction).
    document.addEventListener('DOMContentLoaded', function() {
        if (PP_USER_BILLING) {
            ppSetBilling(PP_USER_BILLING);
        } else {
            ppSetBilling('monthly');
        }
    });

    // ── Toast helper ──────────────────────────────────────────────────────────────
    function showToast(msg, type) {
        type = type || 'error';
        const toast = document.getElementById('pp-toast');
        const icon  = document.getElementById('pp-toast-icon');
        const text  = document.getElementById('pp-toast-msg');
        if (!toast) return;
        toast.className  = 'pp-toast ' + type;
        icon.textContent = type === 'error' ? '⚠' : '✓';
        text.textContent = msg;
        toast.classList.add('show');
        setTimeout(function() { toast.classList.remove('show'); }, 5000);
    }

    // ── Checkout flow ─────────────────────────────────────────────────────────────
    window.startCheckout = async function(plan) {
        const billing   = ppCurrentBilling;
        const btn       = event.currentTarget;
        const csrfToken = document.querySelector('meta[name=csrf-token]')?.content || '';

        btn.classList.add('loading');
        btn.disabled = true;

        try {
            const res = await fetch('<?php echo e(route('subscription.checkout')); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ plan, billing })
            });

            const data = await res.json();

            if (res.status === 409 && data.redirect) {
                window.location.href = data.redirect;
                return;
            }

            if (!res.ok) {
                throw new Error(data.error || 'Something went wrong. Please try again.');
            }

            if (!data.checkout_options) {
                throw new Error('No checkout options received from server.');
            }

            Paddle.Checkout.open(data.checkout_options);

        } catch (err) {
            showToast(err.message);
        } finally {
            btn.classList.remove('loading');
            btn.disabled = false;
        }
    };

    // ── Fetch localised prices from Paddle ────────────────────────────────────────
    (async function fetchLocalPrices() {
        try {
            const priceIds = [
                '<?php echo e(config('plans.personal.paddle_monthly_id')); ?>',
                '<?php echo e(config('plans.personal.paddle_annual_id')); ?>',
                '<?php echo e(config('plans.professional.paddle_monthly_id')); ?>',
                '<?php echo e(config('plans.professional.paddle_annual_id')); ?>',
                '<?php echo e(config('plans.business.paddle_monthly_id')); ?>',
                '<?php echo e(config('plans.business.paddle_annual_id')); ?>',
            ].filter(Boolean);

            const result = await Paddle.PricePreview({
                items: priceIds.map(id => ({ priceId: id, quantity: 1 }))
            });

            if (!result?.data?.details?.lineItems) return;

            const priceMap = {};
            result.data.details.lineItems.forEach(item => {
                priceMap[item.price.id] = item.formattedTotals.total;
            });

            updatePrice('personal',     'mo', priceMap['<?php echo e(config('plans.personal.paddle_monthly_id')); ?>']);
            updatePrice('personal',     'yr', priceMap['<?php echo e(config('plans.personal.paddle_annual_id')); ?>']);
            updatePrice('professional', 'mo', priceMap['<?php echo e(config('plans.professional.paddle_monthly_id')); ?>']);
            updatePrice('professional', 'yr', priceMap['<?php echo e(config('plans.professional.paddle_annual_id')); ?>']);
            updatePrice('business',     'mo', priceMap['<?php echo e(config('plans.business.paddle_monthly_id')); ?>']);
            updatePrice('business',     'yr', priceMap['<?php echo e(config('plans.business.paddle_annual_id')); ?>']);

        } catch (e) {
            console.log('Price preview failed, showing default USD prices:', e.message);
        }
    })();

    function updatePrice(plan, cycle, formattedPrice) {
        if (!formattedPrice) return;

        const symbol          = formattedPrice.replace(/[\d,. ]/g, '').trim();
        const numericFormatted = formattedPrice.replace(/^[^0-9]+/, '').trim();

        document.querySelectorAll('.num[data-mo]').forEach(el => {
            const card  = el.closest('.pp-plan');
            if (!card) return;
            const badge = card.querySelector('.pp-plan-badge');
            if (!badge) return;
            const planName = badge.textContent.trim().toLowerCase();
            if (planName !== plan) return;

            if (cycle === 'mo') {
                el.dataset.mo = numericFormatted;
                if (ppCurrentBilling === 'monthly') el.textContent = numericFormatted;
            } else {
                el.dataset.yr = numericFormatted;
                if (ppCurrentBilling === 'annual') el.textContent = numericFormatted;
            }
        });

        if (symbol) {
            document.querySelectorAll('.pp-plan .sym').forEach(sym => {
                const card  = sym.closest('.pp-plan');
                const badge = card?.querySelector('.pp-plan-badge');
                if (badge?.textContent.trim().toLowerCase() === plan) {
                    sym.textContent = symbol;
                }
            });
        }
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\DR83\Desktop\000form\16-April-2026\000form.com\resources\views/pages/pricing.blade.php ENDPATH**/ ?>