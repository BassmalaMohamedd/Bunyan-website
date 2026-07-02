@extends('layouts.public')

@section('title', app()->isLocale('ar') ? 'عقارنا | اكتشف أرقى أحياء المملكة' : 'Bunyan | Discover Saudi Arabia\'s Finest Neighborhoods')

@section('content')

    <div x-data="{ 
        searching: false, 
        showToast: false,
        selectedCity: '',
        selectedType: '',
        selectedBudget: '',
        allHoods: [
            { t:'Diplomatic Quarter', loc:'riyadh', displayLoc:'Riyadh', d:'The Kingdom\'s most prestigious enclave, blending global diplomacy with lush parks.', tag:'WALKABILITY: 82/100', icon:'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', meta:'International Schools: 4' },
            { t:'Al-Hamra', loc:'jeddah', displayLoc:'Jeddah', d:'Iconic Red Sea views meets vibrant street life. Home to luxury resorts and designer cafes.', tag:'SEA VIEW LUXURY', icon:'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z', meta:'Walkability Score: 76' },
            { t:'NEOM — Tabuk', loc:'neom', displayLoc:'Tabuk', d:'A glimpse into the future of urban human habitats. Zero-carbon infrastructure.', tag:'ECO-FUTURE', icon:'M13 10V3L4 14h7v7l9-11h-7z', meta:'Vision 2030 Flagship' },
            { t:'Al Nakheel', loc:'riyadh', displayLoc:'Riyadh', d:'The ideal family neighborhood featuring safe green belts and premier educational hubs.', tag:'FAMILY CORE', icon:'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z', meta:'Top-Rated Schools: 6' },
            { t:'KAEC', loc:'kaec', displayLoc:'King Abdullah Economic City', d:'Modern infrastructure at its peak. Marinas and beachfront communities.', tag:'MASTER-PLANNED', icon:'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4', meta:'Coastal Excellence' },
            { t:'Hittin', loc:'riyadh', displayLoc:'Riyadh', d:'Gated luxury at its finest. Hittin offers wide parks and premium shopping districts.', tag:'GATED TRANQUILLITY', icon:'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', meta:'Premium Retail Access' }
        ],
        allProps: [
            {
                city: 'riyadh', type: 'villas', budget: 'over5m',
                badge:'badge-new', tag:'Featured', img:'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&q=80&w=800',
                title:'Modern Estate — Hittin', loc:'Riyadh', price:'SAR 12.5M', sqm:850, beds:6, baths:7
            },
            {
                city: 'jeddah', type: 'apartments', budget: '2m5m',
                badge:'badge-drop', tag:'Prime', img:'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&q=80&w=800',
                title:'Coastal Penthouse — Al-Hamra', loc:'Jeddah', price:'SAR 4.8M', sqm:320, beds:4, baths:4
            },
            {
                city: 'riyadh', type: 'compounds', budget: 'over5m',
                badge:'badge-compound', tag:'Compound', img:'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?auto=format&fit=crop&q=80&w=800',
                title:'Executive Villa — Al Nakheel', loc:'Riyadh', price:'SAR 7.2M', sqm:540, beds:5, baths:5
            },
            {
                city: 'neom', type: 'villas', budget: 'over5m',
                badge:'badge-new', tag:'New', img:'https://images.unsplash.com/photo-1613977257363-707ba9348227?auto=format&fit=crop&q=80&w=800',
                title:'Contemporary Palace — NEOM', loc:'Tabuk', price:'Contact', sqm:1200, beds:8, baths:10
            },
            {
                city: 'kaec', type: 'villas', budget: 'over5m',
                badge:'badge-compound', tag:'Verified', img:'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&q=80&w=800',
                title:'Sovereign Heights — KAEC', loc:'Coastal', price:'SAR 9.1M', sqm:680, beds:5, baths:6
            },
            {
                city: 'alula', type: 'villas', budget: '2m5m',
                badge:'badge-drop', tag:'Investment', img:'https://images.unsplash.com/photo-1598228723793-52759bba239c?auto=format&fit=crop&q=80&w=800',
                title:'Desert Rose Villa — AlUla', loc:'Heritage', price:'SAR 3.5M', sqm:420, beds:3, baths:4
            }
        ],
        get filteredHoods() {
            if (!this.selectedCity) return this.allHoods;
            return this.allHoods.filter(h => h.loc === this.selectedCity);
        },
        get filteredProps() {
            return this.allProps.filter(p => {
                let matchCity = !this.selectedCity || p.city === this.selectedCity;
                let matchType = !this.selectedType || p.type === this.selectedType;
                let matchBudget = !this.selectedBudget || p.budget === this.selectedBudget;
                return matchCity && matchType && matchBudget;
            });
        },
        explore() {
            this.searching = true;
            this.showToast = false;
            setTimeout(() => {
                this.searching = false;
                this.showToast = true;
                let target = this.filteredProps.length > 0 ? 'listings' : 'neighborhoods';
                document.getElementById(target).scrollIntoView({behavior: 'smooth', block: 'start'});
                setTimeout(() => this.showToast = false, 6000);
            }, 800);
        }
    }">

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

            /* Search bar */
            .hero-search {
                background: rgba(253,250,244,0.96);
                backdrop-filter: blur(20px);
                border-radius: 50px;
                border: 1px solid rgba(212,223,200,0.6);
                box-shadow: 0 20px 60px rgba(26,36,16,0.15);
                padding: 8px;
                display: flex;
                gap: 0;
                align-items: stretch;
                overflow: hidden;
                max-width: 900px;
                margin: 0 auto;
            }
            .hero-search-field {
                flex: 1;
                padding: 14px 24px;
                background: transparent;
                border: none;
                font-family: var(--font-body);
                font-size: 0.92rem;
                color: var(--text-main);
                border-right: 1px solid var(--border-color);
                outline: none;
            }
            .hero-search-field::placeholder { color: var(--text-muted); }
            
            .hero-search-select {
                flex: 1;
                padding: 14px 24px;
                background: transparent;
                border: none;
                border-right: 1px solid var(--border-color);
                font-family: var(--font-body);
                font-size: 0.92rem;
                color: var(--text-main);
                outline: none;
                cursor: pointer;
                appearance: none;
                -webkit-appearance: none;
            }
            .hero-search-btn {
                padding: 14px 40px;
                background: var(--primary);
                color: #FDFAF4;
                font-family: var(--font-mono);
                font-size: 0.75rem;
                font-weight: 700;
                letter-spacing: 3px;
                text-transform: uppercase;
                border: none;
                border-radius: 50px;
                cursor: pointer;
                transition: all 0.3s ease;
                white-space: nowrap;
                margin-left: 8px;
            }
            .hero-search-btn:hover { background: var(--primary-dark); transform: translateY(-2px); box-shadow: 0 10px 20px rgba(68,110,46,0.3); }

            /* Card Hover States */
            .hood-card {
                background: #fff;
                border: 1px solid var(--border-color);
                padding: 48px 40px;
                height: 100%;
                display: flex;
                flex-direction: column;
                position: relative;
                transition: all 0.5s cubic-bezier(0.16,1,0.3,1);
                border-radius: var(--radius-lg);
            }
            .hood-card:hover {
                background: var(--primary);
                border-color: var(--primary);
                transform: translateY(-10px);
                box-shadow: 0 30px 60px rgba(68,110,46,0.15);
            }
            .hood-card .tag-text { color: var(--primary); transition: color 0.3s; }
            .hood-card .icon-color { color: var(--accent); transition: color 0.3s; }
            .hood-card h3 { color: var(--text-main); transition: color 0.3s; }
            .hood-card p.desc { color: var(--text-muted); transition: color 0.3s; }
            .hood-card .meta-text { color: var(--accent); transition: color 0.3s; }

            .hood-card:hover .tag-text, 
            .hood-card:hover .icon-color, 
            .hood-card:hover h3, 
            .hood-card:hover p.desc,
            .hood-card:hover .meta-text { color: #fff; }
            
            .hood-card .more-link { 
                color: var(--primary); 
                border-bottom: 1px solid var(--primary); 
                transition: all 0.3s ease;
                font-family: var(--font-mono);
                font-size: 0.75rem;
                font-weight: 700;
                letter-spacing: 2px;
                text-transform: uppercase;
                text-decoration: none;
                padding-bottom: 2px;
                width: fit-content;
            }
            .hood-card:hover .more-link { color: #fff; border-bottom-color: #fff; }

            /* Property Card */
            .property-card {
                background: #fff;
                border: 1px solid var(--border-color);
                border-radius: var(--radius-lg);
                overflow: hidden;
                transition: all 0.6s cubic-bezier(0.16,1,0.3,1);
            }
            .property-card:hover {
                transform: translateY(-8px);
                box-shadow: var(--shadow-glow);
                border-color: var(--primary);
            }
            .property-card .card-img { transition: transform 8s ease; }
            .property-card:hover .card-img { transform: scale(1.1); }

            /* Badge Styles */
            .p-badge {
                font-family: var(--font-mono);
                font-size: 0.65rem;
                font-weight: 700;
                letter-spacing: 2px;
                padding: 6px 12px;
                border-radius: 4px;
                text-transform: uppercase;
            }
            .badge-new { background: var(--primary); color: #fff; }
            .badge-drop { background: var(--accent); color: #fff; }
            .badge-compound { background: var(--surface-secondary); color: var(--primary); border: 1px solid var(--border-color); }

            /* Stats Section */
            .stat-item {
                display: flex;
                align-items: baseline;
                gap: 16px;
                white-space: nowrap;
            }
        </style>

        {{-- ══════════════════════════════════════════════
             HERO SECTION
        ══════════════════════════════════════════════ --}}
        <section style="height: 100vh; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; background: var(--text-main);">

            {{-- Background --}}
            <div class="hero-bg-reveal" style="position: absolute; inset: -5%; z-index: 1;">
                <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&q=80&w=2000"
                    alt="Saudi Arabia Horizon"
                    style="width: 100%; height: 100%; object-fit: cover; opacity: 0.4; animation: hero-breath 30s ease-in-out infinite alternate;">
                <div style="position:absolute;inset:0;background:linear-gradient(180deg,rgba(26,36,16,0.3) 0%,rgba(26,36,16,0.92) 100%);"></div>
            </div>

            {{-- Hero content --}}
            <div class="home-hero-content" style="max-width:1200px;margin:250px auto 0;width:100%;padding:0 60px;position:relative;z-index:10;text-align:center;">
                <div class="reveal-slow active" style="display:flex;flex-direction:column;align-items:center;">

                    {{-- Headline --}}
                    <h1 class="home-hero-title" style="font-family:var(--font-heading);font-size:clamp(3.5rem,7.5vw,8.5rem);line-height:0.9;margin-bottom:32px;color:#fff;font-weight:700;font-style:italic;letter-spacing:-3px;">
                        {!! app()->isLocale('ar') ? ($settings['home_hero_title_ar'] ?? 'اكتشف أرقى<br>أحياء المملكة.') : ($settings['home_hero_title'] ?? 'Discover the Finest<br>Neighborhoods.') !!}
                    </h1>

                    {{-- Eyebrow (Moved down) --}}
                    <div style="display:inline-flex;align-items:center;justify-content:center;gap:18px;margin-bottom:48px;">
                        <span style="font-family:var(--font-mono);color:var(--accent);font-size:0.65rem;font-weight:700;letter-spacing:6px;text-transform:uppercase;">Vision 2030 Partner · Saudi Arabia</span>
                    </div>

                    {{-- Subheadline --}}
                    <p style="font-size:1.25rem;color:rgba(255,255,255,0.7);max-width:760px;margin:0 auto 56px;line-height:1.8;font-weight:300;">
                        {{ app()->isLocale('ar') ? ($settings['home_hero_subtitle_ar'] ?? 'تعرّف على أفضل المجتمعات السكنية في المملكة قبل اتخاذ قرارك، من خلال معلومات موثوقة عن سهولة التنقل والمدارس والبنية التحتية المحلية.') : ($settings['home_hero_subtitle'] ?? "Explore Saudi Arabia's premier residential communities before you decide. Expert insights on walkability, schools, and local infrastructure.") }}
                    </p>

                    {{-- Search Bar --}}
                    <div style="width:100%;max-width:960px;margin-bottom:56px;">
                        <div class="hero-search">
                            <select class="hero-search-select" id="search-city" x-model="selectedCity">
                                <option value="">Select Region</option>
                                <option value="riyadh">Riyadh Metropolitan</option>
                                <option value="jeddah">Jeddah Coastal</option>
                                <option value="neom">NEOM Districts</option>
                                <option value="alula">AlUla Heritage</option>
                            </select>
                            <select class="hero-search-select" id="search-type" x-model="selectedType">
                                <option value="">Living Type</option>
                                <option value="villas">Elite Villas</option>
                                <option value="apartments">Luxury Lofts</option>
                                <option value="compounds">Gated Compounds</option>
                            </select>
                            <select class="hero-search-select" id="search-budget" x-model="selectedBudget">
                                <option value="">Investment Tier</option>
                                <option value="under2m">Tier 1 (<2M)</option>
                                <option value="2m5m">Tier 2 (2M-5M)</option>
                                <option value="over5m">Elite (5M+)</option>
                            </select>
                            <button class="hero-search-btn" x-on:click="explore()">
                                <span x-show="!searching">🔍 Explore</span>
                                <span x-show="searching" style="display:none;" x-cloak>Applying...</span>
                            </button>
                        </div>
                        <div x-show="searching" style="margin-top:12px; color:var(--accent); font-family:var(--font-mono); font-size:0.6rem; letter-spacing:2px; text-transform:uppercase; display:none;" x-cloak>Curating listings matched to your profile...</div>
                        <div x-show="showToast" style="margin-top:12px; color:var(--primary); font-family:var(--font-mono); font-size:0.65rem; font-weight:700; letter-spacing:2px; text-transform:uppercase; display:none;" x-cloak>
                            Found <span x-text="filteredHoods.length"></span> Neighborhoods & <span x-text="filteredProps.length"></span> High-End Listings ↓
                        </div>
                    </div>

                    {{-- CTAs --}}
                    <div style="display:flex;gap:24px;align-items:center;justify-content:center;margin-bottom:120px;">
                        <a href="#neighborhoods" class="btn-primary" style="padding:18px 48px; border-radius:50px;">Explore Neighborhoods</a>
                        <a href="{{ url('/about') }}" class="btn-outline-dark" style="padding:18px 48px; border-radius:50px;">Our Mission</a>
                    </div>
                </div>
            </div>


        </section>


        {{-- ══════════════════════════════════════════════
             AUTHORITY / HERITAGE
        ══════════════════════════════════════════════ --}}
        <section style="padding:160px 80px;background:#fff;position:relative;overflow:hidden;">
            <div style="max-width:1440px;margin:0 auto;display:grid;grid-template-columns:1fr 1.2fr;gap:120px;align-items:center;">
                
                {{-- Text Content --}}
                <div class="reveal">
                    <span class="section-eyebrow">THE BUNYAN AUTHORITY</span>
                    <h2 style="font-family:var(--font-heading);font-size:clamp(3rem,5vw,5.5rem);color:var(--text-main);font-weight:700;line-height:0.95;letter-spacing:-3px;margin-bottom:48px;">
                        Bridging Ambition with <em style="color:var(--primary);">Authentic Living.</em>
                    </h2>
                    
                    <div style="font-size:1.1rem;color:var(--text-muted);line-height:2;font-weight:300;max-width:540px;">
                        <p style="margin-bottom:32px;">
                            Bunyan stands as the premier authority in the Kingdom's residential landscape. We specialize in curating the most desirable addresses, ensuring that your relocation is backed by deep local intelligence.
                        </p>
                        <p style="margin-bottom:48px;">
                            Aligned with Vision 2030, we empower families and investors to discover neighborhoods that offer more than just a home — they offer a future-proof lifestyle.
                        </p>
                    </div>

                    <div style="display:flex;gap:40px;">
                        <div>
                            <div style="width:40px;height:40px;background:var(--surface-secondary);border-radius:10px;display:flex;align-items:center;justify-content:center;margin-bottom:20px;">
                                <svg width="20" height="20" fill="none" stroke="var(--primary)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            </div>
                            <h4 style="font-family:var(--font-heading);font-size:1.3rem;font-weight:700;color:var(--text-main);margin-bottom:8px;">Verified Intel</h4>
                            <p style="font-size:0.85rem;color:var(--text-muted);line-height:1.6;">RERA-certified evaluation of infrastructure and walkability.</p>
                        </div>
                        <div>
                            <div style="width:40px;height:40px;background:var(--surface-secondary);border-radius:10px;display:flex;align-items:center;justify-content:center;margin-bottom:20px;">
                                <svg width="20" height="20" fill="none" stroke="var(--primary)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                            </div>
                            <h4 style="font-family:var(--font-heading);font-size:1.3rem;font-weight:700;color:var(--text-main);margin-bottom:8px;">Exclusive Sourcing</h4>
                            <p style="font-size:0.85rem;color:var(--text-muted);line-height:1.6;">Direct pathways to off-market villas and premium compounds.</p>
                        </div>
                    </div>
                </div>

                {{-- Image Collage --}}
                <div class="reveal-scale" style="position:relative;">
                    <div style="width:100%;aspect-ratio:4/5;border-radius:400px 400px 0 0;overflow:hidden;box-shadow:var(--shadow-lg);">
                        <img src="https://images.unsplash.com/photo-1578895101408-1a36b834405b?auto=format&fit=crop&q=80&w=1200" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                    <div style="position:absolute;bottom:-40px;right:-40px;width:60%;aspect-ratio:1;border-radius:50%;overflow:hidden;border:12px solid #fff;box-shadow:var(--shadow-lg);">
                        <img src="https://images.unsplash.com/photo-1600607686527-6fb886090705?auto=format&fit=crop&q=80&w=800" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                    <div style="position:absolute;top:40px;left:-60px;background:var(--primary);color:#fff;padding:24px 32px;border-radius:100px;font-family:var(--font-mono);font-size:0.65rem;font-weight:700;letter-spacing:4px;text-transform:uppercase;box-shadow:0 20px 40px rgba(68,110,46,0.3);">
                        Elite Status Verified
                    </div>
                </div>
            </div>
        </section>


        {{-- ══════════════════════════════════════════════
             METRICS TICKER
        ══════════════════════════════════════════════ --}}
        <section style="padding:80px 60px;background:var(--text-main);position:relative;overflow:hidden;border-top:1px solid rgba(136,164,124,0.1);border-bottom:1px solid rgba(136,164,124,0.1);">
            <div style="max-width:1440px;margin:0 auto;display:flex;justify-content:center;gap:120px;align-items:center;">
                @php
                    $stats_display = [
                        ['num' => !empty($settings['home_stats_listings']) ? $settings['home_stats_listings'] : '38,500+', 'label' => 'Active Listings', 'delay' => '0ms'],
                        ['num' => !empty($settings['home_stats_market_time']) ? $settings['home_stats_market_time'] : '23 Days', 'label' => 'Avg. Market Time', 'delay' => '100ms'],
                        ['num' => !empty($settings['home_stats_trust']) ? $settings['home_stats_trust'] : '96%', 'label' => 'Trust Index', 'delay' => '200ms'],
                        ['num' => !empty($settings['home_stats_partners']) ? $settings['home_stats_partners'] : 'Vision 2030', 'label' => 'Strategic Partners', 'delay' => '300ms'],
                    ];
                @endphp
                @foreach($stats_display as $stat)
                <div class="reveal-up" style="display:flex;flex-direction:column;align-items:center;text-align:center;transition-delay:{{ $stat['delay'] }};">
                    <span style="color:var(--primary);font-family:var(--font-heading);font-size:3.5rem;font-weight:700;line-height:1;margin-bottom:12px;">{{ $stat['num'] }}</span>
                    <span style="color:rgba(255,255,255,0.4);font-family:var(--font-mono);font-weight:700;letter-spacing:4px;text-transform:uppercase;font-size:0.65rem;">{{ $stat['label'] }}</span>
                </div>
                @endforeach
            </div>
        </section>


        {{-- ══════════════════════════════════════════════
             DIFFERENTIATORS (Why Choose Vertex)
        ══════════════════════════════════════════════ --}}
        <section style="padding:80px 80px 140px;background:var(--text-main);position:relative;">
            <div style="max-width:1440px;margin:0 auto;">
                
                <div class="reveal" style="text-align:center;margin-bottom:100px;">
                    <span class="section-eyebrow" style="color:var(--accent);justify-content:center;">THE BUNYAN DIFFERENCE</span>
                    <h2 style="font-family:var(--font-heading);font-size:clamp(3rem,5vw,6rem);color:#fff;font-weight:700;line-height:0.9;letter-spacing:-3px;margin:0;">
                        Unmatched <em style="color:var(--accent);">Local Intelligence.</em>
                    </h2>
                </div>

                <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:24px;">
                    @php
                        $diffs = [
                            ['n'=>'01','t'=>'Absolute Trust','d'=>'RERA-certified advisors and transparent verification processes.','icon'=>'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                            ['n'=>'02','t'=>'Neighborhood Data','d'=>'Deep walkability metrics and school ratings for every major community.','icon'=>'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                            ['n'=>'03','t'=>'Global Standards','d'=>'Adhering to international protocols with local heritage respect.','icon'=>'M13 10V3L4 14h7v7l9-11h-7z'],
                            ['n'=>'04','t'=>'Elite Support','d'=>'Dedicated agents for high-net-worth relocations.','icon'=>'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ];
                    @endphp
                    @foreach($diffs as $i => $d)
                    <div class="reveal-up" style="transition-delay:{{ $i * 120 }}ms;">
                        <div style="padding:60px 40px;background:rgba(255,255,255,0.03);border:1px solid rgba(136,164,124,0.1);border-radius:var(--radius-lg);transition:all 0.5s cubic-bezier(0.16,1,0.3,1);height:100%;"
                             onmouseover="this.style.background='rgba(68,110,46,0.1)';this.style.borderColor='var(--accent)';this.style.transform='translateY(-12px)'"
                             onmouseout="this.style.background='rgba(255,255,255,0.03)';this.style.borderColor='rgba(136,164,124,0.1)';this.style.transform='translateY(0)'">
                            <div style="width:48px;height:48px;background:rgba(68,110,46,0.2);border-radius:12px;display:flex;align-items:center;justify-content:center;margin-bottom:32px;color:var(--accent);">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $d['icon'] }}"/></svg>
                            </div>
                            <h4 style="font-family:var(--font-heading);font-size:1.8rem;color:#fff;margin-bottom:16px;font-weight:600;letter-spacing:-1px;">{{ $d['t'] }}</h4>
                            <p style="color:rgba(255,255,255,0.4);font-size:0.95rem;line-height:1.8;font-weight:300;">{{ $d['d'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ══════════════════════════════════════════════
             FEATURED NEIGHBORHOODS
        ══════════════════════════════════════════════ --}}
        <section id="neighborhoods" style="padding:100px 60px;background:var(--surface);position:relative;overflow:hidden;">
            <div style="position:absolute;top:0;right:-10%;width:50%;height:100%;background:rgba(68,110,46,0.02);transform:skewX(-15deg);pointer-events:none;"></div>

            <div style="max-width:1440px;margin:0 auto;position:relative;z-index:2;">
                
                <div class="reveal" style="text-align:center;margin-bottom:80px;">
                    <span style="color:var(--primary);font-family:var(--font-mono);font-weight:700;letter-spacing:6px;font-size:0.75rem;text-transform:uppercase;display:block;margin-bottom:20px;">Featured Neighborhoods</span>
                    <h2 style="font-family:var(--font-heading);font-size:clamp(2.5rem,4vw,4.5rem);color:var(--text-main);font-weight:700;font-style:italic;line-height:1.1;letter-spacing:-1.5px;">
                        Curating Distinction & Culture.
                    </h2>
                </div>
                
                <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:40px; min-height: 200px;">
                    <template x-for="(h, idx) in filteredHoods" :key="idx">
                        <div class="reveal active" :style="'transition-delay:' + (idx * 150) + 'ms;'">
                            <div class="hood-card">
                                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:32px;">
                                    <span class="tag-text" style="font-family:var(--font-mono);font-size:0.6rem;font-weight:700;letter-spacing:4px;text-transform:uppercase;" x-text="h.tag"></span>
                                    <div class="icon-color">
                                        <svg width="36" height="36" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" :d="h.icon"/></svg>
                                    </div>
                                </div>

                                <h3 style="font-family:var(--font-heading);font-size:1.8rem;margin-bottom:8px;font-weight:700;font-style:italic;letter-spacing:-0.5px;" x-text="h.t"></h3>
                                <p style="font-family:var(--font-mono);font-size:0.75rem;color:var(--primary);margin-bottom:24px;letter-spacing:3px;text-transform:uppercase;" x-text="h.displayLoc"></p>
                                
                                <p class="desc" style="line-height:2;font-size:1.05rem;font-weight:300;flex-grow:1;margin-bottom:32px;" x-text="h.d"></p>
                                
                                <p class="meta-text" style="font-family:var(--font-mono);font-size:0.7rem;font-weight:700;letter-spacing:2px;text-transform:uppercase;margin-bottom:40px;" x-text="h.meta"></p>

                                <div style="display:flex;align-items:center;gap:12px;">
                                    <a href="/services" class="more-link">Explore Neighborhood</a>
                                </div>
                            </div>
                        </div>
                    </template>

                    <div x-show="filteredHoods.length === 0" style="grid-column: span 3; text-align: center; padding: 60px 0; color: var(--text-muted); font-family: var(--font-heading); font-size: 1.5rem; display:none;" x-cloak>
                        No neighborhoods found in this region.
                    </div>
                </div>
            </div>
        </section>


        {{-- ══════════════════════════════════════════════
             PROPERTY SHOWCASE
        ══════════════════════════════════════════════ --}}
        <section id="listings" style="padding:100px 60px;background:var(--surface-secondary);position:relative;overflow:hidden;">
            <div style="max-width:1440px;margin:0 auto;position:relative;z-index:1;">
                
                <div class="reveal" style="text-align:center;margin-bottom:80px;">
                    <span style="color:var(--primary);font-family:var(--font-mono);font-weight:700;letter-spacing:6px;font-size:0.75rem;text-transform:uppercase;display:block;margin-bottom:20px;">Elite Listings</span>
                    <h2 style="font-family:var(--font-heading);font-size:clamp(2.5rem,4vw,4.5rem);color:var(--text-main);font-weight:700;font-style:italic;line-height:1.1;letter-spacing:-1.5px;">
                        Defined by Presence & Quality.
                    </h2>
                </div>
                
                <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:40px; min-height: 400px;">
                    <template x-for="(p, idx) in filteredProps" :key="idx">
                        <div class="reveal active" :style="'transition-delay:' + (idx * 150) + 'ms;'">
                            <div class="property-card">
                                <div style="aspect-ratio:3/2;overflow:hidden;position:relative;">
                                    <img :src="p.img" class="card-img" style="width:100%;height:100%;object-fit:cover;">
                                    <div style="position:absolute;top:20px;left:20px;">
                                        <span class="p-badge" :class="p.badge" x-text="p.tag"></span>
                                    </div>
                                </div>
                                <div style="padding:32px;">
                                    <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:20px;">
                                        <div>
                                            <h3 style="font-family:var(--font-heading);font-size:1.4rem;font-weight:700;color:var(--text-main);margin-bottom:4px;" x-text="p.title"></h3>
                                            <p style="font-family:var(--font-mono);font-size:0.6rem;color:var(--text-muted);letter-spacing:2px;text-transform:uppercase;" x-text="p.loc"></p>
                                        </div>
                                        <div style="text-align:right;">
                                            <p style="font-family:var(--font-mono);font-size:1rem;font-weight:700;color:var(--primary);" x-text="p.price"></p>
                                        </div>
                                    </div>
                                    <div style="display:flex;gap:18px;border-top:1px solid var(--border-color);padding-top:16px;">
                                        <span style="font-size:0.8rem; color:var(--text-muted); font-family:var(--font-mono);"><span x-text="p.beds"></span>{{ app()->isLocale('ar') ? ' غرف' : 'B' }}</span>
                                        <span style="font-size:0.8rem; color:var(--text-muted); font-family:var(--font-mono);"><span x-text="p.baths"></span>{{ app()->isLocale('ar') ? ' حمام' : 'T' }}</span>
                                        <span style="font-size:0.8rem; color:var(--text-muted); font-family:var(--font-mono);"><span x-text="p.sqm"></span>m²</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>

                    <div x-show="filteredProps.length === 0" style="grid-column: span 3; text-align: center; padding: 100px 0; color: var(--text-muted); font-family: var(--font-heading); font-size: 1.5rem; display:none;" x-cloak>
                        No matching listings found for your selected criteria.
                    </div>
                </div>
                
            </div>
        </section>




        {{-- ══════════════════════════════════════════════
             GET IN TOUCH
        ══════════════════════════════════════════════ --}}
        <section id="contact" style="padding:140px 80px;background:var(--text-main);position:relative;overflow:hidden;">
            
            {{-- Background Deco --}}
            <div style="position:absolute;top:0;left:0;width:100%;height:100%;opacity:0.05;overflow:hidden;">
                <img src="https://images.unsplash.com/photo-1481026469463-66327c86e544?auto=format&fit=crop&q=80&w=2000" style="width:100%;height:100%;object-fit:cover;filter:grayscale(100%);">
            </div>

            <div style="max-width:1440px;margin:0 auto;position:relative;z-index:10;">
                <div style="display:grid;grid-template-columns:1fr 1.3fr;gap:100px;align-items:center;">
                    
                    {{-- Left side: Narrative --}}
                    <div class="reveal">
                        <span class="section-eyebrow" style="color:var(--accent);">INITIATE DIALOGUE</span>
                        <h2 style="font-family:var(--font-heading);font-size:clamp(3.5rem,5vw,6rem);color:#fff;font-weight:700;line-height:0.9;letter-spacing:-3px;margin-bottom:40px;">
                            Start Your <br><em style="color:var(--accent);">New Chapter.</em>
                        </h2>
                        <p style="font-size:1.15rem;color:rgba(255,255,255,0.45);line-height:1.9;margin-bottom:56px;font-weight:300;">
                            Our specialist advisors are ready to guide you through the Kingdom's most prestigious communities. Connect with us for a bespoke neighborhood consultation.
                        </p>

                        <div style="display:flex;flex-direction:column;gap:32px;">
                            <div style="display:flex;align-items:center;gap:24px;">
                                <div style="width:52px;height:52px;border-radius:50%;background:rgba(136,164,124,0.15);display:flex;align-items:center;justify-content:center;color:var(--accent);">
                                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.948V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                </div>
                                <div>
                                    <p style="font-family:var(--font-mono);font-size:0.6rem;letter-spacing:4px;color:rgba(255,255,255,0.3);text-transform:uppercase;margin-bottom:4px;">Inquiry Line</p>
                                    <p style="font-size:1.4rem;color:#fff;font-weight:700;letter-spacing:1px;">+966 54 113 1137</p>
                                </div>
                            </div>
                            <div style="display:flex;align-items:center;gap:24px;">
                                <div style="width:52px;height:52px;border-radius:50%;background:rgba(136,164,124,0.15);display:flex;align-items:center;justify-content:center;color:var(--accent);">
                                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <p style="font-family:var(--font-mono);font-size:0.6rem;letter-spacing:4px;color:rgba(255,255,255,0.3);text-transform:uppercase;margin-bottom:4px;">Electronic Mail</p>
                                    <p style="font-size:1.4rem;color:#fff;font-weight:700;letter-spacing:1px;">info@bunyan-sa.sa</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Right side: Glass Form --}}
                    <div class="reveal-scale">
                        <form action="{{ route('contact.store') }}" method="POST" 
                              style="background:rgba(255,255,255,0.03); backdrop-filter:blur(30px); border:1px solid rgba(255,255,255,0.1); padding:80px; border-radius:var(--radius-xl); box-shadow:0 60px 120px rgba(0,0,0,0.3);">
                            @csrf
                            <div style="display:grid;grid-template-columns:1fr 1fr;gap:32px;margin-bottom:32px;">
                                <div>
                                    <label style="font-family:var(--font-mono);font-size:0.65rem;color:var(--accent);letter-spacing:3px;display:block;margin-bottom:12px;text-transform:uppercase;">Name</label>
                                    <input type="text" name="name" required placeholder="Nora Al-Otaibi"
                                        style="width:100%;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:12px;padding:20px 24px;color:#fff;font-size:1rem;outline:none;transition:all 0.3s;"
                                        onfocus="this.style.borderColor='var(--accent)';this.style.background='rgba(255,255,255,0.08)'">
                                </div>
                                <div>
                                    <label style="font-family:var(--font-mono);font-size:0.65rem;color:var(--accent);letter-spacing:3px;display:block;margin-bottom:12px;text-transform:uppercase;">Phone</label>
                                    <input type="tel" name="phone" required placeholder="+966"
                                        style="width:100%;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:12px;padding:20px 24px;color:#fff;font-size:1rem;outline:none;transition:all 0.3s;"
                                        onfocus="this.style.borderColor='var(--accent)';this.style.background='rgba(255,255,255,0.08)'">
                                </div>
                            </div>
                            <div style="margin-bottom:48px;">
                                <label style="font-family:var(--font-mono);font-size:0.65rem;color:var(--accent);letter-spacing:3px;display:block;margin-bottom:12px;text-transform:uppercase;">Requirement Brief</label>
                                <textarea name="message" rows="4" placeholder="Desired neighborhood or investment goals..."
                                    style="width:100%;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:12px;padding:20px 24px;color:#fff;font-size:1rem;outline:none;resize:vertical;transition:all 0.3s;"
                                    onfocus="this.style.borderColor='var(--accent)';this.style.background='rgba(255,255,255,0.08)'"></textarea>
                            </div>
                            <button type="submit" class="btn-primary" style="width:100%; padding:24px; font-size:0.85rem; letter-spacing:4px; background:var(--accent); color:var(--text-main);">SUBMIT INQUIRY</button>
                        </form>
                    </div>

                </div>
            </div>
        </section>

    </div>

    <style>
        @keyframes slide-move {
            0%   { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .reveal-up {
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .reveal-up.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

@endsection
