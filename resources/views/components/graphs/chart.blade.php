@props(['url', 'chartId'])

<div class="flex justify-center transition-all duration-300 ease-in-out">
    <canvas id="{{ $chartId }}" class="chart-graph w-full" data-fetch-url="{{ $url }}"></canvas>
</div>
