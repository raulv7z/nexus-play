<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-presets.application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-presets.nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Home') }}
                    </x-presets.nav-link>
                </div>

                <!-- Load platform links -->
                @foreach ($platformGroups as $group)
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 lg:flex">
                        <!-- Change links to real routes on web.php, using the route names and parameters -->
                        <x-presets.nav-link :href="route('platform-groups.show', $group->id)" :active="request()->routeIs('platform-groups.show') && request()->route('id') == $group->id">
                            {{ $group->name }}
                        </x-presets.nav-link>
                    </div>
                @endforeach

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden lg:flex sm:items-center sm:ms-6">

                <!-- Dark/Light Mode Toggler -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex mr-2">

                    <input id="theme-toggle" type="checkbox" class="hidden">

                    <label for="theme-toggle" class="inline-flex items-center cursor-pointer">

                        <!-- Toggler -->
                        <div class="relative">
                            <div class="block w-10 h-6 bg-gray-400 rounded-full shadow-inner"></div>
                            <div id="toggle-dot"
                                class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform duration-300 ease-in-out">
                            </div>
                        </div>


                        <!-- Icons -->
                        <div class="flex flex-col justify-center ml-3">
                            <input type="checkbox" name="light-switch" class="light-switch sr-only" />
                            <label class="relative cursor-pointer p-2" for="light-switch">
                                <svg class="dark:hidden" width="16" height="16"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path class="fill-slate-300"
                                        d="M7 0h2v2H7zM12.88 1.637l1.414 1.415-1.415 1.413-1.413-1.414zM14 7h2v2h-2zM12.95 14.433l-1.414-1.413 1.413-1.415 1.415 1.414zM7 14h2v2H7zM2.98 14.364l-1.413-1.415 1.414-1.414 1.414 1.415zM0 7h2v2H0zM3.05 1.706 4.463 3.12 3.05 4.535 1.636 3.12z" />
                                    <path class="fill-slate-400"
                                        d="M8 4C5.8 4 4 5.8 4 8s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4Z" />
                                </svg>
                                <svg class="hidden dark:block" width="16" height="16"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path class="fill-slate-400"
                                        d="M6.2 1C3.2 1.8 1 4.6 1 7.9 1 11.8 4.2 15 8.1 15c3.3 0 6-2.2 6.9-5.2C9.7 11.2 4.8 6.3 6.2 1Z" />
                                    <path class="fill-slate-500"
                                        d="M12.5 5a.625.625 0 0 1-.625-.625 1.252 1.252 0 0 0-1.25-1.25.625.625 0 1 1 0-1.25 1.252 1.252 0 0 0 1.25-1.25.625.625 0 1 1 1.25 0c.001.69.56 1.249 1.25 1.25a.625.625 0 1 1 0 1.25c-.69.001-1.249.56-1.25 1.25A.625.625 0 0 1 12.5 5Z" />
                                </svg>
                                <span class="sr-only">Switch to light / dark version</span>
                            </label>
                        </div>

                        <!-- <span class="ml-3 text-gray-700 dark:text-gray-200 font-medium">tog</span> -->

                    </label>

                </div>

                <!-- Language Dropdown -->
                <x-presets.dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ strtoupper(app()->getLocale()) }}</div>
                            <div class="ml-2">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Options -->
                        <x-presets.dropdown-link>
                            EN
                        </x-presets.dropdown-link>
                        <x-presets.dropdown-link>
                            ES
                        </x-presets.dropdown-link>
                    </x-slot>
                </x-presets.dropdown>

                <!-- Profile options dropdown -->
                <x-presets.dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-presets.dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-presets.dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-presets.dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-presets.dropdown-link>
                        </form>
                    </x-slot>
                </x-presets.dropdown>

                <!-- Cart link -->
                <a href="route('dashboard')" :active="request() - > routeIs('COMPLETE_THIS')">
                    <x-interface.cart-icon />
                </a>

                <!-- Admin link -->
                <a href="{{ route('admin.dashboard') }}" :active="request() - > routeIs('COMPLETE_THIS')" class="ml-4">
                    <x-interface.admin-icon />
                </a>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center lg:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden lg:hidden">
        <div class="pt-1 pb-1 space-y-1">
            <x-presets.responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-presets.responsive-nav-link>
        </div>

        <!-- Load platform links -->
        @foreach ($platformGroups as $group)
            <div class="pt-1 pb-1 space-y-1">

                <!-- //todo change links to real routes on web.php, same with :active -->
                <x-presets.responsive-nav-link :href="route('platform-groups.show', $group->id)" :active="request()->routeIs('platform-groups.show') && request()->route('id') == $group->id">
                    {{ $group->name }}
                </x-presets.responsive-nav-link>
            </div>
        @endforeach

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-presets.responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-presets.responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-presets.responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-presets.responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>