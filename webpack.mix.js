const mix = require("laravel-mix");
const tailwindcss = require('tailwindcss');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */


mix.sass(
  'resources/sass/app.scss', // src
  'public/assets/guest/app.css', // output
  {}, // sass-loader plugin options
  [ tailwindcss('./tailwind.config.js') ] // postcss plugins
);

mix.sass(
  'resources/css/app.scss', // src
  'public/assets/admin/app.css', // output
  {}, // sass-loader plugin options
  [ tailwindcss('./tailwind.admin.config.js') ] // postcss plugins
);

mix
  .js("resources/js/app.js", "public/js")
  .vue()
  .version()
  .webpackConfig(require("./webpack.config"));


if (mix.inProduction()) {
  mix.version();
} else {
  mix.browserSync("http://localhost:8000");
}
