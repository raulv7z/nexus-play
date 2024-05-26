@props([
    'action' => '#',
    'model',
    'fields' => [],
])

<form method="POST" action="{{ $action }}" class="space-y-6 mx-5 transition-all duration-300 ease-in-out">
    @csrf
    @method('DELETE')

    <!-- Encabezado para advertencia sobre la eliminación -->
    <div class="mb-6">
        <h2 class="text-lg font-bold text-red-700 dark:text-red-400">{{ __('Delete confirmation') }}</h2>
        <p class="text-gray-600 dark:text-gray-300">
            {{ __('You are about to delete a record. Please carefully review the data displayed before proceeding.') }}
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{ $slot }}

        @foreach ($fields as $field)
            @if ($field['type'] === 'hidden')
                <input type="hidden" id="{{ $field['name'] }}" name="{{ $field['name'] }}"
                    value="{{ old($field['name'], $model->{$field['name']} ?? '') }}">
            @else
                <div class="form-group">
                    <label for="{{ $field['name'] }}"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-100">{{ __($field['label']) }}</label>

                    @if ($field['type'] === 'text' || $field['type'] === 'password')
                        <input type="{{ $field['type'] }}" id="{{ $field['name'] }}" name="{{ $field['name'] }}"
                            value="{{ $model->{$field['name']} ?? '' }}" disabled
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white opacity-50 cursor-not-allowed">
                    @elseif ($field['type'] === 'textarea')
                        <textarea id="{{ $field['name'] }}" name="{{ $field['name'] }}" rows="4" disabled
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white opacity-50 cursor-not-allowed">{{ $model->{$field['name']} ?? '' }}</textarea>
                    @elseif ($field['type'] === 'select')
                        <select id="{{ $field['name'] }}" name="{{ $field['name'] }}" disabled
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white opacity-50 cursor-not-allowed">
                            @foreach ($field['options'] as $option)
                                <option value="{{ $option['value'] }}"
                                    {{ ($model->{$field['name']} ?? '') == $option['value'] ? 'selected' : '' }}>
                                    {{ $option['label'] }}
                                </option>
                            @endforeach
                        </select>
                    @elseif ($field['type'] === 'checkbox')
                        <div class="flex items-center mt-1">
                            <input type="checkbox" id="{{ $field['name'] }}" name="{{ $field['name'] }}"
                                value="{{ $field['value'] }}" disabled
                                class="h-4 w-4 text-indigo-600 border-gray-300 rounded dark:bg-gray-800 dark:border-gray-700 opacity-50 cursor-not-allowed">
                            <label for="{{ $field['name'] }}"
                                class="ml-2 block text-sm text-gray-700 dark:text-gray-100">
                                {{ $field['label'] }}
                            </label>
                        </div>
                    @endif
                </div>
            @endif
        @endforeach
    </div>

    <div class="flex justify-end space-x-4 mt-8">
        <x-links.return>
        </x-links.return>

        <x-buttons.submit :text="'Confirm'">
        </x-buttons.submit>
    </div>
</form>
