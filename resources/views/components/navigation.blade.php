<nav class="fixed top-0 left-0 right-0 z-50 bg-background/95 backdrop-blur-sm border-b border-border shadow-premium" x-data="{ mobileMenuOpen: false }">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <a href="/" wire:navigate class="flex items-center space-x-3">
                <x-logo class="w-12 h-12" />
                <div class="hidden md:block">
                    <div class="font-bold text-lg text-foreground tracking-tight">Excel Football Academy</div>
                    <div class="text-xs text-muted-foreground font-medium">The Quest to Conquer</div>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center justify-between flex-1 px-8">
                <!-- Main Menu -->
                <div class="flex items-center space-x-1">
                    <a href="/" wire:navigate class="px-4 py-2 rounded-md text-sm font-medium transition-colors {{ request()->is('/') ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted' }}">
                        Home
                    </a>
                    <a href="/about" wire:navigate class="px-4 py-2 rounded-md text-sm font-medium transition-colors {{ request()->is('about') ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted' }}">
                        About Us
                    </a>
                    <a href="/admission" wire:navigate class="px-4 py-2 rounded-md text-sm font-medium transition-colors {{ request()->is('admission') ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted' }}">
                        Admission
                    </a>
                    <a href="/gallery" wire:navigate class="px-4 py-2 rounded-md text-sm font-medium transition-colors {{ request()->is('gallery') ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted' }}">
                        Gallery
                    </a>
                    <a href="/contact" wire:navigate class="px-4 py-2 rounded-md text-sm font-medium transition-colors {{ request()->is('contact') ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted' }}">
                        Contact
                    </a>
                    <a href="/anthem" wire:navigate class="px-4 py-2 rounded-md text-sm font-medium transition-colors {{ request()->is('anthem') ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted' }}">
                        Anthem
                    </a>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center space-x-3">
                    @if(auth()->check())
                        @if(auth()->user()->role === 'admin')
                            <a href="/admin/dashboard" wire:navigate class="px-4 py-2 rounded-md text-sm font-medium text-white bg-primary hover:bg-primary/90 transition-colors border border-primary">
                                Dashboard
                            </a>
                        @else
                            <a href="/" wire:navigate class="px-4 py-2 rounded-md text-sm font-medium text-foreground hover:bg-muted transition-colors border border-border">
                                Profile
                            </a>
                        @endif
                    @else
                        <a href="/login" wire:navigate class="px-4 py-2 rounded-md text-sm font-medium text-foreground hover:bg-muted transition-colors border border-border">
                            Login
                        </a>
                    @endif
                    <a href="/enrol" wire:navigate class="px-6 py-2 rounded-md text-sm font-semibold text-white bg-primary hover:bg-primary/90 transition-all shadow-premium">
                        Enrol Now
                    </a>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <button
                @click="mobileMenuOpen = !mobileMenuOpen"
                class="md:hidden p-2 hover:bg-muted rounded-md transition-colors"
                aria-label="Toggle menu"
                :aria-expanded="mobileMenuOpen">
                <svg x-show="!mobileMenuOpen" class="h-6 w-6 text-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="mobileMenuOpen" x-cloak class="h-6 w-6 text-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div 
            x-show="mobileMenuOpen" 
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            @click.away="mobileMenuOpen = false"
            x-cloak
            class="md:hidden pb-4 border-t border-border mt-2">
            <div class="flex flex-col space-y-1 pt-2">
                <a href="/" wire:navigate @click="mobileMenuOpen = false" class="px-4 py-3 rounded-md text-sm font-medium transition-colors {{ request()->is('/') ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted' }}">
                    Home
                </a>
                <a href="/about" wire:navigate @click="mobileMenuOpen = false" class="px-4 py-3 rounded-md text-sm font-medium transition-colors {{ request()->is('about') ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted' }}">
                    About Us
                </a>
                <a href="/admission" wire:navigate @click="mobileMenuOpen = false" class="px-4 py-3 rounded-md text-sm font-medium transition-colors {{ request()->is('admission') ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted' }}">
                    Admission
                </a>
                <a href="/gallery" wire:navigate @click="mobileMenuOpen = false" class="px-4 py-3 rounded-md text-sm font-medium transition-colors {{ request()->is('gallery') ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted' }}">
                    Gallery
                </a>
                <a href="/contact" wire:navigate @click="mobileMenuOpen = false" class="px-4 py-3 rounded-md text-sm font-medium transition-colors {{ request()->is('contact') ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted' }}">
                    Contact
                </a>
                <a href="/anthem" wire:navigate @click="mobileMenuOpen = false" class="px-4 py-3 rounded-md text-sm font-medium transition-colors {{ request()->is('anthem') ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted' }}">
                    Anthem
                </a>
                <div class="border-t border-border pt-3 mt-3 flex flex-col space-y-2">
                    @if(auth()->check())
                        @if(auth()->user()->role === 'admin')
                            <a href="/admin/dashboard" wire:navigate @click="mobileMenuOpen = false" class="px-4 py-3 rounded-md text-sm font-semibold text-white bg-primary hover:bg-primary/90 transition-all shadow-premium text-center">
                                Dashboard
                            </a>
                        @else
                            <a href="/" wire:navigate @click="mobileMenuOpen = false" class="px-4 py-3 rounded-md text-sm font-medium text-foreground hover:bg-muted transition-colors border border-border text-center">
                                Profile
                            </a>
                        @endif
                    @else
                        <a href="/login" wire:navigate @click="mobileMenuOpen = false" class="px-4 py-3 rounded-md text-sm font-medium text-foreground hover:bg-muted transition-colors border border-border text-center">
                            Login
                        </a>
                    @endif
                    <a href="/enrol" wire:navigate @click="mobileMenuOpen = false" class="px-4 py-3 rounded-md text-sm font-semibold text-white bg-primary hover:bg-primary/90 transition-all shadow-premium text-center">
                        Enrol Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>