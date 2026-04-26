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
    .page-header { display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:32px; }
    .page-eyebrow { font-size:0.62rem; font-weight:800; color:#86b56a; text-transform:uppercase; letter-spacing:3px; margin-bottom:8px; }
    .page-title { font-size:1.8rem; font-weight:800; color:#fff; letter-spacing:-0.8px; }

    .btn-add {
        display:inline-flex; align-items:center; gap:8px;
        padding:11px 22px;
        background:#446E2E; color:#fff;
        border-radius:10px; font-size:0.8rem; font-weight:700;
        text-decoration:none; text-transform:uppercase; letter-spacing:1px;
        transition:background 0.2s, transform 0.15s, box-shadow 0.2s;
    }
    .btn-add:hover { background:#3a5e26; transform:translateY(-1px); box-shadow:0 6px 20px rgba(68,110,46,0.3); }
    .btn-add svg { width:15px; height:15px; }

    .alert-success {
        display:flex; align-items:center; gap:10px;
        margin-bottom:24px; padding:14px 18px;
        background:rgba(74,222,128,0.07); border:1px solid rgba(74,222,128,0.18);
        border-radius:12px; color:#4ade80; font-size:0.82rem; font-weight:600;
    }

    .admin-table-wrap {
        background:rgba(255,255,255,0.02);
        border:1px solid rgba(255,255,255,0.06);
        border-radius:16px; overflow:hidden;
    }
    .admin-table { width:100%; border-collapse:collapse; }
    .admin-table thead tr {
        border-bottom:1px solid rgba(255,255,255,0.05);
    }
    .admin-table thead th {
        padding:14px 20px;
        font-size:0.6rem; font-weight:800; color:rgba(255,255,255,0.2);
        text-transform:uppercase; letter-spacing:2px; text-align:left;
        white-space:nowrap;
    }
    .admin-table tbody tr {
        border-bottom:1px solid rgba(255,255,255,0.04);
        transition:background 0.15s;
    }
    .admin-table tbody tr:last-child { border-bottom:none; }
    .admin-table tbody tr:hover { background:rgba(68,110,46,0.05); }
    .admin-table td { padding:16px 20px; vertical-align:middle; }

    .td-date-main { font-size:0.88rem; font-weight:600; color:rgba(255,255,255,0.8); }
    .td-date-sub  { font-size:0.65rem; font-weight:600; color:rgba(255,255,255,0.25); text-transform:uppercase; letter-spacing:1px; margin-top:2px; }
    .td-title     { font-size:0.92rem; font-weight:600; color:rgba(255,255,255,0.85); max-width:380px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
    .td-subtitle  { font-size:0.75rem; color:rgba(255,255,255,0.25); margin-top:3px; max-width:380px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }

    .badge-active { background:rgba(74,222,128,0.1); color:#4ade80; border:1px solid rgba(74,222,128,0.2); padding:3px 10px; border-radius:100px; font-size:0.6rem; font-weight:800; text-transform:uppercase; letter-spacing:1.5px; }
    .badge-draft  { background:rgba(255,255,255,0.05); color:rgba(255,255,255,0.35); border:1px solid rgba(255,255,255,0.08); padding:3px 10px; border-radius:100px; font-size:0.6rem; font-weight:800; text-transform:uppercase; letter-spacing:1.5px; }

    .row-actions { display:flex; justify-content:flex-end; gap:6px; opacity:0; transition:opacity 0.2s; }
    .admin-table tbody tr:hover .row-actions { opacity:1; }

    .btn-icon {
        width:32px; height:32px; border-radius:8px; display:flex; align-items:center; justify-content:center;
        background:transparent; border:1px solid transparent; cursor:pointer; transition:all 0.15s;
        color:rgba(255,255,255,0.4); text-decoration:none;
    }
    .btn-icon:hover { background:rgba(255,255,255,0.06); border-color:rgba(255,255,255,0.1); color:#fff; }
    .btn-icon.danger { color:rgba(248,113,113,0.5); }
    .btn-icon.danger:hover { background:rgba(248,113,113,0.08); border-color:rgba(248,113,113,0.2); color:#f87171; }
    .btn-icon svg { width:14px; height:14px; }

    .empty-state { padding:80px 24px; text-align:center; color:rgba(255,255,255,0.2); font-size:0.9rem; }

    .stats-strip { display:flex; gap:12px; margin-bottom:28px; }
    .mini-stat { background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.06); border-radius:12px; padding:16px 22px; }
    .mini-stat__n { font-size:1.6rem; font-weight:800; color:#fff; letter-spacing:-1px; }
    .mini-stat__l { font-size:0.62rem; font-weight:700; color:rgba(255,255,255,0.25); text-transform:uppercase; letter-spacing:2px; margin-top:2px; }
</style>

<div style="max-width:1200px;">

    <div class="page-header">
        <div>
            <div class="page-eyebrow">Market Intelligence</div>
            <h1 class="page-title">News Management</h1>
        </div>
        <a href="{{ route('admin.news.create') }}" class="btn-add">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            New Article
        </a>
    </div>

    <div class="stats-strip">
        <div class="mini-stat">
            <div class="mini-stat__n">{{ count($posts) }}</div>
            <div class="mini-stat__l">Total Articles</div>
        </div>
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
                    <th>Date</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                <tr>
                    <td style="width:140px;">
                        <div class="td-date-main">{{ \Carbon\Carbon::parse($post->published_at ?? $post->created_at)->format('M j, Y') }}</div>
                        <div class="td-date-sub">{{ \Carbon\Carbon::parse($post->published_at ?? $post->created_at)->format('H:i') }}</div>
                    </td>
                    <td>
                        <div class="td-title">{{ $extract($post->title) }}</div>
                        <div class="td-subtitle">{{ $extractAr($post->title) }}</div>
                    </td>
                    <td style="width:100px;">
                        @if($post->published_at)
                            <span class="badge-active">Published</span>
                        @else
                            <span class="badge-draft">Draft</span>
                        @endif
                    </td>
                    <td style="width:100px;">
                        <div class="row-actions">
                            <a href="{{ route('admin.news.edit', $post->id) }}" class="btn-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </a>
                            <form action="{{ route('admin.news.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Delete this article?')" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-icon danger">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="empty-state">No articles published yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
