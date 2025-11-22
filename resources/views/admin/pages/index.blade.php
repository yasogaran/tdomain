<x-admin-layout>
    <x-slot name="title">Pages</x-slot>

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-text-main mb-2">Pages</h1>
                <p class="text-text-main/60">Manage your website's static pages and content</p>
            </div>
        </div>
    </div>

    <!-- Pages List -->
    <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
        @if($pages->count() > 0)
            <div class="space-y-4">
                @foreach($pages as $page)
                    <div class="bg-primary-bg rounded-lg p-6 border border-text-main/10 hover:border-accent/30 transition-colors">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <div class="flex items-center space-x-3 mb-2">
                                    <h3 class="text-lg font-bold text-text-main">{{ $page->title }}</h3>
                                    <span class="px-2 py-1 bg-accent/10 text-accent text-xs font-medium rounded">
                                        /{{ $page->slug }}
                                    </span>
                                </div>

                                @if($page->meta_description)
                                    <p class="text-text-main/60 text-sm mb-3">{{ Str::limit($page->meta_description, 150) }}</p>
                                @endif

                                <div class="flex items-center space-x-4 text-sm text-text-main/40">
                                    <span>Updated {{ $page->updated_at->diffForHumans() }}</span>
                                    @if($page->meta_title)
                                        <span>• SEO Optimized</span>
                                    @endif
                                </div>
                            </div>

                            <div class="flex items-center space-x-3 ml-6">
                                <a href="{{ route('admin.pages.show', $page) }}"
                                   class="px-4 py-2 bg-secondary-bg hover:bg-text-main/5 text-text-main font-medium rounded-lg transition-colors border border-text-main/10">
                                    View
                                </a>
                                <a href="{{ route('admin.pages.edit', $page) }}"
                                   class="px-4 py-2 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $pages->links() }}
            </div>
        @else
            <div class="py-12 text-center">
                <svg class="w-16 h-16 text-text-main/20 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                </svg>
                <p class="text-text-main/60 text-lg">No pages found</p>
                <p class="text-text-main/40 text-sm mt-2">Pages will appear here once created</p>
            </div>
        @endif
    </div>

    <!-- Info Box -->
    <div class="mt-6 bg-accent/10 border border-accent/20 rounded-xl p-6">
        <div class="flex items-start space-x-3">
            <svg class="w-6 h-6 text-accent flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div>
                <h4 class="text-accent font-semibold mb-1">Fixed Pages</h4>
                <p class="text-text-main/80 text-sm">
                    These are core pages of your website. You can edit their content and SEO settings, but cannot create new pages or delete existing ones from this interface.
                </p>
            </div>
        </div>
    </div>
</x-admin-layout>
