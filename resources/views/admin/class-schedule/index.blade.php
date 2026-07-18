@extends('layouts.admin')

@section('title', 'Manage Class Schedules')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Class Schedules</h2>
        <a href="{{ route('admin.class-schedule.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add New</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 mb-6 rounded">{{ session('success') }}</div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
        <div>
            <h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Departments</h3>
            <div class="bg-white rounded shadow overflow-hidden">
                <table class="min-w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Code</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($departments as $d)
                        <tr>
                            <td class="px-4 py-3">{{ $d->code }}</td>
                            <td class="px-4 py-3">{{ $d->name }}</td>
                            <td class="px-4 py-3">
                                <form action="{{ route('admin.class-schedule.destroy', ['class_schedule' => $d->id, 'type' => 'department']) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <div>
            <h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Rooms</h3>
            <div class="bg-white rounded shadow overflow-hidden">
                <table class="min-w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Dept</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Room</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($rooms as $r)
                        <tr>
                            <td class="px-4 py-3">{{ $r->department->code }}</td>
                            <td class="px-4 py-3">{{ $r->room_number }}</td>
                            <td class="px-4 py-3">
                                <form action="{{ route('admin.class-schedule.destroy', ['class_schedule' => $r->id, 'type' => 'room']) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Class Schedules</h3>
    <div class="bg-white rounded shadow overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Dept</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Room</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Year</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Day</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Time</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Subject</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Teacher</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($schedules as $s)
                <tr>
                    <td class="px-4 py-3">{{ $s->department->code }}</td>
                    <td class="px-4 py-3">{{ $s->room->room_number }}</td>
                    <td class="px-4 py-3">Year {{ $s->year }}</td>
                    <td class="px-4 py-3">{{ $s->day_of_week }}</td>
                    <td class="px-4 py-3">{{ \Carbon\Carbon::parse($s->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($s->end_time)->format('h:i A') }}</td>
                    <td class="px-4 py-3">{{ $s->subject }}</td>
                    <td class="px-4 py-3">{{ $s->faculty ? $s->faculty->name : 'Unassigned' }}</td>
                    <td class="px-4 py-3">
                        <form action="{{ route('admin.class-schedule.destroy', ['class_schedule' => $s->id, 'type' => 'schedule']) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 text-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
