<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Hub - @yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    @unless(request()->is('dashboard'))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endunless    
    
    @stack('styles')
</head>
<body class="bg-gray-900 text-white font-sans">
    @yield('header')
    @yield('content')
    <x-footer />
</body>
</html>