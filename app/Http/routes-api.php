<?php

Route::group(['prefix' => 'api/'], function () {
    //Api Videos
    Route::get('videos', 'VideoController@getAllVideos');
    Route::get('videos/best', 'VideoController@getBestVideos');
    Route::get('videos/user/{id}', 'VideoController@getVideosUser');
    Route::get('videos/category/{name}', 'VideoController@getVideosForCategory');
    Route::get('videos/search/{name}', 'VideoController@getVideosForSearch');
    Route::post('videos', 'VideoController@store');
    Route::get('videos/{id}', 'VideoController@show');
    Route::put('videos/{id}', 'VideoController@update');
    Route::delete('videos/{id}', 'VideoController@destroy');
});
