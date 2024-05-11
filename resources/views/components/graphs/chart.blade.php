@props(['url', 'chartId'])

<canvas id="{{ $chartId }}" class="chart-graph" data-fetch-url="{{ $url }}"></canvas>