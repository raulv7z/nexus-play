@php
    $defaultVideogames = app()->getLocale() == 'en' ? 'Select a videogame' : 'Selecciona un videojuego';

    $optionsVideogames = [
        '' => $defaultVideogames,
    ];

    foreach ($allVideogames as $videogame) {
        $idKey = $videogame->id;
        $name = $videogame->name;
        $optionsVideogames[$idKey] = $name;
    }
    
    $defaultPlatforms = app()->getLocale() == 'en' ? 'Select a platform' : 'Selecciona una plataforma';

    $optionsPlatforms = [
        '' => $defaultPlatforms,
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

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs ?? []">
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

                <x-blocks.form-group :type="'number'" :field="'stock'" :label="'Stock'" :placeholder="'Write here...'">
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
