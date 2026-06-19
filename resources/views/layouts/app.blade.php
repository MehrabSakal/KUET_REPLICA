<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KUET')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    @include('partials.header')

    <main>
        <div class="page-banner">
            <h2>@yield('page_title', 'Welcome')</h2>
        </div>

        <div class="content">
            @yield('content')
        </div>
    </main>

    @include('partials.footer')

</body>
</html>
