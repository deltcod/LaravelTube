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

    //Likes
    Route::get('videos/{id}/likes', 'LikeDislikeController@getLikes');
    Route::get('videos/{id}/likes/count', 'LikeDislikeController@getLikesCount');
    Route::get('videos/{id}/dislikes', 'LikeDislikeController@getDislikes');
    Route::get('videos/{id}/dislikes/count', 'LikeDislikeController@getDislikesCount');
    Route::post('videos/{id}/like-dislike', 'LikeDislikeController@store');

    //User
    Route::get('users/', 'UserController@getAllUsers');
    Route::get('users/{id}', 'UserController@show');
    Route::post('users/{id}', 'UserController@update');
    Route::delete('users/{id}', 'UserController@delete');

    //Comments
    Route::get('videos/{id}/comments', 'CommentController@getComments');
    Route::post('videos/{id}/comments', 'CommentController@store');
    Route::put('videos/{video_id}/comments', 'CommentController@update');
    Route::delete('videos/{video_id}/comments', 'CommentController@delete');
});
