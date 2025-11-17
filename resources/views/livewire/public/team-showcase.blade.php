<div>
    @if($teamMembers->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($teamMembers as $member)
                <div class="bg-secondary-bg rounded-xl overflow-hidden transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent/20 group">
                    <!-- Photo -->
                    <div class="relative aspect-square overflow-hidden">
                        @if($member->photo)
                            <img src="{{ Storage::url($member->photo) }}"
                                 alt="{{ $member->name }}"
                                 class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                        @else
                            <div class="w-full h-full bg-primary-bg flex items-center justify-center">
                                <svg class="w-24 h-24 text-text-main/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        @endif

                        <!-- Overlay with social links -->
                        @if($member->linkedin || $member->twitter)
                            <div class="absolute inset-0 bg-primary-bg/90 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center space-x-4">
                                @if($member->linkedin)
                                    <a href="{{ $member->linkedin }}"
                                       target="_blank"
                                       rel="noopener noreferrer"
                                       class="w-10 h-10 bg-accent/20 rounded-lg flex items-center justify-center hover:bg-accent/40 transition-colors">
                                        <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                        </svg>
                                    </a>
                                @endif

                                @if($member->twitter)
                                    <a href="{{ $member->twitter }}"
                                       target="_blank"
                                       rel="noopener noreferrer"
                                       class="w-10 h-10 bg-accent/20 rounded-lg flex items-center justify-center hover:bg-accent/40 transition-colors">
                                        <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>

                    <!-- Info -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-text-main mb-1 group-hover:text-accent transition-colors">
                            {{ $member->name }}
                        </h3>
                        <p class="text-accent text-sm font-medium mb-3">
                            {{ $member->role }}
                        </p>
                        @if($member->bio)
                            <p class="text-text-main/70 text-sm line-clamp-3">
                                {{ $member->bio }}
                            </p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-12">
            <svg class="w-24 h-24 text-text-main/20 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            <p class="text-xl text-text-main/70">No team members available yet.</p>
        </div>
    @endif
</div>
