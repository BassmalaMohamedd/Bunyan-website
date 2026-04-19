<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Vertex</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#0c0a09] font-sans antialiased selection:bg-[#f59e0b] selection:text-[#0c0a09]">
    <div class="min-h-screen flex items-center justify-center p-6 relative overflow-hidden">
        <!-- Background Image & Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=2000" 
                 class="w-full h-full object-cover" alt="Background">
            <!-- Deep Stone Strategic Overlay (Refined for maximum premium feel) -->
            <div class="absolute inset-0" style="background-color: rgba(28, 25, 23, 0.85); backdrop-filter: blur(2px); -webkit-backdrop-filter: blur(2px);"></div>
        </div>

        <div class="w-full max-w-md relative z-10">
            <!-- Logo Section -->
            <div class="text-center mb-10">
                <a href="/" class="inline-flex items-center gap-3 no-underline group">
                    <span class="text-3xl font-black text-white tracking-tighter hover:text-[#f59e0b] transition-colors">
                        <span class="text-[#f59e0b]">|</span> VERTEX
                    </span>
                </a>
            </div>

            <!-- Login Card -->
            <div class="bg-white/5 backdrop-blur-xl border border-white/10 p-10 rounded-3xl shadow-2xl">
                <div class="mb-8 text-center">
                    <h1 class="text-3xl font-black text-white tracking-tight leading-none mb-2">Login</h1>
                    <p class="text-white/40 text-sm font-medium italic">Welcome back to Vertex.</p>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="mb-6 p-4 bg-[#f59e0b]/10 border border-[#f59e0b]/20 rounded-xl text-[#f59e0b] text-xs font-bold text-center">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div class="space-y-2">
                        <label for="email" class="block text-xs font-bold text-white/50 uppercase tracking-widest ml-1">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                            class="w-full bg-white/5 border border-white/10 rounded-xl px-5 py-4 text-white font-medium focus:ring-[#f59e0b]/40 focus:border-[#f59e0b]/40 focus:ring-4 transition-all outline-none">
                        @error('email') <p class="text-red-500 text-[0.7rem] font-bold mt-2 ml-1 uppercase tracking-widest">{{ $message }}</p> @enderror
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <div class="flex items-center justify-between ml-1">
                            <label for="password" class="block text-xs font-bold text-white/50 uppercase tracking-widest">Password</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-[0.65rem] font-bold text-[#f59e0b] hover:underline uppercase tracking-widest transition-all">Forgot?</a>
                            @endif
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="w-full bg-white/5 border border-white/10 rounded-xl px-5 py-4 text-white font-medium focus:ring-[#f59e0b]/40 focus:border-[#f59e0b]/40 focus:ring-4 transition-all outline-none">
                        @error('password') <p class="text-red-500 text-[0.7rem] font-bold mt-2 ml-1 uppercase tracking-widest">{{ $message }}</p> @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center gap-3 ml-1">
                        <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 rounded-md bg-white/5 border border-white/10 text-[#f59e0b] focus:ring-[#f59e0b]/40 focus:ring-offset-0 transition-all bg-transparent">
                        <label for="remember_me" class="text-xs font-bold text-white/30 uppercase tracking-widest cursor-pointer hover:text-white transition-colors">Remember me</label>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full bg-[#f59e0b] hover:bg-[#b88d4d] text-[#1c1917] py-4 rounded-xl font-black text-sm uppercase tracking-[0.2em] transition-all shadow-xl shadow-amber-500/10">
                            Log In
                        </button>
                    </div>
                </form>

                <div class="mt-8 pt-8 border-t border-white/5 text-center">
                    <p class="text-xs font-bold text-white/30 uppercase tracking-widest mb-4">New here?</p>
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center w-full bg-white/5 hover:bg-white/10 text-white py-4 rounded-xl font-bold text-xs uppercase tracking-widest transition-all border border-white/10">
                        Create Account
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
