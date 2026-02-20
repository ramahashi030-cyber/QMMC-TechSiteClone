<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'App')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Login CSS (for auth pages) -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">

    <!-- Page Specific CSS -->
    @stack('styles')
</head>
<body>
    <div class="app-container">
        @yield('content')
    </div>

    <!-- Bootstrap JS (IMPORTANT for dropdown/collapse) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>