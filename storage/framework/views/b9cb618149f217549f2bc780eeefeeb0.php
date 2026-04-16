

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

                    <div class="rdm rdm--small">
                        
                        <div class="rdm__sidebar">
                            <div class="rdm__logo">
                                <img src="<?php echo e(asset('images/logo/000formlogo.png')); ?>" alt="000form" class="rdm__logo-img">
                            </div>
                            <div class="rdm__user-chip">
                                <div class="rdm__avatar">S</div>
                                <span>test@gmail.com</span>
                            </div>
                            <div class="rdm__nav-section-label">MAIN</div>
                            <nav class="rdm__nav">
                                <div class="rdm__nav-item rdm__nav-item--active">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
                                    Dashboard
                                </div>
                                <div class="rdm__nav-item">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                                    New Project
                                </div>
                                <div class="rdm__nav-item">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                    Team Management
                                </div>
                            </nav>
                            <div class="rdm__nav-section-label" style="margin-top:0.4rem;">ACCOUNT</div>
                            <nav class="rdm__nav">
                                <div class="rdm__nav-item">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                                    Account Settings
                                </div>
                            </nav>
                        </div>

                        
                        <div class="rdm__main">
                            <div class="rdm__topbar">
                                <span class="rdm__page-title">Dashboard</span>
                                <div class="rdm__new-btn">+ New Project</div>
                            </div>

                            
                            <div class="rdm__stats">
                                <div class="rdm__stat">
                                    <div class="rdm__stat-lbl">Projects</div>
                                    <div class="rdm__stat-val">1</div>
                                </div>
                                <div class="rdm__stat">
                                    <div class="rdm__stat-lbl">Total Forms</div>
                                    <div class="rdm__stat-val">2</div>
                                </div>
                                <div class="rdm__stat">
                                    <div class="rdm__stat-lbl">Total Submissions</div>
                                    <div class="rdm__stat-val">10</div>
                                </div>
                                <div class="rdm__stat">
                                    <div class="rdm__stat-lbl">Valid</div>
                                    <div class="rdm__stat-val rdm__stat-val--green">6</div>
                                </div>
                                <div class="rdm__stat">
                                    <div class="rdm__stat-lbl">Spam Blocked</div>
                                    <div class="rdm__stat-val rdm__stat-val--red">4</div>
                                </div>
                                <div class="rdm__stat">
                                    <div class="rdm__stat-lbl">Unread</div>
                                    <div class="rdm__stat-val rdm__stat-val--green">6</div>
                                </div>
                            </div>

                            
                            <div class="rdm__project-row">
                                <div class="rdm__project-dot"></div>
                                <span class="rdm__project-name">PROJECT 1</span>
                                <!-- <span class="rdm__project-desc">— Testing the create project in the live server.</span> -->
                                <span class="rdm__new-badge">6 new</span>
                                <div style="flex:1"></div>
                                <span class="rdm__project-meta">2 forms</span>
                                <span class="rdm__project-action">+ Add Form</span>
                                <span class="rdm__project-action">View</span>
                                <span class="rdm__project-action">Settings</span>
                            </div>

                            
                            <div class="rdm__table-wrap">
                                <table class="rdm__table">
                                    <thead>
                                        <tr>
                                            <th>Form Name</th>
                                            <th>Endpoint</th>
                                            <th>Total</th>
                                            <th>Valid</th>
                                            <th>Spam</th>
                                            <th>Status</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="rdm__td-name">Second Form<span class="rdm__new-badge">1 new</span></td>
                                            <td class="rdm__td-ep">/f/****</td>
                                            <td>1</td>
                                            <td class="rdm__td-green">1</td>
                                            <td class="rdm__td-red">0</td>
                                            <td><span class="rdm__status">● Active</span></td>
                                            <td class="rdm__td-view">View</td>
                                        </tr>
                                        <tr>
                                            <td class="rdm__td-name">First form<span class="rdm__new-badge">5 new</span></td>
                                            <td class="rdm__td-ep">/f/****</td>
                                            <td>9</td>
                                            <td class="rdm__td-green">5</td>
                                            <td class="rdm__td-red">4</td>
                                            <td><span class="rdm__status">● Active</span></td>
                                            <td class="rdm__td-view">View</td>
                                        </tr>
                                    </tbody>
                                </table>
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
                                <div class="fp-email__logo"><b>000</b>form</div>
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


<section class="lpc-section">
    <div class="lpc-glow--tl"></div>

    <div class="lp-container">

        <div class="lpc-layout">

            <div class="lpc-left">

                <div class="lpc-badge">
                    <span class="lpc-badge__dot"></span>
                    Core
                </div>

                <h2 class="lpc-title">
                    Your data.<br>
                    <span class="lpc-title__accent">Your dashboard.</span>
                </h2>

                <p class="lpc-desc">
                    Register a free account, create unlimited form endpoints, and every submission lands in your personal dashboard — searchable, filterable, exportable, and always yours.
                </p>

                <ul class="lpc-perks">
                    <li>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        Permanent submission storage &amp; full history
                    </li>
                    <li>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        Analytics &amp; trends per form
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

                <a href="<?php echo e(route('signup')); ?>" class="lpc-cta">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
                    Create free account
                </a>

                <p class="lpc-note">No credit card · Unlimited forms · 50 free submissions/mo</p>

            </div>

            <div class="lpc-right">

                <div class="lpc-right__head">
                    <span class="lpc-setup-tag">Setup</span>
                    <h3 class="lpc-setup-title">
                        Live in <span class="lpc-title__accent">3 minutes</span>, literally.
                    </h3>
                    <p class="lpc-setup-sub">No server. No config files. No deployment pipelines. Just a URL swap.</p>
                </div>

                <div class="lpc-vsteps">

                    <div class="lpc-vstep">
                        <div class="lpc-vstep__left">
                            <div class="lpc-vstep__num">01</div>
                            <div class="lpc-vstep__line"></div>
                        </div>
                        <div class="lpc-vstep__body">
                            <h4>Create your account</h4>
                            <p>Sign up free — no credit card required. Your account gives you a dashboard, submission history, and your own form endpoints.</p>
                            <a href="<?php echo e(route('signup')); ?>" class="lpc-vstep__link">
                                Sign up now
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                            </a>
                        </div>
                    </div>

                    <div class="lpc-vstep">
                        <div class="lpc-vstep__left">
                            <div class="lpc-vstep__num">02</div>
                            <div class="lpc-vstep__line"></div>
                        </div>
                        <div class="lpc-vstep__body">
                            <h4>Create a form endpoint</h4>
                            <p>From your dashboard, create a new form. Name it, configure notification settings, and copy your unique endpoint URL.</p>
                        </div>
                    </div>

                    <div class="lpc-vstep">
                        <div class="lpc-vstep__left">
                            <div class="lpc-vstep__num">03</div>
                        </div>
                        <div class="lpc-vstep__body">
                            <h4>Point your HTML form at it</h4>
                            <p>Change your form's <code class="lp-code-inline">action</code> to your endpoint URL. That's it — no other code changes needed.</p>
                            <div class="lpc-snippet">
                                <span class="t-tag">&lt;form</span> <span class="t-attr">action</span>=<span class="t-str">"https://000form.com/f/<span class="t-accent">your-endpoint</span>"</span><span class="t-tag">&gt;</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

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

        
        <div class="rdm rdm--full">
            
            <div class="rdm__sidebar">
                <div class="rdm__logo">
                    <img src="<?php echo e(asset('images/logo/000formlogo.png')); ?>" alt="000form" class="rdm__logo-img rdm__logo-img--lg">
                </div>

                <div class="rdm__user-chip">
                    <div class="rdm__avatar">S</div>
                    <span>test@gmail.com</span>
                </div>

                <div class="rdm__nav-section-label">MAIN</div>
                <nav class="rdm__nav">
                    <div class="rdm__nav-item rdm__nav-item--active">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
                        Dashboard
                    </div>
                    <div class="rdm__nav-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                        New Project
                    </div>
                    <div class="rdm__nav-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        Team Management
                    </div>
                </nav>

                <div class="rdm__nav-section-label">ACCOUNT</div>
                <nav class="rdm__nav">
                    <div class="rdm__nav-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                        Account Settings
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-left:auto;"><polyline points="6 9 12 15 18 9"/></svg>
                    </div>
                </nav>

                <div class="rdm__nav-section-label rdm__nav-section-label--bottom">RESOURCES</div>
                <nav class="rdm__nav">
                    <div class="rdm__nav-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                        Documentation
                    </div>
                    <div class="rdm__nav-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                        Sign Out
                    </div>
                </nav>
            </div>

            
            <div class="rdm__main">
                <div class="rdm__topbar">
                    <span class="rdm__page-title">Dashboard</span>
                    <div class="rdm__new-btn">+ New Project</div>
                </div>

                
                <div class="rdm__stats">
                    <div class="rdm__stat">
                        <div class="rdm__stat-lbl">Projects</div>
                        <div class="rdm__stat-val">1</div>
                    </div>
                    <div class="rdm__stat">
                        <div class="rdm__stat-lbl">Total Forms</div>
                        <div class="rdm__stat-val">2</div>
                    </div>
                    <div class="rdm__stat">
                        <div class="rdm__stat-lbl">Total Submissions</div>
                        <div class="rdm__stat-val">10</div>
                    </div>
                    <div class="rdm__stat">
                        <div class="rdm__stat-lbl">Valid</div>
                        <div class="rdm__stat-val rdm__stat-val--green">6</div>
                    </div>
                    <div class="rdm__stat">
                        <div class="rdm__stat-lbl">Spam Blocked</div>
                        <div class="rdm__stat-val rdm__stat-val--red">4</div>
                    </div>
                    <div class="rdm__stat">
                        <div class="rdm__stat-lbl">Unread</div>
                        <div class="rdm__stat-val rdm__stat-val--green">6</div>
                    </div>
                </div>

                
                <div class="rdm__project-row">
                    <div class="rdm__project-dot"></div>
                    <span class="rdm__project-name">PROJECT 1</span>
                    <span class="rdm__project-desc">— Application Development</span>
                    <span class="rdm__new-badge">6 new</span>
                    <div style="flex:1"></div>
                    <span class="rdm__project-meta">2 forms</span>
                    <span class="rdm__project-action">+ Add Form</span>
                    <span class="rdm__project-action">View</span>
                    <span class="rdm__project-action">Settings</span>
                </div>

                
                <div class="rdm__table-wrap">
                    <table class="rdm__table">
                        <thead>
                            <tr>
                                <th>Form Name</th>
                                <th>Endpoint</th>
                                <th>Total</th>
                                <th>Valid</th>
                                <th>Spam</th>
                                <th>Status</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="rdm__td-name">
                                    Second Form
                                    <span class="rdm__new-badge">1 new</span>
                                </td>
                                <td class="rdm__td-ep">/f/****</td>
                                <td>1</td>
                                <td class="rdm__td-green">1</td>
                                <td class="rdm__td-red">0</td>
                                <td><span class="rdm__status">● Active</span></td>
                                <td class="rdm__td-view">View</td>
                            </tr>
                            <tr>
                                <td class="rdm__td-name">
                                    First form
                                    <span class="rdm__new-badge">5 new</span>
                                </td>
                                <td class="rdm__td-ep">/f/****</td>
                                <td>9</td>
                                <td class="rdm__td-green">5</td>
                                <td class="rdm__td-red">4</td>
                                <td><span class="rdm__status">● Active</span></td>
                                <td class="rdm__td-view">View</td>
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
            <a href="/pricing">See full comparison</a>
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


<section class="lpe-section">

  <div class="lp-container">
    <div class="lpe-or-row">
      <div class="lpe-or-line"></div>
      <div class="lpe-or-pill">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
        OR USE EXPRESS
      </div>
      <div class="lpe-or-line"></div>
    </div>
  </div>

  <div class="lp-container">
    <div class="lpe-card">
      <div class="lpe-grid">

        <div class="lpe-copy">
          <div class="lpe-badge">
            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
            Express
          </div>
          <h2 class="lpe-title">
            Zero setup.<br>
            <span class="lpe-title__accent">Just notifications.</span>
          </h2>
          <p class="lpe-desc">
            Verify your email once and your endpoint is live — submissions land in your inbox within seconds, every time.
          </p>
          <ul class="lpe-perks">
            <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> No registration, no login, no dashboard</li>
            <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Instant email delivery, reply-to pre-set</li>
            <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Live in under 60 seconds</li>
          </ul>
          <a href="/express" class="lpe-cta">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
            Get started — no account needed
          </a>
        </div>

        <div class="lpe-steps">
          <div class="lpe-step">
            <div class="lpe-step__left">
              <div class="lpe-step__num">01</div>
              <div class="lpe-step__line"></div>
            </div>
            <div class="lpe-step__body">
              <h4>Enter your email</h4>
              <p>No account, no password, no credit card — just your email address to get started.</p>
            </div>
          </div>
          <div class="lpe-step">
            <div class="lpe-step__left">
              <div class="lpe-step__num">02</div>
              <div class="lpe-step__line"></div>
            </div>
            <div class="lpe-step__body">
              <h4>Verify once</h4>
              <p>Click the link we send you — that's your only setup step. Takes under 30 seconds.</p>
            </div>
          </div>
          <div class="lpe-step">
            <div class="lpe-step__left">
              <div class="lpe-step__num">03</div>
            </div>
            <div class="lpe-step__body">
              <h4>Start getting notifications</h4>
              <p>Submissions hit your inbox instantly. Spam filtered, reply-to pre-set, delivered in seconds.</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</section>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
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

    .fp-email__logo {
        font-family: var(--font-mono);
        font-size: 0.92rem;
        font-weight: 700;
        color: var(--text-secondary);
        letter-spacing: 0.01em;
        margin-bottom: 0.25rem;
    }
    .fp-email__logo b { color: var(--accent); font-weight: 700; }

    /* ═══════════════════════════════════════════════════════
       REAL DASHBOARD MOCK  (rdm)
       — used in both hero row and full preview section
       — mirrors the actual dashboard screenshot precisely
    ═══════════════════════════════════════════════════════ */
    .rdm {
        display: flex;
        background: #0d0f12;
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 32px 80px rgba(0,0,0,0.55);
        font-family: var(--font-display, sans-serif);
    }

    /* Logo image */
    .rdm__logo-img {
        height: 28px;
        width: auto;
        display: block;
        object-fit: contain;
    }

    .rdm__logo-img--lg {
        height: 34px;
    }

    /* Small variant for hero row */
    .rdm--small { font-size: 0.7rem; }
    .rdm--small .rdm__sidebar { padding: 0.9rem 0.7rem; }
    .rdm--small .rdm__page-title { font-size: 0.95rem; }
    .rdm--small .rdm__stat-val { font-size: 1rem; }
    .rdm--small .rdm__stat-lbl { font-size: 0.55rem; }
    .rdm--small .rdm__stat { padding: 0.55rem 0.6rem; }
    .rdm--small .rdm__stats { grid-template-columns: repeat(3, 1fr); gap: 0.45rem; }
    .rdm--small .rdm__main { padding: 0.9rem 1rem; gap: 0.75rem; }
    .rdm--small .rdm__table { font-size: 0.62rem; }
    .rdm--small .rdm__table th,
    .rdm--small .rdm__table td { padding: 0.4rem 0.6rem; }
    .rdm--small .rdm__new-btn { font-size: 0.62rem; padding: 0.35rem 0.7rem; }
    .rdm--small .rdm__project-row { padding: 0.45rem 0.7rem; gap: 0.4rem; }
    .rdm--small .rdm__nav-item { font-size: 0.65rem; padding: 0.38rem 0.5rem; gap: 6px; }
    .rdm--small .rdm__user-chip { padding: 0.38rem 0.55rem; }
    .rdm--small .rdm__avatar { width: 18px; height: 18px; font-size: 0.58rem; }
    .rdm--small .rdm__logo-img { height: 22px; }

    /* Full variant for preview section */
    .rdm--full { font-size: 0.82rem; }
    .rdm--full .rdm__page-title { font-size: 1.4rem; }
    .rdm--full .rdm__stat-val { font-size: 1.55rem; }
    .rdm--full .rdm__sidebar { width: 220px; padding: 1.5rem 1rem; }
    .rdm--full .rdm__stats { grid-template-columns: repeat(6, 1fr); }

    /* ── Sidebar ── */
    .rdm__sidebar {
        width: 185px;
        flex-shrink: 0;
        background: #0a0c0f;
        border-right: 1px solid rgba(255,255,255,0.07);
        padding: 1.1rem 0.85rem;
        display: flex;
        flex-direction: column;
        gap: 0.15rem;
    }

    .rdm__logo {
        display: flex;
        align-items: center;
        padding: 0 0.2rem;
        margin-bottom: 1rem;
    }

    .rdm__user-chip {
        display: flex;
        align-items: center;
        gap: 0.55rem;
        background: rgba(0,255,136,0.07);
        border: 1px solid rgba(0,255,136,0.15);
        border-radius: 10px;
        padding: 0.5rem 0.65rem;
        margin-bottom: 0.85rem;
        overflow: hidden;
    }

    .rdm__avatar {
        width: 22px; height: 22px;
        border-radius: 50%;
        background: var(--accent, #00ff88);
        color: #000;
        font-weight: 800;
        font-size: 0.65rem;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }

    .rdm__user-chip span {
        font-size: 0.62rem;
        color: rgba(255,255,255,0.55);
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .rdm__nav-section-label {
        font-size: 0.55rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        color: rgba(255,255,255,0.25);
        padding: 0.55rem 0.5rem 0.2rem;
        text-transform: uppercase;
    }

    .rdm__nav-section-label--bottom { margin-top: auto; }

    .rdm__nav {
        display: flex;
        flex-direction: column;
        gap: 1px;
        margin-bottom: 0.2rem;
    }

    .rdm__nav-item {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 0.48rem 0.6rem;
        border-radius: 8px;
        font-size: 0.73rem;
        color: rgba(255,255,255,0.45);
        cursor: pointer;
        transition: all 0.15s;
    }

    .rdm__nav-item svg { flex-shrink: 0; opacity: 0.7; }

    .rdm__nav-item--active {
        background: rgba(0,255,136,0.08);
        border: 1px solid rgba(0,255,136,0.18);
        color: var(--accent, #00ff88);
        font-weight: 600;
    }

    .rdm__nav-item--active svg { opacity: 1; }

    /* ── Main area ── */
    .rdm__main {
        flex: 1;
        padding: 1.25rem 1.5rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
        overflow: hidden;
        min-width: 0;
    }

    .rdm__topbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .rdm__page-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: rgba(255,255,255,0.95);
        letter-spacing: -0.01em;
    }

    .rdm__new-btn {
        background: var(--accent, #00ff88);
        color: #000;
        font-size: 0.72rem;
        font-weight: 700;
        padding: 0.45rem 1rem;
        border-radius: 8px;
        cursor: pointer;
        white-space: nowrap;
    }

    /* Stats cards */
    .rdm__stats {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 0.6rem;
    }

    .rdm__stat {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.07);
        border-radius: 10px;
        padding: 0.75rem 0.8rem;
    }

    .rdm__stat-lbl {
        font-size: 0.6rem;
        color: rgba(255,255,255,0.35);
        font-weight: 600;
        margin-bottom: 4px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .rdm__stat-val {
        font-size: 1.35rem;
        font-weight: 800;
        color: rgba(255,255,255,0.9);
        letter-spacing: -0.025em;
        line-height: 1;
    }

    .rdm__stat-val--green { color: var(--accent, #00ff88); }
    .rdm__stat-val--red   { color: #ff4949; }

    /* Project header row */
    .rdm__project-row {
        display: flex;
        align-items: center;
        gap: 0.55rem;
        padding: 0.6rem 0.85rem;
        background: rgba(255,255,255,0.02);
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 10px;
        flex-wrap: nowrap;
        overflow: hidden;
    }

    .rdm__project-dot {
        width: 8px; height: 8px;
        border-radius: 50%;
        background: var(--accent, #00ff88);
        box-shadow: 0 0 0 3px rgba(0,255,136,0.18);
        flex-shrink: 0;
    }

    .rdm__project-name {
        font-size: 0.75rem;
        font-weight: 800;
        color: rgba(255,255,255,0.9);
        white-space: nowrap;
        letter-spacing: 0.02em;
    }

    .rdm__project-desc {
        font-size: 0.68rem;
        color: rgba(255,255,255,0.38);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        min-width: 0;
    }

    .rdm__new-badge {
        font-size: 0.58rem;
        font-weight: 700;
        background: rgba(0,255,136,0.12);
        border: 1px solid rgba(0,255,136,0.25);
        color: var(--accent, #00ff88);
        padding: 0.15rem 0.5rem;
        border-radius: 100px;
        white-space: nowrap;
        flex-shrink: 0;
    }

    .rdm__project-meta {
        font-size: 0.65rem;
        color: rgba(255,255,255,0.35);
        white-space: nowrap;
        flex-shrink: 0;
    }

    .rdm__project-action {
        font-size: 0.65rem;
        font-weight: 600;
        color: rgba(255,255,255,0.5);
        white-space: nowrap;
        flex-shrink: 0;
        cursor: pointer;
        transition: color 0.15s;
    }

    .rdm__project-action:hover { color: rgba(255,255,255,0.9); }

    /* Forms table */
    .rdm__table-wrap {
        border: 1px solid rgba(255,255,255,0.07);
        border-radius: 10px;
        overflow: hidden;
    }

    .rdm__table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.75rem;
    }

    .rdm__table thead tr {
        background: rgba(255,255,255,0.03);
        border-bottom: 1px solid rgba(255,255,255,0.07);
    }

    .rdm__table th {
        padding: 0.55rem 0.85rem;
        text-align: left;
        font-size: 0.5rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: rgba(255,255,255,0.3);
        white-space: nowrap;
    }

    .rdm__table tbody tr {
        border-bottom: 1px solid rgba(255,255,255,0.04);
        transition: background 0.15s;
    }

    .rdm__table tbody tr:last-child { border-bottom: none; }
    .rdm__table tbody tr:hover { background: rgba(255,255,255,0.02); }

    .rdm__table td {
        padding: 0.7rem 0.85rem;
        color: rgba(255,255,255,0.6);
        white-space: nowrap;
    }

    .rdm__td-name {
        color: rgba(255,255,255,0.88) !important;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .rdm__td-ep {
        font-family: var(--font-mono, monospace);
        font-size: 0.68rem;
        color: rgba(255,255,255,0.32) !important;
    }

    .rdm__td-green { color: var(--accent, #00ff88) !important; font-weight: 700; }
    .rdm__td-red   { color: #ff4949 !important; font-weight: 700; }

    .rdm__status {
        font-size: 0.65rem;
        font-weight: 700;
        color: var(--accent, #00ff88);
        background: rgba(0,255,136,0.1);
        border: 1px solid rgba(0,255,136,0.22);
        padding: 0.18rem 0.6rem;
        border-radius: 100px;
    }

    .rdm__td-view {
        color: rgba(255,255,255,0.4) !important;
        cursor: pointer;
        font-weight: 600;
        transition: color 0.15s;
    }

    .rdm__td-view:hover { color: rgba(255,255,255,0.9) !important; }

    /* ════════════════════════════════════════════════════════
    CORE SECTION
    ════════════════════════════════════════════════════════ */
    .lpc-section {
        padding: 6rem 0 5rem;
        position: relative;
        overflow: hidden;
    }

    .lpc-glow--tl {
        position: absolute;
        width: 650px; height: 500px;
        border-radius: 50%;
        background: var(--green);
        opacity: 0.04;
        filter: blur(150px);
        top: -100px; left: -180px;
        pointer-events: none;
    }

    .lpc-layout {
        display: grid;
        grid-template-columns: 1fr 1.15fr;
        gap: 5rem;
        align-items: start;
    }

    .lpc-left {
        display: flex;
        flex-direction: column;
        gap: 1.1rem;
        position: sticky;
        top: 2rem;
    }

    .lpc-badge {
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
        background: rgba(0,255,136,0.09);
        border: 1px solid rgba(0,255,136,0.22);
        color: var(--green);
    }

    .lpc-badge__dot {
        width: 7px; height: 7px;
        border-radius: 50%;
        background: var(--green);
        box-shadow: 0 0 0 3px rgba(0,255,136,0.2);
        animation: lp-pulse 2s infinite;
    }

    .lpc-title {
        font-size: clamp(1.85rem, 2.6vw, 2.5rem);
        font-weight: 800;
        line-height: 1.1;
        letter-spacing: -0.03em;
        color: rgba(255,255,255,0.95);
        margin: 0;
    }

    .lpc-title__accent {
        background: linear-gradient(120deg, var(--green) 0%, #78ffc8 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .lpc-desc {
        font-size: 0.96rem;
        line-height: 1.75;
        color: rgba(255,255,255,0.62);
        margin: 0;
    }

    .lpc-perks {
        list-style: none;
        padding: 0; margin: 0;
        display: flex;
        flex-direction: column;
        gap: 0.55rem;
    }

    .lpc-perks li {
        display: flex;
        align-items: center;
        gap: 9px;
        font-size: 0.875rem;
        color: rgba(255,255,255,0.68);
    }

    .lpc-perks li svg { color: var(--green); flex-shrink: 0; }

    .lpc-cta {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        width: fit-content;
        font-weight: 700;
        font-size: 0.94rem;
        text-decoration: none;
        border-radius: 10px;
        padding: 0.88rem 1.65rem;
        transition: all 0.22s ease;
        background: linear-gradient(135deg, var(--green) 0%, var(--green-dark) 100%);
        color: #001a0d;
        border: 1px solid rgba(0,255,136,0.25);
        box-shadow: 0 0 18px rgba(0,255,136,0.28), inset 0 1px 0 rgba(255,255,255,0.2);
        margin-top: 0.25rem;
    }

    .lpc-cta:hover {
        background: linear-gradient(135deg, #33ffaa 0%, #00bb66 100%);
        box-shadow: 0 0 32px rgba(0,255,136,0.5);
        transform: translateY(-2px);
    }

    .lpc-note {
        font-size: 0.73rem;
        color: rgba(255,255,255,0.32);
        margin: 0;
    }

    .lpc-right { display: flex; flex-direction: column; gap: 2rem; }

    .lpc-right__head { display: flex; flex-direction: column; gap: 0.6rem; }

    .lpc-setup-tag {
        display: inline-block;
        font-family: var(--font-mono, monospace);
        font-size: 0.68rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--green);
        background: rgba(0,255,136,0.08);
        border: 1px solid rgba(0,255,136,0.2);
        padding: 0.25rem 0.85rem;
        border-radius: 100px;
        width: fit-content;
    }

    .lpc-setup-title {
        font-size: clamp(1.35rem, 1.9vw, 1.75rem);
        font-weight: 800;
        line-height: 1.15;
        letter-spacing: -0.025em;
        color: rgba(255,255,255,0.92);
        margin: 0;
    }

    .lpc-setup-sub {
        font-size: 0.9rem;
        line-height: 1.65;
        color: rgba(255,255,255,0.52);
        margin: 0;
    }

    .lpc-vsteps { display: flex; flex-direction: column; gap: 0; }

    .lpc-vstep { display: flex; gap: 1.1rem; position: relative; }

    .lpc-vstep__left {
        display: flex;
        flex-direction: column;
        align-items: center;
        flex-shrink: 0;
    }

    .lpc-vstep__num {
        width: 44px; height: 44px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-family: 'SF Mono', 'Fira Code', monospace;
        font-size: 0.72rem;
        font-weight: 800;
        background: rgba(0,255,136,0.07);
        border: 1px solid rgba(0,255,136,0.28);
        color: var(--green);
        flex-shrink: 0;
        position: relative; z-index: 1;
    }

    .lpc-vstep__line {
        width: 1px; flex: 1; min-height: 1.5rem;
        background: linear-gradient(to bottom, rgba(0,255,136,0.22), transparent);
        margin: 4px 0;
    }

    .lpc-vstep__body {
        display: flex;
        flex-direction: column;
        gap: 5px;
        padding: 0.5rem 0 2rem;
    }

    .lpc-vstep:last-child .lpc-vstep__body { padding-bottom: 0; }

    .lpc-vstep__body h4 { font-size: 0.96rem; font-weight: 700; color: rgba(255,255,255,0.9); margin: 0; }
    .lpc-vstep__body p  { font-size: 0.86rem; line-height: 1.65; color: rgba(255,255,255,0.56); margin: 0; }

    .lpc-vstep__link {
        display: inline-flex; align-items: center; gap: 6px;
        margin-top: 0.5rem;
        font-size: 0.84rem; font-weight: 600;
        color: var(--green); text-decoration: none;
        transition: gap 0.2s;
    }
    .lpc-vstep__link:hover { gap: 10px; }

    .lpc-snippet {
        margin-top: 0.7rem;
        background: rgba(0,0,0,0.3);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 8px;
        padding: 0.6rem 0.9rem;
        font-family: 'SF Mono', 'Fira Code', monospace;
        font-size: 0.72rem;
        line-height: 1.6;
        color: rgba(255,255,255,0.72);
        overflow-x: auto;
    }

    /* ════════════════════════════════════════════════════════
    EXPRESS SECTION
    ════════════════════════════════════════════════════════ */
    .lpe-section {
        position: relative;
        padding: 80px 0;
        overflow: hidden;
        background: #06090f;
    }
    .lpe-section::before {
        content: '';
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        width: 700px; height: 500px;
        background: radial-gradient(ellipse at center, rgba(30,90,255,0.22) 0%, rgba(20,60,200,0.1) 40%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
        z-index: 0;
    }
    .lpe-section::after {
        content: '';
        position: absolute; inset: 0;
        background-image: linear-gradient(rgba(60,120,255,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(60,120,255,0.04) 1px, transparent 1px);
        background-size: 48px 48px;
        pointer-events: none;
        z-index: 0;
    }
    .lpe-or-row {
        display: flex; align-items: center; gap: 16px;
        margin-bottom: 40px; position: relative; z-index: 1;
    }
    .lpe-or-line { flex: 1; height: 1px; background: linear-gradient(90deg, transparent, rgba(60,120,255,0.35), transparent); }
    .lpe-or-pill {
        display: flex; align-items: center; gap: 8px;
        padding: 8px 20px; border-radius: 999px;
        border: 1px solid rgba(60,120,255,0.4);
        background: rgba(20,50,180,0.15);
        font-size: 13px; font-weight: 700; color: #6ea4ff;
        letter-spacing: 0.06em; text-transform: uppercase;
    }
    .lpe-card {
        border: 1px solid rgba(40,100,255,0.2);
        border-radius: 24px; padding: 56px 52px;
        background: rgba(10,18,40,0.6);
        position: relative; overflow: hidden; z-index: 1;
    }
    .lpe-card::before {
        content: ''; position: absolute;
        top: -1px; left: -1px; width: 120px; height: 120px;
        background: linear-gradient(135deg, rgba(60,120,255,0.4), transparent 60%);
        border-radius: 24px 0 0 0; pointer-events: none;
    }
    .lpe-card::after {
        content: ''; position: absolute;
        bottom: -1px; right: -1px; width: 100px; height: 100px;
        background: linear-gradient(315deg, rgba(60,120,255,0.2), transparent 60%);
        border-radius: 0 0 24px 0; pointer-events: none;
    }
    .lpe-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: center; }
    .lpe-badge {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 5px 14px; border-radius: 999px;
        background: rgba(40,100,255,0.18);
        border: 1px solid rgba(60,130,255,0.35);
        font-size: 11px; font-weight: 600; color: #7ab4ff;
        letter-spacing: 0.08em; text-transform: uppercase;
        margin-bottom: 20px;
    }
    .lpe-title { font-size: clamp(28px,4vw,48px); font-weight: 800; line-height: 1.08; color: #fff; margin-bottom: 16px; letter-spacing: -0.02em; }
    .lpe-title__accent { background: linear-gradient(90deg,#4d8fff,#a0cfff); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
    .lpe-desc { font-size: 15px; line-height: 1.7; color: rgba(255,255,255,0.5); margin-bottom: 28px; }
    .lpe-perks { list-style: none; display: flex; flex-direction: column; gap: 10px; margin-bottom: 36px; }
    .lpe-perks li { display: flex; align-items: center; gap: 10px; font-size: 14px; color: rgba(255,255,255,0.75); }
    .lpe-perks li svg { flex-shrink: 0; color: #4d8fff; background: rgba(40,90,255,0.15); border-radius: 50%; padding: 3px; width: 20px; height: 20px; }
    .lpe-cta {
        display: inline-flex; align-items: center; gap: 9px;
        padding: 14px 28px; border-radius: 999px;
        background: linear-gradient(135deg,#1a4adf,#3366ff);
        box-shadow: 0 0 32px rgba(40,100,255,0.45), inset 0 1px 0 rgba(255,255,255,0.15);
        font-size: 14px; font-weight: 700; color: #fff;
        text-decoration: none; transition: box-shadow 0.25s, transform 0.2s;
    }
    .lpe-cta:hover { box-shadow: 0 0 48px rgba(40,100,255,0.65), inset 0 1px 0 rgba(255,255,255,0.2); transform: translateY(-1px); }
    .lpe-steps { display: flex; flex-direction: column; }
    .lpe-step { display: flex; gap: 20px; }
    .lpe-step__left { display: flex; flex-direction: column; align-items: center; flex-shrink: 0; }
    .lpe-step__num {
        width: 40px; height: 40px; border-radius: 50%;
        border: 1px solid rgba(60,120,255,0.45);
        background: rgba(20,50,180,0.2);
        display: flex; align-items: center; justify-content: center;
        font-size: 12px; font-weight: 700; color: #6ea4ff; letter-spacing: 0.05em;
    }
    .lpe-step__line { width: 1px; flex: 1; min-height: 32px; background: linear-gradient(to bottom, rgba(60,120,255,0.35), rgba(60,120,255,0.05)); margin: 6px 0; }
    .lpe-step__body { padding-bottom: 36px; }
    .lpe-step:last-child .lpe-step__body { padding-bottom: 0; }
    .lpe-step__body h4 { font-size: 16px; font-weight: 700; color: #fff; margin-bottom: 6px; margin-top: 8px; }
    .lpe-step__body p { font-size: 14px; line-height: 1.6; color: rgba(255,255,255,0.45); }
    @media (max-width: 768px) {
        .lpe-grid { grid-template-columns: 1fr; gap: 40px; }
        .lpe-card { padding: 36px 24px; }
    }

    /* ════════════════════════════════════════════════════════
    CONTRAST FIXES
    ════════════════════════════════════════════════════════ */
    .lp-hero__desc                          { color: rgba(255,255,255,0.68) !important; }
    .lp-proof-lbl                           { color: rgba(255,255,255,0.48) !important; font-size: 0.72rem !important; }
    .lp-hero__row-copy p                    { color: rgba(255,255,255,0.62) !important; font-size: 0.95rem !important; }
    .lp-hero__row-bullets li                { color: rgba(255,255,255,0.72) !important; font-size: 0.875rem !important; }
    .lp-email__card-meta                    { color: rgba(255,255,255,0.52) !important; font-size: 0.72rem !important; }
    .lp-email__card-caption                 { color: rgba(255,255,255,0.58) !important; font-size: 0.76rem !important; }
    .lp-email__field-key                    { color: rgba(255,255,255,0.45) !important; font-size: 0.65rem !important; }
    .lp-email__field-val                    { color: rgba(255,255,255,0.88) !important; font-size: 0.78rem !important; }
    .lp-section-head p                      { color: rgba(255,255,255,0.65) !important; font-size: 1.02rem !important; }
    .lp-cta__inner p:not(.lp-cta__note)    { color: rgba(255,255,255,0.65) !important; }
    .lp-cta__note                           { color: rgba(255,255,255,0.35) !important; }
    .banner-content p                       { color: rgba(255,255,255,0.65) !important; }
    .banner-description                     { color: rgba(255,255,255,0.55) !important; }
    .lp-pt__footer                          { color: rgba(255,255,255,0.4) !important; font-size: 0.82rem !important; }

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

    .lp-hero__bg { position: absolute; inset: 0; pointer-events: none; }

    .lp-glow {
        position: absolute;
        border-radius: 50%;
        filter: blur(160px);
        pointer-events: none;
    }

    .lp-glow--1 { width: 700px; height: 700px; background: var(--accent,#00ff88); opacity: 0.07; top: -300px; right: -200px; }
    .lp-glow--2 { width: 500px; height: 500px; background: #0077ff; opacity: 0.05; bottom: -200px; left: -100px; }
    .lp-glow--4 { width: 700px; height: 700px; background: var(--accent,#00ff88); opacity: 0.07; top: 3700px; right: -200px; }
    .lp-glow--3 { width: 500px; height: 500px; background: #0077ff; opacity: 0.05; top: 4000px; left: -100px; }

    .lp-grid {
        position: absolute; inset: 0;
        background-image: linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px);
        background-size: 48px 48px;
        mask-image: radial-gradient(ellipse 80% 90% at 50% 0%, black 20%, transparent 100%);
    }

    .lp-noise {
        position: absolute; inset: 0; opacity: 0.018;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
    }

    .lp-hero .lp-container { display: flex; flex-direction: column; align-items: center; gap: 4rem; position: relative; z-index: 2; }

    .lp-hero__center { display: flex; flex-direction: column; align-items: center; text-align: center; gap: 1.5rem; max-width: 720px; width: 100%; }

    .lp-badge {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 0.4rem 1rem 0.4rem 0.75rem; border-radius: 100px;
        background: rgba(0,255,136,0.07); border: 1px solid rgba(0,255,136,0.2);
        color: var(--accent,#00ff88); font-size: 0.78rem; font-weight: 600;
        text-decoration: none; width: fit-content; transition: all 0.2s ease;
    }
    .lp-badge:hover { background: rgba(0,255,136,0.12); border-color: rgba(0,255,136,0.35); }

    .lp-badge__dot {
        width: 7px; height: 7px; border-radius: 50%;
        background: var(--accent,#00ff88);
        box-shadow: 0 0 0 3px rgba(0,255,136,0.2);
        animation: lp-pulse 2s infinite;
    }

    @keyframes lp-pulse {
        0%, 100% { box-shadow: 0 0 0 3px rgba(0,255,136,0.2); }
        50%       { box-shadow: 0 0 0 6px rgba(0,255,136,0.05); }
    }

    .lp-hero__title { font-size: clamp(2.8rem,5.5vw,4.5rem); font-weight: 800; line-height: 1.06; letter-spacing: -0.035em; color: var(--text-primary,#fff); margin: 0; }

    .lp-hero__accent {
        background: linear-gradient(120deg, var(--accent,#00ff88) 0%, #78b4ff 100%);
        -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    }

    .lp-hero__desc { font-size: 1.05rem; line-height: 1.75; color: var(--text-secondary,rgba(255,255,255,0.55)); max-width: 560px; margin: 0; }

    .lp-code-inline {
        font-family: 'SF Mono','Fira Code',monospace; font-size: 0.9em;
        background: rgba(0,255,136,0.1); border: 1px solid rgba(0,255,136,0.2);
        color: var(--accent,#00ff88); padding: 0.1em 0.45em; border-radius: 4px;
    }

    .lp-hero__actions { display: flex; gap: 0.85rem; flex-wrap: wrap; justify-content: center; }

    .lp-hero__proof { display: flex; align-items: center; gap: 1.75rem; padding-top: 0.25rem; flex-wrap: wrap; justify-content: center; }

    .lp-proof-item { display: flex; flex-direction: column; align-items: center; gap: 3px; }
    .lp-proof-num { font-size: 1.5rem; font-weight: 800; color: var(--text-primary,#fff); line-height: 1; }
    .lp-proof-lbl { font-size: 0.65rem; color: var(--text-muted,rgba(255,255,255,0.3)); text-transform: uppercase; letter-spacing: 0.07em; }
    .lp-proof-sep { width: 1px; height: 32px; background: var(--border-color,rgba(255,255,255,0.1)); }

    .lp-hero__rows { display: flex; flex-direction: column; gap: 5rem; width: 100%; max-width: 1100px; }

    .lp-hero__row { display: grid; grid-template-columns: 1.4fr 1fr; gap: 4rem; align-items: center; }
    .lp-hero__row--reverse { grid-template-columns: 1fr 1.4fr; }

    .lp-hero__row-tag { display: inline-flex; align-items: center; gap: 6px; font-size: 0.7rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.09em; color: var(--accent,#00ff88); margin-bottom: 0.85rem; }

    .lp-hero__row-copy h3 { font-size: clamp(1.5rem,2.5vw,2rem); font-weight: 800; line-height: 1.15; letter-spacing: -0.025em; color: var(--text-primary,#fff); margin: 0 0 1rem; }
    .lp-hero__row-copy p  { font-size: 0.92rem; line-height: 1.75; color: var(--text-secondary,rgba(255,255,255,0.5)); margin: 0 0 1.35rem; }

    .lp-hero__row-bullets { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.6rem; }
    .lp-hero__row-bullets li { display: flex; align-items: center; gap: 9px; font-size: 0.85rem; color: rgba(255,255,255,0.6); }
    .lp-hero__row-bullets li svg { color: var(--accent,#00ff88); flex-shrink: 0; }

    .lp-prev { display: flex; flex-direction: column; gap: 0.6rem; }
    .lp-prev__label { display: flex; align-items: center; gap: 6px; font-size: 0.68rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: rgba(255,255,255,0.25); }

    /* ════════════════════════════════════════════════════════
    EMAIL PREVIEW
    ════════════════════════════════════════════════════════ */
    .lp-email { border: 1px solid rgba(255,255,255,0.1); border-radius: 14px; overflow: hidden; background: #fff; box-shadow: 0 24px 64px rgba(0,0,0,0.45); }
    .lp-email__chrome { background: #f5f5f5; border-bottom: 1px solid #e0e0e0; padding: 0.65rem 1rem; }
    .lp-email__from-row { display: flex; align-items: center; gap: 0.6rem; }
    .lp-email__sender-avatar { width: 28px; height: 28px; border-radius: 50%; background: linear-gradient(135deg,#1a1a1a,#333); display: flex; align-items: center; justify-content: center; font-size: 0.72rem; font-weight: 800; color: var(--accent,#00ff88); flex-shrink: 0; }
    .lp-email__sender-name { font-size: 0.78rem; font-weight: 700; color: #1a1a1a; }
    .lp-email__sender-to { font-size: 0.65rem; color: #666; }
    .lp-email__body { padding: 1rem; background: #f9f9f9; }
    .lp-email__card { background: #111; border-radius: 10px; overflow: hidden; padding: 1.1rem 1.25rem; display: flex; flex-direction: column; gap: 0.6rem; }
    .lp-email__card-title { font-size: 0.92rem; font-weight: 700; color: #fff; }
    .lp-email__card-divider { height: 1px; background: rgba(255,255,255,0.08); margin: 0.15rem 0; }
    .lp-email__card-meta { font-size: 0.68rem; color: rgba(255,255,255,0.35); }
    .lp-email__card-caption { font-size: 0.7rem; color: rgba(255,255,255,0.4); }
    .lp-email__card-fields { display: flex; flex-direction: column; gap: 0.5rem; margin-top: 0.25rem; }
    .lp-email__field { display: flex; flex-direction: column; gap: 2px; }
    .lp-email__field-key { font-size: 0.6rem; font-weight: 700; letter-spacing: 0.08em; color: rgba(255,255,255,0.28); text-transform: uppercase; }
    .lp-email__field-val { font-size: 0.75rem; color: rgba(255,255,255,0.85); line-height: 1.4; }
    .lp-email__field-val--link { color: #79aaff; }

    /* ════════════════════════════════════════════════════════
    BUTTONS
    ════════════════════════════════════════════════════════ */
    .lp-btn { display: inline-flex; align-items: center; gap: 8px; font-weight: 600; font-size: 0.9rem; text-decoration: none; border-radius: 10px; padding: 0.75rem 1.5rem; border: none; cursor: pointer; transition: all 0.2s ease; white-space: nowrap; }
    .lp-btn--lg  { padding: 0.875rem 1.75rem; font-size: 0.95rem; }
    .lp-btn--xl  { padding: 1.1rem 2.25rem; font-size: 1.05rem; border-radius: 12px; }
    .lp-btn--primary { background: var(--accent,#00ff88); color: #000; }
    .lp-btn--primary:hover { background: #00e87a; transform: translateY(-2px); box-shadow: 0 8px 28px rgba(0,255,136,0.3); }
    .lp-btn--ghost { background: transparent; color: var(--text-primary,#fff); border: 1px solid rgba(255,255,255,0.15); }
    .lp-btn--ghost:hover { border-color: rgba(255,255,255,0.35); background: rgba(255,255,255,0.04); transform: translateY(-2px); }

    /* ════════════════════════════════════════════════════════
    SECTION HEADER
    ════════════════════════════════════════════════════════ */
    .lp-section-head { text-align: center; max-width: 640px; margin: 0 auto 4rem; }
    .lp-section-tag { display: inline-block; font-family: var(--font-mono,monospace); font-size: 0.68rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: var(--accent,#00ff88); background: rgba(0,255,136,0.08); border: 1px solid rgba(0,255,136,0.2); padding: 0.25rem 0.85rem; border-radius: 100px; margin-bottom: 1.25rem; }
    .lp-section-head h2 { font-size: clamp(1.8rem,3.5vw,2.75rem); font-weight: 800; line-height: 1.15; letter-spacing: -0.025em; color: var(--text-primary,#fff); margin: 0 0 1rem; }
    .lp-section-head p { font-size: 1rem; color: var(--text-secondary,rgba(255,255,255,0.55)); line-height: 1.65; margin: 0; }
    .lp-dim { color: rgba(255,255,255,0.3); }
    .lp-accent-text { color: var(--accent,#00ff88); }

    /* ════════════════════════════════════════════════════════
    DASHBOARD PREVIEW SECTION
    ════════════════════════════════════════════════════════ */
    .lp-preview { padding: 6rem 0; background: linear-gradient(to bottom, transparent, rgba(0,0,0,0.3), transparent); }

    /* ════════════════════════════════════════════════════════
    PRICING BANNER
    ════════════════════════════════════════════════════════ */
    .lp-pricing-teaser { padding: 4rem 1.5rem; border-radius: 1.5rem; max-width: 1400px; margin: 0 auto; }

    .banner-inner {
        border-radius: 1.5rem; padding: 0 2.5rem;
        display: flex; align-items: center; justify-content: flex-start;
        flex-wrap: wrap; gap: 3rem; margin: 2rem 0 2rem;
    }
    .banner-content { flex: 0 1 auto; max-width: 80%; }
    .banner-content h2 { font-size: clamp(1.8rem,3.5vw,2.75rem); font-weight: 800; line-height: 1.15; letter-spacing: -0.025em; color: var(--text-primary,#fff); margin: 0 0 1rem; }
    .banner-content h2 .lp-dim { color: rgba(255,255,255,0.3); }
    .banner-content p { font-size: 1rem; line-height: 1.65; color: rgba(255,255,255,0.5); max-width: 620px; margin: 0; }
    .banner-description { font-size: 0.95rem; color: #94a3b8; margin-top: 0.5rem; }
    .banner-decoration { flex-shrink: 0; }

    .lp-pt__footer { text-align: center; font-size: 0.78rem; color: rgba(255,255,255,0.25); padding-top: 0.5rem; }
    .lp-pt__footer a { color: var(--accent,#00ff88); text-decoration: none; font-weight: 600; opacity: 0.8; transition: opacity 0.2s; }
    .lp-pt__footer a:hover { text-decoration: underline; }

    /* ════════════════════════════════════════════════════════
    FINAL CTA
    ════════════════════════════════════════════════════════ */
    .lp-cta { padding: 7rem 0; position: relative; overflow: hidden; text-align: center; }
    .lp-cta__bg { position: absolute; inset: 0; pointer-events: none; }
    .lp-cta__glow { position: absolute; width: 800px; height: 400px; border-radius: 50%; background: var(--accent,#00ff88); filter: blur(200px); opacity: 0.06; top: 50%; left: 50%; transform: translate(-50%,-50%); }
    .lp-cta__inner { position: relative; z-index: 2; display: flex; flex-direction: column; align-items: center; gap: 1.5rem; }
    .lp-cta__inner h2 { font-size: clamp(2rem,4vw,3.25rem); font-weight: 800; line-height: 1.1; letter-spacing: -0.03em; color: var(--text-primary,#fff); margin: 0; }
    .lp-cta__inner p { font-size: 1rem; line-height: 1.65; color: rgba(255,255,255,0.5); max-width: 520px; margin: 0; }
    .lp-cta__note { font-size: 0.78rem !important; color: rgba(255,255,255,0.2) !important; }

    /* ════════════════════════════════════════════════════════
    RESPONSIVE
    ════════════════════════════════════════════════════════ */
    @media (max-width: 1024px) {
        .lpc-layout { gap: 3.5rem; }
        .lp-hero__row { grid-template-columns: 1fr 1fr; gap: 2.5rem; }
        .lp-hero__row--reverse { grid-template-columns: 1fr 1fr; }
        .rdm--full .rdm__stats { grid-template-columns: repeat(3,1fr); }
    }

    @media (max-width: 860px) {
        .lp-hero__rows { gap: 3.5rem; }
        .lp-hero__row, .lp-hero__row--reverse { grid-template-columns: 1fr; gap: 2rem; }
        .lp-hero__row--reverse .lp-hero__row-copy { order: -1; }
        .lpc-layout { grid-template-columns: 1fr; gap: 2.5rem; }
        .lpc-left { position: static; }
        .lpe-grid { grid-template-columns: 1fr; gap: 2.5rem; }
        .rdm__sidebar { width: 160px; }
        .rdm--full { flex-direction: column; }
        .rdm--full .rdm__sidebar { width: 100%; flex-wrap: wrap; border-right: none; border-bottom: 1px solid rgba(255,255,255,0.07); }
        .rdm--full .rdm__stats { grid-template-columns: repeat(3,1fr); }
        .rdm__nav-section-label--bottom { margin-top: 0; }
        .banner-inner { flex-direction: column; align-items: flex-start; padding: 0; }
    }

    @media (max-width: 640px) {
        .lp-hero { padding: 5rem 0 3rem; }
        .lp-preview, .lp-pricing-teaser, .lp-cta { padding: 4rem 0; }
        .lp-hero__proof { flex-wrap: wrap; }
        .rdm { flex-direction: column; }
        .rdm__sidebar { width: 100%; border-right: none; border-bottom: 1px solid rgba(255,255,255,0.07); padding: 0.85rem; }
        .rdm__stats { grid-template-columns: repeat(2,1fr); }
        .lp-container { padding: 0 1.25rem; }
        .lpe-card { padding: 36px 24px; }
        .lpc-section { padding: 4rem 0 3.5rem; }
        .lpe-section { padding: 3.5rem 0 4rem; }
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
        }, { threshold: 0.08 });

        document.querySelectorAll('.lp-hero__row, .lp-pricing-teaser, .banner-inner, .rdm').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(18px)';
            el.style.transition = 'opacity 0.55s ease, transform 0.55s ease';
            observer.observe(el);
        });

    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\DR83\Desktop\000form\16-April-2026\000form.com\resources\views/pages/core.blade.php ENDPATH**/ ?>