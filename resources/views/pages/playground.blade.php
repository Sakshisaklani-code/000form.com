<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="description" content="000form Express — No-account form endpoint. Point your HTML form at our endpoint and get submissions delivered instantly to your inbox.">
    <title>@yield('title', 'Express — Instant Form Endpoints | 000form')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    color: var(--text-2);
    font-size: 1;
    padding: 0.35rem 0.75rem;
    border-radius: 6px;
    transition: all 0.2s ease;
}

/* SAME hover as footer */
.nav-links a:hover {
    color: var(--text);
    background: rgba(255,255,255,0.05);
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
    height: 65px;
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
    padding: 1rem 2rem 3.25rem;
    max-width: 1400px;
    margin: 0 auto;
}

.playground-section-header {
    text-align: center;
    margin-bottom: 2.5rem;
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
    margin-bottom: 3.25rem;
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
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-dim) 100%);
    color: #fff;
    text-decoration: none;
    border-radius: 9px;
    font-size: 0.81rem;
    font-weight: 600;
    white-space: nowrap;
    flex-shrink: 0;
    transition: all 0.2s;
    box-shadow: 0 2px 14px rgba(59,130,246,0.4);
}

.limitation-cta:hover { transform: translateY(-1px); box-shadow: 0 4px 24px rgba(59,130,246,0.6); }

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
</style>
</head>
<body id="main-body">

<!-- Ambient glow blobs -->
<div class="glow-blob glow-blob-1"></div>
<div class="glow-blob glow-blob-2"></div>

<!-- ===================== NAV ===================== -->
<nav class="nav">
    <div class="nav-inner">
        <a href="/" class="nav-logo">
            <img src="{{ asset('images/logo/000formlogo-express.png') }}" alt="000form Logo">
        </a>
        

        <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle menu">
            <span></span><span></span><span></span>
        </button>

        <ul class="nav-links" id="navLinks">
            <li><a href="{{ route('docs') }}">Documentation</a></li>
            <!-- <li><a href="{{ route('pricing') }}">Pricing</a></li>
            <li><a href="{{ route('Home.library') }}">Library</a></li> -->
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

<!-- ===================== PAGE ===================== -->
<div class="page">

    <!-- HERO -->
    <section class="hero">
        <div class="hero-badge">
            <span class="hero-tag-dot"></span>
            No account needed
        </div>

        <h1 class="hero-title">Express</h1>
        <span class="hero-subtitle-em">Instant form endpoints.</span>

        <p class="hero-desc">
            Verify your email, point your form at the endpoint, and submissions land straight in your inbox — no account, no setup, no server required.
        </p>

        <div class="hero-stats">
            <div class="stat-item">
                <div class="stat-value">0</div>
                <div class="stat-label">Lines of backend</div>
            </div>
            <div class="stat-sep"></div>
            <div class="stat-item">
                <div class="stat-value">&lt;60s</div>
                <div class="stat-label">Setup time</div>
            </div>
            <div class="stat-sep"></div>
            <div class="stat-item">
                <div class="stat-value">Free</div>
                <div class="stat-label">Forever</div>
            </div>
        </div>
    </section>

    <!-- PLAYGROUND -->
    <section class="playground-section">

        <div class="playground-section-header">
            <div class="section-label">
                <span class="dot"></span>
                Live Express
            </div>
            <h2 class="section-title">Try it <span>right now</span></h2>
            <p class="section-desc">Edit the code on the left, verify your email on the right, and submit a real test — it will land in your inbox.</p>
        </div>

        <!-- TWO PANELS -->
        <div class="panels-grid">

            <!-- LEFT PANEL — Code Editor -->
            <div class="panel editor-panel">
                <div class="panel-header">
                    <div class="panel-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M5.854 4.854a.5.5 0 1 0-.708-.708l-3.5 3.5a.5.5 0 0 0 0 .708l3.5 3.5a.5.5 0 0 0 .708-.708L2.707 8zm4.292 0a.5.5 0 0 1 .708-.708l3.5 3.5a.5.5 0 0 1 0 .708l-3.5 3.5a.5.5 0 0 1-.708-.708L13.293 8z"/>
                        </svg>
                        Code Editor
                    </div>
                    <div class="editor-tabs">
                        <button class="tab-btn active" data-tab="code">HTML</button>
                        <button class="tab-btn" data-tab="css">CSS</button>
                    </div>
                </div>

                <!-- HTML Tab -->
                <div class="tab-content active" id="tab-code">
                    <div class="editor-toolbar">
                        <div class="editor-toolbar-left">
                            <span class="editor-lang-dot" style="background:#f97316;"></span>
                            <span class="editor-lang">HTML</span>
                        </div>
                        <button class="copy-btn" id="copyHtml">
                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z"/>
                                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z"/>
                            </svg>
                            Copy HTML
                        </button>
                    </div>
                    <textarea id="htmlEditor" class="code-editor" spellcheck="false">&lt;form action="{{ config('app.url') }}/f/YOUR@EMAIL.COM" method="POST"&gt;
    &lt;input type="text" name="name" placeholder="Your name" required&gt;
    &lt;input type="email" name="email" placeholder="Your email" required&gt;
    &lt;textarea name="message" placeholder="Your message" required&gt;&lt;/textarea&gt;

    &lt;input type="hidden" name="_captcha" value="false"&gt;

    &lt;button type="submit"&gt;Send Message&lt;/button&gt;
&lt;/form&gt;</textarea>
                </div>

                <!-- CSS Tab -->
                <div class="tab-content" id="tab-css">
                    <div class="editor-toolbar">
                        <div class="editor-toolbar-left">
                            <span class="editor-lang-dot" style="background:#60a5fa;"></span>
                            <span class="editor-lang">CSS</span>
                        </div>
                        <button class="copy-btn" id="copyCss">
                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z"/>
                                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z"/>
                            </svg>
                            Copy CSS
                        </button>
                    </div>
                    <textarea id="cssEditor" class="code-editor" spellcheck="false">form {
    max-width: 500px;
    margin: 0 auto;
    font-family: sans-serif;
}

input, textarea {
    width: 100%;
    margin-bottom: 1rem;
    padding: 0.65rem 0.9rem;
    border: 1px solid #2d2d2d;
    border-radius: 6px;
    background: #1a1a1a;
    color: #ffffff;
    font-size: 0.85rem;
    transition: border-color 0.2s;
}

input:focus, textarea:focus {
    outline: none;
    border-color: #60a5fa;
    box-shadow: 0 0 0 3px rgba(96,165,250,0.12);
}

button[type="submit"] {
    width: 100%;
    padding: 0.75rem;
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    color: #ffffff;
    border: none;
    border-radius: 6px;
    font-size: 0.95rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
}

button[type="submit"]:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 18px rgba(59,130,246,0.5);
}</textarea>
                </div>

                <!-- Endpoint tip -->
                <div class="endpoint-tip">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                    </svg>
                    <span>Your form's <code>action</code> URL is your endpoint — replace <code>YOUR@EMAIL.COM</code> with your verified email.</span>
                </div>
            </div>

            <!-- RIGHT PANEL — Live Preview -->
            <div class="panel preview-panel">
                <div class="panel-header">
                    <div class="panel-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                        </svg>
                        Live Preview
                    </div>
                    <div class="preview-live-dot">
                        <span class="live-dot"></span> Live
                    </div>
                </div>

                <div class="preview-body">

                    <!-- Step 1 -->
                    <div class="config-section">
                        <div class="config-section-header">
                            <span class="config-step-num">1</span>
                            <div>
                                <div class="config-section-title">Verify your email</div>
                                <div class="config-section-desc">We'll route form submissions here. One-time verification, no account needed.</div>
                            </div>
                        </div>
                        <div class="email-row">
                            <input type="email" id="recipientEmail" class="email-input" placeholder="your@email.com" value="">
                            <button class="verify-btn" id="verifyEmailBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                                </svg>
                                Verify Email
                            </button>
                        </div>
                        <div id="emailStatus" class="email-status"></div>
                        <div class="notice-box notice-neutral">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;margin-top:1px;">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            </svg>
                            <div>
                                <strong>CAPTCHA is currently disabled</strong> via the hidden field in the HTML tab. To re-enable spam protection, remove this line from your form:<br>
                                <code>&lt;input type="hidden" name="_captcha" value="false"&gt;</code>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="config-section">
                        <div class="config-section-header">
                            <span class="config-step-num">2</span>
                            <div>
                                <div class="config-section-title">Test your form</div>
                                <div class="config-section-desc">Fill and submit below — we'll process it and deliver it to your verified inbox.</div>
                            </div>
                        </div>
                        <div id="formPreview" class="preview-content"></div>
                        <div id="responseMessage" class="response-message"></div>
                    </div>

                </div>
            </div>
        </div>

        <!-- LIMITATION BANNER -->
        <div class="limitation-banner">
            <div class="limitation-banner-left">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                </svg>
                <span><strong>Express has no submission history.</strong> Emails only go to your inbox — there's no dashboard to review or export past entries. Need history, spam filtering, and team access?</span>
            </div>
            <a href="{{ route('signup') }}" class="limitation-cta">
                Explore Core
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                </svg>
            </a>
        </div>

    </section>

    <!-- HOW IT WORKS -->
    <section class="hiw-section">
        <div class="hiw-panel">
            <div class="hiw-header">
                <div class="hiw-header-left">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
                    </svg>
                    How Express works
                </div>
                <div class="section-label" style="margin:0;">
                    <span class="dot"></span>
                    4 simple steps
                </div>
            </div>

            <div class="hiw-steps">
                <div class="hiw-step">
                    <div class="hiw-step-num">Step 01</div>
                    <div class="step-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                        </svg>
                    </div>
                    <strong>Verify your email</strong>
                    <p>Enter an email and click Verify. We send a one-time confirmation link — click it to activate your endpoint.</p>
                </div>
                <div class="hiw-step">
                    <div class="hiw-step-num">Step 02</div>
                    <div class="step-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M5.854 4.854a.5.5 0 1 0-.708-.708l-3.5 3.5a.5.5 0 0 0 0 .708l3.5 3.5a.5.5 0 0 0 .708-.708L2.707 8zm4.292 0a.5.5 0 0 1 .708-.708l3.5 3.5a.5.5 0 0 1 0 .708l-3.5 3.5a.5.5 0 0 1-.708-.708L13.293 8z"/>
                        </svg>
                    </div>
                    <strong>Point your form</strong>
                    <p>Set your form's <code>action</code> to <code>/f/your@email.com</code>. That's all the backend you need.</p>
                </div>
                <div class="hiw-step">
                    <div class="hiw-step-num">Step 03</div>
                    <div class="step-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                        </svg>
                    </div>
                    <strong>CAPTCHA protection</strong>
                    <p>After a visitor submits, they're redirected to a quick CAPTCHA check. Disable it any time with the hidden field.</p>
                </div>
                <div class="hiw-step">
                    <div class="hiw-step-num">Step 04</div>
                    <div class="step-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.11-2.278-.038-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                        </svg>
                    </div>
                    <strong>Land in your inbox</strong>
                    <p>Every entry is formatted and emailed directly to you. No dashboard, no login. Need history? <a href="{{ route('signup') }}" style="color:var(--blue-bright);">Create a free account.</a></p>
                </div>
            </div>
        </div>
    </section>

</div>

<!-- TOAST -->
<div id="toast" class="toast"></div>

<!-- FOOTER -->
<footer class="footer">
    <div class="footer-inner">
        <div class="footer-top">
            <div class="footer-logo"><span>000</span>form</div>
            <ul class="footer-links">
                <li><a href="{{ route('pages.terms') }}">Terms</a></li>
                <li><a href="{{ route('pages.privacy-policy') }}">Privacy Policy</a></li>
                <li><a href="{{ route('pages.refund') }}">Refund Policy</a></li>
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

<script>
document.addEventListener('DOMContentLoaded', function () {

    const htmlEditor     = document.getElementById('htmlEditor');
    const cssEditor      = document.getElementById('cssEditor');
    const formPreview    = document.getElementById('formPreview');
    const responseDiv    = document.getElementById('responseMessage');
    const recipientEmail = document.getElementById('recipientEmail');
    const verifyBtn      = document.getElementById('verifyEmailBtn');
    const emailStatus    = document.getElementById('emailStatus');
    const toast          = document.getElementById('toast');
    const copyHtmlBtn    = document.getElementById('copyHtml');
    const copyCssBtn     = document.getElementById('copyCss');

    let isVerified    = false;
    let injectedStyle = null;
    let verifiedEmail = localStorage.getItem('playground_verified_email') || '';

    /* ---- Mobile menu ---- */
    const toggle  = document.getElementById('mobileMenuToggle');
    const navMenu = document.getElementById('navLinks');
    if (toggle && navMenu) {
        toggle.addEventListener('click', () => navMenu.classList.toggle('open'));
    }

    /* ---- Copy buttons ---- */
    function setupCopy(btn, getContent) {
        btn.addEventListener('click', () => {
            navigator.clipboard.writeText(getContent()).then(() => {
                const orig = btn.innerHTML;
                btn.innerHTML = '<svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg> Copied!';
                btn.classList.add('copied');
                setTimeout(() => { btn.innerHTML = orig; btn.classList.remove('copied'); }, 2000);
            }).catch(() => showToast('Failed to copy'));
        });
    }

    setupCopy(copyHtmlBtn, () => htmlEditor.value);
    setupCopy(copyCssBtn,  () => cssEditor.value);

    /* ---- Tab switching ---- */
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const tab = btn.dataset.tab;
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
            btn.classList.add('active');
            document.getElementById('tab-' + tab).classList.add('active');
        });
    });

    /* ---- Live preview ---- */
    function decodeHtml(html) {
        const t = document.createElement('textarea');
        t.innerHTML = html;
        return t.value;
    }

    function injectCss(css) {
        if (injectedStyle) injectedStyle.remove();
        try {
            const scoped = css.replace(/(^|\})\s*([^{@][^{]*)\{/g, (match, closing, selector) => {
                const scopedSelector = selector.split(',').map(s => '.preview-content ' + s.trim()).join(', ');
                return (closing || '') + ' ' + scopedSelector + ' {';
            });
            injectedStyle = document.createElement('style');
            injectedStyle.id = 'playground-user-css';
            injectedStyle.textContent = scoped;
            document.head.appendChild(injectedStyle);
        } catch(e) {}
    }

    function updatePreview() {
        formPreview.innerHTML = decodeHtml(htmlEditor.value);
        injectCss(cssEditor.value);
        attachFormHandler();
    }

    let previewTimer;
    function scheduleUpdate() {
        clearTimeout(previewTimer);
        previewTimer = setTimeout(updatePreview, 250);
    }

    htmlEditor.addEventListener('input', scheduleUpdate);
    cssEditor.addEventListener('input', scheduleUpdate);
    updatePreview();

    /* ---- Email helpers ---- */
    function updateHtmlCodeWithEmail(email) {
        const actionRegex = /(action=["'].*\/f\/)([^"']+)(["'])/;
        if (actionRegex.test(htmlEditor.value)) {
            htmlEditor.value = htmlEditor.value.replace(actionRegex, `$1${email}$3`);
            scheduleUpdate();
        }
    }

    function checkEmailVerification(email) {
        return fetch('{{ route("playground.check-verified") }}?email=' + encodeURIComponent(email), {
            headers: { 'Accept': 'application/json' }
        })
        .then(r => r.json())
        .then(data => {
            if (data.verified) {
                isVerified    = true;
                verifiedEmail = email;
                localStorage.setItem('playground_verified_email', email);
                setEmailStatus('✅ Email verified — submissions to this address are active.', 'verified');
                verifyBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16"><path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/></svg> Verified';
                verifyBtn.style.background = 'linear-gradient(135deg,#059669 0%,#047857 100%)';
                verifyBtn.disabled = false;
                updateHtmlCodeWithEmail(email);
            } else {
                isVerified = false;
            }
            return data.verified;
        })
        .catch(() => { isVerified = false; return false; });
    }

    function setEmailStatus(msg, type) {
        emailStatus.textContent = msg;
        emailStatus.className   = 'email-status' + (type ? ' ' + type : '');
    }

    function pollVerification(email) {
        let attempts = 0;
        if (window.verificationInterval) clearInterval(window.verificationInterval);
        window.verificationInterval = setInterval(() => {
            if (++attempts > 40) {
                clearInterval(window.verificationInterval);
                setEmailStatus('Verification timed out. Please try again.', 'error');
                verifyBtn.disabled = false;
                verifyBtn.innerHTML = 'Verify Email';
                return;
            }
            checkEmailVerification(email).then(v => { if (v) clearInterval(window.verificationInterval); });
        }, 3000);
    }

    verifyBtn.addEventListener('click', () => {
        const email   = recipientEmail.value.trim();
        const emailRx = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email)              { setEmailStatus('Please enter an email address.', 'error'); recipientEmail.focus(); return; }
        if (!emailRx.test(email)){ setEmailStatus('Enter a valid email address.', 'error');   recipientEmail.focus(); return; }

        updateHtmlCodeWithEmail(email);
        verifyBtn.disabled  = true;
        verifyBtn.innerHTML = 'Sending…';
        setEmailStatus('', '');

        fetch('{{ route("playground.verify") }}', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' },
            body: JSON.stringify({ email })
        })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                setEmailStatus(`📬 Verification email sent to ${email}. Check your inbox and click the link.`, 'pending');
                pollVerification(email);
            } else {
                setEmailStatus(data.message || 'Failed to send verification.', 'error');
                verifyBtn.disabled  = false;
                verifyBtn.innerHTML = 'Verify Email';
            }
        })
        .catch(() => {
            setEmailStatus('Network error. Please try again.', 'error');
            verifyBtn.disabled  = false;
            verifyBtn.innerHTML = 'Verify Email';
        });
    });

    recipientEmail.addEventListener('input', function () {
        if (this.value.trim().includes('@')) updateHtmlCodeWithEmail(this.value.trim());
    });

    recipientEmail.addEventListener('blur', function () {
        if (this.value.trim().includes('@')) checkEmailVerification(this.value.trim());
    });

    /* ---- Form submit handler ---- */
    function resolveRecipientEmail(form) {
        const match = (form.getAttribute('action') || '').match(/\/f\/([^\s/?#]+@[^\s/?#]+\.[^\s/?#]+)/i);
        if (match) return decodeURIComponent(match[1]);
        const ei = form.querySelector('input[type="email"]');
        if (ei && ei.value) return ei.value;
        return recipientEmail.value.trim() || null;
    }

    function handleSubmit(e) {
        e.preventDefault();
        const form        = e.target;
        const emailRx     = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const targetEmail = resolveRecipientEmail(form);

        if (!targetEmail || !emailRx.test(targetEmail)) {
            showResponse('⚠️ No valid recipient email. Set the form <code>action="/f/your@email.com"</code> or verify an email above.', 'error');
            return;
        }

        const submitBtn = form.querySelector('[type="submit"]');
        if (submitBtn) { submitBtn.classList.add('loading'); submitBtn.disabled = true; }
        responseDiv.className = 'response-message';

        checkEmailVerification(targetEmail).then(verified => {
            if (!verified) {
                showResponse(`⚠️ <strong>${targetEmail}</strong> hasn't been verified yet. Enter it above and click Verify.`, 'error');
                recipientEmail.value = targetEmail;
                recipientEmail.focus();
                if (submitBtn) { submitBtn.classList.remove('loading'); submitBtn.disabled = false; }
                return;
            }

            const formData = new FormData(form);
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('recipient_email', targetEmail);
            formData.append('from_playground', 'true');

            fetch('{{ route("playground.submit") }}', {
                method: 'POST',
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' },
                body: formData
            })
            .then(async r => {
                const data = await r.json();
                if (data.redirect) {
                    showResponse('🔄 Redirecting to CAPTCHA verification…', 'info');
                    setTimeout(() => { window.location.href = data.redirect; }, 1000);
                    return;
                }
                if (!r.ok) throw new Error(data.message || 'Submission failed');
                if (data.success) {
                    showResponse(`✅ Submission delivered to <strong>${targetEmail}</strong>`, 'success');
                    form.reset();
                    showToast('Form submitted!');
                } else {
                    showResponse(data.message || 'An error occurred.', 'error');
                }
            })
            .catch(err => showResponse(err.message || 'Network error. Please try again.', 'error'))
            .finally(() => { if (submitBtn) { submitBtn.classList.remove('loading'); submitBtn.disabled = false; } });
        });
    }

    function attachFormHandler() {
        formPreview.querySelectorAll('form').forEach(form => {
            form.removeEventListener('submit', handleSubmit);
            form.addEventListener('submit', handleSubmit);
        });
    }

    /* ---- UI helpers ---- */
    function showResponse(msg, type) {
        responseDiv.innerHTML = msg;
        responseDiv.className = 'response-message show ' + type;
        if (type === 'success') setTimeout(() => responseDiv.classList.remove('show'), 5000);
    }

    function showToast(msg) {
        toast.textContent = msg;
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 2500);
    }

    /* ---- Init ---- */
    if (verifiedEmail) {
        recipientEmail.value = verifiedEmail;
        checkEmailVerification(verifiedEmail);
    }
});
</script>
<script src="/js/app.js"></script>
</body>
</html>