<div>
    <!-- Filters -->
    <div class="mb-12">
        <div class="flex flex-col md:flex-row gap-4 items-start md:items-center justify-between">
            <div class="flex flex-wrap gap-3">
                <!-- Industry Filter -->
                <select wire:model.live="industry"
                        class="bg-secondary-bg border border-accent/30 text-text-main rounded-lg px-4 py-2 focus:ring-2 focus:ring-accent focus:border-accent transition-colors">
                    <option value="">All Industries</option>
                    @foreach($this->industries as $industryOption)
                        <option value="{{ $industryOption }}">{{ $industryOption }}</option>
                    @endforeach
                </select>

                <!-- Service Type Filter -->
                <select wire:model.live="serviceType"
                        class="bg-secondary-bg border border-accent/30 text-text-main rounded-lg px-4 py-2 focus:ring-2 focus:ring-accent focus:border-accent transition-colors">
                    <option value="">All Services</option>
                    @foreach($this->serviceTypes as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>

                <!-- Clear Filters -->
                @if($industry || $serviceType)
                    <button wire:click="clearFilters"
                            class="px-4 py-2 text-accent hover:text-highlight transition-colors font-medium">
                        Clear Filters
                    </button>
                @endif
            </div>

            <!-- Results Count -->
            <div class="text-text-main/70">
                {{ $projects->total() }} {{ Str::plural('project', $projects->total()) }} found
            </div>
        </div>
    </div>

    <!-- Projects Grid -->
    @if($projects->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @foreach($projects as $project)
                <x-project-card :project="$project" />
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="flex justify-center">
            {{ $projects->links() }}
        </div>
    @else
        <div class="text-center py-16">
            <svg class="w-24 h-24 text-text-main/20 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <p class="text-xl text-text-main/70 mb-4">No projects found matching your criteria.</p>
            <button wire:click="clearFilters"
                    class="text-accent hover:text-highlight transition-colors font-medium">
                Clear filters to see all projects
            </button>
        </div>
    @endif
</div>
