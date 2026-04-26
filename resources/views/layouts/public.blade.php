<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Bunyan | Premium Saudi Neighborhoods')</title>

    <!-- Google Fonts — REFINED PREMIUM STACK -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Outfit:wght@100..900&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --font-heading: 'Cormorant Garamond', Georgia, serif;
            --font-body:    'Outfit', system-ui, sans-serif;
            --font-mono:    'JetBrains Mono', monospace;

            --primary:           #446E2E;
            --primary-dark:      #2D5016;
            --primary-light:     #5A8A3A;
            --accent:            #88A47C;
            --surface:           #FDFAF4;
            --surface-secondary: #EEF3E8;
            --border-color:      #D4DFC8;
            --text-main:         #1A2410;
            --text-muted:        #6B7C5A;

            --nav-height: 80px;
            --radius-sm: 6px;
            --radius-md: 14px;
            --radius-lg: 24px;
            --radius-xl: 40px;

            --shadow-sm:      0 2px 8px rgba(26,36,16,0.06);
            --shadow-md:      0 8px 24px rgba(26,36,16,0.1);
            --shadow-lg:      0 24px 60px rgba(26,36,16,0.12);
            --shadow-glow:    0 0 40px rgba(68,110,46,0.2);
            --transition:     0.4s cubic-bezier(0.16,1,0.3,1);
        }

        html { scroll-behavior: smooth; }
        body {
            font-family: var(--font-body);
            background: var(--surface);
            color: var(--text-main);
            line-height: 1.75;
            -webkit-font-smoothing: antialiased;
        }
        h1,h2,h3,h4,h5,h6 {
            font-family: var(--font-heading);
            line-height: 1.15;
            color: var(--text-main);
        }

        /* ─────────────────────────────────────────
           NAVBAR
        ───────────────────────────────────────── */
        #main-nav {
            position: fixed;
            top: 24px; left: 50%;
            transform: translateX(-50%);
            width: calc(100% - 48px);
            max-width: 1400px;
            z-index: 9999;
            transition: all 0.5s cubic-bezier(0.16,1,0.3,1);
            border-radius: 100px;
        }

        /* Transparent (on hero pages) */
        #main-nav.nav-transparent {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Scrolled state */
        #main-nav.nav-solid {
            top: 16px;
            background: rgba(253,250,244,0.85);
            backdrop-filter: blur(25px) saturate(180%);
            border: 1px solid rgba(68, 110, 46, 0.15);
            box-shadow: 0 10px 40px rgba(26, 36, 16, 0.1);
        }

        .nav-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 70px;
            padding: 0 32px;
            transition: var(--transition);
        }

        /* Logo */
        .nav-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            flex-shrink: 0;
        }
        .nav-logo-mark {
            width: 38px;
            height: 38px;
            background: var(--primary);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            box-shadow: 0 4px 12px rgba(68,110,46,0.3);
        }
        .nav-logo-mark svg { color: #fff; }
        .nav-logo-text {
            font-family: var(--font-heading);
            font-size: 1.6rem;
            font-weight: 600;
            color: #fff;
            transition: color var(--transition);
            letter-spacing: -0.01em;
        }
        .nav-solid .nav-logo-text { color: var(--text-main); }
        .nav-logo:hover .nav-logo-mark { transform: rotate(-8deg) scale(1.05); }

        /* Nav Links */
        .nav-links {
            display: flex;
            align-items: center;
            gap: 4px;
            list-style: none;
        }
        .nav-links a {
            position: relative;
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 50px;
            font-family: var(--font-body);
            font-size: 0.82rem;
            font-weight: 500;
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            transition: all 0.3s ease;
            white-space: nowrap;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .nav-solid .nav-links a { color: var(--text-muted); }

        /* Hover pill highlight */
        .nav-links a::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: var(--radius-sm);
            background: rgba(255,255,255,0.08);
            opacity: 0;
            transform: scale(0.9);
            transition: all 0.25s ease;
        }
        .nav-solid .nav-links a::before { background: rgba(68,110,46,0.07); }
        .nav-links a:hover::before,
        .nav-links a.active::before { opacity: 1; transform: scale(1); }

        .nav-links a:hover,
        .nav-links a.active {
            color: #fff !important;
        }
        .nav-solid .nav-links a:hover,
        .nav-solid .nav-links a.active {
            color: var(--primary) !important;
        }

        /* Active dot indicator */
        .nav-links a.active::after {
            content: '';
            position: absolute;
            bottom: 6px;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background: var(--primary);
        }
        .nav-transparent .nav-links a.active::after { background: var(--accent); }

        /* Nav CTA Button */
        .nav-cta {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 26px;
            background: var(--primary);
            color: #fff !important;
            font-family: var(--font-body);
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 16px rgba(68,110,46,0.3);
            white-space: nowrap;
        }
        .nav-cta:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(68,110,46,0.4);
        }
        .nav-cta svg { flex-shrink: 0; transition: transform 0.3s ease; }
        .nav-cta:hover svg { transform: translateX(3px); }

        /* Auth links cluster */
        .nav-auth {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .nav-auth-link {
            font-family: var(--font-body);
            font-size: 0.85rem;
            font-weight: 500;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: color 0.25s;
        }
        .nav-solid .nav-auth-link { color: var(--text-muted); }
        .nav-auth-link:hover { color: var(--primary); }

        /* ─────────────────────────────────────────
           GLOBAL SHARED COMPONENTS
        ───────────────────────────────────────── */
        .section-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-family: var(--font-mono);
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--primary);
            margin-bottom: 20px;
        }
        .section-eyebrow::before {
            content: '';
            width: 32px; height: 2px;
            background: var(--primary);
            display: block;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 40px;
            background: var(--primary);
            color: #fff;
            font-family: var(--font-body);
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 50px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 16px rgba(68,110,46,0.25);
        }
        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(68,110,46,0.35);
        }

        .btn-outline-dark {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 40px;
            background: transparent;
            color: #fff;
            font-family: var(--font-body);
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 50px;
            border: 1.5px solid rgba(255,255,255,0.2);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-outline-dark:hover {
            border-color: var(--accent);
            background: rgba(136,164,124,0.1);
            transform: translateY(-2px);
        }

        .text-gradient {
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            background-image: linear-gradient(135deg, var(--primary) 0%, var(--accent) 60%, #B5C9A8 100%);
        }

        /* ─────────────────────────────────────────
           GLOBAL ANIMATION SYSTEM
        ───────────────────────────────────────── */

        /* Page entry */
        @keyframes page-enter {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        main { animation: page-enter 0.7s cubic-bezier(0.16,1,0.3,1) both; }

        /* Floating orbs */
        @keyframes orb-float {
            0%,100% { transform: translateY(0) scale(1); }
            50%     { transform: translateY(-30px) scale(1.05); }
        }
        @keyframes orb-float-r {
            0%,100% { transform: translateY(0) rotate(0deg); }
            50%     { transform: translateY(-20px) rotate(15deg); }
        }
        .bg-orb {
            position: fixed; pointer-events: none; z-index: 0; border-radius: 50%;
            filter: blur(80px); opacity: 0.04;
        }
        .bg-orb-1 { width: 600px; height: 600px; top: -100px; right: -100px; background: var(--primary); animation: orb-float 12s ease-in-out infinite; }
        .bg-orb-2 { width: 400px; height: 400px; bottom: 20%; left: -80px; background: var(--accent); animation: orb-float-r 16s ease-in-out infinite; }

        /* Reveal — fade up (default) */
        .reveal, .reveal-slow {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.9s cubic-bezier(0.16,1,0.3,1), transform 0.9s cubic-bezier(0.16,1,0.3,1);
        }
        .reveal-slow { transition-duration: 1.4s; }
        .reveal.active, .reveal-slow.active { opacity: 1; transform: translateY(0); }

        /* Reveal — scale */
        .reveal-scale {
            opacity: 0;
            transform: scale(0.93);
            transition: opacity 0.9s cubic-bezier(0.16,1,0.3,1), transform 0.9s cubic-bezier(0.16,1,0.3,1);
        }
        .reveal-scale.active { opacity: 1; transform: scale(1); }

        /* Reveal — slide from left */
        .reveal-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: opacity 0.9s cubic-bezier(0.16,1,0.3,1), transform 0.9s cubic-bezier(0.16,1,0.3,1);
        }
        .reveal-left.active { opacity: 1; transform: translateX(0); }

        /* Reveal — slide from right */
        .reveal-right {
            opacity: 0;
            transform: translateX(50px);
            transition: opacity 0.9s cubic-bezier(0.16,1,0.3,1), transform 0.9s cubic-bezier(0.16,1,0.3,1);
        }
        .reveal-right.active { opacity: 1; transform: translateX(0); }

        /* Reveal — fade only */
        .reveal-fade {
            opacity: 0;
            transition: opacity 1.2s ease;
        }
        .reveal-fade.active { opacity: 1; }

        /* Reveal — zoom in */
        .reveal-zoom {
            opacity: 0;
            transform: scale(0.8);
            transition: opacity 0.8s cubic-bezier(0.16,1,0.3,1), transform 0.8s cubic-bezier(0.16,1,0.3,1);
        }
        .reveal-zoom.active { opacity: 1; transform: scale(1); }

        /* Stagger — children animate one by one */
        .stagger-children > * {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.7s cubic-bezier(0.16,1,0.3,1), transform 0.7s cubic-bezier(0.16,1,0.3,1);
        }
        .stagger-children.active > *:nth-child(1) { transition-delay: 0ms; }
        .stagger-children.active > *:nth-child(2) { transition-delay: 80ms; }
        .stagger-children.active > *:nth-child(3) { transition-delay: 160ms; }
        .stagger-children.active > *:nth-child(4) { transition-delay: 240ms; }
        .stagger-children.active > *:nth-child(5) { transition-delay: 320ms; }
        .stagger-children.active > *:nth-child(6) { transition-delay: 400ms; }
        .stagger-children.active > *:nth-child(n+7) { transition-delay: 480ms; }
        .stagger-children.active > * { opacity: 1; transform: translateY(0); }

        /* Shimmer line */
        @keyframes shimmer {
            0%   { background-position: -200% center; }
            100% { background-position: 200% center; }
        }
        .shimmer-text {
            background: linear-gradient(90deg, var(--primary) 0%, var(--accent) 40%, #B5C9A8 60%, var(--primary) 100%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shimmer 4s linear infinite;
        }

        /* Pulse green dot */
        @keyframes pulse-dot {
            0%, 100% { box-shadow: 0 0 0 0 rgba(68,110,46,0.4); }
            50%       { box-shadow: 0 0 0 8px rgba(68,110,46,0); }
        }
        .pulse-dot {
            display: inline-block; width: 8px; height: 8px;
            border-radius: 50%; background: var(--primary);
            animation: pulse-dot 2s ease-in-out infinite;
        }

        /* Reveal-up (reuse from existing pages) */
        .reveal-up {
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .reveal-up.active { opacity: 1; transform: translateY(0); }

        /* Smooth underline hover on links */
        .hover-underline {
            position: relative;
            text-decoration: none;
        }
        .hover-underline::after {
            content: '';
            position: absolute;
            left: 0; bottom: -2px;
            width: 0; height: 1.5px;
            background: var(--primary);
            transition: width 0.3s ease;
        }
        .hover-underline:hover::after { width: 100%; }

        /* Custom cursor glow */
        #cursor-glow {
            position: fixed;
            width: 300px; height: 300px;
            pointer-events: none;
            z-index: 0;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(68,110,46,0.06) 0%, transparent 70%);
            transform: translate(-50%, -50%);
            transition: transform 0.1s linear, opacity 0.3s;
            opacity: 0;
        }

        /* ─────────────────────────────────────────
           FOOTER
        ───────────────────────────────────────── */
        .site-footer {
            background: var(--text-main);
            color: rgba(255,255,255,0.65);
            padding: 100px 64px 60px;
        }
        .footer-grid {
            display: grid;
            grid-template-columns: 1.6fr 1fr 1fr 1.3fr;
            gap: 80px;
            padding-bottom: 64px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            margin-bottom: 48px;
        }
        .footer-brand-text {
            font-size: 1rem;
            color: rgba(255,255,255,0.45);
            line-height: 1.9;
            margin-top: 24px;
            max-width: 300px;
        }
        .footer-col-title {
            font-family: var(--font-mono);
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 28px;
        }
        .footer-links { list-style: none; display: flex; flex-direction: column; gap: 16px; }
        .footer-links a {
            color: rgba(255,255,255,0.45);
            text-decoration: none;
            font-size: 0.95rem;
            transition: all 0.25s ease;
            display: inline-block;
        }
        .footer-links a:hover { color: #fff; transform: translateX(4px); }

        .footer-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-bottom: 20px;
        }
        .footer-contact-icon {
            width: 34px;
            height: 34px;
            background: rgba(136,164,124,0.12);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .footer-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-family: var(--font-mono);
            font-size: 0.65rem;
            letter-spacing: 2px;
            color: rgba(255,255,255,0.2);
        }
        .footer-bottom a { color: rgba(255,255,255,0.3); text-decoration: none; transition: color 0.2s; }
        .footer-bottom a:hover { color: var(--accent); }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body>

    <!-- ════════════════════════════════════════
         NAVBAR
    ════════════════════════════════════════ -->
    <header id="main-nav" class="{{ request()->is('/') ? 'nav-transparent' : 'nav-solid' }}">
        <div class="nav-inner">

            <!-- Logo -->
            <a href="/" class="nav-logo">
                <div class="nav-logo-mark">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                </div>
                <span class="nav-logo-text">Bunyan</span>
            </a>

            <!-- Nav Links -->
            <ul class="nav-links">
                <li>
                    <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="/about" class="{{ request()->is('about') ? 'active' : '' }}">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="/services" class="{{ request()->is('services*') ? 'active' : '' }}">
                        Services
                    </a>
                </li>
                <li>
                    <a href="/news" class="{{ request()->is('news*') ? 'active' : '' }}">
                        News
                    </a>
                </li>
            </ul>

            <!-- Right Actions -->
            <div class="nav-auth">
                @auth
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}" class="nav-auth-link">Admin</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" style="margin:0">
                        @csrf
                        <button type="submit" class="nav-auth-link" style="background:none;border:none;cursor:pointer;font-family:var(--font-body);">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-auth-link">Login</a>
                @endauth

                <a href="{{ url('/#contact') }}" class="nav-cta">
                    Contact Us
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </header>

    <!-- Scroll-aware nav script -->
    <script>
        (function() {
            var nav = document.getElementById('main-nav');
            var isHome = {{ request()->is('/') ? 'true' : 'false' }};
            function update() {
                if (!isHome) return;
                if (window.scrollY > 40) {
                    nav.classList.remove('nav-transparent');
                    nav.classList.add('nav-solid');
                } else {
                    nav.classList.remove('nav-solid');
                    nav.classList.add('nav-transparent');
                }
            }
            window.addEventListener('scroll', update, { passive: true });
            update();
        })();
    </script>

    <main>
        @yield('content')
    </main>

    <!-- ════════════════════════════════════════
         FOOTER
    ════════════════════════════════════════ -->
    <footer class="site-footer">
        <div class="footer-grid">

            <!-- Brand -->
            <div>
                <a href="/" class="nav-logo" style="opacity:0.9;">
                    <div class="nav-logo-mark" style="background:rgba(136,164,124,0.15);box-shadow:none;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2.5">
                            <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                            <polyline points="9 22 9 12 15 12 15 22"/>
                        </svg>
                    </div>
                    <span class="nav-logo-text" style="color:rgba(255,255,255,0.9);">Bunyan</span>
                </a>
                <p class="footer-brand-text">
                    Your gateway to Saudi Arabia's finest neighborhoods — blending local expertise with global standards.
                </p>
            </div>

            <!-- Properties -->
            <div>
                <p class="footer-col-title">Properties</p>
                <ul class="footer-links">
                    <li><a href="/services">For Sale</a></li>
                    <li><a href="/services">For Rent</a></li>
                    <li><a href="/services">Compounds</a></li>
                    <li><a href="/services">Finance Services</a></li>
                </ul>
            </div>

            <!-- Navigation -->
            <div>
                <p class="footer-col-title">Navigate</p>
                <ul class="footer-links">
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/news">Market News</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="{{ url('/#contact') }}">Contact Us</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <p class="footer-col-title">Contact</p>
                <div class="footer-contact-item">
                    <div class="footer-contact-icon">
                        <svg width="14" height="14" fill="none" stroke="var(--accent)" viewBox="0 0 24 24" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <span style="font-size:0.9rem;line-height:1.6;">King Fahd Branch Rd, Al Mohammadiyah, Riyadh 12363</span>
                </div>
                <div class="footer-contact-item">
                    <div class="footer-contact-icon">
                        <svg width="14" height="14" fill="none" stroke="var(--accent)" viewBox="0 0 24 24" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.69 13 19.79 19.79 0 011.61 4.37 2 2 0 013.6 2.18h3a2 2 0 012 1.72c.13.96.37 1.9.72 2.81a2 2 0 01-.45 2.11L7.91 9.91a16 16 0 006.06 6.06l.99-.99a2 2 0 012.11-.45c.91.35 1.85.59 2.81.72A2 2 0 0122 16.92z"/></svg>
                    </div>
                    <span style="font-size:0.9rem;">+966 54 113 1137</span>
                </div>
                <div class="footer-contact-item">
                    <div class="footer-contact-icon">
                        <svg width="14" height="14" fill="none" stroke="var(--accent)" viewBox="0 0 24 24" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    </div>
                    <span style="font-size:0.9rem;">info@bunyan-sa.sa</span>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <span>&copy; 2026 Bunyan. All Rights Reserved. Vision 2030 Partner.</span>
            <div style="display:flex;gap:32px;">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
            </div>
        </div>
        <div style="text-align:center;margin-top:28px;font-family:var(--font-mono);font-size:0.6rem;letter-spacing:2px;color:rgba(255,255,255,0.15);text-transform:uppercase;">
            Authorized by <span style="color:rgba(255,255,255,0.3);">RiseX Solutions</span>
        </div>
    </footer>

    <!-- Background ambient orbs -->
    <div class="bg-orb bg-orb-1" aria-hidden="true"></div>
    <div class="bg-orb bg-orb-2" aria-hidden="true"></div>
    <div id="cursor-glow" aria-hidden="true"></div>

    <!-- Global Animation Engine -->
    <script>
    (function() {
        /* ── 1. Scroll Reveal ── */
        var revealSelectors = '.reveal, .reveal-slow, .reveal-scale, .reveal-left, .reveal-right, .reveal-fade, .reveal-zoom, .reveal-up, .stagger-children';
        var io = new IntersectionObserver(function(entries) {
            entries.forEach(function(e) {
                if (e.isIntersecting) {
                    e.target.classList.add('active');
                    io.unobserve(e.target);
                }
            });
        }, { threshold: 0.06, rootMargin: '0px 0px -40px 0px' });

        document.querySelectorAll(revealSelectors).forEach(function(el) {
            io.observe(el);
        });

        /* ── 2. Animated Number Counters ── */
        function animateCounter(el) {
            var raw = el.getAttribute('data-count');
            if (!raw) return;
            var suffix = raw.replace(/[\d.,]/g, '');
            var target = parseFloat(raw.replace(/[^\d.]/g, ''));
            var start = 0;
            var dur = 1800;
            var startTime = null;
            function step(ts) {
                if (!startTime) startTime = ts;
                var p = Math.min((ts - startTime) / dur, 1);
                var eased = 1 - Math.pow(1 - p, 4);
                var val = Math.floor(eased * target);
                el.textContent = val.toLocaleString() + suffix;
                if (p < 1) requestAnimationFrame(step);
            }
            requestAnimationFrame(step);
        }
        var counterIO = new IntersectionObserver(function(entries) {
            entries.forEach(function(e) {
                if (e.isIntersecting) {
                    animateCounter(e.target);
                    counterIO.unobserve(e.target);
                }
            });
        }, { threshold: 0.5 });
        document.querySelectorAll('[data-count]').forEach(function(el) { counterIO.observe(el); });

        /* ── 3. Cursor Glow (desktop only) ── */
        var glow = document.getElementById('cursor-glow');
        if (glow && window.matchMedia('(pointer: fine)').matches) {
            var mx = 0, my = 0, cx = 0, cy = 0;
            document.addEventListener('mousemove', function(e) {
                mx = e.clientX; my = e.clientY;
                glow.style.opacity = '1';
            });
            document.addEventListener('mouseleave', function() { glow.style.opacity = '0'; });
            function rafGlow() {
                cx += (mx - cx) * 0.08;
                cy += (my - cy) * 0.08;
                glow.style.left = cx + 'px';
                glow.style.top  = cy + 'px';
                requestAnimationFrame(rafGlow);
            }
            rafGlow();
        }

        /* ── 4. Hover lift for cards ── */
        document.querySelectorAll('.card-hover-lift').forEach(function(el) {
            el.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
                this.style.boxShadow = '0 24px 60px rgba(68,110,46,0.15)';
            });
            el.addEventListener('mouseleave', function() {
                this.style.transform = '';
                this.style.boxShadow = '';
            });
        });

        /* ── 5. Progressive image reveal ── */
        document.querySelectorAll('img[loading="lazy"]').forEach(function(img) {
            img.style.opacity = '0';
            img.style.transition = 'opacity 0.6s ease';
            img.addEventListener('load', function() { this.style.opacity = '1'; });
            if (img.complete) img.style.opacity = '1';
        });

        /* ── 6. Smooth section transitions via color ── */
        var sections = document.querySelectorAll('section');
        sections.forEach(function(s, i) {
            s.style.transition = 'background-color 0.4s ease';
        });
    })();
    </script>

    @stack('scripts')
</body>
</html>
