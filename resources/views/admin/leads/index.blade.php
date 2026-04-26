@extends('layouts.admin')

@section('content')
<style>
    .page-eyebrow{font-size:.62rem;font-weight:800;color:#86b56a;text-transform:uppercase;letter-spacing:3px;margin-bottom:8px;}
    .page-title{font-size:1.8rem;font-weight:800;color:#fff;letter-spacing:-.8px;}
    .page-header{display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:32px;}
    .admin-table-wrap{background:rgba(255,255,255,.02);border:1px solid rgba(255,255,255,.06);border-radius:16px;overflow:hidden;}
    .admin-table{width:100%;border-collapse:collapse;}
    .admin-table thead tr{border-bottom:1px solid rgba(255,255,255,.05);}
    .admin-table thead th{padding:14px 20px;font-size:.6rem;font-weight:800;color:rgba(255,255,255,.2);text-transform:uppercase;letter-spacing:2px;text-align:left;white-space:nowrap;}
    .admin-table tbody tr{border-bottom:1px solid rgba(255,255,255,.04);transition:background .15s;}
    .admin-table tbody tr:last-child{border-bottom:none;}
    .admin-table tbody tr:hover{background:rgba(68,110,46,.05);}
    .admin-table td{padding:16px 20px;vertical-align:middle;}
    .td-date-main{font-size:.88rem;font-weight:600;color:rgba(255,255,255,.8);}
    .td-date-sub{font-size:.65rem;font-weight:600;color:rgba(255,255,255,.25);text-transform:uppercase;letter-spacing:1px;margin-top:2px;}
    .td-title{font-size:.92rem;font-weight:600;color:rgba(255,255,255,.85);}
    .td-subtitle{font-size:.75rem;color:rgba(255,255,255,.25);margin-top:3px;}
    .badge-amber{background:rgba(184,141,77,0.1);color:#b88d4d;border:1px solid rgba(184,141,77,0.2);padding:3px 10px;border-radius:100px;font-size:.6rem;font-weight:800;text-transform:uppercase;letter-spacing:1.5px;}
    .badge-blue{background:rgba(59,130,246,0.1);color:#3b82f6;border:1px solid rgba(59,130,246,0.2);padding:3px 10px;border-radius:100px;font-size:.6rem;font-weight:800;text-transform:uppercase;letter-spacing:1.5px;}
    .badge-gray{background:rgba(255,255,255,0.05);color:rgba(255,255,255,0.3);border:1px solid rgba(255,255,255,0.08);padding:3px 10px;border-radius:100px;font-size:.6rem;font-weight:800;text-transform:uppercase;letter-spacing:1.5px;}
    .btn-icon{width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;background:transparent;border:1px solid transparent;cursor:pointer;transition:all .15s;color:rgba(255,255,255,.4);text-decoration:none;}
    .btn-icon:hover{background:rgba(255,255,255,0.06);border-color:rgba(255,255,255,0.1);color:#fff;}
    .empty-state{padding:80px 24px;text-align:center;color:rgba(255,255,255,.2);font-size:.9rem;}
</style>

<div style="max-width:1200px;">
    <div class="page-header">
        <div>
            <div class="page-eyebrow">Enterprise Connections</div>
            <h1 class="page-title">Lead Intelligence</h1>
        </div>
    </div>

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Timestamp</th>
                    <th>Identity</th>
                    <th>Pointer</th>
                    <th>Status</th>
                    <th style="text-align:right;">View</th>
                </tr>
            </thead>
            <tbody>
                @forelse($leads as $lead)
                <tr>
                    <td>
                        <div class="td-date-main">{{ \Carbon\Carbon::parse($lead->created_at)->format('M j, Y') }}</div>
                        <div class="td-date-sub">{{ \Carbon\Carbon::parse($lead->created_at)->format('H:i') }}</div>
                    </td>
                    <td>
                        <div class="td-title">{{ $lead->name }}</div>
                        <div class="td-subtitle">{{ $lead->email }}</div>
                    </td>
                    <td>
                        <div style="font-family:monospace; font-size:0.8rem; color:rgba(255,255,255,0.5);">{{ $lead->phone }}</div>
                    </td>
                    <td>
                        @if($lead->status === 'new')
                            <span class="badge-amber">Awaiting Analysis</span>
                        @elseif($lead->status === 'contacted')
                            <span class="badge-blue">Active Dialogue</span>
                        @else
                            <span class="badge-gray">Archived</span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex; justify-content:flex-end;">
                            <a href="{{ route('admin.leads.show', $lead->id) }}" class="btn-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="empty-state">No incoming transmissions detected.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
