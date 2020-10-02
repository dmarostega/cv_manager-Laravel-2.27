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
    .sass('resources/sass/app.scss', 'public/css')
    /** MAIN - SITE */
    .styles([
        'resources/views/main/css/reset.css',
        'resources/views/main/css/personalite.css',
        'resources/views/main/css/fonts.css'
    ],'public/main/css/personalite.css')
     .scripts([
         'resources/views/main/js/jquery.js'
     ],  'public/main/js/jquery.js')
    // /** ADMIN - PANEL */
     .styles([
         'resources/views/admin/dist/css/adminlte.min.css',
         'resources/views/admin/dist/css/alt/custom.css',
         'resources/views/admin/plugins/fontawesome-free/css/all.min.css',
         'resources/views/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css'
    ],'public/panel/css/adminlte.min.css')
     .scripts(
        [
            'resources/views/admin/plugins/jquery/jquery.min.js',
            'resources/views/admin/plugins/bootstrap/js/bootstrap.bundle.min.js'
      ],'public/panel/js/admin-init-script.js')
     .scripts([
         'resources/views/admin/dist/js/adminlte.min.js'
     ],'public/panel/js/admin-script.js')
     .scripts([
         'resources/views/admin/dist/js/pages/dashboard.js',
         'resources/views/admin/dist/js/pages/dashboard2.js',
         'resources/views/admin/dist/js/pages/dashboard3.js'
     ],'public/panel/js/pages/dashboards.js')
    .version()//Cria uma 'hash' para que quando o arquivo é alterado, no cliente, seja necessário baixar novamente (cache) ;
