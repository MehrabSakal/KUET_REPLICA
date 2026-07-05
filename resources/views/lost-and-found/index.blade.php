@extends('layouts.app')

@section('title', 'Lost and Found - KUET')
@section('page_title', 'Lost and Found Portal')

@section('content')

<style>
    .portal-container {
        max-width: 1100px;
        margin: 0 auto;
        padding: 30px 15px;
    }
    .portal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }
    .portal-title {
        font-size: 28px;
        font-weight: bold;
        color: #333;
        margin: 0;
    }
    .portal-subtitle {
        color: #666;
        margin-top: 8px;
        font-size: 16px;
    }
    .btn-report {
        display: inline-flex;
        align-items: center;
        padding: 12px 24px;
        background-color: #b91c1c;
        color: white;
        font-weight: bold;
        text-decoration: none;
        border-radius: 6px;
        transition: transform 0.2s, background-color 0.2s;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .btn-report:hover {
        background-color: #991b1b;
        transform: translateY(-2px);
    }
    .btn-report svg {
        width: 20px;
        height: 20px;
        margin-right: 8px;
    }
    .alert-success {
        background-color: #dcfce7;
        border-left: 4px solid #22c55e;
        color: #15803d;
        padding: 16px;
        margin-bottom: 24px;
        border-radius: 4px;
    }
    .tabs-container {
        display: flex;
        border-bottom: 1px solid #ddd;
        margin-bottom: 30px;
    }
    .tab-link {
        padding: 12px 20px;
        font-size: 18px;
        font-weight: 600;
        text-decoration: none;
        color: #666;
        transition: color 0.2s;
    }
    .tab-link:hover {
        color: #333;
    }
    .tab-active-lost {
        color: #b91c1c;
        border-bottom: 2px solid #b91c1c;
    }
    .tab-active-found {
        color: #15803d;
        border-bottom: 2px solid #15803d;
    }
    .items-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 30px;
    }
    @media (min-width: 768px) {
        .items-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (min-width: 1024px) {
        .items-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    .item-card {
        background-color: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        border: 1px solid #eee;
        transition: box-shadow 0.3s;
    }
    .item-card:hover {
        box-shadow: 0 10px 15px rgba(0,0,0,0.1);
    }
    .item-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .item-image-placeholder {
        width: 100%;
        height: 200px;
        background-color: #f3f4f6;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #9ca3af;
    }
    .item-content {
        padding: 24px;
    }
    .item-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 10px;
    }
    .item-title {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin: 0;
    }
    .item-badge {
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: bold;
        text-transform: uppercase;
    }
    .badge-lost {
        background-color: #fee2e2;
        color: #b91c1c;
    }
    .badge-found {
        background-color: #dcfce7;
        color: #15803d;
    }
    .item-description {
        color: #555;
        font-size: 14px;
        line-height: 1.5;
        margin-bottom: 16px;
        height: 42px;
        overflow: hidden;
    }
    .item-meta {
        font-size: 14px;
        color: #666;
        margin-bottom: 16px;
    }
    .meta-row {
        display: flex;
        align-items: center;
        margin-bottom: 8px;
    }
    .meta-row svg {
        width: 16px;
        height: 16px;
        margin-right: 8px;
    }
    .item-contact {
        padding-top: 16px;
        border-top: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .contact-label {
        font-size: 12px;
        color: #888;
    }
    .contact-info {
        font-size: 14px;
        font-weight: 600;
        color: #333;
    }
    .resolve-form {
        margin-top: 16px;
        padding-top: 16px;
        border-top: 1px solid #eee;
    }
    .btn-resolve {
        width: 100%;
        padding: 10px;
        background-color: #2563eb;
        color: white;
        font-weight: bold;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.2s;
    }
    .btn-resolve:hover {
        background-color: #1d4ed8;
    }
    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 40px;
        background-color: #f9fafb;
        border: 1px dashed #d1d5db;
        border-radius: 12px;
        color: #6b7280;
    }
    .empty-state svg {
        width: 48px;
        height: 48px;
        margin: 0 auto 16px;
        color: #9ca3af;
    }
</style>

<div class="portal-container">
    
    <div class="portal-header">
        <div>
            <h2 class="portal-title">Community Lost & Found</h2>
            <p class="portal-subtitle">Help reunite lost items with their owners.</p>
        </div>
        <a href="{{ route('lost-and-found.create') }}" class="btn-report">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Report an Item
        </a>
    </div>

    @if(session('success'))
        <div class="alert-success">
            <p style="margin: 0;">{{ session('success') }}</p>
        </div>
    @endif

    <div class="tabs-container">
        <a href="{{ route('lost-and-found.index', ['type' => 'lost']) }}" class="tab-link {{ $type == 'lost' ? 'tab-active-lost' : '' }}">
            Lost Items
        </a>
        <a href="{{ route('lost-and-found.index', ['type' => 'found']) }}" class="tab-link {{ $type == 'found' ? 'tab-active-found' : '' }}">
            Found Items
        </a>
    </div>

    <div class="items-grid">
        @forelse($items as $item)
            <div class="item-card">
                @if($item->image_path)
                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}" class="item-image">
                @else
                    <div class="item-image-placeholder">
                        <svg style="width: 64px; height: 64px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                @endif
                
                <div class="item-content">
                    <div class="item-header">
                        <h3 class="item-title">{{ $item->title }}</h3>
                        <span class="item-badge {{ $item->type == 'lost' ? 'badge-lost' : 'badge-found' }}">
                            {{ $item->type }}
                        </span>
                    </div>
                    
                    <p class="item-description">{{ $item->description }}</p>
                    
                    <div class="item-meta">
                        <div class="meta-row">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            {{ $item->location }}
                        </div>
                        <div class="meta-row">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ \Carbon\Carbon::parse($item->date)->format('M d, Y') }}
                        </div>
                    </div>
                    
                    <div class="item-contact">
                        <span class="contact-label">Contact:</span>
                        <span class="contact-info">{{ $item->contact_info }}</span>
                    </div>

                    <form action="{{ route('lost-and-found.resolve', $item->id) }}" method="POST" class="resolve-form">
                        @csrf
                        <button type="submit" class="btn-resolve" onclick="return confirm('Mark this item as resolved/claimed? It will be removed from the public feed.')">
                            {{ $item->type == 'lost' ? 'Found / Claimed' : 'Returned to Owner' }}
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                <p style="font-size: 18px; margin: 0;">No {{ $type }} items reported yet.</p>
            </div>
        @endforelse
    </div>

</div>
@endsection
