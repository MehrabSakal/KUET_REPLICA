@extends('layouts.app')

@section('title', $faculty->name . ' - Faculty Details')
@section('page_title', 'Faculty Details')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <a href="{{ route('faculty.index') }}" class="text-blue-600 hover:underline">&larr; Back to all faculty</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-8 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-xl rounded-2xl overflow-hidden mb-12 flex flex-col md:flex-row">
        <div class="md:w-1/3 bg-gray-50 flex flex-col items-center justify-center p-8 border-r border-gray-100">
            <div class="w-48 h-48 rounded-full overflow-hidden mb-6 shadow-md bg-white flex items-center justify-center text-5xl">
                @if($faculty->image)
                    <img src="{{ asset($faculty->image) }}" alt="{{ $faculty->name }}" class="w-full h-full object-cover">
                @else
                    👤
                @endif
            </div>
            <h2 class="text-2xl font-bold text-gray-800 text-center">{{ $faculty->name }}</h2>
            <p class="text-blue-600 font-semibold mt-1">{{ $faculty->designation }}</p>
            <p class="text-gray-500 mt-2 bg-gray-200 rounded-full px-4 py-1 text-sm">{{ $faculty->department }}</p>
        </div>
        
        <div class="md:w-2/3 p-8">
            <div class="mb-8">
                <h3 class="text-xl font-bold text-gray-800 border-b pb-2 mb-4">Research Interests</h3>
                <p class="text-gray-600 leading-relaxed">
                    {{ $faculty->research_interest ?: 'No research interests specified.' }}
                </p>
            </div>
            
            <div>
                <h3 class="text-xl font-bold text-gray-800 border-b pb-2 mb-4">Published Papers</h3>
                <p class="text-gray-600 leading-relaxed whitespace-pre-line">
                    {{ $faculty->published_papers ?: 'No published papers specified.' }}
                </p>
            </div>
        </div>
    </div>

    <!-- Research Request Form -->
    <div class="bg-white shadow-lg rounded-2xl p-8 max-w-3xl mx-auto border-t-4 border-blue-500">
        <div class="text-center mb-8">
            <h3 class="text-2xl font-bold text-gray-800">Request Research Assistance</h3>
            <p class="text-gray-600 mt-2">Fill out the form below to request research guidance from {{ $faculty->name }}.</p>
        </div>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('faculty.research-request', $faculty->id) }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Your Full Name</label>
                    <input type="text" name="student_name" required value="{{ old('student_name') }}" class="shadow-sm appearance-none border border-gray-300 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Your Email Address</label>
                    <input type="email" name="student_email" required value="{{ old('student_email') }}" class="shadow-sm appearance-none border border-gray-300 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Student ID (Optional)</label>
                <input type="text" name="student_id" value="{{ old('student_id') }}" class="shadow-sm appearance-none border border-gray-300 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Message / Research Proposal</label>
                <textarea name="message" required rows="5" placeholder="Briefly describe what kind of research assistance you are looking for..." class="shadow-sm appearance-none border border-gray-300 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">{{ old('message') }}</textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transform transition hover:-translate-y-1 focus:outline-none">
                    Submit Request
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
