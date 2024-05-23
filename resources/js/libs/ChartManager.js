import $ from "jquery";
import { Chart, registerables } from "chart.js";

class ChartManager {
    container;
    chart;
    options;
    data;
    type;
    
    constructor(selector) {

        Chart.register(...registerables);
        
        this.container = $(selector);
        if (!this.container.length) {
            throw new Error(
                `Chart container with selector "${selector}" not found`
            );
        }
    }

    init(options, data, type) {
        this.options = options;
        this.data = data;
        this.type = type;
        this.renderChart();
    }

    renderChart() {
        if (this.chart) {
            this.chart.destroy();
        }

        this.chart = new Chart(this.container.get(0).getContext('2d'), {
            type: this.type || "bar",
            data: this.data,
            options: this.options || {},
        });
    }

    updateData(newData) {
        this.data = newData;
        this.renderChart();
    }

    updateOptions(newOptions) {
        this.options = newOptions;
        this.renderChart();
    }
}

export default ChartManager;
