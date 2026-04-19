@extends('layouts.public')

@section('title', 'Verify Identity | Vertex')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center p-6 bg-[#0c0a09]">
    <div class="w-full max-w-md">
        <div class="mb-10 text-center">
            <h1 class="text-3xl font-black text-white tracking-tight uppercase mb-3">Identity Validation</h1>
            <p class="text-white/40 text-sm font-medium leading-relaxed italic">
                A verification pointer has been dispatched. Please synchronize your email address to unlock full ecosystem functionality.
            </p>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-6 p-4 bg-[#f59e0b]/10 border border-[#f59e0b]/20 rounded-2xl text-[#f59e0b] text-xs font-bold uppercase tracking-widest text-center">
                A new verification pointer has been dispatched to your pointer address.
            </div>
        @endif

        <div class="flex flex-col gap-4">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="w-full bg-[#f59e0b] hover:bg-[#b88d4d] text-[#1c1917] py-5 rounded-2xl font-black text-xs uppercase tracking-[0.3em] transition-all">
                    Resend Verification Pointer
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full bg-white/5 hover:bg-white/10 text-white/40 py-4 rounded-2xl font-bold text-[0.65rem] uppercase tracking-widest transition-all">
                    Terminate Session
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
