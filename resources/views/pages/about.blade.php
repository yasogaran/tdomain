<x-app-layout>

    <!-- Hero Section -->
    <section class="relative py-20 lg:py-32 overflow-hidden">
        <!-- Background -->
        <div class="absolute inset-0 bg-primary-bg">
            <div class="absolute inset-0 bg-gradient-to-br from-accent/5 to-transparent"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-5xl md:text-6xl font-bold text-text-main mb-6">
                    About <span class="text-accent">Us</span>
                </h1>
                <p class="text-xl text-text-main/80 leading-relaxed">
                    We're a passionate team of technologists dedicated to transforming businesses through innovative digital solutions.
                </p>
            </div>
        </div>
    </section>

    <!-- Company Story Section -->
    <section class="py-16 lg:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Content -->
                <div>
                    <h2 class="text-4xl md:text-5xl font-bold text-text-main mb-6">
                        Our <span class="text-accent">Story</span>
                    </h2>
                    <div class="space-y-4 text-lg text-text-main/80 leading-relaxed">
                        <p>
                            Founded over a decade ago, TECH DOMAIN started with a simple vision: to help businesses harness the power of technology to achieve their goals. What began as a small team of passionate developers has grown into a full-service technology partner.
                        </p>
                        <p>
                            Today, we work with clients across various industries, from startups to enterprise organizations, delivering custom solutions that drive real business results. Our commitment to excellence and innovation has made us a trusted partner for digital transformation.
                        </p>
                        <p>
                            We believe in building lasting relationships with our clients, understanding their unique challenges, and crafting solutions that not only meet their current needs but also position them for future success.
                        </p>
                    </div>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-secondary-bg rounded-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/20">
                        <div class="text-5xl font-bold text-accent mb-2">10+</div>
                        <div class="text-text-main/70 font-medium">Years Experience</div>
                    </div>

                    <div class="bg-secondary-bg rounded-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/20">
                        <div class="text-5xl font-bold text-accent mb-2">500+</div>
                        <div class="text-text-main/70 font-medium">Projects Delivered</div>
                    </div>

                    <div class="bg-secondary-bg rounded-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/20">
                        <div class="text-5xl font-bold text-accent mb-2">300+</div>
                        <div class="text-text-main/70 font-medium">Happy Clients</div>
                    </div>

                    <div class="bg-secondary-bg rounded-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/20">
                        <div class="text-5xl font-bold text-accent mb-2">98%</div>
                        <div class="text-text-main/70 font-medium">Satisfaction Rate</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="py-16 lg:py-24 bg-secondary-bg/50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-text-main mb-4">
                    Our <span class="text-accent">Values</span>
                </h2>
                <p class="text-xl text-text-main/70 max-w-2xl mx-auto">
                    The principles that guide everything we do
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Value 1 -->
                <div class="bg-primary-bg rounded-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/20">
                    <div class="w-16 h-16 bg-accent/10 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-text-main mb-3">Innovation</h3>
                    <p class="text-text-main/70">
                        We constantly push boundaries to find creative solutions to complex challenges.
                    </p>
                </div>

                <!-- Value 2 -->
                <div class="bg-primary-bg rounded-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/20">
                    <div class="w-16 h-16 bg-accent/10 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-text-main mb-3">Excellence</h3>
                    <p class="text-text-main/70">
                        We're committed to delivering exceptional quality in every project we undertake.
                    </p>
                </div>

                <!-- Value 3 -->
                <div class="bg-primary-bg rounded-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/20">
                    <div class="w-16 h-16 bg-accent/10 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-text-main mb-3">Collaboration</h3>
                    <p class="text-text-main/70">
                        We work closely with our clients as partners in achieving their vision.
                    </p>
                </div>

                <!-- Value 4 -->
                <div class="bg-primary-bg rounded-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/20">
                    <div class="w-16 h-16 bg-accent/10 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-text-main mb-3">Agility</h3>
                    <p class="text-text-main/70">
                        We adapt quickly to changes and embrace flexible approaches to development.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-16 lg:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-text-main mb-4">
                    Meet Our <span class="text-accent">Team</span>
                </h2>
                <p class="text-xl text-text-main/70 max-w-2xl mx-auto">
                    Talented professionals dedicated to your success
                </p>
            </div>

            <!-- Team Showcase Livewire Component -->
            <livewire:public.team-showcase />
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 lg:py-32 bg-gradient-to-r from-accent/10 to-highlight/10 border-y border-accent/20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-text-main mb-6">
                Ready to Work with Us?
            </h2>
            <p class="text-xl text-text-main/80 mb-10 max-w-2xl mx-auto">
                Let's discuss how we can help transform your business
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('quotation.create') }}" class="inline-block bg-accent text-primary-bg px-10 py-4 rounded-lg font-semibold text-lg hover:shadow-lg hover:shadow-accent/50 transition-all duration-300 hover:-translate-y-1">
                    Request a Quote
                </a>
                <a href="{{ route('contact') }}" class="inline-block border-2 border-accent text-accent px-10 py-4 rounded-lg font-semibold text-lg hover:bg-accent hover:text-primary-bg transition-all duration-300 hover:-translate-y-1">
                    Contact Us
                </a>
            </div>
        </div>
    </section>

</x-app-layout>
