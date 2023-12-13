@section('pagetitle', __('password.forgot'))
<x-app-layout>
    <div class="flex h-full  flex-col justify-start items-center px-6 py-10 sm:px-8 bg-white">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img src="{{ asset('/img/KdG_H_Closed_Black_sRGB.png') }}" alt="KDG logo" width ="300px" height ="400px" class="mx-auto"/>

            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                {{__('password.forgot')}}
            </h2>
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('password.forgot_text') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center mt-4">
                    <x-primary-button class="text-kdg-white bg-deep-black">
                        {{ __('password.email_button') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
