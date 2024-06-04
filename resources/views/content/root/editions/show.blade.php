@extends($getLayout)

@section('header')
    <x-interface.header-title>
    </x-interface.header-title>

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs ?? []">
    </x-interface.breadcrumbs>
@endsection

@section('content')
    <x-interface.info-block>

        <div
            class="flex flex-col items-center justify-center xl:flex-row rounded-lg xl:rounded-[5rem] bg-gradient-to-br from-gray-200 to-white dark:from-slate-900 dark:to-gray-800">

            <!-- Image Section -->
            <x-games.image-show :frontPage="$edition->videogame->front_page">
            </x-games.image-show>

            <!-- Info Section -->
            <div class="w-full py-10 xl:py-0 flex flex-col items-center justify-center">

                <h2 class="text-xl 2xl:text-2xl font-bold text-[#4949de] dark:text-[#938ef5]">{{ $edition->videogame->name }}</h2>
                <p class="text-md text-gray-600 dark:text-gray-300">{{ $edition->platform->name }}</p>

                <div class="w-fit flex content-center items-center justify-center mt-2 py-1">
                    <p
                        class="mr-3 bg-gray-800 dark:bg-black rounded-full p-3 font-bold text-yellow-300 dark:text-yellow-300">
                        {{ number_format($edition->rating, 1) }}</p>
                    <x-games.rating :value="$edition->rating">
                    </x-games.rating>
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

    <x-interface.hidden-block>
        <x-interface.title :title="'Reviews'"></x-interface.title>
    </x-interface.hidden-block>

    <x-interface.info-block>
        <x-links.create-review :link="route('auth.reviews.create', $edition->id)">
        </x-links.create-review>

        <x-interface.hr-xl>
        </x-interface.hr-xl>

        <div class="reviews">
            @if ($reviews->isNotEmpty())
                @foreach ($reviews as $review)
                    <x-blocks.review :review="$review"></x-blocks.review>

                    @if (!$loop->last)
                        <x-interface.hr />
                    @endif
                @endforeach
            @else
                <x-interface.subtitle :subtitle="'There are no reviews for this game.'">
                </x-interface.subtitle>
            @endif
        </div>

        {{-- paginate link --}}
        {{ $reviews->links() }}

    </x-interface.info-block>
@endsection
