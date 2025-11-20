<div class="min-h-screen pt-20 pb-16 bg-muted">
    <div class="container mt-8 mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-12 animate-fade-in">
            <h1 class="text-4xl font-bold mb-4">Online Registration</h1>
            <p class="text-xl text-muted-foreground">Complete your enrollment in {{ $this->totalSteps }} easy steps</p>
        </div>

        <!-- Progress Bar -->
        <div class="max-w-4xl mx-auto mb-12">
            <div class="flex items-center justify-between mb-4">
                @for ($s = 1; $s <= 4; $s++)
                    <div class="flex items-center flex-1">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold transition-colors {{ $s <= $this->step ? 'bg-primary text-primary-foreground' : 'bg-muted-foreground/20 text-muted-foreground' }}">
                        {{ $s }}
                    </div>
                    @if ($s < 4)
                        <div class="flex-1 h-1 mx-2 transition-colors {{ $s < $this->step ? 'bg-primary' : 'bg-muted-foreground/20' }}">
            </div>
            @endif
        </div>
        @endfor
    </div>
    <div class="flex justify-between text-sm text-muted-foreground">
        <span>Personal Info</span>
        <span>Location</span>
        <span>Background</span>
        <span>Preferences</span>
    </div>
</div>

<!-- Form -->
<form wire:submit="submitApplication">
    <div class="max-w-4xl mx-auto shadow-premium-lg animate-scale-in border-0 bg-background rounded-lg">
        <!-- Card Header -->
        <div class="border-b border-border px-8 py-6">
            <h2 class="text-2xl font-bold">
                @if ($this->step === 1)
                Personal Information
                @elseif ($this->step === 2)
                Location & Origin
                @elseif ($this->step === 3)
                Background & Culture
                @else
                Preferences & Declaration
                @endif
            </h2>
        </div>

        <!-- Card Content -->
        <div class="px-8 py-6 space-y-6">
            <!-- Step 1: Personal Info -->
            @if ($this->step === 1)
            <div class="space-y-6">
                <!-- Names Row -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="flex items-center space-x-2 mb-2 font-medium text-sm">
                            <svg class="h-4 w-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span>First Name <span class="text-red-500">*</span></span>
                        </label>
                        <input type="text" wire:model="firstName" placeholder="Enter first name" class="w-full px-4 py-2 border border-border rounded-md focus:outline-none focus:ring-1 focus:ring-primary" />
                        @error('firstName') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block mb-2 font-medium text-sm">Middle Name</label>
                        <input type="text" wire:model="middleName" placeholder="Enter middle name" class="w-full px-4 py-2 border border-border rounded-md focus:outline-none focus:ring-1 focus:ring-primary" />
                    </div>
                    <div>
                        <label class="block mb-2 font-medium text-sm">Surname <span class="text-red-500">*</span></label>
                        <input type="text" wire:model="surname" placeholder="Enter surname" class="w-full px-4 py-2 border border-border rounded-md focus:outline-none focus:ring-1 focus:ring-primary" />
                        @error('surname') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Nickname & Age -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 font-medium text-sm">Nickname</label>
                        <input type="text" wire:model="nickname" placeholder="Enter nickname (optional)" class="w-full px-4 py-2 border border-border rounded-md focus:outline-none focus:ring-1 focus:ring-primary" />
                    </div>
                    <div>
                        <label class="flex items-center space-x-2 mb-2 font-medium text-sm">
                            <svg class="h-4 w-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>Age (13-20) <span class="text-red-500">*</span></span>
                        </label>
                        <input type="number" wire:model="age" min="13" max="20" placeholder="Enter age" class="w-full px-4 py-2 border border-border rounded-md focus:outline-none focus:ring-1 focus:ring-primary" />
                        @error('age') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Date of Birth -->
                <div>
                    <label class="block mb-3 font-semibold text-sm">Date of Birth <span class="text-red-500">*</span></label>
                    <div class="grid grid-cols-3 gap-4">
                        <input type="number" wire:model="dobDay" placeholder="Day" min="1" max="31" class="w-full px-4 py-2 border border-border rounded-md focus:outline-none focus:ring-1 focus:ring-primary" />
                        <input type="number" wire:model="dobMonth" placeholder="Month" min="1" max="12" class="w-full px-4 py-2 border border-border rounded-md focus:outline-none focus:ring-1 focus:ring-primary" />
                        <input type="number" wire:model="dobYear" placeholder="Year" class="w-full px-4 py-2 border border-border rounded-md focus:outline-none focus:ring-1 focus:ring-primary" />
                    </div>
                    @error('dobDay') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Height, Weight, Complexion -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="flex items-center space-x-2 mb-2 font-medium text-sm">
                            <svg class="h-4 w-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <span>Height (cm) <span class="text-red-500">*</span></span>
                        </label>
                        <input type="number" id="height" wire:model="height" placeholder="e.g., 165" class="w-full px-4 py-2 border border-border rounded-md focus:outline-none focus:ring-1 focus:ring-primary" />
                        @error('height') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="flex items-center space-x-2 mb-2 font-medium text-sm">
                            <svg class="h-4 w-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            <span>Weight (kg) <span class="text-red-500">*</span></span>
                        </label>
                        <input type="number" wire:model="weight" placeholder="e.g., 55" class="w-full px-4 py-2 border border-border rounded-md focus:outline-none focus:ring-1 focus:ring-primary" />
                        @error('weight') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block mb-2 font-medium text-sm">Complexion</label>
                        <input type="text" wire:model="complexion" placeholder="e.g., Fair, Dark" class="w-full px-4 py-2 border border-border rounded-md focus:outline-none focus:ring-1 focus:ring-primary" />
                    </div>
                </div>
            </div>
            @endif

            <!-- Step 2: Location -->
            @if ($this->step === 2)
            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="flex items-center space-x-2 mb-2 font-medium text-sm">
                            <svg class="h-4 w-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            <span>Local Government Area <span class="text-red-500">*</span></span>
                        </label>
                        <input type="text" wire:model="lga" placeholder="Enter LGA" class="w-full px-4 py-2 border border-border rounded-md focus:outline-none focus:ring-1 focus:ring-primary" />
                        @error('lga') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block mb-2 font-medium text-sm">State of Origin <span class="text-red-500">*</span></label>
                        <input type="text" wire:model="stateOfOrigin" placeholder="Enter state" class="w-full px-4 py-2 border border-border rounded-md focus:outline-none focus:ring-1 focus:ring-primary" />
                        @error('stateOfOrigin') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="flex items-center space-x-2 mb-2 font-medium text-sm">
                            <svg class="h-4 w-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20H7m6-4h.01" />
                            </svg>
                            <span>Country <span class="text-red-500">*</span></span>
                        </label>
                        <input type="text" wire:model="country" placeholder="e.g., Nigeria" class="w-full px-4 py-2 border border-border rounded-md focus:outline-none focus:ring-1 focus:ring-primary" />
                        @error('country') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block mb-2 font-medium text-sm">Region/State</label>
                        <input type="text" wire:model="region" placeholder="Enter region (optional)" class="w-full px-4 py-2 border border-border rounded-md focus:outline-none focus:ring-1 focus:ring-primary" />
                    </div>
                </div>
            </div>
            @endif

            <!-- Step 3: Background -->
            @if ($this->step === 3)
            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="flex items-center space-x-2 mb-2 font-medium text-sm">
                            <svg class="h-4 w-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5.582a1 1 0 00-.898.6l-3.476 6.234m7.956-6.834l-.036.036m0 0a1 1 0 00-1.414-1.414" />
                            </svg>
                            <span>Religion <span class="text-red-500">*</span></span>
                        </label>
                        <select wire:model="religion" class="w-full px-4 py-2 border border-border rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                            <option value="">Select religion</option>
                            <option value="islam">Islam</option>
                            <option value="christian">Christian</option>
                            <option value="traditionalist">Traditionalist</option>
                            <option value="freethinker">Free Thinker</option>
                        </select>
                        @error('religion') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block mb-2 font-medium text-sm">Tribe <span class="text-red-500">*</span></label>
                        <input type="text" wire:model="tribe" placeholder="Enter tribe" class="w-full px-4 py-2 border border-border rounded-md focus:outline-none focus:ring-1 focus:ring-primary" />
                        @error('tribe') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            @endif

            <!-- Step 4: Preferences -->
            @if ($this->step === 4)
            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="flex items-center space-x-2 mb-2 font-medium text-sm">
                            <svg class="h-4 w-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            <span>Jersey Preference <span class="text-red-500">*</span></span>
                        </label>
                        <select wire:model="jerseyPreference" class="w-full px-4 py-2 border border-border rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                            <option value="">Select sleeve type</option>
                            <option value="short">Short Sleeve</option>
                            <option value="long">Long Sleeve</option>
                        </select>
                        @error('jerseyPreference') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="flex items-center space-x-2 mb-2 font-medium text-sm">
                            <svg class="h-4 w-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            <span>Role Model</span>
                        </label>
                        <input type="text" wire:model="roleModel" placeholder="e.g., Cristiano Ronaldo" class="w-full px-4 py-2 border border-border rounded-md focus:outline-none focus:ring-1 focus:ring-primary" />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="flex items-center space-x-2 mb-2 font-medium text-sm">
                            <svg class="h-4 w-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5.657 5.657l-.707.707M9 9h.01M9 15h.01M15 9h.01M15 15h.01" />
                            </svg>
                            <span>Favourite League</span>
                        </label>
                        <select wire:model="favouriteLeague" class="w-full px-4 py-2 border border-border rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                            <option value="">Select league</option>
                            <option value="epl">English Premier League</option>
                            <option value="laliga">La Liga</option>
                            <option value="seriea">Serie A</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label class="block mb-2 font-medium text-sm">Favourite Team</label>
                        <input type="text" wire:model="favouriteTeam" placeholder="e.g., Manchester United" class="w-full px-4 py-2 border border-border rounded-md focus:outline-none focus:ring-1 focus:ring-primary" />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 font-medium text-sm">Favourite Food</label>
                        <input type="text" wire:model="favouriteFood" placeholder="e.g., Jollof Rice" class="w-full px-4 py-2 border border-border rounded-md focus:outline-none focus:ring-1 focus:ring-primary" />
                    </div>
                    <div>
                        <label class="block mb-2 font-medium text-sm">Hobby</label>
                        <input type="text" wire:model="hobby" placeholder="e.g., Reading, Music" class="w-full px-4 py-2 border border-border rounded-md focus:outline-none focus:ring-1 focus:ring-primary" />
                    </div>
                </div>

                <!-- Terms and Conditions -->
                <div class="pt-6 border-t border-border">
                    <div class="flex items-start space-x-3">
                        <input type="checkbox" id="terms" wire:model="agreedToTerms" class="w-5 h-5 border-border rounded focus:ring-primary cursor-pointer mt-1" />
                        <label for="terms" class="text-sm leading-relaxed cursor-pointer">
                            I hereby declare that all information provided is accurate and true. I agree to abide by the
                            Excel Football Academy's code of conduct, training schedules, and rules. I understand that
                            the annual fee is ₦500,000 and that discipline and dedication are required.
                        </label>
                    </div>
                    @error('agreedToTerms') <span class="text-red-500 text-xs mt-2 block">{{ $message }}</span> @enderror
                </div>
            </div>
            @endif

            <!-- Navigation Buttons -->
            <div class="flex justify-between pt-6 border-t border-border">
                <button
                    type="button"
                    wire:click="previousStep"
                    @disabled($this->step === 1)
                    class="px-6 py-2 border border-border rounded-md font-medium transition-colors hover:bg-muted disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                    Previous
                </button>
                @if ($this->step < $this->totalSteps)
                    <button
                        type="button"
                        wire:click="nextStep"
                        class="px-6 py-2 bg-primary text-primary-foreground rounded-md font-medium hover:opacity-90 transition-opacity">
                        Next Step
                    </button>
                    @else
                    <button
                        type="submit"
                        class="px-6 py-2 bg-secondary text-secondary-foreground rounded-md font-medium hover:opacity-90 transition-opacity">
                        Submit Application
                    </button>
                    @endif
            </div>
        </div>
    </div>
</form>
</div>
</div>