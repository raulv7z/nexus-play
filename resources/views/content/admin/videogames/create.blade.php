@extends($getLayout)

@section('header')
    <x-interface.header-title :title="'Videogames'">
    </x-interface.header-title>

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs ?? []">
    </x-interface.breadcrumbs>
@endsection

@section('content')
    <x-interface.info-block>

        <x-forms.template :method="'POST'" :action="route('admin.videogames.store')">
            <x-slot name="header">

            </x-slot>

            <x-slot name="body">
                <x-blocks.form-group :type="'file'" :field="'front_page'" :label="'Front Page'">
                </x-blocks.form-group>
                
                <x-blocks.form-group :type="'text'" :field="'name'" :label="'Name'" :placeholder="'Write here...'">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'description'" :label="'Description'" :placeholder="'Write here...'">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'distributor'" :label="'Distributor'" :placeholder="'Write here...'">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'genre'" :label="'Genre'" :placeholder="'Write here...'">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'number'" :field="'iva'" :label="'IVA'" :placeholder="'Write here...'">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'number'" :field="'base_amount'" :label="'Base Amount'" :placeholder="'Write here...'">
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
