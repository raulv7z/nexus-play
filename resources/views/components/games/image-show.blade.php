@props(['frontPage' => ''])

<img src="{{ Storage::url('images/games/front-pages/' . $frontPage) }}" 
     alt="Cover"
     class="w-full xl:max-w-2xl 2xl:max-w-3xl object-cover rounded-lg shadow-lg transition-transform duration-500 ease-in-out"/>