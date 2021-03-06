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

Auth::routes();

Route::get('/post/{id}', 'PostController@getAjaxPost');

Route::get('/user/{username}', 'UserController@profile');

Route::get('/user/{username}/edit', 'UserController@editProfile')
       ->middleware('ProfileOwner');

Route::post('/user/{username}/edit', 'UserController@updateProfile')
       ->middleware('ProfileOwner');

Route::get('/home', 'HomeController@index');

Route::get('/', 'PageController@homePage')->name('homepage');

Route::get('/{category_slug}', 'CategoryController@index')
    ->name('category');

Route::get('/{category_slug}/create', 'CategoryController@newTopic')
    ->name('create_topic');

Route::post('/{category_slug}/create', 'CategoryController@addTopic')
    ->name('create_topic');
    
Route::get('/{category_slug}/{topic_slug}', 'TopicController@index')
    ->name('topic');

Route::post('/{category_slug}/{topic_slug}', 'TopicController@addPost')
    ->middleware('auth');

