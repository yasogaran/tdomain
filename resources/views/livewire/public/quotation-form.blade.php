<div class="bg-secondary-bg rounded-xl p-8 lg:p-10">
    @if(session()->has('error'))
        <div class="mb-8 bg-red-500/10 border border-red-500/30 rounded-lg p-4">
            <div class="flex items-start space-x-3">
                <svg class="w-6 h-6 text-red-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div>
                    <h3 class="text-lg font-semibold text-red-500 mb-1">Error!</h3>
                    <p class="text-text-main/80">{{ session('error') }}</p>
                </div>
            </div>
        </div>
    @endif

    @if($submissionSuccess)
        <!-- Success Message -->
        <div class="text-center py-12">
            <div class="w-20 h-20 bg-accent/10 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>

            <h2 class="text-3xl font-bold text-text-main mb-4">
                Thank You for Your Request!
            </h2>

            <p class="text-lg text-text-main/80 mb-6 max-w-2xl mx-auto">
                We've received your quotation request and will review it shortly.
                Our team will get back to you within 24-48 hours with a detailed proposal.
            </p>

            <div class="bg-accent/10 border border-accent/30 rounded-lg p-6 mb-8 max-w-2xl mx-auto">
                <div class="flex items-start space-x-3">
                    <svg class="w-6 h-6 text-accent flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <div class="text-left">
                        <h4 class="font-semibold text-accent mb-1">Confirmation Email Sent</h4>
                        <p class="text-sm text-text-main/80">
                            We've sent a confirmation email to <strong>{{ $email }}</strong>.
                            Please check your inbox (and spam folder) for details about your request.
                        </p>
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                <p class="text-text-main/60">
                    <strong>What happens next?</strong>
                </p>
                <ul class="text-text-main/80 space-y-2 max-w-md mx-auto text-left">
                    <li class="flex items-start space-x-2">
                        <span class="text-accent mt-1">1.</span>
                        <span>Our team will review your requirements</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <span class="text-accent mt-1">2.</span>
                        <span>We'll prepare a customized proposal for your project</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <span class="text-accent mt-1">3.</span>
                        <span>You'll receive a detailed quotation via email</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <span class="text-accent mt-1">4.</span>
                        <span>We'll schedule a call to discuss next steps</span>
                    </li>
                </ul>
            </div>

            <div class="mt-8 flex justify-center space-x-4">
                <a href="{{ route('home') }}"
                   class="px-6 py-3 bg-accent hover:bg-highlight text-primary-bg font-medium rounded-lg transition-colors">
                    Return to Home
                </a>
                <button wire:click="resetForm"
                        class="px-6 py-3 bg-secondary-bg hover:bg-text-main/5 text-text-main font-medium rounded-lg transition-colors border border-text-main/10">
                    Submit Another Request
                </button>
            </div>
        </div>
    @else
    <form wire:submit="submit">
        <div class="grid md:grid-cols-2 gap-6">
            <!-- Name -->
            <div>
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
            <div>
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
            <div>
                <label for="phone" class="block text-sm font-medium text-text-main mb-2">
                    Phone Number <span class="text-accent">*</span>
                </label>
                <input type="tel"
                       id="phone"
                       wire:model="phone"
                       class="w-full bg-primary-bg border border-accent/30 rounded-lg px-4 py-3 text-text-main focus:ring-2 focus:ring-accent focus:border-accent transition-colors"
                       placeholder="+1 (555) 123-4567">
                @error('phone') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Company -->
            <div>
                <label for="company" class="block text-sm font-medium text-text-main mb-2">
                    Company Name <span class="text-accent">*</span>
                </label>
                <input type="text"
                       id="company"
                       wire:model="company"
                       class="w-full bg-primary-bg border border-accent/30 rounded-lg px-4 py-3 text-text-main focus:ring-2 focus:ring-accent focus:border-accent transition-colors"
                       placeholder="Your Company">
                @error('company') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Service Type -->
            <div>
                <label for="service_type" class="block text-sm font-medium text-text-main mb-2">
                    Service Type <span class="text-accent">*</span>
                </label>
                <select id="service_type"
                        wire:model="service_type"
                        class="w-full bg-primary-bg border border-accent/30 rounded-lg px-4 py-3 text-text-main focus:ring-2 focus:ring-accent focus:border-accent transition-colors">
                    <option value="">Select a service</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Mobile Development">Mobile Development</option>
                    <option value="E-commerce">E-commerce</option>
                    <option value="CMS Development">CMS Development</option>
                    <option value="Cloud Solutions">Cloud Solutions</option>
                    <option value="IT Consulting">IT Consulting</option>
                    <option value="Other">Other</option>
                </select>
                @error('service_type') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Budget Range -->
            <div>
                <label for="budget" class="block text-sm font-medium text-text-main mb-2">
                    Budget Range <span class="text-accent">*</span>
                </label>
                <select id="budget"
                        wire:model="budget"
                        class="w-full bg-primary-bg border border-accent/30 rounded-lg px-4 py-3 text-text-main focus:ring-2 focus:ring-accent focus:border-accent transition-colors">
                    <option value="">Select budget range</option>
                    <option value="<$10k">Less than $10,000</option>
                    <option value="$10k-$25k">$10,000 - $25,000</option>
                    <option value="$25k-$50k">$25,000 - $50,000</option>
                    <option value="$50k-$100k">$50,000 - $100,000</option>
                    <option value="$100k+">$100,000+</option>
                </select>
                @error('budget') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Project Description -->
        <div class="mt-6">
            <label for="description" class="block text-sm font-medium text-text-main mb-2">
                Project Description <span class="text-accent">*</span>
            </label>
            <textarea id="description"
                      wire:model="description"
                      rows="6"
                      class="w-full bg-primary-bg border border-accent/30 rounded-lg px-4 py-3 text-text-main focus:ring-2 focus:ring-accent focus:border-accent transition-colors resize-none"
                      placeholder="Tell us about your project requirements, goals, and any specific features you need..."></textarea>
            @error('description') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <!-- Timeline -->
        <div class="mt-6">
            <label for="timeline" class="block text-sm font-medium text-text-main mb-2">
                Expected Timeline <span class="text-accent">*</span>
            </label>
            <select id="timeline"
                    wire:model="timeline"
                    class="w-full bg-primary-bg border border-accent/30 rounded-lg px-4 py-3 text-text-main focus:ring-2 focus:ring-accent focus:border-accent transition-colors">
                <option value="">Select timeline</option>
                <option value="ASAP">As soon as possible</option>
                <option value="1-3 months">1-3 months</option>
                <option value="3-6 months">3-6 months</option>
                <option value="6+ months">6+ months</option>
                <option value="Flexible">Flexible</option>
            </select>
            @error('timeline') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <div class="mt-8">
            <button type="submit"
                    wire:loading.attr="disabled"
                    class="w-full bg-accent text-primary-bg px-8 py-4 rounded-lg font-semibold text-lg hover:shadow-lg hover:shadow-accent/50 transition-all duration-300 hover:-translate-y-1 disabled:opacity-50 disabled:cursor-not-allowed">
                <span wire:loading.remove>Submit Request</span>
                <span wire:loading>
                    <svg class="animate-spin h-5 w-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </span>
            </button>
        </div>

        <!-- Privacy Note -->
        <p class="text-xs text-text-main/50 text-center mt-4">
            We respect your privacy. Your information will be kept confidential and used solely for responding to your inquiry.
        </p>
    </form>
    @endif
</div>
