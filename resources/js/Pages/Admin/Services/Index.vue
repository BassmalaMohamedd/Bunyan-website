<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({
    services: Array
});
</script>

<template>
    <Head title="Manage Services - Admin" />
    <AdminLayout>
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-secondary">Services Management</h1>
                    <p class="text-gray-500 mt-1">Manage all public-facing services on the platform.</p>
                </div>
                <button class="bg-primary hover:bg-primary-hover text-white px-4 py-2 rounded-lg font-medium transition-colors">
                    Add New Service
                </button>
            </div>

            <div class="bg-white rounded-xl shadow-subtle overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100 uppercase text-xs font-semibold text-gray-500 tracking-wider">
                            <th class="px-6 py-4">Title (EN)</th>
                            <th class="px-6 py-4">Title (AR)</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr v-for="service in services" :key="service.id" class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 font-medium text-secondary">{{ service.title.en }}</td>
                            <td class="px-6 py-4 text-gray-600 truncate max-w-[200px]">{{ service.title.ar }}</td>
                            <td class="px-6 py-4">
                                <span v-if="service.is_active" class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Active</span>
                                <span v-else class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-medium">Draft</span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-3 text-sm">
                                <button class="text-primary hover:text-primary-hover font-medium">Edit</button>
                                <button class="text-red-500 hover:text-red-700 font-medium">Delete</button>
                            </td>
                        </tr>
                        <tr v-if="services && services.length === 0">
                            <td colspan="4" class="px-6 py-8 text-center text-gray-500">No services found.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
