@props([
    'type' => 'text',
    'field',
    'label',
    'value' => null,
    'old' => null,
    'placeholder' => null,
])

<div class="form-group">
    <label for="{{ $field }}">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $field }}" id="{{ $field }}"
        value="{{ $value ?: old($field, $old) }}" placeholder="{{ $placeholder }}"
        class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-800 dark:text-white transition duration-150 ease-in-out"
        {{ $attributes }}>
    @error($field)
        <p class="mt-2 text-sm text-red-600 dark:text-red-400">
            {{ $message }}
        </p>
    @enderror
</div>
