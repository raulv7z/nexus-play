@php
    $options = [
        '' => 'Select a platform group',
    ];

    foreach ($allPlatformGroups as $platformGroup) {
        $idKey = $platformGroup->id;
        $name = $platformGroup->name;
        $options[$idKey] = $name;
    }
@endphp

@extends($getLayout)

@section('header')
    <x-interface.header-title :title="'Platforms'">
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
                <x-blocks.form-group :type="'text'" :field="'id'" :label="'ID'" :value="$platform->id" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'name'" :label="'Name'" :value="$platform->name" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'number'" :field="'plus'" :label="'Plus'" :value="$platform->plus" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'select'" :field="'platform_group_id'" :label="'Platform Groups'" :options="$options" :selected="$platform->group->id" disabled>
                </x-blocks.form-group>
            </x-slot>

            <x-slot name="foot">
                <x-links.return>
                </x-links.return>

                <x-links.edit :url="route('admin.platforms.edit', $platform->id)">
                </x-links.edit>

                <x-links.delete :url="route('admin.platforms.delete', $platform->id)">
                </x-links.delete>
            </x-slot>
        </x-forms.template>

    </x-interface.info-block>
@endsection
