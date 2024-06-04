@extends($getLayout)

@section('header')
    <x-interface.header-title :title="'Users'">
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
                <x-blocks.form-group :type="'text'" :field="'id'" :label="'ID'" :value="$user->id" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'name'" :label="'Name'" :value="$user->name" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'email'" :field="'email'" :label="'Email'" :value="$user->email" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'password'" :field="'password'" :label="'Password'" :value="$user->password" disabled>
                </x-blocks.form-group>
            </x-slot>

            <x-slot name="foot">
                <x-links.return>
                </x-links.return>

                <x-links.edit :url="route('admin.users.edit', $user->id)">
                </x-links.edit>

                <x-links.delete :url="route('admin.users.delete', $user->id)">
                </x-links.delete>
            </x-slot>
        </x-forms.template>

    </x-interface.info-block>
@endsection
