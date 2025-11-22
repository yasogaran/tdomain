<x-admin-layout>
    <x-slot name="title">Graphic Portfolios</x-slot>

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-text-main mb-2">Graphic Portfolios</h1>
                <p class="text-text-main/60">Manage your branding and graphic design portfolio</p>
            </div>
            <a href="{{ route('admin.graphic-portfolios.create') }}"
               class="px-6 py-3 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                Add New Portfolio
            </a>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 bg-highlight/10 border border-highlight/20 text-highlight px-6 py-4 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Portfolios Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($portfolios as $portfolio)
            <div class="bg-secondary-bg rounded-xl overflow-hidden border border-text-main/10 hover:border-accent/30 transition-all duration-300 group">
                <!-- Thumbnail -->
                <div class="relative aspect-video bg-primary-bg overflow-hidden">
                    @if($portfolio->media->first())
                        <img src="{{ Storage::url($portfolio->media->first()->file_path) }}"
                             alt="{{ $portfolio->title }}"
                             class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <svg class="w-16 h-16 text-text-main/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif

                    <!-- Image Count Badge -->
                    @if($portfolio->media->count() > 0)
                        <div class="absolute top-3 right-3 bg-primary-bg/90 backdrop-blur-sm px-3 py-1 rounded-lg text-sm font-medium text-text-main">
                            <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            {{ $portfolio->media->count() }}
                        </div>
                    @endif

                    <!-- Status Badge -->
                    <div class="absolute top-3 left-3">
                        <span class="px-3 py-1 rounded-full text-xs font-medium backdrop-blur-sm
                            @if($portfolio->status === 'published') bg-highlight/90 text-primary-bg
                            @else bg-yellow-500/90 text-primary-bg
                            @endif">
                            {{ ucfirst($portfolio->status) }}
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <h3 class="text-lg font-bold text-text-main mb-2 group-hover:text-accent transition-colors">
                        {{ $portfolio->title }}
                    </h3>

                    <p class="text-text-main/60 text-sm mb-4 line-clamp-2">
                        {{ Str::limit($portfolio->about, 100) }}
                    </p>

                    @if($portfolio->keywords)
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach(array_slice($portfolio->keywords_array, 0, 3) as $keyword)
                                <span class="px-2 py-1 bg-accent/10 text-accent text-xs rounded">
                                    {{ $keyword }}
                                </span>
                            @endforeach
                            @if(count($portfolio->keywords_array) > 3)
                                <span class="px-2 py-1 bg-text-main/10 text-text-main/60 text-xs rounded">
                                    +{{ count($portfolio->keywords_array) - 3 }}
                                </span>
                            @endif
                        </div>
                    @endif

                    <!-- Actions -->
                    <div class="flex items-center justify-between pt-4 border-t border-text-main/10">
                        <div class="flex items-center space-x-3">
                            <a href="{{ route('admin.graphic-portfolios.show', $portfolio) }}"
                               class="text-accent hover:text-highlight transition-colors text-sm font-medium">
                                View
                            </a>
                            <a href="{{ route('admin.graphic-portfolios.edit', $portfolio) }}"
                               class="text-accent hover:text-highlight transition-colors text-sm font-medium">
                                Edit
                            </a>
                        </div>

                        <form action="{{ route('admin.graphic-portfolios.destroy', $portfolio) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this portfolio? All images will be deleted.');"
                              class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-red-500 hover:text-red-400 transition-colors text-sm font-medium">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-secondary-bg rounded-xl p-12 border border-text-main/10 text-center">
                <svg class="w-20 h-20 text-text-main/20 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <p class="text-text-main/60 text-lg mb-4">No portfolios found</p>
                <a href="{{ route('admin.graphic-portfolios.create') }}"
                   class="inline-block px-6 py-3 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                    Create Your First Portfolio
                </a>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($portfolios->hasPages())
        <div class="mt-8">
            {{ $portfolios->links() }}
        </div>
    @endif

</x-admin-layout>
