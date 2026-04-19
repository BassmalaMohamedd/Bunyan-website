@extends('layouts.public')

@section('title', 'Reset Password | Vertex')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center p-6 bg-[#0c0a09]">
    <div class="w-full max-w-md">
        <div class="mb-10 text-center">
            <h1 class="text-3xl font-black text-white tracking-tight uppercase mb-3">Key Synchronization</h1>
            <p class="text-white/40 text-sm font-medium leading-relaxed italic">
                Establish a new secure key to restore access to the Vertex ecosystem.
            </p>
        </div>

        <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="space-y-3">
                <label for="email" class="block text-[0.65rem] font-black text-white/30 uppercase tracking-[0.2em] ml-2">Access Pointer (Email)</label>
                <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required readonly
                    class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-white/50 font-bold focus:ring-0 transition-all cursor-not-allowed">
            </div>

            <div class="space-y-3">
                <label for="password" class="block text-[0.65rem] font-black text-white/30 uppercase tracking-[0.2em] ml-2">New Secure Key</label>
                <input id="password" type="password" name="password" required autofocus autocomplete="new-password"
                    class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-white font-bold focus:ring-[#f59e0b]/40 focus:border-[#f59e0b]/40 focus:ring-4 transition-all">
                @error('password') <p class="text-red-500 text-[0.65rem] font-black uppercase tracking-widest mt-2 ml-2">{{ $message }}</p> @enderror
            </div>

            <div class="space-y-3">
                <label for="password_confirmation" class="block text-[0.65rem] font-black text-white/30 uppercase tracking-[0.2em] ml-2">Key Verification</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-white font-bold focus:ring-[#f59e0b]/40 focus:border-[#f59e0b]/40 focus:ring-4 transition-all">
            </div>

            <button type="submit" class="w-full bg-[#f59e0b] hover:bg-[#b88d4d] text-[#1c1917] py-5 rounded-2xl font-black text-xs uppercase tracking-[0.3em] transition-all">
                Synchronize New Key
            </button>
        </form>
    </div>
</div>
@endsection
