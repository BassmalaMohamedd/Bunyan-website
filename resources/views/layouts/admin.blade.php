<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Bunyan') }} — Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,700&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * { box-sizing: border-box; }

        :root {
            --green:        #446E2E;
            --green-light:  #86b56a;
            --green-glow:   rgba(68, 110, 46, 0.15);
            --bg-base:      #0a0f09;
            --bg-sidebar:   #0e1a0c;
            --bg-card:      rgba(255,255,255,0.03);
            --border:       rgba(255,255,255,0.06);
            --border-green: rgba(68,110,46,0.35);
            --text-muted:   rgba(255,255,255,0.38);
        }

        html, body { height: 100%; font-family: 'Inter', sans-serif; }

        body {
            background: var(--bg-base);
            color: rgba(255,255,255,0.88);
        }

        /* ── Scrollbar ── */
        .custom-scroll::-webkit-scrollbar { width: 3px; }
        .custom-scroll::-webkit-scrollbar-track { background: transparent; }
        .custom-scroll::-webkit-scrollbar-thumb { background: rgba(68,110,46,0.2); border-radius: 99px; }
        .custom-scroll::-webkit-scrollbar-thumb:hover { background: rgba(68,110,46,0.4); }

        /* ── Shell ── */
        .admin-shell {
            display: flex;
            height: 100vh;
            overflow: hidden;
            background: var(--bg-base);
        }

        /* ─────────────────────────────────────
           SIDEBAR
        ───────────────────────────────────── */
        .admin-sidebar {
            width: 280px;
            flex-shrink: 0;
            background: var(--bg-sidebar);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            position: relative;
            z-index: 70;
            transition: transform 0.4s cubic-bezier(.4,0,.2,1);
        }

        /* Subtle green gradient stripe on left edge */
        .admin-sidebar::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 3px; height: 100%;
            background: linear-gradient(to bottom, transparent, var(--green), transparent);
            opacity: 0.5;
        }

        /* Branding */
        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 28px 28px 24px;
            border-bottom: 1px solid var(--border);
            text-decoration: none;
        }
        .sidebar-brand__mark {
            width: 42px; height: 42px;
            background: var(--green);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 0 24px rgba(68,110,46,0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .sidebar-brand:hover .sidebar-brand__mark {
            transform: rotate(8deg);
            box-shadow: 0 0 36px rgba(68,110,46,0.5);
        }
        .sidebar-brand__mark svg {
            width: 20px; height: 20px;
            fill: none; stroke: #fff;
            stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;
        }
        .sidebar-brand__name { font-weight: 800; font-size: 1.1rem; color: #fff; letter-spacing: 0.5px; }
        .sidebar-brand__sub { font-size: 0.6rem; font-weight: 700; color: var(--green-light); letter-spacing: 3px; text-transform: uppercase; opacity: 0.7; margin-top: 2px; }

        /* Nav */
        .sidebar-nav { flex: 1; overflow-y: auto; padding: 24px 16px; }
        .sidebar-nav::-webkit-scrollbar { display: none; }

        .nav-section-label {
            font-size: 0.58rem;
            font-weight: 800;
            color: rgba(255,255,255,0.18);
            text-transform: uppercase;
            letter-spacing: 3px;
            padding: 20px 12px 8px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            color: var(--text-muted);
            transition: all 0.2s ease;
            margin-bottom: 2px;
        }
        .nav-link svg { width: 17px; height: 17px; flex-shrink: 0; opacity: 0.7; transition: opacity 0.2s; }
        .nav-link:hover { background: rgba(68,110,46,0.08); color: #fff; }
        .nav-link:hover svg { opacity: 1; }

        .nav-link.active {
            background: rgba(68,110,46,0.15);
            color: var(--green-light);
            font-weight: 700;
            border: 1px solid var(--border-green);
        }
        .nav-link.active svg { opacity: 1; color: var(--green-light); }
        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0; top: 50%; transform: translateY(-50%);
            width: 3px; height: 60%;
            background: var(--green);
            border-radius: 0 3px 3px 0;
        }
        .nav-link { position: relative; }

        /* Logout */
        .sidebar-footer {
            padding: 16px;
            border-top: 1px solid var(--border);
        }
        .nav-logout {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            border-radius: 10px;
            font-size: 0.83rem;
            font-weight: 600;
            color: rgba(255,255,255,0.3);
            background: transparent;
            border: none;
            width: 100%;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            transition: all 0.2s;
        }
        .nav-logout:hover { color: #f87171; background: rgba(248,113,113,0.07); }
        .nav-logout svg { width: 16px; height: 16px; flex-shrink: 0; }

        /* ─────────────────────────────────────
           TOPBAR
        ───────────────────────────────────── */
        .admin-topbar {
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 36px;
            border-bottom: 1px solid var(--border);
            background: rgba(10,15,9,0.8);
            backdrop-filter: blur(20px);
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .topbar-breadcrumb {
            display: flex;
            flex-direction: column;
        }
        .topbar-breadcrumb__path {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.65rem;
            font-weight: 700;
            color: rgba(255,255,255,0.25);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 3px;
        }
        .topbar-breadcrumb__path .current { color: var(--green-light); font-weight: 700; text-transform: none; letter-spacing: 0; }
        .topbar-breadcrumb__title { font-size: 1rem; font-weight: 700; color: #fff; letter-spacing: -0.3px; }

        .topbar-right { display: flex; align-items: center; gap: 20px; }

        .status-pill {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 7px 18px;
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 100px;
            font-size: 0.62rem;
            font-weight: 700;
            color: var(--text-muted);
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }
        .status-dot { width: 7px; height: 7px; border-radius: 50%; flex-shrink: 0; }
        .status-dot.green { background: #4ade80; box-shadow: 0 0 6px #4ade80; animation: blink 2s ease infinite; }
        .status-dot.amber { background: var(--green-light); }
        .status-sep { width: 1px; height: 12px; background: var(--border); }
        @keyframes blink { 0%,100%{opacity:1;} 50%{opacity:0.4;} }

        .topbar-user { display: flex; align-items: center; gap: 12px; }
        .topbar-user__info { text-align: right; }
        .topbar-user__name { font-size: 0.88rem; font-weight: 700; color: #fff; }
        .topbar-user__role { font-size: 0.6rem; font-weight: 700; color: var(--green-light); text-transform: uppercase; letter-spacing: 2px; opacity: 0.8; margin-top: 2px; }
        .topbar-user__avatar {
            width: 38px; height: 38px;
            background: linear-gradient(135deg, rgba(68,110,46,0.3), rgba(68,110,46,0.1));
            border: 1px solid var(--border-green);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.9rem;
            font-weight: 800;
            color: var(--green-light);
            overflow: hidden;
        }
        .topbar-user__avatar img { width: 100%; height: 100%; object-fit: cover; }

        /* ─────────────────────────────────────
           MAIN
        ───────────────────────────────────── */
        .admin-main {
            flex: 1;
            overflow-y: auto;
            padding: 40px 44px;
            background: var(--bg-base);
        }
        .admin-main::-webkit-scrollbar { width: 3px; }
        .admin-main::-webkit-scrollbar-thumb { background: rgba(68,110,46,0.2); border-radius: 99px; }

        /* Green ambient glow */
        .ambient-glow-tr {
            position: fixed; top: -100px; right: -100px;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(68,110,46,0.07) 0%, transparent 70%);
            pointer-events: none; z-index: 0;
        }
        .ambient-glow-bl {
            position: fixed; bottom: -100px; left: 200px;
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(68,110,46,0.05) 0%, transparent 70%);
            pointer-events: none; z-index: 0;
        }

        .content-wrap { position: relative; z-index: 10; }

        /* ─── Mobile sidebar overlay ─── */
        @media(max-width: 1023px) {
            .admin-sidebar { position: fixed; inset-y: 0; left: 0; transform: translateX(-100%); }
            .admin-sidebar.open { transform: translateX(0); }
            .sidebar-backdrop { display: block; position: fixed; inset: 0; background: rgba(0,0,0,0.7); backdrop-filter: blur(4px); z-index: 60; }
        }
        .sidebar-backdrop { display: none; }
    </style>
</head>
<body x-data="{ sidebarOpen: false }">

    <!-- Mobile Backdrop -->
    <div class="sidebar-backdrop"
         x-show="sidebarOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false"></div>

    <div class="admin-shell">

        <!-- ── SIDEBAR ── -->
        <aside class="admin-sidebar" :class="sidebarOpen ? 'open' : ''">

            <!-- Logo -->
            <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
                <div class="sidebar-brand__mark">
                    <svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                </div>
                <div>
                    <div class="sidebar-brand__name">BUNYAN</div>
                    <div class="sidebar-brand__sub">Admin Panel</div>
                </div>
            </a>

            <!-- Nav -->
            <nav class="sidebar-nav">
                @php
                    $navItems = [
                        ['route' => 'admin.dashboard', 'label' => 'Overview',          'icon' => 'layout-dashboard', 'pattern' => 'admin.dashboard'],
                        ['header' => 'Content'],
                        ['route' => 'admin.home.edit',       'label' => 'Home Page',    'icon' => 'home',         'pattern' => 'admin.home.*'],
                        ['route' => 'admin.pages.index',     'label' => 'About Us',     'icon' => 'file-text',    'pattern' => 'admin.pages.*'],
                        ['route' => 'admin.services.index',  'label' => 'Services',     'icon' => 'briefcase',    'pattern' => 'admin.services.*'],
                        ['route' => 'admin.news.index',      'label' => 'News',         'icon' => 'newspaper',    'pattern' => 'admin.news.*'],
                        ['header' => 'Leads'],
                        ['route' => 'admin.leads.index',     'label' => 'Inquiries',    'icon' => 'message-square','pattern' => 'admin.leads.*'],
                    ];
                @endphp

                @foreach($navItems as $item)
                    @isset($item['header'])
                        <div class="nav-section-label">{{ $item['header'] }}</div>
                    @else
                        @php $isActive = request()->routeIs($item['pattern']); @endphp
                        <a href="{{ route($item['route']) }}"
                           class="nav-link {{ $isActive ? 'active' : '' }}">
                            @include('components.icons.' . $item['icon'], ['class' => 'w-[17px] h-[17px]'])
                            {{ $item['label'] }}
                        </a>
                    @endisset
                @endforeach
            </nav>

            <!-- Footer / Logout -->
            <div class="sidebar-footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-logout">
                        @include('components.icons.log-out', ['class' => 'w-4 h-4'])
                        Sign Out
                    </button>
                </form>
            </div>

        </aside>

        <!-- ── CONTENT COLUMN ── -->
        <div style="flex:1; display:flex; flex-direction:column; overflow:hidden; min-width:0;">

            <!-- Topbar -->
            <header class="admin-topbar">
                <div style="display:flex; align-items:center; gap:20px;">
                    <!-- Hamburger (mobile) -->
                    <button @click="sidebarOpen = !sidebarOpen"
                            style="display:none; background:none; border:none; color:rgba(255,255,255,0.5); cursor:pointer; padding:4px;"
                            class="lg-hidden">
                        @include('components.icons.menu', ['class' => 'w-6 h-6'])
                    </button>

                    <div class="topbar-breadcrumb">
                        <div class="topbar-breadcrumb__path">
                            <span>Admin</span>
                            <span>/</span>
                            <span class="current">{{ request()->route()->getName() }}</span>
                        </div>
                        <div class="topbar-breadcrumb__title">Command Center</div>
                    </div>
                </div>

                <div class="topbar-right">
                    <!-- Status -->
                    <div class="status-pill" style="display:none;" class="lg-flex">
                        <span class="status-dot green"></span>
                        <span>DB Sync</span>
                        <span class="status-sep"></span>
                        <span class="status-dot amber"></span>
                        <span>TLS 1.3</span>
                    </div>

                    <!-- User -->
                    <div class="topbar-user">
                        <div class="topbar-user__info">
                            <div class="topbar-user__name">{{ Auth::user()->name }}</div>
                            <div class="topbar-user__role">Administrator</div>
                        </div>
                        <div class="topbar-user__avatar">
                            @if(Auth::user()->profile_photo_url)
                                <img src="{{ Auth::user()->profile_photo_url }}" alt="">
                            @else
                                {{ substr(Auth::user()->name, 0, 1) }}{{ substr(Auth::user()->name, strpos(Auth::user()->name, ' ') + 1, 1) }}
                            @endif
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main -->
            <main class="admin-main">
                <div class="ambient-glow-tr"></div>
                <div class="ambient-glow-bl"></div>
                <div class="content-wrap">
                    @yield('content')
                </div>
            </main>

        </div>
    </div>

</body>
</html>
