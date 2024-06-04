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

        <x-forms.template :method="'POST'" :action="route('admin.platforms.store')">
            <x-slot name="header">

            </x-slot>

            <x-slot name="body">
                <x-blocks.form-group :type="'text'" :field="'name'" :label="'Name'" :placeholder="'Write a name here...'">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'number'" :field="'plus'" :label="'Plus'" :placeholder="'Write a plus here...'">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'select'" :field="'platform_group_id'" :label="'Platform Groups'" :options="$options">
                </x-blocks.form-group>
            </x-slot>

            <x-slot name="foot">
                <x-links.return>
                </x-links.return>

                <x-buttons.submit>
                </x-buttons.submit>
            </x-slot>
        </x-forms.template>

    </x-interface.info-block>
@endsection
