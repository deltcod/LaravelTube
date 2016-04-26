<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {
    //Welcome
    Route::get('/', function () {
        return view('welcome');
    });

    //Social Login
    Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToAuthenticationServiceProvider');
    Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleAuthenticationServiceProviderCallback');

});

Route::group(['prefix' => 'api/'], function () {
    //Api Videos
    Route::get('videos', 'VideoController@getAllVideos');
    Route::get('videos/best', 'VideoController@getBestVideos');
    Route::get('videos/user{id}', 'VideoController@getVideosUser');
    Route::get('videos/category/{name}', 'VideoController@getVideosForCategory');
    Route::post('videos', 'VideoController@store');
    Route::get('videos/{id}', 'VideoController@show');
    Route::put('videos/{id}', 'VideoController@update');
    Route::delete('videos/{id}', 'VideoController@destroy');
});
