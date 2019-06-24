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

Route::apiResource('posts', 'PostController');

Route::get('/posts', 'Api\PostController@index');
Route::get('/posts/{id}', 'Api\PostController@show');
Route::get('/categories', 'Api\CategoryController@index');
Route::get('/categories/{id}', 'Api\CategoryController@getCategory');
Route::get('/categories/{id}/posts', 'Api\PostController@getPosts');
