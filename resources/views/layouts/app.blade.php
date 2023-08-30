<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Museo+Sans:wght@500;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @yield('header_styles')

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ mix('js/custom.js') }}"></script>
    @yield('header_scripts')
</head>
<body class="font-sans antialiased">
<div class="min-h-screen">
    <!-- Page Content -->
    <main>
        @yield('body')
    </main>
</div>
@yield('footer_scripts')
</body>
</html>
