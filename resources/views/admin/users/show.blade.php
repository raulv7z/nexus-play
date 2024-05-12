<x-layouts.app>


    <x-slot name="header">
        {{ __('Redefine this!') }}
    </x-slot>

    <x-interface.info-block>

        <x-forms.show :item="$user" :fields="$fields" :actions="$actions">

        </x-forms.show>

    </x-interface.info-block>

</x-layouts.app>
