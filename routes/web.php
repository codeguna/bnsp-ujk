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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    //Start Route User Profile
    Route::get('/user_profile/create', 'UserProfileController@create')->name('user-profiles.create');
    Route::post('/user_profile/store', 'UserProfileController@store')->name('user-profiles.store');
    Route::get('/user_profile/index', 'UserProfileController@index')->name('user-profiles.index');
    Route::get('/user_profile/show/{id}', 'UserProfileController@show')->name('user-profiles.show');
    Route::get('/user_profile/destroy/{id}', 'UserProfileController@destroy')->name('user-profiles.destroy');
    Route::post('/user_profile/update/{id}', 'UserProfileController@update')->name('user-profiles.update');
    Route::get('/user_profile/edit/{id}', 'UserProfileController@edit')->name('user-profiles.edit');
    //End Route User Profile
});
