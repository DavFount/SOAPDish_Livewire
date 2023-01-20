<nav class="bg-gray-100 dark:bg-gray-800 border-b border-gray-700 dark:border-gray-500" x-data="{mobileMenu: false}">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button @click="mobileMenu = ! mobileMenu" type="button"
                        class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center">
                    <img class="block h-8 w-auto lg:hidden"
                         src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                    <img class="hidden h-10 w-auto lg:block"
                         src="{{ url(asset('images/LogoText.png')) }}" alt="Your Company">
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <x-base.nav-group />
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0"
                 x-data="{ userOpen: false, themeOpen: false }">
                <div class="relative ml-3 ">
                    <button type="button"
                            class="rounded-full bg-gray-100 dark:bg-gray-800 p-1 text-gray-900 dark:text-gray-400 hover:text-gray-600 dark:hover:text-gray-50 focus:outline-none focus:ring-1 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            @click="themeOpen = ! themeOpen"
                            @click.outside="themeOpen = false"
                    >
                        <span class="sr-only">View notifications</span>
                        <!-- Heroicon name: outline/bell -->
                        <x-icon name="computer-desktop" />
                    </button>

                    <div x-show="themeOpen"
                         class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md dark:bg-gray-50 py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none border border-gray-900 custom-shadow"
                    >
                        <div class="w-full bg-gray-100 hover:bg-gray-200 py-1">
                            <button type="button" @click="localStorage.removeItem('theme'); location.reload();" class="w-full text-left">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-3 w-5 h-5 inline-flex">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                                </svg>
                                System
                            </button>
                        </div>

                        <div class="w-full bg-gray-100 hover:bg-gray-200 py-1">
                            <button type="button" @click="localStorage.theme = 'dark'; location.reload();" class="w-full text-left">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-3 w-5 h-5 inline-flex">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                                </svg>
                                Dark
                            </button>
                        </div>

                        <div class="w-full bg-gray-100 hover:bg-gray-200 py-1">
                            <button type="button" @click="localStorage.theme = 'light'; location.reload();" class="w-full text-left">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-3 w-5 h-5 inline-flex">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                                </svg>
                                Light
                            </button>
                        </div>
                    </div>
                </div>
                @auth
                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <button @click="userOpen = ! userOpen" @click.outside="userOpen = false" type="button"
                                    class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                @php
                                    $avatar = auth()->user()->avatar_url ??'avatar/default.png';
                                @endphp
                                <img class="h-10 w-10 rounded-full border border-black custom-shadow"
                                     src="{{ asset('/storage/' . $avatar) }}"
                                     alt="{{auth()->user()->name}}">
                            </button>
                        </div>
                        <div x-show="userOpen"
                             class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                        >
                            <x-responsive-nav-link :href="route('community.show', ['user' => auth()->user()])" :active="request()->routeIs('community.show')">
                                {{ __('Dashboard') }}
                            </x-responsive-nav-link>

{{--                            <x-responsive-nav-link :href="route('profile.edit')"  :active="request()->routeIs('profile.edit')">--}}
{{--                                {{ __('Profile') }}--}}
{{--                            </x-responsive-nav-link>--}}

                            <!-- Authentication -->
                            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link :href="route('logout')"
                                                       @click.prevent="document.querySelector('#logout-form').submit()">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </div>
                    </div>
                @else
                    <x-base.nav-item :href="route('login')" :active="request()->routeIs('login')">Login</x-base.nav-item>
                    <x-base.nav-item :href="route('register')">Register</x-base.nav-item>
                @endauth
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu" x-show="mobileMenu">
        <div class="space-y-1 px-2 pt-2 pb-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <x-base.nav-group :mobile="true" />
        </div>
    </div>
</nav>
