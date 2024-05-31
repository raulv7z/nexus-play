@extends($getLayout)

@section('header')
    <x-interface.header-title>
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
                <x-blocks.form-group :type="'text'" :field="'name'" :label="'Name'" :value="$videogame->name" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'description'" :label="'Description'" :value="$videogame->description" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'developer'" :label="'Developer'" :value="$videogame->developer" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'genre'" :label="'Genre'" :value="$videogame->genre" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'iva'" :label="'IVA'" :value="$videogame->iva" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'base_amount'" :label="'Base Amount'" :value="$videogame->base_amount" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'sale_amount'" :label="'Sale Amount'" :value="$videogame->sale_amount" disabled>
                </x-blocks.form-group>

            </x-slot>

            <x-slot name="foot">
                <x-links.return>
                </x-links.return>

                <x-links.edit :url="route('admin.videogames.edit', $videogame->id)">
                </x-links.edit>

                <x-links.delete :url="route('admin.videogames.delete', $videogame->id)">
                </x-links.delete>
            </x-slot>
        </x-forms.template>

    </x-interface.info-block>
@endsection
