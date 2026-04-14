<script setup>
import { Link } from '@inertiajs/vue3';

const products = [
    {
        title: 'PropMate',
        desc: 'Advanced property & facility management system that centralizes residential and commercial operations.',
        icon: 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
        color: 'primary',
        delay: '0'
    },
    {
        title: 'ValueMate',
        desc: 'The leading platform for real estate valuation, ensuring data accuracy and compliance with global standards.',
        icon: 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
        color: 'primary',
        delay: '150'
    },
    {
        title: 'AccuMate',
        desc: 'Comprehensive financial and accounting management solution tailored for real estate enterprises.',
        icon: 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
        color: 'primary',
        delay: '300'
    }
];
</script>

<template>
    <section id="services" class="py-32 bg-white overflow-hidden relative">
        <!-- Floating shadow backgrounds for depth -->
        <div class="absolute top-0 right-0 w-1/2 h-full bg-slate-50/50 -skew-x-12 translate-x-1/2 -z-10"></div>
        
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-24 reveal">
                <div class="max-w-2xl">
                    <h2 class="text-primary font-bold tracking-[0.3em] uppercase text-xs mb-6">Our Ecosystem</h2>
                    <h3 class="text-4xl md:text-7xl font-black text-secondary leading-[1.1]">
                        Specialized <br/>
                        <span class="text-gradient">Innovations.</span>
                    </h3>
                </div>
                <div class="mt-12 md:mt-0">
                    <Link :href="route('services.index')" class="group inline-flex items-center text-secondary font-black text-sm tracking-widest uppercase hover:text-primary transition-all duration-500">
                        All Ecosystem
                        <div class="ml-4 flex items-center">
                            <span class="w-12 h-[2px] bg-secondary group-hover:bg-primary group-hover:w-20 transition-all duration-500"></span>
                            <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </Link>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div v-for="product in products" :key="product.title" 
                     class="group reveal relative" 
                     :style="{ transitionDelay: product.delay + 'ms' }">
                    
                    <div class="glass-card h-full p-12 hover:border-primary/30 transition-all duration-700 bg-white hover:bg-slate-50 relative overflow-hidden flex flex-col">
                        <!-- Card Background Decoration -->
                        <div class="absolute -top-12 -right-12 w-32 h-32 bg-primary/5 rounded-full blur-3xl group-hover:bg-primary/10 transition-all duration-700"></div>
                        
                        <div class="w-20 h-20 bg-secondary rounded-2xl flex items-center justify-center mb-10 group-hover:bg-primary group-hover:rotate-[10deg] transition-all duration-700 shadow-xl group-hover:shadow-primary/20">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" :d="product.icon"></path>
                            </svg>
                        </div>
                        
                        <h4 class="text-3xl font-black text-secondary mb-6 tracking-tight">{{ product.title }}</h4>
                        <p class="text-slate-500 leading-relaxed mb-12 text-lg font-light flex-grow">
                            {{ product.desc }}
                        </p>
                        
                        <div class="pt-8 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-300">Software Suite</span>
                            <a href="#" class="w-10 h-10 rounded-full border border-slate-200 flex items-center justify-center text-secondary hover:bg-primary hover:text-white hover:border-primary transition-all duration-500">
                                <svg class="w-5 h-5 ml-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.glass-card {
    transition: transform 0.7s cubic-bezier(0.19, 1, 0.22, 1);
}
.group:hover .glass-card {
    transform: translateY(-15px);
}
</style>

