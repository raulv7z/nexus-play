@props([
    'method' => 'POST',
    'action' => '#',
])

<form method="{{ $method == 'GET' ? 'GET' : 'POST' }}" action="{{ $action }}" enctype="multipart/form-data"
    class="py-6 mx-5 transition-all duration-300 ease-in-out" {{ $attributes }}>
    
    @if ($method != 'GET')
        @csrf
    @endif

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
