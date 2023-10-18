<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <x-primary-button class="w-full">
        <a href="{{ route('oauth.login', [ 'provider' => 'microsoft' ]) }}" class="mx-auto">Log in with Microsoft</a>
    </x-primary-button>
    <x-primary-button class="w-full mt-4">
        <a href="{{ route('oauth.login', [ 'provider' => 'github' ]) }}" class="mx-auto">Log in with GitHub</a>
    </x-primary-button>
    <x-primary-button class="w-full mt-4">
        <a href="{{ route('oauth.login', [ 'provider' => 'google' ]) }}" class="mx-auto">Log in with Google</a>
    </x-primary-button>
</x-guest-layout>
