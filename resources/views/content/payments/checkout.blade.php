@extends('layouts.' . $getLayout)

@section('header')
    <x-interface.header-title>
    </x-interface.header-title>

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
    </x-interface.breadcrumbs>
@endsection

@section('content')
    <x-interface.info-block>

        <x-forms.checkout :action="route('content.payments.confirm')">
        </x-forms.checkout>

    </x-interface.info-block>
@endsection
