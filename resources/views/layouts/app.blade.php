<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="description" content="000form - Free form backend for your websites. No server required.">
    <title>@yield('title', '000form - Free Form Backend')</title>
    <!-- csrf-token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon/000formFavicon.png') }}" type="image/svg+xml">
    <!-- Canonical Tag --> 
    <link rel="canonical" href="https://000form.com/" />
    <!-- Keywords --> 
    <meta name="keywords" content="forms, laravel forms, php form builder, contact forms, form submissions, 000Form">
    <!-- FontsStyles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="/css/app.css">
    <!-- Open Graph Tags --> 
    <meta property="og:title" content="000Forms - Smart Form Submissions" /> 
    <meta property="og:description" content="Easily create and manage forms with 000Forms, a Laravel-powered solution." /> 
    <meta property="og:type" content="website" /> 
    <meta property="og:url" content="https://000form.com/" /> 
    <meta property="og:image" content="{{ asset('images/og-image/og-image.jpg') }}" /> 
    <meta property="og:site_name" content="000Forms" />
    <!-- Index and follow for SEO -->
    <meta name="robots" content="index, follow">
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
    <style>
        /* EXPRESS BLUE PILL */
        .pill-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 18px 9px 13px;
            border-radius: 999px;
            background: linear-gradient(135deg, #1e6be6 0%, #0a3fa8 100%);
            color: #fafcff!important;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            border: 1px solid rgba(255,255,255,0.18);
            box-shadow: 0 2px 12px rgba(30,107,230,0.38),
                        inset 0 1px 0 rgba(255,255,255,0.14);
            transition: all 0.3s ease;
        }

        .pill-link:hover {
            box-shadow: 0 6px 22px rgba(30,107,230,0.8);
            transform: scale(1.08); 
        }

        .pill-icon {
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255,255,255,0.15);
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.2);
        }

        /* Mobile menu styles */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
            z-index: 100;
        }
        
        .mobile-menu-toggle span {
            display: block;
            width: 25px;
            height: 3px;
            background: var(--text-primary);
            margin: 5px 0;
            transition: 0.3s;
            border-radius: 3px;
        }
        
        .mobile-menu-toggle.active span:nth-child(1) {
            transform: rotate(-45deg) translate(-5px, 6px);
        }
        
        .mobile-menu-toggle.active span:nth-child(2) {
            opacity: 0;
        }
        
        .mobile-menu-toggle.active span:nth-child(3) {
            transform: rotate(45deg) translate(-5px, -6px);
        }
        
        @media (max-width: 768px) {
            .mobile-menu-toggle {
                display: block;
            }
            
            .nav-links,
            .nav-actions {
                display: none;
                width: 100%;
            }
            
            .nav-links.active,
            .nav-actions.active {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 1rem;
                padding: 1rem 0;
            }
            
            .nav-links.active {
                border-top: 1px solid var(--border-color);
                margin-top: 1rem;
            }
            
            .nav-inner {
                flex-wrap: wrap;
            }
            
            .footer-inner {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }
            
            .footer-links {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
        
        @media (max-width: 480px) {
            .container {
                padding: 0 1rem;
            }
            
            .nav-logo {
                font-size: 1.5rem;
            }
            
            .btn {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }
        }
        .nav-logo img{
            height: 40px;
            /* filter: brightness(0) saturate(100%) invert(74%) sepia(69%) saturate(500%) hue-rotate(100deg) brightness(105%); */
        }
    </style>
</head>
<body id="main-body">

    <nav class="nav">
        <div class="nav-inner">
            <a href="/" class="nav-logo">
                <img src="{{ asset('images/logo/000formlogo.png') }}" alt="000form Logo">
            </a>
            
            <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <ul class="nav-links" id="navLinks">
                <li>
                    <a href="{{ route('playground.index') }}" class="pill-link">
                        <span class="pill-icon">
                        <svg width="11" height="13" viewBox="0 0 12 14" fill="none">
                            <path d="M7 1L2 7.5H6L5 13L10 6.5H6.5L7 1Z"
                                fill="white" stroke="rgba(255,255,255,0.4)"
                                stroke-width="0.5" stroke-linejoin="round"/>
                        </svg>
                        </span>
                        Express
                    </a>
                </li>
                <li><a href="{{ route('docs') }}">Documentation</a></li>
                <li><a href="{{ route('pricing') }}">Pricing</a></li>
                <li><a href="{{ route('Home.library') }}">Library</a></li>
            </ul>
            
            <!-- <div class="nav-actions" id="navActions">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-ghost">Login</a>
                    <a href="{{ route('signup') }}" class="btn btn-primary">Get Started</a>
                @endauth
            </div> -->
        </div>
    </nav>

    @yield('content')
    
<footer class="footer">
    <div class="container">
        <div class="footer-top">
            
            <!-- Left: Logo -->
            <div class="nav-logo"><span>000</span>form</div>

            <!-- Right: Links -->
            <ul class="footer-links">
                <li><a href="{{ route('pages.terms') }}">Terms</a></li>
                <li><a href="{{ route('pages.privacy-policy') }}">Privacy Policy</a></li>
                <li><a href="{{ route('pages.refund') }}">Refund Policy</a></li>
            </ul>

        </div>

        <!-- Bottom Section -->
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
    <script>
        // ✅ FIRST: Check for password reset recovery token BEFORE touching the hash
        (function () {
            const hash = window.location.hash;
            if (hash && hash.includes('type=recovery')) {
                document.getElementById('main-body').style.display = 'none'; // hide flash
                const params = new URLSearchParams(hash.substring(1));
                const accessToken = params.get('access_token');
                const refreshToken = params.get('refresh_token');
                if (accessToken) {
                    window.location.replace(
                        '/auth/reset-password-confirm-token'
                        + '?access_token=' + encodeURIComponent(accessToken)
                        + '&refresh_token=' + encodeURIComponent(refreshToken || '')
                    );
                }
            }
        })();

        // Mobile menu toggle
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const navLinks = document.getElementById('navLinks');
        const navActions = document.getElementById('navActions');

        if (mobileMenuToggle) {
            mobileMenuToggle.addEventListener('click', function () {
                this.classList.toggle('active');
                navLinks.classList.toggle('active');
                navActions.classList.toggle('active');
            });

            // Close menu when a nav link is clicked
            document.querySelectorAll('#navLinks a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenuToggle.classList.remove('active');
                    navLinks.classList.remove('active');
                    navActions.classList.remove('active');
                });
            });

            // Close menu when clicking outside
            document.addEventListener('click', function (e) {
                if (!mobileMenuToggle.contains(e.target) &&
                    !navLinks.contains(e.target) &&
                    !navActions.contains(e.target)) {
                    mobileMenuToggle.classList.remove('active');
                    navLinks.classList.remove('active');
                    navActions.classList.remove('active');
                }
            });
        }

        // SECOND: Only remove hash if it's NOT a recovery token
        if (window.location.hash && !window.location.hash.includes('type=recovery')) {
            history.replaceState(null, '', window.location.pathname);
        }

        // Intercept all anchor hash clicks — smooth scroll without hash in URL
        document.addEventListener('click', function(e) {
            const link = e.target.closest('a[href^="#"]');
            if (!link) return;
            const hash = link.getAttribute('href');
            if (hash === '#' || hash === '') return;
            const target = document.querySelector(hash);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                history.replaceState(null, '', window.location.pathname);
            }
        });
    </script>
    @stack('scripts')
</body>
</html>