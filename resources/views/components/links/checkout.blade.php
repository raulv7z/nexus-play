@props(['link' => '#'])

<a href="{{ $link }}"
    class="flex w-full h-10 items-center justify-center bg-gradient-to-r from-blue-400 to-blue-500 hover:from-blue-500 hover:to-blue-600 dark:from-blue-600 dark:to-blue-700 dark:hover:from-blue-700 dark:hover:to-blue-800 rounded-lg shadow-lg hover:shadow-xl text-white transition duration-300 ease-in-out">
    {{ __('Proceed to Checkout') }}
</a>