@props(['review'])

{{-- card container  --}}

<div class="w-full bg-gray-100 dark:bg-gray-700 rounded-xl shadow-lg pt-10">

    <div
        class="flex flex-col gap-4 px-10 justify-center items-center min-w-full">
        <div class="flex flex-col justify-center text-center gap-1">
            <p class="font-bold">
                {{ $review->user->name }}
            </p>
            <p class="text-gray-500 line-clamp-2 dark:text-gray-400">
                {{ __($review->comment) }}
            </p>
        </div>
        <div class="flex flex-row">
            <x-games.rating :value="$review->rating">

            </x-games.rating>
        </div>
        <div>
            <p class="font-bold text-pink-600 dark:text-pink-400">
                {{ $review->edition->videogame->name }}
            </p>
        </div>

        {{-- card links --}}

        <div>
            <x-links.show-edition :link="route('root.editions.show', $review->edition->id)">
            </x-links.show-edition>
        </div>
    </div>

    {{-- card foot --}}

    <div class="w-full flex justify-start items-end p-3">
        <p class="italic">
            {{$review->created_at->diffForHumans()}}
        </p>
    </div>

</div>
