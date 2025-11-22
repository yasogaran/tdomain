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
                              required>{{ old('content', $page->content) }}</textarea>
                    <p class="mt-1 text-sm text-text-main/40">Use the rich text editor to format your content</p>
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

    @push('styles')
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <style>
        /* Summernote Dark Theme Customization */
        .note-editor.note-frame {
            border: 1px solid rgba(226, 232, 240, 0.1);
            background: #0F1419;
        }
        .note-editor .note-toolbar {
            background: #1a1f29;
            border-bottom: 1px solid rgba(226, 232, 240, 0.1);
        }
        .note-editor .note-editing-area .note-editable {
            background: #0F1419;
            color: #E2E8F0;
            min-height: 400px;
        }
        .note-editor .note-statusbar {
            background: #1a1f29;
            border-top: 1px solid rgba(226, 232, 240, 0.1);
        }
        .note-btn {
            background: transparent !important;
            color: #E2E8F0 !important;
            border: none !important;
        }
        .note-btn:hover {
            background: rgba(0, 255, 255, 0.1) !important;
        }
        .note-dropdown-menu {
            background: #1a1f29;
            border: 1px solid rgba(226, 232, 240, 0.1);
        }
        .note-dropdown-menu .dropdown-item {
            color: #E2E8F0;
        }
        .note-dropdown-menu .dropdown-item:hover {
            background: rgba(0, 255, 255, 0.1);
        }
        .note-modal .modal-content {
            background: #1a1f29;
            color: #E2E8F0;
        }
        .note-modal .modal-header {
            border-bottom: 1px solid rgba(226, 232, 240, 0.1);
        }
        .note-modal .modal-footer {
            border-top: 1px solid rgba(226, 232, 240, 0.1);
        }
        .note-modal .form-control {
            background: #0F1419;
            color: #E2E8F0;
            border: 1px solid rgba(226, 232, 240, 0.1);
        }
    </style>
    @endpush

    @push('scripts')
    <!-- jQuery (required for Summernote) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                height: 400,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video', 'hr']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                styleTags: [
                    'p',
                    { title: 'Heading 1', tag: 'h1', className: '', value: 'h1' },
                    { title: 'Heading 2', tag: 'h2', className: '', value: 'h2' },
                    { title: 'Heading 3', tag: 'h3', className: '', value: 'h3' },
                    { title: 'Heading 4', tag: 'h4', className: '', value: 'h4' },
                    { title: 'Heading 5', tag: 'h5', className: '', value: 'h5' },
                    { title: 'Heading 6', tag: 'h6', className: '', value: 'h6' },
                    'blockquote',
                    'pre'
                ],
                placeholder: 'Enter your page content here...',
                tabsize: 2,
                callbacks: {
                    onInit: function() {
                        // Additional dark theme fixes
                        $('.note-editable').css('color', '#E2E8F0');
                    }
                }
            });
        });
    </script>
    @endpush
</x-admin-layout>
