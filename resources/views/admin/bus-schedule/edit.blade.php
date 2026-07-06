@extends('admin.layout')

@section('title', 'Edit Bus Schedule')

@section('content')
<div class="bg-white shadow rounded-lg p-6 max-w-2xl mx-auto">
    <form action="{{ route('admin.bus-schedule.update', $busSchedule->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="shift">Shift</label>
            <select name="shift" id="shift" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border" required>
                <option value="morning" {{ $busSchedule->shift == 'morning' ? 'selected' : '' }}>Morning</option>
                <option value="afternoon" {{ $busSchedule->shift == 'afternoon' ? 'selected' : '' }}>Afternoon</option>
                <option value="night" {{ $busSchedule->shift == 'night' ? 'selected' : '' }}>Night</option>
            </select>
            @error('shift') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="route">Route</label>
            <input type="text" name="route" id="route" value="{{ old('route', $busSchedule->route) }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border" required>
            @error('route') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="departure_time">Departure Time</label>
            <input type="text" name="departure_time" id="departure_time" value="{{ old('departure_time', $busSchedule->departure_time) }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border" required>
            @error('departure_time') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="bus_name">Bus Name/Number</label>
            <input type="text" name="bus_name" id="bus_name" value="{{ old('bus_name', $busSchedule->bus_name) }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border" required>
            @error('bus_name') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center justify-between mt-6">
            <a href="{{ route('admin.bus-schedule.index') }}" class="text-gray-600 hover:underline">Cancel</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Update Schedule
            </button>
        </div>
    </form>
</div>
@endsection
