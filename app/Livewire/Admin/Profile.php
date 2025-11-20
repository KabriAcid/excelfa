<?php

namespace App\Livewire\Admin;

use App\Livewire\Actions\Logout;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.dashboard')]
class Profile extends Component
{
    // Profile Information
    public string $name = '';
    public string $email = '';

    // Password Update
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    // Delete Account
    public string $delete_password = '';

    /**
     * Mount the component and load current user data.
     */
    public function mount(): void
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
        $this->dispatch('notify', type: 'success', message: 'Profile updated successfully!');
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->dispatch('notify', type: 'info', message: 'Email already verified.');
            return;
        }

        $user->sendEmailVerificationNotification();
        $this->dispatch('notify', type: 'success', message: 'Verification link sent to your email!');
    }

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');
            throw $e;
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
        $this->dispatch('notify', type: 'success', message: 'Password updated successfully!');
    }

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'delete_password' => ['required', 'string', 'current_password'],
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $logout();
        $user->delete();

        $this->redirect('/', navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.profile');
    }
}
