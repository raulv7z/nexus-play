<div class="h-screen hidden lg:flex">

    {{-- Sidebar --}}
    <div class="bg-[#1C1C72] text-white w-64 flex-none">

        <div class="flex flex-col justify-center items-start content-center p-4">

            <div id="logo-icon" class="h-12 w-12">
                <a href="{{ route('root.dashboard') }}">
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
                    <li><a href="#"
                            class="block py-2 px-4 text-gray-100 hover:bg-gray-600">Inicio</a>
                    </li>
                    <li><a href="#"
                            class="block py-2 px-4 text-gray-100 hover:bg-gray-600">Usuarios</a>
                    </li>
                    <li><a href="#"
                            class="block py-2 px-4 text-gray-100 hover:bg-gray-600">Configuración</a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-presets.dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-presets.dropdown-link>
                        </form>
                    </li>
                    <!-- Agrega más elementos de menú según tus necesidades -->
                </ul>
            </nav>

            <x-interface.hr-xl />

        </div>


    </div>
