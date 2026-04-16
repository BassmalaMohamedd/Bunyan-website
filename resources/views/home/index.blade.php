@extends('layouts.public')

@section('title', 'Arkan Real Estate | Redefining Specialized Innovations through Integrity.')

@section('content')
    <!-- Cinematic Hero Section -->
    <section class="hero-wrapper" style="height: 100vh; position: relative; overflow: hidden; display: flex; align-items: center; background: #0a192f;">
        <!-- Robust Video Background -->
        <div class="video-container" style="background: #0a192f url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=2000') center/cover no-repeat;">
            <video autoplay muted loop playsinline poster="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=2000" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.25; filter: grayscale(0.6) contrast(1.1) brightness(0.7);">
                <source src="https://images.pexels.com/videos/3125396/free-video-3125396.mp4" type="video/mp4">
            </video>
            <div class="video-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(180deg, rgba(10, 25, 47, 0.65) 0%, rgba(10, 25, 47, 0.85) 60%, rgba(10, 25, 47, 0.97) 100%);"></div>
        </div>

        <!-- Technical Scanning Overlay -->
        <div class="scan-overlay">
            <div class="scan-line"></div>
        </div>
        
        <div style="max-width: 1400px; margin-top: 52px; width: 100%; padding: 0 60px; position: relative; z-index: 10; text-align: center;">
            <div class="reveal-slow">
                
                <h1 style="font-size: 6.5rem; line-height: 0.9; margin-bottom: 50px; color: #fff; font-weight: 900; letter-spacing: -4px;">
                    @php
                        $title = $settings['home_hero_title'] ?? 'Mastering Integrity in Real Estate.';
                        $words = explode(' ', trim($title));
                        if(isset($words[1])) {
                            $words[1] = '<span class="text-gradient">' . $words[1] . '</span>';
                        }
                        if(count($words) > 2) {
                            $middle = ceil(count($words) / 2);
                            array_splice($words, $middle, 0, '<br>');
                        }
                    @endphp
                    {!! implode(' ', $words) !!}
                </h1>
                
                <p style="font-size: 1.5rem; color: rgba(255,255,255,0.7); max-width: 850px; margin: 0 auto 70px; line-height: 1.8; font-weight: 300; letter-spacing: 0.5px;">
                    {{ $settings['home_hero_subtitle'] ?? 'Unlocking the foundation of sustainable economic success through our specialized software ecosystem and visionary consultancy.' }}
                </p>
                
                <div style="display: flex; gap: 30px; align-items: center; justify-content: center;">
                    <a href="/services" class="btn-gold" style="padding: 22px 55px; font-size: 0.95rem; letter-spacing: 4px; border-radius: 2px;">EXPLORE ECOSYSTEM</a>
                    <a href="/about" class="btn-outline" style="padding: 22px 55px; font-size: 0.95rem; letter-spacing: 4px; border-radius: 2px; color: #fff; border-color: rgba(255,255,255,0.3);">ABOUT ARKAN</a>
                </div>
            </div>
        </div>

    </section>

    <!-- Moving Metrics Slider Section -->
    <section style="padding: 0; background: #0a192f; position: relative; overflow: hidden; border-top: 1px solid rgba(255,255,255,0.05); border-bottom: 1px solid rgba(255,255,255,0.05);">
        <div class="slider-track" style="display: flex; width: 200%; animation: slide-move 40s linear infinite;">
            <div style="display: flex; gap: 120px; align-items: center; padding: 40px 0;">
                <div style="display: flex; align-items: baseline; gap: 20px; white-space: nowrap;">
                    <span style="color: var(--primary); font-size: 2.5rem; font-weight: 900;">{{ $settings['home_stats_years'] ?? '15+' }}</span> 
                    <span style="color: rgba(255,255,255,0.4); font-weight: 800; letter-spacing: 2px; text-transform: uppercase; font-size: 0.8rem;">YEARS EXPERIENCE</span>
                </div>
                <div style="display: flex; align-items: baseline; gap: 20px; white-space: nowrap;">
                    <span style="color: var(--primary); font-size: 2.5rem; font-weight: 900;">{{ $settings['home_stats_assets'] ?? 'SAR 2.5B+' }}</span> 
                    <span style="color: rgba(255,255,255,0.4); font-weight: 800; letter-spacing: 2px; text-transform: uppercase; font-size: 0.8rem;">ASSETS VALUED</span>
                </div>
                <div style="display: flex; align-items: baseline; gap: 20px; white-space: nowrap;">
                    <span style="color: var(--primary); font-size: 2.5rem; font-weight: 900;">{{ $settings['home_stats_projects'] ?? '850+' }}</span> 
                    <span style="color: rgba(255,255,255,0.4); font-weight: 800; letter-spacing: 2px; text-transform: uppercase; font-size: 0.8rem;">COMPLETED PROJECTS</span>
                </div>
                <div style="display: flex; align-items: baseline; gap: 20px; white-space: nowrap;">
                    <span style="color: var(--primary); font-size: 2.5rem; font-weight: 900;">250+</span> 
                    <span style="color: rgba(255,255,255,0.4); font-weight: 800; letter-spacing: 2px; text-transform: uppercase; font-size: 0.8rem;">CERTIFIED EXPERTS</span>
                </div>
            </div>
            <!-- Duplicate for infinite effect -->
            <div style="display: flex; gap: 120px; align-items: center; padding: 40px 0;">
                <div style="display: flex; align-items: baseline; gap: 20px; white-space: nowrap;">
                    <span style="color: var(--primary); font-size: 2.5rem; font-weight: 900;">{{ $settings['home_stats_years'] ?? '15+' }}</span> 
                    <span style="color: rgba(255,255,255,0.4); font-weight: 800; letter-spacing: 2px; text-transform: uppercase; font-size: 0.8rem;">YEARS EXPERIENCE</span>
                </div>
                <div style="display: flex; align-items: baseline; gap: 20px; white-space: nowrap;">
                    <span style="color: var(--primary); font-size: 2.5rem; font-weight: 900;">{{ $settings['home_stats_assets'] ?? 'SAR 2.5B+' }}</span> 
                    <span style="color: rgba(255,255,255,0.4); font-weight: 800; letter-spacing: 2px; text-transform: uppercase; font-size: 0.8rem;">ASSETS VALUED</span>
                </div>
                <div style="display: flex; align-items: baseline; gap: 20px; white-space: nowrap;">
                    <span style="color: var(--primary); font-size: 2.5rem; font-weight: 900;">{{ $settings['home_stats_projects'] ?? '850+' }}</span> 
                    <span style="color: rgba(255,255,255,0.4); font-weight: 800; letter-spacing: 2px; text-transform: uppercase; font-size: 0.8rem;">COMPLETED PROJECTS</span>
                </div>
                <div style="display: flex; align-items: baseline; gap: 20px; white-space: nowrap;">
                    <span style="color: var(--primary); font-size: 2.5rem; font-weight: 900;">250+</span> 
                    <span style="color: rgba(255,255,255,0.4); font-weight: 800; letter-spacing: 2px; text-transform: uppercase; font-size: 0.8rem;">CERTIFIED EXPERTS</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Detailed Content / Heritage (Swapped to come first) -->
    <section style="padding: 80px 0; background: #f1f5f9; position: relative;">
        <div class="container-fluid" style="display: flex; align-items: center; gap: 120px;">
            <div class="reveal-left" style="flex: 1; position: relative;">
                <div style="aspect-ratio: 4/5; overflow: hidden; border-radius: 4px; box-shadow: 0 60px 120px rgba(0,0,0,0.15);">
                    <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=1200" alt="Arkan Specialized Architecture" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="position: absolute; bottom: -50px; right: -50px; width: 300px; padding: 50px; background: #0a192f; color: #fff; z-index: 5; box-shadow: 0 40px 80px rgba(0,0,0,0.3);">
                    <h4 style="font-size: 4rem; font-weight: 900; color: var(--primary); margin-bottom: 15px; line-height: 1;">15+</h4>
                    <p style="font-size: 0.8rem; font-weight: 800; opacity: 0.6; letter-spacing: 4px; text-transform: uppercase;">YEARS OF EXCELLENCE</p>
                </div>
            </div>
            <div class="reveal" style="flex: 1.2;">
                <span style="color: var(--primary); font-weight: 900; letter-spacing: 6px; font-size: 0.8rem; text-transform: uppercase; display: block; margin-bottom: 20px;">The Arkan Legacy</span>
                <h2 style="font-size: 4.5rem; color: #0a192f; font-weight: 900; line-height: 1; margin-bottom: 30px; letter-spacing: -3px;">Foundations of <br> Market Trust.</h2>
                <div style="font-size: 1.3rem; color: #64748b; line-height: 2; font-weight: 300;">
                    <p style="margin-bottom: 40px;">
                        Founded in 2009, Arkan Real Estate has emerged as the synonym for digital integrity in the Middle East. We representing the digital evolution of the Kingdom's most ambitious projects.
                    </p>
                    <p style="margin-bottom: 60px;">
                        Our methodology combines deep localized intelligence with world-class technical engineering to ensure every output is rooted in transparent, immutable data.
                    </p>
                </div>
                <div style="display: flex; gap: 60px; margin-bottom: 60px;">
                    <div>
                        <h4 style="font-size: 2.2rem; font-weight: 900; color: #0a192f; margin-bottom: 5px;">Riyadh</h4>
                        <p style="font-size: 0.75rem; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 2px;">HQ LOCATION</p>
                    </div>
                    <div>
                        <h4 style="font-size: 2.2rem; font-weight: 900; color: #0a192f; margin-bottom: 5px;">Vision 2030</h4>
                        <p style="font-size: 0.75rem; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 2px;">STRATEGIC PIVOT</p>
                    </div>
                </div>
                <a href="/about" class="btn-gold" style="padding: 20px 60px; font-size: 0.9rem; letter-spacing: 3px;">DISCOVER OUR JOURNEY</a>
            </div>
        </div>
    </section>

    <!-- Product Ecosystem Section (Swapped to come second) -->
    <section style="padding: 80px 0; background: #fff; position: relative; overflow: hidden;">
        <div class="container-fluid">
            <div class="reveal" style="text-align: center; margin-bottom: 50px;">
                <span style="color: var(--primary); font-weight: 900; letter-spacing: 6px; font-size: 0.8rem; text-transform: uppercase; display: block; margin-bottom: 15px;">The Specialized Ecosystem</span>
                <h2 style="font-size: 3.8rem; color: #0a192f; font-weight: 900; line-height: 1; letter-spacing: -3px; margin-bottom: 25px;">Architecture of <br> <span class="text-gradient">Integrity.</span></h2>
                <p style="color: #64748b; font-size: 1.25rem; max-width: 700px; margin: 0 auto; line-height: 1.8; font-weight: 300;">
                    We forge the digital backbone of the Kingdom's most ambitious real estate enterprises through our proprietary software trinity.
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px;">
                <!-- PropMate -->
                <div class="glass-card reveal" style="padding: 70px; background: #f1f5f9; border: 1px solid #e2e8f0; border-radius: 4px; position: relative; overflow: hidden; transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);" onmouseover="this.style.transform='translateY(-15px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div style="font-size: 0.75rem; font-weight: 900; color: var(--primary); border: 1px solid var(--primary); padding: 8px 20px; display: inline-block; margin-bottom: 35px; letter-spacing: 2px; border-radius: 2px;">PROPERTY CMS</div>
                    <h3 style="font-size: 2.5rem; font-weight: 900; color: #0a192f; margin-bottom: 25px; letter-spacing: -1px;">PropMate</h3>
                    <p style="color: #64748b; line-height: 2; margin-bottom: 45px; font-size: 1.1rem; font-weight: 300;">
                        A specialized residential and commercial management system that centralizes operations with uncompromising precision.
                    </p>
                    <ul style="list-style: none; padding: 0; margin-bottom: 60px; color: #0a192f; font-weight: 400; font-size: 1rem; display: flex; flex-direction: column; gap: 15px;">
                        <li style="display: flex; align-items: center; gap: 15px;"><span style="color: var(--primary); font-size: 1.2rem;">&bull;</span> Facility Maintenance Hub</li>
                        <li style="display: flex; align-items: center; gap: 15px;"><span style="color: var(--primary); font-size: 1.2rem;">&bull;</span> Tenant Lifecycle Management</li>
                        <li style="display: flex; align-items: center; gap: 15px;"><span style="color: var(--primary); font-size: 1.2rem;">&bull;</span> Performance Dashboards</li>
                    </ul>
                    <a href="/services" style="font-weight: 900; color: #0a192f; text-decoration: none; font-size: 0.85rem; letter-spacing: 2px; text-transform: uppercase;">EXPLORE PRODUCT &rarr;</a>
                </div>

                <!-- ValueMate -->
                <div class="glass-card reveal" style="padding: 70px; background: #0a192f; color: #fff; border-radius: 4px; position: relative; overflow: hidden; transform: scale(1.05); z-index: 20; box-shadow: 0 50px 100px rgba(0,0,0,0.25);">
                    <div style="font-size: 0.75rem; font-weight: 900; color: var(--primary); border: 1px solid var(--primary); padding: 8px 20px; display: inline-block; margin-bottom: 35px; letter-spacing: 2px; border-radius: 2px;">APPRAISAL ENGINE</div>
                    <h3 style="font-size: 2.5rem; font-weight: 900; color: #fff; margin-bottom: 25px; letter-spacing: -1px;">ValueMate</h3>
                    <p style="color: rgba(255,255,255,0.6); line-height: 2; margin-bottom: 45px; font-size: 1.1rem; font-weight: 300;">
                        The center of excellence for real estate valuation, ensuring absolute data integrity and IVS compliance.
                    </p>
                    <ul style="list-style: none; padding: 0; margin-bottom: 60px; color: #fff; font-weight: 400; font-size: 1rem; display: flex; flex-direction: column; gap: 15px;">
                        <li style="display: flex; align-items: center; gap: 15px;"><span style="color: var(--primary); font-size: 1.2rem;">&bull;</span> Automated Property Valuations</li>
                        <li style="display: flex; align-items: center; gap: 15px;"><span style="color: var(--primary); font-size: 1.2rem;">&bull;</span> Market Intel Database</li>
                        <li style="display: flex; align-items: center; gap: 15px;"><span style="color: var(--primary); font-size: 1.2rem;">&bull;</span> Certified Compliance Engine</li>
                    </ul>
                    <a href="/services" style="font-weight: 900; color: var(--primary); text-decoration: none; font-size: 0.85rem; letter-spacing: 2px; text-transform: uppercase;">EXPLORE PRODUCT &rarr;</a>
                </div>

                <!-- AccuMate -->
                <div class="glass-card reveal" style="padding: 70px; background: #f1f5f9; border: 1px solid #e2e8f0; border-radius: 4px; position: relative; overflow: hidden; transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);" onmouseover="this.style.transform='translateY(-15px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div style="font-size: 0.75rem; font-weight: 900; color: var(--primary); border: 1px solid var(--primary); padding: 8px 20px; display: inline-block; margin-bottom: 35px; letter-spacing: 2px; border-radius: 2px;">FINANCIAL SUITE</div>
                    <h3 style="font-size: 2.5rem; font-weight: 900; color: #0a192f; margin-bottom: 25px; letter-spacing: -1px;">AccuMate</h3>
                    <p style="color: #64748b; line-height: 2; margin-bottom: 45px; font-size: 1.1rem; font-weight: 300;">
                        Comprehensive financial management software tailored for real estate portfolios and investment funds.
                    </p>
                    <ul style="list-style: none; padding: 0; margin-bottom: 60px; color: #0a192f; font-weight: 400; font-size: 1rem; display: flex; flex-direction: column; gap: 15px;">
                        <li style="display: flex; align-items: center; gap: 15px;"><span style="color: var(--primary); font-size: 1.2rem;">&bull;</span> Fund Accounting Integration</li>
                        <li style="display: flex; align-items: center; gap: 15px;"><span style="color: var(--primary); font-size: 1.2rem;">&bull;</span> Rental Revenue Tracking</li>
                        <li style="display: flex; align-items: center; gap: 15px;"><span style="color: var(--primary); font-size: 1.2rem;">&bull;</span> Statutory Reporting</li>
                    </ul>
                    <a href="/services" style="font-weight: 900; color: #0a192f; text-decoration: none; font-size: 0.85rem; letter-spacing: 2px; text-transform: uppercase;">EXPLORE PRODUCT &rarr;</a>
                </div>
            </div>
        </div>
    </section>

    <!-- News Preview Section -->
    <section style="padding: 80px 60px; background: #fff;">
        <div style="max-width: 1400px; margin: 0 auto;">
            <div class="reveal" style="text-align: center; margin-bottom: 50px; padding-top: 0;">
                <span style="color: var(--primary); font-weight: 900; letter-spacing: 6px; font-size: 0.8rem; text-transform: uppercase; display: block; margin-bottom: 15px;">Market Intelligence</span>
                <h2 style="font-size: 3.8rem; color: #0a192f; font-weight: 900; letter-spacing: -3px; line-height: 1; margin-bottom: 30px;">Arkan Insight</h2>
                <div style="display: flex; justify-content: center;">
                    <a href="/news" style="font-weight: 900; color: #0a192f; text-decoration: none; font-size: 0.85rem; letter-spacing: 3px; border-bottom: 2px solid var(--primary); padding-bottom: 8px; text-transform: uppercase;">Discover All Intel</a>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 50px;">
                @foreach(\App\Models\NewsPost::orderBy('published_at', 'desc')->take(3)->get() as $post)
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
                    @endphp
                    @php
                        $img = '/images/B1.jpg';
                        if ($loop->index == 1) $img = '/images/B2.jpg';
                        if ($loop->index == 2) $img = '/images/B3.jpg';
                    @endphp
                    <div class="reveal" style="transition-delay: {{ $loop->index * 0.2 }}s;">
                        <div style="aspect-ratio: 16/10; overflow: hidden; margin-bottom: 40px; border-radius: 4px; box-shadow: 0 30px 60px rgba(0,0,0,0.08);">
                            <img src="{{ $img }}" style="width: 100%; height: 100%; object-fit: cover; transition: all 1s cubic-bezier(0.16, 1, 0.3, 1);" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <div style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                            <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 25px; justify-content: center;">
                                <span style="color: var(--primary); font-weight: 900; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 3px;">{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('M d, Y') : 'DRAFT' }}</span>
                                <div style="width: 30px; height: 1px; background: #e2e8f0;"></div>
                                <span style="color: #94a3b8; font-weight: 800; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 3px;">DATA INTEL</span>
                            </div>
                            <h3 style="font-size: 2rem; font-weight: 900; color: #0a192f; margin-bottom: 25px; line-height: 1.25; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; letter-spacing: -0.5px;">{{ $title }}</h3>
                            <p style="color: #64748b; font-size: 1.1rem; line-height: 1.9; font-weight: 300; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; margin-bottom: 40px; padding: 0 20px;">
                                {{ Str::limit(strip_tags($content), 150) }}
                            </p>
                            <a href="/news/{{ $post->slug }}" style="display: flex; align-items: center; gap: 15px; color: #0a192f; font-weight: 900; font-size: 0.8rem; letter-spacing: 3px; text-transform: uppercase; justify-content: center; text-decoration: none;">
                                <span style="border-bottom: 1px solid var(--primary);">Discover Analysis</span>
                                <span style="color: var(--primary); font-size: 1.4rem;">&rarr;</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Premium Contact Section -->
    <section id="contact" style="padding: 80px 60px; background: #0a192f; position: relative; overflow: hidden;">
        <!-- Subtle gold radial glow -->
        <div style="position: absolute; top: -200px; right: -200px; width: 600px; height: 600px; background: radial-gradient(circle, rgba(203,163,101,0.07) 0%, transparent 70%); pointer-events: none;"></div>
        <div style="position: absolute; bottom: -200px; left: -200px; width: 500px; height: 500px; background: radial-gradient(circle, rgba(203,163,101,0.05) 0%, transparent 70%); pointer-events: none;"></div>

        <div style="max-width: 1400px; margin: 0 auto; position: relative; z-index: 10;">
            <div style="display: grid; grid-template-columns: 1fr 1.3fr; gap: 120px; align-items: center;">

                <!-- Left: Info -->
                <div class="reveal">
                    <span style="color: var(--primary); font-weight: 900; letter-spacing: 6px; font-size: 0.75rem; text-transform: uppercase; display: block; margin-bottom: 25px;">Direct Dialogue</span>
                    <h2 style="font-size: 5rem; font-weight: 900; color: #fff; letter-spacing: -4px; line-height: 0.95; margin-bottom: 40px;">Let's build <br><span class="text-gradient">together.</span></h2>
                    <p style="color: rgba(255,255,255,0.5); font-size: 1.2rem; line-height: 2; font-weight: 300; margin-bottom: 70px; max-width: 420px;">
                        Ready to integrate specialized digital infrastructure into your enterprise? Our advisors respond within 24 hours.
                    </p>

                    <div style="display: flex; flex-direction: column; gap: 35px;">
                        <div style="display: flex; align-items: center; gap: 25px;">
                            <div style="width: 52px; height: 52px; border-radius: 14px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="1.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13 19.79 19.79 0 0 1 1.61 4.37 2 2 0 0 1 3.6 2.18h3a2 2 0 0 1 2 1.72c.13.96.37 1.9.72 2.81a2 2 0 0 1-.45 2.11L7.91 9.91a16 16 0 0 0 6.06 6.06l.99-.99a2 2 0 0 1 2.11-.45c.91.35 1.85.59 2.81.72A2 2 0 0 1 22 16.92z"/></svg>
                            </div>
                            <div>
                                <p style="color: rgba(255,255,255,0.35); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 3px; margin-bottom: 6px;">Terminal</p>
                                <p style="color: #fff; font-weight: 700; font-size: 1.1rem;">+966 54 113 1137</p>
                            </div>
                        </div>
                        <div style="display: flex; align-items: center; gap: 25px;">
                            <div style="width: 52px; height: 52px; border-radius: 14px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="1.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            </div>
                            <div>
                                <p style="color: rgba(255,255,255,0.35); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 3px; margin-bottom: 6px;">Mailbox</p>
                                <p style="color: #fff; font-weight: 700; font-size: 1.1rem;">info@arkan-realestate.sa</p>
                            </div>
                        </div>
                        <div style="display: flex; align-items: center; gap: 25px;">
                            <div style="width: 52px; height: 52px; border-radius: 14px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            </div>
                            <div>
                                <p style="color: rgba(255,255,255,0.35); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 3px; margin-bottom: 6px;">Headquarters</p>
                                <p style="color: #fff; font-weight: 700; font-size: 1.05rem; line-height: 1.6;">Al Mohammadiyah, Riyadh</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Form Card -->
                <div class="reveal" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); border-radius: 28px; padding: 70px; backdrop-filter: blur(20px);">
                    <h3 style="font-size: 1.8rem; font-weight: 900; color: #fff; margin-bottom: 45px; letter-spacing: -1px;">Send us a message</h3>
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px; margin-bottom: 25px;">
                            <div>
                                <label style="font-size: 0.7rem; font-weight: 900; color: rgba(255,255,255,0.3); text-transform: uppercase; letter-spacing: 3px; display: block; margin-bottom: 12px;">Full Name</label>
                                <input type="text" name="name" required placeholder="John Smith"
                                    style="width: 100%; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 14px; padding: 16px 20px; color: #fff; font-size: 1rem; font-weight: 300; outline: none; transition: border-color 0.3s; box-sizing: border-box;"
                                    onfocus="this.style.borderColor='rgba(203,163,101,0.6)'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                            </div>
                            <div>
                                <label style="font-size: 0.7rem; font-weight: 900; color: rgba(255,255,255,0.3); text-transform: uppercase; letter-spacing: 3px; display: block; margin-bottom: 12px;">Phone</label>
                                <input type="tel" name="phone" required placeholder="+966 --- --- ----"
                                    style="width: 100%; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 14px; padding: 16px 20px; color: #fff; font-size: 1rem; font-weight: 300; outline: none; transition: border-color 0.3s; box-sizing: border-box;"
                                    onfocus="this.style.borderColor='rgba(203,163,101,0.6)'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                            </div>
                        </div>
                        <div style="margin-bottom: 25px;">
                            <label style="font-size: 0.7rem; font-weight: 900; color: rgba(255,255,255,0.3); text-transform: uppercase; letter-spacing: 3px; display: block; margin-bottom: 12px;">Email</label>
                            <input type="email" name="email" required placeholder="name@enterprise.com"
                                style="width: 100%; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 14px; padding: 16px 20px; color: #fff; font-size: 1rem; font-weight: 300; outline: none; transition: border-color 0.3s; box-sizing: border-box;"
                                onfocus="this.style.borderColor='rgba(203,163,101,0.6)'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                        </div>
                        <div style="margin-bottom: 40px;">
                            <label style="font-size: 0.7rem; font-weight: 900; color: rgba(255,255,255,0.3); text-transform: uppercase; letter-spacing: 3px; display: block; margin-bottom: 12px;">Message</label>
                            <textarea name="message" rows="4" placeholder="Tell us about your digital requirements..."
                                style="width: 100%; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 14px; padding: 16px 20px; color: #fff; font-size: 1rem; font-weight: 300; outline: none; resize: none; transition: border-color 0.3s; box-sizing: border-box;"
                                onfocus="this.style.borderColor='rgba(203,163,101,0.6)'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'"></textarea>
                        </div>
                        <button type="submit" class="btn-gold" style="width: 100%; padding: 20px; font-size: 0.9rem; letter-spacing: 4px; font-weight: 900; border-radius: 14px; border: none; cursor: pointer;">TRANSMIT DIALOGUE</button>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <style>
        @keyframes slide-move {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        @keyframes scroll-anim {
            0% { transform: translateY(0); opacity: 0; }
            50% { transform: translateY(15px); opacity: 1; }
            100% { transform: translateY(30px); opacity: 0; }
        }
    </style>
@endsection


