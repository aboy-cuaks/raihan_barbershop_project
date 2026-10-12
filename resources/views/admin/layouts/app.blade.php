<!doctype html>
<html lang="id" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') | FM Barbershop Admin</title>
    <meta name="description" content="Panel administrasi FM Barbershop">
    <link rel="icon" type="image/png" href="{{ asset('assets-admin/images/favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets-admin/css/admin.css') }}">
    @stack('styles')
</head>
<body>
<div class="app-shell" id="appShell">
    @include('admin.partials.sidebar')
    <div class="app-main">
        @include('admin.partials.header')
        <main class="main-content">
            @yield('content')
        </main>
        <footer class="footer">
            <span>&copy; {{ date('Y') }} FM Barbershop. All rights reserved.</span>
            <span>Admin Panel</span>
        </footer>
    </div>
</div>
<script src="{{ asset('assets-admin/js/admin.js') }}"></script>
@stack('scripts')
</body>
</html>
