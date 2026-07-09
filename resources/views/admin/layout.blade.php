<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - KUET Replica</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Admin Form — Semantic Class Names */
        .form-card {
            background: #fff;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,.1), 0 2px 4px -2px rgba(0,0,0,.1);
            max-width: 42rem;
        }
        .error-box {
            background: #fee2e2;
            border: 1px solid #f87171;
            color: #b91c1c;
            padding: 0.75rem 1rem;
            border-radius: 0.375rem;
            margin-bottom: 1rem;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group-last {
            margin-bottom: 1.5rem;
        }
        .form-label {
            display: block;
            color: #374151;
            font-size: 0.875rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        .form-input {
            box-shadow: 0 1px 2px rgba(0,0,0,.05);
            appearance: none;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            width: 100%;
            padding: 0.5rem 0.75rem;
            color: #374151;
            line-height: 1.25;
            outline: none;
            transition: border-color 0.15s, box-shadow 0.15s;
        }
        .form-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59,130,246,.4);
        }
        .form-hint {
            font-size: 0.75rem;
            color: #6b7280;
            margin-top: 0.25rem;
        }
        .form-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .btn-primary {
            background: #2563eb;
            color: #fff;
            font-weight: 700;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            border: none;
            cursor: pointer;
            transition: background 0.15s;
        }
        .btn-primary:hover {
            background: #1d4ed8;
        }
        .btn-cancel {
            color: #6b7280;
            text-decoration: none;
            transition: color 0.15s;
        }
        .btn-cancel:hover {
            color: #1f2937;
        }
        .current-image {
            width: 6rem;
            height: 6rem;
            object-fit: cover;
            border-radius: 0.375rem;
            box-shadow: 0 1px 2px rgba(0,0,0,.1);
            margin-bottom: 0.5rem;
        }
    </style>
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
                <li>
                    <a href="{{ route('admin.students.index') }}" class="block p-3 rounded hover:bg-blue-800 transition {{ request()->routeIs('admin.students.*') ? 'bg-blue-800' : '' }}">
                        🎓 Manage Students
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.lost-and-found.index') }}" class="block p-3 rounded hover:bg-blue-800 transition {{ request()->routeIs('admin.lost-and-found.*') ? 'bg-blue-800' : '' }}">
                        🔍 Lost & Found
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.bus-schedule.index') }}" class="block p-3 rounded hover:bg-blue-800 transition {{ request()->routeIs('admin.bus-schedule.*') ? 'bg-blue-800' : '' }}">
                        🚌 Bus Schedule
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
