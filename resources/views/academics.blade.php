@extends('layouts.app')

@section('title', 'Academics - KUET')
@section('page_title', 'Academics & Faculties')

@section('content')
<style>
    .academics-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px;
        font-family: 'Inter', system-ui, sans-serif;
    }

    .faculty-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 30px;
    }

    .faculty-card-link {
        text-decoration: none;
        display: block;
    }

    .faculty-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 40px 30px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(226, 232, 240, 0.8);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .faculty-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 6px;
        background: linear-gradient(90deg, #2563eb, #8b5cf6);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.4s ease;
    }

    .faculty-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
        border-color: rgba(37, 99, 235, 0.2);
    }

    .faculty-card:hover::before {
        transform: scaleX(1);
    }

    .faculty-title {
        font-size: 1.35rem;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 10px;
        line-height: 1.4;
    }

    .faculty-subtitle {
        color: #64748b;
        font-size: 0.95rem;
        margin-top: auto;
        display: flex;
        align-items: center;
        transition: color 0.3s;
    }

    .faculty-card:hover .faculty-subtitle {
        color: #2563eb;
    }

    .faculty-subtitle::after {
        content: '→';
        margin-left: 8px;
        transition: transform 0.3s;
    }

    .faculty-card:hover .faculty-subtitle::after {
        transform: translateX(5px);
    }

    .faculty-icon {
        font-size: 2.5rem;
        background: linear-gradient(135deg, #f0fdf4, #dcfce7);
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 18px;
        margin-bottom: 24px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.03);
    }
    
    .card-1 .faculty-icon { background: linear-gradient(135deg, #eff6ff, #dbeafe); }
    .card-2 .faculty-icon { background: linear-gradient(135deg, #faf5ff, #f3e8ff); }
    .card-3 .faculty-icon { background: linear-gradient(135deg, #fffbeb, #fef3c7); }
    .card-4 .faculty-icon { background: linear-gradient(135deg, #fdf2f8, #fbcfe8); }
    .card-5 .faculty-icon { background: linear-gradient(135deg, #f0fdfa, #ccfbf1); }

    .section-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .section-header h2 {
        font-size: 2.8rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 16px;
        letter-spacing: -0.02em;
    }

    .section-header p {
        color: #64748b;
        font-size: 1.15rem;
        max-width: 650px;
        margin: 0 auto;
        line-height: 1.6;
    }
</style>

<div class="academics-container">
    <div class="section-header">
        <h2>Our Faculties</h2>
        <p>Explore the diverse academic programs and specialized departments offered at KUET, designed to foster innovation and excellence.</p>
    </div>

    <div class="faculty-grid">
        <!-- Faculty of Civil Engineering -->
        <a href="{{ url('/academics/civil-engineering') }}" class="faculty-card-link">
            <div class="faculty-card card-1">
                <div class="faculty-icon">🏗️</div>
                <h3 class="faculty-title">Faculty of Civil Engineering</h3>
                <div class="faculty-subtitle">View Departments</div>
            </div>
        </a>

        <!-- Faculty of Science and Humanities -->
        <a href="{{ url('/academics/science-and-humanities') }}" class="faculty-card-link">
            <div class="faculty-card card-2">
                <div class="faculty-icon">⚛️</div>
                <h3 class="faculty-title">Faculty of Science and Humanities</h3>
                <div class="faculty-subtitle">View Departments</div>
            </div>
        </a>

        <!-- Faculty of Electrical and Electronic Engineering -->
        <a href="{{ url('/academics/eee') }}" class="faculty-card-link">
            <div class="faculty-card card-3">
                <div class="faculty-icon">⚡</div>
                <h3 class="faculty-title">Faculty of Electrical and Electronic Engineering</h3>
                <div class="faculty-subtitle">View Departments</div>
            </div>
        </a>

        <!-- Faculty of Mechanical Engineering -->
        <a href="{{ url('/academics/mechanical-engineering') }}" class="faculty-card-link">
            <div class="faculty-card card-4">
                <div class="faculty-icon">⚙️</div>
                <h3 class="faculty-title">Faculty of Mechanical Engineering</h3>
                <div class="faculty-subtitle">View Departments</div>
            </div>
        </a>

    </div>

    <!-- Central Library Section -->
    <div class="section-header" style="margin-top: 80px;">
        <h2>Central Library</h2>
        <p>Access our vast collection of physical and digital resources to support your academic and research endeavors.</p>
    </div>
    
    <div class="faculty-grid">
        <a href="{{ url('https://library.kuet.ac.bd/') }}" class="faculty-card-link">
            <div class="faculty-card card-5">
                <div class="faculty-icon">📚</div>
                <h3 class="faculty-title">Central Library</h3>
                <div class="faculty-subtitle">Explore Resources</div>
            </div>
        </a>
    </div>
</div>
@endsection
