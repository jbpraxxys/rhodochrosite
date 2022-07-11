const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
  mode: "jit",
  purge: [
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./vendor/laravel/jetstream/**/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/views/**/*.blade.php",
    "./resources/js/**/*.vue",
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ["Nunito", ...defaultTheme.fontFamily.sans],
      },
      colors: {
        'primary': {
          200: '#f6e8fc',
          300: '#f2ddfb',
          400: '#e4b8f6',
          500: '#a81ae2',
          600: '#7e14aa',
          700: '#3b094f',
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

  plugins: [require("@tailwindcss/forms"), require("@tailwindcss/typography")],
  darkMode: "class",
};
