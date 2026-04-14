<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="min-h-screen bg-gray-100 flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-secondary text-white hidden md:flex flex-col flex-shrink-0 relative z-30 transition-all duration-300">
            <div class="h-20 flex items-center px-6 border-b border-gray-800">
                <Link :href="route('dashboard')" class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-primary rounded flex justify-center items-center font-bold">A</div>
                    <span class="font-heading font-bold text-xl tracking-tight">Arkan Admin</span>
                </Link>
            </div>
            <nav class="flex-1 py-6 px-4 space-y-1">
                <Link :href="route('dashboard')" class="flex items-center gap-3 px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded-md transition-colors" :class="{ 'bg-gray-800 text-white': route().current('dashboard') }">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Dashboard
                </Link>
                <Link :href="route('admin.services.index')" class="flex items-center gap-3 px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded-md transition-colors" :class="{ 'bg-gray-800 text-white': route().current('admin.services.*') }">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    Services
                </Link>
                <Link :href="route('admin.news.index')" class="flex items-center gap-3 px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded-md transition-colors" :class="{ 'bg-gray-800 text-white': route().current('admin.news.*') }">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path></svg>
                    News & Insights
                </Link>
                <Link :href="route('admin.leads.index')" class="flex items-center gap-3 px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded-md transition-colors" :class="{ 'bg-gray-800 text-white': route().current('admin.leads.*') }">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    Leads Inquiries
                </Link>
            </nav>
            <div class="px-4 py-4 border-t border-gray-800">
                <Link :href="route('logout')" method="post" as="button" class="flex items-center gap-3 px-3 py-2 text-gray-400 hover:text-primary transition-colors w-full text-left">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Log Out
                </Link>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-h-screen overflow-hidden">
            <!-- Topbar for Mobile -->
            <header class="bg-white shadow-subtle h-20 flex items-center justify-between px-4 md:hidden">
                <Link :href="route('dashboard')" class="font-heading font-bold text-xl text-secondary">Arkan Admin</Link>
                <button @click="showingNavigationDropdown = !showingNavigationDropdown" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </header>

            <main class="flex-1 overflow-y-auto px-4 py-8 sm:px-6 md:py-12 lg:px-8 bg-gray-50">
                <slot />
            </main>
        </div>
    </div>
</template>

<style scoped>
.bg-secondary { background-color: var(--secondary); }
.bg-primary { background-color: var(--primary); }
.text-primary { color: var(--primary); }
.font-heading { font-family: var(--font-heading); }
.shadow-subtle { box-shadow: var(--shadow-subtle); }
</style>
