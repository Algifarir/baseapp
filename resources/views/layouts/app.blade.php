<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/core.js'])
    @livewireStyles

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div x-data="{ sidebarOpen: false, sidebarCollapsed: false }" class="flex h-screen flex-col overflow-hidden">

        <!-- Topbar -->
        <header class="flex h-14 shrink-0 items-center justify-between bg-white px-4 shadow">

            <div class="flex items-center gap-3">
                <button class="text-gray-700 lg:hidden" @click="sidebarOpen = true" aria-label="Open sidebar">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
                <button class="hidden text-gray-700 lg:inline-flex"
                    @click="sidebarCollapsed = !sidebarCollapsed" :aria-expanded="(!sidebarCollapsed).toString()"
                    aria-controls="appSidebar" title="Toggle sidebar" aria-label="Toggle sidebar">
                    <i class="fa-solid fa-bars text-xl" x-show="!sidebarCollapsed"></i>
                    <i class="fa-solid fa-bars text-xl" x-show="sidebarCollapsed"></i>
                </button>
                <div class="text-lg font-bold">
                    BASE APP
                </div>
            </div>

            <div class="font-semibold text-gray-700">

            </div>

            <!-- Profile dropdown (Flowbite) -->
            <div class="relative">
                <button id="userMenuButton" data-dropdown-toggle="userDropdown" class="flex items-center space-x-2">
                    <span>{{ auth()->user()->name ?? 'Guest' }}</span>
                    <i class="fa-solid fa-chevron-down text-sm"></i>
                </button>

                <div id="userDropdown" class="z-10 hidden w-44 rounded bg-white shadow">
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="w-full px-4 py-2 text-left hover:bg-gray-100">Logout</button>
                    </form>
                </div>
            </div>

        </header>

        <div class="relative flex flex-1 overflow-hidden">

            <!-- Mobile Sidebar Overlay -->
            <div x-show="sidebarOpen" class="fixed inset-x-0 bottom-0 top-14 z-30 bg-black/50 lg:hidden"
                @click="sidebarOpen=false"></div>

            <!-- Sidebar -->
            <aside id="appSidebar"
                class="fixed bottom-0 left-0 top-14 z-40 w-64 transform bg-gray-800 text-white transition-all duration-200 lg:static lg:top-0 lg:translate-x-0"
                :class="[
                    sidebarOpen ? 'translate-x-0' : '-translate-x-full',
                    sidebarCollapsed ? 'lg:w-16' : 'lg:w-64'
                ]">

                <nav class="mt-4 space-y-2 px-2">

                    @if (\App\Services\RuleService::can('manage_user'))
                        <a href="{{ route('users.index') }}" wire:navigate
                            class="flex items-center gap-2 rounded px-3 py-2 hover:bg-gray-700">
                            <i class="fa-solid fa-users"></i>
                            <span x-show="!sidebarCollapsed" x-cloak>Users</span>
                        </a>
                    @endif

                    <a href="{{ route('rules.index') }}" wire:navigate
                        class="flex items-center gap-2 rounded px-3 py-2 hover:bg-gray-700">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span x-show="!sidebarCollapsed" x-cloak>Rules</span>
                    </a>

                    <a href="{{ route('dropdowns.index') }}" wire:navigate
                        class="flex items-center gap-2 rounded px-3 py-2 hover:bg-gray-700">
                        <i class="fa-solid fa-list"></i>
                        <span x-show="!sidebarCollapsed" x-cloak>Dropdowns</span>
                    </a>

                </nav>
            </aside>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-4">
                {{ $slot ?? '' }}
                @yield('content')
            </main>

        </div>
    </div>

    @livewireScripts

</body>

</html>
