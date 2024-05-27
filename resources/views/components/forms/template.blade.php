@props([
    'method' => 'POST',
    'action' => '#',
])

<form method="{{ $method == 'GET' ? 'GET' : 'POST' }}" action="{{ $action }}"
    class="space-y-6 mx-5 transition-all duration-300 ease-in-out">
    @csrf
    @method($method)

    <div class="">

        {{ $header }}

    </div>

    <div class="space-y-6">

        {{ $body }}

    </div>

    <div class="flex justify-end space-x-4 mt-4">

        {{ $foot }}

    </div>
</form>
