<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FM Barbershop | @yield('title', 'Home')</title>

    <link rel="shortcut icon" href="{{ asset('assets-guest/img/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('assets-guest/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/animated-headline.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/branding.css') }}">

    @stack('styles')
</head>

<body>
    @include('guest.partials.preloader')
    @include('guest.partials.header')

    <main>
        @yield('content')
    </main>

    @include('guest.partials.footer')
    @include('guest.partials.scripts')

    @stack('scripts')
</body>

</html>
