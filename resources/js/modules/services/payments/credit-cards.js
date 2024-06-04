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

    nodes.cardNumberInput.on("keyup", function () {
        const caughtInputVal = nodes.cardNumberInput.val().replace(/\s/g, "");;

        let newInputVal = ""; 
        
        if (caughtInputVal !== "") {
            newInputVal = caughtInputVal.match(/.{1,4}/g).join(" ");
        }

        // change focus when length is 16 (written card number)
        if (caughtInputVal.length >= 16) {
            nodes.expirationDateInput.focus();
        }

        nodes.cardNumberInput.val(newInputVal);
    });

    nodes.expirationDateInput.on("keyup", function () {
        const caughtInputVal = nodes.expirationDateInput.val().replace(/\//g, "");
        let newInputVal = ""; 
        
        if (caughtInputVal !== "") {
            newInputVal = caughtInputVal.match(/.{1,2}/g).join("/");
        }

        // change focus when length is 4 (written expiration date)
        if (caughtInputVal.length >= 4) {
            nodes.cvcInput.focus();
        }

        nodes.expirationDateInput.val(newInputVal);
    });

}

// Main execution
////////////////////////////////////

$(function () {
    startApp(nodes);
});
