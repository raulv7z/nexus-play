@props(['entry'])

<div class="w-full flex flex-col lg:flex-row justify-center items-center rounded-lg bg-gray-100 dark:bg-gray-700">
    <div class="w-full lg:w-1/3 object-cover">
        <img class="rounded-lg"
            src="{{ Storage::url('images/games/front-pages/' . $entry->edition->videogame->front_page) }}" alt="image">
    </div>
    <div class="w-full lg:w-2/3 p-10 flex flex-col lg:flex-row lg:items-center lg:content-center">
        <div class="flex flex-col w-full lg:w-3/4 h-3/4 lg:h-full gap-y-5">
            <div>
                <h2 class="font-bold text-3xl text-pink-600 dark:text-pink-400">
                    {{ $entry->edition->videogame->name }}
                </h2>
            </div>
            <div>
                <p class="text-lg">
                    <span class="font-bold">- {{ __('System') }}: </span>
                    <span class="">{{ $entry->edition->platform->group->name }}</span>
                </p>
                <p class="text-lg">
                    <span class="font-bold">- {{ __('Platform') }}: </span>
                    <span class="">{{ $entry->edition->platform->name }}</span>
                </p>
                <p class="text-lg">
                    <span class="font-bold">- {{ __('Quantity') }}: </span>
                    <span class="text-orange-500 dark:text-orange-300">{{ $entry->quantity }}</span>
                </p>
                <p class="text-lg">
                    <span class="font-bold">- {{ __('Unit/Amount') }}: </span>
                    <span class="font-bold text-green-500 dark:text-green-300">{{ $entry->unit_amount }} <span class="text-xs">€</span></span>
                </p>
            </div>
        </div>
        <div class="flex justify-center items-center content-center w-full mt-5 lg:mt-0 lg:w-1/4 h-3/4 lg:h-full">
            <x-links.show-edition :link="route('root.editions.show', $entry->edition->id)" />
        </div>
    </div>
</div>
