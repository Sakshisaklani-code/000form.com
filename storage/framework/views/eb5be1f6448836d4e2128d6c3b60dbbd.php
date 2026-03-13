<?php $__env->startSection('title', 'Plans & Pricing - 000form'); ?>

<?php $__env->startSection('content'); ?>

<style>
    /* ============================================
    Plans & Pricing - Integrated with Main Theme
    Using --accent: #00ff88 color scheme
    ============================================ */

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

    /* ============================================
    Header Section
    ============================================ */

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

    .pp-head h1 em::after {
        content: '';
        position: absolute;
        bottom: 5px;
        left: 0;
        width: 100%;
        height: 8px;
        background: var(--accent-glow);
        filter: blur(8px);
        z-index: -1;
    }

    .pp-head p {
        font-size: 1.1rem;
        color: var(--text-secondary);
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* ============================================
    Billing Toggle
    ============================================ */

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

    /* ============================================
    Plans Grid — 4 columns
    ============================================ */

    .pp-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.25rem;
        margin-bottom: 4rem;
    }

    @media (max-width: 1100px) {
        .pp-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 640px) {
        .pp-grid {
            grid-template-columns: 1fr;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }
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
    }

    .pp-plan:hover {
        transform: translateY(-4px);
        border-color: var(--accent);
        box-shadow: 0 20px 40px rgba(0, 255, 136, 0.1);
    }

    .pp-plan.featured {
        background: linear-gradient(145deg, var(--bg-card), rgba(0, 255, 136, 0.05));
        border-color: var(--accent);
        box-shadow: 0 20px 40px rgba(0, 255, 136, 0.15);
    }

    /* Custom plan — blue accent */
    .pp-plan.custom {
        background: linear-gradient(145deg, var(--bg-card), rgba(0, 136, 255, 0.05));
        border-color: rgba(0, 136, 255, 0.4);
        box-shadow: 0 20px 40px rgba(0, 136, 255, 0.1);
    }

    .pp-plan.custom:hover {
        border-color: #0088ff;
        box-shadow: 0 20px 40px rgba(0, 136, 255, 0.2);
    }

    .pp-pop-badge {
        position: absolute;
        top: -1px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--accent);
        color: var(--bg-primary);
        font-family: var(--font-mono);
        font-size: 0.7rem;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        padding: 0.4rem 1.2rem;
        border-radius: 0 0 12px 12px;
        white-space: nowrap;
    }

    /* Plan type badges */
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

    .pp-plan-badge.personal {
        background: rgba(255, 255, 255, 0.08);
        color: var(--text-secondary);
        border: 1px solid var(--border-color);
    }

    .pp-plan-badge.professional {
        background: rgba(0, 255, 136, 0.15);
        color: var(--accent);
        border: 1px solid rgba(0, 255, 136, 0.3);
    }

    .pp-plan-badge.business {
        background: rgba(0, 255, 136, 0.15);
        color: var(--accent);
        border: 1px solid rgba(0, 255, 136, 0.3);
    }

    .pp-plan-badge.custom-badge {
        background: rgba(0, 136, 255, 0.15);
        color: #4db8ff;
        border: 1px solid rgba(0, 136, 255, 0.3);
    }

    .pp-price {
        margin-left: 20%;
        display: flex;
        align-items: baseline;
        gap: 0.2rem;
        line-height: 1;
    }

    .pp-price .sym {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--text-secondary);
        align-self: flex-start;
        padding-top: 0.5rem;
    }

    .pp-price .num {
        font-family: var(--font-display);
        font-size: 3.25rem;
        font-weight: 700;
        letter-spacing: -0.03em;
        line-height: 1;
        color: var(--text-primary);
        transition: opacity 0.2s ease;
    }

    .pp-price .per {
        font-size: 0.9rem;
        color: var(--text-muted);
        align-self: flex-end;
        padding-bottom: 0.5rem;
    }

    /* Custom plan price block */
    .pp-price-custom {
        display: flex;
        align-items: center;
        padding: 0.25rem 0;
    }

    .pp-price-custom .custom-label {
        font-family: var(--font-display);
        font-size: 2.75rem;
        font-weight: 700;
        letter-spacing: -0.03em;
        color: #4db8ff;
        line-height: 1;
    }

    .pp-plan-desc {
        font-size: 0.875rem;
        color: var(--text-secondary);
        line-height: 1.6;
        margin: 1rem 0;
    }

    /* ============================================
    CTA Buttons
    ============================================ */

    .pp-cta {
        display: block;
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
    }

    .pp-cta-outline {
        background: transparent;
        color: var(--text-primary);
        border: 1px solid var(--border-hover);
    }

    .pp-cta-outline:hover {
        border-color: var(--accent);
        color: var(--accent);
        background: rgba(0, 255, 136, 0.05);
        transform: translateY(-2px);
    }

    .pp-cta-solid {
        background: var(--accent);
        color: var(--bg-primary);
        border: 1px solid var(--accent);
    }

    .pp-cta-solid:hover {
        background: transparent;
        color: var(--accent);
        border-color: var(--accent);
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 255, 136, 0.2);
    }

    .pp-cta-blue {
        background: transparent;
        color: #4db8ff;
        border: 1px solid rgba(0, 136, 255, 0.5);
    }

    .pp-cta-blue:hover {
        background: rgba(0, 136, 255, 0.1);
        border-color: #0088ff;
        color: #80cfff;
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 136, 255, 0.15);
    }

    /* ============================================
    Features List
    ============================================ */

    .pp-divider {
        border: none;
        border-top: 1px solid var(--border-color);
        margin: 1rem 0 1.25rem;
    }

    .pp-feat-label {
        font-family: var(--font-mono);
        font-size: 0.65rem;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--text-muted);
        margin-bottom: 1rem;
    }

    .pp-feats {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 0.8rem;
        flex: 1;
    }

    .pp-feat {
        display: flex;
        align-items: flex-start;
        gap: 0.65rem;
        font-size: 0.85rem;
        color: var(--text-secondary);
        line-height: 1.4;
    }

    .pp-feat.hi { color: var(--text-primary); }

    .pp-feat svg {
        width: 16px;
        height: 16px;
        flex-shrink: 0;
        margin-top: 2px;
    }

    .ic-accent { color: var(--accent); }
    .ic-blue   { color: #4db8ff; }
    .ic-dim    { color: var(--text-muted); opacity: 0.5; }

    .pp-pill {
        display: inline-block;
        font-family: var(--font-mono);
        font-size: 0.6rem;
        font-weight: 600;
        padding: 0.2rem 0.5rem;
        border-radius: 4px;
        margin-left: 0.3rem;
        vertical-align: middle;
    }

    .pill-pro {
        background: rgba(0, 255, 136, 0.15);
        color: var(--accent);
        border: 1px solid rgba(0, 255, 136, 0.3);
    }

    .pill-blue {
        background: rgba(0, 136, 255, 0.15);
        color: #4db8ff;
        border: 1px solid rgba(0, 136, 255, 0.3);
    }

    /* ============================================
    Animations
    ============================================ */

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .pp-plan {
        animation: fadeInUp 0.5s ease forwards;
        opacity: 0;
    }

    .pp-plan:nth-child(1) { animation-delay: 0.1s; }
    .pp-plan:nth-child(2) { animation-delay: 0.2s; }
    .pp-plan:nth-child(3) { animation-delay: 0.3s; }
    .pp-plan:nth-child(4) { animation-delay: 0.4s; }

    /* ============================================
    Mobile Optimizations
    ============================================ */

    @media (max-width: 480px) {
        .pp { padding: 5rem 1rem 3rem; }
        .pp-head h1 { font-size: 2rem; }
        .pp-head p  { font-size: 0.95rem; }
        .pp-toggle-container { margin: 1.5rem 0 2rem; }
        .pp-toggle { width: 100%; justify-content: center; }
        .pp-toggle-lbl { padding: 0.4rem 1rem; font-size: 0.85rem; }
        .pp-plan { padding: 1.75rem 1.25rem; }
        .pp-price .num { font-size: 3rem; }
    }

    @media (max-width: 768px) {
        .pp-cta,
        .pp-toggle-lbl {
            min-height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
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
                <span class="pp-toggle-lbl" id="lbl-yr" onclick="ppToggle()">Annual <span class="pp-save">Save 20%</span></span>
            </div>
        </div>
    </div>

    
    <div class="pp-grid">

        
        <div class="pp-plan">
            <span class="pp-plan-badge personal">Personal</span>
            <div class="pp-price">
                <span class="sym">$</span>
                <span class="num" data-mo="10" data-yr="8">10</span>
                <span class="per">/month</span>
            </div>
            <p class="pp-plan-desc">For personal or portfolio sites.</p>
            <a href="#" class="pp-cta pp-cta-outline">Buy Now →</a>
            <hr class="pp-divider">
            <span class="pp-feat-label">Includes</span>
            <ul class="pp-feats">
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    200 submissions/mo
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    Unlimited forms
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    Unlimited projects
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    Email notifications
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    1 team member
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    CSV exports
                </li>
            </ul>
        </div>

        
        <div class="pp-plan featured">
            <div class="pp-pop-badge">Most Popular</div>
            <span class="pp-plan-badge professional">Professional</span>
            <div class="pp-price">
                <span class="sym">$</span>
                <span class="num" data-mo="20" data-yr="16">20</span>
                <span class="per">/month</span>
            </div>
            <p class="pp-plan-desc">For freelancers and startups.</p>
            <a href="#" class="pp-cta pp-cta-solid">Buy Now →</a>
            <hr class="pp-divider">
            <span class="pp-feat-label">Everything in Personal, plus</span>
            <ul class="pp-feats">
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    2,000 submissions/mo
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    Unlimited forms
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    Unlimited projects
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    Webhooks &amp; integrations
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    2 team members
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    File uploads <span class="pp-pill pill-pro">10MB</span>
                </li>
            </ul>
        </div>

        
        <div class="pp-plan">
            <span class="pp-plan-badge business">Business</span>
            <div class="pp-price">
                <span class="sym">$</span>
                <span class="num" data-mo="60" data-yr="48">60</span>
                <span class="per">/month</span>
            </div>
            <p class="pp-plan-desc">For organizations and agencies.</p>
            <a href="#" class="pp-cta pp-cta-outline">Buy Now →</a>
            <hr class="pp-divider">
            <span class="pp-feat-label">Everything in Professional, plus</span>
            <ul class="pp-feats">
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    20,000 submissions/mo
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    Unlimited forms
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    Unlimited projects
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    Role-based permissions
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    Unlimited team members
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    File uploads <span class="pp-pill pill-pro">100MB</span>
                </li>
            </ul>
        </div>

        
        <div class="pp-plan custom">
            <span class="pp-plan-badge custom-badge">Custom</span>
            <div class="pp-price-custom">
                <span class="custom-label">Custom</span>
            </div>
            <p class="pp-plan-desc">For high volume campaigns &amp; enterprise.</p>
            <a href="#" class="pp-cta pp-cta-blue">Contact Sales →</a>
            <hr class="pp-divider">
            <span class="pp-feat-label">Everything in Business, plus</span>
            <ul class="pp-feats">
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-blue"><polyline points="20 6 9 17 4 12"/></svg>
                    Unlimited submissions
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-blue"><polyline points="20 6 9 17 4 12"/></svg>
                    Unlimited forms
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-blue"><polyline points="20 6 9 17 4 12"/></svg>
                    Unlimited projects
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-blue"><polyline points="20 6 9 17 4 12"/></svg>
                    Unlimited team members
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-blue"><polyline points="20 6 9 17 4 12"/></svg>
                    Dedicated account manager
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-blue"><polyline points="20 6 9 17 4 12"/></svg>
                    Custom SLA &amp; integrations
                </li>
            </ul>
        </div>

    </div>

</div>
</div>

<script>
(function() {
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

    document.addEventListener('keydown', function(e) {
        if (e.key === 't' || e.key === 'T') ppToggle();
    });
})();
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Git-folders\000form.com\resources\views/pages/pricing.blade.php ENDPATH**/ ?>