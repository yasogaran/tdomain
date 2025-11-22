<x-admin-layout>
    <x-slot name="title">Edit Project</x-slot>

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-text-main mb-2">Edit Project</h1>
                <p class="text-text-main/60">Update project details</p>
            </div>
            <a href="{{ route('admin.projects.show', $project) }}"
               class="px-6 py-3 bg-secondary-bg hover:bg-text-main/5 text-text-main font-medium rounded-lg transition-colors border border-text-main/10">
                Back to Project
            </a>
        </div>
    </div>

    <!-- Edit Form -->
    <div class="bg-secondary-bg rounded-xl p-8 border border-text-main/10">
        <form action="{{ route('admin.projects.update', $project) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-text-main mb-2">
                        Project Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           id="title"
                           name="title"
                           value="{{ old('title', $project->title) }}"
                           required
                           class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                    @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-sm font-medium text-text-main mb-2">
                        Slug <span class="text-text-main/40 text-xs">(Optional - auto-generated from title)</span>
                    </label>
                    <input type="text"
                           id="slug"
                           name="slug"
                           value="{{ old('slug', $project->slug) }}"
                           class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                    @error('slug')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Two Column Grid -->
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Client Name -->
                    <div>
                        <label for="client_name" class="block text-sm font-medium text-text-main mb-2">
                            Client Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               id="client_name"
                               name="client_name"
                               value="{{ old('client_name', $project->client_name) }}"
                               required
                               class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                        @error('client_name')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Industry -->
                    <div>
                        <label for="industry" class="block text-sm font-medium text-text-main mb-2">
                            Industry <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               id="industry"
                               name="industry"
                               value="{{ old('industry', $project->industry) }}"
                               required
                               placeholder="e.g., Healthcare, Finance, E-commerce"
                               class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                        @error('industry')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Service Type -->
                    <div>
                        <label for="service_type" class="block text-sm font-medium text-text-main mb-2">
                            Service Type <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               id="service_type"
                               name="service_type"
                               value="{{ old('service_type', $project->service_type) }}"
                               required
                               placeholder="e.g., Web Development, Mobile App, Consulting"
                               class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                        @error('service_type')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Technology Stack -->
                    <div>
                        <label for="technology_stack" class="block text-sm font-medium text-text-main mb-2">
                            Technology Stack
                        </label>
                        <input type="text"
                               id="technology_stack"
                               name="technology_stack"
                               value="{{ old('technology_stack', $project->technology_stack) }}"
                               placeholder="e.g., React, Node.js, PostgreSQL"
                               class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                        @error('technology_stack')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Challenge -->
                <div>
                    <label for="challenge" class="block text-sm font-medium text-text-main mb-2">
                        Challenge <span class="text-red-500">*</span>
                    </label>
                    <textarea id="challenge"
                              name="challenge"
                              rows="4"
                              required
                              class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">{{ old('challenge', $project->challenge) }}</textarea>
                    @error('challenge')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Solution -->
                <div>
                    <label for="solution" class="block text-sm font-medium text-text-main mb-2">
                        Solution <span class="text-red-500">*</span>
                    </label>
                    <textarea id="solution"
                              name="solution"
                              rows="4"
                              required
                              class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">{{ old('solution', $project->solution) }}</textarea>
                    @error('solution')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Results -->
                <div>
                    <label for="results" class="block text-sm font-medium text-text-main mb-2">
                        Results
                    </label>
                    <textarea id="results"
                              name="results"
                              rows="4"
                              class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">{{ old('results', $project->results) }}</textarea>
                    @error('results')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status and Featured -->
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-text-main mb-2">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select id="status"
                                name="status"
                                required
                                class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                            <option value="draft" {{ old('status', $project->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status', $project->status) === 'published' ? 'selected' : '' }}>Published</option>
                            <option value="archived" {{ old('status', $project->status) === 'archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Featured -->
                    <div>
                        <label class="block text-sm font-medium text-text-main mb-2">
                            Featured
                        </label>
                        <div class="flex items-center h-12">
                            <input type="checkbox"
                                   id="featured"
                                   name="featured"
                                   value="1"
                                   {{ old('featured', $project->featured) ? 'checked' : '' }}
                                   class="w-5 h-5 text-accent bg-primary-bg border-text-main/10 rounded focus:ring-2 focus:ring-accent">
                            <label for="featured" class="ml-3 text-text-main/80">
                                Display this project as featured
                            </label>
                        </div>
                        @error('featured')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-text-main/10">
                    <a href="{{ route('admin.projects.show', $project) }}"
                       class="px-6 py-3 bg-secondary-bg hover:bg-text-main/5 text-text-main font-medium rounded-lg transition-colors border border-text-main/10">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-6 py-3 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                        Update Project
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Media Gallery Section -->
    <div class="bg-secondary-bg rounded-xl p-8 border border-text-main/10 mt-6">
        <h2 class="text-xl font-bold text-text-main mb-6">Media Gallery</h2>

        <!-- Upload Section -->
        <div class="mb-8">
            <div class="border-2 border-dashed border-text-main/20 rounded-lg p-8 text-center hover:border-accent transition-colors">
                <input type="file"
                       id="mediaUpload"
                       accept="image/*,video/*"
                       class="hidden"
                       onchange="handleMediaUpload(event)">
                <label for="mediaUpload" class="cursor-pointer">
                    <svg class="w-12 h-12 text-text-main/40 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                    <p class="text-text-main font-medium mb-2">Click to upload media</p>
                    <p class="text-text-main/60 text-sm">Images (JPG, PNG, GIF) or Videos (MP4, MOV, AVI)</p>
                    <p class="text-text-main/40 text-xs mt-1">Max size: 20MB</p>
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

        <!-- Existing Media -->
        <div id="mediaGallery" class="grid md:grid-cols-3 gap-4">
            @foreach($project->media as $media)
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
                        @if($media->type === 'image')
                            <img src="{{ Storage::url($media->path) }}"
                                 alt="{{ $media->caption }}"
                                 class="w-full h-48 object-cover">
                        @else
                            <video src="{{ Storage::url($media->path) }}"
                                   class="w-full h-48 object-cover"
                                   controls></video>
                        @endif

                        <!-- Action Buttons -->
                        <div class="absolute top-2 right-2 flex space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <!-- Edit Button -->
                            <button type="button"
                                    onclick="editMediaCaption({{ $media->id }}, '{{ addslashes($media->caption ?? '') }}')"
                                    class="p-2 bg-accent hover:bg-highlight text-primary-bg rounded-lg"
                                    title="Edit caption">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </button>

                            <!-- Delete Button -->
                            <button type="button"
                                    onclick="deleteMedia({{ $media->id }})"
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

        @if($project->media->count() === 0)
            <p class="text-center text-text-main/60 py-8" id="emptyState">No media uploaded yet</p>
        @endif
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script>
        // Initialize drag-and-drop sorting
        document.addEventListener('DOMContentLoaded', function() {
            const gallery = document.getElementById('mediaGallery');
            if (gallery && gallery.children.length > 0) {
                new Sortable(gallery, {
                    animation: 150,
                    handle: '.drag-handle',
                    ghostClass: 'opacity-50',
                    onEnd: function(evt) {
                        updateMediaOrder();
                    }
                });
            }
        });

        function handleMediaUpload(event) {
            const file = event.target.files[0];
            if (!file) return;

            const formData = new FormData();
            formData.append('file', file);
            formData.append('type', file.type.startsWith('video/') ? 'video' : 'image');

            // Show progress
            const progressContainer = document.getElementById('uploadProgress');
            const progressBar = document.getElementById('progressBar');
            const progressText = document.getElementById('progressText');
            progressContainer.classList.remove('hidden');

            // Upload
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
                    const response = JSON.parse(xhr.responseText);

                    // Reload page to show new media
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

            xhr.open('POST', '{{ route('admin.projects.media.upload', $project) }}');
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            xhr.send(formData);

            // Reset file input
            event.target.value = '';
        }

        function editMediaCaption(mediaId, currentCaption) {
            const newCaption = prompt('Edit caption:', currentCaption);

            if (newCaption === null) return; // User cancelled

            fetch(`/admin/projects/media/${mediaId}/caption`, {
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
                    // Update caption in DOM
                    const captionElement = document.getElementById(`caption-${mediaId}`);
                    captionElement.textContent = newCaption || 'No caption';
                } else {
                    alert('Failed to update caption. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to update caption. Please try again.');
            });
        }

        function deleteMedia(mediaId) {
            if (!confirm('Are you sure you want to delete this media?')) {
                return;
            }

            fetch(`/admin/projects/media/${mediaId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Remove the media item from DOM
                    document.querySelector(`[data-media-id="${mediaId}"]`).remove();

                    // Show empty state if no media left
                    const gallery = document.getElementById('mediaGallery');
                    if (gallery.children.length === 0) {
                        gallery.innerHTML = '<p class="col-span-3 text-center text-text-main/60 py-8" id="emptyState">No media uploaded yet</p>';
                    } else {
                        // Update order numbers after deletion
                        updateOrderBadges();
                    }
                } else {
                    alert('Failed to delete media. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to delete media. Please try again.');
            });
        }

        function updateMediaOrder() {
            const mediaItems = document.querySelectorAll('.media-item');
            const orderData = [];

            mediaItems.forEach((item, index) => {
                const mediaId = item.getAttribute('data-media-id');
                orderData.push({
                    id: parseInt(mediaId),
                    order: index
                });
            });

            fetch('/admin/projects/media/reorder', {
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
                    // Update order badges
                    updateOrderBadges();
                } else {
                    alert('Failed to update order. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to update order. Please try again.');
            });
        }

        function updateOrderBadges() {
            const mediaItems = document.querySelectorAll('.media-item');
            mediaItems.forEach((item, index) => {
                const badge = item.querySelector('.absolute.bottom-2.left-2');
                if (badge) {
                    badge.textContent = '#' + index;
                }
            });
        }
    </script>
    @endpush
</x-admin-layout>
