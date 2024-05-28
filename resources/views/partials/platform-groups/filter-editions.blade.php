@php
$options = [
    "" => 'Select a platform'
];

if ($platformGroup->platforms->count() > 0) {
    foreach ($platformGroup->platforms as $platform) {
        $encryptedId = encrypt($platform->id);
        $options[$encryptedId] = $platform->name;
    }
}
@endphp

<x-forms.template :method="'GET'" :action="''" id="form-filter-editions">
    <x-slot name="header">

    </x-slot>

    <x-slot name="body">
        <x-blocks.form-group :type="'hidden'" :field="'platform_group_id'" :value="encrypt($platformGroup->id)">
        </x-blocks.form-group>

        <x-blocks.form-group :type="'text'" :field="'videogame_name'" :label="'Videogame'" :placeholder="'Write a videogame name here...'">
        </x-blocks.form-group>

        <x-blocks.form-group :type="'select'" :field="'platform_id'" :label="'Platforms'" :options="$options">
        </x-blocks.form-group>

    </x-slot>

    <x-slot name="foot">
        <x-buttons.clear>
        </x-buttons.clear>

        <x-buttons.submit :text="'Filter'">
        </x-buttons.submit>
    </x-slot>
</x-forms.template>
