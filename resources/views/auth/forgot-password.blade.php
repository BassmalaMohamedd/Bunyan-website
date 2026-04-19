@extends('layouts.public')

@section('title', 'Forgot Password | Vertex')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center p-6 bg-[#0c0a09]">
    <div class="w-full max-w-md">
        <div class="mb-10 text-center">
            <h1 class="text-3xl font-black text-white tracking-tight uppercase mb-3">Key Recovery</h1>
            <p class="text-white/40 text-sm font-medium leading-relaxed italic">
                Specify your access pointer (email) to receive a strategic synchronization link.
            </p>
        </div>

        @if (session('status'))
            <div class="mb-6 p-4 bg-[#f59e0b]/10 border border-[#f59e0b]/20 rounded-2xl text-[#f59e0b] text-xs font-bold uppercase tracking-widest text-center">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf
            <div class="space-y-3">
                <label for="email" class="block text-[0.65rem] font-black text-white/30 uppercase tracking-[0.2em] ml-2">Access Pointer (Email)</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-white font-bold focus:ring-[#f59e0b]/40 focus:border-[#f59e0b]/40 focus:ring-4 transition-all">
                @error('email') <p class="text-red-500 text-[0.65rem] font-black uppercase tracking-widest mt-2 ml-2">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="w-full bg-[#f59e0b] hover:bg-[#b88d4d] text-[#1c1917] py-5 rounded-2xl font-black text-xs uppercase tracking-[0.3em] transition-all">
                Dispatch Recovery Link
            </button>
        </form>
    </div>
</div>
@endsection
