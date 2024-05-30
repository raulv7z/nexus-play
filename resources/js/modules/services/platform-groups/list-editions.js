// Imports
////////////////////////////////////
import $ from "jquery";
import "../../../bootstrap";

// Inits
////////////////////////////////////
window.$ = window.jQuery = $;

// Vars
////////////////////////////////////
const html = $("html");

const sectionSelector = ".list-editions";
const formSelector = "#form-filter-editions";
const formNode = $(formSelector);
const sectionNode = $(sectionSelector);

// Functions
////////////////////////////////////
function startApp() {
    attachFilterListener({ formNode: formNode, sectionNode: sectionNode });
}

function loadEditionSection({ sectionNode, formData }) {
    $.ajax({
        url: "/home/platform-groups/filter-editions",
        type: "GET",
        dataType: "html",
        data: formData,
        success: function (data) {
            sectionNode.html(data);
        },
        error: function (xhr, status, error) {
            console.error("Error fetching editions:", error);
        },
    });
}

function attachFilterListener({ formNode, sectionNode }) {
    // Configurar el envío del formulario para usar AJAX
    formNode.on("submit", function (event) {
        event.preventDefault();
        const formData = $(this).serialize();
        loadEditionSection({ sectionNode: sectionNode, formData: formData });
    });

    formNode.on("reset", function (event) {
        event.preventDefault();
        location.reload(); // reload page
    });
}

// Main execution
////////////////////////////////////

$(function () {
    startApp();
});
