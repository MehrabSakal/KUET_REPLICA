@extends('layouts.app')

@section('title', 'Faculty - KUET')
@section('page_title', 'Faculty')

@section('content')
<div class="faculty-page-container">
    <div class="faculty-page-header">
        <h2 class="faculty-page-title">Our Faculty Members</h2>
        <p class="faculty-page-subtitle">Meet the dedicated teachers guiding our students.</p>
    </div>

    @if($faculties->isEmpty())
        <div class="no-faculty-message">
            No faculty members are listed yet.
        </div>
    @else
        <div class="faculty-grid">
            @foreach($faculties as $faculty)
                <a href="{{ route('faculty.show', $faculty->id) }}" class="faculty-card">
                    <div class="faculty-image-container">
                        @if($faculty->image)
                            <img src="{{ $faculty->image }}" alt="{{ $faculty->name }}" class="faculty-image">
                        @else
                            <span class="faculty-avatar-placeholder">👤</span>
                        @endif
                    </div>
                    <div class="faculty-info">
                        <h3 class="faculty-name">{{ $faculty->name }}</h3>
                        <p class="faculty-designation">{{ $faculty->designation }}</p>
                        <p class="faculty-department">{{ $faculty->department }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection
