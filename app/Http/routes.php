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
//Route::get('login', [ 'as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('logout','SessionsController@destroy');
Route::post('register', [ 'as' => 'register', 'uses' => 'WelcomeController@store']);
Route::post('feedback', [ 'as' => 'feedback', 'uses' => 'FeedbackController@create']);
Route::post('test', [ 'as' => 'test', 'uses' => 'QuestionController@store']);
Route::get('index', 'WelcomeController@index');
Route::get('review', 'QuestionController@index');
Route::get('feedback', 'FeedbackController@index');

Route::resource('sessions', 'SessionsController');
Route::resource('test', 'QuestionsController');

Route::group(['middleware' => ['web']], function () {
    Route::post('login',[ 'as' => 'login', 'uses' => 'SessionsController@create']);
});
