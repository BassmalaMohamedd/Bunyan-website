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
    .lang-badge {
        width: 32px; height: 32px;
        border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        font-size: 10px; font-weight: 900;
        text-transform: uppercase;
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
</style>

<div style="max-width: 1000px; margin: 0 auto;">
    <div style="margin-bottom: 40px; display: flex; justify-content: space-between; align-items: flex-end;">
        <div>
            <a href="{{ route('admin.services.index') }}" style="display: flex; align-items: center; gap: 8px; font-size: 0.65rem; font-weight: 800; color: rgba(255,255,255,0.3); text-transform: uppercase; letter-spacing: 2px; margin-bottom: 12px; text-decoration: none;" class="hover:text-white transition-colors">
                <svg style="width: 14px; height: 14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Back to Services
            </a>
            <h1 style="font-size: 2.2rem; font-weight: 900; color: #fff; letter-spacing: -1px;">Architect Service</h1>
        </div>
    </div>

    <form action="{{ route('admin.services.store') }}" method="POST">
        @csrf
        
        <div class="admin-card">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
                <div class="form-group">
                    <label class="form-label">Service Slug (URL)</label>
                    <input name="slug" type="text" value="{{ old('slug') }}" class="form-control" placeholder="property-valuation" required>
                    @error('slug') <p style="color: #f87171; font-size: 0.75rem; font-weight: 700; margin-top: 8px;">{{ $message }}</p> @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Visual Icon Class</label>
                    <input name="icon" type="text" value="{{ old('icon') }}" class="form-control" placeholder="home-valuation-icon">
                </div>
            </div>

            <div style="display: flex; align-items: center; justify-content: space-between; padding-top: 24px; border-top: 1px solid rgba(255,255,255,0.05);">
                <div>
                    <div style="color: #fff; font-weight: 800; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px;">Service Status</div>
                    <div style="color: rgba(255,255,255,0.3); font-size: 0.65rem; margin-top: 4px;">Visible to public users immediately after creation.</div>
                </div>
                <label style="position: relative; display: inline-block; width: 60px; height: 34px; cursor: pointer;">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" checked style="opacity: 0; width: 0; height: 0;" class="peer">
                    <span style="position: absolute; inset: 0; background-color: rgba(255,255,255,0.1); border-radius: 34px; transition: 0.4s;" class="peer-checked:bg-[#446E2E]"></span>
                    <span style="position: absolute; content: ''; height: 26px; width: 26px; left: 4px; bottom: 4px; background-color: white; transition: 0.4s; border-radius: 50%;" class="peer-checked:translate-x-[26px]"></span>
                </label>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
            <!-- English -->
            <div class="admin-card">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 24px;">
                    <div class="lang-badge" style="background: rgba(255,255,255,0.05); color: #fff;">EN</div>
                    <span style="font-size: 0.75rem; font-weight: 800; color: #fff; text-transform: uppercase; letter-spacing: 2px;">Global Specs</span>
                </div>
                <div class="form-group">
                    <label class="form-label">Service Title</label>
                    <input name="title[en]" type="text" value="{{ old('title.en') }}" class="form-control" required>
                </div>
                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label">Description</label>
                    <textarea name="description[en]" rows="10" class="form-control" style="resize: none;" required>{{ old('description.en') }}</textarea>
                </div>
            </div>

            <!-- Arabic -->
            <div class="admin-card" dir="rtl">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 24px; flex-direction: row-reverse;">
                    <div class="lang-badge" style="background: #446E2E; color: #fff;">AR</div>
                    <span style="font-size: 0.75rem; font-weight: 800; color: #fff; text-transform: uppercase; letter-spacing: 2px;">المواصفات العربية</span>
                </div>
                <div class="form-group">
                    <label class="form-label" style="text-align: right;">اسم الخدمة</label>
                    <input name="title[ar]" type="text" value="{{ old('title.ar') }}" class="form-control" style="text-align: right;" required>
                </div>
                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label" style="text-align: right;">الوصف</label>
                    <textarea name="description[ar]" rows="10" class="form-control" style="resize: none; text-align: right;" required>{{ old('description.ar') }}</textarea>
                </div>
            </div>
        </div>

        <div style="position: sticky; bottom: 24px; z-index: 100; margin-top: 40px; display: flex; justify-content: flex-end;">
            <button type="submit" class="btn-submit">
                <span>Deploy Service Module</span>
                <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </button>
        </div>
    </form>
</div>
@endsection
