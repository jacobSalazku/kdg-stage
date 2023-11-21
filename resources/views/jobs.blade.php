@section('pagetitle', __('jobs.jobs'))
<x-app-layout>
    <div class="w-full h-full bg-kdg-white flex flex-col justify-center items-center pt-10 px-6">
        <div class="w-screen max-w-7xl flex flex-row items-center">
            <div class="h-20 w-[87.5rem] flex flex-row border-b-2 border-kdg-light items-center px-10">
                <div>
                    <h1 class="text-2xl font-KDG sm:text-3xl">
                        {{__('jobs.jobs')}}
                    </h1>
                </div>
                <form action="{{route('search')}}" method="get" class="ml-auto">
                    <div class="flex flex-row items-center">
                        <input type="text" name="query" id="query" placeholder="{{__('jobs.find')}}" class="block w-full sm:w-64 py-2 pl-10 pr-4 leading-5 rounded-full bg-gray-100 dark:bg-gray-700 border-transparent focus:outline-none focus:bg-white focus:border-gray-300 dark:focus:border-gray-500 focus:ring focus:ring-gray-200 dark:focus:ring-gray-400 transition duration-150 ease-in-out">
                        <button type="submit" class="w-full ml-2 px-3 py-2 rounded-full bg-deep-black text-kdg-white text-bold hover:bg-kdg-white hover:text-deep-black hover:border-deep-black border transition duration-150 ease-in-out">
                            {{__('jobs.search')}}
                        </button>
                        @if($filtered === 1)
                            <button class="w-full ml-2 px-3 py-2 rounded-full text-bold transition duration-150 ease-in-out bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:bg-gray-200 dark:focus:bg-gray-600">
                                <a href="{{route('jobs')}}">{{__('jobs.back')}}</a>
                            </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
        <div class="w-full max-w-[87.5rem] flex flex-col items-center justify-center -bg-white dark:bg-gray-800 overflow-hidden mt-4 md:px-10">
            <div class="w-full p-6 text-gray-900 dark:text-gray-100">
                @if ($filtered === 1)
                    <h5 class="text-xl font-semibold leading-none text-gray-800 dark:text-gray-200">{{__('jobs.results')}} {{count($jobs)}}</h5>
                @endif
                @foreach($jobs as $job)
                    <a href="{{route('detail', ['id' => $job->id])}}">
                        <div class="h-auto mt-6 rounded border border-kdg-grey shadow-lg flex flex-col justify-center items-start px-5 py-10 gap-8 cursor-pointer hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-70">
                            <h3 class="mb-1 text-3xl font-bold tracking-tight text-kdg-dark-blue ">{{$job->title}} </h3>
                            <h4 class="mb-1 text-lg font-mium tracking-tight text-deep-black ">{{$job->company}}</h4>
                            <p class="font-normal text-gray-700 dark:text-gray-400">{{ substr(strip_tags($job->description), 0, 250) }} ...</p>
                            <p class="mt-2 text-sm text-p-black dark:text-gray-400">{{__('jobs.posted')}} {{$job->updated_at->format('d-m-y H:i')}}</p>
                        </div>
                    </a>
                @endforeach
                <br>
                {{$jobs->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
