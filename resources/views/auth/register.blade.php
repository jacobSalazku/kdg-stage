@section('pagetitle', __('register.title'))
<x-app-layout>
    <div class="flex h-full  flex-col justify-start items-center px-6 py-10 sm:px-8 bg-white">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img src="{{ asset('/img/KdG_H_Closed_Black_sRGB.png') }}" alt="KDG logo" width ="300px" height ="400px" class="mx-auto"/>

            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                {{__('register.register')}}
            </h2>
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('register.name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('register.email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Company -->
                <div class="mt-4">
                    <x-input-label for="company" :value="__('register.company')" />
                    <x-text-input id="company" class="block mt-1 w-full" type="text" name="company" :value="old('company')" required autofocus autocomplete="company" />
                    <x-input-error :messages="$errors->get('company')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('register.password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                  type="password"
                                  name="password"
                                  required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('register.confirm')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                  type="password"
                                  name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between mt-4">
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                        {{ __('register.already') }}
                    </a>

                    <x-primary-button class="bg-deep-black text-kdg-white">
                        {{ __('register.register_button') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
