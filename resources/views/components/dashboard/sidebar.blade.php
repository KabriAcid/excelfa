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
    <div class="flex h-16 items-center justify-center border-b border-gray-200 dark:border-gray-700 px-6">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-primary text-white font-bold text-xl">
                E
            </div>
            <span class="text-xl font-bold text-gray-900 dark:text-white">ExcelFA</span>
        </a>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 space-y-1 px-3 py-4 overflow-y-auto">
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
    <div class="border-t border-gray-200 dark:border-gray-700 p-4">
        <div class="flex items-center gap-3 mb-3 px-2">
            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary/10 text-primary font-semibold">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900 dark:text-white truncate">
                    {{ auth()->user()->name }}
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400 truncate">
                    {{ auth()->user()->email }}
                </p>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex w-full items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span>Logout</span>
            </button>
        </form>
    </div>
</div>