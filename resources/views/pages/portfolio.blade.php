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
                    Our <span class="text-accent">Portfolio</span>
                </h1>
                <p class="text-xl text-text-main/80 leading-relaxed">
                    Explore our collection of successful projects that showcase our expertise in delivering cutting-edge technology solutions.
                </p>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section class="py-16 lg:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Livewire Component -->
            <livewire:public.project-portfolio />
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 lg:py-32 bg-gradient-to-r from-accent/10 to-highlight/10 border-y border-accent/20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-text-main mb-6">
                Ready to Start Your Project?
            </h2>
            <p class="text-xl text-text-main/80 mb-10 max-w-2xl mx-auto">
                Let's work together to bring your vision to life
            </p>
            <a href="{{ route('quotation.create') }}" class="inline-block bg-accent text-primary-bg px-10 py-4 rounded-lg font-semibold text-lg hover:shadow-lg hover:shadow-accent/50 transition-all duration-300 hover:-translate-y-1">
                Request a Quote
            </a>
        </div>
    </section>

</x-app-layout>
