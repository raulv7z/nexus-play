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

        <x-forms.template :method="'PUT'" :action="route('admin.tickets.update', $ticket->id)">
            <x-slot name="header">

                @if ($ticket->trashed())
                    <div class="mb-6">
                        <h2 class="text-lg font-bold text-red-700 dark:text-red-400">{{ __('Deleted record') }}</h2>
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ __('This record is deleted. You can restore it if you want.') }}
                        </p>
                    </div>
                @endif

            </x-slot>

            <x-slot name="body">
                <x-blocks.form-group :type="'hidden'" :field="'ticket_id'" :value="$ticket->id">
                </x-blocks.form-group>
                
                <x-blocks.form-group :type="'text'" :field="'code_ticket'" :label="'Ticket Code'" :value="$ticket->code_ticket" disabled>
                </x-blocks.form-group>
                
                <x-blocks.form-group :type="'text'" :field="'email'" :label="'Email'" :value="$ticket->email" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'select'" :field="'ticket_state_id'" :label="'States'" :options="$optionsTicketStates" :selected="$ticket->ticketState->id">
                </x-blocks.form-group>

                @if ($ticket->trashed())
                    <x-blocks.form-group :type="'checkbox'" :field="'restore'" :label="'Restore'" :value="1"
                        id="'restore'">
                    </x-blocks.form-group>
                @endif
            </x-slot>

            <x-slot name="foot">
                <x-links.return>
                </x-links.return>

                <x-buttons.submit :text="'Save'">
                </x-buttons.submit>
            </x-slot>
        </x-forms.template>

    </x-interface.info-block>
@endsection
