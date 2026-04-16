@extends('layouts.public')

@php
    $lang = app()->getLocale();
    $title = $page->title[$lang] ?? $page->title['en'] ?? 'Arkan Real Estate';
    $content = $page->content[$lang] ?? $page->content['en'] ?? '';
@endphp

@section('title', $title . ' | Arkan Real Estate')

@section('content')
    <!-- Cinematic Hero Section -->
    <section style="min-height: 55vh; background: #0a192f; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden; padding: 120px 60px 60px;">
        <div style="position: absolute; inset: 0; background: radial-gradient(circle at 70% 30%, rgba(203, 163, 101, 0.1) 0%, transparent 70%);"></div>
        <div style="position: relative; z-index: 10; text-align: center; width: 100%; max-width: 1000px;">
            <div class="reveal-slow">
                <div style="display: flex; align-items: center; justify-content: center; gap: 20px; margin-bottom: 25px;">
                    <div style="width: 30px; height: 1px; background: var(--primary);"></div>
                    <span style="color: var(--primary); font-weight: 800; letter-spacing: 5px; font-size: 0.75rem; text-transform: uppercase;">Arkan Segment Registry</span>
                    <div style="width: 30px; height: 1px; background: var(--primary);"></div>
                </div>
                <h1 style="font-size: 5.5rem; font-weight: 900; color: #fff; line-height: 0.95; letter-spacing: -3px; margin-bottom: 30px;">
                    {{ $title }}
                </h1>
            </div>
        </div>
    </section>

    <!-- Dynamic Content -->
    <section style="padding: 100px 60px; background: #fff; min-height: 40vh;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div class="reveal">
                <div style="font-size: 1.2rem; line-height: 2; color: #64748b; font-weight: 300;">
                    {!! nl2br(e($content)) !!}
                </div>
            </div>
        </div>
    </section>
@endsection
