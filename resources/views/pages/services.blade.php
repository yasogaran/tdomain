<x-app-layout>

    <!-- Hero Section -->
    <section class="relative py-20 lg:py-32 overflow-hidden">
        <!-- Background -->
        <div class="absolute inset-0 bg-primary-bg">
            <div class="absolute inset-0 bg-gradient-to-br from-accent/5 to-transparent"></div>
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(0, 255, 255, 0.1) 1px, transparent 0); background-size: 40px 40px;"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-5xl md:text-6xl font-bold text-text-main mb-6">
                    Our <span class="text-accent">Services</span>
                </h1>
                <p class="text-xl text-text-main/80 leading-relaxed">
                    Comprehensive technology solutions tailored to your business needs
                </p>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="py-16 lg:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Service 1: Web Development -->
                <div class="bg-secondary-bg rounded-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/20 group">
                    <div class="w-16 h-16 bg-accent/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-accent/20 transition-colors">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-text-main mb-4 group-hover:text-accent transition-colors">Web Development</h3>
                    <p class="text-text-main/70 mb-6 leading-relaxed">
                        Custom web applications built with modern frameworks like React, Vue.js, and Laravel. We create scalable, high-performance web solutions.
                    </p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center space-x-2 text-text-main/70 text-sm">
                            <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Responsive Design</span>
                        </li>
                        <li class="flex items-center space-x-2 text-text-main/70 text-sm">
                            <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Progressive Web Apps</span>
                        </li>
                        <li class="flex items-center space-x-2 text-text-main/70 text-sm">
                            <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>API Integration</span>
                        </li>
                    </ul>
                    <a href="#" class="inline-flex items-center space-x-2 text-accent hover:text-highlight transition-colors font-medium">
                        <span>Learn More</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Service 2: Mobile Development -->
                <div class="bg-secondary-bg rounded-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/20 group">
                    <div class="w-16 h-16 bg-accent/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-accent/20 transition-colors">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-text-main mb-4 group-hover:text-accent transition-colors">Mobile Development</h3>
                    <p class="text-text-main/70 mb-6 leading-relaxed">
                        Native and cross-platform mobile applications for iOS and Android using React Native, Flutter, and native technologies.
                    </p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center space-x-2 text-text-main/70 text-sm">
                            <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>iOS & Android Apps</span>
                        </li>
                        <li class="flex items-center space-x-2 text-text-main/70 text-sm">
                            <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Cross-Platform Solutions</span>
                        </li>
                        <li class="flex items-center space-x-2 text-text-main/70 text-sm">
                            <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>App Store Deployment</span>
                        </li>
                    </ul>
                    <a href="#" class="inline-flex items-center space-x-2 text-accent hover:text-highlight transition-colors font-medium">
                        <span>Learn More</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Service 3: E-commerce Solutions -->
                <div class="bg-secondary-bg rounded-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/20 group">
                    <div class="w-16 h-16 bg-accent/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-accent/20 transition-colors">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-text-main mb-4 group-hover:text-accent transition-colors">E-commerce Solutions</h3>
                    <p class="text-text-main/70 mb-6 leading-relaxed">
                        Full-featured online stores with secure payment processing, inventory management, and seamless user experiences.
                    </p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center space-x-2 text-text-main/70 text-sm">
                            <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Payment Gateway Integration</span>
                        </li>
                        <li class="flex items-center space-x-2 text-text-main/70 text-sm">
                            <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Inventory Management</span>
                        </li>
                        <li class="flex items-center space-x-2 text-text-main/70 text-sm">
                            <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Order Processing</span>
                        </li>
                    </ul>
                    <a href="#" class="inline-flex items-center space-x-2 text-accent hover:text-highlight transition-colors font-medium">
                        <span>Learn More</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Service 4: CMS Development -->
                <div class="bg-secondary-bg rounded-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/20 group">
                    <div class="w-16 h-16 bg-accent/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-accent/20 transition-colors">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-text-main mb-4 group-hover:text-accent transition-colors">CMS Development</h3>
                    <p class="text-text-main/70 mb-6 leading-relaxed">
                        Powerful content management systems that give you full control over your website content with intuitive interfaces.
                    </p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center space-x-2 text-text-main/70 text-sm">
                            <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>User-Friendly Admin Panel</span>
                        </li>
                        <li class="flex items-center space-x-2 text-text-main/70 text-sm">
                            <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Multi-User Management</span>
                        </li>
                        <li class="flex items-center space-x-2 text-text-main/70 text-sm">
                            <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>SEO Optimization</span>
                        </li>
                    </ul>
                    <a href="#" class="inline-flex items-center space-x-2 text-accent hover:text-highlight transition-colors font-medium">
                        <span>Learn More</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Service 5: Cloud Solutions -->
                <div class="bg-secondary-bg rounded-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/20 group">
                    <div class="w-16 h-16 bg-accent/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-accent/20 transition-colors">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-text-main mb-4 group-hover:text-accent transition-colors">Cloud Solutions</h3>
                    <p class="text-text-main/70 mb-6 leading-relaxed">
                        Cloud infrastructure setup, migration, and management using AWS, Azure, and Google Cloud Platform.
                    </p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center space-x-2 text-text-main/70 text-sm">
                            <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Cloud Migration</span>
                        </li>
                        <li class="flex items-center space-x-2 text-text-main/70 text-sm">
                            <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Infrastructure as Code</span>
                        </li>
                        <li class="flex items-center space-x-2 text-text-main/70 text-sm">
                            <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>DevOps Implementation</span>
                        </li>
                    </ul>
                    <a href="#" class="inline-flex items-center space-x-2 text-accent hover:text-highlight transition-colors font-medium">
                        <span>Learn More</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Service 6: Consulting -->
                <div class="bg-secondary-bg rounded-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/20 group">
                    <div class="w-16 h-16 bg-accent/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-accent/20 transition-colors">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-text-main mb-4 group-hover:text-accent transition-colors">IT Consulting</h3>
                    <p class="text-text-main/70 mb-6 leading-relaxed">
                        Strategic technology consulting to help you make informed decisions about your digital transformation journey.
                    </p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center space-x-2 text-text-main/70 text-sm">
                            <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Technology Strategy</span>
                        </li>
                        <li class="flex items-center space-x-2 text-text-main/70 text-sm">
                            <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Architecture Design</span>
                        </li>
                        <li class="flex items-center space-x-2 text-text-main/70 text-sm">
                            <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Process Optimization</span>
                        </li>
                    </ul>
                    <a href="#" class="inline-flex items-center space-x-2 text-accent hover:text-highlight transition-colors font-medium">
                        <span>Learn More</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="py-20 lg:py-32 bg-secondary-bg/50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-text-main mb-4">
                    Our <span class="text-accent">Process</span>
                </h2>
                <p class="text-xl text-text-main/70 max-w-2xl mx-auto">
                    A proven methodology that delivers results
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-accent/10 rounded-full flex items-center justify-center mx-auto mb-6 border-4 border-accent">
                        <span class="text-3xl font-bold text-accent">1</span>
                    </div>
                    <h3 class="text-xl font-bold text-text-main mb-3">Discovery</h3>
                    <p class="text-text-main/70">
                        We understand your goals, challenges, and requirements
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-accent/10 rounded-full flex items-center justify-center mx-auto mb-6 border-4 border-accent">
                        <span class="text-3xl font-bold text-accent">2</span>
                    </div>
                    <h3 class="text-xl font-bold text-text-main mb-3">Planning</h3>
                    <p class="text-text-main/70">
                        We design a comprehensive strategy and roadmap
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-accent/10 rounded-full flex items-center justify-center mx-auto mb-6 border-4 border-accent">
                        <span class="text-3xl font-bold text-accent">3</span>
                    </div>
                    <h3 class="text-xl font-bold text-text-main mb-3">Development</h3>
                    <p class="text-text-main/70">
                        We build your solution with agile methodology
                    </p>
                </div>

                <!-- Step 4 -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-accent/10 rounded-full flex items-center justify-center mx-auto mb-6 border-4 border-accent">
                        <span class="text-3xl font-bold text-accent">4</span>
                    </div>
                    <h3 class="text-xl font-bold text-text-main mb-3">Delivery</h3>
                    <p class="text-text-main/70">
                        We deploy and support your finished product
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 lg:py-32 bg-gradient-to-r from-accent/10 to-highlight/10 border-y border-accent/20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-text-main mb-6">
                Ready to Get Started?
            </h2>
            <p class="text-xl text-text-main/80 mb-10 max-w-2xl mx-auto">
                Let's discuss which services are right for your project
            </p>
            <a href="{{ route('quotation.create') }}" class="inline-block bg-accent text-primary-bg px-10 py-4 rounded-lg font-semibold text-lg hover:shadow-lg hover:shadow-accent/50 transition-all duration-300 hover:-translate-y-1">
                Request a Quote
            </a>
        </div>
    </section>

</x-app-layout>
