<x-admin-layout>
    <x-slot name="title">Quotation Details</x-slot>

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-text-main mb-2">Quotation from {{ $quotation->name }}</h1>
                <p class="text-text-main/60">Submitted {{ $quotation->created_at->diffForHumans() }}</p>
            </div>
            <a href="{{ route('admin.quotations.index') }}"
               class="px-6 py-3 bg-secondary-bg hover:bg-text-main/5 text-text-main font-medium rounded-lg transition-colors border border-text-main/10">
                Back to Quotations
            </a>
        </div>
    </div>

    <!-- Quotation Details -->
    <div class="grid lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Contact Information -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h2 class="text-xl font-bold text-text-main mb-6">Contact Information</h2>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Name</label>
                        <p class="text-text-main mt-1 text-lg">{{ $quotation->name }}</p>
                    </div>

                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Company</label>
                        <p class="text-text-main mt-1 text-lg">{{ $quotation->company }}</p>
                    </div>

                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Email</label>
                        <a href="mailto:{{ $quotation->email }}"
                           class="text-accent hover:text-highlight mt-1 block text-lg">
                            {{ $quotation->email }}
                        </a>
                    </div>

                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Phone</label>
                        <a href="tel:{{ $quotation->phone }}"
                           class="text-accent hover:text-highlight mt-1 block text-lg">
                            {{ $quotation->phone }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Project Details -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h2 class="text-xl font-bold text-text-main mb-6">Project Details</h2>

                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Service Type</label>
                        <p class="text-text-main mt-1">{{ $quotation->service_type }}</p>
                    </div>

                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Budget</label>
                        <p class="text-text-main mt-1">{{ $quotation->budget }}</p>
                    </div>

                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Timeline</label>
                        <p class="text-text-main mt-1">{{ $quotation->timeline }}</p>
                    </div>
                </div>

                <div>
                    <label class="text-sm text-text-main/60 font-medium">Description</label>
                    <p class="text-text-main/80 mt-2 leading-relaxed">{{ $quotation->description }}</p>
                </div>
            </div>

            <!-- Internal Notes -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h2 class="text-xl font-bold text-text-main mb-6">Internal Notes</h2>

                <form action="{{ route('admin.quotations.update', $quotation) }}" method="POST" id="notesForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="{{ $quotation->status }}">

                    <textarea name="notes"
                              rows="6"
                              class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent"
                              placeholder="Add internal notes about this quotation...">{{ old('notes', $quotation->notes) }}</textarea>

                    <div class="mt-4">
                        <button type="submit"
                                class="px-6 py-2 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                            Save Notes
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Status Card -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h3 class="text-lg font-bold text-text-main mb-4">Status</h3>

                <form action="{{ route('admin.quotations.update', $quotation) }}" method="POST" id="statusForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="notes" value="{{ $quotation->notes }}">

                    <select name="status"
                            onchange="document.getElementById('statusForm').submit()"
                            class="w-full px-4 py-3 bg-primary-bg border border-text-main/10 rounded-lg text-text-main focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                        <option value="new" {{ $quotation->status === 'new' ? 'selected' : '' }}>New</option>
                        <option value="in_progress" {{ $quotation->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="contacted" {{ $quotation->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                        <option value="converted" {{ $quotation->status === 'converted' ? 'selected' : '' }}>Converted</option>
                        <option value="rejected" {{ $quotation->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </form>

                <div class="mt-4">
                    <p class="px-3 py-2 rounded-lg text-center text-sm font-medium
                        @if($quotation->status === 'new') bg-accent/10 text-accent
                        @elseif($quotation->status === 'in_progress') bg-yellow-500/10 text-yellow-500
                        @elseif($quotation->status === 'contacted') bg-blue-500/10 text-blue-500
                        @elseif($quotation->status === 'converted') bg-highlight/10 text-highlight
                        @else bg-red-500/10 text-red-500
                        @endif">
                        {{ ucfirst(str_replace('_', ' ', $quotation->status)) }}
                    </p>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h3 class="text-lg font-bold text-text-main mb-4">Quick Actions</h3>

                <div class="space-y-3">
                    <a href="mailto:{{ $quotation->email }}"
                       class="flex items-center justify-center space-x-2 w-full px-4 py-2 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span>Send Email</span>
                    </a>

                    <a href="tel:{{ $quotation->phone }}"
                       class="flex items-center justify-center space-x-2 w-full px-4 py-2 bg-secondary-bg hover:bg-text-main/5 text-text-main font-medium rounded-lg transition-colors border border-text-main/10">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span>Call</span>
                    </a>
                </div>
            </div>

            <!-- Timestamps -->
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h3 class="text-lg font-bold text-text-main mb-4">Timeline</h3>

                <div class="space-y-3">
                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Submitted</label>
                        <p class="text-text-main text-sm mt-1">{{ $quotation->created_at->format('M d, Y H:i') }}</p>
                        <p class="text-text-main/40 text-xs mt-1">{{ $quotation->created_at->diffForHumans() }}</p>
                    </div>

                    <div>
                        <label class="text-sm text-text-main/60 font-medium">Last Updated</label>
                        <p class="text-text-main text-sm mt-1">{{ $quotation->updated_at->format('M d, Y H:i') }}</p>
                        <p class="text-text-main/40 text-xs mt-1">{{ $quotation->updated_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>

            <!-- Delete (Admin Only) -->
            @can('admin')
            <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
                <h3 class="text-lg font-bold text-text-main mb-4">Danger Zone</h3>

                <form action="{{ route('admin.quotations.destroy', $quotation) }}"
                      method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this quotation? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="w-full px-4 py-2 bg-red-500/10 hover:bg-red-500/20 text-red-500 font-medium rounded-lg transition-colors">
                        Delete Quotation
                    </button>
                </form>
            </div>
            @endcan
        </div>
    </div>
</x-admin-layout>
