@extends($getLayout)

@section('header')
    <x-interface.header-title>
    </x-interface.header-title>
@endsection

@section('content')
    @include('partials.breeze.forgot-password')
@endsection