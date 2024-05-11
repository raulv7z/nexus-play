<x-layouts.app>

    <x-slot name="header">
        {{ __('Admin') }} CRUDS
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
