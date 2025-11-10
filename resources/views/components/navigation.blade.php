<nav class="fixed top-0 left-0 right-0 z-50 bg-background/95 backdrop-blur-sm border-b border-border shadow-premium">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-3">
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
                    <a href="/" class="px-4 py-2 rounded-md text-sm font-medium transition-colors {{ request()->is('/') ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted' }}">
                        Home
                    </a>
                    <a href="/about" class="px-4 py-2 rounded-md text-sm font-medium transition-colors {{ request()->is('about') ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted' }}">
                        About Us
                    </a>
                    <a href="/admission" class="px-4 py-2 rounded-md text-sm font-medium transition-colors {{ request()->is('admission') ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted' }}">
                        Admission
                    </a>
                    <a href="/gallery" class="px-4 py-2 rounded-md text-sm font-medium transition-colors {{ request()->is('gallery') ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted' }}">
                        Gallery
                    </a>
                    <a href="/contact" class="px-4 py-2 rounded-md text-sm font-medium transition-colors {{ request()->is('contact') ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted' }}">
                        Contact
                    </a>
                    <a href="/anthem" class="px-4 py-2 rounded-md text-sm font-medium transition-colors {{ request()->is('anthem') ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted' }}">
                        Anthem
                    </a>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center space-x-3">
                    <a href="/login" class="px-4 py-2 rounded-md text-sm font-medium text-foreground hover:bg-muted transition-colors border border-border">
                        Login
                    </a>
                    <a href="/enrol" class="px-6 py-2 rounded-md text-sm font-semibold text-white bg-primary hover:bg-primary/90 transition-all shadow-premium">
                        Enrol Now
                    </a>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <button
                x-data="{ open: false }"
                @click="open = !open"
                class="md:hidden p-2 hover:bg-muted rounded-md"
                aria-label="Toggle menu">
                <svg x-show="!open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div x-data="{ open: false }" x-show="open" class="md:hidden pb-4 animate-fade-in">
            <div class="flex flex-col space-y-2">
                <a href="/" @click="open = false" class="px-4 py-3 rounded-md text-sm font-medium transition-colors {{ request()->is('/') ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted' }}">
                    Home
                </a>
                <a href="/about" @click="open = false" class="px-4 py-3 rounded-md text-sm font-medium transition-colors {{ request()->is('about') ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted' }}">
                    About Us
                </a>
                <a href="/admission" @click="open = false" class="px-4 py-3 rounded-md text-sm font-medium transition-colors {{ request()->is('admission') ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted' }}">
                    Admission
                </a>
                <a href="/gallery" @click="open = false" class="px-4 py-3 rounded-md text-sm font-medium transition-colors {{ request()->is('gallery') ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted' }}">
                    Gallery
                </a>
                <a href="/contact" @click="open = false" class="px-4 py-3 rounded-md text-sm font-medium transition-colors {{ request()->is('contact') ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted' }}">
                    Contact
                </a>
                <a href="/anthem" @click="open = false" class="px-4 py-3 rounded-md text-sm font-medium transition-colors {{ request()->is('anthem') ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted' }}">
                    Anthem
                </a>
                <div class="border-t border-border pt-3 mt-3 flex flex-col space-y-2">
                    <a href="/login" @click="open = false" class="px-4 py-3 rounded-md text-sm font-medium text-foreground hover:bg-muted transition-colors border border-border text-center">
                        Login
                    </a>
                    <a href="/enrol" @click="open = false" class="px-4 py-3 rounded-md text-sm font-semibold text-white bg-primary hover:bg-primary/90 transition-all shadow-premium text-center">
                        Enrol Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>