let mix = require('laravel-mix');
// your Wordpress theme name here
var themename = "base-theme";
const hostName = "http://wpbasetheme.local"; // using mamp in my instance. //
const themePath = '.';
const resources = themePath + '/src';
mix.setPublicPath(`${themePath}/assets`);

mix.sass(`${resources}/scss/styles.scss`, `${themePath}/assets/css/styles.min.css`)
mix.js(`${resources}/js/scripts.js`, `${themePath}/assets/js/scripts.min.js`)

mix.browserSync({
  proxy: hostName,
  files: [
    `${themePath}/**/*.php`,
    `${themePath}/**/*.js`,
    `${themePath}/**/*.css`,
  ]
});