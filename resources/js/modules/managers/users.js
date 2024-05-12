// Imports
////////////////////////////////////
import $ from "jquery";
import "../../bootstrap";
import { createDataTable } from "../../libs/datatables";
import { initializeChart } from "../../libs/chart";

// Inits
////////////////////////////////////
window.$ = window.jQuery = $;

// Vars
////////////////////////////////////
const html = $("html");

// Functions
////////////////////////////////////
function startApp() {
    setupCrudTable();
    setupCharts();
}

function setupCrudTable() {
    const crudSelector = ".crud-table";
    const crudFetchUrl = $(crudSelector).data("fetch-url");

    fetchDataTable(crudFetchUrl, crudSelector);
}

async function fetchDataTable(url, selector) {
    try {
        const response = await $.ajax({ url, type: "GET", dataType: "json" });
        const columns = getTableColumns();
        createDataTable(selector, response, columns);
    } catch (error) {
        console.error("Error fetching table data:", error);
        // Additionally, handle UI error feedback
    }
}

function getTableColumns() {
    const actions = {
        viewUrl: "/admin/users/show/:id",
        editUrl: "/admin/users/edit/:id",
        deleteUrl: "/admin/users/delete/:id",
    };

    return [
        { data: "id", title: "ID" },
        { data: "name", title: "NOMBRE" },
        { data: "email", title: "CORREO ELECTRÓNICO" },
        {
            data: "deleted_at",
            title: "BORRADO",
            render: (data) => (data ? "Sí" : "No"),
        },
        {
            data: null,
            title: "ACCIONES",
            orderable: false,
            render: (data, type, row) => renderActionButtons(row, actions),
        },
    ];
}

function renderActionButtons(row, actions) {
    return `
        <div class="flex justify-center space-x-1">
            <a href="${actions.viewUrl.replace(
                ":id",
                row.id
            )}" class="p-2 text-blue-500 hover:text-blue-700 transition duration-150 ease-in-out">
                <i class="fas fa-eye" title="Ver"></i>
            </a>
            <a href="${actions.editUrl.replace(
                ":id",
                row.id
            )}" class="p-2 text-green-500 hover:text-green-700 transition duration-150 ease-in-out">
                <i class="fas fa-edit" title="Editar"></i>
            </a>
            <a href="${actions.deleteUrl.replace(
                ":id",
                row.id
            )}" class="p-2 text-red-500 hover:text-red-700 transition duration-150 ease-in-out" onclick="return confirm('Are you sure?')">
                <i class="fas fa-trash" title="Borrar"></i>
            </a>
        </div>
    `;
}

function setupCharts() {
    const chartSelector = ".chart-graph";
    const chartFetchUrl = $(chartSelector).data("fetch-url");
    const chartId = "users";

    fetchChart(chartFetchUrl, chartId);
}

async function fetchChart(url, chartId) {
    try {
        const data = await $.ajax({ url: url, type: "GET", dataType: "json" });
        const chartData = prepareChartData(data);
        const chartOptions = prepareChartOptions();
        initializeChart(chartId, "pie", chartData, chartOptions);
    } catch (error) {
        console.error("Error loading chart data:", error);
        // Additionally, handle UI error feedback
    }
}

function prepareChartData(data) {
    return {
        labels: data.map((item) => item.role),
        datasets: [
            {
                label: "Distribución de Roles",
                data: data.map((item) => item.count),
                backgroundColor: [
                    "rgba(255, 99, 132, 0.2)",
                    "rgba(54, 162, 235, 0.2)",
                ],
                borderColor: ["rgba(255, 99, 132, 1)", "rgba(54, 162, 235, 1)"],
                borderWidth: 1,
            },
        ],
    };
}

function prepareChartOptions() {
    return {
        responsive: true,
        maintainAspectRatio: true,
        aspectRatio: 1,  // Controla la relación de aspecto del gráfico
        plugins: {
            legend: {
                position: "top",
                labels: {
                    padding: 20,
                    color: "rgb(255, 99, 132)",
                },
            },
            tooltip: {
                callbacks: {
                    label: function (tooltipItem) {
                        return `${tooltipItem.label}: ${
                            tooltipItem.raw
                        } usuarios (${(
                            (tooltipItem.raw /
                                data.reduce((acc, cur) => acc + cur.count, 0)) *
                            100
                        ).toFixed(2)}%)`;
                    },
                },
                backgroundColor: "rgba(0,0,0,0.7)",
                titleFont: { size: 16 },
                bodyFont: { size: 14 },
                padding: 10,
            },
            title: {
                display: true,
                text: "Distribución de Roles en el Sistema",
                color: "rgb(54, 162, 235)",
                font: {
                    size: 20,
                    weight: "bold",
                },
            },
        },
        animation: {
            animateRotate: true,
            animateScale: true,
        },
    };
}

// Execs
////////////////////////////////////

$(function () {
    startApp();
});
