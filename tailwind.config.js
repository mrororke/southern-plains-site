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
            colors: {
                // Add your custom brand color here
                'club': '#4CBB17',
                'club-hover': '#3D9612',
                'league': '#FF0398',
                'league-hover': '#CC027A',
                'training': '#03CCFF',
                'training-hover': '#02A3CC',
                // You can add others like a secondary brand color:
                // 'secondary-brand': '#FF5733', 
            },
            fontFamily: {
                sans: ['Archivo', ...defaultTheme.fontFamily.sans],
                heading: ['Bebas Neue', 'sans-serif'],
            },
        },
    },

    plugins: [forms],
};
