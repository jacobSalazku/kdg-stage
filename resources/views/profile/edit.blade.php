@section('pagetitle', __('form.profile'))
<x-app-layout>
    <div class="w-full h-full bg-kdg-white flex flex-col justify-center items-center pt-10 px-6">
        <div class="w-screen max-w-7xl flex flex-row items-center mb-6">
            <div class="h-20 w-[87.5rem] flex flex-row border-b-2 border-kdg-light items-center px-10">
                <div>
                    <h1 class="text-2xl font-KDG sm:text-3xl">
                        {{__('form.profile')}}
                    </h1>
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
