@extends('layouts.admin')

@section('content')
<style>
    .admin-card {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 24px;
        padding: 40px;
        margin-bottom: 24px;
    }
    .form-section-title {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 32px;
    }
    .form-section-title h2 {
        font-size: 1.1rem;
        font-weight: 800;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    .icon-box {
        width: 40px; height: 40px;
        background: rgba(68,110,46,0.15);
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        color: #86b56a;
    }
    .form-group { margin-bottom: 24px; }
    .form-label {
        display: block;
        font-size: 0.65rem;
        font-weight: 800;
        color: rgba(255,255,255,0.3);
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 10px;
    }
    .form-control {
        width: 100%;
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 12px;
        padding: 14px 18px;
        color: #fff;
        font-size: 0.95rem;
        font-weight: 500;
        transition: all 0.2s;
        outline: none;
    }
    .form-control:focus {
        border-color: rgba(68,110,46,0.4);
        background: rgba(68,110,46,0.05);
        box-shadow: 0 0 0 4px rgba(68,110,46,0.1);
    }
    .btn-submit {
        background: #446E2E;
        color: #fff;
        border: none;
        border-radius: 12px;
        padding: 16px 40px;
        font-size: 0.85rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 2px;
        cursor: pointer;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 8px 30px rgba(68,110,46,0.25);
    }
    .btn-submit:hover {
        background: #3a5e26;
        transform: translateY(-2px);
        box-shadow: 0 12px 40px rgba(68,110,46,0.4);
    }
    .btn-submit:active { transform: translateY(0); }
</style>

<div style="max-width: 900px; margin: 0 auto;">
    <div style="margin-bottom: 40px;">
        <div style="font-size: 0.65rem; font-weight: 800; color: #86b56a; text-transform: uppercase; letter-spacing: 3px; margin-bottom: 8px;">Narrative Management</div>
        <h1 style="font-size: 2.2rem; font-weight: 900; color: #fff; letter-spacing: -1px;">Home Hub</h1>
    </div>

    @if($errors->any())
        <div style="background: rgba(248,113,113,0.1); border: 1px solid rgba(248,113,113,0.2); border-radius: 16px; padding: 16px 24px; color: #f87171; font-weight: 700; margin-bottom: 32px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div style="background: rgba(74,222,128,0.1); border: 1px solid rgba(74,222,128,0.2); border-radius: 16px; padding: 16px 24px; color: #4ade80; font-weight: 700; margin-bottom: 32px; display: flex; align-items: center; gap: 12px;">
            <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            Home Page Hub Successfully Updated.
        </div>
    @endif

    <form action="{{ route('admin.home.update') }}" method="POST">
        @csrf
        
        <!-- Hero Section -->
        <div class="admin-card">
            <div class="form-section-title">
                <div class="icon-box">
                    @include('components.icons.home', ['class' => 'w-5 h-5'])
                </div>
                <h2>Hero Component</h2>
            </div>

            <div class="form-group">
                <label class="form-label">Primary Headline</label>
                <input name="home_hero_title" type="text" value="{{ old('home_hero_title', $settings['home_hero_title'] ?? '') }}" class="form-control" placeholder="The Vision 2030 Gateway">
                @error('home_hero_title') <p style="color: #f87171; font-size: 0.75rem; font-weight: 700; margin-top: 8px;">{{ $message }}</p> @enderror
            </div>

            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Support Description</label>
                <textarea name="home_hero_subtitle" rows="4" class="form-control" style="resize: none;" placeholder="Access our specialized intelligence...">{{ old('home_hero_subtitle', $settings['home_hero_subtitle'] ?? '') }}</textarea>
            </div>

            <div class="admin-card" dir="rtl">
                <div class="section-header">
                    <div class="lang-badge" style="background:#446E2E;color:#fff;">AR</div>
                    <h3 class="section-title">المحتوى العربي للرئيسية</h3>
                </div>
                <div style="margin-bottom:24px;">
                    <label class="form-label">العنوان الرئيسي</label>
                    <input name="home_hero_title_ar" type="text" value="{{ old('home_hero_title_ar', $settings['home_hero_title_ar'] ?? '') }}" class="form-control" placeholder="اكتشف أرقى أحياء المملكة">
                </div>
                <div>
                    <label class="form-label">الوصف</label>
                    <textarea name="home_hero_subtitle_ar" rows="4" class="form-control" style="resize:none;" placeholder="تعرّف على أفضل المجتمعات السكنية...">{{ old('home_hero_subtitle_ar', $settings['home_hero_subtitle_ar'] ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Metrics -->
        <div class="admin-card">
            <div class="form-section-title">
                <div class="icon-box">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                </div>
                <h2>Strategic Metrics</h2>
            </div>

            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
                <div class="form-group">
                    <label class="form-label">Active Listings</label>
                    <input name="home_stats_listings" type="text" value="{{ old('home_stats_listings', $settings['home_stats_listings'] ?? '') }}" class="form-control" placeholder="38,500+">
                </div>
                <div class="form-group">
                    <label class="form-label">Avg. Market Time</label>
                    <input name="home_stats_market_time" type="text" value="{{ old('home_stats_market_time', $settings['home_stats_market_time'] ?? '') }}" class="form-control" placeholder="23 Days">
                </div>
                <div class="form-group">
                    <label class="form-label">Trust Index</label>
                    <input name="home_stats_trust" type="text" value="{{ old('home_stats_trust', $settings['home_stats_trust'] ?? '') }}" class="form-control" placeholder="96%">
                </div>
                <div class="form-group">
                    <label class="form-label">Strategic Partners</label>
                    <input name="home_stats_partners" type="text" value="{{ old('home_stats_partners', $settings['home_stats_partners'] ?? '') }}" class="form-control" placeholder="Vision 2030">
                </div>
            </div>
        </div>

        <!-- FIXED SUBMIT BAR -->
        <div style="position: sticky; bottom: 24px; z-index: 100; margin-top: 40px; display: flex; justify-content: flex-end;">
            <button type="submit" class="btn-submit">
                <span>Save and Apply Changes</span>
                <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </button>
        </div>
    </form>
</div>

@endsection
