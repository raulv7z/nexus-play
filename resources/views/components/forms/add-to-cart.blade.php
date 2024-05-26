@props(['editionId'])

<form action="{{ route('content.carts.add', $editionId) }}" method="POST" class="w-full sm:w-auto">
    @csrf
    @method('POST')

    <x-links.add-to-cart>
    </x-links.add-to-cart>
</form>
