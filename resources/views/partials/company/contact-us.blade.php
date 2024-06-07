@extends('partials.interface.nexus-seal-container')

@section('content-section')
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Here you can write a message explaining the reasons why you need to contact us.') }}
    </div>

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Our technical service will contact you via email as quickly as possible.') }}
    </div>

    @if (session('status') == 'contact-message-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('Your message has been sent.') }}
        </div>
    @endif

    <form method="POST" action="{{ route('root.company.send-contact-message') }}">
        @csrf

        <!-- Message -->
        <div>
            <x-presets.input-label for="message" :value="__('Message')" />

            <x-presets.textarea-input id="message" class="block mt-1 w-full" type="text" name="message" required
                autocomplete="message" />

            <x-presets.input-error :messages="$errors->get('message')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-presets.primary-button>
                {{ __('Send') }}
            </x-presets.primary-button>
        </div>
    </form>
@endsection
