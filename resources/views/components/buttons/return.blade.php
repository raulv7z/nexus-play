@props([
    'url' => 'javascript:history.back()',
    'text' => 'Return',
])

<a href="{{ $url }}"
    class="inline-flex items-center justify-center px-4 py-2.5 h-12 bg-gradient-to-r from-gray-400 to-gray-500 hover:from-gray-500 hover:to-gray-600 dark:from-gray-600 dark:to-gray-700 dark:hover:from-gray-700 dark:hover:to-gray-800 rounded-lg shadow-lg hover:shadow-xl text-white transition duration-300 ease-in-out">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
    </svg>
    {{ __($text) }}
</a>
