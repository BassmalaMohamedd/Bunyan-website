<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Kinda Solutions | Specialized Innovations')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Tajawal:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/premium.css') }}">
    <style>
        html, body {
            background-color: #0a192f !important;
            margin: 0;
            padding: 0;
        }
        :root {
            --font-heading: 'Outfit', sans-serif;
            --font-body: 'Plus Jakarta Sans', sans-serif;
        }
        body {
            font-family: var(--font-body);
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-heading);
        }
        .nav-logo {
            font-family: var(--font-heading);
            font-size: 1.8rem;
            font-weight: 900;
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            letter-spacing: -1px;
        }
        .nav-logo .k-bracket {
            color: var(--primary);
            font-size: 2.2rem;
            line-height: 1;
        }
        .nav-fixed {
            background: transparent;
            backdrop-filter: blur(0px);
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            border-bottom: 1px solid rgba(255,255,255,0);
        }
        .nav-scrolled {
            background: rgba(10, 25, 47, 0.97);
            backdrop-filter: blur(20px);
            padding: 15px 0 !important;
            border-bottom: 1px solid rgba(203, 163, 101, 0.15);
            box-shadow: 0 4px 40px rgba(0,0,0,0.25);
        }
        .nav-link {
            color: #fff;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            opacity: 0.7;
            transition: all 0.3s ease;
            position: relative;
        }
        .nav-link:hover, .nav-link.active {
            opacity: 1;
            color: var(--primary);
        }
        
        /* Advanced Interaction Elements */
        .scan-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 5;
            pointer-events: none;
            overflow: hidden;
        }

        .scan-line {
            width: 100%;
            height: 100px;
            background: linear-gradient(to bottom, transparent, rgba(203, 163, 101, 0.15), transparent);
            position: absolute;
            top: -100px;
            animation: scan 8s linear infinite;
        }

        @keyframes scan {
            0% { top: -100px; opacity: 0; }
            5% { opacity: 1; }
            95% { opacity: 1; }
            100% { top: 100%; opacity: 0; }
        }

        .video-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            background-size: cover;
            background-position: center;
        }

        .footer-heading {
            color: #fff;
            font-weight: 800;
            margin-bottom: 30px;
            font-size: 1.1rem;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .footer-link {
            color: rgba(255,255,255,0.5);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .footer-link:hover {
            color: var(--primary);
            padding-left: 5px;
        }
    </style>
    @stack('styles')
</head>
<body>
    <header class="nav-fixed {{ !request()->is('/') ? 'nav-scrolled' : 'nav-glass' }}" id="main-nav" style="position: fixed; top: 0; left: 0; width: 100%; z-index: 1000; padding: 25px 0;">
        <div style="width: 100%; padding: 0 60px; display: flex; justify-content: space-between; align-items: center;">
            <a href="/" class="nav-logo">
                <span class="k-bracket">|</span>ARKAN<span style="font-weight: 300; opacity: 0.6;">REAL ESTATE</span>
            </a>
            
            <nav style="display: flex; gap: 50px; justify-content: center; align-items: center;">
                <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                <a href="/about" class="nav-link {{ request()->is('about') ? 'active' : '' }}">About Us</a>
                <a href="/services" class="nav-link {{ request()->is('services*') ? 'active' : '' }}">Services</a>
                <a href="/news" class="nav-link {{ request()->is('news*') ? 'active' : '' }}">News</a>
            </nav>

            <div style="display: flex; gap: 20px; align-items: center; justify-content: flex-end;">
                <a href="{{ url('/#contact') }}" class="btn-gold" style="padding: 12px 24px; font-size: 0.75rem; border-radius: 4px;">CONTACT US</a>
                @auth
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}" class="nav-link" style="color: var(--primary); font-size: 0.75rem;">COMMAND CENTER</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                        @csrf
                        <button type="submit" class="nav-link" style="background: none; border: none; cursor: pointer; font-size: 0.75rem; opacity: 0.5;">LOGOUT</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-link" style="font-size: 0.75rem;">LOGIN</a>
                    <a href="{{ route('register') }}" class="nav-link" style="font-size: 0.75rem; border: 1px solid rgba(255,255,255,0.2); padding: 8px 16px; border-radius: 4px;">REGISTER</a>
                @endauth
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer style="background: #0a192f; color: #fff; padding: 80px 60px; border-top: 1px solid rgba(203,163,101,0.1);">
        <div style="width: 100%;">
            <div style="display: grid; grid-template-columns: 1.5fr 1fr 1fr 1.2fr; gap: 100px; margin-bottom: 60px;">
                <div>
                    <a href="/" class="nav-logo" style="margin-bottom: 35px; scale: 0.9; margin-left: -15px;">
                        <span class="k-bracket">|</span>ARKAN<span style="font-weight: 300; opacity: 0.6;">REAL ESTATE</span>
                    </a>
                    <p style="color: rgba(255,255,255,0.5); line-height: 2; font-size: 0.95rem; max-width: 320px;">
                        The center of innovation and excellence in real estate specialized services, driving digital transformation across high-value sectors since 2009.
                    </p>
                </div>
                <div>
                    <h4 class="footer-heading">Service Suite</h4>
                    <ul style="list-style: none; padding: 0; display: flex; flex-direction: column; gap: 15px;">
                        <li><a href="/services" class="footer-link">PropMate CMS</a></li>
                        <li><a href="/services" class="footer-link">ValueMate Appraisal</a></li>
                        <li><a href="/services" class="footer-link">AccuMate Financials</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="footer-heading">Navigational</h4>
                    <ul style="list-style: none; padding: 0; display: flex; flex-direction: column; gap: 15px;">
                        <li><a href="/about" class="footer-link">About Us</a></li>
                        <li><a href="/news" class="footer-link">Market News</a></li>
                        <li><a href="#" class="footer-link">Careers</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="footer-heading">HQ Connectivity</h4>
                    <ul style="list-style: none; padding: 0; display: flex; flex-direction: column; gap: 20px;">
                        <li style="display: flex; gap: 15px;">
                            <span style="color: var(--primary); font-weight: 900;">A.</span>
                            <span style="color: rgba(255,255,255,0.5); font-size: 0.9rem;">King Fahd Branch Rd, Al Mohammadiyah, Riyadh 12363</span>
                        </li>
                        <li style="display: flex; gap: 15px;">
                            <span style="color: var(--primary); font-weight: 900;">T.</span>
                            <span style="color: rgba(255,255,255,0.5); font-size: 0.9rem;">+966 54 113 1137</span>
                        </li>
                        <li style="display: flex; gap: 15px;">
                            <span style="color: var(--primary); font-weight: 900;">E.</span>
                            <span style="color: rgba(255,255,255,0.5); font-size: 0.9rem;">info@arkan-realestate.sa</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div style="padding-top: 50px; border-top: 1px solid rgba(255,255,255,0.05); display: flex; justify-content: space-between; align-items: center; color: rgba(255,255,255,0.3); font-size: 0.85rem;">
                <p>&copy; 2026 Arkan Real Estate. All Rights Reserved. Specialized innovations for elite enterprises.</p>
                <div style="display: flex; gap: 30px;">
                    <a href="#" class="footer-link" style="font-size: 0.8rem;">Terms</a>
                    <a href="#" class="footer-link" style="font-size: 0.8rem;">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>


    <!-- Scripts -->
    <script src="{{ asset('js/animations.js') }}"></script>
    @stack('scripts')
</body>
</html>

