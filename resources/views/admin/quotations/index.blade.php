<x-admin-layout>
    <x-slot name="title">Quotations</x-slot>

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-text-main mb-2">Quotations</h1>
                <p class="text-text-main/60">Manage quotation requests and leads</p>
            </div>
            <a href="{{ route('admin.quotations.export') }}{{ request()->status ? '?status='.request()->status : '' }}"
               class="px-6 py-3 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                Export to CSV
            </a>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10 mb-6">
        <form method="GET" action="{{ route('admin.quotations.index') }}" class="flex flex-wrap gap-4">
            <!-- Status Filter -->
            <div class="flex-1 min-w-[200px]">
                <label for="status" class="block text-sm font-medium text-text-main mb-2">Status</label>
                <select name="status"
                        id="status"
                        onchange="this.form.submit()"
                        class="w-full px-4 py-2 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                    <option value="">All Statuses</option>
                    <option value="new" {{ request()->status === 'new' ? 'selected' : '' }}>New</option>
                    <option value="in_progress" {{ request()->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="contacted" {{ request()->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                    <option value="converted" {{ request()->status === 'converted' ? 'selected' : '' }}>Converted</option>
                    <option value="rejected" {{ request()->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>

            <!-- Search -->
            <div class="flex-1 min-w-[300px]">
                <label for="search" class="block text-sm font-medium text-text-main mb-2">Search</label>
                <input type="text"
                       name="search"
                       id="search"
                       value="{{ request()->search }}"
                       placeholder="Name, company, or email..."
                       class="w-full px-4 py-2 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
            </div>

            <!-- Search Button -->
            <div class="flex items-end">
                <button type="submit"
                        class="px-6 py-2 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                    Search
                </button>
            </div>

            <!-- Clear Filters -->
            @if(request()->has('status') || request()->has('search'))
            <div class="flex items-end">
                <a href="{{ route('admin.quotations.index') }}"
                   class="px-6 py-2 bg-secondary-bg hover:bg-text-main/5 text-text-main font-medium rounded-lg transition-colors border border-text-main/10">
                    Clear
                </a>
            </div>
            @endif
        </form>
    </div>

    <!-- Quotations List -->
    <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
        @if($quotations->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-text-main/10">
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Date</th>
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Name</th>
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Company</th>
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Service</th>
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Budget</th>
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Status</th>
                            <th class="text-left py-3 px-4 text-text-main/60 font-medium text-sm">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quotations as $quotation)
                            <tr class="border-b border-text-main/10 hover:bg-primary-bg/50 transition-colors">
                                <td class="py-4 px-4 text-text-main/80 text-sm whitespace-nowrap">
                                    {{ $quotation->created_at->format('M d, Y') }}
                                </td>
                                <td class="py-4 px-4 text-text-main font-medium">
                                    {{ $quotation->name }}
                                </td>
                                <td class="py-4 px-4 text-text-main/80">
                                    {{ $quotation->company }}
                                </td>
                                <td class="py-4 px-4 text-text-main/80">
                                    {{ $quotation->service_type }}
                                </td>
                                <td class="py-4 px-4 text-text-main/80">
                                    {{ $quotation->budget }}
                                </td>
                                <td class="py-4 px-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-medium whitespace-nowrap
                                        @if($quotation->status === 'new') bg-accent/10 text-accent
                                        @elseif($quotation->status === 'in_progress') bg-yellow-500/10 text-yellow-500
                                        @elseif($quotation->status === 'contacted') bg-blue-500/10 text-blue-500
                                        @elseif($quotation->status === 'converted') bg-highlight/10 text-highlight
                                        @else bg-red-500/10 text-red-500
                                        @endif">
                                        {{ ucfirst(str_replace('_', ' ', $quotation->status)) }}
                                    </span>
                                </td>
                                <td class="py-4 px-4">
                                    <a href="{{ route('admin.quotations.show', $quotation) }}"
                                       class="text-accent hover:text-highlight transition-colors text-sm font-medium whitespace-nowrap">
                                        View Details
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $quotations->links() }}
            </div>
        @else
            <div class="py-12 text-center">
                <svg class="w-16 h-16 text-text-main/20 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                </svg>
                <p class="text-text-main/60 text-lg">
                    @if(request()->has('status') || request()->has('search'))
                        No quotations match your filters
                    @else
                        No quotations yet
                    @endif
                </p>
                <p class="text-text-main/40 text-sm mt-2">
                    @if(request()->has('status') || request()->has('search'))
                        Try adjusting your search criteria
                    @else
                        Quotations from your website will appear here
                    @endif
                </p>
            </div>
        @endif
    </div>
</x-admin-layout>
