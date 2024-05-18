// Imports
////////////////////////////////////
import $ from 'jquery';
import axios from 'axios';
import Alpine from 'alpinejs';

import 'flowbite';
import './bootstrap';

// Inits
////////////////////////////////////
window.$ = window.jQuery = $;
window.axios = axios;
window.Alpine = Alpine;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
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
    const backgroundColor = (theme === 'dark' ? '#535de4' : '#adb5bd'); // blue/gray on HxD
    if (theme === 'dark') {
        html.addClass('dark');
        themeToggle.prop('checked', true);
        themeIndicator.css('transform', 'translateX(1rem)');
    } else {
        html.removeClass('dark');
        themeToggle.prop('checked', false);
        themeIndicator.css('transform', 'translateX(0)');
    }
    $('#theme-toggle').next('label').find('.block').css('background-color', backgroundColor); // adjust bg color
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
