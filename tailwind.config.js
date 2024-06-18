import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
         "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                primary:'#5A0898',
                secondary:'#000000',
                accent:'#FFC200',
                texto:'#FFE607',
                background:'#5A1320',
                darkerprimary:'#3F0D16',
                lighterprimary:'#5F1A27'
            },
        },
    },

    plugins: [forms, typography, require("flowbite/plugin")],
};
