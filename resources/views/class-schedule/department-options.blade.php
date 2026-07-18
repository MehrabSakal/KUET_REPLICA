@extends('layouts.app')
@section('title', $department->code . ' Class Schedule')
@section('page_title', $department->name . ' Schedule')

@section('content')
<style>
    .option-card {
        transition: all 0.3s ease;
    }
    .option-card:hover {
        transform: translateY(-5px);
    }
    .year-card {
        background: linear-gradient(145deg, #ffffff, #f3f4f6);
        border-left: 4px solid #3b82f6;
    }
    .year-card:hover {
        box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.3);
    }
    .empty-room-card {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
    }
    .empty-room-card:hover {
        box-shadow: 0 10px 25px -5px rgba(16, 185, 129, 0.4);
    }
</style>

<div class="max-w-4xl mx-auto px-4 py-12">
    <div class="mb-8">
        <a href="{{ route('class-schedule.index') }}" class="text-blue-600 hover:text-blue-800 flex items-center font-medium transition-colors">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to Departments
        </a>
    </div>

    <div class="text-center mb-12">
        <h2 class="text-3xl font-extrabold text-gray-900">What are you looking for?</h2>
        <p class="mt-4 text-lg text-gray-500">Choose an academic year to view its routine, or check which rooms are currently available.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
        @for($i = 1; $i <= 4; $i++)
        <a href="{{ route('class-schedule.year-schedule', ['department' => $department->id, 'year' => $i]) }}" class="option-card year-card rounded-xl p-6 shadow-sm flex items-center justify-between cursor-pointer">
            <div>
                <h3 class="text-2xl font-bold text-gray-800">{{ $i }}{{ $i == 1 ? 'st' : ($i == 2 ? 'nd' : ($i == 3 ? 'rd' : 'th')) }} Year</h3>
                <p class="text-gray-500 mt-1">View the complete class routine</p>
            </div>
            <div class="bg-blue-100 text-blue-600 rounded-full p-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
        </a>
        @endfor
    </div>

    <div class="border-t border-gray-200 pt-10">
        <a href="{{ route('class-schedule.empty-rooms', $department->id) }}" class="option-card empty-room-card rounded-2xl p-8 shadow-lg flex items-center justify-between cursor-pointer">
            <div>
                <h3 class="text-3xl font-bold mb-2">Find an Empty Room</h3>
                <p class="text-emerald-100 text-lg">Need a place for an extra class or study session right now? See what's available.</p>
            </div>
            <div class="bg-emerald-800 bg-opacity-50 rounded-full p-4 hidden sm:block">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            </div>
        </a>
    </div>
</div>
@endsection
