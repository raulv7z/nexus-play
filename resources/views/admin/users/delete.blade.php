<x-layouts.app>


    <x-slot name="header">
        {{ __('Redefine this!') }}
    </x-slot>

    <x-interface.info-block>

        <x-forms.delete :action="$action" :model="$user" :fields="$fields"/>

    </x-interface.info-block>
    
</x-layouts.app>
