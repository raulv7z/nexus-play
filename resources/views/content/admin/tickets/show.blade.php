@php
    $defaultTicketState = app()->getLocale() == 'en' ? 'Select a state' : 'Selecciona un estado';

    $optionsTicketStates = [
        '' => $defaultTicketState,
    ];

    foreach ($allTicketStates as $ticketState) {
        $idKey = $ticketState->id;
        $state = $ticketState->state;
        $optionsTicketStates[$idKey] = $state;
    }
@endphp

@extends($getLayout)

@section('header')
    <x-interface.header-title :title="'Tickets'">
    </x-interface.header-title>

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs ?? []">
    </x-interface.breadcrumbs>
@endsection

@section('content')
    <x-interface.info-block>

        <x-forms.template :method="'GET'" :action="'#'">
            <x-slot name="header">

            </x-slot>

            <x-slot name="body">
                <x-blocks.form-group :type="'text'" :field="'id'" :label="'ID'" :value="$ticket->id" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'code_ticket'" :label="'Ticket Code'" :value="$ticket->code_ticket" disabled>
                </x-blocks.form-group>
                
                <x-blocks.form-group :type="'select'" :field="'state'" :label="'State'" :options="$optionsTicketStates" :selected="$ticket->ticketState->id" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'name'" :label="'Name'" :value="$ticket->name" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'email'" :field="'email'" :label="'Email'" :value="$ticket->email" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'textarea'" :field="'message'" :label="'Message'" :value="$ticket->password" disabled>
                </x-blocks.form-group>
            </x-slot>

            <x-slot name="foot">
                <x-links.return>
                </x-links.return>

                <x-links.edit :url="route('admin.tickets.edit', $ticket->id)">
                </x-links.edit>

                <x-links.delete :url="route('admin.tickets.delete', $ticket->id)">
                </x-links.delete>
            </x-slot>
        </x-forms.template>

    </x-interface.info-block>
@endsection
