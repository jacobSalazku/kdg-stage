<nav x-data="{ open: false }" class="bg-deep-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-row justify-center items-center h-24">
            <div class="w-full h-24 flex flex-row justify-between items-center px-6">
                <div class=" flex flex-row items-center  justify-center cursor-pointer">
                    <a href="{{ route('home') }}" class="font-KDG font text-3xl text-kdg-white">
                        KdG MCT
                    </a>
                </div>
                <div class="hidden lg:flex mlg:flex-row lg:items-center lg:space-x-4 gap-4 ">
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex content-self-end ">
                        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('nav.internships') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('jobs')" :active="request()->routeIs('jobs') || request()->routeIs('search')">
                            {{ __('nav.jobs') }}
                        </x-nav-link>
                    </div>

                    @auth
                        <div class="flex-row justify-center bg-kdg-blue text-kdg-white py-1.5 rounded hover:bg-kdg-dark-blue">
                            <x-nav-link href="{{ route('new') }}" :active="request()->routeIs('new')">
                                 +  {{ __('nav.new') }}
                            </x-nav-link>
                        </div>
                    @endauth
                    <x-dropdown width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <svg width="20px" height="20px" viewBox="0 0 24 24" role="img" xmlns="http://www.w3.org/2000/svg" aria-labelledby="languageIconTitle" stroke="#000000" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#000000"> <title id="languageIconTitle">Language</title> <circle cx="12" cy="12" r="10"/> <path stroke-linecap="round" d="M12,22 C14.6666667,19.5757576 16,16.2424242 16,12 C16,7.75757576 14.6666667,4.42424242 12,2 C9.33333333,4.42424242 8,7.75757576 8,12 C8,16.2424242 9.33333333,19.5757576 12,22 Z"/> <path stroke-linecap="round" d="M2.5 9L21.5 9M2.5 15L21.5 15"/> </svg>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <x-dropdown-link :href="LaravelLocalization::getLocalizedURL($localeCode, null, [], true)">
                                    {{ $properties['native'] }}
                                </x-dropdown-link>
                            @endforeach
                        </x-slot>
                    </x-dropdown>
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <svg fill="#000000" width="20px" height="20px" viewBox="0 0 32 32" id="Outlined" xmlns="http://www.w3.org/2000/svg">

                                    <title/>

                                    <g id="Fill">

                                        <path d="M24,17H8a5,5,0,0,0-5,5v7H5V22a3,3,0,0,1,3-3H24a3,3,0,0,1,3,3v7h2V22A5,5,0,0,0,24,17Z"/>

                                        <path d="M16,15a6,6,0,1,0-6-6A6,6,0,0,0,16,15ZM16,5a4,4,0,1,1-4,4A4,4,0,0,1,16,5Z"/>

                                    </g>

                                </svg>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link  :href="route('dashboard')">
                            {{ __('nav.dashboard') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('nav.profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('nav.logout') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <x-dropdown align="right" width="48">
                       <x-slot name="trigger">
                          <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                             <svg fill="#000000" width="20px" height="20px" viewBox="0 0 32 32" id="Outlined" xmlns="http://www.w3.org/2000/svg">

                                <title/>

                                   <g id="Fill">

                                      <path d="M24,17H8a5,5,0,0,0-5,5v7H5V22a3,3,0,0,1,3-3H24a3,3,0,0,1,3,3v7h2V22A5,5,0,0,0,24,17Z"/>

                                        <path d="M16,15a6,6,0,1,0-6-6A6,6,0,0,0,16,15ZM16,5a4,4,0,1,1-4,4A4,4,0,0,1,16,5Z"/>

                                   </g>

                             </svg>
                             <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                   <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                             </div>
                          </button>
                       </x-slot>
                       <x-slot name="content">
                          <x-dropdown-link  :href="route('login')">
                            {{ __('login.title') }}
                          </x-dropdown-link>
                          <x-dropdown-link :href="route('register')">
                            {{ __('register.title') }}
                          </x-dropdown-link>
                       </x-slot>
                    </x-dropdown>
                @endauth
            </div>
                </div>
                <div class="mr-2 flex items-center lg:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover-text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus-text-gray-400 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>



            </div>

        </div>

    </div>
    <div :class="{'block': open, 'hidden': ! open}" class=" lg:hidden w-full flex flex-col items-center">
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                            {{ __('nav.internships') }}
                        </x-responsive-nav-link>
                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('jobs')" :active="request()->routeIs('jobs')">
                            {{ __('nav.jobs') }}
                        </x-responsive-nav-link>
                    </div>
                    @auth
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('nav.dashboard') }}
                        </x-responsive-nav-link>
                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('new')" :active="request()->routeIs('new')">
                            {{ __('nav.new') }}
                        </x-responsive-nav-link>
                    </div>
                    @endauth

                    <div class="pt-2 pb-3 space-y-1">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <x-responsive-nav-link
                                :href="LaravelLocalization::getLocalizedURL($localeCode, null, [], true)">
                                {{ $properties['native'] }}
                            </x-responsive-nav-link>
                        @endforeach
                    </div>

                    @if(Auth::user())
                        <!-- Responsive Settings Options -->
                        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                            <div class="px-4">
                            </div>

                            <div class="mt-3 space-y-1">
                                <x-responsive-nav-link :href="route('profile.edit')">
                                    {{ __('nav.profile') }}
                                </x-responsive-nav-link>


                                <form>
                                    <x-responsive-nav-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('nav.logout') }}
                                    </x-responsive-nav-link>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                            <div class="mt-3 space-y-1">
                                <x-responsive-nav-link :href="route('login')">
                                    {{ __('nav.login') }}
                                </x-responsive-nav-link>
                                <x-responsive-nav-link :href="route('register')">
                                    {{ __('nav.register') }}
                                </x-responsive-nav-link>
                            </div>
                        </div>
                    @endif
                </div>
</nav>
