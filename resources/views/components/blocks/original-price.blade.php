@props(['price' => "0.00"])

<dl class="flex items-center justify-between gap-4">
    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
        {{ __('Original price') }}
    </dt>
    <dd class="text-base font-medium text-gray-900 dark:text-white">
        {{ $price }} €
    </dd>
</dl>