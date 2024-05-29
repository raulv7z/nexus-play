@extends('layouts.app')

@section('header')
    <x-interface.header-title>
    </x-interface.header-title>

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
    </x-interface.breadcrumbs>
@endsection

@section('content')
    <x-interface.info-block>

        <x-forms.template :method="'POST'" :action="route('admin.users.store')">
            <x-slot name="header">

            </x-slot>

            <x-slot name="body">
                <x-blocks.form-group :type="'text'" :field="'name'" :label="'Name'" :placeholder="'Write a name here...'">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'email'" :field="'email'" :label="'Email'" :placeholder="'Write an email here...'">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'password'" :field="'password'" :label="'Password'" :placeholder="'Write the password here...'">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'password'" :field="'confirm-password'" :label="'Confirm Password'" :placeholder="'Write again the password here...'">
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
