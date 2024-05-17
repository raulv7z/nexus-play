@php
    $title = 'Dashboard';

    $breadcrumbs = [
        ['title' => 'Home', 'url' => '/content'],
        ['title' => 'Admin', 'url' => '/admin'],
    ];
@endphp

<x-layouts.app>
    <x-slot name="header">
        <x-interface.header-title :content="$title">
        </x-interface.header-title>

        <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
        </x-interface.breadcrumbs>
    </x-slot>

    <x-interface.info-block>
        <x-sections.manager-section>

            @foreach ($tablesInfo as $table)
                <x-cards.manager-card :table="$table">

                </x-cards.manager-card>
            @endforeach

        </x-sections.manager-section>
    </x-interface.info-block>

</x-layouts.app>
