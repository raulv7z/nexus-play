// Imports
////////////////////////////////////
import $ from 'jquery';
import './bootstrap';
import Alpine from 'alpinejs';
import 'datatables.net';

// Inits
////////////////////////////////////
window.$ = window.jQuery = $;
window.Alpine = Alpine;
Alpine.start();

// Vars
////////////////////////////////////
const html = $('html');
const themeToggle = $('#theme-toggle');
const themeIndicator = $('#toggle-dot');

// Functions
////////////////////////////////////
function startApp() {
    initializeTheme();
    attachEventHandlers();
}

function initializeTheme() {
    const theme = localStorage.getItem('theme') || 'light';
    setTheme({theme: theme});
}

function setTheme({theme}) {
    if (theme === 'dark') {
        html.addClass('dark');
        themeToggle.prop('checked', true);
        themeIndicator.css('transform', 'translateX(1rem)');
    } else {
        html.removeClass('dark');
        themeToggle.prop('checked', false);
        themeIndicator.css('transform', 'translateX(0)');
    }
    localStorage.setItem('theme', theme);
}

function attachEventHandlers() {
    themeToggle.on('change', function() {
        setTheme({theme: this.checked ? 'dark' : 'light'});
    });
}

// Main execution
////////////////////////////////////

$(function() {

    startApp();

});
