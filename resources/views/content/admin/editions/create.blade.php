@php
    $optionsVideogames = [
        '' => 'Select a videogame',
    ];

    foreach ($allVideogames as $videogame) {
        $idKey = $videogame->id;
        $name = $videogame->name;
        $optionsVideogames[$idKey] = $name;
    }
    
    $optionsPlatforms = [
        '' => 'Select a platform',
    ];

    foreach ($allPlatforms as $platform) {
        $idKey = $platform->id;
        $name = $platform->name;
        $optionsPlatforms[$idKey] = $name;
    }
@endphp

@extends($getLayout)

@section('header')
    <x-interface.header-title :title="'Editions'">
    </x-interface.header-title>

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
    </x-interface.breadcrumbs>
@endsection

@section('content')
    <x-interface.info-block>

        <x-forms.template :method="'POST'" :action="route('admin.editions.store')">
            <x-slot name="header">

            </x-slot>

            <x-slot name="body">
                <x-blocks.form-group :type="'select'" :field="'videogame_id'" :label="'Videogame'" :options="$optionsVideogames">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'select'" :field="'platform_id'" :label="'Platform'" :options="$optionsPlatforms">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'number'" :field="'stock'" :label="'Stock'" :placeholder="'Write the stock here...'">
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
