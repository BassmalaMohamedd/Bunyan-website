<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';

defineProps({
    service: Object
});
</script>

<template>
    <Head :title="service.title.en + ' - Arkan Real Estate'" />
    <PublicLayout>
        <section class="py-24 bg-white">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 animate-fade-in">
                <Link :href="route('services.index')" class="text-primary hover:underline text-sm mb-6 inline-block">&larr; Back to Services</Link>
                <h1 class="text-4xl md:text-5xl font-bold font-heading text-secondary mb-6">{{ service.title.en }}</h1>
                <div class="prose prose-lg text-gray-600 max-w-none">
                    <p class="text-xl font-light">{{ service.description?.en }}</p>
                    <div class="mt-8 p-6 bg-gray-50 border border-gray-100 rounded-xl">
                        <h3 class="font-heading font-bold text-xl text-secondary mb-4">Interested in this service?</h3>
                        <Link href="/#contact" class="btn-primary">Request Consultation</Link>
                    </div>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>
