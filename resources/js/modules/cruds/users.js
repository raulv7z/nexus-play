// Imports
////////////////////////////////////
import $ from "jquery";
import "../../bootstrap";
import { createDataTable } from "../../libs/datatables";

// Inits
////////////////////////////////////
window.$ = window.jQuery = $;

// Vars
////////////////////////////////////
const html = $("html");

// Functions
////////////////////////////////////

function startScript() {
    const selector = ".crud-table";
    const fetchUrl = $(selector).data("fetch-url");

    $.ajax({
        url: fetchUrl, // URL
        type: "GET",
        dataType: "json",
        success: function (data) {
            const columns = [
                {
                    data: "id",
                    title: "ID",
                },
                {
                    data: "name",
                    title: "NOMBRE",
                },
                {
                    data: "email",
                    title: "CORREO ELECTRÓNICO",
                },
                {
                    data: null,
                    title: "ACCIONES",
                    render: function (data, type, row) {
                        return `
                        <div class="flex justify-center space-x-1">
                            <a href="/users/${row.id}" class="p-2 text-blue-500 hover:text-blue-700 transition duration-150 ease-in-out">
                                <i class="fas fa-eye" title="Ver"></i>
                            </a>
                            <a href="/users/${row.id}/edit" class="p-2 text-green-500 hover:text-green-700 transition duration-150 ease-in-out">
                                <i class="fas fa-edit" title="Editar"></i>
                            </a>
                            <a href="/users/${row.id}/delete" class="p-2 text-red-500 hover:text-red-700 transition duration-150 ease-in-out">
                                <i class="fas fa-trash" title="Borrar"></i>
                            </a>
                        </div>
                    `;
                    },
                    orderable: false,
                },
            ];

            createDataTable(selector, data, columns);
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
}

// Execs
////////////////////////////////////

$(function () {
    startScript();
});
