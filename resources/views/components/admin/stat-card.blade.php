@props(['title', 'value', 'icon', 'color' => 'accent', 'trend' => null, 'link' => null])

<div class="bg-secondary-bg rounded-xl p-6 border border-text-main/10 hover:border-{{ $color }}/30 transition-all duration-300">
    <div class="flex items-center justify-between mb-4">
        <div class="flex-1">
            <p class="text-text-main/60 text-sm font-medium mb-1">{{ $title }}</p>
            <p class="text-3xl font-bold text-text-main">{{ $value }}</p>

            @if($trend)
                <div class="flex items-center mt-2">
                    @if($trend['direction'] === 'up')
                        <svg class="w-4 h-4 text-highlight mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        <span class="text-highlight text-sm font-medium">{{ $trend['value'] }}</span>
                    @else
                        <svg class="w-4 h-4 text-red-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path>
                        </svg>
                        <span class="text-red-500 text-sm font-medium">{{ $trend['value'] }}</span>
                    @endif
                    <span class="text-text-main/50 text-xs ml-1">{{ $trend['label'] ?? 'vs last month' }}</span>
                </div>
            @endif
        </div>

        <div class="w-14 h-14 bg-{{ $color }}/10 rounded-xl flex items-center justify-center flex-shrink-0 ml-4">
            {!! $icon !!}
        </div>
    </div>

    @if($link)
        <a href="{{ $link }}" class="text-{{ $color }} hover:text-text-main text-sm font-medium flex items-center transition-colors">
            View details
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    @endif
</div>
