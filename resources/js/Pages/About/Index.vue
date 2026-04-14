<script setup>
import { onMounted } from 'vue';
import { Head } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import LegacyHero from './Partials/LegacyHero.vue';

onMounted(() => {
    const observerOptions = {
        threshold: 0.1,
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.reveal, .reveal-left, .reveal-scale').forEach(el => observer.observe(el));
});
</script>

<template>
    <Head title="Our Story | Kinda Solutions" />
    
    <PublicLayout>
        <LegacyHero />

        <section class="py-40 bg-white relative overflow-hidden">
            <!-- Decorative BG -->
            <div class="absolute top-40 right-0 w-96 h-96 bg-primary/5 rounded-full blur-[100px] -z-10 translate-x-1/2"></div>
            
            <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-24 items-center">
                    <div class="reveal">
                        <h2 class="text-primary font-bold tracking-[0.3em] uppercase text-xs mb-8">Our Essence</h2>
                        <h3 class="text-4xl md:text-7xl font-black text-secondary leading-[1.1] mb-10">
                            Innovation Built <br/>
                            <span class="text-gradient">With Purpose.</span>
                        </h3>
                        <p class="text-slate-500 leading-relaxed mb-8 text-xl font-light">
                            Kinda Solutions was founded in Riyadh with a singular vision: to represent the center of innovation and excellence in specialized software solutions.
                        </p>
                        <p class="text-slate-500 leading-relaxed mb-12 text-xl font-light">
                            With our three pioneering solutions—ValueMate, PropMate, and AccuMate—we provide a comprehensive experience for companies to enhance their performance and achieve sustainable success in the digital business world.
                        </p>
                        
                        <div class="grid grid-cols-2 gap-12">
                            <div class="reveal-left">
                                <p class="text-5xl font-black text-secondary mb-2">2009</p>
                                <div class="section-accent mb-3"></div>
                                <p class="text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Founded in Riyadh</p>
                            </div>
                            <div class="reveal-left delay-200">
                                <p class="text-5xl font-black text-secondary mb-2">3+</p>
                                <div class="section-accent mb-3"></div>
                                <p class="text-xs font-black text-slate-400 uppercase tracking-[0.2em]">R&D Hubs</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="relative reveal-scale">
                        <div class="aspect-[4/5] bg-secondary rounded-[40px] overflow-hidden shadow-premium group">
                             <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80&w=1000" alt="Innovation Hub" class="w-full h-full object-cover grayscale opacity-80 group-hover:grayscale-0 group-hover:opacity-100 group-hover:scale-110 transition-all duration-1000">
                        </div>
                        <div class="absolute -bottom-12 -left-12 glass-card p-12 hidden md:block max-w-sm">
                            <h4 class="text-primary font-black text-xl mb-4 italic">Visionary Leadership</h4>
                            <p class="text-slate-500 text-sm leading-relaxed font-light">
                                We focus on developing advanced technical solutions based on the latest research in property management and valuation.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Values Section -->
        <section class="py-40 bg-slate-50 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>
            
            <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
                <div class="text-center mb-32 reveal">
                    <h2 class="text-primary font-bold tracking-[0.4em] uppercase text-xs mb-6">Execution Pillars</h2>
                    <h3 class="text-4xl md:text-7xl font-black text-secondary tracking-tighter">Core Values</h3>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-16">
                    <div class="reveal group h-full">
                        <div class="glass-card p-12 h-full border-none hover:bg-white hover:shadow-glow transition-all duration-700">
                            <div class="text-primary mb-10 w-16 h-16 bg-white rounded-2xl shadow-xl flex items-center justify-center group-hover:bg-primary group-hover:text-white transition-all duration-500">
                                 <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            </div>
                            <h4 class="text-3xl font-black text-secondary mb-6">Expertise</h4>
                            <p class="text-slate-500 leading-relaxed font-light text-lg">
                                Deep technical knowledge specialized in property valuation and management workflows.
                            </p>
                        </div>
                    </div>
                    
                    <div class="reveal delay-200 group h-full">
                        <div class="glass-card p-12 h-full border-none hover:bg-white hover:shadow-glow transition-all duration-700">
                            <div class="text-primary mb-10 w-16 h-16 bg-white rounded-2xl shadow-xl flex items-center justify-center group-hover:bg-primary group-hover:text-white transition-all duration-500">
                                 <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <h4 class="text-3xl font-black text-secondary mb-6">Innovation</h4>
                            <p class="text-slate-500 leading-relaxed font-light text-lg">
                                Continuous research and development to stay at the vanguard of PropTech.
                            </p>
                        </div>
                    </div>

                    <div class="reveal delay-400 group h-full">
                        <div class="glass-card p-12 h-full border-none hover:bg-white hover:shadow-glow transition-all duration-700">
                            <div class="text-primary mb-10 w-16 h-16 bg-white rounded-2xl shadow-xl flex items-center justify-center group-hover:bg-primary group-hover:text-white transition-all duration-500">
                                 <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                            <h4 class="text-3xl font-black text-secondary mb-6">Partnership</h4>
                            <p class="text-slate-500 leading-relaxed font-light text-lg">
                                Beyond a vendor—we are the trusted partner in your business digital evolution.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>

<style scoped>
.shadow-glow {
    box-shadow: 0 0 60px rgba(203, 163, 101, 0.1), 0 20px 50px rgba(0, 0, 0, 0.05);
}
.delay-200 { transition-delay: 200ms; }
.delay-400 { transition-delay: 400ms; }
</style>


<style scoped>
.delay-300 { transition-delay: 300ms; }
</style>
