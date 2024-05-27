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

            <div class="partials-list-editions">
                {{-- @include('content.platform-groups.partials.list-editions', $editions) --}}
                <x-sections.game-section :editions="$editions"/>
            </div>
        @endforeach

    </x-interface.info-block>

    @section('scripts')
        {{-- @vite('resources/js/ROUTE_HERE') --}}
    @endsection

    <script>
        
        setTimeout(() => {
            console.log('hola');

            const elements = document.querySelectorAll(".partials-list-editions");
            elements.forEach(element => {
                element.innerHTML = '';
            })

        }, 2000);

    </script>

</x-layouts.app>
