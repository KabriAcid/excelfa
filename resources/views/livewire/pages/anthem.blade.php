<div class="min-h-screen pt-20">
    <!-- Hero -->
    <section class="py-20 gradient-hero text-primary-foreground">
        <div class="container mx-auto px-4 text-center">
            <div class="w-20 h-20 bg-primary-foreground/20 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="h-10 w-10 text-primary-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                </svg>
            </div>
            <h1 class="text-5xl font-bold mb-6 animate-fade-in">EFA Anthem</h1>
            <p class="text-2xl font-bold opacity-90 animate-slide-up">The Quest to Conquer</p>
        </div>
    </section>

    <!-- Anthem Lyrics -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto shadow-premium-lg border-0 rounded-lg bg-background overflow-hidden">
                <div class="p-12">
                    <div class="space-y-4 text-center">
                        @php
                        $anthemLines = [
                        "In the fields where dreams take flight,",
                        "We stand united, strong and bright,",
                        "With hearts of gold and spirits high,",
                        "Excel Football, we reach the sky.",
                        "",
                        "Blue and orange, our colors shine,",
                        "A brotherhood that's truly divine,",
                        "Through sweat and tears, we find our way,",
                        "Champions born, we seize the day.",
                        "",
                        "The Quest to Conquer, we proclaim,",
                        "With every pass and every game,",
                        "From Jalingo's soil to the world stage,",
                        "We write our story, page by page.",
                        "",
                        "In discipline and dedication true,",
                        "Excellence is all we pursue,",
                        "Together we rise, together we stand,",
                        "Excel Football Academy, the pride of our land!"
                        ];
                        @endphp

                        @foreach ($anthemLines as $index => $line)
                        <p
                            class="animate-fade-in {{ $line === '' ? 'h-6' : '' }} {{ $index % 2 === 0 ? 'text-foreground font-semibold text-xl' : 'text-muted-foreground text-xl' }}"
                            @style("animation-delay: {{ number_format($index * 0.2, 1) }}s")>
                            {{ $line }}
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="text-center mt-12 space-y-4">
                <h3 class="text-2xl font-bold">Join Our Quest</h3>
                <p class="text-muted-foreground max-w-2xl mx-auto">
                    The Excel Football Academy anthem represents our commitment to excellence, unity, and the continuous pursuit of greatness.
                    Every word embodies the spirit of our athletes and the mission of our academy.
                </p>
                <a href="/register" class="inline-block mt-6 px-8 py-3 bg-primary text-primary-foreground rounded-md font-semibold hover:opacity-90 transition-opacity">
                    Join Us Today
                </a>
            </div>
        </div>
    </section>
</div>