<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <h5 class="text-xl font-semibold leading-none text-gray-800 dark:text-gray-200">Internships</h5>
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Filter <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        @if(request()->has('filter'))
                            <a class="text-sm text-gray-700 dark:text-gray-400" href="{{route('home')}}">Clear filters</a>
                        @endif
                        <!-- Dropdown menu -->
                        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                @foreach($tags as $tag)
                                    <li>
                                        <a href="{{route('home', ['filter' => $tag->name])}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{$tag->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @foreach($companies as $company)
                        <div class="mt-4 block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 w-full">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$company->company}}</h5>
                            <p class="mt-4 text-sm text-gray-700 dark:text-gray-400">Email: <a href="mailto:{{$company->email}}">{{$company->email}}</a></p>
                            <p class="mt-4 text-sm text-gray-700 dark:text-gray-400">Phone: <a href="Tel:{{$company->phone_number}}">{{$company->phone_number}}</a></p>
                            <p class="mt-4 text-sm text-gray-700 dark:text-gray-400">Website: <a target="__blank" href="{{$company->website}}">{{$company->website}}</a></p>
                            <p class="mt-4 text-sm text-gray-700 dark:text-gray-400">Registered: {{$company->created_at->format('d-m-y H:i')}}</p>
                            <div class="mt-4">
                                @foreach($company->tags as $tag)
                                    <span class="bg-{{$tag->color}}-100 text-{{$tag->color}}-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-{{$tag->color}}-900 dark:text-{{$tag->color}}-300">{{$tag->name}}</span>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
