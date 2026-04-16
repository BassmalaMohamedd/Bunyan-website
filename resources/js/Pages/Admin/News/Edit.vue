<script setup>
import { Head, useForm, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const props = defineProps({
    post: Object
});

const form = useForm({
    slug: props.post.slug,
    title: { 
        en: props.post.title.en, 
        ar: props.post.title.ar 
    },
    content: { 
        en: props.post.content.en, 
        ar: props.post.content.ar 
    },
    image: props.post.image || '',
    published_at: props.post.published_at ? props.post.published_at.split('T')[0] : '',
});

const submit = () => {
    form.put(route('admin.news.update', props.post.id));
};
</script>

<template>
    <Head :title="`Refining ${post.title.en} - Admin`" />
    <AdminLayout>
        <div class="max-w-4xl mx-auto">
            <div class="mb-12">
                <Link :href="route('admin.news.index')" class="text-gray-400 hover:text-primary transition-colors flex items-center gap-2 mb-6 font-bold uppercase text-xs tracking-widest">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    Back to Insights
                </Link>
                <div class="flex items-center gap-4 mb-2">
                    <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-[0.6rem] font-black uppercase tracking-widest leading-none">Intelligence Refinement</span>
                    <span class="text-gray-300">/</span>
                    <span class="text-gray-400 font-mono text-xs">ID: {{ post.id }}</span>
                </div>
                <h1 class="text-4xl font-black text-secondary tracking-tight">Modify Intel: {{ post.title.en }}</h1>
            </div>

            <form @submit.prevent="submit" class="space-y-8">
                <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 p-10">
                    <div class="grid grid-cols-1 gap-10">
                        <!-- URL Pointer & Image -->
                        <div class="grid grid-cols-2 gap-10">
                            <div>
                                <label class="block text-[0.65rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">Intel Pointer (Slug)</label>
                                <input v-model="form.slug" type="text" placeholder="riyadh-market-2026" required
                                    class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-primary focus:ring-0 rounded-2xl py-4 px-6 text-secondary font-bold transition-all" />
                                <p v-if="form.errors.slug" class="text-red-500 text-xs mt-2 font-bold uppercase tracking-wider">{{ form.errors.slug }}</p>
                            </div>
                            <div>
                                <label class="block text-[0.65rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">Publication Date</label>
                                <input v-model="form.published_at" type="date" required
                                    class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-primary focus:ring-0 rounded-2xl py-4 px-6 text-secondary font-bold transition-all" />
                            </div>
                        </div>

                        <div>
                            <label class="block text-[0.65rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">Feature Image Pointer (URL/Path)</label>
                            <input v-model="form.image" type="text" placeholder="/images/intel/market-analysis.jpg"
                                class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-primary focus:ring-0 rounded-2xl py-4 px-6 text-secondary font-bold transition-all" />
                        </div>

                        <div class="grid grid-cols-2 gap-10 border-t border-gray-50 pt-10">
                            <!-- English Content -->
                            <div class="space-y-6">
                                <div class="flex items-center gap-3">
                                    <span class="w-8 h-8 rounded-lg bg-secondary text-white flex items-center justify-center text-[10px] font-black uppercase">EN</span>
                                    <h3 class="text-sm font-black text-secondary uppercase tracking-widest">Global Intelligence</h3>
                                </div>
                                <div>
                                    <label class="block text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">Intelligence Title</label>
                                    <input v-model="form.title.en" type="text" placeholder="Riyadh Commercial Outlook" required
                                        class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-primary focus:ring-0 rounded-2xl py-4 px-6 text-secondary font-bold transition-all" />
                                </div>
                                <div>
                                    <label class="block text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">Analysis Content</label>
                                    <textarea v-model="form.content.en" rows="12" placeholder="Detail the market analysis..." required
                                        class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-primary focus:ring-0 rounded-2xl py-4 px-6 text-secondary font-medium transition-all resize-none"></textarea>
                                </div>
                            </div>

                            <!-- Arabic Content -->
                            <div class="space-y-6" dir="rtl">
                                <div class="flex items-center gap-3 flex-row-reverse">
                                    <span class="w-8 h-8 rounded-lg bg-primary text-white flex items-center justify-center text-[10px] font-black uppercase">AR</span>
                                    <h3 class="text-sm font-black text-secondary uppercase tracking-widest">Arabic Intelligence</h3>
                                </div>
                                <div>
                                    <label class="block text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-3 text-right">عنوان التقرير</label>
                                    <input v-model="form.title.ar" type="text" placeholder="آفاق السوق التجاري في الرياض" required
                                        class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-primary focus:ring-0 rounded-2xl py-4 px-6 text-secondary font-bold transition-all text-right" />
                                </div>
                                <div>
                                    <label class="block text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-3 text-right">محتوى التحليل</label>
                                    <textarea v-model="form.content.ar" rows="12" placeholder="تفاصيل تقرير السوق..." required
                                        class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-primary focus:ring-0 rounded-2xl py-4 px-6 text-secondary font-medium transition-all resize-none text-right"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-6">
                    <Link :href="route('admin.news.index')" class="px-8 py-4 text-gray-400 hover:text-secondary font-bold uppercase text-xs tracking-widest transition-colors">Cancel</Link>
                    <button type="submit" :disabled="form.processing"
                        class="bg-primary hover:bg-opacity-90 text-white px-12 py-4 rounded-2xl font-black transition-all shadow-xl shadow-primary/20 flex items-center gap-4 disabled:opacity-50">
                        <span v-if="form.processing">Synchronizing...</span>
                        <span v-else>Update Intel Protocol</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>
