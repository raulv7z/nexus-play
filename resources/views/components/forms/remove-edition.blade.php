@props(['editionId'])

<form action="{{ route('auth.carts.remove', $editionId) }}" method="POST" class="inline">
    @csrf
    @method('DELETE')

    <x-buttons.remove-edition>
    </x-buttons.remove-edition>
</form>