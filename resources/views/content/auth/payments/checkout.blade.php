@extends($getLayout)

@section('header')
    <x-interface.header-title>
    </x-interface.header-title>

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
    </x-interface.breadcrumbs>
@endsection

@section('content')

    <x-interface.hidden-block>
        <x-interface.title :title="'Payment Info'" />
    </x-interface.hidden-block>

    <x-interface.info-block>

        <x-forms.template :method="'POST'" :action="route('auth.payments.confirm')">

            <x-slot name="header">
                <div class="flex justify-center items-center align-center">
                    <svg height="200px" width="200px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 502.685 502.685" xml:space="preserve"
                        fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <g>
                                    <path style="fill:#e6b54c;"
                                        d="M482.797,276.924c4.53-5.824,6.73-13.331,4.724-20.988L428.05,30.521 c-3.451-13.029-16.847-20.837-29.854-17.386L18.184,113.331C5.22,116.761-2.61,130.2,0.798,143.207L60.269,368.6 c3.408,13.007,16.868,20.816,29.876,17.408l134.278-35.419v75.476c0,42.214,69.954,64.303,139.11,64.303 c69.113,0,139.153-22.089,139.153-64.302V311.61C502.685,297.869,495.157,286.307,482.797,276.924z M439.763,199.226l6.212,23.469 l-75.541,19.953l-6.169-23.512L439.763,199.226z M395.931,50.733l11.799,44.695l-118.014,31.148l-11.799-44.695L395.931,50.733z M342.975,224.744l6.04,22.951c-27.934,1.251-55.113,6.126-76.943,14.452l-4.616-17.429L342.975,224.744z M79.984,319.224 l-6.169-23.426l75.519-19.975l6.212,23.555L79.984,319.224z M170.625,270.237l75.476-19.953l5.716,21.506 c-1.834,1.122-3.559,2.286-5.242,3.473l-69.781,18.421L170.625,270.237z M477.491,424.209c0,24.612-50.993,44.544-113.958,44.544 c-62.9,0-113.937-19.953-113.937-44.544v-27.718c0-0.928,0.539-1.769,0.69-2.653c3.602,23.34,52.654,41.847,113.247,41.847 c60.614,0,109.687-18.508,113.268-41.847c0.151,0.884,0.69,1.726,0.69,2.653V424.209z M477.491,369.678 c0,24.591-50.993,44.522-113.958,44.522c-62.9,0-113.937-19.931-113.937-44.522V341.96c0-0.906,0.539-1.769,0.69-2.653 c3.602,23.318,52.654,41.869,113.247,41.869c60.614,0,109.687-18.551,113.268-41.869c0.151,0.884,0.69,1.747,0.69,2.653V369.678z M363.532,356.11c-62.9,0-113.937-19.931-113.937-44.501c0-24.569,51.036-44.5,113.937-44.5c62.965,0,113.958,19.931,113.958,44.5 C477.491,336.179,426.497,356.11,363.532,356.11z">
                                    </path>
                                </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                            </g>
                        </g>
                    </svg>
                </div>
            </x-slot>

            <x-slot name="body">
                <x-blocks.form-group :type="'text'" :field="'card_number'" :label="'Card Number'" :placeholder="'xxxx-xxxx-xxxx-xxxx'">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'expiration_date'" :label="'Expiration Date'" :placeholder="'MM/YY'">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'cvc'" :label="'CVC'" :placeholder="'***'" maxlength="3">
                </x-blocks.form-group>
            </x-slot>

            <x-slot name="foot">
                <x-links.return>
                </x-links.return>

                <x-buttons.submit :text="'Pay'">
                </x-buttons.submit>
            </x-slot>
        </x-forms.template>

        {{-- <x-forms.progress-bar :options="" :currentStep="0">
        </x-forms.progress-bar> --}}

    </x-interface.info-block>
@endsection

@section('scripts')
    @vite('resources/js/modules/services/payments/credit-cards.js')
@endsection