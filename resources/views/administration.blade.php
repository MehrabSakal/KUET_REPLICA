@extends('layouts.app')

@section('title', 'Administration - KUET')
@section('page_title', 'Administration')

@section('content')
<div class="admin-container">
    
    <!-- Section 1: Leadership -->
    <div class="admin-section">
        <div class="admin-section-header">
            <h2 class="admin-section-title">University Leadership</h2>
            <div class="admin-title-underline"></div>
            <p class="admin-section-description">The executive leadership guiding Khulna University of Engineering & Technology towards excellence in education and research.</p>
        </div>

        <div class="admin-leadership-grid">
            <!-- Vice-Chancellor -->
            <div class="admin-leader-card group">
                <div class="admin-leader-avatar">
                    <img src="{{ asset('images/vc.jpg') }}" alt="Dr. Mohammad Masud" class="admin-leader-img">
                </div>
                <h3 class="admin-leader-name">Dr. Mohammad Masud</h3>
                <p class="admin-leader-role">Vice-Chancellor</p>
                <p class="admin-leader-bio">Leading KUET with a vision for global standard engineering education and impactful research.</p>
                <a href="#" class="admin-leader-link">
                    View Profile <svg class="admin-link-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

            <!-- Pro-Vice-Chancellor -->
            <div class="admin-leader-card group">
                <div class="admin-leader-avatar">
                     <svg class="admin-leader-svg group-hover:text-blue-500 transition-colors" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                </div>
                <h3 class="admin-leader-name">Prof. Dr. Sobahan Mia</h3>
                <p class="admin-leader-role">Pro-Vice-Chancellor</p>
                <p class="admin-leader-bio">Ensuring academic excellence and overseeing the smooth operation of administrative tasks.</p>
                <a href="#" class="admin-leader-link">
                    View Profile <svg class="admin-link-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

            <!-- Registrar -->
            <div class="admin-leader-card group">
                <div class="admin-leader-avatar">
                     <svg class="admin-leader-svg group-hover:text-blue-500 transition-colors" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                </div>
                <h3 class="admin-leader-name">Engr. Md. Anisur Rahman Bhuiyan</h3>
                <p class="admin-leader-role">Registrar</p>
                <p class="admin-leader-bio">Managing the official records, correspondence, and core administrative workflows of the university.</p>
                <a href="#" class="admin-leader-link">
                    View Profile <svg class="admin-link-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Section 2: Key Offices -->
    <div class="admin-offices-wrapper">
        <div class="admin-section-header">
            <h2 class="admin-section-title">Administrative Offices</h2>
            <div class="admin-title-underline"></div>
        </div>

        <div class="admin-offices-grid">
            <!-- Office Card -->
            <a href="#" class="admin-office-card group">
                <h4 class="admin-office-title">Registrar's Office</h4>
                <p class="admin-office-desc">Handles academic records, admissions, and university policies.</p>
            </a>
            
            <!-- Office Card -->
            <a href="#" class="admin-office-card group">
                <h4 class="admin-office-title">Controller of Examinations</h4>
                <p class="admin-office-desc">Manages exams, result publications, and academic transcripts.</p>
            </a>

            <!-- Office Card -->
            <a href="#" class="admin-office-card group">
                <h4 class="admin-office-title">Directorate of Students' Welfare</h4>
                <p class="admin-office-desc">Oversees student activities, accommodations, and well-being.</p>
            </a>

            <!-- Office Card -->
            <a href="#" class="admin-office-card group">
                <h4 class="admin-office-title">Central Library</h4>
                <p class="admin-office-desc">Provides access to research materials, books, and digital resources.</p>
            </a>

            <!-- Office Card -->
            <a href="#" class="admin-office-card group">
                <h4 class="admin-office-title">Engineering Section</h4>
                <p class="admin-office-desc">Maintains campus infrastructure, facilities, and development projects.</p>
            </a>

            <!-- Office Card -->
            <a href="#" class="admin-office-card group">
                <h4 class="admin-office-title">Medical Center</h4>
                <p class="admin-office-desc">Provides healthcare and emergency medical services for students and staff.</p>
            </a>
        </div>
    </div>

    <!-- Section 3: Halls of Residence -->
    <div class="admin-offices-wrapper" style="margin-top: 5rem;">
        <div class="admin-section-header">
            <h2 class="admin-section-title">Halls of Residence</h2>
            <div class="admin-title-underline"></div>
            <p class="admin-section-description">Providing a comfortable, safe, and vibrant living environment for our students.</p>
        </div>

        <div class="admin-offices-grid">
            <!-- Fazlul Haque Hall -->
            <a href="#" class="admin-office-card group">
                <h4 class="admin-office-title">Fazlul Haque Hall</h4>
            </a>
            
            <!-- Begum Rokeya Hall -->
            <a href="#" class="admin-office-card group">
                <h4 class="admin-office-title">Begum Rokeya Hall</h4>
            </a>

            <!-- Khan Jahan Ali Hall -->
            <a href="#" class="admin-office-card group">
                <h4 class="admin-office-title">Khan Jahan Ali Hall</h4>
            </a>

            <!-- Shaheed Smriti Hall -->
            <a href="#" class="admin-office-card group">
                <h4 class="admin-office-title">Shaheed Smriti Hall</h4>
            </a>

            <!-- Dr. M. A. Rashid Hall -->
            <a href="#" class="admin-office-card group">
                <h4 class="admin-office-title">Dr. M. A. Rashid Hall</h4>
            </a>

            <!-- Lalon Shah Hall -->
            <a href="#" class="admin-office-card group">
                <h4 class="admin-office-title">Lalon Shah Hall</h4>
            </a>

            <!-- Amar Ekushey Hall -->
            <a href="#" class="admin-office-card group">
                <h4 class="admin-office-title">Amar Ekushey Hall</h4>
            </a>
        </div>
    </div>
</div>
@endsection
