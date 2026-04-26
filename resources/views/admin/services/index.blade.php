@extends('layouts.admin')

@section('content')
@php
    $extract = function($data) {
        if (is_array($data)) return $data['en'] ?? '';
        $decoded = json_decode($data ?? '{}', true);
        if (is_array($decoded)) return $decoded['en'] ?? $data;
        return $data;
    };
    $extractAr = function($data) {
        if (is_array($data)) return $data['ar'] ?? '';
        $decoded = json_decode($data ?? '{}', true);
        if (is_array($decoded)) return $decoded['ar'] ?? '';
        return '';
    };
@endphp

<style>
    .page-eyebrow{font-size:.62rem;font-weight:800;color:#86b56a;text-transform:uppercase;letter-spacing:3px;margin-bottom:8px;}
    .page-title{font-size:1.8rem;font-weight:800;color:#fff;letter-spacing:-.8px;}
    .page-header{display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:32px;}
    .btn-add{display:inline-flex;align-items:center;gap:8px;padding:11px 22px;background:#446E2E;color:#fff;border-radius:10px;font-size:.8rem;font-weight:700;text-decoration:none;text-transform:uppercase;letter-spacing:1px;transition:background .2s,transform .15s,box-shadow .2s;}
    .btn-add:hover{background:#3a5e26;transform:translateY(-1px);box-shadow:0 6px 20px rgba(68,110,46,.3);}
    .btn-add svg{width:15px;height:15px;}
    .alert-success{display:flex;align-items:center;gap:10px;margin-bottom:24px;padding:14px 18px;background:rgba(74,222,128,.07);border:1px solid rgba(74,222,128,.18);border-radius:12px;color:#4ade80;font-size:.82rem;font-weight:600;}
    .admin-table-wrap{background:rgba(255,255,255,.02);border:1px solid rgba(255,255,255,.06);border-radius:16px;overflow:hidden;}
    .admin-table{width:100%;border-collapse:collapse;}
    .admin-table thead tr{border-bottom:1px solid rgba(255,255,255,.05);}
    .admin-table thead th{padding:14px 20px;font-size:.6rem;font-weight:800;color:rgba(255,255,255,.2);text-transform:uppercase;letter-spacing:2px;text-align:left;white-space:nowrap;}
    .admin-table tbody tr{border-bottom:1px solid rgba(255,255,255,.04);transition:background .15s;}
    .admin-table tbody tr:last-child{border-bottom:none;}
    .admin-table tbody tr:hover{background:rgba(68,110,46,.05);}
    .admin-table td{padding:16px 20px;vertical-align:middle;}
    .svc-avatar{width:42px;height:42px;background:rgba(68,110,46,.12);border:1px solid rgba(68,110,46,.22);border-radius:10px;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:1.1rem;color:#86b56a;flex-shrink:0;overflow:hidden;}
    .svc-avatar img{width:100%;height:100%;object-fit:cover;}
    .td-title{font-size:.92rem;font-weight:600;color:rgba(255,255,255,.85);}
    .td-subtitle{font-size:.75rem;color:rgba(255,255,255,.25);margin-top:3px;}
    .badge-active{background:rgba(74,222,128,.1);color:#4ade80;border:1px solid rgba(74,222,128,.2);padding:3px 10px;border-radius:100px;font-size:.6rem;font-weight:800;text-transform:uppercase;letter-spacing:1.5px;}
    .badge-inactive{background:rgba(255,255,255,.05);color:rgba(255,255,255,.3);border:1px solid rgba(255,255,255,.08);padding:3px 10px;border-radius:100px;font-size:.6rem;font-weight:800;text-transform:uppercase;letter-spacing:1.5px;}
    .badge-cat{background:rgba(68,110,46,.1);color:#86b56a;border:1px solid rgba(68,110,46,.2);padding:3px 10px;border-radius:100px;font-size:.6rem;font-weight:700;text-transform:uppercase;letter-spacing:1px;}
    .row-actions{display:flex;justify-content:flex-end;gap:6px;opacity:0;transition:opacity .2s;}
    .admin-table tbody tr:hover .row-actions{opacity:1;}
    .btn-icon{width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;background:transparent;border:1px solid transparent;cursor:pointer;transition:all .15s;color:rgba(255,255,255,.4);text-decoration:none;}
    .btn-icon:hover{background:rgba(255,255,255,.06);border-color:rgba(255,255,255,.1);color:#fff;}
    .btn-icon.danger{color:rgba(248,113,113,.5);}
    .btn-icon.danger:hover{background:rgba(248,113,113,.08);border-color:rgba(248,113,113,.2);color:#f87171;}
    .btn-icon svg{width:14px;height:14px;}
    .empty-state{padding:80px 24px;text-align:center;color:rgba(255,255,255,.2);font-size:.9rem;}
</style>

<div style="max-width:1200px;">

    <div class="page-header">
        <div>
            <div class="page-eyebrow">Platform Architecture</div>
            <h1 class="page-title">Services Management</h1>
        </div>
        <a href="{{ route('admin.services.create') }}" class="btn-add">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            New Service
        </a>
    </div>

    @if(session('success'))
        <div class="alert-success">
            <svg style="width:16px;height:16px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:14px;">
                            <div class="svc-avatar">
                                @if(is_array($service->image) ? ($service->image['url'] ?? null) : $service->image)
                                    <img src="{{ is_array($service->image) ? $service->image['url'] : $service->image }}" alt="">
                                @else
                                    {{ mb_substr($extract($service->title) ?: 'S', 0, 1) }}
                                @endif
                            </div>
                            <div>
                                <div class="td-title">{{ $extract($service->title) ?: 'Untitled Service' }}</div>
                                <div class="td-subtitle">{{ $extractAr($service->title) }}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge-cat">{{ $service->category ?? 'Specialized' }}</span>
                    </td>
                    <td>
                        @if($service->is_active)
                            <span class="badge-active">Active</span>
                        @else
                            <span class="badge-inactive">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <div class="row-actions">
                            <a href="{{ route('admin.services.edit', $service->id) }}" class="btn-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </a>
                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Delete this service?')" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-icon danger">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="empty-state">No services registered yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
