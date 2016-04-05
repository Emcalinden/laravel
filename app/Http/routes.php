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

Route::get('logout','LoginController@destroy');
Route::post('register', [ 'as' => 'register', 'uses' => 'WelcomeController@store']);
//Route::post('feedback', [ 'as' => 'feedback', 'uses' => 'FeedbackController@create']);
Route::get('index', 'WelcomeController@index');
Route::get('review', 'QuestionsController@index');
Route::resource('sessions', 'LoginController');
//Route::resource('test','QuestionsController');
Route::get('test','QuestionsController@show');
Route::post('test', [ 'as' => 'test', 'uses' => 'QuestionsController@store']);
//Route::post('score', 'QuestionController@store');
Route::group(['middleware' => ['web']], function () {
    Route::post('login',[ 'as' => 'login', 'uses' => 'LoginController@create']);
});
Route::resource('test', 'QuestionsController');
