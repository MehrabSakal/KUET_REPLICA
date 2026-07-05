@extends('admin.layout')

@section('title', 'Manage Lost & Found Items')

@section('content')

<style>
    .admin-panel-container {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        padding: 24px;
    }
    .panel-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
    }
    .panel-title {
        font-size: 20px;
        font-weight: bold;
        color: #333;
    }
    .table-responsive {
        overflow-x: auto;
    }
    .data-table {
        width: 100%;
        text-align: left;
        border-collapse: collapse;
    }
    .data-table th {
        padding: 12px 16px;
        background-color: #f8f9fa;
        color: #555;
        text-transform: uppercase;
        font-size: 14px;
        border-bottom: 2px solid #ddd;
    }
    .data-table td {
        padding: 12px 16px;
        border-bottom: 1px solid #eee;
        color: #444;
        font-size: 14px;
    }
    .data-table tbody tr:hover {
        background-color: #fdfdfd;
    }
    .row-resolved {
        background-color: #f0fdf4 !important;
    }
    .badge {
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: bold;
        text-transform: uppercase;
    }
    .badge-lost {
        background-color: #fee2e2;
        color: #b91c1c;
    }
    .badge-found {
        background-color: #dbeafe;
        color: #1d4ed8;
    }
    .badge-resolved {
        background-color: #dcfce7;
        color: #15803d;
        border: 1px solid #bbf7d0;
    }
    .badge-active {
        background-color: #fef3c7;
        color: #b45309;
        border: 1px solid #fde68a;
    }
    .action-buttons {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
    }
    .btn-icon-edit {
        color: #3b82f6;
        text-decoration: none;
    }
    .btn-icon-edit:hover {
        color: #2563eb;
    }
    .btn-icon-delete {
        color: #ef4444;
        background: none;
        border: none;
        cursor: pointer;
        padding: 0;
    }
    .btn-icon-delete:hover {
        color: #dc2626;
    }
    .icon-svg {
        width: 20px;
        height: 20px;
    }
    .empty-state {
        text-align: center;
        padding: 24px;
        color: #888;
    }
</style>

<div class="admin-panel-container">
    <div class="panel-header">
        <h2 class="panel-title">Lost & Found Entries</h2>
    </div>

    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Date Reported</th>
                    <th style="text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                <tr class="{{ $item->status == 'resolved' ? 'row-resolved' : '' }}">
                    <td>
                        <span class="badge {{ $item->type == 'lost' ? 'badge-lost' : 'badge-found' }}">
                            {{ $item->type }}
                        </span>
                    </td>
                    <td style="font-weight: 600;">{{ $item->title }}</td>
                    <td>
                        @if($item->status == 'resolved')
                            <span class="badge badge-resolved">
                                Resolved / Claimed
                            </span>
                        @else
                            <span class="badge badge-active">
                                Active
                            </span>
                        @endif
                    </td>
                    <td>
                        {{ $item->created_at->format('M d, Y h:i A') }}
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.lost-and-found.edit', $item->id) }}" class="btn-icon-edit" title="Edit">
                                <svg class="icon-svg" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <form action="{{ route('admin.lost-and-found.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete this post?');" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-icon-delete" title="Delete">
                                    <svg class="icon-svg" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="empty-state">No lost and found items to display.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
