@extends('layouts.app')

@section('header')
    <x-interface.header-title>
    </x-interface.header-title>

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
    </x-interface.breadcrumbs>
@endsection

@section('content')
    <x-interface.info-block>
        <div class="filter-editions">
            @include('partials.platform-groups.filter-editions', $platformGroup)
        </div>
    </x-interface.info-block>

    <x-interface.hidden-block>

        <x-interface.title :title="$platformGroup->name . ' Editions'">
        </x-interface.title>

    </x-interface.hidden-block>

    <x-interface.info-block>
        <div class="list-editions">
            @include('partials.editions.list', $editions)
        </div>
    </x-interface.info-block>
@endsection

@section('scripts')
    @vite('resources/js/modules/services/platform-groups/list-editions.js')
@endsection
