<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="h-screen bg-[#f8fafc] flex font-sans selection:bg-primary selection:text-white overflow-hidden">
        <!-- Mobile Sidebar Overlay -->
        <div v-if="showingNavigationDropdown" 
            @click="showingNavigationDropdown = false"
            class="fixed inset-0 bg-secondary/60 backdrop-blur-sm z-40 md:hidden transition-opacity duration-300">
        </div>

        <!-- Mobile Sidebar -->
        <aside :class="showingNavigationDropdown ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 w-72 bg-secondary text-white z-[70] md:hidden transition-transform duration-500 shadow-2xl overflow-y-auto">
            <div class="h-24 flex items-center px-8 border-b border-white/5">
                <span class="font-black text-lg tracking-tight uppercase">Arkan <span class="text-primary">Admin</span></span>
            </div>
            <nav class="p-6 space-y-2">
                <!-- Duplicate links for mobile for brevity in this replace, ideally shared component -->
                <Link :href="route('admin.dashboard')" @click="showingNavigationDropdown = false" class="flex items-center gap-4 px-4 py-4 rounded-2xl transition-all" :class="route().current('admin.dashboard') ? 'bg-primary text-secondary' : 'text-gray-400'">
                    Dashboard
                </Link>
                <Link :href="route('admin.home.edit')" @click="showingNavigationDropdown = false" class="flex items-center gap-4 px-4 py-4 rounded-2xl transition-all" :class="route().current('admin.home.*') ? 'bg-primary text-secondary' : 'text-gray-400'">
                    Home
                </Link>
                <Link :href="route('admin.pages.index')" @click="showingNavigationDropdown = false" class="flex items-center gap-4 px-4 py-4 rounded-2xl transition-all" :class="route().current('admin.pages.*') ? 'bg-primary text-secondary' : 'text-gray-400'">
                    About Us
                </Link>
                <Link :href="route('admin.news.index')" @click="showingNavigationDropdown = false" class="flex items-center gap-4 px-4 py-4 rounded-2xl transition-all" :class="route().current('admin.news.*') ? 'bg-primary text-secondary' : 'text-gray-400'">
                    News
                </Link>
                <Link :href="route('admin.services.index')" @click="showingNavigationDropdown = false" class="flex items-center gap-4 px-4 py-4 rounded-2xl transition-all" :class="route().current('admin.services.*') ? 'bg-primary text-secondary' : 'text-gray-400'">
                    Services
                </Link>
                <Link :href="route('admin.leads.index')" @click="showingNavigationDropdown = false" class="flex items-center gap-4 px-4 py-4 rounded-2xl transition-all" :class="route().current('admin.leads.*') ? 'bg-primary text-secondary' : 'text-gray-400'">
                    Leads
                </Link>
                <div class="pt-6 border-t border-white/5 text-[0.6rem] font-black text-gray-500 uppercase tracking-[0.2em] mb-4 px-4">Session</div>
                <Link :href="route('logout')" method="post" as="button" @click="showingNavigationDropdown = false" class="flex items-center gap-4 w-full px-4 py-4 rounded-2xl text-gray-400 hover:text-red-400 hover:bg-red-400/10 transition-all group">
                    <svg class="w-5 h-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <span class="font-bold text-sm relative z-10 uppercase tracking-widest">Logout</span>
                </Link>
            </nav>
        </aside>

        <!-- Sidebar (Desktop) -->
        <aside class="w-72 bg-[#0a192f] text-white hidden md:flex flex-col flex-shrink-0 relative z-[60] transition-all duration-500 shadow-2xl">
            <!-- Sidebar Header with Glow -->
            <div class="h-24 flex items-center px-8 relative overflow-hidden group">
                <div class="absolute inset-0 bg-gradient-to-r from-primary/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                <Link :href="route('admin.dashboard')" class="flex items-center gap-4 relative z-10">
                    <div class="w-10 h-10 bg-primary rounded-xl flex justify-center items-center shadow-lg shadow-primary/20 transform group-hover:rotate-12 transition-transform duration-500">
                        <span class="text-[#0a192f] font-black text-xl">A</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-black text-lg tracking-tight leading-none uppercase">Arkan Admin</span>
                        <span class="text-[0.6rem] font-bold text-primary tracking-[0.3em] uppercase opacity-60">Control Center</span>
                    </div>
                </Link>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 overflow-y-auto py-10 px-6 space-y-2">
                <div class="text-[0.6rem] font-black text-gray-500 uppercase tracking-[0.2em] mb-4 px-4">Directives</div>
                
                <Link :href="route('admin.dashboard')" 
                    class="flex items-center gap-4 px-4 py-4 rounded-2xl transition-all duration-300 group relative overflow-hidden"
                    :class="route().current('admin.dashboard') ? 'bg-primary text-[#0a192f] shadow-lg shadow-primary/20' : 'text-gray-400 hover:text-white hover:bg-white/5'">
                    <svg class="w-5 h-5 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span class="font-bold text-sm relative z-10">Dashboard</span>
                </Link>

                <div class="pt-6 text-[0.6rem] font-black text-gray-500 uppercase tracking-[0.2em] mb-4 px-4">Pillars</div>

                <Link :href="route('admin.home.edit')" 
                    class="flex items-center gap-4 px-4 py-4 rounded-2xl transition-all duration-300 group relative overflow-hidden"
                    :class="route().current('admin.home.*') ? 'bg-primary text-[#0a192f] shadow-lg shadow-primary/20' : 'text-gray-400 hover:text-white hover:bg-white/5'">
                    <svg class="w-5 h-5 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span class="font-bold text-sm relative z-10">Home</span>
                </Link>

                <Link :href="route('admin.pages.index')" 
                    class="flex items-center gap-4 px-4 py-4 rounded-2xl transition-all duration-300 group relative overflow-hidden"
                    :class="route().current('admin.pages.*') ? 'bg-primary text-[#0a192f] shadow-lg shadow-primary/20' : 'text-gray-400 hover:text-white hover:bg-white/5'">
                    <svg class="w-5 h-5 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <span class="font-bold text-sm relative z-10">About Us</span>
                </Link>

                <Link :href="route('admin.news.index')" 
                    class="flex items-center gap-4 px-4 py-4 rounded-2xl transition-all duration-300 group relative overflow-hidden"
                    :class="route().current('admin.news.*') ? 'bg-primary text-[#0a192f] shadow-lg shadow-primary/20' : 'text-gray-400 hover:text-white hover:bg-white/5'">
                    <svg class="w-5 h-5 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path></svg>
                    <span class="font-bold text-sm relative z-10">News</span>
                </Link>

                <Link :href="route('admin.services.index')" 
                    class="flex items-center gap-4 px-4 py-4 rounded-2xl transition-all duration-300 group relative overflow-hidden"
                    :class="route().current('admin.services.*') ? 'bg-primary text-[#0a192f] shadow-lg shadow-primary/20' : 'text-gray-400 hover:text-white hover:bg-white/5'">
                    <svg class="w-5 h-5 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    <span class="font-bold text-sm relative z-10">Services</span>
                </Link>

                <div class="pt-6 text-[0.6rem] font-black text-gray-500 uppercase tracking-[0.2em] mb-4 px-4">Communication</div>

                <Link :href="route('admin.leads.index')" 
                    class="flex items-center gap-4 px-4 py-4 rounded-2xl transition-all duration-300 group relative overflow-hidden"
                    :class="route().current('admin.leads.*') ? 'bg-primary text-[#0a192f] shadow-lg shadow-primary/20' : 'text-gray-400 hover:text-white hover:bg-white/5'">
                    <svg class="w-5 h-5 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <span class="font-bold text-sm relative z-10">Leads</span>
                </Link>

                <div class="pt-6 text-[0.6rem] font-black text-gray-500 uppercase tracking-[0.2em] mb-4 px-4">Session</div>

                <Link :href="route('logout')" method="post" as="button"
                    class="flex items-center gap-4 w-full px-4 py-4 rounded-2xl text-gray-500 hover:text-red-400 hover:bg-red-400/10 transition-all duration-300 group">
                    <svg class="w-5 h-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <span class="font-bold text-sm relative z-10 uppercase tracking-widest">Logout</span>
                </Link>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col h-screen overflow-hidden">
            <!-- Header for Mobile / Top Info for Desktop -->
            <header class="h-24 flex items-center justify-between px-10 bg-white/50 backdrop-blur-xl border-b border-gray-100 relative z-20 overflow-x-hidden">
                <div class="flex items-center gap-6">
                    <button @click="showingNavigationDropdown = !showingNavigationDropdown" class="md:hidden text-secondary">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    </button>
                    <!-- Search or Breadcrumbs can go here -->
                    <div class="hidden md:flex items-center gap-3 text-xs font-bold text-gray-400 uppercase tracking-widest">
                        <span>Terminal</span>
                        <span class="text-gray-200">/</span>
                        <span class="text-secondary tracking-normal font-black lowercase">{{ route().current() }}</span>
                    </div>
                </div>

                <div class="flex items-center gap-6">
                    <div class="hidden lg:flex flex-col items-end">
                        <span class="text-secondary font-black text-sm tracking-tight">{{ $page.props.auth.user?.name || 'Admin' }}</span>
                        <span class="text-[0.6rem] font-bold text-primary uppercase tracking-widest">Administrator</span>
                    </div>
                    <div class="w-12 h-12 bg-gray-50 rounded-2xl border-2 border-white shadow-sm flex items-center justify-center text-secondary font-black overflow-hidden ring-4 ring-gray-50/50">
                        <img v-if="$page.props.auth.user?.profile_photo_url" :src="$page.props.auth.user.profile_photo_url" class="w-full h-full object-cover" />
                        <span v-else>{{ $page.props.auth.user?.name?.charAt(0) || 'A' }}</span>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto overflow-x-hidden px-10 py-12 bg-white relative z-10">
                <!-- Decorative element -->
                <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-primary/5 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
                
                <slot />
            </main>
        </div>
    </div>
</template>

<style>
:root {
    --primary: #cba365;
    --secondary: #0a192f;
    --font-heading: 'Outfit', sans-serif;
}

body {
    font-family: 'Inter', sans-serif;
    overflow-x: hidden;
}

.font-black { font-weight: 950; }
.tracking-tight { letter-spacing: -0.05em; }
</style>
