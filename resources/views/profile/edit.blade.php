<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
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
