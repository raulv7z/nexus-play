@props([
    'url' => 'javascript:history.back()', // Propiedad para especificar la ruta, con valor predeterminado para volver atrás
    'text' => 'Return',
])

<a href="{{ $url }}"
    class="w-fit bg-gradient-to-r from-gray-400 to-gray-500 hover:from-gray-500 hover:to-gray-600 dark:from-gray-600 dark:to-gray-700 dark:hover:from-gray-700 dark:hover:to-gray-800 p-2 rounded-lg shadow-md hover:shadow-lg text-white transition duration-300 ease-in-out flex items-center justify-center mb-3">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"
        stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
    </svg>

    {{ __($text) }}

</a>
