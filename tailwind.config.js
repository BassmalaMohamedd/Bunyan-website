import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                heading: ['"Plus Jakarta Sans"', 'Tajawal', ...defaultTheme.fontFamily.sans],
                body: ['"Plus Jakarta Sans"', 'Tajawal', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    DEFAULT: '#cba365',
                    hover: '#b89158',
                },
                secondary: '#0f172a',
            },
            boxShadow: {
                premium: '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)',
                glow: '0 0 20px rgba(203, 163, 101, 0.2)',
            },
            transitionTimingFunction: {
                premium: 'cubic-bezier(0.16, 1, 0.3, 1)',
            },
            transitionDuration: {
                slow: '800ms',
                base: '400ms',
            },
        },
    },

    plugins: [forms],
};
