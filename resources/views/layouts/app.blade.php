<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ $title ?? config('app.name') }}
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="bg-gray-100 text-gray-900 antialiased">
    {{-- Navbar --}}
    <x-layout.navbar />

    {{-- Sidebar --}}
    <x-layout.sidebar />

    {{-- Main Content --}}
    <main class="p-4 sm:ml-64">
        <div class="mt-16 rounded-2xl">
            {{ $slot }}
        </div>
    </main>

    @livewireScripts
</body>

</html>
