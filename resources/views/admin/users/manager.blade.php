<x-layouts.app>


    <x-slot name="header">
        {{ __('Redefine this!') }}
    </x-slot>

    <x-interface.info-block>

        <x-tables.crud :url="route('admin.users.crud')">

        </x-tables.crud>

    </x-interface.info-block>

    <x-interface.info-block>

        <x-graphs.chart :chartId="'users'" :url="route('admin.users.chart')">

        </x-graphs.chart>

    </x-interface.info-block>


    @section('scripts')
        @vite('resources/js/modules/managers/users.js')
    @endsection

</x-layouts.app>
