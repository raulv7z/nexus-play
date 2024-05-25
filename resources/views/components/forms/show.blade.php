@props(['item', 'fields' => [], 'actions' => []])

<div class="space-y-6 mx-5 transition-all duration-300 ease-in-out">
    @if (isset($fields['title']))
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">{{ $item->{$fields['title']} }}</h1>
    @endif

    <!-- Información del recurso -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{ $slot }}

        @foreach ($fields['attributes'] as $label => $attribute)
            <div class="bg-gray-100 dark:bg-gray-600 p-4 rounded-lg">
                <p class="text-gray-800 dark:text-gray-200 font-semibold">{{ __($label) }}:</p>
                <p class="text-gray-900 dark:text-white">{{ $item->{$attribute} }}</p>
            </div>
        @endforeach
    </div>

    <!-- Acciones disponibles -->
    <div class="flex justify-end space-x-4 mt-4">

        <x-buttons.return>
        </x-buttons.return>

        <x-buttons.edit :url="route($actions['edit'], $item->id)">
        </x-buttons.edit>

        <x-buttons.delete :url="route($actions['delete'], $item->id)">
        </x-buttons.delete>
    </div>
</div>