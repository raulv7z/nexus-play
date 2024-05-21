<x-layouts.app>
    <x-slot name="header">
        <x-interface.header-title :content="$title">
        </x-interface.header-title>

        <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
        </x-interface.breadcrumbs>
    </x-slot>

    <x-interface.info-block>

        <div class="flex flex-col lg:flex-row items-center lg:items-start">
            <!-- Image Section -->
            <div class="w-full max-w-lg">
                <x-games.image :frontPage="$edition->videogame->front_page">
                </x-games.image>
            </div>
            <!-- Info Section -->
            
            <div>

                <h1>info</h1>
                
            </div>

        </div>
    </x-interface.info-block>

    {{-- @section('scripts')
        @vite('resources/js/ROUTE_HERE')
    @endsection --}}

</x-layouts.app>
