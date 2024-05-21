@props(['editionId'])

<form action="{{ route('content.carts.add', $editionId) }}" method="POST" class="w-full sm:w-auto">
    @csrf
    @method('POST')

    <x-buttons.add-to-cart>
    </x-buttons.add-to-cart>
</form>
