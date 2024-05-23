<x-layouts.app>

    <x-slot name="header">
        <x-interface.header-title :content="$title">
        </x-interface.header-title>

        <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
        </x-interface.breadcrumbs>
    </x-slot>

    <x-interface.info-block>

        <x-forms.create :action="$action" :fields="$fields">

            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-100">{{ __('Give a rating') }}</p>

                    <div class="flex items-center">
                        <x-games.rating :reactive="true">
                        </x-games.rating>
                    </div>
            </div>

        </x-forms.create>

    </x-interface.info-block>

</x-layouts.app>
