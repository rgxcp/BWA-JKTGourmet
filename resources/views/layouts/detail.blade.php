<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('detail-title')</title>

    <!-- Includes Style -->
    @include('includes.style')
    <!-- Includes Styles -->

    <!-- Pages Detail Add-on Style -->
    @stack('addon-style')
    <!-- Pages Detail Add-on Style -->
</head>
<body>
    <!-- Includes Navbar -->
    @include('includes.navbar')
    <!-- Includes Navbar -->

    <!-- Pages Detail -->
    @yield('detail-content')
    <!-- Pages Detail -->

    <!-- Includes Footer -->
    @include('includes.footer')
    <!-- Includes Footer -->

    <!-- Includes Script -->
    @include('includes.script')
    <!-- Includes Script -->

    <!-- Pages Detail Add-on Script -->
    @stack('addon-script')
    <!-- Pages Detail Add-on Script -->
</body>
</html>