@extends($getLayout)

@section('header')
    <x-interface.header-title>
    </x-interface.header-title>

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
    </x-interface.breadcrumbs>
@endsection

@section('content')
    <x-interface.info-block>
        <x-sections.manager-section>

            @foreach ($tablesInfo as $table)
                <x-cards.manager-card :table="$table">

                </x-cards.manager-card>
            @endforeach

        </x-sections.manager-section>
    </x-interface.info-block>
@endsection