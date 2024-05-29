@extends('layouts.app')

@section('header')
    <x-interface.header-title>
    </x-interface.header-title>

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
    </x-interface.breadcrumbs>
@endsection

@section('content')
    {{-- Most rateds --}}

    <x-interface.hidden-block>
        <x-interface.title :title="'Most rateds'">
        </x-interface.title>
    </x-interface.hidden-block>

    <x-interface.info-block>

        <x-sections.game-section :editions="$editionsMostRated">
        </x-sections.game-section>

    </x-interface.info-block>

    {{-- Best sellers --}}

    <x-interface.hidden-block>
        <x-interface.title :title="'Best sellers'">
        </x-interface.title>
    </x-interface.hidden-block>

    <x-interface.info-block>

        <x-sections.game-section :editions="$editionsBestSeller">
        </x-sections.game-section>

    </x-interface.info-block>

    {{-- All editions --}}

    <x-interface.hidden-block>
        <x-interface.title :title="'All editions'">
        </x-interface.title>
    </x-interface.hidden-block>

    <x-interface.info-block>

        <x-sections.game-section :editions="$editionsAll">
        </x-sections.game-section>

    </x-interface.info-block>
@endsection
