@extends('layouts.public')

@section('title', 'Secure Segment Validation | Vertex')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center p-6 bg-[#0c0a09]">
    <div class="w-full max-w-md">
        <div class="mb-10 text-center">
            <h1 class="text-3xl font-black text-white tracking-tight uppercase mb-3">Segment Validation</h1>
            <p class="text-white/40 text-sm font-medium leading-relaxed italic">
                This area of the ecosystem is restricted. Please synchronize your secure key to proceed.
            </p>
        </div>

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
            @csrf

            <div class="space-y-3">
                <label for="password" class="block text-[0.65rem] font-black text-white/30 uppercase tracking-[0.2em] ml-2">Secure Key</label>
                <input id="password" type="password" name="password" required autocomplete="current-password" autofocus
                    class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-white font-bold focus:ring-[#f59e0b]/40 focus:border-[#f59e0b]/40 focus:ring-4 transition-all">
                @error('password') <p class="text-red-500 text-[0.65rem] font-black uppercase tracking-widest mt-2 ml-2">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="w-full bg-[#f59e0b] hover:bg-[#b88d4d] text-[#1c1917] py-5 rounded-2xl font-black text-xs uppercase tracking-[0.3em] transition-all">
                Authorize Access
            </button>
        </form>
    </div>
</div>
@endsection
