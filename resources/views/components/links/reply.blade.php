@props([
    'url' => '',
    'text' => 'Go reply'
])

<a href="{{ $url }}"
    class="inline-flex items-center justify-center px-5 py-3 bg-blue-600 hover:bg-blue-500 rounded-lg shadow-md hover:shadow-lg text-white font-semibold transition duration-300 ease-in-out">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8h2a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V10a2 2 0 012-2h2m5-4h4a2 2 0 012 2v4M7 8V6a2 2 0 012-2h4l4 4v2" />
    </svg>
    {{ __($text) }}
</a>
