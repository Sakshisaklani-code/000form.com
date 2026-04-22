


<?php $__env->startSection('title', $project->name); ?>

<?php $__env->startSection('content'); ?>

<style>
:root {
    --g: #00ff88;
    --g2: #00cc6a;
    --r: #ff4d4d;
    --am: #ffbb33;
    --card: rgba(8,13,8,0.88);
    --border: rgba(255,255,255,0.05);
    --border-g: rgba(0,255,136,0.15);
    --t1: #f0f0f0;
    --t2: #8a9a8a;
    --t3: #b4b4b4;
    --mono: 'JetBrains Mono', monospace;
    --sans: 'Outfit', sans-serif;
}

.proj-show { font-family: var(--sans); position: relative; }

/* ambient glows */
.proj-show::before {
    content: '';
    position: fixed; top: -20vh; left: -10vw;
    width: 55vw; height: 55vh;
    background: radial-gradient(ellipse, rgba(0,255,136,0.04) 0%, transparent 70%);
    pointer-events: none; z-index: 0;
}
.proj-show::after {
    content: '';
    position: fixed; bottom: 0; right: -10vw;
    width: 40vw; height: 45vh;
    background: radial-gradient(ellipse, rgba(0,255,136,0.02) 0%, transparent 70%);
    pointer-events: none; z-index: 0;
}

/* ── Back crumb ─────────────────────────────────────────────── */
.back-crumb {
    display: inline-flex; align-items: center; gap: 0.4rem;
    font-family: var(--mono); font-size: 0.7rem; font-weight: 500;
    text-transform: uppercase; letter-spacing: 0.12em;
    color: var(--t3); text-decoration: none;
    margin-bottom: 1rem;
    transition: color 0.15s;
    position: relative; z-index: 1;
}
.back-crumb:hover { color: var(--g); }
.back-crumb svg { transition: transform 0.15s; }
.back-crumb:hover svg { transform: translateX(-2px); }

/* ── Page header ────────────────────────────────────────────── */
.dash-header {
    display: flex; align-items: flex-start;
    justify-content: space-between;
    flex-wrap: wrap; gap: 1rem;
    margin-bottom: 2.25rem;
    position: relative; z-index: 1;
}
.dash-title-wrap {}
.dash-eyebrow {
    font-family: var(--mono); font-size: 0.9rem; font-weight: 500;
    text-transform: uppercase; letter-spacing: 0.16em;
    color: var(--t3); margin-bottom: 0.55rem;
    display: flex; align-items: center; gap: 0.5rem;
}
.proj-color-dot {
    width: 8px; height: 8px; border-radius: 50%;
    display: inline-block; flex-shrink: 0;
}
.dash-title {
    font-size: 2rem; font-weight: 800;
    color: var(--t1); letter-spacing: -0.04em; line-height: 1;
    display: flex; align-items: center; gap: 0.65rem;
}
.dash-title em {
    font-style: normal; color: var(--g);
    text-shadow: 0 0 28px rgba(0,255,136,0.45);
}
.proj-desc-sub {
    font-size: 1rem; color: var(--t3);
    margin-top: 1rem; font-weight: 400;
}
.header-actions {
    display: flex; align-items: center; gap: 0.5rem;
    flex-shrink: 0;
}
.btn-new {
    display: inline-flex; align-items: center; gap: 0.5rem;
    padding: 0.62rem 1.3rem;
    font-family: var(--sans); font-size: 0.875rem; font-weight: 700;
    border-radius: 999px; border: none; cursor: pointer; text-decoration: none;
    background: linear-gradient(135deg, #00ff88, #00cc6a);
    color: #000;
    box-shadow: 0 0 0 1px rgba(0,255,136,0.35), 0 4px 22px rgba(0,255,136,0.28);
    transition: all 0.2s ease; position: relative; overflow: hidden;
}
.btn-new::after {
    content: ''; position: absolute; inset: 0;
    background: linear-gradient(135deg, rgba(255,255,255,0.18), transparent);
    opacity: 0; transition: opacity 0.2s;
}
.btn-new:hover {
    box-shadow: 0 0 0 1px rgba(0,255,136,0.5), 0 6px 32px rgba(0,255,136,0.42);
    transform: translateY(-2px);
}
.btn-new:hover::after { opacity: 1; }
.btn-ghost {
    display: inline-flex; align-items: center; gap: 0.35rem;
    padding: 0.6rem 1.1rem;
    font-family: var(--sans); font-size: 0.82rem; font-weight: 500;
    border-radius: 999px; text-decoration: none;
    background: rgba(255,255,255,0.03);
    color: var(--t2);
    border: 1px solid var(--border);
    transition: all 0.18s;
}
.btn-ghost:hover { background: rgba(255,255,255,0.07); color: var(--t1); border-color: rgba(255,255,255,0.1); }

/* ── Stats grid ─────────────────────────────────────────────── */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 0.875rem;
    margin-bottom: 2.25rem;
    position: relative; z-index: 1;
}
@media (min-width: 500px) { .stats-grid { grid-template-columns: repeat(3, 1fr); } }
@media (min-width: 900px) { .stats-grid { grid-template-columns: repeat(5, 1fr); } }

.stat-card {
    position: relative; overflow: hidden;
    border-radius: 18px; padding: 1.2rem 1.1rem 1.1rem;
    background: rgba(8,13,8,0.9);
    border: 1px solid var(--border);
    backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px);
    transition: border-color 0.25s, transform 0.2s, box-shadow 0.25s;
    cursor: default;
}
.stat-card::before {
    content: ''; position: absolute; top: 0; left: 15%; right: 15%; height: 1px;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.06), transparent);
}
.stat-card::after {
    content: ''; position: absolute; inset: 0;
    background: linear-gradient(145deg, rgba(255,255,255,0.025) 0%, transparent 50%);
    pointer-events: none;
}
.stat-card:hover {
    border-color: rgba(0,255,136,0.15);
    transform: translateY(-3px);
    box-shadow: 0 12px 40px rgba(0,0,0,0.5), 0 0 0 1px rgba(0,255,136,0.08);
}
.stat-label {
    font-family: var(--mono); font-size: 0.7rem; font-weight: 600;
    text-transform: uppercase; letter-spacing: 0.14em; color: var(--t3); margin-bottom: 0.6rem;
    display: flex; align-items: center; gap: 0.4rem;
}
.stat-value { font-size: clamp(1.3rem, 3vw, 2.2rem); font-weight: 800; color: var(--t1); letter-spacing: -0.04em; line-height: 1; }
.stat-card.g .stat-value  { color: var(--g);  text-shadow: 0 0 24px rgba(0,255,136,0.6); }
.stat-card.r .stat-value  { color: var(--r);  text-shadow: 0 0 20px rgba(255,77,77,0.5); }
.stat-card.am .stat-value { color: var(--am); text-shadow: 0 0 20px rgba(255,187,51,0.5); }
.sc-glow {
    position: absolute; bottom: -18px; right: -18px;
    width: 72px; height: 72px;
    border-radius: 50%; opacity: 0.1; filter: blur(18px);
}
.stat-card.g  .sc-glow { background: var(--g); }
.stat-card.r  .sc-glow { background: var(--r); }
.stat-card.am .sc-glow { background: var(--am); }
.sc-shimmer {
    position: absolute; top: 0; left: 0;
    width: 45%; height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.028), transparent);
    animation: shimmer 4s ease-in-out infinite;
    pointer-events: none;
}
@keyframes shimmer { 0%{transform:translateX(-120%)} 100%{transform:translateX(280%)} }

/* ── Search ──────────────────────────────────────────────────── */
.search-row {
    display: flex; align-items: center;
    gap: 0.875rem; flex-wrap: wrap;
    margin-bottom: 1.75rem;
    position: relative; z-index: 1;
}
.search-pill {
    position: relative; flex: 1;
    min-width: 220px; max-width: 420px;
}
.search-pill-icon {
    position: absolute; left: 1rem; top: 50%;
    transform: translateY(-50%);
    color: var(--t3); pointer-events: none; display: flex;
}
.search-pill input {
    width: 100%;
    padding: 0.7rem 2.5rem 0.7rem 2.65rem;
    background: rgba(8,13,8,0.85);
    border: 1px solid var(--border);
    border-radius: 999px;
    color: var(--t1); font-family: var(--sans); font-size: 0.875rem;
    outline: none; backdrop-filter: blur(10px);
    transition: border-color 0.2s, box-shadow 0.2s;
}
.search-pill input:focus {
    border-color: var(--border-g);
    box-shadow: 0 0 0 3px rgba(0,255,136,0.07), 0 0 18px rgba(0,255,136,0.05);
}
.search-pill input::placeholder { color: var(--t3); }
.search-clear {
    position: absolute; right: 0.75rem; top: 50%;
    transform: translateY(-50%);
    background: none; border: none; cursor: pointer;
    color: var(--t3); display: none; transition: color 0.15s; padding: 2px;
}
.search-clear:hover { color: var(--t1); }
.search-count {
    font-family: var(--mono); font-size: 0.9rem;
    color: var(--g); opacity: 0.9;
}

/* ── Section divider ────────────────────────────────────────── */
.s-div {
    display: flex; align-items: center;
    gap: 0.75rem; margin-bottom: 1.1rem;
    position: relative; z-index: 1;
    padding: 0 1rem;
}
.s-div-label {
    font-family: var(--mono); font-size: 0.8rem; font-weight: 500;
    text-transform: uppercase; letter-spacing: 0.15em;
    color: var(--t3); white-space: nowrap;
}
.s-div-line {
    flex: 1; height: 1px;
    background: linear-gradient(90deg, rgba(0,255,136,0.1), transparent);
}

/* ── No results ─────────────────────────────────────────────── */
.no-results-state {
    display: none;
    padding: 3.5rem 1.5rem; text-align: center;
    border: 1px dashed rgba(0,255,136,0.1);
    border-radius: 18px;
    background: rgba(0,255,136,0.015);
    margin-bottom: 1.5rem;
    color: var(--t3); font-size: 0.875rem;
    position: relative; z-index: 1;
}
.no-results-state svg { display: block; margin: 0 auto 0.75rem; opacity: 0.2; }
.no-results-state strong { color: var(--g); }
mark.search-hl { background: rgba(0,255,136,0.15); color: var(--g); border-radius: 2px; padding: 0 2px; }
tr.form-row-hidden { display: none; }

/* ── Forms table card ───────────────────────────────────────── */
.forms-card {
    position: relative;
    border-radius: 20px; overflow: hidden;
    background: rgba(8,13,8,0.88);
    border: 1px solid var(--border);
    backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px);
    position: relative; z-index: 1;
}
.forms-card::before {
    content: '';
    position: absolute; top: 0; left: 8%; right: 8%; height: 1px;
    background: linear-gradient(90deg, transparent, rgba(0,255,136,0.1), transparent);
    pointer-events: none; z-index: 1;
}
/* left accent strip */
.forms-card .color-strip {
    position: absolute; left: 0; top: 0; bottom: 0;
    width: 3px; opacity: 0.75;
}

/* ── Table ──────────────────────────────────────────────────── */
.table-wrapper { overflow-x: auto; }
.table { width: 100%; border-collapse: collapse; font-size: 0.84rem; }
.table thead tr { border-bottom: 1px solid rgba(255,255,255,0.04); }
.table th {
    padding: 0.65rem 1rem 0.65rem 1.25rem;
    font-family: var(--mono); font-size: 0.58rem; font-weight: 600;
    text-transform: uppercase; letter-spacing: 0.13em;
    color: var(--t3); background: rgba(0,0,0,0.2); text-align: left; white-space: nowrap;
}
.table td {
    padding: 0.8rem 1rem 0.8rem 1.25rem;
    color: var(--t2); border-bottom: 1px solid rgba(255,255,255,0.025);
    vertical-align: middle; transition: background 0.12s;
}
.table tbody tr:hover td { background: rgba(0,255,136,0.022); color: var(--t1); }
.table tbody tr:last-child td { border-bottom: none; }
.t-link { color: #dceadc; text-decoration: none; font-weight: 600; transition: color 0.15s; }
.t-link:hover { color: var(--g); }
.mono-code {
    font-family: var(--mono); font-size: 0.74rem;
    color: var(--t3) !important;
    background: rgba(0,255,136,0.04);
    padding: 0.18rem 0.55rem; border-radius: 6px;
    border: 1px solid rgba(0,255,136,0.08);
}
.v-g  { color: var(--g)  !important; font-weight: 700; }
.v-r  { color: var(--r)  !important; }
.v-dim { color: var(--t3) !important; }
.tr   { text-align: right; }

/* ── Inline action buttons ──────────────────────────────────── */
.btn-tbl {
    display: inline-flex; align-items: center;
    padding: 0.35rem 0.75rem;
    font-family: var(--sans); font-size: 0.73rem; font-weight: 500;
    border-radius: 8px; text-decoration: none;
    background: rgba(255,255,255,0.03);
    color: var(--t2); border: 1px solid var(--border);
    transition: all 0.18s;
}
.btn-tbl:hover { background: rgba(255,255,255,0.07); color: var(--t1); border-color: rgba(255,255,255,0.1); }

/* ── Badges ─────────────────────────────────────────────────── */
.badge {
    display: inline-flex; align-items: center; gap: 4px;
    font-family: var(--mono); font-size: 0.58rem; font-weight: 600;
    padding: 0.18rem 0.55rem; border-radius: 999px;
    text-transform: uppercase; letter-spacing: 0.06em;
}
.bd { display: inline-block; width: 5px; height: 5px; border-radius: 50%; }
.b-g { background: rgba(0,255,136,0.1); color: var(--g); border: 1px solid rgba(0,255,136,0.22); }
.b-g .bd { background: var(--g); box-shadow: 0 0 6px rgba(0,255,136,0.9); }
.b-w { background: rgba(255,187,51,0.1); color: var(--am); border: 1px solid rgba(255,187,51,0.2); }
.b-w .bd { background: var(--am); }

/* ── Empty state ────────────────────────────────────────────── */
.empty-state-card {
    padding: 5rem 2rem; text-align: center;
    border: 1px dashed rgba(0,255,136,0.1);
    border-radius: 20px; background: rgba(0,255,136,0.012);
    position: relative; overflow: hidden; z-index: 1;
}
.empty-state-card::before {
    content: ''; position: absolute; top: 50%; left: 50%;
    transform: translate(-50%,-50%);
    width: 320px; height: 320px;
    background: radial-gradient(circle, rgba(0,255,136,0.05) 0%, transparent 70%);
    pointer-events: none;
}
.empty-icon-wrap {
    width: 60px; height: 60px; margin: 0 auto 1.5rem;
    display: flex; align-items: center; justify-content: center;
    background: rgba(0,255,136,0.07);
    border: 1px solid rgba(0,255,136,0.14);
    border-radius: 16px; box-shadow: 0 0 28px rgba(0,255,136,0.08);
}
.empty-icon-wrap svg { stroke: rgba(0,255,136,0.55); }
.empty-title { font-size: 1.1rem; font-weight: 700; color: var(--t1); margin-bottom: 0.5rem; letter-spacing: -0.02em; }
.empty-desc  { font-size: 0.875rem; color: var(--t3); margin-bottom: 2rem; max-width: 300px; margin-inline: auto; line-height: 1.6; }

/* ── Animations ─────────────────────────────────────────────── */
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(16px); }
    to   { opacity: 1; transform: translateY(0); }
}
.au { animation: fadeUp 0.42s cubic-bezier(0.22,1,0.36,1) both; }
.d1{animation-delay:.04s} .d2{animation-delay:.08s} .d3{animation-delay:.12s}
.d4{animation-delay:.17s} .d5{animation-delay:.22s} .d6{animation-delay:.27s}
.d7{animation-delay:.32s} .d8{animation-delay:.36s}
</style>

<div class="proj-show">


<a href="<?php echo e(route('dashboard')); ?>" class="back-crumb au">
    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <polyline points="15 18 9 12 15 6"/>
    </svg>
    Dashboard
</a>


<div class="dash-header au d1">
    <div class="dash-title-wrap">
        <div class="dash-eyebrow">
            <span class="proj-color-dot" style="background:<?php echo e($project->color); ?>;box-shadow:0 0 8px <?php echo e($project->color); ?>55;"></span>
             project
        </div>
        <h1 class="dash-title"><?php echo e($project->name); ?></h1>
        <?php if($project->description): ?>
            <p class="proj-desc-sub"><?php echo e($project->description); ?></p>
        <?php endif; ?>
    </div>
    <div class="header-actions">
        <a href="<?php echo e(route('dashboard.forms.create', ['project_id' => $project->id])); ?>" class="btn-new">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8">
                <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Add Form
        </a>
        <a href="<?php echo e(route('dashboard.projects.edit', $project->id)); ?>" class="btn-ghost">Settings</a>
    </div>
</div>


<div class="stats-grid">
    <div class="stat-card au d2">
        <div class="stat-label">Forms</div>
        <div class="stat-value"><?php echo e($stats['total_forms']); ?></div>
        <div class="sc-shimmer"></div>
    </div>
    <div class="stat-card au d3">
        <div class="stat-label">Total Submissions</div>
        <div class="stat-value"><?php echo e(number_format($stats['total_submissions'])); ?></div>
        <div class="sc-shimmer"></div>
    </div>
    <div class="stat-card g au d4">
        <div class="stat-label">Valid</div>
        <div class="stat-value"><?php echo e(number_format($stats['total_valid'])); ?></div>
        <div class="sc-glow"></div><div class="sc-shimmer"></div>
    </div>
    <div class="stat-card r au d5">
        <div class="stat-label">Spam Blocked</div>
        <div class="stat-value"><?php echo e(number_format($stats['total_spam'])); ?></div>
        <div class="sc-glow"></div><div class="sc-shimmer"></div>
    </div>
    <div class="stat-card am au d6">
        <div class="stat-label">Unread</div>
        <div class="stat-value"><?php echo e($stats['total_unread']); ?></div>
        <div class="sc-glow"></div><div class="sc-shimmer"></div>
    </div>
</div>


<?php if($forms->count() > 0): ?>

    
    <div class="search-row au d7">
        <div class="search-pill">
            <span class="search-pill-icon">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
            </span>
            <input type="text" id="formSearch"
                   placeholder="Search forms…"
                   autocomplete="off" aria-label="Search forms">
            <button class="search-clear" id="searchClear" aria-label="Clear">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
        </div>
        <span class="search-count" id="searchResultCount" aria-live="polite"></span>
    </div>

    
    <div class="no-results-state" id="noResultsState" role="status">
        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
        </svg>
        No forms match "<strong id="noResultsTerm"></strong>"
    </div>

    <div class="s-div au d8">
        <span class="s-div-label">Forms</span>
        <span class="s-div-line"></span>
        <span class="s-div-label" style="border: 1px solid var(--border); border-radius: 14px; opacity:1; color: var(--t1); font-size: 1rem!important; padding: 0.3rem 0.6rem;">
            <?php echo e($forms->count()); ?>

        </span>
    </div>

    <div class="forms-card au" style="animation-delay:.38s;">
        <div class="color-strip" style="background:<?php echo e($project->color); ?>;"></div>
        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th>Form Name</th>
                        <th>Endpoint</th>
                        <th>Total</th>
                        <th>Valid</th>
                        <th>Spam</th>
                        <th>Status</th>
                        <th class="tr">Action</th>
                    </tr>
                </thead>
                <tbody id="formsBody">
                    <?php $__currentLoopData = $forms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr data-search="<?php echo e(strtolower($form->name . ' ' . $form->slug . ' ' . $form->status)); ?>">
                        <td>
                            <a href="<?php echo e(route('dashboard.forms.show', $form->id)); ?>"
                               class="t-link" data-label="<?php echo e($form->name); ?>">
                                <?php echo e($form->name); ?>

                            </a>
                            <?php if($form->unread_count > 0): ?>
                                <span class="badge b-g" style="margin-left:.5rem;">
                                    <span class="bd"></span><?php echo e($form->unread_count); ?> new
                                </span>
                            <?php endif; ?>
                        </td>
                        <td><code class="mono-code">/f/<?php echo e($form->slug); ?></code></td>
                        <td class="v-dim"><?php echo e(number_format($form->submission_count)); ?></td>
                        <td class="v-g"><?php echo e(number_format($form->valid_count)); ?></td>
                        <td class="v-r"><?php echo e(number_format($form->spam_count)); ?></td>
                        <td>
                            <?php if(!$form->email_verified): ?>
                                <span class="badge b-w"><span class="bd"></span>Pending</span>
                            <?php elseif($form->status === 'active'): ?>
                                <span class="badge b-g"><span class="bd"></span>Active</span>
                            <?php else: ?>
                                <span class="badge b-w"><span class="bd"></span>Paused</span>
                            <?php endif; ?>
                        </td>
                        <td class="tr">
                            <a href="<?php echo e(route('dashboard.forms.show', $form->id)); ?>" class="btn-tbl">View</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

<?php else: ?>
    <div class="empty-state-card au d7">
        <div class="empty-icon-wrap">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
        </div>
        <div class="empty-title">No forms in this project</div>
        <p class="empty-desc">Add your first form to start collecting submissions.</p>
        <a href="<?php echo e(route('dashboard.forms.create', ['project_id' => $project->id])); ?>" class="btn-new">
            Add First Form
        </a>
    </div>
<?php endif; ?>

</div>

<?php if($forms->count() > 0): ?>
<script>
(function () {
    const input         = document.getElementById('formSearch');
    const clearBtn      = document.getElementById('searchClear');
    const countEl       = document.getElementById('searchResultCount');
    const noResults     = document.getElementById('noResultsState');
    const noResultsTerm = document.getElementById('noResultsTerm');
    const rows          = Array.from(document.querySelectorAll('#formsBody tr[data-search]'));

    function escRe(s) { return s.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'); }

    function hl(container, re) {
        if (!container) return;
        container.querySelectorAll('[data-label]').forEach(function (n) {
            const orig = n.getAttribute('data-label');
            n.innerHTML = re ? orig.replace(re, '<mark class="search-hl">$&</mark>') : orig;
        });
    }

    function doSearch() {
        const raw  = input.value.trim();
        const term = raw.toLowerCase();
        const re   = term ? new RegExp(escRe(term), 'gi') : null;

        clearBtn.style.display = term ? 'block' : 'none';

        let visible = 0;
        rows.forEach(function (row) {
            const match = !term || row.getAttribute('data-search').includes(term);
            row.classList.toggle('form-row-hidden', !match);
            if (match) { visible++; hl(row, re); }
            else hl(row, null);
        });

        if (term) {
            countEl.textContent       = visible > 0 ? visible + ' form' + (visible !== 1 ? 's' : '') + ' found' : '';
            noResults.style.display   = visible === 0 ? 'block' : 'none';
            noResultsTerm.textContent = raw;
        } else {
            countEl.textContent     = '';
            noResults.style.display = 'none';
        }
    }

    input.addEventListener('input', doSearch);
    clearBtn.addEventListener('click', function () { input.value = ''; doSearch(); input.focus(); });
})();
</script>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Git-folders\000form.com\resources\views/dashboard/projects/show.blade.php ENDPATH**/ ?>