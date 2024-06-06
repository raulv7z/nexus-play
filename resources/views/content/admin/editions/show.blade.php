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

        <x-forms.template :method="'GET'" :action="'#'">
            <x-slot name="header">

            </x-slot>

            <x-slot name="body">
                <x-blocks.form-group :type="'text'" :field="'id'" :label="'ID'" :value="$edition->id" disabled>
                </x-blocks.form-group>
                
                <x-blocks.form-group :type="'select'" :field="'videogame_id'" :label="'Videogame'" :options="$optionsVideogames" :selected="$edition->videogame->id" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'select'" :field="'platform_id'" :label="'Platform'" :options="$optionsPlatforms" :selected="$edition->platform->id" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'number'" :field="'stock'" :label="'Stock'" :value="$edition->stock" disabled>
                </x-blocks.form-group>
            </x-slot>

            <x-slot name="foot">
                <x-links.return>
                </x-links.return>

                <x-links.edit :url="route('admin.editions.edit', $edition->id)">
                </x-links.edit>

                <x-links.delete :url="route('admin.editions.delete', $edition->id)">
                </x-links.delete>
            </x-slot>
        </x-forms.template>

    </x-interface.info-block>
@endsection
