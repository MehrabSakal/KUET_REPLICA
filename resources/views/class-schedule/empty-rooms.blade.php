@extends('layouts.app')
@section('title', 'Empty Rooms in ' . $department->code)
@section('page_title', 'Available Rooms - ' . $department->code)

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="mb-6 flex justify-between items-end">
        <a href="{{ route('class-schedule.department', $department->id) }}" class="text-blue-600 hover:text-blue-800 flex items-center font-medium">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to Options
        </a>
    </div>

    <div class="bg-gradient-to-r from-emerald-500 to-teal-600 rounded-2xl shadow-lg p-8 mb-8 text-white relative overflow-hidden">
        <div class="relative z-10">
            <h2 class="text-3xl font-extrabold mb-2">Live Availability</h2>
            <p class="text-emerald-100 text-lg flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Current Time: <strong class="ml-1">{{ \Carbon\Carbon::parse($currentTime)->format('h:i A') }}</strong> on {{ $currentDay }}
            </p>
        </div>
        <div class="absolute top-0 right-0 -mt-10 -mr-10 opacity-10">
            <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
        </div>
    </div>

    @if(count($emptyRooms) == 0)
        <div class="bg-red-50 border-l-4 border-red-500 p-6 rounded-r-xl shadow-sm">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-lg font-medium text-red-800">No rooms available</h3>
                    <p class="mt-2 text-red-700">All registered rooms in the {{ $department->code }} department currently have ongoing classes.</p>
                </div>
            </div>
        </div>
    @else
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
                <h3 class="text-xl font-bold text-gray-800">Available Rooms ({{ count($emptyRooms) }})</h3>
                <span class="bg-emerald-100 text-emerald-800 text-xs px-3 py-1 rounded-full font-bold uppercase tracking-wider">Ready to use</span>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                    @foreach($emptyRooms as $room)
                    <div class="border-2 border-emerald-100 bg-emerald-50 rounded-xl p-4 text-center transition-transform hover:-translate-y-1 hover:shadow-md cursor-default">
                        <svg class="w-8 h-8 mx-auto text-emerald-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path></svg>
                        <span class="block text-lg font-bold text-emerald-900">{{ $room }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
