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

Route::get('/', 'PageController@index');

Route::resource('comment','CommentController');

Route::resource('posts', 'PostController');

Route::get('/posts/{id}', 'PostController@show')->name('posts.show');

Route::get('/dashboard', 'DashboardController@index');

Route::post('ckeditor/image_upload', 'CkeditorController@upload')->name('upload');



Auth::routes();

