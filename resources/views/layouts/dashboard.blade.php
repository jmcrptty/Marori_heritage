<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard - Suku Marori Wasur')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/marori.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/marori.ico') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    @include('dashboard.partials.styles')

    @stack('styles')
</head>
<body>

    @include('dashboard.partials.sidebar')

    <!-- Main Content -->
    <div class="main-content">
        @include('dashboard.partials.topbar')

        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @include('dashboard.partials.scripts')

    @stack('scripts')
</body>
</html>
