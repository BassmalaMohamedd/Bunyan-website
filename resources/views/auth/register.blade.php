<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Vertex</title>
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

        <div class="w-full max-w-2xl relative z-10 animate-in fade-in transition-all duration-700">
            <!-- Logo Section -->
            <div class="text-center mb-8">
                <a href="/" class="inline-flex items-center gap-3 no-underline group">
                    <span class="text-3xl font-black text-white tracking-tighter hover:text-[#f59e0b] transition-colors">
                        <span class="text-[#f59e0b]">|</span> VERTEX
                    </span>
                </a>
            </div>

            <!-- Registration Card -->
            <div class="bg-white/5 backdrop-blur-xl border border-white/10 p-12 rounded-[2.5rem] shadow-2xl">
                <div class="mb-10 text-center">
                    <h1 class="text-4xl font-black text-white tracking-tight leading-none mb-3">Register</h1>
                    <p class="text-white/40 font-medium text-sm italic">Join the Vertex ecosystem.</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- First Name -->
                        <div class="space-y-2">
                            <label for="first_name" class="block text-xs font-bold text-white/50 uppercase tracking-widest ml-1">First Name</label>
                            <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required autofocus autocomplete="given-name"
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white font-medium focus:ring-[#f59e0b]/40 focus:border-[#f59e0b]/40 focus:ring-4 transition-all outline-none">
                            @error('first_name') <p class="text-red-500 text-[0.7rem] font-bold mt-2 ml-1 uppercase tracking-widest">{{ $message }}</p> @enderror
                        </div>

                        <!-- Last Name -->
                        <div class="space-y-2">
                            <label for="last_name" class="block text-xs font-bold text-white/50 uppercase tracking-widest ml-1">Last Name</label>
                            <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required autocomplete="family-name"
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white font-medium focus:ring-[#f59e0b]/40 focus:border-[#f59e0b]/40 focus:ring-4 transition-all outline-none">
                            @error('last_name') <p class="text-red-500 text-[0.7rem] font-bold mt-2 ml-1 uppercase tracking-widest">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div class="space-y-2">
                        <label for="email" class="block text-xs font-bold text-white/50 uppercase tracking-widest ml-1">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                            class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white font-medium focus:ring-[#f59e0b]/40 focus:border-[#f59e0b]/40 focus:ring-4 transition-all outline-none">
                        @error('email') <p class="text-red-500 text-[0.7rem] font-bold mt-2 ml-1 uppercase tracking-widest">{{ $message }}</p> @enderror
                    </div>

                    <!-- Phone -->
                    <div class="space-y-2">
                        <label for="phone" class="block text-xs font-bold text-white/50 uppercase tracking-widest ml-1">Phone (Optional)</label>
                        <input id="phone" type="text" name="phone" value="{{ old('phone') }}"
                            class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white font-medium focus:ring-[#f59e0b]/40 focus:border-[#f59e0b]/40 focus:ring-4 transition-all outline-none">
                        @error('phone') <p class="text-red-500 text-[0.7rem] font-bold mt-2 ml-1 uppercase tracking-widest">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Password -->
                        <div class="space-y-2">
                            <label for="password" class="block text-xs font-bold text-white/50 uppercase tracking-widest ml-1">Password</label>
                            <input id="password" type="password" name="password" required autocomplete="new-password"
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white font-medium focus:ring-[#f59e0b]/40 focus:border-[#f59e0b]/40 focus:ring-4 transition-all outline-none">
                            @error('password') <p class="text-red-500 text-[0.7rem] font-bold mt-2 ml-1 uppercase tracking-widest">{{ $message }}</p> @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="space-y-2">
                            <label for="password_confirmation" class="block text-xs font-bold text-white/50 uppercase tracking-widest ml-1">Confirm Password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white font-medium focus:ring-[#f59e0b]/40 focus:border-[#f59e0b]/40 focus:ring-4 transition-all outline-none">
                        </div>
                    </div>

                    <div class="pt-6">
                        <button type="submit" class="w-full bg-[#f59e0b] hover:bg-[#b88d4d] text-[#1c1917] py-5 rounded-2xl font-black text-sm uppercase tracking-[0.2em] transition-all shadow-2xl shadow-amber-500/10 active:scale-95">
                            Create Account
                        </button>
                    </div>
                    
                    <div class="text-center mt-6">
                        <a href="{{ route('login') }}" class="text-[0.65rem] font-black text-white/40 uppercase tracking-widest hover:text-[#f59e0b] transition-colors no-underline">
                            Already have an account? Sign In
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
