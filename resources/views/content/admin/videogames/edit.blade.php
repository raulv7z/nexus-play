@extends($getLayout)

@section('header')
    <x-interface.header-title :title="'Videogames'">
    </x-interface.header-title>

    <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs ?? []">
    </x-interface.breadcrumbs>
@endsection

@section('content')
    <x-interface.info-block>

        <x-forms.template :method="'PUT'" :action="route('admin.videogames.update', $videogame->id)">
            <x-slot name="header">

                @if ($videogame->trashed())
                    <div class="mb-6">
                        <h2 class="text-lg font-bold text-red-700 dark:text-red-400">{{ __('Deleted record') }}</h2>
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ __('This record is deleted. You can restore it if you want.') }}
                        </p>
                    </div>
                @endif
            </x-slot>

            <x-slot name="body">

                <x-blocks.form-group :type="'custom'">
                    <img src="{{ Storage::url('images/games/front-pages/' . $videogame->front_page) }}" alt="image"
                        class="max-w-lg object-cover rounded-lg transition-transform duration-500 ease-in-out">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'file'" :field="'front_page'" :label="'Front Page'">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'name'" :label="'Name'" :value="$videogame->name"
                    :placeholder="'Write a name here...'">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'description'" :label="'Description'" :value="$videogame->description"
                    :placeholder="'Write a description here...'">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'distributor'" :label="'Distributor'" :value="$videogame->distributor"
                    :placeholder="'Write the distributor here...'">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'genre'" :label="'Genre'" :value="$videogame->genre"
                    :placeholder="'Write the genre here...'">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'number'" :field="'iva'" :label="'IVA'" :value="$videogame->iva"
                    :placeholder="'Write the iva here...'">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'number'" :field="'base_amount'" :label="'Base Amount'" :value="$videogame->base_amount"
                    :placeholder="'Write the base amount here...'">
                </x-blocks.form-group>

                @if ($videogame->trashed())
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
