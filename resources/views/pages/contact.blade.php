<x-app-layout>

    <!-- Hero Section -->
    <section class="relative py-20 lg:py-32 overflow-hidden">
        <!-- Background -->
        <div class="absolute inset-0 bg-primary-bg">
            <div class="absolute inset-0 bg-gradient-to-br from-accent/5 to-transparent"></div>
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(0, 255, 255, 0.1) 1px, transparent 0); background-size: 40px 40px;"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center mb-16">
                <h1 class="text-5xl md:text-6xl font-bold text-text-main mb-6">
                    Get in <span class="text-accent">Touch</span>
                </h1>
                <p class="text-xl text-text-main/80 leading-relaxed">
                    Have a question or want to discuss a project? We'd love to hear from you.
                </p>
            </div>

            <!-- Contact Form and Info Grid -->
            <div class="grid lg:grid-cols-3 gap-12 max-w-6xl mx-auto">

                <!-- Contact Form (2/3 width) -->
                <div class="lg:col-span-2">
                    <div class="bg-secondary-bg rounded-xl p-8 lg:p-10">
                        <h2 class="text-2xl font-bold text-text-main mb-6">Send us a Message</h2>

                        <!-- Livewire Contact Form Component -->
                        <livewire:public.contact-form />
                    </div>
                </div>

                <!-- Contact Info (1/3 width) -->
                <div class="space-y-6">

                    <!-- Office Location -->
                    <div class="bg-secondary-bg rounded-xl p-6 transform transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-accent/10">
                        <div class="w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-text-main mb-2">Office Address</h3>
                        <p class="text-text-main/70 text-sm leading-relaxed">
                            123 Business Avenue<br>
                            Tech City, TC 12345<br>
                            United States
                        </p>
                    </div>

                    <!-- Email -->
                    <div class="bg-secondary-bg rounded-xl p-6 transform transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-accent/10">
                        <div class="w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-text-main mb-2">Email Us</h3>
                        <a href="mailto:info@techdomain.com" class="text-accent hover:text-highlight transition-colors text-sm">
                            info@techdomain.com
                        </a>
                        <p class="text-text-main/70 text-sm mt-1">
                            support@techdomain.com
                        </p>
                    </div>

                    <!-- Phone -->
                    <div class="bg-secondary-bg rounded-xl p-6 transform transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-accent/10">
                        <div class="w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-text-main mb-2">Call Us</h3>
                        <a href="tel:+15551234567" class="text-accent hover:text-highlight transition-colors text-sm">
                            +1 (555) 123-4567
                        </a>
                        <p class="text-text-main/70 text-sm mt-1">
                            Mon-Fri: 9AM - 6PM
                        </p>
                    </div>

                    <!-- Social Links -->
                    <div class="bg-secondary-bg rounded-xl p-6 transform transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-accent/10">
                        <h3 class="text-lg font-semibold text-text-main mb-4">Follow Us</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-accent/10 rounded-lg flex items-center justify-center hover:bg-accent/20 transition-colors">
                                <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-accent/10 rounded-lg flex items-center justify-center hover:bg-accent/20 transition-colors">
                                <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-accent/10 rounded-lg flex items-center justify-center hover:bg-accent/20 transition-colors">
                                <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Map Section (Optional) -->
    <section class="py-16 lg:py-24 bg-secondary-bg/50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="rounded-xl overflow-hidden" style="height: 400px;">
                <!-- Placeholder for map - can be replaced with Google Maps embed -->
                <div class="w-full h-full bg-primary-bg flex items-center justify-center border border-accent/20">
                    <div class="text-center">
                        <svg class="w-16 h-16 text-accent mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                        </svg>
                        <p class="text-text-main/70">Map integration can be added here</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ or Additional Info Section -->
    <section class="py-16 lg:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl font-bold text-text-main mb-6">
                    Have Questions?
                </h2>
                <p class="text-xl text-text-main/70 mb-8">
                    Check out our FAQ or schedule a consultation to discuss your project in detail
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('quotation.create') }}" class="inline-block bg-accent text-primary-bg px-8 py-4 rounded-lg font-semibold hover:shadow-lg hover:shadow-accent/50 transition-all duration-300 hover:-translate-y-1">
                        Request a Quote
                    </a>
                    <a href="{{ route('about') }}" class="inline-block border-2 border-accent text-accent px-8 py-4 rounded-lg font-semibold hover:bg-accent hover:text-primary-bg transition-all duration-300 hover:-translate-y-1">
                        Learn More About Us
                    </a>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
