import $ from "jquery";
import "datatables.net"; // import datatables with neutral styles + responsive

export function createDataTable(selector, data, columns) {
    if ($(selector).html() == "") {
        var table = $(selector).DataTable();
        $(selector).html("");
        table.destroy();
    }

    var table = $(selector).DataTable({
        responsive: true,
        paging: true,
        searching: true,
        autoWidth: false,
        info: true,
        data: data,
        order: [[0, "asc"]],
        columns: columns,
        initComplete: function () {
            
            const obApi = this.api();

            // Reaplicar los estilos después de cada redibujado de la tabla
            obApi.on("draw", function () {
                applyTailwindClasses(selector);
            });

            // Crea una fila en thead para los filtros
            var row = $("<tr>").appendTo($(selector + " thead"));

            obApi.columns().every(function (index) {
                var column = this;
                var title = $(column.header()).text(); // Guarda el título existente
                var header = $("<th>")
                    .addClass(
                        "p-2 text-xs uppercase bg-gray-50 dark:bg-gray-700 py-3 px-6 text-gray-700 dark:text-gray-200"
                    )
                    .appendTo(row);

                if (index === columns.length - 2) {
                    // Ajuste para la penúltima columna
                    $("<div>")
                        .addClass("flex flex-col")
                        .html(
                            `<span>${title}</span>
                    <select class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
                        <option value="">Todos</option>
                        <option value="Sí">Sí</option>
                        <option value="No">No</option>
                    </select>`
                        )
                        .appendTo(header)
                        .find("select")
                        .on("change", function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column
                                .search(val ? "^" + val + "$" : "", true, false)
                                .draw();
                        });
                } else if (index < columns.length - 1) {
                    $("<div>")
                        .addClass("flex flex-col")
                        .html(
                            `<span>${title}</span>
                    <input type="text" placeholder="Buscar..." class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100" />`
                        )
                        .appendTo(header)
                        .find("input")
                        .on("keyup change clear", function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column.search(val ? val : "", true, false).draw();
                        });
                } else {
                    $("<div>")
                        .addClass("flex flex-col justify-center text-center")
                        .html(`<span>${title}</span>`)
                        .appendTo(header);
                }
            });

            // Elimina la fila original de encabezados para prevenir la ordenación al clickear en los inputs
            $(selector + " thead tr:eq(0)").remove();

            applyTailwindClasses(selector);
        },
    });
}

function applyTailwindClasses(selector) {
    $(selector).addClass("w-full overflow-x-auto");
    $(`${selector} thead`).addClass(
        "text-xs uppercase bg-gray-50 dark:bg-gray-800"
    );
    $(`${selector} thead th`).addClass(
        "py-3 px-6 text-gray-700 dark:text-gray-200"
    );
    $(`${selector} tbody tr`).addClass(
        "border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900"
    );
    $(`${selector} tbody tr td`).addClass(
        "py-4 px-6 text-sm text-gray-700 dark:text-gray-100"
    );
}
