<x-admin-layout>
    <x-slot name="title">Edit Team Member</x-slot>

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-text-main mb-2">Edit Team Member</h1>
                <p class="text-text-main/60">Update team member profile</p>
            </div>
            <a href="{{ route('admin.team.show', $team) }}"
               class="px-6 py-3 bg-secondary-bg hover:bg-text-main/5 text-text-main font-medium rounded-lg transition-colors border border-text-main/10">
                Back to Profile
            </a>
        </div>
    </div>

    <!-- Edit Form -->
    <div class="bg-secondary-bg rounded-xl p-8 border border-text-main/10">
        <form action="{{ route('admin.team.update', $team) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <!-- Current Photo -->
                @if($team->photo_path)
                <div>
                    <label class="block text-sm font-medium text-text-main mb-2">
                        Current Photo
                    </label>
                    <img src="{{ Storage::url($team->photo_path) }}"
                         alt="{{ $team->name }}"
                         class="w-32 h-32 rounded-full object-cover border-2 border-text-main/10">
                </div>
                @endif

                <!-- Photo Upload -->
                <div>
                    <label for="photo" class="block text-sm font-medium text-text-main mb-2">
                        {{ $team->photo_path ? 'Change Photo' : 'Upload Photo' }}
                    </label>
                    <input type="file"
                           id="photo"
                           name="photo"
                           accept="image/*"
                           class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                    <p class="mt-1 text-sm text-text-main/40">Recommended: Square image, at least 400x400px</p>
                    @error('photo')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Two Column Grid -->
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-text-main mb-2">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               id="name"
                               name="name"
                               value="{{ old('name', $team->name) }}"
                               required
                               class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                        @error('name')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Position -->
                    <div>
                        <label for="position" class="block text-sm font-medium text-text-main mb-2">
                            Position <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               id="position"
                               name="position"
                               value="{{ old('position', $team->position) }}"
                               required
                               placeholder="e.g., Senior Developer, CEO"
                               class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                        @error('position')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Department -->
                    <div>
                        <label for="department" class="block text-sm font-medium text-text-main mb-2">
                            Department <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               id="department"
                               name="department"
                               value="{{ old('department', $team->department) }}"
                               required
                               placeholder="e.g., Engineering, Sales"
                               class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                        @error('department')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-text-main mb-2">
                            Email
                        </label>
                        <input type="email"
                               id="email"
                               name="email"
                               value="{{ old('email', $team->email) }}"
                               class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                        @error('email')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- LinkedIn URL -->
                <div>
                    <label for="linkedin_url" class="block text-sm font-medium text-text-main mb-2">
                        LinkedIn Profile URL
                    </label>
                    <input type="url"
                           id="linkedin_url"
                           name="linkedin_url"
                           value="{{ old('linkedin_url', $team->linkedin_url) }}"
                           placeholder="https://linkedin.com/in/username"
                           class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                    @error('linkedin_url')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Bio -->
                <div>
                    <label for="bio" class="block text-sm font-medium text-text-main mb-2">
                        Biography
                    </label>
                    <textarea id="bio"
                              name="bio"
                              rows="4"
                              placeholder="Brief description about the team member..."
                              class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">{{ old('bio', $team->bio) }}</textarea>
                    @error('bio')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-text-main/10">
                    <a href="{{ route('admin.team.show', $team) }}"
                       class="px-6 py-3 bg-secondary-bg hover:bg-text-main/5 text-text-main font-medium rounded-lg transition-colors border border-text-main/10">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-6 py-3 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                        Update Team Member
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>
