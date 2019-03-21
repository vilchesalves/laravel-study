<?php

use Illuminate\Http\Request;

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

Route::get('/', 'PostController@index')->name('post.index');
Route::get('/posts/{id}', 'PostController@show')->name('post.show');

Route::get('/dashboard', function (Request $request) {
    return view('dashboard', [
        'currentUser' => $request->user(),
    ]);
})->middleware('auth')->name('dashboard');

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
