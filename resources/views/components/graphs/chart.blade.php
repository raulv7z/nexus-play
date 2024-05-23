@props(['url', 'chartId'])

<div class="p-10 transition-all duration-300 ease-in-out max-w-4xl mx-auto">
    <canvas id="{{ $chartId }}" class="chart-graph w-full h-auto" data-fetch-url="{{ $url }}"></canvas>
</div>
