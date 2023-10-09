<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Overview') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex-shrink-0 flex items-center">
                <form action="{{route('search')}}" method="get">
                    <div class="relative flex items-center">
                        <form action="{{route('search')}}" method="get">
                            <input type="text" name="query" id="query" placeholder="Find Internships" class="block w-64 py-2 pl-10 pr-4 leading-5 rounded-full bg-gray-100 dark:bg-gray-700 border-transparent focus:outline-none focus:bg-white focus:border-gray-300 dark:focus:border-gray-500 focus:ring focus:ring-gray-200 dark:focus:ring-gray-400 transition duration-150 ease-in-out">
                            <button type="submit" class="ml-2 px-3 py-2 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:bg-gray-200 dark:focus:bg-gray-600 transition duration-150 ease-in-out">
                                Search
                            </button>
                            @if($filtered === 1)
                                <button class="ml-2 px-3 py-2 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:bg-gray-200 dark:focus:bg-gray-600 transition duration-150 ease-in-out">
                                    <a href="{{route('home')}}">Go back</a>
                                </button>
                            @endif
                    </div>
                </form>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($filtered === 1)
                        <h5 class="text-xl font-semibold leading-none text-gray-800 dark:text-gray-200">Results: {{count($internships)}}</h5>
                    @else
                        <h5 class="text-xl font-semibold leading-none text-gray-800 dark:text-gray-200">Internships</h5>
                    @endif
                    @foreach($internships as $internship)
                        <a href="{{route('detail', ['id' => $internship->id])}}" class="mt-4 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$internship->title}} - {{$internship->user->company}}</h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400">{{substr($internship->description, 0, 305)}} ...</p>
                            <p class="mt-4 text-sm text-gray-700 dark:text-gray-400">Posted: {{$internship->updated_at->format('d-m-y h:i')}}</p>
                        </a>
                    @endforeach
                    <br>
                    {{$internships->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
