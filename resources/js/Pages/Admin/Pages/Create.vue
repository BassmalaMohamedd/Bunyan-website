<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const form = useForm({
    slug: '',
    title: { en: '', ar: '' },
    content: { en: '', ar: '' },
});

const submit = () => {
    form.post(route('admin.pages.store'));
};
</script>

<template>
    <Head title="Establish Page - Admin" />
    <AdminLayout>
        <div class="max-w-4xl mx-auto">
            <div class="mb-12">
                <Link :href="route('admin.pages.index')" class="text-gray-400 hover:text-primary transition-colors flex items-center gap-2 mb-6 font-bold uppercase text-xs tracking-widest">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    Back to Registry
                </Link>
                <h1 class="text-4xl font-black text-secondary tracking-tight">Establish New Segment</h1>
                <p class="text-gray-400 mt-2 font-medium">Define a new dynamic pillar for the Arkan ecosystem.</p>
            </div>

            <form @submit.prevent="submit" class="space-y-8">
                <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 p-10">
                    <div class="grid grid-cols-1 gap-10">
                        <!-- URL Pointer -->
                        <div>
                            <label class="block text-[0.65rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">URL Pointer (Slug)</label>
                            <div class="relative">
                                <span class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-300 font-mono text-lg">/</span>
                                <input v-model="form.slug" type="text" placeholder="about-arkan" required
                                    class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-primary focus:ring-0 rounded-2xl py-4 pl-10 pr-6 text-secondary font-bold transition-all" />
                            </div>
                            <p v-if="form.errors.slug" class="text-red-500 text-xs mt-2 font-bold uppercase tracking-wider">{{ form.errors.slug }}</p>
                        </div>

                        <div class="grid grid-cols-2 gap-10 border-t border-gray-50 pt-10">
                            <!-- English Identity -->
                            <div class="space-y-6">
                                <div class="flex items-center gap-3">
                                    <span class="w-8 h-8 rounded-lg bg-secondary text-white flex items-center justify-center text-[10px] font-black uppercase">EN</span>
                                    <h3 class="text-sm font-black text-secondary uppercase tracking-widest">Global Specification</h3>
                                </div>
                                <div>
                                    <label class="block text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">Project Title</label>
                                    <input v-model="form.title.en" type="text" placeholder="The Arkan Legacy" required
                                        class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-primary focus:ring-0 rounded-2xl py-4 px-6 text-secondary font-bold transition-all" />
                                </div>
                                <div>
                                    <label class="block text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">Strategic Content</label>
                                    <textarea v-model="form.content.en" rows="12" placeholder="Detail the innovation..."
                                        class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-primary focus:ring-0 rounded-2xl py-4 px-6 text-secondary font-medium transition-all resize-none"></textarea>
                                </div>
                            </div>

                            <!-- Arabic Identity -->
                            <div class="space-y-6" dir="rtl">
                                <div class="flex items-center gap-3 flex-row-reverse">
                                    <span class="w-8 h-8 rounded-lg bg-primary text-white flex items-center justify-center text-[10px] font-black uppercase">AR</span>
                                    <h3 class="text-sm font-black text-secondary uppercase tracking-widest">Arabic Specification</h3>
                                </div>
                                <div>
                                    <label class="block text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-3 text-right">عنوان المشروع</label>
                                    <input v-model="form.title.ar" type="text" placeholder="إرث أركان" required
                                        class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-primary focus:ring-0 rounded-2xl py-4 px-6 text-secondary font-bold transition-all text-right" />
                                </div>
                                <div>
                                    <label class="block text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-3 text-right">المحتوى الاستراتيجي</label>
                                    <textarea v-model="form.content.ar" rows="12" placeholder="تفاصيل الابتكار..."
                                        class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-primary focus:ring-0 rounded-2xl py-4 px-6 text-secondary font-medium transition-all resize-none text-right"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-6">
                    <Link :href="route('admin.pages.index')" class="px-8 py-4 text-gray-400 hover:text-secondary font-bold uppercase text-xs tracking-widest transition-colors">Cancel</Link>
                    <button type="submit" :disabled="form.processing"
                        class="bg-secondary hover:bg-opacity-90 text-white px-12 py-4 rounded-2xl font-black transition-all shadow-xl shadow-secondary/20 flex items-center gap-4 disabled:opacity-50">
                        <span v-if="form.processing">Synchronizing...</span>
                        <span v-else>Authorize Publication</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>
