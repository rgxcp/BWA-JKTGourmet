<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('success-title')</title>

    <!-- Includes Style -->
    @include('includes.style')
    <!-- Includes Style -->
</head>
<body>
    <!-- Includes Navbar Alt -->
    @include('includes.navbar-alt')
    <!-- Includes Navbar Alt -->

    <!-- Pages Success -->
    @yield('success-content')
    <!-- Pages Success -->

    <!-- Includes Script -->
    @include('includes.script')
    <!-- Includes Script -->
</body>
</html>