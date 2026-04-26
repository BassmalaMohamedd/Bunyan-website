@extends('layouts.admin')

@section('content')
<style>
    /* ── Dashboard-specific tokens (reuse CSS vars from layout) ── */
    .dash-card {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 18px;
        padding: 28px 30px;
        transition: border-color 0.25s, background 0.25s, transform 0.2s;
        position: relative;
        overflow: hidden;
    }
    .dash-card:hover {
        border-color: rgba(68,110,46,0.35);
        background: rgba(68,110,46,0.04);
        transform: translateY(-2px);
    }
    .dash-card__glow {
        position: absolute;
        top: -40px; right: -40px;
        width: 120px; height: 120px;
        background: radial-gradient(circle, rgba(68,110,46,0.18), transparent 70%);
        opacity: 0;
        transition: opacity 0.3s;
        pointer-events: none;
    }
    .dash-card:hover .dash-card__glow { opacity: 1; }

    .stat-icon {
        width: 44px; height: 44px;
        border-radius: 12px;
        background: rgba(68,110,46,0.1);
        border: 1px solid rgba(68,110,46,0.22);
        display: flex; align-items: center; justify-content: center;
        color: #86b56a;
        margin-bottom: 20px;
        transition: background 0.25s;
    }
    .dash-card:hover .stat-icon {
        background: rgba(68,110,46,0.2);
    }
    .stat-count {
        font-size: 2.6rem;
        font-weight: 800;
        color: #fff;
        letter-spacing: -2px;
        line-height: 1;
        margin-bottom: 6px;
    }
    .stat-label {
        font-size: 0.82rem;
        font-weight: 600;
        color: rgba(255,255,255,0.55);
        margin-bottom: 4px;
    }
    .stat-desc {
        font-size: 0.72rem;
        color: rgba(255,255,255,0.25);
        line-height: 1.5;
    }
    .stat-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 20px;
        font-size: 0.72rem;
        font-weight: 700;
        color: #86b56a;
        text-decoration: none;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        transition: gap 0.2s, color 0.2s;
    }
    .dash-card:hover .stat-link { gap: 10px; color: #a8d18c; }
    .stat-link svg { width: 13px; height: 13px; }

    /* Hero Card */
    .dash-hero {
        background: linear-gradient(135deg, rgba(68,110,46,0.12) 0%, rgba(68,110,46,0.04) 60%, transparent 100%);
        border: 1px solid rgba(68,110,46,0.25);
        border-radius: 22px;
        padding: 48px 52px;
        position: relative;
        overflow: hidden;
        margin-bottom: 32px;
    }
    .dash-hero::after {
        content: '';
        position: absolute;
        top: -80px; right: -80px;
        width: 340px; height: 340px;
        background: radial-gradient(circle, rgba(68,110,46,0.15), transparent 70%);
        pointer-events: none;
    }

    .dash-hero__eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.65rem;
        font-weight: 800;
        color: #86b56a;
        text-transform: uppercase;
        letter-spacing: 3px;
        margin-bottom: 20px;
    }
    .dash-hero__eyebrow-dot {
        width: 6px; height: 6px;
        border-radius: 50%;
        background: #86b56a;
        animation: pulse 2s ease infinite;
    }
    @keyframes pulse { 0%,100%{opacity:1;transform:scale(1);} 50%{opacity:0.4;transform:scale(0.7);} }

    .dash-hero__name {
        font-size: clamp(2.2rem, 4vw, 3.2rem);
        font-weight: 800;
        color: #fff;
        letter-spacing: -1.5px;
        line-height: 1.1;
        margin-bottom: 14px;
    }
    .dash-hero__name em {
        font-style: italic;
        font-family: 'Playfair Display', serif;
        color: #86b56a;
        font-weight: 700;
    }
    .dash-hero__sub {
        font-size: 0.95rem;
        color: rgba(255,255,255,0.45);
        font-weight: 400;
        line-height: 1.7;
        max-width: 560px;
        margin-bottom: 36px;
    }

    .hero-actions { display: flex; gap: 14px; flex-wrap: wrap; align-items: center; }
    .btn-hero-primary {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 13px 28px;
        background: #446E2E;
        color: #fff;
        border-radius: 10px;
        font-size: 0.8rem;
        font-weight: 700;
        text-decoration: none;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
        border: none;
    }
    .btn-hero-primary:hover { background: #3a5e26; transform: translateY(-1px); box-shadow: 0 8px 24px rgba(68,110,46,0.3); }
    .btn-hero-primary svg { width: 15px; height: 15px; }

    .btn-hero-ghost {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 13px 28px;
        background: rgba(255,255,255,0.04);
        color: rgba(255,255,255,0.65);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 10px;
        font-size: 0.8rem;
        font-weight: 600;
        text-decoration: none;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.2s;
    }
    .btn-hero-ghost:hover { background: rgba(255,255,255,0.08); color: #fff; border-color: rgba(255,255,255,0.2); transform: translateY(-1px); }
    .btn-hero-ghost svg { width: 15px; height: 15px; }

    /* Clock widget */
    .clock-widget {
        position: absolute;
        top: 40px; right: 52px;
        text-align: right;
    }
    @media(max-width: 768px) { .clock-widget { display: none; } }
    .clock-widget__label { font-size: 0.58rem; font-weight: 700; color: rgba(255,255,255,0.2); text-transform: uppercase; letter-spacing: 2px; margin-bottom: 4px; }
    .clock-widget__time { font-size: 2rem; font-weight: 800; color: rgba(255,255,255,0.12); letter-spacing: -1px; font-variant-numeric: tabular-nums; }

    /* Quick-nav grid */
    .quick-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 16px; }

    /* Section label */
    .section-label {
        font-size: 0.65rem;
        font-weight: 800;
        color: rgba(255,255,255,0.2);
        text-transform: uppercase;
        letter-spacing: 3px;
        margin-bottom: 16px;
        margin-top: 36px;
    }
</style>

<div style="max-width: 1280px;">

    {{-- ── HERO ── --}}
    <div class="dash-hero">
        <div class="clock-widget"
             x-data="{ time: '' }"
             x-init="setInterval(() => time = new Date().toLocaleTimeString('en-US', { hour12: false, hour: '2-digit', minute: '2-digit' }), 1000); time = new Date().toLocaleTimeString('en-US', { hour12: false, hour: '2-digit', minute: '2-digit' })">
            <div class="clock-widget__label">Local Time</div>
            <div class="clock-widget__time" x-text="time">--:--</div>
        </div>

        <div class="dash-hero__eyebrow">
            <span class="dash-hero__eyebrow-dot"></span>
            Operational — All Systems Online
        </div>

        <h1 class="dash-hero__name">
            Welcome back,<br>
            <em>{{ Auth::user()->name }}</em>
        </h1>

        <p class="dash-hero__sub">
            The Bunyan infrastructure is synchronized. You have full control over all content, services, and market intelligence modules.
        </p>

        <div class="hero-actions">
            <a href="{{ route('admin.home.edit') }}" class="btn-hero-primary">
                Edit Home Page
                @include('components.icons.arrow-up-right', ['class' => 'w-4 h-4'])
            </a>
            <a href="{{ route('admin.pages.index') }}" class="btn-hero-ghost">
                About Page
                @include('components.icons.arrow-up-right', ['class' => 'w-4 h-4'])
            </a>
        </div>
    </div>

    {{-- ── STATS GRID ── --}}
    <div class="section-label">Platform Overview</div>
    <div class="quick-grid">
        @php
            $stats_items = [
                [
                    'label'   => 'News Articles',
                    'count'   => $stats['newsCount'],
                    'route'   => 'admin.news.index',
                    'icon'    => 'newspaper',
                    'desc'    => 'Published market insights',
                ],
                [
                    'label'   => 'Active Services',
                    'count'   => $stats['servicesCount'],
                    'route'   => 'admin.services.index',
                    'icon'    => 'briefcase',
                    'desc'    => 'Platform service modules',
                ],
                [
                    'label'   => 'Leads',
                    'count'   => $stats['leadsCount'],
                    'route'   => 'admin.leads.index',
                    'icon'    => 'message-square',
                    'desc'    => 'Inbound inquiries',
                ],
            ];
        @endphp

        @foreach($stats_items as $stat)
        <div class="dash-card">
            <div class="dash-card__glow"></div>

            <div class="stat-icon">
                @include('components.icons.' . $stat['icon'], ['class' => 'w-5 h-5'])
            </div>

            <div class="stat-count">{{ $stat['count'] }}</div>
            <div class="stat-label">{{ $stat['label'] }}</div>
            <div class="stat-desc">{{ $stat['desc'] }}</div>

            <a href="{{ route($stat['route']) }}" class="stat-link">
                Manage
                @include('components.icons.arrow-right', ['class' => 'w-3 h-3'])
            </a>
        </div>
        @endforeach
    </div>

    {{-- ── QUICK ACCESS ── --}}
    <div class="section-label" style="margin-top: 40px;">Quick Access</div>
    <div class="quick-grid">
        @php
            $quickLinks = [
                ['label' => 'Add News Article', 'route' => 'admin.news.create',    'icon' => 'newspaper'],
                ['label' => 'Add Service',       'route' => 'admin.services.create','icon' => 'briefcase'],
                ['label' => 'View Leads',         'route' => 'admin.leads.index',    'icon' => 'message-square'],
                ['label' => 'Edit About Page',    'route' => 'admin.pages.index',    'icon' => 'file-text'],
            ];
        @endphp
        @foreach($quickLinks as $link)
        <a href="{{ route($link['route']) }}" class="dash-card" style="text-decoration:none; display:block;">
            <div class="dash-card__glow"></div>
            <div class="stat-icon" style="margin-bottom:14px;">
                @include('components.icons.' . $link['icon'], ['class' => 'w-4 h-4'])
            </div>
            <div style="font-size:0.88rem; font-weight:600; color:rgba(255,255,255,0.75);">{{ $link['label'] }}</div>
        </a>
        @endforeach
    </div>

</div>
@endsection
