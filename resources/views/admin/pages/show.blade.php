<x-admin-layout>
    <x-slot name="title">{{ $page->title }}</x-slot>

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-text-main mb-2">{{ $page->title }}</h1>
                <p class="text-text-main/60">
                    <code class="bg-text-main/10 px-2 py-1 rounded text-sm">/{{ $page->slug }}</code>
                </p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.pages.edit', $page) }}"
                   class="px-6 py-3 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                    Edit Page
                </a>
                <a href="{{ route('admin.pages.index') }}"
                   class="px-6 py-3 bg-secondary-bg hover:bg-text-main/5 text-text-main font-medium rounded-lg transition-colors border border-text-main/10">
                    Back to Pages
                </a>
            </div>
        </div>
    </div>

    <!-- Page Details -->
    <div class="grid lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Page Content -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h2 class="text-xl font-bold text-text-main mb-6">Page Content</h2>
                <div class="prose prose-invert max-w-none">
                    <div class="text-text-main/80 leading-relaxed whitespace-pre-wrap">{{ $page->content }}</div>
                </div>
            </div>

            <!-- SEO Preview -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h2 class="text-xl font-bold text-text-main mb-6">SEO Preview</h2>

                <div class="bg-primary-bg rounded-lg p-6 border border-text-main/10">
                    <div class="flex items-center space-x-2 mb-3">
                        <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                        </svg>
                        <span class="text-sm text-text-main/60">{{ config('app.url') }}/{{ $page->slug }}</span>
                    </div>

                    <h3 class="text-xl text-accent font-medium mb-2">
                        {{ $page->meta_title ?: $page->title }}
                    </h3>

                    @if($page->meta_description)
                        <p class="text-sm text-text-main/80 leading-relaxed">
                            {{ $page->meta_description }}
                        </p>
                    @else
                        <p class="text-sm text-text-main/40 italic">
                            No meta description set
                        </p>
                    @endif
                </div>

                <!-- SEO Tips -->
                <div class="mt-4 space-y-2">
                    @if(!$page->meta_title)
                        <div class="flex items-start space-x-2 text-sm text-yellow-500">
                            <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                            <span>Consider adding a custom meta title (50-60 characters recommended)</span>
                        </div>
                    @endif

                    @if(!$page->meta_description)
                        <div class="flex items-start space-x-2 text-sm text-yellow-500">
                            <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                            <span>Consider adding a meta description (120-160 characters recommended)</span>
                        </div>
                    @endif

                    @if($page->meta_title && $page->meta_description)
                        <div class="flex items-start space-x-2 text-sm text-highlight">
                            <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>SEO settings are optimized!</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Page Info -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h3 class="text-lg font-bold text-text-main mb-4">Page Information</h3>

                <div class="space-y-4">
                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Slug</label>
                        <p class="text-text-main mt-1 font-mono text-sm">{{ $page->slug }}</p>
                    </div>

                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Meta Title</label>
                        <p class="text-text-main mt-1 text-sm">
                            {{ $page->meta_title ?: 'Not set' }}
                        </p>
                        @if($page->meta_title)
                            <p class="text-xs text-text-main/40 mt-1">{{ strlen($page->meta_title) }} characters</p>
                        @endif
                    </div>

                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Meta Description</label>
                        <p class="text-text-main mt-1 text-sm">
                            {{ $page->meta_description ? Str::limit($page->meta_description, 100) : 'Not set' }}
                        </p>
                        @if($page->meta_description)
                            <p class="text-xs text-text-main/40 mt-1">{{ strlen($page->meta_description) }} characters</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Timestamps -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h3 class="text-lg font-bold text-text-main mb-4">Timestamps</h3>

                <div class="space-y-3">
                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Created</label>
                        <p class="text-text-main text-sm mt-1">{{ $page->created_at->format('M d, Y H:i') }}</p>
                        <p class="text-text-main/40 text-xs mt-1">{{ $page->created_at->diffForHumans() }}</p>
                    </div>

                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Last Updated</label>
                        <p class="text-text-main text-sm mt-1">{{ $page->updated_at->format('M d, Y H:i') }}</p>
                        <p class="text-text-main/40 text-xs mt-1">{{ $page->updated_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h3 class="text-lg font-bold text-text-main mb-4">Quick Actions</h3>

                <a href="{{ route('admin.pages.edit', $page) }}"
                   class="block w-full px-4 py-2 text-center bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                    Edit This Page
                </a>
            </div>
        </div>
    </div>
</x-admin-layout>
