@props(['link' => '#'])

<a href="{{ $link }}">
    <button
        class="bg-pink-950 text-pink-400 border border-pink-400 border-b-4 font-medium overflow-hidden relative px-4 py-2 rounded-full hover:brightness-150 hover:border-t-4 hover:border-b active:opacity-75 outline-none duration-300 group">
        <span
            class="bg-pink-400 shadow-pink-400 absolute -top-[150%] left-0 inline-flex w-80 h-[5px] rounded-full opacity-50 group-hover:top-[150%] duration-500 shadow-[0_0_10px_10px_rgba(0,0,0,0.3)]"></span>
        {{ __('Add to cart') }}
    </button>
</a>
