<x-layouts.app>
    <x-slot name="header">
        <x-interface.header-title>
        </x-interface.header-title>

        <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
        </x-interface.breadcrumbs>
    </x-slot>

    <x-interface.info-block>
        {{ __('Write the content from here!') }}
    </x-interface.info-block>

    @section('scripts')
        {{-- @vite('resources/js/ROUTE_HERE') --}}
    @endsection

</x-layouts.app>
