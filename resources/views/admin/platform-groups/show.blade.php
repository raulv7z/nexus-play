<x-layouts.app>
    <x-slot name="header">
        <x-interface.header-title :content="$title">
        </x-interface.header-title>

        <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
        </x-interface.breadcrumbs>
    </x-slot>

    {{-- {{ $platformGroup->name }}

    @foreach ($platformGroup->platforms as $platform)
        <x-cards.platform-card :platform="$platform">

        </x-cards.platform-card>
    @endforeach --}}

</x-layouts.app>
