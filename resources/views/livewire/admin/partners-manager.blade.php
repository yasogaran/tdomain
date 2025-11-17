<div>
    <!-- Success Message -->
    @if (session()->has('success'))
        <div class="bg-highlight/10 border border-highlight rounded-lg p-4 mb-6">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-highlight mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <p class="text-highlight">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <!-- Add Partner Button -->
    <div class="mb-6">
        <button wire:click="openCreateModal"
                class="bg-accent text-primary-bg px-6 py-3 rounded-lg font-semibold hover:shadow-lg hover:shadow-accent/50 transition-all flex items-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            <span>Add Partner</span>
        </button>
    </div>

    <!-- Partners Grid -->
    <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-bold text-text-main">
                Partners List
                <span class="text-sm text-text-main/60 font-normal ml-2">({{ $partners->count() }} partners)</span>
            </h3>
            <p class="text-sm text-text-main/60">
                Drag to reorder • Order determines display on website
            </p>
        </div>

        @if($partners->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6"
                 x-data="sortable()"
                 x-init="initSortable($el, @this)">
                @foreach($partners as $partner)
                    <div data-id="{{ $partner->id }}"
                         class="bg-primary-bg rounded-xl p-6 border border-text-main/10 cursor-move hover:border-accent/30 transition-all group relative">

                        <!-- Logo -->
                        <div class="aspect-square mb-4 rounded-lg overflow-hidden bg-secondary-bg flex items-center justify-center p-4">
                            @if($partner->logo_path)
                                <img src="{{ Storage::url($partner->logo_path) }}"
                                     alt="{{ $partner->name }}"
                                     class="max-w-full max-h-full object-contain {{ $partner->status === 'inactive' ? 'opacity-40 grayscale' : '' }}">
                            @else
                                <div class="text-text-main/20">
                                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- Info -->
                        <div class="mb-4">
                            <h4 class="text-lg font-bold text-text-main mb-1">{{ $partner->name }}</h4>

                            @if($partner->description)
                                <p class="text-sm text-text-main/70 line-clamp-2 mb-2">
                                    {{ $partner->description }}
                                </p>
                            @endif

                            @if($partner->website_url)
                                <a href="{{ $partner->website_url }}"
                                   target="_blank"
                                   class="text-xs text-accent hover:text-highlight transition-colors flex items-center space-x-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                    <span>Visit Website</span>
                                </a>
                            @endif
                        </div>

                        <!-- Status Badge -->
                        <div class="mb-4">
                            <button wire:click="toggleStatus({{ $partner->id }})"
                                    class="px-3 py-1 rounded-full text-xs font-medium transition-all
                                    {{ $partner->status === 'active' ? 'bg-highlight/10 text-highlight hover:bg-highlight/20' : 'bg-red-500/10 text-red-500 hover:bg-red-500/20' }}">
                                {{ ucfirst($partner->status) }}
                            </button>
                        </div>

                        <!-- Actions -->
                        <div class="flex items-center space-x-2 pt-4 border-t border-text-main/10">
                            <button wire:click="openEditModal({{ $partner->id }})"
                                    class="flex-1 px-3 py-2 bg-accent/10 text-accent rounded-lg hover:bg-accent hover:text-primary-bg transition-all text-sm font-medium">
                                Edit
                            </button>
                            <button wire:click="delete({{ $partner->id }})"
                                    onclick="return confirm('Are you sure you want to delete this partner?')"
                                    class="flex-1 px-3 py-2 bg-red-500/10 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition-all text-sm font-medium">
                                Delete
                            </button>
                        </div>

                        <!-- Drag Handle -->
                        <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity">
                            <svg class="w-6 h-6 text-text-main/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"></path>
                            </svg>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <svg class="w-16 h-16 text-text-main/20 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                <p class="text-text-main/60 text-lg">No partners yet</p>
                <p class="text-text-main/40 text-sm mt-2">Add your first partner to get started</p>
            </div>
        @endif
    </div>

    <!-- Create/Edit Modal -->
    @if($showModal)
        <div class="fixed inset-0 bg-primary-bg/90 backdrop-blur-sm z-50 flex items-center justify-center p-4"
             x-data
             @click.self="$wire.closeModal()">
            <div class="bg-secondary-bg rounded-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto border border-text-main/10"
                 @click.stop>

                <!-- Modal Header -->
                <div class="p-6 border-b border-text-main/10 flex items-center justify-between sticky top-0 bg-secondary-bg z-10">
                    <h3 class="text-2xl font-bold text-text-main">
                        {{ $editMode ? 'Edit Partner' : 'Add New Partner' }}
                    </h3>
                    <button wire:click="closeModal"
                            class="text-text-main/60 hover:text-red-500 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="p-6 space-y-6">

                    <!-- Partner Name -->
                    <div>
                        <label class="block text-sm font-medium text-text-main mb-2">
                            Partner Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               wire:model.defer="name"
                               class="w-full bg-primary-bg border border-text-main/20 rounded-lg px-4 py-3 text-text-main placeholder-text-main/40 focus:border-accent focus:ring-2 focus:ring-accent/20 transition-all @error('name') border-red-500 @enderror"
                               placeholder="Enter partner name">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-medium text-text-main mb-2">
                            Description <span class="text-text-main/60 text-xs">(Optional)</span>
                        </label>
                        <textarea wire:model.defer="description"
                                  rows="3"
                                  maxlength="500"
                                  class="w-full bg-primary-bg border border-text-main/20 rounded-lg px-4 py-3 text-text-main placeholder-text-main/40 focus:border-accent focus:ring-2 focus:ring-accent/20 transition-all resize-none @error('description') border-red-500 @enderror"
                                  placeholder="Brief description of the partner"></textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-text-main/50 text-xs mt-1">
                            {{ strlen($description ?? '') }}/500 characters
                        </p>
                    </div>

                    <!-- Website URL -->
                    <div>
                        <label class="block text-sm font-medium text-text-main mb-2">
                            Website URL <span class="text-text-main/60 text-xs">(Optional)</span>
                        </label>
                        <input type="url"
                               wire:model.defer="website_url"
                               class="w-full bg-primary-bg border border-text-main/20 rounded-lg px-4 py-3 text-text-main placeholder-text-main/40 focus:border-accent focus:ring-2 focus:ring-accent/20 transition-all @error('website_url') border-red-500 @enderror"
                               placeholder="https://partner-website.com">
                        @error('website_url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Logo Upload -->
                    <div>
                        <label class="block text-sm font-medium text-text-main mb-2">
                            Logo {{ !$editMode ? '*' : '(Optional - leave blank to keep current)' }}
                        </label>
                        <input type="file"
                               wire:model="logo"
                               accept="image/png,image/jpeg,image/jpg,image/svg+xml"
                               class="w-full bg-primary-bg border border-text-main/20 rounded-lg px-4 py-3 text-text-main file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-accent file:text-primary-bg file:font-medium hover:file:bg-accent/90 @error('logo') border-red-500 @enderror">
                        @error('logo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-text-main/50 text-xs mt-1">
                            PNG, JPG, JPEG, or SVG. Max 2MB. Recommended: Square aspect ratio
                        </p>

                        <!-- Logo Preview -->
                        @if($logo)
                            <div class="mt-4 p-4 bg-primary-bg rounded-lg border border-text-main/10">
                                <p class="text-sm text-text-main/80 mb-2">Preview:</p>
                                <div class="w-32 h-32 bg-secondary-bg rounded-lg flex items-center justify-center p-2">
                                    <img src="{{ $logo->temporaryUrl() }}" class="max-w-full max-h-full object-contain">
                                </div>
                            </div>
                        @elseif($editMode && $partnerId)
                            @php
                                $currentPartner = \App\Models\Partner::find($partnerId);
                            @endphp
                            @if($currentPartner && $currentPartner->logo_path)
                                <div class="mt-4 p-4 bg-primary-bg rounded-lg border border-text-main/10">
                                    <p class="text-sm text-text-main/80 mb-2">Current logo:</p>
                                    <div class="w-32 h-32 bg-secondary-bg rounded-lg flex items-center justify-center p-2">
                                        <img src="{{ Storage::url($currentPartner->logo_path) }}" class="max-w-full max-h-full object-contain">
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-medium text-text-main mb-2">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select wire:model.defer="status"
                                class="w-full bg-primary-bg border border-text-main/20 rounded-lg px-4 py-3 text-text-main focus:border-accent focus:ring-2 focus:ring-accent/20 transition-all">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        <p class="text-text-main/50 text-xs mt-1">
                            Only active partners will be displayed on the website
                        </p>
                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="p-6 border-t border-text-main/10 flex items-center justify-end space-x-3 sticky bottom-0 bg-secondary-bg">
                    <button wire:click="closeModal"
                            class="px-6 py-3 border-2 border-text-main/20 text-text-main rounded-lg font-medium hover:border-accent hover:text-accent transition-all">
                        Cancel
                    </button>
                    <button wire:click="save"
                            wire:loading.attr="disabled"
                            class="px-8 py-3 bg-accent text-primary-bg rounded-lg font-semibold hover:shadow-lg hover:shadow-accent/50 transition-all disabled:opacity-50">
                        <span wire:loading.remove>{{ $editMode ? 'Update Partner' : 'Add Partner' }}</span>
                        <span wire:loading>Saving...</span>
                    </button>
                </div>

            </div>
        </div>
    @endif

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script>
        function sortable() {
            return {
                initSortable(el, component) {
                    Sortable.create(el, {
                        animation: 150,
                        ghostClass: 'opacity-50',
                        onEnd: function (evt) {
                            const items = Array.from(el.children).map((child, index) => ({
                                value: child.dataset.id,
                                order: index
                            }));
                            component.call('updateOrder', items);
                        }
                    });
                }
            }
        }
    </script>
    @endpush

</div>
