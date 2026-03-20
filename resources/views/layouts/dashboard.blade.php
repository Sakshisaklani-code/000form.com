<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title>@yield('title', 'Dashboard') - 000form</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon/000formFavicon.png') }}" type="image/svg+xml">
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
    <meta property="og:image" content="{{ asset('images/og-image/og-image.jpg') }}" /> 
    <meta property="og:site_name" content="000Forms" />
    <!-- Index and follow for SEO -->
    <meta name="robots" content="index, follow">    
    <!-- Schema.org JSON-LD --> 
     <meta name="csrf-token" content="{{ csrf_token() }}">
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
    @stack('styles')
    <style>
        :root {
            --sidebar-width: 300px;
            --sidebar-mobile-width: 85%;
            --header-height: 60px;
        }

        .mobile-header {
            display: none;
            position: fixed;
            top: 0; left: 0; right: 0;
            height: var(--header-height);
            background: var(--bg-primary);
            border-bottom: 1px solid var(--border-color);
            padding: 0 1rem;
            align-items: center;
            justify-content: space-between;
            z-index: 100;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .mobile-header .logo { font-size: 1.5rem; font-weight: 700; text-decoration: none; color: var(--text-primary); }
        .mobile-header .logo span { color: var(--primary-color); }

        .mobile-menu-btn {
            background: none; border: none; cursor: pointer; padding: 0.5rem;
            display: flex; flex-direction: column; gap: 6px;
            width: 40px; height: 40px; align-items: center; justify-content: center;
            border-radius: 8px; transition: background-color 0.2s;
        }
        .mobile-menu-btn:hover { background-color: var(--bg-hover); }
        .mobile-menu-btn span { display: block; width: 24px; height: 2px; background: var(--text-primary); transition: 0.3s; border-radius: 2px; }
        .mobile-menu-btn.active span:nth-child(1) { transform: rotate(45deg) translate(6px, 6px); }
        .mobile-menu-btn.active span:nth-child(2) { opacity: 0; }
        .mobile-menu-btn.active span:nth-child(3) { transform: rotate(-45deg) translate(6px, -6px); }

        .sidebar-overlay {
            display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.5); z-index: 998; opacity: 0;
            transition: opacity 0.3s ease; pointer-events: none;
        }
        .sidebar-overlay.active { display: block; opacity: 1; pointer-events: auto; }

        .dashboard { display: flex; min-height: 100vh; background: var(--bg-secondary); }

        .sidebar {
            width: var(--sidebar-width); background: var(--bg-primary);
            border-right: 1px solid var(--border-color);
            display: flex; flex-direction: column;
            position: fixed; top: 0; left: 0; bottom: 0;
            z-index: 999; transition: transform 0.3s ease;
            overflow-y: auto; box-shadow: 2px 0 8px rgba(0,0,0,0.05);
        }
        .sidebar-logo { padding: 1.5rem 1.5rem 1rem; font-size: 1.8rem; font-weight: 700; text-decoration: none; color: var(--text-primary); display: block; }
        .sidebar-logo span { color: var(--primary-color); }

        .sidebar-nav { list-style: none; padding: 0; margin: 0; }
        .sidebar-nav li { margin: 0.25rem 0.75rem; }
        .sidebar-nav a { display: flex; align-items: center; gap: 0.75rem; padding: 0.875rem 1rem; color: var(--text-secondary); text-decoration: none; border-radius: 10px; transition: all 0.2s ease; font-weight: 500; }
        .sidebar-nav a:hover { background: var(--bg-hover); color: var(--text-primary); }
        .sidebar-nav a.active { background: var(--primary-color); color: white; }
        .sidebar-nav a.active svg { stroke: white; }
        .sidebar-nav a svg { flex-shrink: 0; }

        .sidebar-footer { margin-top: auto; padding: 1.5rem 1rem 2rem; border-top: 1px solid var(--border-color); }

        .main-content { flex: 1; margin-left: var(--sidebar-width); padding: 2rem; min-height: 100vh; background: var(--bg-secondary); width: calc(100% - var(--sidebar-width)); transition: margin-left 0.3s ease; }

        .alert { padding: 1rem 1.25rem; border-radius: 10px; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.75rem; background: white; border-left: 4px solid; box-shadow: 0 2px 8px rgba(0,0,0,0.05); }
        .alert-success { border-left-color: #10b981; color: #065f46; }
        .alert-error { border-left-color: #ef4444; color: #991b1b; }

        /* ── Workspace switcher ── */
        .workspace-switcher-section { padding: 0 0.75rem; margin: 0.5rem 0 0.75rem; }
        .workspace-switcher-label { font-size: 0.7rem; color: #555; text-transform: uppercase; letter-spacing: 0.08em; padding: 0 0.25rem; margin-bottom: 0.4rem; display: block; }
        .workspace-btn { width: 100%; background: none; border: none; cursor: pointer; display: flex; align-items: center; justify-content: space-between; gap: 0.5rem; padding: 0.65rem 1rem; border-radius: 10px; font-size: 0.875rem; font-family: inherit; transition: all 0.2s ease; text-align: left; color: var(--text-secondary); }
        .workspace-btn:hover { background: var(--bg-hover); color: var(--text-primary); }
        .workspace-btn.active-workspace { background: rgba(0,255,136,0.1); border: 1px solid rgba(0,255,136,0.25); color: #00ff88; }
        .workspace-btn-inner { display: flex; align-items: center; gap: 0.6rem; min-width: 0; }
        .workspace-avatar { width: 26px; height: 26px; border-radius: 50%; background: #333; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; font-weight: 700; flex-shrink: 0; color: #00ff88; }
        .workspace-avatar.own { background: rgba(0,255,136,0.15); }
        .workspace-name { font-weight: 600; font-size: 0.82rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; color: inherit; display: block; }
        .workspace-role { font-size: 0.7rem; color: #666; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block; }
        .workspace-active-badge { font-size: 0.62rem; background: rgba(0,255,136,0.2); color: #00ff88; padding: 0.15rem 0.45rem; border-radius: 20px; flex-shrink: 0; }
        .workspace-divider { height: 1px; background: var(--border-color); margin: 0.5rem 0.75rem; }

        /* ── Workspace banner ── */
        .workspace-banner { display: flex; align-items: center; justify-content: space-between; gap: 1rem; background: rgba(255,193,7,0.08); border: 1px solid rgba(255,193,7,0.25); color: #f0c040; font-size: 0.875rem; padding: 0.75rem 1.25rem; border-radius: 10px; margin-bottom: 1.5rem; }
        .workspace-banner-switch { background: rgba(255,193,7,0.15); border: 1px solid rgba(255,193,7,0.3); color: #f0c040; border-radius: 6px; padding: 0.35rem 0.85rem; font-size: 0.8rem; cursor: pointer; font-family: inherit; transition: background 0.2s; white-space: nowrap; flex-shrink: 0; }
        .workspace-banner-switch:hover { background: rgba(255,193,7,0.25); }

        @media (max-width: 768px) {
            .mobile-header { display: flex; }
            .dashboard { padding-top: var(--header-height); }
            .sidebar { transform: translateX(-100%); width: var(--sidebar-mobile-width); max-width: 320px; box-shadow: 2px 0 20px rgba(0,0,0,0.15); }
            .sidebar.active { transform: translateX(0); }
            .sidebar-logo { display: none; }
            .main-content { margin-left: 0; width: 100%; padding: 1rem; }
            .sidebar-nav a { padding: 1rem 1.25rem; font-size: 1.1rem; }
            .sidebar-footer { padding-bottom: 1.5rem; }
            .btn, .sidebar-nav a, .mobile-menu-btn { min-height: 44px; min-width: 44px; }
            .card { padding: 1.25rem; margin-bottom: 1rem; }
            .stats-grid { grid-template-columns: 1fr; gap: 1rem; }
            .table-responsive { overflow-x: auto; -webkit-overflow-scrolling: touch; margin: 1rem -1rem; padding: 0 1rem; }
            table { min-width: 600px; }
            .form-group { margin-bottom: 1.25rem; }
            .form-input, .form-select, .btn { font-size: 16px; padding: 0.875rem 1rem; }
            .btn-group { display: flex; flex-direction: column; gap: 0.75rem; }
            .btn-group .btn { width: 100%; }
            .modal-content { width: 90%; margin: 1rem; max-height: 90vh; overflow-y: auto; }
        }

        @media (max-width: 480px) {
            .main-content { padding: 0.75rem; }
            .card { padding: 1rem; }
            h1 { font-size: 1.5rem; }
            h2 { font-size: 1.25rem; }
            .stats-card { padding: 1rem; }
            .stats-card .value { font-size: 1.75rem; }
            .action-buttons { flex-direction: column; gap: 0.5rem; }
            .action-buttons .btn { width: 100%; }
            .mb-3 { margin-bottom: 1rem; }
            .mt-3 { margin-top: 1rem; }
        }

        @media (max-width: 896px) and (orientation: landscape) {
            .sidebar { width: 280px; }
            .sidebar-nav a { padding: 0.75rem 1rem; }
            .main-content { padding: 1rem; }
            .modal-content { max-height: 85vh; }
        }

        @media (min-width: 769px) and (max-width: 1024px) {
            .sidebar { width: 240px; }
            .main-content { margin-left: 240px; width: calc(100% - 240px); padding: 1.5rem; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }

        .sidebar, .main-content { -webkit-overflow-scrolling: touch; }
        body.sidebar-open { overflow: hidden; position: fixed; width: 100%; }

        .logout-btn { width: 100%; background: none; border: none; cursor: pointer; display: flex; align-items: center; gap: 0.75rem; padding: 0.875rem 1rem; color: var(--text-secondary); border-radius: 10px; font-size: 1rem; font-family: inherit; transition: all 0.2s ease; text-align: left; }
        .logout-btn:hover { background: var(--bg-hover); color: var(--text-primary); }

        .logo img { height: 35px; }
        .sidebar-logo img { height: 40px; }
    </style>
</head>
<body>
    
    <!-- Mobile Header -->
    <div class="mobile-header">
        <a href="{{ route('dashboard') }}" class="logo">
            <img src="{{ asset('images/logo/000formlogo.png') }}" alt="000form Logo">
        </a>
        <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <a href="{{ route('dashboard') }}" class="sidebar-logo">
                <img src="{{ asset('images/logo/000formlogo.png') }}" alt="000form Logo">
            </a>
            
            <nav>
                {{-- ── User info card — unchanged ─────────────────────────── --}}
                <div style="padding: 0.75rem 1rem; margin-bottom: 0.5rem; background: #1c1c1c; border-radius: 10px;">
                    <div style="display:flex; align-items:center; gap:0.75rem;">
                        <div style="width:36px; height:36px; border-radius:50%; background:#00ff88; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <span style="color:#050505; font-weight:700; font-size:0.875rem;">
                                {{ strtoupper(substr(Auth::user()->email, 0, 1)) }}
                            </span>
                        </div>
                        <div style="overflow:hidden;">
                            @if(Auth::user()->name)
                                <div style="font-size:0.90rem; font-weight:600; color:#ffffff; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                                    {{ Auth::user()->name }}
                                </div>
                            @endif
                            <div style="font-size:0.90rem; color:#aaaaaa; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                                {{ Auth::user()->email }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ── Workspace Switcher ──────────────────────────────────── --}}
                {{-- SAFE: entire block uses isset() — zero errors if middleware  --}}
                {{-- not registered. Invisible to users with no team memberships. --}}
                @if(isset($availableWorkspaces) && $availableWorkspaces->count() > 0)
                <div class="workspace-switcher-section">
                    <span class="workspace-switcher-label">Workspace</span>

                    <form method="POST" action="{{ route('team.switch') }}" style="margin:0;">
                        @csrf
                        <input type="hidden" name="workspace_owner_id" value="{{ Auth::id() }}">
                        <button type="submit" class="workspace-btn {{ (isset($isOwnWorkspace) && $isOwnWorkspace) ? 'active-workspace' : '' }}">
                            <span class="workspace-btn-inner">
                                <span class="workspace-avatar own">
                                    {{ strtoupper(substr(Auth::user()->name ?? Auth::user()->email, 0, 1)) }}
                                </span>
                                <span style="min-width:0;">
                                    <span class="workspace-name">My Account</span>
                                    <span class="workspace-role">{{ Auth::user()->email }}</span>
                                </span>
                            </span>
                            @if(isset($isOwnWorkspace) && $isOwnWorkspace)
                                <span class="workspace-active-badge">Active</span>
                            @endif
                        </button>
                    </form>

                    @foreach($availableWorkspaces as $workspace)
                    <form method="POST" action="{{ route('team.switch') }}" style="margin:0.2rem 0 0;">
                        @csrf
                        <input type="hidden" name="workspace_owner_id" value="{{ $workspace['id'] }}">
                        <button type="submit" class="workspace-btn {{ (isset($activeWorkspaceOwnerId) && $activeWorkspaceOwnerId === $workspace['id']) ? 'active-workspace' : '' }}">
                            <span class="workspace-btn-inner">
                                <span class="workspace-avatar">
                                    {{ strtoupper(substr($workspace['name'], 0, 1)) }}
                                </span>
                                <span style="min-width:0;">
                                    <span class="workspace-name">{{ $workspace['name'] }}</span>
                                    <span class="workspace-role">{{ ucfirst($workspace['role']) }}</span>
                                </span>
                            </span>
                            @if(isset($activeWorkspaceOwnerId) && $activeWorkspaceOwnerId === $workspace['id'])
                                <span class="workspace-active-badge">Active</span>
                            @endif
                        </button>
                    </form>
                    @endforeach
                </div>
                <div class="workspace-divider"></div>
                @endif
                {{-- ── End Workspace Switcher ──────────────────────────────── --}}

                {{-- ── Nav links — EXACTLY your original, zero changes ──────── --}}
                <ul class="sidebar-nav">
                    <li>
                        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') && !request()->routeIs('dashboard.forms.*') ? 'active' : '' }}">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="3" width="7" height="7"/>
                                <rect x="14" y="3" width="7" height="7"/>
                                <rect x="14" y="14" width="7" height="7"/>
                                <rect x="3" y="14" width="7" height="7"/>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.forms.create') }}" class="{{ request()->routeIs('dashboard.forms.create') ? 'active' : '' }}">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"/>
                                <line x1="12" y1="8" x2="12" y2="16"/>
                                <line x1="8" y1="12" x2="16" y2="12"/>
                            </svg>
                            New Form
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('billing.portal') }}" class="{{ request()->routeIs('billing.portal') ? 'active' : '' }}">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" 
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="4" width="20" height="16" rx="2" ry="2"/>
                                <line x1="2" y1="10" x2="22" y2="10"/>
                                <line x1="6" y1="16" x2="10" y2="16"/>
                            </svg>
                            Plan & Subscriptions
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('billing.payment-history') }}" class="{{ request()->routeIs('billing.payment-history') ? 'active' : '' }}">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" 
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <!-- Clock circle -->
                                <circle cx="12" cy="12" r="10"/>
                                <!-- Clock hands -->
                                <line x1="12" y1="12" x2="12" y2="8"/>
                                <line x1="12" y1="12" x2="16" y2="12"/>
                            </svg>
                            Payment History
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('team.index') }}" class="{{ request()->routeIs('team.index') ? 'active' : '' }}">
                            <svg width="64" height="64" viewBox="0 0 64 64" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                xmlns="http://www.w3.org/2000/svg">
                                <!-- Team figures (larger size) -->
                                <circle cx="32" cy="32" r="12"/>
                                <circle cx="12" cy="44" r="8"/>
                                <circle cx="52" cy="44" r="8"/>
                                <!-- Shoulders -->
                                <path d="M18 62c0-8 8-14 14-14s14 6 16 16"/>
                                <path d="M0 60c0-7 7-12 12-12s12 5 14 14"/>
                                <path d="M40 60c0-7 7-12 12-12s12 5 14 14"/>
                            </svg>
                            Team Management
                        </a>
                    </li>
                </ul>
            </nav>
            
            <div class="sidebar-footer">
                <ul class="sidebar-nav">
                    <li>
                        <a href="{{ route('docs') }}" target="_blank">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                <polyline points="14 2 14 8 20 8"/>
                                <line x1="16" y1="13" x2="8" y2="13"/>
                                <line x1="16" y1="17" x2="8" y2="17"/>
                                <polyline points="10 9 9 9 8 9"/>
                            </svg>
                            Documentation
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('account.settings') }}" class="{{ request()->routeIs('account.settings') ? 'active' : '' }}">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" 
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-3-3.87"/>
                                <path d="M4 21v-2a4 4 0 0 1 3-3.87"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                            Account
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                            @csrf
                            <button type="submit" class="logout-btn">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                    <polyline points="16 17 21 12 16 7"/>
                                    <line x1="21" y1="12" x2="9" y2="12"/>
                                </svg>
                                Sign Out
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">

            {{-- Workspace banner — safe with isset(), no error if middleware missing --}}
            @if(isset($isOwnWorkspace) && !$isOwnWorkspace)
            <div class="workspace-banner">
                <span>
                    Viewing <strong>{{ $workspaceOwner?->name ?? $workspaceOwner?->email }}</strong>'s workspace
                    as <strong>{{ ucfirst($currentTeamRole ?? 'viewer') }}</strong>
                </span>
                <form method="POST" action="{{ route('team.switch') }}" style="margin:0;">
                    @csrf
                    <input type="hidden" name="workspace_owner_id" value="{{ Auth::id() }}">
                    <button type="submit" class="workspace-banner-switch">← Switch to My Account</button>
                </form>
            </div>
            @endif

            @if(session('message'))
                <div class="alert alert-success">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                        <polyline points="22 4 12 14.01 9 11.01"/>
                    </svg>
                    {{ session('message') }}
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-error">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="8" x2="12" y2="12"/>
                        <line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    {{ session('error') }}
                </div>
            @endif
            
            @yield('content')
        </main>
    </div>
    
    <script src="/js/app.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuBtn = document.getElementById('mobileMenuBtn');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const body = document.body;

            function openSidebar() {
                sidebar.classList.add('active');
                overlay.classList.add('active');
                body.classList.add('sidebar-open');
                menuBtn.classList.add('active');
            }

            function closeSidebar() {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
                body.classList.remove('sidebar-open');
                menuBtn.classList.remove('active');
            }

            function toggleSidebar() {
                if (sidebar.classList.contains('active')) {
                    closeSidebar();
                } else {
                    openSidebar();
                }
            }

            if (menuBtn && sidebar && overlay) {
                menuBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    toggleSidebar();
                });

                overlay.addEventListener('click', closeSidebar);

                sidebar.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', function(e) {
                        if (!this.closest('form')) {
                            closeSidebar();
                        }
                    });
                });

                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && sidebar.classList.contains('active')) {
                        closeSidebar();
                    }
                });

                let resizeTimer;
                window.addEventListener('resize', function() {
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(function() {
                        if (window.innerWidth > 768) {
                            closeSidebar();
                        }
                    }, 250);
                });

                let touchStartX = 0;
                let touchEndX = 0;
                
                sidebar.addEventListener('touchstart', function(e) {
                    touchStartX = e.changedTouches[0].screenX;
                }, { passive: true });
                
                sidebar.addEventListener('touchend', function(e) {
                    touchEndX = e.changedTouches[0].screenX;
                    if (touchStartX - touchEndX > 50) {
                        closeSidebar();
                    }
                }, { passive: true });
            }
        });
    </script>
    @stack('scripts')
</body>
</html>