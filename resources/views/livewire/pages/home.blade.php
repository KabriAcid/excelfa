<div class="min-h-screen">
    @php
    $heroImage = asset('images/hero-training.jpg');
    @endphp
    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        <div
            class="absolute inset-0 bg-cover bg-center"
            style="background-image: url('{{ $heroImage }}'); background-attachment: fixed;">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-foreground/90 via-foreground/70 to-transparent"></div>

        <div class="relative z-10 container mx-auto px-4 text-center md:text-left">
            <div class="max-w-3xl animate-fade-in">
                <h1 class="text-5xl md:text-7xl font-bold text-background mb-6">
                    Excel Football Academy
                </h1>
                <p class="text-2xl md:text-3xl text-secondary font-bold mb-4">
                    The Quest to Conquer
                </p>
                <p class="text-xl text-background/90 mb-8 max-w-2xl">
                    Empowering young Nigerian footballers with world-class training, academic excellence, and the values to become champions on and off the field.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="/register" class="inline-block px-8 py-3 rounded font-semibold text-lg gradient-accent text-primary-foreground hover:opacity-90 transition-opacity text-center">
                        Enroll Now
                    </a>
                    <a href="/about" class="inline-block px-8 py-3 rounded font-semibold text-lg border-2 border-background text-background hover:bg-background hover:text-foreground transition-colors text-center">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Overview Section -->
    <section class="py-20 bg-muted">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 animate-fade-in">
                <h2 class="text-4xl font-bold mb-4">Why Choose EFA?</h2>
                <p class="text-xl text-muted-foreground max-w-3xl mx-auto">
                    We combine professional football training with quality education, creating well-rounded athletes ready to compete at the highest levels.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                $achievements = [
                ['title' => 'Champions', 'value' => '15+', 'description' => 'Tournament Wins'],
                ['title' => 'Players', 'value' => '200+', 'description' => 'Trained Athletes'],
                ['title' => 'Success Rate', 'value' => '95%', 'description' => 'Player Development'],
                ['title' => 'Experience', 'value' => '10+', 'description' => 'Years of Excellence'],
                ];
                @endphp

                @foreach ($achievements as $index => $item)
                <div
                    class="shadow-premium hover:shadow-premium-hover transition-all duration-300 animate-scale-in border-0 rounded-lg bg-background p-8 text-center"
                    @style("animation-delay: {{ $index * 0.1 }}s")>
                    <div class="w-16 h-16 gradient-hero rounded-full flex items-center justify-center mx-auto mb-4">
                        @if ($index === 0)
                        <!-- Trophy Icon -->
                        <svg class="h-8 w-8 text-primary-foreground" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                            <path d="M12 6c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6zm0 10c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z" />
                        </svg>
                        @elseif ($index === 1)
                        <!-- Users Icon -->
                        <svg class="h-8 w-8 text-primary-foreground" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg>
                        @elseif ($index === 2)
                        <!-- Target Icon -->
                        <svg class="h-8 w-8 text-primary-foreground" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm0-13c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5z" />
                        </svg>
                        @else
                        <!-- Star Icon -->
                        <svg class="h-8 w-8 text-primary-foreground" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21 12 17.27z" />
                        </svg>
                        @endif
                    </div>
                    <div class="text-4xl font-bold text-primary mb-2">{{ $item['value'] }}</div>
                    <div class="font-semibold text-lg mb-1">{{ $item['title'] }}</div>
                    <div class="text-sm text-muted-foreground">{{ $item['description'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- What We Offer -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="animate-fade-in">
                    <h2 class="text-4xl font-bold mb-6">Excellence in Training & Education</h2>
                    <p class="text-lg text-muted-foreground mb-6">
                        At Excel Football Academy, we believe in developing complete athletes. Our comprehensive program includes:
                    </p>
                    <ul class="space-y-4">
                        @foreach([
                        'Professional football training by certified coaches',
                        'Academic education to ensure balanced development',
                        'Character building and discipline',
                        'Modern facilities and equipment',
                        'Daily nutritious meals',
                        'Competitive match exposure',
                        ] as $item)
                        <li class="flex items-start space-x-3">
                            <div class="w-6 h-6 rounded-full bg-primary flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="h-4 w-4 text-primary-foreground" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                            </div>
                            <span class="text-lg">{{ $item }}</span>
                        </li>
                        @endforeach
                    </ul>
                    <a href="/admission" class="inline-block mt-8 px-8 py-3 rounded-md font-semibold text-lg gradient-hero text-primary-foreground hover:opacity-90 transition-opacity">
                        View Admission Requirements
                    </a>
                </div>
                <div class="animate-slide-up">
                    <div class="shadow-premium-lg overflow-hidden border-0 rounded-lg bg-background">
                        <img src="{{ asset('images/team-photo.jpg') }}" alt="Football Training" class="w-full aspect-square object-cover" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 gradient-hero text-primary-foreground">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-6">Ready to Begin Your Journey?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto opacity-90">
                Join Excel Football Academy today and take the first step towards becoming a football champion.
            </p>
            <a href="/register" class="inline-block px-8 py-3 rounded-md font-semibold text-lg bg-background text-foreground hover:opacity-90 transition-opacity">
                Start Your Application
            </a>
        </div>
    </section>
</div>