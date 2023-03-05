const defaultTheme = require("tailwindcss/defaultTheme");

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
                }
            }
        },
    },

    variants: {
        extend: {
            opacity: ["disabled"],
        },
    },

    plugins: [
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/container-queries'),
        require("@tailwindcss/forms"), 
        require('@tailwindcss/line-clamp'),
        require("@tailwindcss/typography"), 
    ],
    darkMode: "class",
};
