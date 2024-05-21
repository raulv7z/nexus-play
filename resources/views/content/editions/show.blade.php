<x-layouts.app>
    <x-slot name="header">
        <x-interface.header-title :content="$title">
        </x-interface.header-title>

        <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
        </x-interface.breadcrumbs>
    </x-slot>

    <x-interface.info-block>

        <div class="flex flex-col items-center justify-center lg:flex-row">

            <!-- Image Section -->
            <div class="w-full max-w-lg">
                <x-games.image :frontPage="$edition->videogame->front_page">
                </x-games.image>
            </div>

            <!-- Info Section -->
            <div class="w-full flex flex-col items-center justify-center">

                <h2 class="text-3xl font-bold text-yellow-400 dark:text-yellow-300">{{ $edition->videogame->name }}</h2>
                <p class="text-md text-gray-500 dark:text-gray-400">{{ $edition->platform->name }}</p>

                <div class="w-fit flex content-center justify-center mt-2">
                    <x-games.rating :value="$edition->rating">
                    </x-games.rating>
                </div>

                <p class="mt-5 text-gray-700 dark:text-gray-300">{{ $edition->videogame->description }}</p>

                {{-- !refactor this, overall stock --}}
                <div class="flex px-6 py-2 my-4 rounded-full bg-gray-200 dark:bg-gray-600">
                    <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $edition->videogame->genre }}</p>
                    <span class="divider mx-2">|</span>
                    <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $edition->stock > 0 ? 'In stock' : 'No stock' }}</p>
                </div>

                <x-games.price :amount="$edition->amount">
                </x-games.price>

                <div class="mt-4">
                    <x-forms.add-to-cart :editionId="$edition->id" />
                </div>
            </div>

        </div>

    </x-interface.info-block>

    <x-interface.info-block>

        <h2>Reviews</h2>

    </x-interface.info-block>

    {{-- @section('scripts')
        @vite('resources/js/ROUTE_HERE')
    @endsection --}}

</x-layouts.app>
