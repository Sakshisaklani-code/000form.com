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

    .pp-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.25rem;
        margin-bottom: 4rem;
    }

    @media (max-width: 1100px) { .pp-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 640px) {
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
    .pp-plan:nth-child(4) { animation-delay: 0.4s; }

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

    .pp-plan-badge.free-badge     { background: rgba(255,255,255,0.08); color: var(--text-secondary); border: 1px solid var(--border-color); }
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

    .pp-price {
        margin-left: 20%;
        display: flex;
        align-items: baseline;
        gap: 0.2rem;
        line-height: 1;
    }

    .pp-price .sym  { font-size: 1.25rem; font-weight: 600; color: var(--text-secondary); align-self: flex-start; padding-top: 0.5rem; }
    .pp-price .num  { font-family: var(--font-display); font-size: 3.25rem; font-weight: 700; letter-spacing: -0.03em; line-height: 1; color: var(--text-primary); transition: opacity 0.2s ease; }
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

    .pp-cta-current { background: rgba(0,255,136,0.08); color: var(--accent); border: 1px solid rgba(0,255,136,0.3); cursor: default; }

    /* Loading spinner inside button */
    .pp-cta .spinner {
        display: none;
        width: 16px;
        height: 16px;
        border: 2px solid currentColor;
        border-top-color: transparent;
        border-radius: 50%;
        animation: spin 0.7s linear infinite;
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
        <h1>000form <em>Plans</em></h1>
        <p>We offer plans for every project, from personal sites to large-scale enterprise campaigns.</p>

        <div class="pp-toggle-container">
            <div class="pp-toggle">
                <span class="pp-toggle-lbl on" id="lbl-mo" onclick="ppToggle()">Monthly</span>
                <span class="pp-toggle-lbl"    id="lbl-yr" onclick="ppToggle()">
                    Annual 
                    <!-- <span class="pp-save">Save 20%</span> -->
                </span>
            </div>
        </div>
    </div>

    
    <div class="pp-grid">

        
        <div class="pp-plan featured">
            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->currentPlan()->value === 'free'): ?>
                    <div class="pp-current-tag">Your Plan</div>
                <?php endif; ?>
            <?php endif; ?>
            <span class="pp-plan-badge free-badge">Free</span>
            <div class="pp-price">
                <span class="sym">$</span>
                <span class="num">0</span>
                <span class="per">/month</span>
            </div>
            <p class="pp-plan-desc">For testing and development.</p>

            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->currentPlan()->value === 'free'): ?>
                    <button class="pp-cta pp-cta-current" disabled>
                        <span class="btn-text">Current Plan</span>
                    </button>
                <?php else: ?>
                    
                    <a href="<?php echo e(route('billing.portal')); ?>" class="pp-cta pp-cta-outline">
                        <span class="btn-text">Manage Plan →</span>
                    </a>
                <?php endif; ?>
            <?php else: ?>
                <a href="<?php echo e(route('signup')); ?>" class="pp-cta pp-cta-solid">
                    <span class="btn-text">Get Started Free →</span>
                </a>
            <?php endif; ?>

            <hr class="pp-divider">
            <span class="pp-feat-label">Includes</span>
            <ul class="pp-feats">
                <li class="pp-feat hi"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>50 submissions/mo</li>
                <li class="pp-feat hi"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>Unlimited forms</li>
                <li class="pp-feat hi"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>1 team member</li>
                <li class="pp-feat hi"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>File uploads <span class="pp-pill">10MB</span></li>
            </ul>
        </div>

        
        <div class="pp-plan">
            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->currentPlan()->value === 'personal'): ?>
                    <div class="pp-current-tag">Your Plan</div>
                <?php endif; ?>
            <?php endif; ?>
            <span class="pp-plan-badge personal-badge">Personal</span>
            <div class="pp-price">
                <span class="sym">$</span>
                <span class="num" data-mo="15" data-yr="13">15</span>
                <span class="per">/month</span>
            </div>
            <p class="pp-plan-desc">For personal or portfolio sites.</p>

            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->currentPlan()->value === 'personal'): ?>
                    <a href="<?php echo e(route('billing.portal')); ?>" class="pp-cta pp-cta-current">
                        <span class="btn-text">Manage Plan →</span>
                    </a>
                <?php else: ?>
                    <button class="pp-cta pp-cta-outline" onclick="startCheckout('personal')">
                        <span class="spinner"></span>
                        <span class="btn-text">Get Started →</span>
                    </button>
                <?php endif; ?>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>?redirect=pricing" class="pp-cta pp-cta-outline">
                    <span class="btn-text">Get Started →</span>
                </a>
            <?php endif; ?>

            <hr class="pp-divider">
            <span class="pp-feat-label">Includes</span>
            <ul class="pp-feats">
                <li class="pp-feat hi"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>200 submissions/mo</li>
                <li class="pp-feat hi"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>Unlimited forms</li>
                <li class="pp-feat hi"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>1 team member</li>
                <li class="pp-feat hi"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>File uploads <span class="pp-pill">10MB</span></li>
            </ul>
        </div>

        
        <div class="pp-plan">
            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->currentPlan()->value === 'professional'): ?>
                    <div class="pp-current-tag">Your Plan</div>
                <?php endif; ?>
            <?php endif; ?>
            <span class="pp-plan-badge pro-badge">Professional</span>
            <div class="pp-price">
                <span class="sym">$</span>
                <span class="num" data-mo="30" data-yr="28">30</span>
                <span class="per">/month</span>
            </div>
            <p class="pp-plan-desc">For freelancers and startups.</p>

            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->currentPlan()->value === 'professional'): ?>
                    <a href="<?php echo e(route('billing.portal')); ?>" class="pp-cta pp-cta-current">
                        <span class="btn-text">Manage Plan →</span>
                    </a>
                <?php else: ?>
                    <button class="pp-cta pp-cta-outline" onclick="startCheckout('professional')">
                        <span class="spinner"></span>
                        <span class="btn-text">Get Started →</span>
                    </button>
                <?php endif; ?>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>?redirect=pricing" class="pp-cta pp-cta-outline">
                    <span class="btn-text">Get Started →</span>
                </a>
            <?php endif; ?>

            <hr class="pp-divider">
            <span class="pp-feat-label">Everything in Personal, plus</span>
            <ul class="pp-feats">
                <li class="pp-feat hi"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>2,000 submissions/mo</li>
                <li class="pp-feat hi"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>Unlimited forms</li>
                <li class="pp-feat hi"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>2 team members</li>
                <li class="pp-feat hi"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>File uploads <span class="pp-pill">10MB</span></li>
            </ul>
        </div>

        
        <div class="pp-plan">
            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->currentPlan()->value === 'business'): ?>
                    <div class="pp-current-tag">Your Plan</div>
                <?php endif; ?>
            <?php endif; ?>
            <span class="pp-plan-badge biz-badge">Business</span>
            <div class="pp-price">
                <span class="sym">$</span>
                <span class="num" data-mo="90" data-yr="88">90</span>
                <span class="per">/month</span>
            </div>
            <p class="pp-plan-desc">For organizations and agencies.</p>

            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->currentPlan()->value === 'business'): ?>
                    <a href="<?php echo e(route('billing.portal')); ?>" class="pp-cta pp-cta-current">
                        <span class="btn-text">Manage Plan →</span>
                    </a>
                <?php else: ?>
                    <button class="pp-cta pp-cta-outline" onclick="startCheckout('business')">
                        <span class="spinner"></span>
                        <span class="btn-text">Get Started →</span>
                    </button>
                <?php endif; ?>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>?redirect=pricing" class="pp-cta pp-cta-outline">
                    <span class="btn-text">Get Started →</span>
                </a>
            <?php endif; ?>

            <hr class="pp-divider">
            <span class="pp-feat-label">Everything in Professional, plus</span>
            <ul class="pp-feats">
                <li class="pp-feat hi"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>Unlimited submissions</li>
                <li class="pp-feat hi"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>Unlimited forms</li>
                <li class="pp-feat hi"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>Unlimited team members</li>
                <li class="pp-feat hi"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>File uploads <span class="pp-pill">100MB</span></li>
            </ul>
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

    // Must set environment BEFORE Initialize()
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

    (function() {
        // ── BILLING TOGGLE ───────────────────────────────────────
        let annual = false;

        window.ppToggle = function() {
            annual = !annual;
            document.getElementById('lbl-mo').classList.toggle('on', !annual);
            document.getElementById('lbl-yr').classList.toggle('on', annual);

            document.querySelectorAll('.num[data-mo]').forEach(function(el) {
                el.style.opacity = '0';
                setTimeout(function() {
                    el.textContent = annual ? el.dataset.yr : el.dataset.mo;
                    el.style.opacity = '1';
                }, 150);
            });
        };

        // ── TOAST HELPER ─────────────────────────────────────────
        function showToast(msg, type = 'error') {
            const toast = document.getElementById('pp-toast');
            const icon  = document.getElementById('pp-toast-icon');
            const text  = document.getElementById('pp-toast-msg');
            if (!toast) return;

            toast.className  = 'pp-toast ' + type;
            icon.textContent = type === 'error' ? '⚠' : '✓';
            text.textContent = msg;
            toast.classList.add('show');
            setTimeout(() => toast.classList.remove('show'), 5000);
        }

        // ── CHECKOUT FLOW ─────────────────────────────────────────
        // 1. POST to Laravel → get Paddle checkout options JSON
        // 2. Pass options to Paddle.Checkout.open()
        // 3. Paddle shows overlay checkout
        // 4. On success → eventCallback redirects to /subscription/processing
        window.startCheckout = async function(plan) {
            const billing    = annual ? 'annual' : 'monthly';
            const btn        = event.currentTarget;
            const csrfToken  = document.querySelector('meta[name=csrf-token]')?.content || '';

            // Show loading spinner on button
            btn.classList.add('loading');
            btn.disabled = true;

            try {
                // Step 1: Get checkout options from Laravel
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

                // Already has subscription → go to billing portal
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

                // Step 2: Open Paddle overlay with the options from Laravel
                // These options come directly from $checkout->options()
                Paddle.Checkout.open(data.checkout_options);

            } catch (err) {
                showToast(err.message);
            } finally {
                btn.classList.remove('loading');
                btn.disabled = false;
            }
        };

        // Keyboard shortcut for billing toggle
        document.addEventListener('keydown', function(e) {
            if (e.key === 't' || e.key === 'T') ppToggle();
        });
    })();
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Git-folders\000form.com\resources\views/pages/pricing.blade.php ENDPATH**/ ?>