import $ from 'jquery';
// import 'datatables.net-dt';  // Import DataTables with neutral styles
import 'datatables.net-responsive-dt'; // import datatables with neutral styles + responsive

export function createDataTable(selector, data, columns) {

    // const currentScriptUrl = new URL(import.meta.url);
    // Construir la ruta al archivo JSON de idioma

    if ($(selector).html() == "") {
        var tabla = $(selector).DataTable();
        $(selector).html("")
        tabla.destroy();
    }

    $(selector).DataTable({
        responsive: true,
        paging: true,
        searching: true,
        autoWidth: false,
        info: true,
        data: data,
        order: [[0, 'asc']],
        columns: columns,
        // language: {
        //     url: `${currentScriptUrl.origin}/public/json/languages/spanish.json`
        // }
        // language: {
        //     "lengthMenu": "Mostrar _MENU_ registros por página",
        //     "zeroRecords": "Sin resultados",
        //     "info": "Mostrando página _PAGE_ de _PAGES_ de un total de _MAX_ registros",
        //     "infoEmpty": "No hay registros disponibles",
        //     "infoFiltered": "(filtrado de _MAX_ registros totales)",
        //     "loadingRecords": "Cargando...",
        //     "processing": "Procesando...",
        //     "search": "Buscar:",
        //     "buttons": {
        //         "selectAll": "Selecciona todos",
        //         "selectNone": "Deselecciona todos"
        //     },
        //     "paginate": {
        //         "first": "Primero",
        //         "last": "Último",
        //         "next": "Siguiente",
        //         "previous": "Anterior"
        //     }
        // }
    })

    applyTailwindClasses(selector);
};
function applyTailwindClasses(selector) {
    $(selector).addClass('w-full overflow-x-auto');

    // Encabezados de la tabla
    $(`${selector} thead`).addClass('text-xs uppercase bg-gray-50 dark:bg-gray-700');
    $(`${selector} thead th`).addClass('py-3 px-6 text-gray-700 dark:text-gray-200');

    // Filas de la tabla
    $(`${selector} tbody tr`).addClass('border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800');
    $(`${selector} tbody tr td`).addClass('py-4 px-6 text-sm text-gray-700 dark:text-gray-300');

    // Paginación
    $(`${selector}_paginate`).addClass('flex justify-between items-center p-4');
    $(`${selector}_paginate a`).addClass('text-xs text-gray-700 dark:text-gray-300 hover:underline');

    // Campo de búsqueda
    $(`${selector}_filter input`).addClass('form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm');
    $(`${selector}_filter input`).attr('placeholder', 'Buscar...');

    // Desplegable para seleccionar entradas por página
    $(`${selector}_length select`).addClass('form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm');
}