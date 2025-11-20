<div>
    <x-slot name="header">
        Application Settings
    </x-slot>

    <!-- Tabs -->
    <div class="mb-8">
        <div class="flex space-x-1 border-b border-gray-200 dark:border-gray-700">
            <button 
                wire:click="$set('activeTab', 'general')"
                :class="activeTab === 'general' ? 'border-b-2 border-primary text-primary font-semibold' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 font-medium'"
                class="px-4 py-3 transition-colors relative
                    {{ $activeTab === 'general' ? 'border-b-2 border-primary text-primary font-semibold' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 font-medium' }}">
                General
            </button>
            <button 
                wire:click="$set('activeTab', 'email')"
                :class="activeTab === 'email' ? 'border-b-2 border-primary text-primary font-semibold' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 font-medium'"
                class="px-4 py-3 transition-colors relative
                    {{ $activeTab === 'email' ? 'border-b-2 border-primary text-primary font-semibold' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 font-medium' }}">
                Email
            </button>
            <button 
                wire:click="$set('activeTab', 'application')"
                :class="activeTab === 'application' ? 'border-b-2 border-primary text-primary font-semibold' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 font-medium'"
                class="px-4 py-3 transition-colors relative
                    {{ $activeTab === 'application' ? 'border-b-2 border-primary text-primary font-semibold' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 font-medium' }}">
                Application
            </button>
            <button 
                wire:click="$set('activeTab', 'admins')"
                :class="activeTab === 'admins' ? 'border-b-2 border-primary text-primary font-semibold' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 font-medium'"
                class="px-4 py-3 transition-colors relative
                    {{ $activeTab === 'admins' ? 'border-b-2 border-primary text-primary font-semibold' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 font-medium' }}">
                Admins
            </button>
        </div>
    </div>

    <!-- General Settings Tab -->
    @if($activeTab === 'general')
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-premium border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">General Settings</h3>
        
        <form wire:submit="saveGeneralSettings" class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Academy Name</label>
                <input 
                    type="text"
                    wire:model="academyName"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-primary focus:border-transparent">
                @error('academyName') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email Address</label>
                <input 
                    type="email"
                    wire:model="email"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-primary focus:border-transparent">
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Phone Number</label>
                <input 
                    type="tel"
                    wire:model="phone"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-primary focus:border-transparent">
                @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Address</label>
                <textarea 
                    wire:model="address"
                    rows="3"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-primary focus:border-transparent"></textarea>
                @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                <button 
                    type="button"
                    class="px-4 py-2 text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg font-medium transition-colors">
                    {{ __('Cancel') }}
                </button>
                <button 
                    type="submit"
                    class="px-4 py-2 text-white bg-primary hover:bg-primary/90 rounded-lg font-medium transition-colors">
                    {{ __('Save Changes') }}
                </button>
            </div>
        </form>
    </div>
    @endif

    <!-- Email Settings Tab -->
    @if($activeTab === 'email')
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-premium border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">Email Configuration</h3>
        
        <form wire:submit="saveEmailSettings" class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">SMTP Host</label>
                <input 
                    type="text"
                    wire:model="smtpHost"
                    placeholder="smtp.example.com"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-primary focus:border-transparent">
                @error('smtpHost') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">SMTP Port</label>
                <input 
                    type="number"
                    wire:model="smtpPort"
                    placeholder="587"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-primary focus:border-transparent">
                @error('smtpPort') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">SMTP Username</label>
                <input 
                    type="text"
                    wire:model="smtpUsername"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-primary focus:border-transparent">
                @error('smtpUsername') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">SMTP Password</label>
                <input 
                    type="password"
                    wire:model="smtpPassword"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-primary focus:border-transparent">
                @error('smtpPassword') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                <button 
                    type="button"
                    wire:click="sendTestEmail"
                    class="px-4 py-2 text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg font-medium transition-colors">
                    {{ __('Send Test Email') }}
                </button>
                <button 
                    type="submit"
                    class="px-4 py-2 text-white bg-primary hover:bg-primary/90 rounded-lg font-medium transition-colors">
                    {{ __('Save Changes') }}
                </button>
            </div>
        </form>
    </div>
    @endif

    <!-- Application Settings Tab -->
    @if($activeTab === 'application')
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-premium border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">Application Settings</h3>
        
        <form wire:submit="saveApplicationSettings" class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Site Title</label>
                <input 
                    type="text"
                    wire:model="siteTitle"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-primary focus:border-transparent">
                @error('siteTitle') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center gap-3">
                <input 
                    type="checkbox"
                    wire:model="maintenanceMode"
                    id="maintenanceMode"
                    class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary">
                <label for="maintenanceMode" class="text-sm font-medium text-gray-700 dark:text-gray-300">Enable Maintenance Mode</label>
            </div>

            <div class="flex justify-end gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                <button 
                    type="button"
                    class="px-4 py-2 text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg font-medium transition-colors">
                    {{ __('Cancel') }}
                </button>
                <button 
                    type="submit"
                    class="px-4 py-2 text-white bg-primary hover:bg-primary/90 rounded-lg font-medium transition-colors">
                    {{ __('Save Changes') }}
                </button>
            </div>
        </form>
    </div>
    @endif

    <!-- Manage Admins Tab -->
    @if($activeTab === 'admins')
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-premium border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Manage Admins</h3>
            <button 
                wire:click="openAddAdminModal"
                class="px-4 py-2 text-white bg-primary hover:bg-primary/90 rounded-lg font-medium transition-colors">
                + Add Admin
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 dark:bg-gray-700/50 border-b border-gray-200 dark:border-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Joined</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($admins as $admin)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">#{{ $admin->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $admin->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $admin->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            {{ $admin->created_at->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            @if($admin->id !== auth()->id())
                            <button 
                                wire:click="removeAdmin({{ $admin->id }})"
                                class="p-2 text-red-600 hover:text-red-700 hover:bg-red-100 dark:hover:bg-red-900/20 rounded-lg transition-colors" title="Remove Admin">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                            @else
                            <span class="px-2 py-1 text-xs font-semibold text-blue-700 dark:text-blue-300 bg-blue-100 dark:bg-blue-900/20 rounded">Current User</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                            <p class="text-sm">No admins found</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Add Admin Modal -->
        <x-modal name="add-admin-modal" :show="$showAddAdminModal" focusable>
            <form wire:submit="createAdmin" class="p-6">
                <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-6">
                    {{ __('Create New Admin') }}
                </h2>

                <div class="space-y-4">
                    <div>
                        <x-input-label for="newAdminName" :value="__('Full Name')" class="text-gray-700 dark:text-gray-300" />
                        <x-text-input
                            wire:model="newAdminName"
                            id="newAdminName"
                            name="newAdminName"
                            type="text"
                            class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:border-primary focus:ring-primary"
                            placeholder="Enter admin name"
                            autofocus
                        />
                        <x-input-error :messages="$errors->get('newAdminName')" class="mt-1" />
                    </div>

                    <div>
                        <x-input-label for="newAdminEmail" :value="__('Email Address')" class="text-gray-700 dark:text-gray-300" />
                        <x-text-input
                            wire:model="newAdminEmail"
                            id="newAdminEmail"
                            name="newAdminEmail"
                            type="email"
                            class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:border-primary focus:ring-primary"
                            placeholder="admin@example.com"
                        />
                        <x-input-error :messages="$errors->get('newAdminEmail')" class="mt-1" />
                    </div>

                    <div>
                        <x-input-label for="newAdminPassword" :value="__('Password')" class="text-gray-700 dark:text-gray-300" />
                        <x-text-input
                            wire:model="newAdminPassword"
                            id="newAdminPassword"
                            name="newAdminPassword"
                            type="password"
                            class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:border-primary focus:ring-primary"
                            placeholder="Minimum 8 characters"
                        />
                        <x-input-error :messages="$errors->get('newAdminPassword')" class="mt-1" />
                    </div>

                    <div>
                        <x-input-label for="newAdminPasswordConfirm" :value="__('Confirm Password')" class="text-gray-700 dark:text-gray-300" />
                        <x-text-input
                            wire:model="newAdminPasswordConfirm"
                            id="newAdminPasswordConfirm"
                            name="newAdminPasswordConfirm"
                            type="password"
                            class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:border-primary focus:ring-primary"
                            placeholder="Re-enter password"
                        />
                        <x-input-error :messages="$errors->get('newAdminPasswordConfirm')" class="mt-1" />
                    </div>
                </div>

                <div class="mt-6 flex justify-end gap-3">
                    <button 
                        type="button"
                        x-on:click="$dispatch('close')"
                        class="px-4 py-2 text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg font-medium transition-colors">
                        {{ __('Cancel') }}
                    </button>

                    <button 
                        type="submit"
                        class="px-4 py-2 text-white bg-primary hover:bg-primary/90 rounded-lg font-medium transition-colors">
                        {{ __('Create Admin') }}
                    </button>
                </div>
            </form>
        </x-modal>
    </div>
    @endif
</div>
