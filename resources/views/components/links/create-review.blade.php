@props(['link' => '#'])

<a href="{{ $link }}" class="block w-full sm:w-auto">
    <button
        class="w-full sm:w-auto bg-yellow-950 text-yellow-400 border border-yellow-400 border-b-4 font-medium overflow-hidden relative px-2 py-3 sm:px-4 sm:py-3 rounded-lg hover:brightness-150 hover:border-t-4 hover:border-b active:opacity-75 outline-none duration-300 group text-s sm:text-base">
        <span
            class="bg-yellow-400 shadow-yellow-400 absolute -top-[150%] left-0 inline-flex w-40 sm:w-80 h-[3px] sm:h-[5px] rounded-lg opacity-50 group-hover:top-[150%] duration-500 shadow-[0_0_10px_10px_rgba(0,0,0,0.3)]"></span>
        {{ __('Make a review') }}
    </button>
</a>