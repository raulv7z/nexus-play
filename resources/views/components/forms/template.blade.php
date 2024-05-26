@props([
    'method' => 'POST',
    'action' => '#',
])

<form method="{{ $method }}" action="{{ $action }}" class="space-y-6 mx-5 transition-all duration-300 ease-in-out">
    @csrf

    <div class="space-y-6">

        {{ $body }}

    </div>

    <div class="flex justify-end space-x-4 mt-4">

        {{ $foot }}

    </div>
</form>
