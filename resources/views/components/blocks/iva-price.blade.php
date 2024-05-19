@props(['iva' => '21.00'])

<dl class="flex items-center justify-between gap-4">
    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">
        {{ __('IVA') }}
    </dt>
    <dd class="text-base font-medium text-red-800 dark:text-red-400">
        {{ $iva }} %
    </dd>
</dl>
