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
</x-admin-layout>
