<section class="flex items-center justify-center px-4">
    <div class="w-full max-w-md mt-6">
        {{-- Card --}}
        <div class="rounded-2xl bg-white p-8 shadow-lg dark:bg-gray-800">
            {{-- Success message from register --}}
            @if (session('success'))
                <div
                    class="mb-4 rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-gray-800 dark:text-green-400 text-center">
                    {{ session('success') }}
                </div>
            @endif
            <h1 class="mb-6 text-xl font-semibold text-gray-900 dark:text-white text-center">Sign In</h1>

            <form novalidate wire:submit.prevent="login">

                {{-- Email --}}
                <div class="mb-4">
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300" for="email">
                        Email Address
                    </label>
                    <input
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                        id="email" placeholder="name@email.com" type="email" wire:model="email" />
                    @error('email')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-4">
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300" for="password">
                        Password
                    </label>
                    <input
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                        id="password" placeholder="••••••••" type="password" wire:model="password" />
                    @error('password')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Remember Me --}}
                <div class="mb-6 flex items-center justify-between">
                    <div class="flex items-center">
                        <input
                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                            id="remember" type="checkbox" wire:model="remember" />
                        <label class="ms-2 text-sm text-gray-600 dark:text-gray-300" for="remember">
                            Remember me
                        </label>
                    </div>
                    <a class="text-sm text-blue-600 hover:underline dark:text-blue-400" href="#">
                        Forgot password?
                    </a>
                </div>

                {{-- Submit Button --}}
                <button
                    class="flex w-full items-center justify-center gap-2 rounded-lg bg-blue-600 px-5 py-2.5 text-center text-sm font-medium text-white transition-colors duration-200 hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="submit">
                    <span wire:loading.remove>Sign In</span>
                    <span class="flex items-center gap-2" wire:loading>
                        <svg class="h-4 w-4 animate-spin text-white" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke-width="4"
                                stroke="currentColor" />
                            <path class="opacity-75" d="M4 12a8 8 0 018-8v8z" fill="currentColor" />
                        </svg>
                        Processing...
                    </span>
                </button>

                {{-- Register Link --}}
                <p class="mt-5 text-center text-sm text-gray-600 dark:text-gray-400">
                    Don't have an account?
                    <a class="font-medium text-blue-600 hover:underline dark:text-blue-400" href="/register">
                        Sign up here
                    </a>
                </p>

            </form>
        </div>
    </div>
</section>
