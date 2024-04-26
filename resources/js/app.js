// Imports
////////////////////////////////////
import $ from 'jquery';
import './bootstrap';
import Alpine from 'alpinejs';

// Requires
////////////////////////////////////
require('datatables.net');
require('datatables.net-dt/css/jquery.dataTables.css');

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

    console.log('jquery is ready');

});