<x-admin-layout>
    <x-slot name="title">{{ $graphicPortfolio->title }}</x-slot>

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-text-main mb-2">{{ $graphicPortfolio->title }}</h1>
                <p class="text-text-main/60">Portfolio details and preview</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.graphic-portfolios.edit', $graphicPortfolio) }}"
                   class="px-6 py-3 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                    Edit Portfolio
                </a>
                <a href="{{ route('admin.graphic-portfolios.index') }}"
                   class="px-6 py-3 bg-secondary-bg hover:bg-text-main/5 text-text-main font-medium rounded-lg transition-colors border border-text-main/10">
                    Back to List
                </a>
            </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Basic Information -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h2 class="text-xl font-bold text-text-main mb-4">Portfolio Information</h2>

                <div class="space-y-4">
                    <div>
                        <label class="text-sm font-medium text-text-main/60">Title</label>
                        <p class="text-text-main text-lg">{{ $graphicPortfolio->title }}</p>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-text-main/60">URL Slug</label>
                        <p class="text-accent font-mono text-sm">/branding-packages/{{ $graphicPortfolio->slug }}</p>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-text-main/60">About</label>
                        <p class="text-text-main">{{ $graphicPortfolio->about }}</p>
                    </div>

                    @if($graphicPortfolio->keywords)
                        <div>
                            <label class="text-sm font-medium text-text-main/60 mb-2 block">Keywords</label>
                            <div class="flex flex-wrap gap-2">
                                @foreach($graphicPortfolio->keywords_array as $keyword)
                                    <span class="px-3 py-1 bg-accent/10 text-accent text-sm rounded-lg">
                                        {{ $keyword }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if($graphicPortfolio->link)
                        <div>
                            <label class="text-sm font-medium text-text-main/60">Project Link</label>
                            <a href="{{ $graphicPortfolio->link }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="text-accent hover:text-highlight transition-colors flex items-center space-x-1">
                                <span>{{ $graphicPortfolio->link }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Description -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h2 class="text-xl font-bold text-text-main mb-4">Description</h2>
                <div class="prose prose-invert max-w-none text-text-main/80">
                    {!! $graphicPortfolio->description !!}
                </div>
            </div>

            <!-- Image Gallery -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-bold text-text-main">Image Gallery</h2>
                    <span class="text-text-main/60 text-sm">{{ $graphicPortfolio->media->count() }} {{ Str::plural('image', $graphicPortfolio->media->count()) }}</span>
                </div>

                @if($graphicPortfolio->media->count() > 0)
                    <div class="grid md:grid-cols-2 gap-4">
                        @foreach($graphicPortfolio->media as $media)
                            <div class="group relative bg-primary-bg rounded-lg overflow-hidden">
                                <img src="{{ Storage::url($media->file_path) }}"
                                     alt="{{ $media->caption }}"
                                     class="w-full h-64 object-cover">

                                @if($media->caption)
                                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-primary-bg/90 to-transparent p-4">
                                        <p class="text-text-main text-sm">{{ $media->caption }}</p>
                                    </div>
                                @endif

                                <div class="absolute top-2 right-2 bg-text-main/80 text-primary-bg px-2 py-1 rounded text-xs font-medium">
                                    #{{ $media->order }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 text-text-main/20 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-text-main/60">No images uploaded</p>
                        <a href="{{ route('admin.graphic-portfolios.edit', $graphicPortfolio) }}"
                           class="inline-block mt-4 text-accent hover:text-highlight transition-colors font-medium">
                            Add Images →
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Status -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h3 class="text-lg font-bold text-text-main mb-4">Status</h3>
                <div class="space-y-3">
                    <div>
                        <label class="text-sm text-text-main/60">Publication Status</label>
                        <div class="mt-1">
                            <span class="px-3 py-1 rounded-full text-sm font-medium
                                @if($graphicPortfolio->status === 'published') bg-highlight/10 text-highlight
                                @else bg-yellow-500/10 text-yellow-500
                                @endif">
                                {{ ucfirst($graphicPortfolio->status) }}
                            </span>
                        </div>
                    </div>

                    <div>
                        <label class="text-sm text-text-main/60">Display Order</label>
                        <p class="text-text-main font-medium">#{{ $graphicPortfolio->order }}</p>
                    </div>

                    <div>
                        <label class="text-sm text-text-main/60">Created</label>
                        <p class="text-text-main">{{ $graphicPortfolio->created_at->format('M d, Y') }}</p>
                    </div>

                    <div>
                        <label class="text-sm text-text-main/60">Last Updated</label>
                        <p class="text-text-main">{{ $graphicPortfolio->updated_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h3 class="text-lg font-bold text-text-main mb-4">Actions</h3>
                <div class="space-y-3">
                    <a href="{{ route('admin.graphic-portfolios.edit', $graphicPortfolio) }}"
                       class="block w-full px-4 py-3 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors text-center">
                        Edit Portfolio
                    </a>

                    @if($graphicPortfolio->status === 'published')
                        <a href="{{ route('branding-packages.show', $graphicPortfolio->slug) }}"
                           target="_blank"
                           class="block w-full px-4 py-3 bg-secondary-bg hover:bg-text-main/5 text-text-main font-medium rounded-lg transition-colors border border-text-main/10 text-center">
                            View on Website →
                        </a>
                    @endif

                    <form action="{{ route('admin.graphic-portfolios.destroy', $graphicPortfolio) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this portfolio? All images will be deleted.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="w-full px-4 py-3 bg-red-500/10 hover:bg-red-500/20 text-red-500 font-medium rounded-lg transition-colors border border-red-500/20">
                            Delete Portfolio
                        </button>
                    </form>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h3 class="text-lg font-bold text-text-main mb-4">Quick Stats</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-text-main/60 text-sm">Total Images</span>
                        <span class="text-text-main font-medium">{{ $graphicPortfolio->media->count() }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-text-main/60 text-sm">Keywords</span>
                        <span class="text-text-main font-medium">{{ count($graphicPortfolio->keywords_array) }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-text-main/60 text-sm">Has Link</span>
                        <span class="text-text-main font-medium">{{ $graphicPortfolio->link ? 'Yes' : 'No' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
