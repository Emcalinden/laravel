<?php

namespace Algorithmaths\Http\Controllers;

use Illuminate\Http\Request;
use Algorithmaths\Question;
use Algorithmaths\Http\Requests;
use Algorithmaths\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use View;
use Auth;
use Session;
use Algorithmaths\User;
use Algorithmaths\Answer;
use Algorithmaths\Result;
use Illuminate\Support\Facades\Input;


class QuestionsController extends Controller
{ 
    

  public function show() {
    $questions = Question::limit(10)->with('answer')->get();
    Session::put('key', $questions);
    return Redirect::to('pages.index')->with(compact('questions'));
  }  

  public function store(Request $request)
    {
      Session::forget('key');
      $length;
      foreach($_POST as $key => $val){
        if(substr($key, 0, 8) == 'question'){
          $array[] = $val;
          $length  = count( array_keys( $array, 1 ));
        }
      }
      $result = new Result;
      $result -> user_id = Auth::user()->id;
      $result -> result = $length;
      $result -> save();
      return Redirect::to('index')->with('success', true)->with(compact('length','data'));
}
  
    

}
