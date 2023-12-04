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
                <form class="space-y-6">
                    <div class="w-full flex flex-col items-center justify-center gap-3">
                        <button
                            type="submit"
                            title="Google"
                            class="flex w-[18rem] justify-center  mt-2 rounded-md bg-deep-black  py-4 px-3  text-kdg-white text-lg font-semibold leading-6 text-white shadow-sm hover:bg-kdg-dark-blue"
                        >
                        <a href="{{ route('oauth.login', [ 'provider' => 'google' ]) }}" class="mx-auto">{{__('login.google')}}</a>
                        </button>
                        <button
                            type="submit"
                            title="GitHub"
                            class="flex w-[18rem] justify-center  mt-2 rounded-md bg-deep-black  py-4 px-3  text-kdg-white text-lg font-semibold leading-6 text-white shadow-sm hover:bg-kdg-dark-blue"
                        >
                        <a href="{{ route('oauth.login', [ 'provider' => 'github' ]) }}" class="mx-auto">{{__('login.github')}}</a>
                        </button>
                        <button
                            type="submit"
                            title="Microsoft"
                            class="flex w-[18rem] justify-center  mt-2 rounded-md bg-deep-black  py-4 px-3  text-kdg-white text-lg font-semibold leading-6 text-white shadow-sm hover:bg-kdg-dark-blue"
                        >
                        <a href="{{ route('oauth.login', [ 'provider' => 'microsoft' ]) }}" class="mx-auto">{{__('login.microsoft')}}</a>
                        </button>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>
