<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({
    leads: Array
});
</script>

<template>
    <Head title="Manage Leads - Admin" />
    <AdminLayout>
        <div class="max-w-7xl mx-auto">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-secondary">Inquiries & Leads</h1>
                <p class="text-gray-500 mt-1">Monitor contact form submissions and valuation requests.</p>
            </div>

            <div class="bg-white rounded-xl shadow-subtle overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100 uppercase text-xs font-semibold text-gray-500 tracking-wider">
                            <th class="px-6 py-4">Date</th>
                            <th class="px-6 py-4">Name</th>
                            <th class="px-6 py-4">Phone</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr v-for="lead in leads" :key="lead.id" class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-500">{{ new Date(lead.created_at).toLocaleDateString() }}</td>
                            <td class="px-6 py-4 font-medium text-secondary">{{ lead.name }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ lead.phone }}</td>
                            <td class="px-6 py-4">
                                <span v-if="lead.status === 'new'" class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium border border-yellow-200">New</span>
                                <span v-else-if="lead.status === 'contacted'" class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium border border-blue-200">Contacted</span>
                                <span v-else class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-medium border border-gray-200">Closed</span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-3 text-sm">
                                <button class="text-primary hover:text-primary-hover font-medium">View</button>
                            </td>
                        </tr>
                        <tr v-if="!leads || leads.length === 0">
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">No leads found.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
