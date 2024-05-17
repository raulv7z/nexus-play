<x-layouts.app>
    <x-slot name="header">
        <x-interface.header-title :content="$title">
        </x-interface.header-title>

        <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
        </x-interface.breadcrumbs>
    </x-slot>

    <x-interface.info-block>

        <x-buttons.add :url="route('admin.users.create')">
        
        </x-buttons.add>
        
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
