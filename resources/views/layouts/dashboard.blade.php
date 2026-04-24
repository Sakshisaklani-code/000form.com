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
    <!-- csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    @stack('styles')

  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title>@yield('title', 'Dashboard') - 000form</title>
    <link rel="icon" href="{{ asset('images/favicon/000formFavicon.png') }}" type="image/svg+xml">
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
    <meta property="og:image" content="{{ asset('images/og-image/og-image.jpg') }}" />
    <meta property="og:site_name" content="000Forms" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TV3T8837GC"></script>
    <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-TV3T8837GC');</script>
    <script type="application/ld+json">{"@context":"https://schema.org","@type":"Organization","name":"000Form","url":"https://000form.com/","logo":"https://000form.com/images/logo/000formlogo.png"}</script>
    @stack('styles')

   <body>

        {{-- Mobile Header --}}
        <div class="mobile-header">
            <a href="{{ route('dashboard') }}" class="mobile-logo">
                <img src="{{ asset('images/logo/000formlogo.png') }}" alt="000form">
            </a>
            <button class="hamburger" id="hamburger" aria-label="Menu">
                <span></span><span></span><span></span>
            </button>
        </div>
        <div class="overlay" id="overlay"></div>

        {{-- Topbar — right-side controls only, no logo --}}
        <header class="topbar" id="topbar">
            <div class="topbar-right">

                {{-- Workspace Switcher --}}
                @if(isset($availableWorkspaces) && $availableWorkspaces->count() > 0)
                <div class="user-menu" id="wsSwitcherWrap">
                    <button class="ws-pill" id="wsSwitcherTrigger" aria-expanded="false">
                        <span class="ws-pill-dot"></span>
                        <span style="font-family:'Outfit',sans-serif; font-size:1rem125rem; font-weight:400; color:var(--text-secondary);">
                            @if(isset($isOwnWorkspace) && $isOwnWorkspace)
                                My Account
                            @else
                                @foreach($availableWorkspaces as $ws)
                                    @if(isset($activeWorkspaceOwnerId) && $activeWorkspaceOwnerId === $ws['id']){{ $ws['name'] }}@endif
                                @endforeach
                            @endif
                        </span>
                        <i class="bi bi-chevron-down" style="font-size:0.58rem; opacity:0.4; margin-left:2px;"></i>
                    </button>
                    <div class="ws-dropdown" id="wsDropdown">
                        <div class="dropdown-section-label">Switch workspace</div>
                        <form method="POST" action="{{ route('team.switch') }}">
                            @csrf
                            <input type="hidden" name="workspace_owner_id" value="{{ Auth::id() }}">
                            <button type="submit" class="ws-switch-btn {{ (isset($isOwnWorkspace) && $isOwnWorkspace) ? 'active' : '' }}">
                                <div class="ws-mini-avatar own">{{ strtoupper(substr(Auth::user()->name ?? Auth::user()->email, 0, 1)) }}</div>
                                <div class="ws-switch-info">
                                    <span class="ws-switch-name">My Account</span>
                                    <span class="ws-switch-role">personal</span>
                                </div>
                                @if(isset($isOwnWorkspace) && $isOwnWorkspace)<span class="ws-active-badge">Active</span>@endif
                            </button>
                        </form>
                        @foreach($availableWorkspaces as $workspace)
                        <form method="POST" action="{{ route('team.switch') }}">
                            @csrf
                            <input type="hidden" name="workspace_owner_id" value="{{ $workspace['id'] }}">
                            <button type="submit" class="ws-switch-btn {{ (isset($activeWorkspaceOwnerId) && $activeWorkspaceOwnerId === $workspace['id']) ? 'active' : '' }}">
                                <div class="ws-mini-avatar">{{ strtoupper(substr($workspace['name'], 0, 1)) }}</div>
                                <div class="ws-switch-info">
                                    <span class="ws-switch-name">{{ $workspace['name'] }}</span>
                                    <span class="ws-switch-role">{{ ucfirst($workspace['role']) }}</span>
                                </div>
                                @if(isset($activeWorkspaceOwnerId) && $activeWorkspaceOwnerId === $workspace['id'])<span class="ws-active-badge">Active</span>@endif
                            </button>
                        </form>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- User Menu --}}
                <div class="user-menu" id="userMenuWrap">
                    <button class="user-menu-trigger" id="userMenuTrigger" aria-expanded="false">
                        <div class="user-avatar-sm">{{ strtoupper(substr(Auth::user()->email, 0, 1)) }}</div>
                        <span class="user-menu-name">{{ Auth::user()->email }}</span>
                        <i class="bi bi-chevron-down user-menu-chevron"></i>
                    </button>
                    <div class="user-dropdown" id="userDropdown">
                        <div class="dropdown-header">
                            @if(Auth::user()->name)<div class="dropdown-header-name">{{ Auth::user()->name }}</div>@endif
                            <div class="dropdown-header-email">{{ Auth::user()->email }}</div>
                        </div>
                        <div class="dropdown-section-label">Account</div>
                        <a href="{{ route('account.settings') }}" class="dropdown-item"><i class="bi bi-person-gear"></i> Profile Settings</a>
                        <a href="{{ route('team.index') }}" class="dropdown-item"><i class="bi bi-people"></i> Team Management</a>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-section-label">Billing</div>
                        <a href="{{ route('billing.portal') }}" class="dropdown-item"><i class="bi bi-credit-card"></i> Plans & Subscription</a>
                        <a href="{{ route('billing.payment-history') }}" class="dropdown-item"><i class="bi bi-receipt"></i> Payment History</a>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-section-label">Resources</div>
                        <a href="{{ route('docs') }}" target="_blank" class="dropdown-item"><i class="bi bi-file-text"></i> Documentation</a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item danger"><i class="bi bi-box-arrow-right"></i> Sign Out</button>
                        </form>
                    </div>
                </div>

            </div>
        </header>

        {{-- Layout shell --}}
        <div class="shell">
            <aside class="sidebar" id="sidebar">

                {{-- Logo fills the top-left corner gap --}}
                <div class="sidebar-brand">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/logo/000formlogo.png') }}" alt="000form">
                    </a>
                </div>

                <div class="sidebar-section-label">Main</div>
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
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
                        {{-- New — same muted colour as other nav items --}}
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
                            <a href="{{ route('dashboard.projects.create') }}" class="new-sub-item">
                                <i class="bi bi-folder-plus"></i> New Project
                            </a>
                            <button class="new-sub-item" id="openNewFormModal">
                                <i class="bi bi-file-plus"></i> New Form
                            </button>
                        </div>
                    </li>
                </ul>

                @if(isset($sidebarProjects) && $sidebarProjects->isNotEmpty())
                <div class="sidebar-section-label" style="margin-top:0.25rem">Projects</div>
                <ul class="nav-list" id="projectsTree">
                    @foreach($sidebarProjects as $proj)
                    <li class="nav-item proj-row" id="proj-row-{{ $proj->id }}">
                        <div class="proj-row-wrap">
                            <a href="{{ route('dashboard.projects.show', $proj->id) }}" class="proj-row-link" title="{{ $proj->name }}">
                                <span class="proj-color-dot" style="background:{{ $proj->color ?? '#6366f1' }}"></span>
                                <span class="proj-name-text">{{ $proj->name }}</span>
                                @if(isset($proj->forms) && $proj->forms->isNotEmpty())
                                <button class="proj-expand-btn" id="proj-expand-{{ $proj->id }}" data-proj="{{ $proj->id }}">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                                </button>
                                @endif
                            </a>
                            
                        </div>
                        @if(isset($proj->forms) && $proj->forms->isNotEmpty())
                        <div class="forms-list" id="forms-list-{{ $proj->id }}">
                            @foreach($proj->forms as $form)
                            <a href="{{ route('dashboard.forms.show', $form->id) }}" class="form-link">
                                <span class="form-link-dot"></span>{{ $form->name }}
                            </a>
                            @endforeach
                        </div>
                        @endif
                    </li>
                    @endforeach
                </ul>
                @endif

                <div class="sidebar-spacer"></div>

                {{-- Bottom panel: account & settings shortcut --}}
                <div class="sidebar-bottom">
                    <a href="{{ route('account.settings') }}" class="sidebar-user-btn">
                        <div class="sidebar-user-avatar">
                            {{ strtoupper(substr(Auth::user()->email, 0, 1)) }}
                        </div>
                        <div class="sidebar-user-info">
                            <span class="sidebar-user-name">{{ Auth::user()->name ?? 'My Account' }}</span>
                            <span class="sidebar-user-email">{{ Auth::user()->email }}</span>
                        </div>
                        <i class="bi bi-gear sidebar-settings-icon"></i>
                    </a>
                </div>

            </aside>

            <main class="main">
                @if(session('message'))<div class="alert alert-success"><i class="bi bi-check-circle"></i> {{ session('message') }}</div>@endif
                @if(session('error'))<div class="alert alert-error"><i class="bi bi-exclamation-triangle"></i> {{ session('error') }}</div>@endif
                @yield('content')
            </main>
        </div>

        {{-- New Form Modal --}}
        {{-- ── New Form Quick Modal ────────────────────────────── --}}
    <div id="newFormModalBackdrop" class="nfm-backdrop" aria-hidden="true">
        <div class="nfm-dialog" role="dialog" aria-modal="true" aria-labelledby="nfmTitle">
            <div class="nfm-header">
                <h2 id="nfmTitle" class="nfm-title">Create New Form</h2>
                <button class="nfm-close" id="closeNewFormModal" aria-label="Close">&times;</button>
            </div>

            <form method="POST" action="{{ route('dashboard.forms.store') }}" id="newFormQuickForm">
                @csrf

                {{-- Project --}}
                <div class="nfm-field">
                    <label for="nfm_project_id" class="nfm-label">
                        Project <span class="nfm-required">*</span>
                    </label>

                    @if(isset($sidebarProjects) && $sidebarProjects->isNotEmpty())
                        <select id="nfm_project_id" name="project_id" class="nfm-select" required>
                            <option value="">— Select a project —</option>
                            @foreach($sidebarProjects as $proj)
                                <option value="{{ $proj->id }}">{{ $proj->name }}</option>
                            @endforeach
                        </select>
                        <p class="nfm-help">Forms must belong to a project.</p>

                    @else
                        {{-- No projects exist yet — block the form and guide the user --}}
                        <div class="nfm-no-projects">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <circle cx="12" cy="12" r="10"/>
                                <line x1="12" y1="8" x2="12" y2="12"/>
                                <line x1="12" y1="16" x2="12.01" y2="16"/>
                            </svg>
                            <div>
                                <p class="nfm-no-projects-title" style="font-size: 0.875rem;">No projects yet, Forms must belong to a project.</p>
                                <a href="{{ route('dashboard.projects.create') }}" class="nfm-create-project-link" style="font-size: 0.875rem;">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M3 7a2 2 0 0 1 2-2h4l2 2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7z"/>
                                        <line x1="12" y1="10" x2="12" y2="16"/>
                                        <line x1="9" y1="13" x2="15" y2="13"/>
                                    </svg>
                                    Create your first project
                                </a>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Form Name --}}
                <div class="nfm-field">
                    <label for="nfm_name" class="nfm-label">
                        Form Name <span class="nfm-required">*</span>
                    </label>
                    <input
                        type="text"
                        id="nfm_name"
                        name="name"
                        class="nfm-input"
                        placeholder="e.g. Contact Form, Newsletter Signup"
                        required
                    >
                    <p class="nfm-help">A friendly name to identify this form in your dashboard.</p>
                </div>

                {{-- Recipient Email --}}
                <div class="nfm-field">
                    <label for="nfm_recipient_email" class="nfm-label">
                        Recipient Email <span class="nfm-required">*</span>
                    </label>
                    <input
                        type="email"
                        id="nfm_recipient_email"
                        name="recipient_email"
                        class="nfm-input"
                        value="{{ Auth::user()->email }}"
                        readonly
                    >
                    <p class="nfm-help">Form submissions will be sent to this address.</p>
                </div>

                {{-- Auto-response toggle --}}
                <div class="nfm-field">
                    <label class="nfm-label">Auto-Response Settings</label>
                    <label class="nfm-checkbox">
                        <input type="checkbox" name="auto_response_enabled" value="1" id="nfm_auto_response_enabled">
                        <span>Enable auto-response email</span>
                    </label>
                    <p class="nfm-help">
                        Send an automatic thank-you email to users who submit this form.
                        Sent from {{ config('mail.from.address') }}.
                    </p>
                </div>

                {{-- Auto-response message (hidden until checked) --}}
                <div class="nfm-field" id="nfm_autoResponseFields" style="display:none;">
                    <label for="nfm_auto_response_message" class="nfm-label">Auto-Response Message</label>
                    <textarea
                        id="nfm_auto_response_message"
                        name="auto_response_message"
                        class="nfm-input nfm-textarea"
                        rows="5"
                        placeholder="Write your thank you message here..."
                    >Dear {visitor_name},

Thank you for contacting us! We have received your message via {form_name} and will get back to you shortly.

Best regards,
The {site_name} Team</textarea>
                </div>

                {{-- Redirect URL --}}
                <div class="nfm-field">
                    <label for="nfm_redirect_url" class="nfm-label">
                        Redirect URL <span class="nfm-optional">optional</span>
                    </label>
                    <input
                        type="url"
                        id="nfm_redirect_url"
                        name="redirect_url"
                        class="nfm-input"
                        placeholder="https://yoursite.com/thank-you"
                    >
                    <p class="nfm-help">Where to redirect after submission. Leave empty for our default thank-you page.</p>
                </div>

                {{-- Success Message --}}
                <div class="nfm-field">
                    <label for="nfm_success_message" class="nfm-label">
                        Success Message <span class="nfm-optional">optional</span>
                    </label>
                    <input
                        type="text"
                        id="nfm_success_message"
                        name="success_message"
                        class="nfm-input"
                        value="Thank you for your submission!"
                        placeholder="Thank you for your submission!"
                    >
                    <p class="nfm-help">Shown on our thank-you page or returned in the JSON response.</p>
                </div>

                <div class="nfm-actions">
                    <button
                        type="submit"
                        class="nfm-btn-primary"
                        @if(!isset($sidebarProjects) || $sidebarProjects->isEmpty()) disabled style="opacity:0.4; cursor:not-allowed;" @endif
                    >
                        Create Form
                    </button>
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
        @stack('scripts')
    </body>
    </html>