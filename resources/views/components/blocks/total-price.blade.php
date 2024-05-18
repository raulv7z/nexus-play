@props(['price' => "0.00"])

<dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
    <dt class="text-base font-bold text-gray-900 dark:text-white">
        {{ __('Total price') }}
    </dt>
    <dd class="text-base font-bold text-blue-800 dark:text-blue-400">
        {{ $price }} €
    </dd>
</dl>
