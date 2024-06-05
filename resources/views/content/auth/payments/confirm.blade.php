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
        <x-interface.gray-title :title="'Confirm'" />
    </x-interface.hidden-block>

    <x-interface.info-block>

        <div class="flex justify-evenly items-center gap-x-2">
            <div class="h-14">
                <x-interface.confirm-payment-icon>
                </x-interface.confirm-payment-icon>
            </div>

            <div class="w-1/4 h-2.5 flex flex-col justify-center overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-blue-500"
                role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="w-1/4 h-2.5 flex flex-col justify-center overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-blue-500"
                role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="w-1/4 h-2.5 flex flex-col justify-center overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-blue-500"
                role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
            <div>
                <div class="w-fit text-center">
                    <span class="font-bold text-md text-gray-800 dark:text-white">{{ __('Step') }}&nbsp;3&nbsp;-&nbsp;{{__('Last')}}</span>
                </div>
            </div>
        </div>

        <x-forms.template :method="'POST'" :action="route('auth.payments.solidify')">

            <x-slot name="header">
            </x-slot>

            <x-slot name="body">
                
            </x-slot>

            <x-slot name="foot">
                <div class="flex w-full gap-5 mt-4 flex-col sm:flex-row sm:w-fit sm:gap-0 sm:mt-0">
                    <x-links.return>
                    </x-links.return>

                    <x-buttons.submit :text="'Confirm Payment'">
                    </x-buttons.submit>
                </div>
            </x-slot>
        </x-forms.template>

    </x-interface.info-block>
@endsection
