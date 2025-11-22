<x-admin-layout>
    <x-slot name="title">Projects</x-slot>

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-text-main mb-2">Projects</h1>
                <p class="text-text-main/60">Manage your project portfolio and case studies</p>
            </div>
            <a href="{{ route('admin.projects.create') }}"
               class="px-6 py-3 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                Add New Project
            </a>
        </div>
    </div>

    <!-- Projects List -->
    <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
        @if($projects->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-text-main/10">
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Title</th>
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Client</th>
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Industry</th>
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Service</th>
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Status</th>
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Featured</th>
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                            <tr class="border-b border-text-main/10 hover:bg-primary-bg/50 transition-colors">
                                <td class="py-4 px-4 text-text-main font-medium">
                                    {{ $project->title }}
                                </td>
                                <td class="py-4 px-4 text-text-main/80">
                                    {{ $project->client_name }}
                                </td>
                                <td class="py-4 px-4 text-text-main/80">
                                    {{ $project->industry }}
                                </td>
                                <td class="py-4 px-4 text-text-main/80">
                                    {{ $project->service_type }}
                                </td>
                                <td class="py-4 px-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-medium
                                        @if($project->status === 'published') bg-highlight/10 text-highlight
                                        @elseif($project->status === 'draft') bg-yellow-500/10 text-yellow-500
                                        @else bg-red-500/10 text-red-500
                                        @endif">
                                        {{ ucfirst($project->status) }}
                                    </span>
                                </td>
                                <td class="py-4 px-4">
                                    @if($project->featured)
                                        <span class="text-accent">★</span>
                                    @else
                                        <span class="text-text-main/20">☆</span>
                                    @endif
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center space-x-3">
                                        <a href="{{ route('admin.projects.show', $project) }}"
                                           class="text-accent hover:text-highlight transition-colors text-sm font-medium">
                                            View
                                        </a>
                                        <a href="{{ route('admin.projects.edit', $project) }}"
                                           class="text-accent hover:text-highlight transition-colors text-sm font-medium">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.projects.destroy', $project) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this project?');"
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
                {{ $projects->links() }}
            </div>
        @else
            <div class="py-12 text-center">
                <svg class="w-16 h-16 text-text-main/20 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                </svg>
                <p class="text-text-main/60 text-lg">No projects yet</p>
                <p class="text-text-main/40 text-sm mt-2">Add your first project to showcase your work</p>
                <a href="{{ route('admin.projects.create') }}"
                   class="inline-block mt-6 px-6 py-3 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                    Add New Project
                </a>
            </div>
        @endif
    </div>
</x-admin-layout>
