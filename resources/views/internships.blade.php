<x-app-layout>
    <div class=" w-full  h-full bg-kdg-white flex flex-col justify-center items-center pt-10 px-6">
        <div class="w-screen max-w-7xl flex flex-row items-center   ">
            <div class="h-20 w-[87.5rem] flex flex-row justify-between border-b-2 border-kdg-light items-center px-10">
                <div class="">
                    <h1 class=" text-2xl font-KDG sm:text-3xl">
                    {{__('internships.internships')}}
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
                <div class=" w-full h-full max-w-[87.5rem] flex flex-col  items-center sm:flex-row flex-wrap sm:justify-center gap-y-8 pt-20">
                    @foreach($companies as $company)
                        <div class="relative flex flex-col text-gray-700 bg-white shadow-md w-80 rounded-xl border mr-4">
                            <div class="relative  bg-white border-2 border-kdg-dark-blue flex flex-col justify-center   items-center h-32 mx-4 -mt-6 overflow-hidden  shadow-lg rounded-xl  shadow-blue-gray-500/40">
                                <p class="text-bold text-2xl text-p-black">
                                    {{$company->company}}
                                </p>
                            </div>
                            <div class="p-6">
                                <div class="mt-4 mb-1 text-p-black">
                                    @foreach($company->tags as $tag)
                                        <span class="bg-{{$tag->color}}-100 text-{{$tag->color}}-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-{{$tag->color}}-900 dark:text-{{$tag->color}}-300">{{$tag->name}}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class=" px-6 pb-4">
                                <div>
                                    <p class="font-bold"> {{__('internships.website')}}</p>
                                    <p><a href="{{$company->website}}" target="__blank">{{$company->website}}</a></p>
                                </div>
                                <div>
                                    <p class="font-bold">{{__('internships.contact')}}</p>
                                    <p>{{$company->contact}}</p>
                                </div>
                                <div>
                                    <p class="font-bold"> {{__('internships.email')}}</p>
                                    <p><a href="mailto:{{$company->email}}">{{$company->email}}</a></p></div>
                                <div>
                                    <p class="font-bold">{{__('internships.phone')}}</p>
                                    <p><a href="tel:{{$company->phone_number}}">{{$company->phone_number}}</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <br>
            {{$companies->links()}}
            <br>
        </div>
    </div>
</x-app-layout>
