@props(['description'=>'Description'])

<p class="text-white text-sm lg:text-base mb-4">
    {{ Str::limit(__($description), 3) }}
</p>