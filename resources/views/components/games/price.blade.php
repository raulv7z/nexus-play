@props(['price' => '0.00'])

<div class="flex items-center space-x-2 bg-black bg-opacity-90 px-3 py-1 rounded-lg">
    <span class="text-yellow-300 text-lg lg:text-xl font-semibold">
        {{ __($price) }} €
    </span>
</div>