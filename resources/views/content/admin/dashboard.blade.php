@extends($getLayout)

@section('header')
    <x-interface.header-title>
    </x-interface.header-title>

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
    </x-interface.breadcrumbs>
@endsection

@section('content')

    <x-interface.hidden-block>
        <x-interface.title :title="'Dashboard'">
        </x-interface.title>
        <x-interface.gray-title :title="'Managers'">
        </x-interface.gray-title>
    </x-interface.hidden-block>
    <x-interface.info-block>
        <x-sections.manager-section>

            @foreach ($tablesInfo as $table)
                <x-cards.manager-card :table="$table">

                </x-cards.manager-card>
            @endforeach

        </x-sections.manager-section>
    </x-interface.info-block>
@endsection