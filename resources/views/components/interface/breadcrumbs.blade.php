@props([
    'breadcrumbs' => []
])

<nav aria-label="breadcrumb" class="text-sm">
    <ol class="breadcrumb flex">
        @foreach ($breadcrumbs as $key => $breadcrumb)
            @if ($loop->last)
                <li class="breadcrumb-item active" aria-current="page">
                    <span class="text-gray-600 dark:text-gray-400">{{ __($breadcrumb['title']) }}</span>
                </li>
            @else
                <li class="breadcrumb-item">
                    <a href="{{ $breadcrumb['url'] }}"
                        class="text-blue-500 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 transition-colors">{{ __($breadcrumb['title']) }}</a>
                </li>
                <li class="breadcrumb-divider">
                    <span class="mx-2 border-r border-gray-300 dark:border-gray-600 h-4"></span>
                </li>
            @endif
        @endforeach
    </ol>
</nav>
