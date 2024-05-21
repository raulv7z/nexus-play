@props(['edition'])

{{-- card container  --}}

<div class="w-fit">

    {{-- card body  --}}

    <div
        class="relative max-w-sm mx-auto overflow-hidden rounded-xl shadow-2xl transform transition-transform duration-500">

        <x-games.image :frontPage="$edition->videogame->front_page">
        </x-games.image>

        <div
            class="absolute inset-0 bg-gray-800 bg-opacity-80 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-500 ease-in-out dark:bg-opacity-90">
            <div class="text-center p-6">

                <x-games.description :description="$edition->videogame->description">
                </x-games.description>

                <div class="flex justify-center space-x-4">

                    <x-links.show-edition :link="route('content.editions.show', $edition->id)">
                    </x-links.show-edition>

                    <x-forms.add-to-cart :editionId="$edition->id">
                    </x-forms.add-to-cart>

                </div>

                <!-- Rating stars -->
                <div class="flex items-center justify-center mt-4">

                    <x-games.rating :value="$edition->rating">
                    </x-games.rating>

                </div>
            </div>
        </div>
    </div>

    {{-- card footer --}}

    <div class="flex items-center justify-between text-gray-900 dark:text-white">
        <div>
            <h3 class="text-md font-semibold">
                {{ $edition->videogame->name }}
            </h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                {{ $edition->platform->name }}
            </p>
        </div>
        <div>
            <p class="text-lg font-bold text-pink-600 dark:text-pink-400">
                {{ number_format($edition->amount, 2) }}&nbsp;€
            </p>
        </div>
    </div>

</div>
