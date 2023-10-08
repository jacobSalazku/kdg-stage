<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Overview') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h5 class="text-xl font-semibold leading-none text-gray-800 dark:text-gray-200">Your Internships</h5>
                    @foreach($internships as $internship)
                        <a href="#" class="mt-4 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$internship->title}} - {{$internship->user->company}}</h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400">{{$internship->description}}</p>
                        </a>
                    @endforeach
                    <br>
                    {{$internships->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
