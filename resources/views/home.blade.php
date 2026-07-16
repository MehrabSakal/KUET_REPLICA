@extends('layouts.app')

@section('title', 'KUET - Khulna University of Engineering & Technology')
@section('page_title', 'Welcome to KUET')

@section('content')

<style>
    /* Custom CSS with human-readable class names */
    .hero-slider-section {
        width: 100%;
        margin-bottom: 20px;
    }
    .hero-image {
        width: 100%;
        height: auto;
        object-fit: cover;
    }
    
    .latest-news-ticker {
        display: flex;
        background-color: #f8f9fa;
        border-left: 5px solid #d32f2f;
        padding: 10px;
        margin-bottom: 30px;
        align-items: center;
    }
    .ticker-title {
        font-weight: bold;
        margin-right: 15px;
        color: #d32f2f;
        white-space: nowrap;
    }
    .ticker-content {
        flex-grow: 1;
        overflow: hidden;
    }
    .ticker-content marquee {
        font-size: 15px;
    }
    .ticker-item {
        margin-right: 30px;
        text-decoration: none;
        color: #333;
    }
    .ticker-date {
        color: #d32f2f;
        font-weight: bold;
        margin-right: 5px;
    }
    
    .excellence-section {
        display: flex;
        align-items: center;
        background-color: #f1f1f1;
        padding: 40px;
        margin-bottom: 30px;
        border-radius: 8px;
    }
    .excellence-image {
        flex: 1;
        padding: 20px;
    }
    .excellence-image img {
        width: 100%;
        max-width: 300px;
    }
    .excellence-text {
        flex: 2;
        font-size: 24px;
        color: #333;
        font-weight: bold;
        text-align: center;
    }
    
    .about-kuet-section {
        padding: 20px;
        margin-bottom: 40px;
    }
    .section-title {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 20px;
        border-bottom: 2px solid #d32f2f;
        display: inline-block;
        padding-bottom: 5px;
    }
    .about-text {
        font-size: 16px;
        line-height: 1.6;
        color: #444;
        margin-bottom: 15px;
        text-align: justify;
    }
    .read-more-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #d32f2f;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
    }
    
    .content-grid {
        display: flex;
        gap: 30px;
        margin-bottom: 40px;
    }
    
    .news-section {
        flex: 2;
    }
    .news-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    .news-card {
        border: 1px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
        transition: transform 0.3s;
        background-color: #fff;
    }
    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .news-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .news-details {
        padding: 15px;
    }
    .news-date {
        color: #888;
        font-size: 14px;
        margin-bottom: 10px;
        display: block;
    }
    .news-title {
        font-size: 16px;
        font-weight: bold;
        color: #333;
        text-decoration: none;
    }
    
    .notices-section {
        flex: 1;
    }
    .notice-tabs {
        display: flex;
        margin-bottom: 15px;
    }
    .notice-tab {
        flex: 1;
        text-align: center;
        padding: 10px;
        background-color: #eee;
        cursor: pointer;
        font-weight: bold;
        border: 1px solid #ccc;
    }
    .notice-tab.active {
        background-color: #d32f2f;
        color: white;
        border-color: #d32f2f;
    }
    .notice-list {
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 0 0 5px 5px;
        height: 350px;
        overflow-y: hidden;
        background-color: #fff;
    }
    .notice-item {
        display: flex;
        margin-bottom: 15px;
        border-bottom: 1px solid #eee;
        padding-bottom: 15px;
    }
    .notice-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    .notice-calendar {
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        border-radius: 5px;
        text-align: center;
        width: 50px;
        height: 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-right: 15px;
    }
    .notice-month {
        font-size: 12px;
        color: #666;
        text-transform: uppercase;
    }
    .notice-day {
        font-size: 18px;
        font-weight: bold;
        color: #d32f2f;
    }
    .notice-text {
        font-size: 14px;
        color: #333;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .excellence-section {
            flex-direction: column;
        }
        .content-grid {
            flex-direction: column;
        }
        .news-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- 1. Hero Slider Section -->
<div class="hero-slider-section">
    <img class="hero-image" src="{{ asset('images/about_kuet.jpg') }}" alt="KUET Campus View">
</div>

<!-- 2. Latest News Ticker Section -->
<div class="latest-news-ticker">
    <div class="ticker-title">Latest Info</div>
    <div class="ticker-content">
        <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="5">
            <a href="#" class="ticker-item">
                <span class="ticker-date">24-Jun-2026</span>
                Orientation Programme of First Year B.Sc. Engineering, B.URP and B.Arch Student
            </a>
            <a href="#" class="ticker-item">
                <span class="ticker-date">22-Jun-2026</span>
                PG Admission Result of July 2026 for all Departments
            </a>
            <a href="#" class="ticker-item">
                <span class="ticker-date">02-Jun-2026</span>
                UG Admission Test 2025-2026: 5th Call
            </a>
        </marquee>
    </div>
</div>

<!-- 3. Excellence Section -->
<div class="excellence-section">
    <div class="excellence-image">
        <img src="https://kuet.ac.bd/images/logo/50_years.png" alt="50 Years of Excellence">
    </div>
    <div class="excellence-text">
        in EDUCATION, RESEARCH, and INNOVATION
    </div>
</div>

<!-- 4. About KUET Section -->
<div class="about-kuet-section">
    <h2 class="section-title">KUET at a Glance</h2>
    <p class="about-text">
        Khulna University of Engineering & Technology has a background of historical significance. Although this institution has completed an era as university, its laying foundation began 56 years ago. This university was established in 1967 as 'Khulna Engineering College' under the University of Rajshahi. But during the period of liberation war the development activities of the Erstwhile Engineering College was suspended.
    </p>
    <a href="#" class="read-more-button">Explore here</a>
</div>



<!-- 5. Main Content Grid (News and Notices) -->
<div class="content-grid">
    
    <!-- What's Happening (News) Section -->
    <div class="news-section">
        <h2 class="section-title">What's Happening</h2>
        <div class="news-grid">
            
            <!-- News Card 1 -->
            <div class="news-card">
                <img class="news-image" src="https://kuet.ac.bd/images/webcontent//751.jpg" alt="News Image">
                <div class="news-details">
                    <span class="news-date">02-Jul-2026</span>
                    <a href="#" class="news-title">Prof. Dr. Mohammad Mashud has joined as Vice-Chancellor of KUET</a>
                </div>
            </div>
            
            <!-- News Card 2 -->
            <div class="news-card">
                <img class="news-image" src="https://kuet.ac.bd/storage/news/image/2025010815_2218_677e43ca3d8ad_Best Paper 2.jpg" alt="News Image">
                <div class="news-details">
                    <span class="news-date">02-Jul-2026</span>
                    <a href="#" class="news-title">Prof. Dr. Kazi Md. Rokibul Alam and Team Receive Best Paper Award at ICCIT 2024</a>
                </div>
            </div>
            
            <!-- News Card 3 -->
            <div class="news-card">
                <img class="news-image" src="https://kuet.ac.bd/storage/news/image/2025011912_0645_678c967565cc7_KUET_ কুয়েটে ন্যাশনাল আইডিয়া কেস কম্পিটিশন ‘বিজব্যাটেল’ অনুষ্ঠিত-18.01.2025 (1).jpg" alt="News Image">
                <div class="news-details">
                    <span class="news-date">02-Jul-2026</span>
                    <a href="#" class="news-title">"Walton Smart Fridge Presents BizBattle: Innovation In Tech"</a>
                </div>
            </div>
            
            <!-- News Card 4 -->
            <div class="news-card">
                <img class="news-image" src="https://kuet.ac.bd/storage/news/image/54005988430_513741a54c_o.jpg" alt="News Image">
                <div class="news-details">
                    <span class="news-date">02-Jul-2026</span>
                    <a href="#" class="news-title">KUET_Effervescent, First team of KUET to secure a place in ICPC World Finals</a>
                </div>
            </div>
            
        </div>
    </div>
    
    <!-- Notices Section -->
    <div class="notices-section">
        <h2 class="section-title">Notices</h2>
        
        <div class="notice-tabs">
            <div class="notice-tab active">Academic</div>
            <div class="notice-tab">Administrative</div>
        </div>
        
        <div class="notice-list">
            <marquee direction="up" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="3" height="100%">
                
                <!-- Notice 1 -->
                <div class="notice-item">
                    <div class="notice-calendar">
                        <span class="notice-month">Jun</span>
                        <span class="notice-day">24</span>
                    </div>
                    <div class="notice-text">
                        <a href="#" style="text-decoration: none; color: inherit;">Orientation Programme of First Year B.Sc. Engineering</a>
                    </div>
                </div>
                
                <!-- Notice 2 -->
                <div class="notice-item">
                    <div class="notice-calendar">
                        <span class="notice-month">Jun</span>
                        <span class="notice-day">22</span>
                    </div>
                    <div class="notice-text">
                        <a href="#" style="text-decoration: none; color: inherit;">PG Admission Result of July 2026 for all Departments</a>
                    </div>
                </div>
                
                <!-- Notice 3 -->
                <div class="notice-item">
                    <div class="notice-calendar">
                        <span class="notice-month">Jun</span>
                        <span class="notice-day">22</span>
                    </div>
                    <div class="notice-text">
                        <a href="#" style="text-decoration: none; color: inherit;">Admission Result- M.Sc. Result for IEPT July 2026</a>
                    </div>
                </div>
                
                <!-- Notice 4 -->
                <div class="notice-item">
                    <div class="notice-calendar">
                        <span class="notice-month">Jun</span>
                        <span class="notice-day">18</span>
                    </div>
                    <div class="notice-text">
                        <a href="#" style="text-decoration: none; color: inherit;">Revised Academic Calendar for 2026</a>
                    </div>
                </div>
                
            </marquee>
        </div>
    </div>
    
</div>

<!-- 6. Location Map Section -->
<div class="location-section" style="margin-top: 50px; margin-bottom: 20px;">
    <h2 class="section-title" style="margin-bottom: 25px;">Find Us on Campus</h2>
    <div id="kuet-map" style="width: 100%; height: 450px; border-radius: 12px; border: 1px solid #e2e8f0; z-index: 1; box-shadow: 0 10px 30px rgba(0,0,0,0.05);"></div>
</div>

<!-- Leaflet Location API dependencies -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize the Leaflet map API, centered on KUET coordinates
        var map = L.map('kuet-map').setView([22.900, 89.502], 16);

        // Load the OpenStreetMap tiles
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add a beautiful marker for the university
        var marker = L.marker([22.900, 89.502]).addTo(map);
        marker.bindPopup("<div style='text-align:center;'><b>KUET Campus</b><br>Khulna University of Engineering & Technology<br>Fulbarigate, Khulna 9203</div>").openPopup();
    });
</script>

@endsection
