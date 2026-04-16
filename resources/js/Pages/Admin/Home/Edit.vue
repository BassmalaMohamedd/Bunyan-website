<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    settings: Object
});

const form = useForm({
    home_hero_title: props.settings.home_hero_title || '',
    home_hero_subtitle: props.settings.home_hero_subtitle || '',
    home_stats_years: props.settings.home_stats_years || '',
    home_stats_assets: props.settings.home_stats_assets || '',
    home_stats_projects: props.settings.home_stats_projects || '',
});

const submit = () => {
    form.post(route('admin.home.update'));
};
</script>

<template>
    <Head title="Manage Home - Admin" />

    <AdminLayout>
        <div class="max-w-4xl mx-auto">
            <div class="mb-12">
                <h1 class="text-4xl font-black text-secondary tracking-tight mb-2 uppercase">Home Hub</h1>
                <p class="text-gray-400 font-medium">Coordinate the platform's primary narrative and strategic metrics.</p>
            </div>

            <form @submit.prevent="submit" class="space-y-8">
                <!-- Hero Section Management -->
                <div class="bg-white rounded-[2.5rem] p-10 shadow-xl border border-gray-100">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center text-primary">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        </div>
                        <h2 class="text-xl font-black text-secondary uppercase tracking-wider">Hero Component</h2>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-[0.65rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">Primary Narrative (Title)</label>
                            <input v-model="form.home_hero_title" type="text" 
                                class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 text-secondary font-bold focus:ring-2 focus:ring-primary/20 transition-all">
                        </div>
                        <div>
                            <label class="block text-[0.65rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">Supporting Narrative (Subtitle)</label>
                            <textarea v-model="form.home_hero_subtitle" rows="3"
                                class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 text-secondary font-bold focus:ring-2 focus:ring-primary/20 transition-all resize-none"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Strategic metrics Management -->
                <div class="bg-[#0a192f] rounded-[2.5rem] p-10 shadow-xl border border-white/5">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-10 h-10 bg-primary/20 rounded-xl flex items-center justify-center text-primary">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                        <h2 class="text-xl font-black text-white uppercase tracking-wider">Strategic Metrics</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-[0.65rem] font-black text-gray-500 uppercase tracking-[0.2em] mb-3">Years Experience</label>
                            <input v-model="form.home_stats_years" type="text" 
                                class="w-full bg-white/5 border-none rounded-2xl px-6 py-4 text-white font-bold focus:ring-2 focus:ring-primary/40 transition-all">
                        </div>
                        <div>
                            <label class="block text-[0.65rem] font-black text-gray-500 uppercase tracking-[0.2em] mb-3">Assets Valued</label>
                            <input v-model="form.home_stats_assets" type="text" 
                                class="w-full bg-white/5 border-none rounded-2xl px-6 py-4 text-white font-bold focus:ring-2 focus:ring-primary/40 transition-all">
                        </div>
                        <div>
                            <label class="block text-[0.65rem] font-black text-gray-500 uppercase tracking-[0.2em] mb-3">Completed Projects</label>
                            <input v-model="form.home_stats_projects" type="text" 
                                class="w-full bg-white/5 border-none rounded-2xl px-6 py-4 text-white font-bold focus:ring-2 focus:ring-primary/40 transition-all">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end pt-4">
                    <button type="submit" :disabled="form.processing"
                        class="bg-primary hover:bg-[#b88d4d] text-[#0a192f] px-12 py-5 rounded-2xl font-black transition-all shadow-xl shadow-primary/20 flex items-center gap-3 disabled:opacity-50">
                        <span v-if="form.processing">Synchronizing...</span>
                        <span v-else>Apply Transformation</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </button>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>

<style scoped>
.font-black { font-weight: 950; }
</style>
