<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('dashboard-title')</title>

    <!-- Includes Style -->
    @include('includes.style')
    <!-- Includes Style -->
</head>
<body>
    <!-- Includes Navbar -->
    @include('includes.navbar')
    <!-- Includes Navbar -->

    <!-- Pages Home -->
    @yield('dashboard-content')
    <!-- Pages Home -->

    <!-- Includes Footer -->
    @include('includes.footer')
    <!-- Includes Footer -->

    <!-- Includes Script -->
    @include('includes.script')
    <!-- Includes Script -->
</body>
</html>