@props(['url'])

<a href="{{ $url }}" class="w-fit bg-gradient-to-r from-teal-500 to-cyan-500 hover:from-teal-600 hover:to-cyan-600 dark:from-teal-700 dark:to-cyan-700 dark:hover:from-teal-800 dark:hover:to-cyan-800 p-2 rounded-lg shadow-md hover:shadow-lg text-white transition duration-300 ease-in-out flex items-center justify-center mb-3">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
    </svg>
</a>