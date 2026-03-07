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

/* Background gradients */
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
    max-width: 1200px;
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

.pp-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-family: var(--font-mono);
    font-size: 0.7rem;
    font-weight: 600;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--accent);
    background: rgba(0, 255, 136, 0.1);
    border: 1px solid rgba(0, 255, 136, 0.2);
    padding: 0.4rem 1rem;
    border-radius: 100px;
    margin-bottom: 1.5rem;
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
   Plans Grid
   ============================================ */

.pp-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
    margin-bottom: 4rem;
}

@media (max-width: 900px) {
    .pp-grid {
        grid-template-columns: repeat(2, 1fr);
    }
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
    padding: 2rem 1.75rem;
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

/* NEW: Plan type badges */
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

.pp-plan-badge.free {
    background: rgba(255, 255, 255, 0.1);
    color: var(--text-secondary);
    border: 1px solid var(--border-color);
}

.pp-plan-badge.pro {
    background: rgba(0, 255, 136, 0.15);
    color: var(--accent);
    border: 1px solid rgba(0, 255, 136, 0.3);
}

.pp-plan-badge.team {
    background: rgba(0, 255, 136, 0.15);
    color: var(--accent);
    border: 1px solid rgba(0, 255, 136, 0.3);
}

.pp-plan-name {
    font-family: var(--font-mono);
    font-size: 0.7rem;
    font-weight: 600;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--accent);
    margin-bottom: 1rem;
}

.pp-price {
    margin-left: 35%;
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
    font-size: 3.5rem;
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

.pp-plan-desc {
    font-size: 0.9rem;
    color: var(--text-secondary);
    line-height: 1.6;
    margin: 1rem 0;
}

/* ============================================
   Plan CTA Buttons - FIXED
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

/* NEW: Solid CTA button style for featured card */
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
}

.pp-feat {
    display: flex;
    align-items: flex-start;
    gap: 0.65rem;
    font-size: 0.85rem;
    color: var(--text-secondary);
    line-height: 1.4;
}

.pp-feat.hi {
    color: var(--text-primary);
}

.pp-feat svg {
    width: 16px;
    height: 16px;
    flex-shrink: 0;
    margin-top: 2px;
}

.ic-accent {
    color: var(--accent);
}

.ic-dim {
    color: var(--text-muted);
    opacity: 0.5;
}

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

.pill-team {
    background: rgba(0, 255, 136, 0.15);
    color: var(--accent);
    border: 1px solid rgba(0, 255, 136, 0.3);
}

/* ============================================
   FAQ Section
   ============================================ */

.pp-faq {
    margin-top: 5rem;
}

.pp-section-head {
    text-align: center;
    margin-bottom: 2.5rem;
}

.pp-section-head h2 {
    font-size: 2rem;
    font-weight: 700;
    letter-spacing: -0.02em;
    margin-bottom: 0.5rem;
    color: var(--text-primary);
}

.pp-section-head p {
    font-size: 1rem;
    color: var(--text-secondary);
}

.pp-faq-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    max-width: 900px;
    margin: 0 auto;
}

@media (max-width: 640px) {
    .pp-faq-grid {
        grid-template-columns: 1fr;
    }
}

.pp-faq-item {
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 1.5rem;
    transition: all 0.2s ease;
}

.pp-faq-item:hover {
    border-color: var(--accent);
    transform: translateY(-2px);
}

.pp-faq-item h4 {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: var(--text-primary);
    font-family: var(--font-display);
}

.pp-faq-item p {
    font-size: 0.9rem;
    color: var(--text-secondary);
    line-height: 1.6;
    margin: 0;
}

.pp-faq-item a {
    color: var(--accent);
    text-decoration: none;
    font-weight: 500;
}

.pp-faq-item a:hover {
    text-decoration: underline;
}

/* ============================================
   Enterprise Banner
   ============================================ */

.pp-banner {
    margin-top: 4rem;
    background: linear-gradient(135deg, var(--bg-card), rgba(0, 255, 136, 0.05));
    border: 1px solid var(--border-color);
    border-radius: 24px;
    padding: 3rem 2rem;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.pp-banner::before {
    content: '';
    position: absolute;
    width: 400px;
    height: 400px;
    border-radius: 50%;
    background: var(--accent);
    filter: blur(120px);
    opacity: 0.1;
    top: -200px;
    right: -100px;
}

.pp-banner h2 {
    font-size: 2rem;
    font-weight: 700;
    letter-spacing: -0.02em;
    margin-bottom: 0.75rem;
    color: var(--text-primary);
    position: relative;
}

.pp-banner p {
    color: var(--text-secondary);
    font-size: 1rem;
    margin-bottom: 2rem;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
    position: relative;
}

.pp-banner-btns {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
    position: relative;
}

.btn-solid {
    background: var(--accent);
    color: var(--bg-primary);
    padding: 0.875rem 2rem;
    border-radius: 10px;
    font-family: var(--font-display);
    font-size: 0.9rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s ease;
    border: none;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.btn-solid:hover {
    background: var(--text-primary);
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0, 255, 136, 0.3);
}

.btn-ghost {
    background: transparent;
    color: var(--text-primary);
    padding: 0.875rem 2rem;
    border-radius: 10px;
    border: 1px solid var(--border-hover);
    font-family: var(--font-display);
    font-size: 0.9rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.btn-ghost:hover {
    border-color: var(--accent);
    color: var(--accent);
    transform: translateY(-2px);
}

/* ============================================
   Animations
   ============================================ */

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.pp-plan {
    animation: fadeInUp 0.5s ease forwards;
    opacity: 0;
}

.pp-plan:nth-child(1) { animation-delay: 0.1s; }
.pp-plan:nth-child(2) { animation-delay: 0.2s; }
.pp-plan:nth-child(3) { animation-delay: 0.3s; }

/* ============================================
   Mobile Optimizations
   ============================================ */

@media (max-width: 480px) {
    .pp {
        padding: 5rem 1rem 3rem;
    }
    
    .pp-head h1 {
        font-size: 2rem;
    }
    
    .pp-head p {
        font-size: 0.95rem;
    }
    
    .pp-toggle-container {
        margin: 1.5rem 0 2rem;
    }
    
    .pp-toggle {
        width: 100%;
        justify-content: center;
    }
    
    .pp-toggle-lbl {
        padding: 0.4rem 1rem;
        font-size: 0.85rem;
    }
    
    .pp-plan {
        padding: 1.75rem 1.25rem;
    }
    
    .pp-price .num {
        font-size: 3rem;
    }
    
    .pp-banner {
        padding: 2rem 1.25rem;
    }
    
    .pp-banner h2 {
        font-size: 1.5rem;
    }
    
    .pp-banner-btns {
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .btn-solid,
    .btn-ghost {
        width: 100%;
    }
}

/* Better touch targets for mobile */
@media (max-width: 768px) {
    .pp-cta,
    .btn-solid,
    .btn-ghost,
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
        <p>We offers plans for every project, from personal sites to client work.</p>

        <div class="pp-toggle-container">
            <div class="pp-toggle">
                <span class="pp-toggle-lbl on" id="lbl-mo" onclick="ppToggle()">Monthly</span>
                <span class="pp-toggle-lbl" id="lbl-yr" onclick="ppToggle()">Annual <span class="pp-save">Save 20%</span></span>
            </div>
        </div>
    </div>

    
    <div class="pp-grid">

        
        <div class="pp-plan">
            <span class="pp-plan-badge free">Free</span>
            <div class="pp-price">
                <span class="sym">$</span>
                <span class="num" data-mo="0" data-yr="0">0</span>
                <span class="per">/month</span>
            </div>
            <p class="pp-plan-desc">Perfect for side projects and getting started.</p>
            <a href="<?php echo e(route('signup')); ?>" class="pp-cta pp-cta-outline">Start free →</a>
            <hr class="pp-divider">
            <span class="pp-feat-label">Includes</span>
            <ul class="pp-feats">
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    1,000 submissions/mo
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    Email notifications
                </li>
                <li class="pp-feat">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    Basic spam protection
                </li>
                <li class="pp-feat">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    CSV exports
                </li>
                <li class="pp-feat" style="color:var(--text-muted)">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="ic-dim"><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    File uploads
                </li>
            </ul>
        </div>

        
        <div class="pp-plan featured">
            <div class="pp-pop-badge">Most Popular</div>
            <span class="pp-plan-badge pro">Pro</span>
            <div class="pp-price">
                <span class="sym">$</span>
                <span class="num" data-mo="12" data-yr="9">12</span>
                <span class="per">/month</span>
            </div>
            <p class="pp-plan-desc">For developers who need power & flexibility.</p>
            <a href="<?php echo e(route('signup')); ?>" class="pp-cta pp-cta-solid">Start 14-day trial →</a>
            <hr class="pp-divider">
            <span class="pp-feat-label">Everything in Free, plus</span>
            <ul class="pp-feats">
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    10,000 submissions/mo
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    File uploads <span class="pp-pill pill-pro">10MB</span>
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    Webhooks & integrations
                </li>
                <li class="pp-feat">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    Advanced spam filtering
                </li>
                <li class="pp-feat">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    Submission search
                </li>
            </ul>
        </div>

        
        <div class="pp-plan">
            <span class="pp-plan-badge team">Team</span>
            <div class="pp-price">
                <span class="sym">$</span>
                <span class="num" data-mo="39" data-yr="31">39</span>
                <span class="per">/month</span>
            </div>
            <p class="pp-plan-desc">Collaborate with your team in a secure workspace.</p>
            <a href="mailto:sales@000form.com" class="pp-cta pp-cta-outline">Contact sales →</a>
            <hr class="pp-divider">
            <span class="pp-feat-label">Everything in Pro, plus</span>
            <ul class="pp-feats">
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    Team members <span class="pp-pill pill-team">Up to 10</span>
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    50,000 submissions/mo
                </li>
                <li class="pp-feat hi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    File uploads <span class="pp-pill pill-team">100MB</span>
                </li>
                <li class="pp-feat">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    Role-based permissions
                </li>
                <li class="pp-feat">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="ic-accent"><polyline points="20 6 9 17 4 12"/></svg>
                    Priority support
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
        
        // Update toggle labels
        document.getElementById('lbl-mo').classList.toggle('on', !annual);
        document.getElementById('lbl-yr').classList.toggle('on', annual);
        
        // Update prices with animation
        document.querySelectorAll('.num[data-mo]').forEach(function(el) {
            el.style.opacity = '0';
            setTimeout(function() {
                el.textContent = annual ? el.dataset.yr : el.dataset.mo;
                el.style.opacity = '1';
            }, 150);
        });
    };
    
    // Add keyboard support
    document.addEventListener('keydown', function(e) {
        if (e.key === 't' || e.key === 'T') {
            ppToggle();
        }
    });
})();
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Git-folders\000form.com\resources\views/pages/pricing.blade.php ENDPATH**/ ?>