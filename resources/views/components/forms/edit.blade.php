@props([
    'action' => '#',
    'model',
    'fields' => [],
])

<form method="POST" action="{{ $action }}"
    class="space-y-6 bg-white dark:bg-gray-700 p-8 rounded-xl shadow-2xl border border-gray-300 dark:border-gray-700 transition-all duration-300 ease-in-out">
    @csrf
    @method('PUT')

    <div class="space-y-6">

        {{ $slot }}

        @foreach ($fields as $field)
            @if ($field['type'] === 'hidden')
                <input type="hidden" id="{{ $field['name'] }}" name="{{ $field['name'] }}" value="{{ old($field['name'], $model->{$field['name']} ?? '') }}">
            @else
                <div class="form-group">
                    <label for="{{ $field['name'] }}"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-100">{{ __($field['label']) }}</label>

                    @if ($field['type'] === 'text')
                        <input type="text" id="{{ $field['name'] }}" name="{{ $field['name'] }}"
                            value="{{ old($field['name'], $model->{$field['name']} ?? '') }}"
                            class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-800 dark:text-white transition duration-150 ease-in-out">
                    @elseif ($field['type'] === 'textarea')
                        <textarea id="{{ $field['name'] }}" name="{{ $field['name'] }}" rows="4"
                            class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-800 dark:text-white transition duration-150 ease-in-out">{{ old($field['name'], $model->{$field['name']} ?? '') }}</textarea>
                    @elseif ($field['type'] === 'select')
                        <select id="{{ $field['name'] }}" name="{{ $field['name'] }}"
                            class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-800 dark:text-white transition duration-150 ease-in-out">
                            @foreach ($field['options'] as $option)
                                <option value="{{ $option['value'] }}"
                                    {{ old($field['name'], $model->{$field['name']} ?? '') == $option['value'] ? 'selected' : '' }}>
                                    {{ $option['label'] }}
                                </option>
                            @endforeach
                        </select>
                    @elseif ($field['type'] === 'checkbox')
                        <div class="flex items-center mt-1">
                            <input type="checkbox" id="{{ $field['name'] }}" name="{{ $field['name'] }}"
                                value="{{ $field['value'] }}"
                                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded dark:bg-gray-800 dark:border-gray-700"
                                {{ old($field['name'], $model->{$field['name']} ?? '') == $field['value'] ? 'checked' : '' }}>
                            <label for="{{ $field['name'] }}" class="ml-2 block text-sm text-gray-700 dark:text-gray-100">
                                {{ $field['label'] }}
                            </label>
                        </div>
                    @elseif ($field['type'] === 'password')
                        <input type="password" id="{{ $field['name'] }}" name="{{ $field['name'] }}"
                            class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-800 dark:text-white transition duration-150 ease-in-out">
                    @endif

                    @error($field['name'])
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            @endif
        @endforeach
    </div>

    <div class="flex justify-end space-x-4 mt-4">
        <x-buttons.return>
        </x-buttons.return>

        <x-buttons.submit :text="'Save'">
        </x-buttons.submit>
    </div>
</form>
