<div>
    @if($partners->count() > 0)
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 items-center">
            @foreach($partners as $partner)
                <div class="flex items-center justify-center p-6 bg-secondary-bg rounded-xl hover:bg-secondary-bg/80 transition-colors transform hover:-translate-y-1 duration-300">
                    @if($partner->logo)
                        <img src="{{ Storage::url($partner->logo) }}"
                             alt="{{ $partner->name }}"
                             class="max-h-16 w-auto grayscale hover:grayscale-0 transition-all duration-300"
                             title="{{ $partner->name }}">
                    @else
                        <div class="text-text-main/50 font-semibold">{{ $partner->name }}</div>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-12">
            <p class="text-text-main/50">No partner logos available yet.</p>
        </div>
    @endif
</div>
