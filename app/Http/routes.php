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
Route::get('login', [ 'as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('logout','SessionsController@destroy');
Route::post('register', [ 'as' => 'register', 'uses' => 'WelcomeController@store']);
Route::post('test', [ 'as' => 'test', 'uses' => 'QuestionController@store']);
Route::get('index', 'WelcomeController@index');
Route::resource('sessions', 'SessionsController');
Route::resource('test', 'QuestionsController');



