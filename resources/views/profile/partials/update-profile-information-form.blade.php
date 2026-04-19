<!-- resources/views/profile/partials/update-profile-information-form.blade.php -->
<section class="bg-white/[0.03] backdrop-blur-3xl border border-white/10 p-10 rounded-[2.5rem]">
    <header class="mb-8">
        <h2 class="text-xl font-black text-white tracking-tight uppercase">Identity Profile</h2>
        <p class="text-white/40 text-xs font-medium italic mt-1">Update your ecosystem identification and pointer address.</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-3">
                <label for="first_name" class="block text-[0.6rem] font-black text-white/30 uppercase tracking-[0.2em] ml-2">Identity (First Name)</label>
                <input id="first_name" name="first_name" type="text" class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-white font-bold focus:ring-[#f59e0b]/40 focus:border-[#f59e0b]/40 focus:ring-4 transition-all" value="{{ old('first_name', $user->first_name) }}" required autofocus autocomplete="given-name">
                @error('first_name') <p class="text-red-500 text-[0.6rem] font-black uppercase tracking-widest mt-2 ml-2">{{ $message }}</p> @enderror
            </div>

            <div class="space-y-3">
                <label for="last_name" class="block text-[0.6rem] font-black text-white/30 uppercase tracking-[0.2em] ml-2">Legacy (Last Name)</label>
                <input id="last_name" name="last_name" type="text" class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-white font-bold focus:ring-[#f59e0b]/40 focus:border-[#f59e0b]/40 focus:ring-4 transition-all" value="{{ old('last_name', $user->last_name) }}" required autocomplete="family-name">
                @error('last_name') <p class="text-red-500 text-[0.6rem] font-black uppercase tracking-widest mt-2 ml-2">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="space-y-3">
            <label for="email" class="block text-[0.6rem] font-black text-white/30 uppercase tracking-[0.2em] ml-2">Access Pointer (Email)</label>
            <input id="email" name="email" type="email" class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-white font-bold focus:ring-[#f59e0b]/40 focus:border-[#f59e0b]/40 focus:ring-4 transition-all" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email') <p class="text-red-500 text-[0.6rem] font-black uppercase tracking-widest mt-2 ml-2">{{ $message }}</p> @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 p-4 bg-red-500/10 border border-red-500/20 rounded-2xl">
                    <p class="text-xs font-bold text-red-500 uppercase tracking-widest">
                        Pointer address unverified.
                        <button form="send-verification" class="ml-2 text-white hover:text-[#f59e0b] underline transition-colors">Dispatch new verification link.</button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-[0.6rem] font-bold text-green-500 uppercase tracking-widest">Verification link dispatched.</p>
                    @endif
                </div>
            @endif
        </div>

        <div class="space-y-3">
            <label for="phone" class="block text-[0.6rem] font-black text-white/30 uppercase tracking-[0.2em] ml-2">Communication Line (Phone)</label>
            <input id="phone" name="phone" type="text" class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-white font-bold focus:ring-[#f59e0b]/40 focus:border-[#f59e0b]/40 focus:ring-4 transition-all" value="{{ old('phone', $user->phone) }}">
            @error('phone') <p class="text-red-500 text-[0.6rem] font-black uppercase tracking-widest mt-2 ml-2">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit" class="bg-[#f59e0b] hover:bg-[#b88d4d] text-[#1c1917] px-8 py-4 rounded-xl font-black text-xs uppercase tracking-[0.2em] transition-all">Synchronize Changes</button>
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2000)" class="text-[0.6rem] font-black text-[#f59e0b] uppercase tracking-widest">Synchronized.</p>
            @endif
        </div>
    </form>
</section>
