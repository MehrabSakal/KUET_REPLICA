@extends('admin.layout')

@section('title', 'Students')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold">Students List</h1>
    <a href="{{ route('admin.students.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">Add New Student</a>
</div>

<div class="bg-white rounded shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Student ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Department</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($students as $student)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $student->student_id }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $student->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $student->department }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <a href="{{ route('admin.students.edit', $student) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                    <form action="{{ route('admin.students.destroy', $student) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @if($students->isEmpty())
            <tr>
                <td colspan="4" class="px-6 py-4 text-center text-gray-500">No students found.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
