@extends('layouts.public')

@section('title', 'Vertex Enterprise | Redefining Specialized Innovations through Integrity.')

@section('content')

    <style>
        /* Hero Animation */
        @keyframes hero-breath {
            0% { transform: scale(1); }
            100% { transform: scale(1.08); }
        }
        @keyframes hero-fade-in {
            0% { opacity: 0; transform: scale(1.05); }
            100% { opacity: 1; transform: scale(1); }
        }
        .hero-bg-reveal {
            animation: hero-fade-in 2.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        /* Strategy Solutions Card Hover State */
        .strategy-card {
            background: #fff;
            border-left: 2px solid #e7e5e4;
            padding: 40px 32px;
            height: 100%;
            display: flex;
            flex-direction: column;
            position: relative;
            transition: all 0.5s ease;
        }
        .strategy-card:hover {
            background: #1c1917;
            border-left-color: #f59e0b;
            transform: translateX(10px);
        }
        .strategy-card .tag-text {
            color: #f59e0b;
        }
        .strategy-card .icon-color {
            color: #d4cfc9;
            transition: color 0.5s ease;
        }
        .strategy-card:hover .icon-color {
            color: #57534e;
        }
        .strategy-card h3 {
            color: #1c1917;
            transition: color 0.5s ease;
        }
        .strategy-card:hover h3 {
            color: #fff;
        }
        .strategy-card p.desc {
            color: #78716c;
            transition: color 0.5s ease;
        }
        .strategy-card:hover p.desc {
            color: rgba(255,255,255,0.55);
        }
        .strategy-card a.more-link {
            color: #1c1917;
            border-bottom: 1px solid #1c1917;
            transition: all 0.3s ease;
        }
        .strategy-card:hover a.more-link {
            color: #fff;
            border-bottom-color: #fff;
        }
        .strategy-card a.more-link:hover {
            color: #f59e0b;
            border-bottom-color: #f59e0b;
        }

        /* Insights Card Image Hover */
        .insight-card {
            background: #1c1917;
            height: 100%;
            transition: all 0.7s cubic-bezier(0.16,1,0.3,1);
            display: flex;
            flex-direction: column;
        }
        .insight-card:hover {
            background: rgba(245,158,11,0.07);
        }
        .insight-card .card-img {
            transition: transform 10s ease;
        }
        .insight-card:hover .card-img {
            transform: scale(1.1);
        }
    </style>

    {{-- ══════════════════════════════════════════════
         HERITAGE OVERVIEW — Hero Section
    ══════════════════════════════════════════════ --}}
    <section style="height: 100vh; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; background: #1c1917;">

        {{-- Background architecture: Slow breath image, NO neon or scan elements --}}
        <div class="hero-bg-reveal" style="position: absolute; inset: -5%; z-index: 1;">
            <img src="https://images.unsplash.com/photo-1487958449943-2429e8be8625?auto=format&fit=crop&q=80&w=2000" 
                 alt="Vertex Architecture" 
                 style="width: 100%; height: 100%; object-fit: cover; opacity: 0.4; animation: hero-breath 30s ease-in-out infinite alternate;">
            <div style="position:absolute;inset:0;background:linear-gradient(180deg,rgba(28,25,23,0.3) 0%,rgba(28,25,23,0.95) 100%);"></div>
        </div>

        {{-- Hero content --}}
        <div style="max-width:1200px;margin:0 auto;width:100%;padding:0 60px;position:relative;z-index:10;text-align:center;">
            <div class="reveal-slow active" style="display:flex;flex-direction:column;align-items:center;">

                {{-- Eyebrow --}}
                <div style="display:inline-flex;align-items:center;justify-content:center;gap:18px;margin-bottom:40px;">
                    <div style="width:40px;height:1px;background:#f59e0b;"></div>
                    <span style="font-family:var(--font-mono);color:#f59e0b;font-size:0.75rem;font-weight:500;letter-spacing:5px;text-transform:uppercase;">Vision 2030 Partner &nbsp;·&nbsp; Riyadh, Saudi Arabia</span>
                    <div style="width:40px;height:1px;background:#f59e0b;"></div>
                </div>

                {{-- Headline with Typing Effect --}}
                <h1 style="font-family:var(--font-heading);font-size:clamp(3rem,6vw,6.5rem);line-height:1.1;margin-bottom:40px;color:#fff;font-weight:900;font-style:italic;letter-spacing:-1px;min-height:1.2em;">
                    Mastering Integrity in <span class="text-gradient" id="typewriter-text">Architecture.</span><span class="cursor">|</span>
                </h1>

                {{-- Subheadline --}}
                <p style="font-size:1.25rem;color:rgba(255,255,255,0.7);max-width:760px;margin:0 auto 56px;line-height:1.9;font-weight:300;letter-spacing:0.2px;">
                    Engineering the foundation of economic excellence through specialized software ecosystems and visionary real estate consultancy within the Kingdom of Saudi Arabia.
                </p>

                {{-- CTAs --}}
                <div style="display:flex;gap:24px;align-items:center;justify-content:center;">
                    <a href="/services" style="display:inline-flex;align-items:center;justify-content:center;padding:18px 48px;background:#f59e0b;color:#1c1917;font-family:var(--font-mono);font-size:0.75rem;font-weight:700;letter-spacing:3px;text-transform:uppercase;text-decoration:none;border-radius:50px;transition:all 0.4s ease;" onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 10px 25px rgba(245,158,11,0.3)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">EXPLORE ECOSYSTEM</a>
                    
                    <a href="/about" style="display:inline-flex;align-items:center;justify-content:center;padding:18px 48px;background:transparent;color:#fff;border:1px solid rgba(255,255,255,0.2);font-family:var(--font-mono);font-size:0.75rem;font-weight:700;letter-spacing:3px;text-transform:uppercase;text-decoration:none;border-radius:50px;transition:all 0.4s ease;" onmouseover="this.style.background='rgba(255,255,255,0.05)';this.style.borderColor='rgba(255,255,255,0.4)';this.style.transform='translateY(-3px)'" onmouseout="this.style.background='transparent';this.style.borderColor='rgba(255,255,255,0.2)';this.style.transform='translateY(0)'">DISCOVER VERTEX</a>
                </div>
            </div>
        </div>

        {{-- Scroll indicator --}}
        <div style="position:absolute;bottom:48px;left:50%;transform:translateX(-50%);z-index:20;display:flex;flex-direction:column;align-items:center;gap:12px;">
            <span style="font-family:var(--font-mono);font-size:0.55rem;color:#f59e0b;font-weight:500;letter-spacing:5px;text-transform:uppercase;writing-mode:vertical-rl;">Scroll</span>
            <div style="width:1px;height:60px;background:linear-gradient(to bottom,rgba(245,158,11,0),#f59e0b,rgba(245,158,11,0));opacity:0.6;"></div>
        </div>
    </section>


    {{-- ══════════════════════════════════════════════
         HERITAGE OVERVIEW
    ══════════════════════════════════════════════ --}}
    <section style="padding:80px 60px;background:#fafaf8;position:relative;overflow:hidden;">
        <div style="max-width:1440px;margin:0 auto;position:relative;z-index:1;">
            
            <div class="reveal" style="text-align:center;margin-bottom:60px;">
                <span style="color:#f59e0b;font-family:var(--font-mono);font-weight:500;letter-spacing:6px;font-size:0.75rem;text-transform:uppercase;display:block;margin-bottom:20px;">Our Heritage</span>
                <h2 style="font-family:var(--font-heading);font-size:clamp(2.5rem,4vw,4rem);color:#1c1917;font-weight:900;font-style:italic;line-height:1.1;letter-spacing:-1px;">
                    The Foundation of Elite Enterprise Properties.
                </h2>
            </div>
            
            <div style="display:grid;grid-template-columns:1.2fr 1fr;gap:80px;align-items:center;">
                
                {{-- Text Content --}}
                <div class="reveal">
                    <div style="font-size:1.15rem;color:#78716c;line-height:2.1;font-weight:300;">
                        <p style="margin-bottom:32px;">
                            Vertex stands as the premier authority in the Kingdom's elite enterprise market. For over 15 years, we have merged impeccable market intelligence with visionary architectural curation to secure legacy assets.
                        </p>
                        <p style="margin-bottom:48px;">
                            Our strategy is anchored in uncompromising quality, ensuring every acquisition or specialized portfolio we manage exceeds global valuation standards while defining the apex of urban luxury in the Kingdom of Saudi Arabia.
                        </p>
                    </div>

                    <div style="display:grid;grid-template-columns:1fr;gap:32px;">
                        <div style="border-left:2px solid rgba(245,158,11,0.3);padding-left:24px;">
                            <h4 style="font-family:var(--font-heading);font-size:1.5rem;font-weight:900;color:#1c1917;margin-bottom:8px;font-style:italic;">Absolute Quality Control</h4>
                            <p style="font-family:var(--font-mono);font-size:0.8rem;color:#a8a29e;line-height:1.7;">Meticulous evaluation of every structural and design element before onboarding any asset into our portfolio.</p>
                        </div>
                        <div style="border-left:2px solid rgba(245,158,11,0.3);padding-left:24px;">
                            <h4 style="font-family:var(--font-heading);font-size:1.5rem;font-weight:900;color:#1c1917;margin-bottom:8px;font-style:italic;">Legacy Curators</h4>
                            <p style="font-family:var(--font-mono);font-size:0.8rem;color:#a8a29e;line-height:1.7;">Transforming standard property investments into generational wealth instruments spanning multiple asset classes.</p>
                        </div>
                    </div>
                </div>

                {{-- Image Display --}}
                <div class="reveal-scale" style="position:relative;height:500px;">
                    <div style="position:absolute;top:0;right:0;width:80%;height:80%;border-radius:4px;overflow:hidden;box-shadow:0 30px 60px rgba(0,0,0,0.1);">
                        <img src="https://images.unsplash.com/photo-1449824913935-59a10b8d2000?auto=format&fit=crop&q=80&w=1200" alt="Vertex Legacy Estate" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                    <div style="position:absolute;bottom:0;left:0;width:60%;height:60%;border-radius:4px;overflow:hidden;box-shadow:0 40px 80px rgba(0,0,0,0.2);border:8px solid #fafaf8;">
                        <img src="https://images.unsplash.com/photo-1444491741275-3747c53c99b4?auto=format&fit=crop&q=80&w=800" alt="Vertex Modern Architecture" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                    <div style="position:absolute;bottom:50px;right:-30px;background:#f59e0b;color:#1c1917;padding:16px 32px;display:inline-flex;align-items:center;gap:12px;font-family:var(--font-mono);font-size:0.75rem;font-weight:700;letter-spacing:4px;text-transform:uppercase;box-shadow:0 20px 40px rgba(245,158,11,0.2);">
                        <span>Established Authority</span>
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- ══════════════════════════════════════════════
         METRICS TICKER
    ══════════════════════════════════════════════ --}}
    <section style="padding:0;background:#1c1917;position:relative;overflow:hidden;border-top:1px solid rgba(245,158,11,0.07);border-bottom:1px solid rgba(245,158,11,0.07);">
        <div class="slider-track" style="display:flex;width:200%;animation:slide-move 40s linear infinite;">
            @foreach([0,1] as $i)
            <div style="display:flex;gap:120px;align-items:center;padding:44px 80px;">
                @foreach([
                    ['num'=>$settings['home_stats_years'] ?? '20+','label'=>'Years Excellence'],
                    ['num'=>$settings['home_stats_assets'] ?? 'SAR 4.2B','label'=>'Assets Valued'],
                    ['num'=>$settings['home_stats_projects'] ?? '1,200+','label'=>'Kingdom Developments'],
                    ['num'=>'100%','label'=>'Client Retention'],
                ] as $stat)
                <div style="display:flex;align-items:baseline;gap:18px;white-space:nowrap;">
                    <span style="color:#f59e0b;font-family:var(--font-heading);font-size:2.4rem;font-weight:900;font-style:italic;">{{ $stat['num'] }}</span>
                    <span style="color:rgba(255,255,255,0.3);font-family:var(--font-mono);font-weight:500;letter-spacing:3px;text-transform:uppercase;font-size:0.72rem;">{{ $stat['label'] }}</span>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </section>

 {{-- ══════════════════════════════════════════════
         DIFFERENTIATORS STRIP
    ══════════════════════════════════════════════ --}}
    <section style="padding:80px 60px;background:#1c1917;">
        <div style="max-width:1440px;margin:0 auto;">
            
            <div class="reveal" style="text-align:center;margin-bottom:72px;">
                <span style="font-family:var(--font-mono);color:#f59e0b;font-size:0.75rem;font-weight:700;letter-spacing:6px;text-transform:uppercase;display:block;margin-bottom:20px;">Why Choose Vertex</span>
                <h2 style="font-family:var(--font-heading);font-size:clamp(3rem,4vw,5rem);color:#fff;font-weight:900;font-style:italic;letter-spacing:-1px;line-height:1;margin:0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                    The Vertex <span class="text-gradient">Difference.</span>
                </h2>
            </div>

            <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:40px;">
                @php
                    $diffs = [
                        ['n'=>'01','t'=>'Exclusive Focus','d'=>'Unmatched proficiency natively tailored to the Kingdom’s high-end property sector.','icon'=>'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ['n'=>'02','t'=>'Strategic Synergy','d'=>'Merging extensive architectural heritage with powerful data-driven investment tools.','icon'=>'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ['n'=>'03','t'=>'Global Standard','d'=>'Operations compliant with International Valuation and Architectural protocols natively.','icon'=>'M13 10V3L4 14h7v7l9-11h-7z'],
                        ['n'=>'04','t'=>'Elite Support','d'=>'Mission-critical, dedicated guidance from seasoned intelligence advisors.','icon'=>'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ];
                @endphp
                @foreach($diffs as $i => $d)
                <div class="reveal" style="transition-delay:{{ $i * 100 }}ms; height:100%;">
                    <div class="diff-card" style="padding:48px 36px;border:1px solid rgba(245,158,11,0.08);background:transparent;height:100%;"
                         onmouseover="this.style.background='rgba(245,158,11,0.05)';this.style.borderColor='rgba(245,158,11,0.2)';"
                         onmouseout="this.style.background='transparent';this.style.borderColor='rgba(245,158,11,0.08)';">
                        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:32px;">
                            <span style="font-family:var(--font-mono);font-size:0.65rem;color:rgba(245,158,11,0.35);letter-spacing:4px;font-weight:700;">{{ $d['n'] }}</span>
                            <div style="width:48px;height:48px;background:rgba(245,158,11,0.05);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                                <svg width="22" height="22" fill="none" stroke="#f59e0b" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $d['icon'] }}"/></svg>
                            </div>
                        </div>
                        <h4 style="font-family:var(--font-heading);font-size:1.6rem;color:#fff;margin-bottom:16px;font-weight:900;font-style:italic;">{{ $d['t'] }}</h4>
                        <p style="color:rgba(255,255,255,0.4);font-size:1rem;line-height:1.8;font-weight:300;">{{ $d['d'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════
         PLATFORM SHOWCASE
    ══════════════════════════════════════════════ --}}
    <section style="padding:80px 60px;background:#fff;position:relative;overflow:hidden;">
        <div style="position:absolute;top:0;right:-10%;width:50%;height:100%;background:rgba(245,158,11,0.02);transform:skewX(-12deg);pointer-events:none;"></div>

        <div class="container-fluid" style="max-width:1440px;margin:0 auto;position:relative;z-index:2;">
            
            <div class="reveal" style="text-align:center;margin-bottom:60px;">
                <span style="color:#f59e0b;font-family:var(--font-mono);font-weight:500;letter-spacing:6px;font-size:0.75rem;text-transform:uppercase;display:block;margin-bottom:20px;">Strategic Property Solutions</span>
                <h2 style="font-family:var(--font-heading);font-size:clamp(2.5rem,4vw,4rem);color:#1c1917;font-weight:900;font-style:italic;line-height:1.1;letter-spacing:-1px;">
                    Curating Distinction & Value.
                </h2>
            </div>
            
            {{-- Redesigned Cards: Hover turns them Dark Brown --}}
            <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:40px;">
                @php
                    $suites = [
                        ['t'=>'Aura Management','d'=>'Exclusive supervision of high-net-worth property portfolios, ensuring immaculate maintenance and optimized yields up to 12% annually.','tag'=>'ASSET CONTROL','icon'=>'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
                        ['t'=>'Elite Advisory','d'=>'Bespoke consultation for institutional investors focusing on off-market commercial treasures and prime developmental assets.','tag'=>'INVESTMENT INTELLIGENCE','icon'=>'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ['t'=>'Signature Build','d'=>'End-to-end oversight of majestic ground-up developments, marrying architectural conceptualization with flawless structural execution.','tag'=>'DEVELOPMENT EXPERTISE','icon'=>'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                    ];
                @endphp

                @foreach($suites as $idx => $s)
                <div class="reveal" style="transition-delay:{{ $idx * 150 }}ms;">
                    <div class="strategy-card">
                        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:32px;">
                            <span class="tag-text" style="font-family:var(--font-mono);font-size:0.6rem;font-weight:700;letter-spacing:4px;text-transform:uppercase;">{{ $s['tag'] }}</span>
                            <div class="icon-color">
                                <svg width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="{{ $s['icon'] }}"/></svg>
                            </div>
                        </div>

                        <h3 style="font-family:var(--font-heading);font-size:1.8rem;margin-bottom:20px;font-weight:900;font-style:italic;letter-spacing:-0.5px;">{{ $s['t'] }}</h3>
                        
                        <p class="desc" style="line-height:2;font-size:1rem;font-weight:300;flex-grow:1;margin-bottom:40px;">{{ $s['d'] }}</p>
                        
                        <div style="display:flex;align-items:center;gap:12px;">
                            <a href="/services" class="more-link" style="font-family:var(--font-mono);font-size:0.75rem;font-weight:700;letter-spacing:3px;text-transform:uppercase;text-decoration:none;padding-bottom:4px;">Discover More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- ══════════════════════════════════════════════
         MARKET INTELLIGENCE GRID
    ══════════════════════════════════════════════ --}}
    <section style="padding:80px 60px;background:#1c1917;position:relative;overflow:hidden;">
        <div style="position:absolute;inset:0;background:url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=5&w=1600') center/cover;opacity:0.04;pointer-events:none;"></div>

        <div style="max-width:1440px;margin:0 auto;position:relative;z-index:1;">
            
            <div class="reveal" style="text-align:center;margin-bottom:60px;">
                <span style="color:#f59e0b;font-family:var(--font-mono);font-weight:500;letter-spacing:6px;font-size:0.75rem;text-transform:uppercase;display:block;margin-bottom:20px;">Insights & Analysis</span>
                <h2 style="font-family:var(--font-heading);font-size:clamp(2.5rem,4vw,4rem);color:#fff;font-weight:900;font-style:italic;letter-spacing:-1px;line-height:1.1;">
                    Vertex Market Intelligence.
                </h2>
            </div>
            
            <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:2px;background:rgba(245,158,11,0.06);">
                @php
                    $posts = \App\Models\NewsPost::orderBy('published_at','desc')->take(3)->get();
                    $fallbacks = [
                        ['slug'=>'market-audit-2025','title'=>'Kingdom Market Strategic Audit','content'=>'Substantive analysis of commercial projections across the primary business hubs.','img'=>asset('images/B1.jpg'),'date'=>'April 2026'],
                        ['slug'=>'architectural-legacies','title'=>'Architectural Integrity & Legacies','content'=>'Exploration of heritage preservation in the Kingdom’s developing urban landscapes.','img'=>asset('images/B2.jpg'),'date'=>'March 2026'],
                        ['slug'=>'future-valuations','title'=>'The Future of Real Estate Valuations','content'=>'How emerging data intelligence is redefining asset evaluation standards.','img'=>asset('images/B3.jpg'),'date'=>'Feb 2026'],
                    ];
                    
                    $extract = function($data) {
                        if (is_array($data)) return $data['en'] ?? '';
                        $decoded = json_decode($data ?? '{}', true);
                        if (is_array($decoded)) return $decoded['en'] ?? (string)$data;
                        return (string)$data;
                    };
                @endphp

                @for($i = 0; $i < 3; $i++)
                    @php
                        $post = $posts[$i] ?? null;
                        $fallback = $fallbacks[$i] ?? null;
                        
                        $title = $post ? $extract($post->title) : ($fallback['title'] ?? '');
                        $content = $post ? $extract($post->content) : ($fallback['content'] ?? '');
                        $slug = $post ? $post->slug : ($fallback['slug'] ?? '#');
                        $date = $post ? ($post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('M d, Y') : 'STRATEGIC') : ($fallback['date'] ?? '');
                        
                        $reImgs = [asset('images/B1.jpg'), asset('images/B2.jpg'), asset('images/B3.jpg')];
                        $displayImg = $reImgs[$i % 3];
                    @endphp
                    <div class="reveal" style="transition-delay:{{ $i * 150 }}ms;">
                        <div class="insight-card">
                            <div style="aspect-ratio:2/1;overflow:hidden;position:relative;">
                                <img src="{{ $displayImg }}" class="card-img" style="width:100%;height:100%;object-fit:cover;opacity:0.8;">
                                <div style="position:absolute;bottom:0;left:0;width:100%;height:50%;background:linear-gradient(to top,#1c1917,transparent);"></div>
                            </div>

                            <div style="padding:24px 32px 32px;display:flex;flex-direction:column;flex-grow:1;">
                                <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
                                    <span style="font-family:var(--font-mono);color:#f59e0b;font-weight:500;font-size:0.65rem;text-transform:uppercase;letter-spacing:4px;">{{ $date }}</span>
                                </div>
                                <h3 style="font-family:var(--font-heading);font-size:1.4rem;font-weight:900;color:#fff;margin-bottom:16px;line-height:1.3;font-style:italic;letter-spacing:-0.5px;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">{{ $title }}</h3>
                                <p style="color:rgba(255,255,255,0.42);font-size:0.95rem;line-height:1.8;font-weight:300;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;margin-bottom:32px;flex-grow:1;">{{ Str::limit(strip_tags($content), 120) }}</p>
                                
                                <div>
                                    <a href="/news/{{ $slug }}" style="display:inline-flex;align-items:center;justify-content:center;width:40px;height:40px;background:rgba(245,158,11,0.08);border-radius:8px;color:#f59e0b;text-decoration:none;transition:all 0.4s;" onmouseover="this.style.background='#f59e0b';this.style.color='#1c1917'" onmouseout="this.style.background='rgba(245,158,11,0.08)';this.style.color='#f59e0b'">
                                        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            
            <div class="reveal" style="text-align:center;margin-top:52px;">
                <a href="/news" class="btn-outline" style="border-color:rgba(255,255,255,0.2);color:#fff;padding:16px 40px;font-size:0.75rem;letter-spacing:3px;border-radius:50px;">VIEW ALL REPORTS</a>
            </div>
        </div>
    </section>


    {{-- ══════════════════════════════════════════════
         CONTACT
    ══════════════════════════════════════════════ --}}
    <section id="contact" style="padding:80px 60px;background:#fafaf8;position:relative;overflow:hidden;">
        
        <div style="max-width:1000px;margin:0 auto;position:relative;z-index:10;">
            
            <div class="reveal" style="text-align:center;margin-bottom:60px;">
                <span style="color:#f59e0b;font-family:var(--font-mono);font-weight:500;letter-spacing:6px;font-size:0.75rem;text-transform:uppercase;display:block;margin-bottom:20px;">Direct Dialogue</span>
                <h2 style="font-family:var(--font-heading);font-size:clamp(3rem,5vw,5rem);font-weight:900;color:#1c1917;font-style:italic;letter-spacing:-1px;line-height:1;">
                    Initiate <span style="color:#f59e0b;">Contact.</span>
                </h2>
            </div>
            
            <div style="display:grid;grid-template-columns:1fr;gap:50px;">
                
                {{-- Quick Contact Information --}}
                <div class="reveal" style="display:flex;justify-content:center;gap:60px;padding-bottom:50px;border-bottom:1px solid #e7e5e4;">
                    <div style="display:flex;align-items:center;gap:20px;">
                        <div style="width:40px;height:40px;border-radius:50%;background:#f59e0b;display:flex;align-items:center;justify-content:center;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1c1917" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.69 13 19.79 19.79 0 011.61 4.37 2 2 0 013.6 2.18h3a2 2 0 012 1.72c.13.96.37 1.9.72 2.81a2 2 0 01-.45 2.11L7.91 9.91a16 16 0 006.06 6.06l.99-.99a2 2 0 012.11-.45c.91.35 1.85.59 2.81.72A2 2 0 0122 16.92z"/></svg>
                        </div>
                        <div>
                            <p style="font-family:var(--font-mono);color:#a8a29e;font-size:0.6rem;text-transform:uppercase;letter-spacing:4px;margin-bottom:4px;">Terminal</p>
                            <p style="color:#1c1917;font-size:1.1rem;font-weight:700;letter-spacing:1px;">+966 54 113 1137</p>
                        </div>
                    </div>
                    
                    <div style="width:1px;background:#e7e5e4;"></div>
                    
                    <div style="display:flex;align-items:center;gap:20px;">
                        <div style="width:40px;height:40px;border-radius:50%;background:#f59e0b;display:flex;align-items:center;justify-content:center;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1c1917" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </div>
                        <div>
                            <p style="font-family:var(--font-mono);color:#a8a29e;font-size:0.6rem;text-transform:uppercase;letter-spacing:4px;margin-bottom:4px;">Mailbox</p>
                            <p style="color:#1c1917;font-size:1.1rem;font-weight:700;letter-spacing:1px;">info@vertex-enterprise.sa</p>
                        </div>
                    </div>
                </div>

                <div class="reveal">
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;margin-bottom:24px;">
                            <div>
                                <label style="font-family:var(--font-mono);font-size:0.65rem;font-weight:700;color:#78716c;text-transform:uppercase;letter-spacing:4px;display:block;margin-bottom:10px;">Full Name</label>
                                <input type="text" name="name" required placeholder="Ahmad Al-Saud"
                                    style="width:100%;background:#fff;border:1px solid #e7e5e4;border-radius:2px;padding:16px 24px;color:#1c1917;font-size:1rem;font-weight:400;outline:none;transition:border-color 0.3s;box-sizing:border-box;font-family:var(--font-body);"
                                    onfocus="this.style.borderColor='#f59e0b'" onblur="this.style.borderColor='#e7e5e4'">
                            </div>
                            <div>
                                <label style="font-family:var(--font-mono);font-size:0.65rem;font-weight:700;color:#78716c;text-transform:uppercase;letter-spacing:4px;display:block;margin-bottom:10px;">Phone</label>
                                <input type="tel" name="phone" required placeholder="+966 --- --- ----"
                                    style="width:100%;background:#fff;border:1px solid #e7e5e4;border-radius:2px;padding:16px 24px;color:#1c1917;font-size:1rem;font-weight:400;outline:none;transition:border-color 0.3s;box-sizing:border-box;font-family:var(--font-body);"
                                    onfocus="this.style.borderColor='#f59e0b'" onblur="this.style.borderColor='#e7e5e4'">
                            </div>
                        </div>
                        <div style="margin-bottom:24px;">
                            <label style="font-family:var(--font-mono);font-size:0.65rem;font-weight:700;color:#78716c;text-transform:uppercase;letter-spacing:4px;display:block;margin-bottom:10px;">Email Address</label>
                            <input type="email" name="email" required placeholder="name@enterprise.com"
                                style="width:100%;background:#fff;border:1px solid #e7e5e4;border-radius:2px;padding:16px 24px;color:#1c1917;font-size:1rem;font-weight:400;outline:none;transition:border-color 0.3s;box-sizing:border-box;font-family:var(--font-body);"
                                onfocus="this.style.borderColor='#f59e0b'" onblur="this.style.borderColor='#e7e5e4'">
                        </div>
                        <div style="margin-bottom:40px;">
                            <label style="font-family:var(--font-mono);font-size:0.65rem;font-weight:700;color:#78716c;text-transform:uppercase;letter-spacing:4px;display:block;margin-bottom:10px;">Inquiry Context</label>
                            <textarea name="message" rows="5" placeholder="Specify your consulting or development requirements..."
                                style="width:100%;background:#fff;border:1px solid #e7e5e4;border-radius:2px;padding:16px 24px;color:#1c1917;font-size:1rem;font-weight:400;outline:none;resize:vertical;transition:border-color 0.3s;box-sizing:border-box;font-family:var(--font-body);"
                                onfocus="this.style.borderColor='#f59e0b'" onblur="this.style.borderColor='#e7e5e4'"></textarea>
                        </div>
                        <div style="text-align:center;">
                            <button type="submit" class="btn-gold" style="padding:22px 60px;font-size:0.82rem;letter-spacing:4px;border-radius:50px;border:none;cursor:pointer;">TRANSMIT MESSAGE</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <style>
        @keyframes slide-move {
            0%   { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        
        .cursor {
            color: #f59e0b;
            font-weight: 300;
            animation: blink 1s step-end infinite;
        }
        @keyframes blink {
            50% { opacity: 0; }
        }
    </style>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const phrases = ["Architecture.", "Specialized Innovations.", "Economic Excellence."];
            const element = document.getElementById("typewriter-text");
            let i = 0;
            let phraseIndex = 0;
            let isDeleting = false;
            
            function typeWriter() {
                const currentPhrase = phrases[phraseIndex];
                
                if (!isDeleting && i < currentPhrase.length) {
                    element.innerHTML = currentPhrase.substring(0, i + 1);
                    i++;
                    setTimeout(typeWriter, 150);
                } else if (isDeleting && i > 0) {
                    element.innerHTML = currentPhrase.substring(0, i - 1);
                    i--;
                    setTimeout(typeWriter, 100);
                } else if (!isDeleting && i === currentPhrase.length) {
                    isDeleting = true;
                    setTimeout(typeWriter, 2500);
                } else if (isDeleting && i === 0) {
                    isDeleting = false;
                    phraseIndex = (phraseIndex + 1) % phrases.length;
                    setTimeout(typeWriter, 800);
                }
            }
            
            // Start typing after initial load animations
            setTimeout(typeWriter, 1000);
        });
    </script>
    @endpush

@endsection
