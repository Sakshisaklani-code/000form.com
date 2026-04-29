

<?php $__env->startSection('title', $form->name); ?>

<?php $__env->startSection('content'); ?>
<style>
/* ── Theme vars (match dashboard) ─────────────────────────── */
:root {
    --g: #00ff88;
    --g2: #00cc6a;
    --r: #ff4d4d;
    --am: #ffbb33;
    --ind: #6366f1;
    --card: rgba(8,13,8,0.88);
    --border: rgba(255,255,255,0.05);
    --border-g: rgba(0,255,136,0.15);
    --t1: #f0f0f0;
    --t2: #8a9a8a;
    --t3: #b4b4b4;
    --mono: 'JetBrains Mono', monospace;
    --sans: 'Outfit', sans-serif;
}

.form-show { font-family: var(--sans); position: relative; }

/* ambient glows */
.form-show::before {
    content: '';
    position: fixed; top: -20vh; left: -10vw;
    width: 55vw; height: 55vh;
    background: radial-gradient(ellipse, rgba(0,255,136,0.04) 0%, transparent 70%);
    pointer-events: none; z-index: 0;
}
.form-show::after {
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
    margin-bottom: 1.5rem;
    position: relative; z-index: 1;
}
.dash-eyebrow {
    font-family: var(--mono); font-size: 0.9rem; font-weight: 500;
    text-transform: uppercase; letter-spacing: 0.16em;
    color: var(--t3); margin-bottom: 0.95rem;
}
.dash-title {
    font-size: 1.9rem; font-weight: 800;
    color: var(--t1); letter-spacing: -0.04em; line-height: 1;
}
.dash-title em { font-style: normal; color: var(--g); text-shadow: 0 0 28px rgba(0,255,136,0.45); }
.header-actions { display: flex; align-items: center; gap: 0.5rem; flex-shrink: 0; flex-wrap: wrap; }

/* ── Buttons ────────────────────────────────────────────────── */
.btn-new {
    display: inline-flex; align-items: center; gap: 0.5rem;
    padding: 0.55rem 1.2rem;
    font-family: var(--sans); font-size: 0.82rem; font-weight: 700;
    border-radius: 999px; border: none; cursor: pointer; text-decoration: none;
    background: linear-gradient(135deg, #00ff88, #00cc6a); color: #000;
    box-shadow: 0 0 0 1px rgba(0,255,136,0.35), 0 4px 22px rgba(0,255,136,0.28);
    transition: all 0.2s ease; position: relative; overflow: hidden;
}
.btn-new::after { content:''; position:absolute; inset:0; background:linear-gradient(135deg,rgba(255,255,255,0.18),transparent); opacity:0; transition:opacity 0.2s; }
.btn-new:hover { box-shadow: 0 0 0 1px rgba(0,255,136,0.5), 0 6px 32px rgba(0,255,136,0.42); transform:translateY(-2px); }
.btn-new:hover::after { opacity:1; }

.btn-ghost {
    display: inline-flex; align-items: center; gap: 0.35rem;
    padding: 0.55rem 1rem;
    min-height: 12px;
    font-family: var(--sans); font-size: 0.8rem; font-weight: 500;
    border-radius: 999px; text-decoration: none;
    background: rgba(255,255,255,0.03); color: var(--t2);
    border: 1px solid var(--border); transition: all 0.18s;
}
.btn-ghost:hover { background: rgba(255,255,255,0.07); color: var(--t1); border-color: rgba(255,255,255,0.1); }

.btn-sm { padding: 0.38rem 0.8rem; font-size: 0.75rem; border-radius: 8px; }
.btn-secondary {
    display: inline-flex; align-items: center; gap: 0.35rem;
    padding: 0.55rem 1rem; font-family: var(--sans); font-size: 0.8rem; font-weight: 500;
    border-radius: 999px; text-decoration: none; cursor: pointer; border: none;
    background: rgba(255,255,255,0.05); color: var(--t2);
    border: 1px solid var(--border); transition: all 0.18s;
}
.btn-secondary:hover { background: rgba(255,255,255,0.09); color: var(--t1); border-color: rgba(255,255,255,0.12); }
.btn-secondary-verify {
    display: inline-flex; align-items: center;
    padding: 0.35rem 0.8rem; font-family: var(--sans); font-size: 0.75rem; font-weight: 600;
    border-radius: 8px; cursor: pointer; border: none; text-decoration: none;
    background: rgba(255,187,51,0.15); color: var(--am);
    border: 1px solid rgba(255,187,51,0.25); transition: all 0.18s;
}
.btn-secondary-verify:hover { background: rgba(255,187,51,0.25); }

/* ── Alert ──────────────────────────────────────────────────── */
.alert {
    display: flex; align-items: center; gap: 0.75rem;
    padding: 0.9rem 1.1rem; border-radius: 14px;
    margin-bottom: 1.25rem; font-size: 0.8rem; font-weight: 500;
    position: relative; z-index: 1;
}
.alert-warning {
    background: rgba(255,187,51,0.07);
    border: 1px solid rgba(255,187,51,0.2);
    color: var(--am);
}

/* ── Strip cards (endpoint / form ID) ───────────────────────── */
.strip-card {
    position: relative; overflow: hidden;
    border-radius: 14px; padding: 0.875rem 1.25rem;
    background: rgba(8,13,8,0.88);
    border: 1px solid var(--border);
    backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px);
    margin-bottom: 1.1rem;
    position: relative; z-index: 1;
}
.strip-card::before {
    content: ''; position: absolute; top: 0; left: 10%; right: 10%; height: 1px;
    background: linear-gradient(90deg, transparent, rgba(0,255,136,0.07), transparent);
    pointer-events: none;
}
.strip-inner {
    display: flex; justify-content: space-between; align-items: center;
    flex-wrap: wrap; gap: 0.75rem;
}
.strip-left { display: flex; align-items: center; gap: 0.75rem; flex: 1; min-width: 0; }
.strip-method {
    display: inline-flex; align-items: center;
    font-family: var(--mono); font-size: 0.65rem; font-weight: 700;
    letter-spacing: 0.08em; text-transform: uppercase;
    padding: 0.25rem 0.6rem; border-radius: 6px; flex-shrink: 0;
}
.strip-method.post { background: rgba(0,255,136,0.1); color: var(--g); border: 1px solid rgba(0,255,136,0.2); }
.strip-method.id   { background: rgba(99,102,241,0.1); color: var(--ind); border: 1px solid rgba(99,102,241,0.2); }
.strip-url {
    overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
    flex: 1; min-width: 0; font-size: 0.7rem;
    font-family: var(--mono); color: var(--t2);
}
.strip-note { font-size: 0.75rem; color: var(--t3); flex-shrink: 0; }
.strip-note strong { color: var(--t2); font-weight: 500; }
.strip-actions { display: flex; align-items: center; gap: 0.6rem; flex-shrink: 0; flex-wrap: wrap; }

/* ── Badges ─────────────────────────────────────────────────── */
.badge {
    display: inline-flex; align-items: center; gap: 4px;
    font-family: var(--mono); font-size: 0.58rem; font-weight: 600;
    padding: 0.18rem 0.55rem; border-radius: 999px;
    text-transform: uppercase; letter-spacing: 0.06em;
}
.badge-dot { display: inline-block; width: 5px; height: 5px; border-radius: 50%; }
.b-g { background: rgba(0,255,136,0.1); color: var(--g); border: 1px solid rgba(0,255,136,0.22); }
.b-g .badge-dot { background: var(--g); box-shadow: 0 0 6px rgba(0,255,136,0.9); }
.b-w { background: rgba(255,187,51,0.1); color: var(--am); border: 1px solid rgba(255,187,51,0.2); }
.b-w .badge-dot { background: var(--am); }
.b-ind { background: rgba(99,102,241,0.1); color: var(--ind); border: 1px solid rgba(99,102,241,0.2); }
.badge-success { background: rgba(0,255,136,0.1); color: var(--g); border: 1px solid rgba(0,255,136,0.22); }
.badge-success .badge-dot { background: var(--g); box-shadow: 0 0 6px rgba(0,255,136,0.9); }
.badge-warning { background: rgba(255,187,51,0.1); color: var(--am); border: 1px solid rgba(255,187,51,0.2); }
.badge-warning .badge-dot { background: var(--am); }

/* ── Stats grid ─────────────────────────────────────────────── */
.stats-grid {
    display: grid; gap: 0.875rem;
    margin-bottom: 1.75rem;
    position: relative; z-index: 1;
}
.stat-card {
    position: relative; overflow: hidden;
    border-radius: 16px; padding: 1.1rem 1rem 1rem;
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
.stat-card:hover { border-color: rgba(0,255,136,0.15); transform: translateY(-2px); box-shadow: 0 12px 40px rgba(0,0,0,0.5), 0 0 0 1px rgba(0,255,136,0.08); }
.stat-label {
    font-family: var(--mono); font-size: 0.7rem; font-weight: 600;
    text-transform: uppercase; letter-spacing: 0.14em; color: var(--t3); margin-bottom: 0.6rem;
    display: flex; align-items: center; gap: 0.4rem;
}
.stat-value { font-size: clamp(1.3rem, 3vw, 2.2rem); font-weight: 800; color: var(--t1); letter-spacing: -0.04em; line-height: 1; }
.stat-card.g  .stat-value { color: var(--g);  text-shadow: 0 0 24px rgba(0,255,136,0.6); }
.stat-card.r  .stat-value { color: var(--r);  text-shadow: 0 0 20px rgba(255,77,77,0.5); }
.stat-card.ind .stat-value { color: var(--ind); text-shadow: 0 0 20px rgba(99,102,241,0.5); }
.sc-glow { position: absolute; bottom: -18px; right: -18px; width: 72px; height: 72px; border-radius: 50%; opacity: 0.1; filter: blur(18px); }
.stat-card.g   .sc-glow { background: var(--g); }
.stat-card.r   .sc-glow { background: var(--r); }
.stat-card.ind .sc-glow { background: var(--ind); }
.sc-shimmer {
    position: absolute; top: 0; left: 0; width: 45%; height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.028), transparent);
    animation: shimmer 4s ease-in-out infinite; pointer-events: none;
}
@keyframes shimmer { 0%{transform:translateX(-120%)} 100%{transform:translateX(280%)} }

/* ── Main page tabs ─────────────────────────────────────────── */
.page-tabs-bar {
    display: flex; gap: 0;
    border-bottom: 1px solid rgba(255,255,255,0.06);
    margin-bottom: 1.75rem; overflow-x: auto;
    -webkit-overflow-scrolling: touch; scrollbar-width: none;
    position: relative; z-index: 1;
}
.page-tabs-bar::-webkit-scrollbar { display: none; }
.page-tab {
    display: inline-flex; align-items: center; gap: 0.45rem;
    padding: 0.75rem 1.2rem;
    background: none; border: none;
    border-bottom: 2px solid transparent;
    margin-bottom: -1px;
    font-family: var(--sans); font-size: 0.84rem; font-weight: 500;
    color: var(--t3); cursor: pointer; text-decoration: none;
    transition: color 0.2s, border-color 0.2s, background 0.15s;
    border-radius: 10px 10px 0 0; white-space: nowrap; flex-shrink: 0;
}
.page-tab:hover  { color: var(--t1); background: rgba(255,255,255,0.03); }
.page-tab.active { color: var(--g); border-bottom-color: var(--g); font-weight: 600; }
.page-tab svg    { opacity: 0.5; }
.page-tab.active svg { opacity: 1; stroke: var(--g); }
.page-panel       { display: none; }
.page-panel.active { display: block; }

/* ── Tab pills ──────────────────────────────────────────────── */
.tab-pill {
    display: inline-flex; align-items: center; justify-content: center;
    min-width: 1.4rem; height: 1.4rem; padding: 0 0.4rem;
    border-radius: 999px; font-size: 0.62rem; font-weight: 700;
    font-family: var(--mono);
}
.tab-pill.valid   { background: rgba(0,255,136,0.1);   color: var(--g); }
.tab-pill.spam    { background: rgba(255,187,51,0.12);  color: var(--am); }
.tab-pill.archive { background: rgba(99,102,241,0.12);  color: var(--ind); }

/* ── Submissions section ────────────────────────────────────── */
.submissions-section {
    background: rgba(8,13,8,0.88);
    border: 1px solid var(--border);
    border-radius: 18px; overflow: hidden;
    backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px);
    position: relative; z-index: 1;
}
.submissions-section::before {
    content: ''; position: absolute; top: 0; left: 8%; right: 8%; height: 1px;
    background: linear-gradient(90deg, transparent, rgba(0,255,136,0.08), transparent);
    pointer-events: none;
}
.submissions-section-header { padding: 0.75rem 1.25rem 0; }

/* ── Submission sub-tabs ────────────────────────────────────── */
.submission-tabs-bar {
    display: flex; align-items: center; justify-content: space-between;
    gap: 1rem; flex-wrap: wrap;
    border-bottom: 1px solid rgba(255,255,255,0.05);
}
.submission-tabs { display: flex; overflow-x: auto; -webkit-overflow-scrolling: touch; scrollbar-width: none; }
.submission-tabs::-webkit-scrollbar { display: none; }
.submission-tab {
    display: inline-flex; align-items: center; gap: 0.45rem;
    padding: 0.65rem 1.1rem;
    background: none; border: none;
    border-bottom: 2px solid transparent; margin-bottom: -1px;
    font-family: var(--sans); font-size: 0.84rem; font-weight: 500;
    color: var(--t3); text-decoration: none;
    transition: color 0.2s, border-color 0.2s, background 0.15s;
    border-radius: 8px 8px 0 0; white-space: nowrap; flex-shrink: 0;
}
.submission-tab:hover  { color: var(--t1); background: rgba(255,255,255,0.03); }
.submission-tab.active { color: var(--g); border-bottom-color: var(--g); font-weight: 600; }

/* ── Search ──────────────────────────────────────────────────── */
.search-wrapper { position: relative; padding-bottom: 0.5rem; }
.search-wrapper svg.search-icon {
    position: absolute; left: 0.75rem; top: 50%;
    transform: translateY(-60%); color: var(--t3); pointer-events: none;
}
.search-input {
    width: 240px; padding: 0.5rem 2rem 0.5rem 2.2rem;
    background: rgba(255,255,255,0.03);
    border: 1px solid var(--border);
    border-radius: 999px; color: var(--t1);
    font-family: var(--sans); font-size: 0.84rem;
    outline: none; transition: border-color 0.2s, width 0.3s, box-shadow 0.2s;
    box-sizing: border-box;
}
.search-input:focus {
    border-color: var(--border-g);
    box-shadow: 0 0 0 3px rgba(0,255,136,0.07);
    width: 280px;
}
.search-input::placeholder { color: var(--t3); }
.search-clear {
    position: absolute; right: 0.5rem; top: 50%;
    transform: translateY(-60%);
    background: none; border: none; color: var(--t3);
    cursor: pointer; font-size: 0.95rem; line-height: 1;
    display: flex; align-items: center;
    padding: 0.15rem 0.25rem; border-radius: 3px; transition: color 0.15s;
}
.search-clear:hover { color: var(--t1); }
.results-info { font-size: 0.78rem; color: var(--t3); padding: 0.5rem 0 0.1rem; }
.results-info strong { color: var(--t1); }

/* ── Archive toggle banner ──────────────────────────────────── */
.archive-toggle-banner {
    display: flex; align-items: center; justify-content: space-between;
    flex-wrap: wrap; gap: 0.75rem;
    padding: 0.85rem 1.25rem;
    background: rgba(99,102,241,0.05);
    border-bottom: 1px solid rgba(99,102,241,0.1);
}
.archive-toggle-info { display: flex; align-items: center; gap: 0.65rem; }
.archive-toggle-info svg { color: var(--ind); flex-shrink: 0; }
.archive-toggle-info p { margin: 0; font-size: 0.82rem; color: var(--t3); }
.archive-toggle-info strong { color: var(--t1); font-size: 0.875rem; }

/* Toggle switch */
.toggle-switch {
    position: relative; display: inline-flex; align-items: center;
    gap: 0.6rem; cursor: pointer; user-select: none;
}
.toggle-switch input { position: absolute; opacity: 0; width: 0; height: 0; }
.toggle-track {
    width: 40px; height: 22px;
    background: rgba(255,255,255,0.08);
    border-radius: 999px; transition: background 0.2s;
    position: relative; flex-shrink: 0;
    border: 1px solid var(--border);
}
.toggle-switch input:checked + .toggle-track { background: var(--ind); border-color: var(--ind); }
.toggle-track::after {
    content: ''; position: absolute; top: 2px; left: 2px;
    width: 16px; height: 16px; background: white;
    border-radius: 50%; transition: transform 0.2s; box-shadow: 0 1px 3px rgba(0,0,0,0.3);
}
.toggle-switch input:checked + .toggle-track::after { transform: translateX(18px); }
.toggle-label { font-size: 0.82rem; font-weight: 500; color: var(--t2); }

/* ── Table ──────────────────────────────────────────────────── */
.table-wrapper { overflow-x: auto; -webkit-overflow-scrolling: touch; }
.table { width: 100%; border-collapse: collapse; font-size: 0.84rem; }
.table thead tr { border-bottom: 1px solid rgba(255,255,255,0.04); }
.table th {
    padding: 0.65rem 1rem 0.65rem 1.25rem;
    font-family: var(--mono); font-size: 0.58rem; font-weight: 600;
    text-transform: uppercase; letter-spacing: 0.13em;
    color: var(--t3); background: rgba(0,0,0,0.18);
    text-align: left; white-space: nowrap;
}
.table td {
    padding: 0.8rem 1rem 0.8rem 1.25rem;
    color: var(--t2); border-bottom: 1px solid rgba(255,255,255,0.025);
    vertical-align: middle; transition: background 0.12s;
}
.table tbody tr:hover td { background: rgba(0,255,136,0.02); color: var(--t1); }
.table tbody tr:last-child td { border-bottom: none; }
.table-link { color: #dceadc; text-decoration: none; font-weight: 600; transition: color 0.15s; }
.table-link:hover { color: var(--g); }
.text-right { text-align: right; }
.text-muted { color: var(--t3) !important; }
.btn-tbl {
    display: inline-flex; align-items: center; padding: 0.32rem 0.72rem;
    font-family: var(--sans); font-size: 0.73rem; font-weight: 500;
    border-radius: 7px; text-decoration: none;
    background: rgba(255,255,255,0.03); color: var(--t2);
    border: 1px solid var(--border); transition: all 0.18s;
}
.btn-tbl:hover { background: rgba(255,255,255,0.07); color: var(--t1); border-color: rgba(255,255,255,0.1); }
.spam-row td    { opacity: 0.6; }
.spam-row:hover td { opacity: 1; transition: opacity 0.15s; }
.archive-row td { opacity: 0.7; }
.archive-row:hover td { opacity: 1; transition: opacity 0.15s; }

/* ── Inline status labels ────────────────────────────────────── */
.inline-spam    { background:rgba(255,187,51,0.12); color:var(--am); font-size:0.62rem; padding:0.15rem 0.45rem; border-radius:999px; }
.inline-archive { background:rgba(99,102,241,0.12); color:var(--ind); font-size:0.62rem; padding:0.15rem 0.45rem; border-radius:999px; }
.inline-muted   { font-size:0.72rem; color:var(--t3); margin-left:0.35rem; }

/* ── Pagination ─────────────────────────────────────────────── */
.pagination-footer {
    padding: 0.875rem 1.5rem;
    display: flex; justify-content: space-between; align-items: center;
    border-top: 1px solid rgba(255,255,255,0.04);
    flex-wrap: wrap; gap: 1rem;
}
.pagination-info { display: flex; align-items: center; gap: 0.5rem; color: var(--t3); font-size: 0.82rem; }
.pagination-info svg    { opacity: 0.5; }
.pagination-info strong { color: var(--t1); font-weight: 600; }
.pagination-controls { display: flex; align-items: center; gap: 0.4rem; }
.pagination-pages    { display: flex; align-items: center; gap: 0.25rem; }
.pagination-link {
    display: inline-flex; align-items: center; gap: 0.4rem;
    padding: 0.42rem 0.7rem; border-radius: 8px;
    font-family: var(--mono); font-size: 0.78rem; font-weight: 500;
    color: var(--t3); background: transparent;
    border: 1px solid transparent; text-decoration: none;
    transition: all 0.15s ease; cursor: pointer;
}
.pagination-link svg { stroke: currentColor; }
.pagination-link:not(.disabled):not(.active):hover { background: rgba(255,255,255,0.05); color: var(--t1); border-color: var(--border); }
.pagination-link.active { background: rgba(0,255,136,0.1); color: var(--g); border-color: rgba(0,255,136,0.2); }
.pagination-link.disabled { opacity: 0.3; cursor: not-allowed; pointer-events: none; }

/* ── Empty state ────────────────────────────────────────────── */
.empty-state {
    padding: 3.5rem 1.5rem; text-align: center;
    display: flex; flex-direction: column; align-items: center; gap: 0.5rem;
}
.empty-icon { width: 44px; height: 44px; stroke: var(--t3); opacity: 0.3; margin-bottom: 0.5rem; }
.empty-title { font-size: 1rem; font-weight: 700; color: var(--t1); margin: 0; }
.empty-description { font-size: 0.875rem; color: var(--t3); margin: 0; max-width: 300px; line-height: 1.6; }
.empty-description a { color: var(--ind); text-decoration: none; }
.empty-description strong { color: var(--t1); }

/* ── Statistics panel ───────────────────────────────────────── */
.charts-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 1.25rem; align-items: start; }
.chart-card {
    position: relative; overflow: hidden;
    border-radius: 18px; padding: 1.25rem;
    background: rgba(8,13,8,0.88);
    border: 1px solid var(--border);
    backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px);
}
.chart-card::before {
    content: ''; position: absolute; top: 0; left: 10%; right: 10%; height: 1px;
    background: linear-gradient(90deg, transparent, rgba(0,255,136,0.07), transparent);
    pointer-events: none;
}
.chart-title { margin: 0 0 0.2rem; font-size: 0.875rem; font-weight: 700; color: var(--t1); }
.chart-sub   { margin: 0 0 1rem; font-size: 0.75rem; color: var(--t3); }
.stats-mini-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 0.875rem; margin-bottom: 1.25rem; }

/* ── Code panel ─────────────────────────────────────────────── */
.code-panel-card {
    position: relative; overflow: hidden;
    border-radius: 18px;
    background: rgba(8,13,8,0.88);
    border: 1px solid var(--border);
    backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px);
}
.code-panel-card::before {
    content: ''; position: absolute; top: 0; left: 8%; right: 8%; height: 1px;
    background: linear-gradient(90deg, transparent, rgba(0,255,136,0.08), transparent);
    pointer-events: none;
}
.code-panel-header { padding: 1.25rem 1.5rem 1rem; border-bottom: 1px solid rgba(255,255,255,0.04); }
.code-panel-title { margin: 0 0 0.25rem; font-size: 0.95rem; font-weight: 700; color: var(--t1); }
.code-panel-sub { margin: 0; font-size: 0.8rem; color: var(--t3); }
.code-panel-body { padding: 1.25rem 1.5rem; }

/* captcha info box */
.captcha-info-box {
    display: flex; align-items: flex-start; gap: 0.75rem;
    padding: 0.875rem 1rem;
    background: rgba(99,102,241,0.06);
    border: 1px solid rgba(99,102,241,0.15);
    border-radius: 10px; margin-bottom: 1.25rem;
}
.captcha-info-box svg { color: var(--ind); flex-shrink: 0; margin-top: 1px; }
.captcha-info-box p { margin: 0; font-size: 0.82rem; color: var(--t3); line-height: 1.5; word-break: break-word; }
.captcha-info-box strong { color: var(--t1); }
.captcha-info-box code { background: rgba(0,0,0,0.3); padding: 0.1rem 0.4rem; border-radius: 4px; font-family: var(--mono); font-size: 0.8rem; color: var(--ind); }

/* code tabs */
.code-tabs {
    display: flex; gap: 0.35rem; flex-wrap: nowrap; overflow-x: auto;
    -webkit-overflow-scrolling: touch; scrollbar-width: none;
    margin-bottom: 1rem; padding-bottom: 0.75rem;
    border-bottom: 1px solid rgba(255,255,255,0.05);
}
.code-tabs::-webkit-scrollbar { display: none; }
.code-tab {
    min-height: 14px!important;
    padding: 0.4rem 0.9rem;
    background: rgba(255,255,255,0.03); border: 1px solid var(--border);
    border-radius: 8px; font-family: var(--sans); font-size: 0.78rem; font-weight: 500;
    color: var(--t3); cursor: pointer; transition: all 0.2s;
    white-space: nowrap; flex-shrink: 0;
    font-size: 0.7rem;
}
.code-tab:hover  { background: rgba(255,255,255,0.07); color: var(--t1); }
.code-tab.active { background: rgba(0,255,136,0.1); color: var(--g); border-color: rgba(0,255,136,0.25); }
.code-block        { display: none; }
.code-block.active { display: block; }
.code-header {
    display: flex; justify-content: space-between; align-items: center;
    padding: 0.55rem 1rem;
    background: rgba(0,0,0,0.5);
    border-radius: 10px 10px 0 0;
    border: 1px solid rgba(255,255,255,0.04); border-bottom: none;
}
.code-lang { color: var(--t3); font-family: var(--mono); font-size: 0.65rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em; }
.code-copy {
    background: rgba(255,255,255,0.06); color: var(--t2);
    min-height: 12px!important;
    border: 2px solid var(--border); padding: 0.25rem 0.7rem;
    border-radius: 6px; font-family: var(--sans); font-size: 0.72rem; font-weight: 500;
    cursor: pointer; transition: all 0.18s;
}
.code-copy:hover { background: rgba(255,255,255,0.1); color: var(--t1); }
.code-content {
    background: rgba(0,0,0,0.55); padding: 1.25rem;
    border-radius: 0 0 10px 10px; overflow-x: auto; -webkit-overflow-scrolling: touch;
    border: 1px solid rgba(255,255,255,0.04); border-top: none;
}
.code-content pre {
    margin: 0; color: #e2e8f0;
    font-family: 'Fira Code', var(--mono);
    font-size: 0.875rem; line-height: 1.6;
    white-space: pre; min-width: max-content;
}
.tag     { color: #ff79c6; }
.attr    { color: #8be9fd; }
.string  { color: #f1fa8c; }
.comment { color: #6272a4; font-style: italic; }
.keyword { color: #ff79c6; }

/* ── Workflow panel ─────────────────────────────────────────── */
.workflow-section {
    background: rgba(8,13,8,0.88);
    border: 1px solid var(--border);
    border-radius: 18px; overflow: hidden;
    backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px);
    margin-bottom: 1.25rem; position: relative;
}
.workflow-section::before {
    content: ''; position: absolute; top: 0; left: 8%; right: 8%; height: 1px;
    background: linear-gradient(90deg, transparent, rgba(0,255,136,0.08), transparent);
    pointer-events: none;
}
.workflow-section-header {
    display: flex; justify-content: space-between; align-items: flex-start;
    padding: 1.1rem 1.25rem;
    border-bottom: 1px solid rgba(255,255,255,0.04);
    background: rgba(0,0,0,0.15);
}
.workflow-section-title {
    display: flex; align-items: center; gap: 0.5rem;
    font-size: 0.9rem; font-weight: 700; color: var(--t1); margin: 0 0 0.2rem;
}
.workflow-section-title svg { stroke: var(--g); opacity: 0.7; }
.workflow-section-desc { font-size: 0.78rem; color: var(--t3); margin: 0; }
.validation-grid {
    display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 0.875rem; padding: 1.1rem 1.25rem;
}
.validation-card {
    border: 1px solid var(--border);
    border-left: 3px solid rgba(0,255,136,0.3);
    border-radius: 12px; padding: 0.875rem;
    display: flex; justify-content: space-between; align-items: flex-start;
    background: rgba(0,255,136,0.015);
    transition: border-color 0.2s, box-shadow 0.2s;
}
.validation-card:hover { border-color: rgba(0,255,136,0.2); box-shadow: 0 4px 16px rgba(0,0,0,0.3); }
.validation-card-icon {
    width: 32px; height: 32px; border-radius: 8px;
    background: rgba(0,255,136,0.06); border: 1px solid rgba(0,255,136,0.1);
    display: flex; align-items: center; justify-content: center; flex-shrink: 0;
}
.validation-card-icon svg { stroke: rgba(0,255,136,0.5); }
.validation-card-info { flex: 1; margin-left: 0.75rem; }
.validation-card-name { font-size: 0.875rem; font-weight: 600; color: var(--t1); margin: 0 0 0.2rem; }
.validation-card-meta { font-size: 0.72rem; color: var(--t3); margin: 0; }
.validation-card-badge {
    display: inline-flex; align-items: center;
    padding: 0.15rem 0.5rem; border-radius: 999px;
    font-family: var(--mono); font-size: 0.6rem; font-weight: 600;
    text-transform: uppercase; letter-spacing: 0.05em; margin-top: 0.35rem;
}
.validation-card-badge.required { background: rgba(255,77,77,0.12); color: var(--r); border: 1px solid rgba(255,77,77,0.2); }
.validation-card-badge.optional { background: rgba(255,255,255,0.05); color: var(--t3); border: 1px solid var(--border); }
.validation-card-actions { display: flex; gap: 0.25rem; flex-shrink: 0; }
.validation-card-btn {
    background: none; border: none; cursor: pointer;
    padding: 0.3rem; border-radius: 6px; color: var(--t3);
    transition: all 0.15s; display: flex; align-items: center;
}
.validation-card-btn:hover { background: rgba(255,255,255,0.07); color: var(--t1); }
.validation-card-btn.delete:hover { background: rgba(255,77,77,0.1); color: var(--r); }

/* info banner */
.info-banner {
    display: flex; align-items: flex-start; gap: 0.75rem;
    padding: 0.9rem 1.1rem;
    background: rgba(99,102,241,0.05);
    border: 1px solid rgba(99,102,241,0.12);
    border-radius: 12px; margin-bottom: 1.25rem;
    position: relative; z-index: 1;
}
.info-banner svg { color: var(--ind); flex-shrink: 0; margin-top: 1px; }
.info-banner p   { margin: 0; font-size: 0.82rem; color: var(--t3); line-height: 1.5; }
.info-banner strong { color: var(--t1); }

.warn-banner {
    padding: 0.75rem 1.25rem;
    background: rgba(255,187,51,0.05);
    border-bottom: 1px solid rgba(255,187,51,0.1);
    display: flex; align-items: center; gap: 0.6rem; flex-wrap: wrap;
}
.warn-banner p { margin: 0; font-size: 0.82rem; color: var(--t3); }
.warn-banner strong { color: var(--am); }

/* ── Modal ──────────────────────────────────────────────────── */
.modal-overlay {
    display: none; position: fixed; inset: 0;
    background: rgba(0,0,0,0.75); backdrop-filter: blur(6px);
    z-index: 1000; align-items: center; justify-content: center; padding: 1rem;
}
.modal-overlay.open { display: flex; }
.modal-box {
    background: rgba(10,16,10,0.98);
    border: 1px solid rgba(0,255,136,0.12);
    border-radius: 18px; padding: 1.75rem;
    width: 100%; max-width: 480px;
    box-shadow: 0 24px 64px rgba(0,0,0,0.7), 0 0 0 1px rgba(0,255,136,0.06);
    position: relative; max-height: 90vh; overflow-y: auto;
}
.modal-box::before {
    content: ''; position: absolute; top: 0; left: 15%; right: 15%; height: 1px;
    background: linear-gradient(90deg, transparent, rgba(0,255,136,0.2), transparent);
}
.modal-title { font-size: 1rem; font-weight: 700; color: var(--t1); margin: 0 0 1.25rem; letter-spacing: -0.02em; }
.modal-close {
    position: absolute; top: 1rem; right: 1rem;
    background: rgba(255,255,255,0.05); border: 1px solid var(--border);
    border-radius: 8px; cursor: pointer; color: var(--t3); padding: 0.25rem;
    display: flex; transition: all 0.15s;
}
.modal-close:hover { background: rgba(255,255,255,0.1); color: var(--t1); }
.form-group { margin-bottom: 1rem; }
.form-label {
    display: block; font-family: var(--mono); font-size: 0.65rem; font-weight: 600;
    text-transform: uppercase; letter-spacing: 0.1em; color: var(--t3); margin-bottom: 0.4rem;
}
.form-label span { font-size: 0.68rem; color: var(--t3); font-weight: 400; text-transform: none; letter-spacing: 0; }
.form-control {
    width: 100%; padding: 0.6rem 0.85rem;
    background: rgba(255,255,255,0.03);
    border: 1px solid var(--border); border-radius: 8px;
    color: var(--t1); font-family: var(--sans); font-size: 0.875rem;
    outline: none; transition: border-color 0.2s, box-shadow 0.2s; box-sizing: border-box;
}
.form-control:focus { border-color: var(--border-g); box-shadow: 0 0 0 3px rgba(0,255,136,0.07); }
.form-control option { background: #0a100a; }
.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; }
.modal-footer { display: flex; justify-content: flex-end; gap: 0.75rem; margin-top: 1.25rem; }
.btn-danger {
    display: inline-flex; align-items: center; gap: 0.35rem;
    padding: 0.45rem 1rem; font-family: var(--sans); font-size: 0.82rem; font-weight: 600;
    border-radius: 8px; border: none; cursor: pointer;
    background: rgba(255,77,77,0.15); color: var(--r);
    border: 1px solid rgba(255,77,77,0.2); transition: all 0.18s;
}
.btn-danger:hover { background: rgba(255,77,77,0.25); box-shadow: 0 0 12px rgba(255,77,77,0.2); }
.delete-icon-wrap {
    width: 48px; height: 48px; border-radius: 50%;
    background: rgba(255,77,77,0.1); border: 1px solid rgba(255,77,77,0.15);
    display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;
}

/* ── Animations ─────────────────────────────────────────────── */
@keyframes fadeUp { from{opacity:0;transform:translateY(14px)} to{opacity:1;transform:translateY(0)} }
.au { animation: fadeUp 0.42s cubic-bezier(0.22,1,0.36,1) both; }
.d1{animation-delay:.04s} .d2{animation-delay:.08s} .d3{animation-delay:.12s}
.d4{animation-delay:.17s} .d5{animation-delay:.22s} .d6{animation-delay:.27s}
.d7{animation-delay:.32s} .d8{animation-delay:.36s}

/* ── Responsive ─────────────────────────────────────────────── */
@media (max-width: 768px) {
    .stats-grid { grid-template-columns: repeat(2,1fr) !important; }
    .charts-grid { grid-template-columns: 1fr !important; }
    .stats-mini-grid { grid-template-columns: repeat(2,1fr) !important; }
    .submission-tabs-bar { flex-direction: column; align-items: stretch; gap: 0.5rem; }
    .search-wrapper { width: 100%; padding-bottom: 0.5rem; }
    .search-input { width: 100% !important; }
    .search-input:focus { width: 100% !important; }
    .dash-header { flex-direction: column; align-items: flex-start; }
    .strip-inner { flex-direction: column; align-items: flex-start; }
    .strip-actions { width: 100%; justify-content: flex-end; }
    .code-content pre { font-size: 0.75rem; }
    .validation-grid { grid-template-columns: 1fr; }
    .form-row { grid-template-columns: 1fr; }
    .pagination-footer { flex-direction: column; align-items: stretch; }
    .pagination-info { justify-content: center; }
    .pagination-controls { justify-content: center; }
    .workflow-section-header { flex-direction: column; gap: 0.75rem; }
    .archive-toggle-banner { flex-direction: column; align-items: flex-start; }
}
@media (max-width: 640px) {
    .pagination-link { padding: 0.5rem; }
    .pagination-link span { display: none; }
    .stat-card { padding: 0.75rem; }
    .stat-value { font-size: 1.35rem; }
}
</style>

<div class="form-show">


<a href="<?php echo e(route('dashboard')); ?>" class="back-crumb au">
    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <polyline points="15 18 9 12 15 6"/>
    </svg>
    Dashboard
</a>


<div class="dash-header au d1">
    <div>
        <div class="dash-eyebrow">// form</div>
        <h1 class="dash-title"><?php echo e($form->name); ?></h1>
    </div>
    <div class="header-actions">
        <a href="<?php echo e(route('dashboard.forms.export', $form->id)); ?>" class="btn-ghost">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                <polyline points="7 10 12 15 17 10"/>
                <line x1="12" y1="15" x2="12" y2="3"/>
            </svg>
            Export CSV
        </a>
        <a href="<?php echo e(route('dashboard.forms.edit', $form->id)); ?>" class="btn-ghost">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
            </svg>
            Settings
        </a>
    </div>
</div>


<?php if(!$form->email_verified): ?>
<div class="alert alert-warning au d2">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="12" cy="12" r="10"/>
        <line x1="12" y1="8" x2="12" y2="12"/>
        <line x1="12" y1="16" x2="12.01" y2="16"/>
    </svg>
    <div style="flex:1;">
        <strong>Email verification required.</strong>
        Please check <?php echo e($form->recipient_email); ?> and click the verification link.
    </div>
    <form method="POST" action="<?php echo e(route('dashboard.forms.resend-verification', $form->id)); ?>" style="margin:0;">
        <?php echo csrf_field(); ?>
        <button type="submit" class="btn-secondary-verify">Resend Email</button>
    </form>
</div>
<?php endif; ?>


<div class="strip-card au d2">
    <div class="strip-inner endpoint-strip-inner">
        <div class="strip-left">
            <span class="strip-method post">POST</span>
            <span class="strip-url"><?php echo e($form->endpoint_url); ?></span>
        </div>
        <div class="strip-actions endpoint-strip-actions">
            <span class="badge <?php echo e($form->status === 'active' && $form->email_verified ? 'badge-success' : 'badge-warning'); ?>">
                <span class="badge-dot"></span>
                <?php echo e($form->email_verified ? ucfirst($form->status) : 'Pending Verification'); ?>

            </span>
            <button class="btn-ghost btn-sm" onclick="copyEndpoint('<?php echo e($form->slug); ?>')">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"/>
                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>
                </svg>
                Copy URL
            </button>
        </div>
    </div>
</div>


<div class="strip-card au d3">
    <div class="strip-inner formid-strip-inner">
        <div class="strip-left" style="flex-wrap:wrap;">
            <span class="strip-method id">Form ID</span>
            <span class="strip-url"><?php echo e($form->slug); ?></span>
            <span class="strip-note">— to embed <strong>popup form</strong></span>
        </div>
        <div class="strip-actions formid-strip-actions">
            <button class="btn-ghost btn-sm" onclick="copyFormId('<?php echo e($form->slug); ?>')">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"/>
                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>
                </svg>
                Copy ID
            </button>
        </div>
    </div>
</div>


<div class="stats-grid au d4" style="grid-template-columns:repeat(4,1fr);">
    <div class="stat-card g">
        <div class="stat-label">Valid Submissions</div>
        <div class="stat-value"><?php echo e(number_format($validCount)); ?></div>
        <div class="sc-glow"></div><div class="sc-shimmer"></div>
    </div>
    <div class="stat-card r">
        <div class="stat-label">Spam Blocked</div>
        <div class="stat-value"><?php echo e(number_format($spamCount)); ?></div>
        <div class="sc-glow"></div><div class="sc-shimmer"></div>
    </div>
    <div class="stat-card ind">
        <div class="stat-label">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="21 8 21 21 3 21 3 8"/>
                <rect x="1" y="3" width="22" height="5"/>
                <line x1="10" y1="12" x2="14" y2="12"/>
            </svg>
            Archived
        </div>
        <div class="stat-value"><?php echo e(number_format($archiveCount)); ?></div>
        <div class="sc-glow"></div><div class="sc-shimmer"></div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Last Submission</div>
        <div class="stat-value" style="font-size:1.05rem;color:var(--t2);">
            <?php echo e($form->last_submission_at ? $form->last_submission_at->diffForHumans() : 'Never'); ?>

        </div>
        <div class="sc-shimmer"></div>
    </div>
</div>


<?php $panel = request('panel', 'submissions'); ?>

<nav class="page-tabs-bar au d5">
    <a href="<?php echo e(request()->fullUrlWithQuery(['panel' => 'submissions', 'page' => 1])); ?>"
       class="page-tab <?php echo e($panel === 'submissions' ? 'active' : ''); ?>">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
        </svg>
        Submissions
        <?php $total = $validCount + $spamCount; ?>
        <?php if($total > 0): ?><span class="tab-pill valid"><?php echo e(number_format($total)); ?></span><?php endif; ?>
    </a>
    <a href="<?php echo e(request()->fullUrlWithQuery(['panel' => 'statistics'])); ?>"
       class="page-tab <?php echo e($panel === 'statistics' ? 'active' : ''); ?>">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
        </svg>
        Statistics
    </a>
    <a href="<?php echo e(request()->fullUrlWithQuery(['panel' => 'code'])); ?>"
       class="page-tab <?php echo e($panel === 'code' ? 'active' : ''); ?>">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="16 18 22 12 16 6"/>
            <polyline points="8 6 2 12 8 18"/>
        </svg>
        Integration Code
    </a>
    <a href="<?php echo e(request()->fullUrlWithQuery(['panel' => 'workflow'])); ?>"
       class="page-tab <?php echo e($panel === 'workflow' ? 'active' : ''); ?>">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="9 11 12 14 22 4"/>
            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
        </svg>
        Workflow
        <?php if(isset($validations) && $validations->count() > 0): ?>
            <span class="tab-pill archive"><?php echo e($validations->count()); ?></span>
        <?php endif; ?>
    </a>
</nav>


<?php $tab = request('tab', 'valid'); ?>

<div class="page-panel <?php echo e($panel === 'submissions' ? 'active' : ''); ?>">
    <div class="submissions-section">
        <div class="submissions-section-header">
            <div class="submission-tabs-bar" style="padding-bottom:0;">
                <div class="submission-tabs">
                    <a href="<?php echo e(request()->fullUrlWithQuery(['panel' => 'submissions', 'tab' => 'valid', 'search' => $search, 'page' => 1])); ?>"
                       class="submission-tab <?php echo e($tab === 'valid' ? 'active' : ''); ?>">
                        Inbox
                        <span class="tab-pill valid"><?php echo e(number_format($validCount)); ?></span>
                    </a>
                    <a href="<?php echo e(request()->fullUrlWithQuery(['panel' => 'submissions', 'tab' => 'spam', 'search' => $search, 'page' => 1])); ?>"
                       class="submission-tab <?php echo e($tab === 'spam' ? 'active' : ''); ?>">
                        Spam
                        <span class="tab-pill spam"><?php echo e(number_format($spamCount)); ?></span>
                    </a>
                    <a href="<?php echo e(request()->fullUrlWithQuery(['panel' => 'submissions', 'tab' => 'archive', 'search' => $search, 'page' => 1])); ?>"
                       class="submission-tab <?php echo e($tab === 'archive' ? 'active' : ''); ?>">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="21 8 21 21 3 21 3 8"/>
                            <rect x="1" y="3" width="22" height="5"/>
                            <line x1="10" y1="12" x2="14" y2="12"/>
                        </svg>
                        Archive
                        <?php if(isset($archiveCount) && $archiveCount > 0): ?>
                            <span class="tab-pill archive"><?php echo e(number_format($archiveCount)); ?></span>
                        <?php endif; ?>
                    </a>
                </div>
                <?php if($tab !== 'archive'): ?>
                <div class="search-wrapper" style="padding-bottom:0.5rem;">
                    <svg class="search-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                    <input type="text" id="liveSearchInput" class="search-input"
                           placeholder="Search by name, email…"
                           value="<?php echo e($search); ?>" autocomplete="off">
                    <?php if($search): ?>
                        <a href="<?php echo e(request()->fullUrlWithQuery(['search' => '', 'page' => 1])); ?>" class="search-clear" title="Clear">✕</a>
                    <?php else: ?>
                        <span class="search-clear" id="clearBtn" style="display:none;" title="Clear">✕</span>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php if($search && $tab !== 'archive'): ?>
                <p class="results-info">
                    <?php if($submissions->total() > 0): ?>
                        <strong><?php echo e($submissions->total()); ?></strong> result<?php echo e($submissions->total() !== 1 ? 's' : ''); ?>

                        for "<strong><?php echo e($search); ?></strong>" in <strong><?php echo e($tab === 'spam' ? 'Spam' : 'Inbox'); ?></strong>
                    <?php else: ?>
                        No results for "<strong><?php echo e($search); ?></strong>" in <strong><?php echo e($tab === 'spam' ? 'Spam' : 'Inbox'); ?></strong>
                    <?php endif; ?>
                </p>
            <?php endif; ?>
        </div>

        <?php if($tab === 'archive'): ?>
        <div class="archive-toggle-banner">
            <div class="archive-toggle-info">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="21 8 21 21 3 21 3 8"/>
                    <rect x="1" y="3" width="22" height="5"/>
                    <line x1="10" y1="12" x2="14" y2="12"/>
                </svg>
                <div>
                    <strong>Archive paused submissions</strong>
                    <p>When enabled, submissions received while the form is paused are stored here instead of being rejected.</p>
                </div>
            </div>
            <form method="POST" action="<?php echo e(route('dashboard.forms.toggle-archive', $form->id)); ?>" id="archiveToggleForm" style="margin:0;">
                <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                <label class="toggle-switch">
                    <input type="checkbox" id="archiveToggle" name="archive_when_paused" value="1"
                           <?php echo e(($form->archive_when_paused ?? true) ? 'checked' : ''); ?>

                           onchange="document.getElementById('archiveToggleForm').submit()">
                    <span class="toggle-track"></span>
                    <span class="toggle-label" id="toggleLabel"><?php echo e(($form->archive_when_paused ?? true) ? 'On' : 'Off'); ?></span>
                </label>
            </form>
        </div>
        <?php if(!($form->archive_when_paused ?? true)): ?>
        <div class="warn-banner">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#ffbb33" stroke-width="2" style="flex-shrink:0;">
                <circle cx="12" cy="12" r="10"/>
                <line x1="12" y1="8" x2="12" y2="12"/>
                <line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
            <p>Archiving is <strong>disabled</strong>. New submissions while paused will be rejected with a public error message.</p>
        </div>
        <?php endif; ?>
        <?php endif; ?>

        <?php if($submissions->count() > 0): ?>
        <div class="table-wrapper" style="margin-top:0.5rem;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Summary</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $submissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="<?php echo e($submission->is_spam ? 'spam-row' : ($submission->is_archived ? 'archive-row' : '')); ?>">
                        <td>
                            <a href="<?php echo e(route('dashboard.submissions.show', [$form->id, $submission->id])); ?>" class="table-link">
                                <?php echo e(Str::limit($submission->summary, 60)); ?>

                            </a>
                            <?php if(!$submission->is_read && !$submission->is_spam && !$submission->is_archived): ?>
                                <span class="badge badge-success" style="margin-left:.5rem;">New</span>
                            <?php endif; ?>
                            <?php if($submission->is_spam): ?>
                                <span class="inline-spam" style="margin-left:.5rem;">Spam</span>
                            <?php endif; ?>
                            <?php if($submission->is_archived): ?>
                                <span class="inline-archive" style="margin-left:.5rem;">Archived</span>
                                <?php if(isset($submission->metadata['archived_reason']) && $submission->metadata['archived_reason'] === 'form_paused'): ?>
                                    <span class="inline-muted">· received while paused</span>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if($submission->spam_reason): ?>
                                <span class="inline-muted">· <?php echo e($submission->spam_reason); ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="text-muted" style="white-space:nowrap;font-family:var(--mono);font-size:0.78rem;">
                            <?php echo e($submission->created_at->format('M j, Y g:i A')); ?>

                        </td>
                        <td>
                            <?php if($submission->is_archived): ?>
                                <span style="font-size:0.78rem;color:var(--ind);">Archived</span>
                            <?php elseif($submission->is_spam): ?>
                                <span style="font-size:0.78rem;color:var(--am);">Blocked</span>
                            <?php elseif($submission->email_sent): ?>
                                <span style="font-size:0.78rem;color:var(--t3);">Email sent</span>
                            <?php else: ?>
                                <span style="font-size:0.78rem;color:var(--t3);">Stored</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-right">
                            <a href="<?php echo e(route('dashboard.submissions.show', [$form->id, $submission->id])); ?>" class="btn-tbl">View</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <?php if($submissions->hasPages() || $submissions->total() > 0): ?>
        <div class="pagination-footer">
            <div class="pagination-info">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                    <line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                </svg>
                <span>Showing <strong><?php echo e($submissions->firstItem()); ?></strong> to <strong><?php echo e($submissions->lastItem()); ?></strong> of <strong><?php echo e($submissions->total()); ?></strong></span>
            </div>
            <div class="pagination-controls">
                <?php if($submissions->onFirstPage()): ?>
                    <span class="pagination-link disabled">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
                        <span>Prev</span>
                    </span>
                <?php else: ?>
                    <a href="<?php echo e($submissions->previousPageUrl()); ?>" class="pagination-link">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
                        <span>Prev</span>
                    </a>
                <?php endif; ?>
                <div class="pagination-pages">
                    <?php $__currentLoopData = $submissions->getUrlRange(max(1, $submissions->currentPage()-2), min($submissions->lastPage(), $submissions->currentPage()+2)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $submissions->currentPage()): ?>
                            <span class="pagination-link active"><?php echo e($page); ?></span>
                        <?php else: ?>
                            <a href="<?php echo e($url); ?>" class="pagination-link"><?php echo e($page); ?></a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php if($submissions->hasMorePages()): ?>
                    <a href="<?php echo e($submissions->nextPageUrl()); ?>" class="pagination-link">
                        <span>Next</span>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                    </a>
                <?php else: ?>
                    <span class="pagination-link disabled">
                        <span>Next</span>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <?php else: ?>
        <div class="empty-state">
            <?php if($tab === 'archive'): ?>
                <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="21 8 21 21 3 21 3 8"/><rect x="1" y="3" width="22" height="5"/><line x1="10" y1="12" x2="14" y2="12"/></svg>
                <h3 class="empty-title">Archive is empty</h3>
                <p class="empty-description">Submissions received while the form is paused will appear here.</p>
            <?php elseif($search): ?>
                <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <h3 class="empty-title">No results found</h3>
                <p class="empty-description">Nothing matched "<strong><?php echo e($search); ?></strong>". <a href="<?php echo e(request()->fullUrlWithQuery(['search' => '', 'page' => 1])); ?>">Clear search</a></p>
            <?php elseif($tab === 'spam'): ?>
                <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                <h3 class="empty-title">No spam detected</h3>
                <p class="empty-description">Your spam folder is clean.</p>
            <?php else: ?>
                <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                <h3 class="empty-title">No submissions yet</h3>
                <p class="empty-description">Submissions will appear here once your form starts receiving data.</p>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</div>


<div class="page-panel <?php echo e($panel === 'statistics' ? 'active' : ''); ?>">
    <div class="stats-mini-grid" style="margin-bottom:1.25rem;">
        <div class="stat-card g">
            <div class="stat-label">Valid</div>
            <div class="stat-value"><?php echo e(number_format($validCount)); ?></div>
            <div class="sc-glow"></div><div class="sc-shimmer"></div>
        </div>
        <div class="stat-card am">
            <div class="stat-label">Spam</div>
            <div class="stat-value" style="color:var(--am);text-shadow:0 0 20px rgba(255,187,51,0.5);"><?php echo e(number_format($spamCount)); ?></div>
            <div class="sc-glow" style="background:var(--am);"></div><div class="sc-shimmer"></div>
        </div>
        <div class="stat-card ind">
            <div class="stat-label">Archived</div>
            <div class="stat-value"><?php echo e(number_format($archiveCount)); ?></div>
            <div class="sc-glow"></div><div class="sc-shimmer"></div>
        </div>
    </div>
    <div class="charts-grid">
        <div class="chart-card">
            <h4 class="chart-title">Submissions — Last 7 Days</h4>
            <p class="chart-sub">Valid submissions per day</p>
            <div style="position:relative;height:220px;"><canvas id="lineChart"></canvas></div>
        </div>
        <div class="chart-card">
            <h4 class="chart-title">All-time Breakdown</h4>
            <p class="chart-sub">Valid · Spam · Archived</p>
            <div style="position:relative;height:220px;"><canvas id="barChart"></canvas></div>
        </div>
    </div>
</div>


<div class="page-panel <?php echo e($panel === 'code' ? 'active' : ''); ?>">
    <div class="code-panel-card">
        <div class="code-panel-header">
            <h4 class="code-panel-title">Integration Code</h4>
            <p class="code-panel-sub">Copy and paste one of these snippets into your website.</p>
        </div>
        <div class="code-panel-body">
            <div class="captcha-info-box">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
                <div style="min-width:0;">
                    <p>
                        <strong>To disable captcha add: <code>&lt;input type="hidden" name="_captcha" value="false"&gt;</code></strong>
                    </p>
                </div>
            </div>
            <div class="code-tabs">
                <button class="code-tab active" onclick="switchCodeTab('html', event)">Plain HTML</button>
                <button class="code-tab" onclick="switchCodeTab('ajax', event)">HTML + AJAX</button>
                <button class="code-tab" onclick="switchCodeTab('fileupload', event)">File Upload</button>
            </div>

            
            <div id="code-html" class="code-block active">
                <div class="code-header">
                    <span class="code-lang">HTML</span>
                    <button class="code-copy" onclick="copyCode('html-pre')">Copy</button>
                </div>
                <div class="code-content">
                    <pre id="html-pre"><span class="tag">&lt;form</span> <span class="attr">action</span>=<span class="string">"<?php echo e($form->endpoint_url); ?>"</span> <span class="attr">method</span>=<span class="string">"POST"</span><span class="tag">&gt;</span>
  <span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"text"</span>  <span class="attr">name</span>=<span class="string">"name"</span>    <span class="attr">placeholder</span>=<span class="string">"Your name"</span>    <span class="attr">required</span><span class="tag">&gt;</span>
  <span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"email"</span> <span class="attr">name</span>=<span class="string">"email"</span>   <span class="attr">placeholder</span>=<span class="string">"Your email"</span>   <span class="attr">required</span><span class="tag">&gt;</span>
  <span class="tag">&lt;textarea</span> <span class="attr">name</span>=<span class="string">"message"</span> <span class="attr">placeholder</span>=<span class="string">"Your message"</span><span class="tag">&gt;&lt;/textarea&gt;</span>
  <?php if($form->honeypot_enabled): ?>
  <span class="comment">&lt;!-- Honeypot --&gt;</span>
  <span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"text"</span> <span class="attr">name</span>=<span class="string">"<?php echo e($form->honeypot_field); ?>"</span> <span class="attr">style</span>=<span class="string">"display:none"</span><span class="tag">&gt;</span>
  <?php endif; ?>
  <span class="comment">&lt;!-- Google CAPTCHA is enabled! --&gt;</span>
  <span class="tag">&lt;button</span> <span class="attr">type</span>=<span class="string">"submit"</span><span class="tag">&gt;</span>Send Message<span class="tag">&lt;/button&gt;</span>
<span class="tag">&lt;/form&gt;</span>
</pre>
                </div>
            </div>

            
            <div id="code-ajax" class="code-block">
                <div class="code-header">
                    <span class="code-lang">HTML + AJAX</span>
                    <button class="code-copy" onclick="copyCode('ajax-pre')">Copy</button>
                </div>
                <div class="code-content">
                    <pre id="ajax-pre"><span class="tag">&lt;form</span> <span class="attr">id</span>=<span class="string">"contact-form"</span> <span class="attr">action</span>=<span class="string">"<?php echo e($form->endpoint_url); ?>"</span> <span class="attr">method</span>=<span class="string">"POST"</span><span class="tag">&gt;</span>
  <span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"text"</span>  <span class="attr">name</span>=<span class="string">"name"</span>    <span class="attr">placeholder</span>=<span class="string">"Your name"</span>    <span class="attr">required</span><span class="tag">&gt;</span>
  <span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"email"</span> <span class="attr">name</span>=<span class="string">"email"</span>   <span class="attr">placeholder</span>=<span class="string">"Your email"</span>   <span class="attr">required</span><span class="tag">&gt;</span>
  <span class="tag">&lt;textarea</span> <span class="attr">name</span>=<span class="string">"message"</span> <span class="attr">placeholder</span>=<span class="string">"Your message"</span><span class="tag">&gt;&lt;/textarea&gt;</span>
  <?php if($form->honeypot_enabled): ?>
  <span class="comment">&lt;!-- Honeypot --&gt;</span>
  <span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"text"</span> <span class="attr">name</span>=<span class="string">"<?php echo e($form->honeypot_field); ?>"</span> <span class="attr">style</span>=<span class="string">"display:none"</span><span class="tag">&gt;</span>
  <?php endif; ?>
  <span class="comment">&lt;!-- Disable captcha for AJAX --&gt;</span>
  <span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"hidden"</span> <span class="attr">name</span>=<span class="string">"_captcha"</span> <span class="attr">value</span>=<span class="string">"false"</span><span class="tag">&gt;</span>
  <span class="tag">&lt;button</span> <span class="attr">type</span>=<span class="string">"submit"</span><span class="tag">&gt;</span>Send Message<span class="tag">&lt;/button&gt;</span>
<span class="tag">&lt;/form&gt;</span>
<span class="tag">&lt;div</span> <span class="attr">id</span>=<span class="string">"form-response"</span> <span class="attr">style</span>=<span class="string">"margin-top:15px"</span><span class="tag">&gt;&lt;/div&gt;</span>

<span class="tag">&lt;script&gt;</span>
<span class="keyword">document</span>.getElementById(<span class="string">'contact-form'</span>).addEventListener(<span class="string">'submit'</span>, <span class="keyword">async function</span>(e) {
  e.preventDefault();
  <span class="keyword">const</span> form = <span class="keyword">this</span>;
  <span class="keyword">const</span> box  = document.getElementById(<span class="string">'form-response'</span>);
  <span class="keyword">const</span> btn  = form.querySelector(<span class="string">'button[type="submit"]'</span>);
  box.innerHTML = <span class="string">''</span>;
  btn.disabled = <span class="keyword">true</span>;
  btn.textContent = <span class="string">'Sending...'</span>;
  <span class="keyword">try</span> {
    <span class="keyword">const</span> res = <span class="keyword">await</span> fetch(form.action, {
      method: <span class="string">'POST'</span>,
      body: <span class="keyword">new</span> FormData(form),
      headers: { <span class="string">'Accept'</span>: <span class="string">'application/json'</span> }
    });
    <span class="keyword">const</span> statusCode = res.status;
    <span class="keyword">const</span> text = <span class="keyword">await</span> res.text();
    <span class="keyword">let</span> data = {};
    <span class="keyword">try</span> { data = JSON.parse(text); } <span class="keyword">catch</span>(err) {}
    <span class="keyword">if</span> (statusCode === 200 &amp;&amp; data.success) {
      box.innerHTML = <span class="string">'&lt;p style="color:#00ff88;font-weight:500;"&gt;&#x2713; <?php echo e(addslashes($form->success_message ?? "Thank you for your submission!")); ?>&lt;/p&gt;'</span>;
      form.reset(); <span class="keyword">return</span>;
    }
    <span class="keyword">if</span> (statusCode === 422) {
      <span class="keyword">if</span> (data.validation_error &amp;&amp; Array.isArray(data.errors)) {
        <span class="keyword">const</span> msgs = data.errors.map(<span class="keyword">function</span>(e) { <span class="keyword">return</span> <span class="string">'&lt;p style="color:#ff4d4d;margin:4px 0;"&gt;&#x2715; '</span> + e.field + <span class="string">': '</span> + e.message + <span class="string">'&lt;/p&gt;'</span>; });
        box.innerHTML = msgs.join(<span class="string">''</span>);
      } <span class="keyword">else if</span> (data.errors) {
        <span class="keyword">const</span> msgs = Object.entries(data.errors).map(<span class="keyword">function</span>([field, errs]) { <span class="keyword">return</span> <span class="string">'&lt;p style="color:#ff4d4d;margin:4px 0;"&gt;&#x2715; '</span> + field + <span class="string">': '</span> + errs[0] + <span class="string">'&lt;/p&gt;'</span>; });
        box.innerHTML = msgs.join(<span class="string">''</span>);
      } <span class="keyword">else</span> { box.innerHTML = <span class="string">'&lt;p style="color:#ff4d4d;"&gt;&#x2715; Validation failed.&lt;/p&gt;'</span>; }
      <span class="keyword">return</span>;
    }
    <span class="keyword">if</span> (statusCode === 403) { box.innerHTML = <span class="string">'&lt;p style="color:#ff4d4d;"&gt;&#x2715; Form is not active or email is not verified.&lt;/p&gt;'</span>; <span class="keyword">return</span>; }
    box.innerHTML = <span class="string">'&lt;p style="color:#ff4d4d;"&gt;&#x2715; '</span> + (data.message || data.error || <span class="string">'Something went wrong.'</span>) + <span class="string">'&lt;/p&gt;'</span>;
  } <span class="keyword">catch</span>(err) {
    box.innerHTML = <span class="string">'&lt;p style="color:#ff4d4d;"&gt;&#x2715; Network error: '</span> + err.message + <span class="string">'&lt;/p&gt;'</span>;
  } <span class="keyword">finally</span> {
    btn.disabled = <span class="keyword">false</span>;
    btn.textContent = <span class="string">'Send Message'</span>;
  }
});
<span class="tag">&lt;/script&gt;</span></pre>
                </div>
            </div>

            
            <div id="code-fileupload" class="code-block">
                <div class="code-header">
                    <span class="code-lang">HTML</span>
                    <button class="code-copy" onclick="copyCode('fileupload-pre')">Copy</button>
                </div>
                <div class="code-content">
                    <pre id="fileupload-pre"><span class="comment">&lt;!-- Add enctype="multipart/form-data" whenever you use file inputs --&gt;</span>
<span class="tag">&lt;form</span> <span class="attr">action</span>=<span class="string">"<?php echo e($form->endpoint_url); ?>"</span> <span class="attr">method</span>=<span class="string">"POST"</span> <span class="attr">enctype</span>=<span class="string">"multipart/form-data"</span><span class="tag">&gt;</span>
  <span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"text"</span>  <span class="attr">name</span>=<span class="string">"name"</span>       <span class="attr">placeholder</span>=<span class="string">"Your name"</span>  <span class="attr">required</span><span class="tag">&gt;</span>
  <span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"email"</span> <span class="attr">name</span>=<span class="string">"email"</span>      <span class="attr">placeholder</span>=<span class="string">"Your email"</span> <span class="attr">required</span><span class="tag">&gt;</span>
  <span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"file"</span>  <span class="attr">name</span>=<span class="string">"uploads[]"</span> <span class="attr">multiple</span><span class="tag">&gt;</span>
  <span class="tag">&lt;button</span> <span class="attr">type</span>=<span class="string">"submit"</span><span class="tag">&gt;</span>Send<span class="tag">&lt;/button&gt;</span>
<span class="tag">&lt;/form&gt;</span>
</pre>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="page-panel <?php echo e($panel === 'workflow' ? 'active' : ''); ?>">
    <div class="info-banner">
        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10"/>
            <line x1="12" y1="8" x2="12" y2="12"/>
            <line x1="12" y1="16" x2="12.01" y2="16"/>
        </svg>
        <p>
            <strong>How Workflow works:</strong>
            When a form is submitted, backend validations run first. If any field fails a rule, the submission is rejected and an error page is shown to the user with the exact field and reason.
        </p>
    </div>

    <div class="workflow-section">
        <div class="workflow-section-header">
            <div>
                <h4 class="workflow-section-title">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 11 12 14 22 4"/>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
                    </svg>
                    Validations
                    <span style="font-size:0.72rem;color:var(--t3);font-weight:400;">(optional)</span>
                </h4>
                <p class="workflow-section-desc">Backend validations check to ensure the data is correct before processing a submission.</p>
            </div>
            <button class="btn-new btn-sm" onclick="openValidationModal()" style="border-radius:8px;">+ Add New</button>
        </div>

        <?php if(isset($validations) && $validations->count() > 0): ?>
        <div class="validation-grid">
            <?php $__currentLoopData = $validations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="validation-card">
                <div style="display:flex;align-items:flex-start;gap:0.75rem;flex:1;">
                    <div class="validation-card-icon">
                        <?php if($v->field_type === 'email'): ?>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        <?php elseif($v->field_type === 'number'): ?>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" y1="9" x2="20" y2="9"/><line x1="4" y1="15" x2="20" y2="15"/><line x1="10" y1="3" x2="8" y2="21"/><line x1="16" y1="3" x2="14" y2="21"/></svg>
                        <?php else: ?>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="4 7 4 4 20 4 20 7"/><line x1="9" y1="20" x2="15" y2="20"/><line x1="12" y1="4" x2="12" y2="20"/></svg>
                        <?php endif; ?>
                    </div>
                    <div class="validation-card-info">
                        <p class="validation-card-name"><?php echo e($v->field_name); ?></p>
                        <p class="validation-card-meta">
                            <?php echo e(ucfirst($v->field_type)); ?>

                            <?php if($v->min_length || $v->max_length): ?>
                                · <?php if($v->min_length): ?> min <?php echo e($v->min_length); ?> <?php endif; ?> <?php if($v->min_length && $v->max_length): ?> / <?php endif; ?> <?php if($v->max_length): ?> max <?php echo e($v->max_length); ?> <?php endif; ?> chars
                            <?php endif; ?>
                        </p>
                        <span class="validation-card-badge <?php echo e($v->is_required ? 'required' : 'optional'); ?>">
                            <?php echo e($v->is_required ? 'Required' : 'Optional'); ?>

                        </span>
                    </div>
                </div>
                <div class="validation-card-actions">
                    <button class="validation-card-btn"
                            onclick="openEditValidationModal('<?php echo e($v->id); ?>', '<?php echo e($v->field_name); ?>', '<?php echo e($v->field_type); ?>', <?php echo e($v->min_length ?? 'null'); ?>, <?php echo e($v->max_length ?? 'null'); ?>, <?php echo e($v->is_required ? 'true' : 'false'); ?>)"
                            title="Edit">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    </button>
                    <button class="validation-card-btn delete" onclick="deleteValidation('<?php echo e($v->id); ?>')" title="Delete">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                    </button>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php else: ?>
        <div class="empty-state">
            <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
            <h3 class="empty-title">No validations yet</h3>
            <p class="empty-description">Add validation rules to ensure submitted data meets your requirements.</p>
            <button class="btn-new btn-sm" style="border-radius:8px;margin-top:0.75rem;" onclick="openValidationModal()">+ Add First Validation</button>
        </div>
        <?php endif; ?>
    </div>
</div>


<div class="modal-overlay" id="validationModal">
    <div class="modal-box">
        <button class="modal-close" onclick="closeValidationModal()">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
        <h3 class="modal-title" id="modalTitle">Text validation settings</h3>
        <form id="validationForm">
            <?php echo csrf_field(); ?>
            <input type="hidden" id="validationId" name="validation_id" value="">
            <div class="form-group">
                <label class="form-label" for="fieldName">Field Name <span>— Must match the form <code style="font-family:var(--mono);font-size:0.8em;background:rgba(255,255,255,0.05);padding:0.1rem 0.3rem;border-radius:4px;">name</code> attribute.</span></label>
                <input type="text" id="fieldName" name="field_name" class="form-control" placeholder="e.g. message, email, name" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="fieldType">Field Type</label>
                <select id="fieldType" name="field_type" class="form-control" onchange="updateModalTitle()">
                    <option value="text">Text</option>
                    <option value="email">Email</option>
                    <option value="number">Number</option>
                </select>
            </div>
            <div class="form-row" id="lengthFields">
                <div class="form-group">
                    <label class="form-label" for="minLength">Minimum Length</label>
                    <input type="number" id="minLength" name="min_length" class="form-control" placeholder="e.g. 10" min="1">
                </div>
                <div class="form-group">
                    <label class="form-label" for="maxLength">Maximum Length</label>
                    <input type="number" id="maxLength" name="max_length" class="form-control" placeholder="e.g. 500" min="1">
                </div>
            </div>
            <div class="form-group" style="display:flex;align-items:center;justify-content:space-between;">
                <label class="form-label" style="margin:0;">Required</label>
                <label class="toggle-switch">
                    <input type="checkbox" id="isRequired" name="is_required" value="1">
                    <span class="toggle-track"></span>
                </label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-ghost btn-sm" onclick="closeValidationModal()">Cancel</button>
                <button type="submit" class="btn-new btn-sm" id="modalSubmitBtn" style="border-radius:8px;">Save</button>
            </div>
        </form>
    </div>
</div>


<div class="modal-overlay" id="deleteModal">
    <div class="modal-box" style="max-width:380px;text-align:center;">
        <div class="delete-icon-wrap">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ff4d4d" stroke-width="2">
                <polyline points="3 6 5 6 21 6"/>
                <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                <path d="M10 11v6M14 11v6"/>
                <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/>
            </svg>
        </div>
        <h3 style="margin:0 0 0.5rem;font-size:1rem;font-weight:700;color:var(--t1);">Delete Validation?</h3>
        <p style="margin:0 0 1.25rem;font-size:0.85rem;color:var(--t3);">This validation rule will be permanently removed.</p>
        <div style="display:flex;gap:0.75rem;justify-content:center;">
            <button class="btn-ghost btn-sm" onclick="closeDeleteModal()">Cancel</button>
            <button class="btn-danger btn-sm" id="confirmDeleteBtn">Delete</button>
        </div>
    </div>
</div>

</div>


<script>
    window.__rk = '<?php echo e(config('services.recaptcha.site_key')); ?>';
    document.querySelectorAll('.sitekey-placeholder').forEach(function(el) {
        el.textContent = window.__rk;
    });

    function copyCode(preId) {
        const text = document.getElementById(preId).innerText;
        const safe = text.split(window.__rk).join('YOUR_SITE_KEY');
        navigator.clipboard.writeText(safe);
        const btn = event.currentTarget, orig = btn.textContent;
        btn.textContent = 'Copied!';
        setTimeout(() => btn.textContent = orig, 2000);
    }

    function copyEndpoint(slug) {
        navigator.clipboard.writeText('<?php echo e(url('/f')); ?>/' + slug);
        const btn = event.currentTarget, orig = btn.innerHTML;
        btn.innerHTML = '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg> Copied!';
        setTimeout(() => btn.innerHTML = orig, 2000);
    }

    function copyFormId(slug) {
        navigator.clipboard.writeText(slug);
        const btn = event.currentTarget, orig = btn.innerHTML;
        btn.innerHTML = '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg> Copied!';
        setTimeout(() => btn.innerHTML = orig, 2000);
    }

    function switchCodeTab(tab, e) {
        document.querySelectorAll('.code-tab').forEach(b => b.classList.remove('active'));
        (e?.currentTarget ?? event.currentTarget).classList.add('active');
        document.querySelectorAll('.code-block').forEach(b => b.classList.remove('active'));
        document.getElementById('code-' + tab).classList.add('active');
    }

    // ── Live search ──────────────────────────────────────────
    (function () {
        const input    = document.getElementById('liveSearchInput');
        const clearBtn = document.getElementById('clearBtn');
        if (!input) return;
        const baseUrl  = "<?php echo e(route('dashboard.forms.show', $form->id)); ?>";
        const curTab   = "<?php echo e($tab); ?>";
        const curPanel = "<?php echo e($panel); ?>";
        let timer;
        input.addEventListener('input', function () {
            clearTimeout(timer);
            const val = input.value.trim();
            if (clearBtn) clearBtn.style.display = val ? 'flex' : 'none';
            timer = setTimeout(() => {
                const params = new URLSearchParams({ panel: curPanel, tab: curTab, search: val, page: 1 });
                window.location.href = baseUrl + '?' + params.toString();
            }, 350);
        });
        if (clearBtn) {
            clearBtn.addEventListener('click', function () {
                const params = new URLSearchParams({ panel: curPanel, tab: curTab, search: '', page: 1 });
                window.location.href = baseUrl + '?' + params.toString();
            });
        }
    })();

    // ── Archive toggle label ─────────────────────────────────
    (function () {
        const toggle = document.getElementById('archiveToggle');
        const label  = document.getElementById('toggleLabel');
        if (!toggle || !label) return;
        toggle.addEventListener('change', function () {
            label.textContent = this.checked ? 'On' : 'Off';
        });
    })();

    // ── Charts ───────────────────────────────────────────────
    const primaryColor = '#00ff88';
    const mutedColor   = '#4a5a4a';
    const archiveColor = '#6366f1';

    if (document.getElementById('lineChart')) {
        new Chart(document.getElementById('lineChart'), {
            type: 'line',
            data: {
                labels: <?php echo json_encode($lineLabels, 15, 512) ?>,
                datasets: [{
                    label: 'Submissions',
                    data: <?php echo json_encode($lineData, 15, 512) ?>,
                    borderColor: primaryColor,
                    backgroundColor: 'rgba(0,255,136,0.06)',
                    tension: 0.4, fill: true,
                    pointRadius: 4, pointHoverRadius: 6,
                    pointBackgroundColor: primaryColor, borderWidth: 2,
                }]
            },
            options: {
                responsive: true, maintainAspectRatio: false,
                plugins: { legend: { display: false }, tooltip: { backgroundColor: '#0a100a', titleColor: '#4a5a4a', bodyColor: '#f0f0f0', padding: 10, cornerRadius: 8, borderColor: 'rgba(0,255,136,0.2)', borderWidth: 1 } },
                scales: {
                    x: { grid: { display: false }, ticks: { color: mutedColor, font: { size: 11 } }, border: { display: false } },
                    y: { ticks: { color: mutedColor, font: { size: 11 }, callback: v => Number.isInteger(v) ? v : null, stepSize: 1 }, grid: { color: 'rgba(255,255,255,0.04)' }, border: { display: false }, beginAtZero: true }
                }
            }
        });

        new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: ['Valid', 'Spam', 'Archived'],
                datasets: [{
                    data: [<?php echo e($validCount); ?>, <?php echo e($spamCount); ?>, <?php echo e($archiveCount); ?>],
                    backgroundColor: ['rgba(0,255,136,0.75)', 'rgba(255,187,51,0.75)', 'rgba(99,102,241,0.75)'],
                    borderRadius: 8, borderSkipped: false, barThickness: 40,
                }]
            },
            options: {
                responsive: true, maintainAspectRatio: false,
                plugins: { legend: { display: false }, tooltip: { backgroundColor: '#0a100a', titleColor: '#4a5a4a', bodyColor: '#f0f0f0', padding: 10, cornerRadius: 8, borderColor: 'rgba(0,255,136,0.2)', borderWidth: 1 } },
                scales: {
                    x: { grid: { display: false }, ticks: { color: mutedColor, font: { size: 12 } }, border: { display: false } },
                    y: { ticks: { color: mutedColor, font: { size: 11 }, callback: v => Number.isInteger(v) ? v : null, stepSize: 1 }, grid: { color: 'rgba(255,255,255,0.04)' }, border: { display: false }, beginAtZero: true }
                }
            }
        });

        const archiveCanvas = document.getElementById('archiveLineChart');
        if (archiveCanvas) {
            new Chart(archiveCanvas, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($lineLabels, 15, 512) ?>,
                    datasets: [{
                        label: 'Archived', data: <?php echo json_encode($archiveLineData, 15, 512) ?>,
                        borderColor: archiveColor, backgroundColor: 'rgba(99,102,241,0.06)',
                        tension: 0.4, fill: true, pointRadius: 4, pointHoverRadius: 6,
                        pointBackgroundColor: archiveColor, borderWidth: 2,
                    }]
                },
                options: {
                    responsive: true, maintainAspectRatio: false,
                    plugins: { legend: { display: false }, tooltip: { backgroundColor: '#0a100a', titleColor: '#4a5a4a', bodyColor: '#f0f0f0', padding: 10, cornerRadius: 8 } },
                    scales: {
                        x: { grid: { display: false }, ticks: { color: mutedColor, font: { size: 11 } }, border: { display: false } },
                        y: { ticks: { color: mutedColor, font: { size: 11 }, callback: v => Number.isInteger(v) ? v : null, stepSize: 1 }, grid: { color: 'rgba(255,255,255,0.04)' }, border: { display: false }, beginAtZero: true }
                    }
                }
            });
        }
    }

    // ══════════════════════════════
    // WORKFLOW / VALIDATION JS (all original logic preserved)
    // ══════════════════════════════
    const FORM_ID = '<?php echo e($form->id); ?>';
    let deleteTargetId = null;

    function updateModalTitle() {
        const type = document.getElementById('fieldType').value;
        const titles = { text: 'Text validation settings', email: 'Email validation settings', number: 'Number validation settings' };
        document.getElementById('modalTitle').textContent = titles[type] || 'Validation settings';
        document.getElementById('lengthFields').style.display = type === 'email' ? 'none' : 'grid';
    }

    function openValidationModal() {
        document.getElementById('validationId').value   = '';
        document.getElementById('fieldName').value      = '';
        document.getElementById('fieldType').value      = 'text';
        document.getElementById('minLength').value      = '';
        document.getElementById('maxLength').value      = '';
        document.getElementById('isRequired').checked   = false;
        document.getElementById('modalTitle').textContent = 'Text validation settings';
        document.getElementById('lengthFields').style.display = 'grid';
        document.getElementById('modalSubmitBtn').textContent = 'Save';
        document.getElementById('validationModal').classList.add('open');
    }

    function openEditValidationModal(id, fieldName, fieldType, minLen, maxLen, isRequired) {
        document.getElementById('validationId').value   = id;
        document.getElementById('fieldName').value      = fieldName;
        document.getElementById('fieldType').value      = fieldType;
        document.getElementById('minLength').value      = minLen ?? '';
        document.getElementById('maxLength').value      = maxLen ?? '';
        document.getElementById('isRequired').checked   = isRequired;
        updateModalTitle();
        document.getElementById('modalSubmitBtn').textContent = 'Update';
        document.getElementById('validationModal').classList.add('open');
    }

    function closeValidationModal() { document.getElementById('validationModal').classList.remove('open'); }
    function closeDeleteModal()     { document.getElementById('deleteModal').classList.remove('open'); deleteTargetId = null; }
    function deleteValidation(id)   { deleteTargetId = id; document.getElementById('deleteModal').classList.add('open'); }

    document.getElementById('validationModal').addEventListener('click', function(e) { if (e.target === this) closeValidationModal(); });
    document.getElementById('deleteModal').addEventListener('click', function(e)     { if (e.target === this) closeDeleteModal(); });

    document.getElementById('confirmDeleteBtn').addEventListener('click', async function() {
        if (!deleteTargetId) return;
        this.textContent = 'Deleting...'; this.disabled = true;
        try {
            const res = await fetch(`/dashboard/forms/${FORM_ID}/validations/${deleteTargetId}`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content, 'Accept': 'application/json' }
            });
            if (res.ok) { window.location.reload(); } else { alert('Failed to delete. Please try again.'); }
        } catch(e) { alert('An error occurred. Please try again.'); }
        finally { this.textContent = 'Delete'; this.disabled = false; }
    });

    document.getElementById('validationForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        const submitBtn = document.getElementById('modalSubmitBtn');
        const id        = document.getElementById('validationId').value;
        const isEdit    = !!id;
        submitBtn.textContent = isEdit ? 'Updating...' : 'Saving...';
        submitBtn.disabled    = true;
        const payload = {
            field_name:  document.getElementById('fieldName').value,
            field_type:  document.getElementById('fieldType').value,
            min_length:  document.getElementById('minLength').value || null,
            max_length:  document.getElementById('maxLength').value || null,
            is_required: document.getElementById('isRequired').checked ? 1 : 0,
        };
        try {
            const url    = isEdit ? `/dashboard/forms/${FORM_ID}/validations/${id}` : `/dashboard/forms/${FORM_ID}/validations`;
            const method = isEdit ? 'PUT' : 'POST';
            const res    = await fetch(url, {
                method,
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content, 'Accept': 'application/json' },
                body: JSON.stringify(payload)
            });
            const data = await res.json();
            if (res.ok) { closeValidationModal(); window.location.reload(); }
            else { alert(data.message || 'Validation failed. Please check your inputs.'); }
        } catch(err) {
            if (err.response) { alert(JSON.stringify(err.response.data, null, 2)); }
            else if (err.message) { alert(err.message); }
            else { alert(JSON.stringify(err)); }
        } finally {
            submitBtn.textContent = isEdit ? 'Update' : 'Save';
            submitBtn.disabled    = false;
        }
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Git-folders\000form.com\resources\views/dashboard/forms/show.blade.php ENDPATH**/ ?>