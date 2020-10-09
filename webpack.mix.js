const mix = require('laravel-mix');
const workboxPlugin = require('workbox-webpack-plugin');

mix.webpackConfig({
    plugins: [
        new workboxPlugin.InjectManifest({
            swSrc: 'public/sw-offline.js',
            swDest: 'sw.js',
            importsDirectory: 'service-worker'
        })
    ]
});

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
   .js('resources/js/accordion.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/top.scss', 'public/css')
   .sass('resources/sass/mypage.scss', 'public/css')
   .sass('resources/sass/common.scss', 'public/css')
   .sass('resources/sass/post.scss', 'public/css')
   .sass('resources/sass/responsive.scss', 'public/css');
