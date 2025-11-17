<x-app-layout>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0 bg-primary-bg">
            <div class="absolute inset-0 bg-gradient-to-br from-accent/5 to-transparent"></div>
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(0, 255, 255, 0.1) 1px, transparent 0); background-size: 40px 40px;"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <!-- Heading -->
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                    <span class="text-text-main">Transform Your Business with</span>
                    <span class="text-accent block mt-2">Innovative Solutions</span>
                </h1>

                <!-- Subheading -->
                <p class="text-xl md:text-2xl text-text-main/80 mb-12 leading-relaxed">
                    We deliver cutting-edge technology solutions that drive growth, enhance efficiency, and create lasting impact.
                </p>

                <!-- CTAs -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('quotation.create') }}" class="bg-accent text-primary-bg px-8 py-4 rounded-lg font-semibold text-lg hover:shadow-lg hover:shadow-accent/50 transition-all duration-300 hover:-translate-y-1">
                        Request a Quote
                    </a>
                    <a href="{{ route('portfolio.index') }}" class="border-2 border-accent text-accent px-8 py-4 rounded-lg font-semibold text-lg hover:bg-accent hover:text-primary-bg transition-all duration-300 hover:-translate-y-1">
                        View Our Work
                    </a>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- Featured Projects Section -->
    <section class="py-20 lg:py-32">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-text-main mb-4">
                    Featured <span class="text-accent">Projects</span>
                </h2>
                <p class="text-xl text-text-main/70 max-w-2xl mx-auto">
                    Discover how we've helped businesses achieve their goals through innovative technology solutions
                </p>
            </div>

            <!-- Livewire Component -->
            <livewire:public.featured-projects />

            <!-- View All Button -->
            <div class="text-center mt-12">
                <a href="{{ route('portfolio.index') }}" class="inline-block border-2 border-accent text-accent px-8 py-3 rounded-lg font-semibold hover:bg-accent hover:text-primary-bg transition-all duration-300">
                    View All Projects
                </a>
            </div>
        </div>
    </section>

    <!-- Mission/Services Section -->
    <section class="py-20 lg:py-32 bg-secondary-bg/50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Mission Content -->
                <div>
                    <h2 class="text-4xl md:text-5xl font-bold text-text-main mb-6">
                        Our <span class="text-accent">Mission</span>
                    </h2>
                    <p class="text-lg text-text-main/80 leading-relaxed mb-6">
                        At TECH DOMAIN, we're committed to delivering exceptional technology solutions that empower businesses to thrive in the digital age. Our team of experts combines technical excellence with creative innovation to transform your vision into reality.
                    </p>
                    <p class="text-lg text-text-main/80 leading-relaxed">
                        With over a decade of experience, we've helped hundreds of clients across various industries achieve their digital transformation goals.
                    </p>
                </div>

                <!-- Services List -->
                <div class="space-y-4">
                    <h3 class="text-2xl font-bold text-accent mb-6">What We Offer</h3>

                    <div class="space-y-4">
                        <div class="flex items-start space-x-4 p-4 bg-primary-bg rounded-lg hover:bg-secondary-bg transition-colors">
                            <div class="flex-shrink-0 w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-text-main mb-1">Web Development</h4>
                                <p class="text-sm text-text-main/70">Custom web applications built with modern frameworks</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4 p-4 bg-primary-bg rounded-lg hover:bg-secondary-bg transition-colors">
                            <div class="flex-shrink-0 w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-text-main mb-1">Mobile Development</h4>
                                <p class="text-sm text-text-main/70">Native and cross-platform mobile applications</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4 p-4 bg-primary-bg rounded-lg hover:bg-secondary-bg transition-colors">
                            <div class="flex-shrink-0 w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-text-main mb-1">E-commerce Solutions</h4>
                                <p class="text-sm text-text-main/70">Scalable online stores with seamless user experience</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4 p-4 bg-primary-bg rounded-lg hover:bg-secondary-bg transition-colors">
                            <div class="flex-shrink-0 w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-text-main mb-1">CMS Development</h4>
                                <p class="text-sm text-text-main/70">Powerful content management systems</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partner Showcase Section -->
    <section class="py-20 lg:py-32">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-text-main mb-4">
                    Trusted By <span class="text-accent">Industry Leaders</span>
                </h2>
                <p class="text-xl text-text-main/70">
                    We're proud to partner with amazing companies
                </p>
            </div>

            <!-- Livewire Component -->
            <livewire:public.partner-logos />
        </div>
    </section>

    <!-- Final CTA Section -->
    <section class="py-20 lg:py-32 bg-gradient-to-r from-accent/10 to-highlight/10 border-y border-accent/20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-text-main mb-6">
                Ready to Transform Your Business?
            </h2>
            <p class="text-xl text-text-main/80 mb-10 max-w-2xl mx-auto">
                Let's discuss how we can help you achieve your digital transformation goals
            </p>
            <a href="{{ route('quotation.create') }}" class="inline-block bg-accent text-primary-bg px-10 py-4 rounded-lg font-semibold text-lg hover:shadow-lg hover:shadow-accent/50 transition-all duration-300 hover:-translate-y-1">
                Get Started Today
            </a>
        </div>
    </section>

</x-app-layout>
