<x-layouts.app>
    <x-slot name="header">
        <x-interface.header-title :content="$title">
        </x-interface.header-title>
    </x-slot>

    <x-interface.info-block>
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">
                {{ __("Shopping Cart") }}
            </h2>

            <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                <div class="mx-auto w-full flex-none lg:max-w-xl xl:max-w-3xl">
                    <div class="space-y-6">
                        {{-- each product --}}
                        <div
                            class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                            <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                                
                                {{-- !update link and image src --}}
                                <x-links.edition-image>
                                </x-links.edition-image>

                                <x-labels.choose-quantity>
                                </x-labels.choose-quantity>

                                <div class="flex items-center justify-between md:order-3 md:justify-end">
                                    <div class="flex items-center">
                                        
                                        <x-buttons.decrement-quantity>
                                        </x-buttons.decrement-quantity>

                                        {{-- ! update quantity here --}}
                                        <x-inputs.product-quantity :quantity="'1'">
                                        </x-inputs.product-quantity>

                                        <x-buttons.increment-quantity>
                                        </x-buttons.increment-quantity>

                                    </div>

                                    <div class="text-end md:order-4 md:w-32">

                                        {{-- ! update price here --}}
                                        <x-labels.product-price :price="'0.00'">
                                        </x-labels.product-price>

                                    </div>
                                </div>

                                <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                                    
                                    {{-- !update link and name --}}
                                    <x-links.edition-name>
                                    </x-links.edition-name>

                                    <div class="flex items-center gap-4">
                                        <x-buttons.remove-edition>
                                        </x-buttons.remove-edition>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                    <div
                        class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                        
                        <x-paragraphs.order-summary>
                        </x-paragraphs.order-summary>

                        <div class="space-y-4">
                            <div class="space-y-2">
                                {{-- !update original price here --}}
                                <x-blocks.original-price :price="'0.00'">
                                </x-blocks.original-price>

                                {{-- ?update discounts here (no needed) --}}
                                <x-blocks.discounts>
                                </x-blocks.discounts>
                            </div>

                            {{-- !update total price here --}}
                            <x-blocks.total-price :price="'0.00'">
                            </x-blocks.total-price>
                        </div>
                        
                        {{-- !update link for checkout here --}}
                        <x-links.checkout>
                        </x-links.checkout>

                        <div class="flex items-center justify-center gap-2">

                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> or </span>

                            <x-links.continue-shopping>
                            </x-links.continue-shopping>

                        </div>
                    </div>
                </div>
            </div>

    </x-interface.info-block>

</x-layouts.app>
