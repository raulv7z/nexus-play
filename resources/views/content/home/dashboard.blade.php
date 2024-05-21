<x-layouts.app>
    <x-slot name="header">
        <x-interface.header-title :content="$title">
        </x-interface.header-title>

        <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
        </x-interface.breadcrumbs>
    </x-slot>

    <x-interface.info-block>
        
        <x-blocks.success>
        </x-blocks.success>
        
        @foreach ($editions as $edition)
            <x-cards.game-card :edition="$edition">

            </x-cards.game-card>
        @endforeach



    </x-interface.info-block>

</x-layouts.app>