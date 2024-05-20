@props(['value' => 4])

@for ($i = 1; $i <= 5; $i++)
    <x-games.star :fill="$i <= $value"/>
@endfor