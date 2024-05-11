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
    const selector = ".crud-table";
    const fetchUrl = $(selector).data("fetch-url");
    
    fetchDataTable(fetchUrl, selector);
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
        viewUrl: "/users/:id",
        editUrl: "/users/:id/edit",
        deleteUrl: "/users/:id/delete"
    };

    return [
        { data: "id", title: "ID" },
        { data: "name", title: "NOMBRE" },
        { data: "email", title: "CORREO ELECTRÓNICO" },
        {
            data: null, title: "ACCIONES", orderable: false,
            render: (data, type, row) => renderActionButtons(row, actions)
        },
    ];
}

function renderActionButtons(row, actions) {
    return `
        <div class="flex justify-center space-x-1">
            <a href="${actions.viewUrl.replace(':id', row.id)}" class="p-2 text-blue-500 hover:text-blue-700 transition duration-150 ease-in-out">
                <i class="fas fa-eye" title="Ver"></i>
            </a>
            <a href="${actions.editUrl.replace(':id', row.id)}" class="p-2 text-green-500 hover:text-green-700 transition duration-150 ease-in-out">
                <i class="fas fa-edit" title="Editar"></i>
            </a>
            <a href="${actions.deleteUrl.replace(':id', row.id)}" class="p-2 text-red-500 hover:text-red-700 transition duration-150 ease-in-out" onclick="return confirm('Are you sure?')">
                <i class="fas fa-trash" title="Borrar"></i>
            </a>
        </div>
    `;
}

async function setupCharts() {
    const apiUrl = "/admin/charts/user-registrations-per-month";
    try {
        const data = await $.ajax({ url: apiUrl, type: "GET", dataType: "json" });
        const chartData = prepareChartData(data);
        const chartOptions = { responsive: true, maintainAspectRatio: false };
        initializeChart("user-chart", "pie", chartData, chartOptions);
    } catch (error) {
        console.error("Error loading chart data:", error);
        // Additionally, handle UI error feedback
    }
}

function prepareChartData(data) {
    return {
        labels: Object.keys(data),
        datasets: [{
            data: Object.values(data),
            backgroundColor: ["#FF6384", "#36A2EB"],
            hoverBackgroundColor: ["#FF6384", "#36A2EB"]
        }]
    };
}

// Execs
////////////////////////////////////

$(function () {

    startApp();

});
