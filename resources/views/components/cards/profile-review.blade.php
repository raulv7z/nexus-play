{{-- !CHANGE --}}

@props(['order'])

<div class="flex justify-center items-center p-3 rounded-lg bg-gray-100 dark:bg-gray-700">
    <div class="h-24">
        <p>
            {{ $order->edition_id }}
        </p>
        {{-- <img src="{{Storage::url('images/games/front-pages/' . $order->edition->videogame->front_page)}}" alt="image"> --}}
    </div>
</div>