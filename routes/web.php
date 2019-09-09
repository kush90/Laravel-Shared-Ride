<?php

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





//Route::get('send/sms','PageController@sendsmsmessage');

Route::get('/','PageController@index');
Route::get('driver/register','PageController@driver_register');
Route::post('driver/register','Auth\RegisterController@driver_store');


Route::get('rider/register','PageController@rider_register');
Route::post('rider/register','Auth\RegisterController@rider_store');


Route::get('user/activation/{token}','Auth\RegisterController@activate');
Route::get('user/login','Auth\LoginController@show');
Route::post('user/login','Auth\LoginController@login');
Route::get('user/logout','Auth\LoginController@logout');

Route::get('forget/password','Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('forget/password','Auth\ResetPasswordController@reset');


Route::get('reset/password/{email}/{token}','Auth\ResetPasswordController@showResetForm');
Route::post('reset/password/{email}/{token}','Auth\ResetPasswordController@resetPassword');


Route::group(array('prefix'=>'driver','namespace'=>'Driver','middleware'=>'manager'),function (){

Route::get('index','DriverController@index');
Route::post('update/profile','DriverController@update_profile');
Route::post('change/password','DriverController@change_password');
Route::post('offer/ride','DriverController@offer_ride');

});

Route::group(array('prefix'=>'rider','namespace'=>'Rider','middleware'=>'managertwo'),function (){

    Route::get('index','RiderController@index');
    Route::get('join','RiderController@join');
    Route::get('profile','RiderController@profile');
    Route::post('profile','RiderController@update_profile');
    Route::get('change/password','RiderController@password');
    Route::post('change/password','RiderController@change');

    Route::get('history','RiderController@history');

    Route::get('driver/{name}/profile','RiderController@driver_profile');
    Route::post('driver/{name}/profile','RiderController@give_review');

});

Route::group(array('prefix'=>'admin','namespace'=>'Admin','middleware'=>'managerthree'),function(){
    Route::get('index','AdminController@index');
    Route::get('review','AdminController@review');
    Route::get('delete/{id}','AdminController@delete');
    Route::get('view/offered','AdminController@view_offered');
});