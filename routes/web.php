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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('blog/posts/{post}', [PostsController::class, 'show'])->name('blog.show');
Route::get('blog/categories/{category}', [PostsController::class, 'category'])->name('blog.category');
Route::get('blog/tags/{tag}', [PostsController::class, 'tag'])->name('blog.tag');

Auth::routes();

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




//Route::get('/', 'PostController@all');
//Route::get('/posts/{post}', 'PostController@single');
//
//Route::get('/home', 'HomeController@index')->name('home');
//
//
//Route::get('/admin/{any}', 'AdminController@index')->where('any', '.*');
//
//Route::get('/{post}/comments', 'CommentController@index');
//Route::post('/{post}/comments', 'CommentController@store');




