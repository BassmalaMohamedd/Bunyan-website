<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    auth: Object,
    stats: Object
});
</script>

<template>
    <Head title="Strategic Console - Admin" />

    <AdminLayout>
        <div class="max-w-7xl mx-auto">
            <!-- Hero Welcome -->
            <div class="mb-16 relative">
                <div class="relative z-10">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="w-3 h-3 bg-green-500 rounded-full animate-pulse shadow-[0_0_10px_rgba(34,197,94,0.5)]"></span>
                        <span class="text-primary font-bold tracking-[0.3em] text-[0.65rem] uppercase block">Platform Operational | Specialized Hub</span>
                    </div>
                    <h1 class="text-5xl font-black text-secondary tracking-tight mb-4">
                        Welcome back, <br>
                        <span class="text-primary italic font-serif tracking-normal">{{ auth.user.name }}</span>
                    </h1>
                    <p class="text-gray-400 font-medium max-w-lg leading-relaxed">
                        The Arkan digital ecosystem is operating within optimal parameters. Unified control over market intelligence and specialized services is at your disposal.
                    </p>
                </div>
            </div>

            <!-- Strategic Metrics Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <!-- Data Pillar 1: Intelligence -->
                <div class="bg-white rounded-[2.5rem] p-10 shadow-xl shadow-gray-200/40 border border-gray-100 group hover:border-primary transition-all duration-500 transform hover:-translate-y-2 relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-8 opacity-5 text-secondary">
                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path></svg>
                    </div>
                    <div class="w-14 h-14 bg-[#0a192f] rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-secondary/10 group-hover:bg-primary transition-colors">
                        <svg class="w-6 h-6 text-primary group-hover:text-secondary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path></svg>
                    </div>
                    <div class="flex justify-between items-end mb-4">
                        <h3 class="text-2xl font-black text-secondary tracking-tight">News</h3>
                        <span class="text-4xl font-black text-secondary/10 group-hover:text-primary transition-colors">{{ stats.newsCount }}</span>
                    </div>
                    <p class="text-gray-400 text-sm font-medium leading-relaxed mb-8">Manage market insights and professional publications across the global network.</p>
                    <Link :href="route('admin.news.index')" class="flex items-center gap-2 text-primary font-black text-[0.65rem] uppercase tracking-[0.2em] group-hover:gap-4 transition-all">
                        Registry Portal
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </Link>
                </div>

                <!-- Data Pillar 2: Ecosystem -->
                <div class="bg-white rounded-[2.5rem] p-10 shadow-xl shadow-gray-200/40 border border-gray-100 group hover:border-primary transition-all duration-500 transform hover:-translate-y-2 relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-8 opacity-5 text-secondary">
                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <div class="w-14 h-14 bg-[#0a192f] rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-secondary/10 group-hover:bg-primary transition-colors">
                        <svg class="w-6 h-6 text-primary group-hover:text-secondary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <div class="flex justify-between items-end mb-4">
                        <h3 class="text-2xl font-black text-secondary tracking-tight">Services</h3>
                        <span class="text-4xl font-black text-secondary/10 group-hover:text-primary transition-colors">{{ stats.servicesCount }}</span>
                    </div>
                    <p class="text-gray-400 text-sm font-medium leading-relaxed mb-8">Maintain the architectural integrity of specialized service modules and products.</p>
                    <Link :href="route('admin.services.index')" class="flex items-center gap-2 text-primary font-black text-[0.65rem] uppercase tracking-[0.2em] group-hover:gap-4 transition-all">
                        Asset Control
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </Link>
                </div>

                <!-- Data Pillar 3: Leads -->
                <div class="bg-white rounded-[2.5rem] p-10 shadow-xl shadow-gray-200/40 border border-gray-100 group hover:border-primary transition-all duration-500 transform hover:-translate-y-2 relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-8 opacity-5 text-secondary">
                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <div class="w-14 h-14 bg-[#0a192f] rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-secondary/10 group-hover:bg-primary transition-colors">
                        <svg class="w-6 h-6 text-primary group-hover:text-secondary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <div class="flex justify-between items-end mb-4">
                        <h3 class="text-2xl font-black text-secondary tracking-tight">Leads</h3>
                        <span class="text-4xl font-black text-secondary/10 group-hover:text-primary transition-colors">{{ stats.leadsCount }}</span>
                    </div>
                    <p class="text-gray-400 text-sm font-medium leading-relaxed mb-8">Monitor incoming dialogue transmissions and enterprise inquiries in real-time.</p>
                    <Link :href="route('admin.leads.index')" class="flex items-center gap-2 text-primary font-black text-[0.65rem] uppercase tracking-[0.2em] group-hover:gap-4 transition-all">
                        Direct Inbound
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </Link>
                </div>
            </div>

            <!-- central Control Hub: Dynamic Content -->
            <div class="bg-[#0a192f] rounded-[3rem] p-16 relative overflow-hidden shadow-2xl group border border-primary/10">
                <!-- Background Decoration -->
                <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-primary/10 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2 group-hover:bg-primary/20 transition-all duration-1000"></div>
                
                <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-12">
                    <div class="max-w-xl">
                        <div class="flex items-center gap-4 mb-6">
                            <span class="text-primary font-bold tracking-[0.4em] text-[0.65rem] uppercase block">Platform Synchronization</span>
                            <div class="flex-1 h-[1px] bg-primary/20"></div>
                        </div>
                        <h2 class="text-5xl font-black text-white tracking-tighter mb-6 leading-[0.9]">Universal Page <br> Architecture.</h2>
                        <p class="text-gray-400 font-medium leading-relaxed mb-10 text-lg">
                            Take absolute command over the platform's skeletal infrastructure. Update core narratives, Vision 2030 alignments, and heritage segments from a centralized dynamic console.
                        </p>
                        <div class="flex gap-4">
                            <Link :href="route('admin.home.edit')" class="bg-primary hover:bg-[#b88d4d] text-[#0a192f] px-8 py-4 rounded-xl font-black transition-all shadow-xl shadow-primary/20 flex items-center gap-3 w-fit group/btn text-sm">
                                Manage Home
                                <svg class="w-5 h-5 transform group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            </Link>
                            <Link :href="route('admin.pages.index')" class="bg-white/10 hover:bg-white/20 text-white px-8 py-4 rounded-xl font-black transition-all flex items-center gap-3 w-fit group/btn text-sm border border-white/10 backdrop-blur-sm">
                                About Us
                                <svg class="w-5 h-5 transform group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </Link>
                        </div>
                    </div>
                    <div class="hidden lg:block relative">
                        <div class="absolute inset-0 bg-primary/10 blur-[80px] rounded-full animate-pulse"></div>
                        <div class="w-96 h-96 bg-white/5 rounded-[4rem] border border-white/10 flex items-center justify-center p-16 backdrop-blur-2xl relative z-20">
                            <svg class="w-full h-full text-primary opacity-30 group-hover:opacity-60 transition-opacity duration-1000" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<style scoped>
.font-black { font-weight: 950; }
.tracking-tight { letter-spacing: -0.05em; }
</style>
