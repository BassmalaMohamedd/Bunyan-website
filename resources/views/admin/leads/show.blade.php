@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-12">
        <a href="{{ route('admin.leads.index') }}" class="text-gray-400 hover:text-[#f59e0b] transition-colors flex items-center gap-2 mb-6 font-bold uppercase text-xs tracking-widest no-underline">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            Back to Registry
        </a>
        <h1 class="text-4xl font-black text-white tracking-tight leading-tight">Lead Intelligence <br><span class="text-[#f59e0b] italic font-serif tracking-normal">Report</span></h1>
        <p class="text-gray-400 mt-2 font-medium">Detailed analysis of the incoming enterprise transmission.</p>
    </div>

    <div class="space-y-8">
        <!-- Partner Identity Card -->
        <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 p-10 flex flex-col md:flex-row justify-between gap-10">
            <div class="space-y-6">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-[#1c1917] rounded-2xl flex items-center justify-center text-white text-2xl font-black">
                        {{ mb_substr($lead->name, 0, 1) }}
                    </div>
                    <div>
                        <h2 class="text-2xl font-black text-[#1c1917] leading-none mb-2">{{ $lead->name }}</h2>
                        <span class="text-gray-400 font-medium">Strategic Partner</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 pt-4 border-t border-gray-50">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gray-50 rounded-xl flex items-center justify-center text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <span class="font-bold text-[#1c1917]">{{ $lead->email }}</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gray-50 rounded-xl flex items-center justify-center text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <span class="font-bold text-[#1c1917]">{{ $lead->phone }}</span>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-72 space-y-6">
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                    <span class="text-[0.6rem] font-black text-gray-400 uppercase tracking-widest block mb-1">Transmission Segment</span>
                    <span class="text-sm font-black text-[#1c1917] uppercase tracking-tight">{{ $lead->service->title['en'] ?? 'General Consultation' }}</span>
                </div>
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                    <span class="text-[0.6rem] font-black text-gray-400 uppercase tracking-widest block mb-1">Reception ID</span>
                    <span class="text-sm font-mono font-bold text-[#1c1917]">#{{ str_pad($lead->id, 6, '0', STR_PAD_LEFT) }}</span>
                </div>
            </div>
        </div>

        <!-- Transmission Content -->
        <div class="bg-[#1c1917] rounded-[2.5rem] p-12 border border-white/5 shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-40 h-40 bg-[#f59e0b]/5 rounded-full blur-3xl"></div>
            <div class="relative z-10">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-10 h-10 bg-[#f59e0b]/20 rounded-xl flex items-center justify-center text-[#f59e0b]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                    </div>
                    <h2 class="text-xl font-black text-white uppercase tracking-wider">Strategic Narrative</h2>
                </div>
                <div class="text-white/80 leading-relaxed text-xl font-medium italic">
                    "{{ $lead->message }}"
                </div>
            </div>
        </div>

        <!-- Status Synchronization -->
        <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 p-10 flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="flex flex-col">
                <span class="text-sm font-black text-[#1c1917] uppercase tracking-widest">Engagement Status</span>
                <span class="text-xs text-gray-400 font-medium lowercase">Current Phase: {{ str_replace('_', ' ', $lead->status) }}</span>
            </div>
            
            <form action="{{ route('admin.leads.update', $lead->id) }}" method="POST" class="flex gap-4 items-center">
                @csrf
                @method('PATCH')
                <select name="status" class="bg-gray-50 border-transparent focus:bg-white focus:border-[#f59e0b] focus:ring-0 rounded-2xl py-4 px-6 text-[#1c1917] font-bold transition-all min-w-[200px]">
                    <option value="new" {{ $lead->status === 'new' ? 'selected' : '' }}>Awaiting Analysis</option>
                    <option value="in_progress" {{ $lead->status === 'in_progress' ? 'selected' : '' }}>Active Dialogue</option>
                    <option value="completed" {{ $lead->status === 'completed' ? 'selected' : '' }}>Mission Accomplished</option>
                    <option value="cancelled" {{ $lead->status === 'cancelled' ? 'selected' : '' }}>Archived / Terminated</option>
                </select>
                <button type="submit" class="bg-[#f59e0b] hover:bg-[#b88d4d] text-[#1c1917] px-8 py-4 rounded-xl font-black transition-all active:scale-95 shadow-lg shadow-amber-500/20">
                    Synchronize
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
