<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h5 class="text-xl font-semibold leading-none text-gray-800 dark:text-gray-200">Your Job Openings</h5>
                    @foreach($jobs as $job)
                        <a href="{{route('edit', ['id' => $job->id])}}" class="mt-4 block w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$job->title}} - {{$job->company}}</h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400">{{substr($job->description, 0, 305)}} ...</p>
                            <p class="mt-4 font-light text-xs text-gray-700 dark:text-gray-400">{{$job->website}}</p>
                            <p class="font-light text-xs text-gray-700 dark:text-gray-400">{{$job->email}}</p>
                            <p class="font-light text-xs text-gray-700 dark:text-gray-400">{{$job->phone_number}}</p>
                            <p class="font-light text-xs text-gray-700 dark:text-gray-400">{{$job->updated_at->format('d-m-Y h:i')}}</p>
                        </a>
                    @endforeach
                    <br>
                    {{$jobs->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
