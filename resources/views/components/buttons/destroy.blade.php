@props([
    'url' => '',
    'text' => 'Delete',
])

<form action="{{ $url }}" method="POST" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit"
        class="inline-flex items-center justify-center px-4 py-2.5 h-12 bg-gradient-to-r from-red-400 to-red-500 hover:from-red-500 hover:to-red-600 dark:from-red-600 dark:to-red-700 dark:hover:from-red-700 dark:hover:to-red-800 rounded-lg shadow-lg hover:shadow-xl text-white transition duration-300 ease-in-out">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
        {{ __($text) }}
    </button>
</form>