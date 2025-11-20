<div class="py-12 px-4 sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-900 min-h-screen">
    <div class="max-w-6xl mx-auto">
        <!-- Page Header -->
        <div class="mb-12">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white">Profile Settings</h1>
            <p class="text-gray-600 dark:text-gray-400 mt-2 text-lg">Manage your account information and security settings</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Profile Information Card -->
            <section class="bg-white dark:bg-gray-800 rounded-xl shadow-premium border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="p-6 sm:p-8">
                    <header class="mb-6">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                            {{ __('Profile Information') }}
                        </h2>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Update your profile details and email address.") }}
                        </p>
                    </header>

                    <form wire:submit="updateProfileInformation" class="space-y-4">
                        <div>
                            <x-input-label for="name" :value="__('Name')" class="text-gray-700 dark:text-gray-300" />
                            <x-text-input 
                                wire:model="name" 
                                id="name" 
                                name="name" 
                                type="text" 
                                class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:border-primary focus:ring-primary" 
                                required 
                                autofocus 
                                autocomplete="name" 
                            />
                            <x-input-error class="mt-1" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-300" />
                            <x-text-input 
                                wire:model="email" 
                                id="email" 
                                name="email" 
                                type="email" 
                                class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:border-primary focus:ring-primary" 
                                required 
                                autocomplete="username" 
                            />
                            <x-input-error class="mt-1" :messages="$errors->get('email')" />

                            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                                <div class="mt-3 p-3 bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg">
                                    <p class="text-xs text-yellow-800 dark:text-yellow-200">
                                        {{ __('Your email address is unverified.') }}

                                        <button wire:click.prevent="sendVerification" class="inline font-semibold text-yellow-700 dark:text-yellow-300 hover:text-yellow-900 underline ml-1">
                                            {{ __('Resend verification') }}
                                        </button>
                                    </p>

                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-1 font-medium text-xs text-green-700 dark:text-green-300">
                                            {{ __('Verification link sent!') }}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <div class="pt-4 flex gap-3">
                            <button 
                                type="submit"
                                class="px-4 py-2 text-white bg-primary hover:bg-primary/90 rounded-lg font-medium transition-colors">
                                {{ __('Save Changes') }}
                            </button>
                            <x-action-message class="text-green-600 dark:text-green-400 text-sm inline-block" on="profile-updated">
                                {{ __('Saved successfully.') }}
                            </x-action-message>
                        </div>
                    </form>
                </div>
            </section>

            <!-- Update Password Card -->
            <section class="bg-white dark:bg-gray-800 rounded-xl shadow-premium border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="p-6 sm:p-8">
                    <header class="mb-6">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                            {{ __('Update Password') }}
                        </h2>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Use a strong password to keep your account secure.') }}
                        </p>
                    </header>

                    <form wire:submit="updatePassword" class="space-y-4">
                        <div>
                            <x-input-label for="current_password" :value="__('Current Password')" class="text-gray-700 dark:text-gray-300" />
                            <x-text-input 
                                wire:model="current_password" 
                                id="current_password" 
                                name="current_password" 
                                type="password" 
                                class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:border-primary focus:ring-primary" 
                                autocomplete="current-password" 
                            />
                            <x-input-error :messages="$errors->get('current_password')" class="mt-1" />
                        </div>

                        <div>
                            <x-input-label for="password" :value="__('New Password')" class="text-gray-700 dark:text-gray-300" />
                            <x-text-input 
                                wire:model="password" 
                                id="password" 
                                name="password" 
                                type="password" 
                                class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:border-primary focus:ring-primary" 
                                autocomplete="new-password" 
                            />
                            <x-input-error :messages="$errors->get('password')" class="mt-1" />
                        </div>

                        <div>
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 dark:text-gray-300" />
                            <x-text-input 
                                wire:model="password_confirmation" 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                type="password" 
                                class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:border-primary focus:ring-primary" 
                                autocomplete="new-password" 
                            />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                        </div>

                        <div class="pt-4 flex gap-3">
                            <button 
                                type="submit"
                                class="px-4 py-2 text-white bg-primary hover:bg-primary/90 rounded-lg font-medium transition-colors">
                                {{ __('Update Password') }}
                            </button>
                            <x-action-message class="text-green-600 dark:text-green-400 text-sm inline-block" on="password-updated">
                                {{ __('Saved successfully.') }}
                            </x-action-message>
                        </div>
                    </form>
                </div>
            </section>

            <!-- Delete Account Card -->
            <section class="bg-white dark:bg-gray-800 rounded-xl shadow-premium border border-gray-200 dark:border-gray-700 overflow-hidden lg:col-span-2">
                <div class="p-6 sm:p-8">
                    <header class="mb-6">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                            {{ __('Delete Account') }}
                        </h2>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Permanently delete your account and all associated data.') }}
                        </p>
                    </header>

                    <div class="pt-2">
                        <button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                            type="button"
                            class="px-4 py-2 text-white bg-red-600 hover:bg-red-700 rounded-lg font-medium transition-colors">
                            {{ __('Delete Account') }}
                        </button>
                    </div>

                    <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
                        <form wire:submit="deleteUser" class="p-6">
                            <h2 class="text-lg font-bold text-gray-900 dark:text-white">
                                {{ __('Confirm Account Deletion') }}
                            </h2>

                            <p class="mt-3 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Enter your password to confirm account deletion. This action cannot be undone.') }}
                            </p>

                            <div class="mt-5">
                                <x-input-label for="delete_password" value="{{ __('Password') }}" class="text-gray-700 dark:text-gray-300" />
                                <x-text-input
                                    wire:model="delete_password"
                                    id="delete_password"
                                    name="delete_password"
                                    type="password"
                                    class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:border-red-500 focus:ring-red-500"
                                    placeholder="{{ __('Enter your password') }}"
                                    autofocus
                                />
                                <x-input-error :messages="$errors->get('delete_password')" class="mt-1" />
                            </div>

                            <div class="mt-6 flex justify-end gap-3">
                                <button 
                                    x-on:click="$dispatch('close')"
                                    type="button"
                                    class="px-4 py-2 text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg font-medium transition-colors">
                                    {{ __('Cancel') }}
                                </button>

                                <button
                                    type="submit"
                                    class="px-4 py-2 text-white bg-red-600 hover:bg-red-700 rounded-lg font-medium transition-colors">
                                    {{ __('Delete Account') }}
                                </button>
                            </div>
                        </form>
                    </x-modal>
                </div>
            </section>
        </div>
    </div>
</div>
