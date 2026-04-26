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
    .form-control {
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
    }
    .btn-submit {
        background: #446E2E; color: #fff; border: none; border-radius: 12px;
        padding: 16px 40px; font-size: 0.85rem; font-weight: 800;
        text-transform: uppercase; letter-spacing: 2px; cursor: pointer;
        transition: all 0.2s; display: inline-flex; align-items: center; gap: 10px;
        box-shadow: 0 8px 30px rgba(68,110,46,0.25);
    }
    .btn-submit:hover { background: #3a5e26; transform: translateY(-2px); }
</style>

<div style="max-width: 900px; margin: 0 auto;">
    <div style="margin-bottom: 40px;">
        <a href="{{ route('admin.leads.index') }}" style="display: flex; align-items: center; gap: 8px; font-size: 0.65rem; font-weight: 800; color: rgba(255,255,255,0.3); text-transform: uppercase; letter-spacing: 2px; margin-bottom: 12px; text-decoration: none;" class="hover:text-white transition-colors">
            <svg style="width: 14px; height: 14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back to Registry
        </a>
        <h1 style="font-size: 2.2rem; font-weight: 900; color: #fff; letter-spacing: -1px;">Lead Intelligence Report</h1>
    </div>

    <div class="admin-card" style="display: flex; gap: 40px; align-items: flex-start;">
        <div style="width: 80px; height: 80px; background: rgba(68,110,46,0.15); border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: 900; color: #86b56a; flex-shrink: 0;">
            {{ mb_substr($lead->name, 0, 1) }}
        </div>
        <div style="flex-grow: 1;">
            <h2 style="font-size: 1.5rem; font-weight: 800; color: #fff; margin-bottom: 6px;">{{ $lead->name }}</h2>
            <div style="font-size: 0.85rem; color: rgba(255,255,255,0.4); margin-bottom: 24px;">Strategic Partner • #{{ str_pad($lead->id, 6, '0', STR_PAD_LEFT) }}</div>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
                <div>
                    <div style="font-size: 0.6rem; font-weight: 800; color: rgba(255,255,255,0.2); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 6px;">Email Pointer</div>
                    <div style="font-weight: 600; color: #fff;">{{ $lead->email }}</div>
                </div>
                <div>
                    <div style="font-size: 0.6rem; font-weight: 800; color: rgba(255,255,255,0.2); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 6px;">Terminal ID (Phone)</div>
                    <div style="font-weight: 600; color: #fff; font-family: monospace;">{{ $lead->phone }}</div>
                </div>
            </div>
            
            <div style="margin-top: 24px; padding-top: 24px; border-top: 1px solid rgba(255,255,255,0.05);">
                <div style="font-size: 0.6rem; font-weight: 800; color: rgba(255,255,255,0.2); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 6px;">Requested Service</div>
                <div style="font-weight: 700; color: #86b56a; font-size: 0.9rem;">{{ $lead->service->title['en'] ?? 'General Consultation' }}</div>
            </div>
        </div>
    </div>

    <div class="admin-card" style="background: rgba(68,110,46,0.05); border-color: rgba(68,110,46,0.12);">
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
            <svg style="width: 18px; height: 18px; color: #86b56a;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
            <span style="font-size: 0.75rem; font-weight: 800; color: #fff; text-transform: uppercase; letter-spacing: 2px;">Strategic Narrative</span>
        </div>
        <div style="font-size: 1.1rem; color: rgba(255,255,255,0.85); line-height: 1.6; font-style: italic;">
            "{{ $lead->message }}"
        </div>
    </div>

    <!-- Status Synchronization Bar -->
    <div style="position: sticky; bottom: 24px; z-index: 100; margin-top: 40px;">
        <form action="{{ route('admin.leads.update', $lead->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="admin-card" style="margin-bottom: 0; padding: 24px 32px; display: flex; align-items: center; justify-content: space-between; background: #0c0a09; box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
                <div>
                    <div style="font-size: 0.65rem; font-weight: 800; color: #86b56a; text-transform: uppercase; letter-spacing: 2px;">Engagement Phase</div>
                </div>
                <div style="display: flex; gap: 16px;">
                    <select name="status" class="form-control" style="min-width: 220px; font-weight: 700; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">
                        <option value="new" {{ $lead->status === 'new' ? 'selected' : '' }}>Awaiting Analysis</option>
                        <option value="in_progress" {{ $lead->status === 'in_progress' ? 'selected' : '' }}>Active Dialogue</option>
                        <option value="completed" {{ $lead->status === 'completed' ? 'selected' : '' }}>Mission Accomplished</option>
                        <option value="cancelled" {{ $lead->status === 'cancelled' ? 'selected' : '' }}>Archived / Terminated</option>
                    </select>
                    <button type="submit" class="btn-submit">
                        Synchronize
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
