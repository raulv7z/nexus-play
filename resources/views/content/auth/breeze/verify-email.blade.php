@extends($getLayout)

@section('header')
    <x-interface.header-title :title="'Email Verification'">
    </x-interface.header-title>
@endsection

@section('content')
    @include('partials.breeze.verify-email')
@endsection