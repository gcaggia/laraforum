<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/mail', function () {

    $data = [
    	'title'   => 'welcome',
    	'content' => 'A message to say hello !'
    ];

    Mail::send('email.welcome', $data, function($message){
    	$message->to(env('MAIL_PERSO'), 'laraforum')->subject('Welcome to Laraforum');
    });

});

Route::get('/', function () {

	// $categories = DB::table('categories')->get();
	$categories = App\Category::all();

    return view('welcome', compact('categories'));

});

Route::auth();

Route::get('/home', 'HomeController@index');
