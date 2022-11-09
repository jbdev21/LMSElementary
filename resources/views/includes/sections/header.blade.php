<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/images/logo.png">

    <title>@yield('page-title', 'Dashboard') - {{ config('app.name', 'LMS') }}</title>
    @vite(['resources/sass/dashboard.scss', 'resources/js/dashboard.js'])
    @stack('styles')
    <script type=”text/javascript” src=”http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML”></script>
</head>