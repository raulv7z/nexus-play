<div class="h-screen flex">

    {{-- Sidebar --}}
    {{-- bg-gradient-to-b from-[#080826] to-[#141485] --}}
    <div
        class="bg-gradient-to-b from-[#080826] from-20% via-[#12124a] via-60% to-[#141485] to-90% ... p-2 text-white w-64 flex-none">

        <div class="flex flex-col justify-center items-start content-center p-4">

            <div id="logo-icon" class="h-12 w-12">
                <a href="{{ route('admin.dashboard') }}">
                    <x-presets.white-application-logo />
                </a>
            </div>

            <div id="dashboard-title">
                <h1 class="text-lg font-semibold text-white mt-2">
                    {{ __('Admin Dashboard') }}
                </h1>
            </div>
        </div>

        <!-- Aquí puedes colocar tu menú de navegación -->
        <div class="p-4">
            <nav>
                <ul>
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="block py-2 px-4 text-gray-100 hover:bg-gray-700 rounded-lg">
                            {{ __('Home') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.manager') }}"
                            class="block py-2 px-4 text-gray-100 hover:bg-gray-700 rounded-lg">
                            {{ __('Users') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.videogames.manager') }}"
                            class="block py-2 px-4 text-gray-100 hover:bg-gray-700 rounded-lg">
                            {{ __('Videogames') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.platform-groups.manager') }}"
                            class="block py-2 px-4 text-gray-100 hover:bg-gray-700 rounded-lg">
                            {{ __('Platform Groups') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.platforms.manager') }}"
                            class="block py-2 px-4 text-gray-100 hover:bg-gray-700 rounded-lg">
                            {{ __('Platforms') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.editions.manager') }}"
                            class="block py-2 px-4 text-gray-100 hover:bg-gray-700 rounded-lg">
                            {{ __('Editions') }}
                        </a>
                    </li>
                </ul>
            </nav>

            <x-statics.hr-xl />

            <ul>
                <li class="my-2">
                    <!-- Dark/Light Mode Toggler -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex mr-2">

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
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-statics.submit-logout>
                            {{ __('Log Out') }}
                        </x-statics.submit-logout>
                    </form>
                </li>
            </ul>

        </div>
    </div>
