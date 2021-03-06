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

use App\Http\Controllers\Blog\PostsController;


Route::group(['prefix'=>'admin','middleware'=>['auth']],function (){
    Route::get('/home', 'HomeController@index')->name('home'); // +
    Route::get('/trashed-posts', 'PostsController@trashed')->name('trashed-posts.index'); // +
    Route::get('/users/edit-profile', 'UsersController@edit')->name('users.edit-profile'); // +

    Route::put('/restore-post/{post}', 'PostsController@restore')->name('restore-post'); // +
    Route::put('/users/update-profile', 'UsersController@update')->name('users.update-profile'); // +

    Route::resource('/categories', 'CategoriesController'); // +
    Route::resource('/tags', 'TagsController'); // +
    Route::resource('/posts', 'PostsController'); // +

    Route::resource('/testUsers', 'AdminController'); // +
});

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function (){
    Route::get('/users', 'UsersController@index')->name('users.index'); // +
    Route::post('/users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin'); // +
});

Auth::routes();

Route::get('/{any}', 'SinglePageController@index')->where('any', '.*');



