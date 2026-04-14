<script setup>
// Minimalistic hero for internal pages
</script>

<template>
    <section class="relative pt-64 pb-32 bg-secondary overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-tr from-secondary via-secondary/90 to-primary/5 opacity-80"></div>
            <div class="absolute -top-32 -right-32 w-[600px] h-[600px] bg-primary/10 rounded-full blur-[150px]"></div>
            <div class="absolute top-1/2 left-0 w-96 h-96 bg-primary/5 rounded-full blur-[100px] -translate-x-1/2"></div>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
            <div class="max-w-4xl reveal active">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-white/10 bg-white/5 backdrop-blur-md text-primary font-bold text-[10px] uppercase tracking-[0.3em] mb-10">
                    Founded in 2009
                </div>
                <h1 class="text-5xl md:text-[6rem] font-black text-white leading-[0.9] mb-10 tracking-tighter">
                    Innovation as <br/>
                    <span class="text-gradient">Legacy.</span>
                </h1>
                <p class="text-xl md:text-2xl text-slate-400 font-light leading-relaxed max-w-2xl">
                    For over 15 years, Kinda Solutions has been the center of excellence for specialized software, driving digital transformation across the Middle East's real estate sector.
                </p>
            </div>
        </div>
    </section>
</template>

