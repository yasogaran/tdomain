<div>
    @if(session()->has('message'))
        <div class="mb-6 bg-accent/10 border border-accent/30 rounded-lg p-4">
            <div class="flex items-start space-x-3">
                <svg class="w-6 h-6 text-accent flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div>
                    <h3 class="font-semibold text-accent mb-1">Success!</h3>
                    <p class="text-text-main/80 text-sm">{{ session('message') }}</p>
                </div>
            </div>
        </div>
    @endif

    <form wire:submit="submit">
        <!-- Name -->
        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-text-main mb-2">
                Full Name <span class="text-accent">*</span>
            </label>
            <input type="text"
                   id="name"
                   wire:model="name"
                   class="w-full bg-primary-bg border border-accent/30 rounded-lg px-4 py-3 text-text-main focus:ring-2 focus:ring-accent focus:border-accent transition-colors"
                   placeholder="John Doe">
            @error('name') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <!-- Email -->
        <div class="mb-6">
            <label for="email" class="block text-sm font-medium text-text-main mb-2">
                Email Address <span class="text-accent">*</span>
            </label>
            <input type="email"
                   id="email"
                   wire:model="email"
                   class="w-full bg-primary-bg border border-accent/30 rounded-lg px-4 py-3 text-text-main focus:ring-2 focus:ring-accent focus:border-accent transition-colors"
                   placeholder="john@example.com">
            @error('email') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <!-- Phone -->
        <div class="mb-6">
            <label for="phone" class="block text-sm font-medium text-text-main mb-2">
                Phone Number
            </label>
            <input type="tel"
                   id="phone"
                   wire:model="phone"
                   class="w-full bg-primary-bg border border-accent/30 rounded-lg px-4 py-3 text-text-main focus:ring-2 focus:ring-accent focus:border-accent transition-colors"
                   placeholder="+1 (555) 123-4567">
            @error('phone') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <!-- Subject -->
        <div class="mb-6">
            <label for="subject" class="block text-sm font-medium text-text-main mb-2">
                Subject <span class="text-accent">*</span>
            </label>
            <input type="text"
                   id="subject"
                   wire:model="subject"
                   class="w-full bg-primary-bg border border-accent/30 rounded-lg px-4 py-3 text-text-main focus:ring-2 focus:ring-accent focus:border-accent transition-colors"
                   placeholder="How can we help you?">
            @error('subject') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <!-- Message -->
        <div class="mb-6">
            <label for="message" class="block text-sm font-medium text-text-main mb-2">
                Message <span class="text-accent">*</span>
            </label>
            <textarea id="message"
                      wire:model="message"
                      rows="6"
                      class="w-full bg-primary-bg border border-accent/30 rounded-lg px-4 py-3 text-text-main focus:ring-2 focus:ring-accent focus:border-accent transition-colors resize-none"
                      placeholder="Tell us more about your inquiry..."></textarea>
            @error('message') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit"
                    wire:loading.attr="disabled"
                    class="w-full bg-accent text-primary-bg px-8 py-4 rounded-lg font-semibold hover:shadow-lg hover:shadow-accent/50 transition-all duration-300 hover:-translate-y-1 disabled:opacity-50 disabled:cursor-not-allowed">
                <span wire:loading.remove>Send Message</span>
                <span wire:loading class="flex items-center justify-center">
                    <svg class="animate-spin h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Sending...
                </span>
            </button>
        </div>
    </form>
</div>
