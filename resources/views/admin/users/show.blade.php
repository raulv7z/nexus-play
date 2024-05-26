<x-layouts.app>

    <x-slot name="header">
        <x-interface.header-title>
        </x-interface.header-title>

        <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
        </x-interface.breadcrumbs>
    </x-slot>

    <x-interface.info-block>

        <x-forms.show :item="$user" :fields="$fields" :actions="$actions">

        </x-forms.show>

    </x-interface.info-block>

</x-layouts.app>
