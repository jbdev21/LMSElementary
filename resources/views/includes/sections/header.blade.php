<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/images/logo.png">

    <title>@yield('page-title', 'Dashboard') - {{ config('app.name', 'Woodland') }}</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/sass/dashboard.scss', 'resources/js/dashboard.js'])
    @stack('styles')
</head>