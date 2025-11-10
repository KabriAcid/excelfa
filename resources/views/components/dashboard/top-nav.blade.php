<div class="sticky top-0 z-40 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
    <div class="flex h-16 items-center justify-between px-4 sm:px-6 lg:px-8">
        <!-- Left: Mobile menu button (visible on small screens) -->
        <div class="flex items-center gap-4">
            <button
                type="button"
                class="lg:hidden -m-2.5 p-2.5 text-gray-700 dark:text-gray-300"
                @click="$dispatch('toggle-mobile-menu')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Search bar (hidden on small screens) -->
            <div class="hidden md:block">
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input
                        type="search"
                        placeholder="Search..."
                        class="block w-64 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 py-2 pl-10 pr-3 text-sm text-gray-900 dark:text-white placeholder:text-gray-400 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                </div>
            </div>
        </div>

        <!-- Right: Actions -->
        <div class="flex items-center gap-3">
            <!-- Notifications -->
            <button
                type="button"
                class="relative rounded-lg p-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-colors"
                x-data="{ showNotifications: false }"
                @click="showNotifications = !showNotifications">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                <!-- Notification badge -->
                <span class="absolute top-1.5 right-1.5 h-2 w-2 rounded-full bg-red-500"></span>

                <!-- Dropdown (will add later with Alpine.js) -->
                <div
                    x-show="showNotifications"
                    @click.away="showNotifications = false"
                    x-transition
                    class="absolute right-0 mt-2 w-80 origin-top-right rounded-lg bg-white dark:bg-gray-800 shadow-premium-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                    style="display: none;">
                    <div class="p-4">
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-2">Notifications</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">No new notifications</p>
                    </div>
                </div>
            </button>

            <!-- Theme toggle -->
            <button
                type="button"
                class="rounded-lg p-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-colors"
                @click="darkMode = !darkMode">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
            </button>

            <!-- User menu -->
            <div class="relative" x-data="{ showUserMenu: false }">
                <button
                    type="button"
                    @click="showUserMenu = !showUserMenu"
                    class="flex items-center gap-2 rounded-lg p-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-primary text-white font-semibold text-sm">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <span class="hidden md:block text-sm font-medium text-gray-900 dark:text-white">
                        {{ auth()->user()->name }}
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- User dropdown -->
                <div
                    x-show="showUserMenu"
                    @click.away="showUserMenu = false"
                    x-transition
                    class="absolute right-0 mt-2 w-56 origin-top-right rounded-lg bg-white dark:bg-gray-800 shadow-premium-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                    style="display: none;">
                    <div class="p-2">
                        <div class="px-3 py-2 border-b border-gray-200 dark:border-gray-700">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ auth()->user()->email }}</p>
                        </div>

                        <a href="{{ route('profile') }}" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Profile
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex w-full items-center gap-2 px-3 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>