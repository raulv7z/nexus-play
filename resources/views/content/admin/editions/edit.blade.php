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
    <x-interface.header-title>
    </x-interface.header-title>

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
    </x-interface.breadcrumbs>
@endsection

@section('content')
    <x-interface.info-block>

        <x-forms.template :method="'PUT'" :action="route('admin.editions.update', $edition->id)">
            <x-slot name="header">

                @if ($edition->trashed())
                    <div class="mb-6">
                        <h2 class="text-lg font-bold text-red-700 dark:text-red-400">{{ __('Deleted record') }}</h2>
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ __('This record is deleted. You can restore it if you want.') }}
                        </p>
                    </div>
                @endif

            </x-slot>

            <x-slot name="body">
                <x-blocks.form-group :type="'hidden'" :field="'edition_id'" :value="$edition->id">
                </x-blocks.form-group>
                
                <x-blocks.form-group :type="'select'" :field="'videogame_id'" :label="'Videogames'" :options="$optionsVideogames" :selected="$edition->videogame->id">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'select'" :field="'platform_id'" :label="'Platforms'" :options="$optionsPlatforms" :selected="$edition->platform->id">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'number'" :field="'stock'" :label="'Stock'" :value="$edition->stock"
                    :placeholder="'Write a plus here...'">
                </x-blocks.form-group>

                @if ($edition->trashed())
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
