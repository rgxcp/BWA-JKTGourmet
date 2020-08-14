<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Includes Style -->
    @include('includes.style')
    <!-- Includes Style -->
</head>
<body>
    <!-- Includes Navbar -->
    @include('includes.navbar-alt')
    <!-- Includes Navbar -->

    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Includes Footer -->
    @include('includes.footer')
    <!-- Includes Footer -->

    <!-- Includes Script -->
    @include('includes.script')
    <!-- Includes Script -->
</body>
</html>
