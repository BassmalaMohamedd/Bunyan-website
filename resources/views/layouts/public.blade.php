<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Vertex | Redefining Specialized Innovations')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,800;0,900;1,700;1,800&family=DM+Mono:ital,wght@0,300;0,400;0,500;1,300&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/premium.css') }}">
    <style>
        html, body {
            background-color: #1c1917 !important;
            margin: 0;
            padding: 0;
        }
        :root {
            --font-heading: 'Playfair Display', Georgia, serif;
            --font-mono:    'DM Mono', 'Courier New', monospace;
            --font-body:    'Inter', sans-serif;
        }
        body    { font-family: var(--font-body); }
        h1,h2,h3,h4,h5,h6 { font-family: var(--font-heading); }

        /* ── Logo ── */
        .nav-logo {
            font-family: var(--font-heading);
            font-size: 1.5rem;
            font-weight: 900;
            font-style: italic;
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            letter-spacing: 0;
        }
        .nav-logo .logo-icon {
            color: #f59e0b;
            font-size: 1.3rem;
            line-height: 1;
            font-style: normal;
        }

        /* ── Nav ── */
        .nav-fixed {
            background: transparent;
            backdrop-filter: blur(0px);
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            border-bottom: 1px solid rgba(255,255,255,0);
        }
        .nav-scrolled {
            background: rgba(28, 25, 23, 0.97);
            backdrop-filter: blur(20px);
            padding: 15px 0 !important;
            border-bottom: 1px solid rgba(245, 158, 11, 0.15);
            box-shadow: 0 4px 40px rgba(0,0,0,0.3);
        }
        .nav-link {
            color: #fff;
            text-decoration: none;
            font-family: var(--font-mono);
            font-size: 0.72rem;
            font-weight: 500;
            letter-spacing: 2px;
            text-transform: uppercase;
            opacity: 0.65;
            transition: all 0.3s ease;
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px; left: 0;
            width: 0; height: 1px;
            background: #f59e0b;
            transition: width 0.3s ease;
        }
        .nav-link:hover, .nav-link.active {
            opacity: 1;
            color: #f59e0b;
        }
        .nav-link:hover::after, .nav-link.active::after {
            width: 100%;
        }

        /* ── Scan sweep ── */
        .scan-overlay {
            position: absolute; top: 0; left: 0;
            width: 100%; height: 100%;
            z-index: 5; pointer-events: none; overflow: hidden;
        }
        .scan-line {
            width: 100%; height: 120px;
            background: linear-gradient(to bottom, transparent, rgba(245,158,11,0.08), transparent);
            position: absolute; top: -120px;
            animation: scan 8s linear infinite;
        }
        @keyframes scan {
            0%   { top: -120px; opacity: 0; }
            5%   { opacity: 1; }
            95%  { opacity: 1; }
            100% { top: 100%; opacity: 0; }
        }

        .video-container {
            position: absolute; top: 0; left: 0;
            width: 100%; height: 100%;
            z-index: 1;
            background-size: cover;
            background-position: center;
        }

        /* ── Footer ── */
        .footer-heading {
            color: #f59e0b;
            font-family: var(--font-mono);
            font-weight: 700;
            margin-bottom: 28px;
            font-size: 0.7rem;
            letter-spacing: 4px;
            text-transform: uppercase;
        }
        .footer-link {
            color: rgba(255,255,255,0.4);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        .footer-link:hover {
            color: #f59e0b;
            padding-left: 5px;
        }
    </style>
    @stack('styles')
</head>
<body>
    <header class="nav-fixed {{ !request()->is('/') ? 'nav-scrolled' : 'nav-glass' }}" id="main-nav" style="position: fixed; top: 0; left: 0; width: 100%; z-index: 1000; padding: 28px 0;">
        <div style="width: 100%; padding: 0 60px; display: flex; justify-content: space-between; align-items: center;">
            <a href="/" class="nav-logo" style="font-style:normal;letter-spacing:1px;">
                <span class="logo-icon" style="font-style:normal;">|</span>
                VERTEX
            </a>

            <nav style="display: flex; gap: 50px; justify-content: center; align-items: center;">
                <a href="/"         class="nav-link {{ request()->is('/')         ? 'active' : '' }}">Home</a>
                <a href="/about"    class="nav-link {{ request()->is('about')     ? 'active' : '' }}">About Us</a>
                <a href="/services" class="nav-link {{ request()->is('services*') ? 'active' : '' }}">Services</a>
                <a href="/news"     class="nav-link {{ request()->is('news*')     ? 'active' : '' }}">News</a>
            </nav>

            <div style="display: flex; gap: 20px; align-items: center; justify-content: flex-end;">
                <a href="{{ url('/#contact') }}" class="btn-gold" style="padding: 12px 28px; font-size: 0.72rem; border-radius: 2px; letter-spacing: 3px;">CONTACT US</a>
                @auth
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}" class="nav-link" style="color: #f59e0b; font-size: 0.72rem;">COMMAND CENTER</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                        @csrf
                        <button type="submit" class="nav-link" style="background: none; border: none; cursor: pointer; font-size: 0.72rem; opacity: 0.45;">LOGOUT</button>
                    </form>
                @else
                    <a href="{{ route('login') }}"    class="nav-link" style="font-size: 0.72rem;">LOGIN</a>
                    <a href="{{ route('register') }}" class="nav-link" style="font-size: 0.72rem; border: 1px solid rgba(255,255,255,0.18); padding: 8px 16px; border-radius: 2px;">REGISTER</a>
                @endauth
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer style="background: #0c0a09; color: #fff; padding: 90px 60px; border-top: 1px solid rgba(245,158,11,0.08);">
        <div style="width: 100%;">
            <div style="display: grid; grid-template-columns: 1.5fr 1fr 1fr 1.2fr; gap: 100px; margin-bottom: 60px;">
                <div>
                    <a href="/" class="nav-logo" style="margin-bottom: 32px; display: inline-flex; font-style:normal; letter-spacing:1px;">
                        <span class="logo-icon" style="margin-right:10px;font-style:normal;">|</span>
                        VERTEX
                    </a>
                    <p style="color: rgba(255,255,255,0.38); line-height: 2; font-size: 1rem; max-width: 320px; margin-top: 20px; font-style: italic;">
                        The center of innovation and excellence in specialized services, driving digital transformation across high-value sectors since 2009.
                    </p>
                </div>
                <div>
                    <h4 class="footer-heading">Service Suite</h4>
                    <ul style="list-style: none; padding: 0; display: flex; flex-direction: column; gap: 14px;">
                        <li><a href="/services" class="footer-link">PropMate CMS</a></li>
                        <li><a href="/services" class="footer-link">ValueMate Appraisal</a></li>
                        <li><a href="/services" class="footer-link">AccuMate Financials</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="footer-heading">Navigate</h4>
                    <ul style="list-style: none; padding: 0; display: flex; flex-direction: column; gap: 14px;">
                        <li><a href="/about" class="footer-link">About Us</a></li>
                        <li><a href="/news"  class="footer-link">Market News</a></li>
                        <li><a href="#"      class="footer-link">Careers</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="footer-heading">Reach Us</h4>
                    <ul style="list-style: none; padding: 0; display: flex; flex-direction: column; gap: 20px;">
                        <li style="display: flex; gap: 15px;">
                            <span style="color: #f59e0b; font-family: var(--font-mono); font-weight: 700; font-size: 0.7rem; margin-top: 3px;">HQ.</span>
                            <span style="color: rgba(255,255,255,0.4); font-size: 0.9rem;">King Fahd Branch Rd, Al Mohammadiyah, Riyadh 12363</span>
                        </li>
                        <li style="display: flex; gap: 15px;">
                            <span style="color: #f59e0b; font-family: var(--font-mono); font-weight: 700; font-size: 0.7rem; margin-top: 3px;">Ph.</span>
                            <span style="color: rgba(255,255,255,0.4); font-size: 0.9rem;">+966 54 113 1137</span>
                        </li>
                        <li style="display: flex; gap: 15px;">
                            <span style="color: #f59e0b; font-family: var(--font-mono); font-weight: 700; font-size: 0.7rem; margin-top: 3px;">Em.</span>
                            <span style="color: rgba(255,255,255,0.4); font-size: 0.9rem;">info@vertex-enterprise.sa</span>

                        </li>
                    </ul>
                </div>
            </div>
            <div style="padding-top: 48px; border-top: 1px solid rgba(255,255,255,0.05); display: flex; justify-content: space-between; align-items: center; color: rgba(255,255,255,0.25); font-size: 0.78rem; font-family: var(--font-mono);">
                <p>&copy; 2026 Vertex. All Rights Reserved. Specialized innovations for elite enterprises.</p>
                <div style="display: flex; gap: 30px;">
                    <a href="#" class="footer-link" style="font-size: 0.75rem;">Privacy Policy</a>
                    <a href="#" class="footer-link" style="font-size: 0.75rem;">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/animations.js') }}"></script>
    @stack('scripts')
</body>
</html>
