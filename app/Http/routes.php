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
//Route::get('login','SessionsContoller@create');
Route::get('logout','SessionsController@destroy');
Route::post('register', [ 'as' => 'register', 'uses' => 'WelcomeController@store']);
//Route::post('recurrence', ['as' => 'recurrence', 'uses' => 'RecurrenceController@recurrence']);
Route::get('index', 'WelcomeController@index');

//Route::get('questions',['as'=>'questions', 'uses' => 'QuestionsController@index']);
//Route::get('question', [ 'as' => 'pages.index', 'uses' => 'QuestionsController@index']);
//Route::get('', function() {

//$questions = \Algorithmaths\Question::find(1);
//return View::make('pages.index', compact('questions'));
//});
//Route::resource('question', 'QuestionsController');
//Route::resource('question','QuestionController');
Route::resource('sessions', 'SessionsController');



