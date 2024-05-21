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

        <x-sections.game-section>
            @foreach ($editions as $edition)
            <div class="w-full flex justify-center">
                <x-cards.game-card :edition="$edition">

                </x-cards.game-card>
            </div>
            @endforeach
        </x-sections.game-section>
    </x-interface.info-block>

</x-layouts.app>
