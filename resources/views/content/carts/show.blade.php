<x-layouts.app>
    <x-slot name="header">
        <x-interface.header-title :content="$title">
        </x-interface.header-title>

        <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
        </x-interface.breadcrumbs>
    </x-slot>

    <x-interface.info-block>
        {{ __('Write the content from here!') }}

        <h1>Tu Carrito</h1>

        @if ($cart->entries->isEmpty())
            <p>Tu carrito está vacío.</p>
        @else
            <ul>
                @foreach ($cart->entries as $entry)
                    <li>{{ $entry->edition->videogame->name }} - Cantidad: {{ $entry->quantity }}</li>
                @endforeach
            </ul>
        @endif
    </x-interface.info-block>

</x-layouts.app>
