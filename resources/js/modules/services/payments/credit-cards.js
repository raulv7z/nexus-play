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

const cardNumberInput = $("#card_number");
const expirationDateInput = $("#expiration_date");
const cvcInput = $("#cvc");

const nodes = {
    cardNumberInput,
    expirationDateInput,
    cvcInput,
};

// Functions
////////////////////////////////////
function startApp() {
    attachEventListeners({ nodes });
}

function attachEventListeners({ nodes }) {

    // Function to format card number
    nodes.cardNumberInput.on("input", function () {
        let caughtInputVal = nodes.cardNumberInput.val().replace(/\D/g, ""); // Only digits

        // Limit to 16 digits
        if (caughtInputVal.length > 16) {
            caughtInputVal = caughtInputVal.substring(0, 16);
        }

        let newInputVal = caughtInputVal.match(/.{1,4}/g)?.join("-") || "";

        if (caughtInputVal.length >= 16) {
            nodes.expirationDateInput.focus();
        }

        nodes.cardNumberInput.val(newInputVal);
    });

    // Function to format expiration date
    nodes.expirationDateInput.on("input", function () {
        let caughtInputVal = nodes.expirationDateInput.val().replace(/\D/g, ""); // Only digits

        // Limit to 4 digits
        if (caughtInputVal.length > 4) {
            caughtInputVal = caughtInputVal.substring(0, 4);
        }

        let newInputVal = caughtInputVal.match(/.{1,2}/g)?.join("/") || "";

        if (caughtInputVal.length >= 4) {
            nodes.cvcInput.focus();
        }

        nodes.expirationDateInput.val(newInputVal);
    });

    // Prevent non-numeric input and limit to 4 digits for CVC
    nodes.cvcInput.on("input", function () {
        let cvcValue = nodes.cvcInput.val().replace(/\D/g, ""); // Only digits

        // Limit to 4 digits
        if (cvcValue.length > 4) {
            cvcValue = cvcValue.substring(0, 4);
        }

        nodes.cvcInput.val(cvcValue);
    });
}

// Main execution
////////////////////////////////////
$(function () {
    startApp();
});
