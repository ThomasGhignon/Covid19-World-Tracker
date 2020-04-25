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
    .sass('resources/sass/app.scss', 'public/css');
/*
    .sass('resources/sass/pages/country.scss', 'public/css')
    .sass('resources/sass/config/global.scss', 'public/css')
    .sass('resources/sass/layout/nav.scss', 'public/css')
    .sass('resources/sass/libs/cssReset.scss', 'public/css');*/
    /*.js('resources/js/app.js', 'public/js')*/
    /*.js('resources/js/libs/jquery.js', 'public/js')
    .js('resources/js/components/countryChart.js', 'public/js')
    .js('resources/js/components/homeChart.js', 'public/js');*/
