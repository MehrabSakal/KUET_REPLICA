@extends('layouts.app')

@section('title', 'Events - KUET')
@section('page_title', 'Campus Events')

@section('content')

<style>
    .events-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px;
    }
    .events-header {
        text-align: center;
        margin-bottom: 48px;
    }
    .events-title {
        font-size: 32px;
        font-weight: bold;
        color: #333;
        margin-bottom: 16px;
    }
    .events-subtitle {
        color: #666;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.6;
    }
    .filter-buttons {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 16px;
        margin-bottom: 40px;
    }
    .btn-filter {
        padding: 8px 24px;
        background-color: #fff;
        color: #555;
        font-weight: 600;
        border: 1px solid #ddd;
        border-radius: 30px;
        cursor: pointer;
        transition: all 0.2s;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    .btn-filter:hover {
        background-color: #f9f9f9;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .btn-filter.active {
        background-color: #b91c1c;
        color: white;
        border-color: #b91c1c;
    }
    .events-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 32px;
    }
    @media (min-width: 768px) {
        .events-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (min-width: 1024px) {
        .events-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    .event-card {
        background-color: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        border: 1px solid #eee;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .event-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 20px rgba(0,0,0,0.15);
    }
    .event-cover {
        height: 190px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .cover-pattern {
        position: absolute;
        inset: 0;
        opacity: 0.2;
    }
    .cover-title {
        font-size: 28px;
        font-weight: 900;
        position: relative;
        z-index: 10;
        letter-spacing: 2px;
    }
    .club-badge {
        position: absolute;
        top: 16px;
        right: 16px;
        background-color: #fff;
        font-size: 11px;
        font-weight: bold;
        padding: 4px 12px;
        border-radius: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    .event-details {
        padding: 24px;
    }
    .event-meta {
        display: flex;
        align-items: center;
        color: #777;
        font-size: 14px;
        margin-bottom: 12px;
    }
    .event-meta svg {
        width: 16px;
        height: 16px;
        margin-right: 8px;
    }
    .event-name {
        font-size: 18px;
        font-weight: bold;
        color: #222;
        margin: 0 0 12px 0;
    }
    .event-desc {
        color: #555;
        font-size: 14px;
        line-height: 1.5;
        margin-bottom: 20px;
        height: 42px;
        overflow: hidden;
    }
    .btn-action {
        display: block;
        width: 100%;
        text-align: center;
        padding: 10px;
        font-weight: 600;
        border-radius: 8px;
        text-decoration: none;
        transition: background-color 0.2s, color 0.2s;
    }
    
    /* Specific Card Themes */
    .theme-blue .event-cover { background-color: #2563eb; }
    .theme-blue .cover-title { color: #fff; }
    .theme-blue .club-badge { color: #1d4ed8; }
    .theme-blue .btn-action {
        background-color: #eff6ff;
        color: #1d4ed8;
        border: 1px solid #bfdbfe;
    }
    .theme-blue .btn-action:hover {
        background-color: #2563eb;
        color: #fff;
    }
    
    .theme-green .event-cover { background-color: #111827; }
    .theme-green .cover-title { color: #4ade80; }
    .theme-green .club-badge { background-color: #22c55e; color: #fff; }
    .theme-green .btn-action {
        background-color: #f9fafb;
        color: #1f2937;
        border: 1px solid #d1d5db;
    }
    .theme-green .btn-action:hover {
        background-color: #111827;
        color: #fff;
    }

    .theme-yellow .event-cover { background-color: #eab308; }
    .theme-yellow .cover-title { color: #111827; }
    .theme-yellow .club-badge { background-color: #111827; color: #facc15; }
    .theme-yellow .btn-action {
        background-color: #fefce8;
        color: #a16207;
        border: 1px solid #fef08a;
    }
    .theme-yellow .btn-action:hover {
        background-color: #eab308;
        color: #111827;
    }

    .theme-emerald .event-cover { background-color: #059669; }
    .theme-emerald .cover-title { color: #fff; }
    .theme-emerald .club-badge { color: #047857; }
    .theme-emerald .btn-action {
        background-color: #ecfdf5;
        color: #047857;
        border: 1px solid #a7f3d0;
    }
    .theme-emerald .btn-action:hover {
        background-color: #059669;
        color: #fff;
    }

    .theme-purple .event-cover { background-color: #9333ea; }
    .theme-purple .cover-title { color: #fff; }
    .theme-purple .club-badge { color: #7e22ce; }
    .theme-purple .btn-action {
        background-color: #faf5ff;
        color: #7e22ce;
        border: 1px solid #e9d5ff;
    }
    .theme-purple .btn-action:hover {
        background-color: #9333ea;
        color: #fff;
    }
</style>

<div class="events-container">
    <div class="events-header">
        <h2 class="events-title">Upcoming Events & Activities</h2>
        <p class="events-subtitle">Stay updated with the latest events organized by various prestigious clubs of Khulna University of Engineering & Technology.</p>
    </div>

    <!-- Filter/Tabs -->
    <div class="filter-buttons">
        <button class="btn-filter active">All Events</button>
        <button class="btn-filter">SGIPC</button>
        <button class="btn-filter">Hack</button>
        <button class="btn-filter">KBEC</button>
        <button class="btn-filter">KAC</button>
    </div>

    <div class="events-grid">
        
        <!-- Event Card 1 - SGIPC -->
        <div class="event-card theme-blue">
            <div class="event-cover">
                <div class="cover-pattern" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCI+CjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0ibm9uZSI+PC9yZWN0Pgo8Y2lyY2xlIGN4PSIyIiBjeT0iMiIgcj0iMiIgZmlsbD0iI2ZmZiI+PC9jaXJjbGU+Cjwvc3ZnPg==');"></div>
                <h3 class="cover-title">CODESTORM</h3>
                <span class="club-badge">SGIPC</span>
            </div>
            <div class="event-details">
                <div class="event-meta">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span>Oct 12, 2026 • 09:00 AM</span>
                </div>
                <h4 class="event-name">Inter-University Programming Contest</h4>
                <p class="event-desc">Join the biggest competitive programming battle hosted by SGIPC. Test your algorithmic skills and win exciting prizes!</p>
                <div class="event-meta">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Student Welfare Center (SWC)
                </div>
                <a href="#" class="btn-action">Register Now</a>
            </div>
        </div>

        <!-- Event Card 2 - Hack -->
        <div class="event-card theme-green">
            <div class="event-cover">
                <div class="cover-pattern" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCI+PHBhdGggZD0iTTAgMGg0MHY0MEgweiIgZmlsbD0ibm9uZSIvPjxwYXRoIGQ9Ik0wIDEwaDQwTTAgMjBoNDBNMCAzMGg0ME0xMCAwdjQwTTIwIDB2NDBNMzAgMHY0MCIgc3Ryb2tlPSIjZmZmIiBzdHJva2Utb3BhY2l0eT0iLjEiLz48L3N2Zz4='); opacity: 0.3;"></div>
                <h3 class="cover-title">ROBOTICS FEST</h3>
                <span class="club-badge">HACK</span>
            </div>
            <div class="event-details">
                <div class="event-meta">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span>Nov 05, 2026 • 10:00 AM</span>
                </div>
                <h4 class="event-name">National Hardware Hackathon</h4>
                <p class="event-desc">Build innovative hardware solutions in 48 hours. Show your passion for IoT, robotics, and embedded systems.</p>
                <div class="event-meta">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    EEE Building, Ground Floor
                </div>
                <a href="#" class="btn-action">View Details</a>
            </div>
        </div>

        <!-- Event Card 3 - KBEC -->
        <div class="event-card theme-yellow">
            <div class="event-cover">
                <div class="cover-pattern" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMCIgaGVpZ2h0PSIxMCI+CjxyZWN0IHdpZHRoPSIxMCIgaGVpZ2h0PSIxMCIgZmlsbD0ibm9uZSI+PC9yZWN0Pgo8cGF0aCBkPSJNMCAwbDEwIDEwTTEwIDBMMCAxMCIgc3Ryb2tlPSIjMDAwIi8+Cjwvc3ZnPg==');"></div>
                <h3 class="cover-title">BIZ SUMMIT</h3>
                <span class="club-badge">KBEC</span>
            </div>
            <div class="event-details">
                <div class="event-meta">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span>Dec 10, 2026 • 03:00 PM</span>
                </div>
                <h4 class="event-name">Business Idea Competition</h4>
                <p class="event-desc">Pitch your groundbreaking startup ideas to industry leaders. Learn, network, and grow with the KBEC community.</p>
                <div class="event-meta">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Auditorium, KUET
                </div>
                <a href="#" class="btn-action">Submit Idea</a>
            </div>
        </div>

        <!-- Event Card 4 - KAC -->
        <div class="event-card theme-emerald">
            <div class="event-cover">
                <div class="cover-pattern" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCI+PHBhdGggZD0iTTAgMjBsMjAtMjBMMDAgMEwwIDIweiIgZmlsbD0iI2ZmZiIvPjwvc3ZnPg==');"></div>
                <h3 class="cover-title">EXPEDITION</h3>
                <span class="club-badge">KAC</span>
            </div>
            <div class="event-details">
                <div class="event-meta">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span>Jan 15, 2027 • 06:00 AM</span>
                </div>
                <h4 class="event-name">Winter Trek to Sylhet</h4>
                <p class="event-desc">A thrilling 3-day adventure tour packed with trekking, camping, and nature exploration organized by KUET Adventure Club.</p>
                <div class="event-meta">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Sylhet, Bangladesh
                </div>
                <a href="#" class="btn-action">Join Tour</a>
            </div>
        </div>

        <!-- Event Card 5 - General -->
        <div class="event-card theme-purple">
            <div class="event-cover">
                <div class="cover-pattern" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCI+PHBhdGggZD0iTTEyIDBMNiA2djEybDYgNmwxMi0xMnYtNkwxMiAwem0wIDlsMyAzdjZsLTMgM2wtMy0zdi02bDMtM3ptMCA0bDItMnYtNGwtMi0ybC0yIDJ2NGwyIDJ6IiBmaWxsPSIjZmZmIi8+PC9zdmc+');"></div>
                <h3 class="cover-title">TECH FAIR</h3>
                <span class="club-badge">KUET</span>
            </div>
            <div class="event-details">
                <div class="event-meta">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span>Feb 20, 2027 • 09:00 AM</span>
                </div>
                <h4 class="event-name">Annual Tech Carnival</h4>
                <p class="event-desc">The grand tech festival featuring project showcases, gaming tournaments, and guest lectures from tech giants.</p>
                <div class="event-meta">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    KUET Central Field
                </div>
                <a href="#" class="btn-action">Explore</a>
            </div>
        </div>

    </div>
</div>

@endsection
