@props(['editionId'])

<form action="{{ route('content.carts.add', $editionId) }}" method="POST" class="inline">
    @csrf
    @method('POST')

    <x-buttons.add-to-cart>
    </x-buttons.add-to-cart>
</form>
