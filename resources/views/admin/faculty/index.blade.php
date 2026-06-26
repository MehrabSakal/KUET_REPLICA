@extends('admin.layout')

@section('title', 'Manage Faculty')

@section('content')

<div class="mb-6 flex justify-between items-center">
    <p class="text-gray-600">View and manage faculty members.</p>
    <a href="{{ route('admin.faculty.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
        + Add New Faculty
    </a>
</div>

@if($faculties->isEmpty())
    <div class="bg-white p-8 rounded-lg shadow text-center text-gray-500">
        No faculty members found. Add some to get started!
    </div>
@else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($faculties as $faculty)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                <div class="h-48 bg-gray-200 overflow-hidden flex justify-center items-center">
                    @if($faculty->image)
                        <img src="{{ $faculty->image }}" alt="{{ $faculty->name }}" class="w-full h-full object-cover">
                    @else
                        <span class="text-6xl">👤</span>
                    @endif
                </div>
                <div class="p-4">
                    <h3 class="text-xl font-bold text-gray-800">{{ $faculty->name }}</h3>
                    @if($faculty->teacher_id)
                        <p class="text-gray-600 text-xs font-mono mb-1">ID: {{ $faculty->teacher_id }}</p>
                    @endif
                    <p class="text-blue-600 font-semibold text-sm mb-1">{{ $faculty->designation }}</p>
                    <p class="text-gray-500 text-sm mb-4">{{ $faculty->department }}</p>
                    
                    <div class="flex justify-between mt-4 pt-4 border-t border-gray-100">
                        <a href="{{ route('admin.faculty.edit', $faculty->id) }}" class="text-blue-500 hover:text-blue-700 font-medium">Edit</a>
                        
                        <form action="{{ route('admin.faculty.destroy', $faculty->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this faculty member?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection
