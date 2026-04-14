document.addEventListener('DOMContentLoaded', () => {

    // ─── Scroll Reveal Animation ────────────────────────────────────────────
    const revealEls = document.querySelectorAll('.reveal, .reveal-left, .reveal-scale, .reveal-slow');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -60px 0px' });

    revealEls.forEach((el, i) => {
        // Add stagger delay based on sibling index in the same parent grid/flex
        const parent = el.parentElement;
        if (parent && (parent.style.display === 'grid' || parent.style.display === 'flex')) {
            const siblings = [...parent.children].filter(c => c.classList.contains('reveal') || c.classList.contains('reveal-slow'));
            const idx = siblings.indexOf(el);
            if (idx > 0) el.style.transitionDelay = `${idx * 0.12}s`;
        }
        observer.observe(el);
    });

    // ─── Navbar Logic ───────────────────────────────────────────────────────
    const nav = document.getElementById('main-nav');
    if (!nav) return;

    const isHome = nav.classList.contains('nav-glass');

    function updateNav() {
        const scrolled = window.scrollY > 60;
        if (isHome) {
            if (scrolled) {
                nav.classList.add('nav-scrolled');
                nav.classList.remove('nav-glass');
            } else {
                nav.classList.remove('nav-scrolled');
                nav.classList.add('nav-glass');
            }
        }
    }

    window.addEventListener('scroll', updateNav, { passive: true });
    updateNav(); // run on load

    // ─── Smooth Anchor Scroll ───────────────────────────────────────────────
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const id = this.getAttribute('href');
            if (id === '#') return;
            const el = document.querySelector(id);
            if (el) { e.preventDefault(); el.scrollIntoView({ behavior: 'smooth' }); }
        });
    });
});
