<x-admin-layout>
    <x-slot name="title">Dashboard</x-slot>

    <!-- Welcome Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-text-main mb-2">
            Welcome back, {{ auth()->user()->name }}! 👋
        </h1>
        <p class="text-text-main/60">
            Here's what's happening with your website today.
        </p>
    </div>

    <!-- Stats Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Projects Stat -->
        <x-admin.stat-card
            title="Total Projects"
            :value="$stats['projects']['total']"
            :link="route('admin.projects.index')"
            color="accent"
            :trend="$stats['projects']['trend']">
            <x-slot name="icon">
                <svg class="w-7 h-7 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                </svg>
            </x-slot>
        </x-admin.stat-card>

        <!-- Partners Stat -->
        <x-admin.stat-card
            title="Active Partners"
            :value="$stats['partners']['active']"
            :link="route('admin.partners.index')"
            color="highlight"
            :trend="$stats['partners']['trend']">
            <x-slot name="icon">
                <svg class="w-7 h-7 text-highlight" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </x-slot>
        </x-admin.stat-card>

        <!-- Team Stat -->
        <x-admin.stat-card
            title="Team Members"
            :value="$stats['team']['total']"
            :link="route('admin.team.index')"
            color="accent"
            :trend="$stats['team']['trend']">
            <x-slot name="icon">
                <svg class="w-7 h-7 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </x-slot>
        </x-admin.stat-card>

        <!-- Quotations Stat -->
        <x-admin.stat-card
            title="Pending Quotations"
            :value="$stats['quotations']['pending']"
            :link="route('admin.quotations.index')"
            color="highlight"
            :trend="$stats['quotations']['trend']">
            <x-slot name="icon">
                <svg class="w-7 h-7 text-highlight" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                </svg>
            </x-slot>
        </x-admin.stat-card>
    </div>

    <!-- Two Column Grid -->
    <div class="grid lg:grid-cols-3 gap-6 mb-8">

        <!-- Quotations Chart -->
        <div class="lg:col-span-2 bg-secondary-bg rounded-xl p-6 border border-text-main/10">
            <h2 class="text-xl font-bold text-text-main mb-6">Quotations Overview</h2>
            <canvas id="quotationsChart" height="100"></canvas>
        </div>

        <!-- Status Breakdown -->
        <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
            <h2 class="text-xl font-bold text-text-main mb-6">Status Breakdown</h2>
            <div class="space-y-4">
                @php
                    $statusLabels = [
                        'new' => 'New',
                        'in_progress' => 'In Progress',
                        'contacted' => 'Contacted',
                        'converted' => 'Converted',
                        'rejected' => 'Rejected',
                    ];
                    $statusColors = [
                        'new' => 'accent',
                        'in_progress' => 'yellow-500',
                        'contacted' => 'blue-500',
                        'converted' => 'highlight',
                        'rejected' => 'red-500',
                    ];
                @endphp

                @foreach($statusLabels as $key => $label)
                    @php $count = $statusBreakdown[$key] ?? 0; @endphp
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-3 h-3 rounded-full bg-{{ $statusColors[$key] }}"></div>
                            <span class="text-text-main/80 text-sm">{{ $label }}</span>
                        </div>
                        <span class="text-text-main font-semibold">{{ $count }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Recent Quotations Table -->
    <div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-text-main">Recent Quotations</h2>
            <a href="{{ route('admin.quotations.index') }}" class="text-accent hover:text-highlight transition-colors text-sm font-medium">
                View All →
            </a>
        </div>

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
                    @forelse($recentQuotations as $quotation)
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
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center">
                                <svg class="w-16 h-16 text-text-main/20 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                </svg>
                                <p class="text-text-main/60 text-lg">No quotations yet</p>
                                <p class="text-text-main/40 text-sm mt-2">Quotations will appear here as they come in</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        // Quotations Chart
        const ctx = document.getElementById('quotationsChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($quotationsChart['labels']),
                datasets: [{
                    label: 'Quotations',
                    data: @json($quotationsChart['data']),
                    borderColor: '#00FFFF',
                    backgroundColor: 'rgba(0, 255, 255, 0.1)',
                    tension: 0.4,
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#E2E8F0',
                            precision: 0
                        },
                        grid: {
                            color: 'rgba(226, 232, 240, 0.1)'
                        }
                    },
                    x: {
                        ticks: {
                            color: '#E2E8F0'
                        },
                        grid: {
                            color: 'rgba(226, 232, 240, 0.1)'
                        }
                    }
                }
            }
        });
    </script>
    @endpush

</x-admin-layout>
