@props(['editionId'])

<form action="{{ route('content.carts.decrement', $editionId) }}" method="POST" class="inline">
    @csrf
    @method('PUT')

    <x-buttons.decrement-quantity>
    </x-buttons.decrement-quantity>
</form>
