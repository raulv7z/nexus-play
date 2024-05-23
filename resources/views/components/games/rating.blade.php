@props(['value' => 1, 'reactive' => false])

@for ($i = 1; $i <= 5; $i++)
    <x-games.star :fill="$i <= $value" :reactive="$reactive" :order="$i" />
@endfor
