@section('pagetitle', __('internships.internships'))
<x-app-layout>
    <div class="w-full h-full bg-kdg-white flex flex-col justify-center items-center pt-10 px-6">
        <div class="w-screen max-w-7xl flex flex-row items-center mb-6">
            <div class="h-20 w-[87.5rem] flex flex-row border-b-2 border-kdg-light items-center px-10">
                <div>
                    <h1 class="text-2xl font-KDG sm:text-3xl">
                        {{__('internships.internships')}}
                    </h1>
                </div>
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="ml-auto bg-light-blue  border-dark-blue border focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center " type="button">Filter <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                @if(request()->has('filter'))
                    <a class="text-sm text-gray-700 dark:text-gray-400 ml-2" href="{{route('home')}}">{{__('internships.filter')}}</a>
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
        <div class="w-full max-w-[87.5rem] flex flex-col items-center justify-center -bg-white dark:bg-gray-800 overflow-hidden mt-4 md:px-10">
            <div class="w-full p-6 text-gray-900 dark:text-gray-100 grid grid-cols-3 gap-2 justify-evenly">
                @foreach($companies as $company)
                        <div class="h-auto rounded border border-kdg-grey shadow-lg flex flex-col justify-center items-start px-5 py-10 dark:bg-gray-800">
                            <h3 class="mb-1 text-3xl font-bold tracking-tight text-kdg-dark-blue ">{{$company->company}} </h3>
                            <div class="mt-4 mb-4 text-p-black">
                                @foreach($company->tags as $tag)
                                    <span class="bg-{{$tag->color}}-100 text-{{$tag->color}}-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-{{$tag->color}}-900 dark:text-{{$tag->color}}-300">{{$tag->name}}</span>
                                @endforeach
                            </div>
                            <p class="font-bold"> {{__('internships.website')}}</p>
                            <p class="font-normal text-gray-700 dark:text-gray-400"><a href="{{$company->website}}" class="text-decoration-line: underline" target="__blank">{{$company->website}}</a></p>
                            <p class="font-bold"> {{__('internships.contact')}}</p>
                            <p class="font-normal text-gray-700 dark:text-gray-400">{{$company->contact}}</p>
                            <p class="font-bold"> {{__('internships.email')}}</p>
                            <p class="font-normal text-gray-700 dark:text-gray-400"><a href="mailto:{{$company->email}}" class="text-decoration-line: underline">{{$company->email}}</a></p>
                            <p class="font-bold"> {{__('internships.phone')}}</p>
                            <p class="font-normal text-gray-700 dark:text-gray-400">
                                @if($company->phone_number)
                                    <a href="tel:{{ $company->phone_number }}" class="text-decoration-line: underline">{{ $company->phone_number }}</a>
                                @else
                                    {{ '-' }}
                                @endif
                            </p>
                        </div>
                @endforeach
                <br>
                @if($companies->count() == 0)
                    <div class="h-auto rounded border border-kdg-grey shadow-lg px-5 py-5 text-center">
                        <h4 class="text-lg font-medium tracking-tight text-deep-black">{{__('internships.no-internships')}}</h4>
                    </div>
                @endif
                    <div class="col-span-3">
                        {{ $companies->links() }}
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
