const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js");
//.extract(["vue"]);
mix.combine(
    [
        "resources/jslibs/query.js",
        "resources/jslibs/bootstrap.js",
        "resources/jslibs/jquery.validate.js",
        "resources/jslibs/theme.js"
    ],
    "public/js/all.js"
);

mix.styles(
    ["resources/lib/bootstrap.css", "resources/lib/theme.css"],
    "public/css/app.css"
);
