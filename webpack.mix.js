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


mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

mix.js('resources/js/admin_app.js', 'public/admin_assets/app/js/app.js');
mix.sass('resources/css/admin_app.scss', 'public/admin_assets/app/css/app.css')
    .options({
        processCssUrls: false
    });


// user
mix.js('resources/js/LoadComponents/admin/user.js', 'public/admin_assets/custom/js/users/user.js');

// employee
mix.js('resources/js/LoadComponents/admin/employee.js', 'public/admin_assets/custom/js/employees/employee.js');

// gallery
mix.js('resources/js/LoadComponents/admin/gallery.js', 'public/admin_assets/custom/js/galleries/gallery.js');

// admin
mix.js('resources/js/LoadComponents/admin/admin.js', 'public/admin_assets/custom/js/admins/admin.js');

// category
mix.js('resources/js/LoadComponents/admin/category.js', 'public/admin_assets/custom/js/categories/category.js');


// place
mix.js('resources/js/LoadComponents/admin/country.js', 'public/admin_assets/custom/js/countries/country.js');
mix.js('resources/js/LoadComponents/admin/city.js', 'public/admin_assets/custom/js/cities/city.js');
mix.js('resources/js/LoadComponents/admin/neighborhood.js', 'public/admin_assets/custom/js/neighborhoods/neighborhood.js');

// role
mix.js('resources/js/LoadComponents/admin/role.js', 'public/admin_assets/custom/js/roles/role.js');

// setting
mix.js('resources/js/LoadComponents/admin/setting.js', 'public/admin_assets/custom/js/settings/setting.js');

// notification
mix.js('resources/js/LoadComponents/admin/notification.js', 'public/admin_assets/custom/js/notifications/notification.js');


