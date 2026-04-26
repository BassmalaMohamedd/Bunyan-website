@extends('layouts.public')

@php 
    $extract = function($data) {
        if (is_array($data)) return $data['en'] ?? '';
        $decoded = json_decode($data ?? '{}', true);
        if (is_array($decoded)) return $decoded['en'] ?? $data;
        if (preg_match('/"en"\s*:\s*"([^"]+)"/', $data, $matches)) return $matches[1];
        return $data;
    };
    $title = $extract($service->title);
    $description = $extract($service->description);
@endphp

@section('title', ($title ?? 'Service') . ' | Ecosystem Components | Bunyan')

@section('content')
    <!-- Cinematic Dark Hero -->
    <section class="service-hero">
        <div class="service-hero-bg"></div>
        <div class="service-hero-grid"></div>
        <div class="container-fluid hero-spacer" style="position: relative; z-index: 10; text-align: center;">
            <div class="reveal-slow">
                <div style="display: flex; align-items: center; justify-content: center; gap: 20px; margin-bottom: 35px;">
                    <div style="width: 40px; height: 1px; background: var(--primary);"></div>
                    <span style="color: var(--primary); font-weight: 800; letter-spacing: 6px; font-size: 0.8rem; text-transform: uppercase;">Ecosystem Component</span>
                    <div style="width: 40px; height: 1px; background: var(--primary);"></div>
                </div>
                <h1 style="font-size: 5.5rem; font-weight: 900; color: #fff; line-height: 0.95; letter-spacing: -4px; margin-bottom: 40px;">{{ $title }}</h1>
                <p style="color: rgba(255,255,255,0.55); max-width: 700px; margin: 0 auto; font-size: 1.3rem; line-height: 1.9; font-weight: 300;">
                    Advanced technical architecture designed for uncompromising operational integrity and market transparency.
                </p>
            </div>
        </div>
    </section>

    <!-- Lead Image Banner -->
    <div style="width: 100%; aspect-ratio: 21/6; overflow: hidden; position: relative;">
        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=2000" style="width: 100%; height: 100%; object-fit: cover;">
        <div style="position: absolute; inset: 0; background: linear-gradient(0deg, rgba(10,25,47,0.4) 0%, transparent 100%);"></div>
    </div>

    <!-- Main Content -->
    <section style="padding: 140px 60px 160px; background: #fff;">
        <div style="max-width: 1400px; margin: 0 auto;">
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 120px; align-items: start;">
                <!-- Left: Content -->
                <div class="reveal">
                    <span style="color: var(--primary); font-weight: 900; letter-spacing: 6px; font-size: 0.75rem; text-transform: uppercase; display: block; margin-bottom: 30px;">Technical Architecture</span>
                    <h2 style="font-size: 3.5rem; font-weight: 900; color: #1c1917; letter-spacing: -2px; line-height: 1.1; margin-bottom: 60px;">Operational Sovereign <br>Governance.</h2>
                    
                    <div style="color: #64748b; font-size: 1.2rem; line-height: 2.3; font-weight: 300; margin-bottom: 80px;">
                        {!! nl2br(e($description)) !!}
                    </div>

                    <!-- Feature Pills -->
                    <div style="display: flex; flex-wrap: wrap; gap: 15px; margin-bottom: 80px;">
                        @foreach(['Data Integrity', 'Cloud Native', 'ZATCA Compliant', 'AI-Enhanced', 'Real-time Sync', 'Enterprise Grade'] as $feature)
                        <span style="padding: 10px 24px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 50px; font-size: 0.85rem; font-weight: 700; color: #1c1917; letter-spacing: 1px;">{{ $feature }}</span>
                        @endforeach
                    </div>

                    <!-- Stats Row -->
                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px; padding-top: 60px; border-top: 1px solid #f1f5f9;">
                        <div>
                            <h4 style="font-size: 3rem; font-weight: 900; color: #1c1917; letter-spacing: -2px; margin-bottom: 8px;">950+</h4>
                            <p style="font-size: 0.75rem; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 3px;">Enterprise Clients</p>
                        </div>
                        <div>
                            <h4 style="font-size: 3rem; font-weight: 900; color: #1c1917; letter-spacing: -2px; margin-bottom: 8px;">15yr</h4>
                            <p style="font-size: 0.75rem; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 3px;">Deployment History</p>
                        </div>
                        <div>
                            <h4 style="font-size: 3rem; font-weight: 900; color: #1c1917; letter-spacing: -2px; margin-bottom: 8px;">99.9%</h4>
                            <p style="font-size: 0.75rem; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 3px;">System Uptime</p>
                        </div>
                    </div>
                </div>

                <!-- Right Sticky Card -->
                <div class="reveal" style="position: sticky; top: 120px;">
                    <div style="background: #1c1917; border-radius: 24px; padding: 60px; border: 1px solid rgba(255,255,255,0.05); overflow: hidden; position: relative;">
                        <div style="position: absolute; top: -60px; right: -60px; width: 200px; height: 200px; background: radial-gradient(circle, rgba(203,163,101,0.15) 0%, transparent 70%); border-radius: 50%;"></div>
                        <span style="color: var(--primary); font-weight: 900; letter-spacing: 5px; font-size: 0.7rem; text-transform: uppercase; display: block; margin-bottom: 30px;">Strategic Access</span>
                        <h3 style="font-size: 2.2rem; font-weight: 900; color: #fff; margin-bottom: 25px; letter-spacing: -1px; line-height: 1.2;">Secure This Component.</h3>
                        <p style="color: rgba(255,255,255,0.5); font-size: 1rem; line-height: 2; font-weight: 300; margin-bottom: 50px;">
                            Our {{ $title }} solution is built on immutable data sets and precision engineering, fully aligned with the Kingdom's regulatory frameworks.
                        </p>
                        <div style="border-top: 1px solid rgba(255,255,255,0.08); padding-top: 40px; margin-bottom: 40px;">
                            <div style="display: flex; gap: 30px; margin-bottom: 25px;">
                                <div>
                                    <p style="color: var(--primary); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 3px; margin-bottom: 8px;">Status</p>
                                    <p style="color: #fff; font-weight: 900; font-size: 0.95rem;">● Active Deployment</p>
                                </div>
                                <div>
                                    <p style="color: var(--primary); font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 3px; margin-bottom: 8px;">Region</p>
                                    <p style="color: #fff; font-weight: 900; font-size: 0.95rem;">KSA / MENA</p>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/#contact') }}" class="btn-gold" style="width: 100%; display: block; text-align: center; padding: 22px; font-size: 0.85rem; letter-spacing: 4px; font-weight: 900; border-radius: 12px;">REQUEST BRIEFING</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .service-hero {
            height: 65vh;
            background: #1c1917;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        .service-hero-bg {
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at 70% 30%, rgba(203,163,101,0.12) 0%, transparent 60%);
        }
        .service-hero-grid {
            position: absolute;
            inset: 0;
            background-image: linear-gradient(rgba(203,163,101,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(203,163,101,0.04) 1px, transparent 1px);
            background-size: 80px 80px;
        }
    </style>
@endsection
