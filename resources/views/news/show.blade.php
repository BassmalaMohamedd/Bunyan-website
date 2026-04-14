@extends('layouts.public')

@php 
    $extract = function($data) {
        if (is_array($data)) return $data['en'] ?? '';
        $decoded = json_decode($data ?? '{}', true);
        if (is_array($decoded)) return $decoded['en'] ?? $data;
        if (preg_match('/"en"\s*:\s*"([^"]+)"/', $data, $matches)) return $matches[1];
        return $data;
    };
    $title = $extract($post->title);
    $content = $extract($post->content);
    $img = $post->image ?? '/images/B1.jpg';
    $date = \Carbon\Carbon::parse($post->published_at)->format('d M Y');
    $dateShort = \Carbon\Carbon::parse($post->published_at)->format('M Y');
    $ref = 'ARK-' . strtoupper(substr($post->slug, 0, 8));
@endphp

@section('title', $title . ' | Market Intelligence | Arkan Real Estate')

@section('content')
    <!-- Dark Header Band -->
    <section class="news-article-hero">
        <div class="news-article-hero-glow"></div>
        <div class="news-article-hero-grid"></div>
        <div class="news-article-hero-content">
            <div class="reveal-slow">
                <div class="news-article-meta-bar">
                    <span class="news-article-badge">Market Intelligence</span>
                    <span class="news-article-date">{{ $date }}</span>
                    <span class="news-article-ref">{{ $ref }}</span>
                </div>
                <h1 class="news-article-title">{{ $title }}</h1>
            </div>
        </div>
    </section>

    <!-- Full-width Hero Image -->
    <div class="news-article-cover reveal-scale">
        <img src="{{ $img }}" alt="{{ $title }}">
        <div class="news-article-cover-overlay"></div>
    </div>

    <!-- Main Article Body -->
    <section class="news-article-body">
        <div class="news-article-layout">
            <!-- LEFT: Sticky Sidebar -->
            <aside class="news-article-sidebar reveal-left">
                <a href="/news" class="news-back-link">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                    All Briefings
                </a>
                <div class="news-sidebar-divider"></div>
                <div class="news-sidebar-meta">
                    <div class="news-sidebar-item">
                        <h6>Published</h6>
                        <p>{{ $date }}</p>
                    </div>
                    <div class="news-sidebar-item">
                        <h6>Category</h6>
                        <p>Market Intelligence</p>
                    </div>
                    <div class="news-sidebar-item">
                        <h6>Region</h6>
                        <p>KSA / MENA</p>
                    </div>
                    <div class="news-sidebar-item">
                        <h6>Reference</h6>
                        <p>{{ $ref }}</p>
                    </div>
                </div>
            </aside>

            <!-- RIGHT: Article content -->
            <div class="news-article-content reveal">
                <!-- Lead paragraph highlight -->
                <div class="news-article-lead">
                    Specialized intelligence curated by Arkan's research division, providing enterprise-grade insights for decision makers across the Kingdom's real estate market.
                </div>

                <!-- Article Body -->
                <div class="news-article-text">
                    {!! $content !!}
                </div>

                <!-- End of Report Divider -->
                <div class="news-article-end">
                    <div class="news-article-end-line"></div>
                    <span>End of Report — {{ $dateShort }}</span>
                    <div class="news-article-end-line"></div>
                </div>

                <!-- CTA -->
                <div class="news-article-cta reveal">
                    <div class="news-article-cta-inner">
                        <div class="news-article-cta-glow"></div>
                        <span class="news-article-cta-label">Strategic Action</span>
                        <h3>Apply this intelligence to your portfolio.</h3>
                        <p>Engage with our advisory team to understand how these findings impact your digital real estate strategy.</p>
                        <a href="{{ url('/#contact') }}" class="btn-gold" style="padding: 20px 60px; font-size: 0.85rem; letter-spacing: 4px; font-weight: 900; border-radius: 14px; position: relative; z-index: 1; display: inline-block;">SECURE DIALOGUE</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
    /* ─── Hero ──────────────────────────────────────────────── */
    .news-article-hero {
        min-height: 65vh;
        background: #0a192f;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        position: relative;
        overflow: hidden;
        padding: 160px 80px 80px;
    }
    .news-article-hero-glow {
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse at 20% 80%, rgba(203,163,101,0.12) 0%, transparent 60%);
    }
    .news-article-hero-grid {
        position: absolute;
        inset: 0;
        background-image: linear-gradient(rgba(203,163,101,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(203,163,101,0.03) 1px, transparent 1px);
        background-size: 80px 80px;
    }
    .news-article-hero-content {
        position: relative;
        z-index: 10;
        width: 100%;
        max-width: 1100px;
    }
    .news-article-meta-bar {
        display: flex;
        align-items: center;
        gap: 24px;
        margin-bottom: 35px;
        flex-wrap: wrap;
    }
    .news-article-badge {
        background: rgba(203,163,101,0.15);
        color: var(--primary);
        font-size: 0.7rem;
        font-weight: 900;
        letter-spacing: 3px;
        text-transform: uppercase;
        padding: 8px 18px;
        border-radius: 50px;
        border: 1px solid rgba(203,163,101,0.3);
    }
    .news-article-date, .news-article-ref {
        color: rgba(255,255,255,0.35);
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 3px;
    }
    .news-article-title {
        font-size: 4.5rem;
        font-weight: 900;
        color: #fff;
        line-height: 1.05;
        letter-spacing: -3px;
        max-width: 1000px;
    }

    /* ─── Cover Image ─────────────────────────────────────── */
    .news-article-cover {
        width: 100%;
        height: 60vh;
        overflow: hidden;
        position: relative;
    }
    .news-article-cover img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 8s ease;
    }
    .news-article-cover:hover img { transform: scale(1.03); }
    .news-article-cover-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(0deg, rgba(10,25,47,0.3) 0%, transparent 50%);
    }

    /* ─── Body ──────────────────────────────────────────────── */
    .news-article-body {
        background: #fff;
        padding: 60px 80px 80px;
    }
    .news-article-layout {
        max-width: 1300px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 240px 1fr;
        gap: 100px;
        align-items: start;
    }

    /* ─── Sidebar ───────────────────────────────────────────── */
    .news-article-sidebar {
        position: sticky;
        top: 120px;
    }
    .news-back-link {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #64748b;
        font-size: 0.75rem;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 3px;
        text-decoration: none;
        margin-bottom: 40px;
        transition: color 0.3s;
    }
    .news-back-link:hover { color: var(--primary); }
    .news-sidebar-divider {
        width: 100%;
        height: 1px;
        background: #f1f5f9;
        margin-bottom: 40px;
    }
    .news-sidebar-meta {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }
    .news-sidebar-item h6 {
        font-size: 0.65rem;
        font-weight: 900;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 4px;
        margin-bottom: 8px;
    }
    .news-sidebar-item p {
        font-size: 0.95rem;
        font-weight: 700;
        color: #0a192f;
        line-height: 1.5;
    }

    /* ─── Content ───────────────────────────────────────────── */
    .news-article-lead {
        font-size: 1.4rem;
        color: #0a192f;
        font-weight: 500;
        line-height: 1.8;
        border-left: 4px solid var(--primary);
        padding-left: 30px;
        margin-bottom: 60px;
    }
    .news-article-text {
        font-size: 1.2rem;
        color: #334155;
        line-height: 2.2;
        font-weight: 300;
        margin-bottom: 80px;
    }
    .news-article-text p { margin-bottom: 30px; }
    .news-article-text h2, .news-article-text h3 {
        font-size: 2rem;
        color: #0a192f;
        font-weight: 900;
        letter-spacing: -1px;
        margin: 50px 0 25px;
    }

    /* ─── End Divider ───────────────────────────────────────── */
    .news-article-end {
        display: flex;
        align-items: center;
        gap: 25px;
        margin-bottom: 80px;
        color: #94a3b8;
        font-size: 0.7rem;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 5px;
    }
    .news-article-end-line {
        flex: 1;
        height: 1px;
        background: #f1f5f9;
    }

    /* ─── CTA ───────────────────────────────────────────────── */
    .news-article-cta-inner {
        background: #0a192f;
        border-radius: 28px;
        padding: 50px;
        text-align: center;
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(255,255,255,0.05);
    }
    .news-article-cta-glow {
        position: absolute;
        top: -100px;
        right: -100px;
        width: 350px;
        height: 350px;
        background: radial-gradient(circle, rgba(203,163,101,0.12) 0%, transparent 70%);
        border-radius: 50%;
    }
    .news-article-cta-label {
        color: var(--primary);
        font-weight: 900;
        letter-spacing: 5px;
        font-size: 0.7rem;
        text-transform: uppercase;
        display: block;
        margin-bottom: 25px;
        position: relative;
        z-index: 1;
    }
    .news-article-cta-inner h3 {
        font-size: 2.8rem;
        font-weight: 900;
        color: #fff;
        margin-bottom: 25px;
        letter-spacing: -1.5px;
        line-height: 1.1;
        position: relative;
        z-index: 1;
    }
    .news-article-cta-inner p {
        color: rgba(255,255,255,0.5);
        font-size: 1.1rem;
        max-width: 550px;
        margin: 0 auto 50px;
        line-height: 2;
        font-weight: 300;
        position: relative;
        z-index: 1;
    }
    </style>
@endsection
