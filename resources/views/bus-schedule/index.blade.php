@extends('layouts.app')

@section('title', 'Bus Schedule - KUET')
@section('page_title', 'Bus Schedule')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-5xl">
    
    @if($schedules->isEmpty())
        <div class="text-center p-8 bg-gray-100 rounded-lg">
            <p class="text-gray-600">Bus schedule is currently unavailable.</p>
        </div>
    @else
        <div class="space-y-8">
            @foreach(['morning', 'afternoon', 'night'] as $shift)
                @if(isset($schedules[$shift]) && $schedules[$shift]->count() > 0)
                <div class="bg-white shadow rounded-lg overflow-hidden border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200 
                        @if($shift == 'morning') bg-yellow-50
                        @elseif($shift == 'afternoon') bg-orange-50
                        @else bg-indigo-50 @endif">
                        <h3 class="text-xl font-bold 
                            @if($shift == 'morning') text-yellow-800
                            @elseif($shift == 'afternoon') text-orange-800
                            @else text-indigo-800 @endif capitalize flex items-center">
                            @if($shift == 'morning') 🌅 
                            @elseif($shift == 'afternoon') ☀️ 
                            @else 🌙 @endif
                            <span class="ml-2">{{ ucfirst($shift) }} Shift</span>
                        </h3>
                    </div>
                    <div class="p-0">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Route</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Departure Time</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bus Name</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($schedules[$shift] as $schedule)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $schedule->route }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-bold">{{ $schedule->departure_time }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $schedule->bus_name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    @endif
</div>
@endsection
