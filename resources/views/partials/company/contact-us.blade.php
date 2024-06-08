@extends('partials.interface.nexus-seal-container')

@section('content-section')
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Here you can write a message explaining the reasons why you need to contact us.') }}
    </div>

    @if (session('status') == 'contact-message-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('Your message has been sent.') }}
        </div>

        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('Our technical service will contact you via email as quickly as possible.') }}
        </div>
    @endif

    <form method="POST" action="{{ route('root.company.open-ticket') }}">
        @csrf

        <div>
            <x-presets.input-label for="name" :value="__('Name')" />

            <x-presets.text-input id="name" class="block mt-1 w-full" type="text" name="name"
                placeholder="{{ __('Your name...') }}" required />

            <x-presets.input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-presets.input-label for="email" :value="__('Email')" />

            <x-presets.text-input id="email" class="block mt-1 w-full" type="text" name="email"
                placeholder="{{ __('Your e-mail address...') }}" required />

            <x-presets.input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Message -->
        <div class="mt-4">
            <x-presets.input-label for="message" :value="__('Message')" />

            <x-presets.textarea-input id="message" class="block mt-1 w-full" type="text" name="message"
                placeholder="{{ __('Write here the reasons why you contact us...') }}" required />

            <x-presets.input-error :messages="$errors->get('message')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-presets.primary-button>
                {{ __('Send') }}
            </x-presets.primary-button>
        </div>
    </form>
@endsection
