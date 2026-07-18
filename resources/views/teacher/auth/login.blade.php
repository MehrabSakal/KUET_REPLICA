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
    <style>
        .login-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 1.5rem;
            background-color: #f3f4f6;
        }
        .login-card {
            width: 100%;
            margin-top: 1.5rem;
            padding: 1rem 1.5rem;
            background-color: #ffffff;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }
        .login-title {
            margin-bottom: 1rem;
            text-align: center;
            font-size: 1.125rem;
            font-weight: 700;
            color: #1f2937;
        }
        @media (min-width: 640px) {
            .login-wrapper {
                justify-content: center;
                padding-top: 0;
            }
            .login-card {
                max-width: 28rem;
                border-radius: 0.5rem;
            }
        }
        .login-body {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            color: #111827;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .status-message {
            margin-bottom: 1rem;
            font-weight: 500;
            font-size: 0.875rem;
            color: #16a34a;
        }
        .form-group {
            margin-top: 1rem;
        }
        .form-group:first-child {
            margin-top: 0;
        }
        .form-label {
            display: block;
            font-weight: 500;
            font-size: 0.875rem;
            color: #374151;
        }
        .form-input {
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            display: block;
            margin-top: 0.25rem;
            width: 100%;
            padding: 0.5rem 0.75rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            box-sizing: border-box;
        }
        .form-input:focus {
            border-color: #6366f1;
            outline: none;
            box-shadow: 0 0 0 1px #6366f1;
        }
        .error-list {
            font-size: 0.875rem;
            color: #dc2626;
            margin-top: 0.5rem;
            list-style-type: none;
            padding: 0;
        }
        .error-list li {
            margin-top: 0.25rem;
        }
        .remember-me-group {
            display: block;
            margin-top: 1rem;
        }
        .remember-me-label {
            display: inline-flex;
            align-items: center;
            cursor: pointer;
        }
        .remember-me-checkbox {
            border-radius: 0.25rem;
            border: 1px solid #d1d5db;
            color: #4f46e5;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            width: 1rem;
            height: 1rem;
        }
        .remember-me-text {
            margin-left: 0.5rem;
            font-size: 0.875rem;
            color: #4b5563;
        }
        .form-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-top: 1rem;
        }
        .submit-btn {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            background-color: #1f2937;
            border: 1px solid transparent;
            border-radius: 0.375rem;
            font-weight: 600;
            font-size: 0.75rem;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            cursor: pointer;
            transition: background-color 0.15s ease-in-out;
            margin-left: 0.75rem;
        }
        .submit-btn:hover, .submit-btn:focus {
            background-color: #374151;
            outline: none;
        }
        .submit-btn:active {
            background-color: #111827;
        }
    </style>
</head>
<body class="login-body">
    <div class="login-wrapper">
        
        <!-- Form Card -->
        <div class="login-card">
            
            <div class="login-title">
                Teacher Login
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="status-message">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('teacher.login') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
                    @if ($errors->has('email'))
                        <ul class="error-list">
                            @foreach ((array) $errors->get('email') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" class="form-input" type="password" name="password" required autocomplete="current-password" />
                    @if ($errors->has('password'))
                        <ul class="error-list">
                            @foreach ((array) $errors->get('password') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <!-- Remember Me -->
                <div class="remember-me-group">
                    <label for="remember_me" class="remember-me-label">
                        <input id="remember_me" type="checkbox" class="remember-me-checkbox" name="remember">
                        <span class="remember-me-text">Remember me</span>
                    </label>
                </div>

                <div class="form-actions">
                    <button type="submit" class="submit-btn">
                        Log in
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
