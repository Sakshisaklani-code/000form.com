<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="description" content="000form Express — No-account form endpoint. Point your HTML form at our endpoint and get submissions delivered instantly to your inbox.">
    <title>@yield('title', 'Express — Instant Form Endpoints | 000form')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('images/favicon/000formFavicon-express.png') }}" type="image/svg+xml">
    <link rel="canonical" href="https://000form.com/express" />
    <meta name="keywords" content="forms, form backend, contact forms, form submissions, 000Form, no-account forms">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <meta property="og:title" content="Express — Instant Form Endpoints | 000form" />
    <meta property="og:description" content="Point your HTML form at our endpoint. Submissions arrive in your inbox instantly — no account, no setup." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://000form.com/express" />
    <meta property="og:image" content="{{ asset('images/og-image/og-image.jpg') }}" />
    <meta name="robots" content="index, follow">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TV3T8837GC"></script>
    <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-TV3T8837GC');</script>

<style>
    /* =============================================
    ROOT TOKENS — matches main site vibe, blue accent
    ============================================= */
    :root {
        --bg:            #020202;
        --bg-2:          #060606;
        --bg-3:          #0b0b0b;
        --bg-card:       #0d0d0d;
        --bg-card-2:     #101010;
        --border:        rgba(255,255,255,0.06);
        --border-2:      rgba(255,255,255,0.10);
        --text:          #f0f0f0;
        --text-2:        #888;
        --text-3:        #555;

        /* BLUE accent system */
        --blue:          #3b82f6;
        --blue-bright:   #60a5fa;
        --blue-dim:      #1d4ed8;
        --blue-glow:     rgba(59,130,246,0.15);
        --blue-glow-2:   rgba(59,130,246,0.08);
        --blue-border:   rgba(59,130,246,0.25);

        /* GREEN accent (Core pill only) */
        --green:         #00ff88;
        --green-dark:    #00994d;

        --font:   'Outfit', sans-serif;
        --mono:   'JetBrains Mono', monospace;
        --radius: 14px;
    }

    *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
    html { scroll-behavior:smooth; }

    body {
        font-family: var(--font);
        background: #010102;
        color: var(--text);
        line-height: 1.65;
        min-height: 100vh;
        -webkit-font-smoothing: antialiased;
        overflow-x: hidden;
    }

    a { text-decoration: none; }

    /* =============================================
    AMBIENT GLOW BLOBS (like main site)
    ============================================= */
    .glow-blob {
        position: fixed;
        border-radius: 50%;
        filter: blur(120px);
        pointer-events: none;
        z-index: 0;
        opacity: 0.18;
    }
    .glow-blob-1 {
        width: 600px; height: 600px;
        background: radial-gradient(circle, var(--blue) 0%, transparent 70%);
        top: -200px; left: 50%;
        transform: translateX(-50%);
    } */
    /* .glow-blob-2 {
        width: 400px; height: 400px;
        background: radial-gradient(circle, #1d4ed8 0%, transparent 70%);
        bottom: 20%; right: -100px;
        opacity: 0.1;
    }

    /* =============================================
    NOISE TEXTURE OVERLAY
    ============================================= */
    body::before {
        content: '';
        position: fixed;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
        pointer-events: none;
        z-index: 1;
        opacity: 0.4;
    }
    .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    @media (min-width: 640px) {
        .container {
            padding: 0 1.5rem;
        }
    }
    /* =============================================
    NAV
    ============================================= */
    .nav {
        position: fixed;
        top: 0; left: 0; right: 0;
        z-index: 200;

        background: #02040a;
        border-bottom: 1px solid rgba(255,255,255,0.05);

        padding: 0.9rem 0;

        /* Same border style as footer */
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }

    /* inner stays same but cleaner spacing */
    .nav-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        max-width: 1160px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    /* Logo — match footer style */
    .nav-logo {
        font-family: var(--mono);
        font-size: 1.9rem;
        font-weight: 700;
        color: #fff;
        letter-spacing: -0.02em;
    }

    .nav-logo span {
        color: var(--blue);
    }

    /* Links — same as footer */
    .nav-links {
        display: flex;
        align-items: center;
        gap: 0.2rem;
        list-style: none;
    }

    .nav-links a {
        color: rgb(255, 255, 255);
        font-size: 1;
        padding: 0.35rem 0.75rem;
        border-radius: 6px;
        transition: all 0.2s ease;
    }

    /* SAME hover as footer */
    .nav-links a:hover {
        color: var(--blue-bright);
        background: var(--blue-glow-2);
        font-size:1.2;
    }

    /* Logo — blue gradient */
    .nav-logo {
        font-family: var(--mono);
        font-size: 1.3rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 0.35rem;
    }

    .nav-logo img {
        height: 55px;
    }

    /* Express badge in nav */
    .nav-express-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.32rem 0.9rem;
        background: linear-gradient(135deg, var(--blue) 0%, var(--blue-dim) 100%);
        border-radius: 999px;
        font-size: 0.75rem;
        font-weight: 700;
        color: #fff;
        letter-spacing: 0.02em;
        box-shadow: 0 0 16px rgba(59,130,246,0.4), inset 0 1px 0 rgba(255,255,255,0.15);
        font-family: var(--mono);
    }

    .nav-links {
        display: flex;
        align-items: center;
        gap: 0.15rem;
        list-style: none;
        flex: 1;
        justify-content: flex-end;
    }

    /* .nav-links a {
        color: var(--text-2);
        font-size: 1rem;
        font-weight: 500;
        padding: 0.4rem 0.85rem;
        border-radius: 8px;
        transition: all 0.2s;
    }

    .nav-links a:hover {
        color: var(--text);
        background: rgba(255,255,255,0.05);
    } */

    /* Green Core pill */
    .pill-link {
        display: inline-flex !important;
        align-items: center;
        gap: 6px;
        padding: 0.36rem 1rem !important;
        background: linear-gradient(135deg, var(--green) 0%, var(--green-dark) 100%) !important;
        color: #001a0d !important;
        font-weight: 700 !important;
        font-size: 1rem !important;
        border-radius: 999px !important;
        border: 1px solid rgba(0,255,136,0.25) !important;
        box-shadow: 0 0 18px rgba(0,255,136,0.28), inset 0 1px 0 rgba(255,255,255,0.2) !important;
        transition: all 0.25s !important;
        margin-left: 0.25rem;
    }

    .pill-link:hover {
        background: linear-gradient(135deg, #33ffaa 0%, #00bb66 100%) !important;
        box-shadow: 0 0 28px rgba(0,255,136,0.5) !important;
        transform: scale(1.05) !important;
    }

    .pill-icon {
        width: 18px; height: 18px;
        display: flex; align-items: center; justify-content: center;
        background: rgba(0,0,0,0.2);
        border-radius: 50%;
        border: 1px solid rgba(0,0,0,0.15);
    }

    .mobile-menu-toggle {
        display: none;
        background: none;
        border: 1px solid var(--border-2);
        cursor: pointer;
        padding: 0.4rem;
        border-radius: 8px;
    }

    .mobile-menu-toggle span {
        display: block;
        width: 20px; height: 2px;
        background: var(--text);
        margin: 4px 0;
        border-radius: 2px;
        transition: all 0.3s;
    }

    @media (max-width: 768px) {
        .mobile-menu-toggle { display: block; }
        .nav-links {
            display: none;
            position: absolute;
            top: 100%; left: 0; right: 0;
            background: rgba(6,6,6,0.98);
            backdrop-filter: blur(20px);
            flex-direction: column;
            align-items: flex-start;
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--border);
            gap: 0.3rem;
        }
        .nav-links.open { display: flex; }
        .nav-express-badge { display: none; }
    }

    /* =============================================
    PAGE WRAPPER
    ============================================= */
    .page {
        position: relative;
        z-index: 2;
        padding-top: 72px;
    }

    /* =============================================
    HERO SECTION
    ============================================= */
    .hero {
        text-align: center;
        padding: 5rem 2rem 4rem;
        max-width: 760px;
        margin: 0 auto;
        position: relative;
    }

    /* Glowing ring behind hero */
    .hero::before {
        content: '';
        position: absolute;
        top: 40px; left: 50%; transform: translateX(-50%);
        width: 700px; height: 350px;
        background: radial-gradient(ellipse at center, rgba(59,130,246,0.1) 0%, transparent 65%);
        pointer-events: none;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        padding: 0.38rem 1.1rem;
        background: rgba(59,130,246,0.08);
        border: 1px solid var(--blue-border);
        border-radius: 100px;
        font-size: 0.7rem;
        color: var(--blue-bright);
        font-family: var(--mono);
        letter-spacing: 0.1em;
        text-transform: uppercase;
        margin-bottom: 1.5rem;
        position: relative;
    }

    .hero-badge::before {
        content: '';
        position: absolute;
        inset: -1px;
        border-radius: 100px;
        background: linear-gradient(90deg, var(--blue-border), transparent, var(--blue-border));
        z-index: -1;
    }

    .hero-tag-dot {
        width: 6px; height: 6px;
        background: var(--blue);
        border-radius: 50%;
        box-shadow: 0 0 8px var(--blue);
        animation: blink 2s infinite;
    }

    @keyframes blink {
        0%,100% { opacity:1; }
        50%      { opacity:0.4; }
    }

    .hero-title {
        font-size: clamp(3rem, 7vw, 5.5rem);
        font-weight: 800;
        letter-spacing: -0.05em;
        line-height: 1.0;
        margin-bottom: 0.6rem;
        background: linear-gradient(135deg, #ffffff 0%, #93c5fd 40%, var(--blue) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-title2 {
        font-size: clamp(3rem, 7vw, 3.5rem);
        font-weight: 800;
        letter-spacing: -0.05em;
        line-height: 1.0;
        margin-bottom: 0.6rem;
        background: linear-gradient(135deg, #ffffff 0%, #93c5fd 40%, var(--blue) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-subtitle-em {
        display: block;
        font-size: clamp(1.6rem, 3.5vw, 2.4rem);
        font-weight: 700;
        letter-spacing: -0.03em;
        background: linear-gradient(120deg, rgba(96,165,250,0.55) 0%, rgba(59,130,246,0.35) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 1.5rem;
    }

    .hero-desc {
        font-size: 1.05rem;
        color: var(--text-2);
        max-width: 500px;
        margin: 0 auto 2.5rem;
        line-height: 1.75;
    }

    /* Stat strip below hero */
    .hero-stats {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 2.5rem;
        flex-wrap: wrap;
        padding: 1.5rem 0 0;
        border-top: 1px solid var(--border);
        margin-top: 1rem;
    }

    .stat-item { text-align: center; }

    .stat-value {
        font-size: 1.7rem;
        font-weight: 800;
        background: linear-gradient(135deg, #fff 0%, var(--blue-bright) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        letter-spacing: -0.03em;
        font-family: var(--mono);
    }

    .stat-label {
        font-size: 0.73rem;
        color: var(--text-3);
        text-transform: uppercase;
        letter-spacing: 0.07em;
        margin-top: 0.1rem;
        font-family: var(--mono);
    }

    .stat-sep {
        width: 1px; height: 36px;
        background: var(--border-2);
    }

    /* =============================================
    SECTION LABEL (like main site)
    ============================================= */
    .section-label {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-family: var(--mono);
        font-size: 0.65rem;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--blue-bright);
        padding: 0.3rem 0.85rem;
        background: var(--blue-glow-2);
        border: 1px solid var(--blue-border);
        border-radius: 100px;
        margin-bottom: 1rem;
    }

    .section-label .dot {
        width: 5px; height: 5px;
        background: var(--blue);
        border-radius: 50%;
        box-shadow: 0 0 6px var(--blue);
    }

    /* =============================================
    PLAYGROUND SECTION
    ============================================= */
    .playground-section {
        padding: 1rem 2rem 4.5rem;
        max-width: 1400px;
        margin: 0 auto;
    }

    .playground-section-header {
        text-align: center;
        margin-bottom: 4.5rem;
    }

    .section-title {
        font-size: clamp(1.6rem, 3vw, 2.4rem);
        font-weight: 700;
        letter-spacing: -0.03em;
        color: var(--text);
        margin-bottom: 0.5rem;
    }

    .section-title span {
        background: linear-gradient(120deg, var(--blue-bright), var(--blue));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .section-desc {
        font-size: 0.92rem;
        color: var(--text-2);
        max-width: 460px;
        margin: 0 auto;
        line-height: 1.7;
    }

    /* =============================================
    TWO-PANEL GRID
    ============================================= */
    .panels-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3.25rem;
        margin-bottom: 4.5rem;
    }

    /* =============================================
    PANEL SHELL
    ============================================= */
    .panel {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: border-color 0.3s, box-shadow 0.3s;
        box-shadow:
            0 0 0 1px rgba(0,0,0,0.6),
            0 4px 32px rgba(0,0,0,0.5),
            inset 0 1px 0 rgba(255,255,255,0.04);
        position: relative;
    }

    .panel::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(59,130,246,0.4), transparent);
        opacity: 0;
        transition: opacity 0.3s;
    }

    .panel:hover {
        border-color: var(--blue-border);
        box-shadow:
            0 0 0 1px rgba(0,0,0,0.6),
            0 8px 48px rgba(0,0,0,0.6),
            0 0 40px rgba(59,130,246,0.06);
    }

    .panel:hover::before { opacity: 1; }

    .panel-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.9rem 1.4rem;
        background: rgba(255,255,255,0.025);
        border-bottom: 1px solid var(--border);
        flex-shrink: 0;
    }

    .panel-title {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        font-size: 0.85rem;
        color: var(--text);
    }

    .panel-title svg { color: var(--blue-bright); }

    /* =============================================
    EDITOR TABS
    ============================================= */
    .editor-tabs {
        display: flex;
        gap: 2px;
        background: rgba(0,0,0,0.5);
        border-radius: 8px;
        padding: 3px;
        border: 1px solid var(--border);
    }

    .tab-btn {
        padding: 0.28rem 0.85rem;
        font-size: 0.74rem;
        font-weight: 500;
        color: var(--text-3);
        background: transparent;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-family: var(--mono);
        transition: all 0.15s;
    }

    .tab-btn:hover { color: var(--text-2); }

    .tab-btn.active {
        background: var(--bg-card-2);
        color: var(--blue-bright);
        box-shadow: 0 1px 6px rgba(0,0,0,0.5);
    }

    .tab-content        { display: none; flex-direction: column; flex: 1; }
    .tab-content.active { display: flex; }

    /* =============================================
    EDITOR TOOLBAR
    ============================================= */
    .editor-toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.45rem 1.25rem;
        background: rgba(0,0,0,0.3);
        border-bottom: 1px solid var(--border);
        flex-shrink: 0;
    }

    .editor-toolbar-left { display: flex; align-items: center; gap: 0.5rem; }
    .editor-lang-dot { width: 8px; height: 8px; border-radius: 50%; }
    .editor-lang {
        font-family: var(--mono);
        font-size: 0.66rem;
        color: var(--text-3);
        text-transform: uppercase;
        letter-spacing: 0.09em;
    }

    .copy-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        padding: 0.28rem 0.72rem;
        background: rgba(255,255,255,0.04);
        border: 1px solid var(--border);
        border-radius: 6px;
        color: var(--text-3);
        font-size: 0.72rem;
        font-family: var(--mono);
        cursor: pointer;
        transition: all 0.15s;
    }

    .copy-btn:hover  { color: var(--blue-bright); border-color: var(--blue-border); background: var(--blue-glow-2); }
    .copy-btn.copied { color: #34d399; border-color: rgba(52,211,153,0.3); }

    /* =============================================
    CODE TEXTAREA
    ============================================= */
    .code-editor {
        flex: 1;
        width: 100%;
        min-height: 0;
        font-family: var(--mono);
        font-size: 11.5px;
        line-height: 1.8;
        padding: 1.1rem 1.4rem;
        background: transparent;
        color: rgba(147,197,253,0.7);
        border: none;
        resize: none;
        outline: none;
        white-space: pre;
        overflow: auto;
        tab-size: 2;
    }

    .code-editor:focus { color: var(--text); }

    /* Scrollbar styling */
    .code-editor::-webkit-scrollbar { width: 4px; height: 4px; }
    .code-editor::-webkit-scrollbar-track { background: transparent; }
    .code-editor::-webkit-scrollbar-thumb { background: rgba(59,130,246,0.3); border-radius: 2px; }

    /* =============================================
    ENDPOINT TIP
    ============================================= */
    .endpoint-tip {
        display: flex;
        align-items: flex-start;
        gap: 0.6rem;
        padding: 0.85rem 1.4rem;
        background: rgba(59,130,246,0.06);
        border-top: 1px solid var(--blue-border);
        font-size: 0.77rem;
        color: var(--blue-bright);
        line-height: 1.55;
        flex-shrink: 0;
    }

    .endpoint-tip svg { flex-shrink: 0; margin-top: 1px; }

    .endpoint-tip code {
        background: rgba(59,130,246,0.18);
        padding: 0.05rem 0.38rem;
        border-radius: 3px;
        font-size: 0.68rem;
        color: #93c5fd;
        font-family: var(--mono);
    }

    /* =============================================
    RIGHT PANEL — PREVIEW
    ============================================= */
    .preview-live-dot {
        display: flex;
        align-items: center;
        gap: 0.4rem;
        font-size: 0.7rem;
        color: var(--text-3);
        font-family: var(--mono);
    }

    .live-dot {
        width: 7px; height: 7px;
        background: var(--blue);
        border-radius: 50%;
        animation: pulse-blue 2s infinite;
        box-shadow: 0 0 6px var(--blue);
    }

    @keyframes pulse-blue {
        0%,100% { opacity:1; box-shadow:0 0 0 0 rgba(59,130,246,0.5); }
        50%      { opacity:.7; box-shadow:0 0 0 6px transparent; }
    }

    .preview-body {
        padding: 1.35rem;
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
        overflow-y: auto;
    }

    .preview-body::-webkit-scrollbar { width: 4px; }
    .preview-body::-webkit-scrollbar-thumb { background: rgba(59,130,246,0.2); border-radius: 2px; }

    /* =============================================
    CONFIG SECTIONS
    ============================================= */
    .config-section {
        display: flex;
        flex-direction: column;
        gap: 0.85rem;
        padding: 1.1rem;
        background: rgba(255,255,255,0.016);
        border: 1px solid var(--border);
        border-radius: 10px;
        transition: border-color 0.2s;
    }

    .config-section:hover { border-color: rgba(59,130,246,0.15); }

    .config-section-header { display: flex; align-items: flex-start; gap: 0.7rem; }

    .config-step-num {
        flex-shrink: 0;
        width: 24px; height: 24px;
        display: flex; align-items: center; justify-content: center;
        background: linear-gradient(135deg, var(--blue) 0%, var(--blue-dim) 100%);
        color: #fff;
        font-size: 0.68rem;
        font-weight: 700;
        border-radius: 50%;
        font-family: var(--mono);
        margin-top: 1px;
        box-shadow: 0 2px 10px rgba(59,130,246,0.45);
    }

    .config-section-title { font-size: 0.88rem; font-weight: 600; color: var(--text); margin-bottom: 0.1rem; }
    .config-section-desc  { font-size: 0.76rem; color: var(--text-3); line-height: 1.5; }

    /* =============================================
    EMAIL ROW
    ============================================= */
    .email-row { display: flex; gap: 0.5rem; }

    .email-input {
        flex: 1;
        background: rgba(0,0,0,0.4);
        border: 1px solid rgba(255,255,255,0.07);
        border-radius: 8px;
        padding: 0.6rem 0.9rem;
        color: var(--text);
        font-size: 0.85rem;
        font-family: var(--mono);
        transition: all 0.2s;
        min-width: 0;
    }

    .email-input:focus {
        outline: none;
        border-color: var(--blue);
        box-shadow: 0 0 0 3px var(--blue-glow-2), 0 0 16px rgba(59,130,246,0.15);
    }

    .email-input::placeholder { color: var(--text-3); }

    .verify-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.6rem 1.1rem;
        background: linear-gradient(135deg, var(--blue) 0%, var(--blue-dim) 100%);
        color: #fff;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.81rem;
        cursor: pointer;
        white-space: nowrap;
        transition: all 0.2s;
        font-family: var(--font);
        flex-shrink: 0;
        box-shadow: 0 2px 14px rgba(59,130,246,0.4);
    }

    .verify-btn:hover    { transform: translateY(-1px); box-shadow: 0 4px 24px rgba(59,130,246,0.55); }
    .verify-btn:disabled { opacity: 0.5; cursor: not-allowed; transform: none; }

    .email-status           { font-size: 0.77rem; min-height: 1rem; line-height: 1.5; }
    .email-status.verified  { color: #34d399; }
    .email-status.pending   { color: #fbbf24; }
    .email-status.error     { color: #f87171; }

    /* =============================================
    NOTICE BOX
    ============================================= */
    .notice-box {
        display: flex;
        align-items: flex-start;
        gap: 0.6rem;
        padding: 0.8rem 0.95rem;
        border-radius: 8px;
        font-size: 0.77rem;
        line-height: 1.55;
    }

    .notice-neutral {
        background: rgba(59,130,246,0.05);
        border: 1px solid rgba(59,130,246,0.12);
        color: var(--text-3);
    }

    .notice-neutral strong { color: var(--text-2); }
    .notice-neutral code {
        display: inline-block;
        margin-top: 0.3rem;
        background: rgba(59,130,246,0.1);
        padding: 0.1rem 0.4rem;
        border-radius: 3px;
        font-size: 0.68rem;
        color: var(--blue-bright);
        word-break: break-all;
        font-family: var(--mono);
    }

    /* =============================================
    FORM PREVIEW AREA
    ============================================= */
    .preview-content {
        background: rgba(0,0,0,0.35);
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 1.1rem;
        min-height: 190px;
    }

    .preview-content form { max-width: 100%; }

    .preview-content input,
    .preview-content textarea {
        width: 100%;
        padding: 0.6rem 0.85rem;
        margin-bottom: 0.75rem;
        border: 1px solid rgba(255,255,255,0.07);
        border-radius: 6px;
        background: rgba(255,255,255,0.04);
        color: var(--text);
        font-size: 0.86rem;
        transition: all 0.2s;
        box-sizing: border-box;
        font-family: var(--font);
    }

    .preview-content input:focus,
    .preview-content textarea:focus {
        outline: none;
        border-color: var(--blue);
        box-shadow: 0 0 0 3px var(--blue-glow-2);
    }

    .preview-content button[type="submit"] {
        width: 100%;
        padding: 0.7rem 1.25rem;
        background: linear-gradient(135deg, var(--blue) 0%, var(--blue-dim) 100%);
        color: #fff;
        border: none;
        border-radius: 7px;
        font-size: 0.88rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        font-family: var(--font);
        box-shadow: 0 2px 14px rgba(59,130,246,0.35);
    }

    .preview-content button[type="submit"]:hover    { transform: translateY(-1px); box-shadow: 0 4px 22px rgba(59,130,246,0.55); }
    .preview-content button[type="submit"]:disabled { opacity: 0.5; cursor: not-allowed; transform: none; }
    .preview-content button[type="submit"].loading  { position: relative; color: transparent; }

    .preview-content button[type="submit"].loading::after {
        content: '';
        position: absolute;
        width: 1rem; height: 1rem;
        top: 50%; left: 50%;
        margin: -0.5rem 0 0 -0.5rem;
        border: 2px solid rgba(255,255,255,0.3);
        border-top-color: #fff;
        border-radius: 50%;
        animation: spin 0.6s linear infinite;
    }

    @keyframes spin { to { transform: rotate(360deg); } }

    .response-message         { display: none; padding: 0.8rem 1rem; border-radius: 8px; font-size: 0.83rem; line-height: 1.5; margin-top: 0.5rem; }
    .response-message.show    { display: block; }
    .response-message.success { background: rgba(52,211,153,0.07); border: 1px solid rgba(52,211,153,0.2); color: #34d399; }
    .response-message.error   { background: rgba(248,113,113,0.07); border: 1px solid rgba(248,113,113,0.2); color: #f87171; }
    .response-message.info    { background: var(--blue-glow-2); border: 1px solid var(--blue-border); color: var(--blue-bright); }

    /* =============================================
    LIMITATION BANNER
    ============================================= */
    .limitation-banner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1.5rem;
        padding: 1.25rem 1.75rem;
        background: linear-gradient(135deg, rgba(251,191,36,0.05) 0%, rgba(251,191,36,0.02) 100%);
        border: 1px solid rgba(251,191,36,0.15);
        border-radius: var(--radius);
        box-shadow: 0 4px 24px rgba(0,0,0,0.4), inset 0 1px 0 rgba(251,191,36,0.06);
        position: relative;
        overflow: hidden;
        max-width: 1095px;
        margin-left: 9%;
    }

    .limitation-banner::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(251,191,36,0.35), transparent);
    }

    .limitation-banner-left {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        font-size: 0.85rem;
        color: var(--text-3);
        line-height: 1.55;
    }

    .limitation-banner-left svg    { color: #fbbf24; flex-shrink:0; margin-top:2px; }
    .limitation-banner-left strong { color: var(--text-2); }

    .limitation-cta {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        padding: 0.65rem 1.35rem;
        background: linear-gradient(135deg, var(--green) 0%, var(--green-dark) 100%) !important;
        color: #001a0d !important;
        font-weight: 700 !important;
        font-size: 1rem !important;
        text-decoration: none;
        border-radius: 9px;
        font-size: 0.81rem;
        font-weight: 600;
        white-space: nowrap;
        flex-shrink: 0;
        transition: all 0.2s;
        box-shadow: 0 0 18px rgba(0,255,136,0.28), inset 0 1px 0 rgba(255,255,255,0.2) !important;
        transition: all 0.25s !important;
    }

    .limitation-cta:hover { background: linear-gradient(135deg, #33ffaa 0%, #00bb66 100%) !important;
        box-shadow: 0 0 18px rgba(0,255,136,0.28), inset 0 1px 0 rgba(255,255,255,0.2) !important;
        transform: scale(1.05) !important;
    }

    /* =============================================
    HOW IT WORKS
    ============================================= */
    .hiw-section {
        padding: 0 2rem 5rem;
        max-width: 1160px;
        margin: 0 auto;
    }

    .hiw-panel {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 2.25rem 2.5rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 32px rgba(0,0,0,0.45), inset 0 1px 0 rgba(255,255,255,0.03);
    }

    .hiw-panel::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--blue-border), transparent);
    }

    /* Decorative glow in corner */
    .hiw-panel::after {
        content: '';
        position: absolute;
        top: -60px; right: -60px;
        width: 300px; height: 300px;
        background: radial-gradient(circle, rgba(59,130,246,0.07) 0%, transparent 60%);
        pointer-events: none;
    }

    .hiw-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid var(--border);
    }

    .hiw-header-left {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        font-weight: 700;
        font-size: 1.05rem;
        color: var(--text);
    }

    .hiw-header-left svg { color: var(--blue); }

    .hiw-steps {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1px;
        background: var(--border);
        border-radius: 10px;
        overflow: hidden;
    }

    .hiw-step {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        padding: 1.5rem;
        background: var(--bg-card);
        transition: background 0.2s;
        position: relative;
    }

    .hiw-step:hover { background: rgba(59,130,246,0.03); }

    .hiw-step-num {
        font-family: var(--mono);
        font-size: 0.65rem;
        color: var(--blue);
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        margin-bottom: 0.25rem;
    }

    .step-icon {
        width: 36px; height: 36px;
        background: var(--blue-glow-2);
        border: 1px solid var(--blue-border);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--blue-bright);
        flex-shrink: 0;
        transition: box-shadow 0.2s;
    }

    .hiw-step:hover .step-icon {
        box-shadow: 0 0 16px rgba(59,130,246,0.3);
    }

    .hiw-step strong { font-size: 0.88rem; font-weight: 600; color: var(--text); }
    .hiw-step p      { font-size: 0.8rem; color: var(--text-3); line-height: 1.55; }

    .hiw-step code {
        background: rgba(255,255,255,0.06);
        padding: 0.05rem 0.35rem;
        border-radius: 3px;
        font-size: 0.68rem;
        font-family: var(--mono);
        color: var(--text-2);
    }

    /* =============================================
    TOAST
    ============================================= */
    .toast {
        position: fixed;
        bottom: 2rem; left: 50%;
        transform: translateX(-50%) translateY(20px);
        background: var(--bg-card-2);
        border: 1px solid var(--blue-border);
        color: var(--text);
        padding: 0.7rem 1.6rem;
        border-radius: 10px;
        font-size: 0.8rem;
        font-family: var(--mono);
        opacity: 0;
        pointer-events: none;
        transition: all 0.3s cubic-bezier(0.34,1.56,0.64,1);
        z-index: 9999;
        white-space: nowrap;
        box-shadow: 0 8px 32px rgba(0,0,0,0.5), 0 0 20px rgba(59,130,246,0.15);
    }

    .toast.show { opacity: 1; transform: translateX(-50%) translateY(0); }

    /* =============================================
    FOOTER
    ============================================= */
    .footer {
        background: #000000;
        /* border-top: 1px solid #8ea6ee; */
        padding: 3rem 2rem 2rem;
        position: relative;
        z-index: 2;
    }

    .footer::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(59,130,246,0.25), transparent);
    }

    .footer-inner {
        max-width: 1160px;
        margin: 0 auto;
    }

    .footer-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1.5rem;
        padding-bottom: 2rem;
        border-bottom: 0.3px solid #3c4e81;
        margin-bottom: 1.5rem;
    }

    /* Footer logo — blue gradient */
    .footer-logo {
        font-family: var(--mono);
        font-size: 1.9rem;
        font-weight: 700;
        background: linear-gradient(135deg, #1e6be6 0%, #0a3fa8 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        letter-spacing: -0.02em;
        filter: drop-shadow(0 0 12px rgba(59,130,246,0.3));
    }

    .footer-links {
        list-style: none;
        display: flex;
        flex-wrap: wrap;
        gap: 0.15rem;
    }

    .footer-links a {
        color: var(--text-3);
        font-size: 1rem;
        padding: 0.35rem 0.8rem;
        border-radius: 7px;
        transition: all 0.2s;
    }

    .footer-links a:hover {
        color: var(--blue-bright);
        background: var(--blue-glow-2);
    }

    .footer-bottom {
        text-align: center;
    }

    .footer-copy {
        font-size: 0.92rem;
        color: var(--text-3);
        margin-bottom: 0.5rem;
    }

    .footer-attribution {
        font-size: 0.9rem;
        color: #333;
        line-height: 1.6;
    }

    .footer-attribution a { color: #ffffff; text-decoration: none; transition: color 0.2s; }
    .footer-attribution a:hover { color: #1d4ed8; text-decoration: underline; }

    /* =============================================
    RESPONSIVE
    ============================================= */
    @media (max-width: 960px) {
        .panels-grid { grid-template-columns: 1fr; }
        .hiw-steps   { grid-template-columns: 1fr 1fr; }
        .limitation-banner { flex-direction: column; align-items: flex-start; }
        .limitation-cta { align-self: stretch; justify-content: center; }
    }

    @media (max-width: 600px) {
        .hiw-steps         { grid-template-columns: 1fr; }
        .hero-stats        { gap: 1.5rem; }
        .stat-sep          { display: none; }
        .email-row         { flex-direction: column; }
        .verify-btn        { width: 100%; justify-content: center; }
        .hiw-panel         { padding: 1.5rem; }
        .playground-section, .hiw-section { padding-left: 1rem; padding-right: 1rem; }
    }

    /* =============================================
    FADE IN ANIMATION
    ============================================= */
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(24px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .hero            { animation: fadeUp 0.6s ease both; }
    .playground-section { animation: fadeUp 0.6s 0.15s ease both; }
    @media (max-width: 600px) {
        /* existing rules ... */

        /* Footer mobile */
        .footer-top {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .footer-logo {
            width: 100%;
            text-align: center;
        }

        .footer-links {
            justify-content: center;
        }

        .footer-bottom {
            text-align: center;
        }

        .footer-attribution {
            font-size: 0.78rem;
            line-height: 1.8;
        }
    }
</style>
</head>
<body id="main-body">

<!-- Ambient glow blobs -->
<div class="glow-blob glow-blob-1"></div>
<div class="glow-blob glow-blob-2"></div>

<!-- ===================== NAV ===================== -->
<nav class="nav">
    <div class="nav-inner">
        <a href="/express" class="nav-logo">
            <img src="{{ asset('images/logo/000formlogo-express.png') }}" alt="000form Logo">
        </a>
        

        <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle menu">
            <span></span><span></span><span></span>
        </button>

        <ul class="nav-links" id="navLinks">
            <li><a href="/express/guide">Reference Guide</a></li>
            <li>
                <a href="/" class="pill-link">
                    <span class="pill-icon">
                        <svg width="11" height="13" viewBox="0 0 12 14" fill="none">
                            <path d="M7 1L2 7.5H6L5 13L10 6.5H6.5L7 1Z"
                                fill="#001a0d" stroke="rgba(0,0,0,0.2)"
                                stroke-width="0.5" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Core
                </a>
            </li>
        </ul>
    </div>
</nav>

 @yield('content')

<!-- FOOTER -->
<footer class="footer">
    <div class="footer-inner">
        <div class="footer-top">
            <div class="footer-logo"><span>000</span>form</div>
            <ul class="footer-links">
                <li><a href="/express/terms">Terms</a></li>
                <li><a href="/express/privacy-policy">Privacy Policy</a></li>
                <li><a href="/express/refund">Refund Policy</a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p class="footer-copy">&copy; {{ date('Y') }} 000form. All rights reserved.</p>
            <p class="footer-attribution">
                Product of <a href="#">172 Tech</a> ·
                Designed by <a href="#">530 Expert</a> ·
                Developed by <a href="#">ESS ENN Associates</a>
            </p>
        </div>
    </div>
</footer>

<script src="/js/app.js"></script>
@stack('scripts')
</body>
</html>