<script setup>
import { onMounted, onUnmounted, ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import Hero from './Partials/Hero.vue';
import Stats from './Partials/Stats.vue';
import ServicesGrid from './Partials/ServicesGrid.vue';

const scrollY = ref(0);
const scrollProgress = ref(0);

const handleScroll = () => {
    scrollY.value = window.scrollY;
    const totalHeight = document.documentElement.scrollHeight - window.innerHeight;
    scrollProgress.value = (window.scrollY / totalHeight) * 100;
};

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
    
    // Intersection Observer for Reveal animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.reveal, .reveal-left, .reveal-scale').forEach(el => {
        observer.observe(el);
    });
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
</script>

<template>
    <Head title="Arkan Real Estate | Premium Valuation & Advisory" />
    
    <div class="scroll-progress" :style="{ width: scrollProgress + '%' }"></div>
    
    <PublicLayout>
        <Hero />
        
        <Stats />
        
        <ServicesGrid />

        <!-- High-End CTA Section -->
        <section id="contact" class="py-40 bg-secondary relative overflow-hidden">
            <!-- Decorative background elements -->
            <div class="absolute top-0 right-0 w-1/3 h-full bg-primary/5 -skew-x-12 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-primary/10 rounded-full blur-3xl -translate-x-1/2 translate-y-1/2"></div>
            
            <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
                    <div class="reveal">
                        <h2 class="text-primary font-bold tracking-[0.3em] uppercase text-xs mb-8">Connect with Innovation</h2>
                        <h3 class="text-4xl md:text-7xl font-black text-white leading-[1.1] mb-10">
                            Empowering Your <br/>
                            Business <span class="text-primary">Growth.</span>
                        </h3>
                        <p class="text-xl text-slate-400 font-light leading-relaxed mb-12 max-w-lg">
                            Ready to transform your real estate operations? Our consultants are prepared to demonstrate how our ecosystem can elevate your performance.
                        </p>
                        
                        <div class="space-y-8">
                            <div class="flex items-center gap-6 group">
                                <div class="w-14 h-14 rounded-2xl border border-white/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-secondary transition-all duration-500 shadow-xl group-hover:shadow-primary/20">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-1">Direct Line</p>
                                    <span class="text-white font-black text-xl">+966 54 113 1137</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-6 group">
                                <div class="w-14 h-14 rounded-2xl border border-white/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-secondary transition-all duration-500 shadow-xl group-hover:shadow-primary/20">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-1">Electronic Mail</p>
                                    <span class="text-white font-black text-xl">info@kinda.sa</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="reveal-scale">
                        <div class="glass-card p-12 bg-white/5 border-white/10 relative overflow-hidden group">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-primary/20 blur-3xl rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-1000"></div>
                            <form class="space-y-8 relative z-10">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                                    <div class="space-y-3">
                                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Full Name</label>
                                        <input type="text" class="w-full bg-white/5 border-white/10 border-b rounded-none px-0 py-3 text-white focus:border-primary focus:ring-0 transition-all font-light placeholder-slate-600" placeholder="Enter your name">
                                    </div>
                                    <div class="space-y-3">
                                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Contact Phone</label>
                                        <input type="tel" class="w-full bg-white/5 border-white/10 border-b rounded-none px-0 py-3 text-white focus:border-primary focus:ring-0 transition-all font-light placeholder-slate-600" placeholder="+966 ---">
                                    </div>
                                </div>
                                <div class="space-y-3">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Solution Interest</label>
                                    <select class="w-full bg-slate-900 border-white/10 border rounded-xl px-4 py-4 text-slate-300 focus:border-primary focus:ring-0 transition-all font-light appearance-none">
                                        <option>PropMate Demo Request</option>
                                        <option>ValueMate Implementation</option>
                                        <option>AccuMate Financial Suite</option>
                                        <option>Custom Enterprise Solution</option>
                                    </select>
                                </div>
                                <div class="space-y-3">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Message (Optional)</label>
                                    <textarea rows="3" class="w-full bg-white/5 border-white/10 border-b rounded-none px-0 py-3 text-white focus:border-primary focus:ring-0 transition-all font-light placeholder-slate-600" placeholder="Tell us about your project requirements..."></textarea>
                                </div>
                                <button type="button" class="w-full btn-gold !py-5 text-sm tracking-[0.3em] uppercase">
                                    Submit Inquiry
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>

<style scoped>
/* Local adjustments for the glass CTA */
input::placeholder, textarea::placeholder {
    color: #475569;
}
input, textarea, select {
    background: transparent !important;
}
</style>

