<x-app-layout>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0 bg-primary-bg">
            <div class="absolute inset-0 bg-gradient-to-br from-accent/5 to-transparent"></div>
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(0, 255, 255, 0.1) 1px, transparent 0); background-size: 40px 40px;"></div>
        </div>

        <!-- 3D Floating Shapes -->
        <div class="absolute inset-0 pointer-events-none">
            <!-- Floating Cube 1 -->
            <div class="floating-shape absolute top-20 left-[10%] w-32 h-32 opacity-20" style="animation-delay: 0s;">
                <div class="shape-3d">
                    <div class="cube">
                        <div class="cube-face cube-front bg-gradient-to-br from-accent/30 to-highlight/30"></div>
                        <div class="cube-face cube-back bg-gradient-to-br from-accent/20 to-highlight/20"></div>
                        <div class="cube-face cube-right bg-gradient-to-br from-accent/25 to-highlight/25"></div>
                        <div class="cube-face cube-left bg-gradient-to-br from-accent/15 to-highlight/15"></div>
                        <div class="cube-face cube-top bg-gradient-to-br from-accent/35 to-highlight/35"></div>
                        <div class="cube-face cube-bottom bg-gradient-to-br from-accent/10 to-highlight/10"></div>
                    </div>
                </div>
            </div>

            <!-- Floating Cube 2 -->
            <div class="floating-shape absolute top-40 right-[15%] w-24 h-24 opacity-15" style="animation-delay: 2s;">
                <div class="shape-3d">
                    <div class="cube">
                        <div class="cube-face cube-front bg-gradient-to-br from-highlight/30 to-accent/30"></div>
                        <div class="cube-face cube-back bg-gradient-to-br from-highlight/20 to-accent/20"></div>
                        <div class="cube-face cube-right bg-gradient-to-br from-highlight/25 to-accent/25"></div>
                        <div class="cube-face cube-left bg-gradient-to-br from-highlight/15 to-accent/15"></div>
                        <div class="cube-face cube-top bg-gradient-to-br from-highlight/35 to-accent/35"></div>
                        <div class="cube-face cube-bottom bg-gradient-to-br from-highlight/10 to-accent/10"></div>
                    </div>
                </div>
            </div>

            <!-- Floating Sphere 1 -->
            <div class="floating-shape absolute bottom-32 left-[20%] w-40 h-40 opacity-10" style="animation-delay: 1s;">
                <div class="sphere bg-gradient-radial from-accent/40 via-accent/20 to-transparent"></div>
            </div>

            <!-- Floating Sphere 2 -->
            <div class="floating-shape absolute top-60 right-[25%] w-28 h-28 opacity-15" style="animation-delay: 3s;">
                <div class="sphere bg-gradient-radial from-highlight/40 via-highlight/20 to-transparent"></div>
            </div>

            <!-- Orbiting Rings -->
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 opacity-10">
                <div class="orbit-ring absolute inset-0 border-2 border-accent/30 rounded-full" style="animation: rotate3d 20s linear infinite;"></div>
                <div class="orbit-ring absolute inset-4 border-2 border-highlight/30 rounded-full" style="animation: rotate3d 15s linear infinite reverse;"></div>
                <div class="orbit-ring absolute inset-8 border border-accent/20 rounded-full" style="animation: rotate3d 25s linear infinite;"></div>
            </div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <!-- Heading with 3D effect -->
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight hero-text-3d">
                    <span class="text-text-main inline-block hover-lift">Transform Your Business with</span>
                    <span class="text-accent block mt-2 inline-block hover-lift" style="animation-delay: 0.1s;">Innovative Solutions</span>
                </h1>

                <!-- Subheading -->
                <p class="text-xl md:text-2xl text-text-main/80 mb-12 leading-relaxed">
                    We deliver cutting-edge technology solutions that drive growth, enhance efficiency, and create lasting impact.
                </p>

                <!-- CTAs -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('quotation.create') }}" class="bg-accent text-primary-bg px-8 py-4 rounded-lg font-semibold text-lg hover:shadow-lg hover:shadow-accent/50 transition-all duration-300 hover:-translate-y-1">
                        Request a Quote
                    </a>
                    <a href="{{ route('portfolio.index') }}" class="border-2 border-accent text-accent px-8 py-4 rounded-lg font-semibold text-lg hover:bg-accent hover:text-primary-bg transition-all duration-300 hover:-translate-y-1">
                        View Our Work
                    </a>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- Featured Projects Section -->
    <section class="py-20 lg:py-32">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-text-main mb-4">
                    Featured <span class="text-accent">Projects</span>
                </h2>
                <p class="text-xl text-text-main/70 max-w-2xl mx-auto">
                    Discover how we've helped businesses achieve their goals through innovative technology solutions
                </p>
            </div>

            <!-- Livewire Component -->
            <livewire:public.featured-projects />

            <!-- View All Button -->
            <div class="text-center mt-12">
                <a href="{{ route('portfolio.index') }}" class="inline-block border-2 border-accent text-accent px-8 py-3 rounded-lg font-semibold hover:bg-accent hover:text-primary-bg transition-all duration-300">
                    View All Projects
                </a>
            </div>
        </div>
    </section>

    <!-- Mission/Services Section -->
    <section class="py-20 lg:py-32 bg-secondary-bg/50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Mission Content -->
                <div>
                    <h2 class="text-4xl md:text-5xl font-bold text-text-main mb-6">
                        Our <span class="text-accent">Mission</span>
                    </h2>
                    <p class="text-lg text-text-main/80 leading-relaxed mb-6">
                        At TECH DOMAIN, we're committed to delivering exceptional technology solutions that empower businesses to thrive in the digital age. Our team of experts combines technical excellence with creative innovation to transform your vision into reality.
                    </p>
                    <p class="text-lg text-text-main/80 leading-relaxed">
                        With over a decade of experience, we've helped hundreds of clients across various industries achieve their digital transformation goals.
                    </p>
                </div>

                <!-- Services List -->
                <div class="space-y-4">
                    <h3 class="text-2xl font-bold text-accent mb-6">What We Offer</h3>

                    <div class="space-y-4">
                        <div class="flex items-start space-x-4 p-4 bg-primary-bg/50 backdrop-blur-sm rounded-lg hover:bg-secondary-bg transition-all duration-300 transform hover:-translate-x-2 hover:scale-105 card-3d border border-text-main/10">
                            <div class="flex-shrink-0 w-12 h-12 bg-accent/10 backdrop-blur-sm rounded-lg flex items-center justify-center icon-float">
                                <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-text-main mb-1">Web Development</h4>
                                <p class="text-sm text-text-main/70">Custom web applications built with modern frameworks</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4 p-4 bg-primary-bg/50 backdrop-blur-sm rounded-lg hover:bg-secondary-bg transition-all duration-300 transform hover:-translate-x-2 hover:scale-105 card-3d border border-text-main/10">
                            <div class="flex-shrink-0 w-12 h-12 bg-accent/10 backdrop-blur-sm rounded-lg flex items-center justify-center icon-float" style="animation-delay: 0.1s;">
                                <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-text-main mb-1">Mobile Development</h4>
                                <p class="text-sm text-text-main/70">Native and cross-platform mobile applications</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4 p-4 bg-primary-bg/50 backdrop-blur-sm rounded-lg hover:bg-secondary-bg transition-all duration-300 transform hover:-translate-x-2 hover:scale-105 card-3d border border-text-main/10">
                            <div class="flex-shrink-0 w-12 h-12 bg-accent/10 backdrop-blur-sm rounded-lg flex items-center justify-center icon-float" style="animation-delay: 0.2s;">
                                <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-text-main mb-1">E-commerce Solutions</h4>
                                <p class="text-sm text-text-main/70">Scalable online stores with seamless user experience</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4 p-4 bg-primary-bg/50 backdrop-blur-sm rounded-lg hover:bg-secondary-bg transition-all duration-300 transform hover:-translate-x-2 hover:scale-105 card-3d border border-text-main/10">
                            <div class="flex-shrink-0 w-12 h-12 bg-accent/10 backdrop-blur-sm rounded-lg flex items-center justify-center icon-float" style="animation-delay: 0.3s;">
                                <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-text-main mb-1">CMS Development</h4>
                                <p class="text-sm text-text-main/70">Powerful content management systems</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partner Showcase Section -->
    <section class="py-20 lg:py-32">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-text-main mb-4">
                    Trusted By <span class="text-accent">Industry Leaders</span>
                </h2>
                <p class="text-xl text-text-main/70">
                    We're proud to partner with amazing companies
                </p>
            </div>

            <!-- Livewire Component -->
            <livewire:public.partner-logos />
        </div>
    </section>

    <!-- Final CTA Section -->
    <section class="py-20 lg:py-32 bg-gradient-to-r from-accent/10 to-highlight/10 border-y border-accent/20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-text-main mb-6">
                Ready to Transform Your Business?
            </h2>
            <p class="text-xl text-text-main/80 mb-10 max-w-2xl mx-auto">
                Let's discuss how we can help you achieve your digital transformation goals
            </p>
            <a href="{{ route('quotation.create') }}" class="inline-block bg-accent text-primary-bg px-10 py-4 rounded-lg font-semibold text-lg hover:shadow-lg hover:shadow-accent/50 transition-all duration-300 hover:-translate-y-1">
                Get Started Today
            </a>
        </div>
    </section>

    <!-- 3D Animation Styles -->
    <style>
        /* 3D Cube Animation */
        .shape-3d {
            width: 100%;
            height: 100%;
            position: relative;
            transform-style: preserve-3d;
            animation: rotate3d 20s infinite linear;
        }

        .cube {
            width: 100%;
            height: 100%;
            position: relative;
            transform-style: preserve-3d;
        }

        .cube-face {
            position: absolute;
            width: 100%;
            height: 100%;
            border: 1px solid rgba(0, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }

        .cube-front  { transform: translateZ(64px); }
        .cube-back   { transform: rotateY(180deg) translateZ(64px); }
        .cube-right  { transform: rotateY(90deg) translateZ(64px); }
        .cube-left   { transform: rotateY(-90deg) translateZ(64px); }
        .cube-top    { transform: rotateX(90deg) translateZ(64px); }
        .cube-bottom { transform: rotateX(-90deg) translateZ(64px); }

        /* Sphere */
        .sphere {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            box-shadow:
                inset 0 0 50px rgba(0, 255, 255, 0.3),
                0 0 50px rgba(0, 255, 255, 0.2);
        }

        /* Floating Animation */
        .floating-shape {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) translateX(0) rotate(0deg);
            }
            25% {
                transform: translateY(-20px) translateX(10px) rotate(5deg);
            }
            50% {
                transform: translateY(-40px) translateX(-10px) rotate(-5deg);
            }
            75% {
                transform: translateY(-20px) translateX(10px) rotate(3deg);
            }
        }

        /* 3D Rotation */
        @keyframes rotate3d {
            0% {
                transform: rotateX(0deg) rotateY(0deg) rotateZ(0deg);
            }
            100% {
                transform: rotateX(360deg) rotateY(360deg) rotateZ(360deg);
            }
        }

        /* Hero Text 3D Effect */
        .hero-text-3d {
            text-shadow:
                0 1px 0 rgba(0, 255, 255, 0.3),
                0 2px 0 rgba(0, 255, 255, 0.2),
                0 3px 0 rgba(0, 255, 255, 0.1),
                0 4px 0 rgba(0, 255, 255, 0.05),
                0 5px 5px rgba(0, 0, 0, 0.3),
                0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* Hover Lift Effect */
        .hover-lift {
            display: inline-block;
            transition: transform 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-5px) scale(1.02);
        }

        /* 3D Card Effect */
        .card-3d {
            transform-style: preserve-3d;
            transition: all 0.5s ease;
            position: relative;
        }

        .card-3d::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(0, 255, 255, 0.1) 0%, transparent 50%);
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 0.5rem;
        }

        .card-3d:hover::before {
            opacity: 1;
        }

        .card-3d:hover {
            transform: translateX(-8px) translateZ(20px) rotateY(-5deg);
            box-shadow:
                0 25px 50px -12px rgba(0, 255, 255, 0.25),
                0 0 0 1px rgba(0, 255, 255, 0.1);
        }

        /* Icon Float Animation */
        .icon-float {
            animation: iconFloat 3s ease-in-out infinite;
        }

        @keyframes iconFloat {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-10px) rotate(5deg);
            }
        }

        /* Gradient Radial */
        .bg-gradient-radial {
            background: radial-gradient(circle at 30% 30%, var(--tw-gradient-stops));
        }

        /* Orbit Rings */
        .orbit-ring {
            transform-style: preserve-3d;
        }

        /* Parallax on Scroll */
        @media (prefers-reduced-motion: no-preference) {
            .floating-shape {
                will-change: transform;
            }
        }

        /* Additional 3D perspective for sections */
        section {
            perspective: 1000px;
        }

        /* Pulse glow effect */
        @keyframes pulseGlow {
            0%, 100% {
                box-shadow: 0 0 20px rgba(0, 255, 255, 0.3);
            }
            50% {
                box-shadow: 0 0 40px rgba(0, 255, 255, 0.6), 0 0 60px rgba(0, 255, 255, 0.3);
            }
        }

        /* Apply pulse to spheres */
        .sphere {
            animation: pulseGlow 4s ease-in-out infinite;
        }
    </style>

    <!-- 3D Parallax Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Parallax effect for floating shapes
            const shapes = document.querySelectorAll('.floating-shape');

            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;

                shapes.forEach((shape, index) => {
                    const speed = 0.5 + (index * 0.1);
                    const yPos = -(scrolled * speed);
                    shape.style.transform = `translateY(${yPos}px)`;
                });
            });

            // Mouse parallax effect in hero
            const hero = document.querySelector('section');
            const floatingShapes = document.querySelectorAll('.floating-shape');

            hero.addEventListener('mousemove', (e) => {
                const mouseX = e.clientX / window.innerWidth;
                const mouseY = e.clientY / window.innerHeight;

                floatingShapes.forEach((shape, index) => {
                    const speed = 20 + (index * 10);
                    const x = (mouseX - 0.5) * speed;
                    const y = (mouseY - 0.5) * speed;

                    shape.style.transform = `translate(${x}px, ${y}px)`;
                });
            });

            // 3D tilt effect on cards
            const cards = document.querySelectorAll('.card-3d');

            cards.forEach(card => {
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;

                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;

                    const rotateX = (y - centerY) / 10;
                    const rotateY = (centerX - x) / 10;

                    card.style.transform = `translateX(-8px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(20px)`;
                });

                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'translateX(0) rotateX(0) rotateY(0) translateZ(0)';
                });
            });
        });
    </script>

</x-app-layout>
