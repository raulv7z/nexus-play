@extends($getLayout)

@section('header')
    <x-interface.header-title>
    </x-interface.header-title>

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
    </x-interface.breadcrumbs>
@endsection

@section('content')
    <x-interface.hidden-block>
        <x-interface.title :title="'Datatable'">
        </x-interface.title>
        <x-interface.gray-title :title="'Platforms'">
        </x-interface.gray-title>
    </x-interface.hidden-block>

    <x-interface.info-block>

        <x-links.add :url="route('admin.platforms.create')">
        </x-links.add>

        <x-interface.hr-xl>
        </x-interface.hr-xl>

        <x-tables.crud :url="route('admin.platforms.crud')">
        </x-tables.crud>

    </x-interface.info-block>

    <x-interface.hidden-block>
        <x-interface.title :title="'Info graphs'">
        </x-interface.title>
        <x-interface.gray-title :title="'Platforms'">
        </x-interface.gray-title>
    </x-interface.hidden-block>

    <x-interface.info-block>

        <x-graphs.chart :chartId="'chart-platforms'" :url="route('admin.platforms.chart')">

        </x-graphs.chart>

    </x-interface.info-block>
@endsection

@section('scripts')
    @vite('resources/js/modules/managers/platforms.js')
@endsection