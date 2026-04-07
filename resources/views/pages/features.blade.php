@extends('layouts.app')

@section('title', '000form - Features')

@section('content')

<style>
    /* ═══════════════════════════════════════════════════
       PAGE WRAPPER
    ═══════════════════════════════════════════════════ */
    .fp {
        font-family: var(--font-display);
        background: var(--bg-primary);
        color: var(--text-primary);
        padding: 6rem 1.5rem 5rem;
        position: relative;
        overflow: hidden;
    }

    .fp::before {
        content: '';
        position: absolute;
        width: 800px; height: 800px;
        border-radius: 50%;
        background: var(--accent);
        filter: blur(180px);
        opacity: 0.07;
        top: -400px; left: -200px;
        pointer-events: none;
    }

    .fp::after {
        content: '';
        position: absolute;
        width: 600px; height: 600px;
        border-radius: 50%;
        background: var(--accent);
        filter: blur(150px);
        opacity: 0.04;
        bottom: -300px; right: -100px;
        pointer-events: none;
    }

    /* Fixed-width container — everything stays within this */
    .fp-wrap {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    /* ═══════════════════════════════════════════════════
       HERO
    ═══════════════════════════════════════════════════ */
    .fp-head {
        text-align: center;
        margin-bottom: 4rem;
    }

    .fp-head h1 {
        font-size: clamp(2.4rem, 5vw, 3.75rem);
        font-weight: 700;
        line-height: 1.1;
        margin-bottom: 1.25rem;
        letter-spacing: -0.02em;
    }

    .fp-head h1 em { font-style: normal; color: var(--accent); }

    .fp-head p {
        font-size: 1.05rem;
        color: var(--text-secondary);
        max-width: 520px;
        margin: 0 auto 2rem;
        line-height: 1.65;
    }

    /* ═══════════════════════════════════════════════════
       SECTION SEPARATOR
    ═══════════════════════════════════════════════════ */
    .fp-sep {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.75rem;
    }

    .fp-sep__label {
        font-family: var(--font-mono);
        font-size: 0.85rem;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: white;
        white-space: nowrap;
    }

    .fp-sep__line { flex: 1; height: 1px; background: var(--border-color); }

    /* ═══════════════════════════════════════════════════
       GRID SYSTEM
       Every row is its own .fp-grid so gaps are always
       consistent and columns never bleed into each other.
       Gap is 3.25rem as requested — applied via padding
       trick so card widths stay predictable.
    ═══════════════════════════════════════════════════ */
    .fp-grid {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        gap: 3.5rem;           /* visual gap between cards  */
        margin-bottom: 3.5rem!important; /* gap between rows           */
    }

    /* column span helpers */
    .fp-col-8  { grid-column: span 8;  }
    .fp-col-4  { grid-column: span 4;  }
    .fp-col-6  { grid-column: span 6;  }
    .fp-col-4  { grid-column: span 4;  }
    .fp-col-3  { grid-column: span 3;  }
    .fp-col-9  { grid-column: span 9;  }
    .fp-col-12 { grid-column: span 12; }

    /* ═══════════════════════════════════════════════════
       CARD BASE
    ═══════════════════════════════════════════════════ */
    .fp-card {
        background: var(--bg-card);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        padding: 2rem 1.875rem;
        display: flex;
        flex-direction: column;
        gap: 0.9rem;
        transition: border-color 0.22s, transform 0.22s, box-shadow 0.22s;
        position: relative;
        overflow: hidden;
        animation: fpFade 0.5s ease forwards;
        opacity: 0;
    }

    .fp-card:hover {
        border-color: var(--accent);
        transform: translateY(-3px);
        box-shadow: 0 18px 44px rgba(0,255,136,0.09);
    }

    /* animation stagger */
    .fp-card:nth-child(1) { animation-delay: 0.06s; }
    .fp-card:nth-child(2) { animation-delay: 0.12s; }
    .fp-card:nth-child(3) { animation-delay: 0.18s; }
    .fp-card:nth-child(4) { animation-delay: 0.24s; }
    .fp-card:nth-child(5) { animation-delay: 0.30s; }
    .fp-card:nth-child(6) { animation-delay: 0.36s; }

    /* ── icon ── */
    .fp-icon {
        width: 44px; height: 44px;
        border: 1px solid var(--border-color);
        border-radius: 11px;
        display: flex; align-items: center; justify-content: center;
        color: var(--text-muted);
        background: var(--bg-tertiary);
        flex-shrink: 0;
        transition: border-color 0.2s, color 0.2s;
    }

    .fp-card:hover .fp-icon { border-color: var(--accent); color: var(--accent); }

    .fp-icon--green {
        border-color: rgba(0,255,136,0.35);
        color: var(--accent);
        background: rgba(0,255,136,0.08);
    }

    /* ── text ── */
    .fp-card h3 {
        font-size: 1.05rem;
        font-weight: 700;
        letter-spacing: -0.015em;
        color: var(--text-primary);
        line-height: 1.3;
        margin: 0;
    }

    .fp-card > p {
        font-size: 0.875rem;
        color: var(--text-secondary);
        line-height: 1.68;
        flex: 1;
        margin: 0;
    }

    /* ── pill tags ── */
    .fp-tags { display: flex; flex-wrap: wrap; gap: 0.45rem; margin-top: 0.2rem; }

    .fp-tag {
        font-family: var(--font-mono);
        font-size: 0.58rem;
        font-weight: 600;
        letter-spacing: 0.07em;
        text-transform: uppercase;
        padding: 0.22rem 0.6rem;
        border-radius: 100px;
        border: 1px solid #393737;
        color: #999999;
        background: var(--bg-tertiary);
    }

    /* ═══════════════════════════════════════════════════
       EMAIL PREVIEW  —  mirrors actual email screenshot
    ═══════════════════════════════════════════════════ */
    .fp-email {
        margin-top: 0.75rem;
        border: 1px solid var(--border-color);
        border-radius: 12px;
        overflow: hidden;
        background: #0d110e;
        font-size: 0.775rem;
    }

    .fp-email__top {
        padding: 0.8rem 1.1rem 0.6rem;
        border-bottom: 1px solid var(--border-color);
        background: black;
    }

    .fp-email__logo {
        font-family: var(--font-mono);
        font-size: 0.72rem;
        font-weight: 700;
        color: var(--text-secondary);
        letter-spacing: 0.01em;
        margin-bottom: 0.25rem;
    }

    .fp-email__logo b { color: var(--accent); font-weight: 700; }

    .fp-email__title {
        font-size: 0.925rem;
        font-weight: 700;
        color: var(--text-primary);
        line-height: 1.3;
    }

    .fp-email__meta {
        padding: 0.55rem 1.1rem;
        font-size: 0.68rem;
        color: var(--text-muted);
        line-height: 1.5;
        background: #121212;
    }

    .fp-email__meta span { display: block; color: var(--text-secondary); margin-top: 0.12rem; }

    .fp-email__fields { padding: 0.35rem 0; background: #121212;}

    .fp-email__row {
        padding: 0.48rem 1.1rem;
    }

    .fp-email__row:last-child { border: none; }

    .fp-email__lbl {
        font-family: var(--font-mono);
        font-size: 0.58rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--text-muted);
        margin-bottom: 0.18rem;
    }

    .fp-email__val { color: var(--text-primary); font-size: 0.775rem; font-weight: 500; }
    .fp-email__val--green { color: var(--accent); }

    .fp-email__cta {
        padding: 0.7rem 1.1rem 0.75rem;
        background: #121212;
    }

    .fp-email__btn {
        display: inline-block;
        background: var(--accent);
        color: #000;
        font-family: var(--font-mono);
        font-size: 0.68rem;
        font-weight: 700;
        padding: 0.45rem 1.1rem;
        border-radius: 6px;
        letter-spacing: 0.04em;
        text-decoration: none;
        cursor: default;
    }

    .fp-email__footer {
        padding: 0.45rem 1.1rem 0.6rem;
        border-top: 1px solid var(--border-color);
        background: black;
    }

    .fp-email__footer p {
        font-size: 0.62rem;
        color: var(--text-muted);
        margin: 0 0 0.1rem;
        line-height: 1.5;
        flex: unset;
    }

    .fp-email__footer p b { color: var(--accent); font-weight: 500; }

    /* ═══════════════════════════════════════════════════
       CHAT WIDGET PREVIEW
       Accurately matches the screenshot:
       – white rounded modal
       – dark-green header with title + subtitle + ✕
       – form fields with labels
       – full-width green send button
       – circular green FAB bottom-right
    ═══════════════════════════════════════════════════ */
    .fp-chat-wrap {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 0.75rem;
        margin-top: 1.25rem;
        flex-shrink: 0;
        width: 260px;
    }

    /* the popup card */
    .fp-cw {
        width: 100%;
        background: #f5f5f5;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 40px rgba(0,0,0,0.45);
        font-size: 0.72rem;
        color: #111;
    }

    /* green header */
    .fp-cw__hdr {
        background: #2d6a4f;
        padding: 0.85rem 1rem 0.8rem;
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 0.5rem;
    }

    .fp-cw__hdr-text {}

    .fp-cw__hdr-title {
        font-size: 0.85rem;
        font-weight: 700;
        color: #fff;
        line-height: 1.2;
    }

    .fp-cw__hdr-sub {
        font-size: 0.65rem;
        color: rgba(255,255,255,0.75);
        margin-top: 0.18rem;
    }

    .fp-cw__close {
        width: 20px; height: 20px;
        border-radius: 50%;
        background: rgba(255,255,255,0.2);
        color: #fff;
        display: flex; align-items: center; justify-content: center;
        font-size: 0.6rem;
        font-weight: 700;
        flex-shrink: 0;
        margin-top: 1px;
        cursor: default;
    }

    /* body / form area */
    .fp-cw__body {
        background: #fff;
        padding: 0.85rem 0.9rem 0.75rem;
        display: flex;
        flex-direction: column;
        gap: 0.6rem;
    }

    .fp-cw__field {}

    .fp-cw__label {
        font-size: 0.62rem;
        font-weight: 600;
        color: #444;
        margin-bottom: 0.22rem;
        display: block;
    }

    .fp-cw__input {
        width: 100%;
        border: 1px solid #d8d8d8;
        border-radius: 6px;
        padding: 0.42rem 0.65rem;
        font-size: 0.65rem;
        color: #aaa;
        background: #fff;
        box-sizing: border-box;
        resize: none;
        font-family: inherit;
        line-height: 1.4;
    }

    .fp-cw__textarea {
        height: 52px;
    }

    .fp-cw__send {
        width: 100%;
        background: #2d6a4f;
        color: #fff;
        border: none;
        border-radius: 7px;
        padding: 0.6rem;
        font-size: 0.72rem;
        font-weight: 700;
        text-align: center;
        cursor: default;
        margin-top: 0.1rem;
        letter-spacing: 0.02em;
    }

    /* floating action button */
    .fp-cw__fab {
        width: 44px; height: 44px;
        background: #2d6a4f;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        box-shadow: 0 4px 18px rgba(45,106,79,0.55);
        flex-shrink: 0;
        position: relative;
    }

    /* ═══════════════════════════════════════════════════
       CODE SNIPPET
    ═══════════════════════════════════════════════════ */
    .fp-code {
        margin-top: 0.875rem;
        background: var(--bg-tertiary);
        border: 1px solid var(--border-color);
        border-radius: 10px;
        padding: 0.8rem 1.1rem;
        font-family: var(--font-mono);
        font-size: 0.9rem;
        color: var(--text-muted);
        line-height: 1.65;
        overflow-x: auto;
    }

    .fp-code .cc { opacity: 0.75; margin-bottom: 1rem; color:white; font-size: 0.8rem;}
    .fp-code .ct { color: #f08d8d; }
    .fp-code .ca { color: #87ceeb;}
    .fp-code .cs { color: var(--accent); }

    /* ═══════════════════════════════════════════════════
       STATS ROW
    ═══════════════════════════════════════════════════ */
    .fp-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .fp-stat {
        background: var(--bg-card);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        padding: 2rem 2rem;
        position: relative;
        overflow: hidden;
        transition: border-color 0.2s;
        animation: fpFade 0.5s ease 0.5s forwards;
        opacity: 0;
    }

    .fp-stat:hover { border-color: var(--border-hover); }

    .fp-stat__num {
        font-size: clamp(2.4rem, 4vw, 3.4rem);
        font-weight: 700;
        line-height: 1;
        color: var(--accent);
        letter-spacing: -0.03em;
        margin-bottom: 0.4rem;
    }

    .fp-stat__lbl { font-size: 0.85rem; color: var(--text-secondary); }

    .fp-stat__bg {
        position: absolute;
        right: 1.1rem; bottom: 0.4rem;
        font-size: 5rem; font-weight: 700;
        color: var(--border-color);
        line-height: 1;
        pointer-events: none; user-select: none;
    }

    /* ═══════════════════════════════════════════════════
       BOTTOM CTA
    ═══════════════════════════════════════════════════ */
    .fp-cta {
        border: 1px solid var(--border-color);
        border-radius: 20px;
        padding: 4rem 3rem;
        text-align: center;
        background: var(--bg-card);
        position: relative;
        overflow: hidden;
        animation: fpFade 0.5s ease 0.58s forwards;
        opacity: 0;
    }

    .fp-cta::before {
        content: '';
        position: absolute; inset: 0;
        background: radial-gradient(ellipse 70% 80% at 50% 110%, rgba(0,255,136,0.07), transparent 60%);
        pointer-events: none;
    }

    .fp-cta h2 {
        font-size: clamp(1.7rem, 3.5vw, 2.6rem);
        font-weight: 700;
        letter-spacing: -0.02em;
        margin-bottom: 0.7rem;
        position: relative;
    }

    .fp-cta > p {
        color: var(--text-secondary);
        font-size: 1rem;
        margin-bottom: 2rem;
        position: relative;
    }

    .fp-btn-row { display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap; position: relative; }

    .fp-btn-solid {
        display: inline-flex; align-items: center; gap: 0.4rem;
        background: var(--accent); color: var(--bg-primary);
        font-family: var(--font-mono); font-size: 0.78rem; font-weight: 600; letter-spacing: 0.04em;
        padding: 0.875rem 1.75rem; border-radius: 10px; text-decoration: none;
        transition: opacity 0.2s, transform 0.2s;
    }

    .fp-btn-solid:hover { opacity: 0.88; transform: translateY(-2px); }

    .fp-btn-outline {
        display: inline-flex; align-items: center; gap: 0.4rem;
        border: 1px solid var(--border-hover); color: var(--text-primary);
        font-family: var(--font-mono); font-size: 0.78rem; letter-spacing: 0.04em;
        padding: 0.875rem 1.75rem; border-radius: 10px; text-decoration: none;
        transition: border-color 0.2s, color 0.2s, transform 0.2s;
    }

    .fp-btn-outline:hover { border-color: var(--accent); color: var(--accent); transform: translateY(-2px); }

    /* ═══════════════════════════════════════════════════
       ANIMATION
    ═══════════════════════════════════════════════════ */
    @keyframes fpFade {
        from { opacity: 0; transform: translateY(18px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* ═══════════════════════════════════════════════════
       RESPONSIVE
    ═══════════════════════════════════════════════════ */
    @media (max-width: 1024px) {
        .fp-col-8  { grid-column: span 12; }
        .fp-col-4  { grid-column: span 12; }
        .fp-col-9  { grid-column: span 12; }
    }

    @media (max-width: 768px) {
        .fp-col-6  { grid-column: span 12; }
        .fp-col-3  { grid-column: span 6; }
        .fp-stats  { grid-template-columns: 1fr; }
        .fp-chat-wrap { width: 100%; }
    }

    @media (max-width: 520px) {
        .fp-col-3  { grid-column: span 12; }
        .fp { padding: 5rem 1rem 3rem; }
        .fp-cta { padding: 2.5rem 1.5rem; }
        .fp-head h1 { font-size: 2rem; }
        .fp-grid { gap: 1.5rem; }
    }
</style>

<div class="fp">
<div class="fp-wrap">

    {{-- ════════════════════════════════════════
         HERO
    ════════════════════════════════════════ --}}
    <div class="fp-head">
        <div class="hero-badge" style="margin-bottom:1.5rem;">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
            </svg>
            000Form Features • everything included
        </div>
        <h1>Everything you need.<br><em>Nothing you don't.</em></h1>
        <p>A complete form backend without the complexity — all the power, none of the server maintenance.</p>
    </div>

    {{-- ════════════════════════════════════════
         SECTION LABEL: Core features
    ════════════════════════════════════════ --}}
    <div class="fp-sep">
        <span class="fp-sep__label">Core features</span>
        <div class="fp-sep__line"></div>
    </div>

    {{-- ════════════════════════════════════════
         ROW 1 — Email (8) + Spam (4)
    ════════════════════════════════════════ --}}
    <div class="fp-grid">

        <div class="fp-card fp-col-6">
            <div class="fp-icon fp-icon--green">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                    <path d="M22 6l-10 7L2 6"/>
                </svg>
            </div>
            <h3>Instant email notifications</h3>
            <p>Every submission lands directly in your inbox — formatted exactly like below. Reply to the sender without ever opening a dashboard.</p>

            <div class="fp-email">
                <div class="fp-email__top">
                    <div class="fp-email__logo"><b>000</b>form</div>
                    <div class="fp-email__title">New submission: First form - 30 March</div>
                </div>
                <div class="fp-email__meta">
                    Received Apr 2, 2026 at 9:07 AM
                    <span>Here's what they had to say:</span>
                </div>
                <div class="fp-email__fields">
                    <div class="fp-email__row">
                        <div class="fp-email__lbl">Name</div>
                        <div class="fp-email__val">John Smith</div>
                    </div>
                    <div class="fp-email__row">
                        <div class="fp-email__lbl">Email</div>
                        <div class="fp-email__val fp-email__val--green">john@example.com</div>
                    </div>
                    <div class="fp-email__row">
                        <div class="fp-email__lbl">Message</div>
                        <div class="fp-email__val">Hey, I'm interested in working together on your next project.</div>
                    </div>
                </div>
                <div class="fp-email__cta">
                    <span class="fp-email__btn">View in Dashboard</span>
                </div>
                <div class="fp-email__footer">
                    <p>IP: <b>112.196.28.2</b></p>
                    <p>Website Submitted from: <b>yoursite.com</b></p>
                </div>
            </div>
        </div>

        <div class="fp-card fp-col-6">
            <div class="fp-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
            </div>
            <h3>Smart spam protection</h3>
            <p>Built-in honeypot fields and blacklist filtering block bots before they ever reach your inbox.</p>
            <p>Default hidden field — Google CAPTCHA is enabled!</p>
            <div class="code-block">
                            <div class="code-header"><span class="code-lang">HTML</span><button class="code-copy"><i class="bi bi-clipboard"></i> Copy</button></div>
                            <div class="code-content">
<pre><span class="comment">&lt;! Separate banned words or phrases with commas -&gt;</span>
<span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"hidden"</span> <span class="attr">name</span>=<span class="string">"_blacklist"</span>
       <span class="attr">value</span>=<span class="string">"buy now, click here, casino, free money"</span><span class="tag">&gt;</span></pre>
                            </div>
                            <div class="code-content">
<pre><span class="comment">&lt;! Hidden field — bots fill it, which triggers the block -&gt;</span>
<span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"text"</span> <span class="attr">name</span>=<span class="string">"_gotcha"</span> <span class="attr">style</span>=<span class="string">"display:none;"></span></pre>
                            </div>
                            <div class="code-content">
<pre><span class="comment">&lt;! Default hidden field — Google CAPTCHA is enabled! -&gt;</span>
</pre>
                            </div>

                        </div>
                        
            <div class="fp-tags">
                <span class="fp-tag">Honeypot</span>
                <span class="fp-tag">Blacklisting</span>
                <span class="fp-tag">Captcha</span>
            </div>
        </div>

    </div>{{-- /row 1 --}}

    {{-- ════════════════════════════════════════
         ROW 2 — Dashboard (4) + Analytics (4) + AJAX (4)
    ════════════════════════════════════════ --}}
    <div class="fp-grid">

        <div class="fp-card fp-col-4">
            <div class="fp-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="18" height="18" rx="2"/>
                    <path d="M3 9h18M9 21V9"/>
                </svg>
            </div>
            <h3>Submission dashboard</h3>
            <p>All your responses, searchable and filterable in one place. Never lose a submission again.</p>
            <div class="fp-tags">
                <span class="fp-tag">Filter &amp; search</span>
                <span class="fp-tag">Full history</span>
            </div>
        </div>

        <div class="fp-card fp-col-4">
            <div class="fp-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
                </svg>
            </div>
            <h3>Analytics &amp; trends</h3>
            <p>Visualize submission volumes over time. Spot drop-offs or spikes at a glance.</p>
            <div class="fp-tags">
                <span class="fp-tag">Volume graphs</span>
                <span class="fp-tag">Per-form stats</span>
            </div>
        </div>

        <div class="fp-card fp-col-4">
            <div class="fp-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="16 18 22 12 16 6"/>
                    <polyline points="8 6 2 12 8 18"/>
                </svg>
            </div>
            <h3>AJAX / fetch support</h3>
            <p>Submit without page reloads. Full JSON API — works with React, Vue, vanilla JS, anything.</p>
            <div class="fp-tags">
                <span class="fp-tag">JSON API</span>
                <span class="fp-tag">CORS ready</span>
            </div>
        </div>

    </div>{{-- /row 2 --}}

    {{-- ════════════════════════════════════════
         ROW 3 — CSV (3) + Team (3) + File uploads (6)
    ════════════════════════════════════════ --}}
    <div class="fp-grid">

        <div class="fp-card fp-col-4">
            <div class="fp-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                    <polyline points="7 10 12 15 17 10"/>
                    <line x1="12" y1="15" x2="12" y2="3"/>
                </svg>
            </div>
            <h3>CSV export</h3>
            <p>Download all submissions at any time. Your data belongs to you — always portable.</p>
            <div class="fp-tags">
                <span class="fp-tag">One-click</span>
                <span class="fp-tag">All fields</span>
            </div>
        </div>

        <div class="fp-card fp-col-4">
            <div class="fp-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
            <h3>Team access</h3>
            <p>Invite teammates to view and manage submissions together on paid plans.</p>
            <div class="fp-tags">
                <span class="fp-tag">Multi-user</span>
                <span class="fp-tag">Role access</span>
            </div>
        </div>

        <div class="fp-card fp-col-4">
            <div class="fp-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                    <polyline points="17 8 12 3 7 8"/>
                    <line x1="12" y1="3" x2="12" y2="15"/>
                </svg>
            </div>
            <h3>File uploads</h3>
            <p>Accept file attachments directly through your forms. Stored securely, always accessible from your dashboard.</p>
            <div class="fp-tags">
                <span class="fp-tag">Up to 10MB</span>
                <span class="fp-tag">Secure storage</span>
            </div>
        </div>

    </div>{{-- /row 3 --}}

    {{-- ════════════════════════════════════════
         SECTION LABEL: Add-ons
    ════════════════════════════════════════ --}}
    <div class="fp-sep" style="margin-top:0.5rem;">
        <span class="fp-sep__label">Optional add-ons</span>
        <div class="fp-sep__line"></div>
    </div>

    {{-- ════════════════════════════════════════
         ROW 4 — Chat Widget (full width)
         Left: description + code
         Right: accurate widget preview
    ════════════════════════════════════════ --}}
    <div class="fp-grid" style="margin-bottom:1.5rem;">
        <div class="fp-card fp-col-12" style="flex-direction:row; align-items:flex-start; gap:2.5rem; flex-wrap:wrap;">

            {{-- LEFT: description --}}
            <div style="flex:1; min-width:280px; display:flex; flex-direction:column; gap:0.9rem;">
                <div class="fp-icon fp-icon--green">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                    </svg>
                </div>

                <h3>
                    Chat Widget
                    <span style="font-family:var(--font-mono);font-size:0.58rem;font-weight:700;letter-spacing:0.07em;text-transform:uppercase;padding:0.2rem 0.55rem;border-radius:100px;border:1px solid rgba(0,255,136,0.35);color:var(--accent);background:rgba(0,255,136,0.08);vertical-align:middle;margin-left:0.5rem;">Optional</span>
                </h3>

                <p>Add a beautiful floating chat button to any page with a single line of code. Visitors fill in a short contact form — messages go straight to your email and submission dashboard. No backend, no server, no friction.</p>

                <div class="fp-tags">
                    <span class="fp-tag">💬 Live chat</span>
                    <span class="fp-tag">📱 Responsive</span>
                    <span class="fp-tag">🔔 Badge notifications</span>
                </div>

                <div class="fp-code">
                    <div class="cc">&lt;-- Replace YOUR_FORM_ID with your actual form ID --&gt;</div>
                    <div>
                        <span class="ct">&lt;script</span>
                        <span class="ca"> src=</span><span class="cs">"https://000form.com/widget/YOUR_FORM_ID/widget.js"</span>
                        <span class="ca"> defer</span><span class="ct">&gt;&lt;/script&gt;</span>
                    </div>
                </div>
            </div>

            {{-- RIGHT: accurate chat widget preview --}}
            <div class="fp-chat-wrap">

                {{-- Popup modal --}}
                <div class="fp-cw">
                    {{-- Dark green header --}}
                    <div class="fp-cw__hdr">
                        <div class="fp-cw__hdr-text">
                            <div class="fp-cw__hdr-title">Contact Us</div>
                            <div class="fp-cw__hdr-sub">We'll get back to you as soon as possible.</div>
                        </div>
                        <div class="fp-cw__close">✕</div>
                    </div>

                    {{-- Form body --}}
                    <div class="fp-cw__body">
                        <div class="fp-cw__field">
                            <label class="fp-cw__label">Your Name</label>
                            <div class="fp-cw__input">Enter your name</div>
                        </div>
                        <div class="fp-cw__field">
                            <label class="fp-cw__label">Email Address</label>
                            <div class="fp-cw__input">your-email@example.com</div>
                        </div>
                        <div class="fp-cw__field">
                            <label class="fp-cw__label">Message</label>
                            <div class="fp-cw__input fp-cw__textarea">How can we help?</div>
                        </div>
                        <div class="fp-cw__send">Send Message</div>
                    </div>
                </div>

                {{-- Floating action button --}}
                <div class="fp-cw__fab">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.2">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                    </svg>
                </div>

            </div>{{-- /fp-chat-wrap --}}
        </div>
    </div>{{-- /row 4 --}}

    {{-- ════════════════════════════════════════
         BOTTOM CTA
    ════════════════════════════════════════ --}}
    <div class="fp-cta">
        <h2>Ready to ship your forms?</h2>
        <p>Point your form at your endpoint and go live in minutes — no server needed.</p>
        <div class="fp-btn-row">
            <a href="{{ route('signup') }}" class="fp-btn-solid">Get started free →</a>
            <a href="{{ route('docs') }}"   class="fp-btn-outline">Read the docs</a>
        </div>
    </div>

</div>
</div>

@endsection