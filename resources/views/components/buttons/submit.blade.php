@props([
    'text' => 'Submit'
])

<button type="submit"
    class="w-fit bg-gradient-to-r from-teal-400 to-cyan-500 hover:from-teal-500 hover:to-cyan-500 dark:from-teal-600 dark:to-cyan-600 dark:hover:from-teal-700 dark:hover:to-cyan-700 p-2 rounded-lg shadow-md hover:shadow-lg text-white transition duration-300 ease-in-out flex items-center justify-center mb-3">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"
        stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18" />
    </svg>

    {{ __($text) }}
    
</button>
