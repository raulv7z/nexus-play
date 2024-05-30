@props(['editionId'])

<form action="{{ route('auth.carts.add', $editionId) }}" method="POST" class="w-full sm:w-auto">
    @csrf
    @method('POST')

    <x-buttons.single-add-to-cart>
    </x-buttons.single-add-to-cart>
</form>