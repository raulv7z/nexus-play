@props(['editionId'])

<form action="{{ route('auth.carts.increment', $editionId) }}" method="POST" class="inline">
    @csrf
    @method('PUT')

    <x-buttons.increment-quantity>
    </x-buttons.increment-quantity>
</form>
