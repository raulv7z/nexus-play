@props([
    'type' => 'text',
    'field' => 'None',
    'label' => 'Label',
    'value' => null,
    'old' => null,
    'placeholder' => null,
])

@if ($type !== 'hidden')
    <div class="form-group">
        <label for="{{ $field }}">{{ $label }}</label>
@endif

@if ($type === 'select')
    <select name="{{ $field }}" id="{{ $field }}"
        class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-800 dark:text-white transition duration-150 ease-in-out"
        {{ $attributes }}>
        @foreach ($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}"
                {{ (string) $optionValue === old($field, (string) $old) ? 'selected' : '' }}>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>
@elseif($type === 'textarea')
    <textarea name="{{ $field }}" id="{{ $field }}"
        class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-800 dark:text-white transition duration-150 ease-in-out"
        placeholder="{{ $placeholder }}" {{ $attributes }}>{{ old($field, $old) }}</textarea>
@elseif($type === 'hidden')
    <input type="hidden" name="{{ $field }}" id="{{ $field }}"
        value="{{ $value ?: old($field, $old) }}" {{ $attributes }}>
@elseif($type === 'custom')
    {{ $slot }}
@else
    <input type="{{ $type }}" name="{{ $field }}" id="{{ $field }}"
        value="{{ $value ?: old($field, $old) }}" placeholder="{{ $placeholder }}"
        class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-800 dark:text-white transition duration-150 ease-in-out"
        {{ $attributes }}>
@endif

@if ($type !== 'hidden')
    @error($field)
        <p class="mt-2 text-sm text-red-600 dark:text-red-400">
            {{ $message }}
        </p>
    @enderror

    </div>
@endif
