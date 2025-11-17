@props(['project'])

<a href="{{ route('portfolio.show', $project->slug) }}" class="block group">
    <div class="bg-secondary-bg rounded-xl overflow-hidden transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/20">

        <!-- Image -->
        <div class="relative aspect-video overflow-hidden">
            @if($project->featuredImage)
                <img src="{{ Storage::url($project->featuredImage->path) }}"
                     alt="{{ $project->title }}"
                     class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
            @else
                <div class="w-full h-full bg-primary-bg flex items-center justify-center">
                    <svg class="w-20 h-20 text-text-main/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            @endif

            <!-- Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-primary-bg/90 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </div>

        <!-- Content -->
        <div class="p-6">
            <!-- Client Badge -->
            <div class="flex items-center space-x-2 mb-3">
                <span class="text-xs font-medium text-accent">{{ $project->client_name }}</span>
            </div>

            <!-- Title -->
            <h3 class="text-xl font-bold text-text-main mb-2 group-hover:text-accent transition-colors">
                {{ $project->title }}
            </h3>

            <!-- Description -->
            @if($project->challenge)
                <p class="text-text-main/70 text-sm mb-4 line-clamp-2">
                    {{ Str::limit(strip_tags($project->challenge), 120) }}
                </p>
            @endif

            <!-- Meta Tags -->
            <div class="flex flex-wrap gap-2">
                <span class="px-3 py-1 bg-primary-bg rounded-full text-xs text-accent border border-accent/30">
                    {{ $project->industry }}
                </span>
                <span class="px-3 py-1 bg-primary-bg rounded-full text-xs text-text-main/70 border border-text-main/20">
                    {{ $project->service_type }}
                </span>
            </div>
        </div>
    </div>
</a>
