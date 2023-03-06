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
    'resources/scss/user.scss', // src
    'public/css/user.css', // output
    {}, // sass-loader plugin options
    [ tailwindcss('./tailwind.config.js') ] // postcss plugins
);

mix.sass(
    'resources/scss/admin.scss', // src
    'public/css/admin.css', // output
    {}, // sass-loader plugin options
    [ tailwindcss('./tailwind.admin.config.js') ] // postcss plugins
);

mix
    .js("resources/ts/app.ts", "public/js")
    .js("resources/ts/admin.ts", "public/js")
    .vue()
    .version()
    .webpackConfig({
        module  : {
            rules : [
                {
                    test    : /\.tsx?$/,
                    loader  : 'ts-loader',
                    options : {appendTsSuffixTo : [/\.vue$/]},
                    exclude : /node_modules/,
                },
            ],
        },
        resolve : {
            extensions : ['*', '.js', '.jsx', '.vue', '.ts', '.tsx'],
        },
    })
    .alias({
        '@' : 'resources/ts',
    })
    .webpackConfig(require('./webpack.config'));


if (mix.inProduction()) {
    mix.version();
} else {
    mix.browserSync("http://localhost:8000");
}
