@extends($getLayout)

@section('header')
    <x-interface.header-title :title="'Users'">
    </x-interface.header-title>

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs ?? []">
    </x-interface.breadcrumbs>
@endsection

@section('content')
    <x-interface.info-block>

        <x-forms.template :method="'DELETE'" :action="route('admin.users.destroy', $user->id)">
            <x-slot name="header">

                <div class="mb-6">
                    <h2 class="text-lg font-bold text-red-700 dark:text-red-400">{{ __('Delete confirmation') }}</h2>
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ __('You are about to delete a record. Please carefully review the data displayed before proceeding.') }}
                    </p>
                </div>

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

                <x-buttons.submit :text="'Confirm'">
                </x-buttons.submit>
            </x-slot>
        </x-forms.template>

        {{-- <x-forms.delete :action="$action" :model="$user" :fields="$fields"/> --}}

    </x-interface.info-block>
@endsection