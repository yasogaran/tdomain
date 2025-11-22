<x-admin-layout>
    <x-slot name="title">Edit Graphic Portfolio</x-slot>

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-text-main mb-2">Edit: {{ $graphicPortfolio->title }}</h1>
                <p class="text-text-main/60">Update portfolio details and manage images</p>
            </div>
            <a href="{{ route('admin.graphic-portfolios.index') }}"
               class="px-6 py-3 bg-secondary-bg hover:bg-text-main/5 text-text-main font-medium rounded-lg transition-colors border border-text-main/10">
                Back to Portfolios
            </a>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 bg-highlight/10 border border-highlight/20 text-highlight px-6 py-4 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Edit Form -->
    <div class="bg-secondary-bg rounded-xl p-8 border border-text-main/10">
        <form action="{{ route('admin.graphic-portfolios.update', $graphicPortfolio) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-text-main mb-2">
                        Portfolio Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           id="title"
                           name="title"
                           value="{{ old('title', $graphicPortfolio->title) }}"
                           required
                           class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                    @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-sm font-medium text-text-main mb-2">
                        URL Slug <span class="text-text-main/40">(optional)</span>
                    </label>
                    <div class="flex items-center space-x-2 mb-1">
                        <span class="text-text-main/60 text-sm">/branding-packages/</span>
                        <input type="text"
                               id="slug"
                               name="slug"
                               value="{{ old('slug', $graphicPortfolio->slug) }}"
                               class="flex-1 px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent font-mono text-sm">
                    </div>
                    @error('slug')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-sm text-text-main/40">Leave blank to auto-generate from title</p>
                </div>

                <!-- About -->
                <div>
                    <label for="about" class="block text-sm font-medium text-text-main mb-2">
                        About <span class="text-red-500">*</span>
                    </label>
                    <textarea id="about"
                              name="about"
                              rows="3"
                              required
                              class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">{{ old('about', $graphicPortfolio->about) }}</textarea>
                    @error('about')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-sm text-text-main/40">Brief summary (2-3 sentences)</p>
                </div>

                <!-- Description (Summernote) -->
                <div>
                    <label for="description" class="block text-sm font-medium text-text-main mb-2">
                        Description <span class="text-red-500">*</span>
                    </label>
                    <textarea id="description"
                              name="description"
                              required>{{ old('description', $graphicPortfolio->description) }}</textarea>
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
                           value="{{ old('keywords', $graphicPortfolio->keywords) }}"
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
                           value="{{ old('link', $graphicPortfolio->link) }}"
                           placeholder="https://example.com"
                           class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                    @error('link')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
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
                        <option value="draft" {{ old('status', $graphicPortfolio->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status', $graphicPortfolio->status) === 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-text-main/10">
                    <a href="{{ route('admin.graphic-portfolios.index') }}"
                       class="px-6 py-3 bg-secondary-bg hover:bg-text-main/5 text-text-main font-medium rounded-lg transition-colors border border-text-main/10">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-6 py-3 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                        Update Portfolio
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Image Gallery Section -->
    <div class="bg-secondary-bg rounded-xl p-8 border border-text-main/10 mt-6">
        <h2 class="text-xl font-bold text-text-main mb-6">Image Gallery</h2>

        <!-- Upload Section -->
        <div class="mb-8">
            <div class="border-2 border-dashed border-text-main/20 rounded-lg p-8 text-center hover:border-accent transition-colors">
                <input type="file"
                       id="imageUpload"
                       accept="image/*"
                       class="hidden"
                       onchange="handleImageUpload(event)">
                <label for="imageUpload" class="cursor-pointer">
                    <svg class="w-12 h-12 text-text-main/40 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <p class="text-text-main font-medium mb-2">Click to upload images</p>
                    <p class="text-text-main/60 text-sm">JPG, PNG, GIF, WEBP</p>
                    <p class="text-text-main/40 text-xs mt-1">Max size: 10MB</p>
                </label>
            </div>

            <!-- Upload Progress -->
            <div id="uploadProgress" class="hidden mt-4">
                <div class="bg-primary-bg rounded-lg p-4">
                    <div class="flex items-center space-x-3">
                        <div class="flex-1">
                            <div class="h-2 bg-text-main/10 rounded-full overflow-hidden">
                                <div id="progressBar" class="h-full bg-accent transition-all duration-300" style="width: 0%"></div>
                            </div>
                        </div>
                        <span id="progressText" class="text-sm text-text-main/60">0%</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Existing Images -->
        <div id="imageGallery" class="grid md:grid-cols-3 gap-4">
            @foreach($graphicPortfolio->media as $media)
                <div class="relative group media-item bg-primary-bg rounded-lg p-2" data-media-id="{{ $media->id }}" data-order="{{ $media->order }}">
                    <!-- Drag Handle -->
                    <div class="absolute top-4 left-4 z-10 cursor-move drag-handle opacity-0 group-hover:opacity-100 transition-opacity">
                        <div class="bg-text-main/80 text-primary-bg p-2 rounded-lg">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"></path>
                            </svg>
                        </div>
                    </div>

                    <div class="relative rounded-lg overflow-hidden">
                        <img src="{{ Storage::url($media->file_path) }}"
                             alt="{{ $media->caption }}"
                             class="w-full h-48 object-cover">

                        <!-- Action Buttons -->
                        <div class="absolute top-2 right-2 flex space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <!-- Edit Button -->
                            <button type="button"
                                    onclick="editImageCaption({{ $media->id }}, '{{ addslashes($media->caption ?? '') }}')"
                                    class="p-2 bg-accent hover:bg-highlight text-primary-bg rounded-lg"
                                    title="Edit caption">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </button>

                            <!-- Delete Button -->
                            <button type="button"
                                    onclick="deleteImage({{ $media->id }})"
                                    class="p-2 bg-red-500 hover:bg-red-600 text-white rounded-lg"
                                    title="Delete">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Order Badge -->
                        <div class="absolute bottom-2 left-2 bg-text-main/80 text-primary-bg px-2 py-1 rounded text-xs font-medium">
                            #{{ $media->order }}
                        </div>
                    </div>

                    <!-- Caption -->
                    <div class="mt-2">
                        <p class="text-sm text-text-main/60 caption-text" id="caption-{{ $media->id }}">
                            {{ $media->caption ?: 'No caption' }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        @if($graphicPortfolio->media->count() === 0)
            <p class="text-center text-text-main/60 py-8" id="emptyState">No images uploaded yet</p>
        @endif
    </div>

    @push('styles')
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <style>
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
        .note-modal .modal-header, .note-modal .modal-footer {
            border-color: rgba(226, 232, 240, 0.1);
        }
        .note-modal .form-control {
            background: #0F1419;
            color: #E2E8F0;
            border: 1px solid rgba(226, 232, 240, 0.1);
        }
    </style>
    @endpush

    @push('scripts')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Summernote -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <!-- SortableJS -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

    <script>
        // Initialize Summernote
        $(document).ready(function() {
            $('#description').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'hr']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });
        });

        // Initialize drag-and-drop sorting
        document.addEventListener('DOMContentLoaded', function() {
            const gallery = document.getElementById('imageGallery');
            if (gallery && gallery.children.length > 0) {
                new Sortable(gallery, {
                    animation: 150,
                    handle: '.drag-handle',
                    ghostClass: 'opacity-50',
                    onEnd: function(evt) {
                        updateImageOrder();
                    }
                });
            }
        });

        function handleImageUpload(event) {
            const file = event.target.files[0];
            if (!file) return;

            const formData = new FormData();
            formData.append('file', file);

            const progressContainer = document.getElementById('uploadProgress');
            const progressBar = document.getElementById('progressBar');
            const progressText = document.getElementById('progressText');
            progressContainer.classList.remove('hidden');

            const xhr = new XMLHttpRequest();

            xhr.upload.addEventListener('progress', (e) => {
                if (e.lengthComputable) {
                    const percentComplete = Math.round((e.loaded / e.total) * 100);
                    progressBar.style.width = percentComplete + '%';
                    progressText.textContent = percentComplete + '%';
                }
            });

            xhr.addEventListener('load', () => {
                if (xhr.status === 200) {
                    window.location.reload();
                } else {
                    alert('Upload failed. Please try again.');
                    progressContainer.classList.add('hidden');
                }
            });

            xhr.addEventListener('error', () => {
                alert('Upload failed. Please try again.');
                progressContainer.classList.add('hidden');
            });

            xhr.open('POST', '{{ route('admin.graphic-portfolios.media.upload', $graphicPortfolio) }}');
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            xhr.send(formData);

            event.target.value = '';
        }

        function editImageCaption(mediaId, currentCaption) {
            const newCaption = prompt('Edit caption:', currentCaption);
            if (newCaption === null) return;

            fetch(`/admin/graphic-portfolios/media/${mediaId}/caption`, {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ caption: newCaption })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById(`caption-${mediaId}`).textContent = newCaption || 'No caption';
                } else {
                    alert('Failed to update caption.');
                }
            })
            .catch(() => alert('Failed to update caption.'));
        }

        function deleteImage(mediaId) {
            if (!confirm('Are you sure you want to delete this image?')) return;

            fetch(`/admin/graphic-portfolios/media/${mediaId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.querySelector(`[data-media-id="${mediaId}"]`).remove();
                    const gallery = document.getElementById('imageGallery');
                    if (gallery.children.length === 0) {
                        gallery.innerHTML = '<p class="col-span-3 text-center text-text-main/60 py-8">No images uploaded yet</p>';
                    } else {
                        updateOrderBadges();
                    }
                } else {
                    alert('Failed to delete image.');
                }
            })
            .catch(() => alert('Failed to delete image.'));
        }

        function updateImageOrder() {
            const items = document.querySelectorAll('.media-item');
            const orderData = [];

            items.forEach((item, index) => {
                orderData.push({
                    id: parseInt(item.getAttribute('data-media-id')),
                    order: index
                });
            });

            fetch('/admin/graphic-portfolios/media/reorder', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ media: orderData })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updateOrderBadges();
                } else {
                    alert('Failed to update order.');
                }
            })
            .catch(() => alert('Failed to update order.'));
        }

        function updateOrderBadges() {
            const items = document.querySelectorAll('.media-item');
            items.forEach((item, index) => {
                const badge = item.querySelector('.absolute.bottom-2.left-2');
                if (badge) {
                    badge.textContent = '#' + index;
                }
            });
        }
    </script>
    @endpush
</x-admin-layout>
