<x-layouts.app>

    <x-slot name="header">
        <x-interface.header-title :content="$title">
        </x-interface.header-title>

        <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
        </x-interface.breadcrumbs>
    </x-slot>

    <x-interface.info-block>

        <x-forms.edit :action="$action" :model="$user" :fields="$fields"/>

    </x-interface.info-block>
    
</x-layouts.app>
