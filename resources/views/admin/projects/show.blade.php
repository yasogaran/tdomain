<x-admin-layout>
    <x-slot name="title">{{ $project->title }}</x-slot>

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-text-main mb-2">{{ $project->title }}</h1>
                <p class="text-text-main/60">{{ $project->client_name }} - {{ $project->industry }}</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.projects.edit', $project) }}"
                   class="px-6 py-3 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                    Edit Project
                </a>
                <a href="{{ route('admin.projects.index') }}"
                   class="px-6 py-3 bg-secondary-bg hover:bg-text-main/5 text-text-main font-medium rounded-lg transition-colors border border-text-main/10">
                    Back to Projects
                </a>
            </div>
        </div>
    </div>

    <!-- Project Details -->
    <div class="grid lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Basic Info -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h2 class="text-xl font-bold text-text-main mb-6">Project Details</h2>

                <div class="space-y-4">
                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Client Name</label>
                        <p class="text-text-main mt-1">{{ $project->client_name }}</p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm text-text-main/60 font-medium">Industry</label>
                            <p class="text-text-main mt-1">{{ $project->industry }}</p>
                        </div>
                        <div>
                            <label class="text-sm text-text-main/60 font-medium">Service Type</label>
                            <p class="text-text-main mt-1">{{ $project->service_type }}</p>
                        </div>
                    </div>

                    @if($project->technology_stack)
                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Technology Stack</label>
                        <p class="text-text-main mt-1">{{ $project->technology_stack }}</p>
                    </div>
                    @endif

                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Slug</label>
                        <p class="text-text-main mt-1 font-mono text-sm">{{ $project->slug }}</p>
                    </div>
                </div>
            </div>

            <!-- Challenge -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h3 class="text-lg font-bold text-text-main mb-3">Challenge</h3>
                <p class="text-text-main/80 leading-relaxed">{{ $project->challenge }}</p>
            </div>

            <!-- Solution -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h3 class="text-lg font-bold text-text-main mb-3">Solution</h3>
                <p class="text-text-main/80 leading-relaxed">{{ $project->solution }}</p>
            </div>

            <!-- Results -->
            @if($project->results)
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h3 class="text-lg font-bold text-text-main mb-3">Results</h3>
                <p class="text-text-main/80 leading-relaxed">{{ $project->results }}</p>
            </div>
            @endif

            <!-- Media Gallery -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h3 class="text-lg font-bold text-text-main mb-4">Media Gallery</h3>

                @if($project->media->count() > 0)
                    <div class="grid md:grid-cols-2 gap-4">
                        @foreach($project->media as $media)
                            <div class="relative group">
                                @if($media->type === 'image')
                                    <img src="{{ Storage::url($media->path) }}"
                                         alt="{{ $media->caption }}"
                                         class="w-full h-48 object-cover rounded-lg">
                                @else
                                    <video src="{{ Storage::url($media->path) }}"
                                           class="w-full h-48 object-cover rounded-lg"
                                           controls></video>
                                @endif

                                @if($media->caption)
                                    <p class="mt-2 text-sm text-text-main/60">{{ $media->caption }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-text-main/60 text-center py-8">No media uploaded yet</p>
                @endif
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Status Card -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h3 class="text-lg font-bold text-text-main mb-4">Status</h3>

                <div class="space-y-4">
                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Publication Status</label>
                        <p class="mt-1">
                            <span class="px-3 py-1 rounded-full text-xs font-medium
                                @if($project->status === 'published') bg-highlight/10 text-highlight
                                @elseif($project->status === 'draft') bg-yellow-500/10 text-yellow-500
                                @else bg-red-500/10 text-red-500
                                @endif">
                                {{ ucfirst($project->status) }}
                            </span>
                        </p>
                    </div>

                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Featured</label>
                        <p class="text-text-main mt-1">
                            @if($project->featured)
                                <span class="text-accent">★ Featured Project</span>
                            @else
                                <span class="text-text-main/60">Not featured</span>
                            @endif
                        </p>
                    </div>

                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Order</label>
                        <p class="text-text-main mt-1">#{{ $project->order }}</p>
                    </div>
                </div>
            </div>

            <!-- Timestamps -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h3 class="text-lg font-bold text-text-main mb-4">Timestamps</h3>

                <div class="space-y-3">
                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Created</label>
                        <p class="text-text-main text-sm mt-1">{{ $project->created_at->format('M d, Y H:i') }}</p>
                    </div>

                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Last Updated</label>
                        <p class="text-text-main text-sm mt-1">{{ $project->updated_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h3 class="text-lg font-bold text-text-main mb-4">Actions</h3>

                <div class="space-y-3">
                    <form action="{{ route('admin.projects.destroy', $project) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this project? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="w-full px-4 py-2 bg-red-500/10 hover:bg-red-500/20 text-red-500 font-medium rounded-lg transition-colors">
                            Delete Project
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
