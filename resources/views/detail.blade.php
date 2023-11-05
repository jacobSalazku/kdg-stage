 <x-app-layout>
    @foreach($jobs as $job)
        <div class="flex flex-col w-full h-full  items-center justify-start py-10 gap-6 bg-white">
            <div class="  max-w-[87.5rem] flex flex-col items-center  justify-start gap-4">
                <div class="border-b-2 border-kdg-light w-full h-full flex flex-row justify-center pb-4">
                    <p class="text-3xl font-semibold">{{ $job->title }}</p>
                </div>
                <div>
                    {{__('detail.posted')}} {{$job->updated_at->format('d-m-Y H:i')}}
                </div>
                <div class="  w-full flex flex-col justify-start px-2 py-6 ">
                    <div class="flex flex-col sm:items-center">
                        <div class=" border sm:w-auto sm:h-auto justify-start  rounded-md py-12  px-4 sm:mx-12 md:mx-24 md:px-8  lg:mx-8 lg:px-42 flex flex-col items-center">
                            <p class="text-2xl font-semibold ">{{ $job->company }}</p>
                            <div class="pt-10 text-lg">
                                <p>{!! $job->description !!} </p>
                            </div>
                        </div>
                        <div class=" w-full  flex flex-col sm:flex-row justify-center items-center   py-5 my-5  px-10 sm:mx-10 ">

                            <div class="flex  flex-col justify-center items-center pt-4 gap-4">
                                <div>
                                    <p class="text-lg font-semibold ">
                                        {{__('detail.contact')}}
                                    </p>
                                </div>
                                <div class=" w-full flex flex-col  md:flex-row gap-8 justify-center items-center">
                                    <div class="flex  flex-col justify-centeritems ">
                                        <p> {{__('detail.user')}} </p>
                                        <p> {{$job->user->name}} </p>
                                    </div>
                                    <div class="flex  flex-col justify-centeritems ">
                                        <p> {{__('detail.phone')}} </p>
                                        <p>  {{ $job->phone_number}} </p>
                                    </div>

                                    <div class=" w-auto flex flex-col md:justify-center items-center">
                                        <p> {{__('detail.email')}} </p>
                                        <p> {{ $job->email}} </p>
                                    </div>
                                    <div class="  w-auto flex flex-col md:justify-center items-center">
                                        <p> {{__('detail.website')}} </p>
                                        <p> <a class="text-decoration-line: underline" target="__blank" href="{{$job->website}}">{{$job->website}}</a> </p>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="w-full">
                            <button class='flex w-auto justify-center   sm:mx-12 md:mx-24 mt-6 rounded-md bg-deep-black px-4   py-1.5   text-sm font-semibold leading-6 text-white shadow-sm hover:bg-kdg-dark-blue focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"'>
                                <p class="text-l font-semibold "><a href="{{route('jobs')}}">{{__('detail.return')}}</a></p>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>

