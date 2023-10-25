
<nav x-data="{ open: false }" class="bg-deep-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-row justify-center items-center h-24">
            <div class="w-full h-24 flex flex-row justify-between items-center px-6">
                <div class=" flex flex-row items-center  justify-center cursor-pointer">
                    <a href="{{ route('home') }}" class="font-h1 font text-3xl text-kdg-white">
                        KdG MCT
                    </a>
                </div>
                <div class="hidden md:flex md:flex-row md:items-center md:space-x-4 gap-4 ">
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex content-self-end ">
                        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('nav.internships') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('jobs')" :active="request()->routeIs('jobs')">
                        {{ __('nav.jobs') }}
                        </x-nav-link>
                    </div>
                    @auth
                        <div class=" flex-row justify-center bg-kdg-blue text-kdg-white py-3 my-8 rounded px-6 hover:bg-kdg-dark-blue">
                            <a 
                            href="{{ route('new') }}" :active="request()->routeIs('new')">
                                 +  {{ __('nav.new') }}
                            </a>
                        </div>
                        <div class="">
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                        </div>
                    @endauth
                    <div class="">
                        <x-nav-link href="{{__('nav.link')}}">
                            {{ __('nav.language') }}
                        </x-nav-link>
                    </div>
                
                
                    



                </div>
            </div>
        </div>
    </div>
</nav>
