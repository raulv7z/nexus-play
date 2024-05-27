@props(['editions' => []])

<div class="w-full grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-10"
    {{ $attributes }}>
    @foreach ($editions as $edition)
        <div class="w-full flex justify-center">
            <x-cards.game-card :edition="$edition">
            </x-cards.game-card>
        </div>
    @endforeach
</div>
