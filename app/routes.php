<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::get('/', function() {
    return View::make('pages.hello');
});

Route::get('about', function() {
    return View::make('pages.about');
});

//for login
Route::post('login', array('as' => 'user.login', 'uses' => 'UserController@login'));

Route::resource('user', 'UserController');
