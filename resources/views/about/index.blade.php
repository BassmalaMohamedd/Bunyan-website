@extends('layouts.public')

@section('title', 'About Vertex | Redefining Enterprise Real Estate.')

@section('content')

    <style>
        .strategy-box:hover { 
            transform: translateY(-8px); 
            border-color: #f59e0b; 
            background: #fff; 
            box-shadow: 0 40px 80px rgba(0,0,0,0.06); 
        }
        
        @keyframes hero-fade-in {
            0% { opacity: 0; transform: scale(1.05); }
            100% { opacity: 1; transform: scale(1); }
        }
        .hero-bg-reveal {
            animation: hero-fade-in 2.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
    </style>

    {{-- ══════════════════════════════════════════════
         HERO SECTION 
    ══════════════════════════════════════════════ --}}
    <section style="height:70vh;background:#1c1917;display:flex;align-items:center;justify-content:center;position:relative;overflow:hidden;padding:0 60px;">
        <div class="hero-bg-reveal" style="position:absolute;inset:0;">
            <img src="{{ asset('images/B2.jpg') }}" alt="Vertex Architecture" style="width:100%;height:100%;object-fit:cover;opacity:0.25;">
            <div style="position:absolute;inset:0;background:linear-gradient(180deg,rgba(28,25,23,0.95), rgba(28,25,23,0.6));"></div>
        </div>

        <div style="max-width:1440px;margin:0 auto;width:100%;position:relative;z-index:10;text-align:center;">
            <div class="reveal-slow active">
                <div style="display:inline-flex;align-items:center;gap:18px;margin-bottom:30px;">
                    <div style="width:40px;height:1px;background:#f59e0b;"></div>
                    <span style="font-family:var(--font-mono);color:#f59e0b;font-size:0.75rem;font-weight:700;letter-spacing:5px;text-transform:uppercase;">Who We Are</span>
                    <div style="width:40px;height:1px;background:#f59e0b;"></div>
                </div>
                
                <h1 style="font-family:var(--font-heading);font-size:clamp(3.5rem,7vw,7rem);line-height:1;color:#fff;font-weight:900;font-style:italic;letter-spacing:-2px;margin:0;">
                    About <span class="text-gradient">Vertex.</span>
                </h1>
            </div>
        </div>
    </section>


    {{-- ══════════════════════════════════════════════
         OUR ESSENCE (Overlapping Elegant Card Design)
    ══════════════════════════════════════════════ --}}
    <section style="padding:100px 60px;background:#fafaf8;position:relative;">
        <div style="max-width:1440px;margin:0 auto;position:relative;">
            
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:0;align-items:center;">
                <div class="reveal-scale" style="height:650px;border-radius:2px;overflow:hidden;box-shadow:0 30px 60px rgba(0,0,0,0.1);position:relative;z-index:1;">
                    <img src="{{ asset('images/B1.jpg') }}" style="width:100%;height:100%;object-fit:cover;transition:transform 10s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                </div>
                
                <div class="reveal" style="background:#fff;padding:80px;border:1px solid #e7e5e4;box-shadow:0 40px 100px rgba(28,25,23,0.06);margin-left:-100px;position:relative;z-index:2;border-left:4px solid #f59e0b;">
                    <span style="font-family:var(--font-mono);color:#f59e0b;font-size:0.75rem;font-weight:700;letter-spacing:6px;text-transform:uppercase;display:block;margin-bottom:24px;">Our Essence</span>
                    <h2 style="font-family:var(--font-heading);font-size:clamp(2.2rem,3vw,3rem);color:#1c1917;font-weight:900;font-style:italic;line-height:1.2;letter-spacing:-1px;margin-bottom:30px;">
                        Expanding the Kingdom of Saudi Arabia's monumental property footprint.
                    </h2>
                    <p style="font-size:1.1rem;line-height:2.1;color:#78716c;font-weight:300;margin-bottom:24px;">
                        At Vertex Enterprise, we view properties not as static assets, but as dynamic vehicles. We have meticulously built comprehensive real estate ecosystems to transition standard investments into elite, future-proof portfolios.
                    </p>
                    <p style="font-size:1.1rem;line-height:2.1;color:#78716c;font-weight:300;">
                        Guided entirely by unyielding integrity and precision-driven strategies, we proudly power the Kingdom of Saudi Arabia's most ambitious structural developments in alignment with Vision 2030.
                    </p>
                </div>
            </div>

        </div>
    </section>


    {{-- ══════════════════════════════════════════════
         CORE PHILOSOPHY 
    ══════════════════════════════════════════════ --}}
    <section style="padding:80px 60px;background:#1c1917;position:relative;overflow:hidden;">
        <div style="position:absolute;inset:0;background:url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=5&w=1600') center/cover;opacity:0.04;pointer-events:none;"></div>

        <div style="max-width:1440px;margin:0 auto;position:relative;z-index:1;">
            
            <div class="reveal" style="text-align:center;margin-bottom:60px;">
                <span style="font-family:var(--font-mono);color:#f59e0b;font-size:0.75rem;font-weight:700;letter-spacing:6px;text-transform:uppercase;display:block;margin-bottom:20px;">Core Philosophy</span>
                
                <h2 style="font-family:var(--font-heading);font-size:clamp(3rem,4vw,5rem);color:#fff;font-weight:900;font-style:italic;line-height:1.2;letter-spacing:-1px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                    Inviolate <span class="text-gradient">Values.</span>
                </h2>
            </div>
            
            <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:2px;background:rgba(245,158,11,0.06);">
                @php
                    $values = [
                        ['n'=>'01','t'=>'Immutable Integrity','d'=>'Unyielding adherence to global ethical standards and professional regulatory frameworks in all our property dealings. No exceptions.','icon'=>'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                        ['n'=>'02','t'=>'Market Precision','d'=>'Meticulous attention to detail in every valuation implementation ensures absolute accuracy of all market insights and financial metrics.','icon'=>'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z'],
                        ['n'=>'03','t'=>'Sustainable Assets','d'=>'Developing luxury architecture that evolves gracefully, ensuring long-term structural performance, perpetual asset value, and environmental scalability.','icon'=>'M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15'],
                    ];
                @endphp
                @foreach($values as $i => $v)
                <div class="reveal" style="transition-delay:{{ $i * 100 }}ms;">
                    <div style="padding:64px 52px;background:#1c1917;height:100%;transition:all 0.7s cubic-bezier(0.16,1,0.3,1);"
                         onmouseover="this.style.background='rgba(245,158,11,0.07)'" onmouseout="this.style.background='#1c1917'">
                        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:40px;">
                            <span style="font-family:var(--font-mono);font-size:0.65rem;color:rgba(245,158,11,0.4);letter-spacing:4px;">{{ $v['n'] }}</span>
                            <div style="width:52px;height:52px;background:rgba(245,158,11,0.08);border-radius:12px;display:flex;align-items:center;justify-content:center;transition:all 0.5s;"
                                 onmouseover="this.style.background='#f59e0b'" onmouseout="this.style.background='rgba(245,158,11,0.08)'">
                                <svg width="24" height="24" fill="none" stroke="#f59e0b" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $v['icon'] }}"/></svg>
                            </div>
                        </div>
                        <h4 style="font-family:var(--font-heading);font-size:2rem;font-weight:900;color:#fff;margin-bottom:20px;font-style:italic;letter-spacing:-0.5px;">{{ $v['t'] }}</h4>
                        <p style="color:rgba(255,255,255,0.42);font-size:1rem;line-height:1.9;font-weight:300;">{{ $v['d'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- ══════════════════════════════════════════════
         STRATEGIC FRAMEWORK 
    ══════════════════════════════════════════════ --}}
    <section style="padding:80px 60px;background:#fff;text-align:center;">
        <div style="max-width:1440px;margin:0 auto;">
            
            <div class="reveal" style="margin-bottom:60px;">
                <span style="font-family:var(--font-mono);color:#f59e0b;font-size:0.75rem;font-weight:700;letter-spacing:6px;text-transform:uppercase;display:block;margin-bottom:20px;">Strategic Framework</span>
                <h2 style="font-family:var(--font-heading);font-size:clamp(3rem,4vw,5rem);color:#1c1917;font-weight:900;font-style:italic;letter-spacing:-1px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                    Architecting <span class="text-gradient">Excellence.</span>
                </h2>
            </div>

            @php
                $pillars = [
                    ['t'=>'Curated Acquisitions','d'=>'Meticulously sourcing off-market prime real estate assets that guarantee high-yield returns and sustainable long-term value for our exclusive clientele.'],
                    ['t'=>'Architectural Innovation','d'=>'Marrying contemporary aesthetics with functional brilliance. Our luxury developments redefine cityscapes while adhering to the highest global design standards.'],
                    ['t'=>'Vision 2030 Alignment','d'=>'Developing luxury architecture that evolves gracefully, ensuring long-term structural performance and perpetual asset value within the Saudi domestic market.'],
                ];
            @endphp

            <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:40px;">
                @foreach($pillars as $i => $p)
                <div class="reveal strategy-box" style="text-align:left;background:#fafaf8;border:1px solid #e7e5e4;padding:48px;transition:all 0.4s ease;border-radius:2px;display:flex;flex-direction:column;height:100%;">
                    <div>
                        <div style="width:48px;height:48px;background:rgba(245,158,11,0.06);display:flex;align-items:center;justify-content:center;border-radius:50%;margin-bottom:24px;">
                            <span style="font-family:var(--font-mono);font-size:0.75rem;color:#f59e0b;font-weight:700;">0{{$i+1}}</span>
                        </div>
                    </div>
                    <h4 style="font-family:var(--font-heading);font-size:1.8rem;font-weight:900;color:#1c1917;margin-bottom:20px;font-style:italic;">{{ $p['t'] }}</h4>
                    <p style="color:#78716c;font-size:1rem;line-height:2;font-weight:300;flex-grow:1;">{{ $p['d'] }}</p>
                </div>
                @endforeach
            </div>

        </div>
    </section>

    {{-- ══════════════════════════════════════════════
         BEGIN A CONVERSATION (Full Width)
    ══════════════════════════════════════════════ --}}
    <section style="padding:120px 60px;background:linear-gradient(135deg,#1c1917 0%,#292524 100%);text-align:center;position:relative;overflow:hidden;">
        <div style="position:absolute;inset:0;background:url('{{ asset('images/premium_villa_hero.png') }}') center/cover;opacity:0.06;pointer-events:none;"></div>
        
        <div class="reveal" style="max-width:1000px;margin:0 auto;position:relative;z-index:1;">
            <span style="font-family:var(--font-mono);color:#f59e0b;font-size:0.7rem;font-weight:700;letter-spacing:6px;text-transform:uppercase;display:block;margin-bottom:20px;">Direct Dialogue</span>
            <h2 style="font-family:var(--font-heading);font-size:clamp(2.5rem,4vw,3.5rem);color:#fff;font-weight:900;font-style:italic;line-height:1.1;letter-spacing:-1px;margin-bottom:50px;">
                Ready to elevate your portfolio?
            </h2>
            
            <div style="display:flex;gap:32px;justify-content:center;align-items:center;">
                <a href="{{ url('/#contact') }}" class="btn-gold" style="border-radius:50px;padding:22px 60px;">CONTACT US</a>
            </div>
        </div>
    </section>

@endsection
