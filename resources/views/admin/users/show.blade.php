<x-admin-layout>
    <x-slot name="title">{{ $user->name }}</x-slot>

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-text-main mb-2">{{ $user->name }}</h1>
                <p class="text-text-main/60">{{ $user->email }}</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.users.edit', $user) }}"
                   class="px-6 py-3 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                    Edit User
                </a>
                <a href="{{ route('admin.users.index') }}"
                   class="px-6 py-3 bg-secondary-bg hover:bg-text-main/5 text-text-main font-medium rounded-lg transition-colors border border-text-main/10">
                    Back to Users
                </a>
            </div>
        </div>
    </div>

    <!-- User Details -->
    <div class="grid lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Profile Card -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h2 class="text-xl font-bold text-text-main mb-6">User Information</h2>

                <div class="flex items-start space-x-6">
                    <!-- Avatar -->
                    <div class="flex-shrink-0">
                        <div class="w-24 h-24 rounded-full bg-accent/10 flex items-center justify-center border-2 border-text-main/10">
                            <span class="text-4xl text-accent font-bold">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                        </div>
                    </div>

                    <!-- Details -->
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-text-main mb-2">{{ $user->name }}</h3>
                        @if($user->id === auth()->id())
                            <span class="inline-block px-3 py-1 bg-accent/10 text-accent text-sm font-medium rounded-full mb-3">
                                Current User
                            </span>
                        @endif

                        <div class="space-y-3 mt-4">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-text-main/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <a href="mailto:{{ $user->email }}"
                                   class="text-text-main hover:text-accent transition-colors">
                                    {{ $user->email }}
                                </a>
                            </div>

                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-text-main/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                <span class="text-text-main/80">
                                    Role:
                                    <span class="px-3 py-1 rounded-full text-xs font-medium ml-2
                                        @if($user->role === 'admin') bg-highlight/10 text-highlight
                                        @else bg-accent/10 text-accent
                                        @endif">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Role Permissions -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h2 class="text-xl font-bold text-text-main mb-6">Permissions</h2>

                <div class="space-y-3">
                    @if($user->role === 'admin')
                        <div class="flex items-start space-x-3 p-3 bg-highlight/10 rounded-lg">
                            <svg class="w-5 h-5 text-highlight flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <p class="font-semibold text-highlight">Full System Access</p>
                                <p class="text-sm text-text-main/80 mt-1">Can manage all content, users, and system settings</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3 p-3 bg-highlight/10 rounded-lg">
                            <svg class="w-5 h-5 text-highlight flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <p class="font-semibold text-highlight">User Management</p>
                                <p class="text-sm text-text-main/80 mt-1">Can create, edit, and delete user accounts</p>
                            </div>
                        </div>
                    @endif

                    <div class="flex items-start space-x-3 p-3 bg-accent/10 rounded-lg">
                        <svg class="w-5 h-5 text-accent flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <p class="font-semibold text-accent">Content Management</p>
                            <p class="text-sm text-text-main/80 mt-1">Can manage projects, team, pages, and partners</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3 p-3 bg-accent/10 rounded-lg">
                        <svg class="w-5 h-5 text-accent flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <p class="font-semibold text-accent">Quotation Management</p>
                            <p class="text-sm text-text-main/80 mt-1">Can view and manage customer quotations</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Account Details -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h3 class="text-lg font-bold text-text-main mb-4">Account Details</h3>

                <div class="space-y-4">
                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Role</label>
                        <p class="text-text-main mt-1">
                            <span class="px-3 py-1 rounded-full text-xs font-medium
                                @if($user->role === 'admin') bg-highlight/10 text-highlight
                                @else bg-accent/10 text-accent
                                @endif">
                                {{ ucfirst($user->role) }}
                            </span>
                        </p>
                    </div>

                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Email</label>
                        <p class="text-text-main mt-1 break-all">{{ $user->email }}</p>
                    </div>
                </div>
            </div>

            <!-- Timestamps -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h3 class="text-lg font-bold text-text-main mb-4">Account Activity</h3>

                <div class="space-y-3">
                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Created</label>
                        <p class="text-text-main text-sm mt-1">{{ $user->created_at->format('M d, Y H:i') }}</p>
                        <p class="text-text-main/40 text-xs mt-1">{{ $user->created_at->diffForHumans() }}</p>
                    </div>

                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Last Updated</label>
                        <p class="text-text-main text-sm mt-1">{{ $user->updated_at->format('M d, Y H:i') }}</p>
                        <p class="text-text-main/40 text-xs mt-1">{{ $user->updated_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            @if($user->id !== auth()->id())
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h3 class="text-lg font-bold text-text-main mb-4">Actions</h3>

                <div class="space-y-3">
                    <form action="{{ route('admin.users.destroy', $user) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="w-full px-4 py-2 bg-red-500/10 hover:bg-red-500/20 text-red-500 font-medium rounded-lg transition-colors">
                            Delete User
                        </button>
                    </form>
                </div>
            </div>
            @else
            <div class="bg-accent/10 border border-accent/20 rounded-xl p-6">
                <div class="flex items-start space-x-3">
                    <svg class="w-5 h-5 text-accent flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="text-sm text-text-main/80">
                        <p class="font-semibold text-accent mb-1">Your Account</p>
                        <p>You cannot delete your own account. Contact another admin if needed.</p>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-admin-layout>
