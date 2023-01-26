const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
  mode: "jit",
  purge: [
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
          200: '#fefce8',
          300: '#fef9c3',
          400: '#fef08a',
          500: '#fde047',
          600: '#facc15',
          700: '#eab308',
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
