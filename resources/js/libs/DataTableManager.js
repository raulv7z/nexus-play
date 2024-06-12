import $ from "jquery";
import "datatables.net-responsive"; //
import "datatables.net-responsive-dt/css/responsive.dataTables.css"; //

class DataTableManager {
    table;
    options;
    data;
    styles;

    constructor(selector) {
        this.table = $(selector);
        if (!this.table) {
            throw new Error(`Table with selector "${selector}" not found`);
        }
        this.data = [];
    }

    // Método para inicializar la DataTable
    init(options, styles) {
        
        this.styles = styles;

        this.options = {
            ...options,
            initComplete: () => {
                this.addColumnSearch(options.columnSearch || []);
                this.applyStyles(this.styles);
            },
        };

        $(this.table).DataTable(this.options);
        this.attachListeners();
    }

    // Método para cargar datos en la DataTable
    loadData(data) {
        this.data = data;
        const dataTable = $(this.table).DataTable();
        dataTable.clear();
        dataTable.rows.add(data);
        dataTable.draw();
    }

    // Método para obtener los datos actuales de la DataTable
    getData() {
        return this.data;
    }

    // Método para agregar una fila a la DataTable
    addRow(row) {
        const dataTable = $(this.table).DataTable();
        dataTable.row.add(row).draw();
        this.data.push(row);
    }

    // Método para eliminar una fila de la DataTable
    deleteRow(index) {
        const dataTable = $(this.table).DataTable();
        dataTable.row(index).remove().draw();
        this.data.splice(index, 1);
    }

    attachListeners() {
        const dataTable = $(this.table).DataTable();

        // listen draw event for reapply styles
        dataTable.on("draw", () => {
            this.applyStyles(this.styles);
        });
    }

    // Método para agregar buscadores personalizados a cada columna
    addColumnSearch(columnSearch) {
        const thead = $(this.table).find("thead");
        const searchRow = $('<tr class="search-row"></tr>');

        thead.find("th").each((index, th) => {
            const columnConfig = columnSearch[index] || {};
            const searchType = columnConfig.type;
            let searchElement = "";

            if (searchType === "text") {
                searchElement = `<input type="text" placeholder="${$(
                    th
                ).text()}..." />`;
            } else if (searchType === "select") {
                const options = columnConfig.options || [];

                const optionAllText = "*";
                
                searchElement = `<select><option value="">${optionAllText}</option>`;
                options.forEach((option) => {
                    searchElement += `<option value="${option}">${option}</option>`;
                });
                searchElement += `</select>`;
            } else {
                searchElement += `<div class="empty"></div>`;
            }

            if (searchElement !== "") {
                const searchCell = $("<th></th>").append(searchElement);
                searchRow.append(searchCell);
            }
        });

        // Añadir la fila de búsqueda justo debajo de los encabezados
        thead.append(searchRow);

        // Añadir funcionalidad de búsqueda después de que los elementos están en el DOM
        $(this.table)
            .find(".search-row th")
            .each((index, th) => {
                const columnConfig = columnSearch[index] || {};
                const searchType = columnConfig.type || "text";
                const input = $(th).find("input, select");

                input.on("input change", () => {
                    const dataTable = $(this.table).DataTable(); // Obtener la instancia de DataTable correctamente
                    if (searchType === "text") {
                        dataTable.column(index).search(input.val()).draw();
                    } else if (searchType === "select") {
                        dataTable
                            .column(index)
                            .search(
                                input.val() ? `^${input.val()}$` : "",
                                true,
                                false
                            )
                            .draw();
                    }
                });
            });
    }

    applyStyles(styles = "bootstrap") {
        const tableDOM = $(this.table);

        // Custom styles

        switch (styles) {
            case "tailwind":
                tableDOM.addClass("w-full overflow-x-auto");
                tableDOM
                    .find("thead")
                    .addClass("text-xs uppercase bg-gray-50 dark:bg-gray-800");
                tableDOM
                    .find("thead th")
                    .addClass("py-3 px-6 text-gray-700 dark:text-gray-200");
                tableDOM
                    .find("tbody tr")
                    .addClass(
                        "border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900"
                    );
                tableDOM
                    .find("tbody tr td")
                    .addClass(
                        "py-4 px-6 text-sm text-gray-700 dark:text-gray-100"
                    );
                tableDOM
                    .find(".search-row th")
                    .addClass(
                        "py-2 px-4 text-gray-700 dark:text-gray-200 bg-gray-50 dark:bg-gray-800"
                    );
                tableDOM
                    .find(".search-row th input, .search-row th select")
                    .addClass(
                        "w-full py-2 px-3 bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-100 border border-gray-300 dark:border-gray-700 rounded"
                    );

            case "bootstrap":
                break;

            default:
                throw new Error(`Not supported style type`);
        }

        // Common styles

        const globalSearchInputSelector = "#dt-search-0";
        const pageSizeSelectSelector = "#dt-length-0";
        
        $("html").find(globalSearchInputSelector).css({
            "padding": "8px 12px",
            "border-radius": "0.375rem",
        });

        $("html").find(pageSizeSelectSelector).css({
            "padding": "8px 24px",
            "border-radius": "0.375rem",
        });
    }
}

export default DataTableManager;
