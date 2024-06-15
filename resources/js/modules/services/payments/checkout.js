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

const paymentMethodInputs = [$("#mastercard"), $("#visa"), $("#amex")];
const invoiceDetailsContainer = $("#invoice-details-container");
const invoiceDetailsButton = $("#invoice-details-button");
const invoiceDetailsArrowUp = $("#invoice-details-arrow-up");
const invoiceDetailsArrowDown = $("#invoice-details-arrow-down");
const invoiceDetailsFormContainer = $("#invoice-details-form-container");
const cardNumberInput = $("#iban");
const expirationDateInput = $("#expiration_date");
const cvcInput = $("#cvc");

const nodes = {
    paymentMethodInputs,
    invoiceDetailsContainer,
    invoiceDetailsButton,
    invoiceDetailsArrowUp,
    invoiceDetailsArrowDown,
    invoiceDetailsFormContainer,
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

    nodes.invoiceDetailsButton.on("click", function () {
        nodes.invoiceDetailsContainer.toggleClass("shadow-lg");
        nodes.invoiceDetailsArrowUp.toggleClass("hidden");
        nodes.invoiceDetailsArrowUp.toggleClass("flex");
        nodes.invoiceDetailsArrowDown.toggleClass("hidden");
        nodes.invoiceDetailsArrowDown.toggleClass("flex");
        nodes.invoiceDetailsFormContainer.toggleClass("hidden");
    });

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
