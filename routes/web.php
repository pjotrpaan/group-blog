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

Route::group([
  'prefix' => LaravelLocalization::setLocale(),
  'middleware' => [ 
    'localeSessionRedirect', 
    'localizationRedirect', 
    'localeViewPath' ] ], function()
{

  Route::get('/', 'PageController@index');

  Route::resource(LaravelLocalization::transRoute('routes.posts'), 'PostController');

  Route::get(LaravelLocalization::transRoute('routes.post'), 'PostController@show')->name('posts.show');

  Route::get(LaravelLocalization::transRoute('routes.dashboard'), 'DashboardController@index');

  Route::resource('comment','CommentController');


  Auth::routes();

});


Route::post('ckeditor/image_upload', 'CkeditorController@upload')->name('upload');
