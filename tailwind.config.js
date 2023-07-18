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
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': {
                    50: '#f7f5bc',
                    100: '#f1ee8e',
                    200: '#ece75f',
                    300: '#e8e337',
                    400: '#e5de00',
                    500: '#e6cc00',
                    600: '#e6b400',
                    700: '#e69b00',
                    800: '#e47200',
                    900: '#e08600',
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
