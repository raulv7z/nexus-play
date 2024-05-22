<x-layouts.app>
    <x-slot name="header">
        <x-interface.header-title :content="$title">
        </x-interface.header-title>

        <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
        </x-interface.breadcrumbs>
    </x-slot>

    <x-interface.info-block>

        <div
            class="flex flex-col items-center justify-center xl:flex-row rounded-lg xl:rounded-[5rem] bg-gradient-to-br from-gray-200 to-white dark:from-slate-900 dark:to-gray-800">

            <!-- Image Section -->
            <x-games.image-show :frontPage="$edition->videogame->front_page">
            </x-games.image-show>

            <!-- Info Section -->
            <div class="w-full py-10 xl:py-0 flex flex-col items-center justify-center">

                <h2 class="text-5xl font-bold text-[#4949de] dark:text-[#938ef5]">{{ $edition->videogame->name }}</h2>
                <p class="text-md text-gray-600 dark:text-gray-300">{{ $edition->platform->name }}</p>

                <div class="w-fit flex content-center justify-center mt-2 py-1">
                    <x-games.rating :value="$edition->rating">
                    </x-games.rating>
                    <p class="ml-2 font-bold text-yellow-400 dark:text-yellow-400">{{ number_format($edition->rating, 1) }}</p>
                </div>

                <div class="flex px-6 py-2 my-4 rounded-full items-center bg-gray-200 dark:bg-gray-900">
                    <p class="text-sm sm:text-lg font-semibold text-gray-800 dark:text-gray-200">
                        {{ $edition->videogame->genre }}
                    </p>
                    <span class="divider mx-2 text-gray-500 dark:text-gray-400">|</span>

                    @if ($edition->stock > 0)
                        <p class="text-sm sm:text-lg font-semibold text-emerald-600 dark:text-emerald-300">
                            {{ __('In stock') }}
                        </p>
                    @else
                        <p class="text-lg font-semibold text-orange-500 dark:text-orange-300">
                            {{ __('No stock') }}
                        </p>
                    @endif
                </div>

                <x-games.price-show :amount="$edition->amount">
                </x-games.price-show>

                <div class="mt-4">
                    <x-forms.single-add-to-cart :editionId="$edition->id" />
                </div>
            </div>

        </div>

    </x-interface.info-block>

    <x-interface.info-block>

        <h2>Reviews</h2>

        <h3>Agrega tu review</h3>
        <button class="btn px-5 py-1 bg-blue-300 rounded-full">
            review
        </button>

        <h3>reviews de otros usuarios</h3>
        <div>
            @foreach ($edition->reviews as $review)
                <div class="p-3 my-4 rounded-lg bg-blue-100 dark:bg-blue-900">
                    <p class="font-bold">Review de {{ $review->user->name }}</p>
                    <div class="w-fit flex content-center justify-center mt-2">
                        <x-games.rating :value="$review->rating">
                        </x-games.rating>
                    </div>
                    <p class="">{{ $review->comment }}</p>
                    <p class="text-emerald-600">{{ $review->verified ? 'Verificado' : 'No verificado' }}</p>
                </div>
            @endforeach
        </div>

    </x-interface.info-block>

    {{-- @section('scripts')
        @vite('resources/js/ROUTE_HERE')
    @endsection --}}

</x-layouts.app>
