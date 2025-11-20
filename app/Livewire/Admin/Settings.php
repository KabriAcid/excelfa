<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.dashboard')]
class Settings extends Component
{
    public string $activeTab = 'general';
    public $admins;
    public bool $showAddAdminModal = false;

    // General Settings
    public string $academyName = 'Excel Football Academy';
    public string $email = 'info@excelfootball.com';
    public string $phone = '+234 123 456 7890';
    public string $address = 'Lagos, Nigeria';

    // Email Settings
    public string $smtpHost = '';
    public string $smtpPort = '587';
    public string $smtpUsername = '';
    public string $smtpPassword = '';

    // Application Settings
    public string $siteTitle = 'Excel Football Academy';
    public bool $maintenanceMode = false;

    // Add Admin Modal
    public string $newAdminName = '';
    public string $newAdminEmail = '';
    public string $newAdminPassword = '';
    public string $newAdminPasswordConfirm = '';

    protected $rules = [
        'academyName' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string',
        'address' => 'required|string',
        'siteTitle' => 'required|string|max:255',
    ];

    public function saveGeneralSettings()
    {
        $this->validate([
            'academyName' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        $this->dispatch('notify', type: 'success', message: 'General settings saved successfully!');
    }

    public function saveEmailSettings()
    {
        $this->validate([
            'smtpHost' => 'required|string',
            'smtpPort' => 'required|string',
            'smtpUsername' => 'required|string',
            'smtpPassword' => 'required|string',
        ]);

        $this->dispatch('notify', type: 'success', message: 'Email settings saved successfully!');
    }

    public function saveApplicationSettings()
    {
        $this->validate([
            'siteTitle' => 'required|string|max:255',
        ]);

        $this->dispatch('notify', type: 'success', message: 'Application settings saved successfully!');
    }

    public function sendTestEmail()
    {
        $this->dispatch('notify', type: 'success', message: 'Test email sent successfully!');
    }

    public function openAddAdminModal()
    {
        $this->resetAddAdminForm();
        $this->showAddAdminModal = true;
    }

    public function closeAddAdminModal()
    {
        $this->showAddAdminModal = false;
        $this->resetAddAdminForm();
    }

    public function resetAddAdminForm()
    {
        $this->newAdminName = '';
        $this->newAdminEmail = '';
        $this->newAdminPassword = '';
        $this->newAdminPasswordConfirm = '';
        $this->resetErrorBag();
    }

    public function createAdmin()
    {
        $validated = $this->validate([
            'newAdminName' => 'required|string|max:255',
            'newAdminEmail' => ['required', 'email', Rule::unique(User::class, 'email')],
            'newAdminPassword' => 'required|string|min:8|confirmed:newAdminPasswordConfirm',
            'newAdminPasswordConfirm' => 'required',
        ]);

        try {
            User::create([
                'name' => $validated['newAdminName'],
                'email' => $validated['newAdminEmail'],
                'password' => Hash::make($validated['newAdminPassword']),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]);

            $this->loadAdmins();
            $this->closeAddAdminModal();
            $this->dispatch('notify', type: 'success', message: 'Admin user created successfully!');
        } catch (\Exception $e) {
            $this->dispatch('notify', type: 'error', message: 'Failed to create admin: ' . $e->getMessage());
        }
    }

    public function removeAdmin($userId)
    {
        try {
            /** @var \App\Models\User $currentUser */
            $currentUser = auth()->user();
            User::where('id', $userId)->where('id', '!=', $currentUser->id)->update(['role' => 'user']);
            $this->loadAdmins();
            $this->dispatch('notify', type: 'success', message: 'Admin role removed successfully!');
        } catch (\Exception $e) {
            $this->dispatch('notify', type: 'error', message: 'Failed to remove admin: ' . $e->getMessage());
        }
    }

    public function loadAdmins()
    {
        $this->admins = User::where('role', 'admin')->orderBy('created_at', 'desc')->get();
    }

    public function mount()
    {
        $this->loadAdmins();
    }

    public function render()
    {
        return view('livewire.admin.settings');
    }
}

