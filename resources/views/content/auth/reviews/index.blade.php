@extends($getLayout)

@section('header')
    <x-interface.header-title :title="'My reviews'">
    </x-interface.header-title>

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs ?? []">
    </x-interface.breadcrumbs>
@endsection

@section('content')
    <x-interface.hidden-block>

        {{-- paginate linking --}}
        {{ $reviews->links() }}

    </x-interface.hidden-block>

    <x-interface.info-block>

        <x-sections.review-section :reviews="$reviews" />

    </x-interface.info-block>
@endsection

@section('scripts')
    {{-- @vite('resources/js/ROUTE_HERE') --}}
@endsection
