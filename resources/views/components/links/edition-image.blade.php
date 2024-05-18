@props(['link' => '#', 'imageName' => ''])

@php
    $defaultImage = Storage::url('images/defaults/box.png');
    $imageUrl = $imageName ? Storage::url("images/games/front-pages/$imageName") : $defaultImage;
@endphp

<a href="{{ $link }}" class="block w-fit overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transform hover:scale-105 transition duration-300 ease-in-out shrink-0 md:order-1">
    <img class="object-cover h-full w-full sm:h-40 sm:w-40 md:h-30 md:w-30 lg:h-32 lg:w-32 xl:h-40 xl:w-40"
        src="{{ $imageUrl }}"
        alt="Game Image" />
</a>
