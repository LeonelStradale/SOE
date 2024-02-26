<x-guest-layout>
    <section class="h-screen bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-4 mx-auto md:h-screen">

            <a href="#" class="flex items-center mb-4 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg"
                    alt="logo">
                Flowbite
            </a>

            <div
                class="w-full bg-white rounded-lg shadow-2xl dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">

                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Sign in to your account
                    </h1>

                    <x-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <x-label for="student_id" value="{{ __('Student ID') }}" />
                            <x-input id="student_id" class="block mt-1 w-full" type="text" name="student_id"
                                :value="old('student_id')" required autofocus autocomplete="student-id"
                                placeholder="482100078" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                autocomplete="current-password" placeholder="••••••••" />
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <x-checkbox id="remember_me" name="remember" />
                                </div>
                                <div class="text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">
                                        <span
                                            class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                                    </label>
                                </div>
                            </div>

                            @if (Route::has('password.request'))
                                <a class="font-medium text-sm text-primary-600 hover:underline dark:text-primary-500"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                        </div>

                        <x-button class="w-full">
                            {{ __('Log in') }}
                        </x-button>

                        <p class="flex justify-center text-sm font-light text-gray-500 dark:text-gray-400">
                            Don't have an account yet?
                            <a href="{{ route('register') }}"
                                class="font-medium text-primary-600 hover:underline dark:text-primary-500 ml-2">
                                {{ __('Register') }}
                            </a>
                        </p>
                    </form>

                    <div
                        class="my-2 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300">
                        <p class="mx-4 mb-0 text-center font-semibold dark:text-white">
                            Or
                        </p>
                    </div>

                    <a href="{{ route('google-auth.redirect') }}"
                        class="w-full text-white bg-[#4285F4] hover:bg-[#4285F4]/90 focus:ring-4 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex justify-center items-center dark:focus:ring-[#4285F4]/55 me-2 mb-2">
                        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 18 19">
                            <path fill-rule="evenodd"
                                d="M8.842 18.083a8.8 8.8 0 0 1-8.65-8.948 8.841 8.841 0 0 1 8.8-8.652h.153a8.464 8.464 0 0 1 5.7 2.257l-2.193 2.038A5.27 5.27 0 0 0 9.09 3.4a5.882 5.882 0 0 0-.2 11.76h.124a5.091 5.091 0 0 0 5.248-4.057L14.3 11H9V8h8.34c.066.543.095 1.09.088 1.636-.086 5.053-3.463 8.449-8.4 8.449l-.186-.002Z"
                                clip-rule="evenodd" />
                        </svg>
                        Sign in with Google
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
