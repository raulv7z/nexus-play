@props(['link' => '#', 'name' => 'Default value for a new edition'])

<a href="{{$link}}" class="text-base font-medium text-gray-900 hover:underline dark:text-white">
    {{ __("$name") }}
</a>