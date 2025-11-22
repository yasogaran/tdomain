<x-admin-layout>
    <x-slot name="title">{{ $team->name }}</x-slot>

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-text-main mb-2">{{ $team->name }}</h1>
                <p class="text-text-main/60">{{ $team->position }} - {{ $team->department }}</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.team.edit', $team) }}"
                   class="px-6 py-3 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                    Edit Profile
                </a>
                <a href="{{ route('admin.team.index') }}"
                   class="px-6 py-3 bg-secondary-bg hover:bg-text-main/5 text-text-main font-medium rounded-lg transition-colors border border-text-main/10">
                    Back to Team
                </a>
            </div>
        </div>
    </div>

    <!-- Team Member Details -->
    <div class="grid lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Profile Card -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <div class="flex items-start space-x-6">
                    <!-- Photo -->
                    <div class="flex-shrink-0">
                        @if($team->photo_path)
                            <img src="{{ Storage::url($team->photo_path) }}"
                                 alt="{{ $team->name }}"
                                 class="w-32 h-32 rounded-full object-cover border-2 border-text-main/10">
                        @else
                            <div class="w-32 h-32 rounded-full bg-accent/10 flex items-center justify-center border-2 border-text-main/10">
                                <span class="text-4xl text-accent font-bold">{{ strtoupper(substr($team->name, 0, 1)) }}</span>
                            </div>
                        @endif
                    </div>

                    <!-- Details -->
                    <div class="flex-1">
                        <h2 class="text-2xl font-bold text-text-main mb-2">{{ $team->name }}</h2>
                        <p class="text-lg text-accent mb-1">{{ $team->position }}</p>
                        <p class="text-text-main/60 mb-4">{{ $team->department }}</p>

                        <div class="flex items-center space-x-4">
                            @if($team->email)
                                <a href="mailto:{{ $team->email }}"
                                   class="flex items-center space-x-2 text-text-main/80 hover:text-accent transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>{{ $team->email }}</span>
                                </a>
                            @endif

                            @if($team->linkedin_url)
                                <a href="{{ $team->linkedin_url }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="flex items-center space-x-2 text-text-main/80 hover:text-accent transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                    </svg>
                                    <span>LinkedIn</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Biography -->
            @if($team->bio)
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h3 class="text-lg font-bold text-text-main mb-3">Biography</h3>
                <p class="text-text-main/80 leading-relaxed">{{ $team->bio }}</p>
            </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Info Card -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h3 class="text-lg font-bold text-text-main mb-4">Information</h3>

                <div class="space-y-4">
                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Position</label>
                        <p class="text-text-main mt-1">{{ $team->position }}</p>
                    </div>

                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Department</label>
                        <p class="text-text-main mt-1">{{ $team->department }}</p>
                    </div>

                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Display Order</label>
                        <p class="text-text-main mt-1">#{{ $team->order }}</p>
                    </div>
                </div>
            </div>

            <!-- Timestamps -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h3 class="text-lg font-bold text-text-main mb-4">Timestamps</h3>

                <div class="space-y-3">
                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Added</label>
                        <p class="text-text-main text-sm mt-1">{{ $team->created_at->format('M d, Y H:i') }}</p>
                    </div>

                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Last Updated</label>
                        <p class="text-text-main text-sm mt-1">{{ $team->updated_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h3 class="text-lg font-bold text-text-main mb-4">Actions</h3>

                <div class="space-y-3">
                    <form action="{{ route('admin.team.destroy', $team) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this team member? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="w-full px-4 py-2 bg-red-500/10 hover:bg-red-500/20 text-red-500 font-medium rounded-lg transition-colors">
                            Delete Team Member
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
