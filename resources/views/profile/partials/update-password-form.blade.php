<!-- resources/views/profile/partials/update-password-form.blade.php -->
<section class="bg-white/[0.03] backdrop-blur-3xl border border-white/10 p-10 rounded-[2.5rem]">
    <header class="mb-8">
        <h2 class="text-xl font-black text-white tracking-tight uppercase">Key Rotation</h2>
        <p class="text-white/40 text-xs font-medium italic mt-1">Ensure your secure key remains robust and synchronized.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div class="space-y-3">
            <label for="update_password_current_password" class="block text-[0.6rem] font-black text-white/30 uppercase tracking-[0.2em] ml-2">Current Secure Key</label>
            <input id="update_password_current_password" name="current_password" type="password" class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-white font-bold focus:ring-[#f59e0b]/40 focus:border-[#f59e0b]/40 focus:ring-4 transition-all" autocomplete="current-password">
            @error('current_password', 'updatePassword') <p class="text-red-500 text-[0.6rem] font-black uppercase tracking-widest mt-2 ml-2">{{ $message }}</p> @enderror
        </div>

        <div class="space-y-3">
            <label for="update_password_password" class="block text-[0.6rem] font-black text-white/30 uppercase tracking-[0.2em] ml-2">New Secure Key</label>
            <input id="update_password_password" name="password" type="password" class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-white font-bold focus:ring-[#f59e0b]/40 focus:border-[#f59e0b]/40 focus:ring-4 transition-all" autocomplete="new-password">
            @error('password', 'updatePassword') <p class="text-red-500 text-[0.6rem] font-black uppercase tracking-widest mt-2 ml-2">{{ $message }}</p> @enderror
        </div>

        <div class="space-y-3">
            <label for="update_password_password_confirmation" class="block text-[0.6rem] font-black text-white/30 uppercase tracking-[0.2em] ml-2">Key Verification</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-white font-bold focus:ring-[#f59e0b]/40 focus:border-[#f59e0b]/40 focus:ring-4 transition-all" autocomplete="new-password">
            @error('password_confirmation', 'updatePassword') <p class="text-red-500 text-[0.6rem] font-black uppercase tracking-widest mt-2 ml-2">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit" class="bg-[#f59e0b] hover:bg-[#b88d4d] text-[#1c1917] px-8 py-4 rounded-xl font-black text-xs uppercase tracking-[0.2em] transition-all">Rotate Secure Key</button>
            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2000)" class="text-[0.6rem] font-black text-[#f59e0b] uppercase tracking-widest">Rotated.</p>
            @endif
        </div>
    </form>
</section>
