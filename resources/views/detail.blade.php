@section('pagetitle', __('detail.detail'))
<x-app-layout>
    @foreach($jobs as $job)
    <main class="w-full px-4 py-12 mx-auto ease-out max-w-7xl transitoin-all sm:px-6 lg:py-16 lg:px-8 dark:bg-gray-800">
        <div class="lg:grid lg:grid-cols-3 lg:gap-8">
            <div class="lg:col-span-1">
                <div class="overflow-hidden bg-white shadow-lg dark:bg-gray-700 sm:rounded-lg">
                    <div class="px-4 py-5 border-gray-200 dark:border-gray-600 sm:px-6">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{__('detail.contact')}}</h2>
                        <dl class="grid grid-cols-1 gap-6 mt-8 sm:grid-cols-2">
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">{{__('detail.phone')}}</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-gray-200">{{ $job->contact }}</dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-300"> {{__('detail.email')}}</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-gray-200">{{ $job->email }}</dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">{{__('detail.website')}}</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-gray-200">{{$job->website}}</dd>
                             </div>
                         </dl>
                    </div>
                    <div class="flex justify-center w-full mb-4">
                        <button class='mx-auto flex w-auto justify-center transition-transform sm:mx-12 md:mx-24 mt-6 rounded-md bg-deep-black px-4 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-kdg-dark-blue focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"'>
                            <p class="font-semibold text-l "><a href="{{route('jobs')}}">{{__('detail.return')}}</a></p>
                        </button>
                    </div>
                </div>
            </div>
            <div class="mt-12 lg:mt-0 lg:col-span-2">
                <div class="overflow-hidden bg-white shadow-lg dark:bg-gray-700 sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                        <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">
                        {{ $job->company }}
                        </h1>
                        <p class="mt-4 text-lg text-gray-500 dark:text-gray-300">{{__('detail.posted')}} {{$job->updated_at->format('d-m-Y H:i')}}</p>
                    </div>
                    <div class="px-4 py-5 border-t border-gray-200 dark:border-gray-600 sm:px-6">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $job->title }}</h2>
                        <p class="mt-4 text-sm text-gray-700 dark:text-gray-300">
                            {!! $job->description !!} 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endforeach
</x-app-layout>

