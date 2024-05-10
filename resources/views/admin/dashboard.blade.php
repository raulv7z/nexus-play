<x-app-layout>

    <x-slot name="header">
        {{ __('Admin') }} CRUDS
    </x-slot>

    <x-interface.info-block>
        <x-sections.crud-section>

            @foreach ($cruds as $crud)
                <x-cards.crud-card :crud="$crud">

                </x-cards.crud-card>
            @endforeach

        </x-sections.crud-section>
    </x-interface.info-block>

</x-app-layout>
