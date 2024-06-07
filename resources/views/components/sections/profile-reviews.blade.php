{{-- !CHANGE --}}
@props(['orders' => []])

<div class="w-full gap-5 justify-center items-center grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3">

    @foreach ($orders as $order)
        <x-cards.profile-order :order="$order" />
    @endforeach

</div>

{{-- paginate link --}}
{{ $orders->links() }}
