@props(['fill' => false, 'reactive' => false, 'order'])

<span class="{{$reactive ? "reactive-1 hover:cursor-pointer" : "reactive-0"}} {{ $fill ? 'text-yellow-400 dark:text-yellow-400' : 'text-gray-400 dark:text-gray-200' }}" data-order="{{$order}}">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 20 20" fill="currentColor">
        <path
            d="M10 1l2.598 6.71 6.902.502c.352.026.495.467.232.703l-5.298 5.157 1.255 7.287c.064.374-.332.67-.682.485L10 17.273l-6.408 3.375c-.35.184-.747-.111-.682-.485l1.255-7.287L.268 8.915c-.263-.236-.12-.677.232-.703l6.902-.502L10 1z" />
    </svg>
</span>