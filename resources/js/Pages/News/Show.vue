<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';

defineProps({
    post: Object
});
</script>

<template>
    <Head :title="post.title.en + ' - Arkan Real Estate'" />
    <PublicLayout>
        <!-- Article Header -->
        <section class="pt-32 pb-16 bg-white border-b border-gray-100">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 animate-fade-in">
                <Link :href="route('news.index')" class="text-primary hover:underline text-sm mb-6 inline-block tracking-wide">&larr; Back to News</Link>
                <div class="mb-6 flex items-center gap-4 text-sm text-gray-500">
                    <span class="bg-gray-100 px-3 py-1 rounded-full font-medium">Market Report</span>
                    <span>{{ new Date(post.published_at).toLocaleDateString(undefined, { year: 'numeric', month: 'long', day: 'numeric' }) }}</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold font-heading text-secondary mb-8 leading-tight">{{ post.title.en }}</h1>
            </div>
        </section>

        <!-- Article Content -->
        <section class="py-16 bg-white">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                <article class="prose prose-lg text-gray-600 prose-headings:font-heading prose-headings:text-secondary max-w-none">
                    <p class="text-xl font-light leading-relaxed mb-8">{{ post.content.en }}</p>
                    <p>Understanding market conditions is crucial for strategic real estate planning. This report highlights key indicators that will shape the local market trajectory through 2025 and beyond.</p>
                </article>

                <!-- Share or CTA -->
                <div class="mt-16 pt-8 border-t border-gray-100">
                    <p class="font-heading font-bold text-lg mb-4 text-secondary">Share this insight</p>
                    <div class="flex gap-4">
                        <button class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-500 hover:text-primary hover:bg-primary/10 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </button>
                        <button class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-500 hover:text-primary hover:bg-primary/10 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>
