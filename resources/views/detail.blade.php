<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach($jobs as $job)
                        <h5 class="text-xl font-semibold leading-none text-gray-800 dark:text-gray-200">{{$job->title}}</h5>
                        <h4 class="text-l font-semibold leading-none text-gray-800 dark:text-gray-200">{{$job->company}}</h4>
                        <p class="text-sm mt-4 font-normal leading-none text-gray-800 dark:text-gray-200">{!! $job->description !!}</p>
                        <p class="text-sm mt-4 font-normal leading-none text-gray-800 dark:text-gray-200">{{__('detail.posted')}} {{$job->updated_at->format('d-m-Y H:i')}}</p>
                        <p class="text-sm mt-4 font-normal leading-none text-gray-800 dark:text-gray-200">{{__('detail.website')}} <a class="text-decoration-line: underline" target="__blank" href="{{$job->website}}">{{$job->website}}</a></p>
                        <p class="text-sm mt-4 font-normal leading-none text-gray-800 dark:text-gray-200">{{__('detail.contact')}} {{$job->user->name}}</p>
                        <p class="text-sm mt-4 font-normal leading-none text-gray-800 dark:text-gray-200">{{__('detail.email')}} <a class="text-decoration-line: underline" href="mailto:{{$job->email}}">{{$job->email}}</a></p>
                        <p class="text-sm mt-4 font-normal leading-none text-gray-800 dark:text-gray-200">{{__('detail.phone')}} <a class="text-decoration-line: underline" href="Tel:">{{$job->phone_number}}</a></p>
                    @endforeach
                    <p class="text-l font-semibold mt-4"><a href="{{route('jobs')}}">{{__('detail.return')}}</a></p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
