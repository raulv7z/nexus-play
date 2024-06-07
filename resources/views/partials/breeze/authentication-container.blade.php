<div class="flex flex-col sm:justify-center items-center pt-2 bg-gray-100 dark:bg-gray-900">
    
    <div>
        <a href="/">
            <x-presets.application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </div>

    <div
        class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">

        @yield('form-content')

    </div>

</div>