<x-layouts.app>
    <x-slot name="header">
        <x-interface.header-title>
        </x-interface.header-title>

        <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
        </x-interface.breadcrumbs>
    </x-slot>

    <x-interface.hidden-block>
        <x-interface.title :title="'Most rated editions'">
        </x-interface.title>
    </x-interface.hidden-block>

    <x-interface.info-block>

        <x-sections.game-section>

            @foreach ($editionsMostRated as $edition)
                <div class="w-full flex justify-center">
                    <x-cards.game-card :edition="$edition">
                    </x-cards.game-card>
                </div>
            @endforeach
        </x-sections.game-section>

    </x-interface.info-block>

    <x-interface.hidden-block>
        <x-interface.title :title="'All editions'">
        </x-interface.title>
    </x-interface.hidden-block>

    <x-interface.info-block>

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
