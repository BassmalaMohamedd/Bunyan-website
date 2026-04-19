@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto space-y-12">
    <!-- Header Status -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-12">
        <div class="animate-in fade-in slide-in-from-left duration-700">
            <div class="flex items-center gap-3 mb-6">
                <span class="px-3 py-1 bg-[#f59e0b]/10 border border-[#f59e0b]/20 rounded-full text-[#f59e0b] font-black text-[0.6rem] uppercase tracking-[0.2em]">Operational Status: Optimal</span>
            </div>
            <h1 class="text-6xl font-black text-white tracking-tighter leading-none mb-4">
                Greetings, <br>
                <span class="text-[#f59e0b] italic font-serif tracking-normal">{{ Auth::user()->name }}</span>
            </h1>
            <p class="text-white/70 font-medium max-w-xl leading-relaxed text-lg italic">
                The Vertex digital infrastructure is synchronized. You have absolute command over market intelligence and specialized service modules in the Kingdom of Saudi Arabia.
            </p>
        </div>

        <div class="flex items-center gap-4 animate-in fade-in slide-in-from-right duration-700">
            <div class="p-6 bg-white/5 backdrop-blur-xl border border-white/5 rounded-[2rem] text-right">
                <div class="text-[0.6rem] font-black text-white/30 uppercase tracking-[0.3em] mb-1">Local Time</div>
                <div class="text-2xl font-black text-white tracking-widest" x-data="{ time: '' }" x-init="time = new Date().toLocaleTimeString('en-US', { hour12: false, hour: '2-digit', minute: '2-digit' }); setInterval(() => time = new Date().toLocaleTimeString('en-US', { hour12: false, hour: '2-digit', minute: '2-digit' }), 1000)">
                    <span x-text="time"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Strategic Intelligence Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @php
            $stats_items = [
                ['label' => 'Market News', 'count' => $stats['newsCount'], 'route' => 'admin.news.index', 'icon' => 'newspaper', 'desc' => 'Kingdom-wide insights & publications'],
                ['label' => 'Service Suite', 'count' => $stats['servicesCount'], 'route' => 'admin.services.index', 'icon' => 'briefcase', 'desc' => 'Specialized architectural assets'],
                ['label' => 'Enterprise Leads', 'count' => $stats['leadsCount'], 'route' => 'admin.leads.index', 'icon' => 'message-square', 'desc' => 'Strategic inbound transmissions']
            ];
        @endphp

        @foreach($stats_items as $stat)
        <div class="bg-white/[0.03] backdrop-blur-3xl border border-white/5 p-10 rounded-[2.5rem] group hover:border-[#f59e0b]/40 transition-all duration-500 relative overflow-hidden">
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-[#f59e0b]/5 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
            
            <div class="flex justify-between items-start mb-8">
                <div class="w-14 h-14 bg-white/5 rounded-2xl flex items-center justify-center border border-white/5 group-hover:bg-[#f59e0b] group-hover:text-[#1c1917] transition-all overflow-hidden relative">
                    @include('components.icons.' . $stat['icon'], ['class' => 'w-6 h-6 relative z-10'])
                </div>
                <span class="text-4xl font-black text-white/5 group-hover:text-[#f59e0b] transition-colors">{{ $stat['count'] }}</span>
            </div>

            <h3 class="text-2xl font-black text-white mb-3 tracking-tight">{{ $stat['label'] }}</h3>
            <p class="text-white/60 text-sm leading-relaxed mb-8">{{ $stat['desc'] }}</p>

            <a href="{{ route($stat['route']) }}" class="inline-flex items-center gap-2 text-[#f59e0b] font-black text-[0.65rem] uppercase tracking-[0.2em] group-hover:gap-4 transition-all no-underline">
                Access Portal
                @include('components.icons.arrow-right', ['class' => 'w-4 h-4'])
            </a>
        </div>
        @endforeach
    </div>

    <!-- Management Hub -->
    <div class="bg-gradient-to-br from-[#f59e0b]/20 to-transparent border border-white/10 p-16 rounded-[3.5rem] relative overflow-hidden group">
        <div class="absolute inset-0 bg-[#1c1917]/40 backdrop-blur-sm -z-10"></div>
        <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-[#f59e0b]/10 rounded-full blur-[100px]"></div>

        <div class="flex flex-col lg:flex-row items-center justify-between gap-16 relative z-10">
            <div class="max-w-2xl space-y-8">
                <div>
                    <span class="text-[#f59e0b] font-black tracking-[0.4em] text-[0.7rem] uppercase block mb-4">Core Synchronization</span>
                    <h2 class="text-6xl font-black text-white tracking-tighter leading-none">Universal Narrative<br>Architecture.</h2>
                </div>
                <p class="text-white/70 font-medium leading-relaxed text-xl max-w-xl italic">
                    Absolute command over the Kingdom of Saudi Arabia's skeletal infrastructure. Update core narratives and Vision 2030 alignments.
                </p>
                <div class="flex flex-wrap gap-6">
                    <a href="{{ route('admin.home.edit') }}" class="bg-[#f59e0b] hover:scale-105 active:scale-95 text-[#1c1917] px-10 py-5 rounded-2xl font-black transition-all shadow-2xl shadow-amber-500/20 flex items-center gap-3 no-underline text-sm uppercase tracking-widest">
                        Master Home
                        @include('components.icons.arrow-up-right', ['class' => 'w-5 h-5'])
                    </a>
                    <a href="{{ route('admin.pages.index') }}" class="bg-white/5 hover:bg-white/10 hover:scale-105 active:scale-95 text-white px-10 py-5 rounded-2xl font-black transition-all flex items-center gap-3 no-underline text-sm uppercase tracking-widest border border-white/10 backdrop-blur-xl">
                        About Narrative
                        @include('components.icons.arrow-up-right', ['class' => 'w-5 h-5'])
                    </a>
                </div>
            </div>

            <div class="w-full lg:w-96 aspect-square hidden lg:flex items-center justify-center relative">
                <div class="absolute inset-0 bg-[#f59e0b]/20 rounded-full blur-3xl animate-pulse"></div>
                <div class="w-full h-full bg-white/5 rounded-[4rem] border border-white/10 flex items-center justify-center p-20 backdrop-blur-3xl relative z-20 group-hover:rotate-6 transition-transform duration-1000">
                    @include('components.icons.shield-check', ['class' => 'w-full h-full text-[#f59e0b]/40 group-hover:text-[#f59e0b] transition-colors duration-700'])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
