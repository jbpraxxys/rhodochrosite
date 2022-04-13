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
        'bst-green-1': '#18402C',
        'bst-green-2': '#E9F5EE',
        'bst-yellow-1': '#C9A54B',
        'bst-yellow-2': '#FFDE59',
        'bst-yellow-3': '#FFEE59',
        'bst-yellow-4': '#FDFF9C'
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
