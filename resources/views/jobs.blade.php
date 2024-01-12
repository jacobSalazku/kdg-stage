@section('pagetitle', __('jobs.jobs'))
<x-app-layout>
    <div class="flex flex-col items-center justify-center w-full h-full px-6 pt-10 bg-kdg-white">
        <div class="flex flex-row items-center w-screen max-w-7xl">
            <div class="h-20 w-[87.5rem] flex flex-row border-b-2 border-kdg-light items-center px-10">
                <div>
                    <h1 class="text-2xl font-KDG sm:text-3xl">
                        {{__('jobs.jobs')}}
                    </h1>
                </div>
                <form action="{{route('search')}}" method="get" class="ml-auto">
                    <div class="flex flex-row items-center">
                        <input type="text" name="query" id="query" value='{{$search ?? ''}}' placeholder="{{__('jobs.find')}}" class="block w-full py-2 pl-10 pr-4 leading-5 transition duration-150 ease-in-out bg-gray-100 border-transparent rounded-full sm:w-64 dark:bg-gray-700 focus:outline-none focus:bg-white focus:border-gray-300 dark:focus:border-gray-500 focus:ring focus:ring-gray-200 dark:focus:ring-gray-400">
                        <button type="submit" class="w-full px-3 py-2 ml-2 transition duration-150 ease-in-out border rounded-full bg-deep-black text-kdg-white text-bold hover:bg-kdg-white hover:text-deep-black hover:border-deep-black">
                            {{__('jobs.search')}}
                        </button>
                        @if($filtered === 1)
                        @endif
                    </div>
                </form>
            </div>
        </div>
        <div class="w-full max-w-[87.5rem] flex flex-col items-center justify-center -bg-white dark:bg-gray-800 overflow-hidden mt-4 md:px-10">
            <div class="flex flex-col w-full p-6 text-gray-900 dark:text-gray-100">
                <div class="flex justify-between">
                    @if ($filtered === 1)
                        <h5 class="text-xl font-semibold leading-none text-gray-800 dark:text-gray-200">
                            {{count($jobs)}}
                            @if(count($jobs) === 1)
                                {{__('jobs.result', ['searchTerm' => $search])}}
                            @else
                                {{__('jobs.results', ['searchTerm' => $search])}}
                            @endif
                        </h5>
                        <a class="hover:underline" href="{{route('jobs')}}">{{__('jobs.back')}}</a>
                    @endif
                </div>
                <div class="flex flex-row flex-wrap gap-6 mt-6 transition-transform sm:grid sm:grid-cols-2 ">
                    @foreach($jobs as $job)
                        <a href="{{route('detail', ['id' => $job->id])}}" class="h-full gap-8 px-5 py-10 border rounded shadow-lg cursor-pointer border-kdg-grey hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-70">
                            <h3 class="mb-1 text-3xl font-bold tracking-tight text-kdg-dark-blue ">{{$job->title}} </h3>
                            <h4 class="mb-1 text-lg font-medium tracking-tight text-deep-black ">{{$job->company}}</h4>
                            <p class="font-normal text-gray-700 dark:text-gray-400">{{ substr(strip_tags($job->description), 0, 250) }} ...</p>
                            <p class="mt-2 text-sm text-p-black dark:text-gray-400">{{__('jobs.posted')}} {{$job->updated_at->format('d-m-y H:i')}}</p>
                        </a>
                    @endforeach
                </div>
                @if($jobs->count() === 0 && $filtered === 0)
                    <div class="h-auto px-5 py-5 text-center border rounded shadow-lg border-kdg-grey">
                        <h4 class="text-lg font-medium tracking-tight text-deep-black ">{{__('jobs.no-jobs')}}</h4>
                    </div>
                @endif
                <br>
                <div class="mt-2">
                    @if($filtered !==  1)
                        {{$jobs->links()}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
