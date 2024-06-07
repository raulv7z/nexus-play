@extends($getLayout)

@section('header')
    <x-interface.header-title :title="'Tickets'">
    </x-interface.header-title>

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs ?? []">
    </x-interface.breadcrumbs>
@endsection

@section('content')
    <x-interface.hidden-block>
        <x-interface.title :title="'Datatable'">
        </x-interface.title>
        <x-interface.gray-title :title="'Tickets'">
        </x-interface.gray-title>
    </x-interface.hidden-block>

    <x-interface.info-block>

        <x-links.add :url="route('admin.tickets.create')">
        </x-links.add>

        <x-interface.hr-xl>
        </x-interface.hr-xl>

        <x-tables.crud :url="route('admin.tickets.crud')">
        </x-tables.crud>

    </x-interface.info-block>

@endsection

@section('scripts')
    @vite('resources/js/modules/managers/tickets.js')
@endsection
