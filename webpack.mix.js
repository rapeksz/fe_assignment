const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .scripts([
        'node_modules/bootstrap/dist/js/bootstrap.js',
    ],
        'public/js/vendor.js')
    .styles([
        'node_modules/bootstrap/dist/css/bootstrap.css',
        'resources/css/app.css',
    ],
        'public/css/app.css')
    .version();
