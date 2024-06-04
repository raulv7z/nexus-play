@extends($getLayout)

@section('header')
    <x-interface.header-title :title="'Platform Groups'">
    </x-interface.header-title>

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
    </x-interface.breadcrumbs>
@endsection

@section('content')
    <x-interface.info-block>

        <x-forms.template :method="'DELETE'" :action="route('admin.platform-groups.destroy', $platformGroup->id)">
            <x-slot name="header">

                <div class="mb-6">
                    <h2 class="text-lg font-bold text-red-700 dark:text-red-400">{{ __('Delete confirmation') }}</h2>
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ __('You are about to delete a record. Please carefully review the data displayed before proceeding.') }}
                    </p>
                </div>

            </x-slot>

            <x-slot name="body">
                <x-blocks.form-group :type="'text'" :field="'id'" :label="'ID'" :value="$platformGroup->id" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'name'" :label="'Name'" :value="$platformGroup->name"
                    :placeholder="'Write a name here...'" disabled>
                </x-blocks.form-group>
            </x-slot>

            <x-slot name="foot">
                <x-links.return>
                </x-links.return>

                <x-buttons.submit :text="'Confirm'">
                </x-buttons.submit>
            </x-slot>
        </x-forms.template>

    </x-interface.info-block>
@endsection