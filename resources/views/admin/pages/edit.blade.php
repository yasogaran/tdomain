<x-admin-layout>
    <x-slot name="title">Edit Page</x-slot>

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-text-main mb-2">Edit Page: {{ $page->title }}</h1>
                <p class="text-text-main/60">Update page content and SEO settings</p>
            </div>
            <a href="{{ route('admin.pages.index') }}"
               class="px-6 py-3 bg-secondary-bg hover:bg-text-main/5 text-text-main font-medium rounded-lg transition-colors border border-text-main/10">
                Back to Pages
            </a>
        </div>
    </div>

    <!-- Edit Form -->
    <div class="bg-secondary-bg rounded-xl p-8 border border-text-main/10">
        <form action="{{ route('admin.pages.update', $page) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <!-- Page Info -->
                <div class="bg-accent/10 border border-accent/20 rounded-lg p-4">
                    <div class="flex items-center space-x-2 text-accent">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-medium">Page URL: <code class="font-mono">/{{ $page->slug }}</code></span>
                    </div>
                </div>

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-text-main mb-2">
                        Page Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           id="title"
                           name="title"
                           value="{{ old('title', $page->title) }}"
                           required
                           class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                    @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div>
                    <label for="content" class="block text-sm font-medium text-text-main mb-2">
                        Page Content <span class="text-red-500">*</span>
                    </label>
                    <textarea id="content"
                              name="content"
                              rows="15"
                              required
                              class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent font-mono text-sm">{{ old('content', $page->content) }}</textarea>
                    <p class="mt-1 text-sm text-text-main/40">Supports HTML and Markdown</p>
                    @error('content')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- SEO Section -->
                <div class="pt-6 border-t border-text-main/10">
                    <h3 class="text-lg font-bold text-text-main mb-4">SEO Settings</h3>

                    <!-- Meta Title -->
                    <div class="mb-6">
                        <label for="meta_title" class="block text-sm font-medium text-text-main mb-2">
                            Meta Title
                        </label>
                        <input type="text"
                               id="meta_title"
                               name="meta_title"
                               value="{{ old('meta_title', $page->meta_title) }}"
                               maxlength="60"
                               class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                        <p class="mt-1 text-sm text-text-main/40">Recommended: 50-60 characters</p>
                        @error('meta_title')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Meta Description -->
                    <div>
                        <label for="meta_description" class="block text-sm font-medium text-text-main mb-2">
                            Meta Description
                        </label>
                        <textarea id="meta_description"
                                  name="meta_description"
                                  rows="3"
                                  maxlength="160"
                                  class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">{{ old('meta_description', $page->meta_description) }}</textarea>
                        <p class="mt-1 text-sm text-text-main/40">Recommended: 120-160 characters</p>
                        @error('meta_description')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-text-main/10">
                    <a href="{{ route('admin.pages.index') }}"
                       class="px-6 py-3 bg-secondary-bg hover:bg-text-main/5 text-text-main font-medium rounded-lg transition-colors border border-text-main/10">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-6 py-3 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                        Update Page
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>
