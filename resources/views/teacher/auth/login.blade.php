<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Teacher Login - {{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        
        <!-- Logo -->
        <div>
            <a href="/">
                <svg viewBox="0 0 316 316" xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 fill-current text-gray-500">
                    <path d="M305.8 81.125C305.77 80.995 305.69 80.885 305.59 80.795C305.52 80.735 305.45 80.665 305.37 80.605C305.29 80.545 305.22 80.475 305.14 80.415C305.07 80.355 304.99 80.295 304.9 80.245C304.82 80.195 304.74 80.145 304.66 80.105C304.57 80.055 304.49 80.015 304.4 79.975C304.31 79.935 304.22 79.895 304.13 79.855C304.05 79.825 303.96 79.795 303.87 79.775C303.78 79.745 303.69 79.715 303.6 79.705C303.51 79.685 303.42 79.665 303.32 79.655C303.23 79.645 303.14 79.635 303.04 79.625C302.95 79.615 302.86 79.615 302.76 79.615C302.66 79.615 302.57 79.615 302.47 79.615C302.37 79.615 302.28 79.615 302.18 79.625C302.08 79.635 301.99 79.645 301.89 79.655C301.79 79.665 301.7 79.685 301.6 79.705C301.51 79.715 301.42 79.745 301.33 79.775C301.24 79.795 301.15 79.825 301.06 79.855C300.97 79.895 300.88 79.935 300.79 79.975C300.7 80.015 300.61 80.055 300.53 80.105C300.45 80.145 300.37 80.195 300.29 80.245C300.2 80.295 300.12 80.355 300.05 80.415C299.97 80.475 299.9 80.545 299.82 80.605C299.74 80.665 299.67 80.735 299.6 80.795C299.5 80.885 299.42 80.995 299.39 81.125L237.99 261.275C237.79 261.855 237.99 262.485 238.45 262.895C238.91 263.305 239.58 263.375 240.11 263.075L299.04 229.415L307.72 232.065C308.19 232.215 308.71 232.085 309.06 231.725C309.41 231.365 309.53 230.845 309.39 230.375L305.8 81.125ZM295.34 220.895L246.3 248.915L301.53 87.055L295.34 220.895ZM14.195 81.125C14.165 80.995 14.085 80.885 13.985 80.795C13.915 80.735 13.845 80.665 13.765 80.605C13.685 80.545 13.615 80.475 13.535 80.415C13.465 80.355 13.385 80.295 13.295 80.245C13.215 80.195 13.135 80.145 13.055 80.105C12.965 80.055 12.885 80.015 12.795 79.975C12.705 79.935 12.615 79.895 12.525 79.855C12.445 79.825 12.355 79.795 12.265 79.775C12.175 79.745 12.085 79.715 11.995 79.705C11.905 79.685 11.815 79.665 11.715 79.655C11.625 79.645 11.535 79.635 11.435 79.625C11.345 79.615 11.255 79.615 11.155 79.615C11.055 79.615 10.965 79.615 10.865 79.615C10.765 79.615 10.675 79.615 10.575 79.625C10.475 79.635 10.385 79.645 10.285 79.655C10.185 79.665 10.095 79.685 9.99501 79.705C9.90501 79.715 9.81501 79.745 9.72501 79.775C9.63501 79.795 9.54501 79.825 9.45501 79.855C9.36501 79.895 9.27501 79.935 9.18501 79.975C9.09501 80.015 9.00501 80.055 8.92501 80.105C8.84501 80.145 8.76501 80.195 8.68501 80.245C8.59501 80.295 8.51501 80.355 8.44501 80.415C8.36501 80.475 8.29501 80.545 8.21501 80.605C8.13501 80.665 8.06501 80.735 7.99501 80.795C7.89501 80.885 7.81501 80.995 7.78501 81.125L4.19501 230.375C4.05501 230.845 4.17501 231.365 4.52501 231.725C4.87501 232.085 5.39501 232.215 5.86501 232.065L14.545 229.415L73.475 263.075C74.005 263.375 74.675 263.305 75.135 262.895C75.595 262.485 75.795 261.855 75.595 261.275L14.195 81.125ZM18.065 87.055L73.295 248.915L24.255 220.895L18.065 87.055ZM159.8 198.545L232.25 158.585L159.8 118.625L87.345 158.585L159.8 198.545ZM159.8 106.805C160.03 106.805 160.25 106.845 160.45 106.945L246.33 154.295C246.74 154.515 246.99 154.945 246.99 155.415V212.785C246.99 213.255 246.74 213.685 246.33 213.915L160.45 261.265C160.05 261.485 159.54 261.485 159.14 261.265L73.265 213.915C72.855 213.695 72.605 213.265 72.605 212.785V155.415C72.605 154.945 72.855 154.515 73.265 154.295L159.14 106.945C159.34 106.845 159.57 106.805 159.8 106.805ZM76.715 160.295V210.375L157.7 255.055V204.975L76.715 160.295ZM161.89 255.055L242.88 210.375V160.295L161.89 204.975V255.055Z" />
                </svg>
            </a>
        </div>

        <!-- Form Card -->
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            
            <div class="mb-4 text-center text-lg font-bold text-gray-800">
                Teacher Login
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('teacher.login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                    <input id="email" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
                    @if ($errors->has('email'))
                        <ul class="text-sm text-red-600 space-y-1 mt-2">
                            @foreach ((array) $errors->get('email') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                    <input id="password" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    @if ($errors->has('password'))
                        <ul class="text-sm text-red-600 space-y-1 mt-2">
                            @foreach ((array) $errors->get('password') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">Remember me</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ms-3">
                        Log in
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
