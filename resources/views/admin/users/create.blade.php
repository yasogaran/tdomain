<x-admin-layout>
    <x-slot name="title">Add User</x-slot>

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-text-main mb-2">Add New User</h1>
                <p class="text-text-main/60">Create a new admin user account</p>
            </div>
            <a href="{{ route('admin.users.index') }}"
               class="px-6 py-3 bg-secondary-bg hover:bg-text-main/5 text-text-main font-medium rounded-lg transition-colors border border-text-main/10">
                Back to Users
            </a>
        </div>
    </div>

    <!-- Create Form -->
    <div class="bg-secondary-bg rounded-xl p-8 border border-text-main/10">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <div class="space-y-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-text-main mb-2">
                        Full Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           id="name"
                           name="name"
                           value="{{ old('name') }}"
                           required
                           class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-text-main mb-2">
                        Email Address <span class="text-red-500">*</span>
                    </label>
                    <input type="email"
                           id="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                    @error('email')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-text-main mb-2">
                        Password <span class="text-red-500">*</span>
                    </label>
                    <input type="password"
                           id="password"
                           name="password"
                           required
                           class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                    <p class="mt-1 text-sm text-text-main/40">Minimum 8 characters</p>
                    @error('password')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-text-main mb-2">
                        Confirm Password <span class="text-red-500">*</span>
                    </label>
                    <input type="password"
                           id="password_confirmation"
                           name="password_confirmation"
                           required
                           class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                </div>

                <!-- Role -->
                <div>
                    <label for="role" class="block text-sm font-medium text-text-main mb-2">
                        Role <span class="text-red-500">*</span>
                    </label>
                    <select id="role"
                            name="role"
                            required
                            class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                        <option value="editor" {{ old('role') === 'editor' ? 'selected' : '' }}>Editor</option>
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    <p class="mt-1 text-sm text-text-main/40">
                        <span class="font-semibold">Editor:</span> Can manage content but not users.
                        <span class="font-semibold">Admin:</span> Full system access.
                    </p>
                    @error('role')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Warning -->
                <div class="bg-yellow-500/10 border border-yellow-500/20 rounded-lg p-4">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-yellow-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                        <div class="text-sm text-text-main/80">
                            <p class="font-semibold text-yellow-500 mb-1">Security Notice</p>
                            <p>Admin users have full access to all system features including user management and deletion capabilities. Only grant admin access to trusted individuals.</p>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-text-main/10">
                    <a href="{{ route('admin.users.index') }}"
                       class="px-6 py-3 bg-secondary-bg hover:bg-text-main/5 text-text-main font-medium rounded-lg transition-colors border border-text-main/10">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-6 py-3 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                        Create User
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>
