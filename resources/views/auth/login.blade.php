@section('pagetitle', __('login.title'))
<x-app-layout>
    <div class="flex h-full  flex-col justify-start items-center px-6 py-10 sm:px-8 bg-white">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img src="{{ asset('/img/KdG_H_Closed_Black_sRGB.png') }}" alt="KDG logo" width ="300px" height ="400px" class="mx-auto"/>

                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                    {{__('login.login')}}
                </h2>
            </div>
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form method="POST" class="mb-6" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('login.email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('login.password')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                      type="password"
                                      name="password"
                                      autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('login.remember') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                {{ __('login.forgot') }}
                            </a>
                        @endif

                        <x-primary-button class="text-kdg-white bg-deep-black">
                            {{ __('login.login_button') }}
                        </x-primary-button>
                    </div>
                </form>
                <form class="space-y-6">
                    <div class="w-full flex flex-col items-center justify-center gap-3">
                        <button
                            type="submit"
                            title="Google"
                            class="flex w-full justify-center  mt-2 rounded-md bg-deep-black  py-4 px-3  text-kdg-white text-lg font-semibold leading-6 text-white shadow-sm hover:bg-kdg-dark-blue"
                        >
                        <a href="{{ route('oauth.login', [ 'provider' => 'google' ]) }}" class="mx-auto">{{__('login.google')}}</a>
                        </button>
                        <button
                            type="submit"
                            title="GitHub"
                            class="flex w-full justify-center  mt-2 rounded-md bg-deep-black  py-4 px-3  text-kdg-white text-lg font-semibold leading-6 text-white shadow-sm hover:bg-kdg-dark-blue"
                        >
                        <a href="{{ route('oauth.login', [ 'provider' => 'github' ]) }}" class="mx-auto">{{__('login.github')}}</a>
                        </button>
                        <button
                            type="submit"
                            title="Microsoft"
                            class="flex w-full justify-center  mt-2 rounded-md bg-deep-black  py-4 px-3  text-kdg-white text-lg font-semibold leading-6 text-white shadow-sm hover:bg-kdg-dark-blue"
                        >
                        <a href="{{ route('oauth.login', [ 'provider' => 'microsoft' ]) }}" class="mx-auto">{{__('login.microsoft')}}</a>
                        </button>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>
