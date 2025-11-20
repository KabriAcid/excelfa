@php
$currentRoute = Route::currentRouteName();
$navItems = [
['name' => 'Dashboard', 'route' => 'admin.dashboard', 'icon' => 'home'],
['name' => 'Enrollments', 'route' => 'admin.enrollments', 'icon' => 'clipboard-list'],
['name' => 'Inquiries', 'route' => 'admin.inquiries', 'icon' => 'mail'],
['name' => 'Gallery', 'route' => 'admin.gallery', 'icon' => 'images'],
['name' => 'Users', 'route' => 'admin.users', 'icon' => 'users'],
['name' => 'Settings', 'route' => 'admin.settings', 'icon' => 'settings'],
];
@endphp

<div class="flex h-full w-full flex-col bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700">
    <!-- Logo -->
    <div class="flex h-20 items-center px-4 border-b border-gray-100 dark:border-gray-700/50">
        <a wire:navigate href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group">
            <div class="flex h-9 w-9 items-center justify-center rounded-md bg-primary text-white font-semibold text-lg shadow-sm group-hover:shadow-md transition-shadow">
                E
            </div>
            <div class="flex flex-col">
                <span class="text-sm font-semibold text-gray-900 dark:text-white tracking-tight">ExcelFA</span>
                <span class="text-xs font-medium text-gray-500 dark:text-gray-400">Admin</span>
            </div>
        </a>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 space-y-0.5 px-3 py-4 overflow-y-auto">
        <div class="mb-3 px-2">
            <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-widest">Menu</p>
        </div>
        @foreach ($navItems as $item)
        <x-dashboard.nav-link
            :href="route($item['route'])"
            :active="$currentRoute === $item['route']"
            :icon="$item['icon']">
            {{ $item['name'] }}
        </x-dashboard.nav-link>
        @endforeach
    </nav>

    <!-- User section & Logout -->
    <div class="border-t border-gray-100 dark:border-gray-700/50 bg-gray-50 dark:bg-gray-900/50 p-4 space-y-3">
        <div class="flex items-center gap-3 px-2 py-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700/50 shadow-sm">
            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-primary text-white font-semibold text-sm flex-shrink-0">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-gray-900 dark:text-white truncate">
                    {{ auth()->user()->name }}
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400 truncate">
                    {{ auth()->user()->email }}
                </p>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-lg px-3 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:border-gray-300 dark:hover:border-gray-600 hover:text-primary transition-all duration-200 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span>Logout</span>
            </button>
        </form>
    </div>
</div>