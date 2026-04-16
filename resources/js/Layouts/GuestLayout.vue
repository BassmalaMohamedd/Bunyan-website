<template>
    <div class="min-h-screen flex flex-col items-center justify-center py-16 bg-[#0a192f] relative overflow-y-auto overflow-x-hidden font-sans">
        <!-- Cinematic Background Assets -->
        <div class="fixed inset-0 z-0 pointer-events-none">
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=2000')] bg-cover bg-center opacity-20 filter grayscale contrast-125"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-[#0a192f]/60 via-[#0a192f]/80 to-[#0a192f]"></div>
            
            <!-- Technical Scanning Overlay -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-20">
                <div class="w-full h-[100px] bg-gradient-to-b from-transparent via-[#cba365]/20 to-transparent absolute -top-[100px] animate-[scan_8s_linear_infinite]"></div>
            </div>

            <!-- Ambient Glows -->
            <div class="absolute top-[-10%] left-[-10%] w-[600px] h-[600px] bg-[#cba365]/10 rounded-full blur-[120px] pointer-events-none"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[500px] h-[500px] bg-[#cba365]/5 rounded-full blur-[120px] pointer-events-none"></div>
        </div>

        <div class="w-full max-w-xl px-6 relative z-10 transition-all duration-700 animate-in fade-in zoom-in slide-in-from-bottom-8">
            <!-- Branding Header -->
            <div class="text-center mb-12">
                <Link href="/" class="inline-flex items-center gap-4 group no-underline">
                    <div class="w-14 h-14 bg-[#cba365] rounded-2xl flex items-center justify-center shadow-2xl shadow-[#cba365]/30 transform group-hover:rotate-12 transition-transform duration-500">
                        <span class="text-[#0a192f] font-black text-2xl leading-none">A</span>
                    </div>
                    <div class="flex flex-col items-start">
                        <span class="text-white text-2xl font-black tracking-tight uppercase leading-none">ARKAN <span class="text-[#cba365] font-light opacity-50">Ecosystem</span></span>
                        <span class="text-[0.6rem] font-bold text-[#cba365] uppercase tracking-[0.4em] mt-1 opacity-60">Security Protocol</span>
                    </div>
                </Link>
            </div>

            <!-- Authenticatiion Card -->
            <div class="bg-white/[0.03] backdrop-blur-2xl border border-white/10 rounded-[2.5rem] p-12 shadow-2xl relative overflow-hidden group">
                <!-- Decorative inner glow -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-[#cba365]/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
                
                <slot />
            </div>

            <!-- Footer Connectivity -->
            <div class="mt-12 flex flex-col items-center gap-8">
                <div class="flex justify-center gap-10">
                    <Link href="/" class="text-[0.7rem] font-black text-white/40 hover:text-[#cba365] transition-all uppercase tracking-[0.3em] no-underline">Terminal Home</Link>
                    <Link href="/about" class="text-[0.7rem] font-black text-white/40 hover:text-[#cba365] transition-all uppercase tracking-[0.3em] no-underline">About Arkan</Link>
                </div>
                <div class="h-px w-20 bg-white/10"></div>
                <p class="text-[0.6rem] font-bold text-white/20 uppercase tracking-widest text-center leading-relaxed">
                    &copy; 2026 Arkan Real Estate<br/>Authorized Access Only
                </p>
            </div>
        </div>
    </div>
</template>

<style>
@keyframes scan {
    0% { top: -100px; opacity: 0; }
    5% { opacity: 1; }
    95% { opacity: 1; }
    100% { top: 100%; opacity: 0; }
}

body { 
    background-color: #0a192f !important;
    margin: 0;
    padding: 0;
}

/* Hide public layout elements that might leak */
#main-nav, .hero-wrapper, footer {
    display: none !important;
}
</style>
