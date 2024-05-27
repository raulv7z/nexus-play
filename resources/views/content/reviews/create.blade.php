<x-layouts.app>

    <x-slot name="header">
        <x-interface.header-title>
        </x-interface.header-title>

        <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
        </x-interface.breadcrumbs>
    </x-slot>

    <x-interface.info-block>

        <x-forms.template :method="'POST'" :action="route('content.reviews.store')">
            <x-slot name="header">

            </x-slot>

            <x-slot name="body">

                <x-blocks.form-group :type="'hidden'" :field="'user_id'" :value="encrypt(auth()->id())">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'hidden'" :field="'edition_id'" :value="encrypt($edition->id)">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'hidden'" :field="'rating'" id="rating" :value="1">
                </x-blocks.form-group>

                <x-blocks.form-group :type="'custom'" :label="'Rating'">
                    <div class="flex items-center">
                        <x-games.rating :reactive="true">
                        </x-games.rating>
                    </div>
                </x-blocks.form-group>

                <x-blocks.form-group :type="'text'" :field="'comment'" :label="'Comment'" :placeholder="'Add a comment here (max 120 characters)...'">
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

</x-layouts.app>
