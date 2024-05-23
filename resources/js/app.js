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
const alertsArray = [errorAlert, successAlert];

// Stars
const reactiveStars = $(".reactive-1");     // Star nodes
const ratingInput = $("#rating");           // Rating input hidden

// Functions
////////////////////////////////////
function startApp() {
    initializeTheme();
    attachThemeBehavior({ toggle: themeToggle });
    attachReactiveBehavior({ stars: reactiveStars });
    setAlertTimeouts({ alerts: alertsArray });
}

function initializeTheme() {
    const themeLocal = localStorage.getItem("theme") || "light";
    setTheme({ theme: themeLocal });
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

function attachThemeBehavior({ toggle }) {
    toggle.on("change", function () {
        setTheme({ theme: this.checked ? "dark" : "light" });
    });
}

function setAlertTimeouts({ alerts }) {
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

function attachReactiveBehavior({ stars }) {
    let lastSelectedValue = 1; // save last value selected

    stars.on("click", function () {
        const clickedStar = $(this);
        const order = clickedStar.data("order");

        // update the value of all stars based on the selected star
        stars.each(function () {
            const starOrder = $(this).data("order");
            $(this).toggleClass(
                "text-yellow-400 dark:text-yellow-400",
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
