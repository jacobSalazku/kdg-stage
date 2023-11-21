<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(Session::has('message'))
                        <div id="alert-3"
                             class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                             role="alert">
                            <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg"
                                 fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium mr-2">
                                {{Session::get('message')}}
                            </div>
                            <button type="button"
                                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                                    data-dismiss-target="#alert-3" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                    @endif
                    <h5 class="text-xl font-semibold leading-none text-gray-800 dark:text-gray-200">{{__('dashboard.jobs')}}</h5>
                    @foreach($jobs as $job)
                        <a href="{{route('edit', ['id' => $job->id])}}"
                           class="mt-4 block w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$job->title}}
                                - {{$job->company}}</h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400">{{ substr(strip_tags($job->description), 0, 305) }}
                                ...</p>
                            <p class="mt-4 font-light text-xs text-gray-700 dark:text-gray-400">{{$job->website}}</p>
                            <p class="font-light text-xs text-gray-700 dark:text-gray-400">{{$job->email}}</p>
                            <p class="font-light text-xs text-gray-700 dark:text-gray-400">{{$job->phone_number}}</p>
                            <p class="font-light text-xs text-gray-700 dark:text-gray-400">{{$job->updated_at->format('d-m-Y H:i')}}</p>
                        </a>
                    @endforeach
                    <br>
                    {{$jobs->links()}}
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h5 class="text-xl font-semibold leading-none text-gray-800 dark:text-gray-200">{{__('dashboard.internships')}}</h5>
                    <p class="mt-4 font-light text-xs text-gray-700 dark:text-gray-400">{{__('dashboard.info')}}.</p>
                    <p class="mt-4 font-light text-xs text-red-700 dark:text-red-400">{{__('form.warning_internship')}}</p>
                    <div
                        class="mt-4 block w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{Auth::user()->company}}</h5>
                        <form method="POST" action="{{route('create_internship')}}">
                            @csrf
                            <div class="mt-4">
                                <div class="flex items center">
                                    <x-checkbox id="offer" name="offer" :checked="($internship->offer ?? 0) == 1"/>
                                    <x-input-label for="offer" class="ml-1" :value="__('form.offer')"/>
                                    <x-input-error :messages="$errors->get('offer')" class="mt-2"/>
                                </div>
                            </div>
                            <div class="mt-4">
                                <x-input-label for="company" :value="__('form.company')"/>
                                <x-text-input id="company" class="block mt-1 w-full" type="text" name="company"
                                              :value="$internship->company ?? Auth::user()->company" autofocus
                                              autocomplete="company"/>
                                <x-input-error :messages="$errors->get('company')" class="mt-2"/>
                            </div>
                            <div class="mt-4">
                                <x-input-label for="contact" :value="__('form.contact')"/>
                                <x-text-input id="contact" class="block mt-1 w-full" type="text" name="contact"
                                              :value="$internship->contact ?? Auth::user()->name" autofocus
                                              autocomplete="contact"/>
                                <x-input-error :messages="$errors->get('contact')" class="mt-2"/>
                            </div>
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('form.email')"/>
                                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email"
                                              :value="$internship->email ?? Auth::user()->email" autofocus
                                              autocomplete="Email"/>
                                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                            </div>
                            <div class="mt-4">
                                <x-input-label for="phone_number" :value="__('form.phone')"/>
                                <x-text-input id="phone_number" class="block mt-1 w-full" type="text"
                                              :value="$internship->phone_number ?? old('phone_number')"
                                              name="phone_number" autofocus autocomplete="Phone Number"/>
                                <x-input-error :messages="$errors->get('phone_number')" class="mt-2"/>
                            </div>
                            <div class="mt-4">
                                <x-input-label for="website" :value="__('form.website')"/>
                                <x-text-input id="website" class="block mt-1 w-full" type="text"
                                              :value="old('website', optional($internship)->website ? $internship->website : 'https://')"
                                              name="website" autofocus autocomplete="website"/>
                                <x-input-error :messages="$errors->get('website')" class="mt-2"/>
                            </div>
                            <div class="mt-4">
                                <x-input-label :value="__('form.skills')"/>
                                @foreach($tags as $tag)
                                    <div class="flex items-center">
                                        <x-checkbox id="{{$tag->name}}" name="skills[]" value="{{$tag->name}}"
                                                    :checked="$internship ? $internship->tags->contains('name', $tag->name) : false"/>
                                        <x-input-label class="ml-1" for="{{$tag->name}}">{{$tag->name}}</x-input-label>
                                    </div>
                                @endforeach
                                <x-input-error :messages="$errors->get('skills')" class="mt-2"/>
                            </div>
                            <div class="flex items-center justify-start mt-4">
                                <button
                                    class="flex w-auto justify-center  mt-2 rounded-md bg-deep-black px-4   py-1.5  text-sm font-semibold leading-6 text-white shadow-sm hover:bg-kdg-dark-blue focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    {{ __('form.save') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
