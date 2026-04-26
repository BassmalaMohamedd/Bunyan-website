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
                body:    ['"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans],
                mono:    ['"Space Mono"', '"Courier New"', ...defaultTheme.fontFamily.mono],
            },
            colors: {
                primary: {
                    DEFAULT: '#446E2E',
                    dark:    '#2D5016',
                    light:   '#5A8A3A',
                },
                accent: {
                    DEFAULT: '#88A47C',
                    hover:   '#738C69',
                },
                surface:   '#FDFAF4',
                'surface-secondary': '#EEF3E8',
                border:    '#D4DFC8',
                'text-main':  '#1A2410',
                'text-muted': '#6B7C5A',
            },
            borderRadius: {
                sm: '6px',
                md: '14px',
                lg: '24px',
                xl: '40px',
            },
            boxShadow: {
                sm:      '0 2px 8px rgba(26,36,16,0.06)',
                md:      '0 8px 24px rgba(26,36,16,0.1)',
                lg:      '0 24px 60px rgba(26,36,16,0.12)',
                glow:    '0 0 40px rgba(68,110,46,0.2)',
                premium: '0 20px 40px rgba(26,36,16,0.12)',
            },
            transitionTimingFunction: {
                premium: 'cubic-bezier(0.16, 1, 0.3, 1)',
            },
        },
    },

    plugins: [forms],
};
