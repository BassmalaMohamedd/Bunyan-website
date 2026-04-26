@extends('layouts.public')
@section('title', 'Market News | Saudi Arabian Neighborhood Intelligence')

@push('styles')
<style>
    body { background: var(--surface); }

    /* ─── Hero Redesign ─── */
    .news-hero {
        padding: 40px 80px 40px;
        background: var(--text-main);
        min-height: 30vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }
    .news-hero-content {
        max-width: 1440px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1.15fr 1fr;
        gap: 100px;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    /* ─── Editorial Grid ─── */
    .news-editorial {
        max-width: 1440px;
        margin: 0 auto;
        padding: 100px 80px;
    }
    .main-article {
        display: grid;
        grid-template-columns: 1.2fr 1fr;
        gap: 80px;
        margin-bottom: 120px;
        align-items: center;
    }
    .article-card {
        padding: 40px;
        border-bottom: 1px solid var(--border-color);
        transition: all 0.4s ease;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    .article-card:hover {
        background: var(--surface-secondary);
        transform: translateX(10px);
    }
    .article-card img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: var(--radius-lg);
        margin-bottom: 24px;
    }

    /* ─── Newsletter ─── */
    .news-nl {
        background: var(--surface-secondary);
        padding: 100px 80px;
        border-radius: var(--radius-xl);
        margin: 0 80px 140px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 60px;
    }
</style>
@endpush

@section('content')

    {{-- Hero --}}
    <section class="news-hero">
        <div class="news-hero-content" style="margin-top: -40px;">
            <div class="reveal-slow active">
                <span class="section-eyebrow" style="color:var(--accent);">MARKET INTELLIGENCE</span>
                <h1 style="font-family:var(--font-heading);font-size:clamp(3.5rem,6vw,7rem);color:#fff;font-weight:700;line-height:0.9;letter-spacing:-3px;margin-bottom:40px;">
                    Neighborhood <br><em style="color:var(--accent);">News</em> & Data.
                </h1>
            </div>
            <div class="reveal-scale active" style="position:relative;">
                <div style="aspect-ratio:3/4;border-radius:var(--radius-xl);overflow:hidden;box-shadow:var(--shadow-lg);">
                    <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=1200" style="width:100%;height:100%;object-fit:cover;">
                </div>
            </div>
        </div>
    </section>

    {{-- Articles --}}
    <section class="news-editorial">
        <div style="max-width:1440px;margin:0 auto;">
            
            @php
                $extract = function($data) {
                    if (is_array($data)) return $data['en'] ?? '';
                    $decoded = json_decode($data ?? '{}', true);
                    if (is_array($decoded)) return $decoded['en'] ?? $data;
                    return $data;
                };
            @endphp

            @if($posts->count() > 0)
                {{-- Main --}}
                @php $first = $posts->first(); $rest = $posts->slice(1); @endphp
                <div class="main-article reveal">
                    <div style="height:600px;border-radius:var(--radius-xl);overflow:hidden;box-shadow:var(--shadow-lg);">
                        <img src="{{ $first->image ?? 'https://images.unsplash.com/photo-1487958449943-2429e8be8625?auto=format&fit=crop&q=80&w=1400' }}" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                    <div>
                        <span style="font-family:var(--font-mono);color:var(--primary);font-size:0.7rem;letter-spacing:4px;text-transform:uppercase;margin-bottom:24px;display:block;">{{ $first->published_at ? \Carbon\Carbon::parse($first->published_at)->format('M d, Y') : 'Featured' }}</span>
                        <h2 style="font-family:var(--font-heading);font-size:3rem;font-weight:700;color:var(--text-main);margin-bottom:32px;line-height:1.1;">{{ $extract($first->title) }}</h2>
                        <p style="font-size:1.1rem;color:var(--text-muted);line-height:1.9;margin-bottom:48px;font-weight:300;">{{ Str::limit(strip_tags($extract($first->content)), 240) }}</p>
                        <a href="{{ route('news.show', $first->slug) }}" class="btn-primary">Read Full Briefing</a>
                    </div>
                </div>

                {{-- Rest --}}
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:60px;">
                    @foreach($rest as $p)
                        <div class="article-card reveal" onclick="window.location='{{ route('news.show', $p->slug) }}'">
                            <img src="{{ $p->image ?? 'https://images.unsplash.com/photo-1449824913935-59a10b8d2000?auto=format&fit=crop&q=80&w=800' }}">
                            <span style="font-family:var(--font-mono);color:var(--primary);font-size:0.6rem;letter-spacing:4px;text-transform:uppercase;">{{ $p->published_at ? \Carbon\Carbon::parse($p->published_at)->format('M d, Y') : 'Advisory' }}</span>
                            <h3 style="font-family:var(--font-heading);font-size:1.8rem;font-weight:700;color:var(--text-main);line-height:1.2;">{{ $extract($p->title) }}</h3>
                            <p style="font-size:1rem;color:var(--text-muted);font-weight:300;line-height:1.7;">{{ Str::limit(strip_tags($extract($p->content)), 140) }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <div style="text-align:center;padding:140px 0;">
                    <h2 style="font-family:var(--font-heading);font-size:3rem;color:var(--text-main);">Intelligence Briefings Comming Soon.</h2>
                </div>
            @endif

        </div>
    </section>

    {{-- Newsletter --}}
    <section class="news-nl reveal">
        <div style="max-width:540px;">
            <h2 style="font-family:var(--font-heading);font-size:2.5rem;font-weight:700;color:var(--text-main);margin-bottom:24px;">The Weekly <em style="color:var(--primary);">Brief.</em></h2>
            <p style="font-size:1rem;color:var(--text-muted);font-weight:300;">Exclusive neighborhood data and market projections delivered to your inbox every Thursday.</p>
        </div>
        <div style="display:flex;gap:12px;flex-shrink:0;">
            <input type="email" placeholder="Your work email" style="padding:18px 32px;border-radius:50px;border:1px solid var(--border-color);width:340px;outline:none;">
            <button class="btn-primary" style="padding:18px 40px;">Join the Inner Circle</button>
        </div>
    </section>

@endsection
