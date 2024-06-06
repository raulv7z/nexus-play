@php
    $default = app()->getLocale() == 'en' ? 'Select a platform group' : 'Selecciona un grupo de plataforma';

    $options = [
        '' => $default,
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

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs ?? []">
    </x-interface.breadcrumbs>
@endsection

@section('content')
    <x-interface.info-block>

        <x-forms.template :method="'PUT'" :action="route('admin.platforms.update', $platform->id)">
            <x-slot name="header">

                @if ($platform->trashed())
                    <div class="mb-6">
                        <h2 class="text-lg font-bold text-red-700 dark:text-red-400">{{ __('Deleted record') }}</h2>
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ __('This record is deleted. You can restore it if you want.') }}
                        </p>
                    </div>
                @endif

            </x-slot>

            <x-slot name="body">
                <x-blocks.form-group :type="'text'" :field="'name'" :label="'Name'" :value="$platform->name"
                    :placeholder="'Write here...'">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'number'" :field="'plus'" :label="'Plus'" :value="$platform->plus"
                    :placeholder="'Write here...'">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'select'" :field="'platform_group_id'" :label="'Platform Groups'" :options="$options"
                    :selected="$platform->platform_group_id">
                </x-blocks.form-group>

                @if ($platform->trashed())
                    <x-blocks.form-group :type="'checkbox'" :field="'restore'" :label="'Restore'" :value="1"
                        id="'restore'">
                    </x-blocks.form-group>
                @endif
            </x-slot>

            <x-slot name="foot">
                <x-links.return>
                </x-links.return>

                <x-buttons.submit :text="'Save'">
                </x-buttons.submit>
            </x-slot>
        </x-forms.template>

    </x-interface.info-block>
@endsection
