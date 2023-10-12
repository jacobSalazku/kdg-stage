<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h5 class="text-xl font-semibold leading-none text-gray-800 dark:text-gray-200">Your Job Openings</h5>
                    @foreach($jobs as $job)
                        <a href="{{route('edit', ['id' => $job->id])}}" class="mt-4 block w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$job->title}} - {{$job->company}}</h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400">{{substr($job->description, 0, 305)}} ...</p>
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
                    <h5 class="text-xl font-semibold leading-none text-gray-800 dark:text-gray-200">Internships</h5>
                    <p class="mt-4 font-light text-xs text-gray-700 dark:text-gray-400">Want to offer internships? Toggle the option below! This will show your company in the internships list. Fill in the contact information for the internship</p>
                        <div class="mt-4 block w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{Auth::user()->company}}</h5>
                            <form method="POST" action="{{route('create_internship')}}">
                                @csrf
                                <div class="mt-4">
                                    <x-input-label for="published" :value="__('Offer internships:')" />
                                    <x-checkbox id="published" class="block mt-1 w-1/2" name="published" :checked="$internship->published == 1"/>
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="company" :value="__('Company')" />
                                    <x-text-input id="company" class="block mt-1 w-full" type="text" name="company" :value="$internship->company ?? Auth::user()->company" required autofocus autocomplete="company" />
                                    <x-input-error :messages="$errors->get('company')" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="$internship->email ?? Auth::user()->email" required autofocus autocomplete="Email" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="phone_number" :value="__('Phone Number')" />
                                    <x-text-input id="phone_number" class="block mt-1 w-full" type="text" :value="$internship->phone_number ?? old('phone_number')" name="phone_number" required autofocus autocomplete="Phone Number" />
                                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <x-input-label for="website" :value="__('Website URL')" />
                                    <x-text-input id="website" class="block mt-1 w-full" type="text" :value="$internship->website ?? old('website')" name="website" required autofocus autocomplete="website" />
                                    <x-input-error :messages="$errors->get('website')" class="mt-2" />
                                </div>
                                <div class="flex items-center justify-start mt-4">
                                    <x-primary-button>
                                        {{ __('Save') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
