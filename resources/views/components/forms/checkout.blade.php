@props(['action'=>'#'])

<form action="{{ $action }}" method="POST" class="inline">
    @csrf

    <x-buttons.submit>
    </x-buttons.submit>
</form>