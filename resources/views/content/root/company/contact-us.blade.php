@extends($getLayout)

@section('header')
    <x-interface.header-title :title="'Company'">
    </x-interface.header-title>
@endsection

@section('content')
    @include('partials.company.contact-us')
@endsection