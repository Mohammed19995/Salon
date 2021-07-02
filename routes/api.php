<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Http\Controllers\Api\Product\ProductController;
use App\Http\Controllers\Api\Cart\CartController;
use App\Http\Controllers\Api\Checkout\CheckoutController;
use App\Http\Controllers\Api\AuctionOrder\AuctionOrderController;


Route::group(['middleware' => ['check_language', 'get_user'], 'namespace' => 'Api'], function () {

    // login
    Route::post('login', 'User\AuthController@login');
    Route::post('register', 'User\AuthController@register');
    Route::get('get-register-data', 'User\AuthController@registerData');
    Route::get('settings', 'SettingController@index');
    Route::get('banks', 'ApiController@banks');


    // forgetPassword
    Route::post('password/forget', 'User\ResetPasswordController@forgetPassword');
    Route::post('password/confirm-code', 'User\ResetPasswordController@confirmResetCode');


    Route::group(['middleware' => ['auth:api','check_status_api']], function () {

        // reset password
        Route::post('password/reset', 'User\ResetPasswordController@resetPassword');


        Route::group(['middleware' => ['user_type:1']], function () {
            // account
            Route::post('confirm-account', 'User\ConfirmAccountController@confirmAccount')->middleware('confirm_account_api');
            Route::get('resend-code', 'User\ConfirmAccountController@resendCode')->middleware('confirm_account_api');

            Route::get('activate-account', 'User\ConfirmAccountController@activateAccount')->middleware('confirm_account_api');

        });
        Route::group(['middleware' => ['check_confirm_account_api']], function () {

            // my account
            Route::get('profile', 'User\UserController@profile');
            Route::post('update-profile', 'User\UserController@updateProfile');

            // notifications
            Route::get('notifications', 'NotificationController@index');
            Route::post('mark-as-read-notifications', 'NotificationController@markAsRead');

            // my auctions
            Route::get('my-auctions', 'Auction\AuctionController@myAuctions');
            Route::get('auctions/{id}', 'Auction\AuctionController@show');


            Route::group(['middleware' => ['user_type:1']], function () {

                // auctions
                Route::get('auctions', 'Auction\AuctionController@index');
                Route::post('auctions', 'Auction\AuctionController@store');

//                Route::resource('auctions', 'Auction\AuctionController');
                Route::resource('auction-subscription', 'Auction\AuctionSubscriptionController');
                Route::resource('auction-price', 'Auction\AuctionPriceController');
                Route::resource('auction-favorite', 'Auction\AuctionFavoriteController');
                Route::resource('auction-rate', 'Auction\AuctionRateController');

                // orders
                Route::resource('orders', 'Order\OrderController');
                Route::post('bank-transfer', 'BankTransferController@store');

            });

            Route::group(['middleware' => ['user_type:2']], function () {
                Route::get('auction-orders', 'Auction\AuctionOrderController@index');
//                Route::post('accept-order', 'AuctionOrder\AuctionOrderController@acceptOrder');
//                Route::post('reject-order', 'AuctionOrder\AuctionOrderController@rejectOrder');

                Route::post('open-auction', 'Auction\AuctionOrderController@openAuction');
                Route::post('close-auction', 'Auction\AuctionOrderController@closeAuction');


                // statistic
                Route::get('statistic' , 'StatisticController@ownerRoomStatistic');

            });

        });


    });


});

// payment
Route::get('tap-payment', 'Api\Payment\PaymentController@completePayment');


Route::get('countries' , function (){
    return \App\Models\Country::all();
});

Route::get('test-integration' , function (){
//    $test = (new \App\Events\TestEvent())->delay(\Carbon\Carbon::now()->addMinutes(1));
    $test = (new \App\Jobs\TestJob())->delay(\Carbon\Carbon::now()->addMinutes(1));
    return app(\Illuminate\Contracts\Bus\Dispatcher::class)->dispatch($test);
});

//
//Route::get('sanc/login' , function (){
//    $user = \Illuminate\Support\Facades\Auth::guard('web')->login(\App\Models\User::latest()->first());
//    return response()->json($user);
//});
//Route::get('sanc/logout', function (Request $request) { \Illuminate\Support\Facades\Auth::guard('web')->logout(); return "done"; });
//Route::get('sanc/user' , function (Request $request){
//    return response()->json(\Illuminate\Support\Facades\Auth::guard('web')->user());
//})->middleware('auth:sanctum');