@extends($getLayout)

@section('header')
    <x-interface.header-title :title="'My orders'">
    </x-interface.header-title>

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs ?? []">
    </x-interface.breadcrumbs>
@endsection

@section('content')

    {{-- User Orders --}}

    @if ($orders->isEmpty())
        <x-interface.info-block>
            <x-interface.subtitle :subtitle="'You have no orders yet.'">
            </x-interface.subtitle>

            <a href="#">
                {{ __("Go shopping") }}
            </a>
            
        </x-interface.info-block>
    @else
        {{-- paginate linking --}}
        <x-interface.hidden-block>
            {{ $orders->links() }}
        </x-interface.hidden-block>

        @foreach ($orders as $order)
            <x-interface.hidden-block>
                <x-interface.title :title="'#' . $order->invoice_number">
                </x-interface.title>
            </x-interface.hidden-block>

            <x-interface.info-block>
                <x-sections.profile-order :order="$order" />
            </x-interface.info-block>
        @endforeach
    @endif

@endsection

@section('scripts')
    {{-- @vite('resources/js/ROUTE_HERE') --}}
@endsection
