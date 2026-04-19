@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-12">
        <h1 class="text-4xl font-black text-white tracking-tight mb-2 uppercase">Home Hub</h1>
        <p class="text-gray-400 font-medium">Coordinate the platform's primary narrative and strategic metrics.</p>
    </div>

    @if(session('success'))
        <div class="mb-8 p-6 bg-green-500/10 border border-green-500/20 rounded-2xl text-green-500 font-bold flex items-center gap-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.home.update') }}" method="POST" class="space-y-8">
        @csrf
        <!-- Hero Section Management -->
        <div class="bg-white rounded-[2.5rem] p-10 shadow-xl border border-gray-100">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-10 h-10 bg-[#f59e0b]/10 rounded-xl flex items-center justify-center text-[#f59e0b]">
                    @include('components.icons.home', ['class' => 'w-5 h-5'])
                </div>
                <h2 class="text-xl font-black text-[#1c1917] uppercase tracking-wider">Hero Component</h2>
            </div>

            <div class="space-y-6">
                <div>
                    <label class="block text-[0.65rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">Primary Narrative (Title)</label>
                    <input name="home_hero_title" type="text" value="{{ old('home_hero_title', $settings['home_hero_title'] ?? '') }}"
                        class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 text-[#1c1917] font-bold focus:ring-2 focus:ring-[#f59e0b]/20 transition-all">
                    @error('home_hero_title') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-[0.65rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">Supporting Narrative (Subtitle)</label>
                    <textarea name="home_hero_subtitle" rows="3"
                        class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 text-[#1c1917] font-bold focus:ring-2 focus:ring-[#f59e0b]/20 transition-all resize-none">{{ old('home_hero_subtitle', $settings['home_hero_subtitle'] ?? '') }}</textarea>
                    @error('home_hero_subtitle') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <!-- Strategic metrics Management -->
        <div class="bg-[#1c1917] rounded-[2.5rem] p-10 shadow-xl border border-white/5">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-10 h-10 bg-[#f59e0b]/20 rounded-xl flex items-center justify-center text-[#f59e0b]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                </div>
                <h2 class="text-xl font-black text-white uppercase tracking-wider">Strategic Metrics</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-[0.65rem] font-black text-gray-500 uppercase tracking-[0.2em] mb-3">Years Experience</label>
                    <input name="home_stats_years" type="text" value="{{ old('home_stats_years', $settings['home_stats_years'] ?? '') }}"
                        class="w-full bg-white/5 border-none rounded-2xl px-6 py-4 text-white font-bold focus:ring-2 focus:ring-[#f59e0b]/40 transition-all">
                    @error('home_stats_years') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-[0.65rem] font-black text-gray-500 uppercase tracking-[0.2em] mb-3">Assets Valued</label>
                    <input name="home_stats_assets" type="text" value="{{ old('home_stats_assets', $settings['home_stats_assets'] ?? '') }}"
                        class="w-full bg-white/5 border-none rounded-2xl px-6 py-4 text-white font-bold focus:ring-2 focus:ring-[#f59e0b]/40 transition-all">
                    @error('home_stats_assets') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-[0.65rem] font-black text-gray-500 uppercase tracking-[0.2em] mb-3">Completed Projects</label>
                    <input name="home_stats_projects" type="text" value="{{ old('home_stats_projects', $settings['home_stats_projects'] ?? '') }}"
                        class="w-full bg-white/5 border-none rounded-2xl px-6 py-4 text-white font-bold focus:ring-2 focus:ring-[#f59e0b]/40 transition-all">
                    @error('home_stats_projects') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="flex justify-end pt-4">
            <button type="submit"
                class="bg-[#f59e0b] hover:bg-[#b88d4d] text-[#0c0a09] px-12 py-5 rounded-2xl font-black transition-all shadow-xl shadow-[#f59e0b]/20 flex items-center gap-3 active:scale-95">
                <span>Apply Transformation</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </button>
        </div>
    </form>
</div>
@endsection
