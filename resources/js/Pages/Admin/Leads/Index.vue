<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({
    leads: Array
});
</script>

<template>
    <Head title="Direct Dialogue Registry - Admin" />
    <AdminLayout>
        <div class="max-w-7xl mx-auto">
            <!-- Header Section -->
            <div class="flex justify-between items-end mb-12">
                <div>
                    <span class="text-primary font-bold tracking-[0.2em] text-xs uppercase mb-2 block">Enterprise Connections</span>
                    <h1 class="text-4xl font-black text-secondary tracking-tight">Lead Intelligence Hub</h1>
                </div>
            </div>

            <!-- Table Container -->
            <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden transition-all">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50 border-b border-gray-100 uppercase text-[0.65rem] font-black text-gray-400 tracking-[0.15em]">
                            <th class="px-8 py-6">Reception Timestamp</th>
                            <th class="px-8 py-6">Partner Identity</th>
                            <th class="px-8 py-6">Terminal Pointer</th>
                            <th class="px-8 py-6">Engagement Status</th>
                            <th class="px-8 py-6 text-right">Operations</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        <tr v-for="lead in leads" :key="lead.id" class="group hover:bg-gray-50/80 transition-all duration-300">
                            <td class="px-8 py-6">
                                <div class="flex flex-col">
                                    <span class="font-bold text-secondary text-base">{{ new Date(lead.created_at).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' }) }}</span>
                                    <span class="text-[0.65rem] text-gray-400 font-bold uppercase tracking-widest">{{ new Date(lead.created_at).toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' }) }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex flex-col">
                                    <span class="font-bold text-secondary text-lg group-hover:text-primary transition-colors leading-tight">{{ lead.name }}</span>
                                    <span class="text-sm text-gray-400 font-medium lowercase">{{ lead.email }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <span class="bg-gray-100 text-gray-500 px-3 py-1 rounded-full text-xs font-mono font-bold tracking-tight">{{ lead.phone }}</span>
                            </td>
                            <td class="px-8 py-6">
                                <span v-if="lead.status === 'new'" class="bg-amber-50 text-amber-600 px-4 py-1.5 rounded-full text-[0.65rem] font-black uppercase tracking-widest">Awaiting Analysis</span>
                                <span v-else-if="lead.status === 'contacted'" class="bg-blue-50 text-blue-600 px-4 py-1.5 rounded-full text-[0.65rem] font-black uppercase tracking-widest">Active Dialogue</span>
                                <span v-else class="bg-gray-50 text-gray-500 px-4 py-1.5 rounded-full text-[0.65rem] font-black uppercase tracking-widest">Archived</span>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <Link :href="route('admin.leads.show', lead.id)" class="p-3 text-secondary hover:bg-white hover:shadow-md rounded-xl transition-all border border-transparent hover:border-gray-100">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    </Link>
                                </div>
                            </td>
                        </tr>
                        <tr v-if="!leads || leads.length === 0">
                            <td colspan="5" class="px-8 py-20 text-center">
                                <div class="max-w-xs mx-auto">
                                    <div class="w-20 h-20 bg-gray-50 rounded-3xl flex items-center justify-center mx-auto mb-6 text-gray-200">
                                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <p class="text-gray-400 font-medium">No incoming enterprise transmissions detected.</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
