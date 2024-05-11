import $ from 'jquery';
import { Chart, registerables } from 'chart.js';

// Registro todos los controladores y elementos necesarios
Chart.register(...registerables);
export function initializeChart(chartId, chartType, chartData, chartOptions) {
    var ctx = $('#' + chartId).get(0).getContext('2d');
    const chart = new Chart(ctx, {
        type: chartType,
        data: chartData,
        options: chartOptions
    });

    return chart;
}
