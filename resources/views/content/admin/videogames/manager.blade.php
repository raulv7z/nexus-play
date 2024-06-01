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
    </x-interface.hidden-block>

    <x-interface.info-block>

        <x-links.add :url="route('admin.videogames.create')">
        </x-links.add>

        <x-interface.hr-xl>
        </x-interface.hr-xl>

        <x-tables.crud :url="route('admin.videogames.crud')">
        </x-tables.crud>

    </x-interface.info-block>

    <x-interface.hidden-block>
        <x-interface.title :title="'Info graphs'">
        </x-interface.title>
    </x-interface.hidden-block>

    <x-interface.info-block>

        <x-graphs.chart :chartId="'chart-videogames'" :url="route('admin.videogames.chart')">

        </x-graphs.chart>

    </x-interface.info-block>
@endsection

@section('scripts')
    @vite('resources/js/modules/managers/videogames.js')
@endsection
