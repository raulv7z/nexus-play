@props(['editionId'])

<form action="{{ route('content.carts.remove', $editionId) }}" method="POST" class="inline">
    @csrf
    @method('DELETE')

    <x-buttons.remove-edition>
    </x-buttons.remove-edition>
</form>