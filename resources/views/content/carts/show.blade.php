<x-layouts.app>
    <x-slot name="header">
        <x-interface.header-title>
        </x-interface.header-title>
    </x-slot>

    <x-interface.hidden-block>
        <x-interface.title :title="'My cart'">
        </x-interface.title>
    </x-interface.hidden-block>
    
    <x-interface.info-block>
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">

            <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                <div class="mx-auto w-full flex-none lg:max-w-xl xl:max-w-3xl">
                    <div class="space-y-6">
                        @if ($cart->entries->isEmpty())
                            <x-interface.subtitle :subtitle="'You have no items in your cart.'">
                            </x-interface.subtitle>
                        @else
                            @foreach ($cart->entries as $entry)
                                <div
                                    class="cart-entry rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                                    <div
                                        class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">

                                        {{-- each product image here --}}

                                        <x-links.edition-image :link="route('content.editions.show', $entry->edition->id)" :imageName="$entry->edition->videogame->front_page">
                                        </x-links.edition-image>

                                        <x-labels.choose-quantity>
                                        </x-labels.choose-quantity>

                                        <div class="flex items-center justify-between md:order-3 md:justify-end">
                                            <div class="flex items-center">

                                                {{-- quantities here --}}

                                                <x-forms.decrement-quantity :editionId="$entry->edition->id">
                                                </x-forms.decrement-quantity>

                                                <x-inputs.product-quantity :value="$entry->quantity">
                                                </x-inputs.product-quantity>

                                                <x-forms.increment-quantity :editionId="$entry->edition->id">
                                                </x-forms.increment-quantity>

                                            </div>

                                            <div class="text-end md:order-4 md:w-32">

                                                {{-- each edition price here --}}
                                                <x-labels.product-price :price="$entry->edition->amount">
                                                </x-labels.product-price>

                                            </div>
                                        </div>

                                        <div class="w-full min-w-0 flex-1 space-y-2 md:order-2 md:max-w-md">

                                            {{-- each edition name, platform and remove link here --}}

                                            <x-links.edition-name :link="route('content.editions.show', $entry->edition->id)" :name="$entry->edition->videogame->name">
                                            </x-links.edition-name>

                                            <x-paragraphs.edition-platform :name="$entry->edition->platform->name">
                                            </x-paragraphs.edition-platform>

                                            <div class="flex items-center gap-4">
                                                <x-forms.remove-edition :editionId="$entry->edition->id">
                                                </x-forms.remove-edition>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                    <div
                        class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">

                        <x-paragraphs.order-summary>
                        </x-paragraphs.order-summary>

                        <div class="space-y-4">
                            <div class="space-y-2">

                                {{-- original price here --}}
                                <x-blocks.original-price :price="$cart->base_amount">
                                </x-blocks.original-price>

                                {{-- discounts here  --}}
                                <x-blocks.discounts>
                                </x-blocks.discounts>

                                {{-- iva here  --}}
                                <x-blocks.iva-price :iva="$cart->iva">
                                </x-blocks.iva-price>
                            </div>

                            {{-- total price here --}}
                            <x-blocks.total-price :price="$cart->full_amount">
                            </x-blocks.total-price>
                        </div>

                        {{-- link for checkout here --}}
                        {{-- !update --}}
                        <x-links.checkout :link="route('content.payments.checkout')">
                        </x-links.checkout>

                        <div class="flex items-center justify-center gap-2">

                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> or </span>

                            {{-- link for continue shopping here --}}

                            <x-links.continue-shopping>
                            </x-links.continue-shopping>

                        </div>
                    </div>
                </div>
            </div>

    </x-interface.info-block>

    {{-- *scripts --}}

    @section('scripts')
        @vite('resources/js/modules/services/cart.js')
    @endsection

</x-layouts.app>
