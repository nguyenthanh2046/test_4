const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js').
    js('resources/js/modules/products/index.js', 'public/js/modules/products').
    js('resources/js/modules/products/form.js', 'public/js/modules/products').
    js('resources/js/modules/categories/index.js', 'public/js/modules/categories').
    js('resources/js/modules/categories/form.js', 'public/js/modules/categories').
    js('resources/js/select2_category.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
