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
                    @foreach($jobs as $job)
                        <h5 class="text-xl font-semibold leading-none text-gray-800 dark:text-gray-200">{{$job->title}}</h5>
                        <h4 class="text-l font-semibold leading-none text-gray-800 dark:text-gray-200">{{$job->user->company}}</h4>
                        <p class="text-sm mt-4 font-normal leading-none text-gray-800 dark:text-gray-200">{{$job->description}}</p>
                        <p class="text-sm mt-4 font-normal leading-none text-gray-800 dark:text-gray-200">Posted: {{$job->updated_at->format('d-m-Y h:i')}}</p>
                        <p class="text-sm mt-4 font-normal leading-none text-gray-800 dark:text-gray-200 text-decoration-line: underline" ><a target="__blank" href="{{$job->website}}">{{$job->website}}</a></p>
                        <p class="text-sm mt-4 font-normal leading-none text-gray-800 dark:text-gray-200">Contact: {{$job->user->first_name}} {{$job->user->last_name}}</p>
                        <p class="text-sm mt-4 font-normal leading-none text-gray-800 dark:text-gray-200 text-decoration-line: underline" ><a href="mailto:{{$job->user->email}}">{{$job->user->email}}</a></p>
                        <p class="text-sm mt-4 font-normal leading-none text-gray-800 dark:text-gray-200 text-decoration-line: underline" ><a href="Tel:">{{$job->user->phone_number}}</a></p>
                    @endforeach
                    <p class="text-l font-semibold mt-4"><a href="{{route('home')}}">Return to overview</a></p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
