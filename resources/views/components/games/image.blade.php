@props(['frontPage' => ''])

<img src="{{ Storage::url('images/games/front-pages/' . $frontPage) }}" 
     alt="Cover"
     class="w-full h-72 object-cover rounded-lg transition-transform duration-500 ease-in-out"
     onerror="this.onerror=null; this.src='{{ Storage::url('images/templates/fpage.png') }}';">