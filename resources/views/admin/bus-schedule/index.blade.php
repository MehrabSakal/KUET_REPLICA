@extends('admin.layout')

@section('title', 'Bus Schedule Management')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <h2 class="text-xl font-bold text-gray-800">Bus Schedules</h2>
    <a href="{{ route('admin.bus-schedule.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        + Add Schedule
    </a>
</div>

<div class="bg-white shadow rounded-lg overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Shift</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Route</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Departure Time</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bus Name</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($schedules as $schedule)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            @if($schedule->shift == 'morning') bg-yellow-100 text-yellow-800
                            @elseif($schedule->shift == 'afternoon') bg-orange-100 text-orange-800
                            @else bg-indigo-100 text-indigo-800 @endif">
                            {{ ucfirst($schedule->shift) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $schedule->route }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $schedule->departure_time }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $schedule->bus_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('admin.bus-schedule.edit', $schedule->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                        <form action="{{ route('admin.bus-schedule.destroy', $schedule->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this schedule?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 whitespace-nowrap text-center text-gray-500">No schedules found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
