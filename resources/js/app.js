// Imports
////////////////////////////////////
import $ from "jquery";
import axios from "axios";
import Alpine from "alpinejs";

import "flowbite";
import "./bootstrap";

// Inits
////////////////////////////////////
window.$ = window.jQuery = $;
window.axios = axios;
window.Alpine = Alpine;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
Alpine.start();

// Vars
////////////////////////////////////
const html = $("html");

// Theme
const themeToggleSelector = ".theme-toggle";
const themeIndicatorSelector = ".toggle-dot";
const themeToggle = $(themeToggleSelector);
const themeIndicator = $(themeIndicatorSelector);

// Alerts
const errorAlert = $("#error-alert");
const successAlert = $("#success-alert");
const alertsArray = [errorAlert, successAlert];

// Stars
const reactiveStars = $(".reactive-1"); // Star nodes
const ratingInput = $("#rating"); // Rating input hidden

// Cart icon
const cartIconLink = $("#cart-icon-link");

// Functions
////////////////////////////////////
function startApp() {
    // Initialize the first parts of the application
    initializeTheme({
        toggleSelector: themeToggleSelector,
        toggle: themeToggle,
        indicator: themeIndicator,
    });

    attachThemeBehavior({
        toggleSelector: themeToggleSelector,
        toggle: themeToggle,
        indicator: themeIndicator,
    });

    attachReactiveBehavior({ stars: reactiveStars });
    setAlertTimeouts({ alerts: alertsArray });
    renderCartIconLink({ linkNode: cartIconLink });

    // Verify if the botman container was initialized with an interval
    const checkInterval = setInterval(function () {

        const botmanWidgetRoot = $("#botmanWidgetRoot");

        if (botmanWidgetRoot.length > 0) {
            clearInterval(checkInterval); // Clear the interval when the container is loaded

            const botmanFixedDiv = botmanWidgetRoot.children("div:first");

            if (botmanFixedDiv.length > 0) {
                handleFixedBotContainer({ botContainer: botmanFixedDiv });
            } else {
                console.warn("[SAFE WARN] Nexbot was not loaded.");
            }
        }
    }, 100); // verify each 100 ms = 0.1 s
}

function handleFixedBotContainer({ botContainer }) {
    const closedDivStyles = {
        "min-width": "130px",
        "min-height": "120px",
    };
    botContainer.css(closedDivStyles);

    botContainer.on("click", function () {
        botContainer.toggleClass("state-opened");

        if (!botContainer.hasClass("state-opened")) {
            botContainer.css(closedDivStyles);
        }
    });
}

function initializeTheme({ toggleSelector, toggle, indicator }) {
    const themeLocal = localStorage.getItem("theme") || "light";
    setTheme({
        theme: themeLocal,
        toggleSelector: toggleSelector,
        toggle: toggle,
        indicator: indicator,
    });
}

function setTheme({ theme, toggleSelector, toggle, indicator }) {
    const backgroundColor = theme === "dark" ? "#535de4" : "#adb5bd"; // blue/gray on HxD
    if (theme === "dark") {
        html.addClass("dark");
        toggle.prop("checked", true);
        indicator.css("transform", "translateX(1rem)");
    } else {
        html.removeClass("dark");
        toggle.prop("checked", false);
        indicator.css("transform", "translateX(0)");
    }
    $(toggleSelector)
        .next("label")
        .find(".block")
        .css("background-color", backgroundColor); // adjust bg color
    localStorage.setItem("theme", theme);
}

function attachThemeBehavior({ toggleSelector, toggle, indicator }) {
    toggle.on("change", function () {
        setTheme({
            theme: this.checked ? "dark" : "light",
            toggleSelector: toggleSelector,
            toggle: toggle,
            indicator: indicator,
        });
    });
}

function setAlertTimeouts({ alerts }) {
    alerts.forEach((alert) => {
        if (alert) {
            setTimeout(() => {
                alert.fadeOut(1000, function () {
                    alert.remove();
                });
            }, 8000); // 1000 ms = 1 second
        }
    });
}

function renderCartIconLink({ linkNode }) {
    $.ajax({
        url: "/api/render/cart-icon-link",
        method: "GET",
        dataType: "html",
        success: function (data) {
            linkNode.html(data);
        },
        error: function (xhr, status, error) {
            if (xhr.status === 401) {
                console.warn("[SAFE WARN] User not authenticated. Cart icon was not dynamically rendered.");
            } else {
                console.warn("[SAFE WARN] Cart icon was not dynamically rendered.");
                console.warn("Status:", status);
                console.warn("Error:", error);
            }
        },
    });
}

function attachReactiveBehavior({ stars }) {
    let lastSelectedValue = 1; // save last value selected

    stars.on("click", function () {
        const clickedStar = $(this);
        const order = clickedStar.data("order");

        // update the value of all stars based on the selected star
        stars.each(function () {
            const starOrder = $(this).data("order");
            $(this).toggleClass(
                "text-yellow-300 dark:text-yellow-300",
                starOrder <= order
            );
        });

        lastSelectedValue = order; // update last value selected
        ratingInput.val(order); // update the hidden input value
    });

    // Mostrar el valor en hover
    stars.on("mouseenter", function () {
        const hoveredStar = $(this);
        const order = hoveredStar.data("order");
        showValueOnHover(order);
    });

    // restore last value selected if mouse leaves without click on any star
    stars.on("mouseleave", function () {
        showValueOnHover(lastSelectedValue);
    });

    // function for show value on hover
    function showValueOnHover(value) {
        stars.each(function () {
            const starOrder = $(this).data("order");
            $(this).toggleClass(
                "text-yellow-300 dark:text-yellow-300",
                starOrder <= value
            );
        });
    }
}

// Main execution
////////////////////////////////////

$(function () {
    startApp();
});
