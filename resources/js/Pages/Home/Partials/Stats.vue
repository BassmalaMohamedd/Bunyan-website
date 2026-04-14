<script setup>
const stats = [
    { label: 'Years in Market', value: '15+', icon: 'calendar' },
    { label: 'Active Users', value: '5K+', icon: 'users' },
    { label: 'Processed (SAR)', value: '10B+', icon: 'trending-up' },
    { label: 'Cities Served', value: '25+', icon: 'map-pin' },
];
</script>

<template>
    <section class="py-20 relative z-30 -mt-24 px-6 mb-20">
        <div class="max-w-7xl mx-auto glass-card p-12 reveal shadow-glow">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-12 divide-x divide-slate-100 divide-opacity-10">
                <div v-for="(stat, index) in stats" :key="stat.label" 
                     class="text-center group px-4"
                     :class="{'border-none': index === 0}">
                    <div class="mb-4 flex justify-center text-primary/50 group-hover:text-primary transition-colors duration-500">
                        <svg v-if="stat.icon === 'calendar'" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 00-2 2z"></path></svg>
                        <svg v-else-if="stat.icon === 'users'" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        <svg v-else-if="stat.icon === 'trending-up'" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        <svg v-else-if="stat.icon === 'map-pin'" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <p class="text-3xl md:text-5xl font-black text-secondary mb-3 group-hover:scale-110 transition-transform duration-500">
                        {{ stat.value }}
                    </p>
                    <p class="text-[10px] md:text-xs font-bold text-slate-400 uppercase tracking-widest leading-relaxed">
                        {{ stat.label }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.shadow-glow {
    box-shadow: 0 0 40px rgba(203, 163, 101, 0.05), 0 20px 50px rgba(0, 0, 0, 0.1);
}
@media (max-width: 768px) {
    .divide-x { border: none !important; }
}
</style>

