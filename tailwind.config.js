import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        screens: {
            'sm': '640px',
            'md': '900px',  // Cambiado de 768px a 900px
            'lg': '1024px',
            'xl': '1280px',
            '2xl': '1536px',
        },
    },

    darkMode: 'class', // Agrega esta línea aquí

    plugins: [
        require('flowbite/plugin'),
        forms
    ],
};
