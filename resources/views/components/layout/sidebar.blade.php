{{-- Overlay Mobile --}}
<div @click="mobileOpen = false" class="fixed inset-0 z-30 bg-gray-900/40 backdrop-blur-sm lg:hidden" x-show="mobileOpen"
    x-transition:enter="transition-opacity ease-out duration-200" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-150"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
</div>

{{-- Sidebar --}}
<aside
    :class="{
        'translate-x-0': mobileOpen,
        '-translate-x-full': !mobileOpen,
        'lg:translate-x-0': true,
        'lg:w-64': sidebarOpen,
        'lg:w-16': !sidebarOpen
    }"
    class="fixed bottom-0 left-0 top-16 z-40 flex w-64 -translate-x-full flex-col overflow-hidden border-r border-gray-200 bg-white transition-all duration-300 lg:translate-x-0"
    id="sidebar" x-data="{
        activeMenu: {{ // Buka group yang submenunya sedang aktif
            $menus->search(
                fn($menu) => $menu->submenus->contains(
                    fn($sub) => request()->is(ltrim($sub->url, '/')) || request()->is(ltrim($sub->url, '/') . '/*'),
                ),
            ) !== false
                ? $menus->search(
                    fn($menu) => $menu->submenus->contains(
                        fn($sub) => request()->is(ltrim($sub->url, '/')) || request()->is(ltrim($sub->url, '/') . '/*'),
                    ),
                )
                : 0 }}
    }">

    <nav class="flex-1 space-y-0.5 overflow-y-auto overflow-x-hidden px-3 py-4">

        @forelse ($menus as $index => $menu)

            {{-- Group Header (Accordion Toggle) --}}
            <div class="pt-2">
                <button @click="activeMenu = activeMenu === {{ $index }} ? null : {{ $index }}"
                    class="flex w-full items-center gap-2 rounded-lg px-3 py-1.5 text-left transition-colors hover:bg-gray-50">

                    <p class="nav-label flex-1 text-xs font-semibold uppercase tracking-wider text-gray-400">
                        {{ $menu->name }}
                    </p>

                    {{-- Arrow Icon --}}
                    <span class="nav-label shrink-0 transition-transform duration-200"
                        :class="activeMenu === {{ $index }} ? 'rotate-180' : ''">
                        @svg('heroicon-o-chevron-down', 'h-3 w-3 text-gray-400')
                    </span>
                </button>
            </div>

            {{-- Submenu List (Accordion Content) --}}
            <div x-show="activeMenu === {{ $index }}" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1">

                @forelse ($menu->submenus as $submenu)
                    @php
                        $isActive =
                            request()->is(ltrim($submenu->url, '/')) || request()->is(ltrim($submenu->url, '/') . '/*');
                    @endphp

                    <a href="{{ $submenu->url }}" wire:navigate @class([
                        'flex items-center gap-3 rounded-lg px-3 py-2 text-sm transition-colors',
                        'bg-blue-50 text-blue-600 font-medium' => $isActive,
                        'text-gray-600 hover:bg-gray-100 hover:text-gray-900' => !$isActive,
                    ])>

                        {{-- Icon Heroicon --}}
                        @if ($submenu->icon)
                            <span @class([
                                'h-4 w-4 shrink-0',
                                'text-blue-500' => $isActive,
                                'text-gray-400' => !$isActive,
                            ])>
                                @svg('heroicon-o-' . $submenu->icon, 'h-4 w-4')
                            </span>
                        @else
                            <span @class([
                                'h-1.5 w-1.5 shrink-0 rounded-full',
                                'bg-blue-500' => $isActive,
                                'bg-gray-300' => !$isActive,
                            ])></span>
                        @endif

                        <span class="nav-label truncate">{{ $submenu->name }}</span>

                        {{-- Dot aktif --}}
                        @if ($isActive)
                            <span class="nav-label ml-auto h-1.5 w-1.5 shrink-0 rounded-full bg-blue-500"></span>
                        @endif
                    </a>

                @empty
                    <p class="nav-label px-3 py-1 text-xs italic text-gray-300">
                        Belum ada submenu
                    </p>
                @endforelse

            </div>

        @empty
            <div class="flex flex-col items-center justify-center py-10 text-center">
                @svg('heroicon-o-rectangle-stack', 'mb-2 h-8 w-8 text-gray-300')
                <p class="text-xs text-gray-400">Belum ada menu aktif.</p>
            </div>
        @endforelse

    </nav>

    {{-- Footer Sidebar --}}
    <div class="shrink-0 border-t border-gray-100 p-3">
        <div class="flex items-center gap-3 px-1">
            <img alt="" class="h-8 w-8 shrink-0 rounded-full"
                src="https://ui-avatars.com/api/?name=Admin&background=2563eb&color=fff&size=64">
            <div class="nav-label min-w-0">
                <p class="truncate text-sm font-semibold text-gray-800">Admin User</p>
                <p class="truncate text-xs text-gray-400">admin@latihanapp.com</p>
            </div>
        </div>
    </div>
</aside>

{{-- Rail Toggle (Desktop) --}}
<div :style="sidebarOpen ? 'left: calc(16rem - 1px)' : 'left: calc(4rem - 1px)'" id="sidebar-rail">
    <button :title="sidebarOpen ? 'Tutup Sidebar' : 'Buka Sidebar'" @click="sidebarOpen = !sidebarOpen"
        aria-label="Toggle Sidebar" id="rail-btn">
        <span x-show="sidebarOpen">@svg('heroicon-o-chevron-left', 'h-3 w-3')</span>
        <span x-show="!sidebarOpen">@svg('heroicon-o-chevron-right', 'h-3 w-3')</span>
    </button>
</div>
