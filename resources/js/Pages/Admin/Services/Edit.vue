<script setup>
import { Head, useForm, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const props = defineProps({
    service: Object
});

const form = useForm({
    title_en: props.service.title?.en || '',
    title_ar: props.service.title?.ar || '',
    description_en: props.service.description?.en || '',
    description_ar: props.service.description?.ar || '',
    icon: props.service.icon || '',
    is_active: Boolean(props.service.is_active),
});

const submit = () => {
    form.put(route('admin.services.update', props.service.id));
};
</script>

<template>
    <Head title="Edit Service - Admin" />
    <AdminLayout>
        <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-subtle p-8">
            <div class="mb-6 border-b border-gray-100 pb-4 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-secondary">Edit Service</h1>
                </div>
                <Link :href="route('admin.services.index')" class="text-gray-500 hover:text-primary">&larr; Back</Link>
            </div>

            <form @submit.prevent="submit" class="space-y-6">
                <!-- Identical fields as Create -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title (English)</label>
                        <input v-model="form.title_en" type="text" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary focus:border-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title (Arabic)</label>
                        <input v-model="form.title_ar" type="text" dir="rtl" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary focus:border-primary">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description (English)</label>
                        <textarea v-model="form.description_en" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary focus:border-primary"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description (Arabic)</label>
                        <textarea v-model="form.description_ar" rows="4" dir="rtl" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary focus:border-primary"></textarea>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Icon Identifier</label>
                        <input v-model="form.icon" type="text" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary focus:border-primary">
                    </div>
                    <div class="flex items-center pt-6">
                        <label class="flex items-center cursor-pointer">
                            <input v-model="form.is_active" type="checkbox" class="rounded text-primary focus:ring-primary h-5 w-5">
                            <span class="ml-2 text-gray-700">Service is Active</span>
                        </label>
                    </div>
                </div>

                <div class="pt-4 border-t border-gray-100 flex justify-end">
                    <button type="submit" :disabled="form.processing" class="bg-primary hover:bg-primary-hover text-white px-6 py-2 rounded-lg font-medium transition-colors disabled:opacity-50">
                        Update Service
                    </button>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>
