<x-layouts.app>


    <x-slot name="header">
        {{ __('Redefine this!') }}
    </x-slot>

    <x-interface.info-block>

        <x-forms.create :action="$action" :fields="$fields"/>

    </x-interface.info-block>

</x-layouts.app>
