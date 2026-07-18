@extends('layouts.app')

@section('title', $faculty->name . ' - Faculty Details')
@section('page_title', 'Faculty Details')

@section('content')
<div class="faculty-details-container">
    <div class="back-link-container">
        <a href="{{ route('faculty.index') }}" class="back-link">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to all faculty
        </a>
    </div>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <div class="faculty-profile-card">
        <div class="faculty-profile-sidebar">
            <div class="faculty-profile-avatar">
                @if($faculty->image)
                    <img src="{{ $faculty->image_url }}" alt="{{ $faculty->name }}" class="faculty-profile-image">
                @else
                    <span class="faculty-profile-placeholder">👤</span>
                @endif
            </div>
            <h2 class="faculty-profile-name">{{ $faculty->name }}</h2>
            <p class="faculty-profile-designation">{{ $faculty->designation }}</p>
            <p class="faculty-profile-department">{{ $faculty->department }}</p>
        </div>
        
        <div class="faculty-profile-content">
            <div class="faculty-info-section">
                <h3 class="faculty-section-title">Research Interests</h3>
                <p class="faculty-section-text">
                    {{ $faculty->research_interest ?: 'No research interests specified.' }}
                </p>
            </div>
            
            <div class="faculty-info-section">
                <h3 class="faculty-section-title">Published Papers</h3>
                <p class="faculty-section-text whitespace-pre-line">
                    {{ $faculty->published_papers ?: 'No published papers specified.' }}
                </p>
            </div>
        </div>
    </div>

    <!-- Research Request Form -->
    <div class="research-request-card">
        <div class="research-request-header">
            <h3 class="research-request-title">Request Research Assistance</h3>
            <p class="research-request-subtitle">Fill out the form below to request research guidance from {{ $faculty->name }}.</p>
        </div>

        @if($errors->any())
            <div class="error-message">
                <ul class="error-list">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('faculty.research-request', $faculty->id) }}" method="POST" class="research-form">
            @csrf
            
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Your Full Name</label>
                    <input type="text" name="student_name" required value="{{ old('student_name') }}" class="form-input">
                </div>
                <div class="form-group">
                    <label class="form-label">Your Email Address</label>
                    <input type="email" name="student_email" required value="{{ old('student_email') }}" class="form-input">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Student ID (Optional)</label>
                <input type="text" name="student_id" value="{{ old('student_id') }}" class="form-input">
            </div>

            <div class="form-group">
                <label class="form-label">Message / Research Proposal</label>
                <textarea name="message" required rows="5" placeholder="Briefly describe what kind of research assistance you are looking for..." class="form-textarea">{{ old('message') }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="submit-btn">
                    Submit Request
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
