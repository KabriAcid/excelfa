<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;
    public bool $showPassword = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        // Determine redirect based on user role after authentication
        $redirectRoute = 'dashboard';

        if (Auth::check()) {
            $userRole = Auth::user()->role ?? 'user';
            $redirectRoute = match ($userRole) {
                'admin' => 'dashboard',
                'parent' => 'dashboard',
                'coach' => 'dashboard',
                default => 'dashboard',
            };
        }

        $this->redirectIntended(default: route($redirectRoute, absolute: false), navigate: true);
    }

    public function togglePasswordVisibility(): void
    {
        $this->showPassword = !$this->showPassword;
    }
}; ?>

<div class="bg-muted min-h-screen flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-sm">
        <!-- Login Card -->
        <div class="animate-scale-in">
            <!-- Card Header -->
            <div class="text-center mb-8">
                <h3 class="text-4xl font-bold text-foreground mb-2">Sign In</h3>
                <h3 class="text-base text-foreground text-gray-400 mb-2">Sign in to your account to continue</h3>
            </div>

            <!-- Card Body -->
            <div class="bg-background rounded-lg p-8">
                <!-- Session Status -->
                <x-auth-session-status class="mb-6" :status="session('status')" />

                <form wire:submit="login" class="space-y-4">
                    <!-- Email Address with Icon -->
                    <div class="relative">
                        <div class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none">
                            <svg class="h-5 w-5 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input
                            type="email"
                            wire:model="form.email"
                            id="email"
                            placeholder="Email address"
                            class="w-full pl-10 pr-4 py-3 border border-border rounded-lg focus:outline-none focus:ring-1 focus:ring-primary/50 focus:border-primary transition-all bg-background text-foreground placeholder-muted-foreground"
                            required
                            autofocus
                            autocomplete="email" />
                        @error('form.email')
                        <span class="text-destructive text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password with Icon and Toggle -->
                    <div class="relative">
                        <div class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none">
                            <svg class="h-5 w-5 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input
                            type="{{ $showPassword ? 'text' : 'password' }}"
                            wire:model="form.password"
                            id="password"
                            placeholder="Password"
                            class="w-full pl-10 pr-10 py-3 border border-border rounded-lg focus:outline-none focus:ring-1 focus:ring-primary/50 focus:border-primary transition-all bg-background text-foreground placeholder-muted-foreground"
                            required
                            autocomplete="current-password" />
                        <button
                            type="button"
                            wire:click="togglePasswordVisibility"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-muted-foreground hover:text-foreground transition-colors">
                            @if ($showPassword)
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            @else
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-2.629m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                            @endif
                        </button>
                        @error('form.password')
                        <span class="text-destructive text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input
                                type="checkbox"
                                wire:model="form.remember"
                                class="w-4 h-4 rounded border-border text-primary focus:ring-primary cursor-pointer" />
                            <span class="text-sm text-muted-foreground">Remember me</span>
                        </label>
                        @if (Route::has('password.request'))
                        <a
                            href="{{ route('password.request') }}"
                            wire:navigate
                            class="text-sm font-medium text-primary hover:text-primary/90 transition-colors">
                            Forgot password?
                        </a>
                        @endif
                    </div>

                    <!-- Submit Button with Loading Spinner -->
                    <button
                        type="submit"
                        wire:loading.attr="disabled"
                        class="w-full px-6 py-3 rounded-lg text-sm font-semibold text-white bg-primary hover:bg-primary/90 transition-all shadow-premium hover:shadow-premium-lg active:scale-95 transform duration-200 mt-6 disabled:opacity-75 disabled:cursor-not-allowed flex items-center justify-center">
                        <span wire:loading.remove wire:target="login" class="block">Sign In</span>
                        <span wire:loading wire:target="login" class="flex items-center justify-center gap-2">
                            <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Processing...
                        </span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Footer Text -->
        <p class="text-xs text-muted-foreground text-center mt-6">
            Excel Football Academy © {{ now()->year }}
        </p>
    </div>
</div>