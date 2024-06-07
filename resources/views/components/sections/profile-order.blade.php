@props(['order' => []])

<div class="w-full h-full flex flex-col gap-y-5">

    <div class="w-full">
        <div class="my-5">
            <x-interface.subtitle :subtitle="'Order summary'">
            </x-interface.subtitle>
        </div>
    
        <div class="rounded-lg bg-gray-100 dark:bg-gray-700">
            <div class="flex justify-center rounded-lg py-5 text-white bg-gray-700 dark:bg-gray-900">
                <p class="text-lg">
                    <span class="font-bold">{{ __('#') }}: </span>
                    <span class="">{{ $order->invoice_number }}</span>
                </p>
            </div>
            <div class="p-5">
                <p class="text-lg">
                    <span class="font-bold">{{ __('Order amount') }}: </span>
                    <span class="font-bold text-green-500 dark:text-green-300">{{ $order->full_amount }} €</span>
                </p>
                <p class="text-lg">
                    <span class="font-bold">{{ __('Purchase date') }}: </span>
                    <span class="font-bold text-blue-600 dark:text-blue-300">{{ $order->issued_at }}</span>
                </p>
            </div>
        </div>
    </div>

    <div class="w-full">
        <div class="my-5">
            <x-interface.subtitle :subtitle="'Order details'">
            </x-interface.subtitle>
        </div>
    
        <div class="w-full gap-5 justify-center items-start flex flex-col">
            @foreach ($order->entries as $entry)
                <x-cards.profile-order-entry :entry="$entry">
                </x-cards.profile-order-entry>
            @endforeach
        </div>
    </div>
</div>