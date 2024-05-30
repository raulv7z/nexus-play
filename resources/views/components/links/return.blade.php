@props([
    'url' => 'javascript:history.back()',
    'text' => 'Return',
])

<a href="{{ $url }}"
    class="inline-flex items-center justify-center mx-3 hover:underline">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
    </svg>
    {{ __($text) }}
</a>