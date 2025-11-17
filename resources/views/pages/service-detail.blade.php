<x-app-layout>

    <!-- Hero Section -->
    <section class="relative py-20 lg:py-32 overflow-hidden">
        <!-- Background -->
        <div class="absolute inset-0 bg-primary-bg">
            <div class="absolute inset-0 bg-gradient-to-br from-accent/5 to-transparent"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto">
                <div class="mb-6">
                    <a href="{{ route('services') }}" class="inline-flex items-center space-x-2 text-accent hover:text-highlight transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <span>Back to Services</span>
                    </a>
                </div>
                <h1 class="text-5xl md:text-6xl font-bold text-text-main mb-6">
                    {{ $title ?? 'Service Name' }}
                </h1>
                <p class="text-xl text-text-main/80 leading-relaxed">
                    {{ $subtitle ?? 'Complete solutions tailored to your business needs' }}
                </p>
            </div>
        </div>
    </section>

    <!-- Service Details -->
    <section class="py-16 lg:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">

                <!-- Overview -->
                <div class="mb-16">
                    <h2 class="text-3xl font-bold text-text-main mb-6">
                        <span class="text-accent">Overview</span>
                    </h2>
                    <div class="prose prose-lg prose-invert max-w-none text-text-main/80 leading-relaxed">
                        {!! $overview ?? '<p>Comprehensive service description goes here.</p>' !!}
                    </div>
                </div>

                <!-- Key Features -->
                <div class="mb-16">
                    <h2 class="text-3xl font-bold text-text-main mb-8">
                        Key <span class="text-accent">Features</span>
                    </h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        @isset($features)
                            @foreach($features as $feature)
                            <div class="flex items-start space-x-4 bg-secondary-bg rounded-lg p-6 hover:bg-secondary-bg/80 transition-colors">
                                <div class="flex-shrink-0 w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-text-main mb-2">{{ $feature['title'] }}</h3>
                                    <p class="text-sm text-text-main/70">{{ $feature['description'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="flex items-start space-x-4 bg-secondary-bg rounded-lg p-6">
                                <div class="flex-shrink-0 w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-text-main mb-2">Feature Title</h3>
                                    <p class="text-sm text-text-main/70">Feature description goes here</p>
                                </div>
                            </div>
                        @endisset
                    </div>
                </div>

                <!-- Technologies -->
                @isset($technologies)
                <div class="mb-16">
                    <h2 class="text-3xl font-bold text-text-main mb-8">
                        <span class="text-accent">Technologies</span> We Use
                    </h2>
                    <div class="flex flex-wrap gap-3">
                        @foreach($technologies as $tech)
                        <span class="px-4 py-2 bg-secondary-bg rounded-lg text-text-main border border-accent/30 hover:border-accent transition-colors">
                            {{ $tech }}
                        </span>
                        @endforeach
                    </div>
                </div>
                @endisset

                <!-- Process -->
                <div class="mb-16">
                    <h2 class="text-3xl font-bold text-text-main mb-8">
                        Our <span class="text-accent">Process</span>
                    </h2>
                    <div class="space-y-6">
                        @isset($process)
                            @foreach($process as $index => $step)
                            <div class="flex items-start space-x-4 bg-secondary-bg rounded-lg p-6 transform transition-all duration-300 hover:-translate-y-1">
                                <div class="flex-shrink-0 w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center">
                                    <span class="text-xl font-bold text-accent">{{ $index + 1 }}</span>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-text-main mb-2">{{ $step['title'] }}</h3>
                                    <p class="text-text-main/70">{{ $step['description'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="flex items-start space-x-4 bg-secondary-bg rounded-lg p-6">
                                <div class="flex-shrink-0 w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center">
                                    <span class="text-xl font-bold text-accent">1</span>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-text-main mb-2">Step Title</h3>
                                    <p class="text-text-main/70">Step description goes here</p>
                                </div>
                            </div>
                        @endisset
                    </div>
                </div>

                <!-- Benefits -->
                <div class="mb-16">
                    <h2 class="text-3xl font-bold text-text-main mb-8">
                        <span class="text-accent">Benefits</span>
                    </h2>
                    <div class="bg-secondary-bg rounded-xl p-8">
                        <ul class="space-y-4">
                            @isset($benefits)
                                @foreach($benefits as $benefit)
                                <li class="flex items-start space-x-3">
                                    <svg class="w-6 h-6 text-accent flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-text-main/80">{{ $benefit }}</span>
                                </li>
                                @endforeach
                            @else
                                <li class="flex items-start space-x-3">
                                    <svg class="w-6 h-6 text-accent flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-text-main/80">Benefit description goes here</span>
                                </li>
                            @endisset
                        </ul>
                    </div>
                </div>

                <!-- CTA -->
                <div class="text-center bg-gradient-to-r from-accent/10 to-highlight/10 rounded-2xl p-12 border border-accent/20">
                    <h3 class="text-3xl font-bold text-text-main mb-4">
                        Ready to Get Started?
                    </h3>
                    <p class="text-lg text-text-main/70 mb-8 max-w-xl mx-auto">
                        Contact us today to discuss how this service can help your business
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('quotation.create') }}" class="inline-block bg-accent text-primary-bg px-8 py-4 rounded-lg font-semibold hover:shadow-lg hover:shadow-accent/50 transition-all duration-300 hover:-translate-y-1">
                            Request a Quote
                        </a>
                        <a href="{{ route('contact') }}" class="inline-block border-2 border-accent text-accent px-8 py-4 rounded-lg font-semibold hover:bg-accent hover:text-primary-bg transition-all duration-300 hover:-translate-y-1">
                            Contact Us
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Related Projects -->
    @isset($relatedProjects)
    <section class="py-16 lg:py-24 bg-secondary-bg/50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-text-main mb-4">
                    Related <span class="text-accent">Projects</span>
                </h2>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($relatedProjects as $project)
                    <x-project-card :project="$project" />
                @endforeach
            </div>
        </div>
    </section>
    @endisset

</x-app-layout>
