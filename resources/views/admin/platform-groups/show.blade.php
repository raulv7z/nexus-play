<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- {{ $platformGroup->name }}

    @foreach ($platformGroup->platforms as $platform)
        <x-cards.platform-card :platform="$platform">

        </x-cards.platform-card>
    @endforeach --}}

</x-layouts.app>
