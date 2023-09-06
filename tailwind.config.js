import defaultTheme from 'tailwindcss/defaultTheme';
import aspectRatio from '@tailwindcss/aspect-ratio';
import containerQueries from '@tailwindcss/container-queries';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

module.exports = {
    mode: "jit",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/ts/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': {
                    50:'#EFF6FF',
                    100:'#DBEAFE',
                    200:'#BFDBFE',
                    300:'#93C5FD',
                    400:'#60A5FA',
                    500:'#3B82F6',
                    600:'#2563EB',
                    700:'#1D4ED8',
                    800:'#1E40AF',
                    900:'#1E3A8A',
                },
                'secondary': {
                    200: '#FFF8E6',
                    300: '#FFF5D9',
                    400: '#FFEAB0',
                    500: '#FFBC00',
                    600: '#BF8D00',
                    700: '#594200',
                },
            }
        },
    },

    variants: {
        extend: {
            opacity: ["disabled"],
        },
    },

    plugins: [
        aspectRatio,
        containerQueries,
        forms,
        typography,
    ],
    darkMode: "class",
};
