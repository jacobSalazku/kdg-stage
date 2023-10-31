<x-app-layout>
    <div class="w-screen  h-full bg-kdg-white flex flex-col justify-center pt-10">
        <div class="max-w-7xl mx-auto ">
            <div class="flex-shrink-0 flex items-center">
                <div class="h-20  w-[87.5rem] flex  flex-row justify-between  border-b-2 border-kdg-light items-center px-10">
                <h1 className=" text-2xl font-h1 sm:text-3xl">
                    {{__('jobs.jobs')}}
                </h1>
                <form action="{{route('search')}}" method="get">
                        <div class="relative flex items-center">
                            <form action="{{route('search')}}" method="get">
                                <input type="text" name="query" id="query" placeholder="{{__('jobs.find')}}" class="block w-64 py-2 pl-10 pr-4 leading-5 rounded-full bg-gray-100 dark:bg-gray-700 border-transparent focus:outline-none focus:bg-white focus:border-gray-300 dark:focus:border-gray-500 focus:ring focus:ring-gray-200 dark:focus:ring-gray-400 transition duration-150 ease-in-out">
                                <button type="submit" class="ml-2 px-3 py-2 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:bg-gray-200 dark:focus:bg-gray-600 transition duration-150 ease-in-out">
                                    {{__('jobs.search')}}
                                </button>
                                @if($filtered === 1)
                                    <button class="ml-2 px-3 py-2 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:bg-gray-200 dark:focus:bg-gray-600 transition duration-150 ease-in-out">
                                        <a href="{{route('jobs')}}">{{__('jobs.back')}}</a>
                                    </button>
                                @endif
                            </from>       
                        </div>
                    </form>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($filtered === 1)
                        <h5 class="text-xl font-semibold leading-none text-gray-800 dark:text-gray-200">{{__('jobs.results')}} {{count($jobs)}}</h5>
                    @else
                        <h5 class="text-xl font-semibold leading-none text-gray-800 dark:text-gray-200">{{__('jobs.jobs')}}</h5>
                    @endif
                    @foreach($jobs as $job)
                    <div class="w-full h-auto  mt-2 rounded border border-kdg-grey  shadow-lg flex flex-col justify-center items-start px-5 py-10 gap-8 cursor-pointer hover:bg-gray-100 dark:bg-gray-800  dark:hover:bg-gray-70"
                    href="{{route('detail', ['id' => $job->id])}}" 
                    >
                        
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$job->title}} - {{$job->company}}</h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400">{{ substr(strip_tags($job->description), 0, 305) }} ...</p>
                            <p class="mt-4 text-sm text-gray-700 dark:text-gray-400">{{__('jobs.posted')}} {{$job->updated_at->format('d-m-y H:i')}}</p>
                        
                        <div>
                    @endforeach
                    <br>
                    {{$jobs->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
