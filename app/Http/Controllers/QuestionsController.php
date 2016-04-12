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
use Algorithmaths\UserAnswer;
use DB;

class QuestionsController extends Controller
{ 
    

  public function show() {
    $questions = Question::limit(10)->with('answer')->get();
    Session::put('key', $questions);
    return Redirect::to('pages.index')->with(compact('questions'));
  }  

  public function store(Request $request)
    {

        


      //dd($request->input->all());
      Session::forget('key');
      $length;
      $array =[];
      $answers = [];
      $length;
      foreach($_POST as $key => $val){
        if(substr($key, 0, 8) == 'question'){
          $array[] = $val;
          //$length  =  array_keys( $array, 1 );
        }
      }
      $answer_id = [];
      $id = [];
      foreach($array as $answers){
        $answer = Answer::where('answer',$answers)->get();
        $answer_id[] = $answer;
      }
      $ids = [];
      $correct = [];
      foreach($answer_id as $ans){
        foreach($ans as $hey){
          $ids[] = $hey->answer_id;
          $correct[] = $hey->correct_answer;
          $user_answer = new UserAnswer;
          $user_answer->answer_id = $hey->answer_id;
          $user_answer->user_id = Auth::user()->id;
          $user_answer->question_id = $hey->question_id;
          $user_answer->save();
        }  
        }
       
         $length  = count( array_keys( $correct, 1 ));
        
       

//dd($useranswer);

 // $answers = Question::with('answer')      
      //$result = new Result;
      //$result -> user_id = Auth::user()->id;
      //$result -> result = $length;
      //$result -> save();
     
      return Redirect::to('index')->with('success', true)->with(compact('length','useranswer'));
}
  
    

}
