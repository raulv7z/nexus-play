<x-layouts.app>
    <x-slot name="header">
        <x-interface.header-title>
        </x-interface.header-title>

        <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
        </x-interface.breadcrumbs>
    </x-slot>

    <x-interface.hidden-block>

        <x-interface.title :title="$platformGroup->name . ' Editions'">
        </x-interface.title>

    </x-interface.hidden-block>

    {{-- ! All editions (change this) --}}
    <x-interface.info-block>

        @foreach ($editionsByPlatform as $platformId => $editions)
            {{-- Título de la plataforma --}}
            <div class="flex justify-center text-center bg-gray-300 dark:bg-gray-600 rounded-lg p-5 my-5">
                <p>
                    {{ \App\Models\Platform::find($platformId)->name }}
                </p>
            </div>

            <x-sections.game-section :editions="$editions">
            </x-sections.game-section>
        @endforeach

    </x-interface.info-block>


</x-layouts.app>
