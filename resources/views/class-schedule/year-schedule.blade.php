@extends('layouts.app')
@section('title', $department->code . ' - Year ' . $year . ' Schedule')
@section('page_title', $department->code . ' - Year ' . $year . ' Routine')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="mb-6 flex justify-between items-end">
        <a href="{{ route('class-schedule.department', $department->id) }}" class="text-blue-600 hover:text-blue-800 flex items-center font-medium">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to Options
        </a>
        <div class="text-right">
            <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold tracking-wide uppercase shadow-sm">
                {{ $department->code }} &bull; Year {{ $year }}
            </span>
        </div>
    </div>

    @if($schedules->isEmpty())
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-12 text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <h3 class="text-lg font-medium text-gray-900">No schedule found</h3>
            <p class="mt-1 text-gray-500">There are no classes scheduled for this year yet.</p>
        </div>
    @else
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-1/5">Day</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Classes</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'] as $day)
                            @if(isset($schedules[$day]))
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900 border-r border-gray-100">
                                    {{ $day }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-wrap gap-3">
                                        @foreach($schedules[$day] as $class)
                                            @php
                                                $start = \Carbon\Carbon::parse($class->start_time);
                                                $end = \Carbon\Carbon::parse($class->end_time);
                                                $isLab = $start->diffInMinutes($end) > 90;
                                            @endphp
                                            <div class="flex flex-col {{ $isLab ? 'bg-indigo-50 border-indigo-200' : 'bg-blue-50 border-blue-200' }} border rounded-lg p-3 w-64 shadow-sm transition-transform hover:-translate-y-1">
                                                <div class="flex justify-between items-start mb-2">
                                                    <span class="text-xs font-bold {{ $isLab ? 'text-indigo-700 bg-indigo-100' : 'text-blue-700 bg-blue-100' }} px-2 py-1 rounded">
                                                        {{ $start->format('h:i A') }} - {{ $end->format('h:i A') }}
                                                    </span>
                                                    <span class="text-xs font-bold text-gray-600 flex items-center">
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                                        {{ $class->room->room_number }}
                                                    </span>
                                                </div>
                                                <p class="text-sm font-medium text-gray-900 truncate" title="{{ $class->subject }}">
                                                    {{ $class->subject }}
                                                </p>
                                                @if($class->faculty)
                                                    <p class="text-xs text-gray-600 truncate mt-1">
                                                        <span class="font-semibold">Teacher:</span> {{ $class->faculty->name }}
                                                    </p>
                                                @endif
                                                @if($isLab)
                                                    <span class="text-[10px] uppercase tracking-wider text-indigo-500 font-bold mt-2">Lab Session</span>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
