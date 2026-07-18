@extends('layouts.admin')

@section('title', 'Add New Schedule Data')

@section('content')
<div class="p-6">
    <div class="mb-6">
        <a href="{{ route('admin.class-schedule.index') }}" class="text-blue-600 hover:underline">&larr; Back to Schedules</a>
    </div>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 mb-6 rounded">
            <ul class="list-disc ml-5">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 mb-6 rounded">{{ session('success') }}</div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Add Department -->
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-lg font-bold mb-4">Add Department</h3>
            <form action="{{ route('admin.class-schedule.store') }}" method="POST">
                @csrf
                <input type="hidden" name="type" value="department">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Department Name</label>
                    <input type="text" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required placeholder="e.g. Computer Science and Engineering">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Code</label>
                    <input type="text" name="code" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required placeholder="e.g. CSE">
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Department</button>
            </form>
        </div>

        <!-- Add Room -->
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-lg font-bold mb-4">Add Room</h3>
            <form action="{{ route('admin.class-schedule.store') }}" method="POST">
                @csrf
                <input type="hidden" name="type" value="room">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Department</label>
                    <select name="department_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        @foreach($departments as $d)
                            <option value="{{ $d->id }}">{{ $d->code }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Room Number</label>
                    <input type="text" name="room_number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required placeholder="e.g. CSE-101">
                </div>
                <button type="submit" class="w-full bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Add Room</button>
            </form>
        </div>
    </div>

    <!-- Add Schedule -->
    <div class="bg-white p-6 rounded shadow mt-8">
        <h3 class="text-lg font-bold mb-4">Add Class Schedule</h3>
        <form action="{{ route('admin.class-schedule.store') }}" method="POST">
            @csrf
            <input type="hidden" name="type" value="schedule">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Department</label>
                    <select name="department_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        @foreach($departments as $d)
                            <option value="{{ $d->id }}">{{ $d->code }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Room</label>
                    <select name="room_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        @foreach($rooms as $r)
                            <option value="{{ $r->id }}">{{ $r->room_number }} ({{ $r->department->code }})</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Year</label>
                    <select name="year" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        <option value="1">1st Year</option>
                        <option value="2">2nd Year</option>
                        <option value="3">3rd Year</option>
                        <option value="4">4th Year</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Day of Week</label>
                    <select name="day_of_week" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        <option value="Sunday">Sunday</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Start Time</label>
                    <input type="time" name="start_time" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">End Time</label>
                    <input type="time" name="end_time" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Teacher (Faculty)</label>
                    <select name="faculty_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="">-- No Teacher Assigned --</option>
                        @foreach($faculties as $f)
                            <option value="{{ $f->id }}">{{ $f->name }} ({{ $f->department }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Subject</label>
                    <input type="text" name="subject" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required placeholder="e.g. Database Systems">
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="w-full bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Add Schedule Slot</button>
            </div>
        </form>
    </div>
</div>
@endsection
