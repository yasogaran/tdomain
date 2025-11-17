<aside class="w-64 bg-secondary-bg border-r border-text-main/10 flex-shrink-0" x-data="{ open: true }">
    <div class="p-6">
        <!-- Logo -->
        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2 mb-8">
            <div class="w-10 h-10 bg-accent rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-primary-bg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                </svg>
            </div>
            <div>
                <p class="text-accent font-bold text-lg">TECH DOMAIN</p>
                <p class="text-text-main/60 text-xs">Admin Panel</p>
            </div>
        </a>

        <!-- Navigation -->
        <nav class="space-y-1">
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Dashboard
            </a>

            <!-- Projects -->
            <a href="{{ route('admin.projects.index') }}" class="nav-item {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                </svg>
                Projects
            </a>

            <!-- Partners -->
            <a href="{{ route('admin.partners.index') }}" class="nav-item {{ request()->routeIs('admin.partners.*') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                Partners
            </a>

            <!-- Team -->
            <a href="{{ route('admin.team.index') }}" class="nav-item {{ request()->routeIs('admin.team.*') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                Team
            </a>

            <!-- Pages -->
            <a href="{{ route('admin.pages.index') }}" class="nav-item {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Pages
            </a>

            <!-- Quotations -->
            <a href="{{ route('admin.quotations.index') }}" class="nav-item {{ request()->routeIs('admin.quotations.*') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                </svg>
                Quotations
                @php
                    $pendingCount = \App\Models\Quotation::where('status', 'new')->count();
                @endphp
                @if($pendingCount > 0)
                    <span class="ml-auto bg-accent text-primary-bg text-xs font-semibold px-2 py-1 rounded-full">
                        {{ $pendingCount }}
                    </span>
                @endif
            </a>

            <!-- Users (Admin only) -->
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.users.index') }}" class="nav-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    Users
                </a>
            @endif
        </nav>

        <!-- Divider -->
        <div class="border-t border-text-main/10 my-6"></div>

        <!-- Quick Links -->
        <div class="space-y-1">
            <a href="{{ route('home') }}" target="_blank" class="nav-item-secondary">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                </svg>
                View Website
            </a>
        </div>
    </div>
</aside>

<style>
    .nav-item {
        @apply flex items-center space-x-3 px-4 py-3 rounded-lg text-text-main hover:bg-primary-bg transition-colors;
    }

    .nav-item.active {
        @apply bg-accent/10 text-accent;
    }

    .nav-item-secondary {
        @apply flex items-center space-x-3 px-4 py-2 rounded-lg text-text-main/60 hover:text-accent hover:bg-primary-bg transition-colors text-sm;
    }
</style>
