<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form id="edit" method="POST" action="{{ route('edit', ['id' => $job->id]) }}">
                        @csrf

                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$job->title" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <div id="editor" style="height: 300px;">{!! $job->description !!}</div>
                            <input type="hidden" name="description" id="hidden_description" value="{{ $job->description }}">
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Company -->
                        <div class="mt-4">
                            <x-input-label for="company" :value="__('Company')" />
                            <x-text-input id="company" class="block mt-1 w-full" type="text" name="company" :value="$job->company" required autofocus autocomplete="company" />
                            <x-input-error :messages="$errors->get('company')" class="mt-2" />
                        </div>

                        <!-- Website -->
                        <div class="mt-4">
                            <x-input-label for="website" :value="__('Website URL')" />
                            <x-text-input id="website" class="block mt-1 w-full" type="text" name="website" :value="$job->website" required autofocus autocomplete="website" />
                            <x-input-error :messages="$errors->get('website')" class="mt-2" />
                        </div>

                        <!-- Phone Number -->
                        <div class="mt-4">
                            <x-input-label for="phone_number" :value="__('Phone Number')" />
                            <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="$job->phone_number" required autofocus autocomplete="phone_number" />
                            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="$job->email" required autofocus autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <input type="hidden" value="{{$job->id}}">
                    </form>
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button form="edit" class="ml-3">
                            {{ __('Update') }}
                        </x-primary-button>
                        <form method="POST" action="{{ route('delete', ['id' => $job->id]) }}">
                            @csrf
                            <x-danger-button class="ml-4">
                                {{ __('Delete') }}
                            </x-danger-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
