const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
  mode: "jit",
  content: [
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./vendor/laravel/jetstream/**/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/views/**/*.blade.php",
    "./resources/js/**/*.vue",
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ["Nunito", ...defaultTheme.fontFamily.sans]
      },
      colors: {
        'primary': {
            50: '#EFF0F6',
            100: '#bbc2d5',
            200: '#9ba4c1',
            300: '#6d7aa5',
            400: '#516193',
            500: '#253978',
            600: '#22346d',
            700: '#1a2855',
            800: '#141f42',
            900: '#101832',
        },
      }
    },
  },

  variants: {
    extend: {
      opacity: ["disabled"],
    },
  },

  plugins: [require("@tailwindcss/forms"), require("@tailwindcss/typography")],
  darkMode: "class",
};
