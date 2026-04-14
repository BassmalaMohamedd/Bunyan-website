@extends('layouts.public')

@section('title', 'Specialized Ecosystem | Arkan Real Estate')

@section('content')
    <!-- Hero Section -->
    <section style="min-height: 65vh; background: #0a192f; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden; padding: 160px 60px 80px;">
        <div style="position: absolute; inset: 0; background: radial-gradient(circle at 10% 90%, rgba(203, 163, 101, 0.12) 0%, transparent 60%);"></div>
        <div style="position: relative; z-index: 10; text-align: center; width: 100%; max-width: 900px;">
            <div class="reveal-slow">
                <div style="display: flex; align-items: center; justify-content: center; gap: 20px; margin-bottom: 30px;">
                    <div style="width: 40px; height: 1px; background: var(--primary);"></div>
                    <span style="color: var(--primary); font-weight: 800; letter-spacing: 6px; font-size: 0.8rem; text-transform: uppercase;">Specialized Ecosystem</span>
                    <div style="width: 40px; height: 1px; background: var(--primary);"></div>
                </div>
                <h1 style="font-size: 5.5rem; font-weight: 900; color: #fff; line-height: 0.95; letter-spacing: -3px; margin-bottom: 30px;">
                    Our <span class="text-gradient">Services.</span>
                </h1>
                <p style="color: rgba(255,255,255,0.55); max-width: 660px; margin: 0 auto; font-size: 1.25rem; line-height: 1.9; font-weight: 300;">
                    End-to-end digital and consultancy solutions engineered for the Kingdom's specialized real estate sectors.
                </p>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section style="padding: 60px 60px 80px; background: #fff;">
        <div style="max-width: 1400px; margin: 0 auto;">
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px;">
                @foreach($services as $service)
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
                        $icons = ['M9 3H5a2 2 0 0 0-2 2v4m6-6h10a2 2 0 0 1 2 2v4M9 3v18m0 0h10a2 2 0 0 0 2-2v-4M9 21H5a2 2 0 0 1-2-2v-4m0 0h18', 'M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5', 'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-8 2a2 2 0 1 1-4 0 2 2 0 0 1 4 0z', 'M13 10V3L4 14h7v7l9-11h-7z', 'M9 19v-6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2zm0 0V9a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v10m-6 0a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2m0 0V5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2z', 'M12 15v2m-6 4h12a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2zm10-10V7a4 4 0 0 0-8 0v4h8z'];
                        $iconPath = $icons[$loop->index % count($icons)];
                    @endphp
                    <div class="service-card reveal">
                        <div class="service-card-inner">
                            <div style="margin-bottom: 50px;">
                                <div class="service-icon-wrap">
                                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="{{ $iconPath }}"></path></svg>
                                </div>
                            </div>
                            <h3 class="service-title">{{ $title }}</h3>
                            <p class="service-desc">{{ Str::limit(strip_tags($description), 140) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact CTA -->
    <section style="padding: 50px 60px; background: #f8fafc; border-top: 1px solid #f1f5f9;">
        <div style="max-width: 1400px; margin: 0 auto;">
            <div class="reveal" style="display: grid; grid-template-columns: 1fr auto; align-items: center; gap: 80px;">
                <div>
                    <h2 style="font-size: 3rem; color: #0a192f; font-weight: 900; letter-spacing: -2px; margin-bottom: 20px; line-height: 1.1;">Ready to integrate our ecosystem?</h2>
                    <p style="color: #64748b; font-size: 1.15rem; font-weight: 300; line-height: 1.9;">Speak with a specialized advisor about your technical requirements today.</p>
                </div>
                <a href="{{ url('/#contact') }}" class="btn-gold" style="padding: 22px 60px; font-size: 0.9rem; letter-spacing: 4px; font-weight: 900; border-radius: 4px; white-space: nowrap;">START DIALOGUE</a>
            </div>
        </div>
    </section>

    <style>
        .service-card {
            background: #fff;
            border: 1.5px solid #e2e8f0;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.7s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
        }
        .service-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(203,163,101,0.05) 0%, transparent 100%);
            opacity: 0;
            transition: opacity 0.5s ease;
        }
        .service-card:hover {
            transform: translateY(-12px);
            border-color: rgba(203, 163, 101, 0.5);
            box-shadow: 0 40px 80px rgba(10, 25, 47, 0.12);
        }
        .service-card:hover::before { opacity: 1; }
        .service-card-inner { padding: 55px 50px; }
        .service-icon-wrap {
            width: 64px;
            height: 64px;
            background: #0a192f;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            transition: all 0.5s ease;
        }
        .service-card:hover .service-icon-wrap {
            background: var(--primary);
            color: #0a192f;
            transform: rotate(5deg) scale(1.1);
        }
        .service-num {
            font-size: 0.8rem;
            font-weight: 900;
            color: #cbd5e1;
            letter-spacing: 3px;
        }
        .service-title {
            font-size: 1.8rem;
            font-weight: 900;
            color: #0a192f;
            margin-bottom: 20px;
            letter-spacing: -1px;
            line-height: 1.2;
            transition: color 0.4s ease;
        }
        .service-card:hover .service-title { color: var(--primary); }
        .service-desc {
            color: #64748b;
            font-size: 1.05rem;
            line-height: 1.9;
            font-weight: 300;
            margin-bottom: 45px;
        }
        .service-cta {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #0a192f;
            font-weight: 900;
            font-size: 0.8rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            transition: color 0.4s ease;
        }
        .service-card:hover .service-cta { color: var(--primary); }
        .service-cta svg { transition: transform 0.4s ease; }
        .service-card:hover .service-cta svg { transform: translateX(6px); }
    </style>
@endsection
