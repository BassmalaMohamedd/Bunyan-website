@extends('layouts.public')

@php 
    $extract = function($data) {
        if (is_array($data)) return $data[app()->getLocale()] ?? $data['en'] ?? '';
        $decoded = json_decode($data ?? '{}', true);
        if (is_array($decoded)) return $decoded[app()->getLocale()] ?? $decoded['en'] ?? $data;
        if (preg_match('/"en"\s*:\s*"([^"]+)"/', $data, $matches)) return $matches[1];
        return $data;
    };
    $title = $extract($post->title);
    $content = $extract($post->content);
    $img = $post->image ?? asset('images/B1.jpg');
    $date = \Carbon\Carbon::parse($post->published_at)->format('d M Y');
    $dateShort = \Carbon\Carbon::parse($post->published_at)->format('M Y');
    $ref = 'BNY-' . strtoupper(substr($post->slug, 0, 8));
@endphp

@section('title', $title . ' | Bunyan Intelligence')

@section('content')

    <style>
        .editorial-body {
            max-width: 840px;
            margin: 0 auto;
            font-size: 1.15rem;
            color: #44403c;
            line-height: 2.1;
            font-weight: 300;
        }
        .editorial-body p { margin-bottom: 2rem; }
        .editorial-body h2, .editorial-body h3 {
            font-family: var(--font-heading);
            font-size: 2.2rem;
            color: #1c1917;
            font-weight: 900;
            letter-spacing: -0.5px;
            margin: 3.5rem 0 1.5rem;
            font-style: italic;
        }
        .editorial-body blockquote {
            font-family: var(--font-heading);
            font-size: 1.8rem;
            line-height: 1.6;
            color: var(--primary);
            font-style: italic;
            border-left: 4px solid var(--primary);
            padding-left: 30px;
            margin: 3rem 0;
            font-weight: 700;
        }
        
        @keyframes hero-fade {
            0% { opacity: 0; transform: scale(1.03); }
            100% { opacity: 1; transform: scale(1); }
        }
    </style>

    {{-- ══════════════════════════════════════════════
         INTEGRATED CINEMATIC HERO
    ══════════════════════════════════════════════ --}}
    <section style="height:75vh;background:#1c1917;display:flex;align-items:center;justify-content:center;position:relative;overflow:hidden;padding:0 60px;">
        <div style="position:absolute;inset:0;animation:hero-fade 2.5s cubic-bezier(0.16,1,0.3,1) forwards;">
            <img src="{{ $img }}" alt="{{ $title }}" style="width:100%;height:100%;object-fit:cover;opacity:0.35;">
            <div style="position:absolute;inset:0;background:linear-gradient(180deg,rgba(28,25,23,0.9),rgba(28,25,23,0.3) 50%, rgba(28,25,23,0.8));"></div>
        </div>

        <div style="max-width:1000px;margin:0 auto;width:100%;position:relative;z-index:10;text-align:center;">
            <div class="reveal-slow active">
                
                {{-- Horizontal Meta Line --}}
                <div style="display:flex;align-items:center;justify-content:center;gap:20px;margin-bottom:32px;flex-wrap:wrap;">
                    <span style="background:rgba(68,110,46,0.9);color:#fff;font-family:var(--font-mono);font-size:0.65rem;font-weight:700;letter-spacing:4px;padding:6px 16px;border-radius:2px;text-transform:uppercase;">Market Intelligence</span>
                    <span style="font-family:var(--font-mono);color:var(--primary);font-size:0.7rem;font-weight:700;letter-spacing:3px;text-transform:uppercase;">{{ $date }}</span>
                    <div style="width:4px;height:4px;background:var(--primary);border-radius:50%;"></div>
                    <span style="font-family:var(--font-mono);color:rgba(255,255,255,0.4);font-size:0.7rem;font-weight:700;letter-spacing:3px;text-transform:uppercase;">Ref: {{ $ref }}</span>
                </div>
                
                <h1 style="font-family:var(--font-heading);font-size:clamp(3rem,6vw,5.5rem);line-height:1.1;color:#fff;font-weight:900;font-style:italic;letter-spacing:-1px;margin:0;">
                    {{ $title }}
                </h1>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════
         EDITORIAL BODY (Centered)
    ══════════════════════════════════════════════ --}}
    <section style="padding:100px 60px;background:#fff;">
        <div style="max-width:840px;margin:0 auto;">
            
            <a href="/news" style="display:inline-flex;align-items:center;gap:12px;color:#a8a29e;font-family:var(--font-mono);font-size:0.7rem;font-weight:700;text-transform:uppercase;letter-spacing:3px;text-decoration:none;margin-bottom:50px;transition:color 0.3s;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='#a8a29e'">
                <span>← All Briefings</span>
            </a>

            <div class="reveal">
                {{-- Lead paragraph --}}
                <div style="font-size:1.4rem;color:#1c1917;font-weight:400;line-height:1.9;margin-bottom:60px;">
                    Specialized intelligence curated by Bunyan's research division, providing enterprise-grade insights for decision makers across the Kingdom's elite real estate sector.
                </div>

                {{-- Actual content --}}
                <div class="editorial-body">
                    {!! $content !!}
                </div>

                {{-- End of Report Divider --}}
                <div style="display:flex;align-items:center;gap:24px;margin-top:80px;color:#d4cfc9;font-family:var(--font-mono);font-size:0.65rem;font-weight:700;text-transform:uppercase;letter-spacing:5px;">
                    <div style="flex:1;height:1px;background:#e7e5e4;"></div>
                    <span>End of Report — {{ $dateShort }}</span>
                    <div style="flex:1;height:1px;background:#e7e5e4;"></div>
                </div>
            </div>

        </div>
    </section>

    {{-- ══════════════════════════════════════════════
         CLOSING CTA 
    ══════════════════════════════════════════════ --}}
    <section style="padding:100px 60px;background:#fafaf8;display:flex;justify-content:center;">
        <div class="reveal" style="max-width:1000px;width:100%;background:linear-gradient(135deg,#1c1917 0%,#292524 100%);border-radius:24px;padding:80px 40px;text-align:center;position:relative;overflow:hidden;box-shadow:0 40px 100px rgba(0,0,0,0.15);">
            <div style="position:absolute;inset:0;background:url('{{ asset('images/premium_villa_hero.png') }}') center/cover;opacity:0.06;pointer-events:none;"></div>
            
            <div style="position:relative;z-index:1;">
                <span style="font-family:var(--font-mono);color:var(--primary);font-size:0.7rem;font-weight:700;letter-spacing:6px;text-transform:uppercase;display:block;margin-bottom:20px;">Strategic Action</span>
                <h2 style="font-family:var(--font-heading);font-size:clamp(2.5rem,4vw,3.5rem);color:#fff;font-weight:900;font-style:italic;line-height:1.2;letter-spacing:-1px;margin-bottom:30px;">
                    Apply this intelligence to your portfolio.
                </h2>
                <p style="color:rgba(255,255,255,0.45);font-size:1.05rem;line-height:1.8;font-weight:300;max-width:500px;margin:0 auto 40px;">
                    Engage with our advisory team to understand how these findings impact your digital real estate strategy.
                </p>
                
                <div style="display:flex;gap:32px;justify-content:center;align-items:center;">
                    <a href="{{ url('/#contact') }}" class="btn-primary" style="border-radius:50px;padding:18px 48px;">SECURE DIALOGUE</a>
                </div>
            </div>
        </div>
    </section>

@endsection
