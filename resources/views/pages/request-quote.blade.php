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
                    Request a <span class="text-accent">Quote</span>
                </h1>
                <p class="text-xl text-text-main/80 leading-relaxed">
                    Tell us about your project and we'll get back to you with a detailed proposal tailored to your needs.
                </p>
            </div>

            <!-- Quotation Form Livewire Component -->
            <div class="max-w-4xl mx-auto">
                <livewire:public.quotation-form />
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-20 lg:py-32 bg-secondary-bg/50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-text-main mb-4">
                    Why <span class="text-accent">Choose Us</span>
                </h2>
                <p class="text-xl text-text-main/70">
                    We're committed to delivering excellence at every step
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-primary-bg rounded-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/20">
                    <div class="w-16 h-16 bg-accent/10 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-text-main mb-3">Proven Expertise</h3>
                    <p class="text-text-main/70">
                        Over a decade of experience delivering successful projects across various industries.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-primary-bg rounded-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/20">
                    <div class="w-16 h-16 bg-accent/10 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-text-main mb-3">Fast Delivery</h3>
                    <p class="text-text-main/70">
                        Agile development process ensures timely delivery without compromising quality.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-primary-bg rounded-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/20">
                    <div class="w-16 h-16 bg-accent/10 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-text-main mb-3">Competitive Pricing</h3>
                    <p class="text-text-main/70">
                        Transparent pricing with no hidden costs. Get the best value for your investment.
                    </p>
                </div>

                <!-- Feature 4 -->
                <div class="bg-primary-bg rounded-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/20">
                    <div class="w-16 h-16 bg-accent/10 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-text-main mb-3">Dedicated Team</h3>
                    <p class="text-text-main/70">
                        A dedicated team of experts working collaboratively on your project.
                    </p>
                </div>

                <!-- Feature 5 -->
                <div class="bg-primary-bg rounded-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/20">
                    <div class="w-16 h-16 bg-accent/10 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-text-main mb-3">24/7 Support</h3>
                    <p class="text-text-main/70">
                        Ongoing support and maintenance to keep your systems running smoothly.
                    </p>
                </div>

                <!-- Feature 6 -->
                <div class="bg-primary-bg rounded-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/20">
                    <div class="w-16 h-16 bg-accent/10 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-text-main mb-3">Quality Guaranteed</h3>
                    <p class="text-text-main/70">
                        Rigorous testing and quality assurance for flawless final products.
                    </p>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
