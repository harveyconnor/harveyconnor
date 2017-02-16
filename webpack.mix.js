const { mix } = require('laravel-mix');

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

mix.js([
    'resources/assets/js/app.js',
    'resources/assets/js/oneui-app.js',
    'resources/assets/js/core/jquery.min.js',
    'resources/assets/js/core/jquery.slimscroll.min.js',
    'resources/assets/js/core/jquery.scrollLock.min.js',
    'resources/assets/js/core/jquery.appear.min.js',
    'resources/assets/js/core/jquery.countTo.min.js',
    'resources/assets/js/core/jquery.placeholder.min.js',
    'resources/assets/js/core/js.cookie.min.js'
    ], 'public/js/app.js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .combine([
        'resources/assets/css/bootstrap.min.css',
        'resources/assets/css/oneui.css'
    ], 'public/css/style.css')
    .copy('node_modules/font-awesome/fonts', 'public/fonts')
    .copy('node_modules/simple-line-icons/fonts', 'public/fonts');
