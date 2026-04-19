<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Vertex') }} Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,900&display=swap" rel="stylesheet" />

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary: #f59e0b;
            --secondary: #1c1917;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .font-black { font-weight: 950; }
        .tracking-tight { letter-spacing: -0.05em; }

        body {
            background-color: #0c0a09 !important;
            color: rgba(255, 255, 255, 0.9);
        }
    </style>
</head>
<body class="font-sans antialiased selection:bg-amber-500 selection:text-white" x-data="{ showingNavigationDropdown: false }">
    <div class="h-screen bg-[#0c0a09] flex overflow-hidden">
        <!-- Mobile Sidebar Overlay -->
        <div x-show="showingNavigationDropdown" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="showingNavigationDropdown = false"
            class="fixed inset-0 bg-black/80 backdrop-blur-md z-[60] md:hidden">
        </div>

        <!-- Sidebar (Desktop & Mobile) -->
        <aside :class="showingNavigationDropdown ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 w-80 bg-[#1c1917] border-r border-white/5 z-[70] md:relative md:translate-x-0 transition-transform duration-500 shadow-2xl flex flex-col">
            
            <!-- Branding Header -->
            <div class="h-28 flex items-center px-10 border-b border-white/5 relative overflow-hidden group">
                <div class="absolute inset-0 bg-gradient-to-r from-amber-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-5 relative z-10 transition-transform active:scale-95 no-underline">
                    <div class="w-12 h-12 bg-[#f59e0b] rounded-2xl flex justify-center items-center shadow-2xl shadow-amber-500/20 transform group-hover:rotate-12 transition-transform duration-500">
                        <span class="text-[#1c1917] font-black text-2xl">V</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-black text-xl tracking-tighter leading-none text-white uppercase">Vertex</span>
                        <span class="text-[0.6rem] font-bold text-[#f59e0b] tracking-[0.4em] uppercase opacity-70 mt-1">Command Hub</span>
                    </div>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 overflow-y-auto py-12 px-8 space-y-2 custom-scrollbar">
                @php
                    $navItems = [
                        ['route' => 'admin.dashboard', 'label' => 'Overview', 'icon' => 'layout-dashboard', 'pattern' => 'admin.dashboard'],
                        ['header' => 'Pillars'],
                        ['route' => 'admin.home.edit', 'label' => 'Home', 'icon' => 'home', 'pattern' => 'admin.home.*'],
                        ['route' => 'admin.pages.index', 'label' => 'About Us', 'icon' => 'file-text', 'pattern' => 'admin.pages.*'],
                        ['route' => 'admin.services.index', 'label' => 'Services', 'icon' => 'briefcase', 'pattern' => 'admin.services.*'],
                        ['route' => 'admin.news.index', 'label' => 'News', 'icon' => 'newspaper', 'pattern' => 'admin.news.*'],
                        ['header' => 'Interactions'],
                        ['route' => 'admin.leads.index', 'label' => 'Enterprise Leads', 'icon' => 'message-square', 'pattern' => 'admin.leads.*'],
                    ];
                @endphp

                @foreach($navItems as $item)
                    @isset($item['header'])
                        <div class="pt-10 text-[0.6rem] font-black text-white/20 uppercase tracking-[0.3em] mb-6 px-4">{{ $item['header'] }}</div>
                    @else
                        @php $isActive = request()->routeIs($item['pattern']); @endphp
                        <a href="{{ route($item['route']) }}" 
                            class="flex items-center gap-5 px-5 py-4 rounded-2xl transition-all duration-300 group no-underline {{ $isActive ? 'bg-[#f59e0b] text-[#1c1917] shadow-2xl shadow-amber-500/20' : 'text-white/40 hover:text-white hover:bg-white/5' }}">
                            @include('components.icons.' . $item['icon'], ['class' => 'w-5 h-5'])
                            <span class="font-bold text-sm tracking-wide">{{ $item['label'] }}</span>
                        </a>
                    @endisset
                @endforeach

                <div class="pt-10 border-t border-white/5">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="flex items-center gap-5 w-full px-5 py-4 rounded-2xl text-white/30 hover:text-red-400 hover:bg-red-400/5 transition-all duration-300 group border-none bg-transparent cursor-pointer">
                            @include('components.icons.log-out', ['class' => 'w-5 h-5 transition-transform group-hover:-translate-x-1'])
                            <span class="font-bold text-sm uppercase tracking-[0.2em]">Logout</span>
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col h-screen overflow-hidden">
            <!-- Strategic Header -->
            <header class="h-28 flex items-center justify-between px-12 bg-[#0c0a09]/50 backdrop-blur-2xl border-b border-white/5 relative z-50">
                <div class="flex items-center gap-8">
                    <button @click="showingNavigationDropdown = !showingNavigationDropdown" class="md:hidden text-white/60 hover:text-[#f59e0b] transition-colors bg-transparent border-none cursor-pointer p-0">
                        @include('components.icons.menu', ['class' => 'w-7 h-7'])
                    </button>
                    
                    <div class="hidden md:flex flex-col">
                        <div class="flex items-center gap-3 text-[0.65rem] font-black text-white/30 uppercase tracking-[0.3em] mb-1">
                            <span>System</span>
                            <span class="text-[#f59e0b]/40">/</span>
                            <span class="text-[#f59e0b] font-bold tracking-normal lowercase">{{ request()->route()->getName() }}</span>
                        </div>
                        <h2 class="text-xl font-black text-white tracking-tight">Deployment Terminal</h2>
                    </div>
                </div>

                <div class="flex items-center gap-8">
                    <!-- Status Indicators -->
                    <div class="hidden lg:flex items-center gap-6 px-6 py-2 bg-white/5 rounded-full border border-white/5">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                            <span class="text-[0.6rem] font-black uppercase text-white/40 tracking-widest">Database Sync</span>
                        </div>
                        <div class="w-px h-3 bg-white/10"></div>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-[#f59e0b] rounded-full"></span>
                            <span class="text-[0.6rem] font-black uppercase text-white/40 tracking-widest">Secure TLS 1.3</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-5">
                        <div class="flex flex-col items-end">
                            <span class="text-white font-black text-sm tracking-tight">{{ Auth::user()->name }}</span>
                            <span class="text-[0.6rem] font-bold text-[#f59e0b] uppercase tracking-[0.2em] opacity-80">Chief Architect</span>
                        </div>
                        <div class="w-14 h-14 bg-gradient-to-br from-white/10 to-white/5 rounded-2xl border border-white/10 shadow-inner flex items-center justify-center text-white/80 font-black overflow-hidden ring-4 ring-[#0c0a09] transition-transform hover:scale-105">
                            @if(Auth::user()->profile_photo_url)
                                <img src="{{ Auth::user()->profile_photo_url }}" class="w-full h-full object-cover" />
                            @else
                                <span class="text-lg">{{ substr(Auth::user()->name, 0, 1) }}{{ substr(Auth::user()->name, strpos(Auth::user()->name, ' ') + 1, 1) }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto px-12 py-16 bg-[#0c0a09] relative z-10 custom-scrollbar">
                <!-- Ambient Glow Backgrounds -->
                <div class="fixed top-0 right-0 w-[600px] h-[600px] bg-[#f59e0b]/5 rounded-full blur-[140px] pointer-events-none -translate-y-1/2 translate-x-1/2"></div>
                <div class="fixed bottom-0 left-0 w-[400px] h-[400px] bg-[#f59e0b]/5 rounded-full blur-[120px] pointer-events-none translate-y-1/2 -translate-x-1/2"></div>
                
                <div class="relative z-10">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
</html>
