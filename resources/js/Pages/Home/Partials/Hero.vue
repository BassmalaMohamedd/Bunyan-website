<script setup>
import { onMounted, ref } from 'vue';

const videoRef = ref(null);

onMounted(() => {
    if (videoRef.value) {
        videoRef.value.play().catch(e => console.log("Autoplay blocked:", e));
    }
});
</script>

<template>
    <section class="relative h-screen flex items-center justify-center overflow-hidden bg-secondary">
        <!-- Cinematic Background -->
        <div class="absolute inset-0 z-0">
             <div class="absolute inset-0 bg-[#0a192f]"></div>
             <div 
                class="absolute inset-0 opacity-40 grayscale"
                style="background: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=2000') center/cover no-repeat;"
             ></div>
             <video 
                ref="videoRef"
                autoplay 
                muted 
                loop 
                playsinline
                poster="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=2000"
                class="w-full h-full object-cover opacity-30 select-none pointer-events-none"
            >
                <source src="https://images.pexels.com/videos/3125396/free-video-3125396.mp4" type="video/mp4">
            </video>
            <!-- Premium Overlay -->
            <div class="absolute inset-0 bg-radial-gradient from-transparent to-[#0a192f]/90 z-10"></div>
        </div>
        
        <!-- Technical Scanning Overlay -->
        <div class="absolute inset-0 z-[15] overflow-hidden pointer-events-none">
            <div class="w-full h-[150px] bg-gradient-to-b from-transparent via-primary/10 to-transparent absolute top-[-150px] animate-scan"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative z-20 max-w-[1440px] mx-auto px-10 w-full pt-20">
            <div class="max-w-5xl">
                <div class="inline-flex items-center gap-4 mb-14 reveal-slow active">
                    <div class="w-12 h-[1px] bg-primary"></div>
                    <span class="text-primary font-black text-[0.8rem] tracking-[0.4em] uppercase">Excellence Since 2009</span>
                </div>
                
                <h1 class="text-7xl md:text-[8.5rem] font-black text-white leading-[0.85] mb-14 tracking-tighter reveal-slow active">
                    Mastering <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-primary to-primary/80">Integrity</span> <br>
                    in Real Estate.
                </h1>
                
                <p class="text-xl md:text-2xl text-slate-400 mb-16 max-w-2xl leading-relaxed font-light reveal-slow active delay-300">
                    Unlocking the foundation of sustainable economic success through our <span class="text-white font-bold">specialized software ecosystem</span> and visionary consultancy.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-8 reveal-slow active delay-500">
                    <a href="/services" class="px-12 py-5 bg-primary text-secondary text-[0.85rem] font-black tracking-[0.3em] uppercase transition-all duration-500 hover:bg-white hover:-translate-y-1">
                        Explore Ecosystem
                    </a>
                    <a href="/about" class="px-12 py-5 border border-white/20 text-white text-[0.85rem] font-black tracking-[0.3em] uppercase transition-all duration-500 hover:border-white hover:bg-white/5 hover:-translate-y-1">
                        About Arkan
                    </a>
                </div>
            </div>
        </div>

        <!-- Decorative corner elements -->
        <div class="absolute bottom-10 left-10 z-20 hidden lg:block opacity-40">
            <div class="flex flex-col gap-2">
                <div class="w-12 h-[1px] bg-primary"></div>
                <div class="w-8 h-[1px] bg-primary"></div>
                <div class="w-4 h-[1px] bg-primary"></div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-12 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center gap-4">
            <span class="text-[10px] text-primary font-bold uppercase tracking-[0.5em] -rotate-90 origin-center translate-y-[-20px]">Scroll</span>
            <div class="w-[1px] h-20 bg-gradient-to-b from-primary/0 via-primary to-primary/0 opacity-50"></div>
        </div>
    </section>
</template>

<style scoped>
.delay-100 { transition-delay: 100ms; }
.delay-300 { transition-delay: 300ms; }
.delay-500 { transition-delay: 500ms; }
.delay-700 { transition-delay: 700ms; }
</style>

