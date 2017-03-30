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

mix.js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/app-landing.js', 'public/js/app-landing.js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .less('resources/assets/bootstrap-less/bootstrap/bootstrap.less', 'public/css/bootstrap.css')
   .less('resources/assets/less/adminlte-app.less','public/css/adminlte-app.css')
   .less('node_modules/toastr/toastr.less','public/css/toastr.css')
   .combine([
       'public/css/app.css',
       'resources/assets/admin-lte/dist/css/skins/_all-skins.css',
       'public/css/adminlte-app.css',
       'node_modules/icheck/skins/square/green.css',
       'public/css/toastr.css'
   ], 'public/css/all.css')
   .combine([
       'public/css/bootstrap.css',
       'resources/assets/css/main.css'
   ], 'public/css/all-landing.css')
   //APP RESOURCES
   .copy('resources/assets/img/*.*','public/img')
   //VENDOR RESOURCES
   .copy('node_modules/font-awesome/fonts/*.*','public/fonts/')
   .copy('node_modules/ionicons/dist/fonts/*.*','public/fonts/')
   .copy('resources/assets/admin-lte/bootstrap/fonts/*.*','public/fonts/bootstrap')
   .copy('resources/assets/admin-lte/dist/css/skins/*.*','public/css/skins')
   .copy('resources/assets/admin-lte/dist/img','public/img')
   .copy('resources/assets/admin-lte/plugins','public/plugins')
   .copy('node_modules/icheck/skins/square/green.png','public/css')
   .copy('node_modules/icheck/skins/square/green@2x.png','public/css');
