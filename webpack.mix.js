let mix = require('laravel-mix');

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
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    'resources/assets/front/css/bootstrap.css',
    'resources/assets/front/css/memenu.css',
    'resources/assets/front/css/flexslider.css',
    'resources/assets/front/megamenu/css/ionicons.min.css',
    'resources/assets/front/css/style.css'
],'public/css/front.css');

mix.scripts([
    'resources/assets/front/js/jquery-1.11.0.min.js',
    'resources/assets/front/js/bootstrap.min.js',
    'resources/assets/front/js/simpleCart.min.js',
    'resources/assets/front/js/jquery.easydropdown.js',
    'resources/assets/front/megamenu/js/megamenu.js',
    'resources/assets/front/js/imagezoom.js',
    'resources/assets/front/js/jquery.flexslider.js',
    'resources/assets/front/js/responsiveslides.min.js',
    'resources/assets/front/js/main.js'

], 'public/js/front.js');

mix.copy('resources/assets/fronts/fonts', 'public/fonts');
mix.copy('resources/assets/front/images', 'public/images');

