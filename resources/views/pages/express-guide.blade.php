@extends('layouts.express')

@section('title', 'Express Guide - 000form')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    /* ─────────────────────────────────────────────────────────────
   MOBILE RESPONSIVENESS (Below 860px)
   ───────────────────────────────────────────────────────────── */
    @media (max-width: 860px) {
        /* 1. FORCE SCROLLING: Undo the desktop 'overflow: hidden' */
        html, body {
            height: auto !important;
            overflow-y: auto !important;
            overflow-x: hidden !important;
        }

        /* 2. RESET LAYOUT: Change grid to a single column */
        .docs-layout {
            display: flex !important;
            flex-direction: column !important;
            height: auto !important;
            gap: 1.5rem !important;
        }

        /* 3. WRAPPER SPACING: Give more room for the fixed header */
        .docs-wrap {
            height: auto !important;
            padding: 6rem 1rem 3rem !important;
        }

        /* 4. HIDE SIDEBAR: Standard practice for mobile docs 
        (Or you can keep it, but it takes up too much space) */
        .docs-nav {
            display: none !important;
        }

        /* 5. RESET MAIN CONTENT: Remove fixed heights and custom scrolls */
        .docs-layout > div {
            height: auto !important;
            overflow-y: visible !important;
            padding-right: 0 !important;
        }

        /* 6. TYPOGRAPHY: Scale down for small screens */
        .hero-title2 {
            font-size: 1.8rem !important;
            line-height: 1.2;
        }
        
        .hero-description {
            font-size: 14px !important;
        }

        /* 7. QUICK START CARDS: Stack them */
        .qs-grid {
            grid-template-columns: 1fr !important;
        }

        /* 8. TABLES: Enable horizontal scroll for small screens */
        .sf-table {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        
        /* 9. CODE BLOCKS: Prevent clipping */
        .code-content pre {
            font-size: 12px !important;
            white-space: pre-wrap !important; /* Optional: wraps long lines */
            word-break: break-all !important;
        }
    }

    /* ─────────────────────────────────────────────────────────────
    EXTRA SMALL DEVICES (Below 480px)
    ───────────────────────────────────────────────────────────── */
    @media (max-width: 480px) {
        .docs-section-header {
            padding: 1.2rem 1rem 0 !important;
        }
        .docs-section-body {
            padding: 0 1rem 1.5rem !important;
        }
        .hero-title2 {
            font-size: 1.5rem !important;
        }
    }

    /* ========== BLUE THEME (replaces green) ========== */
    :root {
        --blue:          #3b82f6;
        --blue-bright:   #60a5fa;
        --blue-dim:      #1d4ed8;
        --blue-glow:     rgba(59,130,246,0.15);
        --blue-glow-2:   rgba(59,130,246,0.08);
        --blue-border:   rgba(59,130,246,0.25);
        --text-primary:  #f0f0f0;
        --text-secondary: #9ca3af;
        --border-subtle: #1e1e1e;
        --bg-surface:    #0d0d0d;
        --bg-elevated:   #0a0a0a;
        --card-hover:    #111111;
    }

    .docs-wrap { padding: 8rem 0 5rem; }

    .docs-layout {
        display: grid;
        grid-template-columns: 230px 1fr;
        gap: 3rem;
        align-items: start;
    }

    /* ── Sidebar ── */
    .docs-nav {
        position: sticky; top: 6rem;
        border: 1px solid var(--border-subtle); border-radius: 10px;
        padding: 1.25rem 0; background: var(--bg-surface);
    }
    .docs-nav-label {
        font-size: 10px; font-weight: 700; letter-spacing: 1.5px;
        text-transform: uppercase; color: #3a3a3a;
        padding: 0 1.25rem; margin-bottom: 0.4rem; margin-top: 1.1rem;
    }
    .docs-nav-label:first-child { margin-top: 0; }
    .docs-nav a {
        display: flex; align-items: center; gap: 0.55rem;
        padding: 0.38rem 1.25rem; font-size: 18px; color: #666;
        text-decoration: none; transition: color 0.15s;
        border-left: 2px solid transparent; margin-left: -1px;
    }
    .docs-nav a i { font-size: 13px; flex-shrink: 0; }
    .docs-nav a:hover { color: #ccc; }
    .docs-nav a.active { color: var(--blue-bright); border-left-color: var(--blue); }

    /* ── Section cards – cleaner spacing, no heavy separators ── */
    .docs-section {
        margin-bottom: 3rem;           /* increased space between sections */
        border: 1px solid var(--border-subtle);
        border-radius: 16px;
        overflow: hidden;
        background: var(--bg-surface);
        transition: border-color 0.2s;
    }
    .docs-section:hover {
        border-color: #2a2a2a;
    }
    .docs-section-header { padding: 1.8rem 2rem 0; }
    .docs-section-header h2 {
        font-size: 1.4rem; font-weight: 600; color: var(--text-primary);
        margin: 0 0 0.5rem; display: flex; align-items: center; gap: 0.7rem;
    }
    .docs-section-header h2 .sec-icon {
        width: 34px; height: 34px; border-radius: 10px;
        background: var(--bg-elevated); border: 1px solid #222;
        display: inline-flex; align-items: center; justify-content: center;
        font-size: 16px; color: var(--blue); flex-shrink: 0;
    }
    .docs-section-header p {
        font-size: 15px; color: var(--text-secondary);
        margin: 0 0 1.25rem; line-height: 1.6;
    }
    .docs-section-body { padding: 0 2rem 2rem; }

    /* ── Code blocks ── */
    .code-block {
        border-radius: 12px; overflow: hidden;
        border: 1px solid var(--border-subtle); margin-bottom: 1.5rem;
    }
    .code-block:last-child { margin-bottom: 0; }
    .code-header {
        display: flex; align-items: center; justify-content: space-between;
        padding: 0.6rem 1.2rem; background: #111; border-bottom: 1px solid var(--border-subtle);
    }
    .code-lang {
        font-size: 11px; font-weight: 700; letter-spacing: 1px;
        text-transform: uppercase; color: var(--blue); font-family: 'Courier New', monospace;
    }
    .code-copy {
        display: flex; align-items: center; gap: 4px;
        font-size: 11px; color: #555; background: none;
        border: 1px solid #2a2a2a; border-radius: 4px;
        padding: 2px 9px; cursor: pointer; transition: all 0.15s;
    }
    .code-copy:hover { color: var(--blue); border-color: var(--blue); }
    .code-content { padding: 1.2rem 1.5rem; background: #080808; overflow-x: auto; }
    .code-content pre {
        margin: 0; font-family: 'Courier New', monospace;
        font-size: 13.5px; line-height: 1.75; color: #c9c9c9;
    }
    .tag    { color: #7dd3a8; }
    .attr   { color: #9ecbff; }
    .string { color: #f8c77e; }
    .comment{ color: #4a4a4a; font-style: italic; }
    .kw     { color: #c792ea; }
    .fn     { color: #82aaff; }
    .str2   { color: #c3e88d; }
    .num    { color: #f78c6c; }

    /* ── Tables ── */
    .sf-table {
        width: 100%; border-collapse: collapse; font-size: 14px;
        border-radius: 12px; overflow: hidden; border: 1px solid #1a1a1a;
    }
    .sf-table th {
        text-align: left; font-size: 11px; font-weight: 700;
        letter-spacing: 1px; text-transform: uppercase; color: #444;
        padding: 0.75rem 1.2rem; border-bottom: 1px solid #1a1a1a; background: #0a0a0a;
    }
    .sf-table td { padding: 0.9rem 1.2rem; border-bottom: 1px solid #141414; vertical-align: top; }
    .sf-table tr:last-child td { border-bottom: none; }
    .sf-table tr:hover td { background: var(--card-hover); }
    .sf-table td:first-child { width: 160px; white-space: nowrap; }
    .sf-table td code {
        font-family: 'Courier New', monospace; font-size: 12.5px;
        background: #141414; border: 1px solid #222; border-radius: 4px;
        padding: 2px 7px; color: var(--blue);
    }
    .sf-table td:last-child { color: #9ca3af; line-height: 1.65; }
    .sf-table td:last-child .note { display: block; font-size: 12px; color: #444; margin-top: 3px; }

    /* ── Inline code ── */
    .ic {
        font-family: 'Courier New', monospace; font-size: 12.5px;
        background: #141414; border: 1px solid #222; border-radius: 4px;
        padding: 2px 7px; color: var(--blue);
    }

    /* ── Badges (blue accented) ── */
    .badge {
        display: inline-flex; align-items: center; gap: 3px;
        font-size: 10.5px; font-weight: 700; letter-spacing: 0.4px;
        text-transform: uppercase; padding: 2px 8px; border-radius: 4px;
        vertical-align: middle; margin-left: 4px;
    }
    .badge-green  { background: var(--blue-glow); color: var(--blue-bright); border: 1px solid var(--blue-border); }
    .badge-yellow { background: rgba(96,165,250,0.12); color: var(--blue-bright); border: 1px solid var(--blue-border); }
    .badge-blue   { background: var(--blue-glow); color: var(--blue-bright); border: 1px solid var(--blue-border); }

    /* ── Note boxes (blue left border) ── */
    .note-box {
        background: #0f0f0f; border: 1px solid var(--border-subtle);
        border-left: 3px solid var(--blue); border-radius: 8px;
        padding: 1rem 1.2rem; font-size: 14px; color: #9ca3af;
        margin-top: 1.2rem; line-height: 1.65;
        display: flex; gap: 0.7rem; align-items: flex-start;
    }
    .note-box i { color: var(--blue); font-size: 16px; margin-top: 2px; flex-shrink: 0; }
    .note-box strong { color: #bbb; }

    /* ── Quick Start grid ── */
    .qs-grid {
        display: grid; grid-template-columns: 1fr 1fr;
        gap: 1.25rem; margin-bottom: 1.5rem;
    }
    .qs-card {
        background: var(--bg-elevated); border: 1px solid var(--border-subtle);
        border-radius: 14px; padding: 1.4rem;
        display: flex; gap: 1rem; align-items: flex-start;
        transition: border-color 0.2s, transform 0.1s;
    }
    .qs-card:hover { border-color: #2a2a2a; }
    .qs-card-icon {
        width: 42px; height: 42px; border-radius: 12px;
        background: #111; border: 1px solid var(--border-subtle);
        display: flex; align-items: center; justify-content: center;
        font-size: 20px; color: var(--blue); flex-shrink: 0;
    }
    .qs-num {
        font-size: 10px; font-weight: 700; color: var(--blue);
        letter-spacing: 1px; text-transform: uppercase; margin-bottom: 5px;
    }
    .qs-card-body h4 { font-size: 15px; font-weight: 600; color: #e0e0e0; margin: 0 0 0.4rem; }
    .qs-card-body p  { font-size: 13.5px; color: #8b8b8b; margin: 0; line-height: 1.55; }
    .qs-card-body a  { color: var(--blue); text-decoration: none; }
    .qs-card-body a:hover { text-decoration: underline; }

    /* ── Limits list ── */
    .limits-list { list-style: none; padding: 0; margin: 0; }
    .limits-list li {
        display: flex; align-items: center; gap: 0.85rem;
        padding: 0.9rem 0; border-bottom: 1px solid #141414;
        font-size: 14.5px; color: #9ca3af;
    }
    .limits-list li:last-child { border-bottom: none; }
    .limits-list li i { color: var(--blue); font-size: 16px; flex-shrink: 0; }

    /* ── Group labels – cleaner, no heavy separators, just soft spacing ── */
    .section-group-label {
        margin: 2.2rem 0 1.2rem;
        display: flex; align-items: center; gap: 0.6rem;
    }
    .section-group-label span {
        font-size: 12px; font-weight: 700; letter-spacing: 1px;
        text-transform: uppercase; color: #4a4a4a; white-space: nowrap;
    }
    .section-group-label::after {
        content: ''; flex: 1; height: 1px; background: #1f1f1f;
    }

    /* subheading under group */
    .group-sub {
        font-size: 14px; color: #5a5a5a; margin: -0.5rem 0 1.5rem;
        line-height: 1.5;
    }

    /* ── CTA ── */
    .docs-cta {
        text-align: center;
        margin-top: 2rem;
        padding: 1rem 0 2rem;
    }
    .docs-cta p { color: #7a7a7a; font-size: 14.5px; margin-bottom: 1.2rem; }

    /* Hero overrides (blue highlights) */
    .hero-badge svg { stroke: var(--blue); }
    .highlight { color: var(--blue); }

    /* Buttons (blue primary) */
    .btn {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 0.6rem 1.4rem; border-radius: 40px; font-weight: 500;
        text-decoration: none; transition: all 0.2s; font-size: 14px;
    }
    .btn-primary {
        background: var(--blue); color: white; border: none;
    }
    .btn-primary:hover {
        background: var(--blue-dim); transform: translateY(-1px);
    }
    .btn-secondary {
        background: #111; border: 1px solid #2a2a2a; color: #ccc;
    }
    .btn-secondary:hover {
        border-color: var(--blue); color: var(--blue);
    }

    /* responsiveness */
    @media (max-width: 860px) {
        .docs-layout { grid-template-columns: 1fr; }
        .docs-nav { display: none; }
        .qs-grid { grid-template-columns: 1fr; }
        .docs-section-header { padding: 1.2rem 1.2rem 0; }
        .docs-section-body { padding: 0 1.2rem 1.2rem; }
    }

    .docs-title {
        font-size: clamp(2.5rem, 5vw, 3.5rem);
        font-weight: 700;
        color: var(--text-primary);
        letter-spacing: -0.03em;
        margin-bottom: 0.5rem;
    }

    /* extra white space between sections - already margin-bottom on .docs-section */
    .docs-section + .section-group-label {
        margin-top: 1rem;
    }
</style>

<div class="docs-wrap">
    <section class="library-hero">
        <div class="container">
            <div class="hero-content" style="margin-bottom: 3.5rem;">
                <div class="hero-badge">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                        <path d="M2 17l10 5 10-5"/>
                        <path d="M2 12l10 5 10-5"/>
                    </svg>
                    Guide • Simplify your workflow
                </div>
                
                <h1 class="hero-title2">
                    Guides and references for <br><span class="highlight">every feature.</span>
                </h1>
                
                <p class="hero-description">
                    Browse our collection of clear, ready-to-use documentation. 
                    Explore clear, practical guides with ready-to-use examples so you can implement, customize, and launch in minutes.
                </p>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="docs-layout">
            {{-- ── SIDEBAR ── --}}
            <nav class="docs-nav">
                <div class="docs-nav-label">Getting Started</div>
                <a href="#quickstart"><i class="bi bi-lightning-charge"></i> Quick Start</a>
                <a href="#basic-form"><i class="bi bi-code-slash"></i> Basic HTML Form</a>

                <div class="docs-nav-label">Special Fields</div>
                <a href="#subject"><i class="bi bi-chat-left-text"></i> _subject</a>
                <a href="#replyto"><i class="bi bi-reply"></i> _replyto</a>
                <a href="#cc"><i class="bi bi-people"></i> _cc</a>
                <a href="#next"><i class="bi bi-arrow-right-circle"></i> _next</a>
                <a href="#template"><i class="bi bi-palette"></i> _template</a>
                <a href="#auto-response"><i class="bi bi-robot"></i> _auto-response</a>
                <a href="#blacklist"><i class="bi bi-slash-circle"></i> _blacklist</a>

                <div class="docs-nav-label">Features</div>
                <a href="#spam"><i class="bi bi-shield-check"></i> Spam Protection</a>
                <a href="#uploads"><i class="bi bi-paperclip"></i> File Uploads</a>
                <a href="#ajax"><i class="bi bi-braces"></i> AJAX / JavaScript</a>

            </nav>

            {{-- ── MAIN CONTENT (increased spacing between sections) ── --}}
            <div>

                {{-- Quick Start --}}
                <div class="docs-section" id="quickstart">
                    <div class="docs-section-header">
                        <h2>
                            <span class="sec-icon"><i class="bi bi-lightning-charge-fill"></i></span>
                            Quick Start
                        </h2>
                        <p>Get a working contact form in under 2 minutes. No backend code needed &mdash; just HTML.</p>
                    </div>
                    <div class="docs-section-body">
                        <div class="qs-grid">
                            <div class="qs-card">
                                <div class="qs-card-icon"><i class="bi bi-person-plus"></i></div>
                                <div class="qs-card-body">
                                    <div class="qs-num">Step 1</div>
                                    <h4>Create a free account</h4>
                                    <p>Sign up at <a href="{{ route('signup') }}">000form.com</a></p>
                                </div>
                            </div>
                            <div class="qs-card">
                                <div class="qs-card-icon"><i class="bi bi-plus-square"></i></div>
                                <div class="qs-card-body">
                                    <div class="qs-num">Step 2</div>
                                    <h4>Create a form</h4>
                                    <p>create form & copy your unique endpoint.</p>
                                </div>
                            </div>
                            <div class="qs-card">
                                <div class="qs-card-icon"><i class="bi bi-link-45deg"></i></div>
                                <div class="qs-card-body">
                                    <div class="qs-num">Step 3</div>
                                    <h4>Point your form to it</h4>
                                    <p>Set your HTML form's <span class="ic">action</span> to your endpoint URL and <span class="ic">method</span> to <span class="ic">POST</span>.</p>
                                </div>
                            </div>
                            <div class="qs-card">
                                <div class="qs-card-icon"><i class="bi bi-check2-circle"></i></div>
                                <div class="qs-card-body">
                                    <div class="qs-num">Step 4</div>
                                    <h4>You're done!</h4>
                                    <p>Every submission goes straight to your email and shows up in your dashboard.</p>
                                </div>
                            </div>
                        </div>
                        <div class="note-box">
                            <i class="bi bi-play-circle-fill"></i>
                            <span>Not ready to sign up yet? <a href="{{ route('playground.index') }}" style="color:var(--blue);text-decoration:none;font-weight:600;">Try the Playground</a> &mdash; test everything right now with no account needed.</span>
                        </div>
                    </div>
                </div>

                {{-- Basic HTML Form --}}
                <div class="docs-section" id="basic-form">
                    <div class="docs-section-header">
                        <h2>
                            <span class="sec-icon"><i class="bi bi-code-slash"></i></span>
                            Basic HTML Form
                        </h2>
                        <p>The simplest setup &mdash; just point your form's <span class="ic">action</span> to your endpoint URL and you're ready to go.</p>
                    </div>
                    <div class="docs-section-body">
                        <div class="code-block">
                            <div class="code-header">
                                <span class="code-lang">HTML</span>
                                <button class="code-copy"><i class="bi bi-clipboard"></i> Copy</button>
                            </div>
                            <div class="code-content">
<pre><span class="tag">&lt;form</span> <span class="attr">action</span>=<span class="string">"https://000form.com/f/YOUR_FORM_ID"</span> <span class="attr">method</span>=<span class="string">"POST"</span><span class="tag">&gt;</span>

  <span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"text"</span>  <span class="attr">name</span>=<span class="string">"name"</span>    <span class="attr">placeholder</span>=<span class="string">"Your name"</span>    <span class="attr">required</span><span class="tag">&gt;</span>
  <span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"email"</span> <span class="attr">name</span>=<span class="string">"email"</span>   <span class="attr">placeholder</span>=<span class="string">"Your email"</span>   <span class="attr">required</span><span class="tag">&gt;</span>
  <span class="tag">&lt;textarea</span>           <span class="attr">name</span>=<span class="string">"message"</span> <span class="attr">placeholder</span>=<span class="string">"Your message"</span><span class="tag">&gt;&lt;/textarea&gt;</span>

  <span class="tag">&lt;button</span> <span class="attr">type</span>=<span class="string">"submit"</span><span class="tag">&gt;</span>Send<span class="tag">&lt;/button&gt;</span>

<span class="tag">&lt;/form&gt;</span></pre>
                            </div>
                        </div>
                        <div class="note-box">
                            <i class="bi bi-info-circle-fill"></i>
                            <span>Name your email field <strong>email</strong> and we'll automatically set it as the reply-to address &mdash; so you can reply directly to the person from your inbox.</span>
                        </div>
                    </div>
                </div>

                {{-- Special Fields group label --}}
                <div class="section-group-label"><span>Special Fields</span></div>
                <div class="group-sub">Add these as hidden inputs to your form to turn on extra features. All of them are optional &mdash; only use the ones you need.</div>

                {{-- _subject --}}
                <div class="docs-section" id="subject">
                    <div class="docs-section-header">
                        <h2>
                            <span class="sec-icon"><i class="bi bi-chat-left-text"></i></span>
                            _subject
                            <span class="badge badge-green"><i class="bi bi-circle"></i> Optional</span>
                        </h2>
                        <p>Set a custom subject line on the email you receive. If you don't add this, the subject will be <span class="ic">New Form Submission from 000form</span>.</p>
                    </div>
                    <div class="docs-section-body">
                        <div class="code-block">
                            <div class="code-header"><span class="code-lang">HTML</span><button class="code-copy"><i class="bi bi-clipboard"></i> Copy</button></div>
                            <div class="code-content">
<pre><span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"hidden"</span> <span class="attr">name</span>=<span class="string">"_subject"</span> <span class="attr">value</span>=<span class="string">"New contact from website"</span><span class="tag">&gt;</span></pre>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- _replyto --}}
                <div class="docs-section" id="replyto">
                    <div class="docs-section-header">
                        <h2>
                            <span class="sec-icon"><i class="bi bi-reply"></i></span>
                            _replyto
                            <span class="badge badge-green"><i class="bi bi-circle"></i> Optional</span>
                        </h2>
                        <p>Name your email field <span class="ic">email</span> and we'll automatically set it as the reply-to address — so you can reply directly to the person from your inbox.</p>
                    </div>
                    <div class="docs-section-body">
                        <div class="code-block">
                            <div class="code-header"><span class="code-lang">HTML</span><button class="code-copy"><i class="bi bi-clipboard"></i> Copy</button></div>
                            <div class="code-content">
<pre><span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"email"</span> <span class="attr">name</span>=<span class="string">"email"</span> <span class="attr">placeholder</span>=<span class="string">"Your email"</span><span class="tag">&gt;</span></pre>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- _cc --}}
                <div class="docs-section" id="cc">
                    <div class="docs-section-header">
                        <h2>
                            <span class="sec-icon"><i class="bi bi-people"></i></span>
                            _cc
                            <span class="badge badge-green"><i class="bi bi-circle"></i> Optional</span>
                        </h2>
                        <p>Send a copy of the notification email to one or more extra addresses.</p>
                    </div>
                    <div class="docs-section-body">
                        <div class="code-block">
                            <div class="code-header"><span class="code-lang">HTML</span><button class="code-copy"><i class="bi bi-clipboard"></i> Copy</button></div>
                            <div class="code-content">
<pre><span class="comment">&lt;!-- One address --&gt;</span>
<span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"hidden"</span> <span class="attr">name</span>=<span class="string">"_cc"</span> <span class="attr">value</span>=<span class="string">"team@yourcompany.com"</span><span class="tag">&gt;</span>

<span class="comment">&lt;!-- Multiple addresses — separate with commas --&gt;</span>
<span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"hidden"</span> <span class="attr">name</span>=<span class="string">"_cc"</span> <span class="attr">value</span>=<span class="string">"sales@co.com, support@co.com"</span><span class="tag">&gt;</span></pre>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- _next --}}
                <div class="docs-section" id="next">
                    <div class="docs-section-header">
                        <h2>
                            <span class="sec-icon"><i class="bi bi-arrow-right-circle"></i></span>
                            _next
                            <span class="badge badge-green"><i class="bi bi-circle"></i> Optional</span>
                        </h2>
                        <p>Send the user to your own thank-you page after they submit.</p>
                    </div>
                    <div class="docs-section-body">
                        <div class="code-block">
                            <div class="code-header"><span class="code-lang">HTML</span><button class="code-copy"><i class="bi bi-clipboard"></i> Copy</button></div>
                            <div class="code-content">
<pre><span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"hidden"</span> <span class="attr">name</span>=<span class="string">"_next"</span> <span class="attr">value</span>=<span class="string">"https://yoursite.com/thank-you"</span><span class="tag">&gt;</span></pre>
                            </div>
                        </div>
                        <div class="note-box">
                            <i class="bi bi-info-circle-fill"></i>
                            <span>When using AJAX, <span class="ic">_next</span> comes back in the JSON response as <span class="ic">redirect</span>.</span>
                        </div>
                    </div>
                </div>

                {{-- _template --}}
                <div class="docs-section" id="template">
                    <div class="docs-section-header">
                        <h2>
                            <span class="sec-icon"><i class="bi bi-palette"></i></span>
                            _template
                            <span class="badge badge-blue"><i class="bi bi-grid"></i> 3 options</span>
                        </h2>
                        <p>Choose how your notification email looks. Default is <span class="ic">basic</span>.</p>
                    </div>
                    <div class="docs-section-body">
                        <table class="sf-table" style="margin-bottom:1.1rem;">
                            <thead><th>Value</th><th>What it looks like</th> </thead>
                            <tbody>
                                <tr><td><code>basic</code></td><td>Simple list — one field per row.<span class="note">Used by default.</span></td></tr>
                                <tr><td><code>box</code></td><td>Each field gets its own bordered box. Images show as previews.</td></tr>
                                <tr><td><code>table</code></td><td>Two-column table — field name on left, value on right.</td></tr>
                            </tbody>
                        </table>
                        <div class="code-block">
                            <div class="code-header"><span class="code-lang">HTML</span><button class="code-copy"><i class="bi bi-clipboard"></i> Copy</button></div>
                            <div class="code-content">
<pre><span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"hidden"</span> <span class="attr">name</span>=<span class="string">"_template"</span> <span class="attr">value</span>=<span class="string">"basic"</span><span class="tag">&gt;</span>   <span class="comment">&lt;!-- default --&gt;</span>
<span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"hidden"</span> <span class="attr">name</span>=<span class="string">"_template"</span> <span class="attr">value</span>=<span class="string">"box"</span><span class="tag">&gt;</span>
<span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"hidden"</span> <span class="attr">name</span>=<span class="string">"_template"</span> <span class="attr">value</span>=<span class="string">"table"</span><span class="tag">&gt;</span></pre>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- _auto-response --}}
                <div class="docs-section" id="auto-response">
                    <div class="docs-section-header">
                        <h2>
                            <span class="sec-icon"><i class="bi bi-robot"></i></span>
                            _auto-response
                            <span class="badge badge-green"><i class="bi bi-circle"></i> Optional</span>
                        </h2>
                        <p>Send an automatic reply to the person who filled in your form.</p>
                    </div>
                    <div class="docs-section-body">
                        <div class="code-block">
                            <div class="code-header"><span class="code-lang">HTML</span><button class="code-copy"><i class="bi bi-clipboard"></i> Copy</button></div>
                            <div class="code-content">
<pre><span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"hidden"</span> <span class="attr">name</span>=<span class="string">"_auto-response"</span>
       <span class="attr">value</span>=<span class="string">"Thanks for getting in touch! We'll get back to you shortly."</span><span class="tag">&gt;</span></pre>
                            </div>
                        </div>
                        <div class="note-box">
                            <i class="bi bi-shield-check"></i>
                            <span>If a submission gets blocked by <span class="ic">_blacklist</span>, the auto-response is still sent.</span>
                        </div>
                    </div>
                </div>

                {{-- _blacklist --}}
                <div class="docs-section" id="blacklist">
                    <div class="docs-section-header">
                        <h2>
                            <span class="sec-icon"><i class="bi bi-slash-circle"></i></span>
                            _blacklist
                            <span class="badge badge-yellow"><i class="bi bi-funnel"></i> Spam filter</span>
                        </h2>
                        <p>Block submissions that contain certain words.</p>
                    </div>
                    <div class="docs-section-body">
                        <div class="code-block">
                            <div class="code-header"><span class="code-lang">HTML</span><button class="code-copy"><i class="bi bi-clipboard"></i> Copy</button></div>
                            <div class="code-content">
<pre><span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"hidden"</span> <span class="attr">name</span>=<span class="string">"_blacklist"</span>
       <span class="attr">value</span>=<span class="string">"buy now, click here, casino, free money"</span><span class="tag">&gt;</span></pre>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Features group label --}}
                <div class="section-group-label"><span>Features</span></div>

                {{-- Spam Protection --}}
<div class="docs-section" id="spam">
    <div class="docs-section-header">
        <h2>
            <span class="sec-icon"><i class="bi bi-shield-check"></i></span>
            Spam Protection
            <span class="badge badge-blue"><i class="bi bi-shield"></i> 2 Methods</span>
        </h2>
        <p>Protect your forms from spam using honeypot traps or built-in CAPTCHA verification.</p>
    </div>
    <div class="docs-section-body">
        
        {{-- Honeypot Method --}}
        <h3 style="font-size: 1.1rem; font-weight: 600; color: #e0e0e0; margin: 0 0 0.75rem 0;">
            <i class="bi bi-bug" style="color: var(--blue); margin-right: 0.5rem;"></i>
            Method 1: Honeypot Trap
        </h3>
        <p style="font-size: 14px; color: #9ca3af; margin-bottom: 1rem;">
            Add a hidden field that spam bots fill in automatically. Real users never see it, so only bots trigger it.
        </p>
        <div class="code-block">
            <div class="code-header"><span class="code-lang">HTML</span><button class="code-copy"><i class="bi bi-clipboard"></i> Copy</button></div>
            <div class="code-content">
<pre><span class="comment">&lt;!-- Hidden honeypot field — bots fill it, humans don't --&gt;</span>
<span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"text"</span> <span class="attr">name</span>=<span class="string">"_gotcha"</span>
       <span class="attr">style</span>=<span class="string">"display:none;"</span> <span class="attr">tabindex</span>=<span class="string">"-1"</span> <span class="attr">autocomplete</span>=<span class="string">"off"</span><span class="tag">&gt;</span></pre>
            </div>
        </div>

        {{-- CAPTCHA Method --}}
        <h3 style="font-size: 1.1rem; font-weight: 600; color: #e0e0e0; margin: 2rem 0 0.75rem 0;">
            <i class="bi bi-robot" style="color: var(--blue); margin-right: 0.5rem;"></i>
            Method 2: CAPTCHA Protection
        </h3>
        <p style="font-size: 14px; color: #9ca3af; margin-bottom: 1rem;">
            Enable our built-in CAPTCHA to block automated submissions. Simply add this hidden field to your form.
        </p>
        <div class="code-block">
            <div class="code-header"><span class="code-lang">HTML</span><button class="code-copy"><i class="bi bi-clipboard"></i> Copy</button></div>
            <div class="code-content">
<pre><span class="comment">&lt;!-- Enable CAPTCHA protection — requires user verification --&gt;</span>
<span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"hidden"</span> <span class="attr">name</span>=<span class="string">"_captcha"</span> <span class="attr">value</span>=<span class="string">"true"</span><span class="tag">&gt;</span>            </div>
        </div>
        
        <div class="note-box" style="margin-top: 1rem;">
            <i class="bi bi-lightbulb-fill"></i>
            <span>When <span class="ic">_captcha</span> is enabled, the CAPTCHA widget appears automatically. Users must complete it before the form can be submitted. The submission is only processed after successful verification.</span>
        </div>
    </div>
</div>

                {{-- File Uploads --}}
                <div class="docs-section" id="uploads">
                    <div class="docs-section-header">
                        <h2>
                            <span class="sec-icon"><i class="bi bi-paperclip"></i></span>
                            File Uploads
                        </h2>
                        <p>Let people attach files when they submit.</p>
                    </div>
                    <div class="docs-section-body">
                        <div class="code-block">
                            <div class="code-header"><span class="code-lang">HTML</span><button class="code-copy"><i class="bi bi-clipboard"></i> Copy</button></div>
                            <div class="code-content">
<pre><span class="tag">&lt;form</span> <span class="attr">enctype</span>=<span class="string">"multipart/form-data"</span><span class="tag">&gt;</span>
  <span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="string">"file"</span> <span class="attr">name</span>=<span class="string">"uploads[]"</span> <span class="attr">multiple</span><span class="tag">&gt;</span>
<span class="tag">&lt;/form&gt;</span></pre>
                            </div>
                        </div>
                        <table class="sf-table" style="margin-top:1rem;">
                            <thead>汽<th>Limit</th><th>Value</th> </thead>
                            <tbody>
                                 etxek<td><code>Per file</code></td><td>10 MB max</td> </tr>
                                 etxek<td><code>Per submission</code></td><td>Up to 5 files</td> </tr>
                            </tbody>
                         </table>
                    </div>
                </div>

                {{-- AJAX --}}
                <div class="docs-section" id="ajax">
                    <div class="docs-section-header">
                        <h2>
                            <span class="sec-icon"><i class="bi bi-braces"></i></span>
                            AJAX / JavaScript
                        </h2>
                        <p>Submit the form without reloading the page.</p>
                    </div>
                    <div class="docs-section-body">
                        <div class="code-block">
                            <div class="code-header"><span class="code-lang">JavaScript</span><button class="code-copy"><i class="bi bi-clipboard"></i> Copy</button></div>
                            <div class="code-content">
<pre><span class="kw">const</span> form = document.<span class="fn">getElementById</span>(<span class="str2">'contact-form'</span>);

form.<span class="fn">addEventListener</span>(<span class="str2">'submit'</span>, <span class="kw">async</span> (e) => {
  e.<span class="fn">preventDefault</span>();
  
  <span class="kw">const</span> res = <span class="kw">await</span> <span class="fn">fetch</span>(form.action, {
    method: <span class="str2">'POST'</span>,
    body: <span class="kw">new</span> <span class="fn">FormData</span>(form),
    headers: { <span class="str2">'Accept'</span>: <span class="str2">'application/json'</span> }
  });
  
  <span class="kw">const</span> data = <span class="kw">await</span> res.<span class="fn">json</span>();
  
  <span class="kw">if</span> (data.success) {
    <span class="comment">// Success!</span>
  }
});</pre>
                            </div>
                        </div>
                        <div class="note-box">
                            <i class="bi bi-info-circle-fill"></i>
                            <span>Add <span class="ic">Accept: application/json</span> header to get JSON response.</span>
                        </div>
                    </div>
                </div>

                {{-- CTA --}}
                <div class="docs-cta">
                    <p>Ready to get started?</p>
                    <a href="{{ route('playground.index') }}#play-area" class="btn btn-secondary" style="margin-right:0.75rem;">
                        <i class="bi bi-play-circle"></i> Try Express
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.code-copy').forEach(btn => {
        btn.addEventListener('click', function() {
            const pre = this.closest('.code-block').querySelector('pre');
            if(pre) {
                navigator.clipboard.writeText(pre.innerText).then(() => {
                    this.innerHTML = '<i class="bi bi-check2"></i> Copied!';
                    this.style.color = '#3b82f6';
                    this.style.borderColor = '#3b82f6';
                    setTimeout(() => {
                        this.innerHTML = '<i class="bi bi-clipboard"></i> Copy';
                        this.style.color = '';
                        this.style.borderColor = '';
                    }, 2000);
                });
            }
        });
    });

    // active highlight on scroll
    const sections = document.querySelectorAll('.docs-section');
    const navLinks  = document.querySelectorAll('.docs-nav a');
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                navLinks.forEach(l => l.classList.remove('active'));
                const active = document.querySelector(`.docs-nav a[href="#${entry.target.id}"]`);
                if (active) active.classList.add('active');
            }
        });
    }, { rootMargin: '-20% 0px -70% 0px' });
    sections.forEach(s => observer.observe(s));
</script>

@endsection