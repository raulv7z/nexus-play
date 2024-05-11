@props([
    'canvasId',
    'canvasClass' => '',
    // 'divClass' => 'max-w-lg mx-auto',
    // 'divStyle' => '',
])

{{-- <div class="{{ $divClass }}" style="{{ $divStyle }}"> --}}
<canvas id="{{ $canvasId }}" class="chart-graph {{ $canvasClass }}"></canvas>
{{-- </div> --}}
