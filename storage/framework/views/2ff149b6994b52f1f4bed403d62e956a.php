<?php $__env->startSection('title', '000form - Free Form Backend for Your Website'); ?>

<?php $__env->startSection('content'); ?>


<section class="lp-hero">
    <div class="lp-hero__bg">
        <div class="lp-glow lp-glow--1"></div>
        <div class="lp-glow lp-glow--2"></div>
        <div class="lp-grid"></div>
        <div class="lp-noise"></div>
    </div>

    <div class="lp-container">

        
        <div class="lp-hero__center">

            <a href="<?php echo e(route('signup')); ?>" class="lp-badge">
                <span class="lp-badge__dot"></span>
                Free to start — no credit card required
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>

            <h1 class="lp-hero__title">
                Form backend<br>
                <span class="lp-hero__accent">without the backend</span>
            </h1>

            <p class="lp-hero__desc">
                Point your HTML <code class="lp-code-inline">&lt;form&gt;</code> at our endpoint and we handle the rest — submissions, spam filtering, instant email notifications, and a full management dashboard.
            </p>

            <div class="lp-hero__actions">
                <a href="<?php echo e(route('signup')); ?>" class="lp-btn lp-btn--primary lp-btn--lg">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
                    Create free account
                </a>
                <a href="<?php echo e(route('login')); ?>" class="lp-btn lp-btn--ghost lp-btn--lg">
                    Sign in
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>

            <div class="lp-hero__proof">
                <div class="lp-proof-item">
                    <span class="lp-proof-num">50</span>
                    <span class="lp-proof-lbl">free submissions/mo</span>
                </div>
                <div class="lp-proof-sep"></div>
                <div class="lp-proof-item">
                    <span class="lp-proof-num">∞</span>
                    <span class="lp-proof-lbl">unlimited forms</span>
                </div>
                <div class="lp-proof-sep"></div>
                <div class="lp-proof-item">
                    <span class="lp-proof-num">0</span>
                    <span class="lp-proof-lbl">lines of server code</span>
                </div>
            </div>

        </div>

        
        <div class="lp-hero__previews">

            
            <div class="lp-prev lp-prev--dashboard">
                <div class="lp-prev__label">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
                    Your dashboard
                </div>
                <div class="lp-dash">
                    
                    <div class="lp-dash__side">
                        <div class="lp-dash__logo">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="5" r="2"/><circle cx="5" cy="19" r="2"/><circle cx="19" cy="19" r="2"/><line x1="12" y1="7" x2="5" y2="17"/><line x1="12" y1="7" x2="19" y2="17"/></svg>
                            <span>000<b>form</b></span>
                        </div>
                        <div class="lp-dash__user">
                            <div class="lp-dash__avatar">S</div>
                            <span>you@email.com</span>
                        </div>
                        <nav class="lp-dash__nav">
                            <div class="lp-dash__nav-item lp-dash__nav-item--active">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
                                Dashboard
                            </div>
                            <div class="lp-dash__nav-item">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                New Form
                            </div>
                            <div class="lp-dash__nav-item">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                                Plan & Subscriptions
                            </div>
                            <div class="lp-dash__nav-item">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                                Account
                            </div>
                        </nav>
                    </div>
                    
                    <div class="lp-dash__main">
                        <div class="lp-dash__topbar">
                            <span class="lp-dash__page-title">Dashboard</span>
                            <div class="lp-dash__new-btn">+ New Form</div>
                        </div>
                        <div class="lp-dash__stats">
                            <div class="lp-dash__stat">
                                <div class="lp-dash__stat-lbl">Total Forms</div>
                                <div class="lp-dash__stat-val">4</div>
                            </div>
                            <div class="lp-dash__stat">
                                <div class="lp-dash__stat-lbl">Total Submissions</div>
                                <div class="lp-dash__stat-val">128</div>
                            </div>
                            <div class="lp-dash__stat">
                                <div class="lp-dash__stat-lbl">Valid</div>
                                <div class="lp-dash__stat-val lp-dash__stat-val--green">121</div>
                            </div>
                            <div class="lp-dash__stat">
                                <div class="lp-dash__stat-lbl">Spam Blocked</div>
                                <div class="lp-dash__stat-val lp-dash__stat-val--red">7</div>
                            </div>
                            <div class="lp-dash__stat">
                                <div class="lp-dash__stat-lbl">Unread</div>
                                <div class="lp-dash__stat-val lp-dash__stat-val--green">3</div>
                            </div>
                            <div class="lp-dash__stat">
                                <div class="lp-dash__stat-lbl">This Month</div>
                                <div class="lp-dash__stat-val">14 new</div>
                            </div>
                        </div>
                        <div class="lp-dash__forms-head">Your Forms</div>
                        <div class="lp-dash__form-row">
                            <div class="lp-dash__form-dot lp-dash__form-dot--on"></div>
                            <div class="lp-dash__form-name">contact-form</div>
                            <div class="lp-dash__form-sub">84 submissions</div>
                            <div class="lp-dash__form-badge">Active</div>
                        </div>
                        <div class="lp-dash__form-row">
                            <div class="lp-dash__form-dot lp-dash__form-dot--on"></div>
                            <div class="lp-dash__form-name">feedback</div>
                            <div class="lp-dash__form-sub">44 submissions</div>
                            <div class="lp-dash__form-badge">Active</div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="lp-prev lp-prev--email">
                <div class="lp-prev__label">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    Email notification
                </div>
                <div class="lp-email">
                    <div class="lp-email__chrome">
                        <div class="lp-email__from-row">
                            <div class="lp-email__sender-avatar">0</div>
                            <div class="lp-email__sender-info">
                                <div class="lp-email__sender-name">000form</div>
                                <div class="lp-email__sender-to">to me ↓</div>
                            </div>
                        </div>
                    </div>
                    <div class="lp-email__body">
                        <div class="lp-email__card">
                            <div class="lp-email__card-logo">
                                <span class="lp-email__logo-green">000</span><span class="lp-email__logo-white">form</span>
                            </div>
                            <div class="lp-email__card-title">New submission: Contact Form</div>
                            <div class="lp-email__card-divider"></div>
                            <div class="lp-email__card-meta">Received <?php echo e(now()->format('M d, Y')); ?> at <?php echo e(now()->format('h:i A')); ?></div>
                            <div class="lp-email__card-caption">Here's what they had to say:</div>
                            <div class="lp-email__card-fields">
                                <div class="lp-email__field">
                                    <div class="lp-email__field-key">MESSAGE</div>
                                    <div class="lp-email__field-val">Hi, I'm interested in your services and would love to learn more.</div>
                                </div>
                                <div class="lp-email__field">
                                    <div class="lp-email__field-key">NAME</div>
                                    <div class="lp-email__field-val">Jane Cooper</div>
                                </div>
                                <div class="lp-email__field">
                                    <div class="lp-email__field-key">EMAIL</div>
                                    <div class="lp-email__field-val lp-email__field-val--link">jane@example.com</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        

    </div>
</section>



<section class="lp-features" id="features">
    <div class="lp-container">

        <div class="lp-section-head">
            <div class="lp-section-tag">Features</div>
            <h2>Everything you need.<br><span class="lp-dim">Nothing you don't.</span></h2>
            <p>A complete form backend without the complexity — all the power, none of the server maintenance.</p>
        </div>

        <div class="lp-feat-grid">


            <div class="lp-feat-card">
                <div class="lp-feat-card__icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
                </div>
                <h3>Submission dashboard</h3>
                <p>All your responses, searchable and filterable in one place. Never lose a submission.</p>
                <div class="lp-feat-tag-row">
                    <span class="lp-feat-tag">Filter & search</span>
                    <span class="lp-feat-tag">Full history</span>
                </div>
            </div>

            <div class="lp-feat-card">
                <div class="lp-feat-card__icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                </div>
                <h3>Analytics & trends</h3>
                <p>Visualize submission volumes over time. Spot drop-offs or spikes at a glance.</p>
                <div class="lp-feat-tag-row">
                    <span class="lp-feat-tag">Volume graphs</span>
                    <span class="lp-feat-tag">Per-form stats</span>
                </div>
            </div>

            <div class="lp-feat-card">
                <div class="lp-feat-card__icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                </div>
                <h3>AJAX / fetch support</h3>
                <p>Submit without page reloads. Full JSON API — works with React, Vue, vanilla JS, anything.</p>
                <div class="lp-feat-tag-row">
                    <span class="lp-feat-tag">JSON API</span>
                    <span class="lp-feat-tag">CORS ready</span>
                </div>
            </div>

            <div class="lp-feat-card">
                <div class="lp-feat-card__icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                </div>
                <h3>CSV export</h3>
                <p>Download all submissions at any time. Your data belongs to you — always portable.</p>
                <div class="lp-feat-tag-row">
                    <span class="lp-feat-tag">One-click export</span>
                    <span class="lp-feat-tag">All fields</span>
                </div>
            </div>

            <div class="lp-feat-card">
                <div class="lp-feat-card__icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <h3>Team access</h3>
                <p>Invite teammates to view and manage submissions together on paid plans.</p>
                <div class="lp-feat-tag-row">
                    <span class="lp-feat-tag">Multi-user</span>
                    <span class="lp-feat-tag">Role access</span>
                </div>
            </div>

            <div class="lp-feat-card">
                <div class="lp-feat-card__icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                </div>
                <h3>File uploads</h3>
                <p>Accept file attachments directly through your forms. Stored securely, accessible from your dashboard.</p>
                <div class="lp-feat-tag-row">
                    <span class="lp-feat-tag">Up to 10MB</span>
                    <span class="lp-feat-tag">Secure storage</span>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="lp-hiw" id="how-it-works">
    <div class="lp-container">

        <div class="lp-section-head">
            <div class="lp-section-tag">Setup</div>
            <h2>Live in <span class="lp-accent-text">3 minutes</span>, literally.</h2>
            <p>No server. No config files. No deployment pipelines. Just a URL swap.</p>
        </div>

        <div class="lp-steps">

            <div class="lp-step">
                <div class="lp-step__num">01</div>
                <div class="lp-step__line"></div>
                <div class="lp-step__body">
                    <h3>Create your account</h3>
                    <p>Sign up free — no credit card required. Your account gives you a dashboard, submission history, and your own form endpoints.</p>
                    <a href="<?php echo e(route('signup')); ?>" class="lp-step__link">
                        Sign up now
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                </div>
            </div>

            <div class="lp-step">
                <div class="lp-step__num">02</div>
                <div class="lp-step__line"></div>
                <div class="lp-step__body">
                    <h3>Create a form endpoint</h3>
                    <p>From your dashboard, create a new form. Name it, configure notification settings, and copy your unique endpoint URL.</p>
                </div>
            </div>

            <div class="lp-step">
                <div class="lp-step__num">03</div>
                <div class="lp-step__body">
                    <h3>Point your HTML form at it</h3>
                    <p>Change your form's <code class="lp-code-inline">action</code> attribute to your endpoint URL. That's it. No other code changes needed.</p>
                    <div class="lp-step__snippet">
                        <span class="t-tag">&lt;form</span> <span class="t-attr">action</span>=<span class="t-str">"https://000form.com/f/<span class="t-accent">your-endpoint</span>"</span><span class="t-tag">&gt;</span>
                    </div>
                </div>
            </div>

        </div>

        <div class="lp-hiw__cta">
            <a href="<?php echo e(route('signup')); ?>" class="lp-btn lp-btn--primary lp-btn--lg">
                Get started for free
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
            <a href="<?php echo e(route('pricing')); ?>" class="lp-btn lp-btn--ghost lp-btn--lg">
                View pricing
            </a>
        </div>

    </div>
</section>


<section class="lp-preview">
    <div class="lp-container">

        <div class="lp-section-head">
            <div class="lp-section-tag">Dashboard</div>
            <h2>Your command center<br><span class="lp-dim">for every form.</span></h2>
            <p>Manage all your endpoints, browse submissions, export data, and invite your team — all in one focused interface.</p>
        </div>

        <div class="lp-dashboard-mock">
        <!-- Sidebar -->
        <aside class="lp-dm__sidebar">
            <div class="lp-dm__logo">000<span>form</span></div>
            <div class="lp-dm__user-info">
                <div class="lp-dm__user">Y</div>
                <div class="lp-dm__email">YOUR_EMAIL</div>
            </div>

            <nav>
            <div class="lp-dm__nav-item lp-dm__nav-item--active">Dashboard</div>
            <div class="lp-dm__nav-item">New Form</div>
            <div class="lp-dm__nav-item">Plan & Subscriptions</div>
            <div class="lp-dm__nav-item">Payment History</div>
            <div class="lp-dm__nav-item">Team Management</div>
            </nav>
        </aside>

        <!-- Main -->
        <main class="lp-dm__main">
            <!-- Topbar -->
            <div class="lp-dm__topbar">
            <div class="lp-dm__topbar-title">Dashboard</div>
            <div class="lp-dm__btn">+ New Form</div>
            </div>

            <!-- Stats -->
            <div class="lp-dm__stats">
            <div class="lp-dm__stat">
                <div class="lp-dm__stat-val bold">3</div>
                <div class="lp-dm__stat-lbl">Total Forms</div>
            </div>
            <div class="lp-dm__stat">
                <div class="lp-dm__stat-val bold">34</div>
                <div class="lp-dm__stat-lbl">Total Submissions</div>
            </div>
            <div class="lp-dm__stat">
                <div class="lp-dm__stat-val green">27</div>
                <div class="lp-dm__stat-lbl">Valid</div>
            </div>
            <div class="lp-dm__stat">
                <div class="lp-dm__stat-val red">7</div>
                <div class="lp-dm__stat-lbl">Spam Blocked</div>
            </div>
            <div class="lp-dm__stat">
                <div class="lp-dm__stat-val green">26</div>
                <div class="lp-dm__stat-lbl">Unread</div>
            </div>
            <div class="lp-dm__stat">
                <div class="lp-dm__stat-val bold">3 <strong>new</strong></div>
                <div class="lp-dm__stat-lbl">This Month</div>
            </div>
            </div>

            <!-- Table -->
            <table>
            <thead>
                <tr>
                <th>Form Name</th>
                <th>Endpoint</th>
                <th>Total</th>
                <th>Valid</th>
                <th>Spam</th>
                <th>Status</th>
                <th>Last Submission</th>
                <th>View</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td class="form-name">Contact Form <span class="new-badge">23 new</span></td>
                <td class="endpoint">/f/YOUR_TOKEN</td>
                <td>31</td>
                <td class="green">24</td>
                <td>7</td>
                <td><span class="badge green">Active</span></td>
                <td class="last-submission">1 week ago</td>
                <td class="view-link">View</td>
                </tr>
                <tr>
                <td class="form-name">Test form <span class="new-badge">3 new</span></td>
                <td class="endpoint">/f/YOUR_TOKEN</td>
                <td>3</td>
                <td class="green">3</td>
                <td>0</td>
                <td><span class="badge green">Active</span></td>
                <td class="last-submission">2 days ago</td>
                <td class="view-link">View</td>
                </tr>
            </tbody>
            </table>
        </main>
        </div>


    </div>
</section>


<section class="lp-pricing-teaser">
    <div class="lp-container">
        <div class="lp-pt__inner">
            <div class="lp-pt__left">
                <div class="lp-section-tag">Pricing</div>
                <h2>Start free.<br>Scale when ready.</h2>
                <p>The free plan gives you 50 submissions per month and unlimited forms — plenty to get started. Upgrade only when you need more.</p>
                <a href="<?php echo e(route('pricing')); ?>" class="lp-btn lp-btn--primary">
                    See all plans
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>
            <div class="lp-pt__plans">
                <div class="lp-pt__plan">
                    <div class="lp-pt__plan-name">Free</div>
                    <div class="lp-pt__plan-price">0<span>/mo</span></div>
                    <ul class="lp-pt__plan-feats">
                        <li>50 submissions/mo</li>
                        <li>Unlimited forms</li>
                        <li>Email notifications</li>
                    </ul>
                    <a href="<?php echo e(route('signup')); ?>" class="lp-pt__plan-btn lp-pt__plan-btn--outline">Get started</a>
                </div>
                <!-- <div class="lp-pt__plan">
                    <div class="lp-pt__plan-name">Other Plans</div>
                    <a href="<?php echo e(route('signup')); ?>" class="lp-pt__plan-btn lp-pt__plan-btn--outline">Personal</a>
                    <a href="<?php echo e(route('signup')); ?>" class="lp-pt__plan-btn lp-pt__plan-btn--outline">Professional</a>
                    <a href="<?php echo e(route('signup')); ?>" class="lp-pt__plan-btn lp-pt__plan-btn--outline">Business</a>
                </div> -->

            </div>
        </div>
    </div>
</section>


<section class="lp-cta">
    <div class="lp-cta__bg">
        <div class="lp-cta__glow"></div>
    </div>
    <div class="lp-container lp-cta__inner">
        <h2>Your forms deserve<br>a real backend.</h2>
        <p>Join developers, freelancers, and agencies who've ditched the DIY form scripts. Get started in under three minutes — for free.</p>
        <a href="<?php echo e(route('signup')); ?>" class="lp-btn lp-btn--primary lp-btn--xl">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
            Create your free account
        </a>
        <p class="lp-cta__note">Free forever plan available. No credit card required.</p>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .lp-pt__plans {
    display: flex;
    gap: 24px;
    margin-top: 20px;
    }

    .lp-pt__plan {
    background: #181a1f;
    border-radius: 12px;
    padding: 20px;
    flex: 1;
    text-align: center;
    }

    .lp-pt__plan-name {
    font-size: 18px;
    font-weight: 700;
    color: #fff;
    }

.lp-dm__user-info {
  display: flex;
  align-items: center;
  gap: 10px; /* space between avatar and email */
  margin-bottom: 13px;
}

.lp-dm__user {
  background: #0f422e;
  border-radius: 50%;
  width: 32px;
  height: 32px;
  line-height: 32px;
  text-align: center;
  font-weight: 700;
  color: #fff;
  user-select: none;
}


.lp-dm__email {
  font-size: 14px;
  color: #ccc;
  word-break: break-all;
}

.lp-dashboard-mock {
  display: flex;
  min-height: 100vh;
  font-family: "Inter", sans-serif;
  background: #121316;
  color: #fff;
}

/* Sidebar */
.lp-dm__sidebar {
  width: 220px;
  background: #0d0f12;
  color: #65ffa4;
  padding: 24px 16px;
  display: flex;
  flex-direction: column;
}

.lp-dm__logo {
  font-weight: 700;
  font-size: 24px;
  margin-bottom: 40px;
}
.lp-dm__logo span { color: #00d86a; }

.lp-dm__user {
  background: #0f422e;
  border-radius: 50%;
  width: 40px; height: 40px;
  line-height: 40px;
  text-align: center;
  font-weight: 700;
  margin-bottom: 12px;
}
.lp-dm__email {
  font-size: 14px;
  color: #ccc;
  margin-bottom: 32px;
  word-break: break-all;
}

.lp-dm__nav-item {
  padding: 8px 12px;
  cursor: pointer;
  font-weight: 600;
  color: #65ffa4;
  border-radius: 6px;
  transition: background 0.2s ease;
}
.lp-dm__nav-item:not(:last-child) { margin-bottom: 12px; }
.lp-dm__nav-item:hover { background: #1f2937; color: #fff; }
.lp-dm__nav-item--active { background: #1f2937; color: #fff; }

/* Main */
.lp-dm__main {
  flex: 1;
  background: #121316;
  padding: 24px 32px;
  display: flex;
  flex-direction: column;
}

/* Topbar */
.lp-dm__topbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 32px;
}
.lp-dm__topbar-title {
  font-size: 28px;
  font-weight: 700;
}
.lp-dm__btn {
  background: #00d86a;
  color: #121316;
  font-weight: 700;
  padding: 10px 18px;
  border-radius: 6px;
  cursor: pointer;
  transition: background 0.2s ease;
}
.lp-dm__btn:hover { background: #00c25d; }


.lp-dm__stat {
  background: #181a1f;
  flex: 1;
  border-radius: 12px;
  padding: 24px 20px;
}
.lp-dm__stat-lbl {
  font-weight: 600;
  font-size: 14px;
  color: #7a7d85;
  margin-top: 8px;
}
.lp-dm__stat-val {
  font-weight: 700;
  font-size: 28px;
}
.lp-dm__stat-val.green { color: #00d86a; }
.lp-dm__stat-val.red { color: #ff4949; }
.lp-dm__stat-val.bold { font-weight: 800; }

/* Table */
table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0 10px;
  color: #999;
  background: #181a1f;
  border-radius: 10px;
}
th, td {
  text-align: left;
  padding: 12px 16px;
  font-size: 14px;
}
thead th {
  color: #6e6e6e;
  text-transform: uppercase;
  font-weight: 500;
}
tbody tr {
  background: #181a1f;
  border-radius: 5px;
  transition: background 0.2s ease;
}

/* Form name + badge */
.form-name {
  color: #fff;
  font-weight: 700;
  display: flex;
  align-items: center;
  gap: 8px;
}
.new-badge {
  background: #134e33;
  color: #b6e2b6;
  font-size: 11px;
  font-weight: 600;
  padding: 2px 8px;
  border-radius: 12px;
}

/* Endpoint */
.endpoint { font-family: monospace; color: #666; }

/* Status badges */
.badge {
  border-radius : 12px;
  padding: 4px 12px;
                        }
/* ════════════════════════════════════════════════════════
   GLOBAL RESET / TOKENS
════════════════════════════════════════════════════════ */
.lp-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    width: 100%;
}

/* ════════════════════════════════════════════════════════
   HERO
════════════════════════════════════════════════════════ */
.lp-hero {
    position: relative;
    padding: 7rem 0 5rem;
    overflow: hidden;
}

.lp-hero__bg {
    position: absolute;
    inset: 0;
    pointer-events: none;
}

.lp-glow {
    position: absolute;
    border-radius: 50%;
    filter: blur(160px);
    pointer-events: none;
}

.lp-glow--1 {
    width: 700px; height: 700px;
    background: var(--accent, #00ff88);
    opacity: 0.07;
    top: -300px; right: -200px;
}

.lp-glow--2 {
    width: 500px; height: 500px;
    background: #0077ff;
    opacity: 0.05;
    bottom: -200px; left: -100px;
}

.lp-grid {
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px);
    background-size: 48px 48px;
    mask-image: radial-gradient(ellipse 80% 90% at 50% 0%, black 20%, transparent 100%);
}

.lp-noise {
    position: absolute;
    inset: 0;
    opacity: 0.018;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

.lp-hero .lp-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 4rem;
    position: relative;
    z-index: 2;
}

/* ── Center copy block ── */
.lp-hero__center {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 1.5rem;
    max-width: 720px;
    width: 100%;
}

/* Badge */
.lp-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 0.4rem 1rem 0.4rem 0.75rem;
    border-radius: 100px;
    background: rgba(0, 255, 136, 0.07);
    border: 1px solid rgba(0, 255, 136, 0.2);
    color: var(--accent, #00ff88);
    font-size: 0.78rem;
    font-weight: 600;
    text-decoration: none;
    width: fit-content;
    transition: all 0.2s ease;
}

.lp-badge:hover { background: rgba(0,255,136,0.12); border-color: rgba(0,255,136,0.35); }

.lp-badge__dot {
    width: 7px; height: 7px;
    border-radius: 50%;
    background: var(--accent, #00ff88);
    box-shadow: 0 0 0 3px rgba(0,255,136,0.2);
    animation: lp-pulse 2s infinite;
}

@keyframes lp-pulse {
    0%, 100% { box-shadow: 0 0 0 3px rgba(0,255,136,0.2); }
    50%       { box-shadow: 0 0 0 6px rgba(0,255,136,0.05); }
}

.lp-hero__title {
    font-size: clamp(2.8rem, 5.5vw, 4.5rem);
    font-weight: 800;
    line-height: 1.06;
    letter-spacing: -0.035em;
    color: var(--text-primary, #fff);
    margin: 0;
}

.lp-hero__accent {
    background: linear-gradient(120deg, var(--accent, #00ff88) 0%, #78b4ff 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.lp-hero__desc {
    font-size: 1.05rem;
    line-height: 1.75;
    color: var(--text-secondary, rgba(255,255,255,0.55));
    max-width: 560px;
    margin: 0;
}

.lp-code-inline {
    font-family: 'SF Mono', 'Fira Code', monospace;
    font-size: 0.9em;
    background: rgba(0,255,136,0.1);
    border: 1px solid rgba(0,255,136,0.2);
    color: var(--accent, #00ff88);
    padding: 0.1em 0.45em;
    border-radius: 4px;
}

/* Hero actions */
.lp-hero__actions {
    display: flex;
    gap: 0.85rem;
    flex-wrap: wrap;
    justify-content: center;
}

/* Proof row */
.lp-hero__proof {
    display: flex;
    align-items: center;
    gap: 1.75rem;
    padding-top: 0.25rem;
    flex-wrap: wrap;
    justify-content: center;
}

.lp-proof-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 3px;
}

.lp-proof-num {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--text-primary, #fff);
    line-height: 1;
}

.lp-proof-lbl {
    font-size: 0.65rem;
    color: var(--text-muted, rgba(255,255,255,0.3));
    text-transform: uppercase;
    letter-spacing: 0.07em;
}

.lp-proof-sep {
    width: 1px; height: 32px;
    background: var(--border-color, rgba(255,255,255,0.1));
}

/* ── Preview panels ── */
.lp-hero__previews {
    display: grid;
    grid-template-columns: 1.45fr 1fr;
    gap: 1.25rem;
    width: 100%;
    max-width: 1100px;
    align-items: start;
}

.lp-prev {
    display: flex;
    flex-direction: column;
    gap: 0.6rem;
}

.lp-prev__label {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.68rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: rgba(255,255,255,0.25);
}

/* ── Dashboard mock ── */
.lp-dash {
    display: flex;
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 14px;
    overflow: hidden;
    background: #0d0f10;
    box-shadow: 0 30px 80px rgba(0,0,0,0.5);
    font-size: 0.72rem;
}

.lp-dash__side {
    width: 148px;
    flex-shrink: 0;
    border-right: 1px solid rgba(255,255,255,0.07);
    padding: 1rem 0.75rem;
    display: flex;
    flex-direction: column;
    gap: 1rem;
    background: rgba(255,255,255,0.015);
}

.lp-dash__logo {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.82rem;
    font-weight: 700;
    color: rgba(255,255,255,0.9);
    padding: 0 0.25rem;
}

.lp-dash__logo svg { color: var(--accent, #00ff88); }
.lp-dash__logo b { color: var(--accent, #00ff88); font-weight: 800; }

.lp-dash__user {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(0,255,136,0.08);
    border: 1px solid rgba(0,255,136,0.15);
    border-radius: 8px;
    padding: 0.45rem 0.6rem;
    font-size: 0.65rem;
    color: rgba(255,255,255,0.6);
    overflow: hidden;
}

.lp-dash__avatar {
    width: 20px; height: 20px;
    border-radius: 50%;
    background: var(--accent, #00ff88);
    color: #000;
    font-weight: 800;
    font-size: 0.65rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.lp-dash__user span {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.lp-dash__nav {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.lp-dash__nav-item {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 0.45rem 0.6rem;
    border-radius: 7px;
    font-size: 0.7rem;
    color: rgba(255,255,255,0.4);
    cursor: pointer;
    transition: all 0.15s;
}

.lp-dash__nav-item--active {
    background: rgba(0,255,136,0.08);
    color: var(--accent, #00ff88);
    border: 1px solid rgba(0,255,136,0.15);
}

.lp-dash__main {
    flex: 1;
    padding: 0.9rem 1rem;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    overflow: hidden;
}

.lp-dash__topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.lp-dash__page-title {
    font-size: 0.95rem;
    font-weight: 700;
    color: rgba(255,255,255,0.9);
}

.lp-dash__new-btn {
    background: var(--accent, #00ff88);
    color: #000;
    font-size: 0.65rem;
    font-weight: 700;
    padding: 0.35rem 0.75rem;
    border-radius: 7px;
    cursor: pointer;
}

.lp-dash__stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 0.5rem;
}

.lp-dash__stat {
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.07);
    border-radius: 8px;
    padding: 0.55rem 0.65rem;
}

.lp-dash__stat-lbl {
    font-size: 0.6rem;
    color: rgba(255,255,255,0.3);
    margin-bottom: 3px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.lp-dash__stat-val {
    font-size: 1.05rem;
    font-weight: 800;
    color: rgba(255,255,255,0.9);
    letter-spacing: -0.02em;
}

.lp-dash__stat-val--green { color: var(--accent, #00ff88); }
.lp-dash__stat-val--red   { color: #ff5555; }

.lp-dash__forms-head {
    font-size: 0.6rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: rgba(255,255,255,0.2);
}

.lp-dash__form-row {
    display: flex;
    align-items: center;
    gap: 0.6rem;
    background: rgba(255,255,255,0.02);
    border: 1px solid rgba(255,255,255,0.06);
    border-radius: 8px;
    padding: 0.55rem 0.7rem;
}

.lp-dash__form-dot {
    width: 6px; height: 6px;
    border-radius: 50%;
    flex-shrink: 0;
}

.lp-dash__form-dot--on { background: var(--accent, #00ff88); box-shadow: 0 0 0 2px rgba(0,255,136,0.2); }

.lp-dash__form-name {
    font-size: 0.72rem;
    font-weight: 600;
    color: rgba(255,255,255,0.8);
    flex: 1;
}

.lp-dash__form-sub {
    font-size: 0.62rem;
    color: rgba(255,255,255,0.3);
}

.lp-dash__form-badge {
    font-size: 0.58rem;
    font-weight: 700;
    background: rgba(0,255,136,0.1);
    border: 1px solid rgba(0,255,136,0.2);
    color: var(--accent, #00ff88);
    padding: 0.15rem 0.5rem;
    border-radius: 100px;
}

/* ── Email preview ── */
.lp-email {
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 14px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 24px 64px rgba(0,0,0,0.45);
}

.lp-email__chrome {
    background: #f5f5f5;
    border-bottom: 1px solid #e0e0e0;
    padding: 0.65rem 1rem;
}

.lp-email__from-row {
    display: flex;
    align-items: center;
    gap: 0.6rem;
}

.lp-email__sender-avatar {
    width: 28px; height: 28px;
    border-radius: 50%;
    background: linear-gradient(135deg, #1a1a1a, #333);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.72rem;
    font-weight: 800;
    color: var(--accent, #00ff88);
    flex-shrink: 0;
}

.lp-email__sender-name {
    font-size: 0.78rem;
    font-weight: 700;
    color: #1a1a1a;
}

.lp-email__sender-to {
    font-size: 0.65rem;
    color: #666;
}

.lp-email__body {
    padding: 1rem;
    background: #f9f9f9;
}

.lp-email__card {
    background: #111;
    border-radius: 10px;
    overflow: hidden;
    padding: 1.1rem 1.25rem;
    display: flex;
    flex-direction: column;
    gap: 0.6rem;
}

.lp-email__card-logo {
    font-size: 0.88rem;
    font-weight: 800;
    letter-spacing: -0.01em;
    margin-bottom: 0.15rem;
}

.lp-email__logo-green { color: var(--accent, #00ff88); }
.lp-email__logo-white { color: #fff; }

.lp-email__card-title {
    font-size: 0.92rem;
    font-weight: 700;
    color: #fff;
}

.lp-email__card-divider {
    height: 1px;
    background: rgba(255,255,255,0.08);
    margin: 0.15rem 0;
}

.lp-email__card-meta {
    font-size: 0.68rem;
    color: rgba(255,255,255,0.35);
}

.lp-email__card-caption {
    font-size: 0.7rem;
    color: rgba(255,255,255,0.4);
}

.lp-email__card-fields {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    margin-top: 0.25rem;
}

.lp-email__field {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.lp-email__field-key {
    font-size: 0.6rem;
    font-weight: 700;
    letter-spacing: 0.08em;
    color: rgba(255,255,255,0.28);
    text-transform: uppercase;
}

.lp-email__field-val {
    font-size: 0.75rem;
    color: rgba(255,255,255,0.85);
    line-height: 1.4;
}

.lp-email__field-val--link { color: #79aaff; }

/* ════════════════════════════════════════════════════════
   BUTTONS
════════════════════════════════════════════════════════ */
.lp-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
    font-size: 0.9rem;
    text-decoration: none;
    border-radius: 10px;
    padding: 0.75rem 1.5rem;
    border: none;
    cursor: pointer;
    transition: all 0.2s ease;
    white-space: nowrap;
}

.lp-btn--lg  { padding: 0.875rem 1.75rem; font-size: 0.95rem; }
.lp-btn--xl  { padding: 1.1rem 2.25rem; font-size: 1.05rem; border-radius: 12px; }

.lp-btn--primary {
    background: var(--accent, #00ff88);
    color: #000;
}
.lp-btn--primary:hover { background: #00e87a; transform: translateY(-2px); box-shadow: 0 8px 28px rgba(0,255,136,0.3); }

.lp-btn--ghost {
    background: transparent;
    color: var(--text-primary, #fff);
    border: 1px solid rgba(255,255,255,0.15);
}
.lp-btn--ghost:hover { border-color: rgba(255,255,255,0.35); background: rgba(255,255,255,0.04); transform: translateY(-2px); }

/* ════════════════════════════════════════════════════════
   TRUST BAR
════════════════════════════════════════════════════════ */
.lp-trust {
    border-top: 1px solid var(--border-color, rgba(255,255,255,0.07));
    border-bottom: 1px solid var(--border-color, rgba(255,255,255,0.07));
    padding: 1.1rem 0;
    background: rgba(255,255,255,0.015);
}

.lp-trust__inner {
    display: flex;
    align-items: center;
    gap: 2rem;
    flex-wrap: wrap;
}

.lp-trust__label {
    font-size: 0.72rem;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: rgba(255,255,255,0.25);
    white-space: nowrap;
    font-weight: 600;
}

.lp-trust__logos {
    display: flex;
    align-items: center;
    gap: 0.9rem;
    flex-wrap: wrap;
}

.lp-trust__logo {
    font-size: 0.8rem;
    font-weight: 600;
    color: rgba(255,255,255,0.35);
    transition: color 0.2s;
}

.lp-trust__logo:hover { color: rgba(255,255,255,0.7); }

.lp-trust__sep { color: rgba(255,255,255,0.1); }

/* ════════════════════════════════════════════════════════
   SECTION HEADER
════════════════════════════════════════════════════════ */
.lp-section-head {
    text-align: center;
    max-width: 640px;
    margin: 0 auto 4rem;
}

.lp-section-tag {
    display: inline-block;
    font-family: var(--font-mono, monospace);
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--accent, #00ff88);
    background: rgba(0,255,136,0.08);
    border: 1px solid rgba(0,255,136,0.2);
    padding: 0.25rem 0.85rem;
    border-radius: 100px;
    margin-bottom: 1.25rem;
    width: fit-content;
}

.lp-section-head h2 {
    font-size: clamp(1.8rem, 3.5vw, 2.75rem);
    font-weight: 800;
    line-height: 1.15;
    letter-spacing: -0.025em;
    color: var(--text-primary, #fff);
    margin: 0 0 1rem;
}

.lp-section-head p {
    font-size: 1rem;
    color: var(--text-secondary, rgba(255,255,255,0.55));
    line-height: 1.65;
    margin: 0;
}

.lp-dim { color: rgba(255,255,255,0.3); }
.lp-accent-text { color: var(--accent, #00ff88); }

/* ════════════════════════════════════════════════════════
   FEATURES
════════════════════════════════════════════════════════ */
.lp-features {
    padding: 6rem 0;
    background: linear-gradient(to bottom, transparent, rgba(0,255,136,0.015), transparent);
}

.lp-feat-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.25rem;
}

.lp-feat-card {
    background: var(--bg-card, rgba(255,255,255,0.03));
    border: 1px solid var(--border-color, rgba(255,255,255,0.08));
    border-radius: 18px;
    padding: 1.75rem;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    transition: all 0.25s ease;
    position: relative;
    overflow: hidden;
}

.lp-feat-card::before {
    content: '';
    position: absolute;
    inset: 0;
    border-radius: inherit;
    background: radial-gradient(circle at top left, rgba(0,255,136,0.04), transparent 60%);
    opacity: 0;
    transition: opacity 0.3s;
}

.lp-feat-card:hover { transform: translateY(-4px); border-color: rgba(0,255,136,0.2); box-shadow: 0 16px 48px rgba(0,255,136,0.08); }
.lp-feat-card:hover::before { opacity: 1; }

.lp-feat-card--wide {
    grid-column: span 2;
}

.lp-feat-card__icon {
    width: 44px; height: 44px;
    border-radius: 12px;
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgba(255,255,255,0.6);
    flex-shrink: 0;
}

.lp-feat-card__icon--accent {
    background: rgba(0,255,136,0.1);
    border-color: rgba(0,255,136,0.25);
    color: var(--accent, #00ff88);
}

.lp-feat-card h3 {
    font-size: 1rem;
    font-weight: 700;
    color: var(--text-primary, #fff);
    margin: 0;
}

.lp-feat-card p {
    font-size: 0.875rem;
    line-height: 1.65;
    color: var(--text-secondary, rgba(255,255,255,0.5));
    margin: 0;
}

.lp-feat-tag-row {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
    margin-top: auto;
    padding-top: 0.5rem;
}

.lp-feat-tag {
    font-family: var(--font-mono, monospace);
    font-size: 0.62rem;
    font-weight: 600;
    padding: 0.2rem 0.6rem;
    border-radius: 4px;
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.1);
    color: rgba(255,255,255,0.4);
    letter-spacing: 0.03em;
}

/* Email preview widget */
.lp-feat-card__visual--email {
    margin-top: auto;
}

.lp-email-preview {
    background: rgba(0,0,0,0.3);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 12px;
    padding: 1rem 1.25rem;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.lp-ep__header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 0.75rem;
}

.lp-ep__from {
    display: flex;
    align-items: center;
    gap: 0.65rem;
}

.lp-ep__avatar {
    width: 30px; height: 30px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--accent, #00ff88), #78b4ff);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    font-weight: 700;
    color: #000;
}

.lp-ep__name { font-size: 0.8rem; font-weight: 600; color: rgba(255,255,255,0.9); }
.lp-ep__addr { font-size: 0.68rem; color: rgba(255,255,255,0.3); }
.lp-ep__time { font-size: 0.68rem; color: rgba(255,255,255,0.2); }

.lp-ep__subject {
    font-size: 0.78rem;
    font-weight: 600;
    color: rgba(255,255,255,0.7);
}

.lp-ep__rows {
    display: flex;
    flex-direction: column;
    gap: 0.3rem;
}

.lp-ep__row {
    display: flex;
    gap: 0.75rem;
    font-size: 0.75rem;
}

.lp-ep__row span:first-child {
    min-width: 60px;
    color: rgba(255,255,255,0.25);
    font-weight: 600;
    font-size: 0.68rem;
    text-transform: uppercase;
    letter-spacing: 0.04em;
}

.lp-ep__row span:last-child {
    color: rgba(255,255,255,0.7);
}

/* ════════════════════════════════════════════════════════
   HOW IT WORKS
════════════════════════════════════════════════════════ */
.lp-hiw {
    padding: 6rem 0;
}

.lp-steps {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 3rem;
    margin-bottom: 3.5rem;
    position: relative;
}

.lp-steps::before {
    content: '';
    position: absolute;
    top: 1.6rem;
    left: calc(16.66% + 1.5rem);
    right: calc(16.66% + 1.5rem);
    height: 1px;
    background: linear-gradient(to right, rgba(0,255,136,0.3), rgba(0,255,136,0.1), rgba(0,255,136,0.3));
}

.lp-step {
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
    position: relative;
}

.lp-step__num {
    width: 52px; height: 52px;
    border-radius: 50%;
    background: var(--bg-card, rgba(255,255,255,0.03));
    border: 1px solid rgba(0,255,136,0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: var(--font-mono, monospace);
    font-size: 0.85rem;
    font-weight: 700;
    color: var(--accent, #00ff88);
    position: relative;
    z-index: 1;
}

.lp-step__line { display: none; }

.lp-step__body h3 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--text-primary, #fff);
    margin: 0 0 0.5rem;
}

.lp-step__body p {
    font-size: 0.875rem;
    line-height: 1.65;
    color: var(--text-secondary, rgba(255,255,255,0.5));
    margin: 0;
}

.lp-step__link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin-top: 0.75rem;
    font-size: 0.85rem;
    font-weight: 600;
    color: var(--accent, #00ff88);
    text-decoration: none;
    transition: gap 0.2s;
}
.lp-step__link:hover { gap: 10px; }

.lp-step__snippet {
    margin-top: 0.75rem;
    background: rgba(0,0,0,0.3);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 8px;
    padding: 0.6rem 0.9rem;
    font-family: 'SF Mono', 'Fira Code', monospace;
    font-size: 0.72rem;
    line-height: 1.6;
    color: rgba(255,255,255,0.6);
    overflow-x: auto;
}

.lp-hiw__cta {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
}

/* ════════════════════════════════════════════════════════
   DASHBOARD PREVIEW
════════════════════════════════════════════════════════ */
.lp-preview {
    padding: 6rem 0;
    background: linear-gradient(to bottom, transparent, rgba(0,0,0,0.3), transparent);
}

.lp-dashboard-mock {
    display: flex;
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 40px 100px rgba(0,0,0,0.5);
    background: rgba(10,12,14,0.95);
    min-height: 480px;
    margin-top: 1rem;
}



.lp-dm__logo {
    font-size: 1.1rem;
    font-weight: 800;
    color: rgba(255,255,255,0.9);
    letter-spacing: -0.02em;
    padding: 0 0.5rem;
}

.lp-dm__logo span { color: var(--accent, #00ff88); }

.lp-dm__nav {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.lp-dm__nav-item {
    display: flex;
    align-items: center;
    gap: 0.65rem;
    padding: 0.6rem 0.75rem;
    border-radius: 8px;
    font-size: 0.8rem;
    color: rgba(255,255,255,0.4);
    cursor: pointer;
    transition: all 0.2s;
}

.lp-dm__nav-item--active {
    background: rgba(0,255,136,0.08);
    color: var(--accent, #00ff88);
    border: 1px solid rgba(0,255,136,0.15);
}

.lp-dm__main {
    flex: 1;
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    overflow: hidden;
}

.lp-dm__topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.lp-dm__topbar-title {
    font-size: 1rem;
    font-weight: 700;
    color: rgba(255,255,255,0.9);
}

.lp-dm__topbar-actions {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.lp-dm__search {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 8px;
    padding: 0.45rem 0.85rem;
    font-size: 0.75rem;
    color: rgba(255,255,255,0.3);
}

.lp-dm__btn {
    background: var(--accent, #00ff88);
    color: #000;
    font-size: 0.75rem;
    font-weight: 700;
    padding: 0.45rem 0.9rem;
    border-radius: 8px;
    cursor: pointer;
}

.lp-dm__stats {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 0.75rem;
}

.lp-dm__stat {
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.07);
    border-radius: 10px;
    padding: 0.85rem 1rem;
}

.lp-dm__stat-val {
    font-size: 1.4rem;
    font-weight: 800;
    color: rgba(255,255,255,0.9);
    letter-spacing: -0.02em;
}

.lp-dm__stat-lbl {
    font-size: 0.68rem;
    color: rgba(255,255,255,0.3);
    margin-top: 2px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.lp-dm__chart {
    background: rgba(255,255,255,0.02);
    border: 1px solid rgba(255,255,255,0.06);
    border-radius: 12px;
    padding: 1rem 1.25rem;
}

.lp-dm__chart-label {
    font-size: 0.7rem;
    color: rgba(255,255,255,0.3);
    margin-bottom: 1rem;
    text-transform: uppercase;
    letter-spacing: 0.06em;
}

.lp-dm__bars {
    display: flex;
    align-items: flex-end;
    gap: 6px;
    height: 64px;
}

.lp-dm__bar {
    flex: 1;
    height: var(--h);
    background: rgba(0,255,136,0.2);
    border-radius: 4px 4px 0 0;
    position: relative;
    transition: background 0.2s;
}

.lp-dm__bar:hover { background: rgba(0,255,136,0.4); }
.lp-dm__bar--today { background: rgba(0,255,136,0.5); }

.lp-dm__bar span {
    position: absolute;
    bottom: -1.2rem;
    left: 50%;
    transform: translateX(-50%);
    font-size: 0.6rem;
    color: rgba(255,255,255,0.25);
    white-space: nowrap;
}

.lp-dm__recent {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    flex: 1;
}

.lp-dm__recent-head {
    font-size: 0.7rem;
    font-weight: 600;
    color: rgba(255,255,255,0.25);
    text-transform: uppercase;
    letter-spacing: 0.08em;
    margin-bottom: 0.25rem;
}

.lp-dm__row {
    display: flex;
    align-items: center;
    gap: 0.85rem;
    padding: 0.7rem 0.9rem;
    border-radius: 10px;
    background: rgba(255,255,255,0.02);
    border: 1px solid rgba(255,255,255,0.05);
}

.lp-dm__row-avatar {
    width: 32px; height: 32px;
    border-radius: 50%;
    background: rgba(0,255,136,0.15);
    border: 1px solid rgba(0,255,136,0.25);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    font-weight: 700;
    color: var(--accent, #00ff88);
    flex-shrink: 0;
}

.lp-dm__row-avatar--b { background: rgba(120,180,255,0.15); border-color: rgba(120,180,255,0.25); color: #78b4ff; }
.lp-dm__row-avatar--c { background: rgba(255,200,80,0.15); border-color: rgba(255,200,80,0.25); color: #ffc850; }

.lp-dm__row-info { flex: 1; min-width: 0; }

.lp-dm__row-name {
    font-size: 0.8rem;
    font-weight: 600;
    color: rgba(255,255,255,0.85);
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.lp-dm__row-form {
    font-size: 0.65rem;
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.08);
    color: rgba(255,255,255,0.35);
    padding: 0.1rem 0.45rem;
    border-radius: 4px;
    font-weight: 500;
}

.lp-dm__row-msg {
    font-size: 0.75rem;
    color: rgba(255,255,255,0.3);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.lp-dm__row-time {
    font-size: 0.68rem;
    color: rgba(255,255,255,0.2);
    white-space: nowrap;
    flex-shrink: 0;
}

/* ════════════════════════════════════════════════════════
   PRICING TEASER
════════════════════════════════════════════════════════ */
.lp-pricing-teaser {
    padding: 6rem 0;
}

.lp-pt__inner {
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    gap: 4rem;
    align-items: center;
}

.lp-pt__left {
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
}

.lp-pt__left h2 {
    font-size: clamp(1.8rem, 3vw, 2.5rem);
    font-weight: 800;
    line-height: 1.15;
    letter-spacing: -0.025em;
    color: var(--text-primary, #fff);
    margin: 0;
}

.lp-pt__left p {
    font-size: 0.95rem;
    line-height: 1.7;
    color: var(--text-secondary, rgba(255,255,255,0.55));
    margin: 0;
}

.lp-pt__plans {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
    align-items: start;
}

.lp-pt__plan {
    background: var(--bg-card, rgba(255,255,255,0.03));
    border: 1px solid var(--border-color, rgba(255,255,255,0.08));
    border-radius: 18px;
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    position: relative;
    transition: all 0.2s ease;
}

.lp-pt__plan--featured {
    border-color: rgba(0,255,136,0.3);
    background: linear-gradient(145deg, rgba(0,255,136,0.05), rgba(255,255,255,0.02));
    box-shadow: 0 16px 48px rgba(0,255,136,0.1);
}

.lp-pt__plan-tag {
    font-family: var(--font-mono, monospace);
    font-size: 0.62rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.07em;
    color: var(--accent, #00ff88);
    background: rgba(0,255,136,0.1);
    border: 1px solid rgba(0,255,136,0.2);
    padding: 0.2rem 0.6rem;
    border-radius: 100px;
    width: fit-content;
}

.lp-pt__plan-name {
    font-size: 0.8rem;
    font-weight: 700;
    color: #00ff88;
    text-transform: uppercase;
    letter-spacing: 0.06em;
}

.lp-pt__plan-price {
    font-size: 2rem;
    font-weight: 800;
    letter-spacing: -0.03em;
    color: var(--text-primary, #fff);
    line-height: 1;
}

.lp-pt__plan-price span {
    font-size: 0.9rem;
    font-weight: 400;
    color: rgba(255,255,255,0.35);
}

.lp-pt__plan-feats {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 0.45rem;
}

.lp-pt__plan-feats li {
    font-size: 0.8rem;
    color: rgba(255,255,255,0.5);
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.lp-pt__plan-feats li::before {
    content: '';
    width: 5px; height: 5px;
    border-radius: 50%;
    background: var(--accent, #00ff88);
    opacity: 0.5;
    flex-shrink: 0;
}

.lp-pt__plan-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0.65rem;
    border-radius: 8px;
    font-size: 0.82rem;
    font-weight: 600;
    text-decoration: none;
    text-align: center;
    margin-top: 0.5rem;
    transition: all 0.2s;
}

.lp-pt__plan-btn--outline {
    border: 1px solid #00ff88;
    color: #00ff88;
}
.lp-pt__plan-btn--outline:hover { background-color: #00ff88; color: black; }

.lp-pt__plan-btn--solid {
    background: var(--accent, #00ff88);
    color: #000;
}
.lp-pt__plan-btn--solid:hover { background: #00e87a; transform: translateY(-1px); box-shadow: 0 6px 20px rgba(0,255,136,0.25); }

/* ════════════════════════════════════════════════════════
   FINAL CTA
════════════════════════════════════════════════════════ */
.lp-cta {
    padding: 7rem 0;
    position: relative;
    overflow: hidden;
    text-align: center;
}

.lp-cta__bg {
    position: absolute;
    inset: 0;
    pointer-events: none;
}

.lp-cta__glow {
    position: absolute;
    width: 800px; height: 400px;
    border-radius: 50%;
    background: var(--accent, #00ff88);
    filter: blur(200px);
    opacity: 0.06;
    top: 50%; left: 50%;
    transform: translate(-50%, -50%);
}

.lp-cta__inner {
    position: relative;
    z-index: 2;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1.5rem;
}

.lp-cta__inner h2 {
    font-size: clamp(2rem, 4vw, 3.25rem);
    font-weight: 800;
    line-height: 1.1;
    letter-spacing: -0.03em;
    color: var(--text-primary, #fff);
    margin: 0;
}

.lp-cta__inner p {
    font-size: 1rem;
    line-height: 1.65;
    color: rgba(255,255,255,0.5);
    max-width: 520px;
    margin: 0;
}

.lp-cta__note {
    font-size: 0.78rem !important;
    color: rgba(255,255,255,0.2) !important;
}

/* ════════════════════════════════════════════════════════
   RESPONSIVE
════════════════════════════════════════════════════════ */
@media (max-width: 1024px) {
    .lp-feat-grid { grid-template-columns: repeat(2, 1fr); }
    .lp-feat-card--wide { grid-column: span 2; }
    .lp-dm__stats { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 860px) {
    .lp-hero__previews { grid-template-columns: 1fr; max-width: 520px; margin: 0 auto; }
    .lp-steps { grid-template-columns: 1fr; gap: 2rem; }
    .lp-steps::before { display: none; }
    .lp-pt__inner { grid-template-columns: 1fr; }
    .lp-dashboard-mock { flex-direction: column; }
    .lp-dm__sidebar { width: 100%; flex-direction: row; flex-wrap: wrap; padding: 1rem; gap: 1rem; border-right: none; border-bottom: 1px solid rgba(255,255,255,0.07); }
    .lp-dm__nav { flex-direction: row; flex-wrap: wrap; }
}

@media (max-width: 640px) {
    .lp-hero { padding: 5rem 0 3rem; }
    .lp-features, .lp-hiw, .lp-preview, .lp-pricing-teaser, .lp-cta { padding: 4rem 0; }
    .lp-feat-grid { grid-template-columns: 1fr; }
    .lp-feat-card--wide { grid-column: span 1; }
    .lp-pt__plans { grid-template-columns: 1fr; }
    .lp-hero__proof { flex-wrap: wrap; }
    .lp-trust__inner { flex-direction: column; align-items: flex-start; gap: 0.75rem; }
    .lp-dm__stats { grid-template-columns: repeat(2, 1fr); }
    .lp-container { padding: 0 1.25rem; }
}

</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function () {

    // Smooth scroll
    document.querySelectorAll('.lp-smooth-scroll').forEach(link => {
        link.addEventListener('click', function (e) {
            const hash = this.getAttribute('href');
            const target = document.querySelector(hash);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                history.replaceState(null, '', window.location.pathname);
            }
        });
    });

    // Copy code button
    const copyBtn = document.getElementById('lpCopyBtn');
    if (copyBtn) {
        copyBtn.addEventListener('click', async function () {
            const code = document.querySelector('.lp-code-block__body pre').innerText;
            try {
                await navigator.clipboard.writeText(code);
                copyBtn.textContent = 'Copied!';
                copyBtn.style.color = 'var(--accent, #00ff88)';
                copyBtn.style.borderColor = 'rgba(0,255,136,0.4)';
                setTimeout(() => {
                    copyBtn.textContent = 'Copy';
                    copyBtn.style.color = '';
                    copyBtn.style.borderColor = '';
                }, 2000);
            } catch (e) {}
        });
    }

    // Intersection observer for fade-in on scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.lp-feat-card, .lp-step, .lp-pt__plan').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(18px)';
        el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        observer.observe(el);
    });

});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Git-folders\000form.com\resources\views/pages/home.blade.php ENDPATH**/ ?>