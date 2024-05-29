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
                <x-blocks.form-group :type="'text'" :field="'name'" :label="'Name'" :value="$user->name"
                    :placeholder="'Write a name here...'" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'email'" :field="'email'" :label="'Email'" :value="$user->email"
                    :placeholder="'Write an email here...'" disabled>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'password'" :field="'password'" :label="'Password'" :value="$user->password"
                    :placeholder="'Write the password here...'" disabled>
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
