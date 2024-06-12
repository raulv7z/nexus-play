@extends($getLayout)

@section('header')
    <x-interface.header-title :title="'Tickets'">
    </x-interface.header-title>

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs ?? []">
    </x-interface.breadcrumbs>
@endsection

@section('content')
    <x-interface.info-block>

        <x-forms.template :method="'POST'" :action="route('admin.tickets.send-response', $ticket->id)">
            <x-slot name="header">

            </x-slot>

            <x-slot name="body">
                <x-blocks.form-group :type="'textarea'" :field="'reply'" :label="'Reply'" :placeholder="'Write here...'" rows="10">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'checkbox'" :field="'close'" :label="'Close ticket'" :value="1" id="'close'">
                </x-blocks.form-group>

            </x-slot>

            <x-slot name="foot">
                <x-links.return>
                </x-links.return>

                <x-buttons.submit>
                </x-buttons.submit>
            </x-slot>
        </x-forms.template>

    </x-interface.info-block>
@endsection
