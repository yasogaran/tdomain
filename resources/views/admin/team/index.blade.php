<x-admin-layout>
    <x-slot name="title">Team Members</x-slot>

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-text-main mb-2">Team Members</h1>
                <p class="text-text-main/60">Manage your team members and their profiles</p>
            </div>
            <a href="{{ route('admin.team.create') }}"
               class="px-6 py-3 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                Add Team Member
            </a>
        </div>
    </div>

    <!-- Team Members List -->
    <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
        @if($teamMembers->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-text-main/10">
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Photo</th>
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Name</th>
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Position</th>
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Department</th>
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Email</th>
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Order</th>
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teamMembers as $member)
                            <tr class="border-b border-text-main/10 hover:bg-primary-bg/50 transition-colors">
                                <td class="py-4 px-4">
                                    @if($member->photo_path)
                                        <img src="{{ Storage::url($member->photo_path) }}"
                                             alt="{{ $member->name }}"
                                             class="w-10 h-10 rounded-full object-cover">
                                    @else
                                        <div class="w-10 h-10 rounded-full bg-accent/10 flex items-center justify-center">
                                            <span class="text-accent font-bold">{{ strtoupper(substr($member->name, 0, 1)) }}</span>
                                        </div>
                                    @endif
                                </td>
                                <td class="py-4 px-4 text-text-main font-medium">
                                    {{ $member->name }}
                                </td>
                                <td class="py-4 px-4 text-text-main/80">
                                    {{ $member->position }}
                                </td>
                                <td class="py-4 px-4 text-text-main/80">
                                    {{ $member->department }}
                                </td>
                                <td class="py-4 px-4 text-text-main/80">
                                    {{ $member->email ?: '-' }}
                                </td>
                                <td class="py-4 px-4 text-text-main/60">
                                    #{{ $member->order }}
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center space-x-3">
                                        <a href="{{ route('admin.team.show', $member) }}"
                                           class="text-accent hover:text-highlight transition-colors text-sm font-medium">
                                            View
                                        </a>
                                        <a href="{{ route('admin.team.edit', $member) }}"
                                           class="text-accent hover:text-highlight transition-colors text-sm font-medium">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.team.destroy', $member) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this team member?');"
                                              class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="text-red-500 hover:text-red-600 transition-colors text-sm font-medium">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $teamMembers->links() }}
            </div>
        @else
            <div class="py-12 text-center">
                <svg class="w-16 h-16 text-text-main/20 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <p class="text-text-main/60 text-lg">No team members yet</p>
                <p class="text-text-main/40 text-sm mt-2">Add your first team member to get started</p>
                <a href="{{ route('admin.team.create') }}"
                   class="inline-block mt-6 px-6 py-3 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                    Add Team Member
                </a>
            </div>
        @endif
    </div>
</x-admin-layout>
