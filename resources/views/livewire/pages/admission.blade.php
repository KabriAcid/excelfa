<div class="min-h-screen pt-20">
    <!-- Hero -->
    <section class="py-20 gradient-hero text-primary-foreground">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-6 animate-fade-in">Admission Requirements</h1>
            <p class="text-xl max-w-3xl mx-auto opacity-90 animate-slide-up">
                Everything you need to know to join Excel Football Academy
            </p>
        </div>
    </section>

    <!-- Requirements Grid -->
    <section class="bg-muted py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                $requirements = [
                [
                'icon' => '📅',
                'title' => 'Age Requirements',
                'items' => [
                'Category A: 13-15 years',
                'Category B: 15-18 years',
                'Category C: Up to 20 years',
                'Must provide valid birth certificate',
                ]
                ],
                [
                'icon' => '💰',
                'title' => 'Financial Investment',
                'items' => [
                'Annual fee: ₦500,000',
                'Covers training, accommodation, and meals',
                'Payment plans available',
                'One-time registration fee applies',
                ]
                ],
                [
                'icon' => '🕐',
                'title' => 'Training Schedule',
                'items' => [
                'Morning training: 6:00 AM - 8:00 AM',
                'Academic classes: 9:00 AM - 2:00 PM',
                'Afternoon training: 3:00 PM - 5:00 PM',
                '6 days per week commitment',
                ]
                ],
                [
                'icon' => '📚',
                'title' => 'Academic Requirements',
                'items' => [
                'Basic literacy in English or Hausa',
                'Willingness to learn and improve',
                'Regular attendance in classes',
                'Complete homework and assignments',
                ]
                ],
                [
                'icon' => '🛡️',
                'title' => 'Discipline & Conduct',
                'items' => [
                'No fighting or bullying tolerated',
                'Respect for coaches and staff',
                'Adherence to academy rules',
                'Positive attitude and teamwork',
                ]
                ],
                [
                'icon' => '🏠',
                'title' => 'Accommodation',
                'items' => [
                'On-campus hostel facilities',
                'Shared dormitory rooms',
                'Supervised 24/7 by staff',
                'Weekend family visits allowed',
                ]
                ],
                [
                'icon' => '🍽️',
                'title' => 'Meals & Nutrition',
                'items' => [
                'Three balanced meals daily',
                'Breakfast, lunch, and dinner',
                'Accommodates dietary preferences',
                'Focus on athletic nutrition',
                ]
                ],
                [
                'icon' => '🗣️',
                'title' => 'Language',
                'items' => [
                'English or Hausa proficiency',
                'Language support available',
                'Communication skills training',
                'Multilingual environment',
                ]
                ],
                [
                'icon' => '👕',
                'title' => 'Kit & Equipment',
                'items' => [
                'Two training jerseys provided',
                'Choice of short or long sleeve',
                'Additional gear available for purchase',
                'Academy colors: Blue and Orange',
                ]
                ],
                ];
                @endphp

                @foreach ($requirements as $requirement)
                <div class="bg-white transition-all rounded-lg border-0 p-6">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-700 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white text-xl">{{ $requirement['icon'] }}</span>
                        </div>
                        <h3 class="text-lg font-bold">{{ $requirement['title'] }}</h3>
                    </div>
                    <ul class="space-y-2">
                        @foreach ($requirement['items'] as $item)
                        <li class="flex items-start space-x-2 text-muted-foreground">
                            <span class="text-blue-600 mt-1">•</span>
                            <span>{{ $item }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Important Notes -->
    <section class="py-16 bg-muted">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold mb-8 text-center">Important Information</h2>
                <div class="bg-white rounded-lg border-0 p-8 space-y-6">
                    @php
                    $importantInfo = [
                    [
                    'title' => 'Enrollment Process',
                    'items' => [
                    'Complete the online registration form',
                    'Submit required documents (birth certificate, passport photo)',
                    'Attend tryout session (scheduled after registration)',
                    'Receive acceptance notification',
                    'Complete payment and finalize enrollment',
                    ],
                    'type' => 'ordered'
                    ],
                    [
                    'title' => 'What to Bring',
                    'items' => [
                    'Personal toiletries and hygiene items',
                    'Comfortable training clothes (provided jerseys will be given)',
                    'Football boots (if you have them)',
                    'School supplies for academic classes',
                    'Any necessary medications (with prescription)',
                    ],
                    'type' => 'unordered'
                    ],
                    [
                    'title' => 'Parents & Guardians',
                    'content' => 'We encourage regular communication between the academy and families. Parent-teacher meetings are held quarterly, and we maintain an open-door policy for concerns and questions. Weekend visits are permitted with prior arrangement.',
                    'type' => 'paragraph'
                    ],
                    ];
                    @endphp

                    @foreach ($importantInfo as $info)
                    <div>
                        <h3 class="font-bold text-xl mb-3 text-blue-600">{{ $info['title'] }}</h3>
                        @if ($info['type'] === 'ordered')
                        <ol class="space-y-2 text-muted-foreground list-decimal list-inside">
                            @foreach ($info['items'] as $item)
                            <li>{{ $item }}</li>
                            @endforeach
                        </ol>
                        @elseif ($info['type'] === 'unordered')
                        <ul class="space-y-2 text-muted-foreground">
                            @foreach ($info['items'] as $item)
                            <li>• {{ $item }}</li>
                            @endforeach
                        </ul>
                        @else
                        <p class="text-muted-foreground">{{ $info['content'] }}</p>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-6">Ready to Apply?</h2>
            <p class="text-xl text-muted-foreground mb-8 max-w-2xl mx-auto">
                Take the first step towards excellence. Complete your enrollment today.
            </p>
            <a href="/enrol" wire:navigate class="inline-block bg-gradient-to-r from-blue-600 to-blue-700 text-white font-bold py-3 px-8 rounded-lg hover:shadow-lg transition">
                Start Your Enrollment
            </a>
        </div>
    </section>
</div>