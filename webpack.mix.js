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

mix.js('resources/js/app.js', 'public/js')
    .scripts(['resources/js/bootstrap.min.js','resources/js/main.js','resources/js/landerapp.min.js'], 'public/js/main.js')
    .styles(['resources/css/bootstrap.min.css',
         'resources/css/landerapp.min.css',
         'resources/css/pages.min.css',
         'resources/css/rtl.min.css',
         'resources/css/themes.min.css',
         'resources/css/widgets.min.css'],'public/css/main.css');