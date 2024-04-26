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

// Functions
////////////////////////////////////

//

// Execs
////////////////////////////////////

$(function() {
    const themeToggle = $('#theme-toggle');
    const html = $('html');

    // Inicializar el estado del tema desde localStorage
    if (localStorage.getItem('theme') === 'dark') {
        html.addClass('dark');
        themeToggle.prop('checked', true);
    }

    // Evento de cambio para el toggle
    themeToggle.on('change', function() {
        if (this.checked) {
            html.addClass('dark');
            localStorage.setItem('theme', 'dark');
        } else {
            html.removeClass('dark');
            localStorage.setItem('theme', 'light');
        }
    });
});
