@extends($getLayout)

@section('header')
    <x-interface.header-title :title="'My orders'">
    </x-interface.header-title>

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs ?? []">
    </x-interface.breadcrumbs>
@endsection

@section('content')

    <x-interface.info-block>

        {{ __('Write here...') }}

    </x-interface.info-block>

@endsection

@section('scripts')
    {{-- @vite('resources/js/ROUTE_HERE') --}}
@endsection