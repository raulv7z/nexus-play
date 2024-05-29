@extends('layouts.' . $getLayout)

@section('header')
    <x-interface.header-title>
    </x-interface.header-title>

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
    </x-interface.breadcrumbs>
@endsection

@section('content')
    <x-interface.info-block>
        <div class="max-w-xl">
            @include('partials.profiles.update-profile-information-form')
        </div>
    </x-interface.info-block>

    <x-interface.info-block>
        <div class="max-w-xl">
            @include('partials.profiles.update-password-form')
        </div>
    </x-interface.info-block>

    <x-interface.info-block>
        <div class="max-w-xl">
            @include('partials.profiles.delete-user-form')
        </div>
    </x-interface.info-block>
@endsection
