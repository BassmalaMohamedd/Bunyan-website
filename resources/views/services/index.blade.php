@extends('layouts.public')
@section('title', 'Services | Neighborhood Intelligence & Real Estate Advisory')

@push('styles')
<style>
    body { background: var(--surface); }

    /* ─── Hero ─── */
    .srv-hero {
        padding: 80px 80px 40px;
        background: var(--text-main);
        min-height: 40vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }
    .srv-hero-content {
        max-width: 1440px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1.1fr 1fr;
        gap: 100px;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    /* ─── Narrative Sections (Updated to Cards) ─── */
    .srv-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 40px;
        max-width: 1440px;
        margin: 0 auto 100px;
    }
    .service-card {
        background: #fff;
        border: 1px solid var(--border-color);
        border-radius: var(--radius-xl);
        overflow: hidden;
        transition: all 0.5s cubic-bezier(0.16,1,0.3,1);
        display: flex;
        flex-direction: column;
    }
    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary);
    }
    .service-card-img {
        height: 350px;
        width: 100%;
        object-fit: cover;
    }
    .service-card-body {
        padding: 50px;
        flex-grow: 1;
    }

    /* ─── Process Bar (Updated to Cards) ─── */
    .process-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
        margin: 0 80px 100px;
    }
    .process-card {
        background: var(--text-main);
        padding: 40px;
        border-radius: var(--radius-lg);
        border: 1px solid rgba(136,164,124,0.1);
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }
    .process-card:hover {
        background: var(--primary);
        transform: translateY(-5px);
        border-color: var(--accent);
    }
    .process-card .step-num {
        font-family: var(--font-mono);
        color: var(--accent);
        font-size: 0.65rem;
        letter-spacing: 4px;
        display: block;
        margin-bottom: 20px;
    }
    .process-card:hover .step-num { color: #fff; opacity: 0.6; }
</style>
@endpush

@section('content')

    <section class="srv-hero" style="padding-top: 140px;">
        <div class="srv-hero-content">
            <div class="reveal-left active">
                <span class="section-eyebrow" style="color:var(--accent);">ELITE ADVISORY</span>
                <h1 style="font-family:var(--font-heading);font-size:clamp(3.5rem,6vw,7rem);color:#fff;font-weight:700;line-height:0.9;letter-spacing:-3px;margin-bottom:40px;">
                    Precision Services for Your<br><em style="color:var(--accent);">Future Address.</em>
                </h1>
            </div>
            <div class="reveal-right active" style="position:relative;">
                <div style="aspect-ratio:16/9;border-radius:var(--radius-xl);overflow:hidden;box-shadow:var(--shadow-lg);">
                    <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&q=80&w=1200" style="width:100%;height:100%;object-fit:cover;">
                </div>
            </div>
        </div>
    </section>

    <section class="srv-narrative" style="padding-top:140px;">
        <div class="srv-grid">
            
            <div class="service-card reveal-left card-hover-lift">
                <img src="https://images.unsplash.com/photo-1481026469463-66327c86e544?auto=format&fit=crop&q=80&w=1200" class="service-card-img" loading="lazy">
                <div class="service-card-body">
                    <span class="section-eyebrow">PRECISION AUDITING</span>
                    <h2 style="font-family:var(--font-heading);font-size:2.8rem;font-weight:700;color:var(--text-main);margin-bottom:24px;line-height:1.1;">Neighborhood Intelligence <br><em style="color:var(--primary);">Reports.</em></h2>
                    <p style="font-size:1.05rem;color:var(--text-muted);line-height:1.8;font-weight:300;margin-bottom:32px;">
                        The Kingdom's most comprehensive residential auditing service. We evaluate the invisible pulse of a neighborhood—from infrastructure projections to social fabric density.
                    </p>
                    <ul class="feature-list" style="margin-top:0;">
                        <li class="feature-item"><svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M5 13l4 4L19 7"/></svg> Walkability &amp; Air Quality</li>
                        <li class="feature-item"><svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M5 13l4 4L19 7"/></svg> Private School Proximity</li>
                        <li class="feature-item"><svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M5 13l4 4L19 7"/></svg> Commute Patterns</li>
                        <li class="feature-item"><svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M5 13l4 4L19 7"/></svg> Asset Growth Forecasting</li>
                    </ul>
                </div>
            </div>

            <div class="service-card reveal-right card-hover-lift" style="transition-delay: 150ms;">
                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&q=80&w=1200" class="service-card-img" loading="lazy">
                <div class="service-card-body">
                    <span class="section-eyebrow">WHITE-GLOVE SUPPORT</span>
                    <h2 style="font-family:var(--font-heading);font-size:2.8rem;font-weight:700;color:var(--text-main);margin-bottom:24px;line-height:1.1;">Relocation <br><em style="color:var(--primary);">Advisory.</em></h2>
                    <p style="font-size:1.05rem;color:var(--text-muted);line-height:1.8;font-weight:300;margin-bottom:32px;">
                        Exclusive support for high-net-worth families and global expats. We handle the logistical complexity of entering Saudi Arabia's most prestigious gated communities.
                    </p>
                    <ul class="feature-list" style="margin-top:0;">
                        <li class="feature-item"><svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M5 13l4 4L19 7"/></svg> Elite Compound Sourcing</li>
                        <li class="feature-item"><svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M5 13l4 4L19 7"/></svg> Utility Concierge</li>
                        <li class="feature-item"><svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M5 13l4 4L19 7"/></svg> Cultural Orientation</li>
                        <li class="feature-item"><svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M5 13l4 4L19 7"/></svg> Gated District Accreditations</li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <section>
        <div class="process-grid">
            @foreach([
                ['01','Discovery','Deep lifestyle brief.'],
                ['02','Intelligence','Neighborhood auditing.'],
                ['03','Shortlist','Hand-picked asset curation.'],
                ['04','Relocated','Seamless transition.'],
            ] as $i => $step)
            <div class="process-card reveal-up" style="transition-delay: {{ $i * 120 }}ms;">
                <span class="step-num">STEP {{ $step[0] }}</span>
                <h4 style="font-family:var(--font-heading);font-size:1.6rem;font-weight:700;color:#fff;margin-bottom:12px;">{{ $step[1] }}</h4>
                <p style="font-size:0.85rem;color:rgba(255,255,255,0.4);font-weight:300;line-height:1.6;">{{ $step[2] }}</p>
            </div>
            @endforeach
        </div>
    </section>

    <section style="padding:100px 80px;text-align:center;background:var(--surface-secondary);">
        <div class="reveal-zoom">
            <h2 style="font-family:var(--font-heading);font-size:clamp(3rem,5vw,5.5rem);font-weight:700;color:var(--text-main);letter-spacing:-3px;margin-bottom:48px;">
                Ready for <em style="color:var(--primary);">precision?</em>
            </h2>
            <a href="{{ url('/#contact') }}" class="btn-primary" style="padding:22px 60px;font-size:1rem;">Book Discovery Call</a>
        </div>
    </section>

@endsection
