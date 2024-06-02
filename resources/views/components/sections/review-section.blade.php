@props(['reviews' => []])

@if ($reviews->isEmpty())
    <div class="w-full flex justify-center my-5">
        <x-interface.subtitle :subtitle="'No reviews found.'">
        </x-interface.subtitle>
    </div>
@else
    <div class="w-full grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-10"
        {{ $attributes }}>
        @foreach ($reviews as $review)
            <div class="w-full flex justify-center">
                <x-cards.review-card :review="$review">
                </x-cards.review-card>
            </div>
        @endforeach
    </div>
@endif