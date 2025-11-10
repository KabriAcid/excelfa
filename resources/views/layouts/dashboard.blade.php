<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Admin Dashboard') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire -->
    @livewireStyles
</head>

<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900">
    <div class="min-h-screen">
        <!-- Sidebar for large screens -->
        <aside class="hidden lg:fixed lg:inset-y-0 lg:left-0 lg:z-50 lg:block lg:w-60">
            <x-dashboard.sidebar />
        </aside>

        <!-- Main content area -->
        <div class="lg:pl-60">
            <!-- Top Navigation -->
            <x-dashboard.top-nav />

            <!-- Page content -->
            <main class="py-6 pb-20 lg:pb-6">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <!-- Page header -->
                    @if (isset($header))
                    <header class="mb-6">
                        <div class="flex items-center justify-between">
                            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                                {{ $header }}
                            </h1>
                        </div>
                    </header>
                    @endif

                    <!-- Page content -->
                    {{ $slot }}
                </div>
            </main>
        </div>

        <!-- Bottom navigation for small screens -->
        <div class="lg:hidden">
            <x-dashboard.bottom-nav />
        </div>
    </div>

    @livewireScripts

    <!-- Toast notifications container -->
    <div id="toast-container" class="fixed top-4 right-4 z-50 flex flex-col gap-2" x-data="{ toasts: [] }">
        <template x-for="toast in toasts" :key="toast.id">
            <x-dashboard.toast :type="toast.type" :message="toast.message" />
        </template>
    </div>
</body>

</html>