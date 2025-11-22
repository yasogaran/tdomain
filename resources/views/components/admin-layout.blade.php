<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Admin Dashboard' }} - TECH DOMAIN</title>

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

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-secondary-bg border-r border-text-main/10 fixed h-full overflow-y-auto">
            <div class="p-6">
                <!-- Logo -->
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2 mb-8">
                    <div class="w-8 h-8 bg-gradient-to-br from-accent to-highlight rounded-lg"></div>
                    <span class="text-xl font-bold text-text-main">TECH DOMAIN</span>
                </a>

                <!-- Navigation -->
                <nav class="space-y-1">
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}"
                       class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-accent/10 text-accent' : 'text-text-main/70 hover:bg-text-main/5 hover:text-text-main' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                        <span class="font-medium">Dashboard</span>
                    </a>

                    <!-- Projects -->
                    <a href="{{ route('admin.projects.index') }}"
                       class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.projects.*') ? 'bg-accent/10 text-accent' : 'text-text-main/70 hover:bg-text-main/5 hover:text-text-main' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                        </svg>
                        <span class="font-medium">Projects</span>
                    </a>

                    <!-- Partners -->
                    <a href="{{ route('admin.partners.index') }}"
                       class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.partners.*') ? 'bg-accent/10 text-accent' : 'text-text-main/70 hover:bg-text-main/5 hover:text-text-main' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span class="font-medium">Partners</span>
                    </a>

                    <!-- Team -->
                    <a href="{{ route('admin.team.index') }}"
                       class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.team.*') ? 'bg-accent/10 text-accent' : 'text-text-main/70 hover:bg-text-main/5 hover:text-text-main' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <span class="font-medium">Team</span>
                    </a>

                    <!-- Pages -->
                    <a href="{{ route('admin.pages.index') }}"
                       class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.pages.*') ? 'bg-accent/10 text-accent' : 'text-text-main/70 hover:bg-text-main/5 hover:text-text-main' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                        <span class="font-medium">Pages</span>
                    </a>

                    <!-- Graphic Portfolios -->
                    <a href="{{ route('admin.graphic-portfolios.index') }}"
                       class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.graphic-portfolios.*') ? 'bg-accent/10 text-accent' : 'text-text-main/70 hover:bg-text-main/5 hover:text-text-main' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="font-medium">Graphic Portfolios</span>
                    </a>

                    <!-- Quotations -->
                    <a href="{{ route('admin.quotations.index') }}"
                       class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.quotations.*') ? 'bg-accent/10 text-accent' : 'text-text-main/70 hover:bg-text-main/5 hover:text-text-main' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                        <span class="font-medium">Quotations</span>
                    </a>

                    @can('admin')
                    <!-- Users (Admin Only) -->
                    <a href="{{ route('admin.users.index') }}"
                       class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.users.*') ? 'bg-accent/10 text-accent' : 'text-text-main/70 hover:bg-text-main/5 hover:text-text-main' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <span class="font-medium">Users</span>
                        <span class="ml-auto px-2 py-0.5 text-xs bg-highlight/10 text-highlight rounded">Admin</span>
                    </a>
                    @endcan

                    <div class="border-t border-text-main/10 my-4"></div>

                    <!-- Back to Website -->
                    <a href="{{ route('home') }}"
                       class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors text-text-main/70 hover:bg-text-main/5 hover:text-text-main">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <span class="font-medium">Back to Website</span>
                    </a>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors text-text-main/70 hover:bg-text-main/5 hover:text-text-main">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            <span class="font-medium">Logout</span>
                        </button>
                    </form>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 ml-64">
            <!-- Top Bar -->
            <header class="bg-secondary-bg border-b border-text-main/10 px-8 py-4 sticky top-0 z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-text-main">{{ $title ?? 'Admin Panel' }}</h2>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-text-main/60">{{ auth()->user()->name }}</span>
                        <div class="w-8 h-8 bg-gradient-to-br from-accent to-highlight rounded-full flex items-center justify-center text-sm font-bold text-primary-bg">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-8">
                {{ $slot }}
            </main>
        </div>
    </div>

    @livewireScripts

    <!-- Additional scripts -->
    @stack('scripts')
</body>
</html>
