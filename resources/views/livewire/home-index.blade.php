<div class="space-y-6">
    <div class="rounded-lg bg-white p-6 shadow">
        <h1 class="text-xl font-semibold">Halo {{ auth()->user()->name ?? 'User' }}</h1>
        <p class="mt-1 text-gray-600">Selamat datang di {{ config('app.name') }}</p>
    </div>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @if (\App\Services\RuleService::can('manage_user'))
            <a href="{{ route('users.index') }}" wire:navigate
                class="group flex items-center gap-4 rounded-lg bg-white p-4 shadow transition hover:shadow-md">
                <div
                    class="flex h-12 w-12 items-center justify-center rounded-lg bg-gray-100 text-gray-700 transition group-hover:bg-blue-50 group-hover:text-blue-600">
                    <i class="fa-solid fa-users text-xl"></i>
                </div>
                <div>
                    <div class="font-semibold text-gray-800">Users</div>
                    <div class="text-sm text-gray-500">Kelola pengguna aplikasi</div>
                </div>
            </a>
        @endif

        <a href="{{ route('rules.index') }}" wire:navigate
            class="group flex items-center gap-4 rounded-lg bg-white p-4 shadow transition hover:shadow-md">
            <div
                class="flex h-12 w-12 items-center justify-center rounded-lg bg-gray-100 text-gray-700 transition group-hover:bg-blue-50 group-hover:text-blue-600">
                <i class="fa-solid fa-shield-halved text-xl"></i>
            </div>
            <div>
                <div class="font-semibold text-gray-800">Rules</div>
                <div class="text-sm text-gray-500">Atur hak akses</div>
            </div>
        </a>

        <a href="{{ route('dropdowns.index') }}" wire:navigate
            class="group flex items-center gap-4 rounded-lg bg-white p-4 shadow transition hover:shadow-md">
            <div
                class="flex h-12 w-12 items-center justify-center rounded-lg bg-gray-100 text-gray-700 transition group-hover:bg-blue-50 group-hover:text-blue-600">
                <i class="fa-solid fa-list text-xl"></i>
            </div>
            <div>
                <div class="font-semibold text-gray-800">Dropdowns</div>
                <div class="text-sm text-gray-500">Kelola data dropdown</div>
            </div>
        </a>
    </div>
</div>
