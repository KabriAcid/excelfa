<div class="min-h-screen pt-20">
    <!-- Hero -->
    <section class="py-20 gradient-hero text-primary-foreground">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-6 animate-fade-in">Gallery</h1>
            <p class="text-xl max-w-3xl mx-auto opacity-90 animate-slide-up">
                Capturing moments of excellence, dedication, and team spirit at Excel Football Academy
            </p>
        </div>
    </section>

    <!-- Gallery Grid -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Sample Gallery Items -->
                @php
                $galleryItems = [
                ['id' => 1, 'title' => 'Training Session', 'category' => 'Training'],
                ['id' => 2, 'title' => 'Team Photo', 'category' => 'Team'],
                ['id' => 3, 'title' => 'Match Day', 'category' => 'Matches'],
                ['id' => 4, 'title' => 'Academy Facilities', 'category' => 'Facilities'],
                ['id' => 5, 'title' => 'Skills Training', 'category' => 'Training'],
                ['id' => 6, 'title' => 'Team Celebration', 'category' => 'Team'],
                ];
                @endphp

                @foreach ($galleryItems as $index => $item)
                <div class="overflow-hidden group cursor-pointer shadow-premium hover:shadow-premium-hover transition-all animate-scale-in border-0 rounded-lg bg-background">
                    <div class="relative aspect-video overflow-hidden bg-muted">
                        <!-- Placeholder for image -->
                        <div class="w-full h-full bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center">
                            <svg class="h-12 w-12 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>

                        <div class="absolute inset-0 bg-gradient-to-t from-foreground/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4 text-background">
                                <div class="text-xs font-semibold text-secondary mb-1">{{ $item['category'] }}</div>
                                <div class="font-bold text-lg">{{ $item['title'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-16 bg-muted">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4">Our Champions</h2>
                <p class="text-xl text-muted-foreground max-w-3xl mx-auto">
                    Meet the dedicated players and coaching staff of Excel Football Academy
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div class="overflow-hidden shadow-premium-lg border-0 rounded-lg bg-background">
                    <div class="w-full aspect-video bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center">
                        <img src="{{ asset('images/team-photo.jpg') }}">
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <h3 class="text-2xl font-bold mb-3">Team Spirit</h3>
                        <p class="text-muted-foreground">
                            Our players come from diverse backgrounds across Nigeria, united by their passion for football
                            and the quest to conquer. Together, they train, learn, and grow into champions.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold mb-3">Excellence in Action</h3>
                        <p class="text-muted-foreground">
                            From rigorous training sessions to competitive matches, every moment shapes our athletes into
                            world-class performers ready to compete at the highest levels.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>