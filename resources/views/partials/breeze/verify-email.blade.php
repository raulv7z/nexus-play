@extends('partials.interface.nexus-seal-container')

@section('content-section')
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Wait a moment!') }}
    </div>

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Before continue, could you verify your email address by clicking on the link we just emailed to you?') }}
    </div>

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('A new verification link has been sent to ') . auth()->user()->email . '.' }}
        </div>
    @endif

    <div class="mt-4 flex flex-col gap-y-3 sm:gap-y-0 sm:flex-row sm:items-center sm:justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div class="flex justify-center">
                <x-presets.primary-button>
                    {{ __('Resend Verification Email') }}
                </x-presets.primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <div class="flex justify-center">
                <button type="submit"
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    {{ __('Log Out') }}
                </button>
            </div>
        </form>
    </div>
@endsection
