<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h5 class="text-xl font-semibold leading-none text-gray-800 dark:text-gray-200">Internships</h5>
                    @foreach($companies as $company)
                        <div class="mt-4 block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 w-full">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$company->company}}</h5>
                            <p class="mt-4 text-sm text-gray-700 dark:text-gray-400">Email: <a href="mailto:{{$company->email}}">{{$company->email}}</a></p>
                            <p class="mt-4 text-sm text-gray-700 dark:text-gray-400">Phone: <a href="Tel:{{$company->phone_number}}">{{$company->phone_number}}</a></p>
                            <p class="mt-4 text-sm text-gray-700 dark:text-gray-400">Registered: {{$company->created_at->format('d-m-y H:i')}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
