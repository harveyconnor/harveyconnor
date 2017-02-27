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

mix.js('resources/assets/js/app.js', 'public/js/app.js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .combine([
        'resources/assets/css/bootstrap.min.css',
        'resources/assets/css/oneui.css'
    ], 'public/css/style.css')
    .copy('node_modules/font-awesome/fonts', 'public/fonts')
    .copy('node_modules/simple-line-icons/fonts', 'public/fonts')
    .copy('node_modules/slug/slug.js', 'public/js')
    .copy('resources/assets/js/oneui-app.js','public/js/base.js',false)
    .copy('resources/assets/js/plugins','public/js/plugins',false)
    .copy('resources/assets/js/core','public/js/core',false);
/*Copy Plugins and maintain folder structure by setting to false ^*/
