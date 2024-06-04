// Imports
////////////////////////////////////
import $ from "jquery";
import "../../bootstrap";
import DataTableManager from "../../libs/DataTableManager";
import ChartManager from "../../libs/ChartManager";

// Inits
////////////////////////////////////
window.$ = window.jQuery = $;

// Vars
////////////////////////////////////

const html = $("html");
const lang = $(html).attr("lang");
const apiDatatableUrl = $(".crud-table").data("fetch-url");
const apiChartUrl = $(".chart-graph").data("fetch-url");

const dtDictionary = {
    "es": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json",    // es
    "en": "//cdn.datatables.net/plug-ins/2.0.8/i18n/en-GB.json"         // en
};

// Functions
////////////////////////////////////

async function startApp({ requestDatatableUrl, requestChartUrl }) {
    try {
        // Datatable
        ////////////////

        // All models dynamic table
        $.ajax({
            url: requestDatatableUrl,
            method: "GET",
            success: async function (dataRequest) {
                const [tableSelector, tableOptions, tableData, tableStyles] =
                    customizeDataTable({ data: dataRequest });

                const obDataTable = await initializeDataTable({
                    selector: tableSelector,
                    options: tableOptions,
                    data: tableData,
                    styles: tableStyles,
                });
            },
            error: function (error) {
                reject(`Error on request: ${error}`);
            },
        });

        // Charts
        ///////////

        // Best seller editions
        $.ajax({
            url: requestChartUrl,
            method: "GET",
            success: async function (dataRequest) {
                const [chartSelector, chartOptions, chartData, chartType] =
                    customizeChart({ data: dataRequest });

                await initializeChart({
                    selector: chartSelector,
                    options: chartOptions,
                    data: chartData,
                    type: chartType,
                });
            },
            error: function (error) {
                console.error(`Error fetching chart data: ${error}`);
            },
        });
    } catch (error) {
        console.error(error);
    }
}

function customizeDataTable({ data }) {
    const tableSelector = ".crud-table";

    const tableColumnTitles = {
        videogameName: {
            en: "VIDEOGAME",
            es: "VIDEOJUEGO",
        },
        platformName: {
            en: "PLATFORM",
            es: "PLATAFORMA",
        },
        stock: {
            en: "STOCK",
            es: "STOCK",
        },
        salePrice: {
            en: "SALE PRICE",
            es: "PRECIO VENTA",
        },
        deleted: {
            en: "DELETED",
            es: "BORRADO",
        },
        actions: {
            en: "ACTIONS",
            es: "ACCIONES",
        },
    };

    const tableOptions = {
        language: {
            url: dtDictionary[lang]
        },
        paging: true,
        searching: true,
        autoWidth: false,
        info: true,
        columnSearch: [
            { type: "text" },
            { type: "text" },
            { type: "text" },
            { type: "text" },
            { type: "text" },
            { type: "select", options: ["Si", "No"] },
            { type: null },
        ],
        columns: [
            { data: "id", title: "ID", width: '12%' },
            { data: "videogame_name", title: tableColumnTitles.videogameName[lang] },
            { data: "platform_name", title: tableColumnTitles.platformName[lang] },
            {
                data: "stock",
                title: tableColumnTitles.stock[lang],
                render: (data) => (`${data} u.`),
            },
            {
                data: "amount",
                title: tableColumnTitles.salePrice[lang],
                render: (data) => (`${data} €`),
            },
            {
                data: "deleted_at",
                title: tableColumnTitles.deleted[lang],
                render: (data) => (data ? "Si" : "No"),
            },
            {
                orderable: false,
                data: null,
                title: tableColumnTitles.actions[lang],
                searchable: false,
                render: function (data, type, row) {
                    const actions = {
                        viewUrl: "/admin/editions/show/:id",
                        editUrl: "/admin/editions/edit/:id",
                        deleteUrl: "/admin/editions/delete/:id",
                    };

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
                        )}" class="p-2 text-red-500 hover:text-red-700 transition duration-150 ease-in-out">
                            <i class="fas fa-trash" title="Borrar"></i>
                        </a>
                    </div>
                `;
                },
            },
        ],
    };

    // const tableData = JSON.parse(data);  // if is needed to be post-processed
    const tableData = data;

    const tableStyles = "tailwind";

    return [tableSelector, tableOptions, tableData, tableStyles];
}

async function initializeDataTable({ selector, options, data, styles }) {
    try {
        const tableManager = new DataTableManager(selector);
        tableManager.init(options, styles);
        tableManager.loadData(data);
        return tableManager;
    } catch (error) {
        console.error(error);
        return false;
    }
}

function customizeChart({ data }) {
    const chartSelector = "#chart-editions";

    const chartOptions = (() => {
        const textColor = "#a5a5a5";
        const gridColor = "#a5a5a5";

        return {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: gridColor,
                    },
                    ticks: {
                        color: textColor,
                        font: {
                            size: 12,
                        },
                    },
                    title: {
                        display: true,
                        text: 'Número de Ventas',
                        color: textColor,
                    },
                },
                x: {
                    grid: {
                        color: gridColor,
                    },
                    ticks: {
                        color: textColor,
                        font: {
                            size: 12,
                        },
                    },
                    title: {
                        display: true,
                        text: 'Ediciones',
                        color: textColor,
                    },
                },
            },
            plugins: {
                legend: {
                    display: false,
                },
                title: {
                    display: true,
                    text: 'Las 15 Ediciones más Vendidas',
                    color: textColor,
                    font: {
                        size: 24,
                    },
                },
                tooltip: {
                    backgroundColor: "rgba(0, 0, 0, 0.8)",
                    titleColor: "#fff",
                    bodyColor: "#fff",
                    callbacks: {
                        label: function (tooltipItem) {
                            return `${tooltipItem.dataset.label}: ${tooltipItem.raw}`;
                        },
                    },
                },
            },
        };
    })();

    const chartData = {
        labels: data.map(item => item.name),
        datasets: [{
            label: 'Número de Ventas',
            data: data.map(item => item.sales_count),
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };

    const chartType = 'bar';

    return [chartSelector, chartOptions, chartData, chartType];
}

async function initializeChart({ selector, options, data, type }) {
    try {
        const chartManager = new ChartManager(selector);
        chartManager.init(options, data, type);
    } catch (error) {
        console.error(error);
    }
}

// Execs
////////////////////////////////////

$(function () {
    startApp({
        requestDatatableUrl: apiDatatableUrl,
        requestChartUrl: apiChartUrl,
    });
});
