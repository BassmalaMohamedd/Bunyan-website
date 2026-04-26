@extends('layouts.public')
@section('title', 'About Us | Your Neighborhood Authority in Saudi Arabia')

@push('styles')
<style>
    body { background: var(--surface); }

    /* ─── Hero ─── */
    .about-hero {
        padding: 140px 80px 40px;
        background: var(--text-main);
        min-height: 35vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }
    .about-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 70% 30%, rgba(68,110,46,0.1) 0%, transparent 70%);
        pointer-events: none;
    }
    .about-hero-content {
        max-width: 1440px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 100px;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    /* ─── Story Section ─── */
    .story-section {
        padding: 100px 80px;
        background: #fff;
    }
    .story-card {
        background: var(--surface-secondary);
        padding: 80px;
        border-radius: var(--radius-xl);
        position: relative;
        overflow: hidden;
        margin-top: -60px;
        z-index: 10;
        box-shadow: var(--shadow-lg);
    }
    .story-card::after {
        content: '';
        position: absolute;
        bottom: -50px; right: -50px;
        width: 300px; height: 300px;
        background: radial-gradient(circle, rgba(68,110,46,0.05) 0%, transparent 70%);
        border-radius: 50%;
    }

    /* ─── Values ─── */
    .values-bento {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
        padding: 80px;
    }
    .value-box {
        background: #fff;
        padding: 60px 48px;
        border: 1px solid var(--border-color);
        border-radius: var(--radius-lg);
        transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
        overflow: hidden;
    }
    .value-box:hover {
        transform: translateY(-8px);
        border-color: var(--primary);
        box-shadow: var(--shadow-glow);
    }
    .value-box .v-icon {
        width: 52px; height: 52px;
        background: var(--surface-secondary);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 32px;
        color: var(--primary);
        transition: all 0.3s;
    }
    .value-box:hover .v-icon {
        background: var(--primary);
        color: #fff;
    }

    /* ─── Vision Column ─── */
    .vision-block {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;
        align-items: center;
        padding: 100px 80px;
        background: var(--text-main);
        color: #fff;
        border-radius: var(--radius-xl);
        margin: 0 80px 100px;
    }

    /* ─── Leadership ─── */
    .lead-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 32px;
        padding: 100px 80px;
        background: #fff;
    }
    .lead-card {
        text-align: center;
    }
    .lead-img {
        width: 100%;
        aspect-ratio: 1;
        border-radius: var(--radius-lg);
        background: var(--surface-secondary);
        overflow: hidden;
        margin-bottom: 24px;
    }
    .lead-img img { width: 100%; height: 100%; object-fit: cover; filter: grayscale(100%); transition: filter 0.4s; }
    .lead-card:hover .lead-img img { filter: grayscale(0%); }
    
    /* ─── Strategic Pillars Hover ─── */
    .pillar-card {
        background: var(--surface-secondary);
        padding: 48px 32px;
        border-radius: var(--radius-lg);
        border: 1px solid var(--border-color);
        transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        height: 100%;
    }
    .pillar-card:hover {
        background: #fff;
        border-color: var(--primary);
        transform: translateY(-12px);
        box-shadow: var(--shadow-lg);
    }

</style>
@endpush

@section('content')

    <section class="about-hero">
        <div class="about-hero-content">
            <div class="reveal-left active">
                <span class="section-eyebrow" style="color:var(--accent);">OUR IDENTITY</span>
                <h1 style="font-family:var(--font-heading);font-size:clamp(3.5rem,6vw,7rem);color:#fff;font-weight:700;line-height:0.9;letter-spacing:-3px;margin-bottom:40px;">
                    Defined by <br><em style="color:var(--accent);">Distinction</em> &amp; <br>Authenticity.
                </h1>
            </div>
            <div class="reveal-right active" style="position:relative;">
                <div style="aspect-ratio:1;border-radius:50% 50% 0 50%;overflow:hidden;box-shadow:var(--shadow-lg);">
                    <img src="https://images.unsplash.com/photo-1600607686527-6fb886090705?auto=format&fit=crop&q=80&w=1200" style="width:100%;height:100%;object-fit:cover;">
                </div>
                <div style="position:absolute;bottom:40px;right:-40px;background:var(--primary);color:#fff;padding:24px 32px;border-radius:100px;font-family:var(--font-mono);font-size:0.65rem;letter-spacing:4px;text-transform:uppercase;">
                    Vision 2030 Partner
                </div>
            </div>
        </div>
    </section>

    {{-- Story Card --}}
    <section class="story-section">
        <div style="max-width:1440px;margin:0 auto;">
            <div class="story-card reveal">
                <div style="max-width:800px;margin:0 auto;text-align:center;">
                    <span class="section-eyebrow" style="justify-content:center;">OUR GENESIS</span>
                    <h2 style="font-family:var(--font-heading);font-size:clamp(2.5rem,4vw,4rem);font-weight:700;color:var(--text-main);margin-bottom:48px;line-height:1.1;">
                        Mapping the invisible pulse of <em style="color:var(--primary);">Saudi neighborhoods.</em>
                    </h2>
                    <div style="font-size:1.25rem;color:var(--text-muted);line-height:2.2;font-weight:300;">
                        <p style="margin-bottom:40px;">
                            Founded at the heart of the Kingdom's transformation, Bunyan was built on a simple conviction: the quality of a neighborhood shapes the quality of a life. We are dedicated to mapping the invisible attributes that make one street different from another.
                        </p>
                        <p>
                            From the boulevards of Riyadh to the future-forward districts of NEOM, our team of certified advisors has walked every path to ensure your next chapter begins in the perfect setting.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Values --}}
    <section style="background:var(--surface);padding-top:60px;">
        <div style="max-width:1440px;margin:0 auto;">
            <div class="values-bento">
                @php
                    $vals = [
                        ['Authentic Data','Earned through on-the-ground evaluation, not just data scraping.','M12 21l-8.226-17.396a5 5 0 1116.452 0L12 21z'],
                        ['Precision Yield','Focusing on the long-term lifestyle and asset value of your home.','M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
                        ['Total Integrity','RERA-certified advisors with absolute transparency in every deal.','M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                    ];
                @endphp
                @foreach($vals as $i => $v)
                <div class="value-box reveal" style="transition-delay: {{ $i * 120 }}ms;">
                    <div class="v-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8"><path d="{{ $v[2] }}"/></svg>
                    </div>
                    <h3 style="font-family:var(--font-heading);font-size:1.8rem;font-weight:700;color:var(--text-main);margin-bottom:16px;">{{ $v[0] }}</h3>
                    <p style="font-size:1rem;color:var(--text-muted);line-height:1.8;font-weight:300;">{{ $v[1] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Vision --}}
    <section class="vision-block reveal-fade">
        <div class="reveal-left">
            <span class="section-eyebrow" style="color:var(--accent);">OUR MISSION</span>
            <h2 style="font-family:var(--font-heading);font-size:clamp(2.5rem,4vw,4.5rem);font-weight:700;color:#fff;line-height:1;letter-spacing:-2px;margin-bottom:32px;">
                Empowering the <br>Vision 2030 Generation.
            </h2>
            <div style="font-size:1.1rem;color:rgba(255,255,255,0.45);line-height:1.9;font-weight:300;">
                <p style="margin-bottom:24px;">
                    We are proud to serve as a catalyst for the Kingdom's Quality of Life program, ensuring that every family finds a community that fosters growth, security, and well-being.
                </p>
                <p style="margin-bottom:24px;">
                    Our methodology combines algorithmic precision with deep cultural empathy. We don't just see rooftops; we see the future hubs of Saudi entrepreneurship, heritage, and social fabric.
                </p>
                <p>
                    By bridging the gap between global standards and local nuance, Bunyan is setting the new benchmark for neighborhood intelligence in the region.
                </p>
            </div>
        </div>
        <div class="reveal-right" style="height:350px;border-radius:var(--radius-lg);overflow:hidden;box-shadow:var(--shadow-lg);">
            <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&q=80&w=1200" style="width:100%;height:100%;object-fit:cover;">
        </div>
        </div>
    </section>

    {{-- Strategic Pillars --}}
    <section style="background:#fff;padding:120px 80px;">
        <div style="max-width:1440px;margin:0 auto;">
            <div style="text-align:center;margin-bottom:80px;" class="reveal">
                <span class="section-eyebrow" style="justify-content:center;">OUR ARCHITECTURE</span>
                <h2 style="font-family:var(--font-heading);font-size:3.5rem;font-weight:700;color:var(--text-main);">The Pillars of <em style="color:var(--primary);">Our Excellence.</em></h2>
            </div>
            <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:32px;">
                @php
                    $pillars = [
                        ['Localized Intel','We prioritize on-the-ground human intelligence over generic scraping to ensure neighborhood accuracy.','M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                        ['Strategic Integrity','Our RERA-certified methodology ensures every transaction is backed by absolute transparency and ethics.','M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A10.003 10.003 0 0012 3c-5.523 0-10 4.477-10 10 0 2.136.67 4.116 1.81 5.74z'],
                        ['Future Readiness','Aligning every relocation with the Vision 2030 Quality of Life goals for sustainable community growth.','M13 10V3L4 14h7v7l9-11h-7z'],
                        ['Cultural Nuance','Deeply rooted in Saudi heritage, bridging the gap between global standards and local tradition.','M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9'],
                    ];
                @endphp
                @foreach($pillars as $p)
                <div class="reveal-up">
                    <div class="pillar-card">
                        <div style="width:52px;height:52px;background:var(--primary);color:#fff;border-radius:12px;display:flex;align-items:center;justify-content:center;margin-bottom:24px;">
                            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8"><path d="{{ $p[2] }}"/></svg>
                        </div>
                        <h4 style="font-family:var(--font-heading);font-size:1.6rem;font-weight:700;color:var(--text-main);margin-bottom:16px;">{{ $p[0] }}</h4>
                        <p style="font-size:0.95rem;color:var(--text-muted);line-height:1.7;font-weight:300;">{{ $p[1] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Final CTA --}}
    <section style="padding:100px 80px;text-align:center;background:var(--surface-secondary);">
        <div class="reveal-zoom">
            <h2 style="font-family:var(--font-heading);font-size:clamp(3rem,5vw,5.5rem);font-weight:700;color:var(--text-main);letter-spacing:-3px;margin-bottom:48px;">
                Ready to find <em style="color:var(--primary);">home?</em>
            </h2>
            <a href="{{ url('/#contact') }}" class="btn-primary" style="padding:22px 60px;font-size:1rem;">Talk to an Advisor</a>
        </div>
    </section>

@endsection
