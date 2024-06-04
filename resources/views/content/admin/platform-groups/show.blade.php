@extends($getLayout)

@section('header')
    <x-interface.header-title :title="'Platform Groups'">
    </x-interface.header-title>

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
    </x-interface.breadcrumbs>
@endsection

@section('content')
    <x-interface.info-block>

        <x-forms.template :method="'GET'" :action="'#'">
            <x-slot name="header">

            </x-slot>

            <x-slot name="body">
                <x-blocks.form-group :type="'text'" :field="'id'" :label="'ID'" :value="$platformGroup->id" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'name'" :label="'Name'" :value="$platformGroup->name" disabled>
                </x-blocks.form-group>
            </x-slot>

            <x-slot name="foot">
                <x-links.return>
                </x-links.return>

                <x-links.edit :url="route('admin.platform-groups.edit', $platformGroup->id)">
                </x-links.edit>

                <x-links.delete :url="route('admin.platform-groups.delete', $platformGroup->id)">
                </x-links.delete>
            </x-slot>
        </x-forms.template>

    </x-interface.info-block>
@endsection
