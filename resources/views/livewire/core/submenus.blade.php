<div>
    {{-- Flash Message --}}
    @if (session()->has('message'))
        <div class="mb-4 rounded bg-green-100 p-3 text-green-800">
            {{ session('message') }}
        </div>
    @endif

    {{-- Header --}}
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-gray-800">Management Submenu</h1>
        <button class="rounded bg-blue-600 px-4 py-2 text-sm text-white hover:bg-blue-700" wire:click="openModal">
            + Tambah Submenu
        </button>
    </div>

    {{-- Tabel --}}
    <div class="overflow-x-auto rounded-lg border border-gray-200 bg-white shadow">
        <table class="w-full text-sm">
            <thead class="border-b border-gray-200 bg-gray-50">
                <tr>
                    <th class="p-4 text-left font-medium text-gray-600">#</th>
                    <th class="p-4 text-left font-medium text-gray-600">Menu</th>
                    <th class="p-4 text-left font-medium text-gray-600">Name</th>
                    <th class="p-4 text-left font-medium text-gray-600">Slug</th>
                    <th class="p-4 text-left font-medium text-gray-600">URL</th>
                    <th class="p-4 text-left font-medium text-gray-600">Icon</th>
                    <th class="p-4 text-left font-medium text-gray-600">Status</th>
                    <th class="p-4 text-left font-medium text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($submenus as $i => $submenu)
                    <tr class="transition hover:bg-gray-50">
                        <td class="p-4 text-gray-500">{{ $i + 1 }}</td>
                        <td class="p-4">
                            <span class="rounded bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700">
                                {{ $submenu->menu->name ?? '-' }}
                            </span>
                        </td>
                        <td class="p-4 font-medium text-gray-800">{{ $submenu->name }}</td>
                        <td class="p-4 font-mono text-xs text-gray-500">{{ $submenu->slug }}</td>
                        <td class="p-4 text-xs text-gray-500">{{ $submenu->url }}</td>
                        <td class="p-4 font-mono text-xs text-gray-500">{{ $submenu->icon ?? '-' }}</td>
                        <td class="p-4">
                            <span
                                class="{{ $submenu->active_status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-600' }} rounded-full px-2 py-1 text-xs font-medium">
                                {{ $submenu->active_status ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td class="p-4">
                            <div class="flex gap-2">
                                <button class="rounded bg-yellow-400 px-3 py-1 text-xs text-white hover:bg-yellow-500"
                                    wire:click="edit('{{ $submenu->slug }}')">
                                    Edit
                                </button>
                                <button class="rounded bg-red-500 px-3 py-1 text-xs text-white hover:bg-red-600"
                                    wire:click="delete('{{ $submenu->slug }}')"
                                    wire:confirm="Yakin ingin menghapus submenu '{{ $submenu->name }}'?">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="p-8 text-center text-gray-400" colspan="8">
                            <div class="flex flex-col items-center gap-2">
                                <svg class="h-10 w-10 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 6h16M4 12h16M4 18h7" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.5" />
                                </svg>
                                <span>Belum ada data submenu.</span>
                                <button class="text-sm text-blue-500 hover:underline" wire:click="openModal">
                                    Tambah submenu pertama
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Modal --}}
    @if ($isOpen)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
            <div class="mx-4 w-full max-w-md rounded-lg bg-white shadow-xl">

                {{-- Modal Header --}}
                <div class="flex items-center justify-between border-b px-6 py-4">
                    <h2 class="text-lg font-semibold text-gray-800">
                        {{ $submenuId ? 'Edit Submenu' : 'Tambah Submenu' }}
                    </h2>
                    <button class="text-gray-400 hover:text-gray-600" wire:click="closeModal">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                fill-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                {{-- Modal Body --}}
                <div class="space-y-4 px-6 py-4">

                    {{-- Menu --}}
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">Menu</label>
                        <select
                            class="w-full rounded border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                            wire:model="menuId">
                            <option value="">-- Pilih Menu --</option>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                        </select>
                        @error('menuId')
                            <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Name --}}
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">Name</label>
                        <input
                            class="w-full rounded border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="Nama submenu" type="text" wire:model.live="name">
                        @error('name')
                            <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Slug --}}
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">Slug</label>
                        <input
                            class="w-full rounded border border-gray-300 px-3 py-2 font-mono text-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="slug-submenu" type="text" wire:model="slug">
                        <p class="mt-1 text-xs text-gray-400">Otomatis terisi dari name, bisa diedit manual.</p>
                        @error('slug')
                            <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- URL --}}
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">URL</label>
                        <input
                            class="w-full rounded border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="/path/halaman" type="text" wire:model="url">
                        @error('url')
                            <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Icon --}}
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">Icon <span
                                class="text-gray-400">(opsional)</span></label>
                        <input
                            class="w-full rounded border border-gray-300 px-3 py-2 font-mono text-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="home, user, chart-bar ..." type="text" wire:model="icon">
                        <p class="mt-1 text-xs text-gray-400">Nama icon sesuai library yang dipakai.</p>
                        @error('icon')
                            <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Active Status --}}
                    <div class="flex items-center gap-3">
                        <input class="h-4 w-4 cursor-pointer accent-blue-600" id="activeStatus" type="checkbox"
                            wire:model="activeStatus">
                        <label class="cursor-pointer text-sm font-medium text-gray-700" for="activeStatus">
                            Submenu Aktif
                        </label>
                    </div>

                </div>

                {{-- Modal Footer --}}
                <div class="flex justify-end gap-2 rounded-b-lg border-t bg-gray-50 px-6 py-4">
                    <button class="rounded border border-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                        wire:click="closeModal">
                        Batal
                    </button>
                    <button class="rounded bg-blue-600 px-4 py-2 text-sm text-white hover:bg-blue-700"
                        wire:click="store">
                        {{ $submenuId ? 'Update' : 'Simpan' }}
                    </button>
                </div>

            </div>
        </div>
    @endif

</div>
