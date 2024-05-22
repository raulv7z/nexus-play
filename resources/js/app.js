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
const themeToggle = $("#theme-toggle");
const themeIndicator = $("#toggle-dot");

// Alerts
const errorAlert = $("#error-alert");
const successAlert = $("#success-alert");
const alerts = [errorAlert, successAlert];

const reactiveStars = $(".reactive-1");

// Functions
////////////////////////////////////
function startApp() {
    initializeTheme();
    attachEventHandlers();
    setAlertTimeouts(alerts);
    addReactiveBehavior(reactiveStars);
}

function initializeTheme() {
    const theme = localStorage.getItem("theme") || "light";
    setTheme({ theme: theme });
}

function setTheme({ theme }) {
    const backgroundColor = theme === "dark" ? "#535de4" : "#adb5bd"; // blue/gray on HxD
    if (theme === "dark") {
        html.addClass("dark");
        themeToggle.prop("checked", true);
        themeIndicator.css("transform", "translateX(1rem)");
    } else {
        html.removeClass("dark");
        themeToggle.prop("checked", false);
        themeIndicator.css("transform", "translateX(0)");
    }
    $("#theme-toggle")
        .next("label")
        .find(".block")
        .css("background-color", backgroundColor); // adjust bg color
    localStorage.setItem("theme", theme);
}

function attachEventHandlers() {
    themeToggle.on("change", function () {
        setTheme({ theme: this.checked ? "dark" : "light" });
    });
}

function setAlertTimeouts(alerts) {
    alerts.forEach((alert) => {
        if (alert) {
            setTimeout(() => {
                alert.fadeOut(500, function () {
                    alert.remove();
                });
            }, 5000); // 5000 ms = 5 seconds
        }
    });
}

function addReactiveBehavior(reactiveStars) {
    let lastSelectedValue = 1; // Guardar el último valor seleccionado

    reactiveStars.on("click", function () {
        const clickedStar = $(this);
        const order = clickedStar.data("order");

        // Actualizar el valor de todas las estrellas según la estrella clickeada
        reactiveStars.each(function () {
            const starOrder = $(this).data("order");
            $(this).toggleClass(
                "text-yellow-400 dark:text-yellow-400",
                starOrder <= order
            );
        });

        lastSelectedValue = order; // Actualizar el último valor seleccionado
    });

    // Mostrar el valor en hover
    reactiveStars.on("mouseenter", function () {
        const hoveredStar = $(this);
        const order = hoveredStar.data("order");
        showValueOnHover(order);
    });

    // Restaurar el último valor seleccionado si el mouse sale sin hacer clic
    reactiveStars.on("mouseleave", function () {
        showValueOnHover(lastSelectedValue);
    });

    // Función para mostrar el valor en hover
    function showValueOnHover(value) {
        reactiveStars.each(function () {
            const starOrder = $(this).data("order");
            $(this).toggleClass(
                "text-yellow-400 dark:text-yellow-400",
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
