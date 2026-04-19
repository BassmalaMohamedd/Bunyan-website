@extends('layouts.public')

@section('title', 'Our Services | Vertex Ecosystem')

@section('content')

    <style>
        /* Card Base */
        .service-card {
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid transparent; /* default */
            transition: all 0.5s cubic-bezier(0.16,1,0.3,1);
            position: relative;
            display: flex;
            flex-direction: column;
            height: 100%;
            padding: 50px 42px;
        }
        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 40px 80px rgba(28,25,23,0.1);
        }

        /* Light Card */
        .card-light { background: #fafaf8; border-color: #e7e5e4; }
        .card-light h3 { color: #1c1917; transition: color 0.5s; }
        .card-light p { color: #78716c; transition: color 0.5s; }
        .card-light .icon-box { background: #fff; border: 1px solid #e7e5e4; transition: all 0.5s; }
        
        .card-light:hover { background: #1c1917; border-color: #1c1917; }
        .card-light:hover h3 { color: #fff; }
        .card-light:hover p { color: rgba(255,255,255,0.6); }
        .card-light:hover .icon-box { background: rgba(255,255,255,0.03); border-color: rgba(255,255,255,0.05); }

        /* Dark Card */
        .card-dark { background: #1c1917; border-color: #1c1917; }
        .card-dark h3 { color: #fff; transition: color 0.5s; }
        .card-dark p { color: rgba(255,255,255,0.45); transition: color 0.5s; }
        .card-dark .icon-box { background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.05); transition: all 0.5s; }

        .card-dark:hover { background: #fff; border-color: #f59e0b; }
        .card-dark:hover h3 { color: #1c1917; }
        .card-dark:hover p { color: #78716c; }
        .card-dark:hover .icon-box { background: #fff; border-color: #f59e0b; }

        .diff-card {
            border-radius: 24px;
            transition: all 0.7s cubic-bezier(0.16,1,0.3,1);
        }
        
        @keyframes marquee { 
            0% { transform: translateX(0); } 
            100% { transform: translateX(-50%); } 
        }
        .marquee-content { 
            display: flex; 
            width: 200%; 
            animation: marquee 25s linear infinite; 
        }
        
        @keyframes hero-fade {
            0% { opacity: 0; transform: scale(1.03); }
            100% { opacity: 1; transform: scale(1); }
        }
    </style>

    {{-- ══════════════════════════════════════════════
         HERO SECTION 
    ══════════════════════════════════════════════ --}}
    <section style="height:60vh;background:#1c1917;display:flex;align-items:center;justify-content:center;position:relative;overflow:hidden;padding:0 60px;">
        <div style="position:absolute;inset:0;animation:hero-fade 2.5s cubic-bezier(0.16,1,0.3,1) forwards;">
            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=2000" style="width:100%;height:100%;object-fit:cover;opacity:0.12;">
            <div style="position:absolute;inset:0;background:linear-gradient(180deg,rgba(28,25,23,0.95),rgba(28,25,23,0.6));"></div>
        </div>

        <div style="max-width:1440px;margin:0 auto;width:100%;position:relative;z-index:10;text-align:center;">
            <div class="reveal-slow active">
                <div style="display:inline-flex;align-items:center;gap:18px;margin-bottom:30px;">
                    <div style="width:40px;height:1px;background:#f59e0b;"></div>
                    <span style="font-family:var(--font-mono);color:#f59e0b;font-size:0.75rem;font-weight:700;letter-spacing:5px;text-transform:uppercase;">The Specialized Ecosystem</span>
                    <div style="width:40px;height:1px;background:#f59e0b;"></div>
                </div>
                
                <h1 style="font-family:var(--font-heading);font-size:clamp(3.5rem,7vw,7rem);line-height:1;color:#fff;font-weight:900;font-style:italic;letter-spacing:-2px;margin:0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                    Our <span class="text-gradient">Services.</span>
                </h1>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════
         SCROLLING ECOSYSTEM STRIP
    ══════════════════════════════════════════════ --}}
    <section style="padding:0;background:#f59e0b;overflow:hidden;">
        <div class="marquee-content">
            @for($i=0; $i<2; $i++)
                @foreach(['Enterprise Solutions','·','Market Expansion','·','Investment Portfolios','·','Digital Architecture','·','Commercial Leasing','·','Asset Valuation','·'] as $item)
                <span style="font-family:var(--font-mono);font-size:0.75rem;font-weight:700;letter-spacing:4px;text-transform:uppercase;color:#1c1917;white-space:nowrap;padding:20px 32px;">{{ $item }}</span>
                @endforeach
            @endfor
        </div>
    </section>

    {{-- ══════════════════════════════════════════════
         SERVICES (Rounded cards, Title next to icon, Hover inject)
    ══════════════════════════════════════════════ --}}
    <section style="padding:80px 60px;background:#fff;position:relative;overflow:hidden;">
        <div style="position:absolute;top:0;right:-5%;width:40%;height:100%;background:rgba(245,158,11,0.02);transform:skewX(-8deg);pointer-events:none;"></div>

        <div style="max-width:1440px;margin:0 auto;position:relative;z-index:2;">

            <div class="reveal" style="text-align:center;margin-bottom:60px;">
                <span style="font-family:var(--font-mono);color:#f59e0b;font-size:0.75rem;font-weight:700;letter-spacing:6px;text-transform:uppercase;display:block;margin-bottom:20px;">Platform Services</span>
                <h2 style="font-family:var(--font-heading);font-size:clamp(3rem,4vw,5rem);color:#1c1917;font-weight:900;font-style:italic;letter-spacing:-1px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;margin:0;">
                    Built for Elite <span class="text-gradient">Enterprises.</span>
                </h2>
            </div>

            @php
                $icons = [
                    'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                    'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9',
                    'M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z',
                    'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
                    'M13 10V3L4 14h7v7l9-11h-7z',
                    'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z',
                    'M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z',
                    'M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z',
                    'M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4'
                ];
                $tags = ['VALUATION','DEVELOPMENT','MANAGEMENT','ANALYTICS','ARCHITECTURE','COMPLIANCE', 'EXPANSION', 'OPTIMIZATION', 'SOVEREIGNTY'];
                
                $hardcodedServices = [
                    ['t' => 'Valuation Engine', 'd' => 'Automated and strictly IVS-compliant property appraisal algorithms designed for rapid valuation turnaround.'],
                    ['t' => 'Project Development', 'd' => 'Comprehensive overarching toolsets for tracking enterprise-scale developmental milestones.'],
                    ['t' => 'Property Management', 'd' => 'Intelligent end-to-end tenant, leasing, and maintenance resolution workflows that eliminate human delay.'],
                    ['t' => 'Financial Analytics', 'd' => 'Deep predictive market insights processing massive datasets to forecast capital growth trajectories.'],
                    ['t' => 'Architectural AI', 'd' => 'Precision automated spatial compliance mechanisms supporting modern sustainable design generation.'],
                    ['t' => 'Market Analysis', 'd' => 'Ensuring every single transaction meets the Kingdom’s most stringent operational regulations natively.'],
                    ['t' => 'Market Expansion', 'd' => 'Data-led geographical mapping algorithms specialized for unveiling high-worth acquisition targets.'],
                    ['t' => 'Asset Optimization', 'd' => 'Drastically minimizing ongoing operational friction to maximize enterprise structural yields dynamically.'],
                    ['t' => 'Digital Sovereignty', 'd' => 'Fully custom-engineered secure digital ecosystems that grant full ownership and data autonomy.'],
                ];
            @endphp

            <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:40px;">
                @foreach($hardcodedServices as $index => $srv)
                    @php
                        $title       = $srv['t'];
                        $description = $srv['d'];
                        
                        $iconPath    = $icons[$index % count($icons)];
                        $tag         = $tags[$index % count($tags)];
                        $isDark      = $index % 3 === 1; // Center column is dark
                        $cardClass   = $isDark ? 'card-dark' : 'card-light';
                    @endphp
                    <div class="reveal" style="transition-delay:{{ ($index % 3) * 120 }}ms; height:100%;">
                        <div class="service-card {{ $cardClass }}">
                            
                            {{-- Tag --}}
                            <div style="font-family:var(--font-mono);font-size:0.62rem;font-weight:700;color:#f59e0b;border:1px solid rgba(245,158,11,0.3);padding:6px 16px;display:inline-block;margin-bottom:30px;letter-spacing:2px;border-radius:50px;width:fit-content;">{{ $tag }}</div>

                            {{-- Icon and Title (Flex grouped) --}}
                            <div style="display:flex;align-items:center;gap:18px;margin-bottom:28px;">
                                <div class="icon-box" style="width:55px;height:55px;border-radius:50%;display:flex;flex-shrink:0;align-items:center;justify-content:center;">
                                    <svg width="22" height="22" fill="none" stroke="#f59e0b" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $iconPath }}"/></svg>
                                </div>
                                <h3 style="font-family:var(--font-heading);font-size:1.7rem;font-weight:900;margin:0;font-style:italic;letter-spacing:-0.5px;line-height:1.2;">{{ $title }}</h3>
                            </div>

                            {{-- Description --}}
                            <p style="font-size:1rem;line-height:1.9;font-weight:300;flex-grow:1;margin-bottom:0px;">{{ $description }}</p>
                            
                        </div>
                    </div>
                @endforeach
            </div>

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
         CONTACT CTA
    ══════════════════════════════════════════════ --}}
    <section style="padding:120px 60px;background:linear-gradient(135deg,#1c1917 0%,#292524 100%);text-align:center;position:relative;overflow:hidden;">
        <div style="position:absolute;inset:0;background:url('{{ asset('images/premium_villa_hero.png') }}') center/cover;opacity:0.04;pointer-events:none;"></div>
        
        <div class="reveal" style="max-width:1000px;margin:0 auto;position:relative;z-index:1;">
            <span style="font-family:var(--font-mono);color:#f59e0b;font-size:0.75rem;font-weight:700;letter-spacing:6px;text-transform:uppercase;display:block;margin-bottom:24px;">Start a Project</span>
            <h2 style="font-family:var(--font-heading);font-size:clamp(3rem,4vw,5rem);color:#fff;font-weight:900;font-style:italic;line-height:1.1;letter-spacing:-1px;margin-bottom:50px;">
                Ready to integrate our ecosystem?
            </h2>
            
            <div style="display:flex;gap:32px;justify-content:center;align-items:center;">
                <a href="{{ url('/#contact') }}" class="btn-gold" style="border-radius:50px;padding:22px 60px;">START DIALOGUE</a>
            </div>
        </div>
    </section>

@endsection
