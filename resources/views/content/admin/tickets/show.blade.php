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

                <x-blocks.form-group :type="'select'" :field="'state'" :label="'State'" :options="$optionsTicketStates"
                    :selected="$ticket->ticketState->id" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'name'" :label="'Name'" :value="$ticket->name" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'email'" :field="'email'" :label="'Email'" :value="$ticket->email" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'custom'" disabled>
                    <label for="message">
                        {{ __('Message') }}
                    </label>

                    <textarea name="message" id="message" cols="50" rows="10" disabled
                        class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-800 dark:text-white transition duration-150 ease-in-out">{{ $ticket->message }}</textarea>

                </x-blocks.form-group>
            </x-slot>

            <x-slot name="foot">
                <x-links.return>
                </x-links.return>

                <x-links.reply :url="route('admin.tickets.reply', $ticket->id)">
                </x-links.reply>

                <x-links.edit :url="route('admin.tickets.edit', $ticket->id)">
                </x-links.edit>

                <x-links.delete :url="route('admin.tickets.delete', $ticket->id)">
                </x-links.delete>
            </x-slot>
        </x-forms.template>

    </x-interface.info-block>
@endsection
