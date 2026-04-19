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
                heading: ['"Playfair Display"', 'Georgia', ...defaultTheme.fontFamily.serif],
                mono: ['"DM Mono"', '"Courier New"', ...defaultTheme.fontFamily.mono],
                body: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    DEFAULT: '#f59e0b',
                    hover: '#d97706',
                },
                secondary: '#1c1917',
            },
            boxShadow: {
                premium: '0 20px 25px -5px rgba(28, 25, 23, 0.08), 0 10px 10px -5px rgba(28, 25, 23, 0.04)',
                glow: '0 0 30px rgba(245, 158, 11, 0.15)',
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
