<x-admin-layout>
    <x-slot name="title">Users</x-slot>

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-text-main mb-2">Users</h1>
                <p class="text-text-main/60">Manage admin users and their roles</p>
            </div>
            <a href="{{ route('admin.users.create') }}"
               class="px-6 py-3 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                Add User
            </a>
        </div>
    </div>

    <!-- Users List -->
    <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
        @if($users->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-text-main/10">
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Name</th>
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Email</th>
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Role</th>
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Created</th>
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr class="border-b border-text-main/10 hover:bg-primary-bg/50 transition-colors">
                                <td class="py-4 px-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 rounded-full bg-accent/10 flex items-center justify-center">
                                            <span class="text-accent font-bold">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                        </div>
                                        <div>
                                            <p class="text-text-main font-medium">{{ $user->name }}</p>
                                            @if($user->id === auth()->id())
                                                <span class="text-xs text-accent">(You)</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-text-main/80">
                                    {{ $user->email }}
                                </td>
                                <td class="py-4 px-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-medium
                                        @if($user->role === 'admin') bg-highlight/10 text-highlight
                                        @else bg-accent/10 text-accent
                                        @endif">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-text-main/80 text-sm">
                                    {{ $user->created_at->format('M d, Y') }}
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center space-x-3">
                                        <a href="{{ route('admin.users.show', $user) }}"
                                           class="text-accent hover:text-highlight transition-colors text-sm font-medium">
                                            View
                                        </a>
                                        <a href="{{ route('admin.users.edit', $user) }}"
                                           class="text-accent hover:text-highlight transition-colors text-sm font-medium">
                                            Edit
                                        </a>
                                        @if($user->id !== auth()->id())
                                            <form action="{{ route('admin.users.destroy', $user) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Are you sure you want to delete this user?');"
                                                  class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-red-500 hover:text-red-600 transition-colors text-sm font-medium">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $users->links() }}
            </div>
        @else
            <div class="py-12 text-center">
                <svg class="w-16 h-16 text-text-main/20 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <p class="text-text-main/60 text-lg">No users found</p>
            </div>
        @endif
    </div>

    <!-- Info Box -->
    <div class="mt-6 bg-highlight/10 border border-highlight/20 rounded-xl p-6">
        <div class="flex items-start space-x-3">
            <svg class="w-6 h-6 text-highlight flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
            </svg>
            <div>
                <h4 class="text-highlight font-semibold mb-1">Admin Access Only</h4>
                <p class="text-text-main/80 text-sm">
                    User management is restricted to administrators. Be careful when assigning admin roles as they have full access to all system features.
                </p>
            </div>
        </div>
    </div>
</x-admin-layout>
