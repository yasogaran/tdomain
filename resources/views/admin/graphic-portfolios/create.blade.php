<x-admin-layout>
    <x-slot name="title">Create Graphic Portfolio</x-slot>

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-text-main mb-2">Create Graphic Portfolio</h1>
                <p class="text-text-main/60">Add a new portfolio item to your branding collection</p>
            </div>
            <a href="{{ route('admin.graphic-portfolios.index') }}"
               class="px-6 py-3 bg-secondary-bg hover:bg-text-main/5 text-text-main font-medium rounded-lg transition-colors border border-text-main/10">
                Back to Portfolios
            </a>
        </div>
    </div>

    <!-- Create Form -->
    <div class="bg-secondary-bg rounded-xl p-8 border border-text-main/10">
        <form action="{{ route('admin.graphic-portfolios.store') }}" method="POST">
            @csrf

            <div class="space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-text-main mb-2">
                        Portfolio Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           id="title"
                           name="title"
                           value="{{ old('title') }}"
                           required
                           placeholder="e.g., Modern Corporate Branding Package"
                           class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                    @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-sm text-text-main/40">A descriptive title for this portfolio item</p>
                </div>

                <!-- Slug (Optional - auto-generated) -->
                <div>
                    <label for="slug" class="block text-sm font-medium text-text-main mb-2">
                        URL Slug <span class="text-text-main/40">(optional)</span>
                    </label>
                    <input type="text"
                           id="slug"
                           name="slug"
                           value="{{ old('slug') }}"
                           placeholder="Leave empty to auto-generate from title"
                           class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent font-mono text-sm">
                    @error('slug')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-sm text-text-main/40">Leave blank to auto-generate from title</p>
                </div>

                <!-- About (Short Description) -->
                <div>
                    <label for="about" class="block text-sm font-medium text-text-main mb-2">
                        About <span class="text-red-500">*</span>
                    </label>
                    <textarea id="about"
                              name="about"
                              rows="3"
                              required
                              placeholder="Brief overview of this portfolio item..."
                              class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">{{ old('about') }}</textarea>
                    @error('about')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-sm text-text-main/40">A brief summary (2-3 sentences)</p>
                </div>

                <!-- Description (Rich Text - Summernote) -->
                <div>
                    <label for="description" class="block text-sm font-medium text-text-main mb-2">
                        Description <span class="text-red-500">*</span>
                    </label>
                    <textarea id="description"
                              name="description"
                              required>{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-sm text-text-main/40">Detailed description with formatting</p>
                </div>

                <!-- Keywords -->
                <div>
                    <label for="keywords" class="block text-sm font-medium text-text-main mb-2">
                        Keywords <span class="text-text-main/40">(optional)</span>
                    </label>
                    <input type="text"
                           id="keywords"
                           name="keywords"
                           value="{{ old('keywords') }}"
                           placeholder="e.g., logo design, branding, corporate identity"
                           class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                    @error('keywords')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-sm text-text-main/40">Comma-separated keywords for filtering</p>
                </div>

                <!-- Project Link -->
                <div>
                    <label for="link" class="block text-sm font-medium text-text-main mb-2">
                        Project Link <span class="text-text-main/40">(optional)</span>
                    </label>
                    <input type="url"
                           id="link"
                           name="link"
                           value="{{ old('link') }}"
                           placeholder="https://example.com"
                           class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                    @error('link')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-sm text-text-main/40">External link to live project (if applicable)</p>
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-text-main mb-2">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <select id="status"
                            name="status"
                            required
                            class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                        <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-sm text-text-main/40">Only published portfolios are visible on the website</p>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-text-main/10">
                    <a href="{{ route('admin.graphic-portfolios.index') }}"
                       class="px-6 py-3 bg-secondary-bg hover:bg-text-main/5 text-text-main font-medium rounded-lg transition-colors border border-text-main/10">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-6 py-3 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                        Create Portfolio
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
            min-height: 300px;
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
            $('#description').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'hr']],
                    ['view', ['fullscreen', 'codeview']]
                ],
                placeholder: 'Enter detailed description of this portfolio item...'
            });
        });
    </script>
    @endpush

</x-admin-layout>
