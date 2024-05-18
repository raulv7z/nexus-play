@props(['discount' => '0.00'])

<dl class="flex items-center justify-between gap-4">
    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
        {{ __('Discounts') }}
    </dt>
    <dd class="text-base font-medium text-green-700 dark:text-green-400">
        - {{ $discount }} €
    </dd>
</dl>
