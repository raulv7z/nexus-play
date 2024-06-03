<div class="flex justify-center items-center content-center" x-data="{ open: false }">
    <!-- Offcanvas button trigger -->
    <button id="navbartoggle" type="button"
        class="inline-flex items-center justify-center text-gray-800 hover:text-gray-700 dark:text-gray-400 focus:outline-none focus:ring-0"
        aria-controls="mobile-menu" @click="open = !open" aria-expanded="false" x-bind:aria-expanded="open.toString()">
        <span class="sr-only">Mobile menu</span>
        <svg x-description="Icon closed" x-state:on="Menu open" x-state:off="Menu closed" class="block h-8 w-8"
            :class="{ 'hidden': open, 'block': !(open) }" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>

        <svg x-description="Icon open" x-state:on="Menu open" x-state:off="Menu closed" class="hidden h-8 w-8"
            :class="{ 'block': open, 'hidden': !(open) }" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>

    <!-- Left Offcanvas -->
    <div class="fixed w-full h-full inset-0 z-50" id="mobile-menu" x-description="Mobile menu" x-show="open"
        style="display: none;">
        <!-- bg open -->
        <span class="fixed bg-gray-900 bg-opacity-70 w-full h-full inset-x-0 top-0"></span>

        <!-- Mobile navbar -->
        <nav id="mobile-nav"
            class="flex flex-col left-0 w-64 fixed top-0 py-4 bg-white dark:bg-gray-800 h-full overflow-auto z-40"
            x-show="open" @click.away="open=false" x-description="Mobile menu" role="menu"
            aria-orientation="vertical" aria-labelledby="navbartoggle"
            x-transition:enter="transform transition-transform duration-300"
            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition-transform duration-300" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full">
            <div class="mb-auto">
                <!--logo-->
                {{-- <div class="mh-18 text-center px-12 mb-8">
                    <a href="{{ route('admin.dashboard') }}" class="flex relative"> --}}
                {{-- <h2 class="text-2xl font-semibold text-gray-200 px-4 max-h-9 overflow-hidden"> --}}
                {{-- <img class="inline-block w-7 h-auto mr-2 -mt-1" src="../src/img/logo.png"> --}}
                {{-- <div class="inline-block w-10 h-auto">
                                <x-presets.application-logo />
                            </div>
                            <span class="text-gray-700 dark:text-gray-200">
                                {{ __('Dashboard') }}
                            </span>
                        </h2>
                    </a>
                </div> --}}

                <div class="flex flex-col justify-center items-center content-center my-5">
                    <a href="{{ route('admin.dashboard') }}" class="flex relative">
                        <div class="inline-block w-10 h-auto">
                            <x-presets.application-logo />
                        </div>
                    </a>

                    <a href="{{ route('admin.dashboard') }}" class="flex relative">
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-200 px-4 mt-3 overflow-hidden">
                            {{ __('Dashboard') }}
                        </h2>
                    </a>
                </div>

                <!--navigation-->
                <div class="mb-4">
                    <nav class="relative flex flex-wrap items-center justify-between">
                        <ul id="side-menu" class="w-full float-none flex flex-col">

                            <div class="my-2">
                                <p class="font-bold text-black dark:text-white ml-2">
                                    {{ __('Managers') }}
                                </p>
                                <hr class="h-px mx-2 border-0 bg-gray-300 dark:bg-gray-500">
                            </div>

                            {{-- "request()->routeIs('root.dashboard')" --}}

                            @php
                                $active = request()->routeIs('admin.users.manager');
                            @endphp
                            <li class="relative {{ $active ? 'bg-blue-200 dark:bg-blue-900' : '' }}">
                                <a href="{{ route('admin.users.manager') }}"
                                    class="block py-3 px-4 text-gray-700 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400
                                    {{ $active ? 'font-bold text-blue-700 dark:text-blue-200' : '' }}">
                                    {{ __('Users') }}
                                </a>
                            </li>

                            @php
                                $active = request()->routeIs('admin.videogames.manager');
                            @endphp
                            <li class="relative {{ $active ? 'bg-blue-200 dark:bg-blue-900' : '' }}">
                                <a href="{{ route('admin.videogames.manager') }}"
                                    class="block py-3 px-4 text-gray-700 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400
                                    {{ $active ? 'font-bold text-blue-700 dark:text-blue-200' : '' }}">
                                    {{ __('Videogames') }}
                                </a>
                            </li>

                            @php
                                $active = request()->routeIs('admin.platform-groups.manager');
                            @endphp
                            <li class="relative {{ $active ? 'bg-blue-200 dark:bg-blue-900' : '' }}">
                                <a href="{{ route('admin.platform-groups.manager') }}"
                                    class="block py-3 px-4 text-gray-700 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400
                                {{ $active ? 'font-bold text-blue-700 dark:text-blue-200' : '' }}">
                                    {{ __('Platform Groups') }}
                                </a>
                            </li>

                            @php
                                $active = request()->routeIs('admin.platforms.manager');
                            @endphp
                            <li class="relative {{ $active ? 'bg-blue-200 dark:bg-blue-900' : '' }}">
                                <a href="{{ route('admin.platforms.manager') }}"
                                    class="block py-3 px-4 text-gray-700 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400
                                {{ $active ? 'font-bold text-blue-700 dark:text-blue-200' : '' }}">
                                    {{ __('Platforms') }}
                                </a>
                            </li>

                            @php
                                $active = request()->routeIs('admin.editions.manager');
                            @endphp
                            <li class="relative {{ $active ? 'bg-blue-200 dark:bg-blue-900' : '' }}">
                                <a href="{{ route('admin.editions.manager') }}"
                                    class="block py-3 px-4 text-gray-700 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400
                                {{ $active ? 'font-bold text-blue-700 dark:text-blue-200' : '' }}">
                                    {{ __('Editions') }}
                                </a>
                            </li>

                            <div class="my-2">
                                <p class="font-bold text-black dark:text-white ml-2">
                                    {{ __('Options') }}
                                </p>
                                <hr class="h-px mx-2 border-0 bg-gray-300 dark:bg-gray-500">
                            </div>

                            <li class="relative">
                                <!-- Dark/Light Mode Toggler -->
                                <div class="block py-3 px-4 hover:text-blue-700 focus:text-blue-700">

                                    <input id="theme-toggle" type="checkbox" class="hidden theme-toggle">

                                    <label for="theme-toggle" class="inline-flex items-center cursor-pointer">

                                        <!-- Toggler -->
                                        <div class="relative">
                                            <div class="block w-10 h-6 bg-gray-400 rounded-full shadow-inner"></div>
                                            <div id="toggle-dot"
                                                class="toggle-dot dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform duration-300 ease-in-out">
                                            </div>
                                        </div>

                                        <!-- Icons -->
                                        <div class="flex flex-col justify-center ml-2">
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
                            </li>

                            <li class="bg-gray-500">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
            
                                    <x-statics.submit-logout>
                                        {{ __('Log Out') }}
                                    </x-statics.submit-logout>
                                </form>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- copyright -->

            <div class="bg-gray-200 dark:bg-gray-700 mt-5 text-center px-4 py-3">
                <p class="text-center text-gray-800 dark:text-gray-200">
                    © Nexus Play.
                </p>
                <p class="text-center text-gray-800 dark:text-gray-200">
                    {{ __('All rights reserved') }}
                </p>
            </div>
        </nav>
    </div><!-- End Mobile menu -->
</div>
