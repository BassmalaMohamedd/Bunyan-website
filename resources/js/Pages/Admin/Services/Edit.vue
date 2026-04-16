<script setup>
import { Head, useForm, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const props = defineProps({
    service: Object
});

const form = useForm({
    slug: props.service.slug,
    title: { 
        en: props.service.title.en, 
        ar: props.service.title.ar 
    },
    description: { 
        en: props.service.description.en, 
        ar: props.service.description.ar 
    },
    icon: props.service.icon || '',
    is_active: Boolean(props.service.is_active),
});

const submit = () => {
    form.put(route('admin.services.update', props.service.id));
};
</script>

<template>
    <Head :title="`Reconfiguring ${service.title.en} - Admin`" />
    <AdminLayout>
        <div class="max-w-4xl mx-auto">
            <div class="mb-12">
                <Link :href="route('admin.services.index')" class="text-gray-400 hover:text-primary transition-colors flex items-center gap-2 mb-6 font-bold uppercase text-xs tracking-widest">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    Back to Ecosystem
                </Link>
                <div class="flex items-center gap-4 mb-2">
                    <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-[0.6rem] font-black uppercase tracking-widest leading-none">Modular Optimization</span>
                    <span class="text-gray-300">/</span>
                    <span class="text-gray-400 font-mono text-xs">ID: {{ service.id }}</span>
                </div>
                <h1 class="text-4xl font-black text-secondary tracking-tight">Modify Service: {{ service.title.en }}</h1>
            </div>

            <form @submit.prevent="submit" class="space-y-8">
                <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 p-10">
                    <div class="grid grid-cols-1 gap-10">
                        <!-- URL Pointer & Icon -->
                        <div class="grid grid-cols-2 gap-10">
                            <div>
                                <label class="block text-[0.65rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">Service Pointer (Slug)</label>
                                <input v-model="form.slug" type="text" placeholder="property-valuation" required
                                    class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-primary focus:ring-0 rounded-2xl py-4 px-6 text-secondary font-bold transition-all" />
                                <p v-if="form.errors.slug" class="text-red-500 text-xs mt-2 font-bold uppercase tracking-wider">{{ form.errors.slug }}</p>
                            </div>
                            <div>
                                <label class="block text-[0.65rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">Visual Icon Class</label>
                                <input v-model="form.icon" type="text" placeholder="home-valuation-icon"
                                    class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-primary focus:ring-0 rounded-2xl py-4 px-6 text-secondary font-bold transition-all" />
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-10 border-t border-gray-50 pt-10">
                            <!-- English Specification -->
                            <div class="space-y-6">
                                <div class="flex items-center gap-3">
                                    <span class="w-8 h-8 rounded-lg bg-secondary text-white flex items-center justify-center text-[10px] font-black uppercase">EN</span>
                                    <h3 class="text-sm font-black text-secondary uppercase tracking-widest">Global Specification</h3>
                                </div>
                                <div>
                                    <label class="block text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">Service Identity</label>
                                    <input v-model="form.title.en" type="text" placeholder="Specialized Valuation" required
                                        class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-primary focus:ring-0 rounded-2xl py-4 px-6 text-secondary font-bold transition-all" />
                                </div>
                                <div>
                                    <label class="block text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">Service description</label>
                                    <textarea v-model="form.description.en" rows="8" placeholder="Outline the specialized value proposition..."
                                        class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-primary focus:ring-0 rounded-2xl py-4 px-6 text-secondary font-medium transition-all resize-none"></textarea>
                                </div>
                            </div>

                            <!-- Arabic Specification -->
                            <div class="space-y-6" dir="rtl">
                                <div class="flex items-center gap-3 flex-row-reverse">
                                    <span class="w-8 h-8 rounded-lg bg-primary text-white flex items-center justify-center text-[10px] font-black uppercase">AR</span>
                                    <h3 class="text-sm font-black text-secondary uppercase tracking-widest">Arabic Specification</h3>
                                </div>
                                <div>
                                    <label class="block text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-3 text-right">هوية الخدمة</label>
                                    <input v-model="form.title.ar" type="text" placeholder="تقييم عقاري تخصصي" required
                                        class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-primary focus:ring-0 rounded-2xl py-4 px-6 text-secondary font-bold transition-all text-right" />
                                </div>
                                <div>
                                    <label class="block text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-3 text-right">وصف الخدمة</label>
                                    <textarea v-model="form.description.ar" rows="8" placeholder="وصف القيمة المضافة..."
                                        class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-primary focus:ring-0 rounded-2xl py-4 px-6 text-secondary font-medium transition-all resize-none text-right"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-50 pt-8 flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-sm font-black text-secondary uppercase tracking-widest">Deployment Status</span>
                                <span class="text-xs text-gray-400 font-medium">Control the visibility of this module on the public platform.</span>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" v-model="form.is_active" class="sr-only peer">
                                <div class="w-14 h-8 bg-gray-100 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-primary"></div>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-6">
                    <Link :href="route('admin.services.index')" class="px-8 py-4 text-gray-400 hover:text-secondary font-bold uppercase text-xs tracking-widest transition-colors">Cancel</Link>
                    <button type="submit" :disabled="form.processing"
                        class="bg-primary hover:bg-opacity-90 text-white px-12 py-4 rounded-2xl font-black transition-all shadow-xl shadow-primary/20 flex items-center gap-4 disabled:opacity-50">
                        <span v-if="form.processing">Synchronizing...</span>
                        <span v-else>Update Service Protocol</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>
