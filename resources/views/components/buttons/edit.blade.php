@props([
    'url' => '',
    'text' => 'Edit'
])

<a href="{{ $url }}"
    class="inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-blue-400 to-blue-500 hover:from-blue-500 hover:to-blue-600 dark:from-blue-600 dark:to-blue-700 dark:hover:from-blue-700 dark:hover:to-blue-800 rounded-lg shadow-lg hover:shadow-xl text-white transition duration-300 ease-in-out">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4H6a2 2 0 01-2-2V5a2 2 0 012-2h11a2 2 0 012 2v3m-8 8l-4-4m0 0l4-4m-4 4h18" />
    </svg>

    {{ __($text) }}
    
</a>