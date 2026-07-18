@extends('layouts.app')
@section('title', 'Class Schedule - Departments')
@section('page_title', 'Select Department')

@section('content')
<style>
    /* Add some premium styling */
    .dept-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(226, 232, 240, 0.8);
    }
    .dept-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        border-color: #3b82f6; /* Tailwind blue-500 */
    }
    .dept-icon {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>

<div class="max-w-6xl mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
            Class Schedules
        </h2>
        <p class="mt-4 text-xl text-gray-500">
            Select your department to view class routines or find an empty room.
        </p>
    </div>

    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($departments as $dept)
        <a href="{{ route('class-schedule.department', $dept->id) }}" class="dept-card rounded-2xl p-8 flex flex-col items-center text-center cursor-pointer">
            <div class="h-16 w-16 bg-blue-50 rounded-full flex items-center justify-center mb-4">
                <span class="text-3xl font-bold dept-icon">{{ substr($dept->code, 0, 1) }}</span>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $dept->code }}</h3>
            <p class="text-sm text-gray-500">{{ $dept->name }}</p>
        </a>
        @endforeach
    </div>
    
    @if($departments->isEmpty())
        <div class="text-center py-12 text-gray-500">
            <p>No departments have been added yet.</p>
        </div>
    @endif
</div>
@endsection
