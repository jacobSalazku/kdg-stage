<x-app-layout>
<div class=" w-screen max-w-full  bg-kdg-white flex flex-col justify-center pt-10">
            <div class="w-screen flex justify-center items-center   ">
                <div class="h-20 w-[87.5rem] flex flex-row justify-between border-b-2 border-kdg-light items-center px-10">
                    <div class="">
                        <h1 class=" text-2xl font-h1 sm:text-3xl">
                            Stage Bedrijven
                        </h1>
                    </div>

                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class=" bg-light-blue  border-dark-blue border focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center " type="button">Filter <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        @if(request()->has('filter'))
                            <a class="text-sm text-gray-700 dark:text-gray-400" href="{{route('home')}}">{{__('internships.filter')}}</a>
                        @endif
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
            </div>

            <div class=" h-full  ">
                <div class=" w-full flex flex-row justify-center gap ">
                    <div class=" w-full h-full max-w-[87.5rem] flex flex-col sm:flex-row flex-wrap justify-center gap-y-8 pt-8">
                        @foreach($companies as $company)
                            <div class="mt-4 block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 w-full">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$company->company}}</h5>
                                <p class="mt-4 text-sm text-gray-700 dark:text-gray-400">{{__('internships.email')}} <a href="mailto:{{$company->email}}">{{$company->email}}</a></p>
                                <p class="mt-4 text-sm text-gray-700 dark:text-gray-400">{{__('internships.phone')}} <a href="Tel:{{$company->phone_number}}">{{$company->phone_number}}</a></p>
                                <p class="mt-4 text-sm text-gray-700 dark:text-gray-400">{{__('internships.website')}} <a target="__blank" href="{{$company->website}}">{{$company->website}}</a></p>
                                <p class="mt-4 text-sm text-gray-700 dark:text-gray-400">{{__('internships.created')}} {{$company->created_at->format('d-m-y H:i')}}</p>
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
