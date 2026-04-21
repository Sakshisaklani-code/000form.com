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
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --sidebar-width: 300px;
            --header-height: 56px;
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.5);
            --shadow-md: 0 8px 32px rgba(0,0,0,0.7);

            /* Original theme colors preserved */
            --bg-canvas:   #050505;
            --bg-surface:  #0a0a0a;
            --bg-raised:   #0f0f0f;
            --bg-hover:    #151515;
            --border:      #2a2a2a;
            --border-light: #1e1e1e;
            --text-primary: #ffffff;
            --text-secondary: #c0c0c8;
            --text-tertiary: #888888;
            --text-muted:    #666666;
            --accent:      #00ff88;
            --accent-glow: rgba(0,255,136,0.08);
            --accent-glow-strong: rgba(0,255,136,0.12);
            --green:  #00ff88;
            --red:    #ff5555;
            --amber:  #ffbb33;
        }

        html, body {
            height: 100%;
            font-family: 'Outfit', sans-serif;
            background: var(--bg-canvas);
            color: var(--text-primary);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* ── Layout Shell ─────────────────────────────────── */
        .shell { display: flex; min-height: 100vh; }

        /* ── Sidebar - Premium Design ─────────────────────── */
        .sidebar {
            padding: 1rem;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, #070707 0%, #030303 100%);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0; bottom: 0;
            z-index: 200;
            overflow-y: auto;
            overflow-x: hidden;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            scrollbar-width: thin;
            scrollbar-color: var(--accent) var(--bg-raised);
            scrollbar-gutter: stable;
        }
        /* ── Premium Scrollbar ───────────────────── */
        .sidebar {
            scrollbar-width: thin;
            scrollbar-color: transparent transparent;
        }

        /* Chrome / Edge / Safari */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, rgba(0,255,136,0.2), rgba(0,255,136,0.6));
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        /* Show scrollbar only on hover */
        .sidebar:hover::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, rgba(0,255,136,0.5), rgba(0,255,136,1));
        }

        /* Smooth scroll */
        .sidebar {
            scroll-behavior: smooth;
        }

        /* ── Logo Section ─────────────────────────────────── */
        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1.25rem 1.25rem 1rem;
            text-decoration: none;
            flex-shrink: 0;
            border-bottom: 1px solid var(--border-light);
            margin-bottom: 1.25rem;
        }
        .sidebar-brand img { height: 36px; transition: transform 0.2s; }
        .sidebar-brand:hover img { transform: scale(1.02); }

        /* ── User Card - Modern Design ────────────────────── */
        .user-card {
            margin: 0 1rem 1rem;
            padding: 6px;
            border-radius: 999px;
            background: rgba(255,255,255,0.02);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 6px;
            backdrop-filter: blur(8px);
        }

        /* Avatar pill */
        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 999px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 0.85rem;
            font-weight: 600;
            font-family: 'JetBrains Mono', monospace;

            color: #00ff88;

            background: radial-gradient(circle at 30% 30%, rgba(0,255,136,0.25), rgba(0,255,136,0.05));
            
            border: 1px solid rgba(0,255,136,0.5);

            box-shadow:
                0 0 0 2px rgba(0,255,136,0.05),
                0 4px 12px rgba(0,0,0,0.6),
                inset 0 0 8px rgba(0,255,136,0.15);

            transition: all 0.25s ease;
        }

        /* Hover effect */
        .user-avatar:hover {
            transform: scale(1.05);
            box-shadow:
                0 0 0 3px rgba(0,255,136,0.1),
                0 6px 18px rgba(0,0,0,0.8),
                inset 0 0 10px rgba(0,255,136,0.25);
        }

        /* Email pill */
        .user-info {
            flex: 1;
            display: flex;
            align-items: center;
            background: rgba(0,255,136,0.05);
            border-radius: 999px;
            padding: 6px 12px;
            overflow: hidden;
        }

        /* Hide name (cleaner UI) */
        .user-name {
            display: none;
        }

        .user-email {
            font-size: 0.7rem;
            color: var(--text-secondary);
        }
        @keyframes pulse-dot {
            0%,100% { box-shadow: 0 0 6px rgba(0,255,136,0.4); opacity: 0.8; transform: scale(1); }
            50%      { box-shadow: 0 0 16px rgba(0,255,136,0.9); opacity: 1; transform: scale(1.1); }
        }

        /* ── Workspace Switcher - Card Style ──────────────── */
        .ws-section { padding: 0 1rem 0.5rem; margin-bottom: 0.5rem; }
        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            padding: 0 0.25rem;
        }
        .section-label {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.65rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--text-tertiary);
        }
        .ws-indicator {
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .ws-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: var(--green);
            animation: blink 1.5s infinite;
        }
        @keyframes blink { 0%,100%{opacity:0.4} 50%{opacity:1} }

        .ws-form { margin-bottom: 0.5rem; }
        .ws-btn {
            width: 100%;
            background: transparent;
            border: 1px solid transparent;
            border-radius: var(--radius-md);
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.7rem 0.75rem;
            font-family: 'Outfit', sans-serif;
            transition: all 0.2s ease;
        }
        .ws-btn:hover { 
            background: var(--bg-hover); 
            border-color: var(--border);
            transform: translateX(2px);
        }
        .ws-btn.active-workspace {
            background: linear-gradient(90deg, var(--accent-glow), transparent);
            border-left: 2px solid var(--accent);
            border-radius: var(--radius-md);
        }
        .ws-avatar {
            width: 34px; height: 34px;
            border-radius: 10px;
            background: var(--bg-hover);
            border: 1px solid var(--border);
            display: flex; align-items: center; justify-content: center;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.8rem; font-weight: 700; color: var(--text-secondary);
            flex-shrink: 0;
            transition: all 0.2s;
        }
        .ws-btn:hover .ws-avatar { border-color: var(--accent); }
        .ws-avatar.own {
            background: linear-gradient(135deg, var(--accent-glow), rgba(0,255,136,0.05));
            border-color: rgba(0,255,136,0.4);
            color: var(--accent);
        }
        .ws-details { flex: 1; text-align: left; min-width: 0; }
        .ws-name {
            display: block; font-size: 0.85rem; font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .ws-role {
            display: block; font-size: 0.6rem; color: var(--text-tertiary);
            font-family: 'JetBrains Mono', monospace; margin-top: 2px;
        }
        .ws-badge {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.55rem; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.06em;
            padding: 2px 8px;
            background: var(--accent-glow-strong);
            border: 1px solid rgba(0,255,136,0.3);
            color: var(--accent);
            border-radius: 20px; flex-shrink: 0;
        }

        /* ── Navigation - Modern Icons & Spacing ──────────── */
        .nav-group { margin-bottom: 0.8rem; }
        .nav-group-label {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--text-tertiary);
            padding: 0 1.25rem;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .nav-group-label::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, var(--border), transparent);
        }
        .nav-list { list-style: none; padding: 0 0.75rem; }
        .nav-item { margin: 3px 0; }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.875rem;
            padding: 0.7rem 0.875rem;
            border-radius: var(--radius-md);
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s ease;
            position: relative;
        }
        .nav-link:hover { 
            background: var(--bg-hover); 
            color: var(--text-primary);
            transform: translateX(3px);
        }
        .nav-link.active {
            background: linear-gradient(90deg, var(--accent-glow), transparent);
            color: var(--accent);
        }
        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0; top: 20%; bottom: 20%;
            width: 3px;
            border-radius: 0 3px 3px 0;
            background: var(--accent);
            box-shadow: 0 0 12px rgba(0,255,136,0.8);
        }
        .nav-icon {
            display: flex; align-items: center; justify-content: center;
            width: 22px; flex-shrink: 0;
            opacity: 0.7;
            transition: all 0.2s;
        }
        .nav-link:hover .nav-icon,
        .nav-link.active .nav-icon { opacity: 1; transform: scale(1.05); }
        .nav-link.active .nav-icon svg { stroke: var(--accent); }

        /* ── Account Accordion - Smooth Design ────────────── */
        .acc-wrap { padding: 0 0.75rem; }
        .acc-trigger {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 0.7rem 0.875rem;
            border-radius: var(--radius-md);
            background: transparent;
            border: none;
            cursor: pointer;
            font-family: 'Outfit', sans-serif;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-secondary);
            transition: all 0.2s ease;
        }
        .acc-trigger:hover { 
            background: var(--bg-hover); 
            color: var(--text-primary);
            transform: translateX(3px);
        }
        .acc-trigger.open-active {
            background: linear-gradient(90deg, var(--accent-glow), transparent);
            color: var(--accent);
        }
        .acc-trigger-left { display: flex; align-items: center; gap: 0.875rem; }
        .acc-icon { display: flex; align-items: center; justify-content: center; width: 22px; flex-shrink: 0; opacity: 0.7; }
        .acc-trigger:hover .acc-icon, .acc-trigger.open-active .acc-icon { opacity: 1; }
        .acc-chevron {
            transition: transform 0.25s ease;
            opacity: 0.5;
            flex-shrink: 0;
        }
        .acc-trigger.open .acc-chevron { transform: rotate(180deg); opacity: 0.8; }

        .acc-body {
            overflow: hidden;
            max-height: 0;
            transition: max-height 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .acc-body.open { max-height: 280px; }

        .acc-inner {
            padding: 0.25rem 0.5rem;
            margin-left: 0;
        }
        .acc-sub-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.55rem 0.75rem;
            border-radius: var(--radius-sm);
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.8125rem;
            font-weight: 500;
            transition: all 0.2s ease;
            margin: 2px 0;
        }
        .acc-sub-link:hover { 
            background: var(--bg-hover); 
            color: var(--text-primary);
            transform: translateX(4px);
        }
        .acc-sub-link.active { 
            color: var(--accent); 
            background: var(--accent-glow);
        }
        .acc-sub-link svg { flex-shrink: 0; opacity: 0.6; transition: opacity 0.18s; }
        .acc-sub-link:hover svg, .acc-sub-link.active svg { opacity: 1; }
        .acc-sub-link.active svg { stroke: var(--accent); }

        /* ── Sidebar Footer ───────────────────────────────── */
        .sidebar-footer {
            margin-top: auto;
            padding: 1rem 0.75rem 1.25rem;
            border-top: 1px solid var(--border-light);
        }
        .logout-btn {
            display: flex;
            align-items: center;
            gap: 0.875rem;
            width: 100%;
            padding: 0.7rem 0.875rem;
            border-radius: var(--radius-md);
            background: transparent;
            border: none;
            cursor: pointer;
            font-family: 'Outfit', sans-serif;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-secondary);
            transition: all 0.2s ease;
            margin-top: 0.5rem;
        }
        .logout-btn:hover { 
            background: rgba(255,85,85,0.12); 
            color: var(--red);
            transform: translateX(3px);
        }
        .logout-btn:hover svg { stroke: var(--red); opacity: 1; }
        .logout-btn .nav-icon { opacity: 0.6; }

        /* ── Mobile Header ────────────────────────────────── */
        .mobile-header {
            display: none;
            position: fixed; top: 0; left: 0; right: 0;
            height: var(--header-height);
            background: rgba(5,5,5,0.98);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 0 1rem;
            align-items: center;
            justify-content: space-between;
            z-index: 300;
        }
        .mobile-logo img { height: 28px; }
        .hamburger {
            display: flex; flex-direction: column; justify-content: center;
            gap: 5px; width: 42px; height: 42px;
            background: var(--bg-raised); border: 1px solid var(--border);
            border-radius: var(--radius-md); cursor: pointer; align-items: center;
            transition: all 0.2s;
        }
        .hamburger:hover { border-color: var(--accent); }
        .hamburger span { display: block; width: 18px; height: 2px; background: var(--text-primary); border-radius: 2px; transition: 0.2s; }
        .hamburger.open span:nth-child(1) { transform: rotate(45deg) translate(5px, 5px); }
        .hamburger.open span:nth-child(2) { opacity: 0; }
        .hamburger.open span:nth-child(3) { transform: rotate(-45deg) translate(5px, -5px); }

        .overlay {
            display: none; position: fixed; inset: 0;
            background: rgba(0,0,0,0.85);
            backdrop-filter: blur(8px);
            z-index: 199;
            transition: opacity 0.25s;
        }
        .overlay.show { display: block; }

        /* ── Main Content ─────────────────────────────────── */
        .main {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 2rem 2.5rem;
            min-height: 100vh;
            background: var(--bg-surface);
        }

        /* ── Alerts ───────────────────────────────────────── */
        .alert {
            display: flex; align-items: center; gap: 0.75rem;
            padding: 0.875rem 1.125rem;
            border-radius: var(--radius-md);
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            animation: slideIn 0.3s ease;
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .alert-success { background: rgba(0,255,136,0.08); border: 1px solid rgba(0,255,136,0.2); color: var(--green); }
        .alert-error   { background: rgba(255,68,68,0.08); border: 1px solid rgba(255,68,68,0.2); color: var(--red); }

        /* ── Responsive ───────────────────────────────────── */
        @media (max-width: 768px) {
            .mobile-header { display: flex; }
            .shell { padding-top: var(--header-height); }
            .sidebar { transform: translateX(-100%); box-shadow: var(--shadow-md); scrollbar-gutter: stable;}
            .sidebar.open { transform: translateX(0); }
            .main { margin-left: 0; padding: 1rem; width: 100%; }
        }
        @media (min-width: 769px) and (max-width: 1024px) {
            :root { --sidebar-width: 260px; }
            .main { padding: 1.5rem; }
        }
        body.no-scroll { overflow: hidden; position: fixed; width: 100%; }





        /* ── Projects Accordion ───────────────────────────────── */
        .projects-acc-trigger {
            display: flex;
            align-items: center;
            gap: 0.875rem;
            padding: 0.7rem 0.875rem;
            border-radius: var(--radius-md);
            color: var(--text-secondary);
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s ease;
            position: relative;
            justify-content: space-between;
        }
        .projects-acc-trigger:hover {
            background: var(--bg-hover);
            color: var(--text-primary);
            transform: translateX(3px);
        }
        .projects-acc-trigger.active-parent {
            background: linear-gradient(90deg, var(--accent-glow), transparent);
            color: var(--accent);
        }
        .projects-acc-trigger.active-parent::before {
            content: '';
            position: absolute;
            left: 0; top: 20%; bottom: 20%;
            width: 3px;
            border-radius: 0 3px 3px 0;
            background: var(--accent);
            box-shadow: 0 0 12px rgba(0,255,136,0.8);
        }
        .projects-acc-trigger .trigger-left {
            display: flex;
            align-items: center;
            gap: 0.875rem;
        }
        .projects-chevron {
            transition: transform 0.25s ease;
            opacity: 0.4;
            flex-shrink: 0;
        }
        .projects-acc-trigger.open .projects-chevron { transform: rotate(180deg); opacity: 0.7; }

        .projects-dropdown {
            list-style: none;
            overflow: hidden;
            max-height: 0;
            transition: max-height 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 0;
            margin: 0;
        }
        .projects-dropdown.open { max-height: 400px; }

        .proj-link {
            display: flex;
            align-items: center;
            gap: 0.625rem;
            padding: 0.5rem 0.875rem 0.5rem 2.75rem;  /* left indent to align under "Projects" text */
            border-radius: var(--radius-sm);
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.8125rem;
            font-weight: 500;
            transition: all 0.2s ease;
            margin: 2px 0.75rem;                        /* horizontal margin like other nav items */
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: block;
        }
        .proj-link:hover {
            background: var(--bg-hover);
            color: var(--text-primary);
            transform: translateX(4px);
        }
        .proj-link.active {
            color: var(--accent);
            background: var(--accent-glow);
        }
        .proj-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            flex-shrink: 0;
        }
    </style>
</head>
<style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --sidebar-width: 300px;
            --header-height: 56px;
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.5);
            --shadow-md: 0 8px 32px rgba(0,0,0,0.7);

            --bg-canvas:   #050505;
            --bg-surface:  #0a0a0a;
            --bg-raised:   #0f0f0f;
            --bg-hover:    #151515;
            --border:      #2a2a2a;
            --border-light: #1e1e1e;
            --text-primary: #ffffff;
            --text-secondary: #c0c0c8;
            --text-tertiary: #888888;
            --text-muted:    #666666;
            --accent:      #00ff88;
            --accent-glow: rgba(0,255,136,0.08);
            --accent-glow-strong: rgba(0,255,136,0.12);
            --green:  #00ff88;
            --red:    #ff5555;
            --amber:  #ffbb33;
        }

        html, body {
            height: 100%;
            font-family: 'Outfit', sans-serif;
            background: var(--bg-canvas);
            color: var(--text-primary);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .shell { display: flex; min-height: 100vh; }

        /* ── Sidebar ─────────────────────────────────────── */
        .sidebar {
            padding: 1rem;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, #070707 0%, #030303 100%);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0; bottom: 0;
            z-index: 200;
            overflow-y: auto;
            overflow-x: hidden;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            scroll-behavior: smooth;
            scrollbar-width: thin;
            scrollbar-color: transparent transparent;
            scrollbar-gutter: stable;
        }
        .sidebar::-webkit-scrollbar { width: 6px; }
        .sidebar::-webkit-scrollbar-track { background: transparent; }
        .sidebar::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, rgba(0,255,136,0.2), rgba(0,255,136,0.6));
            border-radius: 10px;
        }
        .sidebar:hover::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, rgba(0,255,136,0.5), rgba(0,255,136,1));
        }

        /* ── Brand ───────────────────────────────────────── */
        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1.25rem 1.25rem 1rem;
            text-decoration: none;
            flex-shrink: 0;
            border-bottom: 1px solid var(--border-light);
            margin-bottom: 1.25rem;
        }
        .sidebar-brand img { height: 36px; transition: transform 0.2s; }
        .sidebar-brand:hover img { transform: scale(1.02); }

        /* ── User Card ───────────────────────────────────── */
        .user-card {
            margin: 0 1rem 1rem;
            padding: 6px;
            border-radius: 999px;
            background: rgba(255,255,255,0.02);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 6px;
            backdrop-filter: blur(8px);
        }
        .user-avatar {
            width: 36px; height: 36px;
            border-radius: 999px;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.85rem; font-weight: 600;
            font-family: 'JetBrains Mono', monospace;
            color: #00ff88;
            background: radial-gradient(circle at 30% 30%, rgba(0,255,136,0.25), rgba(0,255,136,0.05));
            border: 1px solid rgba(0,255,136,0.5);
            box-shadow: 0 0 0 2px rgba(0,255,136,0.05), 0 4px 12px rgba(0,0,0,0.6), inset 0 0 8px rgba(0,255,136,0.15);
            transition: all 0.25s ease;
        }
        .user-avatar:hover {
            transform: scale(1.05);
            box-shadow: 0 0 0 3px rgba(0,255,136,0.1), 0 6px 18px rgba(0,0,0,0.8), inset 0 0 10px rgba(0,255,136,0.25);
        }
        .user-info {
            flex: 1;
            display: flex; align-items: center;
            background: rgba(0,255,136,0.05);
            border-radius: 999px;
            padding: 6px 12px;
            overflow: hidden;
        }
        .user-name { display: none; }
        .user-email { font-size: 0.7rem; color: var(--text-secondary); }

        @keyframes pulse-dot {
            0%,100% { box-shadow: 0 0 6px rgba(0,255,136,0.4); opacity: 0.8; transform: scale(1); }
            50%      { box-shadow: 0 0 16px rgba(0,255,136,0.9); opacity: 1; transform: scale(1.1); }
        }

        /* ── Workspace Switcher ──────────────────────────── */
        .ws-section { padding: 0 1rem 0.5rem; margin-bottom: 0.5rem; }
        .section-header {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 0.75rem; padding: 0 0.25rem;
        }
        .section-label {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.65rem; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.1em;
            color: var(--text-tertiary);
        }
        .ws-indicator { display: flex; align-items: center; gap: 6px; }
        .ws-dot {
            width: 6px; height: 6px; border-radius: 50%;
            background: var(--green); animation: blink 1.5s infinite;
        }
        @keyframes blink { 0%,100%{opacity:0.4} 50%{opacity:1} }
        .ws-form { margin-bottom: 0.5rem; }
        .ws-btn {
            width: 100%; background: transparent;
            border: 1px solid transparent; border-radius: var(--radius-md);
            cursor: pointer; display: flex; align-items: center; gap: 0.75rem;
            padding: 0.7rem 0.75rem; font-family: 'Outfit', sans-serif;
            transition: all 0.2s ease;
        }
        .ws-btn:hover { background: var(--bg-hover); border-color: var(--border); transform: translateX(2px); }
        .ws-btn.active-workspace {
            background: linear-gradient(90deg, var(--accent-glow), transparent);
            border-left: 2px solid var(--accent); border-radius: var(--radius-md);
        }
        .ws-avatar {
            width: 34px; height: 34px; border-radius: 10px;
            background: var(--bg-hover); border: 1px solid var(--border);
            display: flex; align-items: center; justify-content: center;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.8rem; font-weight: 700; color: var(--text-secondary);
            flex-shrink: 0; transition: all 0.2s;
        }
        .ws-btn:hover .ws-avatar { border-color: var(--accent); }
        .ws-avatar.own {
            background: linear-gradient(135deg, var(--accent-glow), rgba(0,255,136,0.05));
            border-color: rgba(0,255,136,0.4); color: var(--accent);
        }
        .ws-details { flex: 1; text-align: left; min-width: 0; }
        .ws-name {
            display: block; font-size: 0.85rem; font-weight: 600;
            color: var(--text-primary); white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .ws-role {
            display: block; font-size: 0.6rem; color: var(--text-tertiary);
            font-family: 'JetBrains Mono', monospace; margin-top: 2px;
        }
        .ws-badge {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.55rem; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.06em;
            padding: 2px 8px;
            background: var(--accent-glow-strong);
            border: 1px solid rgba(0,255,136,0.3);
            color: var(--accent); border-radius: 20px; flex-shrink: 0;
        }

        /* ── Navigation ──────────────────────────────────── */
        .nav-group { margin-bottom: 0.8rem; }
        .nav-group-label {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.7rem; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.1em;
            color: var(--text-tertiary);
            padding: 0 1.25rem; margin-bottom: 0.75rem;
            display: flex; align-items: center; gap: 8px;
        }
        .nav-group-label::after {
            content: ''; flex: 1; height: 1px;
            background: linear-gradient(90deg, var(--border), transparent);
        }
        .nav-list { list-style: none; padding: 0 0.75rem; }
        .nav-item { margin: 3px 0; }
        .nav-link {
            display: flex; align-items: center; gap: 0.875rem;
            padding: 0.7rem 0.875rem; border-radius: var(--radius-md);
            color: var(--text-secondary); text-decoration: none;
            font-size: 0.875rem; font-weight: 500;
            transition: all 0.2s ease; position: relative;
        }
        .nav-link:hover { background: var(--bg-hover); color: var(--text-primary); transform: translateX(3px); }
        .nav-link.active { background: linear-gradient(90deg, var(--accent-glow), transparent); color: var(--accent); }
        .nav-link.active::before {
            content: ''; position: absolute;
            left: 0; top: 20%; bottom: 20%;
            width: 3px; border-radius: 0 3px 3px 0;
            background: var(--accent); box-shadow: 0 0 12px rgba(0,255,136,0.8);
        }
        .nav-icon {
            display: flex; align-items: center; justify-content: center;
            width: 22px; flex-shrink: 0; opacity: 0.7; transition: all 0.2s;
        }
        .nav-link:hover .nav-icon,
        .nav-link.active .nav-icon { opacity: 1; transform: scale(1.05); }
        .nav-link.active .nav-icon svg { stroke: var(--accent); }

        /* ── Projects Accordion ──────────────────────────── */
        .proj-acc-trigger {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 0.7rem 0.875rem;
            border-radius: var(--radius-md);
            background: transparent;
            border: none;
            cursor: pointer;
            font-family: 'Outfit', sans-serif;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-secondary);
            transition: all 0.2s ease;
            position: relative;
        }
        .proj-acc-trigger:hover {
            background: var(--bg-hover);
            color: var(--text-primary);
            transform: translateX(3px);
        }
        .proj-acc-trigger.active-parent {
            background: linear-gradient(90deg, var(--accent-glow), transparent);
            color: var(--accent);
        }
        .proj-acc-trigger.active-parent::before {
            content: '';
            position: absolute;
            left: 0; top: 20%; bottom: 20%;
            width: 3px;
            border-radius: 0 3px 3px 0;
            background: var(--accent);
            box-shadow: 0 0 12px rgba(0,255,136,0.8);
        }
        .proj-acc-trigger.active-parent .proj-acc-icon svg { stroke: var(--accent); }
        .proj-acc-left {
            display: flex;
            align-items: center;
            gap: 0.875rem;
        }
        .proj-acc-icon {
            display: flex; align-items: center; justify-content: center;
            width: 22px; flex-shrink: 0; opacity: 0.7; transition: all 0.2s;
        }
        .proj-acc-trigger:hover .proj-acc-icon { opacity: 1; transform: scale(1.05); }
        .proj-acc-trigger.active-parent .proj-acc-icon { opacity: 1; }
        .proj-acc-chevron {
            transition: transform 0.25s ease;
            opacity: 0.4;
            flex-shrink: 0;
        }
        .proj-acc-trigger.open .proj-acc-chevron { transform: rotate(180deg); opacity: 0.7; }

        .proj-acc-body {
            overflow: hidden;
            max-height: 0;
            transition: max-height 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .proj-acc-body.open { max-height: 400px; }

        .proj-acc-inner {
            padding: 0.25rem 0.5rem;
            list-style: none;
        }

        .proj-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 0.75rem 0.5rem 0.875rem;
            border-radius: var(--radius-sm);
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 500;
            transition: all 0.2s ease;
            margin: 2px 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .proj-link:hover {
            background: var(--bg-hover);
            color: var(--text-primary);
            transform: translateX(4px);
        }
        .proj-link.active {
            color: var(--accent);
            background: var(--accent-glow);
        }
        .proj-link.active svg { stroke: var(--accent); }
        .proj-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            flex-shrink: 0;
            margin-right: 2px;
        }

        /* ── Account Accordion ───────────────────────────── */
        .acc-wrap { padding: 0 0.75rem; }
        .acc-trigger {
            display: flex; align-items: center; justify-content: space-between;
            width: 100%; padding: 0.7rem 0.875rem;
            border-radius: var(--radius-md);
            background: transparent; border: none; cursor: pointer;
            font-family: 'Outfit', sans-serif; font-size: 0.875rem; font-weight: 500;
            color: var(--text-secondary); transition: all 0.2s ease;
        }
        .acc-trigger:hover { background: var(--bg-hover); color: var(--text-primary); transform: translateX(3px); }
        .acc-trigger.open-active { background: linear-gradient(90deg, var(--accent-glow), transparent); color: var(--accent); }
        .acc-trigger-left { display: flex; align-items: center; gap: 0.875rem; }
        .acc-icon { display: flex; align-items: center; justify-content: center; width: 22px; flex-shrink: 0; opacity: 0.7; }
        .acc-trigger:hover .acc-icon, .acc-trigger.open-active .acc-icon { opacity: 1; }
        .acc-chevron { transition: transform 0.25s ease; opacity: 0.5; flex-shrink: 0; }
        .acc-trigger.open .acc-chevron { transform: rotate(180deg); opacity: 0.8; }
        .acc-body { overflow: hidden; max-height: 0; transition: max-height 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .acc-body.open { max-height: 280px; }
        .acc-inner { padding: 0.25rem 0.5rem; margin-left: 0; }
        .acc-sub-link {
            display: flex; align-items: center; gap: 0.75rem;
            padding: 0.55rem 0.75rem; border-radius: var(--radius-sm);
            color: var(--text-secondary); text-decoration: none;
            font-size: 0.8125rem; font-weight: 500;
            transition: all 0.2s ease; margin: 2px 0;
        }
        .acc-sub-link:hover { background: var(--bg-hover); color: var(--text-primary); transform: translateX(4px); }
        .acc-sub-link.active { color: var(--accent); background: var(--accent-glow); }
        .acc-sub-link svg { flex-shrink: 0; opacity: 0.6; transition: opacity 0.18s; }
        .acc-sub-link:hover svg, .acc-sub-link.active svg { opacity: 1; }
        .acc-sub-link.active svg { stroke: var(--accent); }

        /* ── Sidebar Footer ──────────────────────────────── */
        .sidebar-footer {
            margin-top: auto;
            padding: 1rem 0.75rem 1.25rem;
            border-top: 1px solid var(--border-light);
        }
        .logout-btn {
            display: flex; align-items: center; gap: 0.875rem;
            width: 100%; padding: 0.7rem 0.875rem;
            border-radius: var(--radius-md);
            background: transparent; border: none; cursor: pointer;
            font-family: 'Outfit', sans-serif; font-size: 0.875rem; font-weight: 500;
            color: var(--text-secondary); transition: all 0.2s ease; margin-top: 0.5rem;
        }
        .logout-btn:hover { background: rgba(255,85,85,0.12); color: var(--red); transform: translateX(3px); }
        .logout-btn:hover svg { stroke: var(--red); opacity: 1; }
        .logout-btn .nav-icon { opacity: 0.6; }

        /* ── Mobile Header ───────────────────────────────── */
        .mobile-header {
            display: none;
            position: fixed; top: 0; left: 0; right: 0;
            height: var(--header-height);
            background: rgba(5,5,5,0.98);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 0 1rem;
            align-items: center; justify-content: space-between;
            z-index: 300;
        }
        .mobile-logo img { height: 28px; }
        .hamburger {
            display: flex; flex-direction: column; justify-content: center;
            gap: 5px; width: 42px; height: 42px;
            background: var(--bg-raised); border: 1px solid var(--border);
            border-radius: var(--radius-md); cursor: pointer; align-items: center;
            transition: all 0.2s;
        }
        .hamburger:hover { border-color: var(--accent); }
        .hamburger span { display: block; width: 18px; height: 2px; background: var(--text-primary); border-radius: 2px; transition: 0.2s; }
        .hamburger.open span:nth-child(1) { transform: rotate(45deg) translate(5px, 5px); }
        .hamburger.open span:nth-child(2) { opacity: 0; }
        .hamburger.open span:nth-child(3) { transform: rotate(-45deg) translate(5px, -5px); }
        .overlay {
            display: none; position: fixed; inset: 0;
            background: rgba(0,0,0,0.85); backdrop-filter: blur(8px);
            z-index: 199; transition: opacity 0.25s;
        }
        .overlay.show { display: block; }

        /* ── Main Content ────────────────────────────────── */
        .main {
            flex: 1; margin-left: var(--sidebar-width);
            padding: 2rem 2.5rem; min-height: 100vh;
            background: var(--bg-surface);
        }

        /* ── Alerts ──────────────────────────────────────── */
        .alert {
            display: flex; align-items: center; gap: 0.75rem;
            padding: 0.875rem 1.125rem; border-radius: var(--radius-md);
            margin-bottom: 1.5rem; font-size: 0.875rem; font-weight: 500;
            animation: slideIn 0.3s ease;
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-10px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .alert-success { background: rgba(0,255,136,0.08); border: 1px solid rgba(0,255,136,0.2); color: var(--green); }
        .alert-error   { background: rgba(255,68,68,0.08);  border: 1px solid rgba(255,68,68,0.2);  color: var(--red); }

        /* ── Responsive ──────────────────────────────────── */
        @media (max-width: 768px) {
            .mobile-header { display: flex; }
            .shell { padding-top: var(--header-height); }
            .sidebar { transform: translateX(-100%); box-shadow: var(--shadow-md); scrollbar-gutter: stable; }
            .sidebar.open { transform: translateX(0); }
            .main { margin-left: 0; padding: 1rem; width: 100%; }
        }
        @media (min-width: 769px) and (max-width: 1024px) {
            :root { --sidebar-width: 260px; }
            .main { padding: 1.5rem; }
        }
        body.no-scroll { overflow: hidden; position: fixed; width: 100%; }
    </style>
</head>
<body>

    <!-- Mobile Header -->
    <div class="mobile-header">
        <a href="<?php echo e(route('dashboard')); ?>" class="mobile-logo">
            <img src="<?php echo e(asset('images/logo/000formlogo.png')); ?>" alt="000form">
        </a>
        <button class="hamburger" id="hamburger" aria-label="Menu">
            <span></span><span></span><span></span>
        </button>
    </div>

    <div class="overlay" id="overlay"></div>

    <div class="shell">
        <aside class="sidebar" id="sidebar">

            <!-- Brand -->
            <a href="<?php echo e(route('dashboard')); ?>" class="sidebar-brand">
                <img src="<?php echo e(asset('images/logo/000formlogo.png')); ?>" alt="000form">
            </a>

            <!-- User Card -->
            <div class="user-card">
                <div class="user-avatar">
                    <?php echo e(strtoupper(substr(Auth::user()->email, 0, 1))); ?>

                </div>
                <div class="user-info">
                    <?php if(Auth::user()->name): ?>
                        <div class="user-name"><?php echo e(Auth::user()->name); ?></div>
                    <?php endif; ?>
                    <div class="user-email"><?php echo e(Auth::user()->email); ?></div>
                </div>
            </div>

            <!-- Workspace Switcher -->
            <?php if(isset($availableWorkspaces) && $availableWorkspaces->count() > 0): ?>
            <div class="ws-section">
                <div class="section-header">
                    <span class="section-label">Workspace</span>
                    <div class="ws-indicator">
                        <span class="ws-dot"></span>
                        <span style="font-size: 0.55rem; color: var(--text-tertiary);">live</span>
                    </div>
                </div>

                <form method="POST" action="<?php echo e(route('team.switch')); ?>" class="ws-form">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="workspace_owner_id" value="<?php echo e(Auth::id()); ?>">
                    <button type="submit" class="ws-btn <?php echo e((isset($isOwnWorkspace) && $isOwnWorkspace) ? 'active-workspace' : ''); ?>">
                        <div class="ws-avatar own"><?php echo e(strtoupper(substr(Auth::user()->name ?? Auth::user()->email, 0, 1))); ?></div>
                        <div class="ws-details">
                            <span class="ws-name">My Account</span>
                            <span class="ws-role">personal workspace</span>
                        </div>
                        <?php if(isset($isOwnWorkspace) && $isOwnWorkspace): ?>
                            <span class="ws-badge">Active</span>
                        <?php endif; ?>
                    </button>
                </form>

                <?php $__currentLoopData = $availableWorkspaces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workspace): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <form method="POST" action="<?php echo e(route('team.switch')); ?>" class="ws-form">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="workspace_owner_id" value="<?php echo e($workspace['id']); ?>">
                    <button type="submit" class="ws-btn <?php echo e((isset($activeWorkspaceOwnerId) && $activeWorkspaceOwnerId === $workspace['id']) ? 'active-workspace' : ''); ?>">
                        <div class="ws-avatar"><?php echo e(strtoupper(substr($workspace['name'], 0, 1))); ?></div>
                        <div class="ws-details">
                            <span class="ws-name"><?php echo e($workspace['name']); ?></span>
                            <span class="ws-role"><?php echo e(ucfirst($workspace['role'])); ?> team</span>
                        </div>
                        <?php if(isset($activeWorkspaceOwnerId) && $activeWorkspaceOwnerId === $workspace['id']): ?>
                            <span class="ws-badge">Active</span>
                        <?php endif; ?>
                    </button>
                </form>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>

            <!-- Main Nav -->
            <div class="nav-group">
                <div class="nav-group-label">Main</div>
                <ul class="nav-list">

                    
                    <li class="nav-item">
                        <a href="<?php echo e(route('dashboard')); ?>" class="nav-link <?php echo e(request()->routeIs('dashboard') && !request()->routeIs('dashboard.forms.*') && !request()->routeIs('dashboard.projects.*') ? 'active' : ''); ?>">
                            <span class="nav-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/>
                                    <rect x="14" y="14" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/>
                                </svg>
                            </span>
                            Dashboard
                        </a>
                    </li>

                    
                    <?php if(isset($sidebarProjects) && $sidebarProjects->isNotEmpty()): ?>
                    <li class="nav-item">
                        <button
                            class="proj-acc-trigger <?php echo e(request()->routeIs('dashboard.projects.*') &&
                                !request()->routeIs('dashboard.projects.create')
                                ? 'active-parent' : ''); ?>"
                            id="projAccTrigger"
                            aria-expanded="<?php echo e(request()->routeIs('dashboard.projects.*') ? 'true' : 'false'); ?>"
                        >
                            <span class="proj-acc-left">
                                <span class="proj-acc-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M3 7a2 2 0 0 1 2-2h4l2 2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7z"/>
                                    </svg>
                                </span>
                                Projects
                            </span>
                            <svg class="proj-acc-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <polyline points="6 9 12 15 18 9"/>
                            </svg>
                        </button>

                        <div class="proj-acc-body <?php echo e(request()->routeIs('dashboard.projects.*') ? 'open' : ''); ?>" id="projAccBody">
                            <ul class="proj-acc-inner">
                                <?php $__currentLoopData = $sidebarProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a
                                        href="<?php echo e(route('dashboard.projects.show', $proj->id)); ?>"
                                        class="proj-link <?php echo e(request()->is('dashboard/projects/' . $proj->id) || request()->is('dashboard/projects/' . $proj->id . '/*') ? 'active' : ''); ?>"
                                        title="<?php echo e($proj->name); ?>"
                                    >
                                        <span class="proj-dot" style="background: <?php echo e($proj->color ?? '#6366f1'); ?>"></span>
                                        <?php echo e($proj->name); ?>

                                    </a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </li>
                    <?php endif; ?>

                    
                    <li class="nav-item">
                        <a href="<?php echo e(route('dashboard.projects.create')); ?>"
                           class="nav-link <?php echo e(request()->routeIs('dashboard.projects.create') ? 'active' : ''); ?>">
                            <span class="nav-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M3 7a2 2 0 0 1 2-2h4l2 2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7z"/>
                                    <line x1="12" y1="10" x2="12" y2="16"/>
                                    <line x1="9" y1="13" x2="15" y2="13"/>
                                </svg>
                            </span>
                            New Project
                        </a>
                    </li>

                    
                    <li class="nav-item">
                        <a href="<?php echo e(route('team.index')); ?>" class="nav-link <?php echo e(request()->routeIs('team.index') ? 'active' : ''); ?>">
                            <span class="nav-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                    <circle cx="9" cy="7" r="4"/>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                </svg>
                            </span>
                            Team Management
                        </a>
                    </li>

                </ul>
            </div>

            <!-- Account Accordion -->
            <div class="nav-group">
                <div class="nav-group-label">Account</div>
                <div class="acc-wrap">
                    <button
                        class="acc-trigger <?php echo e(request()->routeIs('account.settings') || request()->routeIs('billing.portal') || request()->routeIs('billing.payment-history') ? 'open-active' : ''); ?>"
                        id="accTrigger"
                        aria-expanded="<?php echo e(request()->routeIs('account.settings') || request()->routeIs('billing.portal') || request()->routeIs('billing.payment-history') ? 'true' : 'false'); ?>"
                    >
                        <span class="acc-trigger-left">
                            <span class="acc-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                                </svg>
                            </span>
                            Account Settings
                        </span>
                        <svg class="acc-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </button>

                    <div class="acc-body <?php echo e(request()->routeIs('account.settings') || request()->routeIs('billing.portal') || request()->routeIs('billing.payment-history') ? 'open' : ''); ?>" id="accBody">
                        <div class="acc-inner">
                            <a href="<?php echo e(route('account.settings')); ?>" class="acc-sub-link <?php echo e(request()->routeIs('account.settings') ? 'active' : ''); ?>">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 1 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 1 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 1 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 1 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/>
                                </svg>
                                Profile Settings
                            </a>
                            <a href="<?php echo e(route('billing.portal')); ?>" class="acc-sub-link <?php echo e(request()->routeIs('billing.portal') ? 'active' : ''); ?>">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                                </svg>
                                Plans & Subscription
                            </a>
                            <a href="<?php echo e(route('billing.payment-history')); ?>" class="acc-sub-link <?php echo e(request()->routeIs('billing.payment-history') ? 'active' : ''); ?>">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <rect x="2" y="5" width="20" height="14" rx="2"/>
                                    <line x1="2" y1="10" x2="22" y2="10"/>
                                </svg>
                                Payment History
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Footer -->
            <div class="sidebar-footer">
                <div class="nav-group">
                    <div class="nav-group-label">Resources</div>
                    <ul class="nav-list" style="padding:0">
                        <li class="nav-item">
                            <a href="<?php echo e(route('docs')); ?>" target="_blank" class="nav-link">
                                <span class="nav-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                        <polyline points="14 2 14 8 20 8"/>
                                        <line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>
                                    </svg>
                                </span>
                                Documentation
                            </a>
                        </li>
                    </ul>
                </div>

                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="logout-btn">
                        <span class="nav-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                <polyline points="16 17 21 12 16 7"/>
                                <line x1="21" y1="12" x2="9" y2="12"/>
                            </svg>
                        </span>
                        Sign Out
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main">
            <?php if(session('message')): ?>
                <div class="alert alert-success">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                    <?php echo e(session('message')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="alert alert-error">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="8" x2="12" y2="12"/>
                        <line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <script src="/js/app.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // ── Mobile sidebar ──────────────────────────────────────
            const hamburger = document.getElementById('hamburger');
            const sidebar   = document.getElementById('sidebar');
            const overlay   = document.getElementById('overlay');

            function openSidebar() {
                sidebar.classList.add('open');
                overlay.classList.add('show');
                hamburger.classList.add('open');
                document.body.classList.add('no-scroll');
            }
            function closeSidebar() {
                sidebar.classList.remove('open');
                overlay.classList.remove('show');
                hamburger.classList.remove('open');
                document.body.classList.remove('no-scroll');
            }

            if (hamburger) hamburger.addEventListener('click', e => { e.stopPropagation(); sidebar.classList.contains('open') ? closeSidebar() : openSidebar(); });
            if (overlay)   overlay.addEventListener('click', closeSidebar);
            document.addEventListener('keydown', e => { if (e.key === 'Escape') closeSidebar(); });
            window.addEventListener('resize', () => { if (window.innerWidth > 768) closeSidebar(); });

            let tx = 0;
            sidebar?.addEventListener('touchstart', e => { tx = e.changedTouches[0].screenX; }, { passive: true });
            sidebar?.addEventListener('touchend',   e => { if (tx - e.changedTouches[0].screenX > 50) closeSidebar(); }, { passive: true });

            // ── Account accordion ────────────────────────────────────
            initAccordion('accTrigger', 'accBody');

            // ── Projects accordion ───────────────────────────────────
            initAccordion('projAccTrigger', 'projAccBody');

        });

        /**
         * Generic accordion initialiser.
         * Wires up a trigger button + collapsible body by their element IDs.
         * The body element uses max-height: 0 / max-height: N for the animation.
         */
        function initAccordion(triggerId, bodyId) {
            const trigger = document.getElementById(triggerId);
            const body    = document.getElementById(bodyId);
            if (!trigger || !body) return;

            trigger.addEventListener('click', function () {
                const isOpen = body.classList.contains('open');
                body.classList.toggle('open', !isOpen);
                trigger.classList.toggle('open', !isOpen);
                trigger.setAttribute('aria-expanded', String(!isOpen));
            });

            // Sync chevron rotation on page load when already open
            if (body.classList.contains('open')) {
                trigger.classList.add('open');
            }
        }
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\Git-folders\000form.com\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>