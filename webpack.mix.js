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

mix
    .sass('resources/views/assets/scss/reset.scss', 'public/assets/css/reset.css')
    .sass('resources/views/assets/scss/boot.scss', 'public/assets/css/boot.css')
    .sass('resources/views/assets/scss/login.scss', 'public/assets/css/login.css')

    .scripts([
        'resources/views/assets/js/jquery.min.js'
    ], 'public/assets/js/jquery.min.js')

    .copyDirectory('resources/views/assets/css/fonts', 'public/assets/css/fonts')
    .copyDirectory('resources/views/assets/images', 'public/assets/images')

    .options({
        processCssUrls: false
    })

    .version()

