<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-4 font-light text-xs text-red-700 dark:text-red-400">{{__('form.warning_job')}}</p>
                    <form method="POST" action="{{ route('new') }}">
                        @csrf

                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('form.title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('form.description')" />
                            <div id="editor" style="height: 300px" data-initial-content="{{ isset($job) ? old('description', $job->description) : old('description') }}"></div>
                            <input type="hidden" name="description" id="hidden_description" value="{{ old('description') }}">
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Company -->
                        <div class="mt-4">
                            <x-input-label for="company" :value="__('form.company')" />
                            <x-text-input id="company" class="block mt-1 w-full" type="text" name="company" :value="Auth::user()->company" required autofocus autocomplete="company" />
                            <x-input-error :messages="$errors->get('company')" class="mt-2" />
                        </div>

                        <!-- Website -->
                        <div class="mt-4">
                            <x-input-label for="website" :value="__('form.website')" />
                            <x-text-input id="website" class="block mt-1 w-full" type="text" name="website" :value="old('website')" required autofocus autocomplete="website" />
                            <x-input-error :messages="$errors->get('website')" class="mt-2" />
                        </div>

                        <!-- Phone Number -->
                        <div class="mt-4">
                            <x-input-label for="phone_number" :value="__('form.phone')" />
                            <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" required autofocus autocomplete="phone_number" />
                            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('form.email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autofocus autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-3">
                                {{ __('form.create') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
