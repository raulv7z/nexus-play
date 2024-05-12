@props(['url', 'chartId'])

<div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-2xl border border-gray-300 dark:border-gray-700 transition-all duration-300 ease-in-out max-w-lg mx-auto">
    <canvas id="{{ $chartId }}" class="chart-graph w-full h-auto" data-fetch-url="{{ $url }}"></canvas>
</div>
