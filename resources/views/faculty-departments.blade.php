@extends('layouts.app')

@section('title', $facultyData['name'] . ' - KUET')
@section('page_title', $facultyData['name'])

@section('content')
<style>
    .departments-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px;
        font-family: 'Inter', system-ui, sans-serif;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        color: #64748b;
        text-decoration: none;
        font-weight: 600;
        margin-bottom: 30px;
        transition: color 0.3s, transform 0.3s;
    }

    .back-link:hover {
        color: #2563eb;
        transform: translateX(-5px);
    }

    .back-link::before {
        content: '←';
        margin-right: 8px;
        font-size: 1.2rem;
    }

    .dept-header {
        display: flex;
        align-items: center;
        margin-bottom: 50px;
        padding-bottom: 30px;
        border-bottom: 1px solid #e2e8f0;
    }

    .dept-header-icon {
        font-size: 3rem;
        background: linear-gradient(135deg, #eff6ff, #dbeafe);
        width: 80px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 20px;
        margin-right: 24px;
        box-shadow: 0 4px 15px rgba(37, 99, 235, 0.1);
    }

    .dept-header-title h2 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 8px 0;
    }

    .dept-header-title p {
        color: #64748b;
        font-size: 1.1rem;
        margin: 0;
    }

    .dept-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
    }

    .dept-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 30px 25px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
        border: 1px solid #f1f5f9;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
    }

    .dept-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.06);
        border-color: #cbd5e1;
    }

    .dept-bullet {
        width: 12px;
        height: 12px;
        background: #2563eb;
        border-radius: 50%;
        margin-right: 15px;
        flex-shrink: 0;
    }

    .dept-name {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1e293b;
        line-height: 1.4;
    }
</style>

<div class="departments-container">
    <a href="{{ url('/academics') }}" class="back-link">Back to Faculties</a>

    <div class="dept-header">
        <div class="dept-header-icon">
            {{ $facultyData['icon'] }}
        </div>
        <div class="dept-header-title">
            <h2>{{ $facultyData['name'] }}</h2>
            <p>Explore the departments and offices under this faculty</p>
        </div>
    </div>

    <div class="dept-grid">
        @foreach($facultyData['departments'] as $department)
            <div class="dept-card">
                <div class="dept-bullet"></div>
                <div class="dept-name">{{ $department }}</div>
            </div>
        @endforeach
    </div>
</div>
@endsection
