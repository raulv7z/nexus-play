@props([
    'type' => 'text',
    'field' => null,
    'label' => null,
    'value' => null,
    'old' => null,
    'options' => null,
    'selected' => null,
    'placeholder' => null,
])

@if ($type === 'hidden')
    <input type="hidden" name="{{ $field }}" id="{{ $field }}" value="{{ $value ?: old($field, $old) }}"
        {{ $attributes }}>
@elseif($type === 'custom')
    <div class="form-group">
        {{ $slot }}
    </div>
@elseif($type === 'textarea')
    <div class="form-group">
        <label for="{{ $field }}">{{ $label }}</label>

        <textarea name="{{ $field }}" id="{{ $field }}"
            class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-800 dark:text-white transition duration-150 ease-in-out"
            placeholder="{{ $placeholder }}" {{ $attributes }}>{{ old($field, $old) }}</textarea>
    </div>
@elseif ($type === 'select')
    <div class="form-group">
        <label for="{{ $field }}">{{ $label }}</label>

        <select onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();' name="{{ $field }}" id="{{ $field }}"
            class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-800 dark:text-white transition duration-150 ease-in-out"
            {{ $attributes }}>
            @foreach ($options as $optionValue => $optionLabel)
                <option value="{{ $optionValue }}"
                    {{ (string) $optionValue === old($field, (string) $selected) ? 'selected' : '' }}>
                    {{ $optionLabel }}
                </option>
            @endforeach
        </select>
    </div>
@elseif($type === 'checkbox')
    <div class="form-group">
        <div class="flex items-center content-center mt-1">
            <input type="{{ $type }}" id="{{ $field }}" name="{{ $field }}"
                value="{{ $value }}"
                class="h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded dark:bg-gray-800 dark:border-gray-700">
            <label for="{{ $field }}" class="ml-2 block text-sm text-gray-700 dark:text-gray-100">
                {{ __($label) }}
            </label>
        </div>
    </div>
@else
    <div class="form-group">
        <label for="{{ $field }}">{{ $label }}</label>

        <input type="{{ $type }}" name="{{ $field }}" id="{{ $field }}"
            value="{{ $value ?: old($field, $old) }}" placeholder="{{ $placeholder }}"
            class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-800 dark:text-white transition duration-150 ease-in-out"
            {{ $attributes }}>
    </div>
@endif

@if ($type !== 'hidden' && $type !== 'custom')
    @error($field)
        <p class="mt-2 text-sm text-red-600 dark:text-red-400">
            {{ $message }}
        </p>
    @enderror
@endif
