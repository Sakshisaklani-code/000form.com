<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?> - 000form</title>
    <!-- Favicon -->
    <link rel="icon" href="<?php echo e(asset('images/favicon/000formFavicon.png')); ?>" type="image/svg+xml">
    <!-- Canonical Tag --> 
    <link rel="canonical" href="https://000form.com/" />
    <!-- Keywords --> 
    <meta name="keywords" content="forms, laravel forms, php form builder, contact forms, form submissions, 000Form">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css">
    <!-- Open Graph Tags --> 
    <meta property="og:title" content="000Forms - Smart Form Submissions" /> 
    <meta property="og:description" content="Easily create and manage forms with 000Forms, a Laravel-powered solution." /> 
    <meta property="og:type" content="website" /> 
    <meta property="og:url" content="https://000form.com/" /> 
    <meta property="og:image" content="<?php echo e(asset('images/og-image/og-image.jpg')); ?>" /> 
    <meta property="og:site_name" content="000Forms" />
    <!-- csrf token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Index and follow for SEO -->
    <meta name="robots" content="index, follow">    
    <!-- Google Analytics tag (gtag.js) --> 
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TV3T8837GC"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-TV3T8837GC'); </script>
    <!-- Schema.org JSON-LD --> 
    <script type="application/ld+json"> 
        {
            "@context": "https://schema.org", 
            "@type": "Organization", 
            "name": "000Form", 
            "alternateName": "000Form", 
            "url": "https://000form.com/",
            "logo": "https://000form.com/images/logo/000formlogo.png" 
        }
    </script>
    <?php echo $__env->yieldPushContent('styles'); ?>

  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?> - 000form</title>
    <link rel="icon" href="<?php echo e(asset('images/favicon/000formFavicon.png')); ?>" type="image/svg+xml">
    <link rel="canonical" href="https://000form.com/" />
    <meta name="keywords" content="forms, laravel forms, php form builder, contact forms, form submissions, 000Form">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css">
    <meta property="og:title" content="000Forms - Smart Form Submissions" />
    <meta property="og:description" content="Easily create and manage forms with 000Forms, a Laravel-powered solution." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://000form.com/" />
    <meta property="og:image" content="<?php echo e(asset('images/og-image/og-image.jpg')); ?>" />
    <meta property="og:site_name" content="000Forms" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="robots" content="index, follow">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TV3T8837GC"></script>
    <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-TV3T8837GC');</script>
    <script type="application/ld+json">{"@context":"https://schema.org","@type":"Organization","name":"000Form","url":"https://000form.com/","logo":"https://000form.com/images/logo/000formlogo.png"}</script>
    <?php echo $__env->yieldPushContent('styles'); ?>

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --sidebar-width:  260px!important;
            --topbar-height:  78px;
            --radius-sm:  6px;
            --radius-md: 10px;
            --radius-lg: 14px;
            --bg-canvas:    #050505;
            --bg-surface:   #080808;
            --bg-raised:    #0d0d0d;
            --bg-hover:     #131313;
            --border:       #222222;
            --border-light: #1a1a1a;
            --text-primary:   #f0f0f0;
            --text-secondary: #d3d3d3;
            --text-tertiary:  #999999;
            --text-muted:     #828283;
            --accent:         #00ff88;
            --accent-dim:     rgba(0,255,136,0.07);
            --red:   #ff4455;
            --amber: #ffbb33;
        }

        html, body {
            height: 100%;
            font-family: 'Outfit', sans-serif;
            background: var(--bg-canvas);
            color: var(--text-primary);
            -webkit-font-smoothing: antialiased;
        }

        /* ══════════════════════════════════════════
           TOPBAR — spans full width (left:0)
           Logo is inside sidebar so corner is filled
        ══════════════════════════════════════════ */
        .topbar {
            position: fixed;
            top: 0; left: 0; right: 0;       /* full width — key fix */
            height: var(--topbar-height);
            background: rgba(5,5,5,0.95);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border-light);
            display: flex;
            align-items: center;
            justify-content: flex-end;        /* controls on right only */
            padding: 0 4.5rem;
            gap: 3rem;
            z-index: 100;
        }

        .topbar-right { display: flex; align-items: center; gap: 1.75rem; }

        /* ── Workspace pill ── */
        .ws-pill {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.42rem 0.75rem;
            border-radius: var(--radius-md);
            background: var(--bg-raised);
            border: 1px solid var(--border);
            font-size: 1rem125rem;
            font-family: 'Outfit', sans-serif;
            font-weight: 400;
            color: var(--text-secondary);
            cursor: pointer;
            position: relative;
            transition: all 0.18s;
        }
        .ws-pill:hover, .ws-pill.open { background: var(--bg-hover); color: var(--text-primary); border-color: var(--border); }
        .ws-pill-dot {
            width: 6px; height: 6px; border-radius: 50%;
            background: var(--accent); flex-shrink: 0;
            animation: blink 2s infinite;
        }
        @keyframes blink { 0%,100%{opacity:0.3} 50%{opacity:1} }

        .ws-dropdown {
            position: absolute;
            top: calc(100% + 8px); left: 0;
            min-width: 220px;
            background: var(--bg-raised);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 0.4rem;
            opacity: 0; pointer-events: none;
            transform: translateY(-6px);
            transition: opacity 0.18s, transform 0.18s;
            z-index: 400;
        }
        .ws-dropdown.show { opacity: 1; pointer-events: all; transform: translateY(0); }

        /* ── User Menu trigger ── */
        .user-menu { position: relative; }

        .user-menu-trigger {
            display: flex;
            align-items: center;
            gap: 0.55rem;
            padding: 0.35rem 0.65rem 0.35rem 0.35rem;
            border-radius: var(--radius-md);
            background: rgba(0, 255, 136, 0.08)!important;
            border: 1px solid var(--border);
            cursor: pointer;
            font-family: 'Outfit', sans-serif;
            transition: all 0.18s;
        }
        .user-menu-trigger:hover, .user-menu-trigger.open {
            background: var(--bg-hover);
            border-color: rgba(0,255,136,0.2);
        }
        .user-avatar-sm {
            width: 26px; height: 26px; border-radius: 50%;
            background: rgba(0,255,136,0.08);
            border: 1px solid rgba(0,255,136,0.25);
            display: flex; align-items: center; justify-content: center;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.65rem; font-weight: 600;
            color: var(--accent); flex-shrink: 0;
        }
        .user-menu-name {
            font-size: 1rem125rem;
            font-weight: 400;
            font-family: 'Outfit', sans-serif;
            color: var(--text-secondary);
            max-width: 180px;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .user-menu-chevron {
            font-size: 0.6rem; color: var(--text-tertiary);
            transition: transform 0.2s;
        }
        .user-menu-trigger.open .user-menu-chevron { transform: rotate(180deg); }

        /* ── Dropdowns shared ── */
        .user-dropdown {
            position: absolute;
            top: calc(100% + 8px); right: 0;
            width: 256px;
            background: var(--bg-raised);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 0.4rem;
            opacity: 0; pointer-events: none;
            transform: translateY(-6px);
            transition: opacity 0.18s, transform 0.18s;
            z-index: 400;
        }
        .user-dropdown.show { opacity: 1; pointer-events: all; transform: translateY(0); }

        .dropdown-header {
            padding: 0.55rem 0.65rem 0.65rem;
            border-bottom: 1px solid var(--border-light);
            margin-bottom: 0.35rem;
        }
        .dropdown-header-name {
            font-size: 1remrem; font-weight: 600;
            color: var(--text-primary);
            font-family: 'Outfit', sans-serif;
        }
        .dropdown-header-email {
            font-size: 0.68rem; color: var(--text-tertiary);
            font-family: 'JetBrains Mono', monospace; margin-top: 2px;
        }
        .dropdown-section-label {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.67rem; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.1em;
            color: var(--text-muted);
            padding: 0.5rem 0.65rem 0.2rem;
        }
        .dropdown-item {
            display: flex; align-items: center; gap: 0.6rem;
            padding: 0.47rem 0.65rem;
            border-radius: var(--radius-sm);
            font-size: 1rem125rem; font-weight: 400;
            font-family: 'Outfit', sans-serif;
            color: var(--text-secondary);
            text-decoration: none; cursor: pointer;
            border: none; background: transparent; width: 100%;
            transition: all 0.15s;
        }
        .dropdown-item:hover { background: var(--bg-hover); color: var(--text-primary); }
        .dropdown-item i { font-size: 1rem2rem; opacity: 0.45; flex-shrink: 0; width: 16px; }
        .dropdown-item:hover i { opacity: 1; }
        .dropdown-item.danger { color: var(--red); }
        .dropdown-item.danger i { color: var(--red); opacity: 0.6; }
        .dropdown-item.danger:hover { background: rgba(255,68,85,0.07); }
        .dropdown-divider { height: 1px; background: var(--border-light); margin: 0.35rem 0; }

        /* ws switcher rows */
        .ws-switch-btn {
            display: flex; align-items: center; gap: 0.55rem;
            width: 100%; padding: 0.45rem 0.55rem;
            background: transparent; border: none; border-radius: var(--radius-sm);
            cursor: pointer; font-family: 'Outfit', sans-serif;
            font-size: 1rem125rem; color: var(--text-secondary);
            transition: all 0.15s; text-align: left;
        }
        .ws-switch-btn:hover { background: var(--bg-hover); color: var(--text-primary); }
        .ws-switch-btn.active { color: var(--accent); }
        .ws-mini-avatar {
            width: 24px; height: 24px; border-radius: 6px;
            background: var(--bg-hover); border: 1px solid var(--border);
            display: flex; align-items: center; justify-content: center;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.6rem; font-weight: 700; color: var(--text-secondary);
            flex-shrink: 0;
        }
        .ws-mini-avatar.own { border-color: rgba(0,255,136,0.25); color: var(--accent); }
        .ws-switch-info { flex: 1; min-width: 0; }
        .ws-switch-name { display: block; font-size: 1remrem; font-weight: 500; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .ws-switch-role { display: block; font-size: 0.63rem; color: var(--text-muted); font-family: 'JetBrains Mono', monospace; margin-top: 1px; }
        .ws-active-badge {
            font-size: 0.54rem; font-weight: 600; padding: 1px 6px;
            border-radius: 20px; background: rgba(0,255,136,0.07);
            border: 1px solid rgba(0,255,136,0.18); color: var(--accent);
            font-family: 'JetBrains Mono', monospace;
        }

        /* ══════════════════════════════════════════
           SIDEBAR — top:0 so logo block fills corner
        ══════════════════════════════════════════ */
        .shell {
            display: flex;
            min-height: 100vh;
            padding-top: var(--topbar-height);
        }

        .sidebar {
            width: var(--sidebar-width);
            background: var(--bg-surface);
            border-right: 1px solid var(--border-light);
            position: fixed;
            padding:  0.75rem!important;
            top: 0; left: 0; bottom: 0;    /* top:0 — fills the corner */
            z-index: 110;                   /* above topbar */
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s cubic-bezier(0.4,0,0.2,1);
        }

        /* Logo block — same height as topbar, fills top-left corner */
        .sidebar-brand {
            display: flex;
            align-items: center;
            height: var(--topbar-height);
            padding: 0 1.25rem;
            flex-shrink: 0;
            background: var(--bg-surface);
        }
        .sidebar-brand a { display: flex; align-items: center; text-decoration: none; }
        .sidebar-brand img { height: 45px; width: auto; }

        .sidebar-section-label {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.7rem; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.12em;
            color: var(--text-muted);
            padding: 1rem 1rem 0.3rem;
            display: flex; align-items: center; gap: 8px;
        }
        .sidebar-section-label::after {
            content: ''; flex: 1; height: 1px;
            background: linear-gradient(90deg, var(--border-light), transparent);
        }

        .nav-list { list-style: none; padding: 0 0.5rem; }
        .nav-item { margin: 1px 0; }

        .nav-link {
            display: flex; align-items: center; gap: 0.65rem;
            padding: 0.5rem 0.7rem;
            border-radius: var(--radius-md);
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 1rem; font-weight: 400;
            font-family: 'Outfit', sans-serif;
            transition: all 0.18s;
            position: relative;
        }
        .nav-link:hover { background: var(--bg-hover); color: var(--text-primary); }
        .nav-link.active { background: var(--accent-dim); color: var(--accent); font-weight: 500; }
        .nav-link.active::before {
            content: ''; position: absolute;
            left: 0; top: 22%; bottom: 22%;
            width: 2px; border-radius: 0 2px 2px 0;
            background: var(--accent);
            box-shadow: 0 0 8px rgba(0,255,136,0.5);
        }
        .nav-icon { display: flex; width: 16px; flex-shrink: 0; opacity: 0.4; }
        .nav-link:hover .nav-icon, .nav-link.active .nav-icon { opacity: 1; }
        .nav-link.active .nav-icon svg { stroke: var(--accent); }

        /* ── New button — same muted style as other nav links ── */
        .new-btn {
            display: flex; align-items: center; gap: 0.65rem;
            width: 100%; padding: 0.5rem 0.7rem;
            border-radius: var(--radius-md);
            background: transparent; border: none; cursor: pointer;
            font-family: 'Outfit', sans-serif;
            font-size: 1rem; font-weight: 400;
            color: var(--text-secondary);    /* ← muted, matches other nav items */
            transition: all 0.18s;
        }
        .new-btn:hover { background: var(--bg-hover); color: var(--text-primary); }
        .new-btn.open  { background: var(--bg-hover); color: var(--text-primary); }
        .new-btn-icon  { display: flex; width: 16px; flex-shrink: 0; opacity: 0.4; }
        .new-btn:hover .new-btn-icon, .new-btn.open .new-btn-icon { opacity: 1; }
        .new-btn-chevron {
            margin-left: auto; font-size: 0.58rem;
            opacity: 0.35; transition: transform 0.22s;
        }
        .new-btn.open .new-btn-chevron { transform: rotate(180deg); opacity: 0.55; }
        .new-btn-body { overflow: hidden; max-height: 0; transition: max-height 0.28s cubic-bezier(0.4,0,0.2,1); }
        .new-btn-body.open { max-height: 120px; }

        .new-sub-item {
            display: flex; align-items: center; gap: 0.55rem;
            width: 100%; padding: 0.42rem 0.7rem 0.42rem 2.55rem;
            background: transparent; border: none; cursor: pointer;
            font-family: 'Outfit', sans-serif; font-size: 1remrem;
            color: var(--text-secondary);
            border-radius: var(--radius-sm);
            text-decoration: none; transition: all 0.15s;
        }
        .new-sub-item:hover { background: var(--bg-hover); color: var(--text-primary); }
        .new-sub-item i { font-size: 0.78rem; opacity: 0.45; }
        .new-sub-item:hover i { opacity: 1; }

        /* Projects tree */
        .proj-row { margin: 1px 0; }
        .proj-row-wrap { display: flex; align-items: center; }
        .proj-row-link {
            display: flex; align-items: center; gap: 0.5rem;
            flex: 1; min-width: 0;
            padding: 0.42rem 0.4rem 0.42rem 0.7rem;
            border-radius: var(--radius-sm);
            color: var(--text-secondary); text-decoration: none;
            font-size: 1rem125rem; font-family: 'Outfit', sans-serif;
            transition: all 0.15s;
        }
        .proj-row-link:hover { background: var(--bg-hover); color: var(--text-primary); }
        .proj-row-link.active { color: var(--accent); background: var(--accent-dim); }
        .proj-color-dot { width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0; }
        .proj-name-text { white-space: nowrap; overflow: hidden; text-overflow: ellipsis; flex: 1; }
        .proj-expand-btn {
            display: flex; align-items: center; justify-content: center;
            width: 22px; min-height: 26px!important;
            background: transparent; border: none; cursor: pointer;
            color: var(--text-tertiary); border-radius: var(--radius-sm); flex-shrink: 0;
        }
        .proj-expand-btn svg { transition: transform 0.2s; opacity: 0.35; }
        .proj-expand-btn.open svg { transform: rotate(90deg); opacity: 0.65; }
        .forms-list {
            overflow: hidden; max-height: 0;
            transition: max-height 0.25s cubic-bezier(0.4,0,0.2,1);
            padding-left: 1.4rem;
        }
        .forms-list.open { max-height: 400px; }
        .form-link {
            display: flex; align-items: center; gap: 0.45rem;
            padding: 0.33rem 0.55rem;
            border-radius: var(--radius-sm);
            color: var(--text-tertiary); text-decoration: none;
            font-size: 0.9rem; font-family: 'Outfit', sans-serif;
            transition: all 0.15s;
        }
        .form-link:hover { background: var(--bg-hover); color: var(--text-secondary); }
        .form-link.active { color: var(--accent); }
        .form-link-dot { width: 3px; height: 3px; border-radius: 50%; background: currentColor; opacity: 0.45; flex-shrink: 0; }

        .sidebar-spacer { flex: 1; }

        /* ── Sidebar bottom — account + settings shortcut ── */
        .sidebar-bottom {
            border-top: 1px solid var(--border-light);
            padding: 0.5rem;
            flex-shrink: 0;
        }
        .sidebar-user-btn {
            display: flex; align-items: center; gap: 0.6rem;
            width: 100%; padding: 0.5rem 0.6rem;
            border-radius: var(--radius-md);
            background: transparent; border: none; cursor: pointer;
            font-family: 'Outfit', sans-serif; text-decoration: none;
            transition: all 0.18s;
        }
        .sidebar-user-btn:hover { background: var(--bg-hover); }
        .sidebar-user-avatar {
            width: 28px; height: 28px; border-radius: 50%;
            background: rgba(0,255,136,0.07);
            border: 1px solid rgba(0,255,136,0.18);
            display: flex; align-items: center; justify-content: center;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.63rem; font-weight: 600; color: var(--accent);
            flex-shrink: 0;
        }
        .sidebar-user-info { flex: 1; min-width: 0; text-align: left; }
        .sidebar-user-name {
            display: block; font-size: 1remrem; font-weight: 500;
            color: var(--text-primary); font-family: 'Outfit', sans-serif;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .sidebar-user-email {
            display: block; font-size: 0.66rem; color: var(--text-tertiary);
            font-family: 'JetBrains Mono', monospace;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .sidebar-settings-icon {
            font-size: 1remrem; color: var(--text-tertiary); flex-shrink: 0;
            transition: color 0.15s;
        }
        .sidebar-user-btn:hover .sidebar-settings-icon { color: var(--accent); }

        /* ══════════════════════════════════════════
           MAIN
        ══════════════════════════════════════════ */
        .main {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 2rem 2.5rem;
            min-height: 100vh;
            background: var(--bg-canvas);
        }

        .alert {
            display: flex; align-items: center; gap: 0.75rem;
            padding: 0.65rem 1rem; border-radius: var(--radius-md);
            margin-bottom: 1rem;
            font-size: 1rem125rem; font-family: 'Outfit', sans-serif;
        }
        .alert-success { background: rgba(0,255,136,0.05); border: 1px solid rgba(0,255,136,0.14); color: var(--accent); }
        .alert-error   { background: rgba(255,68,68,0.05);  border: 1px solid rgba(255,68,68,0.14);  color: var(--red); }

        /* ══════════════════════════════════════════
           MOBILE
        ══════════════════════════════════════════ */
        .mobile-header {
            display: none;
            position: fixed; top: 0; left: 0; right: 0;
            height: var(--topbar-height);
            background: rgba(5,5,5,0.97);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-light);
            padding: 0 1rem;
            align-items: center; justify-content: space-between;
            z-index: 300;
        }
        .mobile-logo img { height: 24px; }
        .hamburger {
            display: flex; flex-direction: column;
            justify-content: center; gap: 4px;
            width: 36px; height: 36px;
            background: var(--bg-raised); border: 1px solid var(--border);
            border-radius: var(--radius-md); cursor: pointer; align-items: center;
        }
        .hamburger span { display: block; width: 15px; height: 1.5px; background: var(--text-primary); border-radius: 2px; transition: 0.2s; }
        .hamburger.open span:nth-child(1) { transform: rotate(45deg) translate(4px,4px); }
        .hamburger.open span:nth-child(2) { opacity: 0; }
        .hamburger.open span:nth-child(3) { transform: rotate(-45deg) translate(4px,-4px); }
        .overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.75); backdrop-filter: blur(4px); z-index: 89; }
        .overlay.show { display: block; }

        /* New Form Modal */
        .nfm-backdrop { display: none; position: fixed; inset: 0; background: rgba(0,0,0,1rem); backdrop-filter: blur(8px); z-index: 500; align-items: center; justify-content: center; }
        .nfm-backdrop.show { display: flex; }
        .nfm-dialog { background: var(--bg-raised); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 1.5rem; width: 100%; max-width: 480px; margin: 1rem; max-height: 90vh; overflow-y: auto; }
        .nfm-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem; padding-bottom: 0.75rem; border-bottom: 1px solid var(--border-light); }
        .nfm-title { font-size: 0.9375rem; font-weight: 600; font-family: 'Outfit', sans-serif; }
        .nfm-close { width: 26px; height: 26px; border-radius: 50%; background: transparent; border: 1px solid var(--border); color: var(--text-secondary); cursor: pointer; font-size: 0.9rem; display: flex; align-items: center; justify-content: center; transition: all 0.15s; }
        .nfm-close:hover { background: var(--bg-hover); color: var(--text-primary); }
        .nfm-field { margin-bottom: 1rem; }
        .nfm-label { display: block; font-size: 1remrem; font-weight: 500; font-family: 'Outfit', sans-serif; color: var(--text-secondary); margin-bottom: 0.35rem; }
        .nfm-required { color: var(--red); }
        .nfm-select, .nfm-input { width: 100%; padding: 0.55rem 0.75rem; background: var(--bg-surface); border: 1px solid var(--border); border-radius: var(--radius-sm); color: var(--text-primary); font-family: 'Outfit', sans-serif; font-size: 1rem125rem; transition: border-color 0.15s; }
        .nfm-select:focus, .nfm-input:focus { outline: none; border-color: rgba(0,255,136,0.35); }
        .nfm-actions { display: flex; gap: 0.6rem; margin-top: 1.25rem; padding-top: 1rem; border-top: 1px solid var(--border-light); }
        .nfm-btn-primary { padding: 0.55rem 1.25rem; background: var(--accent); color: #000; border: none; border-radius: var(--radius-sm); font-weight: 600; font-family: 'Outfit', sans-serif; font-size: 1rem125rem; cursor: pointer; transition: opacity 0.15s; }
        .nfm-btn-primary:hover { opacity: 1rem8; }
        .nfm-btn-secondary { padding: 0.55rem 1rem; background: transparent; color: var(--text-secondary); border: 1px solid var(--border); border-radius: var(--radius-sm); font-family: 'Outfit', sans-serif; font-size: 1rem125rem; cursor: pointer; transition: all 0.15s; }
        .nfm-btn-secondary:hover { background: var(--bg-hover); color: var(--text-primary); }
        .nfm-no-projects { display: flex; gap: 0.7rem; padding: 1rem; background: rgba(255,187,51,0.04); border: 1px solid rgba(255,187,51,0.14); border-radius: var(--radius-sm); font-size: 1rem125rem; font-family: 'Outfit', sans-serif; color: var(--amber); }

        @media (max-width: 768px) {
            .mobile-header { display: flex; }
            .topbar { display: none; }
            .shell { padding-top: var(--topbar-height); }
            .sidebar { top: var(--topbar-height); transform: translateX(-100%); }
            .sidebar-brand { display: none; }
            .sidebar.open { transform: translateX(0); }
            .main { margin-left: 0; padding: 1rem; }
        }
        body.no-scroll { overflow: hidden; }
    </style>
</head>
<body>

    
    <div class="mobile-header">
        <a href="<?php echo e(route('dashboard')); ?>" class="mobile-logo">
            <img src="<?php echo e(asset('images/logo/000formlogo.png')); ?>" alt="000form">
        </a>
        <button class="hamburger" id="hamburger" aria-label="Menu">
            <span></span><span></span><span></span>
        </button>
    </div>
    <div class="overlay" id="overlay"></div>

    
    <header class="topbar" id="topbar">
        <div class="topbar-right">

            
            <?php if(isset($availableWorkspaces) && $availableWorkspaces->count() > 0): ?>
            <div class="user-menu" id="wsSwitcherWrap">
                <button class="ws-pill" id="wsSwitcherTrigger" aria-expanded="false">
                    <span class="ws-pill-dot"></span>
                    <span style="font-family:'Outfit',sans-serif; font-size:1rem125rem; font-weight:400; color:var(--text-secondary);">
                        <?php if(isset($isOwnWorkspace) && $isOwnWorkspace): ?>
                            My Account
                        <?php else: ?>
                            <?php $__currentLoopData = $availableWorkspaces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ws): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset($activeWorkspaceOwnerId) && $activeWorkspaceOwnerId === $ws['id']): ?><?php echo e($ws['name']); ?><?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </span>
                    <i class="bi bi-chevron-down" style="font-size:0.58rem; opacity:0.4; margin-left:2px;"></i>
                </button>
                <div class="ws-dropdown" id="wsDropdown">
                    <div class="dropdown-section-label">Switch workspace</div>
                    <form method="POST" action="<?php echo e(route('team.switch')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="workspace_owner_id" value="<?php echo e(Auth::id()); ?>">
                        <button type="submit" class="ws-switch-btn <?php echo e((isset($isOwnWorkspace) && $isOwnWorkspace) ? 'active' : ''); ?>">
                            <div class="ws-mini-avatar own"><?php echo e(strtoupper(substr(Auth::user()->name ?? Auth::user()->email, 0, 1))); ?></div>
                            <div class="ws-switch-info">
                                <span class="ws-switch-name">My Account</span>
                                <span class="ws-switch-role">personal</span>
                            </div>
                            <?php if(isset($isOwnWorkspace) && $isOwnWorkspace): ?><span class="ws-active-badge">Active</span><?php endif; ?>
                        </button>
                    </form>
                    <?php $__currentLoopData = $availableWorkspaces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workspace): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <form method="POST" action="<?php echo e(route('team.switch')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="workspace_owner_id" value="<?php echo e($workspace['id']); ?>">
                        <button type="submit" class="ws-switch-btn <?php echo e((isset($activeWorkspaceOwnerId) && $activeWorkspaceOwnerId === $workspace['id']) ? 'active' : ''); ?>">
                            <div class="ws-mini-avatar"><?php echo e(strtoupper(substr($workspace['name'], 0, 1))); ?></div>
                            <div class="ws-switch-info">
                                <span class="ws-switch-name"><?php echo e($workspace['name']); ?></span>
                                <span class="ws-switch-role"><?php echo e(ucfirst($workspace['role'])); ?></span>
                            </div>
                            <?php if(isset($activeWorkspaceOwnerId) && $activeWorkspaceOwnerId === $workspace['id']): ?><span class="ws-active-badge">Active</span><?php endif; ?>
                        </button>
                    </form>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>

            
            <div class="user-menu" id="userMenuWrap">
                <button class="user-menu-trigger" id="userMenuTrigger" aria-expanded="false">
                    <div class="user-avatar-sm"><?php echo e(strtoupper(substr(Auth::user()->email, 0, 1))); ?></div>
                    <span class="user-menu-name"><?php echo e(Auth::user()->email); ?></span>
                    <i class="bi bi-chevron-down user-menu-chevron"></i>
                </button>
                <div class="user-dropdown" id="userDropdown">
                    <div class="dropdown-header">
                        <?php if(Auth::user()->name): ?><div class="dropdown-header-name"><?php echo e(Auth::user()->name); ?></div><?php endif; ?>
                        <div class="dropdown-header-email"><?php echo e(Auth::user()->email); ?></div>
                    </div>
                    <div class="dropdown-section-label">Account</div>
                    <a href="<?php echo e(route('account.settings')); ?>" class="dropdown-item"><i class="bi bi-person-gear"></i> Profile Settings</a>
                    <a href="<?php echo e(route('team.index')); ?>" class="dropdown-item"><i class="bi bi-people"></i> Team Management</a>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-section-label">Billing</div>
                    <a href="<?php echo e(route('billing.portal')); ?>" class="dropdown-item"><i class="bi bi-credit-card"></i> Plans & Subscription</a>
                    <a href="<?php echo e(route('billing.payment-history')); ?>" class="dropdown-item"><i class="bi bi-receipt"></i> Payment History</a>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-section-label">Resources</div>
                    <a href="<?php echo e(route('docs')); ?>" target="_blank" class="dropdown-item"><i class="bi bi-file-text"></i> Documentation</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="dropdown-item danger"><i class="bi bi-box-arrow-right"></i> Sign Out</button>
                    </form>
                </div>
            </div>

        </div>
    </header>

    
    <div class="shell">
        <aside class="sidebar" id="sidebar">

            
            <div class="sidebar-brand">
                <a href="<?php echo e(route('dashboard')); ?>">
                    <img src="<?php echo e(asset('images/logo/000formlogo.png')); ?>" alt="000form">
                </a>
            </div>

            <div class="sidebar-section-label">Main</div>
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="<?php echo e(route('dashboard')); ?>" class="nav-link <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>">
                        <span class="nav-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <rect x="3" y="3" width="7" height="7" rx="1"/>
                                <rect x="14" y="3" width="7" height="7" rx="1"/>
                                <rect x="14" y="14" width="7" height="7" rx="1"/>
                                <rect x="3" y="14" width="7" height="7" rx="1"/>
                            </svg>
                        </span>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    
                    <button class="new-btn" id="newQuickTrigger" aria-expanded="false">
                        <span class="new-btn-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="9"/>
                                <line x1="12" y1="8" x2="12" y2="16"/>
                                <line x1="8" y1="12" x2="16" y2="12"/>
                            </svg>
                        </span>
                        New
                        <i class="bi bi-chevron-down new-btn-chevron"></i>
                    </button>
                    <div class="new-btn-body" id="newQuickBody">
                        <a href="<?php echo e(route('dashboard.projects.create')); ?>" class="new-sub-item">
                            <i class="bi bi-folder-plus"></i> New Project
                        </a>
                        <button class="new-sub-item" id="openNewFormModal">
                            <i class="bi bi-file-plus"></i> New Form
                        </button>
                    </div>
                </li>
            </ul>

            <?php if(isset($sidebarProjects) && $sidebarProjects->isNotEmpty()): ?>
            <div class="sidebar-section-label" style="margin-top:0.25rem">Projects</div>
            <ul class="nav-list" id="projectsTree">
                <?php $__currentLoopData = $sidebarProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item proj-row" id="proj-row-<?php echo e($proj->id); ?>">
                    <div class="proj-row-wrap">
                        <a href="<?php echo e(route('dashboard.projects.show', $proj->id)); ?>" class="proj-row-link" title="<?php echo e($proj->name); ?>">
                            <span class="proj-color-dot" style="background:<?php echo e($proj->color ?? '#6366f1'); ?>"></span>
                            <span class="proj-name-text"><?php echo e($proj->name); ?></span>
                            <?php if(isset($proj->forms) && $proj->forms->isNotEmpty()): ?>
                            <button class="proj-expand-btn" id="proj-expand-<?php echo e($proj->id); ?>" data-proj="<?php echo e($proj->id); ?>">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                            </button>
                            <?php endif; ?>
                        </a>
                        
                    </div>
                    <?php if(isset($proj->forms) && $proj->forms->isNotEmpty()): ?>
                    <div class="forms-list" id="forms-list-<?php echo e($proj->id); ?>">
                        <?php $__currentLoopData = $proj->forms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('dashboard.forms.show', $form->id)); ?>" class="form-link">
                            <span class="form-link-dot"></span><?php echo e($form->name); ?>

                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <?php endif; ?>

            <div class="sidebar-spacer"></div>

            
            <div class="sidebar-bottom">
                <a href="<?php echo e(route('account.settings')); ?>" class="sidebar-user-btn">
                    <div class="sidebar-user-avatar">
                        <?php echo e(strtoupper(substr(Auth::user()->email, 0, 1))); ?>

                    </div>
                    <div class="sidebar-user-info">
                        <span class="sidebar-user-name"><?php echo e(Auth::user()->name ?? 'My Account'); ?></span>
                        <span class="sidebar-user-email"><?php echo e(Auth::user()->email); ?></span>
                    </div>
                    <i class="bi bi-gear sidebar-settings-icon"></i>
                </a>
            </div>

        </aside>

        <main class="main">
            <?php if(session('message')): ?><div class="alert alert-success"><i class="bi bi-check-circle"></i> <?php echo e(session('message')); ?></div><?php endif; ?>
            <?php if(session('error')): ?><div class="alert alert-error"><i class="bi bi-exclamation-triangle"></i> <?php echo e(session('error')); ?></div><?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    
    <div id="newFormModalBackdrop" class="nfm-backdrop" aria-hidden="true">
        <div class="nfm-dialog">
            <div class="nfm-header">
                <h2 class="nfm-title">Create New Form</h2>
                <button class="nfm-close" id="closeNewFormModal">&times;</button>
            </div>
            <form method="POST" action="<?php echo e(route('dashboard.forms.store')); ?>" id="newFormQuickForm">
                <?php echo csrf_field(); ?>
                <div class="nfm-field">
                    <label class="nfm-label">Project <span class="nfm-required">*</span></label>
                    <?php if(isset($sidebarProjects) && $sidebarProjects->isNotEmpty()): ?>
                        <select name="project_id" class="nfm-select" required>
                            <option value="">— Select a project —</option>
                            <?php $__currentLoopData = $sidebarProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($proj->id); ?>"><?php echo e($proj->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    <?php else: ?>
                        <div class="nfm-no-projects">
                            <i class="bi bi-info-circle"></i>
                            <div><strong>No projects yet.</strong> Create a project first.</div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="nfm-field">
                    <label class="nfm-label">Form Name <span class="nfm-required">*</span></label>
                    <input type="text" name="name" class="nfm-input" placeholder="e.g. Contact Form" required>
                </div>
                <div class="nfm-field">
                    <label class="nfm-label">Recipient Email</label>
                    <input type="email" name="recipient_email" class="nfm-input" value="<?php echo e(Auth::user()->email); ?>" readonly>
                </div>
                <div class="nfm-actions">
                    <button type="submit" class="nfm-btn-primary">Create Form</button>
                    <button type="button" class="nfm-btn-secondary" id="cancelNewFormModal">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const hamburger = document.getElementById('hamburger');
            const sidebar   = document.getElementById('sidebar');
            const overlay   = document.getElementById('overlay');

            const openSidebar  = () => { sidebar.classList.add('open');    overlay.classList.add('show');    hamburger?.classList.add('open');    document.body.classList.add('no-scroll'); };
            const closeSidebar = () => { sidebar.classList.remove('open'); overlay.classList.remove('show'); hamburger?.classList.remove('open'); document.body.classList.remove('no-scroll'); };
            hamburger?.addEventListener('click', () => sidebar.classList.contains('open') ? closeSidebar() : openSidebar());
            overlay?.addEventListener('click', closeSidebar);

            // New accordion
            const newTrigger = document.getElementById('newQuickTrigger');
            const newBody    = document.getElementById('newQuickBody');
            newTrigger?.addEventListener('click', () => { newBody.classList.toggle('open'); newTrigger.classList.toggle('open'); });

            // Project expand
            document.querySelectorAll('.proj-expand-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    document.getElementById('forms-list-' + this.dataset.proj)?.classList.toggle('open');
                    this.classList.toggle('open');
                });
            });

            // Dropdowns
            const closeAllDropdowns = () => {
                document.querySelectorAll('.user-dropdown, .ws-dropdown').forEach(d => d.classList.remove('show'));
                document.querySelectorAll('.user-menu-trigger, .ws-pill').forEach(t => { t.classList.remove('open'); t.setAttribute('aria-expanded','false'); });
            };
            const initDropdown = (tid, did) => {
                const trigger  = document.getElementById(tid);
                const dropdown = document.getElementById(did);
                if (!trigger || !dropdown) return;
                trigger.addEventListener('click', e => {
                    e.stopPropagation();
                    const wasOpen = dropdown.classList.contains('show');
                    closeAllDropdowns();
                    if (!wasOpen) { dropdown.classList.add('show'); trigger.classList.add('open'); trigger.setAttribute('aria-expanded','true'); }
                });
            };
            initDropdown('userMenuTrigger', 'userDropdown');
            initDropdown('wsSwitcherTrigger', 'wsDropdown');
            document.addEventListener('click', closeAllDropdowns);
            document.addEventListener('keydown', e => { if (e.key === 'Escape') { closeAllDropdowns(); closeNfm(); closeSidebar(); } });

            // New Form Modal
            const modal     = document.getElementById('newFormModalBackdrop');
            const openBtn   = document.getElementById('openNewFormModal');
            const closeBtn  = document.getElementById('closeNewFormModal');
            const cancelBtn = document.getElementById('cancelNewFormModal');
            const openNfm  = () => { modal.classList.add('show');    document.body.classList.add('no-scroll'); };
            const closeNfm = () => { modal.classList.remove('show'); document.body.classList.remove('no-scroll'); document.getElementById('newFormQuickForm')?.reset(); };
            openBtn?.addEventListener('click', openNfm);
            closeBtn?.addEventListener('click', closeNfm);
            cancelBtn?.addEventListener('click', closeNfm);
            modal?.addEventListener('click', e => { if (e.target === modal) closeNfm(); });
        });
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\Git-folders\000form.com\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>