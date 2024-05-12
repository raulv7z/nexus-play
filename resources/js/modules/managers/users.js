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
    // Parametrize

    const crudSelector = ".crud-table";
    const chartSelector = ".chart-graph";
    const chartId = "users";

    const crudFetchUrl = $(crudSelector).data("fetch-url");
    const chartFetchUrl = $(chartSelector).data("fetch-url");

    // Setup

    setupDataTable(crudSelector, crudFetchUrl);
    setupChart(chartId, chartFetchUrl);
}

function setupDataTable(crudSelector, crudFetchUrl) {

    fetchDataTable(crudFetchUrl, crudSelector);
}

function setupChart(chartId, chartFetchUrl) {

    fetchChart(chartFetchUrl, chartId);
}

async function fetchDataTable(url, selector) {
    try {
        const response = await $.ajax({ url, type: "GET", dataType: "json" });
        const columns = getTableColumns();
        createDataTable(selector, response, columns);
    } catch (error) {
        console.error("Error fetching table data:", error);
    }
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
            render: (data) => (data ? "Si" : "No"),
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

function prepareChartData(data) {
    // Generar colores distintos para cada punto de datos
    const colors = data.map((item, index) => {
        const hue = ((360 * index) / data.length) % 360; // Genera un hue (tono) diferente
        return `hsl(${hue}, 100%, 50%)`; // Saturación y luminosidad al 50%
    });

    return {
        labels: data.map((item) => item.date),
        datasets: [
            {
                label: "Número de Registros",
                data: data.map((item) => item.count),
                fill: false,
                borderColor: colors, // Aplicar el array de colores a los bordes
                backgroundColor: colors, // También aplica colores a los fondos si necesitas barras o puntos llenos
                tension: 0.1,
            },
        ],
    };
}

function prepareChartOptions() {
    const textColor = "#a5a5a5"; // Gris claro que funciona en ambos modos

    return {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    color: textColor, // Usar el mismo color de texto neutro para los ticks
                },
            },
            x: {
                ticks: {
                    color: textColor, // Usar el mismo color de texto neutro para los ticks
                },
            },
        },
        plugins: {
            legend: {
                position: "top",
                labels: {
                    color: textColor, // Usar el color neutro para la leyenda
                },
            },
            title: {
                display: true,
                text: "Usuarios registrados por día", // Define aquí el título del gráfico
                color: textColor, // Color del título
                font: {
                    size: 16,
                },
            },
            tooltip: {
                backgroundColor: "rgba(0, 0, 0, 0.8)",
                titleColor: textColor,
                bodyColor: textColor,
                callbacks: {
                    label: function (tooltipItem) {
                        return `${tooltipItem.dataset.label}: ${tooltipItem.raw}`;
                    },
                },
            },
        },
    };
}

// Execs
////////////////////////////////////

$(function () {
    startApp();
});
