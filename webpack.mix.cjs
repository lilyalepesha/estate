let mix = require('laravel-mix');

mix
    .setPublicPath('public')
    .js('resources/js/app.js','dist/js/app/app.js')
    .js('resources/js/estate.js', 'dist/js/app/estate.js')
    .sass('resources/scss/app.scss','dist/css/app/app.css')
    .sass('resources/scss/estate.scss','dist/css/app/estate.css')
    .sass('resources/scss/admin.scss', 'dist/css/app/admin.css');
