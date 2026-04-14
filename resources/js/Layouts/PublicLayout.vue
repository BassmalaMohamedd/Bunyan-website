<script setup>
import { Link } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted } from 'vue';

const isScrolled = ref(false);

const handleScroll = () => {
    isScrolled.value = window.scrollY > 50;
};

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
</script>

<template>
  <div class="min-h-screen flex flex-col font-sans antialiased text-slate-800 bg-slate-50">
    <!-- Navigation -->
    <header 
        :class="[
            'fixed w-full z-[60] transition-all duration-700',
            isScrolled ? 'bg-secondary/95 backdrop-blur-2xl py-4 border-b border-primary/20' : 'bg-transparent py-10'
        ]"
    >
      <div class="max-w-[1440px] mx-auto px-10">
        <div class="grid grid-cols-1 md:grid-cols-[1fr_2fr_1fr] items-center transition-all duration-500">
          <div class="flex items-center">
            <Link href="/" class="flex items-center gap-4 group">
              <span class="text-primary font-black text-3xl leading-none">|</span>
              <span class="font-heading font-black text-2xl tracking-tight text-white uppercase">
                ARKAN <span class="font-light opacity-60">REAL ESTATE</span>
              </span>
            </Link>
          </div>
          
          <nav class="hidden md:flex items-center justify-center space-x-12">
            <Link href="/" class="text-[0.75rem] font-black tracking-[0.25em] uppercase text-white/70 hover:text-primary transition-all duration-300" :class="{'text-primary': $page.url === '/'}">Home</Link>
            <Link :href="route('about')" class="text-[0.75rem] font-black tracking-[0.25em] uppercase text-white/70 hover:text-primary transition-all duration-300" :class="{'text-primary': $page.url === '/about'}">About Us</Link>
            <Link :href="route('services.index')" class="text-[0.75rem] font-black tracking-[0.25em] uppercase text-white/70 hover:text-primary transition-all duration-300" :class="{'text-primary': $page.url.startsWith('/services')}">Services</Link>
            <Link :href="route('news.index')" class="text-[0.75rem] font-black tracking-[0.25em] uppercase text-white/70 hover:text-primary transition-all duration-300" :class="{'text-primary': $page.url.startsWith('/news')}">Intelligence</Link>
          </nav>
          
          <div class="hidden md:flex items-center justify-end space-x-8">
            <a href="/#contact" class="px-8 py-3 bg-primary text-secondary text-[0.75rem] font-black tracking-[0.25em] uppercase transition-all duration-500 hover:bg-white hover:-translate-y-1">
                Dialogue
            </a>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
      <slot />
    </main>

    <!-- Footer -->
    <footer class="bg-secondary text-white py-32 border-t border-primary/10 relative overflow-hidden">
      <div class="max-w-[1440px] mx-auto px-10 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-20 mb-20">
          <div class="md:col-span-5">
            <Link href="/" class="flex items-center gap-4 mb-10">
              <span class="text-primary font-black text-3xl leading-none">|</span>
              <span class="font-heading font-black text-2xl tracking-tight text-white uppercase">
                ARKAN <span class="font-light opacity-60">REAL ESTATE</span>
              </span>
            </Link>
            <p class="text-slate-400 max-w-sm leading-8 text-lg font-light italic mb-10">
              "The center of innovation and excellence in real estate specialized services, driving digital transformation across high-value sectors since 2009."
            </p>
          </div>
          
          <div class="md:col-span-2">
            <h4 class="text-[0.75rem] font-black tracking-[0.3em] uppercase mb-10 text-white">Ecosystem</h4>
            <ul class="space-y-6">
              <li><Link :href="route('services.index')" class="text-slate-500 hover:text-primary transition-all text-sm font-medium">PropMate CMS</Link></li>
              <li><Link :href="route('services.index')" class="text-slate-500 hover:text-primary transition-all text-sm font-medium">ValueMate Appraisal</Link></li>
              <li><Link :href="route('services.index')" class="text-slate-500 hover:text-primary transition-all text-sm font-medium">AccuMate Financials</Link></li>
            </ul>
          </div>

          <div class="md:col-span-2">
            <h4 class="text-[0.75rem] font-black tracking-[0.3em] uppercase mb-10 text-white">Navigation</h4>
            <ul class="space-y-6">
              <li><Link :href="route('about')" class="text-slate-500 hover:text-primary transition-all text-sm font-medium">About Arkan</Link></li>
              <li><Link :href="route('news.index')" class="text-slate-500 hover:text-primary transition-all text-sm font-medium">Intelligence</Link></li>
              <li><a href="#" class="text-slate-500 hover:text-primary transition-all text-sm font-medium">Careers</a></li>
            </ul>
          </div>

          <div class="md:col-span-3">
            <h4 class="text-[0.75rem] font-black tracking-[0.3em] uppercase mb-10 text-white">Connectivity</h4>
            <ul class="space-y-8 text-sm text-slate-500">
              <li class="flex items-start gap-4 leading-relaxed">
                <span class="text-primary font-black uppercase tracking-widest text-xs mt-1">HQ.</span>
                <span>King Fahd Branch Rd, Al Mohammadiyah, Riyadh 12363</span>
              </li>
              <li class="flex items-start gap-4">
                <span class="text-primary font-black uppercase tracking-widest text-xs mt-1">Ph.</span>
                <span>+966 54 113 1137</span>
              </li>
              <li class="flex items-start gap-4">
                <span class="text-primary font-black uppercase tracking-widest text-xs mt-1">Em.</span>
                <span>info@arkan-realestate.sa</span>
              </li>
            </ul>
          </div>
        </div>
        
        <div class="pt-10 border-t border-white/5 flex flex-col md:flex-row justify-between items-center text-slate-600 text-[0.7rem] font-bold tracking-[0.2em] uppercase">
          <p>&copy; 2026 Arkan Real Estate. All Rights Reserved.</p>
          <div class="mt-6 md:mt-0 flex space-x-10">
            <a href="#" class="hover:text-primary transition-colors">Privacy Policy</a>
            <a href="#" class="hover:text-primary transition-colors">Terms of Use</a>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<style scoped>
/* Scoped nav adjustments */
nav a {
    position: relative;
}
nav a::after {
    content: '';
    position: absolute;
    bottom: -4px;
    left: 0;
    width: 0;
    height: 1px;
    background: var(--primary);
    transition: width 0.3s ease;
}
nav a:hover::after {
    width: 100%;
}
</style>
