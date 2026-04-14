<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({
    posts: Array
});
</script>

<template>
    <Head title="Manage News - Admin" />
    <AdminLayout>
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-secondary">News & Insights Management</h1>
                </div>
                <button class="bg-primary hover:bg-primary-hover text-white px-4 py-2 rounded-lg font-medium transition-colors">
                    Publish New Insight
                </button>
            </div>

            <div class="bg-white rounded-xl shadow-subtle overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100 uppercase text-xs font-semibold text-gray-500 tracking-wider">
                            <th class="px-6 py-4">Date</th>
                            <th class="px-6 py-4">Title (EN)</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr v-for="post in posts" :key="post.id" class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ new Date(post.published_at).toLocaleDateString() }}</td>
                            <td class="px-6 py-4 font-medium text-secondary truncate max-w-[300px]">{{ post.title.en }}</td>
                            <td class="px-6 py-4 text-right space-x-3 text-sm">
                                <button class="text-primary hover:text-primary-hover font-medium">Edit</button>
                                <button class="text-red-500 hover:text-red-700 font-medium">Delete</button>
                            </td>
                        </tr>
                        <tr v-if="!posts || posts.length === 0">
                            <td colspan="3" class="px-6 py-8 text-center text-gray-500">No news posts found.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
