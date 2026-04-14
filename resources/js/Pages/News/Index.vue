<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { onMounted } from 'vue';

defineProps({
    posts: Array
});

onMounted(() => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
});
</script>

<template>
    <Head title="Market Insights | Arkan Real Estate" />
    <PublicLayout>
        <section class="relative pt-48 pb-32 bg-secondary overflow-hidden">
            <div class="relative z-10 max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 text-center reveal active">
                <h2 class="text-primary font-bold tracking-[0.2em] uppercase text-xs mb-6">Market Intel</h2>
                <h1 class="text-4xl md:text-7xl font-black text-white leading-tight mb-8">
                    Sector <span class="text-gradient">Insights.</span>
                </h1>
            </div>
        </section>

        <section class="py-32 bg-slate-50">
            <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
                <div v-if="posts.length === 0" class="text-center text-slate-400 py-32 italic">
                    No insights published yet. Check back soon.
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <div v-for="post in posts" :key="post.id" 
                         class="glass-card bg-white overflow-hidden group hover:translate-y-[-10px] transition-all duration-700 reveal">
                        <div class="h-64 bg-slate-200 relative overflow-hidden">
                             <div class="absolute inset-0 bg-gradient-to-t from-secondary/80 to-transparent z-10"></div>
                             <div class="absolute bottom-6 left-6 z-20">
                                 <span class="bg-primary text-secondary px-3 py-1 text-[10px] font-black uppercase tracking-widest rounded-md">Market Report</span>
                             </div>
                        </div>
                        <div class="p-10">
                            <h4 class="text-2xl font-black text-secondary mb-4 group-hover:text-primary transition-colors duration-500">{{ post.title.en }}</h4>
                            <p class="text-slate-500 font-light leading-relaxed mb-8 line-clamp-3">
                                {{ post.content.en }}
                            </p>
                            <div class="flex items-center justify-between pt-8 border-t border-slate-100">
                                <span class="text-xs font-bold text-slate-400 tracking-tighter uppercase">{{ new Date(post.published_at).toLocaleDateString() }}</span>
                                <Link :href="route('news.show', post.slug)" class="group inline-flex items-center text-secondary font-bold hover:text-primary transition-all">
                                    Read Insight
                                    <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>
