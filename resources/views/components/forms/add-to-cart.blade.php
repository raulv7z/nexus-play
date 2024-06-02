@props(['editionId'])

<form action="{{ route('auth.carts.add', $editionId) }}" method="POST" class="block w-full sm:w-auto">
    @csrf
    @method('POST')

    <x-buttons.add-to-cart>
    </x-buttons.add-to-cart>
</form>