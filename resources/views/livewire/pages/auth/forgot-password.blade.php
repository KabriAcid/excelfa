<?php

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
}; ?>

<div class="bg-muted min-h-screen flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-sm">
        <!-- Forgot Password Card -->
        <div class="animate-scale-in">
            <!-- Card Header -->
            <div class="text-center mb-8">
                <h3 class="text-4xl font-bold text-foreground mb-2">Reset Password</h3>
                <p class="text-base text-muted-foreground">Forgot your password? No problem. Enter your email and we'll send you a reset link.</p>
            </div>

            <!-- Card Body -->
            <div class="bg-background rounded-lg p-8">
                <!-- Session Status -->
                <x-auth-session-status class="mb-6" :status="session('status')" />

                <form wire:submit="sendPasswordResetLink" class="space-y-4">
                    <!-- Email Address with Icon -->
                    <div class="relative">
                        <div class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none">
                            <svg class="h-5 w-5 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input
                            type="email"
                            wire:model="email"
                            id="email"
                            placeholder="Email address"
                            class="w-full pl-10 pr-4 py-3 border border-border rounded-lg focus:outline-none focus:ring-1 focus:ring-primary/50 focus:border-primary transition-all bg-background text-foreground placeholder-muted-foreground"
                            required
                            autofocus
                            autocomplete="email" />
                        @error('email')
                        <span class="text-destructive text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button with Loading Spinner -->
                    <button
                        type="submit"
                        wire:loading.attr="disabled"
                        class="w-full px-6 py-3 rounded-lg text-sm font-semibold text-white bg-primary hover:bg-primary/90 transition-all shadow-premium hover:shadow-premium-lg active:scale-95 transform duration-200 mt-6 disabled:opacity-75 disabled:cursor-not-allowed flex items-center justify-center">
                        <span wire:loading.remove wire:target="sendPasswordResetLink" class="block">Send Reset Link</span>
                        <span wire:loading wire:target="sendPasswordResetLink" class="flex items-center justify-center gap-2">
                            <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Sending...
                        </span>
                    </button>
                </form>

                <!-- Back to Login Link -->
                <div class="mt-6 text-center">
                    @if (Route::has('login'))
                    <a
                        href="{{ route('login') }}"
                        wire:navigate
                        class="text-sm font-medium text-primary hover:text-primary/90 transition-colors">
                        Back to Sign In
                    </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Footer Text -->
        <p class="text-xs text-muted-foreground text-center mt-6">
            Excel Football Academy © {{ now()->year }}
        </p>
    </div>
</div>