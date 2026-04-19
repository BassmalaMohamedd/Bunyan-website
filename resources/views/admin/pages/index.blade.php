@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-end mb-12">
        <div>
            <span class="text-[#f59e0b] font-bold tracking-[0.2em] text-xs uppercase mb-2 block">CMS Infrastructure</span>
            <h1 class="text-4xl font-black text-white tracking-tight">Dynamic Content Hub</h1>
        </div>
        <a href="{{ route('admin.pages.create') }}" class="bg-[#f59e0b] hover:bg-opacity-90 text-[#1c1917] px-8 py-4 rounded-xl font-bold transition-all transform hover:-translate-y-1 shadow-lg shadow-amber-500/20 flex items-center gap-3 no-underline">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            New Dynamic Page
        </a>
    </div>

    @if(session('success'))
        <div class="mb-10 p-6 bg-green-500/10 border border-green-500/20 rounded-2xl text-green-500 font-bold flex items-center gap-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden transition-all">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/50 border-b border-gray-100 uppercase text-[0.65rem] font-black text-gray-400 tracking-[0.15em]">
                    <th class="px-8 py-6">Identity</th>
                    <th class="px-8 py-6">URL Pointer</th>
                    <th class="px-8 py-6 text-right">Operations</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 text-[#1c1917]">
                @forelse($pages as $page)
                <tr class="group hover:bg-gray-50/80 transition-all duration-300">
                    <td class="px-8 py-6">
                        <div class="flex flex-col text-left">
                            <span class="font-bold text-[#1c1917] text-lg group-hover:text-[#f59e0b] transition-colors leading-tight">{{ $page->title['en'] }}</span>
                            <span class="text-sm text-gray-400 font-medium">{{ $page->title['ar'] }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-6 text-left">
                        <span class="bg-gray-100 text-gray-500 px-3 py-1 rounded-full text-xs font-mono font-bold tracking-tight">/{{ $page->slug }}</span>
                    </td>
                    <td class="px-8 py-6 text-right">
                        <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <a href="{{ route('admin.pages.edit', $page->id) }}" class="p-3 text-[#1c1917] hover:bg-white hover:shadow-md rounded-xl transition-all border border-transparent hover:border-gray-100">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <form action="{{ route('admin.pages.destroy', $page->id) }}" method="POST" onsubmit="return confirm('Terminate this dynamic architecture pillar?')" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-3 text-red-400 hover:text-red-500 hover:bg-white hover:shadow-md rounded-xl transition-all border border-transparent hover:border-gray-100 bg-transparent cursor-pointer">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-8 py-20 text-center">
                        <div class="max-w-xs mx-auto">
                            <div class="w-20 h-20 bg-gray-50 rounded-3xl flex items-center justify-center mx-auto mb-6 text-gray-200">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <p class="text-gray-400 font-medium">No dynamic architecture established yet.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
