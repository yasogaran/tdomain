<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Admin Panel' }} - TECH DOMAIN</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <!-- TinyMCE (Optional - can be added later when needed) -->
    {{-- <script src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}

    @stack('styles')
</head>
<body class="bg-primary-bg text-text-main font-inter antialiased">

    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <x-admin.sidebar />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">

            <!-- Top Navigation -->
            <nav class="bg-secondary-bg border-b border-text-main/10 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <button @click="$dispatch('toggle-sidebar')" class="lg:hidden text-text-main hover:text-accent">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <h1 class="text-xl font-semibold text-text-main">{{ $title ?? 'Admin Panel' }}</h1>
                    </div>

                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <button class="relative text-text-main hover:text-accent transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                            </svg>
                            @if(\App\Models\Quotation::where('status', 'new')->count() > 0)
                                <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500"></span>
                            @endif
                        </button>

                        <!-- User Menu -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="flex items-center space-x-3">
                                <div class="text-right hidden sm:block">
                                    <p class="text-sm font-medium text-text-main">{{ auth()->user()->name }}</p>
                                    <p class="text-xs text-text-main/60">{{ ucfirst(auth()->user()->role) }}</p>
                                </div>
                                <div class="w-10 h-10 bg-accent/10 rounded-full flex items-center justify-center">
                                    <span class="text-accent font-semibold">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                </div>
                            </button>

                            <!-- Dropdown -->
                            <div x-show="open"
                                 @click.away="open = false"
                                 x-transition
                                 class="absolute right-0 mt-2 w-48 bg-secondary-bg rounded-lg shadow-xl border border-text-main/10 py-2 z-50">
                                <a href="{{ route('home') }}" target="_blank" class="block px-4 py-2 text-sm text-text-main hover:bg-primary-bg transition-colors">
                                    View Website
                                </a>
                                <div class="border-t border-text-main/10 my-2"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-primary-bg transition-colors">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                <!-- Alerts -->
                @if(session('success'))
                    <div class="bg-highlight/10 border border-highlight rounded-lg p-4 mb-6">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-highlight mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <p class="text-highlight">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-500/10 border border-red-500 rounded-lg p-4 mb-6">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            <p class="text-red-500">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>

    @livewireScripts
    @stack('scripts')
</body>
</html>
