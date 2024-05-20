@props(['game'])

<div
    class="relative max-w-sm mx-auto overflow-hidden rounded-xl shadow-2xl transform transition-transform duration-500 hover:">

    <x-games.image>
    </x-games.image>

    <div
        class="absolute inset-0 bg-gray-800 bg-opacity-80 flex items-start justify-center opacity-0 hover:opacity-100 transition-opacity duration-500 ease-in-out dark:bg-opacity-90">
        <div class="text-center p-6">
            
            {{-- !update --}}
            <x-games.description>
            </x-games.description>

            <div class="flex justify-center space-x-4">

                {{-- !update --}}
                <x-links.show-edition>
                </x-links.show-edition>

                {{-- !update --}}
                <x-links.add-to-cart>
                </x-links.add-to-cart>

            </div>

            <!-- Rating stars -->
            <div class="flex items-center justify-center mt-4">

                {{-- !update --}}
                <x-games.rating>
                </x-games.rating>

            </div>
        </div>
    </div>
    <div
        class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-gray-900 via-gray-800 to-transparent p-4 flex justify-between items-center dark:from-black dark:via-gray-900">
        <div class="flex flex-col items-start space-y-1">

            {{-- !update --}}
            <x-games.title>
            </x-games.title>

            {{-- !update --}}
            <x-games.platform>
            </x-games.platform>

        </div>

        {{-- !update --}}
        <x-games.price>
        </x-games.price>

    </div>
</div>
