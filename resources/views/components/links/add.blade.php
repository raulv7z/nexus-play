@props([
    'url' => '',
    'text' => 'Add'
])

<a href="{{ $url }}"
    class="inline-flex items-center justify-center px-4 py-2.5 h-12 bg-cyan-600 hover:bg-cyan-500 rounded-lg shadow-lg hover:shadow-xl text-white transition duration-300 ease-in-out">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
    {{ __($text) }}
</a>