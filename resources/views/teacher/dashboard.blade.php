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
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Profile Widget -->
                <div class="bg-white overflow-hidden shadow rounded-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-bold text-gray-800">Your Profile</h2>
                        <a href="{{ route('teacher.profile.edit') }}" class="text-blue-600 hover:text-blue-800 font-semibold text-sm">Edit Profile</a>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        @if($teacher->image)
                            <img src="{{ asset('images/faculty/' . $teacher->image) }}" alt="{{ $teacher->name }}" class="h-20 w-20 rounded-full object-cover">
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

                <!-- Research Requests Widget (Placeholder) -->
                <div class="bg-white overflow-hidden shadow rounded-lg p-6 flex flex-col justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800 mb-2">Research Requests</h2>
                        <p class="text-gray-600">You have no pending research requests at the moment.</p>
                    </div>
                    <div class="mt-4">
                        <button disabled class="bg-gray-300 text-gray-600 px-4 py-2 rounded cursor-not-allowed">View Requests (Coming Soon)</button>
                    </div>
                </div>
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
