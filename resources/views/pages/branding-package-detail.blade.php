<x-app-layout>

    <!-- Hero Section with Featured Image -->
    <section class="relative h-[60vh] lg:h-[70vh] overflow-hidden">
        @if($portfolio->media->first())
            <img src="{{ Storage::url($portfolio->media->first()->file_path) }}"
                 alt="{{ $portfolio->title }}"
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
                    @if($portfolio->keywords)
                        <div class="flex flex-wrap gap-3 mb-4">
                            @foreach($portfolio->keywords_array as $keyword)
                                <span class="px-4 py-2 bg-accent/20 backdrop-blur-sm rounded-lg text-sm font-medium text-accent border border-accent/30">
                                    {{ $keyword }}
                                </span>
                            @endforeach
                        </div>
                    @endif
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-text-main mb-4">
                        {{ $portfolio->title }}
                    </h1>
                    @if($portfolio->media->count() > 0)
                        <div class="flex items-center space-x-2 text-text-main/80">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>{{ $portfolio->media->count() }} {{ Str::plural('Image', $portfolio->media->count()) }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Details -->
    <section class="py-16 lg:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">

                <!-- About Section -->
                @if($portfolio->about)
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-text-main mb-6">
                        About This <span class="text-accent">Project</span>
                    </h2>
                    <div class="bg-secondary-bg rounded-xl p-8 border border-text-main/10">
                        <p class="text-text-main/80 text-lg leading-relaxed">
                            {{ $portfolio->about }}
                        </p>
                    </div>
                </div>
                @endif

                <!-- Gallery Section -->
                @if($portfolio->media && $portfolio->media->count() > 1)
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-text-main mb-6">
                        Project <span class="text-accent">Gallery</span>
                    </h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        @foreach($portfolio->media->skip(1) as $media)
                        <div class="aspect-video rounded-xl overflow-hidden transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/20 cursor-pointer group">
                            <img src="{{ Storage::url($media->file_path) }}"
                                 alt="{{ $media->caption ?? $portfolio->title }}"
                                 class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500"
                                 onclick="openLightbox('{{ Storage::url($media->file_path) }}')">
                            @if($media->caption)
                                <div class="absolute bottom-0 left-0 right-0 bg-primary-bg/90 backdrop-blur-sm p-3 text-text-main/90 text-sm">
                                    {{ $media->caption }}
                                </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Description Section -->
                @if($portfolio->description)
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-text-main mb-6">
                        Project <span class="text-accent">Details</span>
                    </h2>
                    <div class="prose prose-lg prose-invert max-w-none text-text-main/80 leading-relaxed bg-secondary-bg rounded-xl p-8 border border-text-main/10">
                        {!! $portfolio->description !!}
                    </div>
                </div>
                @endif

                <!-- Project Link -->
                @if($portfolio->link)
                <div class="text-center mt-12">
                    <a href="{{ $portfolio->link }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="inline-flex items-center space-x-2 bg-accent text-primary-bg px-8 py-4 rounded-lg font-semibold text-lg hover:shadow-lg hover:shadow-accent/50 transition-all duration-300 hover:-translate-y-1">
                        <span>View Project</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                    </a>
                </div>
                @endif

            </div>
        </div>
    </section>

    <!-- Related Portfolios -->
    @if($relatedPortfolios->count() > 0)
    <section class="py-16 lg:py-24 bg-secondary-bg/30">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-bold text-text-main mb-4">
                    Related <span class="text-accent">Projects</span>
                </h2>
                <p class="text-xl text-text-main/80">
                    Explore more of our branding work
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($relatedPortfolios as $relatedPortfolio)
                    <a href="{{ route('branding-packages.show', $relatedPortfolio->slug) }}"
                       class="group bg-secondary-bg rounded-xl overflow-hidden border border-text-main/10 hover:border-accent/30 transition-all duration-300 transform hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/10">
                        <!-- Thumbnail -->
                        <div class="relative aspect-video bg-primary-bg overflow-hidden">
                            @if($relatedPortfolio->media->first())
                                <img src="{{ Storage::url($relatedPortfolio->media->first()->file_path) }}"
                                     alt="{{ $relatedPortfolio->title }}"
                                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-16 h-16 text-text-main/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif

                            <!-- Image Count -->
                            @if($relatedPortfolio->media->count() > 0)
                                <div class="absolute top-3 right-3 bg-primary-bg/90 backdrop-blur-sm px-3 py-1 rounded-lg text-sm font-medium text-text-main">
                                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ $relatedPortfolio->media->count() }}
                                </div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-text-main mb-2 group-hover:text-accent transition-colors">
                                {{ $relatedPortfolio->title }}
                            </h3>

                            <p class="text-text-main/70 text-sm mb-4 line-clamp-2">
                                {{ Str::limit($relatedPortfolio->about, 100) }}
                            </p>

                            @if($relatedPortfolio->keywords)
                                <div class="flex flex-wrap gap-2">
                                    @foreach(array_slice($relatedPortfolio->keywords_array, 0, 3) as $keyword)
                                        <span class="px-2 py-1 bg-accent/10 text-accent text-xs rounded">
                                            {{ $keyword }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Back to Branding Packages -->
    <section class="pb-16 lg:pb-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <a href="{{ route('branding-packages.index') }}"
                   class="inline-flex items-center space-x-2 border-2 border-accent text-accent px-8 py-3 rounded-lg font-semibold hover:bg-accent hover:text-primary-bg transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>Back to Branding Packages</span>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 lg:py-32 bg-gradient-to-r from-accent/10 to-highlight/10 border-y border-accent/20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-text-main mb-6">
                Need Similar Branding Work?
            </h2>
            <p class="text-xl text-text-main/80 mb-10 max-w-2xl mx-auto">
                Let's create a stunning brand identity for your business
            </p>
            <a href="{{ route('quotation.create') }}" class="inline-block bg-accent text-primary-bg px-10 py-4 rounded-lg font-semibold text-lg hover:shadow-lg hover:shadow-accent/50 transition-all duration-300 hover:-translate-y-1">
                Request a Quote
            </a>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="fixed inset-0 bg-black/95 z-50 hidden items-center justify-center p-4" onclick="closeLightbox()">
        <div class="relative max-w-7xl max-h-full">
            <button onclick="closeLightbox()" class="absolute -top-12 right-0 text-white hover:text-accent transition-colors">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <img id="lightbox-image" src="" alt="" class="max-w-full max-h-[90vh] object-contain rounded-lg">
        </div>
    </div>

    @push('scripts')
    <script>
        function openLightbox(imageSrc) {
            const lightbox = document.getElementById('lightbox');
            const lightboxImage = document.getElementById('lightbox-image');
            lightboxImage.src = imageSrc;
            lightbox.classList.remove('hidden');
            lightbox.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.add('hidden');
            lightbox.classList.remove('flex');
            document.body.style.overflow = '';
        }

        // Close on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeLightbox();
            }
        });
    </script>
    @endpush

</x-app-layout>
