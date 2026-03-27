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

        
        <div class="lp-hero__rows">

            
            <div class="lp-hero__row">

                <div class="lp-prev lp-prev--dashboard">
                    <div class="lp-prev__label">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
                        Your dashboard
                    </div>
                    <div class="lp-dash">
                        <div class="lp-dash__side">
                            <div class="lp-dash__logo"><span>000<b>form</b></span></div>
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

                <div class="lp-hero__row-copy">
                    <div class="lp-hero__row-tag">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
                        Command center
                    </div>
                    <h3>Every submission,<br>in one place.</h3>
                    <p>Your dashboard gives you a bird's-eye view of all your forms — total submissions, spam blocked, unread counts, and active status at a glance. No more digging through email threads or spreadsheets.</p>
                    <ul class="lp-hero__row-bullets">
                        <li>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            Real-time submission counts per form
                        </li>
                        <li>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            Spam blocked automatically, never in your inbox
                        </li>
                        <li>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            Manage unlimited forms from one account
                        </li>
                    </ul>
                </div>

            </div>

            
            <div class="lp-hero__row lp-hero__row--reverse">

                <div class="lp-hero__row-copy">
                    <div class="lp-hero__row-tag">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        Instant notifications
                    </div>
                    <h3>Submissions hit your<br>inbox instantly.</h3>
                    <p>The moment someone submits your form, you get a clean, well-formatted email notification with every field clearly laid out. Reply directly from your inbox — no logging in required.</p>
                    <ul class="lp-hero__row-bullets">
                        <li>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            Delivered in seconds, every time
                        </li>
                        <li>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            Reply-to set to the submitter's email
                        </li>
                        <li>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                            Fully customizable notification template
                        </li>
                    </ul>
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
        

    </div>
</section>


<section class="lp-core">
    <div class="lp-core__glow"></div>
    <div class="lp-container">

        <div class="lp-split">

            
            <div class="lp-split__copy">

                <div class="lp-mode-badge lp-mode-badge--core">
                    <span class="lp-mode-badge__dot"></span>
                    Core
                </div>

                <h2 class="lp-split__title">
                    Your data.<br>
                    <span class="lp-split__accent lp-split__accent--core">Your dashboard.</span>
                </h2>

                <p class="lp-split__desc">
                    Register a free account, spin up unlimited form endpoints, and every submission lands in your personal dashboard — searchable, filterable, exportable, and always yours.
                </p>

                <ul class="lp-split__perks">
                    <li>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        Permanent submission storage &amp; full history
                    </li>
                    <li>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        Analytics  per form
                    </li>
                    <li>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        Spam filtering, CSV export &amp; file uploads
                    </li>
                    <li>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        Team collaboration on paid plans
                    </li>
                </ul>

                <a href="<?php echo e(route('signup')); ?>" class="lp-split__cta lp-split__cta--core">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
                    Create free account
                </a>

                <p class="lp-split__note">No credit card · Unlimited forms · 50 free submissions/mo</p>

            </div>

            
            <div class="lp-split__steps">

                <div class="lp-split__step">
                    <div class="lp-split__step-num lp-split__step-num--core">01</div>
                    <div class="lp-split__step-line lp-split__step-line--core"></div>
                    <div class="lp-split__step-body">
                        <strong>Register your account</strong>
                        <span>Free forever plan — no credit card needed. Your account unlocks a personal dashboard and submission history.</span>
                    </div>
                </div>

                <div class="lp-split__step">
                    <div class="lp-split__step-num lp-split__step-num--core">02</div>
                    <div class="lp-split__step-line lp-split__step-line--core"></div>
                    <div class="lp-split__step-body">
                        <strong>Create unlimited endpoints</strong>
                        <span>From your dashboard, create a form endpoint. Name it, set notifications, copy the URL — done.</span>
                    </div>
                </div>

                <div class="lp-split__step">
                    <div class="lp-split__step-num lp-split__step-num--core">03</div>
                    <div class="lp-split__step-body">
                        <strong>All data stored in your dashboard</strong>
                        <span>Every submission is saved, searchable, and exportable. Browse, filter, and reply from one place.</span>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>


<section class="lp-express">
    <div class="lp-express__glow"></div>
    <div class="lp-container">

        <div class="lp-split lp-split--reverse">

            
            <div class="lp-split__steps">

                <div class="lp-split__step">
                    <div class="lp-split__step-num lp-split__step-num--express">01</div>
                    <div class="lp-split__step-line lp-split__step-line--express"></div>
                    <div class="lp-split__step-body">
                        <strong>Enter your email</strong>
                        <span>No account, no password, no credit card — just your email address.</span>
                    </div>
                </div>

                <div class="lp-split__step">
                    <div class="lp-split__step-num lp-split__step-num--express">02</div>
                    <div class="lp-split__step-line lp-split__step-line--express"></div>
                    <div class="lp-split__step-body">
                        <strong>Verify once</strong>
                        <span>Click the link we send — that's your only setup step. Takes under 30 seconds.</span>
                    </div>
                </div>

                <div class="lp-split__step">
                    <div class="lp-split__step-num lp-split__step-num--express">03</div>
                    <div class="lp-split__step-body">
                        <strong>Start getting notifications</strong>
                        <span>Submissions hit your inbox instantly. Spam filtered, reply-to pre-set, delivered in seconds.</span>
                    </div>
                </div>

            </div>

            
            <div class="lp-split__copy">

                <div class="lp-mode-badge lp-mode-badge--express">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                    Express
                </div>

                <h2 class="lp-split__title">
                    Zero setup.<br>
                    <span class="lp-split__accent lp-split__accent--express">Just notifications.</span>
                </h2>

                <p class="lp-split__desc">
                    No account required. Verify your email once and your endpoint is live — submissions land in your inbox within seconds, every time.
                </p>

                <ul class="lp-split__perks lp-split__perks--express">
                    <li>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        No registration, no login, no dashboard
                    </li>
                    <li>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        Instant email delivery, reply-to pre-set
                    </li>
                    <li>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        Spam &amp; honeypot protection included
                    </li>
                    <li>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        Live in under 60 seconds
                    </li>
                </ul>

                <a href="/express" class="lp-split__cta lp-split__cta--express">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                    Get started — no account needed
                </a>

                <p class="lp-split__note lp-split__note--express">Verify email once · Instant notifications · No dashboard</p>

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

            <div class="lp-feat-card lp-feat-card--wide">
                <div class="lp-feat-card__icon lp-feat-card__icon--accent">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><path d="M22 6l-10 7L2 6"/></svg>
                </div>
                <h3>Instant email notifications</h3>
                <p>Every form submission lands directly in your inbox. Reply to the sender without ever logging into a dashboard. Customize your notification template.</p>
                <div class="lp-feat-card__visual lp-feat-card__visual--email">
                    <div class="lp-email-preview">
                        <div class="lp-ep__header">
                            <div class="lp-ep__from">
                                <div class="lp-ep__avatar">J</div>
                                <div>
                                    <div class="lp-ep__name">John Smith</div>
                                    <div class="lp-ep__addr">via 000form.com</div>
                                </div>
                            </div>
                            <div class="lp-ep__time">just now</div>
                        </div>
                        <div class="lp-ep__subject">New form submission — Contact Form</div>
                        <div class="lp-ep__rows">
                            <div class="lp-ep__row"><span>Name</span><span>John Smith</span></div>
                            <div class="lp-ep__row"><span>Email</span><span class="lp-accent-text">john@example.com</span></div>
                            <div class="lp-ep__row"><span>Message</span><span>Hey, I'm interested in working together…</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lp-feat-card">
                <div class="lp-feat-card__icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <h3>Smart spam protection</h3>
                <p>Built-in honeypot fields and Blacklist filtering before they reach your inbox.</p>
                <div class="lp-feat-tag-row">
                    <span class="lp-feat-tag">Honeypot</span>
                    <span class="lp-feat-tag">Blacklisting</span>
                    <span class="lp-feat-tag">Captcha</span>
                </div>
            </div>

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
            <div class="lp-dm__sidebar">
                <div class="lp-dm__logo">000<span>form</span></div>
                <div class="lp-dm__user-chip">
                    <div class="lp-dm__user-avatar">Y</div>
                    <span class="lp-dm__user-email">YOUR EMAIL</span>
                </div>
                <nav class="lp-dm__nav">
                    <div class="lp-dm__nav-item lp-dm__nav-item--active">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
                        Dashboard
                    </div>
                    <div class="lp-dm__nav-item">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        New Form
                    </div>
                    <div class="lp-dm__nav-item">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                        Plan & Subscriptions
                    </div>
                    <div class="lp-dm__nav-item">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14"/></svg>
                        Payment History
                    </div>
                    <div class="lp-dm__nav-item">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        Team Management
                    </div>
                </nav>
                <div class="lp-dm__nav lp-dm__nav--bottom">
                    <div class="lp-dm__nav-item">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                        Documentation
                    </div>
                    <div class="lp-dm__nav-item">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        Account
                    </div>
                    <div class="lp-dm__nav-item">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                        Sign Out
                    </div>
                </div>
            </div>

            <div class="lp-dm__main">
                <div class="lp-dm__topbar">
                    <div class="lp-dm__topbar-title">Dashboard</div>
                    <div class="lp-dm__btn">+ New Form</div>
                </div>
                <div class="lp-dm__stats">
                    <div class="lp-dm__stat">
                        <div class="lp-dm__stat-lbl">Total Forms</div>
                        <div class="lp-dm__stat-val">3</div>
                    </div>
                    <div class="lp-dm__stat">
                        <div class="lp-dm__stat-lbl">Total Submissions</div>
                        <div class="lp-dm__stat-val">34</div>
                    </div>
                    <div class="lp-dm__stat">
                        <div class="lp-dm__stat-lbl">Valid</div>
                        <div class="lp-dm__stat-val lp-dm__stat-val--green">27</div>
                    </div>
                    <div class="lp-dm__stat">
                        <div class="lp-dm__stat-lbl">Spam Blocked</div>
                        <div class="lp-dm__stat-val lp-dm__stat-val--red">7</div>
                    </div>
                    <div class="lp-dm__stat">
                        <div class="lp-dm__stat-lbl">Unread</div>
                        <div class="lp-dm__stat-val lp-dm__stat-val--green">26</div>
                    </div>
                    <div class="lp-dm__stat">
                        <div class="lp-dm__stat-lbl">This Month</div>
                        <div class="lp-dm__stat-val">3 <span class="lp-dm__stat-new">new</span></div>
                    </div>
                </div>
                <div class="lp-dm__table-wrap">
                    <table class="lp-dm__table">
                        <thead>
                            <tr>
                                <th>Form Name</th>
                                <th>Endpoint</th>
                                <th>Total</th>
                                <th>Valid</th>
                                <th>Spam</th>
                                <th>Status</th>
                                <th>Last Submission</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="lp-dm__td-name">
                                    Contact Form
                                    <span class="lp-dm__new-badge">23 new</span>
                                </td>
                                <td class="lp-dm__td-endpoint">/f/••••••</td>
                                <td>31</td>
                                <td class="lp-dm__td-green">24</td>
                                <td>7</td>
                                <td><span class="lp-dm__status-badge">Active</span></td>
                                <td class="lp-dm__td-muted">1 week ago</td>
                            </tr>
                            <tr>
                                <td class="lp-dm__td-name">
                                    Test form
                                    <span class="lp-dm__new-badge">3 new</span>
                                </td>
                                <td class="lp-dm__td-endpoint">/f/••••••</td>
                                <td>3</td>
                                <td class="lp-dm__td-green">3</td>
                                <td>0</td>
                                <td><span class="lp-dm__status-badge">Active</span></td>
                                <td class="lp-dm__td-muted">2 days ago</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>


<div class="lp-glow lp-glow--4"></div>
<div class="lp-glow lp-glow--3"></div>
<section class="lp-pricing-teaser">
    <div class="lp-container">

        <div class="banner-inner">
            <div class="banner-content">
                <div class="lp-section-tag">Pricing</div>
                <h2>One plan for every<br><span class="lp-dim">stage of your project.</span></h2>
                <p>Start free, no credit card needed. Upgrade when your forms need to grow.</p>
                <p class="banner-description">
                    Find the perfect plan for your project. From free tier to enterprise — flexible options, no hidden fees.
                </p>
            </div>
            <div class="banner-decoration">
                <a href="/pricing" class="lp-btn lp-btn--primary lp-btn--lg">
                    View pricing plans
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <line x1="5" y1="12" x2="19" y2="12"/>
                        <polyline points="12 5 19 12 12 19"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="lp-pt__footer">
            All plans include spam filtering, AJAX support, CSV export &amp; dashboard access. &nbsp;
            <a href="/pricing">See full comparison </a>
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
/* ── Accent variables ── */
:root {
    --blue:        #3b82f6;
    --blue-bright: #60a5fa;
    --blue-dim:    #1d4ed8;
    --blue-glow:   rgba(59,130,246,0.15);
    --blue-glow-2: rgba(59,130,246,0.08);
    --blue-border: rgba(59,130,246,0.25);
    --green:       #00ff88;
    --green-dark:  #00cc6a;
}

/* ════════════════════════════════════════════════════════
   SHARED SPLIT LAYOUT (copy | steps side by side)
════════════════════════════════════════════════════════ */
.lp-split {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 5rem;
    align-items: center;
}

/* Flip column order for Express row */
.lp-split--reverse { direction: rtl; }
.lp-split--reverse > * { direction: ltr; }

/* ── Badge ── */
.lp-mode-badge {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    width: fit-content;
    font-size: 0.72rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    padding: 0.3rem 0.9rem;
    border-radius: 100px;
}

.lp-mode-badge--core {
    background: rgba(0,255,136,0.09);
    border: 1px solid rgba(0,255,136,0.22);
    color: var(--green);
}

.lp-mode-badge--express {
    background: var(--blue-glow-2);
    border: 1px solid var(--blue-border);
    color: var(--blue-bright);
}

.lp-mode-badge__dot {
    width: 7px; height: 7px;
    border-radius: 50%;
    background: var(--green);
    box-shadow: 0 0 0 3px rgba(0,255,136,0.2);
    animation: lp-pulse 2s infinite;
}

/* ── Copy column ── */
.lp-split__copy {
    display: flex;
    flex-direction: column;
    gap: 1.15rem;
}

.lp-split__title {
    font-size: clamp(1.9rem, 2.8vw, 2.6rem);
    font-weight: 800;
    line-height: 1.1;
    letter-spacing: -0.03em;
    color: rgba(255,255,255,0.95);
    margin: 0;
}

.lp-split__accent--core {
    background: linear-gradient(120deg, var(--green) 0%, #78ffc8 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.lp-split__accent--express {
    background: linear-gradient(120deg, var(--blue) 0%, var(--blue-bright) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.lp-split__desc {
    font-size: 0.97rem;
    line-height: 1.75;
    color: rgba(255,255,255,0.62);
    margin: 0;
}

/* Perks */
.lp-split__perks {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 0.55rem;
}

.lp-split__perks li {
    display: flex;
    align-items: center;
    gap: 9px;
    font-size: 0.875rem;
    color: rgba(255,255,255,0.68);
}

.lp-split__perks li svg          { color: var(--green); flex-shrink: 0; }
.lp-split__perks--express li svg { color: var(--blue-bright); }

/* CTA */
.lp-split__cta {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    width: fit-content;
    font-weight: 700;
    font-size: 0.94rem;
    text-decoration: none;
    border-radius: 10px;
    padding: 0.88rem 1.65rem;
    cursor: pointer;
    transition: all 0.22s ease;
    margin-top: 0.15rem;
}

.lp-split__cta--core {
    background: linear-gradient(135deg, var(--green) 0%, var(--green-dark) 100%);
    color: #001a0d;
    border: 1px solid rgba(0,255,136,0.25);
    box-shadow: 0 0 18px rgba(0,255,136,0.28), inset 0 1px 0 rgba(255,255,255,0.2);
}
.lp-split__cta--core:hover {
    background: linear-gradient(135deg, #33ffaa 0%, #00bb66 100%);
    box-shadow: 0 0 32px rgba(0,255,136,0.5);
    transform: translateY(-2px);
}

.lp-split__cta--express {
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-dim) 100%);
    color: #fff;
    border: 1px solid var(--blue-border);
    box-shadow: 0 0 18px rgba(59,130,246,0.28), inset 0 1px 0 rgba(255,255,255,0.12);
}
.lp-split__cta--express:hover {
    background: linear-gradient(135deg, var(--blue-bright) 0%, var(--blue) 100%);
    box-shadow: 0 0 32px rgba(59,130,246,0.5);
    transform: translateY(-2px);
}

/* Footnote */
.lp-split__note {
    font-size: 0.73rem;
    color: rgba(255,255,255,0.32);
    margin: 0;
    letter-spacing: 0.02em;
}
.lp-split__note--express { color: rgba(59,130,246,0.5); }

/* ── Steps column ── */
.lp-split__steps {
    display: flex;
    flex-direction: column;
    gap: 0;
}

.lp-split__step {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    position: relative;
}

.lp-split__step-num {
    width: 44px; height: 44px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'SF Mono', 'Fira Code', monospace;
    font-size: 0.72rem;
    font-weight: 800;
    flex-shrink: 0;
    position: relative;
    z-index: 1;
}

.lp-split__step-num--core {
    background: rgba(0,255,136,0.08);
    border: 1px solid rgba(0,255,136,0.3);
    color: var(--green);
}

.lp-split__step-num--express {
    background: var(--blue-glow-2);
    border: 1px solid var(--blue-border);
    color: var(--blue-bright);
}

/* Vertical connector */
.lp-split__step-line {
    position: absolute;
    left: 21px;
    top: 44px;
    width: 1px;
    height: calc(100% + 0.35rem);
}
.lp-split__step-line--core    { background: linear-gradient(to bottom, rgba(0,255,136,0.22), transparent); }
.lp-split__step-line--express { background: linear-gradient(to bottom, rgba(59,130,246,0.22), transparent); }

.lp-split__step-body {
    display: flex;
    flex-direction: column;
    gap: 5px;
    padding: 0.5rem 0 2.5rem;
}
.lp-split__step:last-child .lp-split__step-body { padding-bottom: 0; }

.lp-split__step-body strong {
    font-size: 0.95rem;
    font-weight: 700;
    color: rgba(255,255,255,0.9);
    line-height: 1.3;
}

.lp-split__step-body span {
    font-size: 0.84rem;
    color: rgba(255,255,255,0.52);
    line-height: 1.62;
}

/* ════════════════════════════════════════════════════════
   SECTION BACKGROUNDS & GLOWS
════════════════════════════════════════════════════════ */
.lp-core {
    padding: 6rem 0 5rem;
    position: relative;
    overflow: hidden;
}

.lp-core__glow {
    position: absolute;
    width: 700px; height: 500px;
    border-radius: 50%;
    background: var(--green);
    opacity: 0.04;
    filter: blur(150px);
    top: -80px; left: -150px;
    pointer-events: none;
}

.lp-express {
    padding: 5rem 0 6rem;
    position: relative;
    overflow: hidden;
}

.lp-express__glow {
    position: absolute;
    width: 700px; height: 500px;
    border-radius: 50%;
    background: var(--blue);
    opacity: 0.06;
    filter: blur(150px);
    top: -80px; right: -150px;
    pointer-events: none;
}

/* ════════════════════════════════════════════════════════
   CONTRAST FIXES — small/low-contrast text across the page
════════════════════════════════════════════════════════ */
.lp-hero__desc                          { color: rgba(255,255,255,0.68) !important; }
.lp-proof-lbl                           { color: rgba(255,255,255,0.48) !important; font-size: 0.72rem !important; }
.lp-hero__row-copy p                    { color: rgba(255,255,255,0.62) !important; font-size: 0.95rem !important; }
.lp-hero__row-bullets li                { color: rgba(255,255,255,0.72) !important; font-size: 0.875rem !important; }
.lp-feat-card p                         { color: rgba(255,255,255,0.62) !important; font-size: 0.9rem !important; }
.lp-feat-tag                            { color: rgba(255,255,255,0.55) !important; }
.lp-ep__name                            { color: rgba(255,255,255,0.95) !important; }
.lp-ep__addr                            { color: rgba(255,255,255,0.48) !important; }
.lp-ep__time                            { color: rgba(255,255,255,0.42) !important; }
.lp-ep__subject                         { color: rgba(255,255,255,0.85) !important; }
.lp-ep__row span:first-child            { color: rgba(255,255,255,0.42) !important; font-size: 0.72rem !important; }
.lp-ep__row span:last-child             { color: rgba(255,255,255,0.82) !important; font-size: 0.8rem !important; }
.lp-step__body p                        { color: rgba(255,255,255,0.62) !important; font-size: 0.9rem !important; }
.lp-step__snippet                       { color: rgba(255,255,255,0.75) !important; font-size: 0.78rem !important; }
.lp-section-head p                      { color: rgba(255,255,255,0.65) !important; font-size: 1.02rem !important; }
.lp-dm__stat-lbl                        { color: rgba(255,255,255,0.52) !important; font-size: 0.7rem !important; }
.lp-dm__td-endpoint                     { color: rgba(255,255,255,0.48) !important; }
.lp-dm__td-muted                        { color: rgba(255,255,255,0.45) !important; }
.lp-dm__table th                        { color: rgba(255,255,255,0.48) !important; font-size: 0.68rem !important; }
.lp-dm__table td                        { color: rgba(255,255,255,0.72) !important; font-size: 0.82rem !important; }
.lp-dm__nav-item                        { color: rgba(255,255,255,0.58) !important; font-size: 0.82rem !important; }
.lp-cta__inner p:not(.lp-cta__note)    { color: rgba(255,255,255,0.65) !important; }
.lp-cta__note                           { color: rgba(255,255,255,0.35) !important; }
.banner-content p                       { color: rgba(255,255,255,0.65) !important; }
.banner-description                     { color: rgba(255,255,255,0.55) !important; }
.lp-pt__footer                          { color: rgba(255,255,255,0.4) !important; font-size: 0.82rem !important; }
.lp-dash__stat-lbl                      { color: rgba(255,255,255,0.48) !important; }
.lp-dash__form-sub                      { color: rgba(255,255,255,0.48) !important; }
.lp-dash__nav-item                      { color: rgba(255,255,255,0.58) !important; font-size: 0.72rem !important; }
.lp-email__card-meta                    { color: rgba(255,255,255,0.52) !important; font-size: 0.72rem !important; }
.lp-email__card-caption                 { color: rgba(255,255,255,0.58) !important; font-size: 0.76rem !important; }
.lp-email__field-key                    { color: rgba(255,255,255,0.45) !important; font-size: 0.65rem !important; }
.lp-email__field-val                    { color: rgba(255,255,255,0.88) !important; font-size: 0.78rem !important; }

/* ════════════════════════════════════════════════════════
   RESPONSIVE
════════════════════════════════════════════════════════ */
@media (max-width: 860px) {
    .lp-split,
    .lp-split--reverse {
        grid-template-columns: 1fr;
        gap: 3rem;
        direction: ltr;
    }
    /* copy always on top on mobile */
    .lp-split--reverse .lp-split__steps { order: 2; }
    .lp-split--reverse .lp-split__copy  { order: 1; }

    .lp-core    { padding: 4rem 0 3.5rem; }
    .lp-express { padding: 3.5rem 0 4rem; }
}

@media (max-width: 640px) {
    .lp-split__title { font-size: 1.65rem; }
    .lp-split__cta   { width: 100%; justify-content: center; }
}

/* ════════════════════════════════════════════════════════
   CONTRAST FIXES — small/low-contrast text throughout
════════════════════════════════════════════════════════ */

/* Hero desc */
.lp-hero__desc { color: rgba(255,255,255,0.68) !important; }

/* Proof labels */
.lp-proof-lbl { color: rgba(255,255,255,0.45) !important; font-size: 0.72rem !important; }

/* Row copy paragraphs */
.lp-hero__row-copy p { color: rgba(255,255,255,0.62) !important; font-size: 0.95rem !important; }

/* Bullet text */
.lp-hero__row-bullets li { color: rgba(255,255,255,0.72) !important; font-size: 0.875rem !important; }

/* Feature card text */
.lp-feat-card p { color: rgba(255,255,255,0.62) !important; font-size: 0.9rem !important; }
.lp-feat-tag { color: rgba(255,255,255,0.55) !important; }

/* Feature email preview */
.lp-ep__name  { color: rgba(255,255,255,0.95) !important; }
.lp-ep__addr  { color: rgba(255,255,255,0.45) !important; }
.lp-ep__time  { color: rgba(255,255,255,0.38) !important; }
.lp-ep__subject { color: rgba(255,255,255,0.82) !important; }
.lp-ep__row span:first-child { color: rgba(255,255,255,0.4) !important; font-size: 0.72rem !important; }
.lp-ep__row span:last-child  { color: rgba(255,255,255,0.8) !important; font-size: 0.8rem !important; }

/* Step copy */
.lp-step__body p { color: rgba(255,255,255,0.62) !important; font-size: 0.9rem !important; }
.lp-step__snippet { color: rgba(255,255,255,0.75) !important; font-size: 0.78rem !important; }

/* Section head paragraph */
.lp-section-head p { color: rgba(255,255,255,0.65) !important; font-size: 1.02rem !important; }

/* Dashboard mock small labels */
.lp-dm__stat-lbl { color: rgba(255,255,255,0.5) !important; font-size: 0.7rem !important; }
.lp-dm__td-endpoint { color: rgba(255,255,255,0.45) !important; }
.lp-dm__td-muted    { color: rgba(255,255,255,0.42) !important; }
.lp-dm__table th    { color: rgba(255,255,255,0.45) !important; font-size: 0.68rem !important; }
.lp-dm__table td    { color: rgba(255,255,255,0.72) !important; font-size: 0.82rem !important; }
.lp-dm__nav-item    { color: rgba(255,255,255,0.58) !important; font-size: 0.82rem !important; }

/* Final CTA paragraph */
.lp-cta__inner p:not(.lp-cta__note) { color: rgba(255,255,255,0.65) !important; }
.lp-cta__note { color: rgba(255,255,255,0.35) !important; }

/* Pricing teaser */
.banner-content p { color: rgba(255,255,255,0.65) !important; }
.banner-description { color: rgba(255,255,255,0.55) !important; }
.lp-pt__footer { color: rgba(255,255,255,0.38) !important; font-size: 0.82rem !important; }

/* Hero dash small text */
.lp-dash__stat-lbl   { color: rgba(255,255,255,0.45) !important; }
.lp-dash__form-sub   { color: rgba(255,255,255,0.45) !important; }
.lp-dash__nav-item   { color: rgba(255,255,255,0.55) !important; font-size: 0.72rem !important; }

/* Email card meta */
.lp-email__card-meta    { color: rgba(255,255,255,0.5) !important; font-size: 0.72rem !important; }
.lp-email__card-caption { color: rgba(255,255,255,0.55) !important; font-size: 0.75rem !important; }
.lp-email__field-key    { color: rgba(255,255,255,0.42) !important; font-size: 0.65rem !important; }
.lp-email__field-val    { color: rgba(255,255,255,0.88) !important; font-size: 0.78rem !important; }

/* ════════════════════════════════════════════════════════
   RESPONSIVE — modes section
════════════════════════════════════════════════════════ */
@media (max-width: 860px) {
    .lp-modes__grid {
        grid-template-columns: 1fr;
        gap: 0;
    }

    .lp-modes__divider {
        flex-direction: row;
        min-height: unset;
        padding-top: 0;
        padding: 0.5rem 0;
    }

    .lp-modes__divider-line {
        flex: 1;
        height: 1px;
        width: auto;
        background: linear-gradient(to right, transparent, rgba(255,255,255,0.1), transparent);
    }

    .lp-mode { padding: 2rem 1.5rem; }
}

@media (max-width: 640px) {
    .lp-mode { padding: 1.75rem 1.25rem; }
    .lp-mode__title { font-size: 1.5rem; }
    .lp-mode__cta { width: 100%; justify-content: center; font-size: 0.88rem; }
}       

        @media (max-width: 480px) {
            .banner-content h2 {
                font-size: 1.3rem;
            }
            .banner-inner {
                padding: 1.5rem 1rem;
            }
            .pricing-link {
                width: 100%;
                justify-content: center;
            }
        }
        /* ════════════════════════════════════════════════════════
   GLOBAL / CONTAINER
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

.lp-glow--4 {
    width: 700px; height: 700px;
    background: var(--accent, #00ff88);
    opacity: 0.07;
    top: 3700px; right: -200px;
}

.lp-glow--3 {
    width: 500px; height: 500px;
    background: #0077ff;
    opacity: 0.05;
    top: 4000px; left: -100px;
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
    background: rgba(0,255,136,0.07);
    border: 1px solid rgba(0,255,136,0.2);
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

.lp-hero__actions {
    display: flex;
    gap: 0.85rem;
    flex-wrap: wrap;
    justify-content: center;
}

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

/* ── Hero alternating rows ── */
.lp-hero__rows {
    display: flex;
    flex-direction: column;
    gap: 5rem;
    width: 100%;
    max-width: 1100px;
}

.lp-hero__row {
    display: grid;
    grid-template-columns: 1.4fr 1fr;
    gap: 4rem;
    align-items: center;
}

.lp-hero__row--reverse {
    grid-template-columns: 1fr 1.4fr;
}

.lp-hero__row-tag {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.09em;
    color: var(--accent, #00ff88);
    margin-bottom: 0.85rem;
}

.lp-hero__row-copy h3 {
    font-size: clamp(1.5rem, 2.5vw, 2rem);
    font-weight: 800;
    line-height: 1.15;
    letter-spacing: -0.025em;
    color: var(--text-primary, #fff);
    margin: 0 0 1rem;
}

.lp-hero__row-copy p {
    font-size: 0.92rem;
    line-height: 1.75;
    color: var(--text-secondary, rgba(255,255,255,0.5));
    margin: 0 0 1.35rem;
}

.lp-hero__row-bullets {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 0.6rem;
}

.lp-hero__row-bullets li {
    display: flex;
    align-items: center;
    gap: 9px;
    font-size: 0.85rem;
    color: rgba(255,255,255,0.6);
}

.lp-hero__row-bullets li svg {
    color: var(--accent, #00ff88);
    flex-shrink: 0;
}

/* ── Preview panels ── */
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

/* ── Dashboard mock (hero) ── */
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

/* ── Email preview (hero) ── */
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

.lp-feat-card--wide { grid-column: span 2; }

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

.lp-feat-card__visual--email { margin-top: auto; }

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

.lp-ep__row span:last-child { color: rgba(255,255,255,0.7); }

/* ════════════════════════════════════════════════════════
   HOW IT WORKS
════════════════════════════════════════════════════════ */
.lp-hiw { padding: 6rem 0; }

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
   DASHBOARD PREVIEW SECTION
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
    background: #121316;
    margin-top: 1rem;
    font-size: 0.82rem;
    transition: all 0.5s ease;
}

.lp-dm__sidebar {
    width: 220px;
    flex-shrink: 0;
    background: #0d0f12;
    border-right: 1px solid rgba(255,255,255,0.07);
    padding: 1.5rem 1rem;
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.lp-dm__logo {
    font-size: 1.3rem;
    font-weight: 800;
    color: rgba(255,255,255,0.9);
    letter-spacing: -0.02em;
    padding: 0 0.5rem;
    margin-bottom: 1.25rem;
    display: flex;
    align-items: center;
    gap: 8px;
}

.lp-dm__logo span { color: var(--accent, #00ff88); }

.lp-dm__user-chip {
    display: flex;
    align-items: center;
    gap: 0.6rem;
    background: rgba(0,255,136,0.07);
    border: 1px solid rgba(0,255,136,0.15);
    border-radius: 10px;
    padding: 0.55rem 0.75rem;
    margin-bottom: 1.25rem;
}

.lp-dm__user-avatar {
    width: 26px; height: 26px;
    border-radius: 50%;
    background: var(--accent, #00ff88);
    color: #000;
    font-weight: 800;
    font-size: 0.72rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.lp-dm__user-email {
    font-size: 0.72rem;
    color: rgba(255,255,255,0.55);
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.lp-dm__nav {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.lp-dm__nav--bottom {
    margin-top: auto;
    padding-top: 1rem;
    border-top: 1px solid rgba(255,255,255,0.06);
}

.lp-dm__nav-item {
    display: flex;
    align-items: center;
    gap: 0.6rem;
    padding: 0.6rem 0.75rem;
    border-radius: 8px;
    font-size: 0.8rem;
    color: rgba(255,255,255,0.45);
    cursor: pointer;
    transition: all 0.15s;
}

.lp-dm__nav-item:hover { background: rgba(255,255,255,0.04); color: rgba(255,255,255,0.8); }

.lp-dm__nav-item--active {
    background: rgba(0,255,136,0.08);
    color: var(--accent, #00ff88);
    border: 1px solid rgba(0,255,136,0.15);
}

.lp-dm__main {
    flex: 1;
    padding: 1.5rem 1.75rem;
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    overflow: hidden;
    background: #121316;
}

.lp-dm__topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.lp-dm__topbar-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: rgba(255,255,255,0.95);
}

.lp-dm__btn {
    background: var(--accent, #00ff88);
    color: #000;
    font-size: 0.78rem;
    font-weight: 700;
    padding: 0.55rem 1.1rem;
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
    border-radius: 12px;
    padding: 1rem 0.85rem;
}

.lp-dm__stat-lbl {
    font-size: 0.65rem;
    color: rgba(255,255,255,0.35);
    margin-bottom: 6px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    font-weight: 600;
}

.lp-dm__stat-val {
    font-size: 1.5rem;
    font-weight: 800;
    color: rgba(255,255,255,0.9);
    letter-spacing: -0.03em;
    line-height: 1;
}

.lp-dm__stat-val--green { color: var(--accent, #00ff88); }
.lp-dm__stat-val--red   { color: #ff4949; }

.lp-dm__stat-new {
    font-size: 0.7rem;
    font-weight: 700;
    color: rgba(255,255,255,0.5);
}

.lp-dm__table-wrap {
    border: 1px solid rgba(255,255,255,0.07);
    border-radius: 12px;
    overflow: hidden;
}

.lp-dm__table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.78rem;
}

.lp-dm__table thead tr {
    background: rgba(255,255,255,0.03);
    border-bottom: 1px solid rgba(255,255,255,0.07);
}

.lp-dm__table th {
    padding: 0.7rem 1rem;
    text-align: left;
    font-size: 0.65rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.07em;
    color: rgba(255,255,255,0.3);
}

.lp-dm__table tbody tr {
    border-bottom: 1px solid rgba(255,255,255,0.04);
    transition: background 0.15s;
}

.lp-dm__table tbody tr:last-child { border-bottom: none; }
.lp-dm__table tbody tr:hover { background: rgba(255,255,255,0.02); }

.lp-dm__table td {
    padding: 0.85rem 1rem;
    color: rgba(255,255,255,0.6);
}

.lp-dm__td-name {
    color: rgba(255,255,255,0.9) !important;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.6rem;
}

.lp-dm__new-badge {
    font-size: 0.62rem;
    font-weight: 700;
    background: rgba(0,255,136,0.1);
    border: 1px solid rgba(0,255,136,0.2);
    color: var(--accent, #00ff88);
    padding: 0.15rem 0.5rem;
    border-radius: 100px;
}

.lp-dm__td-endpoint {
    font-family: 'SF Mono', 'Fira Code', monospace;
    font-size: 0.72rem;
    color: rgba(255,255,255,0.3) !important;
}

.lp-dm__td-green { color: var(--accent, #00ff88) !important; font-weight: 700; }
.lp-dm__td-muted { color: rgba(255,255,255,0.3) !important; font-size: 0.75rem; }

.lp-dm__status-badge {
    background: rgba(0,255,136,0.1);
    border: 1px solid rgba(0,255,136,0.2);
    color: var(--accent, #00ff88);
    font-size: 0.65rem;
    font-weight: 700;
    padding: 0.2rem 0.65rem;
    border-radius: 100px;
}

/* ════════════════════════════════════════════════════════
   PRICING BANNER
════════════════════════════════════════════════════════ */

.lp-pricing-teaser {
    padding: 4rem 1.5rem;
    border-radius: 1.5rem;
    max-width: 1400px;
    margin: 0 auto;
    transition: all 0.5s ease;
}

.lp-container {
    max-width: 1050px;
    margin: 0 auto;
}

.lp-section-head {
    text-align: center;
    margin-bottom: 2rem;
}

.banner-inner {
    border-radius: 1.5rem;
    padding: 0 2.5rem;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    flex-wrap: wrap;
    gap: 3rem;
    margin: 2rem 0 2rem;
    box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.15);
    transition: all 0.5s ease;
}

.banner-content {
    flex: 0 1 auto;
    max-width: 80%;
}

.banner-content h2 {
    font-size: clamp(1.8rem, 3.5vw, 2.75rem);
    font-weight: 800;
    line-height: 1.15;
    letter-spacing: -0.025em;
    color: var(--text-primary, #fff);
    margin: 0 0 1rem;
}

.banner-content h2 .lp-dim {
    color: rgba(255, 255, 255, 0.3)
}

.banner-content p {
    font-size: 1rem;
    line-height: 1.65;
    color: rgba(255, 255, 255, 0.5);
    max-width: 620px;
    margin: 0;
}

.banner-description {
    font-size: 0.95rem;
    color: #94a3b8;
    margin-top: 0.5rem;
}

.banner-decoration {
    flex-shrink: 0;
}

.pricing-link {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    background: white;
    padding: 0.85rem 2rem;
    border-radius: 3rem;
    font-weight: 700;
    font-size: 0.95rem;
    color: #0f172a;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    white-space: nowrap;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.pricing-link:hover {
    background: #f1f5f9;
    transform: scale(1.02);
    gap: 0.9rem;
    box-shadow: 0 8px 20px -8px rgba(0, 0, 0, 0.25);
}

.pricing-link svg {
    width: 16px;
    height: 16px;
    stroke: #4f46e5;
    stroke-width: 2.2;
    transition: transform 0.2s ease;
}

.pricing-link:hover svg {
    transform: translateX(4px);
}

.lp-pt__footer a:hover {
    text-decoration: underline;
}

@media (max-width: 768px) {
    body {
        padding: 1rem;
    }
    .lp-pricing-teaser {
        padding: 2rem 1rem;
    }
    .banner-inner {
        flex-direction: column;
        text-align: center;
        padding: 2rem 1.5rem;
        gap: 1.5rem;
    }
    .banner-content {
        text-align: center;
        max-width: 100%;
    }
    .banner-content h2 {
        font-size: 1.5rem;
    }
    .pricing-link {
        white-space: normal;
        justify-content: center;
    }
}
.lp-pt__footer {
    text-align: center;
    font-size: 0.78rem;
    color: rgba(255,255,255,0.25);
    padding-top: 0.5rem;
}

.lp-pt__footer a {
    color: var(--accent, #00ff88);
    text-decoration: none;
    font-weight: 600;
    opacity: 0.8;
    transition: opacity 0.2s;
}
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
    .lp-dm__stats { grid-template-columns: repeat(3, 1fr); }
    .lp-pt__grid { grid-template-columns: repeat(2, 1fr); }
    .lp-hero__row { grid-template-columns: 1fr 1fr; gap: 2.5rem; }
    .lp-hero__row--reverse { grid-template-columns: 1fr 1fr; }
}

@media (max-width: 860px) {
    .lp-hero__rows { gap: 3.5rem; }
    .lp-hero__row,
    .lp-hero__row--reverse { grid-template-columns: 1fr; gap: 2rem; }
    .lp-hero__row--reverse .lp-hero__row-copy { order: -1; }
    .lp-steps { grid-template-columns: 1fr; gap: 2rem; }
    .lp-steps::before { display: none; }
    .lp-pt__grid { grid-template-columns: repeat(2, 1fr); }
    .lp-dashboard-mock { flex-direction: column; }
    .lp-dm__sidebar { width: 100%; flex-direction: row; flex-wrap: wrap; align-items: center; padding: 1rem; gap: 0.75rem; border-right: none; border-bottom: 1px solid rgba(255,255,255,0.07); }
    .lp-dm__nav, .lp-dm__nav--bottom { flex-direction: row; flex-wrap: wrap; }
    .lp-dm__nav--bottom { margin-top: 0; padding-top: 0; border-top: none; }
    .lp-dm__stats { grid-template-columns: repeat(3, 1fr); }
    .lp-pricing-banner__inner { justify-content: center; text-align: center; }
}

@media (max-width: 640px) {
    .lp-hero { padding: 5rem 0 3rem; }
    .lp-features, .lp-hiw, .lp-preview, .lp-pricing-teaser, .lp-cta { padding: 4rem 0; }
    .lp-feat-grid { grid-template-columns: 1fr; }
    .lp-feat-card--wide { grid-column: span 1; }
    .lp-pt__grid { grid-template-columns: 1fr; }
    .lp-hero__proof { flex-wrap: wrap; }
    .lp-dm__stats { grid-template-columns: repeat(2, 1fr); }
    .lp-container { padding: 0 1.25rem; }
    .lp-pricing-banner { padding: 0.95rem 1.25rem; }
    .lp-pricing-banner__left { justify-content: center; }
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

        document.querySelectorAll('.lp-feat-card, .lp-step, .lp-pt__card, .lp-hero__row, .lp-pricing-teaser, .banner-inner, .lp-dashboard-mock').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(18px)';
            el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            observer.observe(el);
        });

    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Git-folders\000form.com\resources\views/pages/home.blade.php ENDPATH**/ ?>