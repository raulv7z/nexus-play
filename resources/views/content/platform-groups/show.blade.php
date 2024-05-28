<x-layouts.app>
    <x-slot name="header">
        <x-interface.header-title>
        </x-interface.header-title>

        <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
        </x-interface.breadcrumbs>
    </x-slot>

    <x-interface.info-block>
        <div class="filter-editions">
            @include('content.platform-groups.partials.filter-editions', $platformGroup)
        </div>
    </x-interface.info-block>
    
    <x-interface.hidden-block>

        <x-interface.title :title="$platformGroup->name . ' Editions'">
        </x-interface.title>

    </x-interface.hidden-block>

    <x-interface.info-block>
        <div class="list-editions">
            @include('content.platform-groups.partials.list-editions', $editions)
        </div>
    </x-interface.info-block>

    @section('scripts')
        @vite('resources/js/modules/services/platform-groups/list-editions.js')
    @endsection

</x-layouts.app>
