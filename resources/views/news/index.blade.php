@extends('layouts.public')

@section('title', 'Market Intelligence | Arkan Real Estate')

@section('content')
    <!-- Hero Section -->
    <section style="min-height: 65vh; background: #0a192f; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden; padding: 160px 60px 80px;">
        <div style="position: absolute; inset: 0; background: linear-gradient(135deg, rgba(10,25,47,0.5) 0%, rgba(10,25,47,0.85) 100%);"></div>
        <!-- Grid Lines -->
        <div style="position: absolute; inset: 0; background-image: linear-gradient(rgba(203,163,101,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(203,163,101,0.04) 1px, transparent 1px); background-size: 80px 80px;"></div>
        <div style="position: relative; z-index: 10; text-align: center; width: 100%; max-width: 900px;">
            <div class="reveal-slow">
                <div style="display: flex; align-items: center; justify-content: center; gap: 20px; margin-bottom: 30px;">
                    <div style="width: 40px; height: 1px; background: var(--primary);"></div>
                    <span style="color: var(--primary); font-weight: 800; letter-spacing: 6px; font-size: 0.8rem; text-transform: uppercase;">Arkan Real Estate</span>
                    <div style="width: 40px; height: 1px; background: var(--primary);"></div>
                </div>
                <h1 style="font-size: 5.5rem; font-weight: 900; color: #fff; line-height: 0.95; letter-spacing: -3px; margin-bottom: 30px;">
                    Latest <span class="text-gradient">News.</span>
                </h1>
                <p style="color: rgba(255,255,255,0.55); max-width: 660px; margin: 0 auto; font-size: 1.25rem; line-height: 1.9; font-weight: 300;">
                    Data-driven analysis and specialized intelligence on the evolving digital and real estate landscape of the Middle East.
                </p>
            </div>
        </div>
    </section>

    <!-- News Grid -->
    <section style="padding: 60px 60px 80px; background: #fff;">
        <div class="container-fluid">
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 50px;">
                @foreach($posts as $post)
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
                        $img = $post->image ?? '/images/B' . (($loop->index % 6) + 1) . '.jpg';
                    @endphp
                    <div class="news-card reveal" onclick="window.location='{{ route('news.show', $post->slug) }}'">
                        <div class="news-card-image">
                            <img src="{{ $img }}" alt="{{ $title }}">
                            <div class="news-card-tag">DATA INTEL</div>
                        </div>
                        <div class="news-card-body">
                            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
                                <span style="color: var(--primary); font-weight: 900; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 3px;">{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('M d, Y') : 'DRAFT' }}</span>
                            </div>
                            <h3 class="news-title">{{ $title }}</h3>
                            <p class="news-excerpt">{{ Str::limit(strip_tags($content), 120) }}</p>
                            <div class="news-read-more">
                                <span>Read Briefing</span>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <style>
        .news-card {
            cursor: pointer;
            border-radius: 20px;
            overflow: hidden;
            background: #fff;
            border: 1.5px solid #f1f5f9;
            transition: all 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .news-card:hover {
            transform: translateY(-12px);
            border-color: rgba(203,163,101,0.4);
            box-shadow: 0 40px 80px rgba(10,25,47,0.1);
        }
        .news-card-image {
            aspect-ratio: 16/9;
            overflow: hidden;
            position: relative;
        }
        .news-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 1s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .news-card:hover .news-card-image img { transform: scale(1.08); }
        .news-card-tag {
            position: absolute;
            top: 20px;
            left: 20px;
            background: rgba(10,25,47,0.8);
            color: var(--primary);
            font-size: 0.65rem;
            font-weight: 900;
            letter-spacing: 3px;
            padding: 6px 14px;
            border-radius: 50px;
            backdrop-filter: blur(10px);
        }
        .news-card-body { padding: 40px 40px 45px; }
        .news-title {
            font-size: 1.6rem;
            font-weight: 900;
            color: #0a192f;
            line-height: 1.3;
            letter-spacing: -0.5px;
            margin-bottom: 18px;
            transition: color 0.4s ease;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .news-card:hover .news-title { color: var(--primary); }
        .news-excerpt {
            color: #64748b;
            font-size: 1rem;
            line-height: 1.9;
            font-weight: 300;
            margin-bottom: 35px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .news-read-more {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #0a192f;
            font-weight: 900;
            font-size: 0.75rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            transition: color 0.4s ease;
        }
        .news-card:hover .news-read-more { color: var(--primary); }
        .news-read-more svg { transition: transform 0.4s ease; }
        .news-card:hover .news-read-more svg { transform: translateX(6px); }
    </style>
@endsection
