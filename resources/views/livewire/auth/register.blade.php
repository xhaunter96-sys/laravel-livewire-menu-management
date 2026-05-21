<section class="flex items-center justify-center px-4">
    <div class="w-full max-w-md">

        {{-- Card --}}
        <div class="rounded-2xl bg-white p-8 shadow-lg dark:bg-gray-800">
            <h1 class="mb-6 text-center text-xl font-semibold text-gray-900 dark:text-white">Create Account</h1>

            <form novalidate wire:submit.prevent="register">

                {{-- Full Name --}}
                <div class="mb-4">
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300" for="name">
                        Full Name
                    </label>
                    <input
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                        id="name" placeholder="John Doe" type="text" wire:model="name" />
                    @error('name')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

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
                        id="password" placeholder="Min. 8 characters" type="password" wire:model="password" />
                    @error('password')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="mb-6">
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"
                        for="password_confirmation">
                        Confirm Password
                    </label>
                    <input
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                        id="password_confirmation" placeholder="Repeat your password" type="password"
                        wire:model="password_confirmation" />
                    @error('password_confirmation')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <button
                    class="flex w-full items-center justify-center gap-2 rounded-lg bg-blue-600 px-5 py-2.5 text-center text-sm font-medium text-white transition-colors duration-200 hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="submit">
                    <span wire:loading.remove>Create Account</span>
                    <span class="flex items-center gap-2" wire:loading>
                        <svg class="h-4 w-4 animate-spin text-white" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke-width="4"
                                stroke="currentColor" />
                            <path class="opacity-75" d="M4 12a8 8 0 018-8v8z" fill="currentColor" />
                        </svg>
                        Processing...
                    </span>
                </button>

                {{-- Login Link --}}
                <p class="mt-5 text-center text-sm text-gray-600 dark:text-gray-400">
                    Already have an account?
                    <a class="font-medium text-blue-600 hover:underline dark:text-blue-400" href="{{ route('login') }}">
                        Sign in here
                    </a>
                </p>

            </form>
        </div>
    </div>
</section>
