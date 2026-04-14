<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { onMounted } from 'vue';

defineProps({
    services: Array
});

onMounted(() => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.reveal, .reveal-left, .reveal-scale').forEach(el => observer.observe(el));
});
</script>

<template>
    <Head title="Our Ecosystem | Kinda Solutions" />
    <PublicLayout>
        <section class="relative pt-64 pb-32 bg-secondary overflow-hidden">
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 bg-gradient-to-tr from-secondary via-secondary/90 to-primary/5 opacity-80"></div>
                <div class="absolute -top-32 -right-32 w-[600px] h-[600px] bg-primary/10 rounded-full blur-[150px]"></div>
            </div>
            
            <div class="relative z-10 max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 text-center">
                <div class="reveal active">
                    <h2 class="text-primary font-bold tracking-[0.4em] uppercase text-[10px] mb-8">Solution Suite</h2>
                    <h1 class="text-5xl md:text-[6rem] font-black text-white leading-[0.9] mb-10 tracking-tighter">
                        Digital <span class="text-gradient">Integrity.</span>
                    </h1>
                </div>
            </div>
        </section>

        <section class="py-40 bg-slate-50 relative overflow-hidden">
             <!-- Section Decoration -->
            <div class="absolute top-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>
            
            <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                    <div v-for="service in services" :key="service.id" 
                         class="group reveal relative">
                        <div class="glass-card h-full p-12 hover:bg-white hover:shadow-glow transition-all duration-700 border-none flex flex-col">
                            <div class="w-20 h-20 bg-secondary rounded-2xl flex items-center justify-center mb-10 group-hover:bg-primary group-hover:rotate-6 transition-all duration-700 shadow-xl group-hover:shadow-primary/20">
                                 <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <h4 class="text-3xl font-black text-secondary mb-6 tracking-tight">{{ service.title.en }}</h4>
                            <p class="text-slate-500 leading-relaxed mb-12 text-lg font-light line-clamp-4 flex-grow">
                                {{ service.description?.en }}
                            </p>
                            <Link :href="route('services.show', service.slug)" class="group/btn inline-flex items-center text-xs font-black tracking-[0.2em] uppercase text-secondary hover:text-primary transition-all duration-500">
                                View Product Details
                                <div class="ml-4 flex items-center">
                                    <span class="w-8 h-[2px] bg-secondary group-hover/btn:bg-primary group-hover/btn:w-16 transition-all duration-500"></span>
                                </div>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>

<style scoped>
.glass-card {
    transition: transform 0.7s cubic-bezier(0.19, 1, 0.22, 1);
}
.group:hover .glass-card {
    transform: translateY(-15px);
}
.shadow-glow {
    box-shadow: 0 0 60px rgba(203, 163, 101, 0.1), 0 20px 50px rgba(0, 0, 0, 0.05);
}
</style>

