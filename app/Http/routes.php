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

//Welcome
Route::get('/', function () {
    return view('welcome');
});

//Social Login
Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToAuthenticationServiceProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleAuthenticationServiceProviderCallback');

//My Videos
Route::get('myvideos', 'MyVideosController@index');

//Upload
Route::get('upload', 'UploadController@index');

//Analytics
Route::get('/analytics/likes-dislikes', 'AnalyticsController@likesDislikes');

//Profile
Route::get('profile', 'ProfileController@index');
