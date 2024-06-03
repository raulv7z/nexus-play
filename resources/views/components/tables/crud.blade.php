@props(['url'])

<div class="relative overflow-x-auto sm:rounded-lg">
    <table class="crud-table w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" data-fetch-url="{{$url}}">

        {{ $slot }}
    
    </table>
</div>