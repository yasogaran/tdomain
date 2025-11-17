<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'TECH DOMAIN - Corporate Website' }}</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="{{ $description ?? 'Professional corporate website showcasing expertise and services' }}">
    <meta name="keywords" content="{{ $keywords ?? 'technology, corporate, services' }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <!-- Additional head content -->
    @stack('styles')
</head>
<body class="bg-primary-bg text-text-main font-inter antialiased">

    <!-- Navigation -->
    <x-navigation />

    <!-- Main Content -->
    <main class="min-h-screen">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <x-footer />

    @livewireScripts

    <!-- Additional scripts -->
    @stack('scripts')
</body>
</html>
