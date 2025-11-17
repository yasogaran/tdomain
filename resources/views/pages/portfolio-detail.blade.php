@props(['project'])

<x-app-layout>

    <!-- Hero Section with Featured Image -->
    <section class="relative h-[60vh] lg:h-[70vh] overflow-hidden">
        @if($project->featuredImage)
            <img src="{{ Storage::url($project->featuredImage->path) }}"
                 alt="{{ $project->title }}"
                 class="w-full h-full object-cover">
        @else
            <div class="w-full h-full bg-secondary-bg flex items-center justify-center">
                <svg class="w-32 h-32 text-text-main/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
        @endif

        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-primary-bg via-primary-bg/50 to-transparent"></div>

        <!-- Title Overlay -->
        <div class="absolute bottom-0 left-0 right-0 p-8 lg:p-16">
            <div class="container mx-auto">
                <div class="max-w-4xl">
                    <div class="flex flex-wrap gap-3 mb-4">
                        <span class="px-4 py-2 bg-accent/20 backdrop-blur-sm rounded-lg text-sm font-medium text-accent border border-accent/30">
                            {{ $project->industry }}
                        </span>
                        <span class="px-4 py-2 bg-text-main/10 backdrop-blur-sm rounded-lg text-sm font-medium text-text-main border border-text-main/20">
                            {{ $project->service_type }}
                        </span>
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-text-main mb-4">
                        {{ $project->title }}
                    </h1>
                    <p class="text-xl text-text-main/80">
                        {{ $project->client_name }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Project Details -->
    <section class="py-16 lg:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">

                <!-- Project Info Grid -->
                <div class="grid md:grid-cols-3 gap-8 mb-16">
                    <div class="bg-secondary-bg rounded-xl p-6 transform transition-all duration-300 hover:-translate-y-1">
                        <div class="text-accent text-sm font-semibold mb-2 uppercase tracking-wide">Client</div>
                        <div class="text-text-main text-lg font-medium">{{ $project->client_name }}</div>
                    </div>

                    <div class="bg-secondary-bg rounded-xl p-6 transform transition-all duration-300 hover:-translate-y-1">
                        <div class="text-accent text-sm font-semibold mb-2 uppercase tracking-wide">Industry</div>
                        <div class="text-text-main text-lg font-medium">{{ $project->industry }}</div>
                    </div>

                    <div class="bg-secondary-bg rounded-xl p-6 transform transition-all duration-300 hover:-translate-y-1">
                        <div class="text-accent text-sm font-semibold mb-2 uppercase tracking-wide">Service</div>
                        <div class="text-text-main text-lg font-medium">{{ $project->service_type }}</div>
                    </div>
                </div>

                <!-- Challenge Section -->
                @if($project->challenge)
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-text-main mb-6">
                        The <span class="text-accent">Challenge</span>
                    </h2>
                    <div class="prose prose-lg prose-invert max-w-none text-text-main/80 leading-relaxed">
                        {!! $project->challenge !!}
                    </div>
                </div>
                @endif

                <!-- Solution Section -->
                @if($project->solution)
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-text-main mb-6">
                        Our <span class="text-accent">Solution</span>
                    </h2>
                    <div class="prose prose-lg prose-invert max-w-none text-text-main/80 leading-relaxed">
                        {!! $project->solution !!}
                    </div>
                </div>
                @endif

                <!-- Results Section -->
                @if($project->results)
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-text-main mb-6">
                        The <span class="text-accent">Results</span>
                    </h2>
                    <div class="prose prose-lg prose-invert max-w-none text-text-main/80 leading-relaxed">
                        {!! $project->results !!}
                    </div>
                </div>
                @endif

                <!-- Technologies Section -->
                @if($project->technologies)
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-text-main mb-6">
                        <span class="text-accent">Technologies</span> Used
                    </h2>
                    <div class="flex flex-wrap gap-3">
                        @foreach(explode(',', $project->technologies) as $tech)
                        <span class="px-4 py-2 bg-secondary-bg rounded-lg text-text-main border border-accent/30 hover:border-accent transition-colors">
                            {{ trim($tech) }}
                        </span>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Gallery -->
                @if($project->galleryImages && $project->galleryImages->count() > 0)
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-text-main mb-6">
                        Project <span class="text-accent">Gallery</span>
                    </h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        @foreach($project->galleryImages as $image)
                        <div class="aspect-video rounded-xl overflow-hidden transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/20">
                            <img src="{{ Storage::url($image->path) }}"
                                 alt="{{ $image->alt_text }}"
                                 class="w-full h-full object-cover">
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Project URL -->
                @if($project->project_url)
                <div class="text-center mt-12">
                    <a href="{{ $project->project_url }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="inline-flex items-center space-x-2 bg-accent text-primary-bg px-8 py-4 rounded-lg font-semibold text-lg hover:shadow-lg hover:shadow-accent/50 transition-all duration-300 hover:-translate-y-1">
                        <span>Visit Live Project</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                    </a>
                </div>
                @endif

            </div>
        </div>
    </section>

    <!-- Back to Portfolio Button -->
    <section class="pb-16 lg:pb-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <a href="{{ route('portfolio.index') }}"
                   class="inline-flex items-center space-x-2 border-2 border-accent text-accent px-8 py-3 rounded-lg font-semibold hover:bg-accent hover:text-primary-bg transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>Back to Portfolio</span>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 lg:py-32 bg-gradient-to-r from-accent/10 to-highlight/10 border-y border-accent/20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-text-main mb-6">
                Have a Similar Project in Mind?
            </h2>
            <p class="text-xl text-text-main/80 mb-10 max-w-2xl mx-auto">
                Let's discuss how we can help bring your vision to life
            </p>
            <a href="{{ route('quotation.create') }}" class="inline-block bg-accent text-primary-bg px-10 py-4 rounded-lg font-semibold text-lg hover:shadow-lg hover:shadow-accent/50 transition-all duration-300 hover:-translate-y-1">
                Request a Quote
            </a>
        </div>
    </section>

</x-app-layout>
