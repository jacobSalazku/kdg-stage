@section('pagetitle', __('form.edit'))
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form id="edit" method="POST" action="{{ route('edit', ['id' => $job->id]) }}">
                        @csrf

                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('form.title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$job->title" autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('form.description')" />
                            <div id="editor" style="height: 300px" data-initial-content="{{ isset($job) ? old('description', $job->description) : old('description') }}">{!! $job->description !!}</div>
                            <input type="hidden" name="description" id="hidden_description" value="{{ $job->description }}">
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Company -->
                        <div class="mt-4">
                            <x-input-label for="company" :value="__('form.company')" />
                            <x-text-input id="company" class="block mt-1 w-full" type="text" name="company" :value="$job->company" autofocus autocomplete="company" />
                            <x-input-error :messages="$errors->get('company')" class="mt-2" />
                        </div>

                        <!-- Website -->
                        <div class="mt-4">
                            <x-input-label for="website" :value="__('form.website')" />
                            <x-text-input id="website" class="block mt-1 w-full" type="text" name="website" :value="$job->website" autofocus autocomplete="website" />
                            <x-input-error :messages="$errors->get('website')" class="mt-2" />
                        </div>

                        <!-- Contact -->
                        <div class="mt-4">
                            <x-input-label for="contact" :value="__('form.contact')" />
                            <x-text-input id="contact" class="block mt-1 w-full" type="text" name="contact" :value="$job->contact" autofocus autocomplete="contact" />
                            <x-input-error :messages="$errors->get('contact')" class="mt-2" />
                        </div>

                        <!-- Phone Number -->
                        <div class="mt-4">
                            <x-input-label for="phone_number" :value="__('form.phone')" />
                            <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="$job->phone_number" autofocus autocomplete="phone_number" />
                            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('form.email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="$job->email" autofocus autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="cf-turnstile" data-sitekey="0x4AAAAAAANdPkNFFtvDOaVA"></div>

                    </form>
                    <div class="flex items-center justify-end mt-4">
                        <button form="edit" class="flex w-auto justify-center  mt-2 rounded-md bg-deep-black px-4   py-1.5  text-sm font-semibold leading-6 text-white shadow-sm hover:bg-kdg-dark-blue focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            {{ __('form.update') }}
                        </button>
                        <form method="POST" action="{{ route('delete', ['id' => $job->id]) }}">
                            @csrf
                            <div class="cf-turnstile" data-sitekey="0x4AAAAAAANdPkNFFtvDOaVA"></div>
                            <button class="flex w-auto justify-center  mt-2 rounded-md bg-red-600 px-4  ml-2 py-1.5  text-sm font-semibold leading-6 text-white shadow-sm hover:bg-kdg-dark-blue focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                {{ __('form.delete') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
