@extends('layouts.public')

@section('title', 'Vertex News | Intelligence')

@section('content')

    <style>
        .news-card-hover {
            transition: all 0.7s cubic-bezier(0.16,1,0.3,1);
        }
        .news-card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 40px 80px rgba(28,25,23,0.08);
            border-color: #f59e0b !important;
        }
        .news-card-hover:hover .news-img {
            transform: scale(1.05);
        }
        
        @keyframes hero-fade {
            0% { opacity: 0; transform: scale(1.03); }
            100% { opacity: 1; transform: scale(1); }
        }
    </style>

    {{-- ══════════════════════════════════════════════
         HERO SECTION (Centered, Shrinked, No Neon)
    ══════════════════════════════════════════════ --}}
    <section style="height:60vh;background:#1c1917;display:flex;align-items:center;justify-content:center;position:relative;overflow:hidden;padding:0 60px;">
        <div style="position:absolute;inset:0;animation:hero-fade 2.5s cubic-bezier(0.16,1,0.3,1) forwards;">
            <img src="{{ asset('images/B2.jpg') }}" alt="Vertex Architecture" style="width:100%;height:100%;object-fit:cover;opacity:0.25;">
            <div style="position:absolute;inset:0;background:linear-gradient(180deg,rgba(28,25,23,0.95),rgba(28,25,23,0.6));"></div>
        </div>

        <div style="max-width:1440px;margin:0 auto;width:100%;position:relative;z-index:10;text-align:center;">
            <div class="reveal-slow active">
                <div style="display:inline-flex;align-items:center;gap:18px;margin-bottom:30px;">
                    <div style="width:40px;height:1px;background:#f59e0b;"></div>
                    <span style="font-family:var(--font-mono);color:#f59e0b;font-size:0.75rem;font-weight:700;letter-spacing:5px;text-transform:uppercase;">Market Intelligence</span>
                    <div style="width:40px;height:1px;background:#f59e0b;"></div>
                </div>
                
                <h1 style="font-family:var(--font-heading);font-size:clamp(3.5rem,7vw,7rem);line-height:1;color:#fff;font-weight:900;font-style:italic;letter-spacing:-2px;margin:0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                    Vertex <span class="text-gradient">News.</span>
                </h1>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════
         NEWS LIST (All identical to the premium first card)
    ══════════════════════════════════════════════ --}}
    <section style="padding:100px 60px;background:#fff;">
        <div style="max-width:1200px;margin:0 auto;">

            @php
                $extract = function($data) {
                    if (is_array($data)) return $data['en'] ?? '';
                    $decoded = json_decode($data ?? '{}', true);
                    if (is_array($decoded)) return $decoded['en'] ?? $data;
                    if (preg_match('/"en"\s*:\s*"([^"]+)"/', $data, $matches)) return $matches[1];
                    return $data;
                };
                $reImgs = [
                    asset('images/B1.jpg'),
                    asset('images/B2.jpg'),
                    asset('images/B3.jpg'),
                    asset('images/B4.jpg'),
                    asset('images/B5.jpg'),
                    asset('images/B6.jpg'),
                ];
                $tags = ['Market Analysis','Investment Insight','Tech & PropTech','Regulatory Update','Sector Report','Valuation Data'];
            @endphp

            @if($posts->count() > 0)
                <div style="display:flex;flex-direction:column;gap:60px;">
                    @foreach($posts as $post)
                        @php 
                            $title   = $extract($post->title); 
                            $content = $extract($post->content); 
                            $img     = $post->image ?? ($reImgs[$loop->index % count($reImgs)]);
                            $tag     = $tags[$loop->index % count($tags)];
                        @endphp
                        
                        <div class="reveal news-card-hover" style="border:1px solid #e7e5e4;border-radius:4px;overflow:hidden;min-height:520px;cursor:pointer;"
                             onclick="window.location='{{ route('news.show', $post->slug) }}'">
                            
                            <div style="display:grid;grid-template-columns:1fr 1fr;gap:0;height:100%;">
                                
                                {{-- Image Left --}}
                                <div style="overflow:hidden;position:relative;height:100%;">
                                    <img src="{{ $img }}"
                                         alt="{{ $title }}"
                                         class="news-img"
                                         style="width:100%;height:100%;object-fit:cover;transition:transform 1.2s ease;">
                                    <div style="position:absolute;inset:0;background:linear-gradient(to right,transparent,rgba(28,25,23,0.05));"></div>
                                    @if($loop->first)
                                        <div style="position:absolute;top:28px;left:28px;background:#f59e0b;color:#1c1917;font-family:var(--font-mono);font-size:0.62rem;font-weight:700;letter-spacing:4px;padding:8px 18px;border-radius:2px;text-transform:uppercase;">Featured</div>
                                    @endif
                                </div>
                                
                                {{-- Content Right --}}
                                <div style="padding:64px;background:#fafaf8;display:flex;flex-direction:column;justify-content:space-between;height:100%;">
                                    <div>
                                        <div style="display:flex;align-items:center;gap:16px;margin-bottom:28px;">
                                            <span style="font-family:var(--font-mono);color:#f59e0b;font-size:0.68rem;font-weight:700;text-transform:uppercase;letter-spacing:3px;">{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('M d, Y') : 'DRAFT' }}</span>
                                            <div style="width:20px;height:1px;background:#d4cfc9;"></div>
                                            <span style="font-family:var(--font-mono);color:#a8a29e;font-size:0.68rem;text-transform:uppercase;letter-spacing:3px;">{{ $tag }}</span>
                                        </div>
                                        <h2 style="font-family:var(--font-heading);font-size:2.5rem;font-weight:900;color:#1c1917;margin-bottom:24px;line-height:1.15;font-style:italic;letter-spacing:-1px;">{{ $title }}</h2>
                                        <p style="color:#78716c;font-size:1.05rem;line-height:1.9;font-weight:300;margin-bottom:40px;">{{ Str::limit(strip_tags($content), 280) }}</p>
                                    </div>
                                    
                                    <div style="display:flex;align-items:center;gap:24px;">
                                        <span class="btn-gold" style="padding:16px 40px;font-size:0.72rem;letter-spacing:3px;display:inline-block;">READ BRIEFING</span>
                                        <div style="width:1px;height:40px;background:#e7e5e4;"></div>
                                        <span style="font-family:var(--font-mono);font-size:0.65rem;color:#f59e0b;font-weight:700;letter-spacing:3px;text-transform:uppercase;">FULL REPORT →</span>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    @endforeach
                </div>
            @else
                {{-- Empty state --}}
                <div style="text-align:center;padding:120px 0;">
                    <div style="width:80px;height:80px;background:#fafaf8;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 24px;">
                        <svg width="32" height="32" fill="none" stroke="#d4cfc9" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    </div>
                    <h3 style="font-family:var(--font-heading);font-size:2rem;color:#1c1917;font-style:italic;margin-bottom:12px;">No Articles Yet</h3>
                    <p style="color:#a8a29e;font-size:1rem;">Market intelligence will appear here once published.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- ══════════════════════════════════════════════
         SUBSCRIPTION CTA STRIP (Centered & Clean)
    ══════════════════════════════════════════════ --}}
    <section style="padding:60px 60px;background:#1c1917;position:relative;overflow:hidden;text-align:center;">
        <div style="max-width:800px;margin:0 auto;position:relative;z-index:1;">
            <div class="reveal">
                <span style="font-family:var(--font-mono);color:#f59e0b;font-size:0.75rem;font-weight:700;letter-spacing:6px;text-transform:uppercase;display:block;margin-bottom:24px;">Stay Informed</span>
                
                {{-- Single line, no paragraph --}}
                <h2 style="font-family:var(--font-heading);font-size:clamp(3rem,4vw,5rem);color:#fff;font-weight:900;font-style:italic;letter-spacing:-1px;line-height:1;margin-bottom:50px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                    Receive Vertex <span class="text-gradient">Intelligence.</span>
                </h2>
                
                <div style="display:flex;gap:0;border:1px solid rgba(245,158,11,0.3);border-radius:50px;overflow:hidden;max-width:600px;margin:0 auto;background:rgba(255,255,255,0.02);">
                    <input type="email" placeholder="your@enterprise.com"
                           style="flex:1;background:transparent;border:none;padding:24px 32px;color:#fff;font-size:1rem;font-weight:300;outline:none;font-family:var(--font-body);">
                    <button class="btn-gold" style="padding:0 50px;font-size:0.75rem;letter-spacing:4px;border-radius:0;border:none;cursor:pointer;flex-shrink:0;">SUBSCRIBE</button>
                </div>
                <p style="margin-top:20px;font-family:var(--font-mono);font-size:0.62rem;color:rgba(255,255,255,0.3);letter-spacing:3px;">NO SPAM. UNSUBSCRIBE ANYTIME.</p>
            </div>
        </div>
    </section>

@endsection
