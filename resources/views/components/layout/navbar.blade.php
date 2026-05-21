<nav class="fixed inset-x-0 top-0 z-50 flex h-16 items-center gap-2 border-b border-gray-200 bg-white px-3">

    {{-- Toggle Mobile: hamburger --}}
    <button @click="mobileOpen = !mobileOpen"
        class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-gray-500 transition-colors hover:bg-gray-100 hover:text-blue-600 lg:hidden">
        <svg class="h-5 w-5" fill="none" stroke-width="2.5" stroke="currentColor" viewBox="0 0 24 24" x-show="!mobileOpen">
            <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <svg class="h-5 w-5" fill="none" stroke-width="2.5" stroke="currentColor" viewBox="0 0 24 24"
            x-show="mobileOpen">
            <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>

    {{-- Logo --}}
    <a class="ml-1 flex items-center gap-2" href="/">
        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-600">
            <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
        </div>
        <span class="text-base font-bold text-gray-900">Latihan<span class="text-blue-600">App</span></span>
    </a>

    <div class="flex-1"></div>

    {{-- Notifikasi --}}
    <button
        class="relative flex h-9 w-9 items-center justify-center rounded-lg text-gray-500 transition-colors hover:bg-gray-100">
        <svg class="h-5 w-5" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
            <path
                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <span class="absolute right-1.5 top-1.5 h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
    </button>

    {{-- User Dropdown --}}
    <div class="relative" x-data="{ open: false }">
        <button @click="open = !open"
            class="flex items-center gap-2 rounded-lg px-2 py-1.5 transition-colors hover:bg-gray-100">
            <img alt="Avatar" class="h-7 w-7 rounded-full"
                src="https://ui-avatars.com/api/?name=Admin&background=2563eb&color=fff&size=64">
            <span class="hidden text-sm font-medium text-gray-700 sm:block">Admin</span>
            <svg :class="open && 'rotate-180'" class="h-4 w-4 text-gray-400" fill="none" stroke-width="2"
                stroke="currentColor" style="transition:transform .2s" viewBox="0 0 24 24">
                <path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>

        <div @click.outside="open = false"
            class="absolute right-0 z-50 mt-2 w-48 origin-top-right rounded-xl border border-gray-100 bg-white shadow-lg"
            x-show="open" x-transition:enter-end="opacity-100 scale-100" x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter="transition ease-out duration-150" x-transition:leave-end="opacity-0 scale-95"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100">
            <div class="border-b border-gray-100 px-4 py-3">
                <p class="text-sm font-semibold text-gray-800">Admin User</p>
                <p class="truncate text-xs text-gray-400">admin@latihanapp.com</p>
            </div>
            <ul class="py-1.5">
                <li>
                    <a class="flex items-center gap-2 px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600"
                        href="#">
                        <svg class="h-4 w-4" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Profile
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-2 px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600"
                        href="#">
                        <svg class="h-4 w-4" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Pengaturan
                    </a>
                </li>
                <li class="mt-1 border-t border-gray-100">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="flex w-full items-center gap-2 px-4 py-2 text-sm text-red-500 hover:bg-red-50">
                            <svg class="h-4 w-4" fill="none" stroke-width="2" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Keluar
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

</nav>
