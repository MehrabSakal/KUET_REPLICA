<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - KUET Replica</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal flex">

    <!-- Sidebar -->
    <div class="bg-blue-900 shadow-xl h-screen w-64 fixed left-0 top-0 text-white transition-all duration-300 z-10 flex flex-col">
        <div class="p-6 text-center border-b border-blue-800">
            <h2 class="text-2xl font-bold">Admin Panel</h2>
        </div>
        <div class="p-4 flex-1 overflow-y-auto">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('admin.faculty.index') }}" class="block p-3 rounded hover:bg-blue-800 transition {{ request()->routeIs('admin.faculty.*') ? 'bg-blue-800' : '' }}">
                        👨‍🏫 Manage Faculty
                    </a>
                </li>
            </ul>
        </div>
        <div class="p-4 border-t border-blue-800">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left p-3 rounded hover:bg-red-600 transition bg-red-500 font-bold">
                    🚪 Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 ml-64 p-8">
        
        <!-- Header -->
        <header class="bg-white shadow rounded-lg mb-6 p-4 flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-gray-800">@yield('title', 'Dashboard')</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-600">Welcome, <strong>{{ auth()->user()->name ?? 'Admin' }}</strong></span>
                <a href="/" target="_blank" class="text-blue-500 hover:underline text-sm">View Website</a>
            </div>
        </header>

        <!-- Flash Messages -->
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

    </div>

</body>
</html>
