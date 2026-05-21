<div class="min-h-screen bg-gray-100">
    {{-- Navbar --}}
    <header class="bg-white shadow-sm">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
            <div>
                <h1 class="text-xl font-bold text-gray-800">
                    Admin Dashboard
                </h1>

                <p class="text-sm text-gray-500">
                    Welcome back, {{ auth()->user()?->name }}
                </p>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                    class="rounded-lg bg-red-500 px-4 py-2 text-sm font-medium text-white transition hover:bg-red-600">
                    Logout
                </button>
            </form>
        </div>
    </header>

    {{-- Content --}}
    <main class="mx-auto max-w-7xl px-6 py-8">
        <div class="grid gap-6 md:grid-cols-3">
            {{-- Card 1 --}}
            <div class="rounded-2xl bg-white p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-gray-800">
                    Total Users
                </h2>

                <p class="mt-4 text-3xl font-bold text-indigo-600">
                    0
                </p>
            </div>

            {{-- Card 2 --}}
            <div class="rounded-2xl bg-white p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-gray-800">
                    Active Sessions
                </h2>

                <p class="mt-4 text-3xl font-bold text-green-600">
                    0
                </p>
            </div>

            {{-- Card 3 --}}
            <div class="rounded-2xl bg-white p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-gray-800">
                    System Status
                </h2>

                <p class="mt-4 text-lg font-semibold text-green-500">
                    Online
                </p>
            </div>
        </div>

        {{-- Welcome Section --}}
        <div class="mt-8 rounded-2xl bg-white p-8 shadow-sm">
            <h2 class="text-2xl font-bold text-gray-800">
                Welcome to the Admin Panel
            </h2>

            <p class="mt-3 text-gray-600">
                You are successfully logged into the application dashboard.
            </p>
        </div>
    </main>
</div>
