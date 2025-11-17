<nav class="bg-primary-bg/95 backdrop-blur-sm border-b border-secondary-bg sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">

            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="text-2xl font-bold">
                    <span class="text-accent">TECH</span>
                    <span class="text-text-main">DOMAIN</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    Home
                </a>
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                    About
                </a>
                <a href="{{ route('services') }}" class="nav-link {{ request()->routeIs('services*') ? 'active' : '' }}">
                    Services
                </a>
                <a href="{{ route('portfolio.index') }}" class="nav-link {{ request()->routeIs('portfolio*') ? 'active' : '' }}">
                    Portfolio
                </a>
                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                    Contact
                </a>
            </div>

            <!-- CTA Button -->
            <div class="hidden lg:block">
                <a href="{{ route('quotation.create') }}" class="bg-accent text-primary-bg px-6 py-2.5 rounded-lg font-semibold hover:shadow-lg hover:shadow-accent/50 transition-all duration-300 hover:-translate-y-0.5">
                    Request Quote
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden text-text-main hover:text-accent transition-colors">
                <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="lg:hidden border-t border-secondary-bg">
        <div class="px-4 py-6 space-y-4">
            <a href="{{ route('home') }}" class="block py-2 hover:text-accent transition-colors {{ request()->routeIs('home') ? 'text-accent' : '' }}">Home</a>
            <a href="{{ route('about') }}" class="block py-2 hover:text-accent transition-colors {{ request()->routeIs('about') ? 'text-accent' : '' }}">About</a>
            <a href="{{ route('services') }}" class="block py-2 hover:text-accent transition-colors {{ request()->routeIs('services*') ? 'text-accent' : '' }}">Services</a>
            <a href="{{ route('portfolio.index') }}" class="block py-2 hover:text-accent transition-colors {{ request()->routeIs('portfolio*') ? 'text-accent' : '' }}">Portfolio</a>
            <a href="{{ route('contact') }}" class="block py-2 hover:text-accent transition-colors {{ request()->routeIs('contact') ? 'text-accent' : '' }}">Contact</a>
            <a href="{{ route('quotation.create') }}" class="block bg-accent text-primary-bg px-6 py-3 rounded-lg font-semibold text-center hover:shadow-lg hover:shadow-accent/50 transition-all">
                Request Quote
            </a>
        </div>
    </div>
</nav>

<style>
    .nav-link {
        @apply text-text-main hover:text-accent transition-colors duration-300 font-medium relative;
    }

    .nav-link.active {
        @apply text-accent;
    }

    .nav-link.active::after {
        content: '';
        @apply absolute bottom-0 left-0 w-full h-0.5 bg-accent;
    }
</style>
