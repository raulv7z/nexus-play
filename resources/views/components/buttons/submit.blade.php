@props([
    'text' => 'Submit'
])

<button type="submit"
    class="inline-flex items-center justify-center px-4 py-2.5 h-12 bg-[#4949de] hover:bg-[#6c6cf0] rounded-lg shadow-lg hover:shadow-xl text-white transition duration-300 ease-in-out">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"
        stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
    </svg>
    {{ __($text) }}
</button>
