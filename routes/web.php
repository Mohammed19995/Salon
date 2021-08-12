<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//

// web
Route::get('privacy-policy' , function (){
    app()->setLocale('en');
   $privacyPolicy = \App\Models\Setting::where('key','=','privacy_policy')->first();
   return view('privacy-policy',['privacyPolicy' => $privacyPolicy->value]);
});

// admin
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    // auth
    Route::get('login', 'AuthController@show_login')->name('admin.auth.login');
    Route::post('login', 'AuthController@login');
    Route::get('logout', 'AuthController@logout')->name('admin.logout');

    Route::get('confirm-account' , 'AuthController@show_confirm_account')->name('admin.confirm_account')->middleware('auth:admin');
    Route::post('confirm-account' , 'AuthController@confirm_account')->middleware('auth:admin');

    Route::group(['middleware' => ['auth:admin' , 'check_status_admin']] ,function (){
        Route::get('/', 'IndexController@home')->name('admin.index');

        // profile
        Route::get('profile' , 'ProfileController@index')->name('admin.profile');
        Route::post('profile' , 'ProfileController@update');
        Route::post('change-password' , 'ProfileController@change_password');

        // admins
        Route::resource('admins' , 'AdminController')->names(['index' => 'admin.admins.index']);
        Route::get('get-remote-admins' , 'AdminController@get_remote_admins');
        Route::post('admins/execute-option' , 'AdminController@executeOptions');
        Route::get('list-admins' , 'AdminController@getListAdmins');

        // users
        Route::resource('users' , 'UserController')->names(['index' => 'admin.users.index']);
        Route::get('get-remote-users' , 'UserController@get_remote_users');
        Route::post('users/execute-option' , 'UserController@executeOptions');
        Route::get('list-users' , 'UserController@getListUsers');

        // galleries
        Route::resource('galleries' , 'GalleryController')->names(['index' => 'admin.galleries.index']);
        Route::get('get-remote-galleries' , 'GalleryController@get_remote_gallery');

        // countries
        Route::resource('countries' , 'CountryController')->names(['index' => 'admin.countries.index']);
        Route::get('get-remote-countries' , 'CountryController@get_remote_country');
        Route::post('countries/execute-option' , 'CountryController@executeOptions');


        // gallery types
        Route::get('get-remote-gallery-types' , 'GalleryTypeController@get_remote_gallery_types');

        // categories
        Route::resource('categories' , 'CategoryController')->names(['index' => 'admin.categories.index']);
        Route::get('get-remote-categories' , 'CategoryController@get_remote_category');
        Route::post('categories/execute-option' , 'CategoryController@executeOptions');


        // cities
        Route::resource('cities' , 'CityController')->names(['index' => 'admin.cities.index']);
        Route::get('get-remote-cities' , 'CityController@get_remote_city');
        Route::post('cities/execute-option' , 'CityController@executeOptions');
        Route::get('get-remote-country-cities/{country_id}' , 'CityController@getRemoteCountryCities');

       // neighborhoods
        Route::resource('neighborhoods' , 'NeighborhoodController')->names(['index' => 'admin.neighborhoods.index']);
        Route::get('get-remote-neighborhoods' , 'NeighborhoodController@get_remote_neighborhood');
        Route::get('get-remote-city-neighborhoods/{city_id}' , 'NeighborhoodController@getRemoteCityNeighborhoods');
        Route::post('neighborhoods/execute-option' , 'NeighborhoodController@executeOptions');

        // salon categories
        Route::resource('salon-branches' , 'SalonBranchController')->names(['index' => 'admin.salon_branches.index']);
        Route::get('get-remote-salon-branches' , 'SalonBranchController@get_remote_brands');
        Route::post('salon-branches/execute-option' , 'SalonBranchController@executeOptions');


        // Sliders
        Route::resource('sliders' , 'SliderController')->names(['index' => 'admin.sliders.index']);
        Route::get('get-remote-sliders' , 'SliderController@getRemoteSliders');
        Route::post('sliders/execute-option' , 'SliderController@executeOptions');



        // places
        Route::resource('places' , 'PlaceController')->names(['index' => 'admin.places.index']);

        // salons
        Route::resource('salons' , 'Salon\SalonController')->names(['index' => 'admin.salons.index']);
        Route::get('get-remote-salons' , 'Salon\SalonController@getRemoteSalons');
        Route::post('salons/execute-option' , 'Salon\SalonController@executeOptions');


        // roles
        Route::resource('roles' , 'RoleController')->names(['index' => 'admin.roles.index']);
        Route::get('get-remote-roles' , 'RoleController@get_remote_role');
        Route::post('roles/execute-option' , 'RoleController@executeOptions');

        // notifications
        Route::resource('notifications' , 'NotificationController')->names(['index' => 'admin.notifications.index']);
        Route::get('get-remote-notifications' , 'NotificationController@getRemoteNotification');
        Route::get('notification-users' , 'NotificationController@getNotificationUsers');

        // settings
        Route::get('settings' , 'SettingController@index')->name('admin.settings.index');
        Route::post('settings' , 'SettingController@update');



    });
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('reset-password-success' , function (){
   return view('auth.passwords.reset_password_done');
});

// test
Route::get('test','TestController@index');
Route::get('test-api','TestController@testApi');
Route::get('test-session','TestController@testSession');
