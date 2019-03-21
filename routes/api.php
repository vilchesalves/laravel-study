<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/posts', 'PostController@apiList');
Route::get('/v1/posts/{id}', 'PostController@apiSingle');

Route::middleware('auth:api')->group(function () {
    Route::post('/v1/posts/update', 'PostController@update');
    Route::post('/v1/posts/store', 'PostController@store');
    Route::post('/v1/posts/destroy', 'PostController@destroy');
});
