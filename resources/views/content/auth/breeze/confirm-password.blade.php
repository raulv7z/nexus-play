@extends($getLayout)

@section('header')
    <x-interface.header-title :title="'Password Confirm'">
    </x-interface.header-title>
@endsection

@section('content')
    @include('partials.breeze.confirm-password')
@endsection