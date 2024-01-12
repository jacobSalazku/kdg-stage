@section('pagetitle', __('internships.internships'))
<x-app-layout>
    <div class="flex flex-col items-center justify-center w-full h-full px-6 pt-10 bg-kdg-white">
        <div class="flex flex-row items-center w-screen mb-6 max-w-7xl">
            <div class="h-20 w-[87.5rem] flex flex-row border-b-2 border-kdg-light items-center px-10">
                <div>
                    <h1 class="text-2xl font-KDG sm:text-3xl">
                        {{__('internships.internships')}}
                    </h1>
                </div>
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="ml-auto bg-light-blue border-dark-blue border focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">Filter <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
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
            <div class="flex justify-between w-full col-span-3 px-6">
                @if ($filtered === 1)
                    <h5 class="text-xl font-semibold leading-none text-gray-800 dark:text-gray-200">
                        {{count($companies)}}
                        @if(count($companies) === 1)
                            {{__('internships.result', ['filter' => $filter])}}
                        @else
                            {{__('internships.results', ['filter' => $filter])}}
                        @endif
                    </h5>
                    <a class="hover:underline" href="{{route('home')}}">{{__('internships.back')}}</a>
                @endif
            </div>
            <div class="w-full grid-cols-3 gap-2 p-6 text-gray-900 dark:text-gray-100 md:grid justify-evenly">
                @foreach($companies as $company)
                        <div class="flex flex-col items-start justify-center h-auto px-5 py-10 mb-2 border rounded shadow-lg border-kdg-grey dark:bg-gray-800">
                            <h3 class="mb-1 text-3xl font-bold tracking-tight text-kdg-dark-blue ">{{$company->company}} </h3>
                            <div class="mt-4 mb-4 text-p-black">
                                @foreach($company->tags as $tag)
                                    <span class="bg-{{$tag->color}}-100 text-{{$tag->color}}-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-{{$tag->color}}-900 dark:text-{{$tag->color}}-300">{{$tag->name}}</span>
                                @endforeach
                            </div>
                            <p class="font-bold"> {{__('internships.website')}}</p>
                            <p class="font-normal text-gray-700 dark:text-gray-400"><a href="{{$company->website}}" class="underline text-decoration-line:" target="__blank">{{$company->website}}</a></p>
                            <p class="font-bold"> {{__('internships.contact')}}</p>
                            <p class="font-normal text-gray-700 dark:text-gray-400">{{$company->contact}}</p>
                            <p class="font-bold"> {{__('internships.email')}}</p>
                            <p class="font-normal text-gray-700 dark:text-gray-400"><a href="mailto:{{$company->email}}" class="underline text-decoration-line:">{{$company->email}}</a></p>
                            <p class="font-bold"> {{__('internships.phone')}}</p>
                            <p class="font-normal text-gray-700 dark:text-gray-400">
                                @if($company->phone_number)
                                    <a href="tel:{{ $company->phone_number }}" class="underline text-decoration-line:">{{ $company->phone_number }}</a>
                                @else
                                    {{ '-' }}
                                @endif
                            </p>
                        </div>
                @endforeach
                <br>
                @if($companies->count() === 0 && !request()->has('filter'))
                    <div class="h-auto px-5 py-5 text-center border rounded shadow-lg border-kdg-grey">
                        <h4 class="text-lg font-medium tracking-tight text-deep-black">{{__('internships.no-internships')}}</h4>
                    </div>
                @endif
                @if($filtered !==  1)
                   <div class="col-span-3">
                      {{ $companies->links() }}
                   </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
