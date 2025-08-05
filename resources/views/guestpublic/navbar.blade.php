{{-- NAVBAR UNTUK PUBLIC --}}
<nav x-data="{ open: false }" class="fixed top-0 w-full z-50 bg-white shadow py-1 ">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                        <x-application-logo class="block h-12 w-auto fill-current text-gray-800" />
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('lowongan.index')" :active="request()->routeIs('lowongan.index')">
                        {{ __('Lowongan') }}
                    </x-nav-link>
                    <x-nav-link :href="route('guestpublic.dashboard')" :active="request()->routeIs('guestpublic.dashboard')">
                        {{ __('About') }}
                    </x-nav-link>
                </div>
            </div>

            <!--
            @guest
                <div class="flex items-center space-x-4">
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-800 hover:text-blue-600">
                            Login
                        </a>
                    @endif

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-sm font-semibold text-white bg-blue-600 px-4 py-2 rounded hover:bg-blue-700">
                            Register
                        </a>
                    @endif
                </div>
            @endguest -->



            <!-- Settings Dropdown 
            @auth
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-[#00205B] bg-blue-100 hover:text--600 transition rounded-xl">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4-4-4a1 1 0 010-1.414z"/>
                                </svg>
                            </div>
                        </button>
                    </x-slot>     

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        @endauth -->


            <!-- Hamburger 
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open" class="p-2 text-gray-400 hover:text-gray-500 hover:bg-gray-100 rounded-md focus:outline-none transition">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open}" class="inline-flex" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open}" class="hidden" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div> -->
    
</nav>