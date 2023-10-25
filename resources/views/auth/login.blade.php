<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <x-primary-button class="w-full">
        <a href="{{ route('oauth.login', [ 'provider' => 'microsoft' ]) }}" class="mx-auto">{{__('login.microsoft')}}</a>
    </x-primary-button>
    <x-primary-button class="w-full mt-4">
        <a href="{{ route('oauth.login', [ 'provider' => 'github' ]) }}" class="mx-auto">{{__('login.github')}}</a>
    </x-primary-button>
    <x-primary-button class="w-full mt-4">
        <a href="{{ route('oauth.login', [ 'provider' => 'google' ]) }}" class="mx-auto">{{__('login.google')}}</a>
    </x-primary-button>
</x-guest-layout>
