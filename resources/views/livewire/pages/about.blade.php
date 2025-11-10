<div class="min-h-screen pt-20">
    <!-- Hero Section -->
    <section class="py-20 gradient-hero text-primary-foreground">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-6 animate-fade-in">About Excel Football Academy</h1>
            <p class="text-xl max-w-3xl mx-auto opacity-90 animate-slide-up">
                Shaping Nigeria's future football stars through dedication, discipline, and excellence.
            </p>
        </div>
    </section>

    <!-- Mission & History -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="animate-fade-in">
                    <img
                        src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=600&h=400&fit=crop"
                        alt="EFA Team"
                        class="rounded-lg shadow-lg w-full" />
                </div>
                <div class="animate-slide-up">
                    <h2 class="text-4xl font-bold mb-6">Our Mission</h2>
                    <p class="text-lg text-muted-foreground mb-6">
                        Excel Football Academy (EFA) was established in Jalingo, Taraba State, with a singular vision: to discover, nurture, and develop young Nigerian football talent. We believe every child with passion and dedication deserves the opportunity to excel.
                    </p>
                    <p class="text-lg text-muted-foreground mb-6">
                        Our academy combines professional football training with quality academic education, ensuring our players grow into well-rounded individuals ready to face challenges both on and off the pitch.
                    </p>
                    <div class="bg-secondary/10 border-l-4 border-secondary p-4 rounded">
                        <p class="font-semibold text-lg">"The Quest to Conquer"</p>
                        <p class="text-muted-foreground">Our motto reflects our commitment to excellence and the warrior spirit we instill in every player.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="py-16 bg-muted">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12">What We Offer</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @php
                $services = [
                [
                'icon' => '🏆',
                'title' => 'Professional Football Training',
                'items' => [
                'Daily intensive training sessions',
                'Tactical and technical skill development',
                'Physical conditioning and fitness',
                'Match experience and tournaments',
                'Video analysis and performance tracking',
                ]
                ],
                [
                'icon' => '📚',
                'title' => 'Academic Education',
                'items' => [
                'Structured academic curriculum',
                'English and Mathematics focus',
                'Computer literacy training',
                'Tutoring and homework support',
                'Career guidance and counseling',
                ]
                ],
                [
                'icon' => '🛡️',
                'title' => 'Character Development',
                'items' => [
                'Discipline and time management',
                'Leadership skills training',
                'Teamwork and communication',
                'Respect and sportsmanship',
                'Life skills workshops',
                ]
                ],
                [
                'icon' => '👥',
                'title' => 'Full Support Services',
                'items' => [
                'On-campus accommodation',
                'Three nutritious meals daily',
                'Medical care and first aid',
                'Sports psychology support',
                'Family communication channels',
                ]
                ],
                ];
                @endphp

                @foreach ($services as $service)
                <div class="bg-white transition-all rounded-lg border-0 p-6">
                    <h3 class="text-xl font-bold flex items-center space-x-3 mb-4">
                        <span class="text-3xl">{{ $service['icon'] }}</span>
                        <span>{{ $service['title'] }}</span>
                    </h3>
                    <ul class="space-y-2 text-muted-foreground">
                        @foreach ($service['items'] as $item)
                        <li>• {{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Jersey Colors -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12">Our Team Colors</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                @php
                $colors = [
                [
                'name' => 'Blue',
                'bgClass' => 'bg-blue-600',
                'description' => 'Represents trust, loyalty, and the vast sky of possibilities',
                ],
                [
                'name' => 'Orange',
                'bgClass' => 'bg-orange-500',
                'description' => 'Symbolizes energy, enthusiasm, and the burning passion to succeed',
                ],
                [
                'name' => 'White',
                'bgClass' => 'bg-white border-4 border-gray-800',
                'description' => 'Embodies purity, excellence, and the pursuit of perfection',
                ],
                ];
                @endphp

                @foreach ($colors as $color)
                <div class="bg-white shadow-lg rounded-lg border-0 p-6 text-center">
                    <div class="w-20 h-20 {{ $color['bgClass'] }} rounded-full mx-auto mb-4"></div>
                    <h3 class="font-bold text-xl mb-2">{{ $color['name'] }}</h3>
                    <p class="text-muted-foreground">{{ $color['description'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Code of Conduct -->
    <section class="py-16 bg-muted">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-4xl font-bold text-center mb-8">Our Code of Conduct</h2>
                <div class="bg-white shadow-lg rounded-lg border-0 p-8">
                    <div class="space-y-4 text-lg">
                        @php
                        $codOfConduct = [
                        [
                        'title' => 'Discipline',
                        'description' => 'Punctuality, respect for coaches and teammates, and adherence to training schedules',
                        ],
                        [
                        'title' => 'Respect',
                        'description' => 'Treat everyone with dignity regardless of background, skill level, or position',
                        ],
                        [
                        'title' => 'Excellence',
                        'description' => 'Give your best effort in every training session, match, and classroom',
                        ],
                        [
                        'title' => 'Teamwork',
                        'description' => 'Support your teammates, celebrate together, and grow as one unit',
                        ],
                        [
                        'title' => 'Integrity',
                        'description' => 'Play fair, be honest, and maintain the highest standards of sportsmanship',
                        ],
                        ];
                        @endphp

                        @foreach ($codOfConduct as $conduct)
                        <p class="flex items-start space-x-3">
                            <span class="text-blue-600 font-bold">•</span>
                            <span><strong>{{ $conduct['title'] }}:</strong> {{ $conduct['description'] }}</span>
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>