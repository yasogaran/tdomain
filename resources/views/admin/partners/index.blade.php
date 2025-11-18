<x-admin-layout>
    <x-slot name="title">Partners</x-slot>

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-text-main mb-2">Partners</h1>
                <p class="text-text-main/60">Manage your partner companies and their logos</p>
            </div>
        </div>
    </div>

    <!-- Partners Manager (Livewire Component) -->
    <livewire:admin.partners-manager />

</x-admin-layout>
