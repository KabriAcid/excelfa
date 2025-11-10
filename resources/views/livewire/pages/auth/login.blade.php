<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="min-h-screen bg-background flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-sm">
        <!-- Login Card -->
        <div class="animate-scale-in">
            <!-- Card Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-foreground mb-2">Admin Login</h1>
                <p class="text-muted-foreground">Sign in to your account to continue</p>
            </div>

            <!-- Card Body -->
            <div class="bg-background border border-border rounded-lg shadow-premium p-8">
                <!-- Session Status -->
                <x-auth-session-status class="mb-6" :status="session('status')" />

                <form wire:submit="login" class="space-y-4">
                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-foreground mb-2">
                            Email Address
                        </label>
                        <input
                            type="email"
                            wire:model="form.email"
                            id="email"
                            placeholder="your@email.com"
                            class="w-full px-4 py-2.5 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all bg-background"
                            required
                            autofocus
                            autocomplete="email" />
                        @error('form.email')
                        <span class="text-destructive text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-foreground mb-2">
                            Password
                        </label>
                        <input
                            type="password"
                            wire:model="form.password"
                            id="password"
                            placeholder="••••••••"
                            class="w-full px-4 py-2.5 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all bg-background"
                            required
                            autocomplete="current-password" />
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

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full px-6 py-3 rounded-lg text-sm font-semibold text-white bg-primary hover:bg-primary/90 transition-all shadow-premium hover:shadow-premium-lg active:scale-95 transform duration-200">
                        Sign In
                    </button>
                </form>

                <!-- Divider -->
                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-border"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-background text-muted-foreground">or continue as</span>
                    </div>
                </div>

                <!-- Student Enrollment Link -->
                <div class="text-center">
                    <p class="text-sm text-muted-foreground mb-3">Not an admin? Want to enroll a student?</p>
                    <a
                        href="{{ route('enrol') }}"
                        wire:navigate
                        class="inline-flex items-center justify-center space-x-2 px-6 py-3 rounded-lg text-sm font-semibold text-primary border-2 border-primary hover:bg-muted transition-all">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        <span>Student Enrollment</span>
                    </a>
                </div>
            </div>

            <!-- Card Footer -->
            <div class="border-t border-border px-8 py-4 bg-muted/30">
                <p class="text-xs text-muted-foreground text-center">
                    Excel Football Academy © {{ now()->year }}
                </p>
            </div>
        </div>

        <!-- Security Notice -->
        <div class="mt-6 p-4 rounded-lg bg-accent/5 border border-accent/20 animate-fade-in">
            <div class="flex items-start space-x-3">
                <svg class="h-5 w-5 text-accent mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zm-11-1a1 1 0 11-2 0 1 1 0 012 0zM10 7a1 1 0 100-2 1 1 0 000 2zm3 1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd" />
                </svg>
                <p class="text-sm text-accent">
                    Keep your credentials secure. Never share your password with anyone.
                </p>
            </div>
        </div>
    </div>
</div>