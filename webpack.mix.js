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
    .sass('resources/views/assets/scss/reset.scss', 'public/assets/admin/css/reset.css')
    .sass('resources/views/assets/scss/boot.scss', 'public/assets/admin/css/boot.css')
    .sass('resources/views/assets/scss/login.scss', 'public/assets/admin/css/login.css')
    .sass('resources/views/assets/scss/style.scss', 'public/assets/admin/css/style.css')

    .styles([
        'resources/views/assets/js/datatables/css/jquery.dataTables.css',
        'resources/views/assets/js/datatables/css/responsive.dataTables.css',
        'resources/views/assets/js/select2/css/select2.css'
    ], 'public/assets/admin/css/libs.css')

    .scripts([
        'resources/views/assets/js/jquery.min.js'
    ], 'public/assets/admin/js/jquery.min.js')

    .scripts([
        'resources/views/assets/js/tinymce/tinymce.min.js',
        'resources/views/assets/js/datatables/js/jquery.dataTables.min.js',
        'resources/views/assets/js/datatables/js/dataTables.responsive.min.js',
        'resources/views/assets/js/select2/js/select2.min.js',
        'resources/views/assets/js/select2/js/i18n/pt-BR.js',
        'resources/views/assets/js/jquery.form.js',
        'resources/views/assets/js/jquery.mask.js'
    ], 'public/assets/admin/js/libs.js')

    .scripts([
        'resources/views/assets/js/scripts.js'
    ], 'public/assets/admin/js/scripts.js')

    .copyDirectory('resources/views/assets/js/datatables', 'public/assets/admin/js/datatables')
    .copyDirectory('resources/views/assets/js/select2', 'public/assets/admin/js/select2')
    .copyDirectory('resources/views/assets/js/tinymce', 'public/assets/admin/js/tinymce')
    .copyDirectory('resources/views/assets/css/fonts', 'public/assets/admin/css/fonts')
    .copyDirectory('resources/views/assets/images', 'public/assets/admin/images')

    .options({
        processCssUrls: false
    })

    .version()

