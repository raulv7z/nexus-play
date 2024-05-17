<x-layouts.app>
    <x-slot name="header">
        <x-interface.header-title :content="$title">
        </x-interface.header-title>

        <x-interface.breadcrumbs :breadcrumbs="$breadcrumbs">
        </x-interface.breadcrumbs>
    </x-slot>

    <x-interface.info-block>
        <div class="max-w-xl">
            @include('profile.partials.update-profile-information-form')
        </div>
    </x-interface.info-block>

    <x-interface.info-block>
        <div class="max-w-xl">
            @include('profile.partials.update-password-form')
        </div>
    </x-interface.info-block>

    <x-interface.info-block>
        <div class="max-w-xl">
            @include('profile.partials.delete-user-form')
        </div>
    </x-interface.info-block>

    </x-presets.layouts.app>
