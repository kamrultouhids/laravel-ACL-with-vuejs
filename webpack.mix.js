const mix = require('laravel-mix');
let minifier = require('minifier');
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

mix.js('resources/js/user/role/manage-role.js', 'public/js/user')
    .js('resources/js/user/user/manage-user.js', 'public/js/user')
    .sass('resources/sass/master.scss', 'public/css',{
        outputStyle: 'nested'
    });

mix.then(() => {
    minifier.minify('public/css/master.css')
});