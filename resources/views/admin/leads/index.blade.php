@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header Section -->
    <div class="flex justify-between items-end mb-12">
        <div>
            <span class="text-[#f59e0b] font-bold tracking-[0.2em] text-xs uppercase mb-2 block">Enterprise Connections</span>
            <h1 class="text-4xl font-black text-white tracking-tight">Lead Intelligence Hub</h1>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-10 p-6 bg-green-500/10 border border-green-500/20 rounded-2xl text-green-500 font-bold flex items-center gap-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            {{ session('success') }}
        </div>
    @endif

    <!-- Table Container -->
    <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden transition-all">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/50 border-b border-gray-100 uppercase text-[0.65rem] font-black text-gray-400 tracking-[0.15em]">
                    <th class="px-8 py-6">Reception Timestamp</th>
                    <th class="px-8 py-6">Partner Identity</th>
                    <th class="px-8 py-6">Terminal Pointer</th>
                    <th class="px-8 py-6">Engagement Status</th>
                    <th class="px-8 py-6 text-right">Operations</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 text-[#1c1917]">
                @forelse($leads as $lead)
                <tr class="group hover:bg-gray-50/80 transition-all duration-300">
                    <td class="px-8 py-6">
                        <div class="flex flex-col text-left">
                            <span class="font-bold text-[#1c1917] text-base">{{ \Carbon\Carbon::parse($lead->created_at)->format('M j, Y') }}</span>
                            <span class="text-[0.65rem] text-gray-400 font-bold uppercase tracking-widest">{{ \Carbon\Carbon::parse($lead->created_at)->format('H:i') }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex flex-col text-left">
                            <span class="font-bold text-[#1c1917] text-lg group-hover:text-[#f59e0b] transition-colors leading-tight">{{ $lead->name }}</span>
                            <span class="text-sm text-gray-400 font-medium lowercase">{{ $lead->email }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-6 text-left">
                        <span class="bg-gray-100 text-gray-500 px-3 py-1 rounded-full text-xs font-mono font-bold tracking-tight">{{ $lead->phone }}</span>
                    </td>
                    <td class="px-8 py-6">
                        @if($lead->status === 'new')
                            <span class="bg-amber-50 text-amber-600 px-4 py-1.5 rounded-full text-[0.65rem] font-black uppercase tracking-widest">Awaiting Analysis</span>
                        @elseif($lead->status === 'contacted')
                            <span class="bg-blue-50 text-blue-600 px-4 py-1.5 rounded-full text-[0.65rem] font-black uppercase tracking-widest">Active Dialogue</span>
                        @else
                            <span class="bg-gray-50 text-gray-500 px-4 py-1.5 rounded-full text-[0.65rem] font-black uppercase tracking-widest">Archived</span>
                        @endif
                    </td>
                    <td class="px-8 py-6 text-right">
                        <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <a href="{{ route('admin.leads.show', $lead->id) }}" class="p-3 text-[#1c1917] hover:bg-white hover:shadow-md rounded-xl transition-all border border-transparent hover:border-gray-100">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-8 py-20 text-center">
                        <div class="max-w-xs mx-auto">
                            <div class="w-20 h-20 bg-gray-50 rounded-3xl flex items-center justify-center mx-auto mb-6 text-gray-200">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <p class="text-gray-400 font-medium">No incoming enterprise transmissions detected.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
