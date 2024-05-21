<x-layouts.app>
    <x-slot name="header">
        <x-interface.header-title :content="$title">
        </x-interface.header-title>

        <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
        </x-interface.breadcrumbs>
    </x-slot>

    <x-interface.info-block>

        {{ __('SHOW ' . $edition->videogame->name) }}
        <div class="flex flex-col lg:flex-row items-center lg:items-start">
            <!-- Image Section -->
            <div class="w-fit max-w-xl">
                <x-games.image :frontPage="$edition->videogame->front_page">
                </x-games.image>
            </div>
            <!-- Info Section -->
            <div class="mt-6 lg:mt-0 lg:ml-8 w-full lg:w-2/3">
                <h1 class="text-3xl font-bold text-gray-800">Lorem ipsum.</h1>
                <p class="mt-4 text-gray-600">Lorem ipsum.</p>
                <div class="mt-6">
                    <span class="text-xl font-semibold text-gray-800">Release Date:</span>
                    <span class="text-lg text-gray-600">Lorem ipsum.</span>
                </div>
                <div class="mt-4">
                    <span class="text-xl font-semibold text-gray-800">Developer:</span>
                    <span class="text-lg text-gray-600">Lorem ipsum.</span>
                </div>
                <div class="mt-4">
                    <span class="text-xl font-semibold text-gray-800">Publisher:</span>
                    <span class="text-lg text-gray-600">Lorem ipsum.</span>
                </div>
                <div class="mt-4">
                    <span class="text-xl font-semibold text-gray-800">Genres:</span>
                    <span class="text-lg text-gray-600">Lorem ipsum.</span>
                </div>
                <div class="mt-6 flex space-x-4">
                    <a href="#"
                        class="bg-blue-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-700">Official
                        Website</a>
                    <a href="#"
                        class="bg-green-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-green-700">Buy
                        Now</a>
                </div>
            </div>
        </div>
    </x-interface.info-block>

    {{-- @section('scripts')
        @vite('resources/js/ROUTE_HERE')
    @endsection --}}

</x-layouts.app>
