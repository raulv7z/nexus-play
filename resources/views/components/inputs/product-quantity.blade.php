@props(['value' => "1"])

{{-- disabled input can be changed here --}}
<input type="text" id="counter-input" data-input-counter
    class="w-10 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 dark:text-white"
    placeholder="" value="{{$value}}" required disabled />
