<x-layouts.app>


    <x-slot name="header">
        {{ __('Redefine this!') }}
    </x-slot>

    <x-interface.info-block>

        <x-tables.crud :url="route('admin.users.data')">
            
        </x-tables.crud>

    </x-interface.info-block>

    @section('scripts')
        @vite('resources/js/modules/cruds/users.js')
    @endsection

</x-layouts.app>
