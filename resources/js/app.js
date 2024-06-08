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

// const themeToggleSelectorResponsive = "#theme-toggle-responsive";
// const themeIndicatorSelectorResponsive = "#theme-dot-responsive";
// const themeToggleResponsive = $(themeToggleSelectorResponsive);
// const themeIndicatorResponsive = $(themeIndicatorSelectorResponsive);

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
