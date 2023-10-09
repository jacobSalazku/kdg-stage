<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach($internships as $internship)
                        <h5 class="text-xl font-semibold leading-none text-gray-800 dark:text-gray-200">{{$internship->title}}</h5>
                        <h4 class="text-l font-semibold leading-none text-gray-800 dark:text-gray-200">{{$internship->user->company}}</h4>
                        <p class="text-sm mt-4 font-normal leading-none text-gray-800 dark:text-gray-200">{{$internship->description}}</p>
                        <p class="text-sm mt-4 font-normal leading-none text-gray-800 dark:text-gray-200">Posted: {{$internship->updated_at->format('d-m-Y h:i')}}</p>
                        <p class="text-sm mt-4 font-normal leading-none text-gray-800 dark:text-gray-200 text-decoration-line: underline" ><a target="__blank" href="{{$internship->website}}">{{$internship->website}}</a></p>
                        <p class="text-sm mt-4 font-normal leading-none text-gray-800 dark:text-gray-200">Contact: {{$internship->user->first_name}} {{$internship->user->last_name}}</p>
                        <p class="text-sm mt-4 font-normal leading-none text-gray-800 dark:text-gray-200 text-decoration-line: underline" ><a href="mailto::{{$internship->user->email}}">{{$internship->user->email}}</a></p>
                        <p class="text-sm mt-4 font-normal leading-none text-gray-800 dark:text-gray-200 text-decoration-line: underline" ><a href="Tel:">{{$internship->user->phone_number}}</a></p>
                    @endforeach
                    <p class="text-l font-semibold mt-4"><a href="{{route('home')}}">Return to overview</a></p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
