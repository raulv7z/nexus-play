@extends($getLayout)

@section('header')
    <x-interface.header-title :title="'Payment'">
    </x-interface.header-title>

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs ?? []">
    </x-interface.breadcrumbs>
@endsection

@section('content')
    <x-interface.hidden-block>
        <x-interface.title :title="'Payment'" />
        <x-interface.gray-title :title="'Invoice Details'" />
    </x-interface.hidden-block>

    <x-interface.info-block>

        <x-interface.subtitle :subtitle="'This section is only informative.'">
        </x-interface.subtitle>

        <div class="flex justify-evenly items-center gap-x-2">
            <div class="h-14">
                <x-interface.invoice-icon>
                </x-interface.invoice-icon>
            </div>

            <div class="w-1/4 h-2.5 flex flex-col justify-center overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-blue-500"
                role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="w-1/4 h-2.5 flex flex-col justify-center overflow-hidden bg-gray-300 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-neutral-600"
                role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="w-1/4 h-2.5 flex flex-col justify-center overflow-hidden bg-gray-300 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-neutral-600"
                role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
            <div>
                <div class="w-fit text-center">
                    <span class="font-bold text-md text-gray-800 dark:text-white">{{ __('Step') }}&nbsp;1</span>
                </div>
            </div>
        </div>

        <div id="invoice-details-container">
            <div class="w-full mt-5">
                <button id="invoice-details-button" type="button"
                    class="w-full h-fit p-2 bg-gray-200 dark:bg-gray-700 hover:bg-gray-100 hover:dark:bg-slate-600 rounded-lg">
                    <div id="invoice-details-arrow-up" class="flex gap-1 h-6">
                        <x-interface.arrow-up-icon>
                        </x-interface.arrow-up-icon>
                        <p>
                            {{ __('Show details') }}
                        </p>
                    </div>
                    <div id="invoice-details-arrow-down" class="hidden gap-1 h-6">
                        <x-interface.arrow-down-icon>
                        </x-interface.arrow-down-icon>
                        <p>
                            {{ __('Hide details') }}
                        </p>
                    </div>
                </button>
            </div>

            <div id="invoice-details-form-container" class="hidden">
                <x-forms.template :method="'GET'" :action="'#'">
                    <x-slot name="header">
                    </x-slot>
                    <x-slot name="body">
                        <x-blocks.form-group :type="'text'" :field="'name'" :label="'Name'" :value="auth()->user()->name"
                            disabled>
                        </x-blocks.form-group>
                        <x-blocks.form-group :type="'text'" :field="'billing_address'" :label="'Billing Address'" :value="auth()->user()->email"
                            disabled>
                        </x-blocks.form-group>
                    </x-slot>
                    <x-slot name="foot">
                    </x-slot>
                </x-forms.template>
            </div>
        </div>
    </x-interface.info-block>

    <x-interface.hidden-block>
        <x-interface.gray-title :title="'Card Details'" />
    </x-interface.hidden-block>

    <x-interface.info-block>

        <div class="flex justify-evenly items-center gap-x-2">
            <div class="h-14">
                <x-interface.credit-card-icon>
                </x-interface.credit-card-icon>
            </div>

            <div class="w-1/4 h-2.5 flex flex-col justify-center overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-blue-500"
                role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="w-1/4 h-2.5 flex flex-col justify-center overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-blue-500"
                role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="w-1/4 h-2.5 flex flex-col justify-center overflow-hidden bg-gray-300 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-neutral-600"
                role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
            <div>
                <div class="w-fit text-center">
                    <span class="font-bold text-md text-gray-800 dark:text-white">{{ __('Step') }}&nbsp;2</span>
                </div>
            </div>
        </div>

        <x-forms.template :method="'POST'" :action="route('auth.payments.confirm')">

            <x-slot name="header">
            </x-slot>

            <x-slot name="body">
                <x-blocks.form-group :type="'custom'" :field="'payment_method'">
                    <label for="payment_method">
                        {{ __('Payment Method') }}
                    </label>

                    <div class="w-fit flex flex-col gap-5 my-5 lg:w-full lg:flex-row justify-start">
                        <div class="h-40">
                            <input type="radio" id="mastercard" name="payment_method" value="mastercard" checked />
                            <label for="mastercard" class="w-fit h-full cursor-pointer">
                                <img src="{{Storage::url('images/templates/mastercard.png')}}" alt="MASTERCARD" class="h-full border-2 border-transparent rounded-lg peer-checked:border-blue-500" />
                            </label>
                        </div>
                        <div class="h-40">
                            <input type="radio" id="visa" name="payment_method" value="visa" />
                            <label for="visa" class="w-fit h-full cursor-pointer">
                                <img src="{{Storage::url('images/templates/visa.png')}}" alt="VISA" class="h-full border-2 border-transparent rounded-lg peer-checked:border-blue-500" />
                            </label>
                        </div>
                        <div class="h-40">
                            <input type="radio" id="amex" name="payment_method" value="amex" />
                            <label for="amex" class="w-fit h-full cursor-pointer">
                                <img src="{{Storage::url('images/templates/amex.png')}}" alt="AMEX" class="h-full border-2 border-transparent rounded-lg peer-checked:border-blue-500" />
                            </label>
                        </div>
                    </div>
                    

                    @error('payment_method')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                            {{ $message }}
                        </p>
                    @enderror

                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'card_number'" :label="'Card Number'" :placeholder="'xxxx-xxxx-xxxx-xxxx'">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'expiration_date'" :label="'Expiration Date'" :placeholder="'MM/YY'">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'cvc'" :label="'CVC'" :placeholder="'***'"
                    maxlength="3">
                </x-blocks.form-group>
            </x-slot>

            <x-slot name="foot">
                <div class="flex w-full gap-5 mt-4 flex-col sm:flex-row sm:w-fit sm:gap-0 sm:mt-0">
                    <x-links.return>
                    </x-links.return>

                    <x-buttons.submit :text="'Save and Continue'">
                    </x-buttons.submit>
                </div>
            </x-slot>
        </x-forms.template>

    </x-interface.info-block>
@endsection

@section('scripts')
    @vite('resources/js/modules/services/payments/checkout.js')
@endsection
