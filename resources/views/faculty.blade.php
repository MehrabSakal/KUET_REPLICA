@extends('layouts.app')

@section('title', 'Faculty - KUET')
@section('page_title', 'Faculty')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-800">Our Faculty Members</h2>
        <p class="text-gray-600 mt-2">Meet the dedicated teachers guiding our students.</p>
    </div>

    @if($faculties->isEmpty())
        <div class="text-center text-gray-500 py-12">
            No faculty members are listed yet.
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($faculties as $faculty)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition duration-300">
                    <div class="h-56 bg-gray-200 overflow-hidden flex justify-center items-center">
                        @if($faculty->image)
                            <img src="{{ $faculty->image }}" alt="{{ $faculty->name }}" class="w-full h-full object-cover">
                        @else
                            <span class="text-6xl">👤</span>
                        @endif
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-800 mb-1">{{ $faculty->name }}</h3>
                        <p class="text-blue-600 font-semibold mb-2">{{ $faculty->designation }}</p>
                        <p class="text-gray-500 text-sm bg-gray-100 rounded-full px-3 py-1 inline-block">{{ $faculty->department }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
