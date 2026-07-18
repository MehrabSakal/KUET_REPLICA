<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard - KUET</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans antialiased text-gray-900">
    
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="font-bold text-xl text-blue-600">Teacher Portal</span>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">Welcome, {{ $teacher->name }}</span>
                    <form method="POST" action="{{ route('teacher.logout') }}">
                        @csrf
                        <button type="submit" class="text-sm text-red-600 hover:text-red-800 font-semibold">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="px-4 py-6 sm:px-0">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Dashboard</h1>
            
            <div class="grid grid-cols-1 gap-6">
                <!-- Profile Widget -->
                <div class="bg-white overflow-hidden shadow rounded-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-bold text-gray-800">Your Profile</h2>
                        <a href="{{ route('teacher.profile.edit') }}" class="text-blue-600 hover:text-blue-800 font-semibold text-sm">Edit Profile</a>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        @if($teacher->image)
                            <img src="{{ $teacher->image_url }}" alt="{{ $teacher->name }}" class="h-20 w-20 rounded-full object-cover">
                        @else
                            <div class="h-20 w-20 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-2xl font-bold">
                                {{ substr($teacher->name, 0, 1) }}
                            </div>
                        @endif
                        
                        <div>
                            <p class="font-semibold text-lg text-gray-800">{{ $teacher->name }}</p>
                            <p class="text-gray-600">{{ $teacher->designation }}</p>
                            <p class="text-sm text-gray-500">{{ $teacher->department }}</p>
                            <p class="text-sm text-gray-500 mt-1">{{ $teacher->email }}</p>
                        </div>
                    </div>
                </div>

            </div>
            
            <!-- Research Requests Section -->
            <div class="mt-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Pending Research Requests</h2>
                
                @if($pendingRequests->isEmpty())
                    <div class="bg-white rounded-lg shadow p-6 text-center text-gray-500">
                        You have no pending research requests at the moment.
                    </div>
                @else
                    <div class="grid grid-cols-1 gap-4">
                        @foreach($pendingRequests as $request)
                            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-yellow-400">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-800">{{ $request->student_name }}</h3>
                                        <p class="text-sm text-gray-600 mb-1">
                                            <a href="mailto:{{ $request->student_email }}" class="text-blue-600 hover:underline">{{ $request->student_email }}</a>
                                            @if($request->student_id)
                                                | ID: <span class="font-semibold">{{ $request->student_id }}</span>
                                            @endif
                                        </p>
                                        <p class="text-xs text-gray-500 mb-4">Requested on {{ $request->created_at->format('M d, Y') }}</p>
                                    </div>
                                    <div class="flex space-x-2">
                                        <form method="POST" action="{{ route('teacher.research-request.approve', $request->id) }}">
                                            @csrf
                                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm font-semibold transition">Approve</button>
                                        </form>
                                        <form method="POST" action="{{ route('teacher.research-request.reject', $request->id) }}">
                                            @csrf
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm font-semibold transition">Reject</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="bg-gray-50 p-4 rounded mt-2 text-gray-700 text-sm">
                                    <strong>Message:</strong><br>
                                    {{ $request->message }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Class Schedule Section -->
            <div class="mt-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Your Class Schedule</h2>
                
                @if($classSchedules->isEmpty())
                    <div class="bg-white rounded-lg shadow p-6 text-center text-gray-500">
                        You have no classes assigned yet.
                    </div>
                @else
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Day</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Classes</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'] as $day)
                                        @if(isset($classSchedules[$day]))
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900 border-r border-gray-100">
                                                {{ $day }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex flex-wrap gap-3">
                                                    @foreach($classSchedules[$day] as $class)
                                                        @php
                                                            $start = \Carbon\Carbon::parse($class->start_time);
                                                            $end = \Carbon\Carbon::parse($class->end_time);
                                                            $isLab = $start->diffInMinutes($end) > 90;
                                                        @endphp
                                                        <div class="flex flex-col {{ $isLab ? 'bg-indigo-50 border-indigo-200' : 'bg-blue-50 border-blue-200' }} border rounded p-3 shadow-sm min-w-[200px]">
                                                            <div class="flex justify-between items-start mb-1">
                                                                <span class="text-xs font-bold {{ $isLab ? 'text-indigo-700 bg-indigo-100' : 'text-blue-700 bg-blue-100' }} px-1 rounded">
                                                                    {{ $start->format('h:i A') }} - {{ $end->format('h:i A') }}
                                                                </span>
                                                                <span class="text-xs font-bold text-gray-600">
                                                                    {{ $class->room->room_number }}
                                                                </span>
                                                            </div>
                                                            <p class="text-sm font-bold text-gray-900">{{ $class->subject }}</p>
                                                            <p class="text-xs text-gray-600 mt-1">Year {{ $class->year }}, {{ $class->department->code }}</p>
                                                            @if($isLab)
                                                                <span class="text-[10px] uppercase tracking-wider text-indigo-500 font-bold mt-1">Lab Session</span>
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

            <div class="mt-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Request History</h2>
                
                @if($pastRequests->isEmpty())
                    <div class="bg-white rounded-lg shadow p-6 text-center text-gray-500">
                        No past requests found.
                    </div>
                @else
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($pastRequests as $request)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $request->student_name }}</div>
                                            <div class="text-sm text-gray-500">{{ $request->student_email }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($request->status == 'approved')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Approved</span>
                                            @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Rejected</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $request->updated_at->format('M d, Y') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
            
            <!-- Quick Stats or Other Info -->
            <div class="mt-6 bg-white overflow-hidden shadow rounded-lg p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Information & Statistics</h2>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-center">
                    <div class="bg-blue-50 p-4 rounded border border-blue-100">
                        <p class="text-sm text-blue-600 font-bold uppercase tracking-wider">Papers Published</p>
                        <p class="text-2xl font-bold text-gray-900 mt-2">{{ $teacher->published_papers ? count(explode(',', $teacher->published_papers)) : 0 }}</p>
                    </div>
                    <div class="bg-green-50 p-4 rounded border border-green-100">
                        <p class="text-sm text-green-600 font-bold uppercase tracking-wider">Active Students</p>
                        <p class="text-2xl font-bold text-gray-900 mt-2">--</p>
                    </div>
                    <div class="bg-purple-50 p-4 rounded border border-purple-100">
                        <p class="text-sm text-purple-600 font-bold uppercase tracking-wider">Ongoing Projects</p>
                        <p class="text-2xl font-bold text-gray-900 mt-2">--</p>
                    </div>
                </div>
            </div>

        </div>
    </main>
</body>
</html>
